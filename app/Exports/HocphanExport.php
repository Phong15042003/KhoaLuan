<?php

namespace App\Exports;

use App\Models\Hocphan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class HocphanExport implements FromCollection, WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $ctdt_id;

    public function __construct($ctdt_id = null)
    {
        $this->ctdt_id = $ctdt_id;
    }
    public function collection()
    {
         $query = Hocphan::with(['loaihocphan', 'khoikienthuc']);

        if ($this->ctdt_id) {
            $query->whereHas('chuongtrinhdaotaos', function ($q) {
                $q->where('chuongtrinhdaotaos.id', $this->ctdt_id);
            });
        }

        return $query->get()->map(function ($hp) {
            return [
                $hp->sothutu,
                $hp->MaHocPhan,
                $hp->TenHocPhan,
                $hp->TenHocPhanTiengAnh,
                $hp->loaihocphan->TenLoaiHocPhan ?? '',
                $hp->SoTinChi,
                $hp->SoTietLyThuyet,
                $hp->SoTietThucHanh,
                $hp->DkTienQuyet,
                $hp->DkHocTruoc,
                $hp->DkSongHanh,
                $hp->khoikienthuc->TenKhoi ?? '',
                $hp->HocKy,
                $hp->NhomTuChon ?? '',
            ];
        });
    }
    public function headings(): array
    {
        return [
            'STT',
            'Mã Học Phần',
            'Tên Học Phần',
            'Tên HP Tiếng Anh',
            'Loại Học Phần',
            'Số Tín Chỉ',
            'Số Tiết LT',
            'Số Tiết TH',
            'ĐK Tiên Quyết',
            'ĐK Học Trước',
            'ĐK Song Hành',
            'Khối Kiến Thức',
            'Học Kỳ',
            'Nhóm Tự Chọn',
        ];
    }

}
