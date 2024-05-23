@extends('layouts.patientMasterPage')

@section('main')
    <p class="text-3xl font-medium font-rubik">Doctors</p>
    <div class="">
        <div>
            <div class="flex w-full p-4 overflow-x-hidden gap-x-4">
                @foreach ($getAllSpecialties as $specialty)
                    <button class="flex flex-col items-center w-40 p-3 text-center bg-white ">
                        <ion-icon class="text-3xl font-normal text-primary" name="heart-outline"></ion-icon>
                        <p class="font-medium text-gray-700">{{ $specialty->name }}</p>
                        <p class="text-xs text-sideBcolor">{{ $specialty->doctors_count }} doctors</p>
                    </button>
                @endforeach
            </div>

            <p class="mt-4 text-lg font-medium">{{ $getAlldoctors }} Doctors</p>

            <div class="flex p-4 mt-4 gap-x-3">
                <div class="text-sm leading-6  w-72">
                    <figure
                        class="relative flex flex-col-reverse p-4 bg-white rounded-lg w-full">
                        <blockquote class="mt-2  text-slate-700 dark:text-slate-300 ">
                           
                            <div class="flex items-center w-full mt-4 gap-x-24">
                                <p class="text-base font-medium"><span class="text-primary">$</span> 70</p>
                                <button class="p-2 text-xs text-white rounded-sm bg-primary">Book Appointment</button>
                            </div>
                          
                        </blockquote>
                        <figcaption class="flex items-center space-x-4">
                            <div class="flex flex-col items-center gap-y-2">
                                <img src="https://images.unsplash.com/photo-1632910121591-29e2484c0259?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NzEyNjZ8MHwxfHNlYXJjaHw4fHxjb2RlcnxlbnwwfDB8fHwxNzEwMTY0NjIzfDA&ixlib=rb-4.0.3&q=80&w=1080"
                                    alt="" class="flex-none object-cover rounded-full w-14 h-14" loading="lazy"
                                    decoding="async">
                                <span class=" flex justify-center w-11   py-0.5 text-xs font-medium text-white rounded-full bg-primary "> ★ 4.5 </span>
                            </div>
                            <div class="">
                            
                                    <p class="text-lg font-medium text-slate-900">Dr. David Hensly</p>                             
                                    <p class="text-sm font-normal text-sideBcolor">Dr. David Hensly</p>
                                <div class="flex items-center w-full font-medium rounded-xs gap-x-1 mt-2">
                                    <p class="text-lg text-primary">•</p>
                                    <p class="text-xs font-normal">5 yrs of ex.</p>                  
                                </div>
                                <div class="flex items-center w-full font-medium rounded-xs gap-x-1 ">
                                    <p class="text-lg text-primary">•</p>
                                    <p class="text-xs font-normal">+900 consultation.</p>                  
                                </div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
                


            </div>

        </div>

    </div>
@endsection
{{-- <div class="flex flex-col p-4 bg-white h-52 w-72">
    <div class="flex flex-col">
        <div class="flex items-center w-full mx-1 my-1 overflow-hidden gap-x-3 ">
            <div class="flex flex-col">
                <img class="object-cover mb-3 rounded-full shadow-lg h-14 w-14"
                    src="{{ asset('assets/img/patient.jpg') }}" alt="" />
                <div
                    class=" flex justify-center   py-0.5 text-xs font-medium text-white rounded-full bg-primary ">
                    ★ 4.5 </div>
            </div>
            <div >
                <p class="text-lg font-medium text-gray-900 ">David Helton</p>
                <p class="text-sm font-normal text-sideBcolor dark:text-gray-400 font-rubik">25 y.o
                    Marrakech</p>
            </div>
            
        </div>
    </div>
    <div class="flex items-center w-full p-2 font-medium bg-white rounded-xs gap-x-1 ml-11">
        <p class="text-lg text-primary">•</p>
        <p class="text-xs font-normal">5 yrs of ex.</p>                  
    </div>
    <div class="flex items-center mt-4 gap-x-20">
        <p class="text-base"><span class="text-primary">$</span> 70</p>
        <button class="p-2 text-sm text-white rounded-sm bg-primary">Book Appointment</button>
    </div>
</div> --}}
