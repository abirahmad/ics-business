<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php
        $PageVariation = PageVariation();
        $gtext = gtext();
    @endphp
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    @yield('meta-content')

    <!--favicon-->
    <link rel="shortcut icon"
        href="{{ $gtext['favicon'] ? asset('public/media/' . $gtext['favicon']) : asset('public/backend/images/favicon.ico') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ $gtext['favicon'] ? asset('public/media/' . $gtext['favicon']) : asset('public/backend/images/favicon.ico') }}"
        type="image/x-icon">
    <!-- css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&family=Spartan:wght@400;500;700;800;900&display=swap"
        rel="stylesheet">

    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
    {{-- @endif --}}
    <link href="{{ asset('public/frontend/css/bootstrap-icons.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- js -->

    {{-- <script src="{{ asset('public/frontend/js/popper.min.js') }}"></script> --}}
    
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Initialize Owl Carousel -->
<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            // nav: true,
            autoplay: true,
            autoplayTimeout: 1000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>
