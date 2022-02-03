<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TelegramSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $secret = env('X_SECRET_TG_HASH');

        if($secret && $secret === $request->header('HTTP-X-SECRET-TG-HASH')) {
            return $next($request);
        }

        return response()->json(['success' => false, 'message' => 'secret hash does not match']);
    }
}
