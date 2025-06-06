<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>{{ $chuongtrinhdaotao->TenChuongTrinh }}</title>
    <link href="{{ public_path('css/pdfctdt.css') }}" rel="stylesheet">
</head>
<body>

    <!-- PHẦN TIÊU ĐỀ ĐẦU TRANG -->
    <table class="header-table">
        <tr>
            <td>
                <strong>ĐẠI HỌC QUỐC GIA TP.HCM</strong><br>
                <strong>TRƯỜNG ĐẠI HỌC AN GIANG</strong>
            </td>
            <td>
                <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong><br>
                <strong>Độc lập - Tự do - Hạnh phúc</strong>
            </td>
        </tr>
    </table>

    <h2 style="text-align: center;">CHƯƠNG TRÌNH ĐÀO TẠO TRÌNH ĐỘ ĐẠI HỌC</h2>

    <h3>1. Thông tin chung</h3>
    <p><strong>Chương trình Đào tạo:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
    <p><strong>Mã chương trình:</strong> {{ $chuongtrinhdaotao->MaCTDT }}</p>
    <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
    <p><strong>Mã ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->MaNganh }}</p>

    {!! $chuongtrinhdaotao->Noidung !!}

    @if (!empty($thongKe))
        <h3>7. Khối lượng kiến thức toàn khoá</h3>
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

    <h3>8. Nội dung chương trình đào tạo</h3>
    @foreach ($hocphansByKhoikienthuc as $khoikienthucID => $hocphans)
        @php
            $batBuoc = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Bắt buộc');
            $tuChon = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn')->groupBy(fn($hp) => $hp->NhomTuChon . '_' . $hp->HocKy);
        @endphp

        <h4><strong>Khối Kiến Thức:</strong> {{ $hocphans->first()->khoikienthuc->TenKhoi }}</h4>

        <table class="khoikienthuc-table">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã HP</th>
                    <th>Tên học phần</th>
                    <th>Tên tiếng Anh</th>
                    <th>Loại HP</th>
                    <th>Tín chỉ</th>
                    <th>Lý thuyết</th>
                    <th>Thực hành</th>
                    <th>Tiên quyết</th>
                    <th>Học trước</th>
                    <th>Song hành</th>
                    <th>Học kỳ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($batBuoc as $i => $hp)
                    <tr>
                        <td>{{ $hp->sothutu }}</td>
                        <td>{{ $hp->MaHocPhan }}</td>
                        <td>{{ $hp->TenHocPhan }}</td>
                        <td>{{ $hp->TenHocPhanTiengAnh }}</td>
                        <td>{{ $hp->loaihocphan->TenLoaiHocPhan }}</td>
                        <td>{{ $hp->SoTinChi }}</td>
                        <td>{{ $hp->SoTietLyThuyet }}</td>
                        <td>{{ $hp->SoTietThucHanh }}</td>
                        <td>{{ $hp->DkTienQuyet ?: '-' }}</td>
                        <td>{{ $hp->DkHocTruoc ?: '-' }}</td>
                        <td>{{ $hp->DkSongHanh ?: '-' }}</td>
                        <td>{{ $hp->HocKy }}</td>
                    </tr>
                @endforeach

                @foreach ($tuChon as $groupKey => $group)
                    @php $printed = false; @endphp
                    @foreach ($group as $j => $hp)
                        <tr>
                            <td>{{ $j + 1 }}</td>
                            <td>{{ $hp->MaHocPhan }}</td>
                            <td>{{ $hp->TenHocPhan }}</td>
                            <td>{{ $hp->TenHocPhanTiengAnh }}</td>
                            @if (!$printed)
                                <td rowspan="{{ count($group) }}" class="text-center align-middle">Tự chọn</td>
                                @php $printed = true; @endphp
                            @endif
                            <td>{{ $hp->SoTinChi }}</td>
                            <td>{{ $hp->SoTietLyThuyet }}</td>
                            <td>{{ $hp->SoTietThucHanh }}</td>
                            <td>{{ $hp->DkTienQuyet ?: '-' }}</td>
                            <td>{{ $hp->DkHocTruoc ?: '-' }}</td>
                            <td>{{ $hp->DkSongHanh ?: '-' }}</td>
                            <td>{{ $hp->HocKy }}</td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    @endforeach

    <!-- Học phần theo học kỳ -->
     <!-- Học phần via Học Kỳ -->
    <h3>Học phần theo Học Kỳ</h3>
    @foreach ($hocphansByHocky as $hocky => $hocphans)
        @php
            $batBuoc = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Bắt buộc');
            $tuChon = $hocphans->filter(fn($hp) => $hp->loaihocphan->TenLoaiHocPhan === 'Tự chọn')->groupBy('NhomTuChon');

            $sumTinChiBatBuoc = $batBuoc->sum('SoTinChi');
            $sumTinChiTuChon = $tuChon->sum(function($group) {
                return $group->first()->SoTinChi;
            });
        @endphp

        <h4>Học kỳ {{ $hocky }}: {{ $sumTinChiBatBuoc + $sumTinChiTuChon }} TC (Bắt buộc: {{ $sumTinChiBatBuoc }} TC; Tự chọn: {{ $sumTinChiTuChon }} TC)</h4>

        <table class="hocky-table">
            <thead>
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
    @endforeach

    <!-- Chuẩn đầu ra -->
    <h3>10. Chuẩn đầu ra</h3>
    <table class="chuandaura-table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã HP</th>
                <th>Tên học phần</th>
                <th>T1</th>
                <th>T2</th>
                <th>T3</th>
                <th>T4</th>
                <th>T5</th>
                <th>T6</th>
                <th>T7</th>
                <th>T8</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chuandauras as $index => $chuandaura)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $chuandaura->hocphan->MaHocPhan }}</td>
                    <td>{{ $chuandaura->hocphan->TenHocPhan }}</td>
                    <td>{{ $chuandaura->T1 }}</td>
                    <td>{{ $chuandaura->T2 }}</td>
                    <td>{{ $chuandaura->T3 }}</td>
                    <td>{{ $chuandaura->T4 }}</td>
                    <td>{{ $chuandaura->T5 }}</td>
                    <td>{{ $chuandaura->T6 }}</td>
                    <td>{{ $chuandaura->T7 }}</td>
                    <td>{{ $chuandaura->T8 }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
