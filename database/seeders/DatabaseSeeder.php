<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Admin
        $admin_user = User::factory()->create([
            'role' => User::ADMIN,
        ]);

        // Teacher
        $teacher_user = User::factory()->create([
            'role' => User::TEACHER,
        ]);

        $teacher = \App\Models\Teacher::factory()->create([
            'user_id' => $teacher_user->id,
        ]);

        // Course
        $course = \App\Models\Course::factory()->create([
            'teacher_id' => $teacher->id,
        ]);

        // Student
        $student_user = User::factory()->create([
            'role' => User::STUDENT,
        ]);

        \App\Models\Student::factory()->create([
            'user_id' => $student_user->id,
        ]);
    }
}
