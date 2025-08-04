<?php
namespace App\Http\Middleware;
use App\Enums\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')
                ->with('error', 'Você precisa estar logado para acessar esta área.');
        }

        // Converter string para enum
        $requiredRole = Role::from($role);
        
        // Verificar se o usuário tem a role necessária
        if ($user->role !== $requiredRole) {
            abort(403, 'Acesso não autorizado para esta área.');
        }

        return $next($request);
    }
}

