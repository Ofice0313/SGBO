<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books(Request $request) {
        $query = Material::where('is_active', true);

        if ($request->filled('q')) {
            $search = $request->input('q');
            $query->where(function($q) use ($search) {
                $q->where('titulo', 'like', "%$search%")
                  ->orWhere('autor', 'like', "%$search%")
                  ->orWhereHas('subcategoria', function($sub) use ($search) {
                      $sub->where('nome', 'like', "%$search%")
                          ->orWhereHas('categoria', function($cat) use ($search) {
                              $cat->where('nome', 'like', "%$search%");
                          });
                  });
            });
        }

        $materiais = $query->get();
        return view('books.index', compact('materiais'));
    }
}
