@extends('layouts.doctorMasterPage')

@section('main')
    <div class="flex gap-x-1">
        <div class="flex flex-col w-5/6 gap-y-1 ">
            <div class="flex justify-center ">
                <div class="grid gap-x-1 md:grid-cols-2 lg:grid-cols-4 ">
                    <div class="w-full h-24 p-5 bg-white rounded-sm">
                        <div class="flex items-center space-x-1">
                            <div>
                                <div class="text-2xl font-medium text-gray-900">{{ $todayConsultationsCount }}</div>
                                <div class="text-sm text-gray-400 w-36">Consultation Today</div>
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
                                <div class="text-2xl font-medium text-gray-900">14</div>
                                <div class="text-sm text-gray-400 w-36">Consultation Today</div>
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
                                <div class="text-2xl font-medium text-gray-900">14</div>
                                <div class="text-sm text-gray-400 w-36">Consultation Today</div>
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
                                <div class="text-2xl font-medium text-gray-900">14</div>
                                <div class="text-sm text-gray-400 w-36">Consultation Today</div>
                            </div>
                            <div>
                                <div class="flex items-center justify-center rounded-full h-7 w-7 bg-choiceBody">
                                    <ion-icon class="text-xl text-primary" name="hourglass-outline"></ion-icon>
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
                                        <th scope="col" class="px-6 py-3">Patient</th>
                                        <th scope="col" class="px-6 py-3">Start Time</th>
                                        <th scope="col" class="px-6 py-3">End Time</th>
                                        <th scope="col" class="px-6 py-3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($appointments as $appointment)
                                        @php
                                            $currentTime = Carbon\Carbon::now();
                                            $startTime = Carbon\Carbon::parse($appointment->start_time);
                                            $endTime = Carbon\Carbon::parse($appointment->end_time);
                                            $isInProgress = $currentTime->between($startTime, $endTime);
                                        @endphp
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                <img class="w-10 h-10 rounded-full"
                                                    src="{{ $appointment->patient->image ?? 'default-avatar.png' }}"
                                                    alt="Patient image">
                                                <div class="ps-3">
                                                    <div class="text-base font-semibold">
                                                        {{ $appointment->patient->firstname }}
                                                        {{ $appointment->patient->lastname }}</div>
                                                    <div class="font-normal text-gray-500">
                                                        {{ $appointment->patient->email }}</div>
                                                </div>
                                            </th>
                                            <td class="px-6 py-4">
                                                {{ $startTime->format('h:i A') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $endTime->format('h:i A') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                @if ($isInProgress)
                                                    <a href="{{ $appointment->meeting_link }}"
                                                        class="flex items-center justify-center px-2 py-1 font-medium text-white rounded-sm gap-x-1 bg-primary">
                                                        <ion-icon class="text-white" name="play-circle"></ion-icon> Start
                                                    </a>
                                                @else
                                                    <button
                                                        class="flex items-center justify-center px-2 py-1 font-medium text-white bg-gray-400 rounded-sm cursor-not-allowed gap-x-1"
                                                        disabled>
                                                        <ion-icon class="text-white" name="play-circle"></ion-icon> Start
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-1/3 gap-y-1">
            <div class="w-full p-2 font-medium bg-white rounded-xs">
                <p class="">Gender</p>
            </div>
            <div class="flex w-full gap-x-2">
                <div class="flex flex-col w-full bg-white rounded-sm dark:bg-gray-800 gap-y-1 ">

                    <div class="py-6" id="pie-chart"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
