@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form sửa thành viên</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('members.update', $member->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label" for="name">Tên thành viên</label>
                                    <input type="text" class="form-control" name="name"
                                        value="{{ old('name', $member->name) }}" id="name" placeholder="Tên thành viên">
                                    @error('name')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $member->email) }}" id="email"
                                        placeholder="email">
                                    @error('email')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>  
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phone">Số điện thoại</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $member->phone) }}" id="phone"
                                        placeholder="Số điện thoại">
                                    @error('phone')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="10" cols="50" name="description" id="description" class="form-control">{{ old('description', $member->description) }}</textarea>
                                    @error('description')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                            <div class="text-center">
                                <img id="preview-image" src="{{ asset( $member->image) }}" alt=""
                                    class="review_img img-thumbnail" style="max-width: 290px; max-height: 288px;">
                                <input type="file" class="form-control" name="image" id="image"
                                    onchange="previewImage(event)">
                            </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 mb-3">
                        <label for="image">Nội dung:</label>
                        <textarea name="content" id="tyni">{{ old('content', $member->content) }}</textarea>
                        @error('content')
                            <p class="fw-bold" style="color: red;">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Sửa</button>
                        <a href="{{ route('members.index') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
