@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Liên hệ</h3>
        </div>


    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <form class="row row-cols-md-auto align-items-center justify-content-center">
                        <div class="col-12">
                            <label class="visually-hidden" for="inlineFormInputName2">Tên</label>
                            <input type="text" class="form-control mb-2 me-sm-2" id="name" name="name"
                                value="{{ request('name') }}" placeholder="Tìm theo tên">
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
                                        <th>Số điện thoại</th>
                                        <th>Loại</th>
                                        <th>Chi tiết</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($contacts) > 0)
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>{{ $contact->select_what }}</td>

                                                <td><button data-bs-toggle="modal" data-bs-target="#contactModal"
                                                        data-name="{{ $contact->name }}" type="button"
                                                        data-email="{{ $contact->email }}"  class="btn btn-success text-white"
                                                        data-phone="{{ $contact->phone }}"
                                                        data-type="{{ $contact->select_what }}"
                                                        data-description="{{ $contact->description }}"> <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                            <path
                                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                        </svg></button></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="5">Không có liên hệ nào</td>
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
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Thông tin liên hệ</h5>
                    <button type="button"  data-bs-dismiss="modal" aria-label="Close" class="btn btn-light close">
                        &times;
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Tên:</strong> <span id="contactName"></span></p>
                    <p><strong>Email:</strong> <span id="contactEmail"></span></p>
                    <p><strong>Số điện thoại:</strong> <span id="contactPhone"></span></p>
                    <p><strong>Loại:</strong> <span id="contactType"></span></p>
                    <p><strong>Mô tả:</strong> <span id="contactDescription" style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#contactModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var name = button.data('name');
                var email = button.data('email');
                var phone = button.data('phone');
                var type = button.data('type');
                var description = button.data('description');

                var modal = $(this);
                modal.find('#contactName').text(name);
                modal.find('#contactEmail').text(email);
                modal.find('#contactPhone').text(phone);
                modal.find('#contactType').text(type);
                modal.find('#contactDescription').text(description);
            });
        });
    </script>

@endsection
