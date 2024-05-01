<x-student.layout>

    <x-slot name="header">
        <div class="flex space-x-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $course->title }}
            </h2>
        </div>
    </x-slot>

    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-8">
            <div class="shadow-2xl shadow-black overflow-hidden rounded-2xl p-10">
                <div class="flex items-start mb-5">
                    <div class="border-gray-500 space-y-1">
                        <h4 class="text-2xl font-bold text-gray-900">{{ $review->title }}</h4>
                    </div>
                </div>
                <p class="mb-2 text-gray-500 text-xl break-words">{{ $review->content }}</p>
                <div class="space-y-4 mt-8">
                    <div class="flex flex-row justify-between items-center" x-data="{ rating: {{ $review->rating }} }">
                        <div class="flex flex-row gap-3 relative">
                            <div class="flex flex-row justify-center w-10 h-2 rounded-md"
                                x-bind:class="rating >= 1 ? 'bg-primary' : 'bg-gray-300'">
                                <p class="text-2xl mt-4 select-none pointer-events-none"
                                    x-bind:class="rating == 1 ? '' : 'invisible'">🤨</p>
                            </div>
                            <div class="flex flex-row justify-center w-10 h-2 rounded-md"
                                x-bind:class="rating >= 2 ? 'bg-primary' : 'bg-gray-300'">
                                <p class="text-2xl mt-4 select-none pointer-events-none"
                                    x-bind:class="rating == 2 ? '' : 'invisible'">🙂</p>
                            </div>
                            <div class="flex flex-row justify-center w-10 h-2 rounded-md"
                                x-bind:class="rating >= 3 ? 'bg-primary' : 'bg-gray-300'">
                                <p class="text-2xl mt-4 select-none pointer-events-none"
                                    x-bind:class="rating == 3 ? '' : 'invisible'">😊</p>
                            </div>
                            <div class="flex flex-row justify-center w-10 h-2 rounded-md"
                                x-bind:class="rating >= 4 ? 'bg-primary' : 'bg-gray-300'">
                                <p class="text-2xl mt-4 select-none pointer-events-none"
                                    x-bind:class="rating == 4 ? '' : 'invisible'">😚</p>
                            </div>
                            <div class="flex flex-row justify-center w-10 h-2 rounded-md"
                                x-bind:class="rating >= 5 ? 'bg-primary' : 'bg-gray-300'">
                                <p class="text-2xl mt-4 select-none pointer-events-none"
                                    x-bind:class="rating == 5 ? '' : 'invisible'">😍</p>
                            </div>
                        </div>
                        <div class="flex space-x-2">
                            <a href="{{ route('student.courses.reviews.edit', [$course->slug, $review->id]) }}"
                                class="bg-white px-4 py-2 border-black border rounded-lg  fill-black hover:bg-black hover:text-white hover:fill-white">
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                    <path
                                        d="M21.1213 2.70705C19.9497 1.53548 18.0503 1.53547 16.8787 2.70705L15.1989 4.38685L7.29289 12.2928C7.16473 12.421 7.07382 12.5816 7.02986 12.7574L6.02986 16.7574C5.94466 17.0982 6.04451 17.4587 6.29289 17.707C6.54127 17.9554 6.90176 18.0553 7.24254 17.9701L11.2425 16.9701C11.4184 16.9261 11.5789 16.8352 11.7071 16.707L19.5556 8.85857L21.2929 7.12126C22.4645 5.94969 22.4645 4.05019 21.2929 2.87862L21.1213 2.70705ZM18.2929 4.12126C18.6834 3.73074 19.3166 3.73074 19.7071 4.12126L19.8787 4.29283C20.2692 4.68336 20.2692 5.31653 19.8787 5.70705L18.8622 6.72357L17.3068 5.10738L18.2929 4.12126ZM15.8923 6.52185L17.4477 8.13804L10.4888 15.097L8.37437 15.6256L8.90296 13.5112L15.8923 6.52185ZM4 7.99994C4 7.44766 4.44772 6.99994 5 6.99994H10C10.5523 6.99994 11 6.55223 11 5.99994C11 5.44766 10.5523 4.99994 10 4.99994H5C3.34315 4.99994 2 6.34309 2 7.99994V18.9999C2 20.6568 3.34315 21.9999 5 21.9999H16C17.6569 21.9999 19 20.6568 19 18.9999V13.9999C19 13.4477 18.5523 12.9999 18 12.9999C17.4477 12.9999 17 13.4477 17 13.9999V18.9999C17 19.5522 16.5523 19.9999 16 19.9999H5C4.44772 19.9999 4 19.5522 4 18.9999V7.99994Z">
                                    </path>
                                </svg>
                            </a>
                            <x-danger-button x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-deletion')"><svg aria-hidden="true"
                                    class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" />
                                </svg></x-danger-button>

                            <x-modal name="confirm-deletion" focusable>
                                <form method="post"
                                    action="{{ route('student.courses.reviews.destroy', [$course->slug, $review->id]) }}"
                                    class="p-6">
                                    @csrf
                                    @method('delete')

                                    <h2 class="text-lg font-medium text-gray-900">
                                        {{ __('Are you sure you want to delete your review?') }}
                                    </h2>

                                    <div class="mt-6 flex justify-end">
                                        <x-secondary-button x-on:click="$dispatch('close')">
                                            {{ __('Cancel') }}
                                        </x-secondary-button>

                                        <x-danger-button class="ms-3">
                                            {{ __('Delete Review') }}
                                        </x-danger-button>
                                    </div>
                                </form>
                            </x-modal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-student.layout>
