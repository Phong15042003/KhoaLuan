@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Khối kiến thức') }}</div>

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

                    <form method="POST" action="{{ route('khoikienthuc.update', $khoikienthuc->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaKhoiKienThuc">{{ __('Mã Khối kiến thức') }}</label>
                            <input type="text" class="form-control" id="MaKhoiKienThuc" name="MaKhoiKienThuc" value="{{ $khoikienthuc->MaKhoiKienThuc }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenKhoi">{{ __('Tên Khối') }}</label>
                            <input type="text" class="form-control" id="TenKhoi" name="TenKhoi" value="{{ $khoikienthuc->TenKhoi }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection