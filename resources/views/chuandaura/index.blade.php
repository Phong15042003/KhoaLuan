@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chuẩn đầu ra') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('chuandaura.create') }}" class="btn btn-primary mb-3">Thêm chuẩn đầu ra</a>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Học kỳ</th>
                                <th>Học phần</th>
                                <th>T1</th>
                                <th>T2</th>
                                <th>T3</th>
                                <th>T4</th>
                                <th>T5</th>
                                <th>T6</th>
                                <th>T7</th>
                                <th>T8</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chuandauras as $chuandaura)
                                <tr>
                                    <td>{{ $chuandaura->hocphan->HocKy }}</td>
                                    <td>{{ $chuandaura->hocphan->TenHocPhan }}</td>
                                    <td>{{ $chuandaura->T1 }}</td>
                                    <td>{{ $chuandaura->T2 }}</td>
                                    <td>{{ $chuandaura->T3 }}</td>
                                    <td>{{ $chuandaura->T4 }}</td>
                                    <td>{{ $chuandaura->T5 }}</td>
                                    <td>{{ $chuandaura->T6 }}</td>
                                    <td>{{ $chuandaura->T7 }}</td>
                                    <td>{{ $chuandaura->T8 }}</td>
                                    <td>
                                        <a href="{{ route('chuandaura.edit', $chuandaura->id) }}" class="btn btn-warning">Sửa</a>
                                        <form action="{{ route('chuandaura.destroy', $chuandaura->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                        </form>
                                        <a href="{{ route('chuandaura.show', $chuandaura->id) }}" class="btn btn-info">Chi tiết</a>
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