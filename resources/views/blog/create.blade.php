@extends('layouts.app')

@section('content')
    <div class="h-screen">
        <div class="w-4/5 m-auto text-left">
            <div class="py-15">
                <h1 class="text-5xl">
                    Create Post
                </h1>
            </div>
        </div>

        @if ($errors->any())
            <div class="2-4/5 m-auto">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="w-1/5 text-gray-50 bg-red-700">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="w-4/5 m-auto pt-20">
            <form action="/blog" method="POST" enctype="multipart/form-data">
                @csrf
                <input
                    type="text"
                    name="title"
                    placeholder="Title.."
                    class="bg-transparent block border-b-2 w-full h-20 text-6xl"
                >
                <textarea
                    name="description"
                    placeholder="Description.."
                    class="py-20 bg-transparent block border-b-2 w-full h-6- text-xl outline-none"
                ></textarea>
                <div class="bd-gry-lighter pt-15">
                    <label
                        class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg
                         shadow-lg tracking-wide uppercase border-blue cursor-pointer"
                    >
                        <span class="mt-2 text-base leading-normal">
                            Select as file
                        </span>
                        <input type="file" name="image" class="hidden">
                    </label>
                </div>
                <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 mb-5 rounded-3xl" >
                    Create Post
                </button>
            </form>
        </div>
    </div>

@endsection

