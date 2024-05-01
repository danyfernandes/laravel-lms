<x-admin.layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="container mx-auto">
            <!-- ADD REVIEW -->
            <div class="flex gap-4 justify-end mb-2">
                <a href="{{ route('admin.reviews.create') }}"
                    class="bg-green-500 hover:bg-green-700 px-4 py-2 ont-semibold text-xs text-white uppercase rounded-lg">
                    {{ __('Add') }}</a>
            </div>
            <!-- Responsive Table -->
            <div class="overflow-x-auto">
                <table class="w-full border-collapse break-words text-xs md:text-sm text-left">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">{{ __('ID') }}</th>
                            <th class="px-4 py-2">{{ __('Title') }}</th>
                            <th class="px-4 py-2">{{ __('Course') }}</th>
                            <th class="px-4 py-2">{{ __('User') }}</th>
                            <th class="px-4 py-2">{{ __('Rating') }}</th>
                            <th class="px-4 py-2">{{ __('Created At') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr class="odd:bg-white even:bg-gray-200
                    hover:bg-slate-100 hover:cursor-pointer"
                                onclick="window.location='{{ route('admin.reviews.edit', $review->id) }}';">
                                <td class="border px-4 py-2">{{ $review->id }}</td>
                                <td class="border px-4 py-2">{{ $review->title }}</td>
                                <td class="border px-4 py-2">{{ $review->course()->first()->title }}</td>
                                <td class="border px-4 py-2">{{ $review->user()->first()->name }}</td>
                                <td class="border px-4 py-2">{{ $review->rating }}</td>
                                <td class="border px-4 py-2">{{ $review->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="m-8">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.layout>

<x-flash-message />
