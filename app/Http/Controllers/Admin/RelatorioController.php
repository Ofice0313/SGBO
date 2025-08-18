<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emprestimo;
use App\Models\Material;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class RelatorioController extends Controller
{
    public function index()
    {
        $emprestimos = Emprestimo::with(['user', 'material'])->get();
        $emprestimosCount = Emprestimo::count();
        $materiaisCount = Material::count();
        $usuariosCount = User::count();
        return view('admin.relatorio.index', compact('emprestimos', 'emprestimosCount', 'materiaisCount', 'usuariosCount'));
    }

    public function emprestimosPdf()
    {
        $emprestimos = Emprestimo::with(['user', 'material'])->get();
        $pdf = Pdf::loadView('admin.relatorio.emprestimos_pdf', compact('emprestimos'));
        return $pdf->download('relatorio_emprestimos.pdf');
    }
}
