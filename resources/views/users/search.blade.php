@extends('users.index')
@section('name')
    @include('users.home.section_banner')

    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="our-blogs">
                        @if (count($results) > 0)
                            @foreach ($results as $article)
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

                            <div class="styled-pagination">
                                {{ $results->appends(request()->query())->links('pagination::bootstrap-4') }}
                            </div>
                        @else
                            <h4 class="text-center"> Không có kết quả tìm kiếm</h4>
                        @endif
                        <!-- News Block Two -->



                    </div>

                    <!-- Post Share Options -->

                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <div class="sidebar-title">
                                <h3>Search</h3>
                            </div>
                            <form method="GET" action="{{ route('search') }}">
                                <div class="form-group">
                                    <input type="search" value="{{ old('query', $query ?? '') }}" name="query"
                                        placeholder="Type & Hit Enter...">
                                    <button type="submit"><span class="icon fa fa-search"></span></button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget categories-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h3>Dịch vụ</h3>
                                </div>
                                <ul class="service-cat-two">
                                    @foreach ($menus as $menu)
                                        <li><a href="{{ route('menu.show', $menu->alias) }}">{{ $menu->title }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h3>Tin tức mới</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($latestNews as $latestNew)
                                    <article class="post">
                                        <figure class="post-thumb"><a href="{{ route('news.chi', $latestNew->alias) }}">

                                                @if ($latestNew->image)
                                                    <img src="{{ asset($latestNew->image) }}" alt="" />
                                                @else
                                                    <img src="{{ asset('/source/images/resource/news-4.jpg') }}"
                                                        alt="" />
                                                @endif
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
