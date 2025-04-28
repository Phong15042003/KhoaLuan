<?php

namespace App\Imports;

use App\Models\Hocphan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HocphanImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Hocphan([
            'sothutu'           => $row['sothutu'] ?? null,
            'MaHocPhan'         => $row['mahocphan'] ?? null,
            'TenHocPhan'        => $row['tenhocphan'] ?? null,
            'TenHocPhanTiengAnh'=> $row['tenhocphantienganh'] ?? null,
            'LoaiHocPhanID'     => $row['loaihocphanid'] ?? null,
            'SoTinChi'          => $row['sotinchi'] ?? null,
            'SoTietLyThuyet'    => $row['sotietlythuyet'] ?? null,
            'SoTietThucHanh'    => $row['sotietthuchanh'] ?? null,
            'DkTienQuyet'       => $row['dktienquyet'] ?? null,
            'DkHocTruoc'        => $row['dkhoctruoc'] ?? null,
            'DkSongHanh'        => $row['dksonghanh'] ?? null,
            'KhoiKienThucID'    => $row['khoikienthucid'] ?? null,
            'HocKy'             => $row['hocky'] ?? null,
            'NhomTuChon'        => $row['nhomtuchon'] ?? null,
        ]);
    }
}
