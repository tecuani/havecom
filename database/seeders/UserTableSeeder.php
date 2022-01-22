<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'luis ramos',
            'email' => 'luisramos@thehiveteam.com',
        ];
        User::factory($user, ['password' => bcrypt('password')])->has(Role::factory()->administrator())->create();
    }
}
