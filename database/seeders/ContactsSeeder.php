<?php

namespace Database\Seeders;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['contact' => '125167, г.Москва, 4-я улица 8 Марта, 6А', 'type' => 1],
            ['contact' => '+7(926)333-22-11', 'type' => 2],
            ['contact' => 'info@dalgan.ru', 'type' => 3],
            ['contact' => '<iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A494d4918b5327da378c10b8e5968876458ce5f08c659454243c84813ba582a00&amp;source=constructor" width="100%" height="600" frameborder="0"></iframe>', 'type' => 4],
        ];

        foreach ($data as $item) {
            Contact::create($item);
        }
    }
}
