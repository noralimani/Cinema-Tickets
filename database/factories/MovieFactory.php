<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->catchPhrase,
        'image' => "cyberpunk.jpg",
        'director' => $this->faker->name(),
        'age' => 15,
        'year'=> $this->faker->date(),
        'release_date' => $this->faker->date(),
        'price' => 500,
        'description' => $this->faker->text()
        ];
    }
}
