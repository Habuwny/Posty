@php
    $notifications = auth()->user()->notifications->where("seen", '=' , "false");
@endphp
<div
    class="bg-sky-900 flex  rounded-xl " style="position: absolute; right: 0"
>
    <div class=" w-80  rounded-xl">
        <div class="text-center rounded-2xl bg-blue-500 font-bold tracking-wider py-3">
            <span class="text-lg text-white">Notifications</span>
        </div>
        <div class="mt-4" style=" overflow-y: scroll ;height: 30rem">
            @foreach($notifications as $notification)
                <div class="bg-sky-800 rounded-xl cursor-pointer">
                <x-notification.notification-item :notification="$notification" type="$notification->type"/>
                </div>
            @endforeach
        </div>

    </div>
</div>
