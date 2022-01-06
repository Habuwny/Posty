@props(['heights', 'widths', 'userId'])
@php
    #{{--    ddd($userId);--}}
        $user = \App\Models\User::find($userId);
        if ($user->image) {
            if ($user->image->type === 'user') {
               $path = asset('storage/' . $user->image->path);
            }else{
             $path = asset('storage/' . "user/avatar/default.png");
            }
        }
        else{
            $path = asset('storage/' . "user/avatar/default.png");
        }

@endphp
{{--        <img src="https://i.pravatar.cc/150?u=${{ auth()->user()->id }}" alt="avatar" height="35" width="35"--}}
{{--             class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}
<img {{ $attributes(['class'=>"portrait cursor-pointer rounded-full border-solid border-2 border-light-blue-500"])}}
     src="{{$path}}"
     alt="avatar"
     height={{$heights}}
         width={{$widths}}>
