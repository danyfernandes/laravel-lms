<?php

namespace App\Http\Controllers;

use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::where('status', 'enabled')->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::where('slug', $id)->first();
        $lessons = $course->lessons()->get();

        if ($course->status !== 'enabled') {
            abort(404);
        }

        return view('courses.show', [
            'course' => Course::where('slug', $id)->first(),
            'lessons' => $lessons,
        ]);
    }
}
