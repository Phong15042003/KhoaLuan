@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa đề cương chi tiết</div>

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

                    <form method="POST" action="{{ route('decuongchitiet.update', $decuongchitiet->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="HocPhanID">{{ __('Học phần') }}</label>
                            <select class="form-control" id="HocPhanID" name="HocPhanID" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}" {{ $decuongchitiet->HocPhanID == $hocphan->MaHocPhan ? 'selected' : '' }}>{{ $hocphan->TenHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="NoiDung">{{ __('Nội dung') }}</label>
                            <textarea class="form-control" id="NoiDung" name="NoiDung" required>{{ $decuongchitiet->NoiDung }}</textarea>
                        </div>

                     

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection