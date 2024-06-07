@extends('layouts.patientMasterPage')

@section('main')
    <p class="text-2xl font-medium font-rubik">Profile</p>


    <div class="flex flex-wrap gap-x-1">
        <div class="flex flex-col w-3/12 gap-y-1 ">

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


                <div class="relative flex flex-col items-center pb-10">

                    <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg"
                        src="{{ auth()->guard('patient')->user()->image }}" alt="" />


                    <p class="mb-1 text-xl font-medium text-gray-900 font-rubik dark:text-white ">
                        {{ auth()->guard('patient')->user()->firstname }} {{ auth()->guard('patient')->user()->lastname }}
                    </p>
                    <p class="text-sm font-normal text-sideBcolor dark:text-gray-400 font-rubik">25 y.o
                        {{ auth()->guard('patient')->user()->city }}</p>


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
        <div class="flex flex-col gap-y-1" style="width: 920px">
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Genaral Info</p>
            </div>
            <div class="flex flex-col w-full p-2 font-medium bg-white rounded-xs" style="height: 201px">
                <div class="flex gap-x-36">

                    <div class="flex items-center w-48 p-2 font-medium bg-white rounded-xs gap-x-1 ">
                        <p class="text-lg text-primary">•</p>
                        <p class="text-xs font-medium">Gender :</p>
                        <p class="text-xs font-normal">{{ auth()->guard('patient')->user()->gender }}.</p>
                    </div>
                    <div class="flex items-center w-48 p-2 font-medium bg-white rounded-xs gap-x-1">
                        <p class="text-lg text-primary">•</p>
                        <p class="text-xs font-medium">Height :</p>
                        <p class="text-xs font-normal">{{ auth()->guard('patient')->user()->height }} cm.</p>
                    </div>
                    <div class="flex items-center font-medium bg-white w-48p-2 rounded-xs gap-x-1">
                        <p class="text-lg text-primary">•</p>
                        <p class="text-xs font-medium">Weight :</p>
                        <p class="text-xs font-normal">{{ auth()->guard('patient')->user()->weight }} kg</p>
                    </div>
                </div>
                <div class="flex gap-x-36">

                    <div class="flex items-center w-48 p-2 font-medium bg-white rounded-xs gap-x-1">
                        <p class="text-lg text-primary">•</p>
                        <p class="text-xs font-medium">Blode Type :</p>
                        <p class="text-xs font-normal">{{ auth()->guard('patient')->user()->blood_type }}</p>
                    </div>
                    <div class="flex items-center p-2 font-medium w-52 rounded-xs gap-x-1 ">
                        <p class="text-lg text-primary">•</p>
                        <p class="text-xs font-medium">Allergies :</p>
                        <p class="text-xs font-normal">{{ auth()->guard('patient')->user()->allergies }}</p>
                    </div>

                </div>
                <div class="mt-4">
                    <p class="text-xs text-gray-800">About Me</p>
                    <div class="flex w-full p-2 font-medium bg-white rounded-xs gap-x-40">
                        <p class="text-xs font-normal text-sideBcolor"> {{ auth()->guard('patient')->user()->bio }}</p>
                    </div>

                </div>

            </div>
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Contact</p>
            </div>
            <div class="flex justify-around w-full p-2 font-medium bg-white rounded-xs">
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="location-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ auth()->guard('patient')->user()->address }}</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="mail-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ auth()->guard('patient')->user()->email }}</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="call-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ auth()->guard('patient')->user()->phone }}</p>
                </div>

            </div>



        </div>


    </div>
@endsection
