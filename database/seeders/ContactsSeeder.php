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
            ['contact' => '%3Ac304a665d6d483a73c355d68e2ba153bd83d4be0dc9af5e90c8e93ce77893607&amp;source=constructor', 'type' => 4],
        ];

        foreach ($data as $item) {
            Contact::create($item);
        }
    }
}
