<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <p>{{ __('Enrollments for ') }}<span class="text-primary">{{ $userName }}</span></p>
        </h2>
    </x-slot>

    <div class="bg-white">
        <div class="container mx-auto pb-8">
            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full border break-words text-xs md:text-sm text-left">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">{{ __('Course') }}</th>
                            <th class="px-4 py-2">{{ __('Completed') }}</th>
                            <th class="px-4 py-2">{{ __('Enrolled At') }}</th>
                            <th class="px-4 py-2">{{ __('Expiration') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                            <tr class="odd:bg-white even:bg-gray-200
                          hover:bg-slate-100">
                                <td class="px-4 py-2">{{ $course->title }}</td>
                                <td class="px-4 py-2">{{ $course->pivot->percent }}%</td>
                                <td class="px-4 py-2">{{ $course->pivot->created_at }}</td>
                                <td class="px-4 py-2">
                                    @php
                                        $remainingDaysAccess = $course->remainingDaysAccess();
                                    @endphp
                                    <span
                                        class="{{ $remainingDaysAccess <= 10 ? 'text-red-500' : 'text-black' }}">{{ $remainingDaysAccess . __(' days left') }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin.layout>
