<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->sentence(3), 
        // Génère un faux paragraphe de description
        'description' => fake()->paragraph(), 
        // Génère une date aléatoire entre aujourd'hui et dans 6 mois
        'event_date' => fake()->dateTimeBetween('now', '+6 months'), 
        // Une capacité de salle entre 50 et 300 places
        'capacity' => fake()->numberBetween(50, 300), 
    ];
}
}
