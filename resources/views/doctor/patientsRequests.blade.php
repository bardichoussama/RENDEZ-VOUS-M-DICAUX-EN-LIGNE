@extends('layouts.doctorMasterPage')

@section('main')
    <p class="text-2xl font-medium font-rubik">Patients Requestes</p>



    <div class="flex flex-col w-full gap-y-1" style="height: 690px">
        <div class="w-full p-2 font-medium bg-white rounded-xs">
            <p class="">Requestes<span
                    class="inline-flex items-center px-1.5 py-1 text-xs font-normal text-primary rounded-full bg-choiceBody ">
                    +135</span></p>
        </div>
        <div class="flex flex-col w-full h-full p-2 font-medium bg-white rounded-xs">
            <div class="flex text-sm leading-6 w-96 gap-x-3">
                <figure
                    class="relative flex flex-col-reverse flex-wrap justify-center p-4 mx-4 my-4 bg-white border rounded-lg w-96">

                    <blockquote class="w-full text-slate-700 ">

                        <div class="flex items-center w-full gap-x-2">

                            <!-- Modal toggle -->
                            <button id="dropdownTimepickerButton" data-dropdown-toggle="dropdownTimepicker"
                                class="flex items-center justify-center px-2 py-2 text-sm font-medium text-center rounded-sm gap-x-1 text-primary bg-choiceBody w-52 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                type="button">
                                <ion-icon class="font-medium" name="checkmark-circle"></ion-icon>
                                Accept
                            </button>
                            <div id="dropdownTimepicker" class="z-10 hidden w-auto p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                                <div class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4 mb-2">
                                    <div>
                                        <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start time:</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <input type="time" id="start-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
                                        </div>
                                    </div>
                                    <div>
                                        <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End time:</label>
                                        <div class="relative">
                                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                                </svg>
                                            </div>
                                            <input type="time" id="end-time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
                                        </div>
                                    </div>
                                </div>
                                <button id="saveTimeButton" type="button" class="p-0 text-sm text-blue-700 dark:text-blue-500 hover:underline">Save time</button>
                            </div>




                            <!-- Main modal -->

                            <button
                                class="flex items-center justify-center px-2 py-2 text-sm font-medium text-center rounded-sm gap-x-1 text-rejectText bg-rejectBg w-52 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                name="reject">
                                <ion-icon class="font-medium" name="close-circle"></ion-icon>
                                Reject</button>


                    </blockquote>
                    <figcaption class="flex items-center space-x-4">

                        <div class="">
                            <p class="text-base font-medium ">27/07/2001</p>
                            <div class="flex flex-col p-4 gap-y-2">
                                <p class="text-lg font-normal tracking-wider text-slate-900"> Online Appointment
                                </p>
                                <div class="flex items-center gap-x-2">
                                    <img src="{{ asset('assets/img/docprofile.jpg') }}" alt=""
                                        class="flex-none object-cover w-8 h-8 rounded-full" loading="lazy" decoding="async">

                                    <p class="text-sm font-normal">Emilia Clark</p>

                                </div>
                                <div class="flex items-center w-full font-medium rounded-xs gap-x-1 ">
                                    <p class="text-xs font-normal text-gray-600">I diagnose and treat allergies and immune
                                        system
                                        disorders,
                                        helping patients managesymptoms and
                                        improve their quality of life.</p>
                                </div>
                                <div class="flex items-center gap-1 ">
                                    <ion-icon class="text-primary" name="hourglass-outline"></ion-icon>
                                    <p class="font-normal text-sideBcolor">Consult Duration: <span
                                            class="text-black">4</span><span class="text-primary">H</span></p>
                                </div>
                            </div>

                        </div>
                    </figcaption>
                </figure>
            </div>



        </div>




    </div>
@endsection
{{--  --}}
