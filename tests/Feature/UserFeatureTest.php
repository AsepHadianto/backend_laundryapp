<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Role;
// use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {

        $role = Role::factory()->create();

        $response = $this->postJson('/api/users', [
            'name' => 'john',
            'username' => 'johndoe',
            'phone' => '082180809080',
            'email' => 'johndoe@example.com',
            'password' => 'rahasia',
            'role_id' => $role->id
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'data' => [
                    'username' => 'johndoe',
                    'email' => 'johndoe@example.com'
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'username' => 'johndoe'
        ]);
    }

    /** @test */
    public function it_can_list_users()
    {
        User::factory()->create([
            'name' => 'john',
            'username' => 'johndoe',
            'phone' => '082180809080',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('rahasia'),
        ]);

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id', 'name', 'username', 'phone', 'email', 'role_id',
                    ]
                ]
            ]);
    }
}
