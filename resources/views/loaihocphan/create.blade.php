@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm loại học phần</div>

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

                    <form method="POST" action="{{ route('loaihocphan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="TenLoaiHocPhan">{{ __('Tên Loại học phần') }}</label>
                            <input type="text" class="form-control" id="TenLoaiHocPhan" name="TenLoaiHocPhan" value="{{ old('TenLoaiHocPhan') }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection