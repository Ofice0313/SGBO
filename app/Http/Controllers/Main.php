<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Main extends Controller
{
    public function register()
    {
        $data = [
            'title' => 'Novo Registro',
        ];
        return view('register', $data);
    }

    public function register_users(){
        $data = [
            'title' => 'Registro de usuários',
        ];
        return view('register_usuarios', $data);
    }

    public function register_submit_users(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'telefone' => 'nullable|string|max:50',
            'endereco' => 'nullable|string|max:255',
            'email' => 'required|email|unique:users,email',
            'instituicao' => 'required|in:LORE,ISLORE,FOCO',
            'password' => 'required|confirmed|min:6',
        ],
         ['password.confirmed' => 'As passwords não coincidem.',
            'instituicao.required' => 'Selecione uma instituicao',
            'instituicao.in' => 'Instituicao Invalida',
        ]);

        $user = new UserModel();
        $user->name = $request->name;
        $user->telefone = $request->telefone;
        $user->endereco = $request->endereco;
        $user->email = $request->email;
        $user->instituicao = $request->instituicao;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('index')->with('success', 'Conta criada com sucesso! Faça login.');
    }

    public function login(){
        $data = [
            'title' => 'login'
        ];
        return view('login', $data);
    }

    public function login_submit(Request $request){
         //Form validation
        $request->validate([
            'email' => 'required|min:6',
            'instituicao' => 'required|in:LORE,ISLORE,FOCO',
            'password' => 'required|min:5',
        ],[
            'email.required' => 'O campo eh de preenchimento obrigatorio.',
            'email.min' => 'O campo deve ter no minimo 6 caracteres',
            'instituicao.required' => 'Selecione uma instituicao',
            'instituicao.in' => 'Instituicao Invalida',
            'password.required' => 'O campo eh de preenchimento obrigatorio.',
            'password.min' => 'O campo deve ter no minimo 3 caracteres.',
        ]);

        // get form data
        $email = $request->input('email');
        $password = $request->input('password');
        $instituicao = $request->input('instituicao');

        //check if users exists
        $model = new UserModel();
        $user = $model->where('email', '=', $email)->where('instituicao', '=', $instituicao)->whereNull('deleted_at')->first();
        if($user){
            //Check if password is correct
            if(password_verify($password, $user->password)){
                $session_data = [
                    'id' => $user->id,
                    'email' => $user->email
                ];
                session()->put($session_data);
                return redirect()->route('index');
            }
        }

        // invalid login
        return redirect()->route('login')->withInput()->with('login_error', 'Login invalido');
    }

    // logout 
    public function logout(){
        session()->forget('email');
        return redirect()->route('login');
    }

    public function new_register_submit(Request $request)
    {
        // Validação
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            'subcategoria' => 'nullable|string',
            'categoria' => 'nullable|string',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'ano_de_publicacao' => 'nullable|integer',
            'numero_paginas' => 'nullable|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,epub,mp3,wav'
        ]);

        // Salvar imagem se existir
        $caminhoImagem = null;
        if ($request->hasFile('imagem')) {
            $caminhoImagem = $request->file('imagem')->store('imagens', 'public');
        }

        // Salvar arquivo se existir
        $caminhoArquivo = null;
        if ($request->hasFile('arquivo')) {
            $caminhoArquivo = $request->file('arquivo')->store('arquivos', 'public');
        }

        // Criar Material
        Material::create([
            'titulo' => $request->titulo,
            'tipo' => $request->tipo,
            'subcategoria' => $request->subcategoria,
            'categoria' => $request->categoria,
            'autor' => $request->autor,
            'editora' => $request->editora,
            'ano_de_publicacao' => $request->ano_de_publicacao,
            'paginas' => $request->numero_paginas,
            'caminho_da_imagem' => $caminhoImagem,
            'caminho_do_arquivo' => $caminhoArquivo,
        ]);

        return redirect()->route('index')->with('success', 'Material registrado com sucesso!');
    }

    public function index(Request $request)
    {

        $query = Material::query();
        $materiais = Material::all();

        // Se houver busca por título
        if ($request->has('search') && $request->search != '') {
            $query->where('titulo', 'LIKE', '%' . $request->search . '%');
        }

        // Pega todos (ou filtrados)
        $materiais = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('index', [
            'title' => 'Lista de Materiais',
            'materiais' => $materiais,
            'search' => $request->search,
            'datatables' => true
        ]);
    }

    // Mostra o form de edição
    public function edit($id)
    {
        $material = Material::findOrFail($id);

        return view('edit', [
            'title' => 'Editar Material',
            'material' => $material
        ]);
    }

    // Atualiza o material
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'tipo' => 'required|string',
            'subcategoria' => 'nullable|string',
            'categoria' => 'nullable|string',
            'autor' => 'nullable|string',
            'editora' => 'nullable|string',
            'ano_de_publicacao' => 'nullable|integer',
            'numero_paginas' => 'nullable|integer',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'arquivo' => 'nullable|file|mimes:pdf,doc,docx,epub,mp3,wav'
        ]);

        $material = Material::findOrFail($id);

        $material->titulo = $request->titulo;
        $material->tipo = $request->tipo;
        $material->subcategoria = $request->subcategoria;
        $material->categoria = $request->categoria;
        $material->autor = $request->autor;
        $material->editora = $request->editora;
        $material->ano_de_publicacao = $request->ano_de_publicacao;
        $material->paginas = $request->numero_paginas;

        // Se enviou nova imagem
        if ($request->hasFile('imagem')) {
            $material->caminho_da_imagem = $request->file('imagem')->store('imagens', 'public');
        }

        // Se enviou novo arquivo
        if ($request->hasFile('arquivo')) {
            $material->caminho_do_arquivo = $request->file('arquivo')->store('arquivos', 'public');
        }

        $material->save();

        return redirect()->route('index')->with('success', 'Material atualizado com sucesso!');
    }

    // Deleta material
    public function delete($id)
    {
        $material = Material::findOrFail($id);

        $material->delete();

        return redirect()->route('index')->with('success', 'Material excluído com sucesso!');
    }
}
