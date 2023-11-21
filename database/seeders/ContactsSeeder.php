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
            ['contact' => 'info@dalgan.ru', 'type' => 3]
        ];

        foreach ($data as $item) {
            Contact::create($item);
        }
    }
}
