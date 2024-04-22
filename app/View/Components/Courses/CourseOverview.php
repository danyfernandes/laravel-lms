<?php

namespace App\View\Components\Courses;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CourseOverview extends Component
{
    public $course;
    public $lessons;
    public $durationInHours;

    /**
     * Create a new component instance.
     */
    public function __construct($course, $lessons)
    {
        $this->course = $course;
        $this->lessons = $lessons;
        $this->durationInHours = number_format((float)$course->duration / 60, 2, '.', '');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.courses.course-overview');
    }
}
