@php
    $un = '@'.$user->username
@endphp
<x-layout>
    <x-mid-panel>
        <div class="bg-gray-800 py-2 rounded-xl flex items-center text-center  justify-center">
            <div class="pt-1 w lg:pt-0 w-full   flex space-y-3 flex-col items-center justify-center">
                <div class="">
                    <img src="https://i.pravatar.cc/500?u={{ $user->id }}" alt="avatar" height="200" width="200"
                         class=" rounded-full border-solid border-2 border-light-blue-500">
                </div>
                <div class="w-full  ">
                    <div class="text-3xl  tracking-wider text-white font-black">{{ $user->name}}</div>
                </div>
                <div>
                    <h1 class="text-3xl  text-white font-black">{{ $un}}</h1>
                </div>
                <div>
                    <h1 class="text-3xl  text-blue-500 font-black">#Starter</h1>
                </div>

            </div>

        </div>
        <div class="flex flex-col text-center  justify-center">
            <h1 class="text-3xl tracking-wide text-white font-extrabold">Participates</h1>
            <h1 class="text-2xl tracking-wide text-white font-bold"><span
                    class="text-blue-500 font-extrabold">{{$user->posts->count()}}</span> {{$user->posts->count() >1 ?'Posts':'Post'}}
            </h1>
            <h1 class="text-2xl tracking-wide text-white font-bold"><span
                    class="text-blue-500 font-extrabold">{{$user->comments->count()}} </span>{{$user->comments->count() >1 ?'Comments':'Comment'}}
            </h1>
        </div>
        <div class="py-1 w-full bg-gray-500"></div>
        <div class="space-y-3 ">
            @foreach ($participates as $participate)

                @if($participate->slug)
                        <x-post-snippet :post="$participate" :tags="$participate->categories"/>
                @else
                    <a class="hover:cursor-pointer" href="{{ route('post.show', ['post'=>$participate->post->slug]) }}">
                    <x-comments.comment :comment="$participate"/>
                    </a>
                @endif
            @endforeach
        </div>
    </x-mid-panel>
</x-layout>
