@props(['name'])

<button type="submit" class="px-4 my-3 py-3 text-xl tracking-widest bg-slate-800 text-gray-300 font-bold rounded-lg border ring-gray-500">
    {{ ucwords($name) }}
</button>
