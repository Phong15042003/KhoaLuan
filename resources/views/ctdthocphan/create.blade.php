@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chương trình đào tạo-học phần</div>

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

                    <form method="POST" action="{{ route('ctdthocphan.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="CTDT_ID">{{ __('Chương trình đào tạo') }}</label>
                            <select class="form-control" id="CTDT_ID" name="CTDT_ID" required>
                                @foreach ($chuongtrinhdaotaos as $chuongtrinhdaotao)
                                    <option value="{{ $chuongtrinhdaotao->id }}">{{ $chuongtrinhdaotao->TenChuongTrinh }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HocPhanID">{{ __('Học phần') }}</label>
                            <select class="form-control select2-no-close" id="HocPhanID" name="HocPhanID[]" multiple required>
                                
                                @foreach ($hocphans as $khoikienthucID => $groupedHocphans)
                                    <optgroup label="{{ $groupedHocphans->first()->khoikienthuc->TenKhoi }}">
                                        @foreach ($groupedHocphans as $hocphan)
                                            <option value="{{ $hocphan->id }}">{{ $hocphan->MaHocPhan }} -{{ $hocphan->TenHocPhan }}- Học kỳ: {{ $hocphan->HocKy }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                    <script>
                        document.getElementById('CTDT_ID').addEventListener('change', function () {
                            const ctdtID = this.value;
                            const hocphanSelect = document.getElementById('HocPhanID');
                    
                            if ($(hocphanSelect).hasClass('select2-hidden-accessible')) {
                                $(hocphanSelect).val(null).trigger('change');
                            }
                    
                            hocphanSelect.innerHTML = '';
                    
                            const baseUrl = "{{ url('/') }}"; // đường dẫn gốc tới /khoaluan/public nếu có
                            fetch(`${baseUrl}/get-hocphans/${ctdtID}`)
                                .then(res => {
                                    if (!res.ok) {
                                        throw new Error(`HTTP error! status: ${res.status}`);
                                    }
                                    return res.json();
                                })
                                .then(data => {
                                    if (data.length === 0) {
                                        const option = document.createElement('option');
                                        option.disabled = true;
                                        option.textContent = 'Không còn học phần để chọn';
                                        hocphanSelect.appendChild(option);
                                        return;
                                    }
                    
                                    data.forEach(group => {
                                        const optgroup = document.createElement('optgroup');
                                        optgroup.label = group.group;
                    
                                        group.items.forEach(item => {
                                            const option = document.createElement('option');
                                            option.value = item.id;
                                            option.textContent = item.label;
                                            optgroup.appendChild(option);
                                        });
                    
                                        hocphanSelect.appendChild(optgroup);
                                    });
                    
                                    if ($(hocphanSelect).hasClass('select2-hidden-accessible')) {
                                        $(hocphanSelect).select2();
                                    }
                                })
                                .catch(error => {
                                    console.error('Lỗi khi tải học phần:', error);
                                    const option = document.createElement('option');
                                    option.disabled = true;
                                    option.textContent = 'Lỗi khi tải học phần';
                                    hocphanSelect.appendChild(option);
                                });
                        });
                    </script>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection