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
        \App\Models\HfUser::factory()->create([
            'name' => 'superadmin',
            'email' => 'superadmin@email.com',
            'password' => bcrypt("superadmin@123"),
            'role_id' => 1,
            'jamath_id' => 2,
            'parent_id' => 0,
            ]);
        \App\Models\HfUser::factory()->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt("admin@123"),
            'role_id' => 2,
            'jamath_id' => 2,
            'parent_id' => 1,
        ]);
        \App\Models\HfUser::factory()->create([
            'name' => 'editor',
            'email' => 'editor@email.com',
            'password' => bcrypt("editor@123"),
            'role_id' => 3,
            'jamath_id' => 1,
            'parent_id' => 1,
        ]);
        \App\Models\HfUser::factory()->create([
            'name' => 'guest',
            'email' => 'guest@email.com',
            'password' => bcrypt("guest@123"),
            'role_id' => 4,
            'jamath_id' => 1,
            'parent_id' => 1,
        ]);
        \App\Models\HfRole::create([
            'name' => 'SA',
        ]);
        \App\Models\HfRole::create([
            'name' => 'ADMIN',
        ]);
        \App\Models\HfRole::create([
            'name' => 'EDITOR',
        ]);
        \App\Models\HfRole::create([
            'name' => 'GUEST',
        ]);

        \App\Models\HfJamath::create([
            'name' => 'jamath1',
            'address_id' => 1
        ]);

        \App\Models\HfJamath::create([
            'name' => 'jamath2',
            'address_id' => 2
        ]);
        \App\Models\HfAddress::create([
            'street' => 'street1'
        ]);
        \App\Models\HfAddress::create([
            'street' => 'street2'
        ]);
    }
}
