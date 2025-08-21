<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmprestimoController extends Controller
{
    // public function index()
    // {
    //     $emprestimos = Emprestimo::with(['user', 'material'])->get();
    //     return view('admin.emprestimos.index', compact('emprestimos'));
    // }

    public function meus_emprestimos()
    {
        $meus_emprestimos = Emprestimo::with(['user', 'material'])->where('user_id', Auth::id())->get();
        return view('user.meus_emprestimos', compact('meus_emprestimos'));
    }

    public function emprestimos()
    {
        $emprestimo = Emprestimo::with(['user', 'material'])->get();
        return view('admin.emprestimos.emprestimos_pendentes', compact('emprestimo'));
    }

    public function criar()
    {
        $materiais = Material::all();
        return view('user.solicitar_emprestimo', compact('materiais'));
    }

    public function solicitar(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materiais,id',
            'unidades' => 'required|integer|min:1',
            'data_de_retirada' => 'required|date|after_or_equal:today',
            'data_de_devolucao' => 'required|date|after:data_de_retirada',
        ]);

        DB::transaction(function () use ($request) {
            Emprestimo::create([
                'user_id' => Auth::id(),
                'material_id' => $request->material_id,
                'data_de_retirada' => $request->data_de_retirada,
                'data_de_devolucao' => $request->data_de_devolucao,
                'data_limite' => $request->data_de_devolucao,
                'unidades' => $request->unidades,
                'status_emprestimo' => 'PENDENTE',
                'nota_antes_do_emprestimo' => '',
                'nota_apos_emprestimo' => '',
                'multa' => 0,
                'notificacao' => false
            ]);
        });

        return redirect()->route('emprestimos.meus_emprestimos')->with('success', 'Solicitação enviada com sucesso!');
    }

    public function validar(Request $request, $id)
    {
        $request->validate([
            'nota_antes_do_emprestimo' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request, $id) {
            $emprestimo = Emprestimo::findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'PENDENTE') {
                throw new \Exception('Empréstimo não está pendente para validação.');
            }

            $emprestimo->update([
                'nota_antes_do_emprestimo' => $request->nota_antes_do_emprestimo,
                'status_emprestimo' => 'VALIDADO'
            ]);

            // Atualizar status do material se necessário
            $material = $emprestimo->material;
            $material->update(['status_material' => 'INDISPONIVEL']);
        });

        return back()->with('success', 'Empréstimo validado com sucesso!');
    }

    public function solicitarDevolucao($id)
    {
        DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::where('user_id', Auth::id())->findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'EMPRESTADO') {
                throw new \Exception('Não é possível devolver um empréstimo que não foi emprestado.');
            }

            $emprestimo->update(['status_emprestimo' => 'PEDIDO_DE_SOLICITACAO_DE_DEVOLUCAO']);
        });

        return back()->with('success', 'Solicitação de devolução enviada ao administrador.');
    }

    public function aceitarPedidoDeDevolucao($id)
    {
        DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::findOrFail($id);
            // where('user_id', Auth::id())->
            if ($emprestimo->status_emprestimo !== 'PEDIDO_DE_SOLICITACAO_DE_DEVOLUCAO') {
                throw new \Exception('Não é possível aceitar o pedido de devolução.');
            }

            $emprestimo->update(['status_emprestimo' => 'AGUARDANDO_DEVOLUCAO']);
        });

        return back()->with('success', 'Pedido Aceite!');
    }

    public function devolver($id)
    {
            DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::where('user_id', Auth::id())->findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'AGUARDANDO_DEVOLUCAO') {
                throw new \Exception('Empréstimo não está aguardando devolucao.');
            }

            $emprestimo->update([
                'status_emprestimo' => 'DEVOLVER'
            ]);
        });

        return back()->with('success', 'Aguardando confirmação de devolução!');
    }


    public function confirmarDevolucao(Request $request, $id)
    {
        $request->validate([
            'nota_apos_emprestimo' => 'required|string|max:255'
        ]);

        DB::transaction(function () use ($request, $id) {
            $emprestimo = Emprestimo::findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'DEVOLVER') {
                throw new \Exception('Devolução não foi solicitada.');
            }

            $emprestimo->update([
                'nota_apos_emprestimo' => $request->nota_apos_emprestimo,
                'status_emprestimo' => 'DEVOLVIDO'
            ]);

            // Devolver o material ao estoque
            $material = $emprestimo->material;
            $material->update(['status_material' => 'DISPONIVEL']);
        });

        return back()->with('success', 'Devolução confirmada com sucesso!');
    }

    public function levantar($id)
    {
        DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'VALIDADO') {
                throw new \Exception('Empréstimo não está validado para levantamento.');
            }

            $emprestimo->update([
                'status_emprestimo' => 'AGUARDANDO_CONFIRMACAO_DE_LEVANTAMENTO'
            ]);

            $material = $emprestimo->material;
            $material->update(['status_material' => 'INDISPONIVEL']);
        });

        return back()->with('success', 'Empréstimo aguardando confirmação de levantamento!');
    }

    public function entregar($id)
    {
        DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'AGUARDANDO_CONFIRMACAO_DE_LEVANTAMENTO') {
                throw new \Exception('Empréstimo não está aguardando confirmação.');
            }

            $emprestimo->update([
                'status_emprestimo' => 'AGUARDANDO_CONFIRMACAO_DE_ENTREGA'
            ]);
        });

        return back()->with('success', 'Aguardando confirmação de entrega!');
    }

    public function confirmarLevantamento($id)
    {
        DB::transaction(function () use ($id) {
            $emprestimo = Emprestimo::findOrFail($id);

            if ($emprestimo->status_emprestimo !== 'AGUARDANDO_CONFIRMACAO_DE_ENTREGA') {
                throw new \Exception('Só pode confirmar que estao aguardando confirmação de entrega.');
            }

            $emprestimo->update([
                'status_emprestimo' => 'EMPRESTADO',
            ]);
        });

        return back()->with('success', 'EMPRESTIMO realizado com sucesso!');
    }
}
