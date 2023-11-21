<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slide;
use App\Models\Content;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Content::factory(2)->create();
        $this->call(ContactsSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
