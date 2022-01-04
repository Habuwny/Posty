<x-layout>
    @php
        $un = '@'.$user->username;
        $pass = 'كل2f-ffR';
    @endphp
    <div class="flex-col flex-col-reverse h-full flex lg:flex-row bg-black">
        <div class="h-fit items-start  w-full bg-gray-700 lg:w-2/3 lg:items-center flex   lg:h-screen">
            <form method="post"  action="{{ route('user.update', ['user'=>$user->username]) }}" class="mt-7 lg:mt-0 space-y-3 px-6  text-center w-full">
                @csrf
                @method('PUT')
                <x-form.input :value="$user->name" name="name" type="text" error="{{ $errors->first('name') ?? '' }}"/>
                <x-form.input :value="$user->email" name="email" type="email"  error="{{ $errors->first('email') ?? '' }}"/>
                <x-form.input :value="$user->username" name="username" type="text" error="{{ $errors->first('username') ?? '' }}"/>
                <x-form.input :value="$pass" name="password" type="password" error="{{ $errors->first('password') ?? '' }}"/>
                <div class="mt-6">
                <x-form.submit name="Update Your Credentials" class="text-2xl font-extrabold text-white bg-red-700 hover:bg-red-900 " />
                </div>
            </form>
        </div>
        <div class="pt-1 lg:pt-0 w-full bg-gray-600 lg:w-1/3 flex space-y-3 flex-col items-center justify-center">
            <div class="">
                <img src="https://i.pravatar.cc/500?u={{ $user->id }}" alt="avatar" height="200" width="200"
                     class=" rounded-full border-solid border-2 border-light-blue-500">
            </div>
            <div>
                <h1 class="text-3xl tracking-wider text-white font-black">{{ $user->name}}</h1>
            </div>
            <div>
                <h1 class="text-3xl  text-white font-black">{{ $un}}</h1>
            </div>
            <div>
                <h1 class="text-3xl  text-blue-500 font-black">#Start</h1>
            </div>

        </div>
    </div>
</x-layout>
