<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content>
 */
class ContentFactory extends Factory
{
    private static $counter = -1;
    private $options = [
        ['slug' => null, 'head' => 'Далган'],
        ['slug' => 'description', 'head' => 'Описание'],
        ['slug' => 'structure', 'head' => 'Структура'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        self::$counter++;
        $text = '';

        if (self::$counter === 0) {
            for ($i=0;$i<5;$i++) {
                $text .= '<p>'.fake()->text(rand(200,1000)).'</p>';
            }
        } else {
            for ($i=0;$i<rand(10,15);$i++) {
                $text .= '<p>'.fake()->text(rand(200,1000)).'</p>';
            }
        }

        return [
            'slug' => $this->options[self::$counter]['slug'],
            'head' => $this->options[self::$counter]['head'],
            'text' => $text
        ];
    }
}
