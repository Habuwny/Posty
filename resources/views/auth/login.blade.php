<x-layout>
    <x-mid-panel>
        <div class="w-10/12 mx-auto  text-center">
            <div class=" bg-gray-800 py-6 px-10 rounded-lg">
                <div class="mb-7 space-y-2">
                    <x-icons.logo/>
                    <h3 class="font-bold text-2xl text-gray-100">Welcome back, Log in and get back.</h3>
                </div>
                <form action="{{ route('auth.login') }}" method="post" class="space-y-3">
                    @csrf
                    <x-form.input name="email" type="text" error="{{ $errors->first('email') ?? '' }}"/>
                    <x-form.input name="password" type="password" error="{{ $errors->first('password') ?? '' }}"/>

                    <x-form.submit name="Log in" class="bg-cyan-900"/>
                </form>
            </div>
        </div>
    </x-mid-panel>
</x-layout>
