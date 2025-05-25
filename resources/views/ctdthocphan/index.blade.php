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
                    <form action="{{ route('ctdthocphan.index') }}" method="GET" class="d-flex align-items-center mb-3 gap-2">
                        <select name="CTDT_ID" onchange="this.form.submit()" class="form-select form-select-sm w-auto" style="min-width: 280px;">
                            <option value="">-- Tất cả Chương trình đào tạo --</option>
                            @foreach($chuongtrinhdaotaos as $ctdt)
                                <option value="{{ $ctdt->id }}" {{ request('CTDT_ID') == $ctdt->id ? 'selected' : '' }}>
                                    {{ $ctdt->TenChuongTrinh }}
                                </option>
                            @endforeach
                        </select>
                    
                        @if(request('CTDT_ID'))
                            <a href="{{ route('ctdthocphan.index') }}" class="btn btn-secondary btn-sm">Xóa lọc</a>
                        @endif
                    </form>
                    @if(request('CTDT_ID'))
    <form action="{{ route('ctdthocphan.destroyAll') }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tất cả học phần của CTĐT này?')">
        @csrf
        @method('POST')
        <input type="hidden" name="CTDT_ID" value="{{ request('CTDT_ID') }}">
        <button type="submit" class="btn btn-danger btn-sm">🗑 Xóa tất cả học phần CTĐT này</button>
    </form>
@endif
                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Chương trình đào tạo</th>
                                <th>Học phần</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ctdtHocphans as $ctdtHocphan)
                                <tr>
                                    
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