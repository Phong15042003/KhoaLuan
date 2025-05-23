@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sửa chương trình đào tạo</div>

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

                        <div class="form-group mb-3">
                            <label for="MaCTDT">Mã Chương trình</label>
                            <input type="text" class="form-control" name="MaCTDT" value="{{ old('MaCTDT', $chuongtrinhdaotao->MaCTDT) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="TenChuongTrinh">Tên Chương trình</label>
                            <input type="text" class="form-control" name="TenChuongTrinh" value="{{ old('TenChuongTrinh', $chuongtrinhdaotao->TenChuongTrinh) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="TenChuongTrinhTiengAnh">Tên tiếng Anh</label>
                            <input type="text" class="form-control" name="TenChuongTrinhTiengAnh" value="{{ old('TenChuongTrinhTiengAnh', $chuongtrinhdaotao->TenChuongTrinhTiengAnh) }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="NganhHocID">Ngành học</label>
                            <select class="form-control" name="NganhHocID" required>
                                @foreach ($nganhhocs as $nganhhoc)
                                    <option value="{{ $nganhhoc->id }}" {{ old('NganhHocID', $chuongtrinhdaotao->NganhHocID) == $nganhhoc->id ? 'selected' : '' }}>
                                        {{ $nganhhoc->TenNganh }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="Noidung">Nội dung chương trình đào tạo</label>
                            <textarea class="form-control" id="Noidung" name="Noidung" rows="15">{{ old('Noidung', $chuongtrinhdaotao->Noidung) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


