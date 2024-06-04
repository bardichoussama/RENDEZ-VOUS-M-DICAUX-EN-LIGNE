<!-- End Sidebar -->
<aside class="w-64 text-white bg-gray-800">
    <!-- Navigation Toggle -->

    <button type="button" class="text-gray-500 hover:text-gray-600" data-hs-overlay="#docs-sidebar"
        aria-controls="docs-sidebar" aria-label="Toggle navigation">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="flex-shrink-0 size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
        </svg>
    </button>
    <!-- End Navigation Toggle -->

    <!-- Sidebar -->
    <div id="docs-sidebar"
        class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-7 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-800 dark:border-neutral-700">
        <div class="px-6">
            <a class="flex-none text-2xl font-bold text-gray-800 dark:text-white" href="#" aria-label="Brand">
                W<span class="text-primary">e</span> Car<span class="text-primary">e</span>
            </a>
        </div>
        
        <nav class="flex flex-col flex-wrap w-full p-6 hs-accordion-group mt-11" data-hs-accordion-always-open>
            <ul class="space-y-6 ">
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-base text-gray-900 rounded-lg  hover:bg-gray-100 dark:bg-neutral-700 dark:text-white"
                        href="#">
                        <ion-icon class="text-lg text-primary" name="grid-outline"></ion-icon>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="#">
                        <ion-icon class="text-lg text-sideBcolor" name="calendar-outline"></ion-icon>
                        Apointments
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="{{route('patientDoctorsList')}}">
                        <ion-icon class="text-lg text-sideBcolor" name="person-outline"></ion-icon>
                        Doctors
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="#">
                        <ion-icon class="text-lg text-sideBcolor" name="chatbubble-outline"></ion-icon>
                        Chat
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="{{route('patientProfileView')}}">
                        <ion-icon class="text-lg text-sideBcolor" name="person-outline"></ion-icon>
                        Profile
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                        href="{{ route('patientSettingsView') }}">
                        <ion-icon class="text-lg text-sideBcolor" name="settings-outline"></ion-icon>
                        Settings
                    </a>
                </li>
                <li>
                    <a class="flex items-center gap-x-3.5 py-2 px-2.5 text-base text-sideBcolor rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300"
                          href="{{route('patientLogout')}}">
                        <ion-icon class="text-lg text-sideBcolor" name="log-out-outline"></ion-icon>
                        Logout
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
