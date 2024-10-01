@extends('admin.index')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Thêm mới quản lýs</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('adminaccount.store') }}" method="POST">
                    @csrf
                    <input type="text" hidden name="role" value="admin">
                    <div class="row">

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name">Tên</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="name" placeholder="Tiêu đề">
                                @error('name')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    id="email" placeholder="Email">
                                @error('email')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                    id="password" placeholder="mật khẩu">
                                @error('password')
                                    <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="name">Mật khẩu nhập lại</label>
                                <input class="form-control " type="password" name="password_confirmation"
                                    placeholder="Xác nhận mật khẩu" required>

                            </div>


                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <a href="{{ route('adminaccount.index') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
