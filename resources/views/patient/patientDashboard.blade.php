@extends('layouts.patientMasterPage')

@section('main')
    <div class="flex gap-x-1">
        <div class="flex flex-col w-5/6 gap-y-1 ">
            <div class="flex justify-center ">
                <div class="grid gap-x-1 md:grid-cols-2 lg:grid-cols-4 ">
                    <div class="w-full h-24 p-5 bg-white rounded-sm">
                        <div class="flex items-center space-x-1">
                            <div>
                                <div class="text-2xl font-medium text-gray-900"></div>
                                <div class="text-sm text-gray-400 w-36">Consultation Today</div>
                            </div>
                            <div>
                                <div class="flex items-center justify-center rounded-full h-7 w-7 bg-choiceBody">
                                    <ion-icon class="text-xl text-primary" name="videocam-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-24 p-5 bg-white rounded-sm">
                        <div class="flex items-center space-x-1">
                            <div>
                                <div class="text-2xl font-medium text-gray-900"></div>
                                <div class="text-sm text-gray-400 w-36">Pending</div>
                            </div>
                            <div>
                                <div class="flex items-center justify-center rounded-full h-7 w-7 bg-choiceBody">
                                    <ion-icon class="text-xl text-primary" name="hourglass-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-24 p-5 bg-white rounded-sm">
                        <div class="flex items-center space-x-1">
                            <div>
                                <div class="text-2xl font-medium text-gray-900"></div>
                                <div class="text-sm text-gray-400 w-36">Total Consultation</div>
                            </div>
                            <div>
                                <div class="flex items-center justify-center rounded-full h-7 w-7 bg-choiceBody">
                                    <ion-icon class="text-xl text-primary" name="hourglass-outline"></ion-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-24 p-5 bg-white rounded-sm">
                        <div class="flex items-center space-x-1">
                            <div>
                                <div class="text-2xl font-medium text-gray-900"></div>
                                <div class="text-sm text-gray-400 w-36">Patient</div>
                            </div>
                            <div>
                                <div class="flex items-center justify-center rounded-full h-7 w-7 bg-choiceBody">
                                    <ion-icon class="text-xl text-primary" name="people-outline"></ion-icon>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex h-10 gap-x-1">
                <div class="flex flex-col w-full h-full gap-y-1">
                    <div class="w-full p-2 font-medium bg-white rounded-xs">
                        <p class="">Appointments</p>
                    </div>

                    <div class="">
                        <div class="relative overflow-x-auto sm:rounded-sm">
                            <div
                                class="flex flex-wrap items-center justify-between py-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0 dark:bg-gray-900">

                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative mx-2">
                                    <div
                                        class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search-users"
                                        class="block pt-2 text-sm text-gray-900 border border-gray-300 rounded-sm ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search for users">
                                </div>
                            </div>
                            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Doctor</th>
                                        <th scope="col" class="px-6 py-3">Start Time</th>
                                        <th scope="col" class="px-6 py-3">End Time</th>
                                        <th scope="col" class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listTodayAppointments as $appointment)
                                        @php

                                            $now = \Carbon\Carbon::now();
                                            $startTime = \Carbon\Carbon::parse($appointment->start_time);
                                            $duration = $appointment->duration;
                                            $endTime = $startTime->copy()->addMinutes($duration);

                                            $isOngoing = $now->between($startTime, $endTime);
                                            $isUpcoming = $now->lessThan($startTime);
                                            $isPast = $now->greaterThan($endTime);
                                        @endphp
                                        @if ($now->isSameDay($startTime))
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    <img class="w-10 h-10 rounded-full"
                                                        src="{{ $appointment->doctor->image }}" alt="Doctor image">
                                                    <div class="ps-3">
                                                        <div class="text-base font-semibold">
                                                            {{ $appointment->doctor->first_name }}
                                                            {{ $appointment->doctor->last_name }}</div>
                                                        <div class="font-normal text-gray-500">
                                                            {{ $appointment->doctor->specialty->name }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4">{{ $startTime->format('h:i A') }}</td>
                                                <td class="px-6 py-4">{{ $endTime->format('h:i A') }}</td>
                                                <td class="px-6 py-4">
                                                    @if ($isUpcoming)
                                                        <button
                                                            class="text-white bg-gray-500 font-medium rounded-sm text-sm px-5 py-2.5">Go</button>
                                                    @elseif ($isOngoing)
                                                        <button
                                                            class="text-white bg-primary font-medium rounded-sm text-sm px-5 py-2.5">Go</button>
                                                    @elseif ($isPast)
                                                        <button
                                                            class="text-white bg-gray-500 font-medium rounded-sm text-sm px-5 py-2.5">End</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-1/3 h-screen gap-y-1 item-center">
            <div class="w-full max-w-sm p-6 bg-white rounded-sm dark:bg-gray-800 dark:border-gray-700">

                <div class="relative flex flex-col items-center pb-10">

                    <img class="object-cover w-24 h-24 mb-3 rounded-full shadow-lg"
                        src="{{ auth()->guard('patient')->user()->image }}" alt="" />


                    <p class="mb-1 text-xl font-medium text-gray-900 font-rubik dark:text-white ">
                        {{ auth()->guard('patient')->user()->firstname }} {{ auth()->guard('patient')->user()->lastname }}
                    </p>
                    @php
                        use Carbon\Carbon;
                        $currentTime = Carbon::now();
                        $birthDate = auth()->guard('patient')->user()->birth;
                        $birthDay = Carbon::parse($birthDate);

                        $age = $currentTime->diffInYears($birthDay);
                    @endphp
                    <p class="text-sm font-normal text-sideBcolor dark:text-gray-400 font-rubik">{{ $age }} y.o
                        {{ auth()->guard('patient')->user()->city }}</p>

                </div>
                <div class="flex justify-center gap-16">
                    <p class="font-light text-sideBcolor">
                        HEIGHT
                        <span
                            class="block text-xl font-medium leading-tight text-center text-gray-800">{{ auth()->guard('patient')->user()->height }}<span
                                class="text-base">
                                cm</span></span>
                    </p>
                    <p class="font-light text-sideBcolor">
                        BLOD
                        <span
                            class="block text-xl font-medium leading-tight text-center text-gray-800">{{ auth()->guard('patient')->user()->blood_type }}<span
                                class="text-base">
                            </span></span>
                    </p>
                    <p class="font-light text-sideBcolor">
                        WEIGHT
                        <span
                            class="block text-xl font-medium leading-tight text-center text-gray-800">{{ auth()->guard('patient')->user()->weight }}<span
                                class="text-base">
                                cm</span></span>
                    </p>
                </div>
            </div>
            {{-- <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Requestes<span
                        class="inline-flex items-center px-1.5 py-1 text-xs font-normal text-primary rounded-full bg-choiceBody ">
                        +135</span></p>
            </div>
     --}}
            <div class="bg-white ">


                {{-- <figure
                class="relative flex flex-col-reverse flex-wrap justify-center w-full bg-white rounded-sm x-4 dp-2">
                <blockquote class="w-full text-slate-700">
                    <div class="flex items-center w-full gap-x-2">

                    </div>
                </blockquote>
                <figcaption class="flex items-center p-2 space-x-4 border">
                    <div class="">
                        <div class="flex flex-col p-4 gap-y-2">
                            <p class="text-lg font-normal tracking-wider text-slate-900"> Online Appointment</p>
                            <div class="flex items-center gap-x-2">
                                <img src="" alt="" class="flex-none object-cover w-8 h-8 rounded-full"
                                    loading="lazy" decoding="async">
                                <p class="text-sm font-normal">
                                </p>
                            </div>
                            <div class="flex items-center w-full font-medium rounded-xs gap-x-1">
                                <p class="text-xs font-normal text-gray-600"></p>
                            </div>
                            <div class="flex items-center gap-1">
                                <ion-icon class="text-primary" name="hourglass-outline"></ion-icon>
                                <p class="font-normal text-sideBcolor">Consult Duration: <span
                                        class="text-black"></span><span class="text-primary">
                                        min</span></p>

                            </div>
                            <div class="flex items-center gap-1">
                                <ion-icon class="text-primary" name="time-outline"></ion-icon>
                                <p class="font-normal text-sideBcolor">Preferred Time Range: <span
                                        class="text-black"></span>
                                </p>

                            </div>
                        </div>
                    </div>
                </figcaption>
            </figure> --}}
            </div>
        </div>
    </div>
@endsection
