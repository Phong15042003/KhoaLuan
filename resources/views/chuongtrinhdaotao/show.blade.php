@extends('layouts.app')

@section('content')
<div class="container-fluid"> 
    <div class="row justify-content-center">
        <div class="col-md-12"> 
            <div class="card">
                <div class="card-header">Chi tiết chương trình đào</div>

                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <div>
                            <p><strong>Mã Chương trình:</strong> {{ $chuongtrinhdaotao->MaCTDT }}</p>
                            <p><strong>Tên Chương trình:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
                            <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
                        </div>
                        <div>
                            <a href="{{ route('chuongtrinhdaotao.changed-courses', $chuongtrinhdaotao->id) }}" class="btn btn-info">Những môn đã bị thay đổi </a>
                            <a href="{{ route('chuongtrinhdaotao.showhocky', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo học kỳ</a>
                            <a href="{{ route('chuongtrinhdaotao.showkhoikienthuc', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo khối kiến thức</a>
                            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo loại học phần</a>
                            {{-- <a href="{{ route('chuandaura.index', $chuongtrinhdaotao->id) }}" class="btn btn-info">Chuẩn đầu ra</a>                                             --}}
                        </div>
                    </div>

                    <h5>{{ __('Học phần') }}</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" style="min-width: 1200px;">
                            <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Mã Học phần</th>
                                    <th>Tên Học phần</th>
                                    <th>Tên Học phần Tiếng Anh</th>
                                    <th>Loại Học Phần</th>
                                    <th>Số Tín Chỉ</th>
                                    <th>Số Tiết Lý Thuyết</th>
                                    <th>Số Tiết Thực Hành</th>
                                    <th>Điều kiện Tiên Quyết</th>
                                    <th>Điều kiện Học Trước</th>
                                    <th>Điều kiện Song Hành</th>
                                    <th>Khối Kiến Thức</th>
                                    <th>Học Kỳ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hocphans as $hocphan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $hocphan->MaHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhanTiengAnh }}</td>
                                        <td>{{ $hocphan->loaihocphan->TenLoaiHocPhan }}</td>
                                        <td>{{ $hocphan->SoTinChi }}</td>
                                        <td>{{ $hocphan->SoTietLyThuyet }}</td>
                                        <td>{{ $hocphan->SoTietThucHanh }}</td>
                                        <td>{{ $hocphan->DkTienQuyet }}</td>
                                        <td>{{ $hocphan->DkHocTruoc }}</td>
                                        <td>{{ $hocphan->DkSongHanh }}</td>
                                        <td>{{ $hocphan->khoikienthuc->TenKhoi }}</td>
                                        <td>{{ $hocphan->HocKy }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
