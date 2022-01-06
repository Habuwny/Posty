<x-layout>
    <x-mid-panel>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                {{--            {{dd($posts)}}--}}
                <x-post-snippet :post="$post" :tags="$post->categories"/>
            @endforeach
        @else
            <div class="flex flex-col justify-center items-center space-y-5">
                <h1 class="text-white text-xl font-bold">No posts yet </h1>
                @auth
                    <h1 class="text-white text-2xl font-bold">Be the first <strong class="font-extrabold text-3lg">POSTER</strong></h1>

                    <a href=" {{ route('posts.create') }} ">
                        <button
                            class="text-lg font-bold hover:bg-gray-500 transition-all text-gray-100 hover:text-white border-2 border-blue-500 hover:border-green-500 px-2 py-2 rounded-xl">
                            Create Post
                        </button>
                    </a>
                @else
                    <h1 class="text-white text-2xl font-bold">Sign up and create your first post </h1>

                    <a href=" {{ route('register') }} ">
                        <button
                            class="text-lg font-bold hover:bg-gray-500 transition-all text-gray-100 hover:text-white border-2 border-blue-500 hover:border-green-500 px-2 py-2 rounded-xl">
                            Get Started
                        </button>
                    </a>
                @endauth
            </div>
        @endif

        {{ $posts->links() }}
    </x-mid-panel>
</x-layout>
