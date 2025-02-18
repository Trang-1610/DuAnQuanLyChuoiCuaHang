-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `haoquangptud1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `Maban` int(11) NOT NULL,
  `MaCuaHang` int(11) NOT NULL,
  `TenBan` int(20) NOT NULL,
  `Soghe` int(11) NOT NULL,
  `Tinhtrang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`Maban`, `MaCuaHang`, `TenBan`, `Soghe`, `Tinhtrang`) VALUES
(1, 1, 0, 4, 'Bận'),
(2, 1, 0, 4, 'Bận'),
(3, 1, 0, 4, 'Trống'),
(4, 1, 0, 4, 'Trống'),
(5, 1, 0, 4, 'Bận'),
(6, 1, 0, 4, 'Trống'),
(7, 2, 0, 4, 'Trống'),
(8, 2, 0, 4, 'Trống'),
(9, 2, 0, 4, 'Trống'),
(10, 2, 0, 4, 'Trống'),
(11, 2, 0, 4, 'Trống'),
(12, 2, 0, 4, 'Trống'),
(13, 3, 0, 4, 'Trống'),
(14, 3, 0, 4, 'Trống'),
(15, 3, 0, 4, 'Trống'),
(16, 3, 0, 4, 'Trống'),
(17, 3, 0, 4, 'Trống'),
(18, 3, 0, 4, 'Trống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `calamviec`
--

CREATE TABLE `calamviec` (
  `MaLichLamViec` int(20) NOT NULL,
  `MaNhanVien` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `calamviec`
--

INSERT INTO `calamviec` (`MaLichLamViec`, `MaNhanVien`) VALUES
(1, 3),
(1, 4),
(1, 6),
(1, 8),
(1, 12),
(1, 14),
(1, 16),
(1, 18),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 29),
(1, 32),
(1, 34),
(1, 36),
(1, 37),
(1, 38),
(1, 42),
(1, 43),
(1, 45),
(1, 47),
(1, 48),
(1, 49),
(1, 52),
(1, 53),
(1, 54),
(1, 56),
(1, 57),
(1, 59),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 14),
(2, 15),
(2, 16),
(2, 22),
(2, 23),
(2, 24),
(2, 27),
(2, 28),
(2, 29),
(2, 33),
(2, 34),
(2, 36),
(2, 38),
(2, 39),
(2, 42),
(2, 43),
(2, 45),
(2, 47),
(2, 48),
(2, 49),
(2, 52),
(2, 54),
(2, 55),
(2, 56),
(2, 58),
(2, 59),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 8),
(3, 13),
(3, 14),
(3, 16),
(3, 22),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 29),
(3, 34),
(3, 35),
(3, 37),
(3, 38),
(3, 39),
(3, 42),
(3, 44),
(3, 45),
(3, 47),
(3, 48),
(3, 49),
(3, 52),
(3, 53),
(3, 54),
(3, 56),
(3, 57),
(3, 59),
(4, 3),
(4, 4),
(4, 5),
(4, 7),
(4, 8),
(4, 13),
(4, 14),
(4, 17),
(4, 22),
(4, 23),
(4, 25),
(4, 26),
(4, 27),
(4, 29),
(4, 32),
(4, 34),
(4, 35),
(4, 36),
(4, 37),
(4, 39),
(4, 42),
(4, 44),
(4, 45),
(4, 47),
(4, 48),
(4, 49),
(4, 52),
(4, 53),
(4, 55),
(4, 56),
(4, 58),
(4, 59),
(5, 3),
(5, 4),
(5, 6),
(5, 8),
(5, 12),
(5, 13),
(5, 15),
(5, 16),
(5, 17),
(5, 22),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 33),
(5, 34),
(5, 36),
(5, 38),
(5, 39),
(5, 42),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(5, 48),
(5, 52),
(5, 54),
(5, 55),
(5, 56),
(5, 57),
(5, 59),
(6, 3),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 22),
(6, 24),
(6, 25),
(6, 26),
(6, 28),
(6, 29),
(6, 32),
(6, 35),
(6, 36),
(6, 38),
(6, 39),
(6, 42),
(6, 44),
(6, 45),
(6, 47),
(6, 48),
(6, 49),
(6, 52),
(6, 54),
(6, 55),
(6, 56),
(6, 57),
(6, 59),
(7, 3),
(7, 5),
(7, 8),
(7, 13),
(7, 14),
(7, 16),
(7, 17),
(7, 23),
(7, 24),
(7, 25),
(7, 26),
(7, 27),
(7, 29),
(7, 33),
(7, 34),
(7, 35),
(7, 36),
(7, 37),
(7, 39),
(7, 42),
(7, 44),
(7, 45),
(7, 46),
(7, 47),
(7, 49),
(7, 52),
(7, 53),
(7, 55),
(7, 56),
(7, 57),
(7, 59);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Mamonan` int(20) NOT NULL,
  `Madon` int(20) NOT NULL,
  `Soluong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`Mamonan`, `Madon`, `Soluong`) VALUES
