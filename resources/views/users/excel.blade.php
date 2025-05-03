@extends('layouts.app')

@section('content')
<div class="row justify-content-center" >
    <div class="card shadow-sm w-50">
        <div class="card-header bg-white border-bottom">
            <h5 class="mb-0 text-primary">➕ Thêm người dùng bằng Excel</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('users.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="file" class="form-label">📂 Chọn file Excel:</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>

          
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-file-earmark-excel-fill me-1"></i> Nhập Excel
                    </button>
              
            </form>
        </div>
    </div>
</div>
@endsection
