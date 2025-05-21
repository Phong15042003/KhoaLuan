<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đề cương chi tiết - {{ $decuongchitiet->hocphan->MaHocPhan }}</title>
    <link rel="stylesheet" href="{{ public_path('css/pdfdecuongchitiet.css') }}">
</head>
<body>
 <div style="width: 100%;">
    <div style="width: 50%; float: left;">
        <strong>ĐẠI HỌC QUỐC GIA TP.HCM</strong><br>
        <u><strong>TRƯỜNG ĐẠI HỌC AN GIANG</strong></u>
    </div>
    <div style="width: 50%; float: right; text-align: right;">
        <strong>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</strong><br>
        <div style="text-align: center;"><u><strong>Độc lập – Tự do – Hạnh phúc</strong></u></div>
    </div>
</div>
<div style="clear: both;"></div>
    <h3 style="text-align: center; text-transform: uppercase; margin-top: 10px;">
        ĐỀ CƯƠNG CHI TIẾT MÔN HỌC
    </h3>
    <div class="section">
        <h4>1. Thông tin tổng quát</h4>
        <p>Tên học phần tiếng Việt: {{ $decuongchitiet->hocphan->TenHocPhan }}</p>
        <p>Tên học phần tiếng Anh: {{ $decuongchitiet->hocphan->TenHocPhanTiengAnh }}</p>
        <p>Mã học phần:{{ $decuongchitiet->hocphan->MaHocPhan }}</p>
        <p><Số tín chỉ:{{ $decuongchitiet->hocphan->SoTinChi }}</p>
        <p>Học phần thuộc khối kiến thức: {{ $decuongchitiet->hocphan->khoikienthuc->TenKhoi }}</p>
    </div>
    <div class="section">
        {!! $decuongchitiet->NoiDung !!}
    </div>

</body>
</html>
