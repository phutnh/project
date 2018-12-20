<?php

use Illuminate\Database\Seeder;
use DHPT\Models\Role;
use DHPT\Models\Permission;

class SampleDataTableSeeder extends Seeder
{
  public function run()
  {
    // Add sample role
    $roleAdministrator = Role::create([
      'name' => 'Administrator',
      'description' => 'Là người quản trị',
    ]);
    $roleUser = Role::create([
      'name' => 'User',
      'description' => 'Người dùng bình thường',
    ]);
    // Add sample role
    $permissionView = Permission::create([
      'name' => 'view',
      'description' => 'Có thể xem',
    ]);
    $permissionUpdate = Permission::create([
      'name' => 'update',
      'description' => 'Có thể update',
    ]);
    $permissionDelete = Permission::create([
      'name' => 'delete',
      'description' => 'Có thể xóa',
    ]);
    $permissionApprove = Permission::create([
      'name' => 'approve',
      'description' => 'Quyền approve',
    ]);
    // Add permission Administrator
    $roleAdministrator->permissions->save($permissionView);
    $roleAdministrator->permissions->save($permissionUpdate);
    $roleAdministrator->permissions->save($permissionDelete);
    $roleAdministrator->permissions->save($permissionApprove);
    // Add permission User
    $roleUser->permissions->save($permissionView);
    $roleUser->permissions->save($permissionUpdate);
  }
}
