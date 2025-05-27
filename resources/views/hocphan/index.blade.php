@extends('layouts.app')

@section('content')
<div class="container-fluid"> {{-- Sử dụng container-fluid để sử dụng toàn bộ chiều rộng màn hình --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Học phần') }}</div>

                <div class="card-body">
                    {{-- Thông báo thành công --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Thông báo lỗi --}}
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if (auth()->user()->vaitro == 'admin' || auth()->user()->vaitro == 'biensoan')
                    <div class="d-flex align-items-center mb-3 gap-2">
                        <a href="{{ route('hocphan.create') }}" class="btn btn-primary">Thêm học phần</a>
                        <a href="{{ route('hocphan.excel') }}" class="btn btn-primary">Thêm bằng excel</a>
                        <a href="{{ route('hocphan.export', ['chuongtrinhdaotao_id' => request('chuongtrinhdaotao_id')]) }}" class="btn btn-primary">Xuất file excel</a>
                       
                    </div>
                    
                    @endif
                           <form action="{{ route('hocphan.index') }}" method="GET" class="d-flex align-items-center">
                            <select name="chuongtrinhdaotao_id" onchange="this.form.submit()" class="form-select form-select-sm w-auto" style="min-width: 250px;">
                                <option value="">-- Tất cả môn học --</option>
                                @foreach($chuongtrinhdaotaos as $ctdt)
                                    <option value="{{ $ctdt->id }}" {{ request('chuongtrinhdaotao_id') == $ctdt->id ? 'selected' : '' }}>
                                        {{ $ctdt->TenChuongTrinh }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                        @if(request('chuongtrinhdaotao_id'))
                            <a href="{{ route('hocphan.index') }}" class="btn btn-danger">Xóa lọc</a>
                        @endif
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width: 100%;">
                            <thead class="table-light">
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
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hocphans as $hocphan)
                                    <tr>
                                        <td>{{ $hocphan->sothutu }}</td>
                                        <td>{{ $hocphan->MaHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhanTiengAnh }}</td>
                                        <td>{{ $hocphan->loaihocphan->TenLoaiHocPhan ?? '' }}</td>
                                        <td>{{ $hocphan->SoTinChi }}</td>
                                        <td>{{ $hocphan->SoTietLyThuyet }}</td>
                                        <td>{{ $hocphan->SoTietThucHanh }}</td>
                                        <td>{{ $hocphan->DkTienQuyet }}</td>
                                        <td>{{ $hocphan->DkHocTruoc }}</td>
                                        <td>{{ $hocphan->DkSongHanh }}</td>
                                        <td>{{ $hocphan->khoikienthuc->TenKhoi ?? '' }}</td>
                                        <td>{{ $hocphan->HocKy }}</td>
                                        <td>
                                            @if(auth()->user()->vaitro == 'admin' || auth()->user()->vaitro == 'biensoan')
                                                <a href="{{ route('hocphan.edit', $hocphan->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                                <form action="{{ route('hocphan.destroy', $hocphan->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này?')">
                                                        Xóa
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="{{ route('hocphan.show', $hocphan->id) }}" class="btn btn-info btn-sm">Xem</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">Không có học phần nào.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div> {{-- End of table-responsive --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
