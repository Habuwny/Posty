@php
    $unsubscriptionNotifications= auth()->user()->subscriptionNotifications->where("checked", '=' , "false");
    $subscriptionNotifications = auth()->user()->subscriptionNotifications;
@endphp

<div>

    <div
        x-data="{ open: false}"
        @click.away="open = false"
        class="relative"
    >
        <div @click="open = ! open" class="cursor-pointer relative">
            <div id="$notifications-red" class="rounded-full bg-green-500 absolute  {{ $unsubscriptionNotifications->count() >= 1 ? 'visible': 'invisible' }}" style="min-width: 15px; min-height: 15px"></div>
            <x-icons.subscribe/>
        </div>
        <div x-show="open"  class="">
            <x-subscriber.show-all-subscribers  :subscriptionNotifications="$subscriptionNotifications"/>
        </div>
    </div>
</div>

