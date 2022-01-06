@props(['tags'])
<div class="inline-grid grid-cols-3 gap-2 mt-3 text-center">


    @foreach ( $tags as $tag)
        @if ( $tag->name === '#General')
        <form method="GET" action="/">
                <button type="submit" value="{{ltrim($tag->name, '#')}}" name="tag" class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-gray-500 hover:bg-gray-600 ">
                    {{ $tag->name }}
                </button>
        </form>

        @else
            <form method="GET" action="/">
                <button type="submit" value="{{ltrim($tag->name, '#')}}" name="tag" class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4
            {{  $loop->even ? 'bg-violet-900 hover:bg-violet-800 ':
            'bg-emerald-900 hover:bg-emerald-800'}} ">
                    {{ $tag->name }}
                </button>
            </form>
        @endif

    @endforeach
</div>
