<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.enrollments.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $courses = $user->courses()->get();

        return view('admin.enrollments.show', [
            'courses' => $courses,
            'userName' => $user->name,
        ]);
    }
}
