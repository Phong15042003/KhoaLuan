<?php

namespace App\Imports;

use App\Models\Hocphan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Loaihocphan;
use App\Models\Khoikienthuc;

class HocphanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Hocphan([
             'sothutu'            => $row['sothutu'] ?? 0,
        'MaHocPhan'          => $row['mahocphan'] ?? '',
        'TenHocPhan'         => $row['tenhocphan'] ?? '',
        'TenHocPhanTiengAnh' => $row['tenhocphantienganh'] ?? '',
        'LoaiHocPhanID'      => $this->mapLoaiHocPhan($row['loaihocphanid'] ?? 0),
        'SoTinChi'           => $row['sotinchi'] ?? 0,
        'SoTietLyThuyet'     => $row['sotietlythuyet'] ?? 0,
        'SoTietThucHanh'     => $row['sotietthuchanh'] ?? 0,
        'DkTienQuyet'        => $row['dktienquyet'] ?? 0,
        'DkHocTruoc'         => $row['dkhoctruoc'] ?? 0,
        'DkSongHanh'         => $row['dksonghanh'] ?? 0,
        'KhoiKienThucID'     => $this->mapKhoiKienThuc($row['khoikienthucid'] ?? 0),
        'HocKy'              => $row['hocky'] ?? 0,
        'NhomTuChon'         => $row['nhomtuchon'] ?? 0,
        ]);
    }

    protected function mapLoaiHocPhan($value)
    {
        // Nếu là số thì dùng luôn
        if (is_numeric($value)) return $value;

        // Nếu là chữ, ánh xạ sang ID
        return Loaihocphan::where('TenLoaiHocPhan', trim($value))->value('id');
    }

    protected function mapKhoiKienThuc($value)
    {
        if (is_numeric($value)) return $value;
        return Khoikienthuc::where('TenKhoi', trim($value))->value('id');
    }
}
