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

        Message::query()->create([
            'title' => 'New Title.',
            'body' => 'Body',
            'user_id' => 1
        ]);

        Message::factory()->count(3)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
