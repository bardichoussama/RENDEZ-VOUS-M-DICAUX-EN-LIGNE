@if (session()->has('success'))
    <!-- Include the alert component -->
    <x-alert type="success">
        {{ session('success') }}
    </x-alert>
@endif


