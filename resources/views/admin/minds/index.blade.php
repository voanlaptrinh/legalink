@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> dữ liệu</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('minds.create') }}" class="btn btn-primary">Thêm mới dữ liệu</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <form class="row row-cols-md-auto align-items-center justify-content-center">
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormInputName2">Tên</label>
                            <input type="text" class="form-control mb-2 me-sm-2" id="name" name="name" value="{{ request('name') }}" placeholder="Tìm theo tên">
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
                                        <th>Nội dung</th>
                                        <th class="">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($minds) > 0)
                                    @foreach ($minds as $question)
                                        <tr>
                                            <td>{{ $question->name }}</td>
                                            <td>{{ $question->description }}</td>
                                            <td class="table-action text-center">
                                                <a href="{{ route('minds.edit', $question->id) }}"
                                                    class="btn btn-primary text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 align-middle">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a>
                                                <form action="{{ route('minds.destroy', $question->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa dữ liệu này?')"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-trash align-middle">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                            </path>
                                                        </svg></button>
                                                </form>
                                             

                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="4">Không có dữ liệu nào</td>
                                        
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $minds->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
