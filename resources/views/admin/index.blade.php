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
                <a class='sidebar-brand text-center' href='index.html'>
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
                                Charles Hall
                            </a>

                            <div class="sidebar-user-subtitle">Designer</div>
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
                            <i class="bi bi-people-fill"></i> <span class="align-middle">Menu dịch vụ</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['article.index','article.create','article.edit', 'article.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('article.index') }}'>
                            <i class="bi bi-people-fill"></i> <span class="align-middle">Bài viết dịch vụ</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['files.index','files.create','files.edit', 'files.detail']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('files.index') }}'>
                            <i class="bi bi-people-fill"></i> <span class="align-middle">File</span>
                        </a>
                    </li>
                    <li class="sidebar-header">
                        Pages
                    </li>
                    {{-- <li class="sidebar-item">
						<a data-bs-target="#dashboards" data-bs-toggle="collapse" class="sidebar-link">
							<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
						</a>
						<ul id="dashboards" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<li class="sidebar-item active"><a class='sidebar-link' href='index.html'>Analytics</a></li>
							<li class="sidebar-item"><a class='sidebar-link' href='dashboard-ecommerce.html'>E-Commerce <span
										class="sidebar-badge badge bg-primary">Pro</span></a></li>
							<li class="sidebar-item"><a class='sidebar-link' href='dashboard-crypto.html'>Crypto <span
										class="sidebar-badge badge bg-primary">Pro</span></a></li>
						</ul>
					</li> --}}
                    {{-- <li
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['categories.index', 'categories.create', 'categories.edit']) ? 'active' : '' }}">
                        <a class='sidebar-link' href='{{ route('categories.index') }}'>
                            <i class="bi bi-book-half"></i> <span class="align-middle">Danh mục</span>
                        </a>
                    </li> --}}
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
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['sliders.index']) ? 'active' : '' }}">
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
                        class="sidebar-item {{ in_array(Request::route()->getName(), ['evaluations.index']) ? 'active' : '' }}">
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

                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="message-square"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                                aria-labelledby="messagesDropdown">
                                <div class="dropdown-menu-header">
                                    <div class="position-relative">
                                        4 New Messages
                                    </div>
                                </div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-5.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Vanessa Tucker</div>
                                                <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis
                                                    arcu
                                                    tortor.</div>
                                                <div class="text-muted small mt-1">15m ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-2.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="William Harris">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">William Harris</div>
                                                <div class="text-muted small mt-1">Curabitur ligula sapien euismod
                                                    vitae.</div>
                                                <div class="text-muted small mt-1">2h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-4.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Christina Mason">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Christina Mason</div>
                                                <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.
                                                </div>
                                                <div class="text-muted small mt-1">4h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-2">
                                                <img src="img/avatars/avatar-3.jpg"
                                                    class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                                            </div>
                                            <div class="col-10 ps-2">
                                                <div class="text-dark">Sharon Lessman</div>
                                                <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed,
                                                    posuere ac, mattis non.</div>
                                                <div class="text-muted small mt-1">5h ago</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-menu-footer">
                                    <a href="#" class="text-muted">Show all messages</a>
                                </div>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="maximize"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" id="user_admin">
                                <img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded" alt="" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-end show_admin">
                                <a class='dropdown-item' href='pages-profile.html'><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class='dropdown-item' href='pages-settings.html'><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings &
                                    Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
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
</body>

</html>
