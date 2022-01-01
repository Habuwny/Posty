<x-layout>
    <x-mid-panel>
        @foreach ($posts as $post)
            <x-post-snippet :post="$post" :tags="$post->tags()"/>
        @endforeach
    </x-mid-panel>
</x-layout>
