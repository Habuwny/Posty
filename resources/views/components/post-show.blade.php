@props(['post'])

@php
    $username = '@'.$post->user->username;
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
    <div class="text-center flex justify-center items-center flex-col mt-4 font-bold text-gray-100">
        <img src="https://i.pravatar.cc/300" alt="avatar" height="55" width="55"
             class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500"
        >
        <span class="mt-1">{{ $post->user->name }}</span>
        <span class="">{{ $username }}</span>
        <span class="text-blue-500">#Start</span>
    </div>
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
        <span class="cursor-pointer flex items-center space-x-1">
        <x-icons.heart :post="$post"/>
            <span class="text-gray-100 font-bold text-xl" id="post-likes">{{$likes}}</span>
        </span>
    </div>

</div>
