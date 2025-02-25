@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">CTĐT-học phần</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('ctdthocphan.create') }}" class="btn btn-primary mb-3">Thêm CTDT Học phần</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Chương trình đào tạo</th>
                                <th>Học phần</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ctdtHocphans as $ctdtHocphan)
                                <tr>
                                    <td>{{ $ctdtHocphan->id }}</td>
                                    <td>{{ $ctdtHocphan->chuongtrinhdaotao ? $ctdtHocphan->chuongtrinhdaotao->TenChuongTrinh : 'N/A' }}</td>
                                    <td>{{ $ctdtHocphan->hocphan ? $ctdtHocphan->hocphan->TenHocPhan : 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('ctdthocphan.edit', $ctdtHocphan->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('ctdthocphan.destroy', $ctdtHocphan->id) }}" method="POST" style="display:inline-block;">
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