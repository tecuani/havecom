<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewPageTest extends TestCase
{
    /** @test */
    public function can_view_privacy_policy_page()
    {
        $this->withoutExceptionHandling();
        $this->get(route('pages.policy'))
            ->assertSuccessful()
            ->assertViewIs('pages.policy')
            ->assertSeeText('Aviso de Privacidad');
    }
}
