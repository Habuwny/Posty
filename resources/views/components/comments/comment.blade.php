@props(['comment'])
<div
    class="w-full lg:w-3/5 md:w-4/5 lg:w-3/5  sm:rounded-none md:rounded-xl lg:rounded-xl bg-gray-800 space-y-0.5">
    <div>
        <div
            class="sm:rounded-none md:rounded-xl lg:rounded-xl pl-4 py-1 bg-cyan-900 flex justify-center flex-col items-center ">
            <div class="flex flex-col items-center space-x-3">
                <a href="{{ route('user.dashboard', ['user'=> $comment->user->username]) }}">
                    <x-user.avatar widths=40 heights=40 :userId="$comment->user->id"/>
                </a>
                <div class="flex flex-col justify-center items-center  pr-4">
                    <a href="{{ route('user.dashboard', ['user'=> $comment->user->username]) }}" class="text-slate-100 title font-bold text-lg">{{ $comment->user->name }}</a>
                    <div
                        class="w-full  text-center  left-0 top-6 text-gray-900 font-bold text-sm e"> {{ $comment->created_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-start">
            <div class="p-4 ">
                <div class="mt-3">
                    <p><span class="text-gray-100 text-sm lg:text-lg tracking-wide"> {!! $comment->content !!}</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
