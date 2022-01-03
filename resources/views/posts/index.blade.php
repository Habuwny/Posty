<x-layout>
    <x-mid-panel>
        @foreach ($posts as $post)
            <x-post-snippet :post="$post" :tags="$post->categories"/>
        @endforeach
            {{ $posts->links() }}
    </x-mid-panel>
</x-layout>
