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

        // Contact types
        \App\Models\HfContactType::create([
            'name'=>'Contact No.'
        ]);
        \App\Models\HfContactType::create([
            'name'=>'Email'
        ]);
        \App\Models\HfContactType::create([
            'name'=>'Web'
        ]);

        //  Shelter Types
        \App\Models\HfShelter::create([
            'name' => 'Single-family Home'
        ]);
        \App\Models\HfShelter::create([
            'name' => 'Multifamily Home'
        ]);
        \App\Models\HfShelter::create([
            'name' => 'Apartment'
        ]);
        \App\Models\HfShelter::create([
            'name' => 'Townhouses'
        ]);
        \App\Models\HfShelter::create([
            'name' => 'Tiny Home '
        ]);
        \App\Models\HfShelter::create([
            'name' => 'Traditional House'
        ]);

        // Languages
        \App\Models\HfLanguage::create([
            'name' => 'English'
        ]);
        \App\Models\HfLanguage::create([
            'name' => 'Hindi'
        ]);
        \App\Models\HfLanguage::create([
            'name' => 'Urdu'
        ]);
        \App\Models\HfLanguage::create([
            'name' => 'Kannada'
        ]);
        \App\Models\HfLanguage::create([
            'name' => 'Tulu'
        ]);

        // Religions
        \App\Models\HfReligion::create([
            'name' => 'Islam'
        ]);
        \App\Models\HfReligion::create([
            'name' => 'Hinduism'
        ]);
        \App\Models\HfReligion::create([
            'name' => 'Christianity'
        ]);
    }
}
