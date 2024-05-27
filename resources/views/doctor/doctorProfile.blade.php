@extends('layouts.doctorMasterPage')

@section('main')
    <p class="text-2xl font-medium font-rubik">Profile</p>


    <div class="flex flex-wrap gap-x-1">
        <div class="flex flex-col w-72 gap-y-1 ">

            <div class="w-full max-w-sm bg-white rounded-xs dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5"
                        type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 16 3">
                            <path
                                d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2" aria-labelledby="dropdownButton">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export
                                    Data</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if ($doctorInfo)
                    <div class="relative flex flex-col items-center pb-10">

                        <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg"
                            src="{{ asset('assets/img/docprofile.jpg') }}" alt="" />
                        <span
                            class="inline-flex items-center px-1.5 py-1 text-xs font-semibold text-white rounded-full bg-primary absolute mt-20">
                            ★ 4.5
                        </span>

                        <p class="mb-1 text-xl font-medium text-gray-900 font-rubik dark:text-white ">
                            Dr.{{ $doctorInfo->first_name }} {{ $doctorInfo->last_name }}</p>
                        <p class="text-xs font-normal text-sideBcolor dark:text-gray-400 font-rubik"></p>

                    </div>
            </div>
            <div class="p-2 font-medium bg-white rounded-xs">
                <p class="">Socials</p>
            </div>
            <div class="flex p-2 bg-white justify-evenly rounded-xs ">
                <ion-icon class="text-primary" name="logo-linkedin"></ion-icon>
                <ion-icon class="text-primary" name="logo-instagram"></ion-icon>
                <ion-icon class="text-primary" name="logo-facebook"></ion-icon>

            </div>

        </div>
        <div class="flex flex-col w-3/6 gap-y-1">
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Genaral Info</p>
            </div>
            <div class="flex flex-col w-full p-2 font-medium bg-white gap-y-3 gap-w rounded-xs" style="height: 201px">
                <div class="">
                    <p class="text-xs text-gray-800">Experience</p>
                    <div class="flex w-full p-2 font-medium bg-white rounded-xs gap-x-40">
                        <p class="text-xs font-normal"><span class="text-lg text-primary">•</span> 5 yrs of ex.</p>
                        <p class="text-xs font-normal"><span class="text-lg text-primary">•</span> 300+ online consultation
                        </p>
                    </div>
                </div>
                <div class="">
                    <p class="text-xs text-gray-800">About Me</p>
                    <div class="flex w-full p-2 font-medium bg-white rounded-xs gap-x-40">
                        <p class="text-xs font-normal text-sideBcolor"> I diagnose and treat allergies and immune system
                            disorders, helping patients managesymptoms and
                            improve their quality of life.</p>
                    </div>

                </div>

            </div>
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Contact</p>
            </div>
            <div class="flex justify-around w-full p-2 font-medium bg-white rounded-xs">
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="location-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">Sidi Youssef Ben Ali</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="mail-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">namisan@gmail.com</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="call-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">+212 624658021</p>
                </div>

            </div>
            @endif


        </div>
        <div class="flex flex-col w-1/4 h-screen gap-y-1 ">
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Reviwes <span
                        class="inline-flex items-center px-1.5 py-1 text-xs font-normal text-primary rounded-full bg-secondary ">
                        +145 </span></p>
            </div>
            <div class="flex flex-col w-full h-full p-2 font-medium bg-white rounded-xs gap-y-2">
                <div class="h-auto mx-1 border border-gray-200 shadow-sm">
                    <div class="flex items-center w-full mx-1 my-1 overflow-hidden gap-x-3">
                        <img class="object-cover w-12 h-12 mb-3 rounded-full shadow-lg"
                            src="{{ asset('assets/img/patient.jpg') }}" alt="" />
                        <p class="block text-sm font-normal">Mimchel clark<span
                                class="block text-xs normale text-sideBcolor">10-05-2024</span></p>
                        <span
                            class="inline-flex items-center px-1.5 py-0.5 text-xs font-medium text-white rounded-full bg-primary ml-14">
                            ★ 4.5
                        </span>

                    </div>
                    <p class="mx-2 my-2 text-sm font-normal text-gray-600">I diagnose and treat allergies and immune system
                        disorders,
                        improve their quality of life.</p>
                </div>

            </div>


        </div>

    </div>
@endsection
