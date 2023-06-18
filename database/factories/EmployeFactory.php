<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
require_once 'vendor/autoload.php';
// require_once '/path/to/Faker/src/autoload.php';

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_employe' => $this->faker->unique()->numberBetween(100, 1000),
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'tel' => $this->faker->e164PhoneNumber(),
            'adresse' => $this->faker->address(),
            'date_naissance' => $this->faker->dateTimeBetween(),
            'date_embauche' => $this->faker->dateTimeThisYear(),
            'poste' => $this->faker->word(),
            'conge' => 30,
            'salaire' => $this->faker->numberBetween(4000, 10000),
        ];
    }
}
