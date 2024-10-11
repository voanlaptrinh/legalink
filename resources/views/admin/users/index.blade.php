@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> tài khoản người dùng</h3>
        </div>

    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <form class="row row-cols-md-auto align-items-center justify-content-center">
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormInputName2">Email</label>
                            <input type="text" class="form-control mb-2 me-sm-2" id="email" name="email" value="{{ request('email') }}" placeholder="Tìm theo tên">
                        </div>

                       
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                        </div>
                    </form>
                

                </div>
                <div class="card-body pt-2 pb-3">
                    <div class="col-12">
                        <div class="card">

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tên</th>
                                        <th>Số tiền hiện có</th>
                                        <th>Email</th>
                                        <th>Ngày tạo</th>
                                        <th class="">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($users) > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ number_format($user->price) }}</td>
                                            <td>{{$user->email  }}</td>
                                            <td>{{ $user->created_at }}</td>
                                            <td class="table-action text-center">
                                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $user->id }}">
                                                    Sửa
                                                </button>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="editModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Sửa thông tin người dùng</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="price">Số tiền</label>
                                                                <input type="text" class="form-control" id="price" name="price" value="{{ $user->price }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="password">Mật khẩu</label>
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu mới nếu muốn thay đổi">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="4">Không có tài khoản người dùng nào</td>
                                        
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $users->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
