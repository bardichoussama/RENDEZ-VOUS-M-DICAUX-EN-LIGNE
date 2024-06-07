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

                </div>
                @if ($doctorInfo)
                    <div class="relative flex flex-col items-center pb-10">

                        <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ $doctorInfo->image }}"
                            alt="" />
                        <span
                            class="inline-flex items-center px-1.5 py-1 text-xs font-semibold text-white rounded-full bg-primary absolute mt-20">
                            ★ 4.5
                        </span>

                        <p class="mb-1 text-xl font-medium text-gray-900 font-rubik dark:text-white ">
                            Dr.{{ $doctorInfo->first_name }} {{ $doctorInfo->last_name }}</p>
                        <p class="text-xs font-normal text-sideBcolor dark:text-gray-400 font-rubik">
                            {{ $doctorInfo->specialty->name }}</p>

                    </div>
            </div>
            <div class="p-2 font-medium bg-white rounded-xs">
                <p class="">Socials</p>
            </div>
            <div class="flex p-2 bg-white justify-evenly rounded-xs ">
                <a href="{{ $doctorInfo->linkedin }}"><ion-icon class="text-primary" name="logo-linkedin"></ion-icon></a>
                <a href="{{ $doctorInfo->instagram }}"><ion-icon class="text-primary" name="logo-instagram"></ion-icon></a>
                <a href="{{ $doctorInfo->facebook }}"><ion-icon class="text-primary" name="logo-facebook"></ion-icon></a>




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
                        <p class="text-xs font-normal"><span class="text-lg text-primary">•</span>
                            {{ $doctorInfo->years_of_exp }} yrs of ex.</p>
                        <p class="text-xs font-normal"><span class="text-lg text-primary">•</span> 300+ online consultation
                        </p>
                    </div>
                </div>
                <div class="">
                    <p class="text-xs text-gray-800">About Me</p>
                    <div class="flex w-full p-2 font-medium bg-white rounded-xs gap-x-40">
                        <p class="text-xs font-normal text-sideBcolor"> {{ $doctorInfo->about }}.</p>
                    </div>

                </div>

            </div>
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Contact</p>
            </div>
            <div class="flex justify-around w-full p-2 font-medium bg-white rounded-xs">
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="location-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ $doctorInfo->address }}</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="mail-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ $doctorInfo->email }}</p>
                </div>
                <div class="flex items-center gap-x-1">
                    <ion-icon class="text-sm font-normal text-primary" name="call-outline"></ion-icon>
                    <p class="text-xs font-normal text-gray-800">{{ $doctorInfo->phone }}</p>
                </div>

            </div>
            @endif


        </div>
        <div class="flex flex-col w-1/4 h-screen gap-y-1 ">
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Reviwes <span
                        class="inline-flex items-center justify-center px-1.5 py-1 text-xs w-7  font-medium text-primary rounded-lg bg-choiceBody ">
                        {{ $doctorInfo->reviews_count }}  </span></p>
            </div>
            <div class="flex flex-col w-full h-full p-2 font-medium bg-white rounded-xs gap-y-2">
                @foreach ($doctorInfo->reviews as $review)
                    <div class="h-auto mx-1 border border-gray-200 shadow-sm">
                        <div class="flex items-center w-full mx-1 my-1 overflow-hidden gap-x-3">
                            <img class="object-cover w-12 h-12 mb-3 rounded-full shadow-lg"
                                src="{{ $review->patient->image }}" alt="" />
                            <p class="block text-sm font-normal">{{ $review->patient->firstname }}
                                {{ $review->patient->lastname }}<span
                                    class="block text-xs normale text-sideBcolor">{{ $review->created_at }}</span></p>
                            <span
                                class="inline-flex items-center px-1.5 py-0.5 text-xs font-medium text-white rounded-full bg-primary ml-14">
                                ★ {{ $review->rating }}
                            </span>

                        </div>
                        <p class="mx-2 my-2 text-sm font-normal text-gray-600">{{ $review->review }}.</p>
                    </div>
                @endforeach

            </div>


        </div>

    </div>
@endsection
