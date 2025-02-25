<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Các bảng chọn</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Bảng chức năng</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    @auth
        @if (Auth::user()->vaitro == 'admin')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Quản lý</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('khoa.index') }}">Khoa</a>
                        <a class="collapse-item" href="{{ route('bomon.index') }}">Bộ môn</a>
                        <a class="collapse-item" href="{{ route('nganhhoc.index') }}">Ngành</a>
                        <a class="collapse-item" href="">Khóa học</a>
                        <a class="collapse-item" href="{{ route('chuongtrinhdaotao.index') }}">Chương trình đào tạo</a>
                        <a class="collapse-item" href="{{ route('ctdthocphan.index') }}">CTDT học phần</a>
                        <a class="collapse-item" href="{{ route('khoikienthuc.index') }}">Khối kiến thức</a>
                        <a class="collapse-item" href="{{ route('hocphan.index') }}">Học phần</a>
                        <a class="collapse-item" href="cards.html">Nhóm học phần</a>
                        <a class="collapse-item" href="{{ route('loaihocphan.index') }}">Loại học phần</a>
                        <a class="collapse-item" href="cards.html">Đề cương chi tiết</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Tài khoản người dùng</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Danh sách người dùng:</h6>
                        <a class="collapse-item" href="{{ route('users.index') }}">Danh sách tổng</a>
                        <a class="collapse-item" href="{{ route('users.index', ['vaitro' => 'admin']) }}">Admin</a>
                        <a class="collapse-item" href="{{ route('users.index', ['vaitro' => 'biensoan']) }}">Ban biên soạn</a>
                        <a class="collapse-item" href="{{ route('users.index', ['vaitro' => 'chunhiem']) }}">Ban chủ nhiệm khoa</a>
                        <a class="collapse-item" href="{{ route('users.index', ['vaitro' => 'giangvien']) }}">Giảng viên</a>
                        <a class="collapse-item" href="{{ route('users.index', ['vaitro' => 'sinhvien']) }}">Sinh viên</a>
                    </div>
                </div>
            </li>
        @endif

        @if (Auth::user()->vaitro == 'sinhvien')
            <!-- Nav Item - Chương trình đào tạo -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('chuongtrinhdaotao.index') }}">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Chương trình đào tạo</span>
                </a>
            </li>
        @endif
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
<!-- End of Sidebar -->
