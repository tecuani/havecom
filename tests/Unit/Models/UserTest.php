<?php

namespace Tests\Unit\Models;

use App\Models\Activation;
use App\Models\Contest;
use App\Models\Coupon;
use App\Models\Experience;
use App\Models\Reward;
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

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_know_if_it_is_admin()
    {
        $this->withoutExceptionHandling();
        $admin = new User;
        $admin->roles->push(['slug' => 'administrator']);

        $this->assertTrue($admin->isAdmin());
    }
}
