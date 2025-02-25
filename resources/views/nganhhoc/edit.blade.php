@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa ngành học</div>

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

                    <form method="POST" action="{{ route('nganhhoc.update', $nganhhoc->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="MaNganh">{{ __('Mã Ngành') }}</label>
                            <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="{{ $nganhhoc->MaNganh }}" required>
                        </div>

                        <div class="form-group">
                            <label for="TenNganh">{{ __('Tên Ngành') }}</label>
                            <input type="text" class="form-control" id="TenNganh" name="TenNganh" value="{{ $nganhhoc->TenNganh }}" required>
                        </div>

                        <div class="form-group">
                            <label for="BoMonID">{{ __('Bộ Môn') }}</label>
                            <select class="form-control" id="BoMonID" name="BoMonID" required>
                                @foreach ($bomons as $bomon)
                                    <option value="{{ $bomon->id }}" {{ $nganhhoc->BoMonID == $bomon->id ? 'selected' : '' }}>{{ $bomon->TenBoMon }}</option>
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