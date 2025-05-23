@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Bộ môn') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->vaitro == 'admin')
                    <a href="{{ route('bomon.create') }}" class="btn btn-primary mb-3">Thêm bộ môn</a>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            
                                <th>Mã Bộ môn</th>
                                <th>Tên Bộ môn</th>
                                <th>Khoa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bomons as $bomon)
                                <tr>
                                    
                                    <td>{{ $bomon->MaBoMon }}</td>
                                    <td>{{ $bomon->TenBoMon }}</td>
                                    <td>{{ $bomon->khoa->TenKhoa }}</td>
                                    <td>
                                        <a href="{{ route('bomon.edit', $bomon->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('bomon.destroy', $bomon->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('bomon.show', $bomon->id) }}" class="btn btn-info">Chi tiết</a>
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