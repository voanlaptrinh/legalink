@extends('users.index')
@section('name')
    @include('users.home.section_banner')


    <div class="sidebar-page-container">
       
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <div class="inner-box">
                            <div class="fs-3 text-center pb-3">
                                {{$article->name}}
                            </div>
                            <div class="content"
                                style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">
                                @if ($article->content)
                                    {!! $article->content !!}
                                @else
                                    Không có nội dung
                                @endif
                            </div>

                            <h3>Chuyên viên</h3>
                            <div class="lawyer-gallery">
                                <div class="row clearfix">
                                    <!-- Lawyer Column -->
                                    @foreach ($article->members() as $member)
                                        <div class="lawyer-column col-lg-4 col-md-4 col-sm-6">
                                            <div class="image">
                                                @if ($member->image)
                                                    <a href=""><img src="{{ asset('/source' . $member->image) }}"
                                                            alt="" /></a>
                                                @else
                                                    <a href=""><img
                                                            src="{{ asset('/source/images/resource/team-1.jpg') }}"
                                                            alt="" /></a>
                                                @endif

                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>


                        </div>

                    </div>
                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">


                        <!-- Reservations Widget -->
                        <div class="sidebar-widget reservation-widget">
                            <div class="widget-content">
                                <div class="sidebar-title">
                                    <h3>Reservations</h3>
                                </div>
                                <style>
                                    .form-group .ui-selectmenu-button.ui-button {
                                        background-color: #fff !important;
                                    }
                                </style>
                                <!-- Reservation Form -->
                                <div class="reservation-form">
                                    <!-- Reservation Form -->
                                    <form method="post" action="{{ route('contacts.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <select name="select_what" class="custom-select-box" style="">
                                                <option value="Câu hỏi">Câu hỏi</option>
                                                <option value="Phản hồi">Phản hồi</option>
                                                <option value="Liên hệ">Liên hệ</option>

                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                placeholder="Tên" required>
                                            @error('name')
                                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                placeholder="E-mail" required>
                                            @error('email')
                                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{ old('phone') }}"
                                                placeholder="Số điện thoại" required>
                                            @error('phone')
                                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>



                                        <div class="form-group">
                                            <textarea name="description" placeholder="Nội dung">{{ old('description') }}</textarea>
                                            @error('description')
                                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span
                                                    class="txt">send message</span></button>
                                        </div>

                                    </form>

                                </div>
                                <!-- End Consulation Form -->

                            </div>
                        </div>

                    </aside>
                </div>

            </div>
        </div>
    </div>
@endsection
