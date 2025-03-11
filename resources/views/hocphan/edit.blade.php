@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Học phần') }}</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('hocphan.update', $hocphan->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id">{{ __('ID') }}</label>
                            <input type="number" class="form-control" id="id" name="id" value="{{ $hocphan->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sothutu">{{ __('Số thứ tự') }}</label>
                            <input type="number" class="form-control" id="sothutu" name="sothutu" value="{{ $hocphan->sothutu }}" required>
                        </div>
                        <div class="form-group">
                            <label for="MaHocPhan">{{ __('Mã Học phần') }}</label>
                            <input type="text" class="form-control" id="MaHocPhan" name="MaHocPhan" value="{{ $hocphan->MaHocPhan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenHocPhan">{{ __('Tên Học phần') }}</label>
                            <input type="text" class="form-control" id="TenHocPhan" name="TenHocPhan" value="{{ $hocphan->TenHocPhan }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenHocPhanTiengAnh">{{ __('Tên Học phần Tiếng Anh') }}</label>
                            <input type="text" class="form-control" id="TenHocPhanTiengAnh" name="TenHocPhanTiengAnh" value="{{ $hocphan->TenHocPhanTiengAnh }}" required>
                        </div>

                        <div class="form-group">
                            <label for="SoTinChi">{{ __('Số Tín Chỉ') }}</label>
                            <input type="number" class="form-control" id="SoTinChi" name="SoTinChi" value="{{ $hocphan->SoTinChi }}" required>
                        </div>

                        <div class="form-group">
                            <label for="SoTietLyThuyet">{{ __('Số Tiết Lý Thuyết') }}</label>
                            <input type="number" class="form-control" id="SoTietLyThuyet" name="SoTietLyThuyet" value="{{ $hocphan->SoTietLyThuyet }}" required>
                        </div>

                        <div class="form-group">
                            <label for="SoTietThucHanh">{{ __('Số Tiết Thực Hành') }}</label>
                            <input type="number" class="form-control" id="SoTietThucHanh" name="SoTietThucHanh" value="{{ $hocphan->SoTietThucHanh }}" required>
                        </div>

                        <div class="form-group">
                            <label for="HocKy">{{ __('Học Kỳ') }}</label>
                            <input type="number" class="form-control" id="HocKy" name="HocKy" value="{{ $hocphan->HocKy }}" required>
                        </div>

                        <div class="form-group">
                            <label for="DkTienQuyet">{{ __('Điều kiện Tiên Quyết') }}</label>
                            <input type="number" class="form-control" id="DkTienQuyet" name="DkTienQuyet" value="{{ $hocphan->DkTienQuyet }}">
                        </div>

                        <div class="form-group">
                            <label for="DkHocTruoc">{{ __('Điều kiện Học Trước') }}</label>
                            <input type="number" class="form-control" id="DkHocTruoc" name="DkHocTruoc" value="{{ $hocphan->DkHocTruoc }}">
                        </div>

                        <div class="form-group">
                            <label for="DkSongHanh">{{ __('Điều kiện Song Hành') }}</label>
                            <input type="number" class="form-control" id="DkSongHanh" name="DkSongHanh" value="{{ $hocphan->DkSongHanh }}">
                        </div>

                        <div class="form-group">
                            <label for="KhoiKienThucID">{{ __('Khối Kiến Thức') }}</label>
                            <select class="form-control" id="KhoiKienThucID" name="KhoiKienThucID" required>
                                @foreach ($khoikienthucs as $khoikienthuc)
                                    <option value="{{ $khoikienthuc->id }}" {{ $hocphan->KhoiKienThucID == $khoikienthuc->id ? 'selected' : '' }}>{{ $khoikienthuc->TenKhoi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="LoaiHocPhanID">{{ __('Loại Học Phần') }}</label>
                            <select class="form-control" id="LoaiHocPhanID" name="LoaiHocPhanID" required>
                                @foreach ($loaihocphans as $loaihocphan)
                                    <option value="{{ $loaihocphan->id }}" {{ $hocphan->LoaiHocPhanID == $loaihocphan->id ? 'selected' : '' }}>{{ $loaihocphan->TenLoaiHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="NhomTuChon">{{ __('Nhóm Tự Chọn') }}</label>
                            <input type="number" class="form-control" id="NhomTuChon" name="NhomTuChon" value="{{ $hocphan->NhomTuChon }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection