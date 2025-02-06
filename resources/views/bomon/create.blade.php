@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Bộ môn') }}</div>

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

                    <form method="POST" action="{{ route('bomon.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="MaBoMon">{{ __('Mã Bộ môn') }}</label>
                            <input type="text" class="form-control" id="MaBoMon" name="MaBoMon" value="{{ old('MaBoMon') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenBoMon">{{ __('Tên Bộ môn') }}</label>
                            <input type="text" class="form-control" id="TenBoMon" name="TenBoMon" value="{{ old('TenBoMon') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="KhoaID">{{ __('Khoa') }}</label>
                            <select class="form-control" id="KhoaID" name="KhoaID" required>
                                @foreach ($khoas as $khoa)
                                    <option value="{{ $khoa->id }}">{{ $khoa->TenKhoa }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection