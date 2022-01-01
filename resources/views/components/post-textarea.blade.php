@props(['name', 'rows', 'error'])

@php
    $placeHolder = "Write your post $name here";
    $maxH = "max-h-28";
    if ($name === 'excerpt') {
        $placeHolder = "Write your post $name here.";
    }
     if ($name === 'body') {
        $maxH = "max-h-96";
    }
@endphp
<div class="bg-teal-900 rounded-t-xl w-full text-center py-2">
    <label
        for="{{ $name }}"
        class="title tracking-wider font-bold text-lg text-white">Post {{ ucwords($name) }}</label>
</div>
<textarea
    id="{{ $name }}"
    class="{{ $error ? 'ring-4 ring-red-900 focus:ring-red-900' : ''}} ring-2 focus:ring-4 focus:ring-blue-500 focus:outline-none w-full tracking-wider {{$maxH}} font-bold rounded-b p-2 text-xl"
    name="{{$name}}"
    rows="{{ $rows }}"
    placeholder="{{$placeHolder}}"
></textarea>
<x-form.error :error="$error"/>
