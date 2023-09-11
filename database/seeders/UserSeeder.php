<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'document' => 1012385310,
            'name' => 'William Sotaquira',
            'email' => 'william.sotaquira@gmail.com',
            'password' => bcrypt('S0t4qu1r4.2022'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
