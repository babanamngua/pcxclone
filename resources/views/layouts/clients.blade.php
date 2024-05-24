<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,cyrillic'
        rel='stylesheet' type='text/css'>
        @yield('css') 
        <title>@yield('title')</title>
</head>
<body style="overflow-x: hidden;">
    {{-- <div id="preloader"></div> --}}
    {{-- header --}}
    @include('clients.blocks.header')
        {{-- main --}}
        @yield('content')
        {{-- footer --}}
        @include('clients.blocks.footer')

</body>
</html>