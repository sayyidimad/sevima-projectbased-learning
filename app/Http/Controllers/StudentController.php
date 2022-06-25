<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function course()
    {
        $courses = Course::all();

        return view('student.index', ['menu' => 'course', 'courses' => $courses]);
    }

    public function event(Course $course)
    {
        return view('student.show', ['menu' => 'course', 'course' => $course]);
    }

    public function single(Event $event)
    {
        $course = $event->course;

        return view('student.single', ['menu' => 'course', 'course' => $course, 'event' => $event]);
    }
}
