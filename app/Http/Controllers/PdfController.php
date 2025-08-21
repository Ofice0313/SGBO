<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Smalot\PdfParser\Parser;

class PdfController extends Controller
{
    public function lerPdf()
    {
        // Caminho do PDF no storage
        $caminho = storage_path('app/public/books/padroes-de-projecto.pdf');

        // Instancia o parser
        $parser = new Parser();
        $pdf = $parser->parseFile($caminho);

        // Extrai o texto
        $texto = $pdf->getText();

        // Retorna para uma view (ou pode retornar como resposta direta)
        return view('admin.pdfs.pdf_ler', compact('texto'));
    }
}
