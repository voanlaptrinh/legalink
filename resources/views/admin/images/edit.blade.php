@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Sửa thư viện ảnh</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ old('title', $image->title) }}" id="title" placeholder="Tiêu đề">
                                    @error('title')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                            <div class="text-center">
                                <img id="preview-image" src="{{ asset($image->image) }}" alt=""
                                    class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px;"
                                    onclick="document.getElementById('image').click()">
                                <input type="file" class="form-control" name="image" id="image"
                                    style="display: none;" onchange="previewImage(event)">
                            </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>



                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('images.admin') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
