<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Material;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class LivroController extends Controller
{
     /**
     * Exibe o conteúdo do livro em um iframe sem permitir download/cópia.
     */
    
    public function visualizarLivro($id)
    {
        $material = Material::findOrFail($id);
        // Verifica se o arquivo existe
        if (!$material->caminho_do_arquivo || !Storage::disk('public')->exists($material->caminho_do_arquivo)) {
            abort(404, 'Arquivo não encontrado.');
        }
        return view('books.visualizar', compact('material'));
    }

    public function view($id)
    {
        // Encontra o livro/arquivo no banco de dados
        $material = Material::findOrFail($id);
        
        // Verifica se o arquivo existe
        $filePath = storage_path('app/public/books' . $material->caminho_do_arquivo);
        
        if (!File::exists($filePath)) {
            abort(404);
        }

        // Carregue o conteúdo do PDF
        $fileContent = File::get($filePath);
        
        // Cria uma resposta com o tipo MIME correto
        $response = new Response($fileContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'
        ]);
        
        // Adiciona headers para evitar cache e download
        $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        
        return $response;
    }

    public function tela_de_livros()
    {
        $data = [
            'title' => 'tela de livros',
        ];

        return view('tela_de_livros', $data);
    }

    public function index()
    {
        $materiais = Material::with('subcategoria')->paginate(10);
        return view('admin.materiais.index', compact('materiais'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::with('categoria')->get();
        $data = [
            'title' => 'registro_de_material',
        ];
        return view('admin.materiais.registro_de_material', $data, compact('categorias', 'subcategorias'));
    }



    // public function visualizar(Material $material)
    // {
    //     return view('material.visualizar', compact('material'));
    // }

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

    // Método para upload de livros (admin)
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editora' => 'nullable|string',
            'ano_de_publicacao' => 'nullable|string',
            'subcategoria_id' => 'required|exists:subcategorias,id',
            'caminho_do_arquivo' => 'nullable|file|mimes:pdf|max:50000', // 50MB
            'caminho_do_audio' => 'nullable|file|mimes:mp3,wav,m4a|max:200000', // 200MB
            'caminho_da_imagem' => 'nullable|image|max:5000', // 5MB
            'paginas' => 'required|integer|min:1',
            'minutos' => 'required|integer|min:1',
            'tipo' => 'required|in:LIVRO,AUDIOLIVRO,ARTIGO,REVISTA',
            'status_material' => 'required|in:DISPONIVEL,INDISPONIVEL',
            'is_active' => 'boolean',
        ]);

        $material = new Material();
        $material->titulo = $request->titulo;
        $material->autor = $request->autor;
        $material->editora = $request->editora;
        $material->ano_de_publicacao = $request->ano_de_publicacao;
        $material->subcategoria_id = $request->subcategoria_id;
        $material->paginas = $request->paginas;
        $material->minutos = $request->minutos;
        $material->tipo = $request->tipo;
        $material->status_material = $request->status_material;
        $material->is_active = $request->is_active ?? true;

        // Upload do PDF
        if ($request->hasFile('caminho_do_arquivo')) {
            $pdfFile = $request->file('caminho_do_arquivo');
            // $pdfName = Str::uuid() . '.pdf';
            $pdfName = Str::of($request->titulo)->slug('-') . '.' . $request->caminho_do_arquivo->getClientOriginalExtension();
            $pdfFile->storeAs('public/books', $pdfName);
            $material->caminho_do_arquivo = $pdfName;
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
            $nameFile = Str::of($request->titulo)->slug('-') . '.' . $request->caminho_da_imagem->getClientOriginalExtension();
            $coverFile->storeAs('public/covers', $nameFile);
            $material->caminho_da_imagem = $nameFile;
        }

        $material->save();

        return back()->with('success', 'Livro cadastrado com sucesso!');
    }


    public function edit(Material $material)
    {
        $categorias = Categoria::all();
        $subcategorias = Subcategoria::with('categoria')->get();
        return view('admin.materiais.editar_material', compact('material', 'categorias', 'subcategorias'));
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

        //$material = new Material();
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
            $material->caminho_do_arquivo = $pdfName;
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

        return back()->with('success', 'Livro atualizado com sucesso!');
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

        return back()->with('success, Livro removido com sucesso!');
    }
}
