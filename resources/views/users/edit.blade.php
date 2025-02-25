@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa người dùng</div>

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

                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>

                        <div class="form-group">
                            <label for="vaitro">{{ __('Role') }}</label>
                            <select class="form-control" id="vaitro" name="vaitro" required>
                                <option value="sinhvien" {{ $user->vaitro == 'sinhvien' ? 'selected' : '' }}>Sinh viên</option>
                                <option value="admin" {{ $user->vaitro == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="biensoan" {{ $user->vaitro == 'biensoan' ? 'selected' : '' }}>Biên soạn</option>
                                <option value="chunhiem" {{ $user->vaitro == 'chunhiem' ? 'selected' : '' }}>Chủ nhiệm</option>
                                <option value="giangvien" {{ $user->vaitro == 'giangvien' ? 'selected' : '' }}>Giảng viên</option>
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