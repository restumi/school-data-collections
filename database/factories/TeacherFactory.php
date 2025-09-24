<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'mapel' => $this->faker->randomElement(['Bahasa Indonesia', 'Bahasa Inggris', 'Matematika']),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
        ];
    }
}
