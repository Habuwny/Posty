@props(['post', 'isLiked'])

@php
    $subs = \App\Models\Subscriptions::where('user_id', '=', auth()->user()->id)->where('post_id', '=', $post->id)->get();
    $isSub = $subs->count() > 0 ?? false;
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
        <div class="flex justify-end  items-end">
            @if ($post->user_id === auth()->user()->id)
                <form>
                    <button type="submit"
                            class="disabled text-lg py-1 px-2 rounded bg-red-800 hover:bg-red-900  font-bold text-white flex items-center justify-between">
                        <span><x-icons.trash /></span><span>Trash</span>
                    </button>
                </form>
            @else

                <button onclick="subscribeClicked()" id="subscriber-submit" type="submit"
                        class="disabled text-lg py-1 px-2 rounded font-bold text-white {{ $isSub ? 'bg-red-900' : 'bg-green-900' }} ">
                    <span><x-icons.subscription /></span>
                    <span id="subscriber-submit-text">Subscribe</span>
                </button>

            @endif

        </div>
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


{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>--}}
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#subscriber-submit').click(function (e) {
            e.preventDefault();
            jQuery.ajax({
                url: "{{ route('subscription.add', ['post'=> $post->id]) }}",
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (data) {
                }

            });
        });
    });

    const el = document.querySelector('#subscriber-submit')
    const elSpan = document.querySelector('#subscriber-submit-text')
    // el.style.backgroundColor = 'rgb(20 83 45)'

    function subscribeClicked() {
        let clicked = false;
        if (elSpan.innerText === 'UnSubscribe') {
            elSpan.innerText = 'Subscribe';
            el.style.backgroundColor = 'rgb(20 83 45)'
        } else {
            elSpan.innerText = 'UnSubscribe';
            el.style.backgroundColor = 'rgb(225 29 72)'
        }

    }

</script>
