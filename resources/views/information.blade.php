@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📘 Giới thiệu hệ thống quản lý chương trình đào tạo</h4>
                </div>
                <div class="card-body" style="line-height: 1.8">
                    <p>
                        Hệ thống <strong>Quản lý chương trình đào tạo</strong> là phần mềm hỗ trợ công tác quản lý chương trình đào tạo tại khoa công nghệ thông tin trong trường Đại học An Giang. 
                        Phần mềm được xây dựng nhằm mục đích tối ưu hóa quy trình quản lý, lưu trữ và tra cứu thông tin liên quan đến:
                    </p>
                    <ul>
                        <li>📚 <strong>Chương trình đào tạo</strong>: Tổng hợp các chương trình đào tạo của khoa theo từng ngành, từng khóa.</li>
                        <li>🗓️ <strong>Khóa học</strong>: Quản lý danh sách khóa học, thời gian đào tạo, liên kết chương trình.</li>
                        <li>📖 <strong>Học phần</strong>: Theo dõi danh sách học phần, số tín chỉ, điều kiện tiên quyết.</li>
                        <li>📝 <strong>Đề cương chi tiết</strong>: Lưu trữ và tra cứu nội dung chi tiết của từng học phần.</li>
                        <li>👩‍🏫 <strong>Giảng viên</strong>: Quản lý danh sách giảng viên tham gia giảng dạy và có thể xem những đề cương giảng viên đó soạn.</li>
                    </ul>
                    <p>
                        Ngoài ra, hệ thống còn cung cấp các chức năng phân quyền người dùng, giúp đảm bảo an toàn dữ liệu và thuận tiện trong việc theo dõi lịch sử chỉnh sửa. 
                        Với giao diện trực quan, hiện đại và hỗ trợ tìm kiếm linh hoạt, phần mềm giúp tiết kiệm thời gian và nâng cao hiệu quả quản lý học vụ.
                    </p>

                    <p class="text-muted text-end mb-0">
                        ✨ Phát triển bởi <strong>NgoThanhPhong</strong> – Dự án khóa luận tốt nghiệp tại Trường Đại học An Giang.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
