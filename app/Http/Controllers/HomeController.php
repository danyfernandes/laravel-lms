<?php

namespace App\Http\Controllers;

use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('welcome', [
            'courses' => Course::where('status', 'enabled')->latest()->limit(10)->get(),
        ]);
    }
}
