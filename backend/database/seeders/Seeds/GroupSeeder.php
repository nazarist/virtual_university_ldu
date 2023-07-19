<?php

namespace Database\Seeders\Seeds;

use App\Models\Group;
use Database\Factories\GroupFactory;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::factory(GroupFactory::getCountGroups()-1)->create();
    }
}
