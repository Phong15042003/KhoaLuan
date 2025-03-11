@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm học phần</div>

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

                    <form method="POST" action="{{ route('hocphan.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="sothutu">STT</label>
                            <input type="number" class="form-control" id="sothutu" name="sothutu" value="{{ old('sothutu') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="MaHocPhan">{{ __('Mã Học phần') }}</label>
                            <input type="text" class="form-control" id="MaHocPhan" name="MaHocPhan" value="{{ old('MaHocPhan') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="TenHocPhan">{{ __('Tên Học phần') }}</label>
                            <input type="text" class="form-control" id="TenHocPhan" name="TenHocPhan" value="{{ old('TenHocPhan') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="TenHocPhanTiengAnh">{{ __('Tên Học phần Tiếng Anh') }}</label>
                            <input type="text" class="form-control" id="TenHocPhanTiengAnh" name="TenHocPhanTiengAnh" value="{{ old('TenHocPhanTiengAnh') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="SoTinChi">{{ __('Số Tín Chỉ') }}</label>
                            <input type="number" class="form-control" id="SoTinChi" name="SoTinChi" value="{{ old('SoTinChi') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="SoTietLyThuyet">{{ __('Số Tiết Lý Thuyết') }}</label>
                            <input type="number" class="form-control" id="SoTietLyThuyet" name="SoTietLyThuyet" value="{{ old('SoTietLyThuyet') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="SoTietThucHanh">{{ __('Số Tiết Thực Hành') }}</label>
                            <input type="number" class="form-control" id="SoTietThucHanh" name="SoTietThucHanh" value="{{ old('SoTietThucHanh') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="HocKy">{{ __('Học Kỳ') }}</label>
                            <input type="number" class="form-control" id="HocKy" name="HocKy" value="{{ old('HocKy') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="DkTienQuyet">{{ __('Điều kiện Tiên Quyết') }}</label>
                            <input type="number" class="form-control" id="DkTienQuyet" name="DkTienQuyet" value="{{ old('DkTienQuyet') }}">
                        </div>
                        <div class="form-group">
                            <label for="DkHocTruoc">{{ __('Điều kiện Học Trước') }}</label>
                            <input type="number" class="form-control" id="DkHocTruoc" name="DkHocTruoc" value="{{ old('DkHocTruoc') }}">
                        </div>
                        <div class="form-group">
                            <label for="DkSongHanh">{{ __('Điều kiện Song Hành') }}</label>
                            <input type="number" class="form-control" id="DkSongHanh" name="DkSongHanh" value="{{ old('DkSongHanh') }}">
                        </div>
                        <div class="form-group">
                            <label for="KhoiKienThucID">{{ __('Khối Kiến Thức') }}</label>
                            <select class="form-control" id="KhoiKienThucID" name="KhoiKienThucID" required>
                                @foreach ($khoikienthucs as $khoikienthuc)
                                    <option value="{{ $khoikienthuc->id }}">{{ $khoikienthuc->TenKhoi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="LoaiHocPhanID">{{ __('Loại Học Phần') }}</label>
                            <select class="form-control" id="LoaiHocPhanID" name="LoaiHocPhanID" required>
                                @foreach ($loaihocphans as $loaihocphan)
                                    <option value="{{ $loaihocphan->id }}">{{ $loaihocphan->TenLoaiHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="NhomTuChon">{{ __('Nhóm Tự Chọn') }}</label>
                            <input type="number" class="form-control" id="NhomTuChon" name="NhomTuChon" value="{{ old('NhomTuChon') }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection