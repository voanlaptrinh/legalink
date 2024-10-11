@extends('admin.index')
@section('content')
  

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form sửa Đánh giá</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="name">Tiêu đề</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $evaluation->name) }}" id="name"
                                        placeholder="Tiêu đề">
                                    @error('name')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description', $evaluation->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                           <div class="text-center"> 
                            <img id="preview-image"  src="{{ asset( $evaluation->image) }}" alt="" class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px;">
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                           </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div> 
                 
                   

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <a href="{{route('evaluations.index')}}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
