@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Chi tiết thành viên</h5>
                </div>
                <div class="card-body text-center">
                    <img src="{{ asset($member->image) }}" alt="Christina Mason" class="img-fluid mb-2"
                        width="128" height="128">
                    <h5 class="card-title mb-0">{{ $member->name }}</h5>

                </div>
                <hr class="my-0">
                <div class="card-body">
                   <div><i class="bi bi-phone-fill"></i> {{ $member->phone }}</div>
                   <div><i class="bi bi-mailbox"></i> {{ $member->email }}</div>
                </div>
                <hr class="my-0">
                <div class="card-body">
                    {{ $member->description }}
                </div>

            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header col-12 d-sm-flex justify-content-between align-items-center">

                    <h5 class="card-title mb-0">Nội dung</h5>
                    <a href="{{ route('news.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
                <div class="card-body content__log h-100"
                    style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">
                    {!! $member->content !!}
                </div>

            </div>
        </div>
    </div>
@endsection
