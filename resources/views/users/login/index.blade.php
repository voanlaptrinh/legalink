@extends('users.index')
@section('name')
@include('users.home.section_banner')
    <div class="container pt-3 pb-3 ">
        <div class="boxx__relog">

            <div class="row g-0 box_righrt">
             
                <div class="col-lg-12 ">
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="col-lg-8 mb-2">
                            <div class="form-login" id="loginForm"
                                style="display: {{ session('form') === 'register' ? 'none' : 'block' }}">
                                <div class="text-center">
                                    <img src="{{ asset('source/imges/Logo PetHaven 2.png') }}" alt=""
                                        class="img-fluid pt-5">
                                    <div class="pt-3 text__nhap pt-3 pb-3">ĐĂNG NHẬP TÀI KHOẢN</div>
                                </div>

                                <form action="{{ route('postlogin') }}" method="POST">
                                    @csrf
                                    <div class="position-relative w-100">
                                        <input class="form-control input___query pt-2 pb-2" type="email"
                                            style="padding-left: 50px;" value="{{ old('email') }}" name="email"
                                            placeholder="Nhập email của bạn" required>
                                        <div class="btn position-absolute top-50 start-0 translate-middle-y border-0 text-primary-hover"
                                            type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                                <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z"/>
                                                <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                              </svg>
                                        </div>
                                    </div>
                                    @error('email')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="position-relative w-100 mt-4">
                                        <input class="form-control input___query pt-2 pb-2" type="password"
                                            style="padding-left: 50px;" name="password" placeholder="Nhập mật khẩu của bạn"
                                            required>
                                        <div class="btn position-absolute top-50 start-0 translate-middle-y border-0 text-primary-hover"
                                            type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1"/>
                                              </svg>
                                        </div>
                                    </div>
                                    @error('password')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    {{-- <div class="text-end pt-2 pb-2">
                                        <a href=""> Quên mật khẩu?</a>
                                    </div> --}}
                                    <button class="w-100 btn  mt-3 btn-success" type="submit">Đăng nhập</button>
                                    <button type="button" class="w-100 btn btn-primary  mt-4"
                                        id="showRegister">Đăng ký</button>
                                </form>
                            </div>

                            <div class="form-register" id="registerForm"
                                style="display: {{ session('form') === 'register' ? 'block' : 'none' }}">
                                <div class="text-center">
                                    <img src="{{ asset('source/imges/Logo PetHaven 2.png') }}" alt=""
                                        class="img-fluid pt-5">
                                    <div class="pt-3 text__nhap pt-3 pb-3">ĐĂNG KÝ TÀI KHOẢN</div>
                                </div>

                                <form action="{{ route('postregister') }}" method="POST">
                                    @csrf
                                    <div class="position-relative w-100">
                                        <input class="form-control input___query pt-2 pb-2" type="text"
                                            style="padding-left: 50px;" name="name" placeholder="Nhập tên của bạn"
                                            required>
                                    </div>
                                    @error('name')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="position-relative w-100 mt-4">
                                        <input class="form-control input___query pt-2 pb-2" type="email"
                                            style="padding-left: 50px;" name="email" placeholder="Nhập email của bạn"
                                            required>
                                    </div>
                                    @error('email')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="position-relative w-100 mt-4">
                                        <input class="form-control input___query pt-2 pb-2" type="password"
                                            style="padding-left: 50px;" name="password" placeholder="Nhập mật khẩu của bạn"
                                            required>
                                    </div>
                                    @error('password')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <div class="position-relative w-100 mt-4">
                                        <input class="form-control input___query pt-2 pb-2" type="password"
                                            style="padding-left: 50px;" name="password_confirmation"
                                            placeholder="Xác nhận mật khẩu" required>
                                    </div>
                                    @error('password_confirmation')
                                        <span class="">
                                            <p class="text-danger">{{ $message }}</p>
                                        </span>
                                    @enderror

                                    <button class="w-100 btn btn-primary mt-4" type="submit">Đăng ký</button>
                                    <button type="button" class="w-100 btn mt-2" id="showLogin">Trở về</button>
                                </form>
                            </div>




                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const showRegisterBtn = document.getElementById('showRegister');
        const showLoginBtn = document.getElementById('showLogin');

        // Show register form and hide login form
        showRegisterBtn.addEventListener('click', function() {
            loginForm.style.display = 'none';
            registerForm.style.display = 'block';
        });

        // Show login form and hide register form
        showLoginBtn.addEventListener('click', function() {
            registerForm.style.display = 'none';
            loginForm.style.display = 'block';
        });

        document.addEventListener('DOMContentLoaded', function() {
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            @if (session('form') === 'register')
                loginForm.style.display = 'none';
                registerForm.style.display = 'block';
            @else
                loginForm.style.display = 'block';
                registerForm.style.display = 'none';
            @endif
        });
    </script>
@endsection
