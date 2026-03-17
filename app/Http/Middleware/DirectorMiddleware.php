<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;
// use Symfony\Component\HttpFoundation\Response;
// use Illuminate\Support\Facades\Log;  

// class DirectorMiddleware
// {
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (auth()->check() && auth()->user()->isDirector()) {
    //         return $next($request);
    //     }

    //     return redirect('/')->with('error', 'Acesso não autorizado para diretores');
    // }
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (auth()->check()) {
    //         $user = auth()->user();
    //         Log::debug('User check:', [
    //             'authenticated' => auth()->check(),
    //             'user_role' => $user->role,
    //             'isDirector' => method_exists($user, 'isDirector') ? $user->isDirector() : 'method_missing'
    //         ]);
            
    //         if ($user->isDirector()) {
    //             return $next($request);
    //         }
    //     }
    
    //     return redirect('/')->with('error', 'Acesso não autorizado para diretores');
    // }
// }