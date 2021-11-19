<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewHomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_guest_home()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertViewIs('home.guest')
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
    public function can_see_6_service_cards()
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
}
