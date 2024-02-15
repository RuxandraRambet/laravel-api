<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'PHP', 'Javascript', 'Vite', 'Vue', 'Bootstrap', 'Laravel', 'SCSS'];

        foreach($technologies as $technology) {
            $new_technology = new Technology();

            $new_technology->title = $technology;
            $new_technology->slug = Str::of($technology)->slug('-');
            
            $new_technology->save();      
        }
    }
}
