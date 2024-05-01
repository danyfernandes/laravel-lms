<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Lesson') }}
        </h2>
        <p class="pt-4">
            {{ __('Course title: ' . $course->title) }}
        </p>
    </x-slot>

    <div class="bg-white">
        <!-- CREATE LESSON -->
        <form method="post" action="{{ route('admin.courses.lessons.store', $course->slug) }}"
            class="pt-6 space-y-6 container mx-auto mb-8">
            @csrf

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="content" :value="__('Content')" />
                <textarea id="content" name="content" rows="10" class="mt-1 block w-full shadow-sm border-gray-300 rounded-md"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('content')" />
            </div>

            <div>
                <x-input-label for="courseId" :value="__('Course ID')" />
                <x-text-input id="courseId" name="courseId" type="text" class="mt-1 block w-full" :value="old('courseId', $course->id)"
                    autocomplete="courseId" />
                <x-input-error class="mt-2" :messages="$errors->get('courseId')" />
            </div>

            <div>
                <x-input-label for="duration" :value="__('Duration')" />
                <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" :value="old('duration')"
                    autocomplete="duration" />
                <x-input-error class="mt-2" :messages="$errors->get('duration')" />
            </div>

            <div>
                <x-input-label for="next_lesson" :value="__('Next Lesson')" />
                <x-text-input id="next_lesson" name="next_lesson" type="text" class="mt-1 block w-full"
                    :value="old('next_lesson')" autocomplete="next_lesson" />
                <x-input-error class="mt-2" :messages="$errors->get('next_lesson')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-admin.layout>
