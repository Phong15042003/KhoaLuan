@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Khóa học Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Khóa học:</strong> {{ $khoahoc->MaKhoaHoc }}</p>
                    <p><strong>Tên Khóa học:</strong> {{ $khoahoc->TenKhoaHoc }}</p>
                    <p><strong>Chương trình đào tạo:</strong> {{ $khoahoc->chuongtrinhdaotao->TenChuongTrinh }}</p>
                    <p><strong>Năm Bắt Đầu:</strong> {{ $khoahoc->NamBatDau }}</p>
                    <p><strong>Năm Kết Thúc:</strong> {{ $khoahoc->NamKetThuc }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection