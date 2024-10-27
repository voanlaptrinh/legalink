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

    <!-- Add site Favicon -->
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <meta name="msapplication-TileImage" content="/images/favicon.ico" />
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
            <a href="tel:{{$webConfig->phone}}">
                <span class="text-phone">{{$webConfig->phone}}</span>
            </a>
        </div>
        <div id="phone-vr" class="button-contact">
            <div class="phone-vr">
                <div class="phone-vr-circle-fill"></div>
                <div class="phone-vr-img-circle">
                    <a href="tel:{{$webConfig->phone}}">
                        <img src="{{asset('/source/images/phone.png')}}">
                    </a>
                </div>
            </div>
        </div>
        <!-- end phone -->
    </div>
 
</div>



{{-- 
    <div class="to-right " data-target="html">
        <div>
            <a href="{{ $webConfig->facebook }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                    <path fill="#448AFF"
                        d="M24,4C13.5,4,5,12.1,5,22c0,5.2,2.3,9.8,6,13.1V44l7.8-4.7c1.6,0.4,3.4,0.7,5.2,0.7c10.5,0,19-8.1,19-18C43,12.1,34.5,4,24,4z" />
                    <path fill="#FFF" d="M12 28L22 17 27 22 36 17 26 28 21 23z" />
                </svg>
            </a>
        </div>
        <div id="button-contact-vr" class="">
            <div id="gom-all-in-one">
                <!-- Phone -->
                <div class="phone-bar phone-bar-n">
                    <a href="tel:0399162342">
                        <span class="text-phone">039.916.2342</span>
                    </a>
                </div>
                <div id="phone-vr" class="button-contact">
                    <div class="phone-vr">
                        <div class="phone-vr-circle-fill"></div>
                        <div class="phone-vr-img-circle">
                            <a href="tel:0399162342">
                                <img src="/images/icons/phone.png">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- end phone -->
            </div>
            <!-- end v3 class gom-all-in-one -->
        </div>
      


    </div> --}}



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
