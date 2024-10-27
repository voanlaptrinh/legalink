



@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thêm mới bài viết dịch vụ</strong></h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('article.create') }}" class="btn btn-primary">Thêm mới bài viết dịch vụ</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                   
                    <h6 class="card-subtitle text-muted">Thêm mới bài viết dịch vụ</h6>
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
                        <style>

                        </style>
                        <div class="row mb-3">
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
    <style>
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .remove-member {
            margin-left: 10px;
        }
    </style>
    <script>
        $(document).ready(function() {
          
            $('#members_ids').select2({
                placeholder: "Select members", 
                allowClear: true, 
                width: '100%', 
            });

          
            $('#members_ids').on('change', function() {
                var selectedMembers = $(this).val(); 
                var selectedList = $('#selected-members');
                selectedList.empty(); 

              
                if (selectedMembers && selectedMembers.length > 0) {
                    selectedMembers.forEach(function(memberId) {
                        var memberName = $('#members_ids option[value="' + memberId + '"]').text();
                        selectedList.append(
                            '<li class="list-group-item d-flex justify-content-between align-items-center">' +
                            memberName +
                            ' <button type="button" class="btn btn-danger btn-sm remove-member" data-id="' +
                            memberId + '">Remove</button>' +
                            '</li>'
                        );
                    });
                }
            });

            $(document).on('click', '.remove-member', function() {
                var memberId = $(this).data('id');
                $('#members_ids option[value="' + memberId + '"]').prop('selected',
                false); 
                $('#members_ids').trigger('change'); 
                $('#members_ids').select2(); 
            });
        });
    </script>
@endsection
