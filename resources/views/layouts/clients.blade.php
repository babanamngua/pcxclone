<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/clients/css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700&subset=latin,cyrillic'
        rel='stylesheet' type='text/css'>
        @yield('css') 
        <title>@yield('title')</title>
</head>
{{-- style="overflow-x: hidden;" --}}
<body style="overflow-x: hidden;">
    {{-- <div id="preloader"></div> --}}
    {{-- header --}}
    @include('clients.blocks.header')
        {{-- main --}}
        @yield('content')
        {{-- footer --}}
        @include('clients.blocks.footer')

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    const searchButton = document.getElementById('search-button');
    const closeButton = document.getElementById('close-button');
    const searchOverlay = document.getElementById('search-overlay');
    const overlayContent = document.querySelector('.overlay-content');
    const clearBtn = document.getElementById('clear-btn');
    const searchInput = document.getElementById('search-input');

    searchButton.onclick = function() 
    {
        searchOverlay.style.display = 'block';
        searchOverlay.style.zIndex = '4';
        document.body.style.overflowY = 'hidden'; // Đặt overflow-y: hidden cho body
    // searchOverlay.classList.add('show'); 
    }


    closeButton.onclick = function() 
    {
        searchOverlay.style.display = 'none';
        document.body.style.overflowY = 'auto';
        document.body.style.overflowY = 'hidden';
        // searchOverlay.classList.remove('show');
    }

    clearBtn.onclick = function() {
        searchInput.value = '';
        clearBtn.classList.remove('show');
        document.body.style.overflowY = 'auto';
    }

    searchInput.oninput = function() {
        if (searchInput.value) {
            clearBtn.classList.add('show');
        } else {
            clearBtn.classList.remove('show');
        }
    }

    searchOverlay.addEventListener('mousemove', function(event) {
        const rect = overlayContent.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
            searchOverlay.classList.add('exit-cursor');
        } else {
            searchOverlay.classList.remove('exit-cursor');

        }
    });

    searchOverlay.addEventListener('click', function(event) {
        const rect = overlayContent.getBoundingClientRect();
        if (event.clientX < rect.left || event.clientX > rect.right || event.clientY < rect.top || event.clientY > rect.bottom) {
            searchOverlay.style.display = 'none';
            document.body.style.overflowY = 'auto';
        }
    });
</script>
</html>