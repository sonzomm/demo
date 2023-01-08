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
        User::factory()->create([
            'name' => 'admin',
            'email' => '1',
            'password' => '1',
            'phone' => '0373281583',
            'gender' => '1',
            'birth' => '2022-01-01',
            'role' => '1',
        ]);
    }
}
