<?php

namespace Database\Factories;

use App\Models\PaymentEmploye;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentEmployeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentEmploye::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employe_id' => $this->faker->word,
        'nombreJourParMois' => $this->faker->randomDigitNotNull,
        'paymentParJour' => $this->faker->randomDigitNotNull
        ];
    }
}
