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
                                            <img src="{{ asset('/storage/' . $latestNew->image) }}" alt="" />
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
                                    <a href="" class="text-limit-2-line">{{ $latestNew->title }}</a>
                                </h4>
                            </div>
                        </div>
                    @endforeach



                    <a href="{{route('news')}}" class="articles">Xem tất cả tin tức</a>

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
                                {{$question->name}} <div
                                    class="icon flaticon-down-arrow-1"></div>
                                <div class="cross-icon flaticon-multiply"></div>
                            </div>
                            <div class="acc-content  {{ $index == 0 ? 'current' : '' }}">
                                <div class="content">
                                    <div class="text">{{$question->description}}</div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                        



                        {{-- <!--Block-->
                        <li class="accordion block">
                            <div class="acc-btn">Đây là câu hỏi thường gặp ? <div class="icon flaticon-down-arrow-1">
                                </div>
                                <div class="cross-icon flaticon-multiply"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Đây là đoạn trả lời cho câu hỏi thường gặp, nội dung
                                        câu trả lời sẽ được rút ngắn khoảng 256 ký tự, nếu xem chi tiết thì
                                        click vào câu hỏi và xem chi tiết câu trả lời,...</div>
                                </div>
                            </div>
                        </li>

                        <!--Block-->
                        <li class="accordion block">
                            <div class="acc-btn">Đây là câu hỏi thường gặp ? <div class="icon flaticon-down-arrow-1">
                                </div>
                                <div class="cross-icon flaticon-multiply"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Đây là đoạn trả lời cho câu hỏi thường gặp, nội dung
                                        câu trả lời sẽ được rút ngắn khoảng 256 ký tự, nếu xem chi tiết thì
                                        click vào câu hỏi và xem chi tiết câu trả lời,...</div>
                                </div>
                            </div>
                        </li>

                        <!--Block-->
                        <li class="accordion block">
                            <div class="acc-btn">Đây là câu hỏi thường gặp ? <div class="icon flaticon-down-arrow-1">
                                </div>
                                <div class="cross-icon flaticon-multiply"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Đây là đoạn trả lời cho câu hỏi thường gặp, nội dung
                                        câu trả lời sẽ được rút ngắn khoảng 256 ký tự, nếu xem chi tiết thì
                                        click vào câu hỏi và xem chi tiết câu trả lời,...</div>
                                </div>
                            </div>
                        </li>

                        <!--Block-->
                        <li class="accordion block">
                            <div class="acc-btn">Đây là câu hỏi thường gặp ? <div class="icon flaticon-down-arrow-1">
                                </div>
                                <div class="cross-icon flaticon-multiply"></div>
                            </div>
                            <div class="acc-content">
                                <div class="content">
                                    <div class="text">Đây là đoạn trả lời cho câu hỏi thường gặp, nội dung
                                        câu trả lời sẽ được rút ngắn khoảng 256 ký tự, nếu xem chi tiết thì
                                        click vào câu hỏi và xem chi tiết câu trả lời,...</div>
                                </div>
                            </div>
                        </li> --}}

                    </ul>

                    <a href="" class="questions">Xem tất cả câu hỏi</a>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Default Section -->
