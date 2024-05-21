<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Assuming you have a User model
use Maklad\Permission\Models\Role;
use Maklad\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
      // Create a permission
      $viewUsersPermission = Permission::create([
        'name' => 'all',
        'guard_name' => 'web', // Optional, depends on your configuration
      ]);

      // Create a role and assign permission
      $adminRole = Role::create([
        'name' => 'admin',
        'guard_name' => 'web', // Optional
      ]);

      $adminRole->givePermissionTo($viewUsersPermission);
      $viewUsersPermission->assignRole($adminRole);
      // Create a user and assign role
      $user = User::create([
        'name' => 'Admin User',
        'email' => 'admin@gmail.com', // Initial login email
        'password' => Hash::make('123456'), // Initial login password, hashed
        'is_admin_user' => 1,
        'status' => 1
      ]);

      $user->assignRole($adminRole); // Assigning role to the user
    }
}
