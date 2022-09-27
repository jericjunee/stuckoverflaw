@extends('layouts.dashboard.app')

@section('content')
  <h2 class="text-5xl text-center">Create user</h2>

  @if ($errors->any())
    <div class="p-4 mb-4 text-lg font-body text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{ $error }}
          </li>
        @endforeach
      </ul>
      
    </div>
  @endif

  <div class="flex justify-center mt-10">
    <form class="w-1/2" action="/admin/users" method="POST">
      @csrf
      <div class="mb-6">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
        <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5" placeholder="Enter name" required>

        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Email Address</label>
        <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5" placeholder="Enter email address" required>

        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 mb-5" placeholder="Enter a password" required>
      </div>
      
      <div class="flex items-center mb-4">
          <input id="is_admin" name="is_admin" type="checkbox" value="admin" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500  focus:ring-2">
          <label for="is_admin" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">User is admin</label>
      </div>

      <div class="flex justify-center">
        <input type="submit" value="Create user" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none">
      </div>
    </form>
  </div>
  
@endsection