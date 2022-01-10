-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 25, 2021 lúc 08:02 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pttk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `binhluan_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `binhluan_trang_thai` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `binhluan_ten`, `binhluan_email`, `binhluan_noi_dung`, `binhluan_trang_thai`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(1, 'test customer 1', 'test@gmail.com', 'a', 0, 1, '2021-04-20 11:08:34', '2021-04-20 11:08:34'),
(2, 'AA', 'test@gmail.com', 'Ngon', 1, 8, '2021-04-20 11:08:34', '2021-04-20 11:08:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `donhang_id` int(10) UNSIGNED NOT NULL,
  `chitietdonhang_so_luong` int(11) NOT NULL,
  `chitietdonhang_thanh_tien` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `sanpham_id`, `donhang_id`, `chitietdonhang_so_luong`, `chitietdonhang_thanh_tien`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 1, '30000.00', NULL, NULL),
(4, 8, 2, 3, '324000.00', NULL, NULL),
(6, 8, 5, 1, '108000.00', NULL, NULL),
(7, 3, 5, 1, '30000.00', NULL, NULL),
(8, 4, 5, 2, '1260000.00', NULL, NULL),
(9, 1, 6, 1, '30000.00', NULL, NULL),
(10, 5, 6, 2, '504000.00', NULL, NULL),
(12, 4, 8, 1, '350000.00', NULL, NULL),
(13, 8, 8, 1, '120000.00', NULL, NULL),
(14, 4, 9, 1, '350000.00', NULL, NULL),
(15, 8, 9, 1, '120000.00', NULL, NULL),
(16, 5, 9, 2, '280000.00', NULL, NULL),
(17, 4, 10, 1, '350000.00', NULL, NULL),
(18, 4, 11, 1, '350000.00', NULL, NULL),
(19, 4, 12, 1, '350000.00', NULL, NULL),
(20, 4, 13, 1, '350000.00', NULL, NULL),
(21, 4, 14, 1, '350000.00', NULL, NULL),
(22, 4, 15, 1, '350000.00', NULL, NULL),
(23, 4, 16, 1, '350000.00', NULL, NULL),
(24, 4, 17, 1, '350000.00', NULL, NULL),
(25, 4, 18, 1, '350000.00', NULL, NULL),
(26, 4, 19, 1, '350000.00', NULL, NULL),
(27, 4, 20, 1, '350000.00', NULL, NULL),
(28, 4, 21, 1, '350000.00', NULL, NULL),
(29, 4, 22, 1, '350000.00', NULL, NULL),
(30, 4, 23, 1, '350000.00', NULL, NULL),
(31, 4, 24, 1, '350000.00', NULL, NULL),
(32, 4, 25, 1, '350000.00', NULL, NULL),
(33, 4, 26, 1, '350000.00', NULL, NULL),
(34, 4, 27, 1, '350000.00', NULL, NULL),
(35, 4, 28, 1, '350000.00', NULL, NULL),
(36, 4, 29, 1, '350000.00', NULL, NULL),
(37, 4, 30, 1, '350000.00', NULL, NULL),
(38, 4, 31, 1, '350000.00', NULL, NULL),
(39, 4, 32, 1, '350000.00', NULL, NULL),
(40, 4, 33, 1, '350000.00', NULL, NULL),
(41, 8, 34, 1, '120000.00', NULL, NULL),
(42, 4, 35, 2, '700000.00', NULL, NULL),
(43, 15, 36, 1, '27000.00', NULL, NULL),
(44, 15, 37, 1, '27000.00', NULL, NULL),
(45, 15, 38, 1, '27000.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `donhang_nguoi_nhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_nguoi_nhan_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donhang_ghi_chu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `donhang_tong_tien` decimal(10,2) NOT NULL,
  `khachhang_id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `donhang_nguoi_nhan`, `donhang_nguoi_nhan_email`, `donhang_nguoi_nhan_sdt`, `donhang_nguoi_nhan_dia_chi`, `donhang_ghi_chu`, `donhang_tong_tien`, `khachhang_id`, `tinhtranghd_id`, `created_at`, `updated_at`) VALUES
(2, 'Nhật Long', 'long@gmail.com', '01234567890', 'Đường số 3- Khu dân cư Kiến Phát- TP Tân An- Long An', '', '324000.00', 3, 2, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(3, 'Nhật Long', 'longa@gmail.com', '01234567890', 'a', 'a', '30000.00', 3, 4, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(5, 'Tạ Thanh Bình', 'a@gmail.com', '01234567890', 'ádf', '', '1398000.00', 4, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(6, 'Tạ Thanh Bình', 'user6@gmail.com', '012345676', 'abc', 'abcc', '534000.00', 4, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(8, 'Trịnh Thị Ngọc Phượng', 'phuong@gmail.com', '01234567890', 'Tân An-Long An', 'Gói thành giỏ quà', '470000.00', 7, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(9, 'Trịnh Thị Ngọc Hân', 'hana@gmail.com', '0946711770', ' Ninh Kiều - Cần Thơ', 'Gói thành giỏ quà tặng', '750000.00', 6, 4, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(10, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', 'abc', '350000.00', 6, 4, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(11, 'Trịnh Thị Ngọc Phượng', 'long@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 4, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(12, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', '12345', '12345', '350000.00', 8, 4, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(13, 'Trịnh Thị Ngọc Phượng', 'long@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(14, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(15, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(16, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(17, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(18, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(19, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(20, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(21, 'Nhật Long', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(22, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(23, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(24, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(25, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(26, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(27, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(28, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(29, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(30, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(31, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', '1234', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(32, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(33, 'Trịnh Thị Ngọc Phượng', 'long@gmail.com', '0946711770', 'abc', '', '350000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(34, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '120000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(35, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '700000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(36, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '27000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(37, 'Trịnh Thị Ngọc Phượng', 'user6@gmail.com', '0946711770', 'abc', '', '27000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26'),
(38, 'Trịnh Thị Ngọc Phượng', 'long@gmail.com', '01234567890', 'a', '', '27000.00', 8, 1, '2021-04-20 11:07:26', '2021-04-20 11:07:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `donvitinh_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `donvitinh_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`id`, `donvitinh_ten`, `donvitinh_mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'Khay', '', NULL, NULL),
(2, 'Kg', NULL, NULL, NULL),
(3, 'Bịch', '<p>bịch</p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinhsanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhsanpham`
--

INSERT INTO `hinhsanpham` (`id`, `hinhsanpham_ten`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(2, 'nam_huong_1.jpg', 1, NULL, NULL),
(3, 'nam_huong_kho.jpg', 1, NULL, NULL),
(4, 'nam_huong_tuoi.jpg', 1, NULL, NULL),
(5, 'nam-huong-2.jpg', 1, NULL, NULL),
(6, 'nam-mo-4.jpg', 2, NULL, NULL),
(7, 'nam-mo-2.jpg', 2, NULL, NULL),
(8, 'nam-mo-1.jpg', 2, NULL, NULL),
(10, 'nam_mo-3.jpg', 2, NULL, NULL),
(11, 'nam-kim-cham-3.jpg', 3, NULL, NULL),
(12, 'nam-kim-cham-2.jpg', 3, NULL, NULL),
(13, 'nam-kim-cham-1.jpg', 3, NULL, NULL),
(14, 'nam-kim-cham.jpg', 3, NULL, NULL),
(15, 'namkimcham_4.jpg', 3, NULL, NULL),
(16, 'nam-mo.jpg', 2, NULL, NULL),
(18, 'cherry2.jpg', 4, NULL, NULL),
(19, 'cherry3.jpg', 4, NULL, NULL),
(20, 'cherry4.jpg', 4, NULL, NULL),
(21, 'cherry7.jpg', 4, NULL, NULL),
(22, 'qua_cherry1.jpg', 4, NULL, NULL),
(23, 'nho1.jpg', 5, NULL, NULL),
(24, 'nho2.jpg', 5, NULL, NULL),
(25, 'nho4.jpg', 5, NULL, NULL),
(26, 'nho5.jpg', 5, NULL, NULL),
(27, 'nho6.jpg', 5, NULL, NULL),
(33, 'nambaongu.jpg', 7, NULL, NULL),
(34, 'nam-bao-ngu-ngan-ngua-ut.jpg', 7, NULL, NULL),
(35, 'nambaongu1.jpg', 7, NULL, NULL),
(36, 'nam-bao-ngu-1s.png', 7, NULL, NULL),
(37, 'bao_ngu_trang4.jpg', 7, NULL, NULL),
(38, 'dau_tay_3.jpg', 8, NULL, NULL),
(39, 'dau_tay_da_lat(1).jpg', 8, NULL, NULL),
(40, 'dau_tay_ngon.jpg', 8, NULL, NULL),
(41, 'dau_tay_da_lat_cay.jpg', 8, NULL, NULL),
(42, 'dau_tay_1.jpg', 8, NULL, NULL),
(58, 'ng.JPG', 11, NULL, NULL),
(59, 'ngon su su 2.jpg', 11, NULL, NULL),
(60, 'ngon su su.jpg', 11, NULL, NULL),
(62, 'ngon_su_su (1).jpg', 11, NULL, NULL),
(63, 'ngon_su_su.JPG', 11, NULL, NULL),
(64, 'rau ngot rung1.jpg', 12, NULL, NULL),
(65, 'rau ngot rung2.jpg', 12, NULL, NULL),
(66, 'rau ngot rung3.jpg', 12, NULL, NULL),
(67, 'rau ngot rung4.jpg', 12, NULL, NULL),
(68, 'rau ngot rung5.jpg', 12, NULL, NULL),
(79, 'com chay gao luc 2.jpg', 15, NULL, NULL),
(80, 'com chay gao luc 3.jpg', 15, NULL, NULL),
(81, 'com chay gao luc 4.jpg', 15, NULL, NULL),
(82, 'com chay gao luc 5.jpg', 15, NULL, NULL),
(83, 'com chay gao luc 1.jpg', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `khachhang_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `khachhang_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `khachhang_ten`, `khachhang_email`, `khachhang_sdt`, `khachhang_dia_chi`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Long Thị Nhật', 'user5@gmail.com', '012332432', 'advd', 9, NULL, NULL),
(4, 'Tạ Thanh Bình', 'user6@gmail.com', '012345676', 'abc', 10, NULL, NULL),
(5, 'queen', 'queen@gmail.com', '0946711770', '21312', 11, NULL, NULL),
(6, 'Trịnh Thị Ngọc Hân', 'hana@gmail.com', '0946711770', 'Ninh Kiều - Cần Thơ', 12, NULL, NULL),
(7, 'Trịnh Thị Hoàng Hân', 'hanab1204011@gmail.com', '0946711770', 'Ninh Kiêu- Cần Thơ', 13, NULL, NULL),
(8, 'Nguyễn Văn A', 'nghiab1204035@gmail.com', '0946711770', 'Cà Mau', 14, NULL, NULL),
(9, 'KHasá', 'khachhang@gmail.com', '0022155', '123', 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(10) UNSIGNED NOT NULL,
  `khuyenmai_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyenmai_phan_tram` int(11) NOT NULL,
  `khuyenmai_thoi_gian` int(11) NOT NULL,
  `khuyenmai_tinh_trang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `khuyenmai_tieu_de`, `khuyenmai_url`, `khuyenmai_noi_dung`, `khuyenmai_anh`, `khuyenmai_phan_tram`, `khuyenmai_thoi_gian`, `khuyenmai_tinh_trang`, `created_at`, `updated_at`) VALUES
(2, 'Khuyến mãi mùa hè', 'khuyen-mai-mua-he', '<p>Khuyến m&atilde;i m&ugrave;a h&egrave;</p>\r\n', 'km6.jpg', 50, 3, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(3, 'Khuyến mãi cuối năm', 'khuyen-mai-cuoi-nam', '<p>khuyến m&atilde;i cuối năm</p>\r\n', 'km5.jpg', 70, 2, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(4, 'Khuyến mãi tháng 6', 'khuyen-mai-thang-6', '<p>Khuyến m&atilde;i th&aacute;ng 6</p>\r\n', 'nongsan2.jpg', 80, 2, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(5, 'Khuyến mãi tháng 7', 'khuyen-mai-thang-7', '<p>Khuyến m&atilde;i th&aacute;ng 7</p>\r\n', 'km5.jpg', 30, 10, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(6, 'Khuyến mãi mùa mưa', 'khuyen-mai-mua-mua', '<p>Khuyến m&atilde;i m&ugrave;a mưa</p>\r\n', '31.jpg', 10, 10, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(7, 'Nhân dip 1/6 giảm giá sốc', 'nhan-dip-1/6-giam-gia-soc', '<p>Nh&acirc;n dip 1/6 giảm gi&aacute; sốc</p>\r\n', 'banner4.jpg', 50, 15, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40'),
(8, 'Khuyen mai moi thm', 'khuyen-mai-moi-thm', '<p>abc</p>\r\n', 'com chay gao luc 2.jpg', 10, 100, 1, '2021-04-20 11:09:40', '2021-04-20 11:09:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `loainguoidung_ten` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`id`, `loainguoidung_ten`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `loaisanpham_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `loaisanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_da_xoa` int(11) NOT NULL,
  `nhom_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `loaisanpham_ten`, `loaisanpham_url`, `loaisanpham_mo_ta`, `loaisanpham_anh`, `loaisanpham_da_xoa`, `nhom_id`, `created_at`, `updated_at`) VALUES
(2, 'Nấm tươi', 'nam-tuoi', '<p><strong><em>NẤM SẠCH</em></strong>&nbsp;từ l&acirc;u đ&atilde; trờ th&agrave;nh m&oacute;n ăn quen thuộc trong mỗi bữa cơm gia đ&igrave;nh.Nấm l&agrave;&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\"><strong><em>thực phẩm sạch</em></strong></a>&nbsp;c&oacute; gi&aacute; trị dinh dưỡng cao, c&oacute; độ đạm cao v&agrave; &iacute;t chất b&eacute;o, chứa nhiều vitamin nh&oacute;m B v&agrave; C.Nấm cũng chứa trong m&igrave;nh&nbsp;nhiều nguy&ecirc;n tố vi lượng, như sắt, selen, natri, kali, magi&ecirc; v&agrave; phốt pho.</p>\r\n\r\n<p>Hơn thế trong y học,người ta d&ugrave;ng nhiều loại&nbsp;<strong><em>nấm sạch</em></strong>&nbsp;như:nấm m&uacute;a, nấm hương (đ&ocirc;ng c&ocirc;), nấm chaga, nấm linh chi...&nbsp;nhằm&nbsp;tăng cường hệ miễn dịch,ngăn ngừa ung thư,chống virus.Lo&agrave;i nấm Đ&ocirc;ng tr&ugrave;ng hạ thảo (Cordyceps sinensis) được coi l&agrave; một dược liệu qu&yacute; hiếm v&agrave; đ&atilde; được sử dụng ở Trung Quốc từ l&acirc;u. Lo&agrave;i nấm cổ linh chi (Ganoderma applanatum) cũng&nbsp;được coi l&agrave; một thần dược&nbsp;ở Việt Nam.</p>\r\n\r\n<p>Ch&iacute;nh v&igrave; những t&aacute;c dụng tuyệt vời của&nbsp;<strong><em>nấm sạch</em></strong>&nbsp;m&agrave; ng&agrave;y ngay những trang trại nu&ocirc;i trồng&nbsp;<em>nấm&nbsp;</em>&nbsp;mọc l&ecirc;n c&ograve;n nhanh hơn nấm,họ ồ ạt&nbsp;đưa ra những sản phẩm&nbsp;<strong><em>nấm tươi&nbsp;sạch</em></strong>&nbsp;của ri&ecirc;ng m&igrave;nh,trong khi chất lượng th&igrave; bỏ ngỏ.Người ti&ecirc;u d&ugrave;ng th&igrave;&nbsp;chơi vơi,băn khoan&nbsp;<em>nấm</em>&nbsp;m&igrave;nh mua về liệu c&oacute; đủ&nbsp;<em>&nbsp;sạch&nbsp;</em>hay chưa.</p>\r\n\r\n<p>Đồng cảm với những băn khoan của nhiều chị em.CleverFood bỏ c&ocirc;ng th&acirc;m nhập từng trang trại nấm để đem về những loại nấm kh&ocirc;ng chỉ tươi ngon,m&agrave; c&ograve;n sạch theo đ&uacute;ng ti&ecirc;u chuẩn của bộ n&ocirc;ng nghiệp,bộ y tế.</p>\r\n', 'nam-tuoi.png', 1, 2, NULL, NULL),
(3, 'Rau sạch Đà Lạt', 'rau-sach-da-lat', '<p>Đ&agrave; Lạt được thi&ecirc;n nhi&ecirc;n ưu đ&atilde;i cho kh&iacute; hậu &ocirc;n đới quanh năm , thời tiết m&aacute;t mẻ dễ chịu , th&iacute;ch hợp cho<strong>&nbsp;rau sạch Đ&agrave; Lạt</strong>&nbsp;ph&aacute;t triển mạnh mẽ.&nbsp;<strong>Rau Đ&agrave; Lạt</strong>&nbsp;đ&atilde; nổi tiếng từ rất l&acirc;u , người ta y&ecirc;u th&iacute;ch c&aacute;i vị tươi ngon độc đ&aacute;o m&agrave; chỉ c&oacute; rau sạch Đ&agrave; Lạt mới c&oacute;.&nbsp;</p>\r\n\r\n<p>Đặc biệt hiện nay thị trường&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\"><strong>rau sạch</strong></a>&nbsp;cả nước đang rối ren , lộn xộn&nbsp;<strong>rau củ Đ&agrave; Lạt</strong>&nbsp;ng&agrave;y c&agrave;ng chiếm được l&ograve;ng tin của người ti&ecirc;u d&ugrave;ng . Những phương ph&aacute;p , những giống rau mới được đưa v&agrave;o nghi&ecirc;n cứu canh t&aacute;c nhằm l&agrave;m đa dạng phong ph&uacute; hơn nguồn h&agrave;ng .&nbsp;</p>\r\n\r\n<p><strong>Rau sạch Đ&agrave; Lạt</strong>&nbsp;thực sự kh&ocirc;ng rẻ , gi&aacute; cao hơn kh&aacute; nhiều so với c&aacute;c cơ sở trồng rau kh&aacute;c ,tuy nhi&ecirc;n gi&aacute; th&agrave;nh sẽ đi đ&ocirc;i với chất lượng v&agrave; sự độc đ&aacute;o . C&agrave; chua cherry , c&agrave; rốt b&acirc;y bi , khoai t&acirc;y b&acirc;y bi... ở đ&acirc;u c&oacute; được ??? Rau Đ&agrave; Lạt chắc chắn sẽ c&ograve;n ph&aacute;t triển hơn nữa.</p>\r\n', 'radalat.jpg', 1, 2, NULL, NULL),
(4, 'Rau hữu cơ', 'rau-huu-co', '<p>1.<strong>RAU HỮU CƠ&nbsp;</strong>l&agrave; loại rau&nbsp;canh t&aacute;c trong điều kiện ho&agrave;n to&agrave;n tự nhi&ecirc;n theo quy tắc&nbsp;5 kh&ocirc;ng:</p>\r\n\r\n<p>- Kh&ocirc;ng b&oacute;n ph&acirc;n ho&aacute; học</p>\r\n\r\n<p>- Kh&ocirc;ng phun thuốc bảo vệ thực vật</p>\r\n\r\n<p>- Kh&ocirc;ng phun thuốc k&iacute;ch th&iacute;ch sinh trưởng</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng thuốc diệt cỏ</p>\r\n\r\n<p>- Kh&ocirc;ng sử dụng sản phẩm biến đổi gen</p>\r\n\r\n<p>Người trồng&nbsp;<strong>rau hữu cơ</strong>&nbsp;được đ&agrave;o tạo chuy&ecirc;n s&acirc;u.Đất trồng v&agrave; nguồn nước tưới được lựa chọn kh&ocirc;ng bị &ocirc; nhiễm bởi c&aacute;c kim loại nặng (thủy ng&acirc;n, asen...), kh&ocirc;ng bị ảnh hưởng của nước thải c&ocirc;ng nghiệp.</p>\r\n\r\n<p>C&oacute; thể n&oacute;i&nbsp;<strong><em>rau hữu cơ</em></strong>&nbsp;l&agrave; loại&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\">rau sạch</a>&nbsp;nhất,an to&agrave;n nhất hiện nay,người ti&ecirc;u d&ugrave;ng ho&agrave;n to&agrave;n c&oacute; thể an t&acirc;m sử dụng.</p>\r\n\r\n<p>2. Gi&aacute; trị dinh dưỡng của&nbsp;<em><strong>rau hữu cơ</strong></em></p>\r\n\r\n<p><a href=\"http://cleverfood.com.vn/\" target=\"_blank\"><strong><em>Thực phẩm&nbsp;hữu cơ&nbsp;</em></strong></a>c&oacute; chứa nhiều th&agrave;nh phần dinh dưỡng hơn c&aacute;c loại thực phẩm kh&aacute;c.</p>\r\n\r\n<p>- Tỷ lệ hợp chất chống oxi ho&aacute; trong &nbsp;rau quả hữu cơ &ge; 40% so với loại b&igrave;nh thường</p>\r\n\r\n<p>- Trong&nbsp;<strong><em>rau hữu cơ&nbsp;</em></strong>c&oacute; chứa nhiều kho&aacute;ng chất c&oacute; &iacute;ch cho cơ thể.</p>\r\n\r\n<p>3. Kh&aacute;c biệt về cảm quan</p>\r\n\r\n<p>-&nbsp;<em><strong>Rau hữu cơ&nbsp;</strong></em>nh&igrave;n bề ngo&agrave;i c&ograve;i hơn c&aacute;c loại rau&nbsp;kh&aacute;c. K&iacute;ch thước rau cũng kh&ocirc;ng&nbsp;đồng đều.</p>\r\n\r\n<p>-&nbsp;<strong><em>Rau hữu cơ</em></strong>&nbsp;khi ăn thấy ngọt, đậm, nhiều nhựa hơn. Thấy vị rau&nbsp;nhiều hơn hẳn, cảm gi&aacute;c như ăn rau rừng mọc tự nhi&ecirc;n.</p>\r\n', 'rau.jpg', 1, 2, NULL, NULL),
(5, 'Thịt heo', 'thit-heo', '<p><strong>Thịt lợn ( thịt heo )</strong>&nbsp;l&agrave; một loại thực phẩm đ&atilde;&nbsp;rất&nbsp;phổ biến tr&ecirc;n thế giới.Ch&uacute;ng ta ăn&nbsp;<em>thịt lợn</em>&nbsp;h&agrave;ng ng&agrave;y,thậm tr&iacute; l&agrave; từng bữa.Rất nhiều m&oacute;n ngon từ thịt lợn ra đời,người ta c&oacute; thể đem&nbsp;luộc,r&aacute;n,nướng hay x&agrave;o nấu...đều rất ngon v&agrave; dễ ăn.</p>\r\n\r\n<p>Cũng ch&iacute;nh v&igrave; qu&aacute; phổ biến v&agrave; quan trọng m&agrave; hiện nay&nbsp;<strong>thịt lợn</strong>&nbsp;đang l&agrave; một mặt h&agrave;ng kh&oacute; kiểm so&aacute;t về vệ sinh an to&agrave;n thực phẩm.Nhiều trang trại,c&aacute; nh&acirc;n v&igrave; ham lợi m&agrave; đ&aacute;nh rơi lương t&acirc;m,thịt họ xuất ra thị trường hết tăng trọng,lại đến thịt bẩn,thịt bệnh.Nhiều l&ograve; giết mổ kh&ocirc;ng giấy ph&eacute;p,kh&ocirc;ng đảm bảo vệ sinh vẫn hằng ng&agrave;y tuồn<em>thịt lợn</em>&nbsp;v&agrave;o thị trường.</p>\r\n\r\n<p>Nắm được cơn kh&aacute;t&nbsp;<strong>&quot;thịt lợn sạch&quot;</strong>&nbsp;của c&aacute;c bạn,Cleverfood tự h&agrave;o l&agrave; địa chỉ b&aacute;n&nbsp;<em>thịt lợn sạch</em>&nbsp;uy t&iacute;n nhất H&agrave; Nội.<em>Thịt lợn</em>&nbsp;của ch&uacute;ng t&ocirc;i nhập về ko chỉ tươi,ngon,sạch m&agrave; &nbsp;đều c&oacute; nguồn gốc xuất sứ r&otilde; r&agrave;ng.</p>\r\n\r\n<p>Ngo&agrave;i ra mỗi tuần Cleverfood đều c&oacute; những đợt h&agrave;ng đặc biệt&nbsp;đều l&agrave;&nbsp;<strong><em>thịt lợn sạch</em></strong>.Lợn ch&uacute;ng t&ocirc;i&nbsp;nhập về được nu&ocirc;i ở v&ugrave;ng đồi n&uacute;i,đất rộng,nước nguồn trong l&agrave;nh,kh&iacute; hậu tho&aacute;ng đ&atilde;ng,được thả r&ocirc;ng kiếm ăn.Mỗi con chỉ nặng tối đa&nbsp;15-20kg.</p>\r\n', 'pork_header_almacenaje.jpg', 1, 1, NULL, NULL),
(6, 'Thịt gia cầm', 'thit-gia-cam', '<p><strong>Thịt gia cầm</strong>&nbsp;l&agrave; m&oacute;n ăn phổ biến từ rất l&acirc;u tr&ecirc;n khắp thế giới.Nhờ đặc t&iacute;nh sinh trưởng nhanh,sớm thu hoạch m&agrave;&nbsp;<em>thịt gia cầm</em>&nbsp;lu&ocirc;n dồi d&agrave;o.Hơn nữa&nbsp;<em>gia cầm</em>&nbsp;l&agrave; loại thịt trắng chứa nhiều protein v&agrave; chất b&eacute;o dễ hấp thu,&iacute;t cholesterol hơn thịt đỏ do đ&oacute; rất tốt cho sức khỏe người ti&ecirc;u d&ugrave;ng.Thịt gia cầm ti&ecirc;u thụ ở Việt Nam chủ yếu l&agrave;&nbsp;<em><strong>thịt g&agrave;</strong></em>v&agrave;&nbsp;<strong><em>thịt vịt</em></strong></p>\r\n\r\n<p>Theo thống k&ecirc;<strong>&nbsp;<em>thịt gia cầm</em>&nbsp;</strong>chiếm khoảng 30% sản phẩm thịt tr&ecirc;n to&agrave;n thế giới chỉ sau thịt lợn&nbsp;38%.Ch&iacute;nh do nhu cầu qu&aacute; lớn của thị trường dẫn tới thiếu hụt nguồn nh&acirc;n lực kiểm so&aacute;t chất lượng sản phẩm.Gia cầm bẩn tr&agrave;n lan,người ti&ecirc;u d&ugrave;ng hoang mang.</p>\r\n\r\n<p>Cũng n&ecirc;n nhớ gia cầm l&agrave; lo&agrave;i dễ bị dịch bệnh,sức sống kh&ocirc;ng cao,n&ecirc;n việc mua phải&nbsp;<strong><em>thịt gia cầm</em></strong>&nbsp;chết cũng l&agrave; dễ hiểu.Để đảm bảo an to&agrave;n cho bản th&acirc;n v&agrave; gia đ&igrave;nh,hay tới với ch&uacute;ng t&ocirc;i - cửa h&agrave;ng&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\">thực phẩm sạch</a>&nbsp;uy tin nhất H&agrave; Nội.Ở Cleverfood kh&ocirc;ng c&oacute; g&agrave; chết,vịt &ocirc;i,chỉ c&oacute; c&aacute;c loại gia cầm đặc sản,hiếm c&oacute; tr&ecirc;n đời</p>\r\n', '12-dieu-can-nho-khi-che-bien-thit-ga-dai-dien.jpg', 1, 1, NULL, NULL),
(7, 'Hoa quả nhập khẩu', 'hoa-qua-nhap-khau', '<p><strong>Hoa quả nhập khẩu</strong>&nbsp;đang rất được cộng đồng ch&uacute; &yacute; v&igrave; độ thơm ngon,độc lạ.Thật l&ograve;ng m&agrave; n&oacute;i khi ăn hoa quả ,<strong>tr&aacute;i c&acirc;y nhập khẩu</strong>&nbsp;thấy ngon.hấp dẫn hơn kh&aacute; nhiều so với sản phẩm c&ugrave;ng loại được trồng trong nước.Chất lượng của&nbsp;<em>hoa quả nhập khẩu</em>&nbsp;cũng v&ocirc; c&ugrave;ng&nbsp;đồng đều&nbsp;,cả trăm quả họa may lỗi 1.</p>\r\n\r\n<p>Tới từ&nbsp;những nước c&oacute; nền&nbsp;n&ocirc;ng nghiệp thịnh vương,hoa quả&nbsp;<em>,tr&aacute;i c&acirc;y nhập khẩu</em>&nbsp;l&agrave; th&agrave;nh quả của qu&aacute; tr&igrave;nh nghi&ecirc;n cứu,lai tạo hợp l&yacute; c&ugrave;ng điều kiện canh t&aacute;c l&yacute; tưởng,được chăm b&oacute;n chuy&ecirc;n nghiệp.Đặc biệt vấn đề vệ sinh ,an to&agrave;n lu&ocirc;n được đặt l&ecirc;n h&agrave;ng đầu.</p>\r\n\r\n<p>Vấn đề duy nhất với người ti&ecirc;u d&ugrave;ng l&agrave; t&igrave;m mua hoa quả,&nbsp;<strong><em>tr&aacute;i c&acirc;y nhập khẩu</em></strong>&nbsp;ở đ&acirc;u chất lượng,khi m&agrave; h&agrave;ng trăm cửa h&agrave;ng mọc l&ecirc;n như nấm,ri&ecirc;ng <strong>Cần Thơ</strong> t&iacute;nh sơ đ&atilde; ngo&agrave;i 50 cửa h&agrave;ng.Nhiều nơi cộp m&aacute;c&nbsp;<strong><em>&quot;hoa quả nhập khẩu &quot;</em></strong>&nbsp;v&agrave;o tr&aacute;i c&acirc;y Trung Quốc để kiếm lời bất ch&iacute;nh.Đỡ hơn th&igrave; người ta nhập h&agrave;ng loại 2,loại 3 rồi b&aacute;n gi&aacute; loại 1.</p>\r\n\r\n<p>Cleverfood&nbsp;kh&ocirc;ng vậy,hoa quả ,tr&aacute;i c&acirc;y nhập khẩu của ch&uacute;ng t&ocirc;i l&agrave; loại hảo hạng,chất lượng h&agrave;ng đầu.Tự h&agrave;o l&agrave;&nbsp;<strong>cửa h&agrave;ng hoa quả nhập khẩu Cần Thơ&nbsp;</strong>uy t&iacute;n nhất. Tới với Cleverfood l&agrave; tới với nguồn cung&nbsp;<a href=\"http://cleverfood.com.vn/\" target=\"_blank\">thực phẩm sạch</a>&nbsp;,&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-sach-b1566494.html\" target=\"_blank\">hoa quả sạch</a>&nbsp;v&ocirc; hạn.</p>\r\n', 'traicaynhap.jpg', 1, 3, NULL, NULL),
(8, 'Hoa quả Việt Nam', 'hoa-qua-viet-nam', '<p><strong>Hoa quả Việt Nam</strong>&nbsp;ở Cleverfood đều l&agrave; những loại&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-sach-b1566494.html\" target=\"_blank\">hoa quả sạch</a>&nbsp;đặc sắc.Xuất xứ từ khắp c&aacute;c v&ugrave;ng miền tổ quốc,ở đ&acirc;u c&oacute; đặc sản l&agrave; ở đ&oacute; c&oacute; ch&uacute;ng t&ocirc;i,t&igrave;m hiểu,kiểm nghiệm,điều tra kĩ c&agrave;ng rồi mới nhập về kinh doanh.</p>\r\n\r\n<p>Sử dụng&nbsp;<strong><em>hoa quả Việt Nam</em></strong>&nbsp;l&agrave; g&oacute;p phần đưa nền n&ocirc;ng nghiệp của đất nước đi l&ecirc;n,chung tay chia sẻ kh&oacute; khăn,vất vả với những người n&ocirc;ng d&acirc;n hai sương một nắng.Tổ Quốc,đồng b&agrave;o ta m&agrave; kh&ocirc;ng y&ecirc;u th&igrave; c&ograve;n y&ecirc;u được ai!!</p>\r\n\r\n<p>Th&ecirc;m nữa&nbsp;<em><strong>hoa quả Việt</strong></em>&nbsp;cũng v&ocirc; c&ugrave;ng đa dạng v&agrave; đặc sắc,nhiều loại c&ograve;n g&acirc;y ấn tượng mạnh với người nước ngo&agrave;i v&agrave; đang l&agrave; mặt h&agrave;ng xuất khẩu chủ lực.Độc đ&aacute;o từ hương vị,đa dạng từng chủng loại - Đ&oacute; l&agrave;&nbsp;<strong><em>hoa quả Việt Nam</em></strong></p>\r\n', 'header_fruitsmoothie-1920x300.jpg', 1, 3, NULL, NULL),
(9, 'Trái cây sấy', 'trai-cay-say', '<p>abc</p>\r\n', 'WP_20150308_133.jpg', 1, 4, NULL, NULL),
(10, 'Gạo và các chế phẩm từ gạo', 'gao-va-cac-che-pham-tu-gao', '<p>Gạo</p>\r\n', 'ep77b-rice.jpg', 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lohang`
--

CREATE TABLE `lohang` (
  `id` int(10) UNSIGNED NOT NULL,
  `lohang_ky_hieu` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lohang_han_su_dung` int(11) NOT NULL,
  `lohang_gia_mua_vao` decimal(10,2) NOT NULL,
  `lohang_gia_ban_ra` decimal(10,2) NOT NULL,
  `lohang_so_luong_nhap` int(11) NOT NULL,
  `lohang_so_luong_da_ban` int(11) NOT NULL,
  `lohang_so_luong_doi_tra` int(11) NOT NULL,
  `lohang_so_luong_hien_tai` int(11) NOT NULL,
  `lohang_tinh_trang` int(11) DEFAULT NULL COMMENT '1',
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `nhacungcap_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lohang`
--

INSERT INTO `lohang` (`id`, `lohang_ky_hieu`, `lohang_han_su_dung`, `lohang_gia_mua_vao`, `lohang_gia_ban_ra`, `lohang_so_luong_nhap`, `lohang_so_luong_da_ban`, `lohang_so_luong_doi_tra`, `lohang_so_luong_hien_tai`, `lohang_tinh_trang`, `sanpham_id`, `nhacungcap_id`, `created_at`, `updated_at`) VALUES
(1, '12345', 5, '25000.00', '30000.00', 30, 0, 0, 30, 1, 1, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(2, 'L0001', 15, '95000.00', '120000.00', 100, 0, 0, 100, 1, 8, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(3, 'L0002', 10, '35000.00', '40000.00', 50, 0, 0, 50, 1, 2, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(4, 'L0003', 10, '25000.00', '30000.00', 50, 0, 0, 50, 1, 3, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(5, 'L0004', 20, '500000.00', '700000.00', 50, 4, 0, 46, 1, 4, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(6, 'L0005', 30, '230000.00', '280000.00', 50, 2, 0, 48, 1, 5, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(7, 'L0006', 15, '35000.00', '40000.00', 50, 0, 0, 50, 1, 7, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(11, 'L0010', 3, '25000.00', '32000.00', 20, 0, 0, 20, 1, 11, 2, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(12, 'L0011', 2, '15000.00', '21000.00', 20, 0, 0, 20, 1, 12, 2, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(14, 'L0014', 10, '95000.00', '120000.00', 100, 4, 0, 96, 1, 8, 1, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(15, '12358', 15, '25000.00', '30000.00', 100, 0, 0, 100, 1, 1, 2, '2021-04-20 11:10:36', '2021-04-20 11:10:36'),
(18, 'L0045', 100, '25000.00', '30000.00', 100, 0, 0, 100, NULL, 15, 3, '2021-04-20 11:10:36', '2021-04-20 11:10:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_04_14_110951_create_nhacungcap_table', 1),
('2016_04_16_005616_create_nhom_table', 1),
('2016_04_18_030252_create_tuyendung_table', 1),
('2016_04_20_062118_create_khuyenmai_table', 1),
('2016_04_28_141651_create-donvitinh-table', 1),
('2016_04_16_011341_create_loaisanpham_table', 2),
('2016_04_20_031400_create_sanpham_table', 3),
('2016_04_20_032205_create_giabanra_table', 4),
('2016_04_20_133501_create_hinhsanpham_table', 4),
('2016_04_25_174513_create_giamuavao_table', 4),
('2016_05_01_023512_create_nhom_table', 5),
('2016_05_01_023719_create_loaisanpham_table', 6),
('2016_05_01_023846_create_sanpham_table', 7),
('2016_05_01_023949_create_giabanra_table', 8),
('2016_05_01_024111_create_giamuavao_table', 8),
('2016_05_01_024136_create_hinhsanpham_table', 8),
('2016_05_09_032019_create_monngon_table', 9),
('2016_05_10_165156_create_hinhmonngon_table', 10),
('2016_05_13_074300_create_lohang_table', 11),
('2016_05_13_102657_create_sanpham_table', 12),
('2016_05_13_103740_create_lohang_table', 13),
('2016_05_13_104520_create_hinhsanpham_table', 14),
('2016_05_13_105811_create_hinhsanpham_table', 15),
('2016_05_13_162644_create_monngon_table', 16),
('2016_05_14_073949_create_nguyenlieu_table', 17),
('2016_05_16_112417_create_khuyenmai_table', 18),
('2016_05_16_150907_create_tylegia_table', 19),
('2016_05_16_160708_create_tylegia_table', 20),
('2016_05_17_075014_create_tuyendung_table', 21),
('2016_05_19_093429_create_khuyenmai_table', 22),
('2016_05_19_093815_create_sanphamkhuyenmai_table', 23),
('2016_05_20_091554_craete_pages_table', 24),
('2016_05_23_092444_create_loainguoidung_table', 24),
('2014_10_12_000000_create_users_table', 25),
('2016_05_23_094448_create_nhanvien_table', 26),
('2016_06_01_081813_create_khachhang_table', 27),
('2016_06_01_085225_create_tinhtranghd_table', 28),
('2016_06_01_084422_create_donhang_table', 29),
('2016_06_01_090918_create_chitietdonhang_table', 30),
('2016_06_01_151838_create_binhluan_table', 31),
('2016_06_22_215955_create_quangcao_table', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monngon`
--

CREATE TABLE `monngon` (
  `id` int(10) UNSIGNED NOT NULL,
  `monngon_tieu_de` text COLLATE utf8_unicode_ci NOT NULL,
  `monngon_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monngon_tom_tat` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_noi_dung` longtext COLLATE utf8_unicode_ci NOT NULL,
  `monngon_luot_xem` int(11) NOT NULL,
  `monngon_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monngon_da_xoa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monngon`
--

INSERT INTO `monngon` (`id`, `monngon_tieu_de`, `monngon_url`, `monngon_tom_tat`, `monngon_noi_dung`, `monngon_luot_xem`, `monngon_anh`, `monngon_da_xoa`, `created_at`, `updated_at`) VALUES
(3, 'NẤM BÀO NGƯ XÀO XỐT MÈ', 'nam-bao-ngu-xao-xot-me', '<p><strong>Mới x&agrave;o th&ocirc;i m&agrave; m&ugrave;i m&egrave; lẫn m&ugrave;i xốt mayonnaise Aji-mayo đ&atilde; thơm lừng rồi. Khi được b&agrave;y ra dĩa, m&oacute;n ăn với nhiều m&agrave;u sắc của nấm b&agrave;o ngư, c&agrave; rốt, v&agrave; b&ocirc;ng cải trong thật hấp dẫn. Thịt nạc dăm thấm vị ăn v&agrave;o thơm thơm vị x&agrave;o, nấm b&agrave;o ngư vừa ch&iacute;n tới cũng ngon ngọt kh&ocirc;ng k&eacute;m.&nbsp;</strong></p>\r\n', '<h3>NGUY&Ecirc;N LIỆU</h3>\r\n\r\n<ul>\r\n	<li>Nấm b&agrave;o ngư: 200g</li>\r\n	<li>Ớt sừng băm: 1M</li>\r\n	<li>Thịt nạc dăm: 50g</li>\r\n	<li>C&agrave; rốt: 50g</li>\r\n	<li>H&agrave;nh l&aacute;: 3 nh&aacute;nh</li>\r\n	<li>H&agrave;nh t&iacute;m băm: 1M</li>\r\n	<li>B&ocirc;ng cải xanh: 100g</li>\r\n	<li>M&egrave; rang: 30g</li>\r\n	<li>Tỏi băm: 1M</li>\r\n	<li>Dầu ăn, dầu m&egrave;, đường, ti&ecirc;u</li>\r\n	<li>Hạt n&ecirc;m</li>\r\n	<li>Xốt Mayonaise</li>\r\n	<li>Nước tương</li>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h3>1. SƠ CHẾ:</h3>\r\n\r\n<p>&ndash; Nấm b&agrave;o ngư x&eacute; đ&ocirc;i, ướp 1M h&agrave;nh, tỏi băm, 1M nước tương&nbsp;<em>&ldquo;Ph&uacute; Sĩ&rdquo;</em>&nbsp;v&agrave;&nbsp; 1/2M đường.</p>\r\n\r\n<p>&ndash; Thịt nạc dăm cắt miếng, ướp 1M h&agrave;nh, tỏi băm, 1/2M hạt n&ecirc;m Aji-ngon&reg;, 1/2M ti&ecirc;u.</p>\r\n\r\n<p>&ndash; B&ocirc;ng cải xanh t&aacute;ch nh&aacute;nh thật nhỏ. C&agrave; rốt cắt l&aacute;t mỏng, d&ugrave;ng dao răng cưa nhấn chiều ngang 1cm. H&agrave;nh l&aacute; cắt kh&uacute;c.</p>\r\n\r\n<p>&ndash; Pha gia vị x&agrave;o: 2M xốt mayonnaise&nbsp;<em>&ldquo;Aji-mayo&rdquo;,</em>&nbsp;1M nước tương&nbsp;<em>&ldquo;Ph&uacute; Sĩ&rdquo;,</em>&nbsp;1/3M ti&ecirc;u, 1M dầu m&egrave;, 1M m&egrave; rang, 1M ớt sừng băm.&nbsp;</p>\r\n\r\n<h3>2. THỰC HIỆN:</h3>\r\n\r\n<p>Phi thơm h&agrave;nh tỏi, x&agrave;o săn thịt nạc dăm, cho nấm b&agrave;o ngư v&agrave;o x&agrave;o lửa lớn, th&ecirc;m một &iacute;t nước, tiếp tục cho b&ocirc;ng cải, c&agrave; rốt v&agrave;o x&agrave;o ch&iacute;n. Th&ecirc;m 1/2 ch&eacute;n nước, cuối c&ugrave;ng tắt lửa, th&ecirc;m xốt x&agrave;o v&agrave; h&agrave;nh l&aacute; v&agrave;o, đảo đều, rắc th&ecirc;m m&egrave; rang c&ograve;n lại.</p>\r\n', 1, 'nam-bao-ngu-xot-me.png', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(4, 'Nấm xào ngũ sắc bắt mắt người ăn', 'nam-xao-ngu-sac-bat-mat-nguoi-an', '<p><strong><span style=\"color:#000000\">Nấm l&agrave; 1 thực phẩm kh&ocirc;ng những ngon m&agrave; c&ograve;n rất c&oacute; lợi cho sức khỏe. Mỗi loại nấm lại đem đến cho ta 1 hương vị ri&ecirc;ng, l&agrave;m n&ecirc;n sự độc đ&aacute;o, ngon miệng của bữa cơm gia đ&igrave;nh. H&ocirc;m nay sổ tay nấu ăn sẽ hướng dẫn cả nh&agrave; m&oacute;n Nấm x&agrave;o ngũ sắc</span></strong></p>\r\n', '<h4>Nguy&ecirc;n liệu:</h4>\r\n\r\n<ul>\r\n	<li><a href=\"http://sotaynauan.com/tag/nam-mo/\">Nấm mỡ</a>&nbsp;-&nbsp;khoảng 400 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/tom-tuoi/\">T&ocirc;m tươi</a>&nbsp;-&nbsp;300 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/dau-ha-lan/\">Đậu H&agrave; lan</a>&nbsp;-&nbsp;150 gr</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/ot-chuong-do-vang/\">Ớt chu&ocirc;ng đỏ, v&agrave;ng</a>&nbsp;-&nbsp;1 nửa quả mỗi loại</li>\r\n	<li><a href=\"http://sotaynauan.com/tag/ngo-non/\">Ng&ocirc; non</a>&nbsp;-&nbsp;200 gr</li>\r\n</ul>\r\n\r\n<h4>Hướng dẫn:</h4>\r\n\r\n<p><strong>Bước 1:&nbsp;</strong>Nấm&nbsp;mỡ cắt bỏ ch&acirc;n, mũ nấm n&agrave;o to th&igrave; bổ l&agrave;m đ&ocirc;i, ng&ocirc; non&nbsp;cũng vậy, bắp n&agrave;o to c&aacute;c bạn bổ đ&ocirc;i ra cho vừa ăn nh&eacute;. Đậu H&agrave; Lan tước bỏ xơ, ớt chu&ocirc;ng&nbsp;đỏ v&agrave;ng th&aacute;i miếng d&agrave;i.</p>\r\n\r\n<p><strong>Bước 2:&nbsp;</strong>Đun s&ocirc;i 1 nồi nước, thả 1 d&uacute;m muối rồi cho ng&ocirc; non&nbsp;v&agrave; đậu H&agrave; Lan&nbsp;v&agrave;o trần sơ, vớt ra ng&acirc;m ngay v&agrave;o b&aacute;t nước lạnh để ng&ocirc; v&agrave; đậu giữ được m&agrave;u sắc đẹp.</p>\r\n\r\n<p><strong>Bước 3:&nbsp;</strong><em>T&ocirc;m</em>&nbsp;tươi b&oacute;c bỏ đầu v&agrave; vỏ, đem x&agrave;o săn với h&agrave;nh kh&ocirc; v&agrave; nước mắm, tr&uacute;t ra 1 đĩa ri&ecirc;ng.</p>\r\n\r\n<p><strong>Bước 4:</strong>&nbsp;Tiếp tục cho dầu ăn v&agrave;o chảo, ch&uacute;ng ta x&agrave;o đến phần nấm, &oacute;t chu&ocirc;ng&nbsp;đỏ v&agrave; v&agrave;ng. N&ecirc;m nếm gia vị vừa miệng.</p>\r\n\r\n<p><strong>Bước 5:</strong>&nbsp;Khi nấm gần ch&iacute;n v&agrave; đ&atilde; ngấm gia vị, c&aacute;c bạn cho đến phần ng&ocirc; non v&agrave; &nbsp;đậu H&agrave; Lanv&agrave;o x&agrave;o c&ugrave;ng. Ở bước n&agrave;y c&oacute; thể th&ecirc;m 1 ch&uacute;t dầu h&agrave;o v&agrave;o để tăng hương vị v&agrave; sắc b&oacute;ng đẹp cho &nbsp;m&oacute;n x&agrave;o&nbsp;của ch&uacute;ng ta.</p>\r\n\r\n<p><strong>Bước 6:</strong>&nbsp;Cuối c&ugrave;ng l&agrave; đến t&ocirc;m, c&aacute;c bạn đảo nhanh tay v&agrave; tắt bếp. Cho m&oacute;n&nbsp;nấm x&agrave;o ngũ sắc&nbsp;ra đĩa v&agrave; c&ugrave;ng cả nh&agrave; thưởng thức nh&eacute;!</p>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 'che-bien-nam-xao-ngu-sac-.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(10, 'Mon ngon r', 'Mon-ngon-r', '<p>f</p>\r\n', '<p>r</p>\r\n', 1, '24.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(11, 'sda', 'sda', '<p>ada</p>\r\n', '<p>wrewr</p>\r\n', 1, '30.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(12, 'bai viet', 'bai-viet', '<p>bai viet</p>\r\n', '<p>bai viet</p>\r\n', 1, '19.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(14, 'f', 'f', '<p>f</p>\r\n', '<p>f</p>\r\n', 1, '31.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(15, 'adadads', 'adadads', '<p>dsds</p>\r\n', '<p>sada</p>\r\n', 1, '3.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(17, 'Làm cả ổ bánh pancake to đồ sộ chỉ với nồi cơm điện', 'lam-ca-o-banh-pancake-to-do-so-chi-voi-noi-com-dien', '<p>ad</p>\r\n', '<p>sd</p>\r\n', 1, 'img20160511232640735.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35'),
(18, 'Mon ngon12366774', 'mon-ngon12366774', '<p>Mon ngon12366774</p>\r\n', '<p>Mon ngon12366774</p>\r\n', 1, '16.jpg', 1, '2021-04-20 11:05:07', '2021-04-20 11:05:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `monngon_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`monngon_id`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(12, 2, NULL, NULL),
(12, 1, NULL, NULL),
(15, 2, NULL, NULL),
(11, 2, NULL, NULL),
(10, 1, NULL, NULL),
(10, 2, NULL, NULL),
(4, 2, NULL, NULL),
(3, 7, NULL, NULL),
(18, 12, NULL, NULL),
(18, 8, NULL, NULL),
(18, 7, NULL, NULL),
(17, 1, NULL, NULL),
(17, 3, NULL, NULL),
(17, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhacungcap_ten` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhacungcap_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id`, `nhacungcap_ten`, `nhacungcap_dia_chi`, `nhacungcap_sdt`, `created_at`, `updated_at`) VALUES
(1, 'Vườn đà lạt', '<p>a</p>\r\n', '01678991282', NULL, NULL),
(2, 'Rau sạch vườn nhà', '<p>104/1A Xu&acirc;n Thới 5 - H&oacute;c M&ocirc;n - tp. Hồ Ch&iacute; Minh</p>\r\n', ' 0917116441', NULL, NULL),
(3, 'Công Ty TNHH Thương Mại Và Sản Xuất Nông Sản SAPO DakLak', '<p>Cao ốc B, Ng&ocirc; Gia Tự, P.3, Q.10,&nbsp;<strong><em>Tp. Hồ Ch&iacute; Minh (TPHCM)</em></strong></p>\r\n', '0938031013', NULL, NULL),
(4, 'Doanh Phú - Công Ty TNHH Doanh Phú', '<p>75N/15 Đường Số 2, P. Hiệp B&igrave;nh Phước, Q. Thủ Đức&nbsp;<strong><em>Tp. Hồ Ch&iacute; Minh (TPHCM)</em></strong></p>\r\n', '0862833102', NULL, NULL),
(5, 'Công Ty TNHH Sản Xuất Thực Phẩm BaSao Food', '<p>Nguyễn Văn Thực, Khu 3, P. Đại Ph&uacute;c, Tp. Bắc Ninh,&nbsp;<strong><em>Bắc Ninh</em></strong></p>\r\n', '0933581989', NULL, NULL),
(6, 'Công Ty TNHH Chân Thành', '<p>141/10 đường số 11, P. B&igrave;nh Hưng H&ograve;a, Q. B&igrave;nh T&acirc;n, Tp. Hồ Ch&iacute; Minh (TPHCM)</p>\r\n', '0854084059', NULL, NULL),
(7, 'Công Ty Cổ Phần 36 An Bình Thái', '<p>Th&ocirc;n Lộng Kh&ecirc; 1, X&atilde; An Kh&ecirc;, H. Quỳnh Phụ,<strong><em>Th&aacute;i B&igrave;nh</em></strong></p>\r\n', '0363696398', NULL, NULL),
(8, 'Công Ty TNHH Hải Mạnh Bắc Ninh', '<p>Th&ocirc;n Đa Cầu, X. Nam Sơn, TP. Bắc Ninh,&nbsp;<strong><em>Bắc Ninh</em></strong></p>\r\n', '0912436220', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhanvien_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_cmnd` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_sdt` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_dia_chi` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nhanvien_ngay_vao_lam` date NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `nhanvien_ten`, `nhanvien_cmnd`, `nhanvien_sdt`, `nhanvien_dia_chi`, `nhanvien_ngay_vao_lam`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Nhân viên', '301498483', '012678991281', 'Long An', '2020-05-01', 1, '2021-04-20 11:12:30', '2021-04-20 11:12:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhom`
--

CREATE TABLE `nhom` (
  `id` int(10) UNSIGNED NOT NULL,
  `nhom_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nhom_mo_ta` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `nhom_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhom`
--

INSERT INTO `nhom` (`id`, `nhom_ten`, `nhom_url`, `nhom_mo_ta`, `nhom_anh`, `created_at`, `updated_at`) VALUES
(1, 'Thịt sạch', 'thit-sach', '<p>Thịt sạch</p>\r\n', 'thitsach.jpg', NULL, NULL),
(2, 'Rau sạch', 'rau-sach', '', 'rausach.jpg', NULL, NULL),
(3, 'Hoa quả sạch', 'hoa-qua-sach', '<p>Hoa quả sạch</p>\r\n', 'hoaquasach.jpg', NULL, NULL),
(4, 'Thực phẩm khô', 'thuc-pham-kho', '<p>Thực phẩm kh&ocirc;</p>\r\n', 'tpkho.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `id` int(10) UNSIGNED NOT NULL,
  `quangcao_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quangcao_trang_thai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`id`, `quangcao_anh`, `quangcao_trang_thai`, `created_at`, `updated_at`) VALUES
(2, 'slide1.jpg', 0, NULL, NULL),
(3, 'slide2.jpg', 0, NULL, NULL),
(4, 'banner4.jpg', 1, NULL, NULL),
(5, 'about-vi-banner.jpg', 1, NULL, NULL),
(6, 'cung-cap-rau-sach.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `sanpham_ky_hieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sanpham_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `loaisanpham_id` int(10) UNSIGNED NOT NULL,
  `donvitinh_id` int(10) UNSIGNED NOT NULL,
  `sanpham_khuyenmai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `sanpham_ky_hieu`, `sanpham_ten`, `sanpham_url`, `sanpham_anh`, `sanpham_mo_ta`, `loaisanpham_id`, `donvitinh_id`, `sanpham_khuyenmai`, `created_at`, `updated_at`) VALUES
(1, 'N0001', 'Nấm Hương', 'nam-huong', 'nam_huong_tuoi.jpg', '<p>Nấm Hương</p>\r\n', 2, 1, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(2, 'N0002', 'Nấm mỡ', 'nam-mo', 'nam-mo.jpg', '<p><strong><em>Nấm mỡ</em>&nbsp; thường&nbsp;được sử dụng l&agrave;m &nbsp;thực phẩm trong bữa ăn h&agrave;ng ng&agrave;y,ngo&agrave;i ra&nbsp;<em>nấm mỡ</em>&nbsp;c&ograve;n l&agrave; vị thuốc gi&agrave;u c&ocirc;ng dụng trong y học.</strong></p>\r\n\r\n<p>Theo c&aacute;c t&agrave;i liệu y học cổ truyền,&nbsp;<em>nấm mỡ</em>&nbsp;vị ngọt, t&iacute;nh m&aacute;t, c&oacute; c&ocirc;ng dụng bổ tỳ &iacute;ch kh&iacute;, nhuận phế ho&aacute; đ&agrave;m, ti&ecirc;u thực l&yacute; kh&iacute;, rất th&iacute;ch hợp cho những người ch&aacute;n ăn mệt mỏi do tỳ vị hư yếu, sản phụ thiếu sữa, vi&ecirc;m phế quản mạn t&iacute;nh, vi&ecirc;m gan mạn t&iacute;nh, hội chứng suy giảm bạch cầu&hellip; S&aacute;ch Bản thảo cương mục viết&nbsp;<em>nấm mỡ</em>&nbsp;c&oacute; t&aacute;c dụng &ldquo;&iacute;ch tr&agrave;ng vị, ho&aacute; đ&agrave;m l&yacute; kh&iacute;&rdquo;.</p>\r\n\r\n<p>C&aacute;c nghi&ecirc;n cứu dinh dưỡng hiện đại th&igrave; khẳng định:&nbsp;<strong>nấm mỡ</strong>&nbsp;c&oacute; khả năng ức chế tụ cầu v&agrave;ng, trực khuẩn thương h&agrave;n v&agrave; trực khuẩn coli. Nhiều năm trở lại đ&acirc;y, người ta cũng đ&atilde; nhận thấy việc d&ugrave;ng nấm mỡ l&agrave;m thức ăn h&agrave;ng ng&agrave;y hoặc thường xuy&ecirc;n uống nước sắc loại nấm n&agrave;y khả năng trị liệu vi&ecirc;m gan mạn t&iacute;nh v&agrave; chứng giảm thiểu bạch cầu.&nbsp;</p>\r\n\r\n<p>Ngo&agrave;i ra,&nbsp;<strong>nấm mỡ</strong>&nbsp;c&ograve;n c&oacute; c&ocirc;ng dụng l&agrave;m giảm đường m&aacute;u, hạ nồng độ cholesterol trong huyết thanh v&agrave; cải thiện chức năng tuyến tuỵ. Bởi vậy, nấm mỡ được đ&aacute;nh gi&aacute; l&agrave; một trong những thực phẩm th&iacute;ch hợp d&agrave;nh cho người bị bệnh tim mạch, đ&aacute;i đường, ung thư hay mắc c&aacute;c bệnh l&yacute; về tuyến tuỵ.</p>\r\n', 2, 1, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(3, 'N0003', 'Nấm kim châm', 'nam-kim-cham', 'nam-kim-cham-2.jpg', '<p>Nấm kim ch&acirc;m</p>\r\n', 2, 1, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(4, 'CR001', 'Quả Cherry Mỹ', 'qua-cherry-my', 'cherry5.jpg', '<p>1.Xuất sứ :</p>\r\n\r\n<p>-<strong>Quả Cherry Mỹ</strong>&nbsp;được canh t&aacute;c chủ yếu ở v&ugrave;ng&nbsp;Bakerfield, Arvin, Lodi, Stockton v&agrave; Linden nơi kh&iacute; hậu ấm &aacute;p,kh&ocirc; n&oacute;ng , th&iacute;ch hợp để c&acirc;y cherry ph&aacute;t triển ,quả cherry ở đ&acirc;y được tắm no nắng n&ecirc;n ngọt đậm đ&agrave;,hương quyến rũ.</p>\r\n\r\n<p>-<strong>Tr&aacute;i Cherry</strong>&nbsp;căng mọng đẹp mắt l&agrave; loại&nbsp;<a href=\"http://cleverfood.com.vn/hoa-qua-nhap-khau-b1566500.html\" target=\"_blank\"><strong>hoa quả nhập khẩu</strong></a>&nbsp;đắt tiền n&ecirc;n&nbsp;thường được sử dụng l&agrave;m qu&agrave; biếu.</p>\r\n\r\n<p>2.Đặc điểm :</p>\r\n\r\n<p>-<strong>Cherry</strong>&nbsp;l&agrave; một chủng lo&agrave;i c&acirc;y rụng l&aacute;,th&acirc;n gỗ ,c&acirc;y l&ugrave;n ,t&aacute;n rậm.N&oacute; được trồng chủ yếu ở v&ugrave;ng &ocirc;n đới,cần khoảng 200-1500 giờ ngủ đ&ocirc;ng,tuy nhi&ecirc;n quả cherry lại rất cần tắm no nắng để đạt được m&agrave;u sắc ,cũng như hương vị ho&agrave;n hảo.</p>\r\n\r\n<p>-<strong>Tr&aacute;i&nbsp;cherry</strong>&nbsp;được đ&aacute;nh gi&aacute; l&agrave; kh&oacute; trồng,gi&aacute; cũng v&igrave; thế m&agrave; chẳng hề dễ chịu.Theo&nbsp;nhiều chuy&ecirc;n gia th&igrave; quả&nbsp;cherry Mỹ cho chất lượng tốt nhất từ m&agrave;u sắc,hương vị tới gi&aacute; trị dinh dưỡng.</p>\r\n\r\n<p>-Th&ocirc;ng thường m&ugrave;a thu hoạch cherry l&agrave; từ th&aacute;ng 5-&gt; 8 .Do th&acirc;n c&acirc;y thấp&nbsp;n&ecirc;n nhiều nơi ở Mỹ mở dịch vụ cho trải nghiệm h&aacute;i v&agrave; ăn cherry tại vườn.Những quả cherry Mỹ tươi ngon,an to&agrave;n quả thực qu&aacute; hấp dẫn.</p>\r\n\r\n<p>-<strong>Quả cherry Mỹ</strong>&nbsp;da l&aacute;ng b&oacute;ng,thịt chắc,m&agrave;u v&agrave;ng đỏ tươi,khi ch&iacute;n ngả m&agrave;u t&iacute;m t&iacute;a rất đẹp.Thịt cherry&nbsp;mọng,&oacute;ng ả như ngọc b&iacute;ch&nbsp;,ăn gi&ograve;n ngọt, đậm đ&agrave;,hương thơm dịu nhẹ thư th&aacute;i,hạt r&oacute;c kh&ocirc;ng d&iacute;nh.</p>\r\n\r\n<p>3.C&ocirc;ng Dụng:</p>\r\n\r\n<p>-<strong>Quả cherry</strong>&nbsp;rất nhiều năng lượng lấy từ calo tự nhi&ecirc;n gi&uacute;p t&acirc;m trạng vui vẻ,hưng phấn.</p>\r\n\r\n<p>-Ăn cherry thường xuy&ecirc;n cải thiện t&igrave;nh trạng mất ngủ.Quả cherry chứa melatonin l&agrave;m cho giấc ngủ s&acirc;u v&agrave; ngon hơn lại kh&ocirc;ng hại sức khỏe như nhiều loại thuốc.</p>\r\n\r\n<p>-H&agrave;m lượng vitamin A c&oacute; trong tr&aacute;i cherry được t&iacute;nh to&aacute;n l&agrave; cao gấp 20 lần so với d&acirc;u t&acirc;y hay việt quất.Kh&ocirc;ng chỉ tốt cho mắt ăn quả&nbsp;cherry Mỹ&nbsp;h&agrave;ng ng&agrave;y c&ograve;n l&agrave;m l&agrave;n da s&aacute;ng mịn,căng tr&agrave;n nhựa sống</p>\r\n\r\n<p>-Quả cherry rất gi&agrave;u chất chống oxi h&oacute;a mạnh anthocyanins&nbsp;kh&ocirc;ng cải thiện t&igrave;nh trạng mất tr&iacute; nhớ,c&ograve;n ngăn ngừa ung thư , l&agrave;m chậm l&atilde;o h&oacute;a,nếp nhăn v&igrave; thế m&agrave; l&acirc;u xuất hiện</p>\r\n\r\n<p>-<strong>Tr&aacute;i cherry</strong>&nbsp;c&ograve;n v&ocirc; c&ugrave;ng tốt cho tim mạch, giảm vi&ecirc;m nhiễm xương khớp, đau nhức cơ n&ecirc;n được nhiều vận động vi&ecirc;n ưa chuộng.Lượng chất sơ dồi d&agrave;o trong quả cherry hỗ trợ tốt cho ti&ecirc;u h&oacute;a.</p>\r\n\r\n<p>-Kali c&oacute; trong cherry tuy kh&ocirc;ng nhiều như chuối hay việt quất tuy nhi&ecirc;n cũng hạn chế tối đa hiện tượng chuột r&uacute;t,v&agrave; tất nhi&ecirc;n nhiều người vẫn th&iacute;ch ăn quả cherry Mỹ thay v&igrave; chuối.</p>\r\n', 7, 2, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(5, 'TC001', 'Nho xanh Nam Phi', 'Nho-xanh-Nam-Phi', 'nho6.jpg', '<p>a</p>\r\n', 7, 2, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(7, 'N0004', 'Nấm bào ngư trắng', 'Nam-bao-ngu-trang', 'nambaongu24224.jpg', '<p>Theo c&aacute;c nh&agrave; khoa học trong nấm&nbsp;<a href=\"http://toiyeunamviet.com/\">B&agrave;o ngư trắng</a>&nbsp;n&oacute;i chung cũng như c&aacute;c loại nấm S&ograve; tươi n&oacute;i ri&ecirc;ng c&oacute; chất plutorin c&oacute; c&ocirc;ng hiệu kh&aacute;ng khuẩn gram dương v&agrave; kh&aacute;ng cả tế b&agrave;o ung thư&hellip;C&aacute;c nghi&ecirc;n cứu kh&aacute;c về nấm c&oacute; t&aacute;c dụng l&agrave;m giảm thiểu đối với cholesterol v&agrave; đường m&aacute;u</p>\r\n\r\n<p>Đối với Đ&ocirc;ng y, Nấm c&oacute; vị ngọt, t&iacute;nh ấm, c&ocirc;ng năng t&aacute;n h&agrave;n v&agrave; thư c&acirc;n, c&oacute; khả năng ph&ograve;ng v&agrave; chữa c&aacute;c bệnh như l&agrave;m hạ huyết &aacute;p, chống b&eacute;o ph&igrave;, chữa bệnh đường ruột, tẩy m&aacute;u xấu, l&agrave;m giảm cholesterol trong m&aacute;u, hỗ trợ người bị bệnh g&uacute;t trong chế độ dinh dưỡng.</p>\r\n\r\n<p>Đặc biệt l&agrave; đ&atilde; c&oacute; một số c&ocirc;ng tr&igrave;nh nghi&ecirc;n cứu c&ograve;n cho rằng&nbsp;<a href=\"http://toiyeunamviet.com/index.php/nam-va-suc-khoe/item/2-chiet-xuat-tu-nam-bao-ngu-tri-ung-thu-dai-trang\">Nấm S&ograve; c&oacute; khả năng chống bệnh ung thư.</a></p>\r\n\r\n<p><strong>Gi&aacute; trị dinh dưỡng:</strong></p>\r\n\r\n<p>Nấm B&agrave;o ngư trắng c&oacute; rất nhiều gi&aacute; trị dinh dưỡng, chứa nhiều protein, vi-ta-min v&agrave; c&aacute;c a-x&iacute;t a-min c&oacute; nguồn gốc thực vật, dễ hấp thụ bởi cơ thể con người. Đặc biệt với h&agrave;m lượng protein chiếm tới 33 &ndash; 43%, nấm B&agrave;o ngư trắng ho&agrave;n to&agrave;n c&oacute; thể thay thế lượng đạm từ thịt, c&aacute;&hellip; Do đ&oacute;, nấm B&agrave;o ngư trắng c&ograve;n được gọi l&agrave; &ldquo;thịt chay&rdquo;, &ldquo;thịt sạch&rdquo; khi được sử dụng như nguồn cung cấp protein chủ yếu qua c&aacute;c bữa ăn.</p>\r\n\r\n<p>Đối với người suy nhược cơ thể, c&aacute;c m&oacute;n ăn chế biến từ nấm gi&uacute;p phục hồi sinh lực nhanh ch&oacute;ng.</p>\r\n', 2, 1, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(8, 'TC002', 'Dâu tây Đà Lạt', 'dau-tay-da-lat', 'sd.jpg', '<p>1.Xuất xứ :</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y</strong>&nbsp;(t&ecirc;n&nbsp;khoa học: Fragaria) l&agrave;&nbsp;lo&agrave;i thực vật&nbsp;thuộc họ Hoa hồng (Rosaceae) cho quả được nhiều người ưa chuộng. D&acirc;u t&acirc;y c&oacute; nguồn g&oacute;c ở&nbsp;ch&acirc;u Mỹ v&agrave; được c&aacute;c nh&agrave; l&agrave;m vườn ch&acirc;u &Acirc;u cho lai tạo v&agrave;o thế kỷ 18 để tạo n&ecirc;n giống d&acirc;u t&acirc;y được trồng rộng r&atilde;i hiện nay.&nbsp;</p>\r\n\r\n<p>-Ở Việt Nam m&ocirc;i trường trồng được d&acirc;u t&acirc;y chỉ c&oacute; Sapa v&agrave; Đ&agrave; Lạt,trong đ&oacute; sản phẩm d&acirc;u t&acirc;y Đ&agrave; Lạt nổi bật hơn hẳn,chiếm lĩnh thị trường từ Nam ra Bắc.</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp;được trồng theo c&ocirc;ng nghệ thủy canh:</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng thuốc diệt cỏ.</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng chất k&iacute;ch th&iacute;ch.</p>\r\n\r\n<p>&nbsp; &nbsp;+Kh&ocirc;ng chất bảo quản</p>\r\n\r\n<p>2.Đặc điểm:</p>\r\n\r\n<p>-<strong>D&acirc;u t&acirc;y</strong>&nbsp;c&oacute; hơn 20 lo&agrave;i,nhưng chủ yếu l&agrave; d&acirc;u t&acirc;y đỏ,khi ch&iacute;n c&oacute; m&agrave;u phớt hồng đẹp mắt,vỏ mỏng ( gần như kh&ocirc;ng đ&aacute;ng kể ) c&ugrave;i thịt d&agrave;y,mọng nước,hạt nhỏ như hạt vừng c&oacute; thể ăn được.M&ugrave;i hương thơm m&aacute;t,dịu nhẹ nhưng cuốn h&uacute;t.</p>\r\n\r\n<p>-D&acirc;u t&acirc;y Đ&agrave; Lạt&nbsp;th&iacute;ch hợp với loại đất thịt nhẹ, h&agrave;m lượng chất hữu cơ cao, đất giữ ẩm nhưng tho&aacute;t nước tốt&nbsp;&nbsp;độ pH từ 6-7.</p>\r\n\r\n<p>-Kh&iacute; hậu &ocirc;n đới&nbsp;th&iacute;ch hợp cho c&acirc;y&nbsp;<strong>d&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp; sinh trưởng v&agrave; ph&aacute;t triển với nhiệt độ&nbsp;từ 18 - 25&deg;C v&agrave;&nbsp;tốt nhất n&ecirc;n&nbsp;trồng ở nơi n&agrave;o chỉ c&oacute; nắng trực tiếp&nbsp;nửa ng&agrave;y. V&igrave; thế d&acirc;u t&acirc;y rất được ưa chuộng trồng trong trậu treo để ban c&ocirc;ng.</p>\r\n\r\n<p>3.C&ocirc;ng dụng:D&ugrave; sử dụng dưới bất k&igrave; h&igrave;nh thức n&agrave;o th&igrave;&nbsp;<strong>d&acirc;u t&acirc;y Đ&agrave; Lạt</strong>&nbsp;vẫn mang lại những lợi &iacute;ch kh&ocirc;ng ngờ cho sức khỏe:</p>\r\n\r\n<p>-D&acirc;u t&acirc;y l&agrave; nguồn cung cấp vitamin C cực k&igrave; dồi d&agrave;o 3 quả d&acirc;u tay chứa 52mg Vitamin C đ&aacute;p ứng 1/2 nhu cầu cơ thể trong ng&agrave;y vừa chống oxi h&oacute;a tốt lại tăng cường hệ miễn dịch,ngăn ngừa bệnh đục thủy tinh thể,bảo vệ mắt ,ngăn ngừa nếp nhăn , l&agrave;n da tươi trẻ</p>\r\n\r\n<p>-Trong d&acirc;u t&acirc;y Đ&agrave; Lạt c&ograve;n chứa nhiều&nbsp;Axit ellagic - một chất h&oacute;a học thi&ecirc;n nhi&ecirc;n&nbsp;đ&atilde; được chứng minh l&agrave; c&oacute; c&ocirc;ng dụng chống ung thư bằng c&aacute;ch chế ngự sự ph&aacute;t triển c&aacute;c tế b&agrave;o ung thư.</p>\r\n\r\n<p>-Theo nghi&ecirc;n cứu&nbsp;Axit ellagic v&agrave; c&aacute;c flavonoid c&oacute; trong d&acirc;u t&acirc;y l&agrave;m giảm lượng&nbsp;cholesterol c&oacute; hại,ngăn ngừa nguy cơ đột quỵ.Ngo&agrave;i ra kali c&oacute; trong d&acirc;u t&acirc;y gi&uacute;p điều h&ograve;a huyết &aacute;p,ổn định nhịp tim.</p>\r\n\r\n<p>-Lượng chất sơ c&oacute; trong d&acirc;u t&acirc;y Đ&agrave; Lạt vừa hỗ trợ ti&ecirc;u h&oacute;a lại c&oacute; t&aacute;c dụng giảm c&acirc;n r&otilde; rệt.3 quả d&acirc;u chỉ chứa 28kcal,kh&ocirc;ng chất b&eacute;o,lượng đường thấp,natri kh&ocirc;ng đ&aacute;ng kể.</p>\r\n', 8, 2, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(11, 'N0008', 'Ngọn su su', 'ngon-su-su', 'ngon_su_su.JPG', '<p><strong><em>Ngọn su su</em></strong>&nbsp;ban đầu chỉ l&agrave; thức&nbsp;<a href=\"http://cleverfood.com.vn/rau-sach-b1566491.html\" target=\"_blank\"><strong><em>rau sạch</em></strong>&nbsp;</a>ăn hằng ng&agrave;y của người d&acirc;n Tam Đảo,sau trở th&agrave;nh đặc sản đại diện cho v&ugrave;ng đất tươi đẹp n&agrave;y.Lần n&agrave;o l&ecirc;n Tam Đảo (Vĩnh Ph&uacute;c) m&agrave; kh&ocirc;ng mang v&agrave;i c&acirc;n&nbsp;<em>ngọn su su&nbsp;</em>về l&agrave; t&ocirc;i thấy tiếc nuối.Một đĩa&nbsp;<em>ngọn su su</em>&nbsp;x&agrave;o tỏi&nbsp;n&oacute;ng hổi ăn trong&nbsp;tiết trời se lạnh của Tam Đảo qu&aacute; l&agrave; m&ecirc; ly.Với những người th&iacute;ch sự đơn giản,<strong><em>ngọn su su</em></strong>&nbsp;luộc chấm nước mắm ngon cũng đ&atilde; rất tuyệt vời.</p>\r\n\r\n<p>Người ta bảo, ẩm thực Tam Đảo nổi tiếng với m&oacute;n thịt b&ograve; x&agrave;o tỏi thơm lừng hay thịt g&agrave; đồi luộc nhưng bản th&acirc;n&nbsp;t&ocirc;i lại thấy&nbsp;<strong><em>ngọn&nbsp;su su</em></strong>&nbsp;mới thực l&agrave; đặc sản của đất n&agrave;y</p>\r\n\r\n<p><strong><em>Ngọn&nbsp;su su</em></strong>&nbsp;Tam Đảo giờ đ&atilde; c&oacute; mặt tại H&agrave; Nội, trong c&aacute;c phi&ecirc;n chợ, si&ecirc;u thị. Nhưng tươi ngon nhất vẫn l&agrave; mua ngay tại chợ Tam Đảo buổi s&aacute;ng v&agrave; mang về những t&uacute;i to t&uacute;i nhỏ cho cả nh&agrave;. Đến Tam Đảo, vừa được đi chơi vừa c&oacute; qu&agrave; ngon mang về</p>\r\n\r\n<p>Vị gi&ograve;n ngọt của&nbsp;<em><strong>ngọn su su</strong></em>&nbsp;sẽ khiến bữa cơm gia đ&igrave;nh th&ecirc;m hấp dẫn. C&aacute;c m&oacute;n hấp dẫn l&agrave;m từ ngọn su su như ngọn su su x&agrave;o t&ocirc;m lột vỏ, ngọn su su x&agrave;o l&ograve;ng g&agrave;, ngọn su su x&agrave;o thịt b&ograve;, ngọn su su x&agrave;o tỏi.</p>\r\n\r\n<p><strong>Ngọn su su</strong>&nbsp;hợp nhất l&agrave; x&agrave;o tỏi chứ kh&ocirc;ng mấy khi luộc hoặc nấu canh. Chỉ đơn giản ra gi&agrave;n su su v&agrave; chọn cắt v&agrave;i đọt su su ở nh&aacute;nh l&aacute; thứ hai kể từ ngọn v&igrave; đ&oacute; l&agrave; phần mềm v&agrave; ngọt nhất. Sau đ&oacute;, tước bỏ lớp xơ b&ecirc;n ngo&agrave;i v&agrave; bẻ th&agrave;nh những đoạn ngắn rồi rửa sạch v&agrave; để r&aacute;o nước. Khi chế biến, trước ti&ecirc;n cho một &iacute;t dầu ăn v&agrave;o chảo, sau đ&oacute; đập một t&eacute;p tỏi thả v&agrave;o dầu cho ch&iacute;n v&agrave;ng v&agrave; bắt đầu thả&nbsp;<em><strong>ngọn su su</strong></em>đ&atilde; cắt ngắn v&agrave;o, đổ th&ecirc;m một &iacute;t nước v&agrave; n&ecirc;m cho vừa ăn. Khi rau vừa ch&iacute;n tới, gi&atilde; th&ecirc;m một &iacute;t tỏi trộn v&agrave;o rồi cho ra đĩa, d&ugrave;ng n&oacute;ng.<strong>Ngọn su su</strong>&nbsp;x&agrave;o tỏi thơm ngon nhờ sự h&ograve;a quyện đậm đ&agrave; giữa c&aacute;i gi&ograve;n gi&ograve;n, b&ugrave;i b&ugrave;i của phần đọt v&agrave; c&aacute;i mềm mềm, ngọt thanh của phần l&aacute; c&ograve;n s&oacute;t lại. C&oacute; lẽ v&igrave; thế m&agrave; lần đầu nếm thử m&oacute;n ăn d&acirc;n d&atilde; nơi v&ugrave;ng đất rẻo cao T&acirc;y Bắc n&agrave;y, những du kh&aacute;ch&nbsp;chỉ c&ograve;n biết tấm tắc, h&iacute;t h&agrave;&hellip;</p>\r\n\r\n<p>Nếu anh chị kh&ocirc;ng c&oacute; thời gian,h&atilde;y đến với CleverFood để mua được&nbsp;<strong>ngọn su su</strong>&nbsp;tươi ngon nhất H&agrave; Nội n&agrave;y.</p>\r\n', 4, 2, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(12, 'N0009', 'Rau ngót rừng', 'rau-ngot-rung', 'rau ngot rung1.jpg', '<p>Đầu ti&ecirc;n xin đ&iacute;nh ch&iacute;nh với c&aacute;c chị lu&ocirc;n,rau ng&oacute;t nh&agrave; em kh&ocirc;ng phải loại rau sắng nổi tiếng của ch&ugrave;a Hương.Rau của nh&agrave; em l&agrave; rau ng&oacute;t giống thường được trồng tr&ecirc;n v&ugrave;ng n&uacute;i nơi kh&iacute; hậu trong l&agrave;nh sạch sẽ.Rau sạch 100% đấy&nbsp;ạ.</p>\r\n\r\n<p><strong><em>Rau ng&oacute;t rừng</em></strong>&nbsp;vốn được đồng b&agrave;o miền n&uacute;i d&ugrave;ng như một loại&nbsp;thực phẩm sạch&nbsp;trong bữa ăn hằng ng&agrave;y.Nhờ thời tiết kh&iacute; hậu &ocirc;n h&ograve;a,rau ng&oacute;t rừng ph&aacute;t triển rất mạnh.C&acirc;y to,l&aacute; d&agrave;y hơn rau&nbsp;<em>ng&oacute;t hữu cơ</em>,nước canh s&aacute;nh hơn,vị đậm đ&agrave; hơn.</p>\r\n\r\n<p>Bản th&acirc;n thức rau n&agrave;y rất sạch,&iacute;t s&acirc;u bọ,&iacute;t cần chăm b&oacute;n, rau an to&agrave;n&nbsp;cho mẹ,cho b&eacute;.</p>\r\n\r\n<p>Nếu&nbsp;muốn sử dụng loại rau&nbsp;n&agrave;y c&aacute;c bạn n&ecirc;n tới những cửa hạng rau sạch&nbsp;uy t&iacute;n ở Cần Thơ.H&atilde;y bảo vệ sự an to&agrave;n của bản th&acirc;n v&agrave; gia đ&igrave;nh bằng c&aacute;ch sử dụng c&aacute;c loại&nbsp;<strong><em>thực phẩm sạch.</em></strong></p>\r\n', 4, 2, 0, '2021-04-20 11:13:10', '2021-04-20 11:13:10'),
(15, 'CA005', 'Cơm Sấy Gạo Lứt Chà Bông', 'com-say-gao-lut-cha-bong', 'com chay gao luc 1.jpg', '<p>Cơm ch&aacute;y gạo lức ngon</p>\r\n', 10, 1, 1, '2021-04-20 11:13:10', '2021-04-20 11:13:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamkhuyenmai`
--

CREATE TABLE `sanphamkhuyenmai` (
  `khuyenmai_id` int(10) UNSIGNED NOT NULL,
  `sanpham_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamkhuyenmai`
--

INSERT INTO `sanphamkhuyenmai` (`khuyenmai_id`, `sanpham_id`, `created_at`, `updated_at`) VALUES
(4, 1, NULL, NULL),
(4, 2, NULL, NULL),
(4, 3, NULL, NULL),
(3, 4, NULL, NULL),
(3, 5, NULL, NULL),
(3, 7, NULL, NULL),
(3, 8, NULL, NULL),
(5, 2, NULL, NULL),
(5, 3, NULL, NULL),
(5, 5, NULL, NULL),
(6, 4, NULL, NULL),
(6, 5, NULL, NULL),
(6, 8, NULL, NULL),
(7, 4, NULL, NULL),
(7, 5, NULL, NULL),
(7, 11, NULL, NULL),
(8, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtranghd`
--

CREATE TABLE `tinhtranghd` (
  `id` int(10) UNSIGNED NOT NULL,
  `tinhtranghd_ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tinhtranghd_mo_ta` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtranghd`
--

INSERT INTO `tinhtranghd` (`id`, `tinhtranghd_ten`, `tinhtranghd_mo_ta`, `created_at`, `updated_at`) VALUES
(1, 'Chưa xác nhận', NULL, NULL, NULL),
(2, 'Giao hàng', NULL, NULL, NULL),
(3, 'Đã hủy', NULL, NULL, NULL),
(4, 'Đã thanh toán', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tuyendung`
--

CREATE TABLE `tuyendung` (
  `id` int(10) UNSIGNED NOT NULL,
  `tuyendung_tieu_de` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_mo_ta` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_lien_he` longtext COLLATE utf8_unicode_ci NOT NULL,
  `tuyendung_thoi_gian` int(11) NOT NULL,
  `tuyendung_tinh_trang` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tuyendung`
--

INSERT INTO `tuyendung` (`id`, `tuyendung_tieu_de`, `tuyendung_url`, `tuyendung_anh`, `tuyendung_mo_ta`, `tuyendung_lien_he`, `tuyendung_thoi_gian`, `tuyendung_tinh_trang`, `created_at`, `updated_at`) VALUES
(2, 'tuyen dung', 'tuyen-dung', 'img20160511232640735.jpg', '<p>a</p>\r\n', '<p>c</p>\r\n', 12, 0, '2021-04-20 11:13:59', '2021-04-20 11:13:59'),
(3, 'Tuyền nhân viên giao hàng', 'tuyen-nhan-vien-giao-hang', 'img20160511232640735.jpg', 'Tuyền nhân viên giao hàng', 'Tuyền nhân viên giao hàng', 15, 0, '2021-04-20 11:13:59', '2021-04-20 11:13:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `loainguoidung_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `loainguoidung_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', 'npq@admin.com', '$2y$10$9m67vYv1KpFR/VekcJsgNelUk50eii8BHuDYg/JpKyMsvKi2uZIem', 1, 'tki9ve7uIMgPdqVKZQAlRmr3GsY9MieIOeWxTVk2KmiiRgMeBEtwD3KSxdHZ', '2021-04-20 11:14:37', '2021-04-21 09:54:56'),
(9, 'Thái', 'thai@gmail.com', '$2y$10$9m67vYv1KpFR/VekcJsgNelUk50eii8BHuDYg/JpKyMsvKi2uZIem', 2, 'rYXE9sljjQVv1tSgGEFod2qMNK9OjUiTIp3F1GFVMyMKtGIVUUIdsufOMkyb', '2021-04-20 11:14:37', '2021-04-21 05:51:00'),
(10, 'Long', 'long@gmail.com', '$2y$10$9m67vYv1KpFR/VekcJsgNelUk50eii8BHuDYg/JpKyMsvKi2uZIem', 2, 'plAQOjeG5dKopix4PWK39AgEQGkBBj9hks6zb1mNsWx8ztEyv6g03F9hvie1', '2021-04-20 11:14:37', '2021-04-20 11:14:37'),
(11, 'Bảo', 'bao@gmail.com', '$2y$10$9m67vYv1KpFR/VekcJsgNelUk50eii8BHuDYg/JpKyMsvKi2uZIem', 2, NULL, '2021-04-20 11:14:37', '2021-04-20 11:14:37'),
(12, 'Ai đó', 'aido@gmail.com', '$2y$10$7EhtG2kbBOZrHZA1Hxhee.coNrMWwZpDYIurQ0fZNHiSxYIxqq5.K', 2, 'x1pJLMqkV909u3XPHBtBfnqMzIYVqiRq5O4JjhKZiX8mRo3trkyLrALNl6zF', '2021-04-20 11:14:37', '2021-04-20 11:14:37'),
(13, 'Khách hàng 1', 'kh1@gmail.com', '$2y$10$64Ev3BfH6DfLgiOMq2fxxuFk7fn86k0Cbr3BUOsnrbK5h1AOaSlW6', 2, 'vFZlzrxvSJDXGVn3IBVKUloGsE0tss1j4wdi8CtKCUmSnfnwuN3Bf38xFir5', '2021-04-20 11:14:37', '2021-04-20 11:14:37'),
(14, 'Khách hàng 2', 'kh2@gmail.com', '$2y$10$szgXVojhj52NwpJn8rWPd..pdAAmLOC04iiHxI11Ti1g1BugvYnjS', 2, 'W0ALEMEPO23wteBdKj5rbAnNH2apvr1YhFDeFKD5kgPyBWKMRdCx35u2jtZ1', '2021-04-20 11:14:37', '2021-04-20 11:14:37'),
(15, 'khachhang', 'khachhang@gmail.com', '$2y$10$0qY.Fv0B/aAc0Kh4iQmNXuWDtnVVn6mRRwtSjqQLCzQqymB6fPMHC', 2, '5K9FRksWCxP3GWJp6Z2xbGL77qeUMwYKBxFl1TxrIIe7HzFk5VpwrExYHVzS', '2021-04-22 07:42:18', '2021-04-22 07:44:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `binhluan_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_sanpham_id_foreign` (`sanpham_id`),
  ADD KEY `chitietdonhang_donhang_id_foreign` (`donhang_id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_khachhang_id_foreign` (`khachhang_id`),
  ADD KEY `donhang_tinhtranghd_id_foreign` (`tinhtranghd_id`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinhsanpham_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `khachhang_khachhang_email_unique` (`khachhang_email`),
  ADD KEY `khachhang_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loaisanpham_nhom_id_foreign` (`nhom_id`);

--
-- Chỉ mục cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lohang_nhacungcap_id_foreign` (`nhacungcap_id`),
  ADD KEY `lohang_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `monngon`
--
ALTER TABLE `monngon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD KEY `nguyenlieu_monngon_id_foreign` (`monngon_id`),
  ADD KEY `nguyenlieu_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nhanvien_nhanvien_cmnd_unique` (`nhanvien_cmnd`),
  ADD KEY `nhanvien_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `nhom`
--
ALTER TABLE `nhom`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_loaisanpham_id_foreign` (`loaisanpham_id`),
  ADD KEY `sanpham_donvitinh_id_foreign` (`donvitinh_id`);

--
-- Chỉ mục cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD KEY `sanphamkhuyenmai_khuyenmai_id_foreign` (`khuyenmai_id`),
  ADD KEY `sanphamkhuyenmai_sanpham_id_foreign` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_loainguoidung_id_foreign` (`loainguoidung_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `lohang`
--
ALTER TABLE `lohang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `monngon`
--
ALTER TABLE `monngon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhom`
--
ALTER TABLE `nhom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tinhtranghd`
--
ALTER TABLE `tinhtranghd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tuyendung`
--
ALTER TABLE `tuyendung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_donhang_id_foreign` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhang_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_khachhang_id_foreign` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `donhang_tinhtranghd_id_foreign` FOREIGN KEY (`tinhtranghd_id`) REFERENCES `tinhtranghd` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `hinhsanpham_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_nhom_id_foreign` FOREIGN KEY (`nhom_id`) REFERENCES `nhom` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lohang`
--
ALTER TABLE `lohang`
  ADD CONSTRAINT `lohang_nhacungcap_id_foreign` FOREIGN KEY (`nhacungcap_id`) REFERENCES `nhacungcap` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lohang_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD CONSTRAINT `nguyenlieu_monngon_id_foreign` FOREIGN KEY (`monngon_id`) REFERENCES `monngon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nguyenlieu_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_donvitinh_id_foreign` FOREIGN KEY (`donvitinh_id`) REFERENCES `donvitinh` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sanpham_loaisanpham_id_foreign` FOREIGN KEY (`loaisanpham_id`) REFERENCES `loaisanpham` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD CONSTRAINT `sanphamkhuyenmai_khuyenmai_id_foreign` FOREIGN KEY (`khuyenmai_id`) REFERENCES `khuyenmai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sanphamkhuyenmai_sanpham_id_foreign` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_loainguoidung_id_foreign` FOREIGN KEY (`loainguoidung_id`) REFERENCES `loainguoidung` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
