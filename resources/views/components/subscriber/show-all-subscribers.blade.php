@props(['subscriptionNotifications'])
<div
    class="bg-gray-800 flex  rounded-xl " style="position: absolute; right: 0;"
>
    <div class=" w-96  rounded-xl">
{{--        <div class="text-center rounded-t-xl  bg-sky-900 font-bold tracking-wider py-3" >--}}
        <div class="text-center rounded-t-xl  bg-rose-900 font-bold tracking-wider py-3" >
            <span class="text-lg text-white">Subscriptions</span>
        </div>
        <div class="mt-4 mb-4 space-y-2 subscriber-scroll" style=" overflow-y: auto ;max-height: 30rem">
            @foreach($subscriptionNotifications as $subscriptionNotification)
                <div class="h-36 {{ $subscriptionNotification->checked === "true" ?'bg-slate-700 text-gray-500 font-semibold':'bg-pink-900 text-white font-bold' }}  cursor-pointer" >
                    <x-subscriber.subscribers-item :subscriptionNotification="$subscriptionNotification"/>
                </div>
            @endforeach
        </div>

    </div>
</div>

<style>
    .subscriber-scroll::-webkit-scrollbar {
        width: 20px;
    }

    /* Track */
    .subscriber-scroll::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px grey;
        border-radius: 10px;
    }

    /* Handle */
    .subscriber-scroll::-webkit-scrollbar-thumb {
        background: rgb(14 116 144);
        border-radius: 10px;
    }

    /* Handle on hover */
    .subscriber-scroll::-webkit-scrollbar-thumb:hover {
        background: rgb(11 111 140);
    }
</style>
