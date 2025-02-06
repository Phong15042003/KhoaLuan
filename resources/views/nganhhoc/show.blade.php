@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ngành học Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Ngành:</strong> {{ $nganhhoc->MaNganh }}</p>
                    <p><strong>Tên Ngành:</strong> {{ $nganhhoc->TenNganh }}</p>
                    <p><strong>Bộ Môn:</strong> {{ $nganhhoc->bomon->TenBoMon }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection