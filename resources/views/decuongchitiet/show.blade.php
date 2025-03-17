@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đề cương chi tiết Details') }}</div>

                <div class="card-body">
                    <p><strong>Tên học phần tiếng Việt:</strong> {{ $decuongchitiet->hocphan->TenHocPhan }}</p>
                    <p><strong>Tên học phần tiếng Anh:</strong> {{ $decuongchitiet->hocphan->TenHocPhanTiengAnh }}</p>
                    <p><strong>Mã học phần:</strong> {{ $decuongchitiet->hocphan->MaHocPhan }}</p>
                    <p><strong>Số tín chỉ:</strong> {{ $decuongchitiet->hocphan->SoTinChi }}</p>
                    <p><strong>Học phần thuộc khối kiến thức:</strong> {{ $decuongchitiet->hocphan->khoikienthuc->TenKhoi }}</p>
                    <p><strong>Nội dung:</strong> {{ $decuongchitiet->NoiDung }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection