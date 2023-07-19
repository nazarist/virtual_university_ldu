<?php

namespace Database\Seeders\Seeds;

use App\Models\Faculty;
use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        Faculty::factory(4)->create();
    }
}
