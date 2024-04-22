<x-static-layout>
    <div>
        <x-courses.course-overview :course=$course :lessons=$lessons>
            @if (!is_null($course->payment_link))
                {{-- Call to action to buy the course --}}
                <div class="mt-10 text-center">
                    <a href="{{ url($course->payment_link) }}" target="_blank"
                        class="px-8 py-4 text-xl animate-bounce inline-flex items-center bg-primary border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-secondary focus:bg-secondary active:bg-secondary">
                        {{ __('Enroll now') }}
                    </a>
                </div>
            @endif
        </x-courses.course-overview>
    </div>
</x-static-layout>
