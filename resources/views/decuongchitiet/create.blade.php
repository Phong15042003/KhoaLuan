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
                            <select class="form-control" id="HocPhanID" name="HocPhanID" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}">{{ $hocphan->TenHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label for="NoiDung"><strong>Nội dung đề cương chi tiết</strong></label>
                            <textarea class="form-control summernote" id="NoiDung" name="NoiDung" rows="15" required>
<h5>2. Mô tả môn học</h5>
<p>Nhập nội dung mô tả môn học tại đây...</p>

<h5>3. Tài liệu học tập</h5>
<ul>
    <b>Giáo trình</b>
    <li> Các tài liệu giáo trình:…</li>
    <b>Tham khảo</b>
    <li> Các tài liệu tham khảo: …</li>
    <b>Phần mềm</b>
    <li> Các tài liệu phần mềm: …</li>
</ul>

<h5>4. Chuẩn đầu ra môn học</h5>
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

<h5>5. Chuẩn đầu ra bài học</h5>
<table border="1" cellpadding="6" cellspacing="0" style="width:100%;">
    <thead>
        <tr>
            <th>CĐR môn học</th>
            <th>CDR bài học</th>
            <th>Mô tả CĐR bài học</th>
            <th>Mức độ Gd</th>
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

                        <button type="submit" class="btn btn-primary mt-3">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Summernote JS + cấu hình gọn -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 400,
            styleTags: [],
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ]
        });
    });
</script>
@endsection
