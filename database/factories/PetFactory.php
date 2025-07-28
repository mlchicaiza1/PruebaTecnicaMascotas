<?php

namespace Database\Factories;

use App\Models\Person;
use App\Models\Pet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    protected $model = Pet::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $species = $this->faker->randomElement(['perro', 'gato']);
        $breeds = $species === 'perro' ? ['Labrador', 'Pug', 'Pastor Alemán'] :
                ['Siames', 'Persa', 'Maine Coon'];
        return [
            'name' => $this->faker->firstName,
            'species' => $species,
            'breed' => $this->faker->randomElement($breeds),
            'age' => $this->faker->numberBetween(1, 15),
            'person_id' => Person::factory(),
            'image_url' => null,
            'temperament' => null,
            'origin' => null,
        ];
    }
}
