@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit CTDT Học phần') }}</div>

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

                    <form method="POST" action="{{ route('ctdt_hocphan.update', $ctdtHocphan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="CTDT_ID">{{ __('Chương trình đào tạo') }}</label>
                            <select class="form-control" id="CTDT_ID" name="CTDT_ID" required>
                                @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                    <option value="{{ $chuongtrinhdaotao->id }}" {{ $ctdtHocphan->CTDT_ID == $chuongtrinhdaotao->id ? 'selected' : '' }}>{{ $chuongtrinhdaotao->TenChuongTrinh }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HocPhanID">{{ __('Học phần') }}</label>
                            <select class="form-control" id="HocPhanID" name="HocPhanID" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}" {{ $ctdtHocphan->HocPhanID == $hocphan->id ? 'selected' : '' }}>{{ $hocphan->TenHocPhan }}</option>
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