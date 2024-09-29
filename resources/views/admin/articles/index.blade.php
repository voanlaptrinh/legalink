@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Danh mục</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('article.create') }}" class="btn btn-primary">Thêm mới danh mục</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div class="float-end">
                        <form class="row g-2" method="GET" action="{{ route('article.index') }}">

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
                                        <th>ngày tạo</th>

                                        <th class="text-end">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($articles) > 0)
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td>{{ $article->name }}</td>
                                            <td>
                                              {{ $article->created_at}}
                                            </td>

                                            <td class="table-action text-end">
                                                <a href="{{ route('article.edit', $article->id) }}"
                                                    class="btn btn-primary text-white"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-edit-2 align-middle">
                                                        <path
                                                            d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                        </path>
                                                    </svg></a>
                                                <form action="{{ route('article.destroy', $article->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn  btn-danger"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?')"><svg
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
                                                <a href="{{ route('article.detail', $article->id) }}"
                                                    class="btn btn-success text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                                      </svg>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="text-center">
                                        <td colspan="3">Không có danh mục nào</td>

                                    </tr>
                                @endif
                                   

                                        {{-- <h4>Thành viên phụ trách:</h4>
    <ul>
        @foreach ($article->members() as $member)
            <li>{{ $member->name }} ({{ $member->email }}) {{ $member->image }}</li>
        @endforeach
    </ul> --}}
                                  


                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $articles->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
