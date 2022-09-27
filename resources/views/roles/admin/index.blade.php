@extends('layouts.dashboard.app')

@section('content')
  <h1 class="text-5xl text-center">Admin Dashboard</h1>

  <p class="text-xl text-center mt-5">Hello, {{ Auth::user()->name }}</p>
@endsection