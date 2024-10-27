@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Thêm mới thành viên</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('members.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="name">Tên thành viên</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                        id="name" placeholder="Tên thành viên">
                                    @error('name')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email" placeholder="email">
                                    @error('email')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phone">Số điện thoại</label>
                                    <input type="number" class="form-control" name="phone" value="{{ old('phone') }}"
                                        id="phone" placeholder="Số điện thoại">
                                    @error('phone')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                            <div class="text-center">
                                <img id="preview-image" src="{{ asset('source/imges/none-image.jpg') }}" alt=""
                                    class="review_img img-thumbnail"
                                    style="max-width: 290px; max-height: 288px; cursor: pointer;"
                                    onclick="document.getElementById('image').click()">
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="previewImage(event)" style="display: none;">
                            </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="image">Nội dung:</label>
                        <textarea name="content" id="tyni">{{ old('content') }}</textarea>
                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
