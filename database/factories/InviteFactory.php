<?php

namespace Database\Factories;

use App\Models\Invite;
use Illuminate\Database\Eloquent\Factories\Factory;

class InviteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invite::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cni' => $this->faker->word,
        'nom' => $this->faker->word,
        'prenom' => $this->faker->word,
        'situation_matrimoniale' => $this->faker->word,
        'email' => $this->faker->word,
        'telephone' => $this->faker->word,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
