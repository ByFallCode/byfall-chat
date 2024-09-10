<?php

namespace Database\Factories;

use App\Models\Sorty2;
use Illuminate\Database\Eloquent\Factories\Factory;

class Sorty2Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sorty2::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'motif' => $this->faker->text,
        'montant' => $this->faker->randomDigitNotNull,
        'type_sortie_id' => $this->faker->word,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
