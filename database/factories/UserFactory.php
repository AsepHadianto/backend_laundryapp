<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;

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
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // default password 'password', bisa diganti sesuai kebutuhan
            'role_id' => Role::inRandomOrder()->first()->id ?? Role::factory()->create()->id, // sesuaikan dengan role_id default yang sesuai
            // tambahkan atribut lainnya sesuai kebutuhan
        ];
    }
}
