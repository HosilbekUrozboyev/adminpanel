<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('roles')->insert([
//           ['name' => 'Admin'],
//            ['name' => 'Manager'],
//            ['name' => 'User'],
//        ]);

        Role::create(['name'=>'admin', 'guard_name'=>'web']);
        Role::create(['name'=>'manager', 'guard_name'=>'web']);
        Role::create(['name'=>'user', 'guard_name'=>'web']);
    }
}
