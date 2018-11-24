<?php

namespace DHPT\Http\Middleware;

use Closure;

class CheckRolePermission
{
    public function handle($request, Closure $next, ...$permissions)
    {
        foreach ($permissions as $permission) {
            if (! $request->user()->hasPermission($permission)) {
                return abort(404);
            }
        }

        return $next($request);
    }
}
