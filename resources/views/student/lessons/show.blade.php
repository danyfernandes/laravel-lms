<x-student.lesson-layout :course=$data[0] :lessons="$data[0]['lessons']" :percentCourseCompleted="$data[0]['percentCompleted']" :nbLessonsCompleted="$data[0]['nbLessonsCompleted']" :showCongratulations="$data[0]['showCongratulations']">
    <div>
        <div class="sticky left-0 top-0 border-b-2 bg-white z-10">
            <h1 class="text-gray-800 font-bold text-xl">{{ $data[0]['lesson']->title }}</h1>
        </div>
        {!! $data[0]['lesson']->content !!}
    </div>
    <div class="sticky left-0 bottom-0 border-t-2 py-4 bg-white text-center z-20">
        <div class="flex justify-center items-center space-x-4">
            @if ($data[0]['lessonCompleted'])
                <form action="{{ route('student.courses.lessons.show', [$data[0]->slug, $data[0]['lesson']->id]) }}">
                    <x-primary-button
                        class="bg-white border-2 border-l-primary border-r-primary border-b-primary border-t-primary hover:bg-primary"
                        value="mark_incomplete" name="action"><span
                            class="text-gray-950 hover:text-white">{{ __('Mark Incomplete') }}</span></x-primary-button>
                </form>
                @php
                    $currentLesson = $data[0]['lesson']->id;

                    if (!is_null($data[0]['lesson']->next_lesson)) {
                        $currentLesson = $data[0]['lesson']->next_lesson;
                    }
                @endphp
                <form action="{{ route('student.courses.lessons.show', [$data[0]->slug, $currentLesson]) }}">
                    <x-primary-button value="continue" name="action">{{ __('Continue') }}</x-primary-button>
                </form>
            @else
                <form
                    action="{{ route('student.courses.lessons.show', [$data[0]->slug, !is_null($data[0]['lesson']->next_lesson) ? $data[0]['lesson']->next_lesson : $data[0]['lesson']->id]) }}">
                    <x-primary-button value="complete_and_continue, {{ $data[0]['lesson']->id }}"
                        name="action">{{ __('Complete & Continue') }}</x-primary-button>
                </form>
            @endif
        </div>
    </div>
</x-student.lesson-layout>
