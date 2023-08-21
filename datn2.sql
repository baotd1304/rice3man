-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th8 21, 2023 lúc 09:39 AM
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
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `idBV` int(11) NOT NULL,
  `thumbNail` varchar(255) NOT NULL,
  `noiDung` text NOT NULL,
  `tacGia` varchar(50) DEFAULT NULL,
  `ngayDang` datetime NOT NULL DEFAULT current_timestamp(),
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi,\r\n0 an',
  `noiBat` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 noi bat,\r\n0 k noi bat',
  `tieuDe` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`idBV`, `thumbNail`, `noiDung`, `tacGia`, `ngayDang`, `anHien`, `noiBat`, `tieuDe`, `slug`) VALUES
(1, 'https://bizweb.dktcdn.net/100/485/131/articles/1.png?v=1683207760607', '<p>Bạn bắt đầu tập gym giảm c&acirc;n v&agrave; cần một chế độ ăn thật hợp l&yacute;? Xem qua lưu &yacute; v&agrave; c&aacute;ch thực hiện chế độ ăn hợp l&yacute; trong qu&aacute; tr&igrave;nh tập trong b&agrave;i viết dưới đ&acirc;y. Một cơ thể thon gọn, khỏe, đẹp l&agrave; điều m&agrave; bất kỳ ai cũng mong muốn sở hữu. Tập gym giảm c&acirc;n l&agrave; c&aacute;ch được rất nhiều người lựa chọn. V&agrave; một trong những điều kiện ti&ecirc;n quyết khi tập luyện ch&iacute;nh l&agrave; duy tr&igrave; chế độ ăn thật hợp l&yacute;. C&ugrave;ng t&igrave;m hiểu trong b&agrave;i viết n&agrave;y nh&eacute;!</p>', 'kim', '2023-07-09 23:28:48', 1, 1, 'Gợi ý 9 món ngon trong dịp cuối tuần', 'goi-y-9-mon-ngon-trong-dip-cuoi-tuan'),
(2, 'https://bizweb.dktcdn.net/100/485/131/articles/1.png?v=1683207760607', '<p>Bạn bắt đầu tập gym giảm c&acirc;n v&agrave; cần một chế độ ăn thật hợp l&yacute;? Xem qua lưu &yacute; v&agrave; c&aacute;ch thực hiện chế độ ăn hợp l&yacute; trong qu&aacute; tr&igrave;nh tập trong b&agrave;i viết dưới đ&acirc;y. Một cơ thể thon gọn, khỏe, đẹp l&agrave; điều m&agrave; bất kỳ ai cũng mong muốn sở hữu. Tập gym giảm c&acirc;n l&agrave; c&aacute;ch được rất nhiều người lựa chọn. V&agrave; một trong những điều kiện ti&ecirc;n quyết khi tập luyện ch&iacute;nh l&agrave; duy tr&igrave; chế độ ăn thật hợp l&yacute;. C&ugrave;ng t&igrave;m hiểu trong b&agrave;i viết n&agrave;y nh&eacute;!</p>', 'kim', '2023-07-09 23:28:54', 1, 1, 'Gợi ý 9 món ngon trong dịp cuối tuần', 'goi-y-9-mon-ngon-trong-dip-cuoi-tuan-2'),
(3, '/upload/images/baiviet\\2023-07-29_1690602197_logoRice3Man.jpg', '<p>3</p>', 'adadd', '2023-07-29 10:43:17', 1, 1, 'dadadad3', 'dadadad3'),
(4, '/upload/images/baiviet\\2023-08-05_1691228140_360_F_432860224_PpBBcVzMlzvgqPx1z0ygcZPhccgXS1ui.jpg', '<p>31313</p>', '1313', '2023-08-04 23:29:22', 1, 1, 'bai viet test 2', 'bai-viet-test-2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idBL` int(11) NOT NULL,
  `idSP` int(11) NOT NULL,
  `idND` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `noiDung` text NOT NULL,
  `ngayBL` datetime NOT NULL DEFAULT current_timestamp(),
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi,\r\n0 an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idBL`, `idSP`, `idND`, `parent_id`, `noiDung`, `ngayBL`, `anHien`) VALUES
(14, 1, 9, NULL, 'Sản phẩm chất lượng, giao hàng nhanh chóng', '2023-08-05 23:01:10', 1),
(15, 2, 9, NULL, 'Giao hàng đúng giờ, nhân viên tư vấn nhiệt tình', '2023-08-05 23:01:10', 1),
(16, 3, 10, NULL, 'Gạo rất ngon, mềm dẻo và thươm', '2023-08-05 23:01:10', 1),
(17, 4, 10, NULL, 'Nhân viên tư vấn nhiệt tình, sản phẩm đa dạng, phong phú', '2023-08-05 23:01:10', 1),
(18, 5, 11, NULL, 'Gạo lứt của website rất chất lượng mà giá cả hợp lý', '2023-08-05 23:01:10', 1),
(19, 1, 9, NULL, 't4tretret', '2023-08-05 23:01:10', 1),
(20, 1, 9, NULL, 'Sản phẩm chất lượng, giao hàng nhanh chóng', '2023-08-05 23:06:47', 1),
(21, 2, 9, NULL, 'Giao hàng đúng giờ, nhân viên tư vấn nhiệt tình', '2023-08-05 23:06:47', 1),
(22, 3, 10, NULL, 'Gạo rất ngon, mềm dẻo và thươm', '2023-08-05 23:06:47', 1),
(23, 4, 10, NULL, 'Nhân viên tư vấn nhiệt tình, sản phẩm đa dạng, phong phú', '2023-08-05 23:06:47', 1),
(24, 5, 11, NULL, 'Gạo lứt của website rất chất lượng mà giá cả hợp lý', '2023-08-05 23:06:47', 1),
(25, 3, 9, NULL, 'sản phẩm chất lượng cao, giá hợp lý', '2023-08-05 23:09:35', 1),
(26, 10, 9, NULL, '41414', '2023-08-05 23:27:24', 1),
(27, 10, 9, NULL, 'rtrtrt', '2023-08-05 23:28:18', 1),
(28, 10, 9, NULL, '54545', '2023-08-05 23:28:23', 1),
(29, 10, 9, NULL, 'sđsư', '2023-08-05 23:32:42', 1),
(30, 1, 9, NULL, '31313', '2023-08-05 23:43:04', 1),
(31, 1, 9, NULL, 'bluan 1', '2023-08-05 23:43:19', 1),
(32, 19, 9, NULL, 'dfdfd fdfdf', '2023-08-05 23:49:49', 0),
(33, 22, 9, NULL, 'binh luan test', '2023-08-06 09:51:37', 1),
(34, 14, 9, NULL, 'sản phẩm không như hình ảnh, đóng gói kém, giao hàng lâu', '2023-08-07 01:11:02', 1),
(35, 32, 9, NULL, 'Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.Hiện tại chưa có bình luận.', '2023-08-07 21:46:26', 1),
(36, 33, 19, NULL, 'Sản phẩm quá kém chất lượng, không như hình ảnh', '2023-08-09 15:39:47', 1),
(37, 1, 9, NULL, '212', '2023-08-15 22:50:13', 1),
(38, 36, 9, NULL, 'Nhân viên tư vấn nhiệt tình, chu đáo, sản phẩm đa dạng, phong phú, đóng gói cẩn thận', '2023-08-17 11:37:35', 1),
(39, 36, 9, NULL, 'Đã mua thử, sản phẩm rất tốt', '2023-08-17 11:44:04', 1),
(40, 5, 9, 18, '3131313', '2023-08-21 12:34:28', 1),
(41, 5, 9, 24, '3131313', '2023-08-21 12:40:39', 1),
(42, 5, 9, 24, 'rêr', '2023-08-21 12:40:49', 1),
(43, 5, 9, 24, 'sâs', '2023-08-21 12:50:45', 1),
(44, 5, 9, 41, '313cscs', '2023-08-21 12:56:17', 1),
(45, 5, 9, 40, 'reply 2', '2023-08-21 12:57:19', 1),
(46, 5, 9, 45, '3131313', '2023-08-21 12:59:06', 1),
(47, 32, 9, 35, 'hhh', '2023-08-21 14:37:14', 1),
(48, 32, 9, 47, 'dada', '2023-08-21 14:37:58', 1),
(49, 32, 9, 48, 'dsdsd', '2023-08-21 14:38:06', 1);

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
  `giaSP` double NOT NULL,
  `urlHinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idCTHD`, `idHD`, `idSP`, `tenSP`, `soLuong`, `giaSP`, `urlHinh`) VALUES
(1, 4, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 2, 83300, ''),
(2, 4, 3, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 2, 78000, ''),
(3, 8, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 6, 129000, ''),
(4, 11, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 3, 83300, ''),
(5, 12, 8, 'Nếp sáp Vinh Hiển túi 1kg', 2, 31000, ''),
(6, 13, 33, 'Gạo lức huyết rồng PMT túi 1kg', 3, 54500, ''),
(7, 14, 8, 'Nếp sáp Vinh Hiển túi 1kg', 3, 31000, ''),
(8, 4, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 2, 83300, ''),
(9, 15, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 3, 38000, ''),
(10, 15, 35, 'Gạo tấm thơm PMT túi 2kg', 3, 42000, ''),
(11, 16, 3, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 3, 78000, ''),
(12, 17, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 2, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg'),
(13, 17, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 3, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(14, 18, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 2, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg'),
(15, 18, 35, 'Gạo tấm thơm PMT túi 2kg', 2, 42000, 'https://cdn.tgdd.vn/Products/Images/2513/146580/bhx/gao-tam-thom-pmt-tui-2kg-202303261932283448_300x300.jpg'),
(16, 18, 8, 'Nếp sáp Vinh Hiển túi 1kg', 1, 31000, 'https://cdn.tgdd.vn/Products/Images/2513/225003/bhx/nep-sap-vinh-hien-tui-1kg-202103040826093614_300x300.jpg'),
(17, 19, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 2, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(18, 19, 31, 'Nếp than PMT túi 1kg', 2, 55500, 'https://cdn.tgdd.vn/Products/Images/2513/146577/bhx/nep-than-pmt-tui-1kg-202103040831126066_300x300.jpg'),
(19, 22, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 1, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg'),
(20, 26, 8, 'Nếp sáp Vinh Hiển túi 1kg', 1, 31000, 'https://cdn.tgdd.vn/Products/Images/2513/225003/bhx/nep-sap-vinh-hien-tui-1kg-202103040826093614_300x300.jpg'),
(21, 27, 34, 'Gạo lức PMT túi 2kg', 2, 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg'),
(22, 28, 19, 'Gạo lứt huyết rồng Lotus Rice NutriChoice hộp 0,5kg', 2, 43400, 'https://cdn.tgdd.vn/Products/Images/2513/203887/bhx/gao-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg-202103040832315314_300x300.jpg'),
(23, 28, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 1, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(24, 29, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 1, 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg'),
(25, 30, 5, 'Gạo lứt tím Vinh Hiển túi 1kg', 1, 48000, 'https://cdn.tgdd.vn/Products/Images/2513/262354/bhx/gao-lut-tim-vinh-hien-tui-1kg-202301090824554250_300x300.jpg'),
(26, 31, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 1, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(27, 32, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 3, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(28, 33, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 1, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg'),
(29, 33, 35, 'Gạo tấm thơm PMT túi 2kg', 1, 42000, 'https://cdn.tgdd.vn/Products/Images/2513/146580/bhx/gao-tam-thom-pmt-tui-2kg-202303261932283448_300x300.jpg'),
(30, 34, 34, 'Gạo lức PMT túi 2kg', 1, 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg'),
(31, 35, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 1, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(32, 36, 34, 'Gạo lức PMT túi 2kg', 1, 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg'),
(33, 37, 34, 'Gạo lức PMT túi 2kg', 2, 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg'),
(34, 38, 3, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 1, 78000, 'https://cdn.tgdd.vn/Products/Images/2513/193609/bhx/gao-vinh-hien-do-quyen-tui-5kg-202111021628092012_300x300.jpg'),
(35, 40, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 1, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(36, 41, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 2, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(37, 41, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 1, 116100, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg'),
(38, 42, 7, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 2, 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg'),
(39, 42, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 1, 116100, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg'),
(40, 42, 24, 'Gạo Lạc Việt hảo hạng ST24 túi 5kg', 1, 160000, 'https://cdn.tgdd.vn/Products/Images/2513/279507/bhx/gao-lac-viet-hao-hang-st24-tui-5kg-202210110942572190_300x300.jpg'),
(41, 43, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 1, 116100, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg'),
(42, 44, 3, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 2, 78000, 'https://cdn.tgdd.vn/Products/Images/2513/193609/bhx/gao-vinh-hien-do-quyen-tui-5kg-202111021628092012_300x300.jpg'),
(43, 45, 22, 'Gạo lứt tím than Lotus Rice NutriChoice hộp 0,5kg', 1, 62000, 'https://cdn.tgdd.vn/Products/Images/2513/203888/bhx/gao-tim-than-lotus-rice-nutrichoice-hop-0-5kg-202103040805168587_300x300.jpg'),
(44, 46, 33, 'Gạo lức huyết rồng PMT túi 1kg', 1, 54500, 'https://cdn.tgdd.vn/Products/Images/2513/138644/bhx/gao-luc-huyet-rong-pmt-tui-1kg-202103040823523914_300x300.jpg'),
(45, 47, 22, 'Gạo lứt tím than Lotus Rice NutriChoice hộp 0,5kg', 2, 62000, 'https://cdn.tgdd.vn/Products/Images/2513/203888/bhx/gao-tim-than-lotus-rice-nutrichoice-hop-0-5kg-202103040805168587_300x300.jpg'),
(46, 48, 13, 'Gạo thơm Vua Gạo ST25 túi 2kg', 2, 79000, 'https://cdn.tgdd.vn/Products/Images/2513/253156/bhx/gao-thom-vua-gao-st25-tui-2kg-202111200945235942_300x300.jpg'),
(47, 49, 19, 'Gạo lứt huyết rồng Lotus Rice NutriChoice hộp 0,5kg', 2, 43400, 'https://cdn.tgdd.vn/Products/Images/2513/203887/bhx/gao-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg-202103040832315314_300x300.jpg'),
(48, 50, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 1, 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg'),
(49, 51, 2, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 2, 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg'),
(50, 51, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 1, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hotline` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `logo`, `email`, `hotline`, `address`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Cửa hàng lương thực Gạo 3 Ông', '/upload/images/contact\\2023-08-15_1692113799_logoRice3Man.png', 'gao3ong@gmail.com', '19008080', 'Công viên phần mềm Quang Trung, Quận 12, TP Hồ Chí Minh', '', 1, '2023-08-06 07:18:10', '2023-08-15 08:40:05'),
(2, 'Cửa hàng phân phối gạo Rice 3 Man', '/upload/images/contact\\2023-08-15_1692113918_logoRice3Man.png', 'gao3ong@gmail.com', '19001234', 'Quận 12, TP Hồ Chí Minh', '', 0, '2023-08-15 08:32:19', '2023-08-15 08:39:39');

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
  `isDone` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 chưa xác nhận,\r\n1 đã xác nhận,\r\n2 đã hoàn thành,\r\n3 hủy',
  `tenNguoiNhan` varchar(100) NOT NULL,
  `email` varchar(225) NOT NULL,
  `soDienThoai` int(20) NOT NULL,
  `diaChi` varchar(250) NOT NULL,
  `randomString` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`idHD`, `idND`, `idMGG`, `tongTien`, `ngayMua`, `thanhToan`, `trangThai`, `isDone`, `tenNguoiNhan`, `email`, `soDienThoai`, `diaChi`, `randomString`) VALUES
