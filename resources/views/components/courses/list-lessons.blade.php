<div class="space-y-2">
    <p class="ms-3">{{ $lesson->title }}</p>
    <div class="flex items-center">
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
            class="ml-3 w-4 h-4 items-center my-auto">
            <path
                d="M5 18H15C16.1046 18 17 17.1046 17 16V8.57143V8C17 6.89543 16.1046 6 15 6H5C3.89543 6 3 6.89543 3 8V16C3 17.1046 3.89543 18 5 18Z"
                stroke="#000000" stroke-linecap="round" stroke-linejoin="round"></path>
            <circle cx="6.5" cy="9.5" r="0.5" stroke="#000000" stroke-linejoin="round"></circle>
            <path d="M17 10L21 7V17L17 14" stroke="#000000" stroke-linejoin="round">
            </path>
        </svg>
        <p class="ml-2 my-auto items-center uppercase text-xs text-gray-600">Video -
            {{ $lesson->duration }} Min
        </p>
    </div>
</div>
