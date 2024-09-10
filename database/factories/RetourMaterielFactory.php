<?php

namespace Database\Factories;

use App\Models\RetourMateriel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RetourMaterielFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RetourMateriel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date_retour' => $this->faker->word,
        'observations' => $this->faker->text,
        'employes_materiels_sortie_id' => $this->faker->word,
        'user_created' => $this->faker->word,
        'user_modified' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
