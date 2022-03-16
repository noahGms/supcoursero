<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::create([
            'name' => 'root',
            'email' => 'root@dev.com',
            'is_god' => true,
            'is_admin' => true,
            'password' => env('ROOT_PASSWORD', 'root')
        ]);
    }
}
