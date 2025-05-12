@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Khóa học') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('khoahoc.create') }}" class="btn btn-primary mb-3">Thêm khóa học</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Mã Khóa học</th>
                                <th>Tên Khóa học</th>
                                <th>Chương trình đào tạo</th>
                                <th>Năm Bắt Đầu</th>
                                <th>Năm Kết Thúc</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khoahocs as $khoahoc)
                                <tr>
                               
                                    <td>{{ $khoahoc->MaKhoaHoc }}</td>
                                    <td>{{ $khoahoc->TenKhoaHoc }}</td>
                                    <td>{{ $khoahoc->chuongtrinhdaotao->TenChuongTrinh }}</td>
                                    <td>{{ $khoahoc->NamBatDau }}</td>
                                    <td>{{ $khoahoc->NamKetThuc }}</td>
                                    <td>
                                        <a href="{{ route('khoahoc.edit', $khoahoc->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('khoahoc.destroy', $khoahoc->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('khoahoc.show', $khoahoc->id) }}" class="btn btn-info">Chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection