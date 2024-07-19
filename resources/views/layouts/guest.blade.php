<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
<style>

@keyframes shadow-animation {
    0% {
       filter: drop-shadow(5px 5px rgba(240, 46, 170, 0.4))
        drop-shadow(10px 10px rgba(240, 46, 170, 0.3))
        drop-shadow(15px 15px rgba(240, 46, 170, 0.2))
        drop-shadow(20px 20px rgba(240, 46, 170, 0.1))
        drop-shadow(25px 25px rgba(240, 46, 170, 0.05));
    }
    25% {
        filter: 
        drop-shadow(10px 10px rgba(240, 46, 170, 0.3))
        drop-shadow(5px 5px rgba(240, 46, 170, 0.4))
        drop-shadow(15px 15px rgba(240, 46, 170, 0.2))
        drop-shadow(20px 20px rgba(240, 46, 170, 0.1))
        drop-shadow(25px 25px rgba(240, 46, 170, 0.05));
    }
    50% {
        filter: 
        drop-shadow(15px 15px rgba(240, 46, 170, 0.2))
        drop-shadow(5px 5px rgba(240, 46, 170, 0.4))
        drop-shadow(10px 10px rgba(240, 46, 170, 0.3))
        drop-shadow(20px 20px rgba(240, 46, 170, 0.1))
        drop-shadow(25px 25px rgba(240, 46, 170, 0.05));
    }
    75% {
        filter: 
        drop-shadow(20px 20px rgba(240, 46, 170, 0.1))
        drop-shadow(5px 5px rgba(240, 46, 170, 0.4))
        drop-shadow(10px 10px rgba(240, 46, 170, 0.3))
        drop-shadow(15px 15px rgba(240, 46, 170, 0.2))
        drop-shadow(25px 25px rgba(240, 46, 170, 0.05));
    }
    100% {
        filter: 
        drop-shadow(25px 25px rgba(240, 46, 170, 0.05))
        drop-shadow(5px 5px rgba(240, 46, 170, 0.4))
        drop-shadow(10px 10px rgba(240, 46, 170, 0.3))
        drop-shadow(15px 15px rgba(240, 46, 170, 0.2))
        drop-shadow(20px 20px rgba(240, 46, 170, 0.1));
    }
}

#loconnhabago {
    width: 300px;
    animation: shadow-animation 3s infinite alternate;
    margin-bottom: 10px;
}
</style>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased" >
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" >
            <div>
                <a href="/">
                    {{-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> --}}
                    <img id="loconnhabago" src="../../../storage/block/header/logo_chinh.png" alt="header_logo" 
                   />
                    
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
