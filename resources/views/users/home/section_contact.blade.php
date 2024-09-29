<!-- Consulation Section -->
<section class="consulation-section" style="background-image: url('/images/background/slide-bg-1.jpg')">
    <div class="auto-container">
        <div class="sec-title centered">
            <div class="title">Phản Hồi</div>
            <h2>Câu Hỏi Hoặc Phản Hồi Của Bạn</h2>
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
