@extends('users.index')
@section('name')
    @include('users.home.section_banner')

    <div class=" mb-5">
        <h3 class="text-center pb-4 pt-5">Văn bản pháp luật</h3>
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                @if (count($files) > 0)
                    <div class="content-side col-lg-12 col-md-12 col-sm-12">
                        <div class="our-blogs">
                            @foreach ($files as $item)
                         
                                <div class="news-block-two">
                                    <div class="inner-box">
                                        <div class="image">
                                            @if ($item->image)
                                                <a href="{{ route('file.preview', $item->id) }}"><img src="{{ asset($item->image) }}" class="img-newws" alt="" /></a>
                                            @else
                                                <a href="{{ route('file.preview', $item->id) }}"><img class="img-newws"
                                                        src="{{ asset('/source/images/resource/news-4.jpg') }}"
                                                        alt=""  /></a>
                                            @endif
                                        </div>
                                      
                                        <h4><a href="{{ route('file.preview', $item->id) }}" class="text-limit-2-line">{{ $item->name }}</a></h4>
                                        <p class="text-limit-2-line">Giá:{{ number_format($item->price) }} đ</p>
                                        <div class="post-date">
                                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F, Y') }}
                                            by <span>Admin</span></div>
                                            <div class="d-flex">
                                                <div class="pe-2">
                                                    <form action="{{ route('file.download', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success">Download <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                                                            <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                                                            <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                                                          </svg></button>
                                                    </form>
                                                </div>
                                                <div class="ps-2">

                                                    <a href="{{ route('file.preview', $item->id) }}" class="btn btn-primary">Xem trước <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                      </svg></a>
                                                </div>
                                            </div>
                                       
                                    </div>
                                </div>
                            @endforeach
                            <!-- News Block Two -->

                        </div>

                        <!-- Post Share Options -->
                        <div class="nac_pri d-flex" style="justify-content: center">
                            {{ $files->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>

                    </div>
                @else
                    <h4 class="text-center">Không có văn bản nào....</h4>
                @endif



            </div>
        </div>
    </div>

@endsection
