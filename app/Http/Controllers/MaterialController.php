<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function tela_de_livros(){
        $data = [
            'title' => 'tela de livros',
        ];

        return view('tela_de_livros', $data);
    }
    
}
