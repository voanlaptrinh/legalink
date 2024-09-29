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
                <div class="card-header">
                    <h5 class="card-title">Form sửa</h5>
                    <h6 class="card-subtitle text-muted">Sửa lại danh mục</h6>
                </div>
               
                <div class="card-body">
                    <!-- Form thêm mới danh mục -->
                    <form action="{{ route('menuservice.update', $category->id) }}" method="POST" class="row"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-md-12">
                            <label class="form-label"  for="title">Tên danh mục:</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Tên dah mục" value="{{ old('title', $category->title) }}">
                            @error('title')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                     
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <label class="form-label">Mô tả ngắn</label>
                                <textarea class="form-control" placeholder="Mô tả ngắn" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                            </div>
                           
                        </div>
                       
                        <div class="form-group mb-3 col-md-12">
                            <label for="parent_id">Danh mục cha:</label>
                            <select name="parent_id" class="form-control">
                                <option value="">Không có danh mục cha</option>
                                @foreach($categories as $parentCategory)
                                    <option value="{{ $parentCategory->id }}" {{ $category->parent_id == $parentCategory->id ? 'selected' : '' }}>
                                        {{ $parentCategory->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Cập Nhật</button>
                            <a href="{{route('menuservice.index')}}" class="btn btn-secondary">Quay lại</a>
                        </div>
                     
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
