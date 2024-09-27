@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Giới thiệu</h5>
            </div>
            <div class="card-body">
                <form action="{{route('introduce.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">



                        <div class="mb-3 col-md-12">
                            <label class="form-label" for="name">Tên</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $introduces->name) }}" id="name" placeholder="Tiêu đề">
                            @error('name')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-lg-12 mb-3">
                            <label for="image">Mô tả ngắn:</label>
                            <textarea rows="5" cols="50" name="description" id="description" class="form-control">{{ old('description', $introduces->description) }}</textarea>
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


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
