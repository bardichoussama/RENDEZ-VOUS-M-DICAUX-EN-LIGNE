@extends('layouts.patientMasterPage')

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
                            <li><a href="{{ route('patientApointmentsView') }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">All Status</a></li>
                            <li><a href="{{ route('patientApointmentsView', ['status' => 'pending']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Pending</a></li>
                            <li><a href="{{ route('patientApointmentsView', ['status' => 'confirmed']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Confirmed</a></li>
                            <li><a href="{{ route('patientApointmentsView', ['status' => 'completed']) }}"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Completed</a></li>
                            <li><a href="{{ route('patientApointmentsView', ['status' => 'cancelled']) }}"
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
                        <th scope="col" class="px-4 py-3">Id Appointment</th>
                        <th scope="col" class="px-4 py-3">Doctor Full Name</th>
                        <th scope="col" class="px-4 py-3">Appointment Date</th>
                        <th scope="col" class="px-4 py-3">Start Time</th>
                        <th scope="col" class="px-4 py-3">End Time</th>
                        <th scope="col" class="px-4 py-3">Consultation Price</th>
                        <th scope="col" class="px-4 py-3">Status</th>
                        <th scope="col" class="px-4 py-3">Meeting Link</th>
                        <th scope="col" class="px-4 py-3">Message of Reject</th>
                        <th scope="col" class="px-4 py-3">Review</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">#{{ $appointment->appointment_id }}</td>
                            <td class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="{{ $appointment->doctor->image }}" alt="Doctor image">
                                <div class="ps-3">
                                    <div class="text-base font-semibold">{{ $appointment->doctor->first_name }} {{ $appointment->doctor->last_name }}</div>
                                    <div class="font-normal text-gray-500">{{ $appointment->doctor->specialty->name }}</div>
                                </div>
                            </td>
                            @php
                                $duration = $appointment->duration;
                                $startTime = \Carbon\Carbon::parse($appointment->start_time);
                                $endTime = $startTime->copy()->addMinutes($duration);
                                $now = \Carbon\Carbon::now();
                            @endphp
                            <td class="px-6 py-4">{{ $appointment->appointment_date }}</td>
                            <td class="px-6 py-4">{{ $appointment->status !== 'pending' && $appointment->status !== 'cancelled' ? $startTime->format('H:i') : '-' }}</td>
                            <td class="px-6 py-4">{{ $appointment->status !== 'pending' && $appointment->status !== 'cancelled' ? $endTime->format('H:i') : '-' }}</td>
                            <td class="px-6 py-4">{{ $appointment->price }}</td>
                            <td class="px-6 py-4">
                                @if ($appointment->status == 'pending')
                                    <span class="px-2 py-1 text-xs font-medium leading-tight text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                                @elseif ($appointment->status == 'confirmed')
                                    <span class="px-2 py-1 text-xs font-medium leading-tight text-green-700 bg-green-100 rounded-full">Confirmed</span>
                                @elseif ($appointment->status == 'completed')
                                    <span class="px-2 py-1 text-xs font-medium leading-tight text-blue-700 bg-blue-100 rounded-full">Completed</span>
                                @elseif ($appointment->status == 'cancelled')
                                    <span class="px-2 py-1 text-xs font-medium leading-tight text-red-700 bg-red-100 rounded-full">Cancelled</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if ($appointment->status == 'confirmed' || $appointment->status == 'completed')
                                    <a href="{{ $appointment->meeting_link }}" class="text-blue-600 hover:underline">Join Meeting</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $appointment->status === 'cancelled' ? $appointment->reject_reason : '-' }}</td>
                            <td class="px-6 py-4">
                                @if ($appointment->status === 'completed')
                                    <!-- Modal toggle -->
                                    <button data-modal-target="crud-modal-{{ $appointment->id }}" data-modal-toggle="crud-modal-{{ $appointment->id }}"
                                        class="block text-white bg-primary hover:bg-third focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                        type="button">
                                        Make Review
                                    </button>
                                    <!-- Main modal -->
                                    <div id="crud-modal-{{ $appointment->id }}" tabindex="-1" aria-hidden="true"
                                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative w-full max-w-md max-h-full p-4">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Leave a Review</h3>
                                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal-{{ $appointment->id }}">
                                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                        </svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <form class="p-4 md:p-5" method="POST" action="{{ route('reviews.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                                                    <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}">
                                                    <input type="hidden" name="patient_id" value="{{ $appointment->patient->id }}">
                                                    <div class="grid grid-cols-2 gap-4 mb-4">
                                                        <div class="col-span-2 sm:col-span-1">
                                                            <label for="rating" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rate</label>
                                                            <input type="number" name="rating" id="rating" min="1" max="5"
                                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-sm focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                                placeholder="Rate between 1 and 5" required>
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="review" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Review</label>
                                                            <textarea id="review" name="review" rows="4"
                                                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                                placeholder="Write your review here" required></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-third focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-5 h-5 me-1 -ms-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                                                        </svg>
                                                        Add Review
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button class="block text-white bg-gray-400  focus:ring-4 focus:outline-none font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" disabled>
                                        Make Review
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection
