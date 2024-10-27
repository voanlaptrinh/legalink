<!-- Upper Section -->
<div class="upper-section">
    <div class="row clearfix">
        <!-- About Block -->
        @foreach ($minds as $key=> $mind)
            
        <div class="about-block col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="number">{{$key}}</div>
                <div class="icon flaticon-checked"></div>
                <h3>{{$mind->name}}</h3>
                <div class="text">{{$mind->description}}</div>
            </div>
        </div>
        @endforeach
        <!-- About Block -->
        {{-- <div class="about-block col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="number">2</div>
                <div class="icon flaticon-checked"></div>
                <h3>TRÍ</h3>
                <div class="text">Là thông minh, trí tuệ trong cách xử lý công việc, có tầm nhìn và
                    chiến lược rõ ràng. </div>
            </div>
        </div>

        <!-- About Block -->
        <div class="about-block col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                <div class="number">3</div>
                <div class="icon flaticon-checked"></div>
                <h3>TÍN</h3>
                <div class="text">Là uy tín, tin cậy và trung thực trong công việc, giữ đúng cam kết
                    với khách hàng. </div>
            </div>
        </div> --}}

    </div>
</div>
