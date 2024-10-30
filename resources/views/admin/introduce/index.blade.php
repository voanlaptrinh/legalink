@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Giới thiệu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('introduce.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-lg-4 ">
                            <label class="form-label" for="name">Ảnh CEO</label>
                            <div class="text-center">
                                <img id="preview-image"
                                    src="{{ $introduces->image ? asset($introduces->image) : asset('source/imges/none-image.jpg') }}"
                                    alt="Preview Image" class="review_img img-thumbnail"
                                    style="max-width: 290px; max-height: 288px;">

                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="previewImage(event)">
                            </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-8">
                          <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="name">Tiêu để</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $introduces->name) }}" id="name" placeholder="Tiêu đề">
                                @error('name')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="name_ceo">Tên CEO</label>
                                <input type="text" class="form-control" name="name_ceo"
                                    value="{{ old('name_ceo', $introduces->name_ceo) }}" id="name_ceo" placeholder="Tiêu đề">
                                @error('name_ceo')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                          </div>

                            <div class="col-lg-12 mb-3">
                                <label for="image">Mô tả ngắn (Không được thêm ảnh):</label>
                                <textarea rows="5" cols="50" name="description" id="tyni" class="form-control">{{ old('description', $introduces->description) }}</textarea>
                                @error('description')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="image">Nội dung:</label>
                                <textarea rows="5" cols="50" name="content" id="tyni" class="form-control">{{ old('content', $introduces->content) }}</textarea>
                                @error('content')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
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
