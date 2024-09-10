<?php

namespace Database\Factories;

use App\Models\MouvementCaisse;
use Illuminate\Database\Eloquent\Factories\Factory;

class MouvementCaisseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MouvementCaisse::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'entre_id' => $this->faker->word,
        'depense_id' => $this->faker->word,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
