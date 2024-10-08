@extends('users.index')
@section('name')
@include('users.home.section_banner')

<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!-- Content Side -->
            <div class="content-side col-lg-12 col-md-12 col-sm-12">
                <div class="our-blogs">
                    @foreach ($files as $item)
                    <div class="news-block-two">
                        <div class="inner-box">
                            <div class="image">
                                @if ($item->image)
                                <a href=""><img src="{{asset('/storage/' . $item->image)}}" alt="" /></a>
                                @else
                                    
                                <a href=""><img src="{{asset('/source/images/resource/news-4.jpg')}}" alt="" /></a>
                                @endif
                            </div>
                       
                            <h4><a href="" class="text-limit-2-line">{{$item->name}}</a></h4>
                            <p class="text-limit-2-line">{{number_format($item->price)}}</p>
                            <div class="post-date">{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F, Y') }}
                                by <span>Admin</span></div>
                                <form action="{{ route('file.download', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Download</button>
                                </form>
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
            
          
            
        </div>
    </div>
</div>

@endsection