@extends('layouts.doctorMasterPage')

@section('main')
<div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
    <div class="mb-4 col-span-full xl:mb-2">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User settings</h1>
    </div>

    <!-- Right Content -->
    <div class="col-span-full xl:col-auto">
        <!-- Profile Photo Section -->
        <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                <img class="object-cover mb-4 rounded-sm w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0" src="{{ auth()->guard('doctor')->user()->image }}" alt="Jese picture">
                <div>
                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                    <div class="mb-4 text-sm text-gray-500">JPG, GIF or PNG. Max size of 800K</div>
                    <form action="{{ route('doctorProfilePhoto', ['doctorId' => auth()->guard('doctor')->user()->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="flex items-center space-x-4">
                            <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-sm bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300" onclick="document.getElementById('dropzone-file').click()">Upload picture</button>
                            <input id="dropzone-file" type="file" name="profile_photo" class="hidden" />
                            <button type="submit" class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-sm focus:outline-none hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Social Accounts Section -->
        <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flow-root">
                <h3 class="text-xl font-semibold dark:text-white">Social accounts</h3>
                <form method="post" action="{{ route('doctorSocialAccounts', ['doctorId' => auth()->guard('doctor')->user()->id]) }}">
                    @csrf
                    <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                        <li class="py-4">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="facebook" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="facebook.com/echigo.ouss/" >
                            </div>
                        </li>
                        <li class="py-4">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="LinkedIn" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn</label>
                                <input type="text" name="linkedin" id="LinkedIn" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="linkedin.com/in/oussama-bardich" >
                            </div>
                        </li>
                        <li class="py-4">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="instagram" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="instagram.com/brc_o1">
                            </div>
                        </li>
                    </ul>
                    <div>
                        <button class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save all</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Left Content -->
    <div class="col-span-2">
        <!-- General Information Section -->
        <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
            <form action="{{ route('doctorGeneralInfo', ['doctorId' => auth()->guard('doctor')->user()->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="first-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="first_name" id="first-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ auth()->guard('doctor')->user()->first_name }}" placeholder="Bonnie" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" name="last_name" id="last-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ auth()->guard('doctor')->user()->last_name }}" placeholder="Green" >
                    </div>
                   
                    <div class="col-span-6 sm:col-span-3">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ auth()->guard('doctor')->user()->email }}" placeholder="example@company.com" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                        <input type="text" name="address" id="address" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ auth()->guard('doctor')->user()->address }}" placeholder="e.g. California" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="phone-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="text" name="phone_number" id="phone-number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ auth()->guard('doctor')->user()->phone }}" placeholder="e.g. +(12)3456 789" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="experience" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Years of Experience</label>
                        <input type="number" id="experience" name="experience" value="{{ auth()->guard('doctor')->user()->years_of_exp }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Consultation Price</label>
                        <input type="number" id="price" name="price" value="{{ auth()->guard('doctor')->user()->consultation_price  }}"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="specialtie" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Specialty</label>
                        <select id="specialtie" name="specialtie" class="bg-gray-50 border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" >
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="bio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bio</label>
                        <textarea name="bio" id="bio" rows="4" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" aria-valuetext=""  placeholder="Write a few sentences about yourself..."></textarea>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-sm bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300">Save</button>
                </div>
            </form>
        </div>

        <!-- Password Update Section -->
        <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">Update password</h3>
            <form action="{{ route('doctorPasswordUpdate', ['doctorId' => auth()->guard('doctor')->user()->id]) }}" method="POST">
                @csrf
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                        <input type="password" name="current_password" id="current-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                        <input type="password" name="new_password" id="new-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm-password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                    </div>
                </div>
                <div class="flex justify-end mt-4">
                    <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-sm bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300">Update Password</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
