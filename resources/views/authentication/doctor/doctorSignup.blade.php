@extends('layouts.doctorMasterPage')
@section('main')
    <div class="flex items-center w-full h-full gap-x-4">
        <div class="w-1/2 h-full p-6 bg-white rounded-sm shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <a class="flex-none text-2xl font-bold text-gray-800 dark:text-white" href="/" aria-label="Brand">
                W<span class="text-primary">e</span> Car<span class="text-primary">e</span>
            </a>
            <div class="px-24 py-4 mt-12 space-y-4 ">
                <div class="mb-11">
                    <h1 class="text-2xl font-normal leading-tight tracking-tight text-gray-900 font-rubik dark:text-white">
                        Create an account
                    </h1>
                    <p class="text-xs text-gray-400">Already using Wecare? <span class="text-primary"><a href="{{route('doctorLoginView')}}">Login</a></span></p>
                </div>
                <form class="space-y-1 md:space-y-6" method="post" action="{{ route('doctorSignupView') }}">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-6 ">
                        <div class="">
                            <label for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name</label>
                            <input type="text" id="first_name" name="firstname"
                                class="bg-gray-50 border border-gray-300 w-full  h-10 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="John" />
                            @error('firstname')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                name</label>
                            <input type="text" id="last_name" name="lastname"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Doe" />
                            @error('lastname')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address</label>
                            <input type="email" id="email" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="john.doe@company.com" />
                            @error('email')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                                number</label>
                            <input type="tel" id="phone" name="phone"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="123-45-678">
                            @error('phone')
                                <div class="text-xs text-red-500">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>

                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="password" name="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="•••••••••" />
                        @error('password')
                            <div class="text-xs text-red-500">{{ $message }}</div>
                        @enderror
                    </div>



                    <button type="submit"
                        class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create
                        an account</button>

                </form>
                {{-- @if ($errors->any())
                    <div class="p-4 text-red-500 bg-red-200 rounded-sm">


                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach

                        </ul>


                    </div>
                @endif --}}
            </div>
        </div>

        <div class="w-1/2 h-full bg-black rounded-sm ">
            <img class="object-cover w-full h-full shadow-lg" src="{{ asset('assets/img/benefits5.jpg') }}"
                alt="" />
        </div>
    </div>
@endsection
