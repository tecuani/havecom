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
        $admin = User::factory()
            ->has(Role::factory()->admin())
            ->create();;

        $this->actingAs($admin)
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

        $this->actingAs($noAdmin)
            ->get('/dashboard')
            ->assertRedirect('/');
    }

    /** @test */
    public function guests_can_see_6_service_cards()
    {
        $service = Service::factory()->times(7)->create()->first();

        $this->get('/')
            ->assertStatus(200)
            ->assertViewHas('services', fn ($services) => $services->count() === 6)
            ->assertSee($service->title)
            ->assertSee($service->imagePath)
            ->assertSee($service->cost / 100)
            ->assertSee($service->workTime);
    }

    /** @test */
    public function users_can_see_logged_home()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200)
            ->assertViewIs('home.logged')
            ->assertSee('¡Hola '.$user->name.'!')
            ->assertViewHas('services')
            ->assertViewHas('opinions');
    }

}
