<x-layout>
    <div>
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="sr-only">Courses</h2>

            <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                @foreach ($courses as $course)
                    <x-courses.single-course :course="$course" />
                @endforeach
            </div>
        </div>
</x-layout>
