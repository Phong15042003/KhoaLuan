@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Loại học phần') }}</div>

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

                    <form method="POST" action="{{ route('loaihocphan.update', $loaihocphan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="TenLoaiHocPhan">{{ __('Tên Loại học phần') }}</label>
                            <input type="text" class="form-control" id="TenLoaiHocPhan" name="TenLoaiHocPhan" value="{{ $loaihocphan->TenLoaiHocPhan }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection