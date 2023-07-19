<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    private array $faculties = [
        [
            'name' => 'Навчально-науковий інститут пожежної та техногенної безпеки',
            'parse_no' => 1002
        ],
        [
            'name' => 'Навчально-науковий інститут цивільного захисту',
            'parse_no' => 1004
        ],
        [
            'name' => 'Ад`юнктура',
            'parse_no' => 1008
        ],
        [
            'name' => 'Навчально-науковий інститут психології та соціального захисту',
            'parse_no' => 1009
        ]
    ];
    public function definition(): array
    {
        $faculty = fake()->unique()->randomElement($this->faculties);

        return [
            'name' => $faculty['name'],
            'parse_no' => $faculty['parse_no']
        ];
    }
}
