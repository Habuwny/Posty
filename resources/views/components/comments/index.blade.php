@props(['comments', 'post']);

<div>
    @auth
        <x-comments.tocomment :post="$post"/>
    @endauth
    <div class="mt-20">
        <h1 class="text-3xl font-bold text-white mb-6 ">Post Discussion</h1>
        <x-comments.all-comments :comments="$comments" />
        <div class="mt-6">
            {{ $comments->links() }}
        </div>
    </div>
</div>


