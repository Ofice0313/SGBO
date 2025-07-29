<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;

class EmprestimoController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with(['user', 'material'])->get();
        return view('admin.emprestimos.index', compact('emprestimos'));
    }

    public function create()
    {
        $users = User::all();
        $materiais = Material::all();
        return view('admin.emprestimos.create', compact('users', 'materiais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'material_id' => 'required',
            'data_de_retirada' => 'required|date',
        ]);

        Emprestimo::create($request->all());

        return redirect()->route('admin.emprestimos.index')->with('success', 'Empréstimo criado com sucesso.');
    }

    public function show(Emprestimo $emprestimo)
    {
        return view('emprestimos.show', compact('emprestimo'));
    }

    public function edit(Emprestimo $emprestimo)
    {
        $users = User::all();
        $materiais = Material::all();
        return view('admin.emprestimos.edit', compact('emprestimo', 'users', 'materiais'));
    }

    public function update(Request $request, Emprestimo $emprestimo)
    {
        $request->validate([
            'user_id' => 'required',
            'material_id' => 'required',
            'data_de_retirada' => 'required|date',
        ]);

        $emprestimo->update($request->all());

        return redirect()->route('admin.emprestimos.index')->with('success', 'Empréstimo atualizado.');
    }

    public function destroy(Emprestimo $emprestimo)
    {
        $emprestimo->delete();
        return redirect()->route('admin.emprestimos.index')->with('success', 'Empréstimo removido.');
    }
}
