@props(['post'])
<div class="bg-gray-200 space-y-0.5 rounded-xl">
    <div class="">
        <div class="p-4 ">
            <a href="#">
                <p class="title font-bold text-xl">{{ $post->title }}</p>
            </a>
            <p class="mt-3">{!! $post->excerpt !!}</p>
        </div>
        <div class="bg-gray-300 py-2 ">
            <span class="px-4 flex items-center">
                <x-icons.clock size="20"/>
                <span class="ml-2 font-bold"> {{ $post->created_at->diffForHumans() }}</span>
            </span>
        </div>

    </div>
</div>
