<x-layout>
    <x-mid-panel>
        @foreach ($posts as $post)
            <x-post-snippet :post="$post" :tags="$post->categories"/>
        @endforeach
    </x-mid-panel>
</x-layout>
