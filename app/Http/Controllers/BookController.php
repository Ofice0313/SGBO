<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books(){
        $materiais = Material::where('is_active', true)->get();
        return view('books.index', compact('materiais'));
    }
}
