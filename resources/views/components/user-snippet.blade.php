@props(['user'])

<div>
<div class="text-center flex justify-center items-center flex-col mt-4 font-bold text-gray-100">
    <x-user.avatar widths=55 heights=55 :userId="$user->id"/>
{{--    <img src="https://i.pravatar.cc/150?u=88" alt="avatar" height="35" width="35"--}}
{{--         class="cursor-pointer rounded-full border-solid border-2 border-light-blue-500">--}}

    <span class="mt-1">{{ $user->name }}</span>
    <span class="">{{ '@'.$user->username }}</span>
    <span class="text-blue-500">#Start</span>
</div>
</div>
