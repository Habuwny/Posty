@props(['subscriptionNotification'])
@php
    #{{--    $title= App\Models\Post::find($subscriptionNotification->post_id)->title;--}}
        $post = App\Models\Post::find($subscriptionNotification->post_id);
    #{{--    $post = App\Models\User::find($subscriptionNotification->post_id);--}}
        #$id = App\Models\User::find($subscriber->notifier_id)->id;
        $subId = $subscriptionNotification->id;

@endphp
<a
    href="{{ route('subscriptionNotification.check', ['subscriptionNotification'=> $subId]) }}"
    type="submit"
    class="mx-2 py-2 my-2 space-x-2 flex items-center justify-center"
>
    <span class="text-center">
        @if ($subscriptionNotification->type === 'like')
            <span class=" block flex justify-center items-center"> <x-icons.like width="40" height="40"/> </span>
        @else
            <span class=" block flex justify-center items-center"> <x-icons.comment width="40" height="40"/> </span>
        @endif
        <span class="font-bolder block  text-xl">{{ $post->title }}</span>
        @if ($subscriptionNotification->type === 'like')
            <span class="text-gray-300">the post has new <span
                    class="text-white text-lg  font-bolder">like</span> </span>
        @else
            <span class="text-gray-300">the post has new <span
                    class="text-white text-lg font-bolder">comment</span></span>
        @endif
    </span>
</a>
