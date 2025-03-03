@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa phân công môn học</div>

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

                    <form method="POST" action="{{ route('phancongmonhoc.update', $phancongmonhoc->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="biensoan_id">{{ __('Biên soạn') }}</label>
                            <select class="form-control" id="biensoan_id" name="biensoan_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $phancongmonhoc->biensoan_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="giangvien_id">{{ __('Giảng viên') }}</label>
                            <select class="form-control" id="giangvien_id" name="giangvien_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $phancongmonhoc->giangvien_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HocPhanID">{{ __('Học phần') }}</label>
                            <select class="form-control" id="HocPhanID" name="HocPhanID" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}" {{ $phancongmonhoc->HocPhanID == $hocphan->id ? 'selected' : '' }}>{{ $hocphan->TenHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection