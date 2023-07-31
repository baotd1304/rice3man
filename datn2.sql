-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th7 30, 2023 lúc 04:58 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `datn2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `Ten` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`Ten`, `id`, `password`, `email`, `created_at`) VALUES
('hùng ', 1, '12345678', 'hung@gmail.com', '2023-07-15 08:59:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `idBV` int(11) NOT NULL,
  `thumbNail` varchar(255) NOT NULL,
  `noiDung` text NOT NULL,
  `tacGia` varchar(50) DEFAULT NULL,
  `ngay` datetime NOT NULL DEFAULT current_timestamp(),
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi,\r\n0 an',
  `noiBat` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 noi bat,\r\n0 k noi bat',
  `tieuDe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`idBV`, `thumbNail`, `noiDung`, `tacGia`, `ngay`, `anHien`, `noiBat`, `tieuDe`) VALUES
(1, 'https://bizweb.dktcdn.net/100/485/131/articles/1.png?v=1683207760607', 'Bạn bắt đầu tập gym giảm cân và cần một chế độ ăn thật hợp lý? Xem qua lưu ý và cách thực hiện chế độ ăn hợp lý trong quá trình tập trong bài viết dưới đây.\r\nMột cơ thể thon gọn, khỏe, đẹp là điều mà bất kỳ ai cũng mong muốn sở hữu. Tập gym giảm cân là cách được rất nhiều người lựa chọn. Và một trong những điều kiện tiên quyết khi tập luyện chính là duy trì chế độ ăn thật hợp lý. Cùng tìm hiểu trong bài viết này nhé!', 'kim', '2023-07-09 23:28:48', 1, 1, 'Gợi ý 9 món ngon trong dịp cuối tuần'),
(2, 'https://bizweb.dktcdn.net/100/485/131/articles/1.png?v=1683207760607', 'Bạn bắt đầu tập gym giảm cân và cần một chế độ ăn thật hợp lý? Xem qua lưu ý và cách thực hiện chế độ ăn hợp lý trong quá trình tập trong bài viết dưới đây.\r\nMột cơ thể thon gọn, khỏe, đẹp là điều mà bất kỳ ai cũng mong muốn sở hữu. Tập gym giảm cân là cách được rất nhiều người lựa chọn. Và một trong những điều kiện tiên quyết khi tập luyện chính là duy trì chế độ ăn thật hợp lý. Cùng tìm hiểu trong bài viết này nhé!', 'kim', '2023-07-09 23:28:54', 1, 1, 'Gợi ý 9 món ngon trong dịp cuối tuần'),
(3, '/upload/images/baiviet\\2023-07-29_1690602197_logoRice3Man.jpg', '<p>3</p>', 'adadd', '2023-07-29 10:43:17', 0, 0, 'dadadad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idBL` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `idND` int(11) NOT NULL,
  `noiDung` text NOT NULL,
  `ngayBL` datetime NOT NULL DEFAULT current_timestamp(),
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi,\r\n0 an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idBL`, `idSP`, `idND`, `noiDung`, `ngayBL`, `anHien`) VALUES
(6, 1, 1, 'Sản phẩm chất lượng, giao hàng nhanh chóng', '2023-07-29 17:30:24', 1),
(7, 2, 1, 'Giao hàng đúng giờ, nhân viên tư vấn nhiệt tình', '2023-07-29 17:30:24', 1),
(8, 3, 1, 'Gạo rất ngon, mềm dẻo và thươm', '2023-07-29 17:30:24', 1),
(9, 4, 1, 'Nhân viên tư vấn nhiệt tình, sản phẩm đa dạng, phong phú', '2023-07-29 17:30:24', 1),
(10, 5, 1, 'Gạo lứt của website rất chất lượng mà giá cả hợp lý', '2023-07-29 17:30:24', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idCTHD` int(11) NOT NULL,
  `idHD` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `giaSP` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idCTHD`, `idHD`, `idSP`, `tenSP`, `soLuong`, `giaSP`) VALUES
(1, 4, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 2, 83300),
(2, 6, 3, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 2, 78000),
(3, 8, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 6, 129000),
(4, 11, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 3, 83300);

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
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `idHD` int(11) NOT NULL,
  `idND` int(11) DEFAULT NULL,
  `idMGG` int(11) DEFAULT NULL,
  `tongTien` double NOT NULL,
  `ngayMua` datetime NOT NULL DEFAULT current_timestamp(),
  `thanhToan` tinyint(1) NOT NULL COMMENT '1 da thanh toan,\r\n0 chua thanh toan',
  `trangThai` tinyint(1) NOT NULL COMMENT '1 da giao hang,\r\n0 chua giao hang',
  `tenNguoiNhan` varchar(50) NOT NULL,
  `email` varchar(225) NOT NULL,
  `soDienThoai` int(11) NOT NULL,
  `diaChi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idHD`, `idND`, `idMGG`, `tongTien`, `ngayMua`, `thanhToan`, `trangThai`, `tenNguoiNhan`, `email`, `soDienThoai`, `diaChi`) VALUES
(4, NULL, NULL, 166600, '2023-07-19 21:47:53', 0, 0, 'Phan văn hùng', 'mobanight2107@gmail.com', 857626102, 'abc,Xã Duy Phiên,Huyện Tam Dương,Tỉnh Vĩnh Phúc'),
(5, NULL, NULL, 166600, '2023-07-19 21:49:36', 0, 0, 'Phan văn hùng', 'mobanight2107@gmail.com', 857626102, 'abc,Xã Phú Đô,Huyện Phú Lương,Tỉnh Thái Nguyên'),
(6, NULL, NULL, 156000, '2023-07-19 22:06:06', 0, 0, 'Phan văn hùng', 'hung@gmail.com', 857626102, 'abc,Xã An Hòa,Huyện Tam Dương,Tỉnh Vĩnh Phúc'),
(7, NULL, NULL, 156000, '2023-07-19 22:07:16', 0, 0, 'Phan văn hùng', 'hung@gmail.com', 857626102, 'abc,Xã An Hòa,Huyện Tam Dương,Tỉnh Vĩnh Phúc'),
(8, NULL, NULL, 774000, '2023-07-23 20:00:22', 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang'),
(9, NULL, NULL, 774000, '2023-07-23 20:00:47', 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang'),
(10, NULL, NULL, 774000, '2023-07-23 20:01:12', 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang'),
(11, NULL, NULL, 249900, '2023-07-23 20:02:09', 0, 0, 'Phan Văn hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Xã Chuyên Ngoại,Thị xã Duy Tiên,Tỉnh Hà Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoai` int(11) NOT NULL,
  `tenLoai` varchar(100) NOT NULL,
  `thuTu` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien thi, 0 la an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoai`, `tenLoai`, `thuTu`, `anHien`) VALUES
(1, 'Gạo trắng (gạo tẻ)', 1, 1),
(2, 'Gạo nếp', 2, 1),
(3, 'Gạo lứt', 3, 1),
(4, 'Gạo tấm', 4, 1),
(5, 'Gạo hữu cơ (organic)', 5, 1),
(6, 'Gạo mầm, hỗn hợp', 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `idMGG` int(11) NOT NULL,
  `maGiamGia` varchar(50) NOT NULL,
  `chiTiet` varchar(255) DEFAULT NULL,
  `ngayBatDau` datetime NOT NULL,
  `ngayKetThuc` datetime NOT NULL,
  `loaiMa` tinyint(1) NOT NULL COMMENT '1 la giam theo %, 0 la giam truc tiep so tien',
  `giaTri` double NOT NULL,
  `hoatDong` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la active, 0 la inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`idMGG`, `maGiamGia`, `chiTiet`, `ngayBatDau`, `ngayKetThuc`, `loaiMa`, `giaTri`, `hoatDong`) VALUES
(1, 'SANSALE', 'Giảm 10.000đ giá trị đơn hàng', '2023-06-28 03:12:59', '2023-06-28 03:12:59', 1, 10000, 1);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_15_073405_add_updated_at_to_nguoidung', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `idND` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `diaChi` text DEFAULT NULL,
  `hinh` varchar(255) DEFAULT NULL,
  `vaiTro` tinyint(1) NOT NULL COMMENT '1 la admin, 0 la user',
  `hoatDong` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la active, 0 la inactive',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`idND`, `ten`, `matKhau`, `email`, `sdt`, `diaChi`, `hinh`, `vaiTro`, `hoatDong`, `updated_at`) VALUES
(1, 'Phan Văn Hùng', '212312312312', 'hungpvps19362@fpt.edu.vn', '0857626102', 'ssss', 'aaaaaaa', 0, 0, NULL),
(5, 'Phan Văn Hùng ah', '212312312', 'hungpvps19362@fpt.edu.vn', '0857626104', 'âjajaj', 'aaaa', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_temp`
--

CREATE TABLE `order_temp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `fee_ship` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `customer_note` varchar(255) DEFAULT NULL,
  `shop_note` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_temp`
--

INSERT INTO `order_temp` (`id`, `total`, `payment_type`, `fee_ship`, `user_name`, `email`, `province`, `district`, `ward`, `address`, `phone`, `customer_note`, `shop_note`, `created_at`, `updated_at`) VALUES
(8, 129000, 'ATM', 0, 'thanhdatfood', 'dat@gmail.com', 'Tỉnh Bắc Giang', 'Huyện Lục Ngạn', 'Xã Kim Sơn', 'quận gò vấp tp Hồ Chí minh', '0386352313', 'Ghi chú', NULL, '2023-07-09 09:04:17', '2023-07-09 09:04:17'),
(10, 62000, 'ATM', 0, 'Phan Văn Hùng', 'hung@gmail.com', 'Tỉnh Hà Tĩnh', 'Huyện Kỳ Anh', 'Xã Lâm Hợp', '1a đồng trạch', '0857626102', NULL, NULL, '2023-07-23 06:55:55', '2023-07-23 06:55:55');

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
-- Cấu trúc bảng cho bảng `quantri`
--

CREATE TABLE `quantri` (
  `Ten` varchar(50) NOT NULL,
  `idQT` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `soDienThoai` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quantri`
--

INSERT INTO `quantri` (`Ten`, `idQT`, `password`, `email`, `soDienThoai`, `created_at`) VALUES
('hùng ', 1, '$2y$10$vnezb2VaYSfujrF6Vov8sOkM29PE.a4mY6/kJoo5nn5ivfRYfL866', 'hung@gmail.com', '123456789', '2023-07-15 08:53:32'),
('hùng 2', 2, '12345678', 'hung2@gmai.com', '12345678', '2023-07-15 08:53:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `idLoai` int(11) NOT NULL,
  `idTH` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `giaSP` double NOT NULL,
  `urlHinh` varchar(255) NOT NULL,
  `moTa` text DEFAULT NULL,
  `ngayDang` datetime NOT NULL DEFAULT current_timestamp(),
  `soLuotXem` int(11) DEFAULT NULL,
  `soLuotMua` int(11) DEFAULT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien thi, 0 la an',
  `noiBat` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la noi bat, 0 la k noi bat',
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `idLoai`, `idTH`, `tenSP`, `giaSP`, `urlHinh`, `moTa`, `ngayDang`, `soLuotXem`, `soLuotMua`, `anHien`, `noiBat`, `discount`) VALUES
(1, 1, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 129000, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(2, 1, 1, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(3, 1, 1, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 78000, 'https://cdn.tgdd.vn/Products/Images/2513/193609/bhx/gao-vinh-hien-do-quyen-tui-5kg-202111021628092012_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(4, 1, 1, 'Gạo Vinh Hiển đặc sản ST24 túi 2kg', 60000, 'https://cdn.tgdd.vn/Products/Images/2513/212754/bhx/gao-vinh-hien-dac-san-st24-tui-2kg-202109201352377808_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(5, 3, 1, 'Gạo lứt tím Vinh Hiển túi 1kg', 48000, 'https://cdn.tgdd.vn/Products/Images/2513/262354/bhx/gao-lut-tim-vinh-hien-tui-1kg-202301090824554250_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(6, 4, 1, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(7, 2, 1, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(8, 2, 1, 'Nếp sáp Vinh Hiển túi 1kg', 31000, 'https://cdn.tgdd.vn/Products/Images/2513/225003/bhx/nep-sap-vinh-hien-tui-1kg-202103040826093614_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(9, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 195000, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(10, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/159560/bhx/gao-thom-vua-gao-phu-sa-tui-2kg-202208262020594337_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(11, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà túi 5kg', 140000, 'https://cdn.tgdd.vn/Products/Images/2513/182769/bhx/gao-thom-vua-gao-dam-da-tui-5kg-202106041129447653_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(12, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 5kg', 138000, 'https://cdn.tgdd.vn/Products/Images/2513/159557/bhx/gao-thom-vua-gao-phu-sa-tui-5kg-202103040839353887_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(13, 1, 2, 'Gạo thơm Vua Gạo ST25 túi 2kg', 79000, 'https://cdn.tgdd.vn/Products/Images/2513/253156/bhx/gao-thom-vua-gao-st25-tui-2kg-202111200945235942_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(14, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 64000, 'https://cdn.tgdd.vn/Products/Images/2513/182768/bhx/gao-thom-vua-gao-dam-da-st24-tui-2kg-202201151549502331_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(15, 1, 3, 'Gạo thơm Hạt Ngọc Trời Thiên Vương túi 5kg', 194500, 'https://cdn.tgdd.vn/Products/Images/2513/236952/bhx/gao-thom-hat-ngoc-troi-thien-vuong-tui-5kg-202104261519374512_300x300.jpeg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(16, 1, 3, 'Gạo Hạt Ngọc Trời Tiên Nữ túi 5kg', 151000, 'https://cdn.tgdd.vn/Products/Images/2513/77530/bhx/-202210270823579419_300x300.jpg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(17, 1, 3, 'Gạo Hạt Ngọc Trời Thiên Long túi 5kg', 113000, 'https://cdn.tgdd.vn/Products/Images/2513/77531/bhx/gao-hat-ngoc-troi-thien-long-tui-5kg-202301132158171031_300x300.jpg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(18, 1, 3, 'Gạo Hạt Ngọc Trời Bạch Dương túi 5kg', 112000, 'https://cdn.tgdd.vn/Products/Images/2513/79016/bhx/gao-hat-ngoc-troi-bach-duong-tui-5kg-202210270826470675_300x300.jpg', NULL, '2023-05-31 17:00:55', NULL, NULL, 1, 1, 0),
(19, 3, 5, 'Gạo lứt huyết rồng Lotus Rice NutriChoice hộp 0,5kg', 43400, 'https://cdn.tgdd.vn/Products/Images/2513/203887/bhx/gao-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg-202103040832315314_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(20, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 2kg', 50500, 'https://cdn.tgdd.vn/Products/Images/2513/87310/bhx/gao-thom-lai-lotus-rice-jasmine-tui-2kg-202103040836123362_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(21, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 5kg', 132000, 'https://cdn.tgdd.vn/Products/Images/2513/82845/bhx/gao-thom-lai-lotus-rice-jasmine-tui-5kg-202103040834438617_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(22, 3, 5, 'Gạo lứt tím than Lotus Rice NutriChoice hộp 0,5kg', 62000, 'https://cdn.tgdd.vn/Products/Images/2513/203888/bhx/gao-tim-than-lotus-rice-nutrichoice-hop-0-5kg-202103040805168587_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(23, 1, 6, 'Gạo Lạc Việt đệ nhất ST25 túi 5kg', 175000, 'https://cdn.tgdd.vn/Products/Images/2513/279506/bhx/gao-lac-viet-de-nhat-st25-tui-5kg-202210110941589891_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(24, 1, 6, 'Gạo Lạc Việt hảo hạng ST24 túi 5kg', 160000, 'https://cdn.tgdd.vn/Products/Images/2513/279507/bhx/gao-lac-viet-hao-hang-st24-tui-5kg-202210110942572190_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(25, 1, 6, 'Gạo Lạc Việt dẻo thơm ST5 túi 5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/279514/bhx/gao-lac-viet-deo-thom-st5-tui-5kg-202210110942352192_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(26, 1, 6, 'Gạo Lạc Việt XK51 túi 5kg', 110000, 'https://cdn.tgdd.vn/Products/Images/2513/279509/bhx/gao-lac-viet-xk51-tui-5kg-202205211713507395_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(27, 1, 6, 'Gạo Lạc Việt hương lúa túi 5kg', 125000, 'https://cdn.tgdd.vn/Products/Images/2513/279513/bhx/gao-lac-viet-huong-lua-tui-5kg-202205211715591470_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(28, 1, 4, 'Gạo hương lài An Gia túi 5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/265867/bhx/gao-huong-lai-an-gia-tui-5kg-202201061054309814_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(29, 1, 4, 'Gạo An Gia Nàng Hoa túi 5kg', 117500, 'https://cdn.tgdd.vn/Products/Images/2513/266095/bhx/gao-an-gia-nang-hoa-tui-5kg-202201061053517481_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(30, 1, 4, 'Gạo An Gia Jasmine túi 5kg', 105000, 'https://cdn.tgdd.vn/Products/Images/2513/265892/bhx/gao-an-gia-jasmine-tui-5kg-202201061054059032_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(31, 2, 7, 'Nếp than PMT túi 1kg', 55500, 'https://cdn.tgdd.vn/Products/Images/2513/146577/bhx/nep-than-pmt-tui-1kg-202103040831126066_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(32, 3, 7, 'Gạo lức huyết rồng PMT túi 2kg', 100000, 'https://cdn.tgdd.vn/Products/Images/2513/146578/bhx/-202210150921521038_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(33, 3, 7, 'Gạo lức huyết rồng PMT túi 1kg', 54500, 'https://cdn.tgdd.vn/Products/Images/2513/138644/bhx/gao-luc-huyet-rong-pmt-tui-1kg-202103040823523914_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(34, 3, 7, 'Gạo lức PMT túi 2kg', 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(35, 4, 7, 'Gạo tấm thơm PMT túi 2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/146580/bhx/gao-tam-thom-pmt-tui-2kg-202303261932283448_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(36, 2, 7, 'Nếp ngỗng PMT túi 1kg', 33000, 'https://cdn.tgdd.vn/Products/Images/2513/146576/bhx/nep-ngong-pmt-tui-1kg-202103040808176553_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(39, 5, 4, 'okok212', 1, 'ok', '<p>ok</p>', '2023-06-27 12:13:24', 11, 1, 0, 0, 0),
(40, 1, 3, 'Gạo hoa', 100000, '/upload/images\\2023-07-19_1689780426_IMG_20190626_204528.jpg', '<p>abcs</p>', '2023-07-19 22:27:06', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `tenSlider` varchar(255) NOT NULL,
  `hinhSlider` varchar(255) DEFAULT NULL,
  `ngayDang` datetime DEFAULT current_timestamp(),
  `nhom` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi, \r\n0 an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `tenSlider`, `hinhSlider`, `ngayDang`, `nhom`, `anHien`) VALUES
(1, 'Slider 1', '/upload/images/slider\\2023-07-29_1690624544_1.png', '2023-07-29 16:53:38', 1, 1),
(2, 'Slider 2', '/upload/images/slider\\2023-07-29_1690624556_2.png', '2023-07-29 16:55:56', 1, 1),
(3, 'Slider 3', '/upload/images/slider\\2023-07-29_1690624572_3.png', '2023-07-29 16:56:12', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieusp`
--

CREATE TABLE `thuonghieusp` (
  `idTH` int(11) NOT NULL,
  `tenTH` varchar(100) NOT NULL,
  `urlHinhTH` varchar(255) DEFAULT NULL,
  `thuTu` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi, \r\n0 an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieusp`
--

INSERT INTO `thuonghieusp` (`idTH`, `tenTH`, `urlHinhTH`, `thuTu`, `anHien`) VALUES
(1, 'Vinh Hiển', '/upload/images/thuonghieuSP\\2023-07-22_1690037870_vinh-hien-21072022145433.jpg', 1, 1),
(2, 'Vua Gạo', '/upload/images/thuonghieuSP\\2023-07-22_1690037880_vua-gao-05042021172031.jpg', 2, 1),
(3, 'Hạt Ngọc Trời', '/upload/images/thuonghieuSP\\2023-07-22_1690037890_hat-ngoc-troi-05042021235620.jpg', 3, 1),
(4, 'An gia', '/upload/images/thuonghieuSP\\2023-07-22_1690037899_an-gia-04042021002.jpg', 4, 1),
(5, 'Lotus Rice', '/upload/images/thuonghieuSP\\2023-07-22_1690037908_lotus-rice-0404202123823.jpg', 5, 1),
(6, 'Lạc Việt', '/upload/images/thuonghieuSP\\2023-07-22_1690037922_lac-viet-2506202295023.jpg', 6, 1),
(7, 'PMT', '/upload/images/thuonghieuSP\\2023-07-22_1690037965_pmt-15032021131922.jpg', 7, 1),
(8, 'Vibigaba', '/upload/images/thuonghieuSP\\2023-07-22_1690037974_vibigaba-05042021163544.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`idBV`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idBL`),
  ADD KEY `binhluan_fk_idND` (`idND`),
  ADD KEY `binhluan_fk_idSP` (`idSP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idCTHD`),
  ADD KEY `chitiethoadon_fk_idHD` (`idHD`),
  ADD KEY `chitiethoadon_fk_idSP` (`idSP`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`idHD`),
  ADD KEY `hoadon_fk_idND` (`idND`),
  ADD KEY `hoadon_fk_idMGG` (`idMGG`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`idLoai`);

--
-- Chỉ mục cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`idMGG`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`idND`);

--
-- Chỉ mục cho bảng `order_temp`
--
ALTER TABLE `order_temp`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `quantri`
--
ALTER TABLE `quantri`
  ADD PRIMARY KEY (`idQT`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSP`),
  ADD KEY `sanpham_fk_idLoai` (`idLoai`),
  ADD KEY `sanpham_fk_idTH` (`idTH`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  ADD PRIMARY KEY (`idTH`);

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
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idBV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `idMGG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `idND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quantri`
--
ALTER TABLE `quantri`
  MODIFY `idQT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thuonghieusp`
--
ALTER TABLE `thuonghieusp`
  MODIFY `idTH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_fk_idND` FOREIGN KEY (`idND`) REFERENCES `nguoidung` (`idND`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `binhluan_fk_idSP` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_fk_idHD` FOREIGN KEY (`idHD`) REFERENCES `hoadon` (`idHD`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chitiethoadon_fk_idSP` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`idSP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_fk_idMGG` FOREIGN KEY (`idMGG`) REFERENCES `magiamgia` (`idMGG`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoadon_fk_idND` FOREIGN KEY (`idND`) REFERENCES `nguoidung` (`idND`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_fk_idLoai` FOREIGN KEY (`idLoai`) REFERENCES `loaisanpham` (`idLoai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sanpham_fk_idTH` FOREIGN KEY (`idTH`) REFERENCES `thuonghieusp` (`idTH`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
