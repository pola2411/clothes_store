<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=Categories::class;

    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'image' => $this->faker->word.'.jpg',
            'parent_id' => null,

        ];
    }
}
