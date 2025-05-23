@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Thông tin chung -->
  

    <!-- Các nút tác vụ -->
    <div class="card mb-3">
        <div class="card-header bg-secondary text-white">Các tác vụ</div>
        <div class="card-body d-flex flex-wrap gap-2">
            <a href="{{ route('chuongtrinhdaotao.changed-courses', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Những môn đã bị thay đổi</a>
            <a href="{{ route('chuongtrinhdaotao.showhocky', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo học kỳ</a>
            <a href="{{ route('chuongtrinhdaotao.showkhoikienthuc', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo khối kiến thức</a>
            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo loại học phần</a>
            <a href="{{ route('chuandaura.index', ['chuongtrinhdaotao_id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-info">Chuẩn đầu ra</a>
            <a href="{{ route('chuongtrinhdaotao.pdf', ['id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-danger"  target="_blank"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
        </div>
    </div>
  <div class="card mb-3">
        <h3><b>1. Thông tin chung</b></h3>
        <div class="card-body">
            <p><strong>Mã Chương trình:</strong> {{ $chuongtrinhdaotao->MaCTDT }}</p>
            <p><strong>Tên Chương trình:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
            <p><strong>Tên tiếng Anh:</strong> {{ $chuongtrinhdaotao->TenChuongTrinhTiengAnh }}</p>
            <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
            <p><strong>Mã ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->MaNganh }}</p>
        </div>
    </div>
    <!-- Nội dung chương trình -->
   
        <div class="card mb-3">
            <div class="card-body">
                {!! $chuongtrinhdaotao->Noidung !!}
            </div>
        </div>
@if (!empty($thongKe))

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-light">
                <tr>
                    <th>TT</th>
                    <th>Khối kiến thức</th>
                    <th>Bắt buộc (TC)</th>
                    <th>Tự chọn (TC)</th>
                    <th>Tổng (TC)</th>
                    <th>Tỷ lệ BB (%)</th>
                    <th>Tỷ lệ TC (%)</th>
                    <th>Tỷ lệ Tổng (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($thongKe as $index => $row)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $row['TenKhoi'] }}</td>
                        <td>{{ $row['BatBuoc'] }}</td>
                        <td>{{ $row['TuChon'] }}</td>
                        <td>{{ $row['Tong'] }}</td>
                        <td>{{ $row['TyLeBB'] }}</td>
                        <td>{{ $row['TyLeTC'] }}</td>
                        <td>{{ $row['TyLeTong'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif


</div>
@endsection
