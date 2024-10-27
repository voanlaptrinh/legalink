@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Danh mục</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('menuservice.create') }}" class="btn btn-primary">Thêm mới danh muc</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
               
                <div class="card-body">
                    <!-- Form thêm mới danh mục -->
                    <form action="{{ route('menuservice.store') }}" method="POST" class="row g-4" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-5">
                            <div class="col-lg-6">
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label" for="title">Tên danh mục:</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Tên dah mục" value="{{ old('title') }}">
                                    @error('title')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row mb-3 ">
                                    <div class="col-lg-12">
                                        <label class="form-label">Mô tả ngắn</label>
                                        <textarea class="form-control" placeholder="Mô tả ngắn" name="description" rows="10">{{ old('description') }}</textarea>
                                    </div>

                                </div>

                                <div class="form-group mb-3 col-lg-12">
                                    <label for="parent_id">Danh mục cha:</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">Không có danh mục cha</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                <pre>{{ $category->id }}</pre>{{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                               <div>
                                <div class="text-center">
                                    <img id="preview-image" src="{{ asset('source/imges/none-image.jpg') }}" alt=""
                                    class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px; cursor: pointer;"
                                    onclick="document.getElementById('image').click()">
                                <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)" style="display: none;">
                                </div>
                                @error('image')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                               </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                            <a href="{{ route('menuservice.index') }}" class="btn btn-primary">Quay lại</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
