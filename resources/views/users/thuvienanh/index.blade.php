@extends('users.index')
@section('name')
    @include('users.home.section_banner')

    <div class="pt-5 pb-5">
        <div class="fs-2 text-center pb-4">Thư viện ảnh</div>
        <div class="auto-container">
            <div class="row  g-5">


                @if (count($images) > 0)
                    @foreach ($images as $item)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="image text-center">
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="img-fluid img-image">
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center">Không có ảnh nào</div>
                @endif





            </div>
        </div>
    </div>
@endsection
