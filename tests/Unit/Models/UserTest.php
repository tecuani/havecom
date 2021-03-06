<?php

namespace Tests\Unit\Models;

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
    public function it_uses_traits()
    {
        $article = new User();

        $traits = collect(class_uses($article))->flatten()->toArray();

        $this->assertEquals([
            'Laravel\Sanctum\HasApiTokens',
            'Illuminate\Database\Eloquent\Factories\HasFactory',
            'Laravel\Jetstream\HasProfilePhoto',
            'Illuminate\Notifications\Notifiable',
            'Laravel\Fortify\TwoFactorAuthenticatable',
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
