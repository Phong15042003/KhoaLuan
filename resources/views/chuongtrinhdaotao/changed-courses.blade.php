@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Những môn đã bị thay đổi</div>

                <div class="card-body">
                       <div class="card mb-3">
        <div class="card-header bg-secondary text-white">Các tác vụ</div>
        <div class="card-body d-flex flex-wrap gap-2">
           
            <a href="{{ route('chuongtrinhdaotao.showhocky', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo học kỳ</a>
            <a href="{{ route('chuongtrinhdaotao.showkhoikienthuc', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo khối kiến thức</a>
            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-outline-info">Theo loại học phần</a>
            <a href="{{ route('chuandaura.index', ['chuongtrinhdaotao_id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-info">Chuẩn đầu ra</a>
            <a href="{{ route('chuongtrinhdaotao.pdf', ['id' => $chuongtrinhdaotao->id]) }}" class="btn btn-outline-danger"  target="_blank"><i class="fas fa-file-pdf"></i> Xuất PDF</a>
        </div>
    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
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
                                    <th>Khối Kiến Thức</th>
                                    <th>Học Kỳ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($changedHocphans as $hocphan)
                                    <tr>
                                        <td>{{ $hocphan->sothutu }}</td>
                                        <td>
                                            {{ $hocphan->MaHocPhan }}
                                            @if ($hocphan->MaHocPhanCu)
                                                <br>
                                                <small class="text-danger">
                                                    (*Mã trước đây: {{ $hocphan->MaHocPhanCu }})
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $hocphan->TenHocPhan }}
                                            @if ($hocphan->TenHocPhanCu)
                                                <br><small class="text-danger">
                                                    (*Tên trước đây: {{ $hocphan->TenHocPhanCu }})
                                                </small>
                                            @endif
                                        </td>
                                        <td>{{ $hocphan->TenHocPhanTiengAnh }}</td>
                                        <td>{{ $hocphan->loaihocphan->TenLoaiHocPhan }}</td>
                                        <td>{{ $hocphan->SoTinChi }}</td>
                                        <td>{{ $hocphan->SoTietLyThuyet }}</td>
                                        <td>{{ $hocphan->SoTietThucHanh }}</td>
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