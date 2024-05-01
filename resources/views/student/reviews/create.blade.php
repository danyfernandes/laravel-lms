<x-student.layout>

    <section class="py-10 bg-white">
        <div class="max-w-6xl mx-auto px-8">
            <div class="shadow-2xl shadow-black overflow-hidden rounded-2xl">
                <div class="px-10 py-5 mt-6">
                    <h2 class="text-3xl font-semibold text-primary">{{ __('Tell us what you thought of:') }}
                    </h2>
                    <p class="text-3xl font-bold text-black">{{ $course->title }}</p>
                </div>
                <form action="{{ route('student.courses.reviews.store', $course->slug) }}" method="POST"
                    class="px-10 py-5 mb-4">
                    @csrf

                    <div class="space-y-6">
                        <!-- Name -->
                        <div>
                            <x-input-label for="title" :value="__('Review Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title')" autofocus autocomplete="title" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="content" :value="__('Review Text')" />
                            <textarea id="content" name="content" rows="4" class="mt-1 block w-full shadow-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('content')" />
                        </div>

                        <div class="space-y-4">
                            <x-input-label for="rating" :value="__('Rating')" />

                            <div class="flex flex-col" x-data="{ rating: 0, hovering: 0 }">
                                <div class="flex flex-row gap-3 relative">
                                    <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                                        x-bind:class="rating >= 1 ? 'bg-primary' : 'bg-gray-300'"
                                        x-on:click="rating = 1" x-on:mouseover="hovering = 1"
                                        x-on:mouseleave="hovering = 0">
                                        <p class="text-2xl mt-4 select-none pointer-events-none"
                                            x-bind:class="rating == 1 || hovering == 1 ? '' : 'invisible'">🤨</p>
                                    </div>
                                    <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                                        x-bind:class="rating >= 2 ? 'bg-primary' : 'bg-gray-300'"
                                        x-on:click="rating = 2" x-on:mouseover="hovering = 2"
                                        x-on:mouseleave="hovering = 0">
                                        <p class="text-2xl mt-4 select-none pointer-events-none"
                                            x-bind:class="rating == 2 || hovering == 2 ? '' : 'invisible'">🙂</p>
                                    </div>
                                    <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                                        x-bind:class="rating >= 3 ? 'bg-primary' : 'bg-gray-300'"
                                        x-on:click="rating = 3" x-on:mouseover="hovering = 3"
                                        x-on:mouseleave="hovering=0">
                                        <p class="text-2xl mt-4 select-none pointer-events-none"
                                            x-bind:class="rating == 3 || hovering == 3 ? '' : 'invisible'">😊</p>
                                    </div>
                                    <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                                        x-bind:class="rating >= 4 ? 'bg-primary' : 'bg-gray-300'"
                                        x-on:click="rating = 4" x-on:mouseover="hovering = 4"
                                        x-on:mouseleave="hovering = 0">
                                        <p class="text-2xl mt-4 select-none pointer-events-none"
                                            x-bind:class="rating == 4 || hovering == 4 ? '' : 'invisible'">😚</p>
                                    </div>
                                    <div class="flex flex-row justify-center w-10 h-2 rounded-md transition-all duration-200 cursor-pointer"
                                        x-bind:class="rating >= 5 ? 'bg-primary' : 'bg-gray-300'"
                                        x-on:click="rating = 5" x-on:mouseover="hovering = 5"
                                        x-on:mouseleave="hovering = 0">
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


                        <div class="pt-8">
                            <x-primary-button class="py-3 px-6">
                                {{ __('Create Review') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-student.layout>
