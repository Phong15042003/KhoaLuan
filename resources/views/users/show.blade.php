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
                <div class="card mt-4">
                    <div class="card-header">{{ __('Đề cương chi tiết được phân công') }}</div>

                    <div class="card-body">
                        @if ($decuongchitiets->isEmpty())
                            <p>Không có đề cương chi tiết nào được phân công.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Mã Học phần</th>
                                        <th>Tên Học phần</th>
                                        <th>Nội dung</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($decuongchitiets as $decuongchitiet)
                                        <tr>
                                            <td>{{ $decuongchitiet->hocphan->MaHocPhan }}</td>
                                            <td>{{ $decuongchitiet->hocphan->TenHocPhan }}</td>
                                            <td>{{ $decuongchitiet->NoiDung }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection