@extends('admin.index')
@section('content')
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title mb-0">Chi tiết bài viết (<i class="bi bi-eye"></i> {{ $article->views }})</h5>
                </div>
                <div class="card-body text-center">
                    <h4 class="text-center">Thuộc danh mục: {{ $article->menuService->title }}</h4>

                </div>
                <hr class="my-0">
                <div class="card-body">
                    <h5>Thành viên phụ trách:</h5>
                    @foreach ($article->members() as $member)
                    <li>{{ $member->name }} ({{ $member->email }})</li>
                @endforeach
                  </div>

            </div>
        </div>

        <div class="col-md-8 col-xl-9">
            <div class="card">
                <div class="card-header col-12 d-sm-flex justify-content-between align-items-center">

                    <h5 class="card-title mb-0">Nội dung</h5>
                    <a href="{{ route('article.index') }}" class="btn btn-secondary">Quay lại</a>
                </div>
                <div class="card-body content__log h-100"
                    style="overflow-wrap: break-word; word-wrap: break-word; white-space: normal; overflow: hidden;">
                    {!! $article->content !!}
                </div>

            </div>
        </div>
    </div>
@endsection
