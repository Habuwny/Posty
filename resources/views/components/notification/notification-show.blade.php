<div>
    <div
        x-data="{ open: false}"
        @click.away="open = false"
        class="relative"
    >
        <div @click="open = ! open" class="cursor-pointer">
            <x-icons.notification class=""/>
        </div>
        <div x-show="open"  class="">
{{--            <x-user-dropdown-links :links="$links" />--}}
            <x-notification.show-all-notifications />
        </div>
    </div>
</div>
