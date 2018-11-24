<?php

namespace DHPT\Models;

use Illuminate\Database\Eloquent\Model;
use DHPT\Models\Permission;

class Role extends Model
{
  public function permissions()
  {
  	return $this->belongsToMany(Permission::class, 'role_permission');
  }
}
