@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Khối kiến thức') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->vaitro == 'admin')
                    <a href="{{ route('khoikienthuc.create') }}" class="btn btn-primary mb-3">Thêm khối kiến thức</a>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Khối kiến thức</th>
                                <th>Tên Khối</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($khoikienthucs as $khoikienthuc)
                                <tr>
                                    <td>{{ $khoikienthuc->id }}</td>
                                    <td>{{ $khoikienthuc->MaKhoiKienThuc }}</td>
                                    <td>{{ $khoikienthuc->TenKhoi }}</td>
                                    <td>
                                        <a href="{{ route('khoikienthuc.edit', $khoikienthuc->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('khoikienthuc.destroy', $khoikienthuc->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
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