<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    
    @include('layouts.dashboard.head')

  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900">

      @include('layouts.dashboard.sidebar')
      
      <div class="flex flex-col flex-1">

        @include('layouts.dashboard.header')

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container p-6 mx-auto grid">

            @yield('content')

          </div>
        </main>
      </div>
    </div>
    <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
  </body>
</html>
