@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chi tiết Khoa') }}</div>

                <div class="card-body">
                    <p><strong>Mã Khoa:</strong> {{ $khoa->MaKhoa }}</p>
                    <p><strong>Tên Khoa:</strong> {{ $khoa->TenKhoa }}</p>
                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header">{{ __('Danh sách Bộ môn') }}</div>

                <div class="card-body">
                    @if ($khoa->bomons->isEmpty())
                        <p>Không có bộ môn nào trong khoa này.</p>
                    @else
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mã Bộ môn</th>
                                    <th>Tên Bộ môn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($khoa->bomons as $bomon)
                                    <tr>
                                        <td>{{ $bomon->MaBoMon }}</td>
                                        <td>{{ $bomon->TenBoMon }}</td>
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