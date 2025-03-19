@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chuẩn đầu ra</div>

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

                    <form method="POST" action="{{ route('chuandaura.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="hocphan_id">{{ __('Học phần') }}</label>
                            <select class="form-control" id="hocphan_id" name="hocphan_id" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}">{{ $hocphan->TenHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        @for ($i = 1; $i <= 8; $i++)
                            <div class="form-group">
                                <label for="T{{ $i }}">{{ __('T' . $i) }}</label>
                                <input type="text" class="form-control" id="T{{ $i }}" name="T{{ $i }}" value="{{ old('T' . $i) }}">
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection