-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2024 lúc 01:04 PM
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
-- Cơ sở dữ liệu: `haoquangptud`
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
(2, 1, 0, 4, 'Trống'),
(3, 1, 0, 4, 'Trống'),
(4, 1, 0, 4, 'Trống'),
(5, 1, 0, 4, 'Trống'),
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
(2, 2, 15),
(3, 3, 11),
(4, 4, 14);

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
  `TinhTrang` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cuahang`
--

INSERT INTO `cuahang` (`MaCuaHang`, `TenCuaHang`, `DiaChi`, `TinhTrang`) VALUES
(1, 'Cửa hàng 1', 'NVB', 1),
(2, 'Cửa hàng 2', 'NVB', 1),
(3, 'Cửa hàng 3', 'NVB', 1),
(4, 'Cửa hàng 4', 'NVB', 1),
(5, 'Cửa hàng 5', 'PVD', 1);

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
  `MaNhanVien` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDon`, `GioTaoDon`, `TongTien`, `PhuongThucThanhToan`, `GhiChu`, `TenKhachHang`, `SoDienThoai`, `DiaChi`, `MaNhanVien`) VALUES
(1, '2024-11-08 17:10:25', 200000, 1, 'không', NULL, NULL, NULL, 3),
(2, '2024-11-08 17:15:22', 200000, 2, '.', NULL, NULL, NULL, 3),
(3, '2024-11-08 17:15:22', 100000, 2, 'ok', NULL, NULL, NULL, 3),
(4, '2024-11-08 17:17:01', 200000, 1, 'sánnKWIS', NULL, NULL, NULL, 3);

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
(38, 0, '2024-12-01', 5744000, 0, 1),
(39, 0, '2024-12-01', 5744000, 0, 1),
(40, 0, '2024-12-01', 5744000, 0, 1),
(41, 0, '2024-12-01', 5744000, 0, 1),
(42, 0, '2024-12-01', 125268000, 0, 1),
(43, 0, '2024-12-01', 23506000, 0, 1),
(44, 0, '2024-12-03', 50, 0, 1),
(45, 0, '2024-12-03', 10, 0, 1),
(46, 0, '2024-12-03', 15010, 0, 1),
(47, 0, '2024-12-03', 24010, 0, 1),
(48, 0, '2024-12-03', 34010, 0, 1);

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
(1, 'Burger', 'Có', '1.jpg'),
(2, 'Combo', 'Chưa Sẵn Sàng', '2.jpg'),
(3, 'Gà Rán', 'Có', '3.jpg'),
(4, 'Cơm Vua', 'Chưa Sẵn Sàng', '4.jpg'),
(5, 'Món Ăn Kèm', 'Có', '5.jpg'),
(6, 'Thức Uống', 'Có', '6.jpg');

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
  `Hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`MaMonAn`, `MaLoaiMonAn`, `Tenmonan`, `Giaban`, `Mota`, `Tinhtrang`, `Hinhanh`) VALUES
(1, 1, 'American Trio Charcoal Burger', 79000, 'Bánh burger này thường có lớp bánh mì được nướng trên than, tạo màu đen hấp dẫn và mang lại vị khói đặc trưng.\r\nBên trong bánh gồm nhiều lớp nhân: thịt bò băm nướng mọng nước, phô mai tan chảy, và các loại rau tươi mát.', 'Có', '1.jpg'),
(2, 1, 'Cheese ring burger', 55000, 'Bánh burger này có phần phô mai chiên tạo hình vòng tròn xung quanh phần nhân thịt, khiến chiếc bánh không chỉ thơm ngon mà còn nổi bật và đẹp mắt. Khi cắn vào, người ăn sẽ cảm nhận được lớp phô mai giòn rụm và tan chảy ngay lập tức.\r\n', 'Có', '2.jpg'),
(3, 1, 'Kuro ninja tempura burger jr', 79000, 'Chiếc burger này có lớp bánh mì màu đen được làm từ than tre, tạo nên vẻ ngoài lạ mắt và thêm vị khói nhẹ. Bên trong, phần nhân được kết hợp từ các nguyên liệu mang phong cách Nhật như tempura và sốt teriyaki, đem lại hương vị độc đáo và cân bằng', 'Không', '3.jpg'),
(4, 1, 'Extreme cheese whopper', 125000, 'Chiếc burger được làm từ nhiều lớp phô mai tan chảy, kết hợp với phần thịt bò nướng truyền thống của Whopper. Mỗi miếng cắn mang lại trải nghiệm vừa béo, vừa đậm đà với hương vị đặc trưng của thịt nướng và phô mai.', 'Có', '4.jpg'),
(5, 1, 'Double cheeseburger', 79000, 'Chiếc burger bao gồm hai lớp thịt bò nướng mọng nước, xen kẽ là phô mai cheddar tan chảy. Vị béo của phô mai hòa quyện với thịt bò đậm đà, tạo ra hương vị tuyệt vời và giúp chiếc burger thêm hấp dẫn.', 'Có', '5.jpg'),
(6, 1, 'Fish burger', 49000, 'Phần nhân cá được tẩm bột và chiên vàng giòn, thơm lừng và đậm đà. Kết hợp cùng rau tươi và sốt chua ngọt hoặc sốt tartar, Fish Burger đem lại trải nghiệm hương vị nhẹ nhàng nhưng vẫn ngon miệng và độc đáo.', 'Có', '6.jpg'),
(7, 2, 'Combo king jr wednesday', 109000, 'Combo này thường bao gồm các món phù hợp với khẩu phần của trẻ em, với một chiếc burger nhỏ nhưng vẫn đầy đủ các thành phần dinh dưỡng và khoai tây chiên giòn rụm. Phần combo có thêm đồ uống như nước ngọt hoặc nước trái cây để hoàn thiện bữa ăn.', 'Có', '7.jpg'),
(8, 2, 'Combo king jr thing', 119000, 'Combo King Jr. Thing thường bao gồm một chiếc burger hoặc phần gà nhỏ, đi kèm với một phần khoai tây chiên hoặc táo cắt lát, cùng một thức uống như nước trái cây, nước ngọt, hoặc sữa. Phần combo này cũng có thể bao gồm đồ chơi để tạo sự thích thú cho trẻ em khi ăn.', 'Không', '8.jpg'),
(9, 2, 'Combo king jr ms addams', 129000, 'Combo này thường bao gồm các món ăn yêu thích của trẻ em, như burger hoặc gà viên, khoai tây chiên hoặc táo lát, và một loại thức uống. Đặc biệt, phần ăn có thể đi kèm với các vật phẩm liên quan đến The Addams Family, như đồ chơi hoặc bao bì được trang trí theo chủ đề Ms. Addams.', 'Có', '9.jpg'),
(10, 2, 'Cheese ring burger combo', 79000, 'Combo này xoay quanh Cheese Ring Burger, chiếc burger với lớp phô mai chiên giòn tạo thành vòng tròn đặc trưng, ôm lấy phần nhân thịt và rau bên trong. Mỗi phần combo bao gồm burger, khoai tây chiên và một thức uống, giúp bạn có trải nghiệm đầy đủ hương vị.', 'Có', '10.jpg'),
(11, 2, 'Combo kuro ninja tempura burger jr', 99000, 'Combo này bao gồm một chiếc Kuro Ninja Tempura Burger Jr., với bánh mì đen mềm mại và phần nhân tempura (tôm hoặc gà) giòn rụm, cùng với các thành phần như rau tươi và sốt đặc trưng. Phần ăn kèm có thể bao gồm khoai tây chiên giòn và một thức uống giải khát, phù hợp với khẩu phần ăn của trẻ em.', 'Có', '11.jpg'),
(12, 2, 'Combo family chic\'n lovers', 265000, 'Combo Family Chic\'n Lovers thường bao gồm các phần gà chiên giòn (có thể là gà rán hoặc gà viên), khoai tây chiên giòn, và các món ăn kèm khác như salad hoặc đồ uống. Phần ăn này có thể được tùy chỉnh để phục vụ gia đình hoặc nhóm bạn, với số lượng đủ để mọi người cùng thưởng thức.', 'Có', '12.jpg'),
(13, 3, 'Gà giòn crispy', 45000, 'Gà Giòn Crispy có lớp vỏ được chiên giòn rụm nhờ vào một lớp bột chiên đặc biệt, thường được ướp gia vị nhẹ nhàng để làm nổi bật vị ngọt của thịt gà. Món ăn này thường đi kèm với các loại sốt như sốt mật ong, sốt BBQ hoặc sốt mayonnaise để tăng thêm hương vị.', 'Có', '13.jpg'),
(14, 3, 'Gà bbq (1 miếng)', 45000, 'Gà BBQ (1 miếng) thường là một miếng gà, có thể là đùi, cánh hoặc ức gà, được ướp kỹ với gia vị, rồi phủ lớp sốt BBQ, sau đó được nướng hoặc chiên cho đến khi da giòn và thịt bên trong mềm, ngọt. Sốt BBQ có thể có vị ngọt, cay, hoặc hơi khói tùy thuộc vào công thức.', 'Có', '14.jpg'),
(15, 3, 'Mix wing 2pcs', 45000, 'Mix Wing 2pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '15.jpg'),
(16, 3, 'Mix wing 4pcs', 89000, 'Mix Wing 4pcs gồm bốn miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '16.jpg'),
(17, 3, 'Mix wing 6pcs', 129000, 'Mix Wing 6pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Có', '17.jpg'),
(18, 3, 'Family chic\'n lovers', 265000, 'Family Chic\'n Lovers thường đi kèm với các món ăn chính là gà chiên giòn hoặc gà nướng, khoai tây chiên giòn và thức uống. Đây là một lựa chọn hoàn hảo cho gia đình hoặc nhóm bạn, giúp mọi người có thể cùng nhau thưởng thức một bữa ăn thịnh soạn và vui vẻ.', 'Có', '18.jpg'),
(19, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Có', '19.jpg'),
(20, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Có', '20.jpg'),
(21, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Có', '21.jpg'),
(22, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Có', '22.jpg'),
(23, 4, 'Cheesy beef rice combo', 45000, 'Cheesy Beef Rice Combo bao gồm miếng thịt bò được chế biến mềm mại, phủ lên một lớp phô mai tan chảy, kết hợp với cơm trắng hoặc cơm chiên, tạo nên một bữa ăn ngon miệng và đầy đủ dinh dưỡng. Phô mai tan chảy giúp làm tăng thêm độ béo và hấp dẫn cho món ăn.', 'Có', '23.jpg'),
(24, 5, 'Gà cuộn rong biển 4pcs', 45000, 'Gà Cuộn Rong Biển 4pcs bao gồm bốn miếng gà cuộn với rong biển. Thịt gà được ướp gia vị vừa phải để giữ nguyên độ ngọt tự nhiên, sau đó được cuộn cùng rong biển tươi hoặc rong biển khô. Món ăn này có thể được chiên giòn hoặc nướng nhẹ, mang đến một lớp vỏ ngoài giòn rụm và phần thịt gà mềm mọng bên trong.', 'Có', '24.jpg'),
(25, 5, 'Cheese ring snack ', 35000, 'Cheese Ring Snack có hình dạng vòng tròn hoặc hình vòng, được làm từ bột và phô mai, thường được chiên giòn hoặc nướng để có được kết cấu giòn rụm. Phô mai tan chảy trong món snack này tạo ra hương vị thơm ngon và béo ngậy, phù hợp cho những ai thích thưởng thức món ăn vặt với vị phô mai đậm đà.', 'Có', '25.jpg'),
(26, 5, 'American fries bacon', 59000, 'American Fries Bacon bao gồm các miếng khoai tây dày, thường được chiên giòn hoặc nướng cho đến khi bên ngoài giòn rụm, trong khi bên trong vẫn giữ được độ mềm. Khoai tây sẽ được kết hợp với các miếng thịt bacon chiên giòn, tạo nên sự hòa quyện tuyệt vời giữa khoai tây béo ngậy và hương vị mặn mà của bacon.', 'Có', '26.jpg'),
(27, 5, 'Cá cuộn rong biển', 25000, 'Cá Cuộn Rong Biển là món ăn đơn giản nhưng đầy sáng tạo, khi miếng cá được ướp gia vị nhẹ nhàng, sau đó cuộn lại với rong biển tươi hoặc rong biển khô. Món ăn này có thể được chế biến theo nhiều cách khác nhau, từ chiên giòn đến nướng, tùy thuộc vào sở thích và phong cách chế biến.', 'Có', '27.jpg'),
(28, 5, 'Phô mai que', 25000, 'Phô Mai Que có hình dạng que dài hoặc hình vuông nhỏ, với phần phô mai bên trong mềm mịn và dễ tan chảy. Lớp vỏ ngoài giòn tan được làm từ bột chiên, tạo thành một sự kết hợp hoàn hảo giữa độ giòn của bột chiên và độ béo, mịn của phô mai.', 'Có', '28.jpg'),
(29, 5, 'Khoai tây chiên', 29000, 'Khoai Tây Chiên có lớp vỏ ngoài giòn rụm, bên trong mềm mại và thơm ngọt tự nhiên của khoai tây. Khoai tây được chế biến đơn giản nhưng lại rất ngon miệng nhờ sự kết hợp của độ giòn và độ mềm, thường được ướp gia vị nhẹ để tăng thêm hương vị.', 'Có', '29.jpg'),
(30, 6, 'Dasani', 15000, 'Dasani ', 'Có', '30.jpg'),
(31, 6, 'Coca', 15000, 'Coca', 'Có', '31.jpg'),
(32, 6, 'Fanta', 15000, 'Fanta', 'Có', '32.jpg'),
(33, 6, 'Sprite', 15000, 'Sprite', 'Có', '33.jpg'),
(34, 6, 'Coke light', 27000, 'Coke light', 'Có', '34.jpg');

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
(1, 3, 1, 'Burger Phở', '', ' Thịt bò xay 100 gr\n Bột mì đa dụng 1 muỗng cà phê\n Bánh phở 140 gr\n Trứng 3 quả\n Bơ lạt 2 muỗng cà phê\n Hành tây 2 muỗng cà phê\n(cắt hạt lựu)\n Ngò gai băm 2 muỗng cà phê\n Dầu ăn 3 muỗng canh\n Gia vị phở tổng hợp 1 muỗng cà phê\n', 50.00, 1);

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
('Hương', 'c4ca4238a0b923820dcc509a6f75849b', 4, 3);

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
  `MaCuaHang` int(20) NOT NULL,
  `SoLuong` int(20) NOT NULL,
  `NguyenLieuTuoi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguyenlieu`
--

INSERT INTO `nguyenlieu` (`MaNguyenLieu`, `TenNguyenLieu`, `HinhAnh`, `GiaMua`, `TinhTrang`, `MaLoaiNguyenLieu`, `MaDonViTinh`, `MaCuaHang`, `SoLuong`, `NguyenLieuTuoi`) VALUES
(1, 'Thịt gà', 'duiga.jpg', 10, 0, 1, 7, 1, 0, 1),
(2, 'Bột Chiên Xù', 'botchienxu.jpg', 15000, 1, 5, 2, 1, 15, 0),
(3, 'Đường', 'duong.jpg', 9000, 1, 2, 1, 1, 5, 0),
(4, 'Muối', 'muoi.jpg', 5000, 1, 2, 1, 1, 6, 0),
(5, 'Bánh Mì', 'banhmi.jpg', 2000, 1, 4, 3, 1, 50, 0),
(6, 'Mỳ Ý', 'myy.jpg', 40000, 1, 4, 2, 1, 30, 0),
(7, 'Tương Ớt', 'tuongot.jpg', 15000, 1, 2, 6, 1, 50, 0),
(8, 'Dầu Ăn', 'dauan.jpg', 36000, 1, 2, 6, 1, 20, 0),
(9, 'Hành Tây', 'hanhtay.jpg', 2000, 1, 3, 5, 1, 0, 1),
(10, 'Trứng Gà', 'trungga.jpg', 3000, 1, 1, 7, 1, 125, 0),
(11, 'Cà Chua', 'cachua.jpg', 2000, 1, 3, 4, 1, 0, 1),
(12, 'Dưa Leo', 'dualeo.jpg', 2000, 1, 3, 1, 1, 0, 1),
(13, 'Thịt Bò', 'thitbo.jpg', 50000, 1, 1, 1, 1, 0, 1),
(14, 'Thịt Heo', 'thitheo.jpg', 50000, 1, 1, 1, 1, 0, 1),
(15, 'Gạo', 'gao.jpg', 20000, 0, 6, 1, 2, 50, 0),
(19, 'Tiêu', 'gao.jpg', 2000, 0, 2, 1, 2, 50, 0);

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
(2, 0, 38),
(2, 770, 42),
(2, 0, 44),
(2, 0, 45),
(2, 1, 46),
(2, 1, 47),
(2, 0, 48),
(3, 0, 38),
(3, 128, 42),
(3, 0, 44),
(3, 0, 45),
(3, 0, 46),
(3, 1, 47),
(3, 1, 48),
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
(5, 0, 38),
(5, 230, 42),
(5, 0, 44),
(5, 0, 45),
(5, 0, 46),
(5, 0, 47),
(5, 0, 48),
(6, 0, 38),
(6, 363, 42),
(6, 0, 44),
(6, 0, 45),
(6, 0, 46),
(6, 0, 47),
(6, 0, 48),
(7, 0, 38),
(7, 432, 42),
(7, 0, 44),
(7, 0, 45),
(7, 0, 46),
(7, 0, 47),
(7, 0, 48),
(8, 0, 38),
(8, 1070, 42),
(8, 0, 44),
(8, 0, 45),
(8, 0, 46),
(8, 0, 47),
(8, 0, 48),
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
(15, 0, 38),
(15, 0, 44),
(15, 0, 45),
(15, 0, 46),
(15, 0, 47),
(15, 1, 48),
(19, 0, 44),
(19, 0, 45),
(19, 0, 46),
(19, 0, 47),
(19, 0, 48);

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
(8, 'Go dan Ram say', 1, 'Gò Vấp', '0101010101', 'masterchef@gmail.com', 1, 1, 4);

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
  `KhoiLuong` float NOT NULL DEFAULT 0,
  `MaCuaHang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `soluongnguyenlieu`
