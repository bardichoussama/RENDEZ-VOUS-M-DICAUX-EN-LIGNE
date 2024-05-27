@extends('layouts.patientMasterPage')
@section('main')
    <div class="flex items-center w-full h-full p-12 gap-x-4">
        <div
            class="flex flex-col items-center w-1/2 h-full p-6 bg-white rounded-md shadow dark:border dark:bg-gray-800 dark:border-gray-700">
            <a class="flex-none text-2xl font-bold text-gray-800 dark:text-white" href="/" aria-label="Brand">
                W<span class="text-primary">e</span> Car<span class="text-primary">e</span>
            </a>
            <div class="px-24 py-4 mt-12 space-y-4 ">
                <div class="mb-11">
                    <h1 class="text-2xl font-normal leading-tight tracking-tight text-gray-900 font-rubik dark:text-white">
                        Login to your account
                    </h1>
                    <p class="text-xs text-gray-400">Don't have account? <span class="text-primary"><a
                                href="{{ route('patientSignupView') }}">Sign in</a></span></p>
                </div>

                <form class="space-y-1 md:space-y-6 w-96" method="post" action="{{ route('patientLoginAuth') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="john.doe@company.com" />
                        @error('password')
                            <div class="text-xs text-red-500">{{ $message }}</div>
                        @enderror
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
                        class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login
                    </button>

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

        <div class="w-1/2 h-full bg-black rounded-md ">
            <img class="object-cover w-full h-full rounded-md shadow-lg" src="{{ asset('assets/img/about-contact.jpg') }}"
                alt="" />
        </div>
    </div>
@endsection
