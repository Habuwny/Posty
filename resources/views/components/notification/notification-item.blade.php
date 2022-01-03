@props(['notification'])
@php
    $name = App\Models\User::find($notification->notifier_id)->name;
    $id = App\Models\User::find($notification->notifier_id)->id;
@endphp


<div class="mx-2 py-2 my-2 space-x-2 flex items-center text-gray-100">
    <img src="https://i.pravatar.cc/150?u=${{$id}}" alt="avatar" height="35" width="35"
         class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">
    <span>
    <span class="font-bold text-white">{{ $name }}</span><span class="text-gray-100">{{ $notification->type === 'like' ? ' has liked your post.':' has commented on your post.'}}</span>
    </span>
</div>


{{--<div--}}
{{--    class="flex items-center px-3 border-b-2 border-gray-600 rounded cursor-pointer py-2 justify-start text-center   hover:bg-sky-700  focus:sky-800"--}}
{{-->--}}
{{--    <a class=" font-bold  text-white   block text-left px-3">--}}
{{--        <span>{{ $notification->type === 'like' ? $name.' has liked your post.': $name.'has commented on your post.'}}</span>--}}
{{--    </a>--}}
{{--</div>--}}
