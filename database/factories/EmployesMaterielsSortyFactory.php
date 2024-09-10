<?php

namespace Database\Factories;

use App\Models\EmployesMaterielsSorty;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployesMaterielsSortyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployesMaterielsSorty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materiels_sortie_id' => $this->faker->word,
        'employe_id' => $this->faker->word
        ];
    }
}
