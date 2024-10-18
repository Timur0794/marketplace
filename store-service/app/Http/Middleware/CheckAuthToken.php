<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckAuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'token not found'], 401);
        }

        $response = Http::withToken($token)->get("http://auth/api/user");

        if ($response->failed()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $request->attributes->add(['user' => $response->json()]);

        return $next($request);
    }
}
