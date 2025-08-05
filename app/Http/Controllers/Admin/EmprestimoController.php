<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmprestimoController extends Controller
{
    // public function index()
    // {
    //     $emprestimos = Emprestimo::with(['user', 'material'])->get();
    //     return view('admin.emprestimos.index', compact('emprestimos'));
    // }

    // public function create()
    // {
    //     $users = User::all();
    //     $materiais = Material::all();
    //     return view('admin.emprestimos.create', compact('users', 'materiais'));
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'material_id' => 'required',
    //         'data_de_retirada' => 'required|date',
    //     ]);

    //     Emprestimo::create($request->all());

    //     return redirect()->route('dashboard')->with('success', 'Empréstimo criado com sucesso.');
    // }

    // public function show(Emprestimo $emprestimo)
    // {
    //     return view('emprestimos.show', compact('emprestimo'));
    // }

    // public function edit(Emprestimo $emprestimo)
    // {
    //     $users = User::all();
    //     $materiais = Material::all();
    //     return view('admin.emprestimos.edit', compact('emprestimo', 'users', 'materiais'));
    // }

    // public function update(Request $request, Emprestimo $emprestimo)
    // {
    //     $request->validate([
    //         'user_id' => 'required',
    //         'material_id' => 'required',
    //         'data_de_retirada' => 'required|date',
    //     ]);

    //     $emprestimo->update($request->all());

    //     return redirect()->route('dashboard')->with('success', 'Empréstimo atualizado.');
    // }

    // public function destroy(Emprestimo $emprestimo)
    // {
    //     $emprestimo->delete();
    //     return redirect()->route('dashboard')->with('success', 'Empréstimo removido.');
    // }

    // public function aprovar($id)
    // {
    //     $emprestimo = Emprestimo::findOrFail($id);
    //     $emprestimo->status_emprestimo = 'EMPRESTADO';
    //     $emprestimo->save();

    //     // opcional: enviar notificação ao usuário

    //     return redirect()->back()->with('success', 'Empréstimo autorizado com sucesso.');
    // }

    // public function rejeitar($id)
    // {
    //     $emprestimo = Emprestimo::findOrFail($id);
    //     $emprestimo->status_emprestimo = 'REJEITADO'; // opcional: criar este status
    //     $emprestimo->save();

    //     return redirect()->back()->with('error', 'Empréstimo rejeitado.');
    // }

    // public function verificarDisponibilidade($id)
    // {
    //     $material = Material::findOrFail($id);

    //     $emprestimosAtivos = $material->emprestimos()
    //         ->whereIn('status_emprestimo', ['PENDENTE', 'EMPRESTADO'])
    //         ->count();

    //     $disponivel = $material->quantidade > $emprestimosAtivos;

    //     return response()->json([
    //         'disponivel' => $disponivel,
    //         'quantidade_total' => $material->quantidade,
    //         'emprestimos_ativos' => $emprestimosAtivos,
    //         'quantidade_disponivel' => max(0, $material->quantidade - $emprestimosAtivos)
    //     ]);
    // }

    public function criar()
    {
        $materiais = Material::all();
        return view('user.solicitar_emprestimo', compact('materiais'));
    }

    public function solicitar(Request $request)
    {
        $request->validate([
            'material_id' => 'required|exists:materiais,id',
            'data_de_retirada' => 'required|date|after_or_equal:today',
            'data_de_devolucao' => 'required|date|after:data_de_retirada',
        ]);

        $material = Material::findOrFail($request->material_id);

        // Verifica disponibilidade do material
        if (!$material->disponivel) {
            return redirect()->back()->with('error', 'Este material não está disponível no momento.');
        }

        $emprestimo = new Emprestimo();
        $emprestimo->user_id = Auth::id();
        $emprestimo->material_id = $request->material_id;
        $emprestimo->data_de_retirada = $request->data_de_retirada;
        $emprestimo->data_de_devolucao = $request->data_de_devolucao;
        $emprestimo->status = 'PENDENTE';
        $emprestimo->save();

        // Marca o material como não disponível (opcional)
        $material->disponivel = false;
        $material->save();

        return redirect()->route('dashboard')->with('success', 'Solicitação enviada com sucesso.');
    }

}
