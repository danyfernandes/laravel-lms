<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC');
        // Check if there is search
        if (request()->has('search')) {
            $users = $users->where('name', 'like', '%' . request()->get('search', '') . '%')->orWhere('email', 'like', '%' . request()->get('search', '') . '%')->orWhere('id', 'like', '%' . request()->get('search', '') . '%');
        }

        return view('admin.users.index', [
            'users' => $users->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create', [
            'courses' => Course::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_admin = $request->is_admin;
        $user->save();

        $this->attachCourseToUser($user, $request->courses);

        return Redirect::route('admin.users')->with('message', 'User created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.users.edit', [
            'user' => User::find($id),
            'courses' => Course::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password !== $user->password) {
            $user->password = Hash::make($request->password);
        }
        $user->is_admin = $request->is_admin;
        $user->save();

        if (is_null($request->courses)) {
            $user->courses()->detach();
            $user->lessons()->detach();
        } else {
            // Check if course has been detached
            foreach ($user->courses()->get() as $course) {
                if (!in_array($course->id, $request->courses)) {
                    foreach (Course::where('id', $course->id)->first()->lessons()->get() as $lesson) {
                        $user->lessons()->detach($lesson->id);
                    }
                    $user->courses()->detach($course->id);
                }
            }

            $this->attachCourseToUser($user, $request->courses);
        }

        return Redirect::route('admin.users')->with('message', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->first();
        $user->courses()->detach();
        $user->lessons()->detach();
        $user->delete();

        return Redirect::route('admin.users')->with('message', 'User deleted successfully');
    }

    /**
     * Attach courses to user and lessons that belongs to a course
     */
    private function attachCourseToUser($user, $courses)
    {
        if (is_null($courses)) {
            return false;
        }

        foreach ($courses as $course) {
            if (!$user->courses->contains($course)) {
                $user->courses()->attach($course);
                foreach (Course::where('id', $course)->first()->lessons()->get() as $lesson) {
                    $user->lessons()->attach($lesson->id);
                }
            }
        }

        return true;
    }
}
