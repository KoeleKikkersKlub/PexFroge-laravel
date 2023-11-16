<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Docent::factory()->create([
            'user_id' => 11,
        ]);

        \App\Models\Student::factory()->create([
            'user_id' => 12,
        ]);

        \App\Models\Traject::factory()->create([
            'student_id' => 12,
            'bedrijf_id' => 1,
            'docent_id' => 11,
            'progress' => 25,
        ]);

    }
}
