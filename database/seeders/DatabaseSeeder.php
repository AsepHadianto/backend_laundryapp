<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create(['role_name' => 'Admin']);
        Role::factory()->create(['role_name' => 'Staff']);

        // Seed users using UserFactory
        User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->count(10)->create(); // Contoh membuat 10 user lainnya
    }
}
