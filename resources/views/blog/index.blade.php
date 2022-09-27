@extends('layouts.app')

@section('content')
    <section class="flex flex-col gap-5 py-24 items-center">
      <h1 class="text-6xl">Blog</h1>

      @if (session()->has('message'))
        <div class="p-4 mb-4 text-lg text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
          {{ session()->get('message') }}
        </div>
      @endif

      <div class="flex flex-row {{ Auth::check() ? 'justify-between' : 'justify-end' }} w-4/5">
        @if (Auth::check())
          <a href="/blog/create">
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md font-body px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Create new post
          </button>
          </a>
        @endif

      <form class="flex w-1/5 items-center" action="{{ route('blog.search') }}" method="GET">   
        <label for="search" class="sr-only">Search</label>
        <div class="relative w-full">
          <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
          </div>
          <input type="text" id="query" name="query" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search post.." required="">
        </div>
        <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <span class="sr-only">Search</span>
        </button>
      </form>
      
      </div>

      @foreach ($posts as $post)
        <div class="flex flex-row flex-wrap items-start gap-10 py-20">
        <div class="w-1/2">
          <img class="w-2/3 float-right" src="{{ asset('image/' . $post->image_path) }}" alt="">
        </div>
        <div class="w-1/3">
          <div class="flex flex-col justify-between gap-5">
            <h2 class="text-5xl">{{ $post->title }}</h2>

            <span class="font-body text-light bg-primary rounded-md py-2 px-4 w-36 text-center">{{ $post->category }}</span>

            <div class="flex flex-row gap-5 font-body text-2xl"><span class="italic font-semibold">By: {{ $post->user->name }} </span>

            <span class="font-light">{{ date('F d, Y', strtotime($post->updated_at)) }}</span></div>
            <p class="text-xl w-3/5">{{ $post->description }}</p>

            <div class="flex flex-row flex-wrap font-bold font-heading justify-between">
              <button class=" bg-accent w-max-content p-3 rounded-md "><a href="/blog/{{ $post->id }}">Read more >></a></button>

              @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="flex flex-row gap-1">
                  <a href="/blog/{{ $post->id }}/edit">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm w-max-content p-3 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </button>
                  </a>
                  
                  <form action="/blog/{{ $post->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg w-max-content p-3 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                    </button>
                  </form>
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </section>
@endsection
