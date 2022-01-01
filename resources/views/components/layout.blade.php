<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js" ></script>
    <script defer src="https://unpkg.com/alpinejs@3.7.1/dist/cdn.min.js"></script>

    <style>
        html{
            height: 100%;
        }
        body {
            font-family: 'Nunito', sans-serif;
            height: 100%;
            min-height: 100%;
        }
    </style>
</head>
<body class="bg-gray-900">
<div class=" h-full relative" style="height: 100%; min-height: 100%">
    <x-nav/>
    <x-flash/>
    <div class="flex flex-col justify-between" style="min-height: 100%">
        {{ $slot }}
        <x-bottom/>
    </div>
</div>
</body>
</html>
