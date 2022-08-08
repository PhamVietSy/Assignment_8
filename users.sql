-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2022 lúc 05:10 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `users`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(100) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `total` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_customer`, `name`, `phone`, `address`, `ngay`, `total`) VALUES
(1, 2, 'say', 986597181, 'ha niu', '2022-07-25', 5600000),
(2, 2, 'Phajm Viet Sy', 383041156, 'Da NAng', '2022-07-25', 24000000),
(3, 1, 'say', 383041156, 'helo', '2022-07-25', 600000),
(4, 1, 'say', 986597181, 'ha niu', '2022-07-26', 600000),
(5, 1, 'say', 986597181, 'ha niu', '2022-07-26', 5000000),
(6, 1, 'Phajm Viet Sy', 383041156, 'VN', '2022-07-26', 10000000),
(7, 1, 'Phajm Viet Sy', 383041156, 'NGu hanh sơn', '2022-07-28', 55000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id_product` int(11) NOT NULL,
  `qualitys` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id_product`, `qualitys`, `id`, `id_bill`) VALUES
(2, 1, 1, 1),
(3, 1, 2, 1),
(4, 1, 3, 2),
(5, 1, 4, 2),
(8, 1, 5, 2),
(3, 1, 6, 3),
(3, 1, 7, 4),
(4, 1, 8, 5),
(6, 1, 9, 6),
(2, 11, 10, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'nokia'),
(2, 'iphone'),
(3, 'xaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `id_customer`, `id_product`, `date`, `content`, `rating`) VALUES
(9, 1, 2, '2022-07-13', 'ok', 0),
(10, 2, 2, '2022-07-13', 'ok', 0),
(11, 2, 3, '2022-07-15', 'Cũng oke á', 0),
(12, 2, 9, '2022-07-19', 'Hết hàng r', 0),
(13, 2, 9, '2022-07-19', 'Hết hàng r', 0),
(14, 2, 9, '2022-07-19', 'Hết hàng r', 0),
(15, 2, 0, '2022-07-19', 'ok nha', 0),
(16, 2, 0, '2022-07-19', '', 0),
(17, 2, 5, '2022-07-19', 'Ok nha', 0),
(20, 2, 4, '2022-07-25', 'ok  chưa', 0),
(21, 2, 4, '2022-07-25', 'ok  chưa', 0),
(22, 2, 3, '2022-07-25', 'ok mà', 0),
(23, 2, 3, '2022-07-25', 'ok mà', 0),
(24, 2, 3, '2022-07-25', 'ok chưa', 0),
(25, 2, 3, '2022-07-25', 'ok chưa', 0),
(26, 2, 3, '2022-07-25', 'ok chưa', 0),
(27, 2, 3, '2022-07-25', 'ok chưa', 0),
(28, 1, 7, '2022-07-25', 'ok', 0),
(29, 1, 7, '2022-07-25', 'ok', 0),
(30, 3, 0, '2022-07-28', 'ok', 0),
(31, 3, 2, '2022-07-28', 'RẤt tốt', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id_cus` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(11) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id_cus`, `username`, `email`, `password`, `fullname`, `token`, `verified`, `role`) VALUES
(1, 'phamvietsy', '', '200100pvs', 'Phạm Việt Sỹ', '', 1, 1),
(2, 'phamvietsy2000', '', '200100pvs', 'Pham Việt Trung', '', 0, 0),
(3, 'levanquy', '', '200100pvs', 'Lê Văn Quý', '', 0, 0),
(7, 'phamvietsy111', 'phamvietsy200100@gmail.com', '$2y$10$fi3xT229UKFKdTqHB2NPouqDhwSZgDgM3bVDKZu6/uC0f8lo624nO', 'Phạm Việt Sỹ', '99202fac15be85002806', 1, 0),
(11, 'phamvietsyyyy', 'phamvietsy2000@gmail.com', '$2y$10$27.xQLLL3wHD7Jt9vyDG0.DJfscAK9ngHWS07kPtQZAy0bb80mt/a', 'Nguyen Tan Du', '5240f0d5d2e6b9917376', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(100) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(100) NOT NULL,
  `quality` int(100) NOT NULL,
  `description` varchar(2550) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `image`, `price`, `quality`, `description`, `brand_id`) VALUES
(2, 'Xaomi note 9', 'xaomi9pro.jpg', 5000000, 95, 'Under the hood, the Mi 9T Pro is powered by a Snapdragon 855 SoC alongside 6GB/ 8GB of RAM and 64GB/ 128GB/ 256GB internal storage space in its memory compartment. Moving to its camera, it comes equipped with a triple-camera setup on its rear chassis which comprises of a 48MP (f/1.8 aperture) main snapper, 8MP (f/2.4) telephoto sensor, as well as a 13MP (f/2.4 aperture) ultrawide sensor. On the front of the device, there is also a motorize pop-up camera that houses a 20MP (f/2.2 aperture) sensor.', 3),
(3, 'IPHONE 13 PRO', 'iphone12pro.jpg', 600000, 41, 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng', 2),
(4, 'Xaomi Mi T9 Pro', 'xaomi9pro.jpg', 5000000, 37, 'Ok', 1),
(5, 'iphone 5c', 'iphone5c.jpg', 12000000, 47, 'Under the hood, the Mi 9T Pro is powered by a Snapdragon 855 SoC alongside 6GB/ 8GB of RAM and 64GB/ 128GB/ 256GB internal storage space in its memory compartment. Moving to its camera, it comes equipped with a triple-camera setup on its rear chassis which comprises of a 48MP (f/1.8 aperture) main snapper, 8MP (f/2.4) telephoto sensor, as well as a 13MP (f/2.4 aperture) ultrawide sensor. On the front of the device, there is also a motorize pop-up camera that houses a 20MP (f/2.2 aperture) sensor.', 2),
(6, 'Iphone X', 'iphonex.jpg', 10000000, 59, 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng', 2),
(7, 'ReDMI 5', 'redmi5.jpg', 8000000, 60, 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng', 1),
(8, 'Xaomi note 9', 'xaomiredmi.jpg', 7000000, 58, 'Under the hood, the Mi 9T Pro is powered by a Snapdragon 855 SoC alongside 6GB/ 8GB of RAM and 64GB/ 128GB/ 256GB internal storage space in its memory compartment. Moving to its camera, it comes equipped with a triple-camera setup on its rear chassis which comprises of a 48MP (f/1.8 aperture) main snapper, 8MP (f/2.4) telephoto sensor, as well as a 13MP (f/2.4 aperture) ultrawide sensor. On the front of the device, there is also a motorize pop-up camera that houses a 20MP (f/2.2 aperture) sensor.', 3),
(9, 'IPHONE 13 PRO', 'iphone12pro.jpg', 20000000, 0, 'iPhone 12 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_cus`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id_cus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_cus`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id_cus`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
