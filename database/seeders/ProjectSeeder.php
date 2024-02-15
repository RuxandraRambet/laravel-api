<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        Project::truncate();

        for($i = 0; $i < 10; $i++) {
            
            $type = Type::inRandomOrder()->first();

            $project = new Project();
            
            $project->title = $faker->sentence(3);
            $project->description = $faker->text(500);
            $project->slug = Str::of($project->title)->slug('-');
            $project->type_id = $type->id;

            $project->save();

        }
    }
}