<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title here -->
    <title>Legalink - Tâm Trí Tín</title>

    <!-- Meta tag SEO here-->
    <meta name="title" content="Luật Legalink">
    <meta name="discription" content="Công ty trách nhiệm hữu hạn luật Legalink">
    <meta name="keyworld" content="Luật, legalink, pháp lý, pháp chế">
    <meta name="robots" content="noodp,index,follow">
    <meta name="revisit-after" content="1-days">
    <meta http-equiv="content-language" content="vi">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="google" content="nositelinkssearchbox">


    <!-- Stylesheets -->
    <link href="{{asset('/source/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/source/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/source/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/source/css/icofont.min.css">
    <link rel="stylesheet" href="{{ asset('/source/css/toastr.min.css') }}">


    <!-- Fonts -->
    {{-- <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=EB+Garamond:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <meta name="msapplication-TileImage" content="/images/favicon.ico" />

</head>

<body>

    <div class="page-wrapper">

        <!-- Main Header-->
        @include('users.header')
        <!--End Main Header -->

        <!-- Main Body -->
        @yield('name')
        <!-- End Main Body-->

        <!-- Main Footer -->
        @include('users.footer')
        <!-- End Main Footer -->

    </div>





    
    <!--End pagewrapper-->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

    <script src="{{asset('/source/js_user/jquery.js')}}"></script>
    <script src="{{asset('/source/js_user/popper.min.js')}}"></script>
    <script src="{{asset('/source/js_user/bootstrap.min.js')}}"></script>
    <script src="{{asset('/source/js_user/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script src="{{asset('/source/js_user/jquery.fancybox.js')}}"></script>
    <script src="{{asset('/source/js_user/appear.js')}}"></script>
    <script src="{{asset('/source/js_user/wow.js')}}"></script>
    <script src="{{asset('/source/js_user/parallax.min.js')}}"></script>
    <script src="{{asset('/source/js_user/tilt.jquery.min.js')}}"></script>
    <script src="{{asset('/source/js_user/jquery.paroller.min.js')}}"></script>
    <script src="{{asset('/source/js_user/swiper.min.js')}}"></script>
    <script src="{{asset('/source/js_user/validate.js')}}"></script>
    <script src="{{asset('/source/js_user/jquery-ui.js')}}"></script>
    <script src="{{asset('/source/js_user/script.js')}}"></script>
    <script src="{{ asset('/source/js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>
    <script>$('.dropdown a').on('click', function(e) {
        if ($(this).next('ul').length) {
            e.preventDefault(); // This will stop the link from being followed
        }
    });
    
    </script>
</body>

</html>
