@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Đề cương chi tiết Details') }}</div>

                <div class="card-body">
                    <p><strong>Học phần:</strong> {{ $decuongchitiet->hocphan->TenHocPhan }}</p>
                    <p><strong>Nội dung:</strong> {{ $decuongchitiet->NoiDung }}</p>
                    <p><strong>Ngày cập nhật:</strong> {{ $decuongchitiet->NgayCapNhat }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection