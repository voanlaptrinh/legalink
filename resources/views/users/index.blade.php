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


    <div class="to-right " data-target="html">

        <div>
            <a href="{{ $webConfig->facebook }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="50px" height="50px">
                    <path
                        d="M 14 3.9902344 C 8.4886661 3.9902344 4 8.4789008 4 13.990234 L 4 35.990234 C 4 41.501568 8.4886661 45.990234 14 45.990234 L 36 45.990234 C 41.511334 45.990234 46 41.501568 46 35.990234 L 46 13.990234 C 46 8.4789008 41.511334 3.9902344 36 3.9902344 L 14 3.9902344 z M 18.005859 12.033203 C 18.633859 12.060203 19.210594 12.414031 19.558594 12.957031 C 19.954594 13.575031 20.569141 14.534156 21.369141 15.785156 C 22.099141 16.926156 22.150047 18.399844 21.498047 19.589844 L 20.033203 21.673828 C 19.637203 22.237828 19.558219 22.959703 19.824219 23.595703 C 20.238219 24.585703 21.040797 26.107203 22.466797 27.533203 C 23.892797 28.959203 25.414297 29.761781 26.404297 30.175781 C 27.040297 30.441781 27.762172 30.362797 28.326172 29.966797 L 30.410156 28.501953 C 31.600156 27.849953 33.073844 27.901859 34.214844 28.630859 C 35.465844 29.430859 36.424969 30.045406 37.042969 30.441406 C 37.585969 30.789406 37.939797 31.366141 37.966797 31.994141 C 38.120797 35.558141 35.359641 37.001953 34.556641 37.001953 C 34.000641 37.001953 27.316344 37.761656 19.777344 30.222656 C 12.238344 22.683656 12.998047 15.999359 12.998047 15.443359 C 12.998047 14.640359 14.441859 11.879203 18.005859 12.033203 z" />
                </svg>
            </a>
        </div>
        <div>
            <a href="tel:{{ $webConfig->phone }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="48px" height="48px">
                    <path fill="#448AFF"
                        d="M24,4C13.5,4,5,12.1,5,22c0,5.2,2.3,9.8,6,13.1V44l7.8-4.7c1.6,0.4,3.4,0.7,5.2,0.7c10.5,0,19-8.1,19-18C43,12.1,34.5,4,24,4z" />
                    <path fill="#FFF" d="M12 28L22 17 27 22 36 17 26 28 21 23z" />
                </svg>
            </a>
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
