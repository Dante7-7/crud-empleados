<?php

namespace Database\Factories;
use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->firstname(),
            'lastname' => fake()->lastname(),
            'fecha_de_nacimiento'=>fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'imagen' => $this->faker->imageUrl(640, 480, 'people', true, 'Faker'),
        ];
    }
}
