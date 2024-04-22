<div class="shadow-md rounded-md shadow-slate-400 overflow-hidden hover:shadow-slate-700">
    <a href="{{ route('courses.show', $course->slug) }}" class="group">
        <div class='aspect-h-1 aspect-w-1 w-full overflow-hidden'>
            <img src="{{ asset($course->image_path) }}" alt="Course image thumbnail."
                class="h-full w-full object-cover object-center group-hover:opacity-75" />
        </div>

        <div class="px-6 py-2">
            <x-courses.card-content :course="$course" />
        </div>
    </a>
</div>
