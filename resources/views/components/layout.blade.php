<!DOCTYPE html>
@php
    @endphp
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    {{--    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>--}}

    {{--    <script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>--}}
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.17.1/plugins/codesnippet/lib/highlight/styles/default.min.css" integrity="sha512-tWTBpkVTwi4rt6CmvlboboFFTsaUb+PtLBwgfNj3YD6hipup6nSPga/Sr/mJ+LXAMVFUK0q8ArdgsQol3NKlNg==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.17.1/plugins/codesnippet/lib/highlight/styles/default.min.css" integrity="sha512-tWTBpkVTwi4rt6CmvlboboFFTsaUb+PtLBwgfNj3YD6hipup6nSPga/Sr/mJ+LXAMVFUK0q8ArdgsQol3NKlNg==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>

    <style>
        html {
            height: 100%;
        }

        body {
            font-family: 'Nunito', sans-serif;
            height: 100%;
            min-height: 100%;
            width: 100%;
        }
    </style>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/default.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai_sublime.css') }}">
    {{--    <link rel="stylesheet" type="text/css"  href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/atelier-lakeside.dark.css') }}">--}}
    {{--    <link rel="stylesheet" type="text/css"  href="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/styles/colors.css') }}">--}}
    <script type="text/javascript"
            src="{{ asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</head>
<body class="bg-gray-900">
<div class=" h-full " style="height: 100%; min-height: 100%">
    {{--    {{ddd(auth()->user()->participate )}}--}}
    <x-nav/>
    <div class="flex  flex-col justify-between" style="min-height: 100%">
        {{ $slot }}
    </div>
    <x-bottom/>
</div>
<div class="absolute right-1 top-20">
    <x-flash/>
</div>
<div>
</div>
</div>

<script src="/js/textarea-ckeditor.js"></script>
</body>
</html>
