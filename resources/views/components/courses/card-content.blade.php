<div>
    <h3 class="mt-4 text-md font-semibold text-gray-700">{{ $course->title }}</h3>

    @if (!empty($course->level))
        <span
            class="inline-flex items-center rounded-md bg-primary px-2 py-1 text-xs font-semibold text-white">{{ $course->level }}</span>
    @endif

    <div class="flex space-x-2 items-center pt-2">
        <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 0 64 64" class="w-4 h-4 items-center">
            <path fill="#000000"
                d="M62.828,29.172l-28-28C34.078,0.422,33.062,0,32,0H4C1.789,0,0,1.789,0,4v28 c0,1.062,0.422,2.078,1.172,2.828l28,28C29.953,63.609,30.977,64,32,64s2.047-0.391,2.828-1.172l28-28 C64.391,33.266,64.391,30.734,62.828,29.172z M20,28.004c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S24.418,28.004,20,28.004z">
            </path>
        </svg>
        <p class="mt-1 text-lg font-medium text-gray-900 items-center py-2 mb-1">€{{ $course->price }}</p>
    </div>
</div>
{{ $slot }}
