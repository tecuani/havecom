<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewHomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_can_see_index_home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('home.index')
            ->assertSeeInOrder([
                'INICIO',
                'PRODUCTOS',
                'CONSULTORÍA',
                'ORDEN DE SERVICIO',
                'NOSOTROS',
                'Bienvenido a Havecom México',
                'El mejor servicio esta aquí',
                'Agenda tu servicio',
                'Nuestros Clientes Opinan',
                'Conéctate con Nosotros',
                'Regístrate',
            ])
            ->assertViewHas('services')
            ->assertViewHas('opinions');
    }

    /** @test */
    public function guests_cant_see_logged_home()
    {
        $this->get('/')
            ->assertDontSee('¡Hola ');
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

    /** @test */
    public function admins_can_see_the_dashboard()
    {
        $admin = User::factory()->state('administrator')->create();

        $this->actingAs($admin)
            ->get('/dashboard')
            ->assertStatus(200)
            ->assertViewIs('auth.dashboard');
    }
}
