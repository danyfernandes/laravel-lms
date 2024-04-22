<div class="shadow-xl rounded-lg shadow-slate-600 overflow-hidden hover:shadow-slate-900">
    <a href="#" class="group">
        <div class='aspect-h-1 aspect-w-1 w-full overflow-hidden'>
            <img src="{{ asset($course->image_path) }}" alt="Course image thumbnail."
                class="h-64 w-full object-cover object-center group-hover:opacity-75" />
        </div>

        <div class="px-6 py-2">
            <x-courses.card-content :course="$course" />
        </div>
    </a>
</div>
