@extends('users.index')
@section('name')
    @include('users.home.section_banner')

    <section class="faq-section">
        <div class="auto-container">
            <div class="inner-container">
                <!-- Sec Title -->
                <div class="sec-title centered">
                    <div class="title">Câu hỏi thường gặp</div>
                    <h2>Có thể giúp bạn</h2>
                </div>
               <div class="container">
                <div class="clearfix ">

                    <div class="col-lg-12 col-md-12 ">

                        <ul class="accordion-box row g-3">

                            <!--Block-->
                            @foreach ($faqs as $faq)
                                <li class="accordion block col-lg-6 col-md-12">
                                    <div class="acc-btn">{{$faq->name}}<div
                                            class="icon flaticon-down-arrow-1"></div>
                                        <div class="cross-icon flaticon-multiply"></div>
                                    </div>
                                    <div class="acc-content current" style="display: none;">
                                        <div class="content">
                                            <div class="text">{{$faq->description}}</div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                          

                          
                        </ul>

                    </div>

                </div>
               </div>
            </div>
        </div>
    </section>
@endsection
