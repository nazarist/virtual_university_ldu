<?php

namespace Database\Seeders\Seeds;

use App\Models\Faculty;
use App\Models\Group;
use Database\Factories\GroupFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
