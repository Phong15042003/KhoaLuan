@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Phân công môn học') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('phancongmonhoc.create') }}" class="btn btn-primary mb-3">Thêm phân công </a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Biên soạn</th>
                                <th>Giảng viên</th>
                                <th>Học phần</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($phancongmonhocs as $phancongmonhoc)
                                <tr>
                                    
                                    <td>{{ $phancongmonhoc->biensoan->name }}</td>
                                    <td>{{ $phancongmonhoc->giangvien->name }}</td>
                                    <td>{{ $phancongmonhoc->hocphan->TenHocPhan }}</td>
                                    <td>
                                        <a href="{{ route('phancongmonhoc.edit', $phancongmonhoc->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('phancongmonhoc.destroy', $phancongmonhoc->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('phancongmonhoc.show', $phancongmonhoc->id) }}" class="btn btn-info">Chi tiết</a>
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