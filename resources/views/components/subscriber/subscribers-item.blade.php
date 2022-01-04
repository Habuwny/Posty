@props(['subscriptionNotification'])
@php
#{{--    $title= App\Models\Post::find($subscriptionNotification->post_id)->title;--}}
    $post = App\Models\Post::find($subscriptionNotification->post_id);
#{{--    $post = App\Models\User::find($subscriptionNotification->post_id);--}}
    #$id = App\Models\User::find($subscriber->notifier_id)->id;
    $subId = $subscriptionNotification->id;

@endphp
<a
    href="{{ route('userSubscriber.check', ['userSubscriber'=> $subId]) }}"
    type="submit"
    class="mx-2 py-2 my-2 space-x-2 flex items-center justify-center"
>
{{--    <img src="https://i.pravatar.cc/150?u=${{ $post->id }}" alt="avatar" height="35" width="35"--}}
{{--         class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}


    <span >
        <span class="font-bold">{{ $post->title }}</span>
        @if ($subscriptionNotification->type === 'like')
            <span>the post has new like </span>
        @else
            <span>the post has new comment</span>
        @endif
    </span>
</a>
