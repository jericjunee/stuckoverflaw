<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.head')
    </head>
    <body class="bg-light h-screen antialiased leading-none font-sans">
        <div id="app">
            <header>
                @include('layouts.header')
            </header>

            <main>
                @yield('content')
            </main>
            
            <footer>
                @include('layouts.footer')
            </footer>
        </div>

        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
    </body>
</html>
