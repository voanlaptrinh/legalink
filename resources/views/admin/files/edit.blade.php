@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Form</strong></h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('files.create') }}" class="btn btn-primary">Thêm mới Files</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title">Form Sửa</h5>
                    <h6 class="card-subtitle text-muted">Sửa Files</h6>
                </div>
                <div class="card-body">
                    <!-- Form thêm mới danh mục -->
                    <form action="{{ route('files.update', $file->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-0">
                            <div class="mb-3 col-lg-6">
                                <div>
                                    <label class="form-label" for="title">Tên bài viết:</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Tên bài viết" value="{{ old('name', $file->name) }}">
                                    @error('name')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label" for="title">Giá:</label>
                                    <input type="number" name="price" class="form-control"
                                        value="{{ old('price', $file->price) }}" required>
                                    @error('price')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label" for="title">File:</label>
                                    <input type="file" name="file" class="form-control" >
                                    <p>Current File: <a href="{{ asset( $file->file) }}"
                                            target="_blank">{{ $file->name }}</a></p>
                                </div>
                                @error('file')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                       
                        <div class="mb-3 col-lg-6">
                            <div class="text-center">
                                <img id="preview-image" src="{{ asset( $file->image) }}" alt=""
                                    class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px;">
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="previewImage(event)">
                            </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="{{ route('files.index') }}" class="btn btn-primary">Quay lại</a>

                        </div>
                    </form>
                </div>





            </div>
        </div>
    </div>
@endsection
