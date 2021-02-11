<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@email.com',
            'password' => bcrypt("superadmin@123"),
            'role_id' => 1,
            'jamath_id' => 2,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt("admin@123"),
            'role_id' => 2,
            'jamath_id' => 2,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'editor',
            'email' => 'editor@email.com',
            'password' => bcrypt("editor@123"),
            'role_id' => 3,
            'jamath_id' => 1,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'guest',
            'email' => 'guest@email.com',
            'password' => bcrypt("guest@123"),
            'role_id' => 4,
            'jamath_id' => 1,
        ]);
        \App\Models\Roles::create([
            'name' => 'SA',
        ]);
        \App\Models\Roles::create([
            'name' => 'ADMIN',
        ]);
        \App\Models\Roles::create([
            'name' => 'EDITOR',
        ]);
        \App\Models\Roles::create([
            'name' => 'GUEST',
        ]);

        \App\Models\Jamath::create([
            'name' => 'jamath1',
            'address_id' => 1
        ]);

        \App\Models\Jamath::create([
            'name' => 'jamath2',
            'address_id' => 2
        ]);
        \App\Models\Address::create([
            'street' => 'street1'
        ]);
        \App\Models\Address::create([
            'street' => 'street2'
        ]);
    }
}
