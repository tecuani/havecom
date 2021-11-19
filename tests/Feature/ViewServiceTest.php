<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ViewServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_see_services_index()
    {
        $this->withExceptionHandling();
        $service = Service::factory()->times(7)->create()->first();

        $this->get('/servicios')
            ->assertStatus(200)
            ->assertViewIs('services.index')
            ->assertViewHas('services', fn ($services) => $services->count() === 6)
            ->assertSee($service->title)
            ->assertSee($service->imagePath)
            ->assertSee($service->cost/100)
            ->assertSee($service->workTime);
    }

    /** @test */
    public function can_see_services_show()
    {
        $this->withExceptionHandling();
        $service = Service::factory()->create([
            'title' => 'Some title',
            'slug' => 'some-title',
            'body' => 'Some description',
            'image' => 'image_name',
            'cost' => '75400',
            'work_time' => '40 mins',
        ]);

        $this->get("/servicios/{$service->slug}")
            ->assertSuccessful()
            ->assertViewIs('services.show')
            ->assertSee($service->title)
            ->assertSee($service->imagePath)
            ->assertSee('$754')
            ->assertSee($service->workTime);
    }
}
