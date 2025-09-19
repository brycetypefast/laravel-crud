<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Bryce',
            'email' => 'brycewoj@gmail.com',
            'password' => 'test',
        ]);

        User::factory()->create([
            'name' => 'Nic',
            'email' => 'nic@nic.com',
            'password' => 'nic',
        ]);

        User::factory()->create([
            'name' => 'Sandy',
            'email' => 'sandy@sandy.com',
            'password' => 'sandy',
        ]);

        Book::factory(10)->create();

        /*
        Book::factory()->create([
            'name' => "One Flew Over the Cuckoo's Nest",
            'author' => 'Ken Kesey',
        ]);

        */
    }
}
