<?php

namespace Database\Factories;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProgrammeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Programme::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jour' => $this->faker->randomDigitNotNull,
        'heureDebut' => $this->faker->word,
        'heureFin' => $this->faker->word,
        'description' => $this->faker->text,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
