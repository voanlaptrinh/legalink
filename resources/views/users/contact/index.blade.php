@extends('users.index')
@section('name')
@include('users.home.section_banner')

<!-- Contact Info Section -->
<section class="contact-info-section">
    <div class="auto-container">
        <h3>Liên hệ với chúng tôi nếu có thêm bất kỳ câu hỏi nào, có thể
            dự án & hợp tác kinh doanh</h3>
        <div class="inner-container">
            <div class="row clearfix">
                
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="upper-box">
                            <h6>LIÊN HỆ TRỰC TIẾP</h6>
                            <span class="icon icon-envelope-open"></span>
                        </div>
                        <ul class="info-list">
                            <li><a href="mailto:{{$webConfig->email}}">{{ $webConfig->email}}</a></li>
                            <li><a href="tel:+{{$webConfig->phone}}">{{$webConfig->phone}}</a></li>
                        </ul>
                    </div>
                </div>
                
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="upper-box">
                            <h6>VĂN PHÒNG CỦA CHÚNG TÔI</h6>
                            <span class="icon icon-location-pin"></span>
                        </div>
                        <ul class="info-list">
                            <li>{{$webConfig->address}}</li>
                        </ul>
                    </div>
                </div>
                
                <!-- Info Column -->
                <div class="info-column col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-column">
                        <div class="upper-box">
                            <h6>LÀM VIỆC VỚI CHÚNG TÔI</h6>
                            <span class="icon icon-briefcase"></span>
                        </div>
                        <ul class="info-list">
                            <li><a href="mailto:{{$webConfig->email}}">{{$webConfig->email}}</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- End Contact Info Section -->

<!-- Map Section -->
<section class="map-section">
    <div class="auto-container">
        <!-- Map Outer -->
        <div class="map-outer">
            <iframe src="{{$webConfig->gg_map}}" style="border:0;" allowfullscreen=""></iframe>
        </div>
    </div>
</section>
<!-- End Map Section -->

<!-- Consulation Section -->
<section class="consulation-section">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">NHẬN BÁO GIÁ</div>
            <h2>Yêu cầu tư vấn miễn phí</h2>
        </div>
        <div class="inner-container">
            
            <!-- Consulation Form -->
            <div class="consulation-form">
                <!-- Consulation Form -->
                <form method="post" action="{{route('contacts.store')}}" >
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <select name="select_what" class="custom-select-box">
                                <option value="Câu hỏi">Câu hỏi</option>
                                <option value="Phản hồi">Phản hồi</option>
                                <option value="Liên hệ">Liên hệ</option>
                                
                            </select>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                            <input type="text" name="name" value="{{old('name')}}" placeholder="Tên" required>
                            @error('name')
                            <p class="fw-bold" style="color: red;">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="col-lg-4 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" value="{{old('email')}}" placeholder="E-mail" required>
                            @error('email')
                            <p class="fw-bold" style="color: red;">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="text" name="phone" value="{{old('phone')}}" placeholder="Số điện thoại" required>
                            @error('phone')
                            <p class="fw-bold" style="color: red;">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="description" placeholder="Nội dung">{{old('description')}}</textarea>
                            @error('description')
                            <p class="fw-bold" style="color: red;">{{ $message }}</p>
                        @enderror
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 text-center form-group">
                            <button class="theme-btn btn-style-one" type="submit" ><span class="txt">Gửi liên hệ</span></button>
                        </div>

                    </div>
                </form>

            </div>
            <!-- End Consulation Form -->
            
        </div>
    </div>
</section>
<!-- End Consulation Section -->

@endsection