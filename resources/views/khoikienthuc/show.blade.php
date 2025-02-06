@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Khối kiến thức Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Khối kiến thức:</strong> {{ $khoikienthuc->MaKhoiKienThuc }}</p>
                    <p><strong>Tên Khối:</strong> {{ $khoikienthuc->TenKhoi }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection