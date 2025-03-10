@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chương trình đào tạo theo loại học phần</div>

                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-start">
                        <div>
                             <p><strong>Mã Chương trình:</strong> {{ $chuongtrinhdaotao->MaCTDT }}</p>
                             <p><strong>Tên Chương trình:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
                             <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
                         </div>
 
                         <div>
                            <a href="{{ route('chuongtrinhdaotao.changed-courses', $chuongtrinhdaotao->id) }}" class="btn btn-info">Những môn đã bị thay đổi </a>
                            <a href="{{ route('chuongtrinhdaotao.showkhoikienthuc', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo khối kiến thức</a>
                            <a href="{{ route('chuongtrinhdaotao.showhocky', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo học kỳ</a>

                         </div>
                     </div>

                    @foreach ($hocphansByLoaihocphan as $loaihocphanID => $hocphans)
                        <h5>{{ __('Loại Học Phần') }}: {{ $hocphans->first()->loaihocphan->TenLoaiHocPhan }}</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Mã Học phần</th>
                                        <th>Tên Học phần</th>
                                        <th>Tên Học phần Tiếng Anh</th>
                                        <th>Số Tín Chỉ</th>
                                        <th>Số Tiết Lý Thuyết</th>
                                        <th>Số Tiết Thực Hành</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hocphans as $hocphan)
                                        <tr>
                                            <td>{{ $hocphan->MaHocPhan }}</td>
                                            <td>{{ $hocphan->TenHocPhan }}</td>
                                            <td>{{ $hocphan->TenHocPhanTiengAnh }}</td>
                                            <td>{{ $hocphan->SoTinChi }}</td>
                                            <td>{{ $hocphan->SoTietLyThuyet }}</td>
                                            <td>{{ $hocphan->SoTietThucHanh }}</td>
                                        </tr>
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