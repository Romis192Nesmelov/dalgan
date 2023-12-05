<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        Content::factory(3)->create();
        $this->call(ContentSeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
