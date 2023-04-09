<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
class Account
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
        if (auth('acc')->check()) {
            return $next($request);
        }

        return redirect()->route('home.login')->with('no','Hãy đăng nhập để tiếp tục chức năng này');
    }
}
