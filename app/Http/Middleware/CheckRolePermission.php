<?php

namespace App\Http\Middleware;

use Closure;

class CheckRolePermission
{
    public function handle($request, Closure $next, ...$permissions)
    {
        foreach ($permissions as $permission) {
            if (! $request->user()->hasPermission($permission)) {
                // abort(404);
                echo "cannot";
            }
        }

        return $next($request);
    }
}
