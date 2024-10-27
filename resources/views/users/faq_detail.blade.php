@extends('users.index')
@section('name')
    @include('users.home.section_banner')


    <div class="sidebar-page-container style-two">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-detail">
                        <div class="inner-box">
                            <ul class="post-info">
                                <li><a href="{{ route('home') }}">Trang chủ</a></li>
                                <li>Câu hỏi</li>
                                <li>{{ $faqs->name }}</li>
                            </ul>
                            <div class="content" style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">
                                @if ($faqs->description)
                                    {!! $faqs->description !!}
                                @else
                                    Không có nội dung
                                @endif
                            </div>
                        </div>

                        <!-- Related Projects -->


                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">



                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h3>Bài viết gần đây</h3>
                            </div>
                            <div class="widget-content">
                                @forelse ($latestNews as $latestNew)
                                    <article class="post">
                                        <figure class="post-thumb"><a href="{{ route('news.chi', $latestNew->alias) }}">
                                                @if ($latestNew->image)
                                                    <img src="{{ asset($latestNew->image) }}" alt="" class="img-fluid-news">
                                                @else
                                                    <img src="{{ asset('source/images/resource/post-thumb-1.jpg') }}"
                                                        alt="" class="img-fluid-news">
                                                @endif
                                            </a>
                                        </figure>
                                        <div class="text"><a href="{{ route('news.chi', $latestNew->alias) }}"
                                                class="text-limit-2-line">{{ $latestNew->title }}</a></div>
                                    </article>
                                @empty
                                    Không có tin gần đây
                                @endforelse



                            </div>
                        </div>



                    </aside>
                </div>

            </div>
        </div>



    </div>
@endsection
