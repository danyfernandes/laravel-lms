<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="bg-white">
        <!-- CREATE USER -->
        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data"
            class="pt-6 space-y-6 container mx-auto mb-8">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="is_admin" :value="__('Role')" />
                <select id="is_admin" name="is_admin" class="border border-gray-300 rounded-lg block w-full mt-1">
                    <option selected value="0">{{ __('Student') }}</option>
                    <option value="1">{{ __('Admin') }}</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('is_admin')" />
            </div>

            <!-- Dropdown search course enrollment -->
            <div class="mt-4">
                <x-input-label for="enrollments" :value="__('Enrollments')" />
                <div class="border border-gray-300 rounded-lg block w-full mt-1 shadow">
                    <ul class="h-48 p-1 pb-3 overflow-y-auto text-sm text-gray-700">
                        @foreach ($courses as $course)
                            <li>
                                <div class="flex items-center ps-2 rounded hover:bg-primary">
                                    <input id="{{ $course->slug }}" type="checkbox" value="{{ $course->id }}"
                                        name="courses[]"
                                        class="w-4 h-4 text-primary bg-gray-100 border-gray-300 rounded focus:ring-primary hover:cursor-pointer">
                                    <label for="{{ $course->slug }}"
                                        class="w-full py-2 ms-2 text-sm font-medium text-gray-900 rounded hover:text-white  hover:cursor-pointer">{{ $course->title }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('enrollments')" />
            </div>

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Create') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-admin.layout>

<x-flash-message />
