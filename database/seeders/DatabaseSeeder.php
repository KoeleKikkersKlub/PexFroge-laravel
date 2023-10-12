<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ContactGegevens;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();
         \App\Models\ContactGegevens::factory(10)->create();

         \App\Models\User::factory()->create([
             'cg_id' => 11,
             'email' => 'developer@alfa-college.nl',
             'email_verified_at' => now(),
             'password' => bcrypt('12345678'), // password
             'activated' => 1,
             'remember_token' => Str::random(10),
         ]);

         \App\Models\ContactGegevens::factory()->create([
             'voornaam' => 'Peter',
             'achternaam' => 'Benninga',
             'contactemail' => 'p.benninga@student.alfa-college.nl',
             'telefoonnummer' => '0647136851',
             'adres' => 'Teststraat 44',
             'plaats' => 'Assen',
             'postcode' => '9406RX'
         ]);
    }
}
