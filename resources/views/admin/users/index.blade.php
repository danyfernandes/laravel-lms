<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="container mx-auto">
            <!-- ADD USER -->
            <div class="flex gap-4 justify-end mb-2">
                <a href="{{ route('admin.users.create') }}"
                    class="bg-green-500 hover:bg-green-700 px-4 py-2 ont-semibold text-xs text-white uppercase rounded-lg">
                    {{ __('Add') }}</a>
            </div>

            <div class="overflow-x-auto">
                <!-- Search input -->
                <x-search-bar action="{{ route('admin.users') }}" method="GET" />

                <!-- Table -->
                <table class="w-full border-collapse break-words text-xs md:text-sm text-left">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">{{ __('ID') }}</th>
                            <th class="px-4 py-2">{{ __('Name') }}</th>
                            <th class="px-4 py-2">{{ __('Email') }}</th>
                            <th class="px-4 py-2">{{ __('Role') }}</th>
                            <th class="px-4 py-2">{{ __('Enrollments') }}</th>
                            <th class="px-4 py-2">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- User 1 -->
                        @foreach ($users as $user)
                            <tr class="odd:bg-white even:bg-gray-200
                      hover:bg-slate-100 hover:cursor-pointer"
                                onclick="window.location='{{ route('admin.users.edit', $user->id) }}';">
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    {{ $user->is_admin ? 'Admin' : 'Student' }}
                                </td>
                                <td class="border px-4 py-2 hover:text-red"><a
                                        href="{{ route('admin.enrollments.show', $user->id) }}"
                                        class="underline hover:text-primary">{{ count($user->courses()->get()) }}</a>
                                </td>
                                @if ($user->isOnline())
                                    <td class="border px-4 py-2">
                                        <div
                                            class="px-4 py-2 rounded-full bg-green-500 text-white font-bold text-center">
                                            {{ __('Online') }}
                                        </div>
                                    </td>
                                @else
                                    <td class="border px-4 py-2">
                                        <div class="px-4 py-2 rounded-full bg-red-500 text-white font-bold text-center">
                                            {{ __('Offline') }}
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-8">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

<x-flash-message />
