@props(['post', 'isLiked'])

@php
    $postImage= \App\Models\Image::where('type_id', '=', $post->id)->where('type', '=', 'post')->first();
          if ($postImage) {
                  #dd($userImages);
                 $path = asset('storage/' .  $postImage->path);
          }
          else{
              $path = asset('storage/' . "post/bg/default.png");
          }

  if (auth()->user()) {
      $subs = \App\Models\Subscriptions::where('user_id', '=', auth()->user()->id)->where('post_id', '=', $post->id)->get();
      $isSub = $subs->count() > 0 ?? false;
      }
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
        <img src="{{$path}}" alt="post image" height="450" class="ring-4 rounded ring-blue-500">
    </div>
    <div style="background-color: #121921">
        <x-user-snippet :post="$post" :user="$post->user"/>
    </div>
    <div class="mt-7 px-1">
        <h1 class="text-white font-black text-2xl sm:text-3xl  md:text-4xl lg:text-5xl">{{$post->title }}</h1>
        <div>
            <x-post-snippet-tags :tags="$post->categories"/>
        </div>
    </div>

    <div class="mt-10">
        <div class="text-gray-100">
        {!! $post->body  !!}
        </div>
        <div class="flex justify-end  items-end">
            @auth()
                @if ($post->user_id === auth()->user()->id)
                    <form method="post" action="{{ route('post.destroy', ['post'=>$post->id]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="disabled text-lg py-1 px-2 rounded bg-red-800 hover:bg-red-900  font-bold text-white flex items-center justify-between">
                            <span><x-icons.trash/></span><span>Trash</span>
                        </button>
                    </form>
                @else
                    <button onclick="subscribeClicked()" id="subscriber-submit" type="submit"
                            class="disabled text-lg py-1 px-2 rounded font-bold text-white {{ $isSub ? 'bg-red-900' : 'bg-green-900' }} ">
                        <span><x-icons.subscription/></span>
                        <span id="subscriber-submit-text">{{ $isSub ? 'UnSubscribe' : 'Subscribe' }}</span>
                    </button>
                @endif
            @endauth
        </div>
    </div>
    <div class="w-full bg-teal-500 mt-6 rounded-xl" style="height: 1px"></div>
    <div class="w-full bg-black mt-3 text-center flex justify-center rounded-xl">
        <span class="flex items-center space-x-1">
                <x-icons.heart :post="$post" :isLiked="$isLiked"/>
                <span class="text-gray-100 font-bold text-xl" id="post-likes">{{ $likes }}</span>
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
            el.style.backgroundColor = 'rgb(127 29 29)'
        }

    }

</script>
