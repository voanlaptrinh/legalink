<header class="main-header">

    <!-- Header Top -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container clearfix">

                <!-- Top Left -->
                <div class="top-left pull-left">
                    <div class="text">{{$webConfig->address}}</div>
                </div>

                <!-- Top Right -->
                <div class="top-right pull-right">
                    <!-- Info List -->
                    <ul class="info-list">
                        <li><a href="mailto:{{$webConfig->email}}">{{$webConfig->email}}</a></li>
                        <li><a href="tel:{{$webConfig->phone}}">{{$webConfig->phone}}</a></li>
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
                    <div class="logo"><a href="{{route('home')}}"><img src="{{asset('source/images/logo.png')}}" alt=""
                                title=""></a></div>
                    <div class="logo-two"><a href="{{route('home')}}"><img src="{{asset('source/images/logo-2.png')}}" alt=""
                                title=""></a></div>
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
                                        <li><a href="{{route('introduce')}}">Về Chúng Tôi</a></li>
                                        <li><a href="{{route('members')}}">Nhân Sự</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="">Dịch Vụ</a>
                                    <ul>
                                        <li class="dropdown"><a href="">Luật Doanh Ngiệp</a>
                                            <ul>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                                <li><a href="">Danh Muc 1</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="">Luật Sở Hữu Trí Tuệ</a></li>
                                        <li><a href="">Pháp Luật Đầu Tư</a></li>
                                        <li><a href="">Giấy Phép</a></li>
                                        <li><a href="">Kế Toán Thuế</a></li>
                                        <li><a href="">Giải Quyết Tranh Chấp</a></li>
                                        <li><a href="">Tư Vấn Pháp Luật</a></li>
                                        <li><a href="">Văn Bản Pháp Luật</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="navigation right-nav clearfix">
                                <li class="dropdown"><a href="#">Tin Tức</a>
                                    <ul>
                                        <li><a href="{{route('news')}}">Tin Tức</a></li>
                                        <li><a href="{{route('thuvien')}}">Thư Viện Ảnh</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contacts')}}">Liên Hệ</a></li>
                            </ul>

                        </div>

                    </nav>

                    <!-- Social Box -->
                    <ul class="social-box">
                        <li><a href=""><span class="icofont-facebook"></span></a></li>
                        <li><a href=""><span class="icofont-youtube"></span></a></li>
                        <li><a href=""><span class="icofont-tiktok"></span></a></li>
                    </ul>



                    <!-- Outer Box -->
                    <div class="outer-box">
                        <ul class="language-nav">
                            <li><a href="#"><i class="icofont-search"></i></a></li>
                            <li><a href="#"><i class="icofont-cart"></i></a></li>
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
            <div class="nav-logo"><a href=""><img src="/images/logo-2.png" alt=""
                        title=""></a></div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
