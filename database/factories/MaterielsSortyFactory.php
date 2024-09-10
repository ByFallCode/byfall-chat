<?php

namespace Database\Factories;

use App\Models\MaterielsSorty;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaterielsSortyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaterielsSorty::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'materiel_id' => $this->faker->word,
        'sortie_id' => $this->faker->word
        ];
    }
}
