<!-- About Section -->
<section class="about-section">
    <div class="auto-container">
        <!-- Upper Section -->
        <div class="upper-section">
            <div class="row clearfix">

                <!-- About Block -->
                @foreach ($minds as $key=> $mind)
            
                <div class="about-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="number">{{$key+1}}</div>
                        <div class="icon flaticon-checked"></div>
                        <h3>{{$mind->name}}</h3>
                        <div class="text">{{$mind->description}}</div>
                    </div>
                </div>
                @endforeach

             

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
                        <div class="text" style="text-align: justify;">{{$introduces->description}}
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
