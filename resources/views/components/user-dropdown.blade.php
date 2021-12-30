@props(['links'])
<div
    x-data="{ open: false}"
    @click.away="open = false"
    class="relative"
>
    <div @click="open = ! open">
        <img src="https://i.pravatar.cc/300" alt="avatar" height="35" width="35"
             class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">
    </div>
    <div x-show="open" >

        <x-user-dropdown-links :links="$links" />
    </div>
</div>

