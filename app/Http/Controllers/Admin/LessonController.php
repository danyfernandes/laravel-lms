<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->first();
        return view('admin.lessons.create', [
            'course' => $course,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $courseSlug)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'courseId' => ['required'],
            'duration' => ['required'],
        ]);

        $lesson = new Lesson;
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $request->courseId;
        $lesson->duration = $request->duration;
        $lesson->next_lesson = $request->next_lesson;
        $lesson->save();

        $course = Course::where('slug', $courseSlug)->first();
        $lessons = $course->lessons()->get();

        if (count($lessons) > 1) {
            $previousLesson = $lessons[count($lessons) - 2];
            $previousLesson->next_lesson = $lesson->id;
            $previousLesson->save();
        }

        $users = $course->users()->get();
        $lesson->users()->sync($users);

        // Update course duration
        $course->duration += $lesson->duration;
        $course->save();

        return Redirect::route('admin.courses.edit', $courseSlug)->with('message', 'Course created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $courseSlug, string $id)
    {
        $course = Course::where('slug', $courseSlug)->first();
        $lesson = Lesson::find($id);

        return view('admin.lessons.edit', [
            'course' => $course,
            'lesson' => $lesson,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $courseSlug, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'courseId' => ['required'],
            'duration' => ['required'],
        ]);

        $lesson = Lesson::find($id);
        $lesson->title = $request->title;
        $lesson->content = $request->content;
        $lesson->course_id = $request->courseId;

        if ((int) $request->duration !== $lesson->duration) {
            $course = Course::where('slug', $courseSlug)->first();
            $course->duration -= $lesson->duration;
            $course->duration += (int)$request->duration;
            $course->save();
        }

        $lesson->duration = $request->duration;
        $lesson->next_lesson = $request->next_lesson;

        $lesson->save();

        return Redirect::route('admin.courses.edit', $courseSlug)->with('message', 'Lesson updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $courseSlug, string $id)
    {
        $lesson = Lesson::find($id);
        $lesson->users()->detach();

        $course = Course::where('slug', $courseSlug)->first();
        $lessons = $course->lessons()->get();

        // Update course duration
        $course->duration -= $lesson->duration;
        $course->save();

        $isDeleted = false;
        if (count($lessons) > 1) {
            $prevLesson = $lessons->where('next_lesson', $lesson->id)->first();
            if (!is_null($prevLesson)) {
                $prevLesson->next_lesson = $lesson->next_lesson;
                $lesson->delete();
                $prevLesson->save();

                $isDeleted = true;
            }
        }

        if (!$isDeleted) {
            $lesson->delete();
        }

        return Redirect::route('admin.courses.edit', $courseSlug)->with('message', 'Lesson deleted successfully');
    }
}
