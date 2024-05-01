<?php

namespace App\View\Components\Student;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LessonLayout extends Component
{
  public $course;
  public $lessons;
  public $percentCourseCompleted;
  public $nbLessonsCompleted;
  public $showCongratulations;

  /**
   * Create a new component instance.
   */
  public function __construct($course, $lessons, $percentCourseCompleted = 0, $nbLessonsCompleted = 0, $showCongratulations = false)
  {
    $this->course = $course;
    $this->lessons = $lessons;
    $this->percentCourseCompleted = $percentCourseCompleted;
    $this->nbLessonsCompleted = $nbLessonsCompleted;
    $this->showCongratulations = $showCongratulations;
  }

  /**
   * Get the view / contents that represent the component.
   */
  public function render(): View|Closure|string
  {
    return view('layouts.student.lesson-layout');
  }
}