(1, 1, 10),
(1, 21, 1),
(1, 22, 1),
(1, 28, 1),
(1, 32, 1),
(1, 33, 1),
(2, 2, 15),
(2, 22, 2),
(3, 3, 11),
(4, 4, 14),
(6, 6, 1),
(6, 31, 2),
(8, 6, 1),
(9, 6, 1),
(14, 31, 2),
(16, 30, 1),
(29, 30, 2),
(31, 30, 1),
(34, 31, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaChucVu` int(20) NOT NULL,
  `TenChucVu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaChucVu`, `TenChucVu`) VALUES
(1, 'Chủ Cửa Hàng'),
(2, 'Quản Lý Cửa Hàng'),
(3, 'Nhân Viên Lễ Tân'),
(4, 'Nhân Viên Bếp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cuahang`
--

CREATE TABLE `cuahang` (
  `MaCuaHang` int(20) NOT NULL,
  `TenCuaHang` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `TinhTrang` varchar(225) NOT NULL,
  `HinhAnh` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`MaCuaHang`, `TenCuaHang`, `DiaChi`, `TinhTrang`, `HinhAnh`) VALUES
(1, 'Cửa hàng 1', 'NVB', 'Mở', '524_ch1.jpg'),
(2, 'Cửa hàng 2', 'NVB', 'Mở', '273_ch2.jpg'),
(3, 'Cửa hàng 3', 'NVB', 'Mở', '840_ch3.jpg'),
(4, 'Cửa hàng 4', 'NVB', 'Mở', '526_ch4.jpg'),
(5, 'Cửa hàng 5', 'PVD', 'Đóng', '377_ch5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDon` int(20) NOT NULL,
  `GioTaoDon` datetime NOT NULL,
  `TongTien` double NOT NULL,
  `PhuongThucThanhToan` int(20) NOT NULL,
  `GhiChu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `TenKhachHang` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `SoDienThoai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `MaNhanVien` int(20) DEFAULT NULL,
  `MaCuaHang` int(20) NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDon`, `GioTaoDon`, `TongTien`, `PhuongThucThanhToan`, `GhiChu`, `TenKhachHang`, `SoDienThoai`, `DiaChi`, `MaNhanVien`, `MaCuaHang`, `TinhTrang`) VALUES
(1, '2024-11-08 17:10:25', 200000, 1, 'không', NULL, NULL, NULL, 3, 1, 0),
(2, '2024-11-08 17:15:22', 200000, 2, '.', NULL, NULL, NULL, 3, 2, 0),
(3, '2024-11-08 17:15:22', 100000, 2, 'ok', NULL, NULL, NULL, 3, 3, 0),
(4, '2024-11-08 17:17:01', 200000, 1, 'sánnKWIS', NULL, NULL, NULL, 3, 4, 0),
(5, '2024-11-15 19:07:23', 1000000, 1, 'ko', NULL, NULL, NULL, 3, 2, 0),
(6, '2024-12-08 13:13:13', 297000, 1, '', 'tham', '0367107659', '0', 3, 3, 0),
(7, '2024-01-01 00:00:00', 189, 1, '', '', '', '0', 3, 1, 1),
(8, '2024-01-01 00:00:00', 189, 1, '', '', '', '0', 3, 1, 1),
(9, '2024-01-01 00:00:00', 189, 1, '', '', '', '0', 3, 1, 1),
(10, '2024-01-01 00:00:00', 189, 1, '', '', '', '0', 3, 1, 1),
(11, '2024-12-10 20:56:57', 189, 1, '', '', '', '', 3, 1, 1),
(12, '2024-12-10 20:57:12', 189, 1, '', '', '', '', 3, 1, 1),
(13, '2024-12-10 20:57:23', 189, 1, '', '', '', '', 3, 1, 1),
(14, '2024-12-10 20:57:42', 189, 1, '', '', '', '', 3, 1, 1),
(15, '2024-12-10 20:57:51', 189, 1, '', '', '', '', 3, 1, 1),
(16, '2024-12-10 20:58:17', 189, 1, '', '', '', '', 3, 1, 1),
(17, '2024-12-10 20:58:34', 189, 1, '', '', '', '', 3, 1, 1),
(18, '2024-12-10 20:58:54', 189, 1, '', '', '', '', 3, 1, 1),
(19, '2024-12-10 20:58:56', 189, 1, '', '', '', '', 3, 1, 1),
(20, '2024-12-10 21:03:37', 1, 1, 'alo', '', '23', '', 3, 2, 1),
(21, '2024-12-10 15:42:16', 189000, 1, '', '', '', '0', 3, 1, 2),
(22, '2024-12-10 15:44:25', 268000, 1, '', '', '', '0', 3, 1, 2),
(26, '2024-12-10 16:49:24', 27000, 1, '', 'Trang', '0788772346', '0', 3, 1, 1),
(27, '2024-12-10 16:54:55', 158000, 1, '', 'huhuhu', '0999999990', '12', 3, 1, 1),
(28, '2024-12-10 16:55:26', 79000, 1, '', 'huhu', '0367107659', '147', 3, 1, 1),
(29, '2024-12-11 07:12:11', 237000, 2, '', 'thắm', '0788772346', '146', 3, 1, 1),
(30, '2024-12-11 07:16:32', 162000, 2, '', 'akali', '0367107659', '0', 3, 4, 1),
(31, '2024-12-11 07:18:00', 242000, 1, '', 'khang ', '0367107659', '0', 3, 1, 1),
(32, '2024-12-11 11:40:31', 79000, 1, '', 'Hong Tham', '0367107659', '147', 3, 1, 1),
(33, '2024-12-11 15:28:14', 79000, 1, '', 'Hong Tham', '0367107659', '0', 3, 1, 1),
(34, '2024-10-16 19:41:14', 5500000, 1, 'không', 'a', '0999999999', 'pvd', 13, 1, 1),
(35, '2024-09-17 19:43:35', 3000000, 1, 'khong', 'a', '099999999', 'nvb', 14, 1, 1),
(36, '2024-08-14 19:44:20', 4000000, 1, 'a', 'b', '077777777', 'nk', 13, 1, 1),
(37, '2024-07-19 19:45:13', 3000000, 1, NULL, NULL, NULL, NULL, 13, 1, 1),
(38, '2024-06-04 19:46:32', 4300000, 1, NULL, NULL, NULL, NULL, 13, 1, 1),
(39, '2024-12-12 13:47:07', 10000000, 1, NULL, NULL, NULL, NULL, 52, 5, 1),
(40, '2024-02-14 19:49:14', 5000000, 1, NULL, NULL, NULL, NULL, 14, 1, 0),
(41, '2024-03-30 19:49:14', 4000000, 1, NULL, NULL, NULL, NULL, 13, 1, 1),
(42, '2024-12-12 13:50:44', 1000000, 1, NULL, NULL, NULL, NULL, 14, 1, 1),
(43, '2024-04-10 19:50:45', 2000000, 1, NULL, NULL, NULL, NULL, 13, 1, 1),
(44, '2024-04-27 19:51:44', 3000000, 1, NULL, NULL, NULL, NULL, 14, 1, 1),
(45, '2024-01-17 19:52:43', 3000000, 1, NULL, NULL, NULL, NULL, 13, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donnhaphang`
--

CREATE TABLE `donnhaphang` (
  `MaDonNhapHang` int(20) NOT NULL,
  `MaCuaHang` int(20) NOT NULL,
  `NgayNhapHang` date NOT NULL,
  `GiaNhap` int(20) NOT NULL,
  `MaNhanVien` int(50) NOT NULL,
  `TinhTrang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donnhaphang`
--

INSERT INTO `donnhaphang` (`MaDonNhapHang`, `MaCuaHang`, `NgayNhapHang`, `GiaNhap`, `MaNhanVien`, `TinhTrang`) VALUES
(38, 2, '2024-12-01', 5744000, 2, 2),
(39, 3, '2024-12-01', 5744000, 11, 2),
(40, 2, '2024-12-01', 5744000, 2, 2),
(41, 2, '2024-12-01', 5744000, 2, 2),
(42, 2, '2024-12-01', 125268000, 2, 2),
(43, 2, '2024-12-01', 23506000, 2, 2),
(44, 3, '2024-12-03', 50000, 11, 2),
(45, 2, '2024-12-03', 50000, 2, 2),
(46, 3, '2024-12-03', 15010, 11, 2),
(47, 3, '2024-12-03', 24010, 11, 2),
(48, 3, '2024-12-03', 34000, 11, 2),
(49, 3, '2024-12-04', 8046000, 11, 2),
(50, 2, '2024-12-05', 2430000, 2, 1),
(51, 2, '2024-12-08', 12742000, 2, 2),
(52, 2, '2024-12-08', 110000, 2, 2),
(53, 1, '2024-12-08', 1524000, 1, 2),
(54, 2, '2024-12-08', 1296000, 2, 2),
(55, 2, '2024-12-09', 648000, 2, 2),
(56, 2, '2024-12-10', 648000, 2, 2),
(57, 3, '2024-12-11', 1016280, 31, 1),
(58, 3, '2024-12-11', 0, 31, 1),
(59, 3, '2024-12-11', 0, 31, 1),
(60, 3, '2024-12-11', 0, 31, 1),
(61, 3, '2024-12-11', 20, 31, 1),
(62, 3, '2024-12-11', 35000, 31, 1),
(63, 3, '2024-12-11', 20000, 31, 1),
(64, 3, '2024-12-11', 648000, 31, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvitinh`
--

CREATE TABLE `donvitinh` (
  `MaDonViTinh` int(11) NOT NULL,
  `TenDonViTinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvitinh`
--

INSERT INTO `donvitinh` (`MaDonViTinh`, `TenDonViTinh`) VALUES
(1, 'Kg'),
(2, 'Túi'),
(3, 'Ổ'),
(4, 'Trái'),
(5, 'Củ'),
(6, 'Chai'),
(7, 'Cái');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich`
--

CREATE TABLE `lich` (
  `MaLich` int(20) NOT NULL,
  `TenLich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lich`
--

INSERT INTO `lich` (`MaLich`, `TenLich`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ Nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `Calamviec` int(20) NOT NULL,
  `ThGBatdau` time NOT NULL,
  `ThGKetthuc` time NOT NULL,
  `NgayLamViec` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`Calamviec`, `ThGBatdau`, `ThGKetthuc`, `NgayLamViec`) VALUES
(1, '08:00:00', '12:00:00', 1),
(2, '08:00:00', '12:00:00', 2),
(3, '08:00:00', '12:00:00', 3),
(4, '08:00:00', '12:00:00', 4),
(5, '08:00:00', '12:00:00', 5),
(6, '08:00:00', '12:00:00', 6),
(7, '08:00:00', '12:00:00', 7),
(8, '13:00:00', '21:00:00', 1),
(9, '13:00:00', '21:00:00', 2),
(10, '13:00:00', '21:00:00', 3),
(11, '13:00:00', '21:00:00', 4),
(12, '13:00:00', '21:00:00', 5),
(13, '13:00:00', '21:00:00', 6),
(14, '13:00:00', '21:00:00', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonan`
--

CREATE TABLE `loaimonan` (
  `MaLoaiMonAn` int(20) NOT NULL,
  `TenLoaiMonAn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `TinhTrangMonAn` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `HinhAnh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimonan`
--

INSERT INTO `loaimonan` (`MaLoaiMonAn`, `TenLoaiMonAn`, `TinhTrangMonAn`, `HinhAnh`) VALUES
(1, 'Burger', '1', '1.jpg'),
(2, 'Combo', '1', '2.jpg'),
(3, 'Gà Rán', '1', '3.jpg'),
(4, 'Cơm Vua', '1', '4.jpg'),
(5, 'Món Ăn Kèm', '1', '5.jpg'),
(6, 'Thức Uống', '1', '6.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguyenlieu`
--

CREATE TABLE `loainguyenlieu` (
  `MaLoaiNguyenLieu` int(20) NOT NULL,
  `TenLoaiNguyenLieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguyenlieu`
--

INSERT INTO `loainguyenlieu` (`MaLoaiNguyenLieu`, `TenLoaiNguyenLieu`) VALUES
(1, 'Thịt'),
(2, 'Gia Vị'),
(3, 'Rau Củ'),
(4, 'Bánh Mì'),
(5, 'Bột'),
(6, 'Gạo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `MaMonAn` int(11) NOT NULL,
  `MaLoaiMonAn` int(11) NOT NULL,
  `Tenmonan` varchar(255) NOT NULL,
  `Giaban` decimal(10,0) NOT NULL,
  `Mota` varchar(1000) NOT NULL,
  `Tinhtrang` varchar(50) NOT NULL,
  `Hinhanh` varchar(255) NOT NULL,
  `SoLuong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`MaMonAn`, `MaLoaiMonAn`, `Tenmonan`, `Giaban`, `Mota`, `Tinhtrang`, `Hinhanh`, `SoLuong`) VALUES
(1, 1, 'American Trio Charcoal Burger', 79000, 'Bánh burger này thường có lớp bánh mì được nướng trên than, tạo màu đen hấp dẫn và mang lại vị khói đặc trưng.\r\nBên trong bánh gồm nhiều lớp nhân: thịt bò băm nướng mọng nước, phô mai tan chảy, và các loại rau tươi mát.', 'Có', '1.jpg', 0),
(2, 1, 'Cheese ring burger', 55000, 'Bánh burger này có phần phô mai chiên tạo hình vòng tròn xung quanh phần nhân thịt, khiến chiếc bánh không chỉ thơm ngon mà còn nổi bật và đẹp mắt. Khi cắn vào, người ăn sẽ cảm nhận được lớp phô mai giòn rụm và tan chảy ngay lập tức.\r\n', 'Có', '2.jpg', 0),
(3, 1, 'Kuro ninja tempura burger jr', 79000, 'Chiếc burger này có lớp bánh mì màu đen được làm từ than tre, tạo nên vẻ ngoài lạ mắt và thêm vị khói nhẹ. Bên trong, phần nhân được kết hợp từ các nguyên liệu mang phong cách Nhật như tempura và sốt teriyaki, đem lại hương vị độc đáo và cân bằng', 'Có', '3.jpg', 0),
(4, 1, 'Extreme cheese whopper', 125000, 'Chiếc burger được làm từ nhiều lớp phô mai tan chảy, kết hợp với phần thịt bò nướng truyền thống của Whopper. Mỗi miếng cắn mang lại trải nghiệm vừa béo, vừa đậm đà với hương vị đặc trưng của thịt nướng và phô mai.', 'Có', '4.jpg', 0),
(5, 1, 'Double cheeseburger', 79000, 'Chiếc burger bao gồm hai lớp thịt bò nướng mọng nước, xen kẽ là phô mai cheddar tan chảy. Vị béo của phô mai hòa quyện với thịt bò đậm đà, tạo ra hương vị tuyệt vời và giúp chiếc burger thêm hấp dẫn.', 'Có', '5.jpg', 0),
(6, 1, 'Fish burger', 49000, 'Phần nhân cá được tẩm bột và chiên vàng giòn, thơm lừng và đậm đà. Kết hợp cùng rau tươi và sốt chua ngọt hoặc sốt tartar, Fish Burger đem lại trải nghiệm hương vị nhẹ nhàng nhưng vẫn ngon miệng và độc đáo.', 'Có', '6.jpg', 0),
(7, 2, 'Combo king jr wednesday', 109000, 'Combo này thường bao gồm các món phù hợp với khẩu phần của trẻ em, với một chiếc burger nhỏ nhưng vẫn đầy đủ các thành phần dinh dưỡng và khoai tây chiên giòn rụm. Phần combo có thêm đồ uống như nước ngọt hoặc nước trái cây để hoàn thiện bữa ăn.', 'Có', '7.jpg', 0),
(8, 2, 'Combo king jr thing', 119000, 'Combo King Jr. Thing thường bao gồm một chiếc burger hoặc phần gà nhỏ, đi kèm với một phần khoai tây chiên hoặc táo cắt lát, cùng một thức uống như nước trái cây, nước ngọt, hoặc sữa. Phần combo này cũng có thể bao gồm đồ chơi để tạo sự thích thú cho trẻ em khi ăn.', 'Không', '8.jpg', 0),
(9, 2, 'Combo king jr ms addams', 129000, 'Combo này thường bao gồm các món ăn yêu thích của trẻ em, như burger hoặc gà viên, khoai tây chiên hoặc táo lát, và một loại thức uống. Đặc biệt, phần ăn có thể đi kèm với các vật phẩm liên quan đến The Addams Family, như đồ chơi hoặc bao bì được trang trí theo chủ đề Ms. Addams.', 'Có', '9.jpg', 0),
(10, 2, 'Cheese ring burger combo', 79000, 'Combo này xoay quanh Cheese Ring Burger, chiếc burger với lớp phô mai chiên giòn tạo thành vòng tròn đặc trưng, ôm lấy phần nhân thịt và rau bên trong. Mỗi phần combo bao gồm burger, khoai tây chiên và một thức uống, giúp bạn có trải nghiệm đầy đủ hương vị.', 'Có', '10.jpg', 0),
(11, 2, 'Combo kuro ninja tempura burger jr', 99000, 'Combo này bao gồm một chiếc Kuro Ninja Tempura Burger Jr., với bánh mì đen mềm mại và phần nhân tempura (tôm hoặc gà) giòn rụm, cùng với các thành phần như rau tươi và sốt đặc trưng. Phần ăn kèm có thể bao gồm khoai tây chiên giòn và một thức uống giải khát, phù hợp với khẩu phần ăn của trẻ em.', 'Có', '11.jpg', 0),
(12, 2, 'Combo family chic\'n lovers', 265000, 'Combo Family Chic\'n Lovers thường bao gồm các phần gà chiên giòn (có thể là gà rán hoặc gà viên), khoai tây chiên giòn, và các món ăn kèm khác như salad hoặc đồ uống. Phần ăn này có thể được tùy chỉnh để phục vụ gia đình hoặc nhóm bạn, với số lượng đủ để mọi người cùng thưởng thức.', 'Có', '12.jpg', 0),
(13, 3, 'Gà giòn crispy', 45000, 'Gà Giòn Crispy có lớp vỏ được chiên giòn rụm nhờ vào một lớp bột chiên đặc biệt, thường được ướp gia vị nhẹ nhàng để làm nổi bật vị ngọt của thịt gà. Món ăn này thường đi kèm với các loại sốt như sốt mật ong, sốt BBQ hoặc sốt mayonnaise để tăng thêm hương vị.', 'Có', '13.jpg', 0),
(14, 3, 'Gà bbq (1 miếng)', 45000, 'Gà BBQ (1 miếng) thường là một miếng gà, có thể là đùi, cánh hoặc ức gà, được ướp kỹ với gia vị, rồi phủ lớp sốt BBQ, sau đó được nướng hoặc chiên cho đến khi da giòn và thịt bên trong mềm, ngọt. Sốt BBQ có thể có vị ngọt, cay, hoặc hơi khói tùy thuộc vào công thức.', 'Có', '14.jpg', 0),
(15, 3, 'Mix wing 2pcs', 45000, 'Mix Wing 2pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '15.jpg', 0),
(16, 3, 'Mix wing 4pcs', 89000, 'Mix Wing 4pcs gồm bốn miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '16.jpg', 0),
(17, 3, 'Mix wing 6pcs', 129000, 'Mix Wing 6pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '17.jpg', 0),
(18, 3, 'Family chic\'n lovers', 265000, 'Family Chic\'n Lovers thường đi kèm với các món ăn chính là gà chiên giòn hoặc gà nướng, khoai tây chiên giòn và thức uống. Đây là một lựa chọn hoàn hảo cho gia đình hoặc nhóm bạn, giúp mọi người có thể cùng nhau thưởng thức một bữa ăn thịnh soạn và vui vẻ.', 'Có', '18.jpg', 0),
(19, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Có', '19.jpg', 0),
(20, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Có', '20.jpg', 0),
(21, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Có', '21.jpg', 0),
(22, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Có', '22.jpg', 0),
(23, 4, 'Cheesy beef rice combo', 45000, 'Cheesy Beef Rice Combo bao gồm miếng thịt bò được chế biến mềm mại, phủ lên một lớp phô mai tan chảy, kết hợp với cơm trắng hoặc cơm chiên, tạo nên một bữa ăn ngon miệng và đầy đủ dinh dưỡng. Phô mai tan chảy giúp làm tăng thêm độ béo và hấp dẫn cho món ăn.', 'Có', '23.jpg', 0),
(24, 5, 'Gà cuộn rong biển 4pcs', 45000, 'Gà Cuộn Rong Biển 4pcs bao gồm bốn miếng gà cuộn với rong biển. Thịt gà được ướp gia vị vừa phải để giữ nguyên độ ngọt tự nhiên, sau đó được cuộn cùng rong biển tươi hoặc rong biển khô. Món ăn này có thể được chiên giòn hoặc nướng nhẹ, mang đến một lớp vỏ ngoài giòn rụm và phần thịt gà mềm mọng bên trong.', 'Có', '24.jpg', 0),
(25, 5, 'Cheese ring snack ', 35000, 'Cheese Ring Snack có hình dạng vòng tròn hoặc hình vòng, được làm từ bột và phô mai, thường được chiên giòn hoặc nướng để có được kết cấu giòn rụm. Phô mai tan chảy trong món snack này tạo ra hương vị thơm ngon và béo ngậy, phù hợp cho những ai thích thưởng thức món ăn vặt với vị phô mai đậm đà.', 'Có', '25.jpg', 0),
(26, 5, 'American fries bacon', 59000, 'American Fries Bacon bao gồm các miếng khoai tây dày, thường được chiên giòn hoặc nướng cho đến khi bên ngoài giòn rụm, trong khi bên trong vẫn giữ được độ mềm. Khoai tây sẽ được kết hợp với các miếng thịt bacon chiên giòn, tạo nên sự hòa quyện tuyệt vời giữa khoai tây béo ngậy và hương vị mặn mà của bacon.', 'Có', '26.jpg', 0),
(27, 5, 'Cá cuộn rong biển', 25000, 'Cá Cuộn Rong Biển là món ăn đơn giản nhưng đầy sáng tạo, khi miếng cá được ướp gia vị nhẹ nhàng, sau đó cuộn lại với rong biển tươi hoặc rong biển khô. Món ăn này có thể được chế biến theo nhiều cách khác nhau, từ chiên giòn đến nướng, tùy thuộc vào sở thích và phong cách chế biến.', 'Có', '27.jpg', 0),
(28, 5, 'Phô mai que', 25000, 'Phô Mai Que có hình dạng que dài hoặc hình vuông nhỏ, với phần phô mai bên trong mềm mịn và dễ tan chảy. Lớp vỏ ngoài giòn tan được làm từ bột chiên, tạo thành một sự kết hợp hoàn hảo giữa độ giòn của bột chiên và độ béo, mịn của phô mai.', 'Có', '28.jpg', 0),
(29, 5, 'Khoai tây chiên', 29000, 'Khoai Tây Chiên có lớp vỏ ngoài giòn rụm, bên trong mềm mại và thơm ngọt tự nhiên của khoai tây. Khoai tây được chế biến đơn giản nhưng lại rất ngon miệng nhờ sự kết hợp của độ giòn và độ mềm, thường được ướp gia vị nhẹ để tăng thêm hương vị.', 'Có', '29.jpg', 0),
(30, 6, 'Dasani', 15000, 'Dasani ', 'Có', '30.jpg', 0),
(31, 6, 'Coca', 15000, 'Coca', 'Có', '31.jpg', 0),
(32, 6, 'Fanta', 15000, 'Fanta', 'Có', '32.jpg', 0),
(33, 6, 'Sprite', 15000, 'Sprite', 'Có', '33.jpg', 0),
(34, 6, 'Coke light', 27000, 'Coke light', 'Có', '34.jpg', 0),
(42, 1, 'et', 12, '.....', 'Không', '809_z5969667900351_918b146ba53e65001bff572f6afeb350.jpg', 0),
(43, 1, 'Trang', 67, '.....', 'Không', '753_banhmi.jpg', 0),
(44, 1, 'Trang', 121, '.....', 'Không', '339_banhmi.jpg', 0),
(45, 1, 'Trang', 34, '.....', 'Không', '663_shop.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monandexuat`
--

CREATE TABLE `monandexuat` (
  `MaDeXuat` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaLoaiMonAn` int(11) NOT NULL,
  `TenMonAn` varchar(255) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `NguyenLieu` varchar(255) NOT NULL,
  `GiaDeXuat` double(10,2) NOT NULL DEFAULT 0.00,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monandexuat`
--

INSERT INTO `monandexuat` (`MaDeXuat`, `MaNV`, `MaLoaiMonAn`, `TenMonAn`, `MoTa`, `NguyenLieu`, `GiaDeXuat`, `TrangThai`) VALUES
(1, 3, 1, 'Burger Phở', '', ' Thịt bò xay 100 gr\n Bột mì đa dụng 1 muỗng cà phê\n Bánh phở 140 gr\n Trứng 3 quả\n Bơ lạt 2 muỗng cà phê\n Hành tây 2 muỗng cà phê\n(cắt hạt lựu)\n Ngò gai băm 2 muỗng cà phê\n Dầu ăn 3 muỗng canh\n Gia vị phở tổng hợp 1 muỗng cà phê\n', 50.00, 2),
(2, 3, 1, 'Buger tôm', 'Bánh burger giòn xốp với phần nhân tôm chiên vàng ruộm, kết hợp cùng xà lách tươi, cà chua và nước sốt chua ngọt đặc trưng.', 'Bánh burger, tôm tươi, bột chiên xù, xà lách, cà chua, sốt tartar, dưa leo, mayonnaise, tương ớt.', 45000.00, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `Ten` varchar(30) NOT NULL,
  `Matkhau` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `Machucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`Ten`, `Matkhau`, `id`, `Machucvu`) VALUES
('Chang', 'c4ca4238a0b923820dcc509a6f75849b', 1, 1),
('Trang', 'c4ca4238a0b923820dcc509a6f75849b', 2, 2),
('Hương', 'c4ca4238a0b923820dcc509a6f75849b', 4, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 12, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 13, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 14, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 15, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 16, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 17, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 18, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 19, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 20, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 21, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 22, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 23, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 24, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 25, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 26, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 27, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 28, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 29, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 30, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 31, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 32, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 33, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 34, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 35, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 36, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 37, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 38, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 39, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 40, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 41, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 42, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 43, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 44, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 45, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 46, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 47, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 48, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 49, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 50, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 51, 2),
('', 'c4ca4238a0b923820dcc509a6f75849b', 52, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 53, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 54, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 55, 3),
('', 'c4ca4238a0b923820dcc509a6f75849b', 56, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 57, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 58, 4),
('', 'c4ca4238a0b923820dcc509a6f75849b', 59, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieu`
--

CREATE TABLE `nguyenlieu` (
  `MaNguyenLieu` int(20) NOT NULL,
  `TenNguyenLieu` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `GiaMua` int(20) NOT NULL,
  `TinhTrang` int(20) NOT NULL,
  `MaLoaiNguyenLieu` int(20) NOT NULL,
  `MaDonViTinh` int(20) NOT NULL,
  `NguyenLieuTuoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`MaNguyenLieu`, `TenNguyenLieu`, `HinhAnh`, `GiaMua`, `TinhTrang`, `MaLoaiNguyenLieu`, `MaDonViTinh`, `NguyenLieuTuoi`) VALUES
(1, 'Thịt gà', 'duiga.jpg', 10000, 5, 1, 7, 1),
(2, 'Bột Chiên Xù', 'botchienxu.jpg', 15000, 1, 5, 2, 0),
(3, 'Đường', 'duong.jpg', 9000, 1, 2, 1, 0),
(4, 'Muối', 'muoi.jpg', 5000, 1, 2, 1, 0),
(5, 'Bánh Mì', 'banhmi.jpg', 2000, 1, 4, 3, 0),
(6, 'Mỳ Ý', 'myy.jpg', 40000, 1, 4, 2, 0),
(7, 'Tương Ớt', 'tuongot.jpg', 15000, 1, 2, 6, 0),
(8, 'Dầu Ăn', 'dauan.jpg', 36000, 1, 2, 6, 0),
(9, 'Hành Tây', 'hanhtay.jpg', 2000, 1, 3, 5, 1),
(10, 'Trứng Gà', 'trungga.jpg', 3000, 1, 1, 7, 0),
(11, 'Cà Chua', 'cachua.jpg', 2000, 1, 3, 4, 1),
(12, 'Dưa Leo', 'dualeo.jpg', 2000, 1, 3, 1, 1),
(13, 'Thịt Bò', 'thitbo.jpg', 50000, 1, 1, 1, 1),
(14, 'Thịt Heo', 'thitheo.jpg', 50000, 1, 1, 1, 1),
(15, 'Gạo', 'gao.jpg', 20000, 0, 6, 1, 0),
(19, 'Tiêu', 'gao.jpg', 2000, 0, 2, 1, 0),
(20, 'Cà Rốt', 'cachua.jpg', 2000, 0, 3, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguyenlieuuocluong`
--

CREATE TABLE `nguyenlieuuocluong` (
  `MaNguyenLieu` int(20) NOT NULL,
  `KhoiLuong` decimal(20,0) NOT NULL,
  `MaDonNhapHang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieuuocluong`
--

INSERT INTO `nguyenlieuuocluong` (`MaNguyenLieu`, `KhoiLuong`, `MaDonNhapHang`) VALUES
(1, 0, 38),
(1, 1384, 42),
(1, 5, 44),
(1, 1, 45),
(1, 1, 46),
(1, 1, 47),
(1, 1, 48),
(1, 11, 52),
(1, 42, 53),
(1, 28, 54),
(1, 14, 55),
(1, 14, 56),
(1, 28, 57),
(1, 0, 58),
(1, 3, 59),
(1, 1, 60),
(1, 2, 61),
(1, 2, 62),
(1, 2, 63),
(1, 14, 64),
(2, 0, 38),
(2, 770, 42),
(2, 0, 44),
(2, 0, 45),
(2, 1, 46),
(2, 1, 47),
(2, 0, 48),
(2, 0, 52),
(2, 0, 58),
(2, 0, 59),
(2, 0, 60),
(2, 0, 61),
(2, 1, 62),
(2, 0, 63),
(3, 0, 38),
(3, 128, 42),
(3, 0, 44),
(3, 0, 45),
(3, 0, 46),
(3, 1, 47),
(3, 1, 48),
(3, 0, 52),
(3, 0, 58),
(3, 0, 59),
(3, 0, 60),
(3, 0, 61),
(3, 0, 62),
(3, 0, 63),
(4, 36, 38),
(4, 36, 39),
(4, 36, 40),
(4, 36, 41),
(4, 1236, 42),
(4, 144, 43),
(4, 0, 44),
(4, 0, 45),
(4, 0, 46),
(4, 0, 47),
(4, 1, 48),
(4, 54, 49),
(4, 0, 52),
(4, 0, 58),
(4, 0, 59),
(4, 0, 60),
(4, 0, 61),
(4, 0, 62),
(4, 0, 63),
(5, 0, 38),
(5, 230, 42),
(5, 0, 44),
(5, 0, 45),
(5, 0, 46),
(5, 0, 47),
(5, 0, 48),
(5, 0, 52),
(5, 0, 58),
(5, 0, 59),
(5, 0, 60),
(5, 0, 61),
(5, 0, 62),
(5, 0, 63),
(6, 0, 38),
(6, 363, 42),
(6, 0, 44),
(6, 0, 45),
(6, 0, 46),
(6, 0, 47),
(6, 0, 48),
(6, 0, 52),
(6, 0, 58),
(6, 0, 59),
(6, 0, 60),
(6, 0, 61),
(6, 0, 62),
(6, 0, 63),
(7, 0, 38),
(7, 432, 42),
(7, 0, 44),
(7, 0, 45),
(7, 0, 46),
(7, 0, 47),
(7, 0, 48),
(7, 0, 52),
(7, 0, 58),
(7, 0, 59),
(7, 0, 60),
(7, 0, 61),
(7, 0, 62),
(7, 0, 63),
(8, 0, 38),
(8, 1070, 42),
(8, 0, 44),
(8, 0, 45),
(8, 0, 46),
(8, 0, 47),
(8, 0, 48),
(8, 0, 52),
(8, 0, 58),
(8, 0, 59),
(8, 0, 60),
(8, 0, 61),
(8, 0, 62),
(8, 0, 63),
(9, 12, 38),
(9, 12, 39),
(9, 12, 40),
(9, 12, 41),
(9, 96, 42),
(9, 0, 44),
(9, 0, 45),
(9, 0, 46),
(9, 0, 47),
(9, 0, 48),
(9, 0, 52),
(9, 0, 58),
(9, 0, 59),
(9, 0, 60),
(9, 0, 61),
(9, 0, 62),
(9, 0, 63),
(10, 96, 38),
(10, 96, 39),
(10, 96, 40),
(10, 96, 41),
(10, 3136, 42),
(10, 16, 43),
(10, 0, 44),
(10, 0, 45),
(10, 0, 46),
(10, 0, 47),
(10, 0, 48),
(10, 16, 49),
(10, 64, 51),
(10, 0, 52),
(10, 0, 58),
(10, 0, 59),
(10, 0, 60),
(10, 0, 61),
(10, 0, 62),
(10, 0, 63),
(11, 96, 38),
(11, 96, 39),
(11, 96, 40),
(11, 96, 41),
(11, 688, 42),
(11, 384, 43),
(11, 0, 44),
(11, 0, 45),
(11, 0, 46),
(11, 0, 47),
(11, 0, 48),
(11, 144, 49),
(11, 0, 52),
(11, 0, 58),
(11, 0, 59),
(11, 0, 60),
(11, 0, 61),
(11, 0, 62),
(11, 0, 63),
(12, 180, 38),
(12, 180, 39),
(12, 180, 40),
(12, 180, 41),
(12, 920, 42),
(12, 410, 43),
(12, 0, 44),
(12, 0, 45),
(12, 0, 46),
(12, 0, 47),
(12, 0, 48),
(12, 170, 49),
(12, 40, 50),
(12, 400, 51),
(12, 0, 52),
(12, 12, 53),
(12, 8, 54),
(12, 4, 55),
(12, 4, 56),
(12, 8, 57),
(12, 0, 58),
(12, 0, 59),
(12, 0, 60),
(12, 0, 61),
(12, 0, 62),
(12, 0, 63),
(12, 4, 64),
(13, 24, 38),
(13, 24, 39),
(13, 24, 40),
(13, 24, 41),
(13, 60, 42),
(13, 108, 43),
(13, 0, 44),
(13, 0, 45),
(13, 0, 46),
(13, 0, 47),
(13, 0, 48),
(13, 36, 49),
(13, 12, 50),
(13, 60, 51),
(13, 0, 52),
(13, 9, 53),
(13, 6, 54),
(13, 3, 55),
(13, 3, 56),
(13, 6, 57),
(13, 0, 58),
(13, 0, 59),
(13, 0, 60),
(13, 0, 61),
(13, 0, 62),
(13, 0, 63),
(13, 3, 64),
(14, 70, 38),
(14, 70, 39),
(14, 70, 40),
(14, 70, 41),
(14, 335, 42),
(14, 315, 43),
(14, 0, 44),
(14, 0, 45),
(14, 0, 46),
(14, 0, 47),
(14, 0, 48),
(14, 105, 49),
(14, 35, 50),
(14, 175, 51),
(14, 0, 52),
(14, 21, 53),
(14, 14, 54),
(14, 7, 55),
(14, 7, 56),
(14, 14, 57),
(14, 0, 58),
(14, 0, 59),
(14, 0, 60),
(14, 0, 61),
(14, 0, 62),
(14, 0, 63),
(14, 7, 64),
(15, 0, 38),
(15, 0, 44),
(15, 0, 45),
(15, 0, 46),
(15, 0, 47),
(15, 1, 48),
(15, 0, 52),
(15, 0, 58),
(15, 0, 59),
(15, 0, 60),
(15, 0, 61),
(15, 0, 62),
(15, 0, 63),
(19, 0, 44),
(19, 0, 45),
(19, 0, 46),
(19, 0, 47),
(19, 0, 48),
(19, 0, 52),
(19, 0, 58),
(19, 0, 59),
(19, 0, 60),
(19, 0, 61),
(19, 0, 62),
(19, 0, 63);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `GioiTinh` int(1) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `TrangThai` int(1) NOT NULL,
  `MaCuaHang` int(20) NOT NULL,
  `MaChucVu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `HoTen`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `TrangThai`, `MaCuaHang`, `MaChucVu`) VALUES
(1, 'Nguyễn Văn An', 0, '12 Nguyễn Văn Bảo, Gò Vấp', '0998765432', 'nguyenvanan@gmail.com', 1, 1, 1),
(2, 'Trần Ngọc Châu', 0, '72 Lý Thường Kiệt', '0365142885', 'tranngocchau@gmail.com', 1, 2, 2),
(3, 'Nguyễn Minh Duy', 1, '119 Nguyễn Thái Sơn', '0722385514', 'nguyenminhduy@gmail.com', 1, 1, 3),
(4, 'Nguyễn Thành Nam', 1, 'Thái Bình', '0999999999', 'ntnentien@gmail.com', 1, 1, 4),
(5, 'Trương Tuấn Tú', 1, 'Thanh Hóa', '0363636363', '666@gmail.com', 1, 1, 4),
(6, 'Trần Trấn Trân', 0, 'Thanh Hoa', '0000000000', 'suthanhhoa@gmail.com', 1, 3, 3),
(7, 'Lâm Ý Như', 0, 'Phường 1', '0000000001', 'nhuylam@gmail.com', 1, 1, 3),
(8, 'Go dan Ram say', 1, 'Gò Vấp', '0101010101', 'masterchef@gmail.com', 1, 1, 4),
(9, 'thắm', 0, 'nvb', '0942222546', 'tham123@gmail.com', 1, 4, 3),
(10, 'huong', 0, 'Lê Lợi', '0978432578', 'huong123@gmail.com', 0, 2, 3),
(11, 'tham', 1, 'saqx', '0999999990', 'tham@gmail.com', 1, 3, 2),
(12, 'Nguyen Van A', 1, '123 Le Loi, TP.HCM', '0909123456', 'nguyenvana@gmail.com', 1, 1, 3),
(13, 'Nguyen Van Minh', 1, '456 Tran Hung Dao, TP.HCM', '0909123457', 'nguyenvanb@gmail.com', 1, 1, 3),
(14, 'Tran Thi Han', 0, '789 Nguyen Trai, TP.HCM', '0909123458', 'tranthic@gmail.com', 1, 1, 3),
(15, 'Le Van Huy', 1, '123 Ly Thuong Kiet, TP.HCM', '0909123459', 'levand@gmail.com', 1, 1, 3),
(16, 'Pham Thi Thanh Thuy', 0, '321 Pasteur, TP.HCM', '0909123460', 'phamthie@gmail.com', 1, 1, 4),
(17, 'Hoang Van Vu', 1, '654 Vo Thi Sau, TP.HCM', '0909123461', 'hoangvanf@gmail.com', 1, 1, 4),
(18, 'Nguyen Thi Hoai An', 0, '987 Cach Mang Thang 8, TP.HCM', '0909123462', 'nguyenthig@gmail.com', 1, 1, 4),
(19, 'Tran Van Huy', 1, '456 Ba Thang Hai, TP.HCM', '0909123463', 'tranvanh@gmail.com', 1, 1, 4),
(20, 'Le Thi Sau', 0, '123 Nguyen Hue, TP.HCM', '0909123464', 'lethii@gmail.com', 1, 2, 2),
(21, 'Tran Van Minh', 1, '456 Hai Ba Trung, TP.HCM', '0909123465', 'tranvanj@gmail.com', 1, 2, 2),
(22, 'Nguyen Thi Kim Ngoc', 0, '789 Le Lai, TP.HCM', '0909123466', 'nguyenthik@gmail.com', 1, 2, 3),
(23, 'Pham Van Luan', 1, '321 Nam Ky Khoi Nghia, TP.HCM', '0909123467', 'phamvanl@gmail.com', 1, 2, 3),
(24, 'Hoang Thi Man Nhi', 0, '654 Dien Bien Phu, TP.HCM', '0909123468', 'hoangthim@gmail.com', 1, 2, 3),
(25, 'Le Van Nhan', 1, '987 Tran Quang Khai, TP.HCM', '0909123469', 'levann@gmail.com', 1, 2, 3),
(26, 'Nguyen Thi Thuy Tran', 0, '123 Xo Viet Nghe Tinh, TP.HCM', '0909123470', 'nguyenthio@gmail.com', 1, 2, 4),
(27, 'Tran Van Nhim', 1, '456 Hoang Dieu, TP.HCM', '0909123471', 'tranvanp@gmail.com', 1, 2, 4),
(28, 'Pham Thi Mi Chau', 0, '789 Phan Van Tri, TP.HCM', '0909123472', 'phamthiq@gmail.com', 1, 2, 4),
(29, 'Hoang Van Kiet', 1, '321 Ly Chinh Thang, TP.HCM', '0909123473', 'hoangvanr@gmail.com', 1, 2, 4),
(30, 'Nguyen Van Si Nhan', 1, '123 Nguyen Hue, TP.HCM', '0909123480', 'nguyenvans@gmail.com', 1, 3, 2),
(31, 'Tran Thi Tham', 0, '456 Hai Ba Trung, TP.HCM', '0909123481', 'tranthit@gmail.com', 1, 3, 2),
(32, 'Le Van Tran Doan', 1, '789 Le Lai, TP.HCM', '0909123482', 'levanu@gmail.com', 1, 3, 3),
(33, 'Nguyen Thi Van', 0, '321 Nam Ky Khoi Nghia, TP.HCM', '0909123483', 'nguyenthiv@gmail.com', 1, 3, 3),
(34, 'Pham Van Quyet', 1, '654 Dien Bien Phu, TP.HCM', '0909123484', 'phamvanw@gmail.com', 1, 3, 3),
(35, 'Hoang Thi Xuan', 0, '987 Tran Quang Khai, TP.HCM', '0909123485', 'hoangthix@gmail.com', 1, 3, 3),
(36, 'Le Van Han', 1, '123 Xo Viet Nghe Tinh, TP.HCM', '0909123486', 'levany@gmail.com', 1, 3, 4),
(37, 'Nguyen Thi Dieu', 0, '456 Hoang Dieu, TP.HCM', '0909123487', 'nguyenthiz@gmail.com', 1, 3, 4),
(38, 'Tran Nguyen Thuy Chau', 1, '789 Phan Van Tri, TP.HCM', '0909123488', 'tranvanaa@gmail.com', 1, 3, 4),
(39, 'Pham Thi Binh', 0, '321 Ly Chinh Thang, TP.HCM', '0909123489', 'phamthibb@gmail.com', 1, 3, 4),
(40, 'Nguyen Van Khang', 1, '123 Nguyen Hue, TP.HCM', '0909123490', 'nguyenvancc@gmail.com', 1, 4, 2),
(41, 'Tran Thi My Han', 0, '456 Hai Ba Trung, TP.HCM', '0909123491', 'tranthidd@gmail.com', 1, 4, 2),
(42, 'Le Van Duc', 1, '789 Le Lai, TP.HCM', '0909123492', 'levanee@gmail.com', 1, 4, 3),
(43, 'Nguyen Thi Thuy', 0, '321 Nam Ky Khoi Nghia, TP.HCM', '0909123493', 'nguyenthiff@gmail.com', 1, 4, 3),
(44, 'Pham Van Thanh', 1, '654 Dien Bien Phu, TP.HCM', '0909123494', 'phamvangg@gmail.com', 1, 4, 3),
(45, 'Hoang Thi Kieu Nhi', 0, '987 Tran Quang Khai, TP.HCM', '0909123495', 'hoangthihh@gmail.com', 1, 4, 3),
(46, 'Le Van Luan', 1, '123 Xo Viet Nghe Tinh, TP.HCM', '0909123496', 'levanii@gmail.com', 1, 4, 4),
(47, 'Nguyen Thi Thu ', 0, '456 Hoang Dieu, TP.HCM', '0909123497', 'nguyenthijj@gmail.com', 1, 4, 4),
(48, 'Tran Van Kha', 1, '789 Phan Van Tri, TP.HCM', '0909123498', 'tranvankk@gmail.com', 1, 4, 4),
(49, 'Pham Thi Hoai Tran', 0, '321 Ly Chinh Thang, TP.HCM', '0909123499', 'phamthill@gmail.com', 1, 4, 4),
(50, 'Nguyen Van Hoang', 1, '123 Nguyen Hue, TP.HCM', '0909123500', 'nguyenvanmm@gmail.com', 1, 5, 2),
(51, 'Tran Thi Kieu Tran', 0, '456 Hai Ba Trung, TP.HCM', '0909123501', 'tranthinn@gmail.com', 1, 5, 2),
(52, 'Le Thi Kieu', 1, '789 Le Lai, TP.HCM', '0909123502', 'levanoo@gmail.com', 1, 5, 3),
(53, 'Nguyen Thi Le', 0, '321 Nam Ky Khoi Nghia, TP.HCM', '0909123503', 'nguyenthipp@gmail.com', 1, 5, 3),
(54, 'Pham Van Hoang Tran', 1, '654 Dien Bien Phu, TP.HCM', '0909123504', 'phamvanqq@gmail.com', 1, 5, 3),
(55, 'Hoang Thi Kieu Tran', 0, '987 Tran Quang Khai, TP.HCM', '0909123505', 'hoangthirr@gmail.com', 1, 5, 3),
(56, 'Le Van Hoang', 1, '123 Xo Viet Nghe Tinh, TP.HCM', '0909123506', 'levanss@gmail.com', 1, 5, 4),
(57, 'Nguyen Thi Thu Phuoc', 0, '456 Hoang Dieu, TP.HCM', '0909123507', 'nguyenthitt@gmail.com', 1, 5, 4),
(58, 'Tran Kieu Han', 1, '789 Phan Van Tri, TP.HCM', '0909123508', 'tranvanuu@gmail.com', 1, 5, 4),
(59, 'Pham Thi My Chau', 0, '321 Ly Chinh Thang, TP.HCM', '0909123509', 'phamthivv@gmail.com', 1, 5, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pttt`
--

CREATE TABLE `pttt` (
  `MaPhuongThuc` int(20) NOT NULL,
  `TenPhuongThuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pttt`
--

INSERT INTO `pttt` (`MaPhuongThuc`, `TenPhuongThuc`) VALUES
(1, 'Tiền Mặt'),
(2, 'Chuyển Khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soluongnguyenlieu`
--

CREATE TABLE `soluongnguyenlieu` (
  `MaMonAn` int(20) NOT NULL,
  `MaNguyenLieu` int(20) NOT NULL,
  `KhoiLuong` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soluongnguyenlieu`
--

INSERT INTO `soluongnguyenlieu` (`MaMonAn`, `MaNguyenLieu`, `KhoiLuong`) VALUES
(1, 1, 14),
(1, 11, 3),
(1, 12, 4),
(1, 13, 3),
(1, 14, 7),
(2, 2, 5),
(2, 5, 2),
(2, 8, 4),
(2, 11, 6),
(3, 1, 8),
(3, 5, 3),
(3, 6, 8),
(3, 11, 5),
(3, 12, 5),
(4, 3, 13),
(4, 6, 8),
(4, 9, 3),
(4, 10, 4),
(5, 2, 8),
(5, 5, 8),
(5, 13, 1),
(5, 15, 4),
(5, 19, 7),
(6, 1, 11),
(6, 10, 11),
(6, 12, 5),
(6, 14, 3),
(7, 2, 5),
(7, 11, 3),
(7, 12, 8),
(8, 1, 6),
(8, 4, 2),
(8, 5, 4),
(8, 14, 5),
(9, 5, 2),
(9, 6, 36),
(9, 7, 48),
(9, 9, 13),
(10, 1, 41),
(10, 2, 58),
(10, 6, 13),
(10, 8, 73),
(10, 11, 46),
(11, 5, 70),
(11, 10, 19),
(12, 3, 82),
(12, 10, 82),
(12, 13, 96),
(13, 1, 72),
(13, 12, 54),
(14, 1, 34),
(14, 2, 59),
(14, 15, 95),
(15, 1, 58),
(15, 2, 86),
(15, 10, 61),
(15, 11, 18),
(15, 12, 67),
(16, 1, 57),
(16, 13, 99),
(17, 11, 75),
(17, 12, 44),
(18, 1, 27),
(18, 10, 85),
(19, 4, 25),
(19, 8, 36),
(19, 10, 37),
(19, 12, 73),
(20, 3, 63),
(20, 6, 96),
(20, 8, 17),
(21, 4, 62),
(21, 8, 43),
(22, 1, 68),
(22, 4, 71),
(22, 12, 25),
(22, 14, 46),
(23, 5, 72),
(23, 7, 93),
(23, 13, 33),
(23, 15, 36),
(24, 2, 74),
(24, 4, 52),
(24, 7, 13),
(24, 11, 49),
(24, 15, 46),
(25, 2, 82),
(25, 3, 77),
(25, 11, 58),
(25, 12, 77),
(25, 14, 66),
(42, 1, 12),
(43, 1, 1),
(44, 1, 1),
(45, 1, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soluongton`
--

CREATE TABLE `soluongton` (
  `MaNguyenLieu` int(20) NOT NULL,
  `MaCuaHang` int(20) NOT NULL,
  `SoLuong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soluongton`
--

INSERT INTO `soluongton` (`MaNguyenLieu`, `MaCuaHang`, `SoLuong`) VALUES
(1, 1, 47),
(1, 2, 67),
(1, 3, 2),
(1, 4, 0),
(1, 5, 0),
(2, 1, 30),
(2, 2, 40),
(2, 3, 36),
(2, 4, 45),
(2, 5, 30),
(3, 1, 20),
(3, 2, 35),
(3, 3, 52),
(3, 4, 60),
(3, 5, 40),
(4, 1, 100),
(4, 2, 174),
(4, 3, 21),
(4, 4, 25),
(4, 5, 30),
(5, 1, 40),
(5, 2, 25),
(5, 3, 30),
(5, 4, 35),
(5, 5, 45),
(6, 1, 60),
(6, 2, 55),
(6, 3, 40),
(6, 4, 50),
(6, 5, 50),
(7, 1, 25),
(7, 2, 20),
(7, 3, 30),
(7, 4, 40),
(7, 5, 25),
(8, 1, 70),
(8, 2, 80),
(8, 3, 60),
(8, 4, 65),
(8, 5, 60),
(9, 1, 12),
(9, 2, 0),
(9, 3, 0),
(9, 4, 0),
(9, 5, 0),
(10, 1, 231),
(10, 2, 81),
(10, 3, 50),
(10, 4, 60),
(10, 5, 50),
(11, 1, 240),
(11, 2, 384),
(11, 3, 0),
(11, 4, 0),
(11, 5, 0),
(12, 1, 762),
(12, 2, 426),
(12, 3, 0),
(12, 4, 0),
(12, 5, 0),
(13, 1, 129),
(13, 2, 120),
(13, 3, 0),
(13, 4, 0),
(13, 5, 0),
(14, 1, 372),
(14, 2, 343),
(14, 3, 0),
(14, 4, 0),
(14, 5, 0),
(15, 1, 60),
(15, 2, 40),
(15, 3, 56),
(15, 4, 65),
(15, 5, 50),
(19, 1, 50),
(19, 2, 45),
(19, 3, 35),
(19, 4, 50),
(19, 5, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `MaChucVu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `MaNV`, `MatKhau`, `MaChucVu`) VALUES
(1, 1, 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, 2, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(3, 3, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(4, 4, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(5, 9, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(6, 10, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(7, 11, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(8, 12, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(9, 13, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(10, 14, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(11, 15, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(12, 16, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(13, 17, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(14, 18, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(15, 19, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(16, 20, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(17, 21, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(18, 22, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(19, 23, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(20, 24, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(21, 25, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(22, 26, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(23, 27, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(24, 28, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(25, 29, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(26, 30, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(27, 31, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(28, 32, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(29, 33, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(30, 34, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(31, 35, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(32, 36, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(33, 37, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(34, 38, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(35, 39, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(36, 40, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(37, 41, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(38, 42, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(39, 43, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(40, 44, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(41, 45, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(42, 46, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(43, 47, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(44, 48, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(45, 49, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(46, 50, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(47, 51, 'c4ca4238a0b923820dcc509a6f75849b', 2),
(48, 52, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(49, 53, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(50, 54, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(51, 55, 'c4ca4238a0b923820dcc509a6f75849b', 3),
(52, 56, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(53, 57, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(54, 58, 'c4ca4238a0b923820dcc509a6f75849b', 4),
(55, 59, 'c4ca4238a0b923820dcc509a6f75849b', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`Maban`),
  ADD KEY `fk_ban_cuahang` (`MaCuaHang`);

--
-- Chỉ mục cho bảng `calamviec`
--
ALTER TABLE `calamviec`
  ADD PRIMARY KEY (`MaLichLamViec`,`MaNhanVien`),
  ADD KEY `fk_calamviec_nhanvien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Mamonan`,`Madon`) USING BTREE,
  ADD KEY `fk_chitiet_don` (`Madon`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaChucVu`);

--
-- Chỉ mục cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  ADD PRIMARY KEY (`MaCuaHang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDon`),
  ADD KEY `fk_don_nhanvien` (`MaNhanVien`),
  ADD KEY `fk_don_pttt` (`PhuongThucThanhToan`),
  ADD KEY `fk_don_cuahang` (`MaCuaHang`);

--
-- Chỉ mục cho bảng `donnhaphang`
--
ALTER TABLE `donnhaphang`
  ADD PRIMARY KEY (`MaDonNhapHang`),
  ADD KEY `fk_dnh_cuahang` (`MaCuaHang`),
  ADD KEY `fk_dnh_nhanvien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`MaDonViTinh`);

--
-- Chỉ mục cho bảng `lich`
--
ALTER TABLE `lich`
  ADD PRIMARY KEY (`MaLich`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`Calamviec`),
  ADD KEY `fk_lichlamviec_lich` (`NgayLamViec`);

--
-- Chỉ mục cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  ADD PRIMARY KEY (`MaLoaiMonAn`);

--
-- Chỉ mục cho bảng `loainguyenlieu`
--
ALTER TABLE `loainguyenlieu`
  ADD PRIMARY KEY (`MaLoaiNguyenLieu`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`MaMonAn`),
  ADD KEY `fk_monan_loaimonan` (`MaLoaiMonAn`);

--
-- Chỉ mục cho bảng `monandexuat`
--
ALTER TABLE `monandexuat`
  ADD PRIMARY KEY (`MaDeXuat`),
  ADD KEY `fk_monandx_loaimonan` (`MaLoaiMonAn`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD PRIMARY KEY (`MaNguyenLieu`),
  ADD KEY `fk_nguyenlieu_loainguyenlieu` (`MaLoaiNguyenLieu`),
  ADD KEY `fk_nguyenlieu_donvitinh` (`MaDonViTinh`);

--
-- Chỉ mục cho bảng `nguyenlieuuocluong`
--
ALTER TABLE `nguyenlieuuocluong`
  ADD PRIMARY KEY (`MaNguyenLieu`,`MaDonNhapHang`) USING BTREE;

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD UNIQUE KEY `SDT` (`SDT`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_nhanvien_cuahang` (`MaCuaHang`),
  ADD KEY `fk_nhanvien-chucvu` (`MaChucVu`);

--
-- Chỉ mục cho bảng `pttt`
--
ALTER TABLE `pttt`
  ADD PRIMARY KEY (`MaPhuongThuc`);

--
-- Chỉ mục cho bảng `soluongnguyenlieu`
--
ALTER TABLE `soluongnguyenlieu`
  ADD PRIMARY KEY (`MaMonAn`,`MaNguyenLieu`) USING BTREE,
  ADD KEY `fk_slmonan_nguyenlieu` (`MaNguyenLieu`);

--
-- Chỉ mục cho bảng `soluongton`
--
ALTER TABLE `soluongton`
  ADD UNIQUE KEY `MaNguyenLieu` (`MaNguyenLieu`,`MaCuaHang`),
  ADD KEY `fk_slt_cuahang` (`MaCuaHang`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `MaNV` (`MaNV`),
  ADD KEY `fk_taikhoan_chucvu` (`MaChucVu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `Maban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaChucVu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cuahang`
--
ALTER TABLE `cuahang`
  MODIFY `MaCuaHang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `donnhaphang`
--
ALTER TABLE `donnhaphang`
  MODIFY `MaDonNhapHang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `MaDonViTinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lich`
--
ALTER TABLE `lich`
  MODIFY `MaLich` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `Calamviec` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `loaimonan`
--
ALTER TABLE `loaimonan`
  MODIFY `MaLoaiMonAn` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loainguyenlieu`
--
ALTER TABLE `loainguyenlieu`
  MODIFY `MaLoaiNguyenLieu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `MaMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `monandexuat`
--
ALTER TABLE `monandexuat`
  MODIFY `MaDeXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `MaNguyenLieu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `pttt`
--
ALTER TABLE `pttt`
  MODIFY `MaPhuongThuc` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `fk_ban_cuahang` FOREIGN KEY (`MaCuaHang`) REFERENCES `cuahang` (`MaCuaHang`);

--
-- Các ràng buộc cho bảng `calamviec`
--
ALTER TABLE `calamviec`
  ADD CONSTRAINT `fk_calamviec_lichlamviec` FOREIGN KEY (`MaLichLamViec`) REFERENCES `lichlamviec` (`Calamviec`),
  ADD CONSTRAINT `fk_calamviec_nhanvien` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `fk_chitiet_don` FOREIGN KEY (`Madon`) REFERENCES `donhang` (`MaDon`),
  ADD CONSTRAINT `fk_chitiet_monan` FOREIGN KEY (`Mamonan`) REFERENCES `monan` (`MaMonAn`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_don_cuahang` FOREIGN KEY (`MaCuaHang`) REFERENCES `cuahang` (`MaCuaHang`),
  ADD CONSTRAINT `fk_don_nhanvien` FOREIGN KEY (`MaNhanVien`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `fk_don_pttt` FOREIGN KEY (`PhuongThucThanhToan`) REFERENCES `pttt` (`MaPhuongThuc`);

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `fk_lichlamviec_lich` FOREIGN KEY (`NgayLamViec`) REFERENCES `lich` (`MaLich`);

--
-- Các ràng buộc cho bảng `monan`
--
ALTER TABLE `monan`
  ADD CONSTRAINT `fk_monan_loaimonan` FOREIGN KEY (`MaLoaiMonAn`) REFERENCES `loaimonan` (`MaLoaiMonAn`);

--
-- Các ràng buộc cho bảng `monandexuat`
--
ALTER TABLE `monandexuat`
  ADD CONSTRAINT `fk_monandx_loaimonan` FOREIGN KEY (`MaLoaiMonAn`) REFERENCES `loaimonan` (`MaLoaiMonAn`),
  ADD CONSTRAINT `monandexuat_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  ADD CONSTRAINT `fk_nguyenlieu_donvitinh` FOREIGN KEY (`MaDonViTinh`) REFERENCES `donvitinh` (`MaDonViTinh`),
  ADD CONSTRAINT `fk_nguyenlieu_loainguyenlieu` FOREIGN KEY (`MaLoaiNguyenLieu`) REFERENCES `loainguyenlieu` (`MaLoaiNguyenLieu`);

--
-- Các ràng buộc cho bảng `nguyenlieuuocluong`
--
ALTER TABLE `nguyenlieuuocluong`
  ADD CONSTRAINT `fk_nlul_nguyenlieu` FOREIGN KEY (`MaNguyenLieu`) REFERENCES `nguyenlieu` (`MaNguyenLieu`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nhanvien-chucvu` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`),
  ADD CONSTRAINT `fk_nhanvien_cuahang` FOREIGN KEY (`MaCuaHang`) REFERENCES `cuahang` (`MaCuaHang`);

--
-- Các ràng buộc cho bảng `soluongnguyenlieu`
--
ALTER TABLE `soluongnguyenlieu`
  ADD CONSTRAINT `fk_slmonan_monan` FOREIGN KEY (`MaMonAn`) REFERENCES `monan` (`MaMonAn`),
  ADD CONSTRAINT `fk_slmonan_nguyenlieu` FOREIGN KEY (`MaNguyenLieu`) REFERENCES `nguyenlieu` (`MaNguyenLieu`);

--
-- Các ràng buộc cho bảng `soluongton`
--
ALTER TABLE `soluongton`
  ADD CONSTRAINT `fk_slt_cuahang` FOREIGN KEY (`MaCuaHang`) REFERENCES `cuahang` (`MaCuaHang`),
  ADD CONSTRAINT `fk_slt_nguyenlieu` FOREIGN KEY (`MaNguyenLieu`) REFERENCES `nguyenlieu` (`MaNguyenLieu`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_chucvu` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`),
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
