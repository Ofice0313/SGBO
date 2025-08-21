<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        // Busca logs agrupados por usuário e conta tentativas
        $logs = Log::select('user_id')
            ->selectRaw('COUNT(*) as tentativas')
            ->groupBy('user_id')
            ->with('user')
            ->get();

        return view('admin.logs.index', compact('logs'));
    }
}
