@extends('admin.index')
@section('content')
  

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cài đặt web</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('webConfig.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                           <div class="text-center"> 
                            <img id="preview-image"  
                            src="{{ $webConfig->logo ? asset('storage/' . $webConfig->logo) : asset('source/imges/none-image.jpg') }}" 
                            alt="Preview Image" 
                            class="review_img img-thumbnail" 
                            style="max-width: 290px; max-height: 288px;">
                       
                            <input type="file" class="form-control" name="logo" id="image" onchange="previewImage(event)">
                           </div>
                            @error('logo')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="title">Tên web</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $webConfig->title) }}" id="title"
                                        placeholder="Tiêu đề">
                                    @error('title')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="title">Địa chỉ</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address', $webConfig->address) }}" id="address"
                                        placeholder="Địa chỉ">
                                    @error('address')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Mã số thuế</label>
                                    <input type="text" class="form-control" name="code" value="{{ old('code', $webConfig->code) }}" id="code"
                                        placeholder="Mã số thuế">
                                    @error('code')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Email</label>
                                    <input type="text" class="form-control" name="email" value="{{ old('email', $webConfig->email) }}" id="email"
                                        placeholder="Email">
                                    @error('email')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $webConfig->phone) }}" id="phone"
                                        placeholder="Số điện thoại">
                                    @error('phone')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Key Seo</label>
                                    <input type="text" class="form-control" name="key" value="{{ old('key', $webConfig->key) }}" id="key"
                                        placeholder="Key Seo">
                                    @error('key')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Đường dẫn gg map</label>
                                    <input type="text" class="form-control" name="gg_map" value="{{ old('gg_map', $webConfig->gg_map) }}" id="gg_map"
                                        placeholder="Đường dẫn gg map">
                                    @error('gg_map')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Facebook</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ old('facebook', $webConfig->facebook) }}" id="facebook"
                                        placeholder="Facebook">
                                    @error('facebook')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                               
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Zalo</label>
                                    <input type="text" class="form-control" name="zalo" value="{{ old('zalo', $webConfig->zalo) }}" id="zalo"
                                        placeholder="Zalo">
                                    @error('zalo')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Pinterest</label>
                                    <input type="text" class="form-control" name="pinterest" value="{{ old('pinterest', $webConfig->pinterest) }}" id="pinterest"
                                        placeholder="Pinterest">
                                    @error('pinterest')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Youtube</label>
                                    <input type="text" class="form-control" name="youtube" value="{{ old('youtube', $webConfig->youtube) }}" id="youtube"
                                        placeholder="Youtube">
                                    @error('youtube')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Dribbble</label>
                                    <input type="text" class="form-control" name="dribbble" value="{{ old('dribbble', $webConfig->dribbble) }}" id="dribbble"
                                        placeholder="Dribbble">
                                    @error('dribbble')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Whats app</label>
                                    <input type="text" class="form-control" name="whats_app" value="{{ old('whats_app', $webConfig->whats_app) }}" id="whats_app"
                                        placeholder="Whats app">
                                    @error('whats_app')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok" value="{{ old('tiktok', $webConfig->tiktok) }}" id="tiktok"
                                        placeholder="Tiktok">
                                    @error('tiktok')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Telegram</label>
                                    <input type="text" class="form-control" name="telegram" value="{{ old('telegram', $webConfig->telegram) }}" id="telegram"
                                        placeholder="Telegram">
                                    @error('telegram')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Google</label>
                                    <input type="text" class="form-control" name="google" value="{{ old('google', $webConfig->google) }}" id="google"
                                        placeholder="Google">
                                    @error('google')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Twitter</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ old('twitter', $webConfig->twitter) }}" id="twitter"
                                        placeholder="Twitter">
                                    @error('twitter')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">Instagram</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ old('instagram', $webConfig->instagram) }}" id="instagram"
                                        placeholder="Instagram">
                                    @error('instagram')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">reddit</label>
                                    <input type="text" class="form-control" name="reddit" value="{{ old('reddit', $webConfig->reddit) }}" id="reddit"
                                        placeholder="reddit">
                                    @error('reddit')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label class="form-label" for="title">linkedin</label>
                                    <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin', $webConfig->linkedin) }}" id="linkedin"
                                        placeholder="linkedin">
                                    @error('linkedin')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="5" cols="50" name="description" id="description" class="form-control">{{ old('description', $webConfig->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                 

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
