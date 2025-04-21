<?php

namespace Database\Factories;

use App\Models\Filiere;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filiere>
 */
class FiliereFactory extends Factory
{
    protected $model = Filiere::class;

    public function definition(): array
    {
        return [
            'nomFiliere' => $this->faker->word(),
            'Niveau' => $this->faker->randomElement(['Licence', 'Master', 'Doctorat']),
            'ConditionsAdmission' => $this->faker->sentence(10),
        ];
    }
}
