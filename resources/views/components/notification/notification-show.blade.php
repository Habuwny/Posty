@php
    $unSeenNotifications = auth()->user()->notifications->where("seen", '=' , "false");
    $notifications = auth()->user()->notifications;
@endphp

<div>

    <div
        x-data="{ open: false}"
        @click.away="open = false"
        class="relative"
    >
        <div @click="open = ! open" class="cursor-pointer relative ">
            <div id="$notifications-red" class="rounded-full bg-red-500 absolute left-1 {{$unSeenNotifications->count() >= 1 ? 'visible': 'invisible' }}" style="min-width: 10px; min-height: 10px"></div>
            <x-icons.notification class=""/>
        </div>
        <div x-show="open"  class="">
{{--            <x-user-dropdown-links :links="$links" />--}}
            <x-notification.show-all-notifications  :notifications="$notifications"/>
        </div>
    </div>
</div>

