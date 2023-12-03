<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Paul Finch',
            'email' => 'finchy70@gmail.com',
            'password' => bcrypt('shandy70'),
            'admin' => true,
        ]);


         \App\Models\User::factory(100)->create();

    }
}
