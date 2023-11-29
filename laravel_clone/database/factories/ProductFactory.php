<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years');
        return [
            //
            'p_name' => '상품명'.$this->faker->randomNumber(1)
            ,'p_content'  => $this->faker->realText(255)
            ,'p_price'  => $this->faker->randomNumber(5)
            ,'created_at'  => $date
            ,'updated_at'  => $date
        ];
    }
}
