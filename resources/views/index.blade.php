@extends('layouts.app')

@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold pb-14 text-shadow-md">
                    Do you want to become a developer?
                </h1>
                <a href="/blog" class="text-center bg-blue-300 text-gray-700 py-2 px-4 font-bold text-xl uppercase rounded-md hover:bg-gray-800 hover:text-white">
                    Read More
                </a>
            </div>
        </div>
    </div>
@endsection