--

INSERT INTO `soluongnguyenlieu` (`MaMonAn`, `MaNguyenLieu`, `KhoiLuong`, `MaCuaHang`) VALUES
(1, 12, 4, 1),
(1, 13, 3, 1),
(1, 14, 7, 1),
(2, 4, 3, 1),
(2, 11, 6, 1),
(3, 10, 2, 1),
(3, 12, 5, 1),
(4, 9, 3, 1),
(4, 10, 4, 1),
(5, 2, 8, 1),
(5, 3, 8, 1),
(5, 10, 8, 1),
(6, 5, 6, 1),
(6, 8, 3, 1),
(6, 11, 1, 1),
(6, 12, 5, 1),
(6, 14, 3, 1),
(7, 2, 5, 1),
(7, 11, 3, 1),
(7, 12, 8, 1),
(8, 1, 6, 1),
(8, 4, 2, 1),
(8, 5, 4, 1),
(8, 14, 5, 1),
(9, 5, 2, 1),
(9, 6, 36, 1),
(9, 7, 48, 1),
(9, 9, 13, 1),
(10, 1, 41, 1),
(10, 2, 58, 1),
(10, 6, 13, 1),
(10, 8, 73, 1),
(10, 11, 46, 1),
(11, 5, 70, 1),
(11, 10, 19, 1),
(12, 3, 82, 1),
(12, 10, 82, 1),
(12, 13, 96, 1),
(13, 1, 72, 1),
(13, 12, 54, 1),
(14, 1, 34, 1),
(14, 2, 59, 1),
(14, 15, 95, 1),
(15, 1, 58, 1),
(15, 2, 86, 1),
(15, 10, 61, 1),
(15, 11, 18, 1),
(15, 12, 67, 1),
(16, 1, 57, 1),
(16, 13, 99, 1),
(17, 11, 75, 1),
(17, 12, 44, 1),
(18, 1, 27, 1),
(18, 10, 85, 1),
(19, 4, 25, 1),
(19, 8, 36, 1),
(19, 10, 37, 1),
(19, 12, 73, 1),
(20, 3, 63, 1),
(20, 6, 96, 1),
(20, 8, 17, 1),
(21, 4, 62, 1),
(21, 8, 43, 1),
(22, 1, 68, 1),
(22, 4, 71, 1),
(22, 12, 25, 1),
(22, 14, 46, 1),
(23, 5, 72, 1),
(23, 7, 93, 1),
(23, 13, 33, 1),
(23, 15, 36, 1),
(24, 2, 74, 1),
(24, 4, 52, 1),
(24, 7, 13, 1),
(24, 11, 49, 1),
(24, 15, 46, 1),
(25, 2, 82, 1),
(25, 3, 77, 1),
(25, 11, 58, 1),
(25, 12, 77, 1),
(25, 14, 66, 1);

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
(4, 4, 'c4ca4238a0b923820dcc509a6f75849b', 4);

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
  ADD KEY `fk_don_pttt` (`PhuongThucThanhToan`);

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
  ADD UNIQUE KEY `MaNV` (`MaNV`),
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
  MODIFY `MaCuaHang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donnhaphang`
--
ALTER TABLE `donnhaphang`
  MODIFY `MaDonNhapHang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `MaMonAn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `monandexuat`
--
ALTER TABLE `monandexuat`
  MODIFY `MaDeXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nguyenlieu`
--
ALTER TABLE `nguyenlieu`
  MODIFY `MaNguyenLieu` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `pttt`
--
ALTER TABLE `pttt`
  MODIFY `MaPhuongThuc` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_chucvu` FOREIGN KEY (`MaChucVu`) REFERENCES `chucvu` (`MaChucVu`),
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
