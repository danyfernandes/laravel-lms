<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Course') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- CREATE COURSE -->
        <form method="post" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data"
            class="pt-6 space-y-6 container mx-auto mb-8">
            @csrf
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="title" :value="old('title')" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="10"
                    class="mt-1 block w-full shadow-sm border-gray-300 rounded-md"></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div>
                <x-input-label for="excerpt" :value="__('Excerpt')" />
                <x-text-input id="excerpt" name="excerpt" type="text" class="mt-1 block w-full" required
                    autocomplete="excerpt" :value="old('excerpt')" />
                <x-input-error class="mt-2" :messages="$errors->get('excerpt')" />
            </div>

            <div>
                <x-input-label for="imagePath" :value="__('Image Path')" />
                <input type="file" class="mt-1 block w-full" name="imagePath"
                    @error('imagePath') is-invalid @enderror>
                <x-input-error class="mt-2" :messages="$errors->get('imagePath')" />
            </div>

            <div>
                <x-input-label for="slug" :value="__('Slug')" />
                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" required
                    autocomplete="slug" :value="old('slug')" />
                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" required
                    autocomplete="price" :value="old('price')" />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>

            <div>
                <x-input-label for="level" :value="__('Level')" />
                <select id="level" name="level" class=" border border-gray-300 rounded-lg block w-full mt-1">
                    @foreach ($course_levels as $course_level)
                        <option value="{{ $course_level }}">
                            {{ $course_level }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('level')" />
            </div>

            <div>
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class=" border border-gray-300 rounded-lg block w-full mt-1">
                    @foreach ($course_status as $status)
                        <option value="{{ $status }}">
                            {{ $status }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div>
                <x-input-label for="audio" :value="__('Audio language(s)')" />
                <x-text-input id="audio" name="audio" type="text" class="mt-1 block w-full"
                    autocomplete="audio" :value="old('audio')" />
                <x-input-error class="mt-2" :messages="$errors->get('audio')" />
            </div>

            <div>
                <x-input-label for="subtitles" :value="__('Subtitles (comma separated)')" />
                <x-text-input id="subtitles" name="subtitles" type="text" class="mt-1 block w-full"
                    autocomplete="subtitles" :value="old('subtitles')" />
                <x-input-error class="mt-2" :messages="$errors->get('subtitles')" />
            </div>

            <div>
                <x-input-label for="access" :value="__('Access Time')" />
                <x-text-input id="access" name="access" type="text" class="mt-1 block w-full"
                    autocomplete="access" :value="old('access')" />
                <x-input-error class="mt-2" :messages="$errors->get('access')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-admin.layout>

<x-flash-message />
