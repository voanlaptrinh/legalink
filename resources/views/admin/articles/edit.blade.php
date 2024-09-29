{{-- <form action="{{ route('article.update', $article->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Menu Dịch Vụ -->
    <div class="form-group">
        <label for="menus_services_id">Menu Dịch Vụ:</label>
        <select name="menus_services_id" id="menus_services_id" class="form-control" required>
            <option value="">Chọn Menu Dịch Vụ</option>
            @foreach($menus as $menu)
                <option value="{{ $menu->id }}" {{ $article->menus_services_id == $menu->id ? 'selected' : '' }}>
                    {{ $menu->title }}
                </option>
            @endforeach
        </select>
        @error('menus_services_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Tên Bài Viết -->
    <div class="form-group">
        <label for="name">Tên Bài Viết:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $article->name) }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nội Dung Bài Viết -->
    <div class="form-group">
        <label for="content">Nội Dung:</label>
        <textarea name="content" id="content" class="form-control" required>{{ old('content', $article->content) }}</textarea>
        @error('content')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Alias (Bí Danh) -->
    <div class="form-group">
        <label for="alias">Alias (Bí Danh):</label>
        <input type="text" name="alias" id="alias" class="form-control" value="{{ old('alias', $article->alias) }}">
        @error('alias')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Chọn Thành Viên Phụ Trách -->
    <div class="form-group">
        <label for="members_ids">Thành Viên Phụ Trách:</label>
        <select name="members_ids[]" id="members_ids" class="form-control" multiple required>
            @foreach($members as $member)
                <option value="{{ $member->id }}" 
                    {{ in_array($member->id, $article->getMembersArray()) ? 'selected' : '' }}>
                    {{ $member->name }}
                </option>
            @endforeach
        </select>
        @error('members_ids')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <!-- Nút Cập Nhật -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Cập Nhật Bài Viết</button>
    </div>
</form> --}}




@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Form</strong></h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('article.update', $article->id) }}" class="btn btn-primary">Thêm mới bài viết danh mục</a>
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
                    <form action="{{ route('article.update', $article->id) }}" method="POST" class="row g-4">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 col-lg-6">
                            <label class="form-label" for="title">Tên bài viết:</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Tên bài viết" value="{{ old('name', $article->name) }}">
                            @error('name')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="parent_id" class="form-label">Danh mục:</label>
                            <select name="menus_services_id" class="form-control">
                                @foreach ($menus as $menu)
                                    
                                <option value="{{ $menu->id }}" {{ $article->menus_services_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-lg-12">
                                <label class="form-label">Thành viên phụ trách</label>
                                <select class="form-select" size="6" name="members_ids[]" id="members_ids" multiple>
                                    @foreach ($members as $member)
                                    <option value="{{ $member->id }}" 
                                        {{ in_array($member->id, $article->getMembersArray()) ? 'selected' : '' }}>
                                        {{ $member->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('members_ids')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                        <div class="row mb-3 ">
                            <div class="col-lg-12">
                                <label class="form-label">Nội dung</label>
                                <textarea class="form-control" placeholder="Nội dung" id="tyni" name="content" rows="10">{{ old('content', $article->content) }}</textarea>
                            </div>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        </div>
                      
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Sửa</button>
                            <a href="{{ route('menuservice.index') }}" class="btn btn-primary">Quay lại</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
