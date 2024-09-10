<?php

namespace Database\Factories;

use App\Models\Tournage;
use Illuminate\Database\Eloquent\Factories\Factory;

class TournageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date('Y-m-d H:i:s'),
        'description' => $this->faker->text,
        'emission_id' => $this->faker->word,
        'type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
