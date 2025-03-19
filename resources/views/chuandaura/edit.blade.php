@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa chuẩn đầu ra</div>

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

                    <form method="POST" action="{{ route('chuandaura.update', $chuandaura->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="hocphan_id">{{ __('Học phần') }}</label>
                            <input type="text" class="form-control" id="hocphan_name" name="hocphan_name" value="{{ $chuandaura->hocphan->TenHocPhan }}" readonly>
                            <input type="hidden" id="hocphan_id" name="hocphan_id" value="{{ $chuandaura->hocphan_id }}">
                        </div>

                        @for ($i = 1; $i <= 8; $i++)
                            <div class="form-group">
                                <label for="T{{ $i }}">{{ __('T' . $i) }}</label>
                                <input type="text" class="form-control" id="T{{ $i }}" name="T{{ $i }}" value="{{ $chuandaura->{'T' . $i} }}">
                            </div>
                        @endfor

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection