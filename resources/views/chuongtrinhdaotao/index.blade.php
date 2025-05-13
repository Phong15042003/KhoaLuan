@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chương trình đào tạo') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (auth()->user()->vaitro == 'admin')
                        <a href="{{ route('chuongtrinhdaotao.create') }}" class="btn btn-primary mb-3">Thêm chương trình đào tạo</a>
                    @endif
                    

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                               
                                <th>Mã Chương trình</th>
                                <th>Tên Chương trình</th>
                                <th>Ngành học</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                <tr>
                                  
                                    <td>{{ $chuongtrinhdaotao->MaCTDT }}</td>
                                    <td>{{ $chuongtrinhdaotao->TenChuongTrinh }}</td>
                                    <td>{{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</td>
                                    <td>
                                        @if (auth()->user()->vaitro == 'biensoan')
                                            <a href="{{ route('chuongtrinhdaotao.edit', $chuongtrinhdaotao->id) }}" class="btn btn-warning">Sửa</a>
                                            <form action="{{ route('chuongtrinhdaotao.destroy', $chuongtrinhdaotao->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                        @endif
                                      
                                        <a href="{{ route('chuongtrinhdaotao.show', $chuongtrinhdaotao->id) }}" class="btn btn-info">Chi tiết</a>
                                        
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