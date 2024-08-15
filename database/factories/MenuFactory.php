<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Menu;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'slug' => Str::slug($this->faker->word()),
            'parent_id' => $this->faker->numberBetween(1, 10),
            'order' => $this->faker->numberBetween(1, 10),
        ];
    }
}
