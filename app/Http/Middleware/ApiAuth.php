<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Verificar si el encabezado Authorization está presente y tiene el valor correcto
        if ($request->header('x-auth') !== '1234') {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
