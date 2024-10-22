@extends('users.index')
@section('name')
    @include('users.home.section_banner')



    <section class="about-section">
        <div class="auto-container">


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
                            <div class="text">{{ $introduces->description }}
                            </div>
                            <h6>{{$introduces->name_ceo}}</h6>
                            <div class="designation">CEO/Luật LEGALINK</div>
                        
                        </div>
                    </div>

                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-sm-12 col-sm-12">
                        <div class="inner-column wow slideInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
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
    <section class="testimonial-section pb-5" id="noi__gioithieyu">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <div class="title">Nội dung</div>

            </div>
            <div class="content">
                {!! $introduces->content !!}
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title light centered">
                <div class="title">Nhân sự</div>
                <h2>Chuyên viên tư vấn</h2>
            </div>
            <div class="team-carousel">
                <div class="swiper-wrapper">
                    @foreach ($members as $member)
                        <div class="swiper-slide">

                            <!-- Team Block -->
                            <div class="team-block">
                                <div class="inner-box">
                                    <div class="image">
                                        @if ($member->image)
                                            <a href=""><img src="{{ asset($member->image) }}" class="img-member" 
                                                    alt="" /></a>
                                        @else
                                            <a href=""><img src="{{ asset('/source/images/resource/team-1.jpg') }}"
                                                    class="img-member"  alt="" /></a>
                                        @endif
                                    </div>
                                    <div class="lower-content">
                                        <h3><a href="">{{ $member->name }}</a></h3>
                                        <div class="text">{{ $member->description }}</div>
                                        <!-- Social Box -->
                                        <ul class="social-box">
                                            <li><a href="mailto: {{ $member->email }}"><span
                                                        class="icofont-mail"></span></a></li>
                                            <li><a href="tel: +{{ $member->phone }}"><span class="icofont-phone"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach




                </div>

                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>

            </div>
        </div>
    </section>
@endsection
