@props(['links'])
@php
$usernameR = ["user"=>auth()->user()->username]
@endphp
<div
    class="bg-sky-900 px-4 rounded-xl  py-4 space-y-4 p-7 mt-2 " style="position: absolute; right: 0"
>
    <div class="space-y-2">
        @foreach($links as $link)
            @if ($link==='Log Out')
                <a
                    class="flex items-center px-3 border-b-2 border-gray-600 rounded cursor-pointer py-2 justify-start text-center   hover:bg-sky-700  focus:sky-800"
                    @click.prevent="document.querySelector('#logout-form').submit()"
                >
                    <x-icons.logout/>
                    <span>
                        <span class="text-lg font-bold  text-white   block text-left px-3">{{ $link }}</span>
                        <form id="logout-form" method="post" action="{{ route('auth.logout') }}"
                              class="text-xs  font-semibold text-blue-500 ml-6">
                            @csrf
                        </form>
                    </span>
                </a>
            @elseif($link==='Settings')
                <x-container.dropdown-item routeLink="username.settings" :routeLinkPars="$usernameR" :link="$link">

                    <x-icons.settings/>
                </x-container.dropdown-item>
            @elseif($link==='Posting')
                <x-container.dropdown-item routeLink="posts.create" :link="$link">
                    <x-icons.posting/>
                </x-container.dropdown-item>
            @elseif($link==='Dashboard')
                <x-container.dropdown-item routeLink="user.dashboard" :routeLinkPars="$usernameR" :link="$link">
                    <x-icons.dashboard/>
                </x-container.dropdown-item>
            @endif
        @endforeach
    </div>
</div>
