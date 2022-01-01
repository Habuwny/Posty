@props(['tags'])
<div class="inline-grid grid-cols-3 gap-2 mt-3 text-center">


    @foreach ( $tags as $tag)
        @if ( $tag->name === '#General')
            <a class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-gray-900 hover:bg-black "
            >
                {{ $tag->name }}
            </a>

        @else
            <a class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4
            {{  $loop->even ? 'bg-violet-900 hover:bg-violet-800 ':
            'bg-emerald-900 hover:bg-emerald-800'}} "
            >
                {{ $tag->name }}
            </a>
        @endif

    @endforeach
</div>
