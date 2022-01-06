@props(['notifications'])
<div
    class="bg-sky-900 flex  rounded-xl " style="position: absolute; right: 0;"
>
    <div class=" w-80  rounded-xl">
        <div class="text-center rounded-t-xl  bg-red-900 font-bold tracking-wider py-5" >
            <span class="text-lg text-white px-0">Notifications</span>
        </div>
        <div class="rounded mt-4 mb-4 notification-scroll" style=" overflow-y: auto ;max-height: 30rem">
            @foreach($notifications as $notification)
                <div class="h-20  border-b-2 border-gray-600  focus:sky-800 {{ $notification->seen === "true" ?'bg-slate-700 text-gray-500 font-semibold hover:bg-slate-800':'bg-sky-900 hover:bg-sky-800 text-white font-bold' }}  cursor-pointer" >
                <x-notification.notification-item :notification="$notification"/>
                </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    .notification-scroll::-webkit-scrollbar {
        width: 20px;
    }

    /* Track */
    .notification-scroll::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    .notification-scroll::-webkit-scrollbar-thumb {
        background: rgb(14 116 144);
        border-radius: 10px;
    }

    /* Handle on hover */
    .notification-scroll::-webkit-scrollbar-thumb:hover {
        background: rgb(11 111 140);
    }
</style>
