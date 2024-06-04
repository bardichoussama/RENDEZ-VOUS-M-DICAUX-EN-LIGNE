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
                @foreach ($requestsList as $req)
                    <figure
                        class="relative flex flex-col-reverse flex-wrap justify-center p-4 mx-4 my-4 bg-white border rounded-lg w-96">
                        <blockquote class="w-full text-slate-700">
                            <div class="flex items-center w-full gap-x-2">
                                <!-- Accept Button -->
                                <button type="button" data-modal-target="timepicker-modal-{{ $req->appointment_id }}"
                                    data-modal-toggle="timepicker-modal-{{ $req->appointment_id }}"
                                    class="flex items-center justify-center px-2 py-2 text-sm font-medium text-center rounded-sm gap-x-1 text-primary bg-choiceBody w-52 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                    <ion-icon class="font-medium" name="checkmark-circle"></ion-icon> Accept
                                </button>
                                <!-- Main modal -->
                                <div id="timepicker-modal-{{ $req->appointment_id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-w-[23rem] max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Schedule an
                                                    appointment</h3>
                                                <button type="button"
                                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="timepicker-modal-target="timepicker-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 pt-0">
                                                <form method="POST"
                                                    action="{{ route('editAppointments', $req->appointment_id) }}">
                                                    @csrf
                                                    <div class="relative max-w-sm">
                                                        <div
                                                            class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path
                                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                            </svg>
                                                        </div>
                                                        <input name="appointment_date" type="date"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            placeholder="Select date">
                                                    </div>
                                                    <div class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4 mb-7">
                                                        <div>
                                                            <label for="start-time-{{ $req->appointment_id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start
                                                                time:</label>
                                                            <div class="relative">
                                                                <div
                                                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                                <input name="start_time" type="time"
                                                                    
                                                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                                                     required />
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label for="end-time-{{ $req->appointment_id }}"
                                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">End
                                                                time:</label>
                                                            <div class="relative">
                                                                <div
                                                                    class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                                                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 24 24">
                                                                        <path fill-rule="evenodd"
                                                                            d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>
                                                                <input name="end_time" type="time"
                                                                    id="end-time-{{ $req->appointment_id }}"
                                                                    class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
                                                                   " required />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-cols-2 gap-2">
                                                        <button type="submit"
                                                            class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
                                                        
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Reject Form -->
                                <form method="POST" action="{{ route('dropAppointments', $req->appointment_id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="flex items-center justify-center px-2 py-2 text-sm font-medium text-center rounded-sm gap-x-1 text-rejectText bg-rejectBg w-52 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                        name="reject">
                                        <ion-icon class="font-medium" name="close-circle"></ion-icon> Reject
                                    </button>
                                </form>
                            </div>
                        </blockquote>
                        <figcaption class="flex items-center space-x-4">
                            <div class="">
                                <p class="text-base font-medium">{{ $req->requested_date }}</p>
                                <div class="flex flex-col p-4 gap-y-2">
                                    <p class="text-lg font-normal tracking-wider text-slate-900"> Online Appointment</p>
                                    <div class="flex items-center gap-x-2">
                                        <img src="{{ asset('assets/img/docprofile.jpg') }}" alt=""
                                            class="flex-none object-cover w-8 h-8 rounded-full" loading="lazy"
                                            decoding="async">
                                        <p class="text-sm font-normal">Emilia Clark</p>
                                    </div>
                                    <div class="flex items-center w-full font-medium rounded-xs gap-x-1">
                                        <p class="text-xs font-normal text-gray-600">I diagnose and treat allergies and
                                            immune system disorders, helping patients manage symptoms and improve their
                                            quality of life.</p>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <ion-icon class="text-primary" name="hourglass-outline"></ion-icon>
                                        <p class="font-normal text-sideBcolor">Consult Duration: <span
                                                class="text-black">4</span><span class="text-primary">H</span></p>
                                    </div>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach


            </div>
        </div>







    </div>
@endsection
