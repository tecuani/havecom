<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'category_id' => ProductCategory::first() ?? ProductCategory::factory()->create(),
            'title' => $title,
            'slug' => Str::of($title)->slug(),
            'body' => $this->faker->text(100),
            'image' => $this->faker->filePath(),
            'cost' => $this->faker->randomNumber(5),
        ];
    }
}
