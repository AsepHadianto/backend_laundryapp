<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_user()
    {
        $role = Role::factory()->create();

        $userData = [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'phone' => '08123456789',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'role_id' => $role->id,
        ];

        $user = User::create($userData);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('johndoe', $user->username);
        $this->assertEquals('08123456789', $user->phone);
        $this->assertEquals('johndoe@example.com', $user->email);
        $this->assertEquals($role->id, $user->role_id);
    }

    /** @test */
    public function it_can_access_role_relationship()
    {
        $role = Role::factory()->create();
        $user = User::factory()->create(['role_id' => $role->id]);

        $this->assertInstanceOf(Role::class, $user->role);
        $this->assertEquals($role->id, $user->role->id);
    }
}
