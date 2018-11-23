<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Role;
use App\Models\Permission;

class User extends Authenticatable
{
  use Notifiable;

  protected $fillable = [
    'name', 'email', 'password',
  ];

  protected $hidden = [
    'password', 'remember_token',
  ];

  public function role()
  {
  	return $this->belongsTo(Role::class);
  }

  public function hasPermission(Permission $permission)
  {
    $role = $this->role();
    $bool = $role->whereHas('permissions', function($query) use ($permission) {
      $query->where('permissions.name', $permission->name);
    })->first();
    
    return !!$bool;
  }
}
