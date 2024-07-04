@props(['active' => false])

    <a {{$attributes}} class="{{ $active ? 'bg-blue-500 text-gray-950': 'bg-blue-300 text-gray-700'}} flex items-center p-2  rounded-lg dark:text-white hover:bg-blue-500 dark:hover:bg-blue-700  group">
        <span class="{{ $active ? 'text-gray-950': 'text-gray-700 '}}">{{ $svg }}</span>
        <span class="ms-3">{{$slot}}</span>
    </a>
