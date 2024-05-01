<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Review') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- CREATE REVIEW -->
        <form method="post" action="{{ route('admin.reviews.store') }}" class="pt-6 space-y-6 container mx-auto mb-8">
            @csrf

            <!-- Title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                    required autofocus autocomplete="title" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Content -->
            <div class="mt-4">
                <x-input-label for="content" :value="__('Content')" />
                <textarea id="content" name="content" rows="4" class="mt-1 block w-full shadow-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('content')" />
            </div>

            <!-- Dropdown search courses -->
            <div class="mt-4">
                <x-input-label for="courses" :value="__('Courses')" />
                <div class="border border-gray-300 rounded-lg block w-full mt-1 shadow">
                    <ul class="h-48 p-1 pb-3 overflow-y-auto text-sm text-gray-700">
                        @foreach ($courses as $course)
                            <li>
                                <div class="flex items-center ps-2 rounded hover:bg-primary">
                                    <input id="{{ $course->slug }}" type="radio" value="{{ $course->id }}"
                                        name="course"
                                        class="text-primary bg-gray-100 border-gray-300 focus:ring-primary hover:cursor-pointer">
                                    <label for="{{ $course->slug }}"
                                        class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded hover:text-white  hover:cursor-pointer">{{ $course->title }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('courses')" />
            </div>

            <!-- Dropdown search users -->
            <div class="mt-4">
                <x-input-label for="users" :value="__('Users')" />
                <div class="border border-gray-300 rounded-lg block w-full mt-1 shadow">
                    <ul class="h-48 p-1 pb-3 overflow-y-auto text-sm text-gray-700">
                        @foreach ($users as $user)
                            <li>
                                <div class="flex items-center ps-2 rounded hover:bg-primary">
                                    <input id="{{ $user->id }}" type="radio" value="{{ $user->id }}"
                                        name="user"
                                        class="text-primary bg-gray-100 border-gray-300 focus:ring-primary hover:cursor-pointer">
                                    <label for="{{ $user->id }}"
                                        class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded hover:text-white  hover:cursor-pointer">{{ $user->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('users')" />
            </div>

            <div class="space-y-4">
                <x-input-label for="rating" :value="__('Rating')" />

                <div class="flex flex-col" x-data="{ rating: 0, hovering: 0 }">
                    <div class="flex flex-row gap-3 relative">
                        <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                            x-bind:class="rating >= 1 ? 'bg-primary' : 'bg-gray-300'" x-on:click="rating = 1"
                            x-on:mouseover="hovering = 1" x-on:mouseleave="hovering = 0">
                            <p class="text-2xl mt-4 select-none pointer-events-none"
                                x-bind:class="rating == 1 || hovering == 1 ? '' : 'invisible'">🤨</p>
                        </div>
                        <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                            x-bind:class="rating >= 2 ? 'bg-primary' : 'bg-gray-300'" x-on:click="rating = 2"
                            x-on:mouseover="hovering = 2" x-on:mouseleave="hovering = 0">
                            <p class="text-2xl mt-4 select-none pointer-events-none"
                                x-bind:class="rating == 2 || hovering == 2 ? '' : 'invisible'">🙂</p>
                        </div>
                        <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                            x-bind:class="rating >= 3 ? 'bg-primary' : 'bg-gray-300'" x-on:click="rating = 3"
                            x-on:mouseover="hovering = 3" x-on:mouseleave="hovering=0">
                            <p class="text-2xl mt-4 select-none pointer-events-none"
                                x-bind:class="rating == 3 || hovering == 3 ? '' : 'invisible'">😊</p>
                        </div>
                        <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                            x-bind:class="rating >= 4 ? 'bg-primary' : 'bg-gray-300'" x-on:click="rating = 4"
                            x-on:mouseover="hovering = 4" x-on:mouseleave="hovering = 0">
                            <p class="text-2xl mt-4 select-none pointer-events-none"
                                x-bind:class="rating == 4 || hovering == 4 ? '' : 'invisible'">😚</p>
                        </div>
                        <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                            x-bind:class="rating >= 5 ? 'bg-primary' : 'bg-gray-300'" x-on:click="rating = 5"
                            x-on:mouseover="hovering = 5" x-on:mouseleave="hovering = 0">
                            <p class="text-2xl mt-4 select-none pointer-events-none"
                                x-bind:class="rating == 5 || hovering == 5 ? '' : 'invisible'">😍</p>
                        </div>
                    </div>
                    <div class="flex flex-row justify-center gap-3 relative">
                        <input id="rating" x-model="rating" type="text" name="rating"
                            class="hidden first:bg-gray-300 w-20" />
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 py-8">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-admin.layout>

<x-flash-message />
