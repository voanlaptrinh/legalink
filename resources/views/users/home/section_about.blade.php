<!-- About Section -->
<section class="about-section">
    <div class="auto-container">
        <!-- Upper Section -->
        <div class="upper-section">
            <div class="row clearfix">

                <!-- About Block -->
                <div class="about-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="number">1</div>
                        <div class="icon flaticon-checked"></div>
                        <h3><a href="">TÂM</a></h3>
                        <div class="text">Là tận tâm, tâm huyết cố gắng hết sức, làm hết trách nhiệm và khả
                            năng để đạt được kết quả tốt nhất.</div>
                    </div>
                </div>

                <!-- About Block -->
                <div class="about-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="number">2</div>
                        <div class="icon flaticon-checked"></div>
                        <h3><a href="">TRÍ</a></h3>
                        <div class="text">Là thông minh, trí tuệ trong cách xử lý công việc, có tầm nhìn và
                            chiến lược rõ ràng. </div>
                    </div>
                </div>

                <!-- About Block -->
                <div class="about-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="number">3</div>
                        <div class="icon flaticon-checked"></div>
                        <h3><a href="">TÍN</a></h3>
                        <div class="text">Là uy tín, tin cậy và trung thực trong công việc, giữ đúng cam kết
                            với khách hàng. </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Lower Section -->
        <div class="lower-section">
            <div class="row clearfix">

                <!-- Content Column -->
                <div class="content-column col-lg-6 col-sm-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <div class="title">Về chúng tôi</div>
                            <h2>{{$introduces->name}}</h2>
                        </div>
                        <div class="text">{{$introduces->description}}
                        </div>
                        <h6>{{$introduces->name_ceo}}</h6>
                        <div class="designation">CEO/Luật LEGALINK</div>
                        <a href="{{route('introduce')}}" class="theme-btn btn-style-one"><span class="txt">xem
                                thêm</span></a>
                    </div>
                </div>

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                    <div class="inner-column wow slideInRight" data-wow-delay="0ms"
                        data-wow-duration="1500ms">
                        <div class="image">
                            @if ($introduces->image)
                                    <img src="{{ asset($introduces->image) }}" alt="" class="img-fluid" />
                                @else
                                    <img src="{{ asset('source/images/resource/about.png') }}" alt="" />
                                @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- End Lower Section -->

    </div>
</section>
<!-- End About Section -->
