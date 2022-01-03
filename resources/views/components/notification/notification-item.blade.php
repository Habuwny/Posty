@props(['notification'])
@php
    $name = App\Models\User::find($notification->notifier_id)->name;
    $post = App\Models\Post::find($notification->post_id);
    $id = App\Models\User::find($notification->notifier_id)->id;
    $notId = $notification->id;

@endphp
<a
    href="{{route('userNotification.seen', ['userNotification'=> $notId]) }}"
    type="submit"
    class="mx-2 py-2 my-2 space-x-2 flex items-center"
>
    <img src="https://i.pravatar.cc/150?u=${{$id}}" alt="avatar" height="35" width="35"
         class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">
    <span>
    <span class="font-bold">{{ $name }}</span><span
            class="">{{ $notification->type === 'like' ? ' has liked your post.':' has commented on your post.'}}</span>
    </span>
</a>
