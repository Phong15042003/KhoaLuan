@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card shadow rounded">
                <div class="card-header text-center">
                    <h4 class="mb-0">Thêm Học Phần Bằng Excel</h4>
                </div>
                <div class="card-body">
                    {{-- Hiển thị thông báo thành công --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- Hiển thị thông báo lỗi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form upload --}}
                    <form action="{{ route('hocphan.import') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
                        @csrf
                        <div class="mb-3 w-100">
                            <input type="file" name="file" accept=".xlsx, .xls" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success px-5">Nhập Excel</button>
                    </form>

                    {{-- Gợi ý tải file mẫu --}}
                    <div class="mt-4 text-center">
                        <small>Vui lòng nhập đúng định dạng. <br>
                        Nếu chưa có file mẫu, <a href="{{ asset('file_mau/hocphan_mau.xlsx') }}" class="text-primary" download>Tải file mẫu tại đây</a>.</small>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
