<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Actionless App</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap");

        html {
            font-family: "Poppins", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>

<body class="leading-normal tracking-normal text-indigo-400 m-6 bg-cover bg-fixed"
      style="background-image: url({{asset('img/header.png')}});">
<div class="h-full">
    <!--Nav-->
    <div class="w-full container mx-auto">
        <div class="w-full flex items-center justify-between">
            <a class="flex items-center text-indigo-400 no-underline hover:no-underline font-bold text-2xl lg:text-4xl"
               href="#">
                <span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-pink-400 via-pink-500 to-purple-500">Actionless</span>
            </a>
        </div>
    </div>

    @yield('content')


    <!--Footer-->
        <div class="w-full pt-16 pb-6 text-sm text-center md:text-left fade-in">
            <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; App 2022</a>
            - By
            <a class="text-gray-500 no-underline hover:no-underline" href="https://twitter.com/robinmartijn"
               target="_blank">Robin Martijn</a>
            And
            <a class="text-gray-500 no-underline hover:no-underline" href="https://twitter.com/coenschutte"
               target="_blank">Coen Schutte</a>
        </div>
    </div>
</div>
</body>
</html>
