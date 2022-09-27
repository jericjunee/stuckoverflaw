@extends('layouts.app')

@section('content')
  {{-- Hero --}}
  <section class="flex flex-col gap-5 justify-center items-center text-center px-20 py-48 bg-fixed bg-cover" style="background-image: url('{{ URL::asset('image/hero-bg.jpg') }}')">
    <h1 class="text-6xl font-heading text-light text-shadow font-extrabold">Stuck? <br> Find solutions to your problems here.</h1>
    <button class="w-40 mt-5 px-6 py-5 text-lg font-body font-semibold text-light bg-primary rounded-lg hover:bg-accent hover:text-dark">
      <a href="/blog">Find answers</a>
    </button>
  </section>

  {{-- Latest posts --}}
  <section class="flex flex-col justify-center items-center gap-20 p-20 bg-accent">
    <h1 class="text-5xl">Latest Posts</h1>
    <div class="flex container flex-row flex-wrap gap-8 justify-center">
      
      @foreach ($posts as $post)
        <div class="flex flex-col items-center gap-5 bg-light p-5 w-1/4">
          <img class="w-full" src="{{ asset('image/' . $post->image_path) }}" alt="">
          <div class="flex flex-wrap gap-1 justify-center">
            <span class="font-body bg-accent rounded-md py-2 px-4">{{ $post->category }}</span>
          </div>
          <h3 class="text-2xl text-center">{{ $post->title }}</h3>
          <div class="flex flex-wrap gap-3 justify-around">
            <span class="font-body font-bold">{{ $post->user->name }}</span>
            <span class="font-body">{{ date('F d, Y', strtotime($post->updated_at)) }}</span>
          </div>
          <p class="text-center">{{ $post->description }}</p>
          <button class="w-40 px-5 py-2 text-lg font-body font-semibold text-light bg-primary rounded-lg hover:bg-accent hover:text-dark">
            <a href="/blog/{{ $post->id }}">Read more</a>
          </button>
        </div>
      @endforeach
      
    </div>
  </section>
@endsection