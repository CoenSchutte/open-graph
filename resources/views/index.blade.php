@extends('layouts.app')

@section('content')
    <!--Main-->
    <div class="container pt-24 md:pt-36 mx-auto flex flex-wrap flex-col md:flex-row items-center">
        <!--Left Col-->
        <div class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden">
            <h1 class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left">
                Generate
                <span class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-pink-500 to-purple-500">
                    Graph images
                </span>
                for all your socials
            </h1>
            <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
                No setup required. Just copy-paste the code and you're done!
            </p>

            <form action="{{route('submit')}}" method="POST" class="bg-gray-900 opacity-75 w-full shadow-lg rounded-lg px-8 pt-6
            pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-blue-300 py-2 font-bold mb-2" for="emailaddress">
                    Generate an open graph image
                </label>
                <input
                    class="shadow appearance-none border rounded w-full p-3 text-gray-700 leading-tight focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                    id="url"
                    name="url"
                    type="text"
                    placeholder="https://example.com/"
                />
            </div>

            <div class="flex items-center justify-between pt-4">
                <button
                    class="bg-gradient-to-r from-purple-500 to-pink-500 hover:from-pink-500 hover:to-purple-500 text-white font-bold py-2 px-4 rounded focus:ring transform transition hover:scale-105 duration-300 ease-in-out"
                    type="submit">
                    >
                    Generate
                </button>
            </div>
            </form>
        </div>

        <!--Right Col-->
        <div class="w-full xl:w-3/5 p-12 overflow-hidden">
            <img
                class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
                src="{{asset('img/macbook2.svg')}}"/>
        </div>
    </div>
@endsection
