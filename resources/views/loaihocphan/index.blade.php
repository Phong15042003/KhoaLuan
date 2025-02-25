@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Loại học phần') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('loaihocphan.create') }}" class="btn btn-primary mb-3">Thêm loại học phần</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Loại học phần</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loaihocphans as $loaihocphan)
                                <tr>
                                    <td>{{ $loaihocphan->id }}</td>
                                    <td>{{ $loaihocphan->TenLoaiHocPhan }}</td>
                                    <td>
                                        <a href="{{ route('loaihocphan.edit', $loaihocphan->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('loaihocphan.destroy', $loaihocphan->id) }}" method="POST" style="display:inline-block;">
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