@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Hệ thống quản lý chương trình đào tạo</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('chuongtrinhdaotao.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        {{-- <img src="" alt="Chương trình đào tạo" class="img-fluid mb-3" style="max-height: 150px;"> --}}
                                        <h5 class="card-title">Chương trình đào tạo</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('khoahoc.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        {{-- <img src="" alt="Khóa học" class="img-fluid mb-3" style="max-height: 150px;"> --}}
                                        <h5 class="card-title">Khóa học</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('hocphan.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        {{-- <img src="" alt="Học phần" class="img-fluid mb-3" style="max-height: 150px;"> --}}
                                        <h5 class="card-title">Học phần</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection