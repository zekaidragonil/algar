<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check() || !Auth::user()->hasRole($role)) {
            
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->hasRole('admin')) {
                    return redirect()->route('dashboard');
                } elseif ($user->hasRole('medico')) {
                    return redirect()->route('dashboardmedico');
                } elseif ($user->hasRole('paciente')) {
                    return redirect()->route('dashboardpaciente');
                }
            }
            return redirect()->route('login');
        }
        return $next($request);
    }
}
