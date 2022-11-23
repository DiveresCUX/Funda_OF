<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Hec Red';
        $user->email = 'hec@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole('admin');

        $user = new User();
        $user->name = 'Pedro Pablo';
        $user->email = 'pedropablo@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
        $user->assignRole('usuario');
    }
}
