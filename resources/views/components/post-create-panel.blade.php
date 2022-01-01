<div>
    <form method="post" action="{{ route('posts.store') }}" class="space-y-1">
        @csrf
        <div>
            <x-post-textarea name="title" rows="1"/>
        </div>
        <div class="flex justify-center items-center text-center">
            <x-add-post-tags/>
        </div>
        <div>
            <x-post-textarea name="excerpt" rows="3"/>
        </div>

        <div>
            <x-post-textarea name="body" rows="7"/>
        </div>
        <div class="w-full text-center">
            <x-form.submit name="Publish Now" class="bg-red-800 hover:bg-red-900 text-white"/>
        </div>
    </form>
</div>
