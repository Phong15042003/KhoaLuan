@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bộ môn Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Bộ môn:</strong> {{ $bomon->MaBoMon }}</p>
                    <p><strong>Tên Bộ môn:</strong> {{ $bomon->TenBoMon }}</p>
                    <p><strong>Khoa:</strong> {{ $bomon->khoa->TenKhoa }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection