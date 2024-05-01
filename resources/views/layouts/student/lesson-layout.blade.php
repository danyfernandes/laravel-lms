<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="icon" type="image/x-icon" href="/images/favicon.png" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-gray-100">
    @php
        $widthPercentClass = 'width:' . $percentCourseCompleted . '%';
    @endphp

    {{-- ASIDE AND NAVBAR --}}
    <header x-data="{ open: false }" class="lg:rounded ">
        <nav class="lg:hidden flex justify-between lg:flex-col p-2 bg-primary">
            {{-- HAMBURGER BUTTON --}}
            <button @click="open = !open" class="my-auto text-white p-2 bg-primary rounded-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            {{-- LOGO --}}
            <div class="lg:w-full">
                <div class="max-w-16 lg:max-w-24 lg:mx-auto">
                    <a href="{{ route('student.dashboard') }}">
                        <svg class="h-8 w-auto text-white lg:h-12 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                fill="currentColor" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>

        <div class="flex">
            <aside class="lg:w-[600px] bg-gray-100 fixed overflow-x-hidden overflow-y-auto z-50"
                :class="open ? 'h-full w-full lg:flex lg:flex-col' :
                    'hidden lg:flex lg:flex-col h-full '">
                {{-- COURSE CARD INFO ITEM --}}
                <div class="lg:rounded-xl bg-white shadow-2xl border-2 border-gray-100 m-2">
                    {{-- LOGO IN CART FOR SMALL SCREENS --}}
                    <div class="hidden bg-secondary lg:w-full lg:flex lg:rounded-t-md py-2">
                        <div class="max-w-16 lg:max-w-20 lg:mx-auto">
                            <a href="{{ route('student.dashboard') }}">
                                <svg class="h-8 w-auto text-white lg:h-12 lg:text-[#FF2D20]" viewBox="0 0 62 65"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z"
                                        fill="currentColor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    {{-- GO TO DASHBOARD --}}
                    <div class="p-4 space-y-4">
                        <a href="{{ route('student.dashboard') }}"
                            class="flex items-center space-x-1 text-gray-600 fill-gray-600 text-xs hover:text-primary hover:fill-primary">
                            <svg version="1.1" viewBox="0 0 512 512" class="w-5">
                                <path
                                    d="M189.3,128.4L89,233.4c-6,5.8-9,13.7-9,22.4c0,8.7,3,16.5,9,22.4l100.3,105.4c11.9,12.5,31.3,12.5,43.2,0  c11.9-12.5,11.9-32.7,0-45.2L184.4,288h217c16.9,0,30.6-14.3,30.6-32c0-17.7-13.7-32-30.6-32h-217l48.2-50.4  c11.9-12.5,11.9-32.7,0-45.2C220.6,115.9,201.3,115.9,189.3,128.4z" />
                            </svg>
                            <p class="pt-0.5">{{ __('Go to Dashboard') }}</p>
                        </a>
                        {{-- COURSE TITLE --}}
                        <h1 class="text-3xl">{{ $course->title }}</h1>

                        {{-- PERCENT OF COURSE COMPLETED --}}
                        <div>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mb-2 mx-0.5">
                                <div class='bg-primary h-1.5 rounded-full' style="{{ $widthPercentClass }}"></div>
                            </div>
                            <div class="mb-1 text-sm font-medium mx-0.5"><span
                                    class="font-semibold">{{ $percentCourseCompleted }}%</span> complete
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-2 mx-4">
                    <div class="flex text-lg items-center border-b-2 border-b-primary mx-2 py-3">
                        <!-- Circle -->
                        <div class="flex items-center justify-center mr-2" x-data="{ circumference: 2 * 22 / 7 * 20 }">
                            <svg class="transform -rotate-90 w-12 h-12">
                                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="4"
                                    fill="transparent" class="text-gray-400" />

                                <circle cx="24" cy="24" r="20" stroke="currentColor" stroke-width="4"
                                    fill="transparent" :stroke-dasharray="circumference"
                                    :stroke-dashoffset="circumference - {{ $percentCourseCompleted }} / 100 * circumference"
                                    class="text-primary" />
                            </svg>
                            <span class="absolute text-xs font-semibold"> {{ $percentCourseCompleted }}%</span>
                        </div>
                        <h2 class="font-semibold ms-1">{{ $course->title }}</h2>
                        <p class="right-0">
                            <span>{{ $nbLessonsCompleted }}</span>/<span>{{ count($lessons) }}</span>
                        </p>
                    </div>
                </div>

                <ul class="font-medium mb-20 lg:mb-4">
                    @foreach ($lessons as $lesson)
                        <x-student.lesson-nav-link :href="route('student.courses.lessons.show', [$course->slug, $lesson->id])" :active="request()->is('dashboard/courses/' . $course->slug . '/lessons/' . $lesson->id)"
                            class="flex items-center group py-6">
                            <li class="flex items-center mx-2">
                                <!-- Circle -->
                                <div class="flex items-center justify-center mr-2">
                                    <svg class="transform -rotate-90 w-12 h-12">
                                        <circle cx="24" cy="24" r="15" stroke="currentColor"
                                            stroke-width="3" fill="transparent" @class([
                                                'text-gray-400' => !$lesson['completed'],
                                                'text-primary' => $lesson['completed'],
                                            ]) />
                                    </svg>
                                    @if ($lesson['completed'])
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="absolute w-10 h-10">
                                            <path d="M17 9L9.99998 16L6.99994 13" stroke="#dc1c75" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    @endif
                                </div>
                                <x-courses.list-lessons :lesson=$lesson />
                            </li>
                        </x-student.lesson-nav-link>
                    @endforeach
                </ul>
            </aside>
            <div class="w-full m-4" :class="open ? 'hidden lg:flex' :
                ''">
                <div class="lg:ml-[600px] bg-white shadow-lg grow mx-auto rounded-xl">
                    <div class="p-4 ">
                        {{ $slot }}
                    </div>
                </div>
            </div>

            <x-congratulations show="{{ $showCongratulations }}" name="show-congratulations" focusable>
                <div class="fixed z-10 inset-0 overflow-y-auto" id="modal">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <div class="bg-white rounded-lg p-8 max-w-md mx-auto overflow-hidden shadow-xl transform transition-all sm:w-full sm:mx-0"
                            role="dialog" aria-modal="true" aria-labelledby="modal-headline">


                            <button type="button" class="absolute top-4 right-4" x-on:click="$dispatch('close')">
                                <span class="sr-only">Close panel</span>
                                <svg class="h-6 w-6 stroke-black hover:fill-primary hover:stroke-primary"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>

                            <div class="text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 550.688 550.688" xml:space="preserve"
                                    class="w-64 h-64 fill-yellow-500 mx-auto">
                                    <path
                                        d="M38.166,240.824c13.03,9.92,26.833,17.384,41.616,24.305c6.772,2.969,13.574,5.86,20.41,8.679 c14.07,5.891,21.083,11.646,30.787,19.938c3.853,3.296,3.85,2.837-1.129,1.889c-15.986-3.045-29.578,21.637-13.685,34.979 c16.12,13.531,34.728,11.062,50.245-2.068c4.697-3.975,7.638-8.672,9.223-13.739c1.515-4.838,3.877-5.707,6.992-1.708 c16.713,21.463,34.911,38.504,54.14,48.587c4.489,2.356,8.311,8.002,8.311,13.072v57.632c0,1.766,0.178,3.485,0.496,5.156 c0.535,2.815-2.733,5.003-7.8,5.003h-38.097c-12.537,0-22.699,10.162-22.699,22.699v36.433c0,12.537,10.166,22.699,22.699,22.699 h151.335c12.536,0,22.699-10.162,22.699-22.699v-36.433c0-12.537-10.166-22.699-22.699-22.699h-38.098 c-5.07,0-8.335-2.185-7.8-5.003c0.318-1.671,0.496-3.391,0.496-5.156v-57.632c0-5.07,3.822-10.716,8.311-13.072 c19.229-10.083,37.427-27.124,54.141-48.587c3.115-3.999,5.478-3.13,6.992,1.708c1.585,5.067,4.526,9.761,9.223,13.739 c15.518,13.13,34.126,15.6,50.245,2.068c15.895-13.342,2.302-38.023-13.684-34.979c-4.979,0.948-4.982,1.407-1.129-1.889 c9.703-8.292,16.716-14.048,30.786-19.938c6.836-2.818,13.639-5.71,20.41-8.679c14.783-6.921,28.584-14.385,41.616-24.305 c23.137-17.613,34.241-45.101,37.54-73.082c5.823-49.437-29.762-90.481-74.027-104.646c-4.829-1.545-8.323-6.518-7.824-11.563 c0.551-5.569,0.936-10.93,1.15-16.047c0.211-5.064-3.911-9.177-8.981-9.177H90.312c-5.07,0-9.192,4.109-8.981,9.177 c0.214,5.117,0.6,10.478,1.147,16.047c0.499,5.046-2.996,10.021-7.824,11.567C30.388,77.261-5.197,118.305,0.626,167.742 C3.922,195.723,15.03,223.21,38.166,240.824z M410.761,243.21c21.405-43.55,38.026-92.231,48.052-136.044 c1.132-4.942,5.954-7.879,10.605-5.86c45.555,19.768,62.963,83.7,12.724,115.126c-19.357,12.108-45.82,18.868-67.556,30.392 C410.109,249.202,408.527,247.761,410.761,243.21z M278.244,83.442h31.665v213.254h-35.875V118.06h-0.842L225.5,143.794 l-7.164-28.278L278.244,83.442z M81.27,101.306c4.651-2.02,9.474,0.918,10.606,5.86c10.024,43.816,26.646,92.498,48.051,136.048 c2.237,4.55,0.652,5.988-3.825,3.61c-21.735-11.524-48.198-18.283-67.556-30.392C18.304,185.006,35.715,121.074,81.27,101.306z">
                                    </path>
                                </svg>
                                <h3 class="mt-4 text-lg leading-6 font-medium text-gray-900">
                                    <p>{{ __('Congratulations ') }} <span class="text-primary">
                                            {{ Auth::user()->name }}</span></p>
                                </h3>
                                <div class="mt-4 text-sm font-light text-gray-900 space-y-2">
                                    <p>You watched all the lessons for this
                                        course!</p>
                                    <p>Please give us a feedback!</p>
                                </div>
                                <div class="mt-8">
                                    <a href="{{ route('student.courses.reviews.create', [$course->slug]) }}"
                                        class="inline-block bg-primary hover:bg-secondary text-white font-bold py-2 px-4 rounded-full animate-bounce">Leave
                                        a review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-congratulations>
    </header>
</body>

</html>
