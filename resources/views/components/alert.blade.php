@props(['type'])

<div class="p-4 mb-4 text-sm rounded-lg text-{{ $type }} bg-secondary dark:bg-gray-800 dark:text-green-400" role="alert">
    <span class="font-medium">{{ $slot }}</span> 
</div>
