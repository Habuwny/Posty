<x-layout>
    <x-mid-post-show-panel>
        <div style="background-color: #151d26" class="px-0 md:px-2 lg:px-4 py-3 rounded-2xl">
        <x-post-show :post="$post" :isLiked="$isLiked"/>
        <x-comments.index :comments="$comments" :post="$post"/>
        </div>
    </x-mid-post-show-panel>
</x-layout>
