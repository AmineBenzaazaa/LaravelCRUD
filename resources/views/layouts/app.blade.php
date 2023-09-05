<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Posty</title>
    </head>
    <body class="bg-gray-200">
        <nav class="bg-gray-900 p-4 flex justify-between items-center">
            <ul class="flex space-x-4">
                <li><a href="{{ route('home') }}" class="text-white hover:underline">Home</a></li>
                <li><a href="{{ route('dashboard') }}" class="text-white hover:underline">Dashboard</a></li>
                <li><a href="{{ route('posts') }}" class="text-white hover:underline">Posts</a></li>
            </ul>
            <ul class="flex space-x-4">
                @auth
                    <li>
                        <a href="#" class="text-white hover:underline">{{ auth()->user()->name}}</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="text-white hover:underline">Logout</button>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="{{ route('register') }}" class="text-white hover:underline">Register</a>
                    </li>
                    <li>
                        <a href="{{ route('login') }}"  class="text-white hover:underline">Login</a>
                    </li>
                @endguest
            </ul>
        </nav>


        @yield('content')
    </body>
</html>