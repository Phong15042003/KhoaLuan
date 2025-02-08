@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create CTDT Học phần') }}</div>

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

                    <form method="POST" action="{{ route('ctdt_hocphan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="ctdt_id">{{ __('Chương trình đào tạo') }}</label>
                            <select class="form-control" id="ctdt_id" name="ctdt_id" required>
                                @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                    <option value="{{ $chuongtrinhdaotao->id }}">{{ $chuongtrinhdaotao->TenChuongTrinh }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hocphan_id">{{ __('Học phần') }}</label>
                            <select class="form-control" id="hocphan_id" name="hocphan_id" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}">{{ $hocphan->TenHocPhan }}</option>
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