@props(['error'])
@if($error)
    <div class="flex justify-start text-red-300 font-bold py-1 ml-0 text-lg ">
        <li>{{ $error ?? '' }}</li>
    </div>
@endif
