@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Chương trình đào tạo') }}</div>

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

                    <form method="POST" action="{{ route('chuongtrinhdaotao.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="MaCTDT">{{ __('Mã Chương trình') }}</label>
                            <input type="text" class="form-control" id="MaCTDT" name="MaCTDT" value="{{ old('MaCTDT') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenChuongTrinh">{{ __('Tên Chương trình') }}</label>
                            <input type="text" class="form-control" id="TenChuongTrinh" name="TenChuongTrinh" value="{{ old('TenChuongTrinh') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NganhHocID">{{ __('Ngành học') }}</label>
                            <select class="form-control" id="NganhHocID" name="NganhHocID" required>
                                @foreach ($nganhhocs as $nganhhoc)
                                    <option value="{{ $nganhhoc->id }}">{{ $nganhhoc->TenNganh }}</option>
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