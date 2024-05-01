<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(string $courseSlug)
    {
        $course = Course::where('slug', $courseSlug)->first();

        $this->authorize('create', [Review::class, $course]);

        $review = Review::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();

        if (!is_null($review)) {
            return view('student.reviews.show', [
                'course' => $course,
                'review' => $review
            ]);
        }

        return view('student.reviews.create', [
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
            'rating' => ['required'],
        ]);

        $course = Course::where('slug', $courseSlug)->first();

        $this->authorize('create', [Review::class, $course]);

        $review = new Review;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->course_id = $course->id;
        $review->user_id = Auth::user()->id;
        $review->rating = $request->rating;
        $review->save();

        return Redirect::route('student.dashboard')->with('message', 'Review created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $courseSlug, string $id)
    {
        $review = Review::find($id);

        $this->authorize('view', $review);

        $course = Course::where('slug', $courseSlug)->first();

        return view('student.reviews.show', [
            'review' => $review,
            'course' => $course,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $courseSlug, string $id)
    {
        $review = Review::find($id);
        $course = Course::where('slug', $courseSlug)->first();

        $this->authorize('update', $review);

        return view('student.reviews.edit', [
            'review' => $review,
            'course' => $course,
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
            'rating' => ['required'],
        ]);

        $review = Review::find($id);
        $this->authorize('update', $review);
        $review->title = $request->title;
        $review->content = $request->content;
        $review->rating = $request->rating;
        $review->save();

        return Redirect::route('student.dashboard')->with('message', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $courseSlug, string $id)
    {
        $review = Review::find($id);
        $this->authorize('delete', $review);
        $review->delete();

        return Redirect::route('student.dashboard')->with('message', 'Review deleted successfully');
    }
}
