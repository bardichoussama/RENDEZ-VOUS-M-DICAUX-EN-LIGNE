@extends('layouts.patientMasterPage')

@section('main')
    <p class="text-3xl font-medium font-rubik">Doctors</p>
    <div class="">
        <div>
            <div class="flex w-full p-4 overflow-x-hidden gap-x-4">
                @foreach ($specialties as $specialty)
                    <button class="flex flex-col items-center w-40 p-3 text-center bg-white ">
                        <ion-icon class="text-3xl font-normal text-primary" name="heart-outline"></ion-icon>
                        <p class="font-medium text-gray-700">{{ $specialty->name }}</p>
                        <p class="text-xs text-sideBcolor">{{ $specialty->doctors_count }} doctors</p>
                    </button>
                @endforeach
            </div>

            <p class="mt-4 text-lg font-medium">{{ $totalDoctors }} Doctors</p>

            <div class="flex p-4 mt-4 gap-x-3">
                @foreach ($doctors as $doctor)
                <div class="text-sm leading-6 w-80">
                    <figure class="relative flex flex-col-reverse p-4 bg-white rounded-lg w-80">
                        <blockquote class="w-full mt-2 text-slate-700 ">
            
                            <div class="flex items-center w-full mt-4 gap-x-10">
                                <p class="w-20 text-sm font-medium "><span class="text-sm text-primary">$</span>
                                    {{ $doctor->consultation_price }}/30min</p>
                                <!-- Modal toggle -->
                                <button data-modal-target="crud-modal-{{ $doctor->id }}" data-modal-toggle="crud-modal-{{ $doctor->id }}"
                                    class="block px-2 py-2 text-sm font-normal text-center text-white rounded-sm bg-primary w-52 hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300"
                                    type="button">
                                    Request Appointment
                                </button>
            
                                <!-- Main modal -->
                                <div id="crud-modal-{{ $doctor->id }}" tabindex="-1" aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative w-full max-w-md max-h-full p-4">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                                    Send New Request
                                                </h3>
                                                <button type="button"
                                                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto "
                                                    data-modal-toggle="crud-modal-{{ $doctor->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
            
                                            <!-- Modal body -->
                                            <form id="form-{{ $doctor->id }}" class="p-4 md:p-5" method="POST" action="{{ route('requestAppointment', ['doctorId' => $doctor->id]) }}">
                                                @csrf
                                                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
            
                                                <div class="grid grid-cols-2 gap-4 mb-4">
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Appointment Duration</label>
                                                        <input type="number" name="duration" id="Appointmentduration-{{ $doctor->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="30">
                                                        @error('duration')
                                                            <div class="text-xs text-red-500">{{ $message }}</div>
                                                        @enderror
                                                    </div>
            
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <label for="preferred_time_range" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Preferred Time Range</label>
                                                        <select name="preferred_time_range" id="preferred_time_range-{{ $doctor->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="start_of_week">Start of Week</option>
                                                            <option value="midweek">Midweek</option>
                                                            <option value="end_of_week">End of Week</option>
                                                            <option value="next_week">Next Week</option>
                                                        </select>
                                                        @error('preferred_time_range')
                                                            <div class="text-xs text-red-500">{{ $message }}</div>
                                                        @enderror
                                                    </div>
            
                                                    <div class="col-span-2">
                                                        <label for="appMessage" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Appointment Message</label>
                                                        <textarea id="description_{{ $doctor->id }}" rows="4" name="appMessage" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write appointment description here"></textarea>
                                                        @error('appMessage')
                                                            <div class="text-xs text-red-500">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
            
                                                <button type="submit" class="text-white inline-flex items-center bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-blue-300 font-normal rounded-lg text-sm px-5 py-2.5 text-center">
                                                    Send
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                        <figcaption class="flex items-center space-x-4">
                            <div class="flex flex-col items-center gap-y-2">
                                <img src="{{ $doctor->image }}"
                                    alt="" class="flex-none object-cover rounded-full w-14 h-14" loading="lazy" decoding="async">
                                <span class="flex justify-center w-11 py-0.5 text-xs font-medium text-white rounded-full bg-primary">
                                    ★ 4.5 </span>
                            </div>
                            <div>
                                <p class="text-lg font-medium text-slate-900">{{ $doctor->first_name }} {{ $doctor->last_name }}</p>
                                <p class="text-sm font-normal text-sideBcolor">{{ $doctor->specialty->name }}</p>
            
                                <div class="flex items-center w-full mt-2 font-medium rounded-xs gap-x-1">
                                    <p class="text-lg text-primary">•</p>
                                    <p class="text-xs font-normal">5 yrs of ex.</p>
                                </div>
                                <div class="flex items-center w-full font-medium rounded-xs gap-x-1">
                                    <p class="text-lg text-primary">•</p>
                                    <p class="text-xs font-normal">+{{ $doctor->nbAppointments }} Appointments.</p>
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            
            </div>

        </div>

    </div>
@endsection
