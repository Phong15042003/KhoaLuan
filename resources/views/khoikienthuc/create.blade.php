@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm khối kiến thức</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('khoikienthuc.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="MaKhoiKienThuc">{{ __('Mã Khối kiến thức') }}</label>
                            <input type="text" class="form-control" id="MaKhoiKienThuc" name="MaKhoiKienThuc" value="{{ old('MaKhoiKienThuc') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenKhoi">{{ __('Tên Khối') }}</label>
                            <input type="text" class="form-control" id="TenKhoi" name="TenKhoi" value="{{ old('TenKhoi') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection