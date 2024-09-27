@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Tin tức</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('news.create') }}" class="btn btn-primary">Thêm mới tin tức</a>
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
                                        <th>Email</th>
                                        <th>Loại</th>
                                        <th class="">Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($contacts) > 0)
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->select_what }}</td>
                                            <td>{{ $contact->description }}</td>
                                          
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="4">Không có liên hệ nào</td>
                                        
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
