@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Thêm chương trình đào tạo</div>

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

                    <form method="POST" action="{{ route('chuongtrinhdaotao.store') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="MaCTDT">Mã Chương trình</label>
                            <input type="text" class="form-control" name="MaCTDT" value="{{ old('MaCTDT') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="TenChuongTrinh">Tên Chương trình</label>
                            <input type="text" class="form-control" name="TenChuongTrinh" value="{{ old('TenChuongTrinh') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="TenChuongTrinhTiengAnh">Tên tiếng Anh</label>
                            <input type="text" class="form-control" name="TenChuongTrinhTiengAnh" value="{{ old('TenChuongTrinhTiengAnh') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="NganhHocID">Ngành học</label>
                            <select class="form-control" name="NganhHocID" required>
                                @foreach ($nganhhocs as $nganhhoc)
                                    <option value="{{ $nganhhoc->id }}" {{ old('NganhHocID') == $nganhhoc->id ? 'selected' : '' }}>
                                        {{ $nganhhoc->TenNganh }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Noidung">Nội dung chương trình đào tạo</label>
                            <textarea class="form-control" id="Noidung" name="Noidung" rows="15">
<h3><b>2. Mục tiêu đào tạo</b></h3>
<p>Nhập nội dung tại đây...</p>

<h3><b>3. Chuẩn đầu ra của chương trình đào tạo</b></h3>
<h5>Bảng 1. Chuẩn đầu ra của chương trình đào tạo</h5>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>Mã CĐR</th>
            <th>Chuẩn đầu ra chương trình đào tạo</th>
            <th>TĐNL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>CLO1</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
    </tbody>
</table>

<h5>Bảng 2. Thang trình độ năng lực (theo thang Bloom)</h5>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>Trình độ năng lực</th>
            <th>Mô tả</th>
            <th>Các động từ có thể sử dụng để mô tả chuẩn đầu ra</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
    </tbody>
</table>

<h3>4. Ma trận giữa mục tiêu đào tạo và chuẩn đầu ra</h3>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>Nhập nội dung</th>
            <th>Nhập nội dung</th>
            <th>Nhập nội dung</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
    </tbody>
</table>

<h3><b>5. Quy trình đào tạo, điều kiện tốt nghiệp</b></h3>
<p>Nhập nội dung mô tả môn học tại đây...</p>
<h3><b>6. Thang điểm</b></h3>
<p>Nhập nội dung mô tả môn học tại đây...</p>
<h3><b>7. Khối lượng kiến thức toàn khoá</b></h3>
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


