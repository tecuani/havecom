<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewPagesTest extends TestCase
{
    /** @test */
    public function can_view_privacy_policy_page()
    {
        $this->get(route('pages.policy'))
            ->assertSuccessful()
            ->assertViewIs('pages.policy')
            ->assertSeeText('Aviso de Privacidad');
    }

    /** @test */
    public function guests_can_see_the_consultancy_page()
    {
        $this->get(route('pages.consultancy'))
            ->assertViewIs('pages.consultancy')
            ->assertSeeInOrder(['Consultoría HAVECOM', 'Control de Calidad', 'Mejora Continua'])
            ->assertSuccessful();
    }

    /** @test */
    public function guests_can_see_the_about_us_page()
    {
        $this->withoutExceptionHandling();
        $this->get(route('pages.about_us'))
            ->assertViewIs('pages.about_us')
            ->assertSeeInOrder(['La calidad es nuestra prioridad', 'Unidades Móviles', 'Nosotros', 'Nuestro Servicio'])
            ->assertSuccessful();
    }
}
