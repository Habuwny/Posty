@props(['comments'])
{{--w-full sm:w-11/12 md:w-3/6 lg:w-3/5--}}
<div class="space-y-3 mt-3 flex justify-start items-center lg:items-start flex-col" >
    @foreach ($comments as $comment)
        <x-comments.comment :comment="$comment" />
    @endforeach
</div>
