@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card mx-auto" style="max-width: 1100px;">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Đề cương chi tiết</h5>
                    <a href="{{ route('decuongchitiet.exportPDF', $decuongchitiet->id) }}" class="btn btn-outline-light btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i> Xuất PDF
                    </a>
                </div>

                <div class="card-body">
                    <h3><b>1. Thông tin tổng quát</b></h3>
                    <p><strong>Tên học phần tiếng Việt:</strong> {{ $decuongchitiet->hocphan->TenHocPhan }}</p>
                    <p><strong>Tên học phần tiếng Anh:</strong> {{ $decuongchitiet->hocphan->TenHocPhanTiengAnh }}</p>
                    <p><strong>Mã học phần:</strong> {{ $decuongchitiet->hocphan->MaHocPhan }}</p>
                    <p><strong>Số tín chỉ:</strong> {{ $decuongchitiet->hocphan->SoTinChi }}</p>
                    <p><strong>Học phần thuộc khối kiến thức:</strong> {{ $decuongchitiet->hocphan->khoikienthuc->TenKhoi }}</p>
                    <hr>
                    <div class="table-responsive" style="background-color: #f8f9fa; padding: 20px;">
                        {!! $decuongchitiet->NoiDung !!}
                    </div>

                    <a href="{{ route('decuongchitiet.index') }}" class="btn btn-secondary mt-3">Quay lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
