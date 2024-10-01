<header class="main-header">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <!-- Top Left -->
                <div class="top-left pull-left">
                    <div class="text">{{ $webConfig->address }}</div>
                </div>

                <!-- Top Right -->
                <div class="top-right pull-right">
                    <!-- Info List -->
                    <ul class="info-list">
                        <li><a href="mailto:{{ $webConfig->email }}">{{ $webConfig->email }}</a></li>
                        <li><a href="tel:{{ $webConfig->phone }}">{{ $webConfig->phone }}</a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>

    <!-- Header Upper -->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">

                <div class="pull-left logo-box">
                    <div class="logo"><a href="{{ route('home') }}"><img src="{{ asset('source/images/logo.png') }}"
                                alt="" title=""></a></div>
                    <div class="logo-two"><a href="{{ route('home') }}"><img
                                src="{{ asset('source/images/logo-2.png') }}" alt="" title=""></a></div>
                </div>

                <div class="nav-outer clearfix">
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse show collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation left-nav clearfix">

                                <li class="dropdown"><a href="">Thông Tin</a>
                                    <ul>
                                        <li><a href="{{ route('introduce') }}">Về Chúng Tôi</a></li>
                                        <li><a href="{{ route('members') }}">Nhân Sự</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="">Dịch Vụ</a>
                                    <ul>
                                        @foreach ($menus as $menu)
                                            <li class="{{ $menu->children->count() ? 'dropdown' : '' }}">
                                                <a href="#"
                                                    onclick="window.location.href='{{ route('menu.show', $menu->alias) }}'; return false;">{{ $menu->title }}</a>



                                                @if ($menu->children->count())
                                                    <ul>
                                                        @foreach ($menu->children as $subMenu)
                                                            <li><a
                                                                    href="{{ route('menu.show', $subMenu->alias) }}">{{ $subMenu->title }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                        <li> <a href="{{route('law.index')}}">Văn Bản Pháp Luật</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="navigation right-nav clearfix">
                                <li class="dropdown"><a href="#">Tin Tức</a>
                                    <ul>
                                        <li><a href="{{ route('news') }}">Tin Tức</a></li>
                                        <li><a href="{{ route('thuvien') }}">Thư Viện Ảnh</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contacts') }}">Liên Hệ</a></li>
                            </ul>

                        </div>

                    </nav>

                    <!-- Social Box -->
                    <ul class="social-box">
                        <li><a href=""><span class="icofont-facebook"></span></a></li>
                        <li><a href=""><span class="icofont-youtube"></span></a></li>
                        <li><a href=""><span class="icofont-tiktok"></span></a></li>
                    </ul>


                    <style>
                        /* Ẩn danh sách khi không hover */
                        .dropdown-menu {
                            display: none;
                            position: absolute;
                            list-style: none;
                            background-color: #fff;
                            padding: 0;
                            margin: 0;
                            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                        }

                        /* Hiển thị danh sách khi hover vào phần tử li.dropdown */
                        .frop:hover .dropdown-menu {
                            display: block;
                        }

                        /* Kiểu cho các phần tử con trong dropdown */
                        .dropdown-menu li {
                            padding: 10px;
                            white-space: nowrap;
                        }

                        .dropdown-menu li a {
                            text-decoration: none;
                            color: #333;
                        }

                        /* Đảm bảo dropdown không di chuyển vị trí */
                        .frop {
                            position: relative;
                        }

                        .dropdown-menu li a:hover {
                            background-color: #f1f1f1;
                        }
                    </style>
                    <!-- Outer Box -->
                    <div class="outer-box">
                        <ul class="language-nav">
                            <li><a href="#"><i class="icofont-search"></i></a></li>
                            @if (Auth::user())
                                <li class="frop">
                                    <a href="#"><i class="icofont-user"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="text-dark" style="font-size: 12px" href="#"
                                                onclick="window.location.href=''; return false;">{{ Auth::user()->name }}</a>
                                        </li>
                                        <li><a class="text-dark" style="font-size: 12px" >Số tiền: {{ number_format( Auth::user()->price) }}</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('logout') }}" method="post">
                                                @csrf
                                                <button class="btn">Đăng xuất</button>
                                            </form>

                                        </li>
                                    </ul>
                                </li>
                            @else
                                <a class="text-white" href="{{ route('login') }}">Login/Logout</a>
                            @endif

                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!--End Header Upper-->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon lnr lnr-cross"></span></div>

        <nav class="menu-box">
            <div class="nav-logo"><a href=""><img src="{{ asset('/source/images/logo-2.png') }}" alt=""
                        title=""></a>
            </div>
            <div class="ps-3">
               @if (Auth::user())
               <details>
                <summary class="text-dark">{{Auth::user()->name}}</summary>
                <ul class="ps-4">
                    <li class="text-dark">Số tiền: {{ number_format(Auth::user()->price)}}</li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn">Đăng xuất</button>
                    </form>
                </ul>
            </details>
               @else
                   <a href="{{route('login')}}">Đăng nhập/ Đăng xuất</a>
               @endif
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
