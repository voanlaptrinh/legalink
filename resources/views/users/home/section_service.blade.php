<!-- Services Section -->
<section class="services-section">
    <div class="auto-container">
        <!-- Sec Title -->
        <div class="sec-title centered">
            <div class="title">Dịch Vụ</div>
            <h2>Chúng Tôi Hỗ Trợ và Tư Vấn</h2>
        </div>
        @if (count($menus) > 0)
        <div class="row clearfix">
            @foreach ($menus as $items)
                <div class="service-block col-lg-3 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-layer" style="background-image: url({{asset('source/images/resource/service-1.jpg')}})">
                        </div>
                       
                        <h5><a href="{{ route('menu.show', $items->alias) }}">{{$items->title}}</a></h5>
                        <div class="text defau_3" style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">{{$items->description}}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="service-block col-lg-3 col-md-6 col-sm-12">
                <div class="inner-box">
                    <div class="image-layer" style="background-image: url({{asset('source/images/resource/service-1.jpg')}})">
                    </div>
                   
                    <h5><a href="">Văn bản pháp luật</a></h5>
                    <div class="text defau_3" style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">
                    </div>
                </div>
            </div>
        </div>
        @else
            <p class="text-center">Không có dịch vụ</p>
        @endif
        
    </div>
</section>
<!-- End Services Section -->
