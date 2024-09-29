@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Danh mục</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('menuservice.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="float-end">
                        <form class="row g-2" method="GET" action="{{ route('menuservice.index') }}">

                            <div class="col-auto">
                                <input type="text" name="search" class="form-control border-2"
                                    placeholder="Tìm kiếm theo tên" value="{{ $search }}">

                            </div>
                        </form>
                    </div>

                </div>
                <div class="card-body pt-2 pb-3">
                    <div class="col-12">
                        <div class="card">

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên</th>
                                        <th>Danh mục cha</th>

                                        <th class="text-end">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($categories) > 0)
                                        @foreach ($categories as $categorie)
                                            <tr>
                                                <td>{{ $categorie->title }}</td>
                                                <td>
                                                    @if ($categorie->parent)
                                                        {{ $categorie->parent->title }}
                                                    @else
                                                        Không có danh mục cha
                                                    @endif
                                                </td>

                                                <td class="table-action text-end">
                                                    <a href="{{ route('menuservice.edit', $categorie->alias) }}"
                                                        class="btn btn-danger text-white"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2 align-middle">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg></a>
                                                    <form action="{{ route('menuservice.destroy', $categorie->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-primary"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
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
                                            <td colspan="3">Không có danh mục nào</td>

                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $categories->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
