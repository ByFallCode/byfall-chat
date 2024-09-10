<?php

namespace Database\Factories;

use App\Models\Entre;
use Illuminate\Database\Eloquent\Factories\Factory;

class EntreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Entre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->word,
        'motif' => $this->faker->text,
        'montant' => $this->faker->randomDigitNotNull,
        'date' => $this->faker->date('Y-m-d H:i:s'),
        'type_entre_id' => $this->faker->word,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
