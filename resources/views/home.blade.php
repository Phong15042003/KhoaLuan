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
                                        <i class="fas fa-book fa-3x mb-3 text-primary"></i>
                                        <h5 class="card-title">Chương trình đào tạo</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('khoahoc.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <i class="fas fa-calendar fa-3x mb-3 text-success"></i>
                                        <h5 class="card-title">Khóa học</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                     
                        <div class="col-md-4">
                            <a href="{{ route('hocphan.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <i class="fas fa-book-open fa-3x mb-3 text-info"></i>
                                        <h5 class="card-title">Học phần</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                       
                        <div class="col-md-4">
                            <a href="{{ route('decuongchitiet.index') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <i class="fas fa-file-alt fa-3x mb-3 text-info"></i>
                                        <h5 class="card-title">Đề cương chi tiết</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('users.index', ['vaitro' => 'giangvien']) }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <i class="fas fa-user-graduate  fa-3x mb-3 text-info"></i>
                                        <h5 class="card-title">Danh sách giảng viên</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                         <div class="col-md-4">
                            <a href="{{ route('information') }}" class="text-decoration-none">
                                <div class="card text-center shadow-sm">
                                    <div class="card-body">
                                        <i class="fas fa-building fa-3x mb-3 text-info"></i>
                                        <h5 class="card-title">Thông tin chung</h5>
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
