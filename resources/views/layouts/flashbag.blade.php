@if (session()->has('success'))

    <x-alert type="toast-success">
        {{ session('success') }}
    </x-alert>
@endif


