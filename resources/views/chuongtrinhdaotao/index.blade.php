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

                    <a href="{{ route('chuongtrinhdaotao.create') }}" class="btn btn-primary mb-3">Create Chương trình đào tạo</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Chương trình</th>
                                <th>Tên Chương trình</th>
                                <th>Ngành học</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                <tr>
                                    <td>{{ $chuongtrinhdaotao->id }}</td>
                                    <td>{{ $chuongtrinhdaotao->MaCTDT }}</td>
                                    <td>{{ $chuongtrinhdaotao->TenChuongTrinh }}</td>
                                    <td>{{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</td>
                                    <td>
                                        <a href="{{ route('chuongtrinhdaotao.edit', $chuongtrinhdaotao->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('chuongtrinhdaotao.destroy', $chuongtrinhdaotao->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
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