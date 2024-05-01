<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'DESC');

        return view('admin.reviews.index', [
            'reviews' => $reviews->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create', [
            'reviews' => Review::all(),
            'courses' => Course::all(),
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'rating' => ['required'],
            'course' => ['required'],
            'user' => ['required'],
        ]);

        $review = new Review;
        $review->title = $request->title;
        $review->content = $request->content;
        $review->course_id = $request->course;
        $review->user_id = $request->user;
        $review->rating = $request->rating;
        $review->save();

        return Redirect::route('admin.reviews')->with('message', 'Review created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.reviews.edit', [
            'review' => Review::find($id),
            'courses' => Course::all(),
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'rating' => ['required'],
            'course' => ['required'],
            'user' => ['required'],
        ]);

        $review = Review::find($id);
        $review->title = $request->title;
        $review->content = $request->content;
        $review->course_id = $request->course;
        $review->user_id = $request->user;
        $review->rating = $request->rating;
        $review->save();

        return Redirect::route('admin.reviews')->with('message', 'Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);
        $review->delete();

        return Redirect::route('admin.reviews')->with('message', 'Review deleted successfully');
    }
}
