<x-layout>
    <x-mid-post-show-panel>
        <x-post-show :post="$post" :isLiked="$isLiked"/>
        <x-comments.index :comments="$comments" :post="$post"/>
    </x-mid-post-show-panel>
</x-layout>
