@extends('users.index')
@section('name')
    @include('users.home.section_banner')



    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                @if (count($articles) > 0)
                    <div class="content-side col-lg-9 col-md-12 col-sm-12">
                        <div class="our-blogs">
                            @foreach ($articles as $article)
                                <!-- News Block Two -->
                                <div class="news-block-two">
                                    <div class="">
                                        <div class="title">{{ $article->menuService->title }}</div>
                                        <h4><a
                                                href="{{ route('articles.show', ['alias' => $article->alias]) }}">{{ $article->name }}</a>
                                        </h4>
                                        <div class="post-date">{{ $article->created_at->diffForHumans() }} bởi
                                            <span>Admin</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <!-- Post Share Options -->
                        <div class="styled-pagination">
                            {{ $articles->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                @else
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <h4>Không có bài viết nào...</h4>
                </div>
                @endif
                <!-- Content Side -->


                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">


                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h3>Tin tức</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($latestNews as $latestNew)
                                    <article class="post">
                                        <figure class="post-thumb">
                                            <a href="{{ route('news.chi', $latestNew->alias) }}">
                                                @if ($latestNew->image)
                                                    <img src="{{ asset( $latestNew->image) }}" class="img-fluid-news"
                                                        alt="" />
                                                @else
                                                    <img src="{{ asset('/source/images/resource/news-4.jpg') }}" class="img-fluid-news"
                                                        alt="" />
                                                @endif
                                            </a>
                                        </figure>
                                        <div class="text"><a
                                                href="{{ route('news.chi', $latestNew->alias) }}">{{ $latestNew->title }}</a>
                                        </div>
                                    </article>
                                @endforeach


                            </div>
                        </div>



                    </aside>
                </div>

            </div>
        </div>
    </div>
@endsection
