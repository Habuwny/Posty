<x-layout>
    <x-mid-panel>
        @foreach ($posts as $post)
            <x-post-snippet :post="$post"/>
        @endforeach
    </x-mid-panel>
</x-layout>
