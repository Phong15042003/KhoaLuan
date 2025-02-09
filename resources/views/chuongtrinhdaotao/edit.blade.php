@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Chương trình đào tạo') }}</div>

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

                    <form method="POST" action="{{ route('chuongtrinhdaotao.update', $chuongtrinhdaotao->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaChuongTrinh">{{ __('Mã Chương trình') }}</label>
                            <input type="text" class="form-control" id="MaChuongTrinh" name="MaChuongTrinh" value="{{ $chuongtrinhdaotao->MaCTDT }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenChuongTrinh">{{ __('Tên Chương trình') }}</label>
                            <input type="text" class="form-control" id="TenChuongTrinh" name="TenChuongTrinh" value="{{ $chuongtrinhdaotao->TenChuongTrinh }}" required>
                        </div>

                        <div class="form-group">
                            <label for="NganhHocID">{{ __('Ngành học') }}</label>
                            <select class="form-control" id="NganhHocID" name="NganhHocID" required>
                                @foreach ($nganhhocs as $nganhhoc)
                                    <option value="{{ $nganhhoc->id }}" {{ $chuongtrinhdaotao->NganhHocID == $nganhhoc->id ? 'selected' : '' }}>{{ $nganhhoc->TenNganh }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection