<?php

namespace Database\Seeders;

use App\Models\Project;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Project::factory(20)->create();
    }
}
