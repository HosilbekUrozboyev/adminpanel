<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'phoneNumber' => '0',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
//        $user->assignRole('admin');

        $users = User::factory(10)->create();
//        foreach ($users as $user) {
//            $user->assignRole('admin');
//        }


    }
}
