<nav class="border-gray-200 px-2 sm:px-4 py-5 rounded">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
    <a href="/" class="flex items-center">
        <img src="{{ url('/image/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white font-heading">StuckOverFlaw</span>
    </a>

    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1 font-heading" id="mobile-menu-2">
        <ul class="flex flex-col p-4 mt-4 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-base md:font-medium md:border-0 md:bg-white">
        <li>
            <a href="/" class="{{ '/' == request()->path() ? 'text-blue-700' : 'text-dark' }} block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Home</a>
        </li>
        <li>
            <a href="/blog" class="{{ 'blog' == request()->path() ? 'text-blue-700' : 'text-dark' }} block py-2 pr-4 pl-3 rounded md:p-0" aria-current="page">Blog</a>
        </li>
        </ul>
    </div>

    @if (Auth::check())
        <div class="flex items-center md:order-2 font-heading">
            <button type="button" class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="{{ url('/image/user_placeholder.png') }}" alt="user photo">
            </button>
            
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 410px);">
                <div class="py-3 px-4">
                <span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                <li>
                    <a href="@if (Auth::user()->is_admin == 1)
                        /admin
                        @else
                        /dashboard
                    @endif" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        {{ csrf_field() }}
                    </form>
                </li>
                </ul>
            </div>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
    @else
        <div class="flex items-center md:order-2">
            <a href="/login">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</button> 
            </a>
        </div>
    @endif
  </div>
</nav>
