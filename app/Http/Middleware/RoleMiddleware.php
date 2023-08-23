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
        $method = $request->route()->getActionMethod();
        $uri = explode('/',$request->route()->uri());
        $menu = $uri[0];
        if ($user->regions->contains($region) && $user->roles->intersect($region->roles)->isNotEmpty()) {
            $perm = Permission::
                    where('role',$user->roles->id)
                  ->where('menu',$menu)
                  ->where('method',$method);
            if (!empty($perm)) {
                return $next($request);
            }
            abort(403, 'Unauthorized action.');
        }
        abort(403, 'Unauthorized action.');
    }
}
