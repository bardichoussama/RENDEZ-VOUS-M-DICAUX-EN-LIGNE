@extends('layouts.patientMasterPage')

@section('main')
    <div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
        <div class="mb-4 col-span-full xl:mb-2">
            <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User settings</h1>
        </div>

        <!-- Right Content -->
        <div class="col-span-full xl:col-auto">
            <!-- Profile Photo Section -->
            <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                @if (session('status'))
                    <x-alert type="success">
                        {{ session('status') }}
                    </x-alert>
                @endif
                <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                    <img class="object-cover mb-4 rounded-sm w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                        src="{{ auth()->guard('patient')->user()->image }}" alt="Profile picture">
                    <div>
                        <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">Profile picture</h3>
                        <div class="mb-4 text-sm text-gray-500">JPG, GIF or PNG. Max size of 800K</div>
                        <form
                            action="{{ route('updateProfilePhotoPatient', ['patientId' => auth()->guard('patient')->user()->id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex items-center space-x-4">
                                <button type="button"
                                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white rounded-sm bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300"
                                    onclick="document.getElementById('dropzone-file').click()">Upload picture</button>
                                <input id="dropzone-file" type="file" name="profile_photo" class="hidden" />
                                <button type="submit"
                                    class="px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-sm focus:outline-none hover:bg-gray-100 hover:text-primary focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flow-root">
                    <h3 class="text-xl font-semibold dark:text-white">Social accounts</h3>
                    <form method="post"
                        action="{{ route('updateSocialAccountsPatient', ['patientId' => auth()->guard('patient')->user()->id]) }}">
                        @csrf
                        @method('PUT')
                        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="py-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="facebook"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Facebook</label>
                                    <input type="text" name="facebook" id="facebook"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="facebook.com/echigo.ouss/">
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="linkedin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">LinkedIn</label>
                                    <input type="text" name="linkedin" id="linkedin"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="linkedin.com/in/oussama-bardich">
                                </div>
                            </li>
                            <li class="py-4">
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="instagram"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Instagram</label>
                                    <input type="text" name="instagram" id="instagram"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="instagram.com/brc_o1">
                                </div>
                            </li>
                        </ul>
                        <div>
                            <button
                                class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save
                                all</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-span-2">

            <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">General information</h3>
                <form
                    action="{{ route('updateGeneralInfoPatient', ['patientId' => auth()->guard('patient')->user()->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="first-name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                            <input type="text" name="first_name" id="first-name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->firstname }}" placeholder="Bonnie">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="last-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                                Name</label>
                            <input type="text" name="last_name" id="last-name"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->lastname }}" placeholder="Green">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->email }}" placeholder="example@company.com">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone-number"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                            <input type="tel" name="phone" id="phone-number"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->phone }}" placeholder="e.g. +(12)3456 789">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex items-center border border-gray-200 rounded ps-4 dark:border-gray-700">
                                <input id="male" type="radio" value="male" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ auth()->guard('patient')->user()->gender == 'male' ? 'checked' : '' }}>
                                <label for="male"
                                    class="w-full py-4 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Male</label>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <div class="flex items-center border border-gray-200 rounded ps-4 dark:border-gray-700">
                                <input id="female" type="radio" value="female" name="gender"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                    {{ auth()->guard('patient')->user()->gender == 'female' ? 'checked' : '' }}>
                                <label for="female"
                                    class="w-full py-4 text-sm font-medium text-gray-900 ms-2 dark:text-gray-300">Female</label>
                            </div>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="blood-type"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Blood Type</label>
                            <select name="blood_type" id="blood-type"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="{{ auth()->guard('patient')->user()->blood_type }}" >{{ auth()->guard('patient')->user()->blood_type }}</option>

                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>

                            </select>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="birthday"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Birthday</label>
                            <input type="date" name="birthday" id="birthday"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->birth }}">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="height"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Height (cm)</label>
                            <input type="number" name="height" id="height"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->height }}" placeholder="e.g. 170">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="weight"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Weight (kg)</label>
                            <input type="number" name="weight" id="weight"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->weight }}" placeholder="e.g. 70">
                        </div>
                        <div class="col-span-6">
                            <label for="allergies"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Allergies</label>
                            <textarea name="allergies" id="allergies"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="List any allergies">{{ auth()->guard('patient')->user()->allergies}}</textarea>
                        </div>
                        <div class="col-span-6">
                            <label for="bio"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"></label>
                            <textarea name="bio" id="bio"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Write a brief bio">{{ auth()->guard('patient')->user()->bio}}</textarea>
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="city"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                            <input type="text" name="city" id="city"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->city}}" placeholder="e.g. New York">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="address"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                            <input type="text" name="address" id="address"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ auth()->guard('patient')->user()->address }}" placeholder="e.g. 123 Main St">
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Save</button>
                    </div>
                </form>

            </div>


            {{-- <div class="p-4 mb-4 bg-white rounded-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flow-root">
                <h3 class="mb-4 text-xl font-semibold dark:text-white">Change password</h3>
                <form action="{{ route('updatePasswordPatient') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <label for="current-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Current Password</label>
                            <input type="password" name="current_password" id="current-password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="••••••••">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="new-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                            <input type="password" name="new_password" id="new-password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="••••••••">
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                            <input type="password" name="new_password_confirmation" id="confirm-password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-sm focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="••••••••">
                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="text-white bg-primary hover:bg-secondary focus:ring-4 focus:ring-primary-300 font-medium rounded-sm text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Change Password</button>
                    </div>
                </form>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
