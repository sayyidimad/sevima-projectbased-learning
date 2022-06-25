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
        $admin = User::factory()->create([
            'role' => User::ADMIN,
        ]);

        // Teacher
        $teacher = User::factory()->create([
            'role' => User::TEACHER,
        ]);

        \App\Models\Teacher::factory()->create([
            'user_id' => $teacher->id,
        ]);

        // Student
        $student = User::factory()->create([
            'role' => User::STUDENT,
        ]);

        \App\Models\Student::factory()->create([
            'user_id' => $teacher->id,
        ]);

    }
}
