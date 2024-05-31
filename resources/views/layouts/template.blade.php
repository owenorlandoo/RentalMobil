<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-gray-800 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                @guest
                    @if (Route::has('login'))
                        <a class="text-white hover:text-green-300 transition duration-300 ease-in-out hover:animate-pulse"
                            href="{{ route('login') }}">Login</a>
                    @endif

                    @if (Route::has('register'))
                        <a class="text-white hover:text-green-300 transition duration-300 ease-in-out hover:animate-pulse"
                            href="{{ route('register') }}">Register</a>
                    @endif
                @else
                    <div class="flex items-center space-x-4">
                        <span class="text-blue-300 text-xl mr-4">Welcome, {{ Auth::user()->name }}</span>
                        
                        <a href="{{ url('/logout') }}" class="text-white">Logout >></a>
                    </div>
                @endguest
            </div>
            <ul class="flex space-x-4">
                {{-- @auth --}}
                    <li class="nav-item">
                        <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                            href="view_products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                            href="view_article">Article</a>
                    </li>
                    {{-- @if (Auth::user()->isAdmin()) --}}
                        <li class="nav-item">
                            <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                                href="adminMobil">Unit Mobil</a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                                href="view_store">Store</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                                href="adminPesanan">Pesanan Kostumer</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                                href="view_brand">Brand</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white hover:text-blue-300 transition duration-300 ease-in-out hover:animate-pulse"
                                href="view_category">Category</a>
                        </li>
                    {{-- @endif

                @endauth --}}
            </ul>
        </div>
    </nav>

    <!-- <div class="container mx-auto mt-5">
        <h1>Hello, selamat datang Customer</h1>
        <h1>{{ Auth::user()->name }}</h1>
        <a href="{{ url('/logout') }}">Logout >></a>
    </div> -->

    <div class="container mx-auto mt-5">
        @yield('content')
    </div>
</body>

</html>
