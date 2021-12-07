<?php

namespace Tests\Unit\Models;

use App\Models\Activation;
use App\Models\Contest;
use App\Models\Coupon;
use App\Models\Experience;
use App\Models\Reward;
use App\Models\Role;
use App\Models\Subscription;
use App\Models\Ticket;
use App\Models\Traits\Reservable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_uses_traits()
    {
        $article = new Role();

        $traits = collect(class_uses($article))->flatten()->toArray();

        $this->assertEquals([
            'Illuminate\Database\Eloquent\Factories\HasFactory',
            'App\Models\Traits\Sluggable',
        ], $traits);
    }

    /** @test */
    public function can_know_if_it_is_admin()
    {
        $this->withoutExceptionHandling();
        $admin = new User;
        $admin->roles->push(['slug' => 'administrator']);

        $this->assertTrue($admin->isAdmin());
    }
}
