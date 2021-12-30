@props(['routeLink', 'link'])
<a
    href="{{ route($routeLink) }}"
    class="flex items-center px-3 border-b-2 border-gray-600 rounded cursor-pointer py-2 justify-start text-center  hover:bg-gray-700 hover:text-white focus:text-white"
>
    {{ $slot }}
    <span class="text-lg font-bold  text-white   block text-left px-3">{{ $link }}</span>
</a>
