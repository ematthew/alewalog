<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\User;
use App\Models\MenuRole;
use App\Models\Menu;
use Auth;


class MenuAccessMiddleware
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
        if(Auth::check()){
            $route = str_replace(".index", "", $request->route()->getName());
            $user_role_ids = UserRole::where('user_id', auth()->user()->id)->get()->pluck('role_id');
            $menu = Menu::where('route', $route)->first();
            if($menu !== null){

                $menu_role = MenuRole::whereIn('role_id', $user_role_ids)->where('menu_id', $menu->id)->first();
                if($menu_role == null){
                    return redirect('unauthorized');
                }
            }
        }
        return $next($request);
    }
}
