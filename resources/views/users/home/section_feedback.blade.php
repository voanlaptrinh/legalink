<!-- Testimonial Section -->
<section class="testimonial-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">Cảm nhận khách hàng</div>
            <h2>Hơn 100 khách hàng hài lòng</h2>
        </div>
        <div class="testimonial-carousel">
            <div class="swiper-wrapper">

                @foreach ($evaluations as $evaluation)
                <div class="swiper-slide">
                    <!-- Testimonial Block -->
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="content">
                                <div class="author-image">
                                    <img src="{{ $evaluation->image ? asset('storage/' .$evaluation->image) : '/source/images/resource/author-1.png' }}" alt="Author Image" />
                                </div>
                                <div class="quote-icon icon_quotations"></div>
                                <div class="author">{{$evaluation->name}}</div>
                                <div class="text defau_3"> {{$evaluation->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               


            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
<!-- End Testimonial Section -->
