@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chi tiết Bộ môn') }}</div>

                <div class="card-body">
                    <p><strong>Mã Bộ môn:</strong> {{ $bomon->MaBoMon }}</p>
                    <p><strong>Tên Bộ môn:</strong> {{ $bomon->TenBoMon }}</p>
                    <p><strong>Khoa:</strong> {{ $bomon->khoa->TenKhoa }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('Danh sách Ngành học') }}</div>

                <div class="card-body">
                    @if ($bomon->nganhhocs->isEmpty())
                        <p>Không có ngành học nào trong bộ môn này.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã Ngành</th>
                                    <th>Tên Ngành</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bomon->nganhhocs as $nganhhoc)
                                    <tr>
                                        <td>{{ $nganhhoc->MaNganh }}</td>
                                        <td>{{ $nganhhoc->TenNganh }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection