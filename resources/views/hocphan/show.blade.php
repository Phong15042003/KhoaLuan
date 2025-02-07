@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Học phần Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Học phần:</strong> {{ $hocphan->MaHocPhan }}</p>
                    <p><strong>Tên Học phần:</strong> {{ $hocphan->TenHocPhan }}</p>
                    <p><strong>Tên Học phần Tiếng Anh:</strong> {{ $hocphan->TenHocPhanTiengAnh }}</p>
                    <p><strong>Số Tín Chỉ:</strong> {{ $hocphan->SoTinChi }}</p>
                    <p><strong>Số Tiết Lý Thuyết:</strong> {{ $hocphan->SoTietLyThuyet }}</p>
                    <p><strong>Số Tiết Thực Hành:</strong> {{ $hocphan->SoTietThucHanh }}</p>
                    <p><strong>Học Kỳ:</strong> {{ $hocphan->HocKy }}</p>
                    <p><strong>Điều kiện Tiên Quyết:</strong> {{ $hocphan->DkTienQuyet }}</p>
                    <p><strong>Điều kiện Học Trước:</strong> {{ $hocphan->DkHocTruoc }}</p>
                    <p><strong>Điều kiện Song Hành:</strong> {{ $hocphan->DkSongHanh }}</p>
                    <p><strong>Khối Kiến Thức:</strong> {{ $hocphan->khoikienthuc->TenKhoi }}</p>
                    <p><strong>Loại Học Phần:</strong> {{ $hocphan->loaihocphan->TenLoaiHocPhan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection