<!-- Banner Section -->
<section class="banner-section">
    <div class="main-slider-carousel">

        <div class="swiper-wrapper">
            @if (count($sliders)>0)
                @foreach ($sliders as $item)
                    <div class="swiper-slide" style="background-image: url({{ asset( $item->image) }})">
                        <div class="auto-container">

                            <div class="content-boxed">
                                <div class="inner-box">
                                    <div class="title">CÔNG TY TNHH LUẬT LEGALINK</div>
                                    <h2>Hiệu Quả & Niềm TinGiải Pháp Pháp Lý</h2>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            @else
                <div class="swiper-slide" style="background-image: url({{asset('source/images/main-slider/2.jpg')}})">
                    <div class="auto-container">

                        <div class="content-boxed">
                            <div class="inner-box">
                                <div class="title">CÔNG TY TNHH LUẬT LEGALINK</div>
                                <h3><span>Hiệu Quả</span> & <span>Niềm Tin</span> <br> Giải Pháp Pháp Lý</h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide" style="background-image: url({{asset('source/images/main-slider/2.jpg')}})">
                    <div class="auto-container">

                        <div class="content-boxed">
                            <div class="inner-box">
                                <div class="title">CÔNG TY TNHH LUẬT LEGALINK</div>
                                <h3><span>Hiệu Quả</span> & <span>Niềm Tin</span> <br> Giải Pháp Pháp Lý</h3>
                            </div>
                        </div>

                    </div>
                </div>
            @endif


            {{-- <div class="swiper-slide" style="background-image: url(source/images/main-slider/2.jpg)">
                <div class="auto-container">

                    <div class="content-boxed">
                        <div class="inner-box">
                            <div class="title">CÔNG TY TNHH LUẬT LEGALINK</div>
                            <h3><span>Hiệu Quả</span> & <span>Niềm Tin</span> <br> Giải Pháp Pháp Lý</h3>
                        </div>
                    </div>

                </div>
            </div> --}}

        </div>
    </div>

    <!-- Slider Icon Scroll -->
    <div class="slider-icon-scroll scroll-to-target" data-target=".about-section"><span
            class="icofont-scroll-down"></span></div>

</section>
<!-- End Banner Section -->
