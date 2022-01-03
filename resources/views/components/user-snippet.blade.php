@props(['user'])

<div>
<div class="text-center flex justify-center items-center flex-col mt-4 font-bold text-gray-100">
    <img src="https://i.pravatar.cc/150?u=${{ $user->id }}" alt="avatar" height="55" width="55"
         class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500"
    >
    <span class="mt-1">{{ $user->name }}</span>
    <span class="">{{ '@'.$user->username }}</span>
    <span class="text-blue-500">#Start</span>
</div>
</div>
