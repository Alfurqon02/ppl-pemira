<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PresidentCandidate;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PresidentCandidate>
 */
class PresidentCandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = PresidentCandidate::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'biography' => $this->faker->paragraphs(3, true),
        ];
    }
}
