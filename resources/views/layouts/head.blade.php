<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'StuckOverFlaw') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Styles -->
<link href="{{ mix('css/app.css') }}" rel="stylesheet">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('image/logo.png') }}">
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>