@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Đề cương chi tiết') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                     @if (auth()->user()->vaitro == 'giangvien')
                        <a href="{{ route('decuongchitiet.create') }}" class="btn btn-primary mb-3">Thêm đề cương chi tiết</a>

                    @endif
                   
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Học phần</th>
                                <th>Nội dung</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($decuongchitiets as $decuongchitiet)
                                <tr>
                                    <td>{{ $decuongchitiet->id }}</td>
                                    <td>{{ $decuongchitiet->hocphan->TenHocPhan }}</td>
                                    <td>{{ $decuongchitiet->NoiDung }}</td>
                                 
                                    <td>
                                        <a href="{{ route('decuongchitiet.edit', $decuongchitiet->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('decuongchitiet.destroy', $decuongchitiet->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('decuongchitiet.show', $decuongchitiet->id) }}" class="btn btn-info">Chi tiết</a>
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