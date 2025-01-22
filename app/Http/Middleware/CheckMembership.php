<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log; // method bawaan laravel
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->membership) {
            return redirect('/pricing');
        }

        Log::info('Before Request:', [ // bisa dijalankan sebelum
            'url'=> $request->url(),
            'params' => $request->all(),
        ]);

        $response = $next($request);

        sleep(2);

        Log::info('After Request', [ // bisa dijalankan sesudah
            'status' => $response->getStatusCode(),
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
