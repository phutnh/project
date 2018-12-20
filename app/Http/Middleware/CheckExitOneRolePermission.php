<?php

namespace DHPT\Http\Middleware;

use Closure;

class CheckExitOneRolePermission
{
  public function handle($request, Closure $next, ...$permissions)
  {
    foreach ($permissions as $permission) {
      if ($request->user()->hasPermission($permission)) {
        return $next($request);
      }
    }
    return abort(404);
  }
}
