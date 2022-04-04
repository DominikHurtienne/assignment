<?php

declare(strict_types = 1);

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
    public function definition(): array
    {
        return [
            'title' => ucwords(implode(' ', $this->faker->words(2))),
            'price' => rand(1,200) * 5,
            'description' => $this->faker->text(100),
            'quantity' => rand(0,5),
        ];
    }
}
