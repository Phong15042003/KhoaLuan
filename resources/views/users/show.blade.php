@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thông tin người dùng') }}</div>

                <div class="card-body">
                    <p><strong>Tên:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Vai trò:</strong> {{ ucfirst($user->vaitro) }}</p>
                </div>
            </div>

            @if ($user->vaitro === 'giangvien')
                @if ($decuongchitiets->isNotEmpty())
                    <div class="card mt-4">
                        <div class="card-header">{{ __('Danh sách Đề cương chi tiết') }}</div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Học phần</th>
                                        <th>Tên Học phần</th>
                                        <th>Hành động </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($decuongchitiets as $decuongchitiet)
                                        <tr>
                                            <td>{{ $decuongchitiet->hocphan->MaHocPhan }}</td>
                                            <td>{{ $decuongchitiet->hocphan->TenHocPhan }}</td>
                                            <td>
                        
                                                <a href="{{ route('decuongchitiet.show', $decuongchitiet->id) }}" class="btn btn-info">Chi tiết</a>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="card mt-4">
                        <div class="card-body">
                            <p>Không có đề cương chi tiết nào.</p>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
</div>
@endsection