<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'name' => $this->faker->firstNameMale,
            'price' => $this->faker->numberBetween(100000, 1000000),
            'desc' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'image' => '/storage/images/product.jpg'
        ];
    }
}
