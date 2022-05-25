<?php

namespace Database\Factories\Utilisateur;

use App\Models\Team;
use App\Models\Utilisateur\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastname(),
            'prenom' => $this->faker->firstname(),
            'email' => $this->faker->unique()->safeEmail(),
            'num_etudiant' => null,
            'nom_formation' => null,
            'role_id' => $this->faker->numberBetween($min=1, $max=4),
            'email_verified_at' => now(),
            'password' => '$2y$10$aPlFJrH.zzkHVizto2S7Zedut3jfoyQ/DGO9Jp220lqfC6WwY9tIq',
            'two_factor_secret' => null, 
            'two_factor_recovery_codes' => null,
            'remember_token' => null, 
            'current_team_id' => null, 
            'profile_photo_path' => null, 
            'created_at' => now(), 
            'updated_at' => now() 
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
