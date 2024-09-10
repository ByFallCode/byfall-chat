<?php

namespace Database\Factories;

use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->word,
        'cni' => $this->faker->word,
        'nom' => $this->faker->word,
        'prenom' => $this->faker->word,
        'adresse' => $this->faker->word,
        'situation_matrimoniale' => $this->faker->word,
        'email' => $this->faker->word,
        'telephone' => $this->faker->word,
        'fonction_employe_id' => $this->faker->word,
        'date_adhesion' => $this->faker->date('Y-m-d H:i:s'),
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
