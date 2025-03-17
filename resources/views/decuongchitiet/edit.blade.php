@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa đề cương chi tiết</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('decuongchitiet.update', $decuongchitiet->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="TenHocPhan">{{ __('Tên học phần tiếng Việt') }}</label>
                            <input type="text" class="form-control" id="TenHocPhan" value="{{ $decuongchitiet->hocphan->TenHocPhan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="TenHocPhanTiengAnh">{{ __('Tên học phần tiếng Anh') }}</label>
                            <input type="text" class="form-control" id="TenHocPhanTiengAnh" value="{{ $decuongchitiet->hocphan->TenHocPhanTiengAnh }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="MaHocPhan">{{ __('Mã học phần') }}</label>
                            <input type="text" class="form-control" id="MaHocPhan" value="{{ $decuongchitiet->hocphan->MaHocPhan }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="SoTinChi">{{ __('Số tín chỉ') }}</label>
                            <input type="number" class="form-control" id="SoTinChi" value="{{ $decuongchitiet->hocphan->SoTinChi }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="KhoiKienThuc">{{ __('Học phần thuộc khối kiến thức') }}</label>
                            <input type="text" class="form-control" id="KhoiKienThuc" value="{{ $decuongchitiet->hocphan->khoikienthuc->TenKhoi }}" readonly>
                        </div>

                        <!-- Summernote WYSIWYG Editor for Nội dung -->
                        <div class="form-group">
                            <label for="NoiDung">{{ __('Nội dung') }}</label>
                            <textarea class="form-control summernote" id="NoiDung" name="NoiDung" required>{{ $decuongchitiet->NoiDung }}</textarea>
                        </div>

                        <input type="hidden" name="HocPhanID" value="{{ $decuongchitiet->hocphan->id }}">

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
