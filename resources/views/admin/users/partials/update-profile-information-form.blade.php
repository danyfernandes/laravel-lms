<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
    </header>

    <form method="post" action="{{ route('admin.users.update', $user->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required
                autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="update_password_password" :value="__('Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full"
                :value="old('password', $user->password)" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="is_admin" :value="__('Role')" />
            <select id="is_admin" name="is_admin" class=" border border-gray-300 rounded-lg block w-full mt-1">
                <option {{ $user->is_admin ? '' : 'selected' }} value="0">{{ __('Student') }}</option>
                <option {{ $user->is_admin ? 'selected' : '' }} value="1">{{ __('Admin') }}</option>
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
                                    {{ $user->courses()->get()->contains($course) ? 'checked' : '' }} name="courses[]"
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
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
