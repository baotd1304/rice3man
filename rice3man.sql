-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th9 05, 2023 lúc 11:20 AM
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
(17, 4, 10, NULL, 'Nhân viên tư vấn nhiệt tình, sản phẩm đa dạng', '2023-08-05 23:01:10', 1),
(18, 5, 11, NULL, 'Gạo lứt của website rất chất lượng mà giá cả hợp lý', '2023-08-05 23:01:10', 1),
(19, 1, 9, NULL, 't4tretret', '2023-08-05 23:01:10', 1),
(20, 1, 9, NULL, 'Sản phẩm chất lượng, giao hàng nhanh chóng', '2023-08-05 23:06:47', 1),
(21, 2, 9, NULL, 'Giao hàng đúng giờ, nhân viên tư vấn nhiệt tình', '2023-08-05 23:06:47', 1),
(22, 3, 10, NULL, 'Gạo rất ngon, mềm dẻo và thươm', '2023-08-05 23:06:47', 1),
(23, 5, 10, NULL, 'Nhân viên tư vấn nhiệt tình, sản phẩm đa dạng, phong phú', '2023-08-05 23:06:47', 1),
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
(49, 32, 9, 48, 'dsdsd', '2023-08-21 14:38:06', 1),
(50, 10, 9, 0, 'console.log', '2023-08-22 18:53:03', 1);

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
(50, 51, 6, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 1, 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg'),
(51, 52, 33, 'Gạo lức huyết rồng PMT túi 1kg', 2, 54500, 'https://cdn.tgdd.vn/Products/Images/2513/138644/bhx/gao-luc-huyet-rong-pmt-tui-1kg-202103040823523914_300x300.jpg'),
(52, 52, 32, 'Gạo lức huyết rồng PMT túi 2kg', 3, 100000, 'https://cdn.tgdd.vn/Products/Images/2513/146578/bhx/-202210150921521038_300x300.jpg');

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
  `tenNguoiNhan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
(51, 9, 2, 184140, '2023-08-20 20:47:42', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434fdfd, Xã Cẩm Đông, Huyện Cẩm Giàng, Tỉnh Hải Dương', 'ID59blojfU'),
(52, 9, 4, 290800, '2023-08-21 15:00:43', 1, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Tri Phương, Huyện Tiên Du, Tỉnh Bắc Ninh', '4X6XDQCaQk'),
(53, 9, NULL, 0, '2023-08-22 18:59:52', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Phường Nam Khê, Thành phố Uông Bí, Tỉnh Quảng Ninh', 'VbmXKBgopp'),
(54, 9, NULL, 0, '2023-08-22 19:00:08', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Long Châu, Huyện Yên Phong, Tỉnh Bắc Ninh', 'xYUZfxcVKR'),
(55, 9, NULL, 0, '2023-08-22 19:37:56', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Thị trấn Kim Long, Huyện Tam Dương, Tỉnh Vĩnh Phúc', 'IcbQyZVu1i'),
(56, 9, NULL, 0, '2023-08-22 19:39:44', 0, 0, 0, 'Duy Bảo', 'tdb1304@gmail.com', 123123, '343434, Xã Tri Phương, Huyện Tiên Du, Tỉnh Bắc Ninh', 'q1ErbdjvR8');

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
(6, 'Gạo mầm, hỗn hợp', 'gao-mam-hon-hop', 6, 1),
(7, '4242424', '4242424', 4, 0);

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
(4, 'Giam20pt', 'Giảm 20% giá trị đơn hàng', 1, 20, 200000, 1, NULL, NULL, NULL, 1),
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
(13, NULL, NULL, 26000, 'ATM', 0, 'Duy Bảo', 'tdb1304@gmail.com', 'Tỉnh Bắc Ninh', 'Huyện Tiên Du', 'Xã Đại Đồng', 'Quận 12, TP Hồ Chí Minh', '123123', NULL, NULL, '2023-08-17 23:08:39', '2023-08-17 23:08:39'),
(19, 9, NULL, 0, 'ATM', 0, 'Duy Bảo', 'tdb1304@gmail.com', 'Tỉnh Quảng Ninh', 'Huyện Bình Liêu', 'Xã Đồng Văn', '343434', '123123', NULL, NULL, '2023-08-22 05:07:11', '2023-08-22 05:07:11');

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
('baotd1304@gmail.xn--com4rr34343434-ukb', '$2y$10$sywqKKXWKD3t2A5rY2m4OODDezHa6rH3831qvn5oRfdNrpEg2r/WO', '2023-08-04 03:48:05'),
('tdb1304@gmail.com', '$2y$10$evlDzlIjUl9R5jAHUjBRcONlQtPGJzUE7/hCK6S3vAmm6QQ.K3Jpq', '2023-08-21 21:50:41');

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
  `anHien` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la hien thi, 0 la an',
  `noiBat` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 la noi bat, 0 la k noi bat',
  `discount` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`idSP`, `idLoai`, `idTH`, `tenSP`, `slug`, `giaSP`, `urlHinh`, `moTa`, `ngayDang`, `anHien`, `noiBat`, `discount`) VALUES
(1, 1, 1, 'Gạo Trạng Nguyên Vinh Hiển ST25 túi 5kg', 'gao-trang-nguyen-vinh-hien-st25-tui-5kg', 129000, 'https://cdn.tgdd.vn/Products/Images/2513/298801/bhx/gao-dac-san-trang-nguyen-vinh-hien-st25-tui-5kg-202212131033425735_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(2, 1, 1, 'Gạo còn cám Vinh Hiển Khổng Tước Nguyên túi 5kg', 'gao-con-cam-vinh-hien-khong-tuoc-nguyen-tui-5kg', 83300, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(3, 1, 1, 'Gạo Vinh Hiển Đỗ Quyên túi 5kg', 'gao-vinh-hien-do-quyen-tui-5kg', 78000, 'https://cdn.tgdd.vn/Products/Images/2513/193609/bhx/gao-vinh-hien-do-quyen-tui-5kg-202111021628092012_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(4, 1, 1, 'Gạo Vinh Hiển đặc sản ST24 túi 2kg', 'gao-vinh-hien-dac-san-st24-tui-2kg', 60000, 'https://cdn.tgdd.vn/Products/Images/2513/212754/bhx/gao-vinh-hien-dac-san-st24-tui-2kg-202109201352377808_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(5, 3, 1, 'Gạo lứt tím Vinh Hiển túi 1kg', 'gao-lut-tim-vinh-hien-tui-1kg', 48000, 'https://cdn.tgdd.vn/Products/Images/2513/262354/bhx/gao-lut-tim-vinh-hien-tui-1kg-202301090824554250_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(6, 4, 1, 'Gạo tấm thơm Thanh Yến Vinh Hiển túi 2kg', 'gao-tam-thom-thanh-yen-vinh-hien-tui-2kg', 38000, 'https://cdn.tgdd.vn/Products/Images/2513/262356/bhx/gao-tam-thom-thanh-yen-vinh-hien-tui-2kg-202112151346079514_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(7, 2, 1, 'Nếp cái hoa vàng Vinh Hiển túi 1kg', 'nep-cai-hoa-vang-vinh-hien-tui-1kg', 36000, 'https://cdn.tgdd.vn/Products/Images/2513/227004/bhx/nep-cai-hoa-vang-vinh-hien-tui-1kg-202103040830355507_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(8, 2, 1, 'Nếp sáp Vinh Hiển túi 1kg', 'nep-sap-vinh-hien-tui-1kg', 31000, 'https://cdn.tgdd.vn/Products/Images/2513/225003/bhx/nep-sap-vinh-hien-tui-1kg-202103040826093614_300x300.jpg', NULL, '2023-05-31 16:45:59', 1, 1, 0),
(9, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 'gao-thom-vua-gao-dam-da-st24-tui-2kg', 195000, 'https://cdn.tgdd.vn/Products/Images/2513/193613/bhx/-202304060918080104_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(10, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 2kg', 'gao-thom-vua-gao-phu-sa-tui-2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/159560/bhx/gao-thom-vua-gao-phu-sa-tui-2kg-202208262020594337_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(11, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà túi 5kg', 'gao-thom-vua-gao-dam-da-tui-5kg', 140000, 'https://cdn.tgdd.vn/Products/Images/2513/182769/bhx/gao-thom-vua-gao-dam-da-tui-5kg-202106041129447653_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(12, 1, 2, 'Gạo thơm Vua Gạo Phù Sa túi 5kg', 'gao-thom-vua-gao-phu-sa-tui-5kg', 138000, 'https://cdn.tgdd.vn/Products/Images/2513/159557/bhx/gao-thom-vua-gao-phu-sa-tui-5kg-202103040839353887_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(13, 1, 2, 'Gạo thơm Vua Gạo ST25 túi 2kg', 'gao-thom-vua-gao-st25-tui-2kg', 79000, 'https://cdn.tgdd.vn/Products/Images/2513/253156/bhx/gao-thom-vua-gao-st25-tui-2kg-202111200945235942_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(14, 1, 2, 'Gạo thơm Vua Gạo Đậm Đà ST24 túi 2kg', 'gao-thom-vua-gao-dam-da-st24-tui-2kg-2', 64000, 'https://cdn.tgdd.vn/Products/Images/2513/182768/bhx/gao-thom-vua-gao-dam-da-st24-tui-2kg-202201151549502331_300x300.jpg', NULL, '2023-05-31 16:56:51', 1, 1, 0),
(15, 1, 3, 'Gạo thơm Hạt Ngọc Trời Thiên Vương túi 5kg', 'gao-thom-hat-ngoc-troi-thien-vuong-tui-5kg', 194500, 'https://cdn.tgdd.vn/Products/Images/2513/236952/bhx/gao-thom-hat-ngoc-troi-thien-vuong-tui-5kg-202104261519374512_300x300.jpeg', NULL, '2023-05-31 16:59:44', 1, 1, 0),
(16, 1, 3, 'Gạo Hạt Ngọc Trời Tiên Nữ túi 5kg', 'gao-hat-ngoc-troi-tien-nu-tui-5kg', 151000, 'https://cdn.tgdd.vn/Products/Images/2513/77530/bhx/-202210270823579419_300x300.jpg', NULL, '2023-05-31 16:59:44', 1, 1, 0),
(17, 1, 3, 'Gạo Hạt Ngọc Trời Thiên Long túi 5kg', '', 113000, 'https://cdn.tgdd.vn/Products/Images/2513/77531/bhx/gao-hat-ngoc-troi-thien-long-tui-5kg-202301132158171031_300x300.jpg', NULL, '2023-05-31 16:59:44', 1, 1, 0),
(18, 1, 3, 'Gạo Hạt Ngọc Trời Bạch Dương túi 5kg', 'gao-hat-ngoc-troi-bach-duong-tui-5kg', 112000, 'https://cdn.tgdd.vn/Products/Images/2513/79016/bhx/gao-hat-ngoc-troi-bach-duong-tui-5kg-202210270826470675_300x300.jpg', NULL, '2023-05-31 17:00:55', 1, 1, 0),
(19, 3, 5, 'Gạo lứt huyết rồng Lotus Rice NutriChoice hộp 0,5kg', 'gao-lut-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg', 43400, 'https://cdn.tgdd.vn/Products/Images/2513/203887/bhx/gao-huyet-rong-lotus-rice-nutrichoice-hop-0-5kg-202103040832315314_300x300.jpg', NULL, '2023-05-31 17:04:51', 1, 1, 0),
(20, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 2kg', 'gao-thom-lai-lotus-rice-jasmine-tui-2kg', 50500, 'https://cdn.tgdd.vn/Products/Images/2513/87310/bhx/gao-thom-lai-lotus-rice-jasmine-tui-2kg-202103040836123362_300x300.jpg', NULL, '2023-05-31 17:04:51', 1, 1, 0),
(21, 1, 5, 'Gạo thơm lài Lotus Rice Jasmine túi 5kg', 'gao-thom-lai-lotus-rice-jasmine-tui-5kg', 132000, 'https://cdn.tgdd.vn/Products/Images/2513/82845/bhx/gao-thom-lai-lotus-rice-jasmine-tui-5kg-202103040834438617_300x300.jpg', NULL, '2023-05-31 17:04:51', 1, 1, 0),
(22, 3, 5, 'Gạo lứt tím than Lotus Rice NutriChoice hộp 0,5kg', 'gao-lut-tim-than-lotus-rice-nutrichoice-hop-0-5kg', 62000, 'https://cdn.tgdd.vn/Products/Images/2513/203888/bhx/gao-tim-than-lotus-rice-nutrichoice-hop-0-5kg-202103040805168587_300x300.jpg', NULL, '2023-05-31 17:04:51', 1, 1, 0),
(23, 1, 6, 'Gạo Lạc Việt đệ nhất ST25 túi 5kg', 'gao-lac-viet-de-nhat-st25-tui-5kg', 175000, 'https://cdn.tgdd.vn/Products/Images/2513/279506/bhx/gao-lac-viet-de-nhat-st25-tui-5kg-202210110941589891_300x300.jpg', NULL, '2023-05-31 17:08:33', 1, 1, 0),
(24, 1, 6, 'Gạo Lạc Việt hảo hạng ST24 túi 5kg', 'gao-lac-viet-hao-hang-st24-tui-5kg', 160000, 'https://cdn.tgdd.vn/Products/Images/2513/279507/bhx/gao-lac-viet-hao-hang-st24-tui-5kg-202210110942572190_300x300.jpg', NULL, '2023-05-31 17:08:33', 1, 1, 0),
(25, 1, 6, 'Gạo Lạc Việt dẻo thơm ST5 túi 5kg', 'gao-lac-viet-deo-thom-st5-tui-5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/279514/bhx/gao-lac-viet-deo-thom-st5-tui-5kg-202210110942352192_300x300.jpg', NULL, '2023-05-31 17:08:33', 1, 1, 0),
(26, 1, 6, 'Gạo Lạc Việt XK51 túi 5kg', 'gao-lac-viet-xk51-tui-5kg', 110000, 'https://cdn.tgdd.vn/Products/Images/2513/279509/bhx/gao-lac-viet-xk51-tui-5kg-202205211713507395_300x300.jpg', NULL, '2023-05-31 17:08:33', 1, 1, 0),
(27, 1, 6, 'Gạo Lạc Việt hương lúa túi 5kg', 'gao-lac-viet-huong-lua-tui-5kg', 125000, 'https://cdn.tgdd.vn/Products/Images/2513/279513/bhx/gao-lac-viet-huong-lua-tui-5kg-202205211715591470_300x300.jpg', NULL, '2023-05-31 17:08:33', 1, 1, 0),
(28, 1, 4, 'Gạo hương lài An Gia túi 5kg', 'gao-huong-lai-an-gia-tui-5kg', 130000, 'https://cdn.tgdd.vn/Products/Images/2513/265867/bhx/gao-huong-lai-an-gia-tui-5kg-202201061054309814_300x300.jpg', NULL, '2023-05-31 17:12:37', 1, 1, 0),
(29, 1, 4, 'Gạo An Gia Nàng Hoa túi 5kg', 'gao-an-gia-nang-hoa-tui-5kg', 117500, 'https://cdn.tgdd.vn/Products/Images/2513/266095/bhx/gao-an-gia-nang-hoa-tui-5kg-202201061053517481_300x300.jpg', NULL, '2023-05-31 17:12:37', 1, 1, 0),
(30, 1, 4, 'Gạo An Gia Jasmine túi 5kg', 'gao-an-gia-jasmine-tui-5kg', 105000, 'https://cdn.tgdd.vn/Products/Images/2513/265892/bhx/gao-an-gia-jasmine-tui-5kg-202201061054059032_300x300.jpg', NULL, '2023-05-31 17:12:37', 1, 1, 0),
(31, 2, 7, 'Nếp than PMT túi 1kg', 'nep-than-pmt-tui-1kg3', 55500, 'https://cdn.tgdd.vn/Products/Images/2513/146577/bhx/nep-than-pmt-tui-1kg-202103040831126066_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0),
(32, 3, 7, 'Gạo lức huyết rồng PMT túi 2kg', 'gao-luc-huyet-rong-pmt-tui-2kg', 100000, 'https://cdn.tgdd.vn/Products/Images/2513/146578/bhx/-202210150921521038_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0),
(33, 3, 7, 'Gạo lức huyết rồng PMT túi 1kg', 'gao-luc-huyet-rong-pmt-tui-1kg', 54500, 'https://cdn.tgdd.vn/Products/Images/2513/138644/bhx/gao-luc-huyet-rong-pmt-tui-1kg-202103040823523914_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0),
(34, 3, 7, 'Gạo lức PMT túi 2kg', 'gao-luc-pmt-tui-2kg', 48500, 'https://cdn.tgdd.vn/Products/Images/2513/146579/bhx/-202210150924135415_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0),
(35, 4, 7, 'Gạo tấm thơm PMT túi 2kg', 'gao-tam-thom-pmt-tui-2kg', 42000, 'https://cdn.tgdd.vn/Products/Images/2513/146580/bhx/gao-tam-thom-pmt-tui-2kg-202303261932283448_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0),
(36, 2, 7, 'Nếp ngỗng PMT túi 1kg', 'nep-ngong-pmt-tui-1kg', 33000, 'https://cdn.tgdd.vn/Products/Images/2513/146576/bhx/nep-ngong-pmt-tui-1kg-202103040808176553_300x300.jpg', NULL, '2023-05-31 17:18:18', 1, 1, 0);

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
(9, 'Duy Bảo', 'tdb1304@gmail.com', '123123', '/upload/images/profile\\2023-08-15_1692113831_360_F_432860224_PpBBcVzMlzvgqPx1z0ygcZPhccgXS1ui.jpg', '343434', 1, 1, '$2y$10$IHHKrHG.iv.mYKkWN/.B/.vN2CoX3VZ6TKFyckUTcDDCFwzFJtW3G', '2023-08-03 08:12:24', 'eCIIJHqxTMijGWNoCqx8tE7A0NbUwiTYkTPrQfAJM3P3r2v30NdDsfcAEebg', '2023-08-03 08:07:41', '2023-08-21 21:48:30'),
(10, 'Phan Văn Hùng', '343432@gmail.comrrr555', '5456546455', NULL, '21212', 1, 0, '$2y$10$nP0uKqaQArzUwpaibydj1OzYqw7gNvLVmKeZS2vvkqRFBEs1yO7fy', '2023-08-04 02:59:52', NULL, '2023-08-04 02:54:23', '2023-08-05 06:44:20'),
(11, 'Trần Duy Bảo', 'baotd1304@gmail.com4343434', '121212', NULL, NULL, 1, 0, '$2y$10$IHHKrHG.iv.mYKkWN/.B/.vN2CoX3VZ6TKFyckUTcDDCFwzFJtW3G', NULL, 'ucvL9i1WohyiJL4bbYPlY4L2yRvziRqQgRTKivtjQ34Wsv6bfmZLu1EYTsex', '2023-08-04 03:40:54', '2023-08-21 23:46:11'),
(12, 'Trần Duy Bảo', 'baotd1304@gmail.xn--com4rr34343434-ukb', '343535354343', '/upload/images/profile\\2023-08-05_1691243332_360_F_432860224_PpBBcVzMlzvgqPx1z0ygcZPhccgXS1ui.jpg', NULL, 1, 0, '$2y$10$wHumpfwYnRvkr.A6vj.4TumaDo.jHvx.EVM5gAkK5y/vF0pXM90qC', NULL, NULL, '2023-08-04 03:42:21', '2023-08-05 06:48:52'),
(13, 'Trần Duy Bảo', 'baotd1304@gmail.com', '123434343434', NULL, '3333', 0, 1, '$2y$10$lU.7/Rmgx2NJR/FkqqA1nO9nR0cYx8SpwaPfptDUO3xdmhrJU.Y.2', '2023-08-04 07:01:29', NULL, '2023-08-04 07:01:09', '2023-08-04 07:18:29'),
(19, 'Nguyen Van A', 'nguyenvana@gmail.com', '123456', NULL, NULL, 0, 1, '$2y$10$yfaRaU3XdsK1w6drYaAQNuUVH.Mbqho6kymadEJACEpmiURebIoeO', NULL, NULL, '2023-08-09 01:39:17', '2023-08-09 01:39:17'),
(21, 'Phan Duy Long', 'reyes72@example.com', '+13077995611', '/upload/images/profile/caf9df27-a23e-34a1-8fb1-c6ef43e036c7.png', '59956 Hodkiewicz Flat Suite 935\nEast Miguelshire, UT 42744', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'SdBdbCv4sa', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(22, 'Phan Minh Long', 'ole14@example.org', '+17548146227', '/upload/images/profile/076421ba-12da-33b9-be35-edd05c850351.png', '29339 Mraz Mews Apt. 486\nThompsontown, NJ 35733', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'lYuHbRRyvj', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(23, 'Phan Quốc Bảo', 'fay.borer@example.com', '+16018179271', '/upload/images/profile/3767c02d-1006-3744-a933-dbf484f43096.png', '93662 Wolf Fields Suite 079\nNorth Glennie, CT 19602-2118', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'RWWOaA3F7A', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(24, 'Phan Quốc Trường', 'ansel.skiles@example.org', '+15176574704', '/upload/images/profile/a7b1e1a5-c5bb-330b-9cf2-d338f1f0e3e3.png', '781 Fadel View\nBauchtown, DC 35744-1173', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'fZQmUcxPQH', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(25, 'Nguyễn Huy Long', 'bheaney@example.net', '+12206496357', '/upload/images/profile/c2b8413f-4288-36be-bb45-ea9210c54549.png', '462 Jenkins Center Apt. 097\nNorth Doyle, KY 63646', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'JjSF5KKIb0', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(26, 'Võ Công Đạt', 'lemuel92@example.net', '+17573131964', '/upload/images/profile/fc454e3f-6d62-321d-b1e3-d74e33338daa.png', '8486 Kurt Manor\nNew Serenity, LA 50443-2957', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', '9Ru7TFOx4g', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(27, 'Trần Quốc Hùng', 'albertha.bechtelar@example.org', '+13327253564', '/upload/images/profile/0a902150-fe57-3465-8f34-f92eedf69d9b.png', '536 Virginie Mall\nPfannerstillbury, MO 32583-5317', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:02', 'ODrUtP0K3r', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(28, 'Lê Công Long', 'lokuneva@example.org', '+17316977828', '/upload/images/profile/2435943a-a148-3ea3-a141-3752eff509fc.png', '28185 Leannon Drive\nEast Luzmouth, LA 34533', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'kzTZtiivDc', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(29, 'Lê Quốc Hùng', 'yazmin.stamm@example.com', '+15136867608', '/upload/images/profile/2cd1bdd4-0bc0-3d6b-ba1b-5a3e3e1ccdb5.png', '791 Rahul Mews Suite 660\nWest Abnerbury, UT 08673', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ufYfS1d3hz', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(30, 'Trần Duy Hoàng', 'mbaumbach@example.org', '+16268426723', '/upload/images/profile/6655d65f-6018-3c75-af2c-fe7ce44a2de5.png', '867 Samantha Parkway Apt. 622\nVeumchester, AL 96406', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'wjJuha9Exp', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(31, 'Lê Huy Bảo', 'nledner@example.net', '+19494206445', '/upload/images/profile/6489ca53-64d8-313a-a809-5264d88128d4.png', '773 Antonina Mews Apt. 673\nHomenickmouth, NE 83514-8025', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'AH71WfoJzA', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(32, 'Nguyễn Quốc Hùng', 'hills.leola@example.net', '+19407176401', '/upload/images/profile/3ba1f06c-54ed-3cc4-ab0e-1d99730e9dd9.png', '71622 Rolfson Mall\nPort Nicoleland, CO 79612', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'n8dd9qSOLh', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(33, 'Phạm Huy Hoàng', 'weber.alverta@example.net', '+16022922514', '/upload/images/profile/5d29db2e-2379-3254-a0fb-b755ab18f912.png', '2752 Coleman Hill Suite 009\nDickinsonville, OH 96134', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'elNQg71Nfo', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(34, 'Võ Quốc Hoàng', 'carter.karen@example.com', '+13195334949', '/upload/images/profile/7a4fa010-66f8-3a63-a3cd-fb3a76b672b6.png', '4052 Herzog Expressway Suite 113\nLutherview, SD 08239-8107', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'msMSco5QNC', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(35, 'Trần Công Bảo', 'leda.emmerich@example.org', '+15179674841', '/upload/images/profile/e6976cd7-e3b2-3a0b-9535-70578f5ee2ec.png', '159 Giovani Inlet\nNew Orenchester, MN 20135-8273', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'tmDzSLmhH7', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(36, 'Lê Duy Long', 'rhauck@example.com', '+18602587924', '/upload/images/profile/b4b7d7ea-f51f-3a34-8fdc-1691ed19bb26.png', '89421 Shad Extension Suite 942\nBergstromchester, AL 51100', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '2x9E9xx23M', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(37, 'Trần Huy Trường', 'jordyn.hahn@example.com', '+19169729201', '/upload/images/profile/08d8a76a-046e-37dc-a63b-3a32436ad060.png', '4200 Runolfsson Orchard\nEast Celia, UT 62524', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'eD3uUKagtf', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(38, 'Trần Minh Long', 'trey31@example.com', '+13215312931', '/upload/images/profile/61307fba-f096-37a2-83c2-c5a6b8d85b4b.png', '654 Sipes Passage\nEast Edgardomouth, IL 14749', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'd6IUdpZrLi', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(39, 'Nguyễn Duy Long', 'qcorwin@example.org', '+18206322998', '/upload/images/profile/907b5c58-194d-3dc8-924e-fcca676977d3.png', '94085 Ward Viaduct\nSchaeferchester, WI 20112-7432', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'AyB4UGqeyE', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(40, 'Phan Huy Bảo', 'geraldine.feest@example.org', '+17577296667', '/upload/images/profile/1103eba3-4488-3996-bfa3-6739b6be5ea9.png', '868 Casandra Skyway\nBlakehaven, HI 16386', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'SAlcriMtKA', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(41, 'Lê Duy Trường', 'rodriguez.lilian@example.net', '+13607925792', '/upload/images/profile/87bd6406-3e60-3479-90ea-51bba216ccd0.png', '1651 Dee Cape Suite 407\nLeschside, DE 28528', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'yj12i2MVdG', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(42, 'Nguyễn Huy Long', 'henriette86@example.com', '+13213523861', '/upload/images/profile/a023a7c7-111f-3140-8f33-d4be85962558.png', '370 Amanda Well Apt. 296\nHeidenreichbury, IA 71768', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'tpMjyrX5cC', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(43, 'Phan Minh Bảo', 'rebeka33@example.net', '+17652586670', '/upload/images/profile/0d476a31-ba8b-3215-b2d8-e3eedbe4e779.png', '39700 Clement Circles Apt. 671\nWest Erna, NY 01215', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'lcTraPeGJt', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(44, 'Trần Duy Trường', 'horeilly@example.org', '+13077759339', '/upload/images/profile/10bd04be-94c0-364c-8f8d-39a7e15dc09a.png', '650 Araceli Plains\nNorth Sylvia, PA 06327', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'oNAE2WjDMg', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(45, 'Lê Văn Đạt', 'glowe@example.org', '+17076683132', '/upload/images/profile/2288c253-e423-3d5d-afe4-a2a014598720.png', '217 Jude Pass\nPort Jaleel, IN 45196-4096', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ZTYZpBYaA4', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(46, 'Phan Minh Long', 'ypfannerstill@example.com', '+14434496024', '/upload/images/profile/8bd91ed0-bbff-3a8e-860e-0ccaa109ae24.png', '64587 Feest Summit Suite 325\nHerzogside, AK 04348', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'iZPmFGKNrs', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(47, 'Phạm Minh Đạt', 'sigurd39@example.com', '+12629331266', '/upload/images/profile/05fe0a89-371a-3eee-b20d-b385b21cda01.png', '24308 Hermann Dam Suite 456\nUnabury, IL 20630-1588', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'avWLb1QyGf', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(48, 'Trần Công Hùng', 'dare.neil@example.com', '+12233468353', '/upload/images/profile/15367020-a665-363c-8c55-93a2cc183c46.png', '874 Kessler Tunnel\nColestad, IA 70889-6139', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'AgOt1BD5ak', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(49, 'Trần Quốc Đạt', 'jkuphal@example.net', '+14586540664', '/upload/images/profile/71e05371-58b5-30d1-ae09-da9816783f1b.png', '67898 Raoul Pine Apt. 916\nMadalynchester, CA 52522', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'EmYWJDifQp', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(50, 'Phạm Minh Hùng', 'bernita.welch@example.com', '+13476345053', '/upload/images/profile/80b8d7f3-676e-373d-883d-6817364cc5c8.png', '1008 Weimann Point\nJanickton, IA 78538-7701', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '5MKf3Gxn1j', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(51, 'Phạm Duy Bảo', 'lon.dubuque@example.net', '+19312940754', '/upload/images/profile/a546654e-a89a-3e88-bdff-29b90bb14a0a.png', '41605 Eva Curve Suite 928\nHeidenreichhaven, KY 67447-4371', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'dxwtcJzqnv', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(52, 'Võ Văn Hoàng', 'xgoodwin@example.com', '+19499846961', '/upload/images/profile/a66e5010-6fd7-3423-8e91-713fc5e076f0.png', '1725 Beatrice Grove\nEast Fredyville, OH 49765-3356', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'DJTmafNlNF', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(53, 'Lê Quốc Bảo', 'louvenia.botsford@example.org', '+19514667977', '/upload/images/profile/08efb19c-b325-364a-86ec-8b63d673671b.png', '7765 Larson Squares\nSouth Myrtleport, SC 56157', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'zaZnNlwrHK', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(54, 'Phạm Công Đạt', 'hfarrell@example.org', '+16806495025', '/upload/images/profile/66713f37-11e5-3e11-8ce1-538f1298fc1f.png', '75640 Leffler Mill\nNew Enrique, MI 42819', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'GpXHafyxv7', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(55, 'Nguyễn Duy Bảo', 'jharvey@example.net', '+19542832256', '/upload/images/profile/6b990e10-c804-3044-851c-b293ddf3003a.png', '365 Gottlieb Fort Apt. 062\nEast Adrianaton, SC 07509-9583', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ZzPngkIaAy', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(56, 'Võ Huy Long', 'kameron48@example.com', '+17203177472', '/upload/images/profile/9e1175b6-89c3-3bb8-b975-ad50bb5674bc.png', '86446 Breitenberg Club\nTreutelside, WY 76441-6618', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'yRDi8KSRLs', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(57, 'Trần Quốc Trường', 'alivia.marquardt@example.org', '+16824499599', '/upload/images/profile/c233704a-0f71-3c2e-b42b-2932bc369b02.png', '9933 Lea Path Apt. 999\nJakubowskiport, UT 05324', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'PXLEmzkJZt', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(58, 'Nguyễn Quốc Bảo', 'raegan34@example.com', '+17315677333', '/upload/images/profile/46b128f2-c3bd-3bf6-a0d7-1e4027ed9740.png', '69870 Giovanny Wall\nBoganshire, AL 61534-0372', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'UtIzB6kTj6', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(59, 'Phan Công Đạt', 'virginia.williamson@example.net', '+19036386831', '/upload/images/profile/99723966-d51b-3a9c-826b-9ffbdbdebd85.png', '76112 Gusikowski Junction\nPort Chaya, LA 28859-0841', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'gONmn3RrZg', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(60, 'Phạm Minh Long', 'nbosco@example.org', '+16789026747', '/upload/images/profile/fbb6ffc4-55eb-3326-9e65-63b9c3a96fad.png', '7948 Sawayn Alley\nHintzfort, VT 78804-3593', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'cexvTmMo6z', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(61, 'Nguyễn Công Hùng', 'nwhite@example.com', '+12346503544', '/upload/images/profile/ff766042-cb36-3903-ab1b-402e0ed1c05f.png', '2773 Miller Skyway Suite 127\nDenesikton, ND 62618', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '2DYPXOtl4Y', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(62, 'Trần Duy Hùng', 'bruen.maida@example.net', '+17575727780', '/upload/images/profile/95ef0d56-26cc-3c99-9e5e-43d7f5dfe40b.png', '81464 Kulas Mountains Suite 992\nCasperview, AK 68584-6499', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'g4n2J5ALf3', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(63, 'Lê Minh Bảo', 'bogisich.trey@example.org', '+19385871407', '/upload/images/profile/f94c26a1-f579-3aad-8dab-476c81c5608f.png', '6065 Emie Lane Suite 544\nPort Cody, NV 97879', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'G180dK4GuJ', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(64, 'Lê Duy Trường', 'nicolette77@example.com', '+17037258136', '/upload/images/profile/7a6d9b82-3d81-39ca-977f-3954c9b1608f.png', '48701 Mohr Shore Apt. 880\nLebsackfort, SC 98493', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '0ssZ1jD4wB', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(65, 'Phan Duy Bảo', 'zkoepp@example.net', '+18037550947', '/upload/images/profile/ef5fab4c-269f-3f66-8b7e-3d6fe51f436a.png', '908 Conn Lock\nNorth Zoila, NV 52624-8765', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'LxxDJjEC2J', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(66, 'Võ Duy Trường', 'grant.corene@example.com', '+16803503750', '/upload/images/profile/e6cb95fa-529e-3d7a-83c6-cc60c78d5dbd.png', '4813 Bradtke View Apt. 744\nPort Lindsay, TX 86167-4175', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'pUCjFsYtK6', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(67, 'Nguyễn Huy Hùng', 'hohara@example.net', '+16673642962', '/upload/images/profile/576b3c58-f380-3415-a473-5ec699ea3311.png', '951 Alfonso Islands\nWuckertville, KS 20478-1591', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'SlG1OfcFQI', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(68, 'Nguyễn Minh Đạt', 'mariane91@example.org', '+16185829347', '/upload/images/profile/0be64e09-382b-3214-806d-abb768bfc92a.png', '781 Rogahn Lock\nWest Maryse, LA 85217-5798', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'SgpjmZKZ37', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(69, 'Phan Công Bảo', 'alexandre76@example.com', '+13106417910', '/upload/images/profile/26bdd09d-fe80-300e-8b84-7d134b42c336.png', '77805 Tito Haven Apt. 910\nLake Verdie, CT 80635-8794', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '6mIetzKbKQ', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(70, 'Lê Huy Hùng', 'wilson26@example.com', '+18162196696', '/upload/images/profile/ef59d6f3-3940-3fc3-b29c-2986c9e56a77.png', '85641 Josiane Plains Suite 344\nPaigefort, WY 29888', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'Gle6xZ2mYx', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(71, 'Võ Huy Đạt', 'katarina.mccullough@example.net', '+18149401411', '/upload/images/profile/910831c3-448d-3f71-80e1-b5018a30edc7.png', '2614 Kulas Well\nNorth Liliane, TN 09434', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ZGSi5UlXVd', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(72, 'Phan Công Đạt', 'mcclure.abigale@example.com', '+19193138310', '/upload/images/profile/154cf36e-6aa1-3ceb-93b0-3ee16cd452eb.png', '707 Jazmyn Crescent\nLake Johnathanchester, VA 74319-6466', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'BUYdjFxALh', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(73, 'Lê Văn Trường', 'enid21@example.com', '+15395571106', '/upload/images/profile/d569dfc4-a2ae-3129-b90e-9e382ba20df2.png', '210 Kuhn Gardens Apt. 253\nLake Natalie, MS 26212', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'mBf1E3m8f7', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(74, 'Lê Quốc Long', 'connelly.wilburn@example.net', '+15042498479', '/upload/images/profile/a2c573bb-2d09-3332-8a6c-ce162b612ec4.png', '28453 Heaney Squares Apt. 429\nEast Hildegardland, UT 35087', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'i0O3zRF2Md', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(75, 'Võ Minh Hùng', 'janis43@example.org', '+15204941224', '/upload/images/profile/3769d4d0-1c2a-3043-8e93-6fa2fd42e245.png', '296 Shemar Land\nSchillerfurt, AR 16569', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'Vhcr87vtGA', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(76, 'Phan Minh Hoàng', 'spencer.carmen@example.net', '+12012533203', '/upload/images/profile/b39ca1f6-ba26-3812-be59-f5193f1ba413.png', '2136 Dayna Station Suite 968\nLake Abdullahhaven, OK 54651-0807', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'RrUfcYkV29', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(77, 'Trần Quốc Đạt', 'bosco.kayla@example.com', '+15706203332', '/upload/images/profile/15d440de-b265-381e-9cfe-6857757113f1.png', '51269 Destinee Roads Apt. 561\nPort Allisonville, WY 48497', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'kPkaD76ZTW', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(78, 'Phan Quốc Hùng', 'jayden.oconner@example.com', '+17626324933', '/upload/images/profile/c9b33aef-5d22-381f-8d67-c3f157bd421e.png', '9648 Oberbrunner Pines\nKuhlmanberg, OH 62793-2329', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'tINUYA4a96', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(79, 'Phan Minh Đạt', 'watsica.neva@example.com', '+18579700847', '/upload/images/profile/9d2d4e88-dd10-3d62-8e51-082e2280b2ca.png', '12155 Silas Ridge Suite 707\nPort Lindseychester, RI 24764', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'oqvC6wgI93', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(80, 'Lê Công Trường', 'isaias02@example.org', '+16012861004', '/upload/images/profile/d05427a5-51f0-3bb5-acbe-64814f86f12c.png', '7255 Kris Motorway Apt. 644\nPort Bethel, IL 51436-9059', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'mr0I6EcREp', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(81, 'Lê Duy Đạt', 'gia55@example.com', '+17638305225', '/upload/images/profile/719386c5-f93c-337d-bf76-1a26cf8cafa4.png', '5548 Trantow Route\nNorth Erickatown, HI 51293-5777', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '4u2OU4dJLc', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(82, 'Phan Quốc Đạt', 'wisozk.prince@example.net', '+16319145688', '/upload/images/profile/d1b12f46-1c26-3ab9-bee3-5027728b3195.png', '9537 Eloise Points Apt. 728\nLegrosshire, SC 90256', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', '2nWWueZRIB', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(83, 'Phan Quốc Hùng', 'homenick.teresa@example.com', '+13324890345', '/upload/images/profile/99fe8574-7826-3e37-9a4a-6646daed754e.png', '11339 Turner Crest Suite 524\nWest Dallinhaven, IN 15911-8597', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'oS1sM7UVBx', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(84, 'Phạm Văn Bảo', 'aharber@example.net', '+16784234254', '/upload/images/profile/8252c6e2-995b-3335-8241-6d09b5fd2310.png', '5409 Arno Hill\nNorth Deontaetown, FL 67655-1488', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'MYIT9S4Gl6', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(85, 'Trần Công Hùng', 'jspinka@example.com', '+15202521532', '/upload/images/profile/d0e2ce21-e24d-34b2-bb75-c0b574363bd2.png', '521 Raynor Isle\nErnestinemouth, MI 05192-9867', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ycaaHhyg53', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(86, 'Phạm Công Bảo', 'franecki.darrick@example.com', '+17208143983', '/upload/images/profile/83bfac11-6bf6-3515-b863-bb3168e1b491.png', '5155 Valentin Lodge\nWest Shanon, VA 65640-2804', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'sOQLkxzfms', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(87, 'Nguyễn Văn Hùng', 'jeanette.shanahan@example.com', '+13308780435', '/upload/images/profile/3f77ab17-66d4-3bc4-b30a-7d2e9f08e14b.png', '722 Dalton Flat Apt. 486\nSouth Charity, VT 29943-2965', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'ZVNAgeLmdl', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(88, 'Nguyễn Văn Trường', 'teffertz@example.com', '+18329669092', '/upload/images/profile/0eec2b04-3e1d-3faf-9a7c-e7e6e796198c.png', '37653 Ferry Viaduct Suite 927\nNorth Zula, FL 13254', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'mevRyfPCNx', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(89, 'Nguyễn Huy Long', 'lea.marvin@example.net', '+19165167122', '/upload/images/profile/b10a8982-2fa2-33fd-9f57-b3bb2b166b01.png', '80268 Rohan Meadow\nLake Conorchester, KY 40980', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'PpnEF18KM5', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(90, 'Phan Minh Hoàng', 'dangelo.russel@example.com', '+14709195533', '/upload/images/profile/1aaeae74-310e-35db-8210-1f29766973fe.png', '180 Legros Forges\nWest Marcoshire, UT 55859', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'HgzuqLLgky', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(91, 'Lê Văn Bảo', 'garett.gleichner@example.org', '+18726371120', '/upload/images/profile/ee91d621-617c-38a4-afb1-60ed8a5e45d9.png', '760 Hodkiewicz Expressway Suite 924\nAdelinechester, AK 61827', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'lwYhXj4X1e', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(92, 'Lê Quốc Hoàng', 'dominic.christiansen@example.net', '+19302440782', '/upload/images/profile/ff9d04e3-cb26-354c-b427-f85fbb666374.png', '8919 Kylee Underpass\nEdythview, RI 21527-3586', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'tbSxMVF9sX', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(93, 'Phạm Công Trường', 'lrolfson@example.com', '+14192928497', '/upload/images/profile/43c3f3ca-4352-39e3-823b-7f341dbe1886.png', '88707 Kovacek Brooks Apt. 638\nPort Websterborough, WA 95635-5324', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'emB5KGiMEi', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(94, 'Phan Duy Bảo', 'neoma74@example.com', '+18605203956', '/upload/images/profile/5795cb7f-9015-3a24-bf44-c32306d41262.png', '51465 Garry Mountain\nFeeneybury, VA 86179', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'GbvHlGMZO8', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(95, 'Phan Duy Trường', 'vlebsack@example.com', '+13122972701', '/upload/images/profile/1391186c-9afe-3537-8ace-14d818c8a68d.png', '8080 Kelley Key Suite 258\nElnatown, WI 87158-6880', 0, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'cE8MYns9B6', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(96, 'Phạm Duy Đạt', 'rsimonis@example.org', '+15204362298', '/upload/images/profile/3ce70c21-5883-390b-9312-245bba6e4641.png', '27780 Leonel Curve Suite 814\nEstrellaview, OK 56733', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'Tau2fg78vR', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(97, 'Phạm Văn Đạt', 'nstiedemann@example.net', '+17855809024', '/upload/images/profile/e008ca78-95eb-3a5b-9ed7-05cdcd6ad6c3.png', '19128 Myrna Spur Apt. 465\nZacharymouth, WA 26647', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'z46ifGlKZ0', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(98, 'Phạm Minh Hùng', 'nreilly@example.com', '+17436244019', '/upload/images/profile/fa023d2c-40c0-3a22-804f-c47a48520aff.png', '91012 Schaden Passage Suite 239\nDelphinemouth, WA 55406', 1, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'AeA2dH45tW', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(99, 'Võ Huy Trường', 'eliseo.schaden@example.net', '+12012998460', '/upload/images/profile/21a289b4-f785-33b5-a83d-d9fc5a5b4906.png', '72393 Demarco Ridges Suite 611\nEast Amos, MT 37911-0015', 1, 1, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'oQqaohSRSk', '2023-08-12 04:11:03', '2023-08-12 04:11:03'),
(100, 'Phạm Huy Đạt', 'wrowe@example.net', '+13127628099', '/upload/images/profile/6599f5cd-88e3-3a19-b705-fdada590f88c.png', '169 Arno Stream\nCarolynberg, FL 21776', 0, 0, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2023-08-12 04:11:03', 'C0leUHEgbG', '2023-08-12 04:11:03', '2023-08-12 04:11:03');

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
  MODIFY `idBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `idCTHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

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
  MODIFY `idHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

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
