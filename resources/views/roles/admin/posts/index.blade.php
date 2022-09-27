@extends('layouts.dashboard.app')

@section('content')

@if (session()->has('message'))
  <div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
  <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
  <span class="sr-only">Info</span>
  <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
    {{ session()->get('message') }}
  </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-blue-100 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-blue-200 dark:text-blue-600 dark:hover:bg-blue-300" data-dismiss-target="#alert-1" aria-label="Close">
      <span class="sr-only">Close</span>
      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
  </button>
</div>
  
@endif

<div class="w-full overflow-x-auto p-5">
  <div class="w-4/5 mb-10">
    <a href="/admin/posts/create">
      <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex gap-2 items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
        Add post
      </button>
    </a>
  </div>

  <table class="w-full whitespace-no-wrap">
    <thead>
      <tr
        class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50"
      >
        <th class="px-4 py-3">ID</th>
        <th class="px-4 py-3">Title</th>
        <th class="px-4 py-3">Author</th>
        <th class="px-4 py-3">Category</th>
        <th class="px-4 py-3">Updated At</th>
        <th class="px-4 py-3">Actions</th>
      </tr>
    </thead>
    <tbody
      class="bg-white divide-y dark:divide-gray-700"
    >
      @foreach ($posts as $post)
        <tr class="text-gray-700">
        <td class="px-4 py-3 text-sm text-center">
          {{ $post->id }}
        </td>
        <td class="px-4 py-3">
          <div class="flex items-center justify-center text-sm">
            <div>
              <p class="font-semibold">{{ $post->title }}</p>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-sm text-center">
          {{ $post->user->name }}
        </td>
        <td class="px-4 py-3 text-xs">
          <span class="flex justify-center px-2 py-1 font-semibold text-center leading-tight text-light bg-gray-400 rounded-full">
            {{ $post->category }}
          </span>
        </td>
        <td class="px-4 py-3 text-sm text-center">
          {{ date('F d, Y', strtotime($post->created_at)) }}
        </td>
        <td class="px-4 py-3">
          <div class="flex items-center justify-center space-x-4 text-sm">
            <a href="/admin/posts/{{ $post->id }}/edit">
              <button
              class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
              aria-label="Edit"
            >
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                ></path>
              </svg>
            </button>
            </a>

            <form action="/admin/posts/{{ $post->id }}" method="POST">
              @csrf
              @method('DELETE')
              <button
              class="flex items-center px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
              aria-label="Delete" type="submit">
              <svg
                class="w-5 h-5"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                  clip-rule="evenodd">
                </path>
              </svg>
            </button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection