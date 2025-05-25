@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chuẩn đầu ra') }} - {{ $chuongtrinhdaotao->TenChuongTrinh }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif



                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
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
                            @foreach ($hocphans as $hocphan)
                                <tr>
                                   <td>{{ $loop->iteration }}</td>
                                    <td>{{ $hocphan->TenHocPhan }}</td>
                                    <td>{{ $hocphan->chuandaura->T1 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T2 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T3 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T4 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T5 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T6 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T7 ?? '' }}</td>
                                    <td>{{ $hocphan->chuandaura->T8 ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('chuandaura.edit', $hocphan->id) }}" class="btn btn-warning">Sửa</a>
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