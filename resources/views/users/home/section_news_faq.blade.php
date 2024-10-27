<!-- Default Section -->
<section class="default-section">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- News Column -->
            <div class="news-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="title">Tin Tức</div>
                        <h2>Tin tức mới nhất</h2>
                    </div>

                    <!-- News Block -->
                    @foreach ($latestNews as $latestNew)
                        <div class="news-block">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="">
                                        @if ($latestNew->image)
                                            <img src="{{ asset( $latestNew->image) }}" alt="" />
                                        @else
                                            <img src="{{ asset('source/images/resource/news-1.jpg') }}"
                                                alt="" />
                                        @endif
                                    </a>
                                </div>
                                <div class="post-date">
                                    {{ \Carbon\Carbon::parse($latestNew->created_at)->translatedFormat('d F, Y') }}
                                </div>
                                <h4>
                                    <a href="{{ route('news.chi', $latestNew->alias) }}" class="text-limit-2-line">{{ $latestNew->title }}</a>
                                </h4>
                                <p class="text-limit-1-line">{{$latestNew->description}}</p>
                            </div>
                        </div>
                    @endforeach



                    <a href="{{ route('news') }}" class="articles">Xem tất cả tin tức</a>

                </div>
            </div>

            <!-- Accordion Column -->
            <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                <div class="inner-column">
                    <!-- Sec Title -->
                    <div class="sec-title">
                        <div class="title">Câu hỏi nhanh</div>
                        <h2>Câu hỏi thường gặp</h2>
                    </div>

                    <ul class="accordion-box">
                        <!--Block-->
                        @foreach ($questions as $index => $question)
                            <li class="accordion block {{ $index == 0 ? 'active-block' : '' }}">
                                <div class="acc-btn {{ $index == 0 ? 'active' : '' }}">
                                    {{ $question->name }} <div class="icon flaticon-down-arrow-1"></div>
                                    <div class="cross-icon flaticon-multiply"></div>
                                </div>
                                <div class="acc-content  {{ $index == 0 ? 'current' : '' }}">
                                    <div class="content">
                                        <div class="text defau_3">{{ $question->description }}</div>
                                        <a href="{{ route('faqs.detail', $question->id) }}">Chi tiết</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    <a href="{{route('faqs')}}" class="questions">Xem tất cả câu hỏi</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Default Section -->
