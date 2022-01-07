@props(['post', 'tags'])
<div class="rounded-none sm:rounded-xl md:rounded-xl lg:rounded-xl  bg-gray-800 space-y-0.5">
    <div class="rounded-none sm:rounded-xl md:rounded-xl lg:rounded-xl pl-4 py-3 bg-gray-700 flex justify-between items-center ">
        <div class="flex  items-center space-x-3">
            <a href="{{ route('user.dashboard', ['user'=> $post->user->username]) }}">
                <x-user.avatar widths=40 heights=40 :userId="$post->user->id"/>
{{--                <img src="https://i.pravatar.cc/150?u=88" alt="avatar" height="35" width="35"--}}
{{--                     class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}
            </a>
            <div class="flex flex-col   justify-start  pr-4">
                <a href="{{ route('user.dashboard', ['user'=> $post->user->username]) }}"
                   class="text-slate-100 title font-bold text-lg">{{ $post->user->name }}</a>
                <span
                    class="w-full  left-0 top-6 text-gray-900 font-bold text-sm "> {{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <span class="text-blue-500 font-bold mr-3"> #Starter </span>
    </div>
    <div class="">
        <div class="p-4 ">
            <div class="flex items-center justify-start space-x-5">
                <a href="{{ route('post.show', [ 'post'=>$post->slug]) }}"
                   class="title text-slate-100 font-bold text-xl ">{{ $post->title }}</a>
                <span class="cursor-pointer">
                <x-icons.goto/>
                </span>
            </div>
            <div class="mt-3">
                <p><span class="text-gray-300 tracking-wide"> {!! $post->excerpt !!}</span></p>
                <x-post-snippet-tags :tags="$tags"/>
            </div>
        </div>
        <div class="bg-teal-900 py-2 flex sm:rounded-none md:rounded-xl lg:rounded-xl  justify-between">
            <span class="px-4 flex items-center">
                <span class="ml-2 text-slate-200 font-bold"> {{ $post->readTime($post) }} </span>
                <span class="ml-2 text-slate-200 font-bold"> {{ $post->viewed }} {{ (int)$post->viewed > 1 ? 'readers' : 'reader' }} </span>
            </span>

            <span class="px-4 flex items-center">
                <span
                    class="ml-2 text-slate-200 font-bold">{{ $post->likes->count() }} {{ $post->likes->count() >1? 'Likes' : 'Like' }}  </span>
                <span
                    class="ml-2 text-slate-200 font-bold">{{ $post->comments->count() }} {{ $post->comments->count() >1? 'Comments' : 'Comment' }}  </span>
            </span>
        </div>

    </div>
</div>
