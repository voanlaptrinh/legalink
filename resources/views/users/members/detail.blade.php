@extends('users.index')

@section('name')
    @include('users.home.section_banner')

    <div class="sidebar-page-container style-two pb-3">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="blog-detail">
                        <div class="inner-box">
                            <ul class="post-info">
                                <li><a href="/">Trang chủ</a></li>
                                <li><a href="{{ route('members') }}">Nhân sự</a></li>
                                <li>{{ $member->name }}</li>
                            </ul>
                            <div class="content">
                                {!! $member->content !!}
                            </div>
                        </div>



                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Search -->
                        <div class="sidebar-widget search-box">
                            <div class="sidebar-title">
                                <h3>{{ $member->name }}</h3>
                            </div>
                            <div>
                                @if ($member->image)
                                <img src="{{ asset($member->image) }}" alt="" class="img-fluid">
                                @else
                                <img src="{{ asset('/source/images/resource/team-1.jpg') }}" alt="" class="img-fluid">
                                @endif
                               
                            </div>

                        </div>

                        <!-- Categories Widget -->
                        <div class="sidebar-widget categories-widget">
                            <ul>
                                <li><a href="mailto: {{ $member->email }}"><span class="icofont-mail"></span>
                                        {{ $member->email }}</a></li>
                                <li><a href="tel: +{{ $member->phone }}"><span class="icofont-phone"></span>
                                        {{ $member->phone }}</a></li>
                            </ul>
                            <div class="widget-content content">
                                Mô tả ngắn:
                                <div style="  word-wrap: break-word; overflow-wrap: break-word;">
                                    {{ $member->description }}
                                </div>
                            </div>
                        </div>

                        <!-- Popular Posts -->
                        <div class="sidebar-widget popular-posts">
                            <div class="sidebar-title">
                                <h3>Nhân sự</h3>
                            </div>
                            <div class="widget-content">
                                @foreach ($latestMember as $itemmember)
                                    <article class="post">
                                        <figure class="post-thumb">
                                            @if ($itemmember->image)
                                                <a href="{{ route('members.detailuser', $member->alias) }}">
                                                    <img src="{{ asset($itemmember->image) }}" class="img-fluid-news"
                                                        alt="" /></a>
                                            @else
                                                <a href="{{ route('members.detailuser', $itemmember->alias) }}">
                                                    <img src="{{ asset('source/images/resource/post-thumb-1.jpg') }}"
                                                        alt="" class="img-fluid-news">
                                                </a>
                                            @endif

                                        </figure>
                                        <div class="text"><a
                                                href="{{ route('members.detailuser', $itemmember->alias) }}">{{ $itemmember->name }}</a>
                                        </div>
                                    </article>
                                @endforeach


                            </div>
                        </div>

                        <!-- Tags -->


                    </aside>
                </div>

            </div>
        </div>



    </div>
@endsection
