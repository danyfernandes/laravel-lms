<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Course') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- DELETE COURSE -->
        <form method="post" action="{{ route('admin.courses.destroy', $course->slug) }}" class="container mx-auto">
            @csrf
            @method('delete')

            <div class="flex gap-4 justify-end">
                <x-primary-button class="bg-red-500 hover:bg-red-700">{{ __('Delete') }}</x-primary-button>
            </div>
        </form>

        <!-- UPDATE COURSE -->
        <form method="post" action="{{ route('admin.courses.update', $course->slug) }}" enctype="multipart/form-data"
            class="space-y-6 container mx-auto">
            @csrf
            @method('patch')

            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $course->title)"
                    required autofocus autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" rows="10"
                    class="mt-1 block w-full shadow-sm border-gray-300 rounded-md">{!! $course->description !!}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

            <div>
                <x-input-label for="excerpt" :value="__('Excerpt')" />
                <x-text-input id="excerpt" name="excerpt" type="text" class="mt-1 block w-full" :value="old('excerpt', $course->excerpt)"
                    required autocomplete="excerpt" />
                <x-input-error class="mt-2" :messages="$errors->get('excerpt')" />
            </div>

            <div>
                <x-input-label for="imagePath" :value="__('Image Path')" />
                <img src="{{ asset($course->image_path) }}" alt="{{ $course->slug }}" class="w-32">
                <input type="file" class="mt-1 block w-full" name="imagePath"
                    value="{{ old('imagePath', $course->image_path) }}" @error('imagePath') is-invalid @enderror>
                <x-input-error class="mt-2" :messages="$errors->get('imagePath')" />
            </div>

            <div>
                <x-input-label for="slug" :value="__('Slug')" />
                <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full" :value="old('slug', $course->slug)"
                    required autocomplete="slug" />
                <x-input-error class="mt-2" :messages="$errors->get('slug')" />
            </div>

            <div>
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $course->price)"
                    required autocomplete="price" />
                <x-input-error class="mt-2" :messages="$errors->get('price')" />
            </div>

            <div>
                <x-input-label for="level" :value="__('Level')" />
                <select id="level" name="level" class=" border border-gray-300 rounded-lg block w-full mt-1">
                    @foreach ($course_levels as $course_level)
                        <option {{ strtolower($course_level) === strtolower($course->level) ? 'selected' : '' }}
                            value="{{ $course_level }}">
                            {{ $course_level }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('level')" />
            </div>

            <div>
                <x-input-label for="status" :value="__('Status')" />
                <select id="status" name="status" class=" border border-gray-300 rounded-lg block w-full mt-1">
                    @foreach ($course_status as $status)
                        <option {{ strtolower($status) === strtolower($course->status) ? 'selected' : '' }}
                            value="{{ $status }}">
                            {{ $status }}</option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('status')" />
            </div>

            <div>
                <x-input-label for="audio" :value="__('Audio language(s)')" />
                <x-text-input id="audio" name="audio" type="text" class="mt-1 block w-full" :value="old('audio', $course->audio)"
                    autocomplete="audio" />
                <x-input-error class="mt-2" :messages="$errors->get('audio')" />
            </div>

            <div>
                <x-input-label for="subtitles" :value="__('Subtitles (comma separated)')" />
                <x-text-input id="subtitles" name="subtitles" type="text" class="mt-1 block w-full"
                    :value="old('subtitles', $course->subtitles)" autocomplete="subtitles" />
                <x-input-error class="mt-2" :messages="$errors->get('subtitles')" />
            </div>

            <div>
                <x-input-label for="access" :value="__('Access Time')" />
                <x-text-input id="access" name="access" type="text" class="mt-1 block w-full" :value="old('access', $course->access)"
                    autocomplete="access" />
                <x-input-error class="mt-2" :messages="$errors->get('access')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Update') }}</x-primary-button>
            </div>
        </form>

        <!-- DISPLAY LESSONS TO BE UPDATED -->
        <div class="max-w-screen-xl mx-auto px-5 bg-white min-h-sceen">
            <div class="flex flex-col items-center">
                <h2 class="font-bold text-3xl tracking-tight">
                    Lessons
                </h2>
            </div>
            <!-- ADD COURSE -->
            <div class="flex gap-4 justify-end mb-2">
                <a href="{{ route('admin.courses.lessons.create', $course->slug) }}"
                    class="bg-green-500 hover:bg-green-700 px-4 py-2 ont-semibold text-xs text-white uppercase rounded-lg">Add</a>
            </div>
            <div class="grid divide-y divide-neutral-200 mx-auto mt-8">
                <div class="overflow-x-auto">
                    <table class="w-full border break-words text-xs md:text-sm text-left">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2">{{ __('ID') }}</th>
                                <th class="px-4 py-2">{{ __('Title') }}</th>
                                <th class="px-4 py-2">{{ __('Course ID') }}</th>
                                <th class="px-4 py-2">{{ __('Duration [min]') }}</th>
                                <th class="px-4 py-2">{{ __('Next Lesson') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                                <tr class="odd:bg-white even:bg-gray-200
                              hover:bg-slate-100 hover:cursor-pointer"
                                    onclick="window.location='{{ route('admin.courses.lessons.edit', [$course->slug, $lesson->id]) }}';">
                                    <td class="px-4 py-2">{{ $lesson->id }}</td>
                                    <td class="px-4 py-2">{{ $lesson->title }}</td>
                                    <td class="px-4 py-2">{{ $lesson->course_id }}</td>
                                    <td class="px-4 py-2">{{ $lesson->duration }}</td>
                                    <td class="px-4 py-2">{{ $lesson->next_lesson }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="m-8">
                        {{ $lessons->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

<x-flash-message />
