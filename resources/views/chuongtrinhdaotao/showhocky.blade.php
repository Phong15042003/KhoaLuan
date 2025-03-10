@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Chương trình đào tạo theo học Kỳ</div>

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
                            <a href="{{ route('chuongtrinhdaotao.showloaihocphan', $chuongtrinhdaotao->id) }}" class="btn btn-info">Theo loại học phần</a>                      
                        </div>
                    </div>
                    

                    @foreach ($hocphansByHocky as $hocky => $hocphans)
                        <h5>{{ __('Học Kỳ') }} {{ $hocky }}</h5>
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
                                    @php
                                        // Đếm tổng số môn Tự chọn trong học kỳ này
                                        $countTuChon = $hocphans->filter(function($hp) {
                                            return $hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn';
                                        })->count();

                                        // Đếm số môn Tự chọn đã in (để in rowspan 1 lần)
                                        $tuChonPrinted = 0;
                                    @endphp

                                    @foreach ($hocphans as $hp)
                                        <tr>
                                            <td>{{ $hp->MaHocPhan }}</td>
                                            <td>{{ $hp->TenHocPhan }}</td>
                                            <td>{{ $hp->TenHocPhanTiengAnh }}</td>

                                            {{-- Nếu là Tự chọn, chỉ in "Tự chọn" ở dòng đầu --}}
                                            @if ($hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn')
                                                @if ($tuChonPrinted === 0)
                                                <td rowspan="{{ $countTuChon }}" class="text-center align-middle">Tự chọn</td>
                                                @endif
                                                @php
                                                    $tuChonPrinted++;
                                                @endphp
                                            @else
                                                {{-- Nếu là Bắt buộc, in luôn cột --}}
                                                <td>{{ $hp->loaihocphan->TenLoaiHocPhan }}</td>
                                            @endif

                                            <td>{{ $hp->SoTinChi }}</td>
                                            <td>{{ $hp->SoTietLyThuyet }}</td>
                                            <td>{{ $hp->SoTietThucHanh }}</td>
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
