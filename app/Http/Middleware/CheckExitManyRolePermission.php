<?php

namespace DHPT\Http\Middleware;

use Closure;

class CheckExitManyRolePermission
{
  public function handle($request, Closure $next, ...$permissions)
  {
  	$userRolePermissions = $request->user()->role->permissions;
  	$assignPermission = $permissions;
    foreach ($userRolePermissions as $permission) {
    	if (empty($assignPermission)) {
    		break;
    	}

    	$check = array_search('ded', $assignPermission);
    	
      if (!$check) {
        unset($assignPermission[$check]);
      }
    }

    dd($assignPermission);
    if ($assignPermission)
    	abort(404);

    return $next($request);    
  }
}
