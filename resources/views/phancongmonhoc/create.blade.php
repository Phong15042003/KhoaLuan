@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm phân công môn học</div>

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

                    <form method="POST" action="{{ route('phancongmonhoc.store') }}">
                        @csrf

                        <!-- Hiển thị tên user hiện tại (Biên soạn) -->
                        <div class="form-group">
                            <label for="biensoan">{{ __('Người phân công') }}</label>
                            <input type="text" class="form-control" id="biensoan" value="{{ auth()->user()->name }}" readonly>
                            <input type="hidden" name="biensoan_id" value="{{ auth()->user()->id }}">
                        </div>

                        <div class="form-group">
                            <label for="giangvien_id">{{ __('Giảng viên') }}</label>
                            <select class="form-control" id="giangvien_id" name="giangvien_id" required>
                                @foreach ($users as $user)
                                    @if ($user->vaitro == 'giangvien')
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HocPhanID">{{ __('Học phần') }}</label>
                            <select class="form-control" id="HocPhanID" name="HocPhanID" required>
                                @foreach ($hocphans as $hocphan)
                                    <option value="{{ $hocphan->id }}">{{ $hocphan->TenHocPhan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection