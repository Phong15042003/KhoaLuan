@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chương trình đào tạo theo học Kỳ</div>

                <div class="card-body">
                     <div class="card mb-3">
        <div class="card-header bg-secondary text-white">Các tác vụ</div>
        <div class="card-body d-flex flex-wrap gap-2">
            <a href="{{ route('chuongtrinhdaotao.show', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Thông tin chung</a>
            <a href="{{ route('chuongtrinhdaotao.changed-courses', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Những môn đã bị thay đổi</a>
            <a href="{{ route('chuongtrinhdaotao.showkhoikienthuc', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo khối kiến thức</a>
            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo loại học phần</a>
            <a href="{{ route('chuandaura.index', ['chuongtrinhdaotao_id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-info">Chuẩn đầu ra</a>
            <a href="{{ route('chuongtrinhdaotao.pdf', ['id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-danger"  target="_blank"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
        </div>
    </div>
                    
                    @foreach ($hocphansByHocky as $hocky => $hocphans)
                    @php
                        $batBuoc = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Bắt buộc');
                        $tuChon = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn')->groupBy('NhomTuChon');
                
                        $sumTinChiBatBuoc = $batBuoc->sum('SoTinChi');
                        $sumTinChiTuChon = $tuChon->sum(function($group) {
                            return $group->first()->SoTinChi; // hoặc xử lý nâng cao hơn nếu cần
                        });
                    @endphp
                
                    <h5>Học kỳ {{ $hocky }}: {{ $sumTinChiBatBuoc + $sumTinChiTuChon }} TC (Bắt buộc: {{ $sumTinChiBatBuoc }} TC; Tự chọn: {{ $sumTinChiTuChon }} TC)</h5>
                
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Mã Học phần</th>
                                    <th>Tên Học phần</th>
                                    <th>Tên Học phần Tiếng Anh</th>
                                    <th>Loại Học Phần</th>
                                    <th>Số Tín Chỉ</th>
                                    <th>Số Tiết Lý Thuyết</th>
                                    <th>Số Tiết Thực Hành</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- In các môn bắt buộc --}}
                                @foreach ($batBuoc as $hp)
                                    <tr>
                                        <td>{{ $hp->MaHocPhan }}</td>
                                        <td>{{ $hp->TenHocPhan }}</td>
                                        <td>{{ $hp->TenHocPhanTiengAnh }}</td>
                                        <td>{{ $hp->loaihocphan->TenLoaiHocPhan }}</td>
                                        <td>{{ $hp->SoTinChi }}</td>
                                        <td>{{ $hp->SoTietLyThuyet }}</td>
                                        <td>{{ $hp->SoTietThucHanh }}</td>
                                    </tr>
                                @endforeach
                
                                {{-- In từng nhóm môn tự chọn --}}
                                @foreach ($tuChon as $nhom => $group)
                                    @php $printed = false; @endphp
                                    @foreach ($group as $hp)
                                        <tr>
                                            <td>{{ $hp->MaHocPhan }}</td>
                                            <td>{{ $hp->TenHocPhan }}</td>
                                            <td>{{ $hp->TenHocPhanTiengAnh }}</td>
                                            @if (!$printed)
                                                <td rowspan="{{ count($group) }}" class="text-center align-middle">
                                                    Tự chọn
                                                </td>
                                                @php $printed = true; @endphp
                                            @endif
                                            <td>{{ $hp->SoTinChi }}</td>
                                            <td>{{ $hp->SoTietLyThuyet }}</td>
                                            <td>{{ $hp->SoTietThucHanh }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
