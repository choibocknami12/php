<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
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
        $randomImg = [
            'https://picsum.photos/id/237/200/300'
            ,'https://picsum.photos/seed/picsum/200/300'
            ,'https://picsum.photos/200/300?grayscale'
            ,'https://picsum.photos/200/300/?blur'
            ,'https://picsum.photos/id/870/200/300?grayscale&blur=2'
        ];

        return [
            //
            'p_name' => '상품명'.$this->faker->randomNumber(1)
            ,'p_content'  => $this->faker->realText(255)
            ,'p_price'  => $this->faker->randomNumber(5)
            ,'p_img' => $randomImg[rand(0, 4)]
            ,'created_at'  => $date
            ,'updated_at'  => $date
        ];
    }
}
