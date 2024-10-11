@extends('admin.index')
@section('content')
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3><strong>Thống kê</strong> Slider</h3>
        </div>

        <div class="col-auto ms-auto text-end mt-n1">
            <a href="{{ route('sliders.create') }}" class="btn btn-primary">Thêm mới slider</a>
        </div>
    </div>
    <div class="row">


        <div class="col-xl-12">
            <div class="card flex-fill w-100">
              
                <div class="card-body pt-2 pb-3">
                    <div class="col-12">
                        <div class="card">

                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center">
                                        <th>Tên</th>
                                        <th>Ngày tạo</th>
                                        <th class="">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (count($sliders) > 0)
                                        @foreach ($sliders as $slider)
                                            <tr>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->created_at }}</td>
                                                <td class="table-action text-center">
                                                    <a href="{{ route('sliders.edit', $slider->id) }}"
                                                        class="btn btn-primary text-white"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2 align-middle">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg></a>
                                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Bạn có chắc chắn muốn xóa slider này?')"><svg
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
                                                    <button type="button" class="btn btn-success text-white" data-bs-toggle="modal" 
                                                    data-bs-target="#imageModal" data-image="{{ asset('storage/' . $slider->image) }}" data-description={{$slider->description}} data-title={{$slider->title}} >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                    height="16" fill="currentColor" class="bi bi-eye"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                                    <path
                                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                                </svg>
                                                </button>
                                                  

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="text-center">
                                            <td colspan="4">Không có sliders nào</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel">Slider Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center row">
                <div class="col-6">
                    <h4 class="detail-name"></h4>
                    <h6 class="detail-description"></h6>
                </div>
                <div class="col-6">
                    <img id="sliderImage" src="" alt="Slider Image" class="img-fluid" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
    var imageModal = document.getElementById('imageModal');
    imageModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; // Button that triggered the modal
        var imageSrc = button.getAttribute('data-image'); // Get image URL
        var title = button.getAttribute('data-title'); // Get title
        var description = button.getAttribute('data-description'); // Get title

        var modalImage = imageModal.querySelector('#sliderImage');
        var modalTitle = imageModal.querySelector('.detail-name');
        var modalDescription = imageModal.querySelector('.detail-description');

        // Update the image and title in the modal
        modalImage.src = imageSrc;
        modalTitle.textContent = title;
        modalDescription.textContent = description;
    });
});

</script>

@endsection
