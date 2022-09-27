@extends('layouts.app')

@section('content')
    <section class="flex flex-col gap-5 px-36 py-24 text-xl">
      <h1 class="text-6xl mb-10 text-center">{{ $post->title }}</h1>

      <div class="flex flex-col justify-center m-auto w-1/2 gap-5">
      <p class="text-center text-2xl">
        Written by: {{ $post->user->name }} 
      </p>

      <p class="font-body text-light bg-primary rounded-md py-2 px-4 w-max-content text-center">
        {{ $post->category }}
      </p>

      <p>
        Updated at: {{ date('F d, Y', strtotime($post->updated_at)) }}
      </p>
      
      <p class="mb-3 font-light text-gray-500">
        {{ $post->body }}
      </p>
      </div>
      
    </section>
@endsection