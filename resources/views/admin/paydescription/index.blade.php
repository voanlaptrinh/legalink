@extends('admin.index')
@section('content')
  

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Cài đặt web</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('pay.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 ">
                            <!-- Hình ảnh xem trước -->
                           <div class="text-center"> 
                            <img id="preview-image"  
                            src="{{ $webConfig->image ? asset( $webConfig->image) : asset('source/imges/none-image.jpg') }}" 
                            alt="Preview Image" 
                            class="review_img img-thumbnail" 
                            style="max-width: 290px; max-height: 288px;">
                       
                            <input type="file" class="form-control" name="image" id="image" onchange="previewImage(event)">
                           </div>
                            @error('image')
                                <p class="fw-bold" style="color: red;">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="bank_name">Tên ngân hàng</label>
                                    <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name', $webConfig->bank_name) }}" id="bank_name"
                                        placeholder="Tiêu ngân hàng">
                                    @error('bank_name')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="bank_number">Số tài khoản</label>
                                    <input type="text" class="form-control" name="bank_number" value="{{ old('bank_number', $webConfig->bank_number) }}" id="bank_number"
                                        placeholder="Số tài khoản">
                                    @error('bank_number')
                                        <p class="fw-bold" style="color: red;">{{ $message }}</p>
                                    @enderror
                                </div>
                              
                                <div class="col-lg-12 mb-3">
                                    <label for="image">Mô tả ngắn:</label>
                                    <textarea rows="5" cols="50" name="description" id="description" class="form-control">{{ old('description', $webConfig->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-3 pt-3">
                            <label for="image">Nội dung chuyển khoản:</label>
                            <textarea rows="5" cols="50" name="content" id="tyni" class="form-control">{{ old('content', $webConfig->content) }}</textarea>
                        </div>
                    </div> 
                 

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
