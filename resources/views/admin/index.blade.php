<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="{{ asset('/source/js/jquery-3.5.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('/source/css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('/source/css/toastr.min.css') }}">
</head>

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class='sidebar-brand text-center' href='/'>
                    <span class="sidebar-brand-text align-middle color__pet">
                        LegaLink
                    </span>

                </a>

                <div class="sidebar-user">
                    <div class="d-flex justify-content-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('/source/imges/Arrow.png') }}" class="avatar img-fluid rounded me-1"
                                alt="" />
                        </div>
                        <div class="flex-grow-1 ps-2">
                            <a class="sidebar-user-title" href="#">
                              {{Auth::user()->name}}
                            </a>

                            <div class="sidebar-user-subtitle">  {{Auth::user()->email}}</div>
                        </div>
                    </div>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Dịch vụ
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['menuservice.index','menuservice.create','menuservice.edit']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('menuservice.index') }}'>
                            <i class="bi bi-emoji-sunglasses-fill"></i> <span class="align-middle">Menu dịch vụ</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['article.index','article.create','article.edit', 'article.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('article.index') }}'>
                            <i class="bi bi-file-post"></i> <span class="align-middle">Bài viết dịch vụ</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['files.index','files.create','files.edit', 'files.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('files.index') }}'>
                            <i class="bi bi-file-earmark-zip"></i> <span class="align-middle">File (Văn bản pháp luật)</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Tài khoản
                    </li> <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['users.index']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('users.index') }}'>
                            <i class="bi bi-people-fill"></i> <span class="align-middle">Tài khoản người dùng</span>
                        </a>
                    </li>
                    </li> <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['adminaccount.index']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('adminaccount.index') }}'>
                            <i class="bi bi-emoji-sunglasses-fill"></i> <span class="align-middle">Tài khoản admin</span>
                        </a>
                    </li>

                    <li class="sidebar-header">
                        Pages
                    </li>
                   
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['news.index', 'news.create', 'news.edit', 'news.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('news.index') }}'>
                            <i class="bi bi-newspaper"></i> <span class="align-middle">Tin tức</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['members.index', 'members.create', 'members.edit', 'members.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('members.index') }}'>
                            <i class="bi bi-people-fill"></i> <span class="align-middle">Thành viên</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['introduce.index']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('introduce.index') }}'>
                            <i class="bi bi-chat-right-quote-fill"></i><span class="align-middle">Giới thiệu</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['sliders.index','sliders.create', 'sliders.edit']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('sliders.index') }}'>
                            <i class="bi bi-file-earmark-image"></i> <span class="align-middle">Sliders</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['contacts.index']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('contacts.index') }}'>
                            <i class="bi bi-card-heading"></i><span class="align-middle">Liên hệ</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['images.admin', 'images.create', 'images.edit']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('images.admin') }}'>
                            <i class="bi bi-file-image"></i> <span class="align-middle">Thư viện ảnh</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['questions.admin']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('questions.admin') }}'>
                            <i class="bi bi-file-image"></i> <span class="align-middle">Câu hỏi</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['evaluations.index','evaluations.create','evaluations.edit']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('evaluations.index') }}'>
                            <i class="bi bi-file-image"></i> <span class="align-middle">Đánh giá khách hàng</span>
                        </a>
                    </li>
                    {{-- <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['products.index', 'products.create', 'products.edit', 'products.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{route('products.index')}}'>
                            <i class="bi bi-shop-window"></i><span class="align-middle">Sản phẩm</span>
                        </a>
                    </li> --}}

                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['webConfig.index']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('webConfig.index') }}'>
                            <i class="bi bi-gear-wide-connected"></i><span class="align-middle">Cài đặt web</span>
                        </a>
                    </li>

                </ul>


            </div>
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <form class="d-none d-sm-inline-block">
                    <div class="input-group input-group-navbar">
                        <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
                        <button class="btn" type="button">
                            <i class="align-middle" data-feather="search"></i>
                        </button>
                    </div>
                </form>



                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">

                        

                        <li class="nav-item">
                            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="maximize"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" id="user_admin">
                                <i class="bi bi-incognito"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end show_admin">
                                
                               
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" href="#" type="submit">Log out</button>
                                </form>
                                
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">


                    @yield('content')

                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="https://adminkit.io/" target="_blank"
                                    class="text-muted"><strong>AdminKit</strong></a> &copy;
                            </p>
                        </div>
                        <div class="col-6 text-end">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Support</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Help Center</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Privacy</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-muted" href="#">Terms</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>



    <script src="{{ asset('/source/js/app.js') }}"></script>


    <script src="{{ asset('/source/js/bootstrap.bundle.min.js') }}"></script>



    <script src="{{ asset('/source/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('/source/js/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}");
        @endif

        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
        @endif

        @if (Session::has('info'))
            toastr.info("{{ Session::get('info') }}");
        @endif

        @if (Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
        @endif
    </script>

    <script type="text/javascript">
        tinymce.init({
            selector: '#tyni',
            plugins: 'advlist autolink lists link charmap preview anchor table image',
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help | table | link image',
            content_css: "{{ asset('/source/css/codeopen.css') }}",
            images_upload_url: "/upload-image",
            relative_urls: false,
            document_base_url: "{{ url('/') }}",
            automatic_uploads: true,

        })

        function previewImage(event) {
            const input = event.target;
            const reader = new FileReader();

            reader.onload = function() {
                const preview = document.getElementById('preview-image');
                preview.src = reader.result;
                preview.style.display = 'block'; // Hiển thị ảnh xem trước
            }

            if (input.files && input.files[0]) {
                reader.readAsDataURL(input.files[0]); // Đọc nội dung tệp và hiển thị
            }
        }
    </script>

    <script>
        $(document).ready(function() {

            $('#add-field').click(function() {
                let fieldIndex = $('.attribute').length;
                let fieldHtml = `
		<div class="attribute d-flex pt-2" data-index="${fieldIndex}">
			
			<input type="text" name="attributes[${fieldIndex}][name]" class="form-control" placeholder="Ví dụ: màu sắc" required>
			<input type="hidden" name="attributes[${fieldIndex}][id]" value="${fieldIndex}">
			<button type="button" class="remove-attribute btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
		</div>
	`;
                $('#attributes').append(fieldHtml);
            });


            $(document).on('click', '.remove-attribute', function() {
                $(this).closest('.attribute').remove();
            });
        });
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</body>

</html>
