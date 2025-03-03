@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Phân công môn học Details') }}</div>

                <div class="card-body">
                    <p><strong>Biên soạn:</strong> {{ $phancongmonhoc->biensoan->name }}</p>
                    <p><strong>Giảng viên:</strong> {{ $phancongmonhoc->giangvien->name }}</p>
                    <p><strong>Học phần:</strong> {{ $phancongmonhoc->hocphan->TenHocPhan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection