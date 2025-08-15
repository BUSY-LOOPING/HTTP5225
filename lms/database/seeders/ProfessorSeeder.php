<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        Professor::create([
            'name' => 'Dr. John Smith',
            'email' => 'john.smith@university.edu',
            'department' => 'Computer Science'
        ]);

        Professor::create([
            'name' => 'Dr. Jane Doe',
            'email' => 'jane.doe@university.edu',
            'department' => 'Mathematics'
        ]);

        Professor::create([
            'name' => 'Dr. Mike Johnson',
            'email' => 'mike.johnson@university.edu',
            'department' => 'Physics'
        ]);

        Professor::create([
            'name' => 'Dr. Sarah Wilson',
            'email' => 'sarah.wilson@university.edu',
            'department' => 'Chemistry'
        ]);
    }
}
