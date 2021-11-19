<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'slug' => Str::of($title)->slug(),
            'body' => $this->faker->text(100),
            'image' => $this->faker->filePath(),
            'cost' => $this->faker->randomNumber(5),
            'work_time' => $this->faker->randomNumber(2) . 'mins',
        ];
    }
}
