@extends('admin.index')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Form sửa câu hỏi</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.update', $question->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name">Tiêu đề</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $question->name) }}" id="name"
                                    placeholder="Tiêu đề">
                                @error('name')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                          
                            <div class="col-lg-12 mb-3">
                                <label for="image">Mô tả ngắn:</label>
                                <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description', $question->description) }}</textarea>
                                @error('description')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                            </div>
                        </div>
                    </div>
                  
                </div> 
             
               

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Sửa mới</button>
                    <a href="{{route('questions.admin')}}" class="btn btn-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection