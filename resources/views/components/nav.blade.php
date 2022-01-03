<div class="w-full bg-slate-800 py-2 px-10 flex justify-between items-center relative">
    <a href="{{ route('home') }}">
    <x-icons.logo/>
    </a>
    <div class="md:block lg:block hidden  lg:w-2/4 relative">
        <input
            class="w-full px-2 text-lg focus:outline-none outline-ring-blue-500  focus:ring-blue-500  bg-gray-200 py-2 rounded-xl border-sky-900 border border:4 ring-4 "
            type="search"
            name="search"
            PLACEHOLDER="Search"
        >
        <span class="cursor-pointer text-gray-300 absolute top-1/2  right-4 " style="transform: translateY(-50%)">
            <x-icons.search/>
        </span>
    </div>
    <div class="flex space-x-3 justify-center items-center">
        @auth()
            <x-icons.subscribe/>
            <x-notification.notification-show />

            <x-user-dropdown
                :links="['Dashboard', 'Posting', 'Settings', 'Log Out']"
            />
        @else
            <a href="{{ route('login') }}">
                <button class="text-gray-100 text-lg font-bold "> Log in</button>
            </a>
            <a href=" {{ route('register') }} ">
                <button
                    class="text-lg font-bold hover:bg-gray-500 transition-all text-gray-100 hover:text-white border-2 border-blue-500 hover:border-green-500 px-2 py-2 rounded-xl">
                    Get Started
                </button>
            </a>
        @endauth
    </div>

</div>
