<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admins_can_see_dashboard()
    {
        $user = User::factory()->has(Role::factory()->administrator())->create();
        $this->assertTrue($user->isAdministrator());

        $this->actingAs($user)
            ->get('/dashboard')
            ->assertOk()
            ->assertViewIs('admin.dashboard')
            ->assertSee('Dashboard');
    }

    /** @test */
    public function guest_cant_see_dashboard()
    {
        $this->get('/dashboard')
            ->assertRedirect('/login');
    }

    /** @test */
    public function no_admin_users_cant_see_dashboard()
    {
        $noAdmin = User::factory()->create();
        $this->assertFalse($noAdmin->isAdministrator());

        $this->actingAs($noAdmin)
            ->get('/dashboard')
            ->assertForbidden();
    }
}
