@include('users.home.section_cta')
<footer class="main-footer">
    <div class="auto-container">
        <div class="logo-box">
            <div class="logo"><a href="{{ route('home') }}"><img src="/images/logo.png" alt="" /></a></div>
        </div>
        <ul class="footer-nav">
            <li><a href="{{ route('introduce') }}">Về Chúng Tôi</a></li>
            <li><a href="{{ route('news') }}">Tin Tức</a></li>
            <li><a href="{{ route('thuvien') }}">Thư Viện</a></li>
            <li><a href="{{ route('contacts') }}">Liên Hệ</a></li>
        </ul>
        <!-- Social Box -->
        <ul class="social-box">
            @if (!empty($webConfig->tiktok))
                <li>
                    <a href="{{ $webConfig->tiktok }}" class="icofont-tiktok"></a>
                </li>
            @endif
            @if (!empty($webConfig->facebook))
                <li class="facebook">
                    <a href="{{ $webConfig->facebook }}" class="icofont-facebook"></a>
                </li>
            @endif
            @if (!empty($webConfig->google))
                <li class="google"><a href="{{ $webConfig->google }}" class="icofont-google-plus"></a></li>
            @endif
            @if (!empty($webConfig->google))
                <li class="instagram"><a href="{{ $webConfig->instagram }}" class="icofont-instagram"></a></li>
            @endif

        </ul>
        <div class="copyright">
            <p>&copy; 2024 <b class="text-white"> Legalink</b> Made with <i class="fa fa-heart text-danger"></i> by
                <a class="text-white" href="https://metasoftware.vn/"><b>MetaSoft</b></a>
            </p>
        </div>
    </div>
</footer>
