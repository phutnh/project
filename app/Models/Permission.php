<?php

namespace DHPT\Models;

use Illuminate\Database\Eloquent\Model;
use DHPT\Models\Role;

class Permission extends Model
{
  public function roles()
  {
  	return $this->belongsToMany(Role::class, 'role_permission');
  }
}
