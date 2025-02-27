@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa khóa học</div>

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

                    <form method="POST" action="{{ route('khoahoc.update', $khoahoc->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaKhoaHoc">{{ __('Mã Khóa học') }}</label>
                            <input type="text" class="form-control" id="MaKhoaHoc" name="MaKhoaHoc" value="{{ $khoahoc->MaKhoaHoc }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenKhoaHoc">{{ __('Tên Khóa học') }}</label>
                            <input type="text" class="form-control" id="TenKhoaHoc" name="TenKhoaHoc" value="{{ $khoahoc->TenKhoaHoc }}" required>
                        </div>

                        <div class="form-group">
                            <label for="CTDT_ID">{{ __('Chương trình đào tạo') }}</label>
                            <select class="form-control" id="CTDT_ID" name="CTDT_ID" required>
                                @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                    <option value="{{ $chuongtrinhdaotao->id }}" {{ $khoahoc->CTDT_ID == $chuongtrinhdaotao->id ? 'selected' : '' }}>{{ $chuongtrinhdaotao->TenChuongTrinh }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="NamBatDau">{{ __('Năm Bắt Đầu') }}</label>
                            <input type="text" class="form-control" id="NamBatDau" name="NamBatDau" value="{{ $khoahoc->NamBatDau }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NamKetThuc">{{ __('Năm Kết Thúc') }}</label>
                            <input type="text" class="form-control" id="NamKetThuc" name="NamKetThuc" value="{{ $khoahoc->NamKetThuc }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection