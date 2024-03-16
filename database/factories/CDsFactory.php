<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CDs>
 */
class CDsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function genres(): string
    {
        $genres = ['pop', 'rock', 'classical', 'jazz', 'reggae'];
        $randomIndex = array_rand($genres);
        return $genres[$randomIndex];
    }

    function fakeMusicTitle(): string {
        $adjectives = ['Beautiful', 'Ethereal', 'Mystical', 'Radiant', 'Soothing', 'Enchanting', 'Melancholic', 'Serene'];
        $nouns = ['Dream', 'Echo', 'Whisper', 'Sunset', 'Moonlight', 'Cascade', 'Harmony', 'Serenade'];
        $randomAdjective = $adjectives[array_rand($adjectives)];
        $randomNoun = $nouns[array_rand($nouns)];
        return $randomAdjective . ' ' . $randomNoun;
    }

    public function definition(): array
    {
        return [
            'title' => $this->fakeMusicTitle(),
            'artist' => fake()->userName(),
            'genre' => $this->genres(),
            'release_year' => fake()->year(),
            'quantity' => rand(50, 500)
        ];
    }
}
