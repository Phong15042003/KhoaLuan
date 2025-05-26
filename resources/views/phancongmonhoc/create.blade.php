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
    <label for="chuongtrinhdaotao">Chương trình đào tạo</label>
    <select id="chuongtrinhdaotao" class="form-control" required>
        <option value="">-- Chọn CTĐT --</option>
        @foreach($chuongtrinhdaotaos as $ctdt)
            <option value="{{ $ctdt->id }}">{{ $ctdt->TenChuongTrinh }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="HocPhanID">Học phần</label>
    <select class="form-control" id="HocPhanID" name="HocPhanID" required>
        <option value="">-- Chọn học phần --</option>
        {{-- Sẽ được load bằng JS --}}
    </select>
</div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('chuongtrinhdaotao').addEventListener('change', function () {
    const id = this.value;
    const hocPhanSelect = document.getElementById('HocPhanID');
    hocPhanSelect.innerHTML = '<option>Đang tải...</option>';

    fetch(`/khoaluan/public/lay-hoc-phan-theo-ctdt/${id}`)
        .then(response => response.json())
        .then(data => {
            hocPhanSelect.innerHTML = '<option value="">-- Chọn học phần --</option>';
            data.forEach(function(hp) {
                hocPhanSelect.innerHTML += `<option value="${hp.id}">${hp.TenHocPhan}</option>`;
            });
        })
        .catch(err => {
            hocPhanSelect.innerHTML = '<option value="">Không tải được dữ liệu</option>';
            console.error(err);
        });
});
</script>

@endsection