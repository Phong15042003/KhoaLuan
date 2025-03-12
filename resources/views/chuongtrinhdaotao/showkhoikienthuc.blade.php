@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chương trình đào tạo theo khối kiến thức</div>

                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <div>
                            <p><strong>Mã Chương trình:</strong> {{ $chuongtrinhdaotao->MaCTDT }}</p>
                            <p><strong>Tên Chương trình:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
                            <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
                        </div>

                        <div>
                            <a href="{{ route('chuongtrinhdaotao.changed-courses', $chuongtrinhdaotao->id) }}" class="btn btn-info">Những môn đã bị thay đổi</a>
                            <a href="{{ route('chuongtrinhdaotao.showhocky', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo học kỳ</a>
                            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo loại học phần</a>
                        </div>
                    </div>

                    @foreach ($hocphansByKhoikienthuc as $khoikienthucID => $hocphans)
                        @php
                            $batBuoc = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Bắt buộc');

                            // Gộp theo NhomTuChon + HocKy để phân biệt rõ
                            $tuChon = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn')
                                               ->groupBy(fn($hp) => $hp->NhomTuChon . '_' . $hp->HocKy);

                            $sumTinChiBatBuoc = $batBuoc->sum('SoTinChi');
                            $sumTinChiTuChon = $tuChon->sum(function($group) {
                                return $group->first()->SoTinChi;
                            });
                        @endphp

                        <h5>{{ __('Khối Kiến Thức') }}: {{ $hocphans->first()->khoikienthuc->TenKhoi }} - Tổng tín chỉ: {{ $sumTinChiBatBuoc + $sumTinChiTuChon }} TC (Bắt buộc: {{ $sumTinChiBatBuoc }} TC; Tự chọn: {{ $sumTinChiTuChon }} TC)</h5>

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

                                    {{-- In từng nhóm môn tự chọn theo NhomTuChon + HocKy --}}
                                    @foreach ($tuChon as $groupKey => $group)
                                        @php 
                                            $printed = false;
                                            [$nhom, $hk] = explode('_', $groupKey); 
                                        @endphp
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
