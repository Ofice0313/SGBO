<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MaterialController extends Controller
{
    public function tela_de_livros(){
        $data = [
            'title' => 'tela de livros',
        ];

        return view('tela_de_livros', $data);
    }

    public function index()
    {
        $materiais = Material::where('is_active', true)->paginate(12);
        return view('materiais.index', compact('materiais'));
    }

    public function create()
    {
        return view('books.create');
    }



    public function visualizar(Material $material)
    {
        return view('material.visualizar', compact('material'));
    }

    // Método para visualizar PDF de forma protegida
    public function viewPdf(Material $material)
    {
        if (!$material->hasPdf()) {
            abort(404, 'PDF não encontrado');
        }

        $caminhoDoArquivo = storage_path('app/private/materiais/' . $material->caminho_do_arquivo);
        
        if (!file_exists($caminhoDoArquivo)) {
            abort(404, 'Arquivo não encontrado');
        }

        // Retorna o PDF com headers que impedem download
        return response()->file($caminhoDoArquivo, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $material->titulo . '.pdf"',
            'X-Frame-Options' => 'SAMEORIGIN',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
            'Pragma' => 'no-cache',
            'Expires' => '0'
        ]);
    }

    // Método para stream de áudio protegido
    public function streamAudio(Material $material)
    {
        if (!$material->hasAudio()) {
            abort(404, 'Audiolivro não encontrado');
        }

        $caminhoDoArquivo = storage_path('app/private/audiobooks/' . $material->caminho_do_audio);
        
        if (!file_exists($caminhoDoArquivo)) {
            abort(404, 'Arquivo não encontrado');
        }

        $fileSize = filesize($caminhoDoArquivo);
        $file = fopen($caminhoDoArquivo, 'rb');
        
        // Suporte para Range requests (streaming)
        $start = 0;
        $end = $fileSize - 1;
        
        if (isset($_SERVER['HTTP_RANGE'])) {
            $range = $_SERVER['HTTP_RANGE'];
            list($param, $range) = explode('=', $range);
            
            if (strtolower(trim($param)) == 'bytes') {
                $range = explode(',', $range);
                $range = explode('-', $range[0]);
                
                if (count($range) == 2) {
                    if (is_numeric($range[0])) {
                        $start = intval($range[0]);
                    }
                    if (is_numeric($range[1])) {
                        $end = intval($range[1]);
                    }
                }
            }
        }

        $length = $end - $start + 1;
        
        fseek($file, $start);
        
        header('HTTP/1.1 206 Partial Content');
        header('Accept-Ranges: bytes');
        header('Content-Length: ' . $length);
        header('Content-Range: bytes ' . $start . '-' . $end . '/' . $fileSize);
        header('Content-Type: audio/mpeg');
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        
        $buffer = 1024 * 8;
        while (!feof($file) && ($pos = ftell($file)) <= $end) {
            if ($pos + $buffer > $end) {
                $buffer = $end - $pos + 1;
            }
            echo fread($file, $buffer);
            flush();
        }
        
        fclose($file);
        exit;
    }

    // Método para upload de livros (admin)
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editora' => 'nullable|string',
            'caminho_do_arquivo' => 'nullable|file|mimes:pdf|max:50000', // 50MB
            'caminho_do_audio' => 'nullable|file|mimes:mp3,wav,m4a|max:200000', // 200MB
            'caminho_da_imagem' => 'nullable|image|max:5000', // 5MB
            'paginas' => 'required|integer|min:1',
            'minutos' => 'required|integer|min:1',
            'tipo' => 'required|in:LIVRO,AUDIOLIVRO',
            'status_material' => 'required|in:DISPONIVEL,INDISPONIVEL',
            'is_active' => 'boolean',
        ]);

        $material = new Material();
        $material->titulo = $request->titulo;
        $material->autor = $request->autor;
        $material->editora = $request->editora;
        $material->ano_de_publicacao = $request->ano_de_publicacao;
        $material->paginas = $request->paginas;
        $material->minutos = $request->minutos;
        $material->tipo = $request->tipo;
        $material->status_material = $request->status_material;
        $material->is_active = $request->is_active ?? true;

        // Upload do PDF
        if ($request->hasFile('caminho_do_arquivo')) {
            $pdfFile = $request->file('caminho_do_arquivo');
            $pdfName = Str::uuid() . '.pdf';
            $pdfFile->storeAs('private/books', $pdfName);
            $material->caminho_do_arquivo= $pdfName;
        }

        // Upload do áudio
        if ($request->hasFile('caminho_do_audio')) {
            $audioFile = $request->file('caminho_do_audio');
            $audioName = Str::uuid() . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->storeAs('private/audiobooks', $audioName);
            $material->caminho_do_audio = $audioName;
        }

        // Upload da capa
        if ($request->hasFile('caminho_da_imagem')) {
            $coverFile = $request->file('caminho_da_imagem');
            $coverName = Str::uuid() . '.' . $coverFile->getClientOriginalExtension();
            $coverFile->storeAs('public/covers', $coverName);
            $material->caminho_da_imagem = $coverName;
        }

        $material->save();

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso!');
    }

    public function edit(Material $material)
    {
        return view('editar_material', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editora' => 'nullable|string',
            'caminho_do_arquivo' => 'nullable|file|mimes:pdf|max:50000', // 50MB
            'caminho_do_audio' => 'nullable|file|mimes:mp3,wav,m4a|max:200000', // 200MB
            'caminho_da_imagem' => 'nullable|image|max:5000', // 5MB
            'paginas' => 'required|integer|min:1',
            'minutos' => 'required|integer|min:1',
            'tipo' => 'required|in:LIVRO,AUDIOLIVRO',
            'status_material' => 'required|in:DISPONIVEL,INDISPONIVEL',
            'is_active' => 'boolean',
        ]);

        $material = new Material();
        $material->titulo = $request->titulo;
        $material->autor = $request->autor;
        $material->editora = $request->editora;
        $material->ano_de_publicacao = $request->ano_de_publicacao;
        $material->paginas = $request->paginas;
        $material->minutos = $request->minutos;
        $material->tipo = $request->tipo;
        $material->status_material = $request->status_material;
        $material->is_active = $request->is_active ?? true;

        // Atualizar PDF se fornecido
        if ($request->hasFile('caminho_do_arquivo')) {
            // Remover arquivo antigo se existir
            if ($material->caminho_do_arquivo) {
                $oldPdfPath = storage_path('app/private/books/' . $material->caminho_do_arquivo);
                if (file_exists($oldPdfPath)) {
                    unlink($oldPdfPath);
                }
            }
            
            $pdfFile = $request->file('caminho_do_arquivo');
            $pdfName = Str::uuid() . '.pdf';
            $pdfFile->storeAs('private/books', $pdfName);
            $material->pdf_path = $pdfName;
        }

        // Atualizar áudio se fornecido
        if ($request->hasFile('caminho_do_audio')) {
            // Remover arquivo antigo se existir
            if ($material->caminho_do_audio) {
                $oldAudioPath = storage_path('app/private/audiobooks/' . $material->caminho_do_audio);
                if (file_exists($oldAudioPath)) {
                    unlink($oldAudioPath);
                }
            }
            
            $audioFile = $request->file('caminho_do_audio');
            $audioName = Str::uuid() . '.' . $audioFile->getClientOriginalExtension();
            $audioFile->storeAs('private/audiobooks', $audioName);
            $material->caminho_do_audio = $audioName;
        }

        // Atualizar capa se fornecida
        if ($request->hasFile('caminho_da_imagem')) {
            // Remover imagem antiga se existir
            if ($material->caminho_da_imagem) {
                $oldCoverPath = storage_path('app/public/covers/' . $material->caminho_da_imagem);
                if (file_exists($oldCoverPath)) {
                    unlink($oldCoverPath);
                }
            }
            
            $coverFile = $request->file('caminho_da_imagem');
            $coverName = Str::uuid() . '.' . $coverFile->getClientOriginalExtension();
            $coverFile->storeAs('public/covers', $coverName);
            $material->caminho_da_imagem = $coverName;
        }

        $material->save();

        return redirect()->route('materiais.visualizar', $material)->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy(Material $material)
    {
        // Remover arquivos físicos
        if ($material->caminho_do_arquivo) {
            $pdfPath = storage_path('app/private/books/' . $material->caminho_do_arquivo);
            if (file_exists($pdfPath)) {
                unlink($pdfPath);
            }
        }

        if ($material->caminho_do_audio) {
            $audioPath = storage_path('app/private/audiobooks/' . $material->caminho_do_audio);
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }
        }

        if ($material->caminho_da_imagem) {
            $coverPath = storage_path('app/public/covers/' . $material->caminho_da_imagem);
            if (file_exists($coverPath)) {
                unlink($coverPath);
            }
        }

        $material->delete();

        return redirect()->route('material.index')->with('success', 'Livro removido com sucesso!');
    }
    
}
