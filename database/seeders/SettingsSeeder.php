<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Content;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Content::select('id','head')->get();
        foreach ($contents as $content) {
            Setting::create([
                'title' => $content->head,
                'content_id' => $content->id
            ]);
        }
    }
}
