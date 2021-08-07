<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = [
            'name' => 'prince',
            'email' => 'prince@yopmail.com',
            'password' => bcrypt('123123'),
            'role_id' => 1,
        ];
        User::firstOrCreate(['email' => $adminUser['email']],$adminUser);
    }
}
