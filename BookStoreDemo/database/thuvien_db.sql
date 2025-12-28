-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 02:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thuvien_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `available` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `book_cover` varchar(255) DEFAULT NULL,
  `descri` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publisher`, `available`, `price`, `book_cover`, `descri`) VALUES
(1, '    Cơ sở đo ảnh và viễn thám', 'PGS.TS Nguyễn Văn Trung và nnk', 'Nhà xuất bản giao thông vận tải', 7, 30000, '..\\img\\Co-so-vien-tham-scaled.jpg', ' giáo trình'),
(2, ' Nhà Giả Kim', 'Paulo Coelho', 'Nhà xuất bản Hội Nhà Văn', 17, 15000, '..\\img\\Nha-Gia-Kim-–-Cuon-sach-nho-ve-hanh-trinh-tim-kho-bau-lon-trong-moi-nguoi.jpg', ' Sách bỏ túi'),
(3, 'Đắc Nhân Tâm', 'Dale Carnegie', 'Nhà xuất bản Tổng hợp TP.HCM', 8, 30000, '..\\img\\1123-1493801476304-1400x875.jpg', 'Sách bỏ túi'),
(4, 'Tư Duy Nhanh và Chậm', 'Daniel Kahneman', 'Nhà xuất bản Thế Giới', 0, 56000, '..\\img\\1719799238_12665.jpg', 'Sách bỏ túi'),
(5, 'Suối Nguồn', 'Ayn Rand', 'Nhà xuất bản Lao Động', 17, 36000, '..\\img\\45877ae2-9331-11e7-b88f-cac091044fd5.jpg', 'Sách bỏ túi'),
(6, 'Bí Mật của May Mắn', 'Álex Rovira và Fernando Trias de Bes', 'Nhà xuất bản Trẻ', 58, 99000, '..\\img\\sach-bi-mat-cua-may-man-0.jpg', 'Sách bỏ túi'),
(7, '7 Thói Quen Của Người Thành Đạt', 'Stephen Covey', 'Nhà xuất bản Trẻ', 33, 110000, '..\\img\\20240510_XRhOWnG0fz.png', 'Sách bỏ túi'),
(8, 'Cha Giàu Cha Nghèo', 'Robert Kiyosaki', 'Nhà xuất bản Lao Động', 68, 54000, '..\\img\\review-cha-giau-cha-ngheo.jpg', 'Sách bỏ túi'),
(9, 'Quẳng Gánh Lo Đi Và Vui Sống', 'Dale Carnegie', 'Nhà xuất bản Tổng hợp TP.HCM', 40, 45000, '..\\img\\189789-combo-dac-nhan-tam-quang-ganh-lo-di-va-vui-song.jpg', 'Sách bỏ túi'),
(10, 'Sapiens: Lược Sử Loài Người', 'Yuval Noah Harari', 'Nhà xuất bản Thế Giới', 24, 162000, '..\\img\\sapiens-luoc-su-ve-loai-nguoi-outline-5-7-2017-02.jpg', 'Sách bỏ túi'),
(11, '21 Bài Học Cho Thế Kỷ 21', 'Yuval Noah Harari', 'Nhà xuất bản Thế Giới', 19, 78000, '..\\img\\21-bai-hoc-cho-the-ky-21.jpg', 'Sách bỏ túi'),
(12, 'Vũ Trụ Trong Vỏ Hạt Dẻ', 'Stephen Hawking', 'Nhà xuất bản Khoa Học và Kỹ Thuật', 11, 82000, '..\\img\\e872925e3ceb4f60b4ef32a72f2f1266.jpg', 'Sách bỏ túi'),
(13, 'Truyện Kiều', 'Nguyễn Du', 'Nhà xuất bản Văn Học', 79, 37000, '..\\img\\bia_900x900_dbb77079df0641a5a3c1e4a8064fa6ab.jpg', 'Sách bỏ túi'),
(14, 'Số Đỏ', 'Vũ Trọng Phụng', 'Nhà xuất bản Văn Học', 54, 68000, '..\\img\\images.jpg', 'Sách bỏ túi'),
(15, 'Dế Mèn Phiêu Lưu Ký', 'Tô Hoài', 'Nhà xuất bản Kim Đồng', 90, 24000, '..\\img\\ebook-de-men-phieu-luu-ky-prc-pdf-epub.jpg', 'Sách bỏ túi'),
(16, 'Không Gia Đình', 'Hector Malot', 'Nhà xuất bản Văn Học', 29, 156000, '..\\img\\z5768061127935_ffce9e0948bdc6f7a0260d5debfde0ac_5e83f9e368254a02b99ba5f0a25bebb8.jpg', 'Sách bỏ túi'),
(17, 'Tôi Tài Giỏi, Bạn Cũng Thế!', 'Adam Khoo', 'Nhà xuất bản Phụ Nữ', 64, 71000, '..\\img\\120301001_1021805301601898_532285788657143800_n(1).jpg', 'Sách bỏ túi'),
(18, 'Trên Đường Băng', 'Tony Buổi Sáng', 'Nhà xuất bản Trẻ', 52, 87000, '..\\img\\Picture1(8).jpg', 'Sách bỏ túi'),
(19, 'Tuổi Trẻ Đáng Giá Bao Nhiêu', 'Rosie Nguyễn', 'Nhà xuất bản Hội Nhà Văn', 48, 20000, '..\\img\\tuoi-tre-dang-gia-bao-nhieu-1.png', 'Sách bỏ túi'),
(20, 'Muôn Kiếp Nhân Sinh', 'Nguyên Phong', 'Nhà xuất bản Tổng hợp TP.HCM', 33, 50000, '..\\img\\z4394149798431_248dfd9f499d14696f2b9ebf42bb0883.jpg', '\"Muôn Kiếp Nhân Sinh\" là một tác phẩm nổi bật về tâm linh của tác giả Nguyên Phong, khám phá các quy luật nhân quả và luân hồi qua những trải nghiệm tiền kiếp của nhân vật Thomas.'),
(101, 'Hành trình về phương đông', NULL, NULL, 24, 91000, '../img/hanhtrinhphuongdong.jpg', '\"Hành trình về phương Đông\" là một tác phẩm nổi tiếng của Baird T. Spalding, kể về những trải nghiệm của một đoàn khoa học từ Anh Quốc trong hành trình khám phá tri thức và huyền bí của văn hóa Ấn Độ.'),
(111, 'RS', NULL, NULL, 19, 100000, '../img/R.gif', 'Remote Sensing'),
(200, 'Bản sắc văn hóa Việt Nam', NULL, NULL, 9, 30000, '../img/vanhoa.jpg', 'bản sắc văn hóa Việt Nam...');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_name` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(255) NOT NULL,
  `orderdate` datetime NOT NULL,
  `rcdate` datetime DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` enum('Đang gói hàng','Đang vận chuyển','Đã nhận','') NOT NULL,
  `address` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `item_id` int(255) NOT NULL,
  `order_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `purchase_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `phone_number`, `email`, `username`, `password`) VALUES
(123, 'Lê Văn Cường', '0983334455', 'cuong.le@email.com', 'cuong.le', '5678'),
(124, 'Phạm Thị Dung', '0354445566', 'dung.pham@email.com', 'dung.pham', 'pass123'),
(125, 'Hoàng Văn Em', '0775556677', 'em.hoang@email.com', 'em.hoang', 'pass123'),
(126, 'Mai Thị Giang', '0906667788', 'giang.mai@email.com', 'giang.mai', 'pass123'),
(127, 'Đỗ Văn Hải', '0917778899', 'hai.do@email.com', 'hai.do', 'pass123'),
(128, 'Nguyễn Thị Hạnh', '0988889900', 'hanh.nguyen@email.com', 'hanh.nguyen', 'pass123'),
(129, 'Trần Văn Khang', '0359990011', 'khang.tran@email.com', 'khang.tran', 'pass123'),
(130, 'Lê Thị Lan', '0771011213', 'lan.le@email.com', 'lan.le', 'pass123'),
(131, 'Phạm Văn Minh', '0902123456', 'minh.pham@email.com', 'minh.pham', 'pass123'),
(132, 'Hoàng Thị Nga', '0913456789', 'nga.hoang@email.com', 'nga.hoang', 'pass123'),
(133, 'Mai Văn Phát', '0984567890', 'phat.mai@email.com', 'phat.mai', 'pass123'),
(134, 'Đỗ Thị Quyên', '0355678901', 'quyen.do@email.com', 'quyen.do', 'pass123'),
(135, 'Nguyễn Văn Sơn', '0776789012', 'son.nguyen@email.com', 'son.nguyen', 'pass123'),
(136, 'Trần Thị Thúy', '0907890123', 'thuy.tran@email.com', 'thuy.tran', 'pass123'),
(137, 'Lê Văn Trung', '0918901234', 'trung.le@email.com', 'trung.le', 'pass123'),
(138, 'Phạm Thị Vân', '0989012345', 'van.pham@email.com', 'van.pham', 'pass123'),
(139, 'Hoàng Văn Việt', '0350123456', 'viet.hoang@email.com', 'viet.hoang', 'pass123'),
(140, 'Đỗ Thị Xinh', '0771234567', 'xinh.do@email.com', 'xinh.do', 'pass123'),
(141, 'Nguyen', '0387537249', 'hienng.wk00@gmail.com', 'hiennguyen ', '123456'),
(142, 'baitap', '0365489645', 'baitap@gmail.com', 'baitap', 'baitaplon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_name`,`book_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
