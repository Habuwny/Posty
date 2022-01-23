@props(['name', 'rows', 'characters',  'error'=>null])

@php
    #$isError =$error ? 'ring-4 ring-red-900 focus:ring-red-900' : '';
    $placeHolder = "Write your post $name here";
    if ($name === 'excerpt') {
        $placeHolder = "Write your post $name here.";
    }
@endphp
<div>
    <div class=" ring-4 ring-slate-400 bg-slate-800 rounded-t-xl w-full text-center py-2">
        <label
            for="txt-area-{{$name}}"
            class="cursor-pointer title tracking-wider font-black text-3xl text-gray-300">POST {{ \Illuminate\Support\Str::upper($name) }}</label>
    </div>
    <div class="w-full relative {{$name === 'body' ? 'ring-4 ring-slate-400 rounded-b-xl' : ''}}">
    <textarea

        id="txt-area-{{$name}}"
        {{ $attributes->merge(['class' => " text-2xl focus:outline-none w-full tracking-wider text-white ring-4 ring-slate-400 bg-slate-700  rounded-b p-4"]) }}
        name="{{$name}}"
        maxlength="{{ $characters }}"
        rows="{{ $rows }}"
        placeholder="{{$placeHolder}}"
    >{{ old($name) }}</textarea>
        @if ($name !== 'body')
            <div style="font-size: 10px; top: 2px"
                 class="textarea-char-length-{{$name}} absolute text-white font-black right-4 flex justify-center  items-center  h-6 w-6 rounded bg-slate-800">{{$characters}}</div>
        @endif

    </div>
    @if($name!=='title')
        <x-form.error :error="$error"/>
    @endif

</div>
<style>
    #cke_txt-area-body {
        /*background-color: #185F8D;*/
    }

    /*.cke_contents {*/
    /*    border: solid 1px #696969;*/
    /*    background-color: red;*/
    /*}*/

</style>
