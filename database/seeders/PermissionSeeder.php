<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $permissions = [
            'user_index',
            'user_create',
            'user_store',
            'user_show',
            'user_edit',
            'user_update',
            'user_delete',
            'debt_index',
            'debt_create',
            'debt_store',
            'debt_show',
            'debt_edit',
            'debt_update',
            'payment_index',
            'payment_create',
            'payment_store',
            'payment_show',
        ];
        $user = User::first();
        $role_admin = Role::findByName('admin');
        $role_manager = Role::where('name', 'manager')->first();

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            $user->givePermissionTo($permission);
            $role_admin->givePermissionTo($permission);
            $role_manager->givePermissionTo($permission);
        }
//        $role_user = Role::findByName('user');
//        $role_user->givePermissionTo();
    }
}
