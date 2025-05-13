@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Show "Thêm người dùng" and "Thêm người dùng bằng excel" only for admin --}}
                    @if (auth()->user()->vaitro == 'admin')
                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Thêm người dùng</a>
                        <a href="{{ route('users.excel') }}" class="btn btn-primary mb-3">Thêm người dùng bằng excel</a>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Vai trò</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                   
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->vaitro }}</td>
                                    <td>
                                        {{-- Show "Sửa" and "Xóa" buttons only for admin --}}
                                        @if (auth()->user()->vaitro == 'admin')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-info">Chi tiết</a>
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