<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ $webConfig->title }}</title>
    <meta name="description" content="{{ $webConfig->description }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{ $webConfig->key }}">
    <link rel="canonical" href="https://legalink.com" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/source/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/source/img/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/source/img/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="144x144" href="{{ asset('/source/img/android-chrome-144x144.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('/source/img/android-chrome-192x192.png') }}">

    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/source/img/apple-touch-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('/source/img/apple-touch-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('/source/img/apple-touch-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('/source/img/apple-touch-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/source/img/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('/source/img/apple-touch-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('/source/img/apple-touch-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/source/img/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('/source/img/apple-touch-icon-76x76.png') }}">
    <link rel="apple-touch-startup-image" href="{{ asset('/source/img/apple-touch-icon-180x180.png') }}" />

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Legalink">
    <meta property="og:url" content="https://legalink.com/">

    <meta property="og:title" content="{{ $webConfig->title }}">
    <meta property="og:description" content="{{ $webConfig->description }}">


    <meta property="og:image" content="{{ asset('source/img/512x512.png') }}">
    <meta property="og:locale" content="vi">

    <meta itemprop="image" content="{{ asset('source/img/512x512.png') }}">


    <!-- Stylesheets -->
    <link href="{{ asset('/source/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/source/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('/source/css/responsive.css') }}" rel="stylesheet">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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

    <style>
        /* icon FB messager */
        .btn-zalo-right {
            left: 0px;
            bottom: 80px !important;
        }
    </style>



    </div>
    <div id="button-contact-vr" class="">
        <div id="gom-all-in-one">
            <!-- Phone -->
            <div class="phone-bar phone-bar-n">
                <a href="tel:{{ $webConfig->phone }}">
                    <span class="text-phone">{{ $webConfig->phone }}</span>
                </a>
            </div>
            <div id="phone-vr" class="button-contact">
                <div class="phone-vr">
                    <div class="phone-vr-circle-fill"></div>
                    <div class="phone-vr-img-circle">
                        <a href="tel:{{ $webConfig->phone }}">
                            <img src="{{ asset('/source/images/phone.png') }}">
                        </a>
                    </div>
                </div>
            </div>
            <!-- end phone -->
        </div>

    </div>







    <!--End pagewrapper-->

    <!-- Scroll To Top -->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-up"></span></div>

    <script src="{{ asset('/source/js_user/jquery.js') }}"></script>
    <script src="{{ asset('/source/js_user/popper.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('/source/js_user/appear.js') }}"></script>
    <script src="{{ asset('/source/js_user/wow.js') }}"></script>
    <script src="{{ asset('/source/js_user/parallax.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/tilt.jquery.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/swiper.min.js') }}"></script>
    <script src="{{ asset('/source/js_user/validate.js') }}"></script>
    <script src="{{ asset('/source/js_user/jquery-ui.js') }}"></script>
    <script src="{{ asset('/source/js_user/script.js') }}"></script>
    <script src="{{ asset('/source/js/toastr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

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
    <script>
        $('.dropdown a').on('click', function(e) {
            if ($(this).next('ul').length) {
                e.preventDefault(); // This will stop the link from being followed
            }
        });
    </script>
</body>

</html>