(4, NULL, NULL, 166600, '2023-07-19 21:47:53', 0, 1, 0, 'Phan văn hùng', 'mobanight2107@gmail.com', 857626102, 'abc,Xã Duy Phiên,Huyện Tam Dương,Tỉnh Vĩnh Phúc', 'Qx2OkyzS81'),
(5, NULL, NULL, 166600, '2023-07-19 21:49:36', 0, 0, 0, 'Phan văn hùng', 'mobanight2107@gmail.com', 857626102, 'abc,Xã Phú Đô,Huyện Phú Lương,Tỉnh Thái Nguyên', 'nTDgf6yAxd'),
(6, NULL, NULL, 156000, '2023-07-19 22:06:06', 0, 0, 0, 'Phan văn hùng', 'hung@gmail.com', 857626102, 'abc,Xã An Hòa,Huyện Tam Dương,Tỉnh Vĩnh Phúc', '1LMBq3KZhb'),
(7, NULL, NULL, 156000, '2023-07-19 22:07:16', 0, 0, 0, 'Phan văn hùng', 'hung@gmail.com', 857626102, 'abc,Xã An Hòa,Huyện Tam Dương,Tỉnh Vĩnh Phúc', '66ElznXmn9'),
(8, NULL, NULL, 774000, '2023-07-23 20:00:22', 0, 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang', 'kfPvUphaiK'),
(9, NULL, NULL, 774000, '2023-07-23 20:00:47', 0, 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang', 'BIuHkwycDh'),
(10, NULL, NULL, 774000, '2023-07-23 20:01:12', 0, 0, 0, 'Phan Văn Hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Thị trấn Cao Thượng,Huyện Tân Yên,Tỉnh Bắc Giang', 'lPdiVcFG8E'),
(11, NULL, NULL, 249900, '2023-07-23 20:02:09', 0, 0, 0, 'Phan Văn hùng', 'hkmir7@gmail.com', 857626102, '1a đồng trạch,Xã Chuyên Ngoại,Thị xã Duy Tiên,Tỉnh Hà Nam', 'ITSodJrEEa'),
(12, NULL, NULL, 62000, '2023-08-04 20:48:08', 1, 1, 0, 'tran baotran baotran bao', 'tdb1304@gmail.com', 131313, '31313,Phường Trưng Nhị,Thành phố Phúc Yên,Tỉnh Vĩnh Phúc', 'hzH2Ck9XvQ'),
(13, NULL, NULL, 163500, '2023-08-04 20:49:27', 1, 1, 3, 'tdb1304@gmail.com', 'tdb1304@gmail.com', 123123123, '121212,Xã Mỹ Thái,Huyện Lạng Giang,Tỉnh Bắc Giang', 'sXjkduMVNJ'),
(14, NULL, NULL, 93000, '2023-08-04 21:06:17', 1, 0, 0, 'tran baotran baotran bao', 'baotd1304@gmail.com', 123123123, '424232,Thị trấn Thanh Sơn,Huyện Thanh Sơn,Tỉnh Phú Thọ', 'IMDRyKFFrC'),
(15, NULL, NULL, 240000, '2023-08-06 15:59:02', 0, 0, 0, 'duy baoduy baoduy bao', 'baotd1304@gmail.com', 123123123, '313112,Xã Văn Quán,Huyện Lập Thạch,Tỉnh Vĩnh Phúc', 'hLHubITEkK'),
(16, NULL, NULL, 234000, '2023-08-06 16:18:27', 0, 0, 0, '3131313131313', 'admin@gmail.com', 3131313, '3131313,Xã Đức Long,Thị xã Quế Võ,Tỉnh Bắc Ninh', 'NdR5PkFGzD'),
(17, NULL, NULL, 184000, '2023-08-06 18:22:10', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,,Huyện Đồng Hỷ,Tỉnh Thái Nguyên', 'J8SLRf41T2'),
(18, NULL, NULL, 180000, '2023-08-06 18:29:02', 0, 0, 0, '3131313', 'admin@gmail', 31313, 'êrẻ,Phường Trưng Nhị,Thành phố Phúc Yên,Tỉnh Vĩnh Phúc', 'yYAf7LAbWP'),
(19, NULL, NULL, 183000, '2023-08-06 22:41:16', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Hùng Thắng,Huyện Tiên Lãng,Thành phố Hải Phòng', 'wYVy5n5HZ1'),
(20, NULL, NULL, 0, '2023-08-06 22:42:06', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Long Châu,Huyện Yên Phong,Tỉnh Bắc Ninh', 'DruN1fd6P6'),
(21, NULL, NULL, 0, '2023-08-06 22:46:00', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Sơn Đông,Huyện Lập Thạch,Tỉnh Vĩnh Phúc', 'UVU0dbXt3H'),
(22, 9, NULL, 38000, '2023-08-06 22:51:51', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Thị trấn Chờ,Huyện Yên Phong,Tỉnh Bắc Ninh', '6wNjR3aNVA'),
(23, 9, NULL, 38000, '2023-08-06 22:54:58', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Thị trấn Chờ,Huyện Yên Phong,Tỉnh Bắc Ninh', 'RLdmTsytOW'),
(24, 9, NULL, 38000, '2023-08-06 22:55:08', 1, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Mộ Đạo,Thị xã Quế Võ,Tỉnh Bắc Ninh', 'RLdmTsytOW'),
(25, 9, NULL, 38000, '2023-08-06 22:56:01', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Mộ Đạo,Thị xã Quế Võ,Tỉnh Bắc Ninh', '3qVmQou1pw'),
(26, 9, NULL, 31000, '2023-08-06 22:56:47', 1, 1, 1, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Đức Long,Thị xã Quế Võ,Tỉnh Bắc Ninh', 'h8H2T4GZny'),
(27, 9, NULL, 97000, '2023-08-06 23:09:39', 1, 1, 1, 'Duy Bảo', 'tdb1304@gmail.com', 111111, 'fshfìmím fsf sf,Xã Long Châu,Huyện Yên Phong,Tỉnh Bắc Ninh\nfshfìmím fsf sf,Xã Long Châu,Huyện Yên Phong,Tỉnh Bắc Ninh\nfshfìmím fsf sf,Xã Long Châu,Huyện Yên Phong,Tỉnh Bắc Ninh\nfshfìmím fsf sf,Xã Long Châu,Huyện Yên Phong,Tỉnh Bắc Ninh\n', 'DZl0RPgiD7'),
(28, 9, NULL, 115400, '2023-08-07 19:20:23', 1, 1, 2, 'Tran Duy', 'tdb1304@gmail.com', 123456789, 'quang trung,Phường Xuân Hoà,Thành phố Phúc Yên,Tỉnh Vĩnh Phúc', 'DZl0RPgiD7'),
(29, 9, NULL, 83300, '2023-08-07 21:22:24', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Tri Phương,Huyện Tiên Du,Tỉnh Bắc Ninh', 'VjlVvuZk6e'),
(30, 9, NULL, 48000, '2023-08-07 21:31:52', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Đồng Ích,Huyện Lập Thạch,Tỉnh Vĩnh Phúc', 'nFYnedQoxl'),
(31, NULL, NULL, 36000, '2023-08-07 21:35:16', 1, 1, 2, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434,Xã Tiên Minh,Huyện Tiên Lãng,Thành phố Hải Phòng', 'VjlVvuZk6e'),
(32, 9, NULL, 108000, '2023-08-10 20:47:37', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Văn Lang, Huyện Hạ Hoà, Tỉnh Phú Thọ', 'hp5Vcc7xRb'),
(33, 9, NULL, 80000, '2023-08-18 12:54:20', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Văn Môn, Huyện Yên Phong, Tỉnh Bắc Ninh', 'Rkfn634AbJ'),
(34, 9, NULL, 38500, '2023-08-18 12:56:00', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Phường Âu Cơ, Thị xã Phú Thọ, Tỉnh Phú Thọ', 'bJDpUKv6X9'),
(35, 9, NULL, 26000, '2023-08-18 13:10:35', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Minh Phú, Huyện Đoan Hùng, Tỉnh Phú Thọ', '0LG5LeXVky'),
(36, NULL, NULL, 48500, '2023-08-18 13:13:16', 1, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Tri Phương, Huyện Tiên Du, Tỉnh Bắc Ninh', 'p9B9jFP86S'),
(37, 9, 1, 87000, '2023-08-18 13:31:02', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Minh Đạo, Huyện Tiên Du, Tỉnh Bắc Ninh', '$2a$12$OpBuwsaViKN3B39dcAU.OOoasxqfw6.Q/Qu.wAGqfKgUXExFoEBBO'),
(38, 9, 1, 68000, '2023-08-18 14:25:30', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Mộ Đạo, Thị xã Quế Võ, Tỉnh Bắc Ninh', '$2y$10$C8.n1T1yYFS6M3ZkJL157O56E0nA3D2NkGorOLod2rjzoGQtRspna'),
(39, 9, 1, 68000, '2023-08-18 14:26:02', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Mộ Đạo, Thị xã Quế Võ, Tỉnh Bắc Ninh', '$2y$10$187gV2TY/GncNTF9q1/QS.AZ90IymcRoX7G4e/WLg2Ii7f417Zkwi'),
(40, 9, 1, 26000, '2023-08-18 14:33:56', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Vô Tranh, Huyện Hạ Hoà, Tỉnh Phú Thọ', '3EmQHmyDUJ'),
(41, 9, 2, 241380, '2023-08-18 16:15:35', 1, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Triệu Đề, Huyện Lập Thạch, Tỉnh Vĩnh Phúc', 'rLZQk3iaG1'),
(42, 9, 1, 418200, '2023-08-18 16:20:14', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Đồng Tĩnh, Huyện Tam Dương, Tỉnh Vĩnh Phúc', 'cFpxNOLAot'),
(43, 9, 2, 104490, '2023-08-18 16:27:32', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Tân Mỹ, Huyện Văn Lãng, Tỉnh Lạng Sơn', '6EOCW3vbMS'),
(44, 9, 1, 146000, '2023-08-18 16:43:02', 1, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Đỗ Sơn, Huyện Thanh Ba, Tỉnh Phú Thọ', 'tYZxd1osOO'),
(45, 9, 2, 55800, '2023-08-18 16:50:26', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Sơn Cương, Huyện Thanh Ba, Tỉnh Phú Thọ', 'x15EDaeF1h'),
(46, 9, 2, 49050, '2023-08-18 16:55:56', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Mỹ Tài, Huyện Phù Mỹ, Tỉnh Bình Định', 'Hy8JxSnrQo'),
(47, 9, NULL, 124000, '2023-08-18 16:57:15', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Đồng Ích, Huyện Lập Thạch, Tỉnh Vĩnh Phúc', 'TBAadPgKz7'),
(48, 9, NULL, 158000, '2023-08-18 17:05:11', 0, 0, 3, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Đỗ Sơn, Huyện Thanh Ba, Tỉnh Phú Thọ', '2ECxvT6mXq'),
(49, 9, 1, 76800, '2023-08-18 17:08:17', 1, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Phường Đồng Kỵ, Thành phố Từ Sơn, Tỉnh Bắc Ninh', 'rz54OrGjpH'),
(50, 9, NULL, 83300, '2023-08-18 17:09:03', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Vụ Quang, Huyện Đoan Hùng, Tỉnh Phú Thọ', 'Soz6KMVttk'),
(51, 9, 2, 184140, '2023-08-20 20:47:42', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434fdfd, Xã Cẩm Đông, Huyện Cẩm Giàng, Tỉnh Hải Dương', 'ID59blojfU');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `idLoai` int(11) NOT NULL,
  `tenLoai` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thuTu` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien thi, 0 la an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`idLoai`, `tenLoai`, `slug`, `thuTu`, `anHien`) VALUES
(1, 'Gạo trắng (gạo tẻ)', 'gao-trang-gao-te', 1, 1),
(2, 'Gạo nếp', 'gao-nep', 2, 1),
(3, 'Gạo lứt', 'gao-lut', 3, 1),
(4, 'Gạo tấm', 'gao-tam', 4, 1),
(5, 'Gạo hữu cơ (organic)', 'gao-huu-co-organic', 5, 1),
(6, 'Gạo mầm, hỗn hợp', 'gao-mam-hon-hop', 6, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `magiamgia`
--

CREATE TABLE `magiamgia` (
  `idMGG` int(11) NOT NULL,
  `maGiamGia` varchar(20) NOT NULL,
  `chiTiet` varchar(255) DEFAULT NULL,
  `loaiMa` tinyint(1) NOT NULL COMMENT '1 la giam theo %, 0 la giam truc tiep so tien',
  `giaTri` double(10,0) NOT NULL,
  `dieuKien` double(10,0) DEFAULT NULL,
  `luotSuDung` int(11) DEFAULT NULL,
  `gioiHan` int(11) DEFAULT NULL,
  `ngayBatDau` datetime DEFAULT NULL,
  `ngayKetThuc` datetime DEFAULT NULL,
  `hoatDong` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la active, 0 la inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `magiamgia`
--

INSERT INTO `magiamgia` (`idMGG`, `maGiamGia`, `chiTiet`, `loaiMa`, `giaTri`, `dieuKien`, `luotSuDung`, `gioiHan`, `ngayBatDau`, `ngayKetThuc`, `hoatDong`) VALUES
(1, 'SANSALE', 'Giảm 10.000đ giá trị đơn hàng', 0, 10000, 10000, 57, 100, '2023-08-08 21:34:07', '2023-08-31 23:42:16', 1),
(2, 'Giam10pt', 'Giảm 10% gia tri don hang', 1, 10, 50000, 3, NULL, NULL, '2023-08-31 21:30:02', 1),
(3, 'Giam20k', 'Giảm 20k giá trị đơn hàng', 0, 20000, 100000, 2, NULL, '2023-06-28 03:12:59', '2023-08-29 22:20:03', 1),
(4, 'Giam20pt', 'Giảm 20% giá trị đơn hàng', 1, 20, 200000, NULL, NULL, NULL, NULL, 1),
(5, 'Vuicuoituan', 'Giảm 15k', 0, 15000, NULL, 50, 50, '2023-08-16 21:35:14', '2023-08-31 21:35:17', 1),
(23, 'sansale11', '12311', 1, 11, 212, 12, 21, '2023-08-17 16:51:00', '2023-08-24 16:51:00', 0);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_temp`
--

CREATE TABLE `order_temp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idND` int(11) DEFAULT NULL,
  `idMGG` int(11) DEFAULT NULL,
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

INSERT INTO `order_temp` (`id`, `idND`, `idMGG`, `total`, `payment_type`, `fee_ship`, `user_name`, `email`, `province`, `district`, `ward`, `address`, `phone`, `customer_note`, `shop_note`, `created_at`, `updated_at`) VALUES
(8, NULL, NULL, 129000, 'ATM', 0, 'thanhdatfood', 'dat@gmail.com', 'Tỉnh Bắc Giang', 'Huyện Lục Ngạn', 'Xã Kim Sơn', 'quận gò vấp tp Hồ Chí minh', '0386352313', 'Ghi chú', NULL, '2023-07-09 09:04:17', '2023-07-09 09:04:17'),
(10, NULL, NULL, 62000, 'ATM', 0, 'Phan Văn Hùng', 'hung@gmail.com', 'Tỉnh Hà Tĩnh', 'Huyện Kỳ Anh', 'Xã Lâm Hợp', '1a đồng trạch', '0857626102', NULL, NULL, '2023-07-23 06:55:55', '2023-07-23 06:55:55'),
(13, NULL, NULL, 26000, 'ATM', 0, 'Duy Bảo', 'tdb1304@gmail.com', 'Tỉnh Bắc Ninh', 'Huyện Tiên Du', 'Xã Đại Đồng', 'Quận 12, TP Hồ Chí Minh', '123123', NULL, NULL, '2023-08-17 23:08:39', '2023-08-17 23:08:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('tdb1304@gmail.com', '$2y$10$Sc/A8nWJgTnEPRvoHzRDZu8DqJgjhuibqFd5VcDfi5hv3bPYtV1pu', '2023-08-04 03:24:52'),
('baotd1304@gmail.xn--com4rr34343434-ukb', '$2y$10$sywqKKXWKD3t2A5rY2m4OODDezHa6rH3831qvn5oRfdNrpEg2r/WO', '2023-08-04 03:48:05');

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
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `idSP` int(11) NOT NULL,
  `idLoai` int(11) NOT NULL,
  `idTH` int(11) NOT NULL,
  `tenSP` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
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

INSERT INTO `sanpham` (`idSP`, `idLoai`, `idTH`, `tenSP`, `slug`, `giaSP`, `urlHinh`, `moTa`, `ngayDang`, `soLuotXem`, `soLuotMua`, `anHien`, `noiBat`, `discount`) VALUES
(1, 1, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 'gao-trang-nguyen-vinh-hien-st25-tui-5kg', 129000, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 10),
(2, 1, 1, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 'gao-con-cam-vinh-hien-khong-tuoc-nguyen-tui-5kg', 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(3, 1, 1, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 'gao-vinh-hien-do-quyen-tui-5kg', 78000, 'https://cdn.tgdd.vn/Products/Images/2513/193609/bhx/gao-vinh-hien-do-quyen-tui-5kg-202111021628092012_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(4, 1, 1, 'Gạo Vinh Hiển đặc sản ST24 túi 2kg', 'gao-vinh-hien-dac-san-st24-tui-2kg', 60000, 'https://cdn.tgdd.vn/Products/Images/2513/212754/bhx/gao-vinh-hien-dac-san-st24-tui-2kg-202109201352377808_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(5, 3, 1, 'Gạo lứt tím Vinh Hiển túi 1kg', 'gao-lut-tim-vinh-hien-tui-1kg', 48000, 'https://cdn.tgdd.vn/Products/Images/2513/262354/bhx/gao-lut-tim-vinh-hien-tui-1kg-202301090824554250_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(6, 4, 1, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 'gao-tam-thom-thanh-yen-vinh-hien-tui-2kg', 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(7, 2, 1, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 'nep-cai-hoa-vang-vinh-hien-tui-1kg', 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(8, 2, 1, 'Nếp sáp Vinh Hiển túi 1kg', 'nep-sap-vinh-hien-tui-1kg', 31000, 'https://cdn.tgdd.vn/Products/Images/2513/225003/bhx/nep-sap-vinh-hien-tui-1kg-202103040826093614_300x300.jpg', NULL, '2023-05-31 16:45:59', NULL, NULL, 1, 1, 0),
(9, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 'gao-thom-vua-gao-dam-da-st24-tui-2kg', 195000, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(10, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 2kg', 'gao-thom-vua-gao-phu-sa-tui-2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/159560/bhx/gao-thom-vua-gao-phu-sa-tui-2kg-202208262020594337_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(11, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà túi 5kg', 'gao-thom-vua-gao-dam-da-tui-5kg', 140000, 'https://cdn.tgdd.vn/Products/Images/2513/182769/bhx/gao-thom-vua-gao-dam-da-tui-5kg-202106041129447653_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(12, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 5kg', 'gao-thom-vua-gao-phu-sa-tui-5kg', 138000, 'https://cdn.tgdd.vn/Products/Images/2513/159557/bhx/gao-thom-vua-gao-phu-sa-tui-5kg-202103040839353887_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(13, 1, 2, 'Gạo thơm Vua Gạo ST25 túi 2kg', 'gao-thom-vua-gao-st25-tui-2kg', 79000, 'https://cdn.tgdd.vn/Products/Images/2513/253156/bhx/gao-thom-vua-gao-st25-tui-2kg-202111200945235942_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(14, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 'gao-thom-vua-gao-dam-da-st24-tui-2kg-2', 64000, 'https://cdn.tgdd.vn/Products/Images/2513/182768/bhx/gao-thom-vua-gao-dam-da-st24-tui-2kg-202201151549502331_300x300.jpg', NULL, '2023-05-31 16:56:51', NULL, NULL, 1, 1, 0),
(15, 1, 3, 'Gạo thơm Hạt Ngọc Trời Thiên Vương túi 5kg', 'gao-thom-hat-ngoc-troi-thien-vuong-tui-5kg', 194500, 'https://cdn.tgdd.vn/Products/Images/2513/236952/bhx/gao-thom-hat-ngoc-troi-thien-vuong-tui-5kg-202104261519374512_300x300.jpeg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(16, 1, 3, 'Gạo Hạt Ngọc Trời Tiên Nữ túi 5kg', 'gao-hat-ngoc-troi-tien-nu-tui-5kg', 151000, 'https://cdn.tgdd.vn/Products/Images/2513/77530/bhx/-202210270823579419_300x300.jpg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(17, 1, 3, 'Gạo Hạt Ngọc Trời Thiên Long túi 5kg', '', 113000, 'https://cdn.tgdd.vn/Products/Images/2513/77531/bhx/gao-hat-ngoc-troi-thien-long-tui-5kg-202301132158171031_300x300.jpg', NULL, '2023-05-31 16:59:44', NULL, NULL, 1, 1, 0),
(18, 1, 3, 'Gạo Hạt Ngọc Trời Bạch Dương túi 5kg', 'gao-hat-ngoc-troi-bach-duong-tui-5kg', 112000, 'https://cdn.tgdd.vn/Products/Images/2513/79016/bhx/gao-hat-ngoc-troi-bach-duong-tui-5kg-202210270826470675_300x300.jpg', NULL, '2023-05-31 17:00:55', NULL, NULL, 1, 1, 0),
(19, 3, 5, 'Gạo lứt huyết rồng Lotus Rice NutriChoice hộp 0,5kg', 'gao-lut-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg', 43400, 'https://cdn.tgdd.vn/Products/Images/2513/203887/bhx/gao-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg-202103040832315314_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(20, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 2kg', 'gao-thom-lai-lotus-rice-jasmine-tui-2kg', 50500, 'https://cdn.tgdd.vn/Products/Images/2513/87310/bhx/gao-thom-lai-lotus-rice-jasmine-tui-2kg-202103040836123362_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(21, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 5kg', 'gao-thom-lai-lotus-rice-jasmine-tui-5kg', 132000, 'https://cdn.tgdd.vn/Products/Images/2513/82845/bhx/gao-thom-lai-lotus-rice-jasmine-tui-5kg-202103040834438617_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(22, 3, 5, 'Gạo lứt tím than Lotus Rice NutriChoice hộp 0,5kg', 'gao-lut-tim-than-lotus-rice-nutrichoice-hop-0-5kg', 62000, 'https://cdn.tgdd.vn/Products/Images/2513/203888/bhx/gao-tim-than-lotus-rice-nutrichoice-hop-0-5kg-202103040805168587_300x300.jpg', NULL, '2023-05-31 17:04:51', NULL, NULL, 1, 1, 0),
(23, 1, 6, 'Gạo Lạc Việt đệ nhất ST25 túi 5kg', 'gao-lac-viet-de-nhat-st25-tui-5kg', 175000, 'https://cdn.tgdd.vn/Products/Images/2513/279506/bhx/gao-lac-viet-de-nhat-st25-tui-5kg-202210110941589891_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(24, 1, 6, 'Gạo Lạc Việt hảo hạng ST24 túi 5kg', 'gao-lac-viet-hao-hang-st24-tui-5kg', 160000, 'https://cdn.tgdd.vn/Products/Images/2513/279507/bhx/gao-lac-viet-hao-hang-st24-tui-5kg-202210110942572190_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(25, 1, 6, 'Gạo Lạc Việt dẻo thơm ST5 túi 5kg', 'gao-lac-viet-deo-thom-st5-tui-5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/279514/bhx/gao-lac-viet-deo-thom-st5-tui-5kg-202210110942352192_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(26, 1, 6, 'Gạo Lạc Việt XK51 túi 5kg', 'gao-lac-viet-xk51-tui-5kg', 110000, 'https://cdn.tgdd.vn/Products/Images/2513/279509/bhx/gao-lac-viet-xk51-tui-5kg-202205211713507395_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(27, 1, 6, 'Gạo Lạc Việt hương lúa túi 5kg', 'gao-lac-viet-huong-lua-tui-5kg', 125000, 'https://cdn.tgdd.vn/Products/Images/2513/279513/bhx/gao-lac-viet-huong-lua-tui-5kg-202205211715591470_300x300.jpg', NULL, '2023-05-31 17:08:33', NULL, NULL, 1, 1, 0),
(28, 1, 4, 'Gạo hương lài An Gia túi 5kg', 'gao-huong-lai-an-gia-tui-5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/265867/bhx/gao-huong-lai-an-gia-tui-5kg-202201061054309814_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(29, 1, 4, 'Gạo An Gia Nàng Hoa túi 5kg', 'gao-an-gia-nang-hoa-tui-5kg', 117500, 'https://cdn.tgdd.vn/Products/Images/2513/266095/bhx/gao-an-gia-nang-hoa-tui-5kg-202201061053517481_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(30, 1, 4, 'Gạo An Gia Jasmine túi 5kg', 'gao-an-gia-jasmine-tui-5kg', 105000, 'https://cdn.tgdd.vn/Products/Images/2513/265892/bhx/gao-an-gia-jasmine-tui-5kg-202201061054059032_300x300.jpg', NULL, '2023-05-31 17:12:37', NULL, NULL, 1, 1, 0),
(31, 2, 7, 'Nếp than PMT túi 1kg', 'nep-than-pmt-tui-1kg3', 55500, 'https://cdn.tgdd.vn/Products/Images/2513/146577/bhx/nep-than-pmt-tui-1kg-202103040831126066_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(32, 3, 7, 'Gạo lức huyết rồng PMT túi 2kg', 'gao-luc-huyet-rong-pmt-tui-2kg', 100000, 'https://cdn.tgdd.vn/Products/Images/2513/146578/bhx/-202210150921521038_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(33, 3, 7, 'Gạo lức huyết rồng PMT túi 1kg', 'gao-luc-huyet-rong-pmt-tui-1kg', 54500, 'https://cdn.tgdd.vn/Products/Images/2513/138644/bhx/gao-luc-huyet-rong-pmt-tui-1kg-202103040823523914_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(34, 3, 7, 'Gạo lức PMT túi 2kg', 'gao-luc-pmt-tui-2kg', 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(35, 4, 7, 'Gạo tấm thơm PMT túi 2kg', 'gao-tam-thom-pmt-tui-2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/146580/bhx/gao-tam-thom-pmt-tui-2kg-202303261932283448_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0),
(36, 2, 7, 'Nếp ngỗng PMT túi 1kg', 'nep-ngong-pmt-tui-1kg', 33000, 'https://cdn.tgdd.vn/Products/Images/2513/146576/bhx/nep-ngong-pmt-tui-1kg-202103040808176553_300x300.jpg', NULL, '2023-05-31 17:18:18', NULL, NULL, 1, 1, 0);

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
  `slug` varchar(255) NOT NULL,
  `urlHinhTH` varchar(255) DEFAULT NULL,
  `thuTu` int(11) NOT NULL,
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 hien thi, \r\n0 an'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieusp`
--

INSERT INTO `thuonghieusp` (`idTH`, `tenTH`, `slug`, `urlHinhTH`, `thuTu`, `anHien`) VALUES
(1, 'Vinh Hiển', 'vinh-hien', '/upload/images/thuonghieuSP\\2023-07-22_1690037870_vinh-hien-21072022145433.jpg', 1, 1),
(2, 'Vua Gạo', 'vua-gao', '/upload/images/thuonghieuSP\\2023-07-22_1690037880_vua-gao-05042021172031.jpg', 2, 1),
(3, 'Hạt Ngọc Trời', 'hat-ngoc-troi', '/upload/images/thuonghieuSP\\2023-07-22_1690037890_hat-ngoc-troi-05042021235620.jpg', 3, 1),
(4, 'An gia', 'an-gia', '/upload/images/thuonghieuSP\\2023-07-22_1690037899_an-gia-04042021002.jpg', 4, 1),
(5, 'Lotus Rice', 'lotus-rice', '/upload/images/thuonghieuSP\\2023-07-22_1690037908_lotus-rice-0404202123823.jpg', 5, 1),
(6, 'Lạc Việt', 'lac-viet', '/upload/images/thuonghieuSP\\2023-07-22_1690037922_lac-viet-2506202295023.jpg', 6, 1),
(7, 'PMT', 'pmt', '/upload/images/thuonghieuSP\\2023-07-22_1690037965_pmt-15032021131922.jpg', 7, 1),
(8, 'Vibigaba', 'vibigaba', '/upload/images/thuonghieuSP\\2023-07-22_1690037974_vibigaba-05042021163544.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 admin,\r\n0 user',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active,\r\n0 inactive',
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `avatar`, `address`, `role`, `active`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'Duy Bảo', 'tdb1304@gmail.com', '123123', '/upload/images/profile\\2023-08-15_1692113831_360_F_432860224_PpBBcVzMlzvgqPx1z0ygcZPhccgXS1ui.jpg', '343434', 1, 1, '$2y$10$pCcZNI9tWgFVG1NsLHMJEePkZESVg4P7svf14mtdQuCByIHJ8AoIS', '2023-08-03 08:12:24', 'YU9bfBtLytp47cDFQMdpQjyXhPFiqAkqgEYzS68xPWfE9blzf8nUqVdm5FpJ', '2023-08-03 08:07:41', '2023-08-15 08:37:11'),
(10, 'Phan Văn Hùng', '343432@gmail.comrrr555', '5456546455', NULL, '21212', 1, 0, '$2y$10$nP0uKqaQArzUwpaibydj1OzYqw7gNvLVmKeZS2vvkqRFBEs1yO7fy', '2023-08-04 02:59:52', NULL, '2023-08-04 02:54:23', '2023-08-05 06:44:20'),
(11, 'Trần Duy Bảo', 'baotd1304@gmail.com4343434', '121212', NULL, NULL, 1, 0, '$2y$10$mSa.91tXsQYB.h5jSaXy8uhxdxptMMghtFa4oZ89ZqzIhCmBX4i/m', NULL, NULL, '2023-08-04 03:40:54', '2023-08-05 06:47:21'),
(12, 'Trần Duy Bảo', 'baotd1304@gmail.xn--com4rr34343434-ukb', '343535354343', '/upload/images/profile\\2023-08-05_1691243332_360_F_432860224_PpBBcVzMlzvgqPx1z0ygcZPhccgXS1ui.jpg', NULL, 1, 0, '$2y$10$wHumpfwYnRvkr.A6vj.4TumaDo.jHvx.EVM5gAkK5y/vF0pXM90qC', NULL, NULL, '2023-08-04 03:42:21', '2023-08-05 06:48:52'),
(13, 'Trần Duy Bảo', 'baotd1304@gmail.com', '123434343434', NULL, '3333', 0, 1, '$2y$10$lU.7/Rmgx2NJR/FkqqA1nO9nR0cYx8SpwaPfptDUO3xdmhrJU.Y.2', '2023-08-04 07:01:29', NULL, '2023-08-04 07:01:09', '2023-08-04 07:18:29'),
(19, 'Nguyen Van A', 'nguyenvana@gmail.com', '123456', NULL, NULL, 0, 1, '$2y$10$yfaRaU3XdsK1w6drYaAQNuUVH.Mbqho6kymadEJACEpmiURebIoeO', NULL, NULL, '2023-08-09 01:39:17', '2023-08-09 01:39:17');

--
-- Chỉ mục cho các bảng đã đổ
--

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
  ADD KEY `binhluan_fk_idSP` (`idSP`),
  ADD KEY `idND` (`idND`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`idCTHD`),
  ADD KEY `chitiethoadon_fk_idHD` (`idHD`),
  ADD KEY `chitiethoadon_fk_idSP` (`idSP`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idBV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `idMGG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_temp`
--
ALTER TABLE `order_temp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_fk_idND` FOREIGN KEY (`idND`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `hoadon_fk_idND` FOREIGN KEY (`idND`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
