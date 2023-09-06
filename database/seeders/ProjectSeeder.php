<?php

namespace Database\Seeders;

use App\Models\Project;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $project = new Project();
            $project->name = $faker->text(20);
            $project->content = $faker->paragraphs(15, true);
            $project->slug = Str::slug($project->name, '-');
            $project->image = $faker->imageURL(250, 250);
            $project->save();
        }
    }
}
