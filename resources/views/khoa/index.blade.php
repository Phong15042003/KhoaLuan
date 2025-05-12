@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Khoa') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->vaitro == 'admin')
                    <a href="{{ route('khoa.create') }}" class="btn btn-primary mb-3">Thêm khoa</a>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Ma Khoa</th>
                                <th>Ten Khoa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khoas as $khoa)
                                <tr>
                                    <td>{{ $khoa->MaKhoa }}</td>
                                    <td>{{ $khoa->TenKhoa }}</td>
                                    <td>
                                        <a href="{{ route('khoa.edit', $khoa->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('khoa.destroy', $khoa->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('khoa.show', $khoa->id) }}" class="btn btn-info">Chi tiết</a>
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