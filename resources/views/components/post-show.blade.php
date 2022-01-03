@props(['post', 'isLiked'])

@php
    $likes =  $post->likes->count();
    if ($likes === 0) {
        $likes = '';
    }elseif ($likes === 1){
        $likes =  $post->likes->count(). ' like';
    }elseif ($likes > 1){
        $likes =  $post->likes->count(). ' likes';
    }
@endphp
<div class="">
    <div>
        <img src="https://picsum.photos/1600/450" alt="post image" height="450" class="ring-4 rounded ring-blue-500">
    </div>
    <x-user-snippet :post="$post" :user="$post->user"/>
    <div class="mt-7">
        <h1 class="sm:text-3xl md:text-4xl lg:text-5xl  text-white">{{ $post->title }}</h1>
        <div>
            <x-post-snippet-tags :tags="$post->categories"/>
        </div>
    </div>

    <div class="mt-10">
        <p class="text-2xl text-gray-200">{{ $post->body }}</p>
    </div>
    <div class="w-full bg-teal-500 mt-6 rounded-xl" style="height: 1px"></div>
    <div class="w-full bg-black mt-3 text-center flex justify-center rounded-xl">
        <span class="flex items-center space-x-1">
            @auth
                <x-icons.heart :post="$post" :isLiked="$isLiked"/>
                <span class="text-gray-100 font-bold text-xl" id="post-likes">{{ $likes }}</span>
            @else
                <x-icons.heart :post="$post" :isLiked="$isLiked"/>
                <span class="text-gray-100 font-bold text-xl" id="post-likes">{{ $likes }}</span>
            @endauth
        </span>
    </div>

</div>
