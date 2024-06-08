@extends('layouts.doctorMasterPage')

@section('main')
    <div class="">
        <div class="relative overflow-x-auto sm:rounded-sm">
            <div
                class="flex flex-wrap items-center justify-between py-4 space-y-4 bg-white flex-column md:flex-row md:space-y-0 dark:bg-gray-900">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        @if ($status)
                            {{ ucfirst($status) }}
                        @else
                            All Status
                        @endif
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio"
                        class="z-10 hidden w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownRadioButton">
                            <li><a href="{{ route('doctorAppointmentsView') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">All Status</a></li>
                            <li><a href="{{ route('doctorAppointmentsView', ['status' => 'pending']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Pending</a></li>
                            <li><a href="{{ route('doctorAppointmentsView', ['status' => 'confirmed']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Confirmed</a></li>
                            <li><a href="{{ route('doctorAppointmentsView', ['status' => 'completed']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Completed</a></li>
                            <li><a href="{{ route('doctorAppointmentsView', ['status' => 'cancelled']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Cancelled</a></li>
                        </ul>
                    </div>
                </div>

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mx-2">
                    <div class="absolute inset-y-0 flex items-center pointer-events-none rtl:inset-r-0 start-0 ps-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block pt-2 text-sm text-gray-900 border border-gray-300 rounded-sm ps-10 w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-4 py-3 ">Id App</th>
                        <th scope="col" class="px-4 py-3">Patient Full Name</th>
                        <th scope="col" class="px-4 py-3">Email</th>
                        <th scope="col" class="px-4 py-3">Date</th>
                        <th scope="col" class="px-4 py-3">Start Time</th>
                        <th scope="col" class="px-4 py-3">End Time</th>
                        <th scope="col" class="px-4 py-3">Price</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Meeting Link</th>
                        <th scope="col" class="px-4 py-3">Message of Reject</th>
                  
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">#{{ $appointment->appointment_id }}</td>
                            <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $appointment->patient->firstname }} {{ $appointment->patient->lastname }}
                            </td>
                            <td class="px-6 py-4">{{ $appointment->patient->email }}</td>
                            @php
                                $duration = $appointment->duration;
                                $startTime = \Carbon\Carbon::parse($appointment->start_time);
                                $endTime = $startTime->copy()->addMinutes($duration);
                                $now = \Carbon\Carbon::now();
                            @endphp
                              
                            <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                            <td class="px-6 py-4">{{ $appointment->status !== 'pending' && $appointment->status !== 'cancelled' ? $startTime->format('H:i') : '-' }}</td>
                            <td class="px-6 py-4">{{ $appointment->status !== 'pending' && $appointment->status !== 'cancelled' ? $endTime->format('H:i') : '-' }}</td>
                            <td class="px-6 py-4">{{ $appointment->price }} $</td>
                            <td class="px-6 py-4">
                                @if ($appointment->status == 'pending')
                                    <span
                                        class="px-2 py-1 text-xs font-medium leading-tight text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                                @elseif ($appointment->status == 'confirmed')
                                    <span
                                        class="px-2 py-1 text-xs font-medium leading-tight text-green-700 bg-green-100 rounded-full">Confirmed</span>
                                @elseif ($appointment->status == 'completed')
                                    <span
                                        class="px-2 py-1 text-xs font-medium leading-tight text-blue-700 bg-blue-100 rounded-full">Completed</span>
                                @elseif ($appointment->status == 'cancelled')
                                    <span
                                        class="px-2 py-1 text-xs font-medium leading-tight text-red-700 bg-red-100 rounded-full">Cancelled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($appointment->status == 'confirmed' || $appointment->status == 'completed')
                                    <a href="{{ $appointment->meeting_link }}" class="text-blue-600 hover:underline">Join Meeting</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $appointment->reject_reason }}</td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
