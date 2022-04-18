@extends('layouts.app')

@section('content')
    <div class="h-screen bg-gray-50">
        <div class="w-4/5 m-auto text-center">
            <div class="py-15 border-b border-gray-200">
                <h1 class="text-5xl">
                    Blog Posts
                </h1>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="w-4/5 m-auto mt-10 pl-2">
                <p class="w-2/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                    {{ session()->get('message') }}
                </p>
            </div>
        @endif

        @if (Auth::check())
            <div class="flex items-center justify-center w-full" >
                <div class="w-auto">
                    <a
                        href="/blog/create"
                        class="bg-blue-500 bg-transparent text-gray-100
                        text-xs font-extrabold py-3 px-5 rounded-3xl"
                    >
                        Create Post
                    </a>
                </div>
            </div>
        @endif

        @if(!Auth::check())
            <div class="flex justify-center">
                <div>
                    Register or Login to create a new post
                </div>
            </div>
        @endif

        @foreach($posts as $post)
            <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
                <div>
                    <img src="{{ asset('images/' . $post->image_path) }}" alt="blog_post">
                </div>
                <div>
                    <div>
                        <h2 class="text-gray-700 font-bold text-5xl pb-4">
                            {{ $post->title }}
                        </h2>
                    </div>

                    <span class="text-gray-500">
                        By <span class="font-bold italic">{{ $post->user->name }}</span>,
                        Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                    </span>

                    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                        {{ $post->description }}
                    </p>
                    <div class="flex justify-between items-center">
                        <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                            Keep Reading
                        </a>

                        @if(isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                            <a href="/blog/{{ $post->slug }}/edit" class="text-gray-50 italic hover:text-gray-900 float-right bg-blue-500 p-6 rounded-2xl px-8 font-bold">
                                Edit
                            </a>

                            <form action="/blog/{{ $post->slug }}" method="POST"> @csrf @method('delete')
                            <button class="text-red-500" type="submit">
                                Delete
                            </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
