-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2025 lúc 04:06 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `khoaluantn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bomons`
--

CREATE TABLE `bomons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaBoMon` varchar(50) NOT NULL,
  `TenBoMon` varchar(100) NOT NULL,
  `KhoaID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bomons`
--

INSERT INTO `bomons` (`id`, `MaBoMon`, `TenBoMon`, `KhoaID`, `created_at`, `updated_at`) VALUES
(1, 'CNTT', 'Công nghệ thông tin', 1, '2025-03-18 06:46:21', '2025-03-18 06:46:21'),
(2, 'KTPM', 'Kỹ thuật phần mềm', 1, '2025-03-18 06:46:27', '2025-03-18 06:46:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuandauras`
--

CREATE TABLE `chuandauras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hocphan_id` bigint(20) UNSIGNED NOT NULL,
  `T1` varchar(255) DEFAULT NULL,
  `T2` varchar(255) DEFAULT NULL,
  `T3` varchar(255) DEFAULT NULL,
  `T4` varchar(255) DEFAULT NULL,
  `T5` varchar(255) DEFAULT NULL,
  `T6` varchar(255) DEFAULT NULL,
  `T7` varchar(255) DEFAULT NULL,
  `T8` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuandauras`
--

INSERT INTO `chuandauras` (`id`, `hocphan_id`, `T1`, `T2`, `T3`, `T4`, `T5`, `T6`, `T7`, `T8`, `created_at`, `updated_at`) VALUES
(12, 18, 'T3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-24 07:13:39', '2025-03-24 07:13:39'),
(13, 14, 'T3', NULL, 'T1', NULL, NULL, NULL, NULL, NULL, '2025-03-24 07:14:10', '2025-03-24 07:16:01'),
(14, 26, NULL, NULL, NULL, NULL, NULL, 'T2', NULL, NULL, '2025-03-24 07:19:57', '2025-03-24 07:19:57'),
(15, 19, 'T3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-25 05:56:56', '2025-03-25 05:56:56'),
(16, 20, 'U', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-25 05:57:42', '2025-03-25 05:57:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhdaotaos`
--

CREATE TABLE `chuongtrinhdaotaos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaCTDT` varchar(50) NOT NULL,
  `TenChuongTrinh` varchar(100) NOT NULL,
  `NganhHocID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhdaotaos`
--

INSERT INTO `chuongtrinhdaotaos` (`id`, `MaCTDT`, `TenChuongTrinh`, `NganhHocID`, `created_at`, `updated_at`) VALUES
(1, 'CNTTDH25', 'Công nghệ thông tin DH25', 1, '2025-02-25 00:12:50', '2025-02-25 00:12:50'),
(2, 'CNTTDH24', 'Công nghệ thông tin DH24', 1, '2025-02-25 00:12:57', '2025-02-25 00:12:57'),
(5, '7480103', 'Kĩ thuật phần mềm', 2, '2025-05-08 01:08:49', '2025-05-08 01:08:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdthocphans`
--

CREATE TABLE `ctdthocphans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `CTDT_ID` bigint(20) UNSIGNED DEFAULT NULL,
  `HocPhanID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ctdthocphans`
--

INSERT INTO `ctdthocphans` (`id`, `CTDT_ID`, `HocPhanID`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-02-26 18:21:36', '2025-02-26 18:21:36'),
(2, 1, 2, '2025-02-26 18:21:39', '2025-02-26 18:21:39'),
(3, 1, 3, '2025-02-26 18:21:46', '2025-02-26 18:21:46'),
(4, 1, 4, '2025-02-26 18:21:50', '2025-02-26 18:21:50'),
(5, 1, 5, '2025-02-26 18:21:54', '2025-02-26 18:21:54'),
(6, 1, 6, '2025-02-26 18:21:57', '2025-02-26 18:21:57'),
(7, 1, 7, '2025-02-26 18:22:00', '2025-02-26 18:22:00'),
(8, 1, 8, '2025-02-26 18:22:05', '2025-02-26 18:22:36'),
(9, 1, 9, '2025-02-26 18:22:42', '2025-02-26 18:22:42'),
(10, 1, 10, '2025-02-26 18:22:56', '2025-02-26 18:22:56'),
(11, 1, 11, '2025-02-26 18:23:01', '2025-02-26 18:23:01'),
(12, 1, 12, '2025-02-26 18:23:05', '2025-02-26 18:23:05'),
(13, 1, 13, '2025-02-26 18:23:09', '2025-02-26 18:23:09'),
(14, 1, 14, '2025-02-26 18:23:13', '2025-02-26 18:23:13'),
(15, 1, 15, '2025-02-26 18:23:16', '2025-02-26 18:23:16'),
(16, 1, 16, '2025-02-26 18:23:23', '2025-02-26 18:23:23'),
(17, 1, 17, '2025-02-26 18:23:27', '2025-02-26 18:23:27'),
(18, 1, 18, '2025-02-26 18:23:31', '2025-02-26 18:23:31'),
(19, 1, 19, '2025-02-26 18:23:37', '2025-02-26 18:23:37'),
(20, 1, 20, '2025-02-26 18:23:43', '2025-02-26 18:23:43'),
(21, 1, 21, '2025-02-26 18:23:49', '2025-02-26 18:23:49'),
(22, 1, 22, '2025-02-26 18:23:54', '2025-02-26 18:23:54'),
(23, 1, 23, '2025-02-26 18:24:01', '2025-02-26 18:24:01'),
(24, 1, 24, '2025-02-26 18:24:07', '2025-02-26 18:24:07'),
(25, 1, 25, '2025-02-26 18:24:14', '2025-02-26 18:24:14'),
(26, 1, 26, '2025-02-26 18:24:19', '2025-02-26 18:24:19'),
(27, 1, 27, '2025-02-26 18:24:25', '2025-02-26 18:24:25'),
(28, 1, 28, '2025-02-26 18:24:30', '2025-02-26 18:24:30'),
(29, 1, 29, '2025-02-26 18:24:39', '2025-02-26 18:24:39'),
(30, 1, 30, '2025-02-26 18:24:51', '2025-02-26 18:24:51'),
(31, 1, 31, '2025-02-26 18:25:03', '2025-02-26 18:25:03'),
(32, 1, 32, '2025-02-26 18:25:10', '2025-02-26 18:25:10'),
(33, 1, 33, '2025-02-26 18:25:18', '2025-02-26 18:25:18'),
(34, 1, 34, '2025-02-26 18:25:26', '2025-02-26 18:25:26'),
(35, 1, 35, '2025-02-26 18:25:39', '2025-02-26 18:25:39'),
(36, 1, 36, '2025-02-26 18:25:51', '2025-02-26 18:25:51'),
(37, 1, 37, '2025-02-26 18:26:02', '2025-02-26 18:26:02'),
(38, 1, 38, '2025-02-26 18:26:14', '2025-02-26 18:26:14'),
(39, 1, 39, '2025-02-26 18:26:23', '2025-02-26 18:26:23'),
(40, 1, 40, '2025-02-26 18:26:29', '2025-02-26 18:26:29'),
(41, 1, 41, '2025-02-26 18:26:38', '2025-02-26 18:26:38'),
(42, 1, 42, '2025-02-26 18:26:51', '2025-02-26 18:26:51'),
(43, 1, 43, '2025-02-26 18:27:12', '2025-02-26 18:27:12'),
(44, 1, 44, '2025-02-26 18:27:23', '2025-02-26 18:27:23'),
(45, 1, 45, '2025-02-26 18:27:31', '2025-02-26 18:27:31'),
(46, 1, 46, '2025-02-26 18:27:42', '2025-02-26 18:27:42'),
(47, 1, 47, '2025-02-26 18:27:51', '2025-02-26 18:27:51'),
(48, 1, 48, '2025-02-26 18:28:00', '2025-02-26 18:28:00'),
(49, 1, 49, '2025-02-26 18:28:07', '2025-02-26 18:28:07'),
(50, 1, 50, '2025-02-26 18:28:18', '2025-02-26 18:28:18'),
(51, 1, 51, '2025-02-26 18:28:26', '2025-02-26 18:28:26'),
(52, 1, 52, '2025-02-26 18:28:33', '2025-02-26 18:28:33'),
(53, 1, 53, '2025-02-26 18:28:38', '2025-02-26 18:28:38'),
(54, 1, 54, '2025-02-26 18:28:43', '2025-02-26 18:28:43'),
(55, 1, 55, '2025-02-26 18:28:50', '2025-02-26 18:28:50'),
(56, 1, 56, '2025-02-26 18:28:57', '2025-02-26 18:28:57'),
(57, 1, 57, '2025-02-26 18:29:03', '2025-02-26 18:29:03'),
(58, 1, 58, '2025-02-26 18:29:07', '2025-02-26 18:29:07'),
(59, 1, 59, '2025-02-26 18:29:13', '2025-02-26 18:29:13'),
(108, 1, 60, '2025-05-12 19:55:41', '2025-05-12 19:55:41'),
(109, 1, 61, '2025-05-12 19:55:41', '2025-05-12 19:55:41'),
(110, 1, 62, '2025-05-12 19:55:41', '2025-05-12 19:55:41'),
(111, 1, 63, '2025-05-12 19:55:41', '2025-05-12 19:55:41'),
(112, 1, 64, '2025-05-12 19:55:41', '2025-05-12 19:55:41'),
(113, 1, 65, '2025-05-12 19:55:42', '2025-05-12 19:55:42'),
(114, 1, 66, '2025-05-12 19:55:42', '2025-05-12 19:55:42'),
(115, 1, 67, '2025-05-12 19:55:42', '2025-05-12 19:55:42'),
(116, 1, 68, '2025-05-12 19:55:42', '2025-05-12 19:55:42'),
(117, 1, 69, '2025-05-12 19:55:42', '2025-05-12 19:55:42'),
(118, 2, 71, '2025-05-12 20:42:15', '2025-05-12 20:42:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `decuongchitiets`
--

CREATE TABLE `decuongchitiets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `HocPhanID` bigint(20) UNSIGNED NOT NULL,
  `NoiDung` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `decuongchitiets`
--

INSERT INTO `decuongchitiets` (`id`, `HocPhanID`, `NoiDung`, `created_at`, `updated_at`) VALUES
(1, 14, '<p>kjsklfnkewrhsroeru</p>', '2025-04-20 22:35:51', '2025-04-20 22:35:51'),
(3, 17, '<p class=\"MsoNormal\" align=\"center\" style=\"margin-top:6.0pt;text-align:center\"><b><span lang=\"X-NONE\" style=\"mso-bidi-font-size:\r\n14.0pt;line-height:107%;mso-ansi-language:X-NONE\">LỜI</span></b><b><span lang=\"VI\" style=\"mso-bidi-font-size:\r\n14.0pt;line-height:107%;mso-ansi-language:VI\"> CẢM ƠN</span></b><b><span lang=\"X-NONE\" style=\"mso-bidi-font-size:\r\n14.0pt;line-height:107%;mso-ansi-language:X-NONE\"><o:p></o:p></span></b></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Lời\r\nđầu tiên, tôi xin chân thành gửi lời cảm ơn đến Ban Giám hiệu Trường Đại học An\r\nGiang cùng quý thầy cô trong Khoa Công nghệ Thông tin đã tạo điều kiện thuận\r\nlợi nhất để tôi hoàn thành quá trình thực tập cuối khóa này. Khoảng thời gian\r\nthực tập vừa qua là cơ hội quý giá để tôi có thể củng cố kiến thức chuyên môn,\r\nvận dụng những kỹ năng đã học vào thực tế, và phát triển bản thân một cách toàn\r\ndiện hơn.<o:p></o:p></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Tôi\r\nxin bày tỏ lòng biết ơn sâu sắc tới giảng viên hướng dẫn, TS. Lê Hoàng Anh,\r\nngười đã dành nhiều thời gian và tâm huyết hướng dẫn tôi trong suốt quá trình\r\nthực hiện đề tài. Sự tận tâm, nhiệt tình, những chỉ dẫn tận tình cùng với những\r\nlời góp ý quý báu của thầy đã giúp tôi hoàn thành tốt đề tài thực tập và hoàn\r\nthiện bài báo cáo này một cách chất lượng nhất.<o:p></o:p></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Môi\r\ntrường làm việc tại Khoa Công nghệ Thông tin đã giúp tôi tiếp xúc và làm quen\r\nvới phong cách làm việc chuyên nghiệp, tinh thần trách nhiệm và thái độ làm\r\nviệc nghiêm túc, khoa học. Những kinh nghiệm thực tế học được trong thời gian\r\nnày đã giúp tôi trưởng thành hơn, hiểu rõ hơn về cách vận dụng kiến thức vào\r\nthực tiễn, cũng như có cơ hội học hỏi từ những người có kinh nghiệm lâu năm\r\ntrong lĩnh vực công nghệ thông tin.<o:p></o:p></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Những\r\nkinh nghiệm quý giá, kiến thức bổ ích và kỹ năng mà tôi có được từ quá trình\r\nthực tập tại Khoa Công nghệ Thông tin – Trường Đại học An Giang chắc chắn sẽ là\r\nhành trang quan trọng giúp tôi tự tin hơn và vững vàng hơn trong công việc và\r\ncuộc sống sau này.<o:p></o:p></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Sinh\r\nviên thực hiện đề tài<o:p></o:p></p>\r\n\r\n<p style=\"margin-top:6.0pt;margin-right:0cm;margin-bottom:0cm;margin-left:0cm\">Ngô\r\nThanh Phong<o:p></o:p></p>', '2025-04-22 00:20:47', '2025-04-22 00:22:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gopies`
--

CREATE TABLE `gopies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `SinhVienID` bigint(20) UNSIGNED NOT NULL,
  `HocPhanID` bigint(20) UNSIGNED NOT NULL,
  `NoiDung` text NOT NULL,
  `NgayGopY` date NOT NULL DEFAULT curdate(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphans`
--

CREATE TABLE `hocphans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sothutu` int(11) DEFAULT NULL,
  `MaHocPhan` varchar(50) NOT NULL,
  `TenHocPhan` varchar(100) NOT NULL,
  `TenHocPhanTiengAnh` varchar(100) NOT NULL,
  `SoTinChi` int(11) NOT NULL,
  `SoTietLyThuyet` int(11) NOT NULL,
  `SoTietThucHanh` int(11) NOT NULL,
  `HocKy` int(11) NOT NULL,
  `DkTienQuyet` int(11) NOT NULL,
  `DkHocTruoc` int(11) NOT NULL,
  `DkSongHanh` int(11) NOT NULL,
  `KhoiKienThucID` bigint(20) UNSIGNED DEFAULT NULL,
  `LoaiHocPhanID` bigint(20) UNSIGNED DEFAULT NULL,
  `NhomTuChon` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocphans`
--

INSERT INTO `hocphans` (`id`, `sothutu`, `MaHocPhan`, `TenHocPhan`, `TenHocPhanTiengAnh`, `SoTinChi`, `SoTietLyThuyet`, `SoTietThucHanh`, `HocKy`, `DkTienQuyet`, `DkHocTruoc`, `DkSongHanh`, `KhoiKienThucID`, `LoaiHocPhanID`, `NhomTuChon`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHT15X', 'Giáo dục thể chất 1', 'Physical Education 1', 3, 3, 0, 3, 0, 0, 0, 5, 1, 0, '2025-02-05 19:19:58', '2025-04-20 22:45:52'),
(2, 2, 'PHT25X', 'Giáo dục thể chất 2', 'Physical Education 2', 3, 3, 0, 4, 0, 1, 0, 5, 1, 0, '2025-02-05 19:23:19', '2025-02-24 09:49:28'),
(3, 3, 'MIS21X', 'Giáo dục quốc phòng và an ninh', 'National Security & Defence Education', 4, 4, 0, 4, 0, 0, 0, 5, 1, 0, '2025-02-05 19:27:59', '2025-02-24 09:49:35'),
(4, 4, 'ENG110', 'Tiếng Anh 1', 'English 1', 4, 4, 0, 2, 0, 0, 0, 5, 1, 0, '2025-02-05 19:29:18', '2025-02-24 09:49:41'),
(5, 5, 'ENG111', 'Tiếng anh 2', 'English 2', 4, 4, 0, 3, 0, 4, 0, 5, 1, 0, '2025-02-05 19:30:35', '2025-02-24 09:49:49'),
(6, 6, 'ENG302', 'Tiếng Anh 3', 'English 3', 4, 4, 0, 4, 0, 5, 0, 5, 1, 0, '2025-02-05 19:34:41', '2025-02-24 09:49:55'),
(7, 7, 'PHI104', 'Triết học Mác - Lênin', 'Marxist - Leninist Philosophy', 3, 3, 0, 2, 0, 0, 0, 1, 1, 0, '2025-02-05 19:44:41', '2025-02-24 09:50:02'),
(8, 8, 'MAX309', 'Kinh tế chính trị Mác - Lênin', 'Marxist - Leninist Political Economy', 2, 2, 0, 3, 0, 7, 0, 1, 1, 0, '2025-02-05 19:45:45', '2025-02-24 09:51:00'),
(9, 9, 'MAX310', 'Chủ nghĩa xã hội khoa học', 'Science Socialism', 2, 2, 0, 4, 0, 8, 0, 1, 1, 0, '2025-02-05 19:46:55', '2025-02-24 09:52:04'),
(10, 10, 'VRP505', 'Lịch sử Đảng Cộng sản Việt Nam', 'History of Vietnamese Communist Party', 2, 2, 0, 5, 0, 9, 0, 1, 1, 0, '2025-02-05 19:47:45', '2025-02-24 09:52:11'),
(11, 11, 'HCM101', 'Tư tưởng Hồ Chí Minh', 'HoChiMinh\'s Ideology', 2, 2, 0, 6, 0, 10, 0, 1, 1, 0, '2025-02-05 19:48:45', '2025-02-24 09:52:22'),
(12, 12, 'LAW101', 'Pháp luật đại cương', 'Introduction to Law', 2, 2, 0, 2, 0, 0, 0, 1, 1, 0, '2025-02-05 19:50:08', '2025-02-24 09:52:29'),
(13, 13, 'COS104', 'Giới thiệu ngành - CNTT', 'Introduce to Information Technology', 1, 1, 0, 1, 0, 0, 0, 1, 1, 0, '2025-02-05 19:53:56', '2025-04-28 05:38:13'),
(14, 14, 'MAT104', 'Toán A1', 'Advanced Mathematics A1', 3, 3, 0, 1, 0, 0, 0, 1, 1, 0, '2025-02-05 19:54:46', '2025-02-24 09:53:32'),
(15, 15, 'MAT105', 'Toán A2', 'Advanced Mathematics A2', 3, 3, 0, 2, 0, 14, 0, 1, 1, 0, '2025-02-05 19:55:32', '2025-02-24 09:53:39'),
(16, 16, 'MAT106', 'Toán A3', 'Advanced Mathematics A3', 3, 3, 0, 3, 0, 15, 0, 1, 1, 0, '2025-02-05 19:57:19', '2025-02-24 09:53:50'),
(17, 17, 'PRS302', 'Xác suất thống kê A - CNTT', 'Probability and Statistics', 3, 2, 1, 4, 0, 0, 0, 1, 1, 0, '2025-02-05 19:59:42', '2025-02-24 09:53:57'),
(18, 18, 'PHY118', 'Vật lý cho tin học', 'Physics For Information Technology', 4, 3, 1, 1, 0, 0, 0, 1, 1, 0, '2025-02-05 20:02:19', '2025-02-24 09:54:05'),
(19, 19, 'MAT113', 'Toán rời rạc', 'Discreted Mathematics', 3, 0, 0, 1, 0, 0, 0, 2, 1, 0, '2025-02-05 20:12:03', '2025-02-24 09:54:39'),
(20, 20, 'COS106', 'Lập trình căn bản', 'Introduction to programming', 3, 1, 2, 1, 0, 0, 0, 2, 1, 0, '2025-02-05 20:14:06', '2025-02-24 09:54:48'),
(21, 21, 'COS108', 'Ngôn ngữ lập trình Java', 'Java Programming Language', 3, 1, 2, 2, 0, 0, 0, 2, 1, 0, '2025-02-05 20:16:01', '2025-02-24 09:54:56'),
(22, 22, 'COS303', 'Phương pháp tính - CNTT', 'Numerical analysis', 2, 0, 0, 2, 0, 0, 0, 2, 2, 0, '2025-02-05 20:17:55', '2025-02-24 09:55:17'),
(23, 23, 'COS107', 'Nền tảng Công nghệ thông tin', 'Fundamentials of Information Technology', 2, 1, 1, 2, 0, 0, 0, 2, 2, 0, '2025-02-05 20:21:13', '2025-02-24 09:55:29'),
(24, 24, 'COS304', 'Cấu trúc dữ liệu', 'Data structure', 3, 2, 1, 2, 0, 20, 0, 2, 1, 0, '2025-02-05 20:22:18', '2025-02-24 09:55:39'),
(25, 25, 'COS330', 'Kiến trúc máy tính và hợp ngữ', 'Computer Architecture and Assembly', 3, 2, 1, 2, 0, 0, 0, 2, 1, 0, '2025-02-05 20:23:40', '2025-02-24 09:56:02'),
(26, 26, 'CON301', 'Mạng máy tính', 'Computer network', 2, 2, 0, 1, 0, 0, 0, 2, 1, 0, '2025-02-05 20:24:44', '2025-02-24 09:56:10'),
(27, 27, 'SEE301', 'Nhập môn công nghệ phần mềm', 'Introduction to Software Engineering', 2, 1, 1, 4, 0, 0, 0, 2, 1, 0, '2025-02-05 20:25:47', '2025-02-24 09:56:18'),
(28, 28, 'COS309', 'Phân tích và thiết kế giải thuật', 'Algorithms Analysis and Design', 3, 3, 0, 3, 0, 0, 0, 2, 1, 0, '2025-02-05 20:26:40', '2025-02-24 09:56:37'),
(29, 29, 'COS310', 'Nguyên lý hệ điều hành', 'Principles of operating systems', 3, 2, 1, 3, 0, 25, 0, 2, 1, 0, '2025-02-05 20:27:26', '2025-02-24 09:56:45'),
(30, 30, 'COS311', 'Cơ sở dữ liệu', 'Introduction to Database', 3, 2, 1, 3, 0, 0, 0, 2, 1, 0, '2025-02-05 20:28:31', '2025-02-24 09:57:20'),
(31, 31, 'COS313', 'Phương pháp lập trình hướng đối tượng', 'Object-Oriented Programming', 3, 2, 1, 3, 0, 20, 0, 2, 1, 0, '2025-02-05 20:29:42', '2025-02-24 09:57:28'),
(32, 32, 'COS503', 'Lý thuyết đồ thị', 'Graph theory', 3, 3, 0, 4, 0, 24, 0, 2, 1, 0, '2025-02-05 20:31:09', '2025-02-24 09:57:36'),
(33, 33, 'COS335', 'Văn bản và lưu trữ', 'Document and storage', 2, 1, 1, 4, 0, 0, 0, 2, 2, 1, '2025-02-05 20:32:36', '2025-03-11 00:22:30'),
(34, 34, 'COS336', 'Khởi nghiệp kinh doanh - CNTT', 'Entrepreneurship', 2, 2, 0, 4, 0, 0, 0, 2, 2, 1, '2025-02-05 20:33:31', '2025-03-11 00:22:43'),
(35, 35, 'COS337', 'Nông nghiệp số', 'Introduction to Digital Agri-tech', 2, 2, 0, 4, 0, 0, 0, 2, 2, 0, '2025-02-05 20:34:29', '2025-02-24 09:58:09'),
(36, 36, 'COS326', 'Kỹ năng giao tiếp ngành nghề', 'Communication Skills - IT', 2, 2, 0, 4, 0, 0, 0, 2, 2, 0, '2025-02-05 20:35:02', '2025-02-24 09:58:18'),
(37, 37, 'MOR514', 'Phương pháp nghiên cứu khoa học - CNTT', 'Research Methodology in IT', 3, 2, 1, 6, 0, 0, 0, 3, 1, 0, '2025-02-06 18:20:24', '2025-02-24 09:58:26'),
(38, 38, 'TIE501', 'Lập trình .Net', '.Net Programning', 4, 2, 2, 5, 0, 0, 0, 3, 1, 2025, '0000-00-00 00:00:00', '2025-02-24 09:58:38'),
(39, 39, 'COS521', 'Trí tuệ nhân tạo', 'Artificial Intelligence/Introduction to Artificial Intelligence', 3, 2, 1, 7, 0, 0, 0, 3, 1, 0, '2025-02-06 18:22:52', '2025-02-24 09:59:45'),
(40, 40, 'IMS301', 'Nguyên lý hệ quản trị CSDL', 'Principles of Database Management System', 3, 2, 1, 7, 0, 0, 0, 3, 1, 0, '2025-02-06 18:24:31', '2025-02-24 09:59:57'),
(41, 41, 'IMS302', 'Phân tích thiết kế hệ thống thông tin', 'Information Systems Analysis and Design', 3, 2, 1, 5, 0, 30, 0, 3, 1, 0, '2025-02-06 18:25:30', '2025-02-24 10:00:06'),
(42, 42, 'IMS912', 'Chuyên đề Java', 'Java Programming', 3, 1, 2, 5, 0, 21, 0, 3, 2, 0, '0000-00-00 00:00:00', '2025-03-11 00:30:18'),
(43, 43, 'COS508', 'Xử lý ảnh', 'Image Processing', 3, 2, 1, 5, 0, 0, 0, 3, 2, 0, '2025-02-06 18:27:14', '2025-02-24 10:00:30'),
(44, 44, 'COS525', 'Chuyên đề Python', 'Python programing', 3, 2, 1, 5, 0, 0, 0, 3, 2, 0, '2025-02-06 18:29:36', '2025-02-24 10:00:42'),
(45, 45, 'IMS501', 'Lập trình quản lý', 'Information Management System Programming', 3, 1, 2, 6, 0, 41, 0, 3, 1, 0, '2025-02-06 18:30:22', '2025-02-24 10:00:52'),
(46, 46, 'SEE527', 'Phát triển ứng dụng web', 'Web application development', 4, 2, 2, 5, 0, 0, 0, 3, 1, 0, '2025-02-06 18:31:01', '2025-02-24 10:01:04'),
(47, 47, 'SEE505', 'Phân tích và thiết kế phần mềm hướng đối tượng', 'Object Oriented Analysis and Design', 3, 2, 1, 6, 0, 0, 0, 3, 1, 0, '2025-02-06 18:31:38', '2025-02-24 10:01:26'),
(48, 48, 'COS526', 'Quản lý dự án công nghệ thông tin', 'IT project management', 3, 2, 1, 7, 0, 27, 0, 3, 1, 0, '2025-02-06 18:32:28', '2025-02-24 10:01:44'),
(49, 49, 'CON503', 'Quản trị mạng', 'Network administration', 3, 2, 1, 4, 0, 26, 0, 3, 1, 0, '2025-02-06 18:33:14', '2025-02-24 10:01:57'),
(50, 50, 'SEE528', 'Công nghệ web và ứng dụng', 'Web Technologies and Applications', 3, 1, 2, 7, 0, 46, 0, 3, 2, 1, '2025-02-06 18:34:08', '2025-03-11 00:09:59'),
(51, 51, 'COS527', 'Công nghệ Blockchain', 'Blockchain technology', 3, 2, 1, 7, 0, 49, 0, 3, 2, 1, '2025-02-06 18:34:51', '2025-03-11 00:11:09'),
(52, 52, 'CON511', 'An toàn hệ thống và an ninh mạng', 'System and network security', 3, 2, 1, 7, 0, 49, 0, 3, 2, 0, '2025-02-06 18:36:06', '2025-02-24 10:02:34'),
(53, 53, 'COS528', 'Trực quan hóa dữ liệu', 'Data Visualization', 3, 2, 1, 7, 0, 0, 0, 3, 2, 0, '2025-02-06 18:36:52', '2025-02-24 10:02:45'),
(54, 54, 'CON915', 'Thiết kế và cài đặt mạng', 'Network Design and Implementation', 2, 1, 1, 6, 0, 26, 0, 3, 1, 0, '2025-02-06 18:37:34', '2025-02-24 10:03:01'),
(55, 55, 'CON502', 'Lập trình cho các thiết bị di động', 'Mobile Device Programming', 3, 2, 1, 6, 0, 0, 0, 3, 2, 0, '2025-02-06 18:39:50', '2025-02-24 10:03:25'),
(56, 56, 'CON515', 'Lập trình điều khiển thiết bị thông minh', 'Smart Device Programming', 3, 2, 1, 6, 0, 0, 0, 3, 2, 0, '2025-02-06 18:41:06', '2025-02-24 10:03:40'),
(57, 57, 'COS529', 'Thị giác máy tính', 'Computer vision', 3, 2, 1, 6, 0, 43, 0, 3, 2, 0, '2025-02-06 18:41:44', '2025-02-24 10:03:51'),
(58, 58, 'TIE903', 'Thực tập cuối khóa - CNTT', 'Internship', 5, 0, 0, 8, 0, 0, 0, 4, 1, 0, '2025-02-06 18:48:54', '2025-02-24 10:04:06'),
(59, 59, 'TIE913', 'Khóa luận tốt nghiệp - CNTT', 'Graduation Thesis', 10, 0, 0, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 18:51:49', '2025-02-24 10:04:17'),
(60, 60, 'CON914', 'Lập trình truyền thông', 'Network Communication Programming', 2, 1, 1, 8, 0, 26, 0, 4, 2, 0, '2025-02-06 18:54:54', '2025-02-24 10:04:27'),
(61, 61, 'SEE504', 'Phát triển phần mềm mã nguồn mở', 'Open source software development', 2, 1, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 18:57:08', '2025-02-24 10:04:40'),
(62, 62, 'COS913', 'Thương mại điện tử - CNTT', 'Ecommerce', 2, 1, 1, 8, 0, 46, 0, 4, 2, 0, '2025-02-06 18:58:59', '2025-02-24 10:04:52'),
(63, 63, 'COS914', 'Tin học môi trường - GIS', 'GIS', 2, 1, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 19:00:16', '2025-02-24 10:05:03'),
(64, 64, 'CON924', 'Công nghệ Internet of things hiện đại', 'Advanced Internet of Things Technologie', 3, 2, 1, 8, 0, 26, 0, 4, 2, 0, '2025-02-06 19:02:15', '2025-02-24 10:05:13'),
(65, 65, 'COS915', 'Trí tuệ nhân tạo nâng cao', 'Advanced AI', 3, 2, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 19:03:57', '2025-02-24 10:05:38'),
(66, 66, 'COS916', 'Khai thác dữ liệu lớn', 'Data mining with Big Data', 3, 2, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 19:04:46', '2025-02-24 10:05:49'),
(67, 67, 'SEE910', 'Điện toán đám mây', 'Cloud Computing', 3, 2, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 19:05:51', '2025-02-24 10:06:00'),
(68, 68, 'COS917', 'Khai phá dữ liệu', 'Data mining', 3, 2, 1, 8, 0, 39, 0, 4, 2, 0, '2025-02-06 19:07:28', '2025-02-24 10:06:10'),
(69, 69, 'SEE917', 'Phát triển ứng dụng hướng dịch vụ', 'Service-Oriented Application Development', 3, 2, 1, 8, 0, 0, 0, 4, 2, 0, '2025-02-06 19:15:43', '2025-02-24 10:06:21'),
(71, 1, 'PHT15X', 'Giáo dục thể chất 1', 'Physical Education 1', 2, 2, 0, 1, 0, 0, 0, 5, 1, 0, '2025-04-20 22:32:48', '2025-05-12 20:42:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahocs`
--

CREATE TABLE `khoahocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaKhoaHoc` varchar(50) NOT NULL,
  `TenKhoaHoc` varchar(100) NOT NULL,
  `CTDT_ID` bigint(20) UNSIGNED DEFAULT NULL,
  `NamBatDau` varchar(20) NOT NULL,
  `NamKetThuc` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahocs`
--

INSERT INTO `khoahocs` (`id`, `MaKhoaHoc`, `TenKhoaHoc`, `CTDT_ID`, `NamBatDau`, `NamKetThuc`, `created_at`, `updated_at`) VALUES
(1, '2024-2028', 'DH25', 1, '2024', '2028', '2025-04-10 06:41:16', '2025-04-10 06:41:16'),
(2, '2025-2029', 'DH26', 1, '2025', '2029', '2025-04-10 06:41:29', '2025-04-10 06:41:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoas`
--

CREATE TABLE `khoas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaKhoa` varchar(50) NOT NULL,
  `TenKhoa` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoas`
--

INSERT INTO `khoas` (`id`, `MaKhoa`, `TenKhoa`, `created_at`, `updated_at`) VALUES
(1, 'CN17', 'Công nghệ thông tin', '2025-03-18 06:46:15', '2025-03-18 06:46:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoikienthucs`
--

CREATE TABLE `khoikienthucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaKhoiKienThuc` varchar(50) NOT NULL,
  `TenKhoi` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoikienthucs`
--

INSERT INTO `khoikienthucs` (`id`, `MaKhoiKienThuc`, `TenKhoi`, `created_at`, `updated_at`) VALUES
(1, 'KCT1001', 'Kiến thức đại cương', '2025-02-26 18:41:33', '2025-02-26 18:41:33'),
(2, 'KCT1002', 'Kiến thức cơ sở ngành', '2025-02-26 18:41:38', '2025-02-26 18:41:38'),
(3, 'KCT1003', 'Kiến thức chuyên ngành', '2025-02-26 18:41:43', '2025-02-26 18:41:43'),
(4, 'KCT1004', 'Thực tập, khóa luận tốt nghiệp, học phần thay thế', '2025-02-26 18:41:48', '2025-02-26 18:41:48'),
(5, 'KCT1005', 'Kiến thức điều kiện', '2025-02-26 18:41:53', '2025-02-26 18:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaihocphans`
--

CREATE TABLE `loaihocphans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TenLoaiHocPhan` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaihocphans`
--

INSERT INTO `loaihocphans` (`id`, `TenLoaiHocPhan`, `created_at`, `updated_at`) VALUES
(1, 'Bắt buộc', '2025-03-18 06:47:17', '2025-03-18 06:47:17'),
(2, 'Tự chọn', '2025-03-18 06:47:21', '2025-03-18 06:47:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_01_13_074431_create_khoas_table', 1),
(7, '2025_01_13_074453_create_bomons_table', 1),
(8, '2025_01_13_074602_create_nganhhocs_table', 1),
(9, '2025_01_13_075029_create_khoikienthucs_table', 1),
(10, '2025_01_13_075041_create_loaihocphans_table', 1),
(11, '2025_01_13_075051_create_hocphans_table', 1),
(12, '2025_01_13_075104_create_chuongtrinhdaotaos_table', 1),
(13, '2025_01_13_075105_create_khoahocs_table', 1),
(14, '2025_01_13_075114_create_decuongchitiets_table', 1),
(15, '2025_01_13_075130_create_gopies_table', 1),
(16, '2025_01_13_075136_create_thongkes_table', 1),
(17, '2025_02_08_133043_create_ctdthocphans_table', 1),
(18, '2025_03_03_065831_create_phancongmonhocs_table', 1),
(19, '2025_03_18_133804_create_chuandauras_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhocs`
--

CREATE TABLE `nganhhocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `MaNganh` varchar(50) NOT NULL,
  `TenNganh` varchar(100) NOT NULL,
  `BoMonID` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhhocs`
--

INSERT INTO `nganhhocs` (`id`, `MaNganh`, `TenNganh`, `BoMonID`, `created_at`, `updated_at`) VALUES
(1, 'CNTT', 'Công nghệ thông tin', 1, '2025-03-18 06:46:35', '2025-03-18 06:46:35'),
(2, 'KTPM', 'Kỹ thuật phần mềm', 2, '2025-03-18 06:46:40', '2025-03-18 06:46:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancongmonhocs`
--

CREATE TABLE `phancongmonhocs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `biensoan_id` bigint(20) UNSIGNED NOT NULL,
  `giangvien_id` bigint(20) UNSIGNED NOT NULL,
  `HocPhanID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phancongmonhocs`
--

INSERT INTO `phancongmonhocs` (`id`, `biensoan_id`, `giangvien_id`, `HocPhanID`, `created_at`, `updated_at`) VALUES
(3, 3, 5, 20, '2025-04-20 22:47:10', '2025-04-20 22:47:10'),
(5, 3, 8, 17, '2025-04-22 00:18:25', '2025-04-22 00:18:25'),
(6, 3, 5, 13, '2025-05-12 19:35:25', '2025-05-12 19:35:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongkes`
--

CREATE TABLE `thongkes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LoaiThongKe` varchar(100) NOT NULL,
  `NoiDung` text NOT NULL,
  `NgayTao` date NOT NULL DEFAULT curdate(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vaitro` varchar(255) NOT NULL DEFAULT 'sinhvien',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `vaitro`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'win65905@gmail.com', 'admin', NULL, '$2y$12$B9ba/BByht3bFoWFjtdorOU8XvVdHM5a/7nXAQCXkZU79P50mJ2RC', NULL, '2025-02-08 00:14:24', '2025-02-08 00:14:24'),
(2, 'phong', 'phong_dth216080@student.agu.edu.vn', 'sinhvien', NULL, '$2y$12$SHHfpyr.8dDFKiu2SEtFpOQ6blEPorz8LD45JBQcG9jfKydnadrma', NULL, '2025-02-23 17:22:24', '2025-03-20 00:23:46'),
(3, 'Biên soạn', 'biensoan123@gmail.com', 'biensoan', NULL, '$2y$12$8AINccpX9sCMiCDW3kGPM.ja7kekjAcRFL.AEawaif4u/5fff/iX2', NULL, '2025-02-23 18:19:24', '2025-02-23 18:19:24'),
(4, 'Trưởng khoa-Đoàn Thanh Nghị', 'dtnghi@agu.edu.vn', 'chunhiem', NULL, '$2y$12$YWdeKpbiMeCGvaMKPyJkweA732Y6b/kRQ.abKPQaBzz9PPZ1rCq9C', NULL, '2025-02-23 18:19:54', '2025-04-21 05:49:58'),
(5, 'Lê Hoàng Anh', 'lhanh@agu.edu.com', 'giangvien', NULL, '$2y$12$RZ71lNlU4CvwsjMSZj3heO8f4GZVpt3M8oTfXnI3SaUMr4ATuqx0i', NULL, '2025-02-23 18:20:20', '2025-04-16 23:24:20'),
(7, 'Phó trưởng khoa-Nguyễn Văn Hòa', 'nvhoa@agu.edu.vn', 'chunhiem', NULL, '$2y$12$WGpOmWK5DOJdJMJ6Kj2fN.3gvvwU9jIh7omdSm3DjkMPsOIrqynE2', NULL, '2025-04-21 05:50:47', '2025-04-21 05:50:47'),
(8, 'Thầy Tùng', 'tung@gmail.com', 'giangvien', NULL, '$2y$12$ZFexHuDYmiAuoyEPYeQk3eXN.6Y4QVRhBtnxaSq1q7WblOaTjtO0u', NULL, '2025-04-22 00:18:00', '2025-04-22 00:18:00'),
(13, 'Nguyễn Thái Dư', 'ntdu@agu.edu.vn', 'giangvien', NULL, '$2y$12$XlzuJVGcBvQdzdCqfcco4OOzIn2dH/L6aew.8Qqn6FQDmv8XUG2Ua', NULL, '2025-05-03 07:16:37', '2025-05-03 07:16:37'),
(14, 'Trương Thị Diễm', 'ttdiem@agu.edu.vn', 'giangvien', NULL, '$2y$12$/vpGLdoAdrgNvsg0bIkRj.EWWzl8fqbbJr1dGv45LzAQWCVnveM/6', NULL, '2025-05-03 07:16:37', '2025-05-03 07:16:37'),
(15, 'Nguyễn Quang Huy', ' nqhuy@agu.edu.vn', 'giangvien', NULL, '$2y$12$snw42vuTX.goZLxOq5QlHOyDEfC99RdGgxUs5N3mPsPUB4eA11gBG', NULL, '2025-05-03 07:16:37', '2025-05-03 07:16:37'),
(16, 'Lê Thị Minh Nguyệt', 'ltmnguyet@agu.edu.vn', 'giangvien', NULL, '$2y$12$p5gOD5PH5kvTL8sXXYYBnO6snlQiUR4snje.zXo4mxvacdCHqRIG.', NULL, '2025-05-03 07:16:38', '2025-05-03 07:16:38'),
(17, 'Nguyễn Thị Lan Quyên', 'ntlquyen@agu.edu.vn', 'giangvien', NULL, '$2y$12$M44ZWHkOvZuhntXDZnpCUe8GiwBI0ZLsopmTX7zhR6POwNZ23JipG', NULL, '2025-05-03 07:16:38', '2025-05-03 07:16:38'),
(18, 'Nguyễn Văn Đông', ' nvdong@agu.edu.vn', 'giangvien', NULL, '$2y$12$YSb.gVqWrmRRFc.t1mbA4..OAEO58p.bcOadj8MOeY2gvtx9TOhL6', NULL, '2025-05-03 07:16:38', '2025-05-03 07:16:38'),
(19, 'Lê Công Đoàn', ' lcdoan@agu.edu.vn', 'giangvien', NULL, '$2y$12$StkbTHzHbmkdVXJrFyMSAukJ4ibQjl1E5lWC90hiVquxlvUOOsWeS', NULL, '2025-05-03 07:16:39', '2025-05-03 07:16:39'),
(20, 'Huỳnh Cao Thế Cường', 'hctcuong@agu.edu.vn', 'giangvien', NULL, '$2y$12$QX6yLhJUumAX7kfUO.dmn.v7/yWJvHnu3WV27Aug.o/xIL5iOlEFu', NULL, '2025-05-03 07:16:39', '2025-05-03 07:16:39'),
(21, 'Phan Thanh Bình', 'ptbinh@agu.edu.vn', 'giangvien', NULL, '$2y$12$aG.6b63v.7aKatiVPgKjQee8bwL/3ytng.qqCs9Zn0aZMLkulP70m', NULL, '2025-05-03 07:16:39', '2025-05-03 07:16:39'),
(22, 'Châu Ngân Khánh', 'cnkhanh@agu.edu.vn', 'giangvien', NULL, '$2y$12$Hy/eqhMc565mr5KuK63p4.dLnyszt0sMD/xMuX3ANJ4hG.NsNUFla', NULL, '2025-05-03 07:16:40', '2025-05-03 07:16:40'),
(23, 'Huỳnh Phước Hải', 'hphai@agu.edu.vn', 'giangvien', NULL, '$2y$12$zlAW56PVVb4FhMCtUygD1OOWB3BaTj0vg6jm6dibfAqeeqnB3TagO', NULL, '2025-05-03 07:16:40', '2025-05-03 07:16:40'),
(24, 'Phạm Hữu Dũng', 'phdung@agu.edu.vn', 'giangvien', NULL, '$2y$12$giu1XAhxxxnCrj8jhDcMyOUbN8IlfnHWr7DiidTd/wuv4I6bESfxS', NULL, '2025-05-03 07:16:41', '2025-05-03 07:16:41'),
(25, 'Nguyễn Thị Mỹ Truyền', 'ntmtruyen@agu.edu.vn', 'giangvien', NULL, '$2y$12$.OE6SvHzZM2GB/TLjW6Rsu1HL/tTHI0tU8S66OEmyOwGC.5f1ivvC', NULL, '2025-05-03 07:16:41', '2025-05-03 07:16:41'),
(26, 'Lê Trung Thư', ' ltthu@agu.edu.vn', 'giangvien', NULL, '$2y$12$DUTEDkmyELb28V4jnACCKOWEBd9kaFS7XPZaYvuW.gv8UcnLJ.0zm', NULL, '2025-05-03 07:16:41', '2025-05-03 07:16:41'),
(27, 'Lê Văn Toán', ' lvtoan@agu.edu.vn', 'giangvien', NULL, '$2y$12$I/4Qp70ZPIpb6NeIwXIDkurFMYC5Ne5m0XKLHKrkERuM6RYiorp46', NULL, '2025-05-03 07:16:42', '2025-05-03 07:16:42'),
(28, 'Nguyễn Minh Vi', 'nmvi@agu.edu.vn', 'giangvien', NULL, '$2y$12$RWE4sr5OrdI9WPWcvnEwIOEGgxtZygrP.6iytFH00OAWyxr1Rfl0G', NULL, '2025-05-03 07:16:42', '2025-05-03 07:16:42'),
(29, 'Nguyễn Ngọc Minh', 'nnminh@agu.edu.vn', 'giangvien', NULL, '$2y$12$iOgU.aQy6KnHDh.1zdEGj.THVv.nrszqEwqt.D32L5DK2jMZZbYXa', NULL, '2025-05-03 07:16:43', '2025-05-03 07:16:43'),
(30, 'Trần Thị Tuyết Vân', 'tttvan@agu.edu.vn', 'giangvien', NULL, '$2y$12$IcQ1eBhPrKWJj5ac/4Q8K.VSeA3vfUBuVXcZlLW3KAR.GGs9lrsnm', NULL, '2025-05-03 07:16:43', '2025-05-03 07:21:48'),
(31, 'Thiều Thanh Quang Phú', 'ttqphu@agu.edu.vn', 'giangvien', NULL, '$2y$12$D0KZqC8lbqIN3mwjt8kPaOHnmPkmNTRsprItRqnbSmQtPJ7b3mC2a', NULL, '2025-05-03 07:16:43', '2025-05-03 07:16:43'),
(32, 'Huỳnh Lý Thanh Nhàn', ' hltnhan@agu.edu.vn', 'giangvien', NULL, '$2y$12$BIes4w3lKW8B9tE2UTI5i.4JssKjn4L8tCdZVLREKMIDCC9gdQScC', NULL, '2025-05-03 07:16:44', '2025-05-03 07:16:44'),
(33, 'Nguyễn Hoàng Tùng', 'nhoangtung@agu.edu.vn', 'giangvien', NULL, '$2y$12$g0V9vRTfNSkS4aDIjmegIuJfR4SaD4ennpImKQJ4TLZno2LsToc9O', NULL, '2025-05-03 07:16:44', '2025-05-03 07:16:44'),
(34, 'Nguyễn Hoài Nam', 'nhnam@agu.edu.vn', 'giangvien', NULL, '$2y$12$31oqy3s.sGwhV1FivXMFnOJr.T61UM/XU/pNuYKBBoGR9l3wzTi2y', NULL, '2025-05-03 07:16:44', '2025-05-03 07:16:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bomons`
--
ALTER TABLE `bomons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bomons_mabomon_unique` (`MaBoMon`),
  ADD KEY `bomons_khoaid_foreign` (`KhoaID`);

--
-- Chỉ mục cho bảng `chuandauras`
--
ALTER TABLE `chuandauras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chuandauras_hocphan_id_foreign` (`hocphan_id`);

--
-- Chỉ mục cho bảng `chuongtrinhdaotaos`
--
ALTER TABLE `chuongtrinhdaotaos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chuongtrinhdaotaos_nganhhocid_foreign` (`NganhHocID`);

--
-- Chỉ mục cho bảng `ctdthocphans`
--
ALTER TABLE `ctdthocphans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ctdthocphans_ctdt_id_foreign` (`CTDT_ID`),
  ADD KEY `ctdthocphans_hocphanid_foreign` (`HocPhanID`);

--
-- Chỉ mục cho bảng `decuongchitiets`
--
ALTER TABLE `decuongchitiets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `decuongchitiets_hocphanid_foreign` (`HocPhanID`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gopies`
--
ALTER TABLE `gopies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gopies_sinhvienid_foreign` (`SinhVienID`),
  ADD KEY `gopies_hocphanid_foreign` (`HocPhanID`);

--
-- Chỉ mục cho bảng `hocphans`
--
ALTER TABLE `hocphans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocphans_khoikienthucid_foreign` (`KhoiKienThucID`),
  ADD KEY `hocphans_loaihocphanid_foreign` (`LoaiHocPhanID`);

--
-- Chỉ mục cho bảng `khoahocs`
--
ALTER TABLE `khoahocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoahocs_makhoahoc_unique` (`MaKhoaHoc`),
  ADD KEY `khoahocs_ctdt_id_foreign` (`CTDT_ID`);

--
-- Chỉ mục cho bảng `khoas`
--
ALTER TABLE `khoas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoas_makhoa_unique` (`MaKhoa`);

--
-- Chỉ mục cho bảng `khoikienthucs`
--
ALTER TABLE `khoikienthucs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khoikienthucs_makhoikienthuc_unique` (`MaKhoiKienThuc`);

--
-- Chỉ mục cho bảng `loaihocphans`
--
ALTER TABLE `loaihocphans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nganhhocs`
--
ALTER TABLE `nganhhocs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nganhhocs_manganh_unique` (`MaNganh`),
  ADD KEY `nganhhocs_bomonid_foreign` (`BoMonID`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phancongmonhocs`
--
ALTER TABLE `phancongmonhocs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phancongmonhocs_biensoan_id_foreign` (`biensoan_id`),
  ADD KEY `phancongmonhocs_giangvien_id_foreign` (`giangvien_id`),
  ADD KEY `phancongmonhocs_hocphanid_foreign` (`HocPhanID`);

--
-- Chỉ mục cho bảng `thongkes`
--
ALTER TABLE `thongkes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bomons`
--
ALTER TABLE `bomons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chuandauras`
--
ALTER TABLE `chuandauras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `chuongtrinhdaotaos`
--
ALTER TABLE `chuongtrinhdaotaos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `ctdthocphans`
--
ALTER TABLE `ctdthocphans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT cho bảng `decuongchitiets`
--
ALTER TABLE `decuongchitiets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gopies`
--
ALTER TABLE `gopies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocphans`
--
ALTER TABLE `hocphans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `khoahocs`
--
ALTER TABLE `khoahocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoas`
--
ALTER TABLE `khoas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoikienthucs`
--
ALTER TABLE `khoikienthucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loaihocphans`
--
ALTER TABLE `loaihocphans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nganhhocs`
--
ALTER TABLE `nganhhocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phancongmonhocs`
--
ALTER TABLE `phancongmonhocs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thongkes`
--
ALTER TABLE `thongkes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bomons`
--
ALTER TABLE `bomons`
  ADD CONSTRAINT `bomons_khoaid_foreign` FOREIGN KEY (`KhoaID`) REFERENCES `khoas` (`id`);

--
-- Các ràng buộc cho bảng `chuandauras`
--
ALTER TABLE `chuandauras`
  ADD CONSTRAINT `chuandauras_hocphan_id_foreign` FOREIGN KEY (`hocphan_id`) REFERENCES `hocphans` (`id`);

--
-- Các ràng buộc cho bảng `chuongtrinhdaotaos`
--
ALTER TABLE `chuongtrinhdaotaos`
  ADD CONSTRAINT `chuongtrinhdaotaos_nganhhocid_foreign` FOREIGN KEY (`NganhHocID`) REFERENCES `nganhhocs` (`id`);

--
-- Các ràng buộc cho bảng `ctdthocphans`
--
ALTER TABLE `ctdthocphans`
  ADD CONSTRAINT `ctdthocphans_ctdt_id_foreign` FOREIGN KEY (`CTDT_ID`) REFERENCES `chuongtrinhdaotaos` (`id`),
  ADD CONSTRAINT `ctdthocphans_hocphanid_foreign` FOREIGN KEY (`HocPhanID`) REFERENCES `hocphans` (`id`);

--
-- Các ràng buộc cho bảng `decuongchitiets`
--
ALTER TABLE `decuongchitiets`
  ADD CONSTRAINT `decuongchitiets_hocphanid_foreign` FOREIGN KEY (`HocPhanID`) REFERENCES `hocphans` (`id`);

--
-- Các ràng buộc cho bảng `gopies`
--
ALTER TABLE `gopies`
  ADD CONSTRAINT `gopies_hocphanid_foreign` FOREIGN KEY (`HocPhanID`) REFERENCES `hocphans` (`id`),
  ADD CONSTRAINT `gopies_sinhvienid_foreign` FOREIGN KEY (`SinhVienID`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `hocphans`
--
ALTER TABLE `hocphans`
  ADD CONSTRAINT `hocphans_khoikienthucid_foreign` FOREIGN KEY (`KhoiKienThucID`) REFERENCES `khoikienthucs` (`id`),
  ADD CONSTRAINT `hocphans_loaihocphanid_foreign` FOREIGN KEY (`LoaiHocPhanID`) REFERENCES `loaihocphans` (`id`);

--
-- Các ràng buộc cho bảng `khoahocs`
--
ALTER TABLE `khoahocs`
  ADD CONSTRAINT `khoahocs_ctdt_id_foreign` FOREIGN KEY (`CTDT_ID`) REFERENCES `chuongtrinhdaotaos` (`id`);

--
-- Các ràng buộc cho bảng `nganhhocs`
--
ALTER TABLE `nganhhocs`
  ADD CONSTRAINT `nganhhocs_bomonid_foreign` FOREIGN KEY (`BoMonID`) REFERENCES `bomons` (`id`);

--
-- Các ràng buộc cho bảng `phancongmonhocs`
--
ALTER TABLE `phancongmonhocs`
  ADD CONSTRAINT `phancongmonhocs_biensoan_id_foreign` FOREIGN KEY (`biensoan_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `phancongmonhocs_giangvien_id_foreign` FOREIGN KEY (`giangvien_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `phancongmonhocs_hocphanid_foreign` FOREIGN KEY (`HocPhanID`) REFERENCES `hocphans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
