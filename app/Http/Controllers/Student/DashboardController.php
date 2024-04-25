<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function __invoke()
  {
    $user = User::where('id', Auth::user()->id)->first();
    $courses =  $user->courses()->get();

    return view('student.dashboard', [
      'data' => $this->populateData($courses, $user),
    ]);
  }

  private function populateData($courses, $user)
  {
    $data = [
      'courses' => [],
    ];

    foreach ($courses as $key => $value) {
      array_push($data['courses'], $value);
      $percent = (int) $user->courses()->where('course_id', $value->id)->first()->pivot->percent;
      $lessons_array = [];
      foreach ($value->lessons()->get() as $lesson) {
        array_push($lessons_array, $lesson);
      }
      $data['courses'][$key]['lessons'] = $lessons_array;
      $data['courses'][$key]['percent'] = $percent;
    }

    return $data;
  }
}
