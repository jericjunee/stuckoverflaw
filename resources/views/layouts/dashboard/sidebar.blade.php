<!-- Desktop sidebar -->
<aside
  class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0"
>
  <div class="py-4 text-gray-500 dark:text-gray-400">
    <a
      class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
      href="#"
    >
      StuckOverFlaw
    </a>
    <ul class="mt-6">
      <li class="relative px-6 py-3">

        @if ('admin' == request()->path() || 'dashboard' == request()->path())
          <span
          class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
          aria-hidden="true"></span>
        @endif
        
        <a
          class="{{ 'admin' == request()->path() ? 'text-gray-800 dark:text-gray-100' : '' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="
            @if (Auth::user()->is_admin == 1)
              /admin
              @else
                /dashboard
            @endif
          "
        >
          <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
          </svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
    </ul>
    <ul>

      @if (Auth::user()->is_admin == 1)
          <li class="relative px-6 py-3">
            @if ('admin/users' == request()->path())
              <span
              class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
              aria-hidden="true"></span>
            @endif

            <a
              class="{{ 'admin/users' == request()->path() ? 'text-gray-800 dark:text-gray-100' : '' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
              href="/admin/users"
            >
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
              <span class="ml-4">Users</span>
            </a>
          </li>
      @endif

      <li class="relative px-6 py-3">

        @if ('admin/posts' == request()->path() || 'dashboard/posts' == request()->path())
          <span
          class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
          aria-hidden="true"></span>
        @endif

        <a
          class="{{ 'admin/posts' == request()->path() || 'dashboard/posts' == request()->path() ? 'text-gray-800 dark:text-gray-100' : '' }} inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="
            @if (Auth::user()->is_admin == 1)
              /admin/posts
              @else
                /dashboard/posts
            @endif 
          "
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
          <span class="ml-4">Posts</span>
        </a>
      </li>
    </ul>
  </div>
</aside>

<!-- Mobile sidebar -->
<aside
   class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
   x-show="isSideMenuOpen"
   x-transition:enter="transition ease-in-out duration-150"
   x-transition:enter-start="opacity-0 transform -translate-x-20"
   x-transition:enter-end="opacity-100"
   x-transition:leave="transition ease-in-out duration-150"
   x-transition:leave-start="opacity-100"
   x-transition:leave-end="opacity-0 transform -translate-x-20"
>
   <div class="py-4 text-gray-500 dark:text-gray-400">
      <a
      class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
      href="#"
      >
      StuckOverFlaw
      </a>
      <ul class="mt-6">
      <li class="relative px-6 py-3">
         <!-- Active items have the snippet below -->
         <!-- <span
            class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
            aria-hidden="true"
         ></span> -->

         <!-- Add this classes to an active anchor (a tag) -->
         <!-- text-gray-800 dark:text-gray-100 -->
         <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/admin"
         >
            <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
            >
            <path
               d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            ></path>
            </svg>
            <span class="ml-4">Dashboard</span>
         </a>
      </li>
      </ul>
      <ul>
      <li class="relative px-6 py-3">
         <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/admin/users"
         >
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            <span class="ml-4">Users</span>
         </a>
      </li>

      <li class="relative px-6 py-3">
         <a
            class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href="/admin/posts"
         >
            <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="none"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            viewBox="0 0 24 24"
            stroke="currentColor"
            >
            <path
               d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"
            ></path>
            </svg>
            <span class="ml-4">Posts</span>
         </a>
      </li>
      </ul>
   </div>
</aside>