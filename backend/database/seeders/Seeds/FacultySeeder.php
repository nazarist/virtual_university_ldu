<?php

namespace Database\Seeders\Seeds;

use App\Models\Faculty\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faculty::factory(4)->create();
    }
}
