<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $professors = Professor::all();

        Course::create([
            'name' => 'Web Development',
            'code' => 'CS101',
            'description' => 'Introduction to web development with HTML, CSS, and JavaScript',
            'credits' => 3,
            'professor_id' => $professors[0]->id
        ]);

        Course::create([
            'name' => 'Database Systems',
            'code' => 'CS201',
            'description' => 'Database design and management systems',
            'credits' => 4,
            'professor_id' => $professors[1]->id
        ]);

        Course::create([
            'name' => 'Calculus I',
            'code' => 'MATH101',
            'description' => 'Introduction to differential and integral calculus',
            'credits' => 4,
            'professor_id' => $professors[2]->id
        ]);

        Course::create([
            'name' => 'General Chemistry',
            'code' => 'CHEM101',
            'description' => 'Fundamental principles of chemistry',
            'credits' => 3,
            'professor_id' => $professors[3]->id
        ]);
    }
}
