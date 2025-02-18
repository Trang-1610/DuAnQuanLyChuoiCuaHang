-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2024 lúc 04:17 PM
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
-- Cơ sở dữ liệu: `haoquang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ban`
--

CREATE TABLE `ban` (
  `Maban` int(11) NOT NULL,
  `Macuahang` int(11) NOT NULL,
  `Soghe` int(11) NOT NULL,
  `Tinhtrang` varchar(11) NOT NULL,
  `Hotenkhachhang` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ban`
--

INSERT INTO `ban` (`Maban`, `Macuahang`, `Soghe`, `Tinhtrang`, `Hotenkhachhang`) VALUES
(1, 1, 4, 'Bận', 'Trần Thị Huyền Trang'),
(2, 1, 4, 'Trống', NULL),
(3, 1, 4, 'Trống', NULL),
(4, 1, 4, 'Trống', NULL),
(5, 1, 4, 'Trống', NULL),
(6, 1, 4, 'Trống', NULL),
(7, 2, 4, 'Trống', NULL),
(8, 2, 4, 'Trống', NULL),
(9, 2, 4, 'Trống', NULL),
(10, 2, 4, 'Trống', NULL),
(11, 2, 4, 'Trống', NULL),
(12, 2, 4, 'Trống', NULL),
(13, 3, 4, 'Trống', NULL),
(14, 3, 4, 'Trống', NULL),
(15, 3, 4, 'Trống', NULL),
(16, 3, 4, 'Trống', NULL),
(17, 3, 4, 'Trống', NULL),
(18, 3, 4, 'Trống', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `Machitiethoadon` int(11) NOT NULL,
  `Mamonan` int(11) NOT NULL,
  `Madon` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`Machitiethoadon`, `Mamonan`, `Madon`, `Soluong`) VALUES
(1, 1, 1, 10),
(2, 2, 2, 15),
(3, 3, 3, 11),
(4, 4, 4, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monan`
--

CREATE TABLE `monan` (
  `Mamonan` int(11) NOT NULL,
  `Maloaimoan` int(11) NOT NULL,
  `Tenmonan` varchar(255) NOT NULL,
  `Giaban` decimal(10,0) NOT NULL,
  `Mota` varchar(1000) NOT NULL,
  `Nguyenlieu` varchar(255) NOT NULL,
  `Tinhtrang` varchar(50) NOT NULL,
  `Hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monan`
--

INSERT INTO `monan` (`Mamonan`, `Maloaimoan`, `Tenmonan`, `Giaban`, `Mota`, `Nguyenlieu`, `Tinhtrang`, `Hinhanh`) VALUES
(1, 1, 'American Trio Charcoal Burger', 79000, 'Bánh burger này thường có lớp bánh mì được nướng trên than, tạo màu đen hấp dẫn và mang lại vị khói đặc trưng.\r\nBên trong bánh gồm nhiều lớp nhân: thịt bò băm nướng mọng nước, phô mai tan chảy, và các loại rau tươi mát.', 'Bánh mì charcoal, Thịt bò, Phô mai cheddar, Rau sống, Nước sốt đặc biệt, Thịt xông khói ', 'Có', '1.jpg'),
(2, 1, 'Cheese ring burger', 55000, 'Bánh burger này có phần phô mai chiên tạo hình vòng tròn xung quanh phần nhân thịt, khiến chiếc bánh không chỉ thơm ngon mà còn nổi bật và đẹp mắt. Khi cắn vào, người ăn sẽ cảm nhận được lớp phô mai giòn rụm và tan chảy ngay lập tức.\r\n', 'Bánh mì burger, Phô mai cheddar, Thịt bò nướng, Rau sống, Nước sốt đặc biệt, Thịt xông khói ', 'Có', '2.jpg'),
(3, 1, 'Kuro ninja tempura burger jr', 79000, 'Chiếc burger này có lớp bánh mì màu đen được làm từ than tre, tạo nên vẻ ngoài lạ mắt và thêm vị khói nhẹ. Bên trong, phần nhân được kết hợp từ các nguyên liệu mang phong cách Nhật như tempura và sốt teriyaki, đem lại hương vị độc đáo và cân bằng', 'Bánh mì Kuro, Tempura, Thịt bò, Sốt teriyaki, Phô mai, Rau sống, Hành tây cắt lát mỏng', 'Không', '3.jpg'),
(4, 1, 'Extreme cheese whopper', 125000, 'Chiếc burger được làm từ nhiều lớp phô mai tan chảy, kết hợp với phần thịt bò nướng truyền thống của Whopper. Mỗi miếng cắn mang lại trải nghiệm vừa béo, vừa đậm đà với hương vị đặc trưng của thịt nướng và phô mai.', 'Bánh mì burger, Thịt bò nướng, Phô mai cheddar, Sốt phô mai đặc biệt, Rau sống tươi, Sốt mayonnaise và ketchup', 'Có', '4.jpg'),
(5, 1, 'Double cheeseburger', 79000, 'Chiếc burger bao gồm hai lớp thịt bò nướng mọng nước, xen kẽ là phô mai cheddar tan chảy. Vị béo của phô mai hòa quyện với thịt bò đậm đà, tạo ra hương vị tuyệt vời và giúp chiếc burger thêm hấp dẫn.', 'Bánh mì burger, Hai miếng thịt bò nướng, Hai lát phô mai cheddar, Sốt, Rau sống', 'Có', '5.jpg'),
(6, 1, 'Fish burger', 49000, 'Phần nhân cá được tẩm bột và chiên vàng giòn, thơm lừng và đậm đà. Kết hợp cùng rau tươi và sốt chua ngọt hoặc sốt tartar, Fish Burger đem lại trải nghiệm hương vị nhẹ nhàng nhưng vẫn ngon miệng và độc đáo.', 'Bánh mì burger, Nhân cá, Sốt tartar, Rau sống, Phô mai', 'Có', '6.jpg'),
(7, 2, 'Combo king jr wednesday', 109000, 'Combo này thường bao gồm các món phù hợp với khẩu phần của trẻ em, với một chiếc burger nhỏ nhưng vẫn đầy đủ các thành phần dinh dưỡng và khoai tây chiên giòn rụm. Phần combo có thêm đồ uống như nước ngọt hoặc nước trái cây để hoàn thiện bữa ăn.', 'Burger Jr, Khoai tây chiên, Đồ uống', 'Có', '1.jpg'),
(8, 2, 'Combo king jr thing', 119000, 'Combo King Jr. Thing thường bao gồm một chiếc burger hoặc phần gà nhỏ, đi kèm với một phần khoai tây chiên hoặc táo cắt lát, cùng một thức uống như nước trái cây, nước ngọt, hoặc sữa. Phần combo này cũng có thể bao gồm đồ chơi để tạo sự thích thú cho trẻ em khi ăn.', 'Burger hoặc gà viên, Khoai tây chiên hoặc táo cắt lát, Thức uống, Đồ chơi (tùy vào chương trình khuyến mãi)', 'Không', '2.jpg'),
(9, 2, 'Combo king jr ms addams', 129000, 'Combo này thường bao gồm các món ăn yêu thích của trẻ em, như burger hoặc gà viên, khoai tây chiên hoặc táo lát, và một loại thức uống. Đặc biệt, phần ăn có thể đi kèm với các vật phẩm liên quan đến The Addams Family, như đồ chơi hoặc bao bì được trang trí theo chủ đề Ms. Addams.', 'Burger nhỏ hoặc Chicken Nuggets, Khoai tây chiên hoặc táo cắt lát, Thức uống, Đồ chơi Ms. Addams (theo chủ đề Addams Family)', 'Có', '3.jpg'),
(10, 2, 'Cheese ring burger combo', 79000, 'Combo này xoay quanh Cheese Ring Burger, chiếc burger với lớp phô mai chiên giòn tạo thành vòng tròn đặc trưng, ôm lấy phần nhân thịt và rau bên trong. Mỗi phần combo bao gồm burger, khoai tây chiên và một thức uống, giúp bạn có trải nghiệm đầy đủ hương vị.', 'Cheese Ring Burger, Khoai tây chiên, Thức uống', 'Có', '4.jpg'),
(11, 2, 'Combo kuro ninja tempura burger jr', 99000, 'Combo này bao gồm một chiếc Kuro Ninja Tempura Burger Jr., với bánh mì đen mềm mại và phần nhân tempura (tôm hoặc gà) giòn rụm, cùng với các thành phần như rau tươi và sốt đặc trưng. Phần ăn kèm có thể bao gồm khoai tây chiên giòn và một thức uống giải khát, phù hợp với khẩu phần ăn của trẻ em.', 'Kuro Ninja Tempura Burger Jr, Khoai tây chiên, Thức uống', 'Có', '5.jpg'),
(12, 2, 'Combo family chic\'n lovers', 265000, 'Combo Family Chic\'n Lovers thường bao gồm các phần gà chiên giòn (có thể là gà rán hoặc gà viên), khoai tây chiên giòn, và các món ăn kèm khác như salad hoặc đồ uống. Phần ăn này có thể được tùy chỉnh để phục vụ gia đình hoặc nhóm bạn, với số lượng đủ để mọi người cùng thưởng thức.', 'Gà chiên giòn, Khoai tây chiên, Salad hoặc rau sống, Đồ uống, Các món ăn kèm khác', 'Có', '6.jpg'),
(13, 3, 'Gà giòn crispy', 45000, 'Gà Giòn Crispy có lớp vỏ được chiên giòn rụm nhờ vào một lớp bột chiên đặc biệt, thường được ướp gia vị nhẹ nhàng để làm nổi bật vị ngọt của thịt gà. Món ăn này thường đi kèm với các loại sốt như sốt mật ong, sốt BBQ hoặc sốt mayonnaise để tăng thêm hương vị.', 'Thịt gà, Lớp bột chiên, Sốt chấm', 'Có', '1.jpg'),
(14, 3, 'Gà bbq (1 miếng)', 45000, 'Gà BBQ (1 miếng) thường là một miếng gà, có thể là đùi, cánh hoặc ức gà, được ướp kỹ với gia vị, rồi phủ lớp sốt BBQ, sau đó được nướng hoặc chiên cho đến khi da giòn và thịt bên trong mềm, ngọt. Sốt BBQ có thể có vị ngọt, cay, hoặc hơi khói tùy thuộc vào công thức.', 'Thịt gà,Sốt BBQ, Gia vị ướp gà', 'Có', '2.jpg'),
(15, 3, 'Mix wing 2pcs', 45000, 'Mix Wing 2pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Cánh gà chiên giòn, Cánh gà sốt,Gia vị', 'Có', '3.jpg'),
(16, 3, 'Mix wing 4pcs', 89000, 'Mix Wing 4pcs gồm bốn miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Cánh gà chiên giòn, Cánh gà sốt,Gia vị', 'Có', '4.jpg'),
(17, 3, 'Mix wing 6pcs', 129000, 'Mix Wing 6pcs gồm hai miếng cánh gà, mỗi miếng có thể được chế biến theo cách khác nhau, giúp thực khách thưởng thức được nhiều hương vị. Một miếng có thể được chiên giòn rụm, trong khi miếng còn lại có thể được phủ sốt BBQ, sốt tỏi, sốt cay hoặc các loại sốt khác.', 'Cánh gà chiên giòn, Cánh gà sốt, Gia vị', 'Có', '5.jpg'),
(18, 3, 'Family chic\'n lovers', 265000, 'Family Chic\'n Lovers thường đi kèm với các món ăn chính là gà chiên giòn hoặc gà nướng, khoai tây chiên giòn và thức uống. Đây là một lựa chọn hoàn hảo cho gia đình hoặc nhóm bạn, giúp mọi người có thể cùng nhau thưởng thức một bữa ăn thịnh soạn và vui vẻ.', 'Gà chiên giòn, Khoa.i tây chiên, Sốt chấm, Đồ uống, Các món ăn kèm khác', 'Có', '6.jpg'),
(19, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Cánh gà BBQ, Cơm, Gia vị và sốt chấm', 'Có', '1.jpg'),
(20, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Thịt bò BBQ, Cơm, Gia vị và sốt chấm.', 'Có', '2.jpg'),
(21, 4, 'Bbq wing rice combo', 45000, 'BBQ Wing Rice Combo bao gồm một phần cơm trắng (hoặc cơm chiên, tùy theo thực đơn) và một số miếng cánh gà BBQ được phủ sốt BBQ đậm đà. Món ăn này thích hợp cho những ai yêu thích sự kết hợp giữa thịt gà nướng và cơm, tạo nên bữa ăn đầy đủ và hấp dẫn.', 'Cánh gà BBQ, Cơm, Gia vị và sốt chấm', 'Có', '1.jpg'),
(22, 4, 'Bbq beef rice combo', 45000, 'BBQ Beef Rice Combo bao gồm các lát thịt bò nướng hoặc áp chảo, được phủ sốt BBQ đặc trưng, kết hợp với một phần cơm trắng (hoặc cơm chiên) để tạo nên một bữa ăn vừa đủ dinh dưỡng vừa đậm đà hương vị.', 'Thịt bò BBQ, Cơm, Gia vị và sốt chấm.', 'Có', '2.jpg'),
(23, 4, 'Cheesy beef rice combo', 45000, 'Cheesy Beef Rice Combo bao gồm miếng thịt bò được chế biến mềm mại, phủ lên một lớp phô mai tan chảy, kết hợp với cơm trắng hoặc cơm chiên, tạo nên một bữa ăn ngon miệng và đầy đủ dinh dưỡng. Phô mai tan chảy giúp làm tăng thêm độ béo và hấp dẫn cho món ăn.', 'Thịt bò, Phô mai,Cơm, Gia vị và sốt chấm', 'Có', '3.jpg'),
(24, 5, 'Gà cuộn rong biển 4pcs', 45000, 'Gà Cuộn Rong Biển 4pcs bao gồm bốn miếng gà cuộn với rong biển. Thịt gà được ướp gia vị vừa phải để giữ nguyên độ ngọt tự nhiên, sau đó được cuộn cùng rong biển tươi hoặc rong biển khô. Món ăn này có thể được chiên giòn hoặc nướng nhẹ, mang đến một lớp vỏ ngoài giòn rụm và phần thịt gà mềm mọng bên trong.', 'Thịt gà, Rong biển, Gia vị, Lớp vỏ ngoài', 'Có', '1.jpg'),
(25, 5, 'Cheese ring snack ', 35000, 'Cheese Ring Snack có hình dạng vòng tròn hoặc hình vòng, được làm từ bột và phô mai, thường được chiên giòn hoặc nướng để có được kết cấu giòn rụm. Phô mai tan chảy trong món snack này tạo ra hương vị thơm ngon và béo ngậy, phù hợp cho những ai thích thưởng thức món ăn vặt với vị phô mai đậm đà.', 'Bột mì hoặc bột ngô, Phô mai, Gia vị. ', 'Có', '2.jpg'),
(26, 5, 'American fries bacon', 59000, 'American Fries Bacon bao gồm các miếng khoai tây dày, thường được chiên giòn hoặc nướng cho đến khi bên ngoài giòn rụm, trong khi bên trong vẫn giữ được độ mềm. Khoai tây sẽ được kết hợp với các miếng thịt bacon chiên giòn, tạo nên sự hòa quyện tuyệt vời giữa khoai tây béo ngậy và hương vị mặn mà của bacon.', 'Khoai tây, Bacon, Gia vị', 'Có', '3.jpg'),
(27, 5, 'Cá cuộn rong biển', 25000, 'Cá Cuộn Rong Biển là món ăn đơn giản nhưng đầy sáng tạo, khi miếng cá được ướp gia vị nhẹ nhàng, sau đó cuộn lại với rong biển tươi hoặc rong biển khô. Món ăn này có thể được chế biến theo nhiều cách khác nhau, từ chiên giòn đến nướng, tùy thuộc vào sở thích và phong cách chế biến.', 'Cá, Rong biển, Gia vị, Bột chiên', 'Có', '4.jpg'),
(28, 5, 'Phô mai que', 25000, 'Phô Mai Que có hình dạng que dài hoặc hình vuông nhỏ, với phần phô mai bên trong mềm mịn và dễ tan chảy. Lớp vỏ ngoài giòn tan được làm từ bột chiên, tạo thành một sự kết hợp hoàn hảo giữa độ giòn của bột chiên và độ béo, mịn của phô mai.', 'Phô mai, Bột chiên giòn, Gia vị, Dầu chiên.', 'Có', '5.jpg'),
(29, 5, 'Khoai tây chiên', 29000, 'Khoai Tây Chiên có lớp vỏ ngoài giòn rụm, bên trong mềm mại và thơm ngọt tự nhiên của khoai tây. Khoai tây được chế biến đơn giản nhưng lại rất ngon miệng nhờ sự kết hợp của độ giòn và độ mềm, thường được ướp gia vị nhẹ để tăng thêm hương vị.', 'Khoai tây, Dầu chiên, Gia vị, Sốt chấm.', 'Có', '6.jpg'),
(30, 6, 'Dasani', 15000, 'Dasani ', 'Dasani ', 'Có', '1.jpg'),
(31, 6, 'Coca', 15000, 'Coca', 'Coca', 'Có', '2.jpg'),
(32, 6, 'Fanta', 15000, 'Fanta', 'Fanta', 'Có', '3.jpg'),
(33, 6, 'Sprite', 15000, 'Sprite', 'Sprite', 'Có', '4.jpg'),
(34, 6, 'Coke light', 27000, 'Coke light', 'Coke light', 'Có', '5.jpg');

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
('Chang', '1cc8609760ead5d8406b5a85e294c88c', 1, 1),
('Trang', 'd7d56e3c53034420b9a894f6b9919cd5', 2, 2),
('Hương', '202cb962ac59075b964b07152d234b70', 4, 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`Maban`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`Machitiethoadon`);

--
-- Chỉ mục cho bảng `monan`
--
ALTER TABLE `monan`
  ADD PRIMARY KEY (`Mamonan`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `ban`
--
ALTER TABLE `ban`
  MODIFY `Maban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `Machitiethoadon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `monan`
--
ALTER TABLE `monan`
  MODIFY `Mamonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
