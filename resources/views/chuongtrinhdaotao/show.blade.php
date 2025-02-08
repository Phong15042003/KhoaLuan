@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Chương trình đào tạo Details') }}</div>

                <div class="card-body">
                    <p><strong>Mã Chương trình:</strong> {{ $chuongtrinhdaotao->MaChuongTrinh }}</p>
                    <p><strong>Tên Chương trình:</strong> {{ $chuongtrinhdaotao->TenChuongTrinh }}</p>
                    <p><strong>Ngành học:</strong> {{ $chuongtrinhdaotao->nganhhoc->TenNganh }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection