<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
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
        if(Auth::check())
        {
            $role = DB::table('roles')->where('id_user_role', '=', Auth::id())->value('role');
        }
        else{
            $role = 'user';
        }

        if($role == 'admin')
        {
            return $next($request);
        }
        else
        {
            return redirect()->route('auth_home', ['role' => $role])->with('success', 'У Вас нет прав админа!');
        }
    }
}
