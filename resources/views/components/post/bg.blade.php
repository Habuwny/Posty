@props(['postId'])
@php
    #{{--    ddd($userId);--}}
        $user = \App\Models\Post::find($postId);
        if ($user->image) {
            $path = asset('storage/' . $user->image->path);
        }
        else{
            $path = asset('storage/' . "user/avatar/default.png");
        }

@endphp
{{--        <img src="https://i.pravatar.cc/150?u=${{ auth()->user()->id }}" alt="avatar" height="35" width="35"--}}
{{--             class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}
<img src="https://picsum.photos/1600/450" alt="post image" height="450" class="ring-4 rounded ring-blue-500">
<img {{ $attributes(['class'=>"ring-4 rounded ring-blue-500"])}}
     width="450"
     src="{{$path}}"
     alt="post image"
>

