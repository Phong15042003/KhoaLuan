@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa bộ môn</div>

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

                    <form method="POST" action="{{ route('bomon.update', $bomon->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaBoMon">{{ __('Mã Bộ môn') }}</label>
                            <input type="text" class="form-control" id="MaBoMon" name="MaBoMon" value="{{ $bomon->MaBoMon }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenBoMon">{{ __('Tên Bộ môn') }}</label>
                            <input type="text" class="form-control" id="TenBoMon" name="TenBoMon" value="{{ $bomon->TenBoMon }}" required>
                        </div>

                        <div class="form-group">
                            <label for="KhoaID">{{ __('Khoa') }}</label>
                            <select class="form-control" id="KhoaID" name="KhoaID" required>
                                @foreach ($khoas as $khoa)
                                    <option value="{{ $khoa->id }}" {{ $bomon->KhoaID == $khoa->id ? 'selected' : '' }}>{{ $khoa->TenKhoa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection