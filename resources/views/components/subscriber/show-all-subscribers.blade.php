@props(['subscriptionNotifications'])
<div
    class="bg-sky-900  flex  rounded-xl space-y-4  " style="position: absolute; right: 0;"
>
    <div class="w-96  rounded-xl">
        <div class="text-center rounded-t-xl  bg-green-900  font-bold tracking-wider py-5" >
            <span class="text-lg text-white px-0">Subscriptions</span>
        </div>
        <div class=" rounded  subscriber-scroll py-2 justify-start text-center   " style=" overflow-y: auto ;max-height: 30rem">
            @if ($subscriptionNotifications->count() > 0)
                @foreach($subscriptionNotifications as $subscriptionNotification)
                    <div class="h-36 text-center flex justify-center border-b-2 border-gray-600  focus:sky-800 {{ $subscriptionNotification->checked === "true" ?'bg-slate-700 text-gray-500 font-semibold hover:bg-slate-800':'bg-sky-900 hover:bg-sky-800 text-white font-bold' }}  cursor-pointer" >
                        <x-subscriber.subscribers-item :subscriptionNotification="$subscriptionNotification"/>
                    </div>
                @endforeach
            @else
                <div
                    class="mx-2 py-2 my-2 space-x-2 flex justify-center items-center"
                >
                    <span class="font-extrabold text-xl text-white">No subscription actions yet</span>
                </div>

            @endif

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
