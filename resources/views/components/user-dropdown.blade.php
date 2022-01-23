@props(['links'])

<div
    x-data="{ open: false}"
    @click.away="open = false"

    class="relative ">

    <div @click="open = ! open">
{{--        @props(['heights', 'widths'])--}}
        <x-user.avatar heights=35 widths=35 userId="{{ auth()->user()->id }}"/>
{{--        <img src="https://i.pravatar.cc/150?u=88" alt="avatar" height="35" width="35"--}}
{{--             class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}

    </div>
    <div x-show="open" x-cloak>
        <x-user-dropdown-links :links="$links"/>
    </div>
</div>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>

