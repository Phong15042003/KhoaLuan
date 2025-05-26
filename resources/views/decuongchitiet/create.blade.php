@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card" style="max-width: 1000px; margin: 0 auto;">
                <div class="card-header">Thêm đề cương chi tiết</div>

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

                    <form method="POST" action="{{ route('decuongchitiet.store') }}">
                        @csrf

                     <div class="form-group">
    <label for="HocPhanID">Học phần</label>
    <select class="form-control" id="HocPhanID" name="HocPhanID" required {{ count($hocphans) == 0 ? 'disabled' : '' }}>
        @if(count($hocphans) > 0)
            <option value="">-- Chọn học phần --</option>
            @foreach ($hocphans as $hocphan)
                <option value="{{ $hocphan->id }}">{{ $hocphan->TenHocPhan }}</option>
            @endforeach
        @else
            <option>Không còn môn học nào để soạn đề cương.</option>
        @endif
    </select>
</div>

                        <div class="form-group mt-4">
                            <label for="NoiDung"><strong>Nội dung đề cương chi tiết</strong></label>
                            <textarea class="form-control" id="NoiDung" name="NoiDung" rows="15" required>
<h3><b>2. Mô tả môn học</b></h3>
<p>Nhập nội dung mô tả môn học tại đây...</p>

<h3><b>3. Tài liệu học tập</b></h3>
<ul>
    <b>Giáo trình</b>
    <li> Tài liệu giáo trình: …</li>
    <b>Tham khảo</b>
    <li> Tài liệu ham khảo: …</li>
    <b>Phần mềm</b>
    <li> Tài liệu phần mềm: …</li>
</ul>

<h3><b>4. Chuẩn đầu ra môn học</b></h3>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>Ký hiệu</th>
            <th>Mô tả CĐR môn học</th>
            <th>CĐR CTĐT</th>
            <th>TĐNL</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>CLO1</td>
            <td>Nhập nội dung</td>
            <td>ELO1</td>
            <td>2</td>
        </tr>
        <tr>
            <td>CLO2</td>
            <td>Nhập nội dung</td>
            <td>ELO2</td>
            <td>2</td>
        </tr>
        <tr>
            <td>CLO3</td>
            <td>Nhập nội dung</td>
            <td>ELO1</td>
            <td>1</td>
        </tr>
    </tbody>
</table>

<h3><b>5. Chuẩn đầu ra bài học</b></h3>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>CĐR môn học</th>
            <th>CDR bài học</th>
            <th>Mô tả CĐR bài học</th>
            <th>Mức độ GD</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
        <tr>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
        <tr>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
            <td>Nhập nội dung</td>
        </tr>
    </tbody>
</table>
                            </textarea>
                        </div>

                        @if(count($hocphans) > 0)
    <button type="submit" class="btn btn-primary mt-3">Thêm</button>
@else
    <div class="alert alert-warning mt-4">
        🎓 Bạn đã soạn đề cương cho tất cả các học phần được phân công.
    </div>
@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


