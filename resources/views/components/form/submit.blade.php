@props(['name'])
<button

    type="submit" {{ $attributes(['class'=> 'px-4 my-3 py-3 text-xl tracking-widest font-bold rounded-lg border ring-gray-500']) }}>
    {{ ucwords($name) }}
</button>
