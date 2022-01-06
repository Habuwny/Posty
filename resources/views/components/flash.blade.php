@if(session()->has('success'))
<div
    class="bg-blue-900 tracking-wider  text-white py-2 px-4 rounded-xl text-xl"
    x-data="{show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    >
    <p>
        {{ session('success')}}
    </p>
</div>
@endif
