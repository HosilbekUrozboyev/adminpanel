<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();

//        DB::table('users')->insert([
//           'name' => 'Admin',
//           'tel_raqam' => '+998 93 772 57 52',
//           'email' => 'admin@gmail.com',
//           'password' => Hash::make('admin'),
//           'rol' => Hash::make('0'),
//
//        ]);
    }
}
