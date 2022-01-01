@props(['tags']);
<div class="inline-grid grid-cols-3 gap-2 mt-3 text-center">

    @foreach ( $tags as $tag)
        {{ddd($tags->tags)}}
        <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-violet-900">{{$tag}}</span>
    @endforeach
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-violet-900">#javascript</span>--}}
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-emerald-900">#Html</span>--}}
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-violet-900">#NodeJs</span>--}}
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-emerald-900">#Php</span>--}}
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-violet-900">#VueJs</span>--}}
{{--    <span class="rounded text-slate-100 tracking-wide cursor-pointer font-bold px-4 bg-emerald-900">#ReactJs</span>--}}
</div>
