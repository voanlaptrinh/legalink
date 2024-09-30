{{-- <form action="{{ route('article.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="menus_services_id">Chọn menu dịch vụ:</label>
        <select name="menus_services_id" id="menus_services_id" class="form-control">
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Tên bài viết:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="content">Nội dung bài viết:</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>

    <div class="form-group">
        <label for="members_ids">Chọn thành viên phụ trách:</label>
        <select name="members_ids[]" id="members_ids" class="form-control" multiple>
            @foreach ($members as $member)
                <option value="{{ $member->id }}">{{ $member->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Tạo bài viết</button>
</form> --}}



@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Form</strong></h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('article.create') }}" class="btn btn-primary">Thêm mới bài viết danh mục</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <h5 class="card-title">Form thêm mới</h5>
                    <h6 class="card-subtitle text-muted">Thêm mới bài viết danh mục</h6>
                </div>

                <div class="card-body">
                    <!-- Form thêm mới danh mục -->
                    <form action="{{ route('article.store') }}" method="POST" class="row g-4">
                        @csrf
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">Tên bài viết:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Tên bài viết" value="{{ old('name') }}">
                            @error('name')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="parent_id" class="form-label">Danh mục:</label>
                            <select name="menus_services_id" class="form-control">

                                @foreach ($menus as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-lg-12">
                                <label class="form-label">Thành viên phụ trách</label>
                                <select class="form-select" size="4" name="members_ids[]" id="members_ids" multiple>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="row mb-3 ">
                            <div class="col-lg-12">
                                <label class="form-label">Nội dung</label>
                                <textarea class="form-control" placeholder="Nội dung" id="tyni" name="content" rows="10">{{ old('content') }}</textarea>
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