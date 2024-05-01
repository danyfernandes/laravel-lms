<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
  public function show(string $courseSlug, string $id)
  {
    $course = Course::where('slug', $courseSlug)->first();

    $lessons = $course->lessons()->getResults();
    $lesson = $lessons->find($id);

    $this->authorize('view', $lesson);

    // Explode to have reference to previous lesson when it is the action "complete_and_continue"
    // ?action=complete_and_continue%2C+31
    // It will pass the actual action performed and the ID of the previous lesson to update the pivot 
    // for the previous lesson and NOT the actual that is showed!
    $currentLesson = $this->processButtonActions($lessons, $lesson);

    // Create data to send to view
    $data = [];
    array_push($data, $course);
    $data[0]['lessons'] = $lessons;
    $data[0]['lesson'] = $currentLesson;
    $this->getLessonsCompleted($data);
    /** @var \App\Models\User $user */
    $user = Auth::user();
    $data[0]['lessonCompleted'] = $user->lessons()->where('lesson_id', $currentLesson->id)->first()->pivot->completed;

    // Calculate complete percent of the course
    $this->calculateCompletedCoursePercent($data);

    // Check if congratulations modal message should be displayed
    $data[0]['showCongratulations'] = $this->displayCongratulations($data[0]['percentCompleted'], $course);

    return view('student.lessons.show', [
      'data' => $data,
    ]);
  }

  private function getLessonsCompleted($data)
  {
    foreach ($data[0]['lessons'] as $key => $value) {
      /** @var \App\Models\User $user */
      $user = Auth::user();
      $data[0]['lessons'][$key]['completed'] = $user->lessons()->find($value->id)->pivot->completed;
    }
  }

  private function calculateCompletedCoursePercent($data)
  {
    $nbLessons = count($data[0]['lessons']);
    $percentCompleted = 0;
    $nbLessonsCompleted = 0;
    if ($nbLessons > 0) {
      /** @var \App\Models\User $user */
      $user = Auth::user();
      $nbLessonsCompleted = count($user->lessons()->where('course_id', $data[0]->id)->where('completed', true)->getResults());

      $percentCompleted = ($nbLessonsCompleted / $nbLessons) * 100;
    }

    $data[0]->users()->updateExistingPivot(Auth::user()->id, [
      'percent' => (int) $percentCompleted,
    ]);

    $data[0]['percentCompleted'] = (int) $percentCompleted;
    $data[0]['nbLessonsCompleted'] = $nbLessonsCompleted;
  }

  private function displayCongratulations($percentCourseCompleted, $course)
  {
    $action = explode(',', request()->input('action'));

    if ($action[0] === 'complete_and_continue' && $percentCourseCompleted === 100) {
      // Check if the user has already written a review
      $review = Review::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();

      return is_null($review);
    }

    return false;
  }

  private function processButtonActions($lessons, $lesson)
  {
    $currentLesson = $lesson;
    $action = explode(',', request()->input('action'));

    switch ($action[0]) {
        // Mark Incomplete action - Will only set completed at false in the lesson_user pivot table
      case 'mark_incomplete':
        $lesson->users()->updateExistingPivot(Auth::user()->id, [
          'completed' => false,
        ]);
        break;

        // Continue action - Will only go to next lesson if it is not the last lesson of the course
      case 'continue':
        if (!is_null($lesson->next_lesson)) {
          $currentLesson = Lesson::find($lesson->id);
        }
        break;

        // Complete and Continue action - 
        // Will get the previous lesson ID, in order to update the lesson_user pivot table
      case 'complete_and_continue':
        $previousLessonId = $action[1];

        // If it is the last lesson on the list
        if ($previousLessonId === $lesson->id) {
          $lesson->users()->updateExistingPivot(Auth::user()->id, [
            'completed' => true,
          ]);

          if (!is_null($lesson->next_lesson)) {
            $currentLesson = Lesson::find($lesson->next_lesson);
          }
        } else {
          // If it is not, we have to update the previous "completed" field in the pivot table
          $previousLesson = $lessons->find($previousLessonId);
          $previousLesson->users()->updateExistingPivot(Auth::user()->id, [
            'completed' => true,
          ]);
        }

        break;
    }

    return $currentLesson;
  }
}
