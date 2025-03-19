@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chi tiết chuẩn đầu ra') }}</div>

                <div class="card-body">
                    <p><strong>Học phần:</strong> {{ $chuandaura->hocphan->TenHocPhan }}</p>
                    @for ($i = 1; $i <= 8; $i++)
                        <p><strong>{{ 'T' . $i }}:</strong> {{ $chuandaura->{'T' . $i} }}</p>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection