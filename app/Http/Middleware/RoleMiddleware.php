<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $region = $request->route('region');
        $user = $request->user();
        $routeName = $request->route()->getName();
        $arRoute = explode(".",$routeName);
        $method = $arRoute[0];
        $menu = $arRoute[1];

        $perm = Permission::
                    where('role',$user->roles->id)
                  ->where('menu',$menu)
                  ->where('method',$method)->get();

                  return $next($request);

        abort(403, 'Unauthorized action.');
    }
}
