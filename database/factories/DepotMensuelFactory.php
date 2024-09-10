<?php

namespace Database\Factories;

use App\Models\DepotMensuel;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepotMensuelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DepotMensuel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'montant' => $this->faker->word,
        'date' => $this->faker->date('Y-m-d H:i:s'),
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
