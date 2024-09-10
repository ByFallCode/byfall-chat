<?php

namespace Database\Factories;

use App\Models\EmployesMaterielsSortie;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployesMaterielsSortieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployesMaterielsSortie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employe_id' => $this->faker->word,
        'materiel_id' => $this->faker->word,
        'sortie_id' => $this->faker->word
        ];
    }
}
