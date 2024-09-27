@extends('admin.index')
@section('content')
  

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Thêm mới sliders</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="title">Tiêu đề</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title', $slider->title) }}" id="title"
                                        placeholder="Tiêu đề">
                                    @error('title')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description', $slider->title) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                           <div class="text-center"> 
                            <img id="preview-image"  src="{{asset('storage/' . $slider->image)}}" alt="" class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px;">
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                           </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> 
                   
                   

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{route('sliders.index')}}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
