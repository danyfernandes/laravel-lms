<x-student.layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            @if (auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-primary hover:bg-secondary px-4 py-2 font-semibold text-xs text-white uppercase rounded-md">
                    {{ __('Go to admin dashboard') }}
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black text-3xl">
                    {{ __('Welcome back, ' . auth()->user()->name) }}
                </div>

                <div class="p-6 mt-20 space-y-8">
                    <h2 class="text-3xl">{{ __('My courses') }}</h2>
                    <div>
                        <a href="{{ route('courses.index') }}"
                            class="hover:text-primary underline">{{ __('View more courses') }}</a>
                    </div>
                    <div
                        class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 xl:gap-x-8 mt-20">
                        @foreach ($data['courses'] as $course)
                            <div class="shadow-lg shadow-slate-500 overflow-hidden hover:shadow-slate-900">
                                @if (count($course->lessons) > 0)
                                    <div class="hover:bg-gray-100 hover:text-primary">
                                        <a href="{{ route('student.courses.lessons.show', [$course->slug, $course->lessons[0]->id]) }}"
                                            class="group">
                                            <div
                                                class="relative aspect-h-9 aspect-w-16 w-full overflow-hidden bg-gray-200 xl:aspect-h-9 xl:aspect-w-16">
                                                <img src="{{ asset($course->image_path) }}"
                                                    alt="Course image thumbnail."
                                                    class="h-full w-full object-cover object-center group-hover:opacity-75" />
                                            </div>
                                            <div class="flex flex-col border-b-2 text-center space-y-2">
                                                <!-- Circle -->
                                                <div class="flex items-center justify-center pt-4"
                                                    x-data="{ circumference: 2 * 22 / 7 * 20 }">
                                                    <svg class="transform -rotate-90 w-12 h-12">
                                                        <circle cx="24" cy="24" r="20"
                                                            stroke="currentColor" stroke-width="4" fill="transparent"
                                                            class="text-gray-400" />

                                                        <circle cx="24" cy="24" r="20"
                                                            stroke="currentColor" stroke-width="4" fill="transparent"
                                                            :stroke-dasharray="circumference"
                                                            :stroke-dashoffset="circumference -
                                                                {{ $course['percent'] }} /
                                                                100 *
                                                                circumference"
                                                            class="text-primary" />
                                                    </svg>
                                                    <span class="absolute text-xs font-semibold">
                                                        {{ $course['percent'] }}%</span>
                                                </div>
                                                <h3 class="text-xl my-auto font-semibold pb-4">
                                                    {{ $course->title }}</h3>
                                            </div>
                                        </a>
                                    </div>

                                    {{-- BUTTONS BELOW COURSE CARD --}}
                                    <div class="flex justify-center items-center">
                                        @if ($course['percent'] !== 100)
                                            {{-- SEE OVERVIEW --}}
                                            <a href="{{ route('student.courses.show', $course->slug) }}"
                                                class="text-sm font-semibold w-full text-center py-6 border-r hover:bg-gray-100 hover:text-primary stroke-black hover:fill-primary hover:stroke-primary">
                                                <svg viewBox="0 0 24 24" class="w-6 mx-auto mb-2" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M21.2799 6.40005L11.7399 15.94C10.7899 16.89 7.96987 17.33 7.33987 16.7C6.70987 16.07 7.13987 13.25 8.08987 12.3L17.6399 2.75002C17.8754 2.49308 18.1605 2.28654 18.4781 2.14284C18.7956 1.99914 19.139 1.92124 19.4875 1.9139C19.8359 1.90657 20.1823 1.96991 20.5056 2.10012C20.8289 2.23033 21.1225 2.42473 21.3686 2.67153C21.6147 2.91833 21.8083 3.21243 21.9376 3.53609C22.0669 3.85976 22.1294 4.20626 22.1211 4.55471C22.1128 4.90316 22.0339 5.24635 21.8894 5.5635C21.7448 5.88065 21.5375 6.16524 21.2799 6.40005V6.40005Z"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                    <path
                                                        d="M11 4H6C4.93913 4 3.92178 4.42142 3.17163 5.17157C2.42149 5.92172 2 6.93913 2 8V18C2 19.0609 2.42149 20.0783 3.17163 20.8284C3.92178 21.5786 4.93913 22 6 22H17C19.21 22 20 20.2 20 18V13"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                                <h3>{{ __('See Overview') }}</h3>
                                            </a>

                                            {{-- RESUME COURSE --}}
                                            <a href="{{ route('student.courses.lessons.show', [$course->slug, $course->lessons[0]->id]) }}"
                                                class="text-sm font-semibold w-full text-center py-6 hover:bg-gray-100 hover:text-primary hover:fill-primary">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 210 210"
                                                    class="w-6 mx-auto mb-2">
                                                    <path d="M179.07,105L30.93,210V0L179.07,105z"></path>
                                                </svg>
                                                <h3>{{ __('Resume Course') }}</h3>
                                            </a>
                                        @else
                                            {{-- RATE THIS COURSE --}}
                                            <a href="{{ route('student.courses.reviews.create', $course->slug) }}"
                                                class="text-sm font-semibold w-full text-center py-6 border-r hover:bg-gray-100 hover:text-primary stroke-black hover:fill-primary hover:stroke-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    class="w-6 mx-auto mb-2">
                                                    <path
                                                        d="M22 9.74l-7.19-.62L12 2.5 9.19 9.13 2 9.74l5.46 4.73-1.64 7.03L12 17.77l6.18 3.73-1.63-7.03L22 9.74zM12 15.9V6.6l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.9z">
                                                    </path>
                                                </svg>
                                                <h3>{{ __('Rate This Course') }}</h3>
                                            </a>

                                            {{-- REPLAY COURSE --}}
                                            <a href="{{ route('student.courses.lessons.show', [$course->slug, $course->lessons[0]->id]) }}"
                                                class="text-sm font-semibold w-full text-center py-6 hover:bg-gray-100 hover:text-primary stroke-black hover:fill-primary hover:stroke-primary">
                                                <svg viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg" class="w-6 mx-auto mb-2">
                                                    <path
                                                        d="M5 13C5 16.866 8.13401 20 12 20C15.866 20 19 16.866 19 13C19 9.13401 15.866 6 12 6H7M7 6L10 3M7 6L10 9"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    </path>
                                                </svg>
                                                <h3>{{ __('Replay Course') }}</h3>
                                            </a>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-flash-message />
</x-student.layout>
