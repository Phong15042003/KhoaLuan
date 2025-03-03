@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Những môn đã bị thay đổi</div>

                <div class="card-body">
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
                                @foreach ($hocphans as $hocphan)
                                    <tr>
                                        <td>{{ $hocphan->sothutu }}</td>
                                        <td>{{ $hocphan->MaHocPhan }}</td>
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