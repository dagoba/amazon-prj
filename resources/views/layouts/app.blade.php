<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('view_layouts.app_title')</title>

    <!-- Styles -->
    <link href="{{ mix('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slicktheme.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <script src="{{ asset('js/tagcanvas.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        // window.onload = function () {
        //     try {
        //         TagCanvas.Start('myCanvas', 'tags', {
        //             textColour: '#ff0000',
        //             reverse: true,
        //             outlineMethod: 'none',
        //             OutlineDash: 1,
        //             depth: 0.8,
        //             maxSpeed: 0.1,
        //             minSpeed: 0.1,
        //             zoomStep: 1,
        //             zoomMin: 1,
        //             initial: [0.1, 0.1],
        //             zoomMax: 1,
        //             noSelect: true
        //         });
        //     } catch (e) {
        //         // something went wrong, hide the canvas container
        //         document.getElementById('myCanvasContainer').style.display = 'none';
        //     }
        // };
    </script>
</head>
<body>
<div class="layout">
    <div class="layout--header">
        @include('includes.header')
    </div>
    <div class="layout--container" id="app">
        @yield('content')
    </div>
    <div class="layout--footer">
        @include('includes.footer')
    </div>
</div>
    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script type="text/javascript">
        $('.menu').on('click', function() {
            $('.hambergerIcon').toggleClass('open')
            $('.header--navlink').toggleClass('hide-menu')
        });

        $('.autoplay').slick({
            dots: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                    }
                }, {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                    }
                },
            ]
        });
    </script>
</body>
</html>
