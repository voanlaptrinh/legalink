@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Thêm mới sliders</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row g-5">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}"
                                        id="title" placeholder="Tiêu đề">
                                    @error('title')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                            <label class="form-label" for="title">Kích thước 1900px x 663px</label>
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



                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
