@props(['post', 'tags'])
<div class="sm:rounded-none md:rounded-xl lg:rounded-xl bg-gray-800 space-y-0.5">
    <div class="sm:rounded-none md:rounded-xl lg:rounded-xl pl-4 py-3 bg-gray-700 flex justify-between items-center ">
        <div class="flex  items-center space-x-3">
            <img src="https://i.pravatar.cc/150?u={{$post->id}}" alt="{{ $post->user->name }}"
                 height="40" width="40"
                 class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500"
            >
            <div class="flex flex-col justify-start relative">
                <a href="/" class="text-slate-100 title font-bold text-lg">{{ $post->user->name }}</a>
                <span
                    class="w-full  left-0 top-6 text-gray-900 font-bold text-sm absolute"> {{ $post->created_at->diffForHumans() }}</span>
            </div>
        </div>
        <span class="text-blue-500 font-bold mr-3"> #Starter </span>
    </div>
    <div class="">
        <div class="p-4 ">
            <div class="flex items-center justify-start space-x-5">
            <a href="{{route('post.show', ['username'=>$post->user->username, 'slug'=>$post->slug]) }}" class="title text-slate-100 font-bold text-xl ">{{ $post->title }}</a>
                <span class="cursor-pointer">
                <x-icons.goto />
                </span>
            </div>
            <div class="mt-3">
                <p > <span class="text-gray-300 tracking-wide"> {!! $post->excerpt !!}</span></p>
                <x-post-snippet-tags :tags="$tags"/>
            </div>
        </div>
        <div class="bg-teal-900 py-2 flex sm:rounded-none md:rounded-xl lg:rounded-xl  justify-between">
            <span class="px-4 flex items-center">
                <span class="ml-2 text-slate-200 font-bold"> 4 minute </span>
                <span class="ml-2 text-slate-200 font-bold"> 5 readers</span>
            </span>

            <span class="px-4 flex items-center">
                <span class="ml-2 text-slate-200 font-bold"> 4 Likes </span>
                <span class="ml-2 text-slate-200 font-bold"> 5 comments</span>
            </span>
        </div>

    </div>
</div>
