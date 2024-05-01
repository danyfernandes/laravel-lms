<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
  public function show(string $id)
  {
    $course = Course::where('slug', $id)->first();

    $this->authorize('view', $course);

    $lessons = $course->lessons()->getResults();

    return view('student.courses.show', [
      'course' => $course,
      'lessons' => $lessons,
    ]);
  }
}
