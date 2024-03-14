<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $prefixes = ['African', 'American', 'Eurasian', 'Australian', 'Arctic', 'Tropical', 'Amazon', 'Pacific', 'Atlantic', 'Indian'];
        $roots = ['Elephant', 'Tiger', 'Lion', 'Giraffe', 'Zebra', 'Panda', 'Kangaroo', 'Koala', 'Gorilla', 'Hippopotamus'];
        $suffixes = ['Bear', 'Wolf', 'Leopard', 'Rhino', 'Cheetah', 'Jaguar', 'Crocodile', 'Penguin', 'Dolphin', 'Orangutan'];

        // Randomly select elements from prefixes, roots, and suffixes arrays
        $prefix = $this->faker->randomElement($prefixes);
        $root = $this->faker->randomElement($roots);
        $suffix = $this->faker->randomElement($suffixes);

        // Concatenate the elements to form the animal name
        $name = $prefix . ' ' . $root . ' ' . $suffix;

        return [
            'name' => $name,
            'spesies_id' => $this->faker->numberBetween(1, 6),
            'food' => $this->faker->word,
            'habitat' => $this->faker->word,
            'description' => $this->faker->sentence,
            'image' => null,
        ];
    }
}
