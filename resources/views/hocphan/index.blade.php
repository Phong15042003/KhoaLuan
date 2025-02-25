@extends('layouts.app')

@section('content')
<div class="container-fluid"> {{-- Sử dụng container-fluid để sử dụng toàn bộ chiều rộng màn hình --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Học phần') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->vaitro == 'admin')
                    <a href="{{ route('hocphan.create') }}" class="btn btn-primary mb-3">Create Học phần</a>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>ID</th>
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
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hocphans as $hocphan)
                                    <tr>
                                        <td>{{ $hocphan->id }}</td>
                                        <td>{{ $hocphan->MaHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhan }}</td>
                                        <td>{{ $hocphan->TenHocPhanTiengAnh }}</td>
                                        <td>{{ $hocphan->loaihocphan->TenLoaiHocPhan }}</td>
                                        <td>{{ $hocphan->SoTinChi }}</td>
                                        <td>{{ $hocphan->SoTietLyThuyet }}</td>
                                        <td>{{ $hocphan->SoTietThucHanh }}</td>
                                        <td>{{ $hocphan->DkTienQuyet }}</td>
                                        <td>{{ $hocphan->DkHocTruoc }}</td>
                                        <td>{{ $hocphan->DkSongHanh }}</td>
                                        <td>{{ $hocphan->khoikienthuc->TenKhoi }}</td>
                                        <td>{{ $hocphan->HocKy }}</td>
                                        <td>
                                            <a href="{{ route('hocphan.edit', $hocphan->id) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('hocphan.destroy', $hocphan->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> {{-- End of table-responsive --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
