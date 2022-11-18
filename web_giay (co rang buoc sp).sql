-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 14, 2022 lúc 08:13 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

USE web_giay;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_giay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `ma_don_hang` int(11) DEFAULT NULL,
  `id_giay` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `don_gia` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`ma_don_hang`, `id_giay`, `size`, `so_luong`, `don_gia`) VALUES
(1, 4, 39, 3, 900000),
(1, 8, 40, 2, 900000),
(6, 7, 39, 2, 900000),
(6, 12, 40, 1, 900000),
(10, 10, 40, 2, 900000),
(46, 3, 39, 1, 900000),
(47, 10, 41, 1, 900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `id_gio_hang` int(11) DEFAULT NULL,
  `id_giay` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `so_luong` int(30) DEFAULT NULL,
  `ngay_gio_them_vao_gio` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`id_gio_hang`, `id_giay`, `size`, `so_luong`, `ngay_gio_them_vao_gio`) VALUES
(1, 3, 39, 1, '2022-09-19 21:30:01'),
(1, 8, 40, 1, '2022-09-19 21:30:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_nhap_kho`
--

CREATE TABLE `chi_tiet_nhap_kho` (
  `ma_nhap_kho` int(11) DEFAULT NULL,
  `id_giay` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `so_luong_cua_size` int(30) DEFAULT NULL,
  `don_gia` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_nhap_kho`
--

INSERT INTO `chi_tiet_nhap_kho` (`ma_nhap_kho`, `id_giay`, `size`, `so_luong_cua_size`, `don_gia`) VALUES
(6, 3, 40, 3, 900000),
(6, 5, 39, 3, 900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_xuat_kho`
--

CREATE TABLE `chi_tiet_xuat_kho` (
  `ma_xuat_kho` int(11) DEFAULT NULL,
  `id_giay` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `so_luong_cua_size` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_don_hang` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tong_tien` int(50) DEFAULT NULL,
  `ngay_gio_thanh_toan` varchar(100) DEFAULT NULL,
  `tinh_trang` varchar(50) NOT NULL,
  `ten_nguoinhan` varchar(50) NOT NULL,
  `sdt_nguoinhan` varchar(50) NOT NULL,
  `diachi_giaohang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`ma_don_hang`, `user_id`, `tong_tien`, `ngay_gio_thanh_toan`, `tinh_trang`, `ten_nguoinhan`, `sdt_nguoinhan`, `diachi_giaohang`) VALUES
(1, 9, 4500000, '2022-09-13 13:41:47', 'Shipped', 'Hồng Quý Văn', '0923683724', '1506/4 vo van kiet'),
(6, 9, 2700000, '2022-09-15 21:42:53', 'Shipped', 'Hồng Quý Văn', '0909696182', 'sbdkjsaj'),
(10, 9, 1800000, '2022-09-16 17:20:15', 'Paid', 'sadasda', '0909696182', 'askldjsajd'),
(46, 9, 2700000, '', 'Processing', '', '', ''),
(47, 9, 900000, '', 'Processing', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giay`
--

CREATE TABLE `giay` (
  `id_giay` int(11) NOT NULL,
  `ma_nha_cung_cap` int(11) NOT NULL,
  `ten` varchar(150) DEFAULT NULL,
  `phan_loai` varchar(100) DEFAULT NULL,
  `don_gia` int(50) DEFAULT NULL,
  `hinh1` varchar(100) DEFAULT NULL,
  `hinh2` varchar(100) DEFAULT NULL,
  `hinh3` varchar(100) DEFAULT NULL,
  `mo_ta` varchar(300) DEFAULT NULL,
  `so_luong_ton_kho_ban` int(50) DEFAULT NULL,
  `so_luong_ton_kho_tong` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giay`
--

INSERT INTO `giay` (`id_giay`, `ma_nha_cung_cap`, `ten`, `phan_loai`, `don_gia`, `hinh1`, `hinh2`, `hinh3`, `mo_ta`, `so_luong_ton_kho_ban`, `so_luong_ton_kho_tong`) VALUES
(2, 1, 'Adidas Bravada', 'Thể thao', 600000, 'img/Adidas/bravada.jpg', 'img/Adidas/bravada2.jpg', 'img/Adidas/bravada3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(3, 1, 'Adidas Breaknet', 'Thể thao', 900000, 'img/adidas/breaknet.jpg', 'img/adidas/breaknet2.jpg', 'img/adidas/breaknet3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1003),
(4, 1, 'Adidas Grandcourt', 'Thể thao', 900000, 'img/adidas/grandcourt.jpg', 'img/adidas/grandcourt2.jpg', 'img/adidas/grandcourt3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(5, 1, 'Adidas Nizza', 'Thể thao', 900000, 'img/adidas/nizza.jpg', 'img/adidas/nizza2.jpg', 'img/adidas/nizza3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1003),
(6, 2, 'Puma Carson', 'Thể thao', 900000, 'img/puma/carson.jpg', 'img/puma/carson2.jpg', 'img/puma/carson3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(7, 2, 'Puma Ferrari', 'Thể thao', 900000, 'img/puma/ferrari.jpg', 'img/puma/ferrari2.jpg', 'img/puma/ferrari3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(8, 2, 'Puma Suede', 'Thể thao', 900000, 'img/puma/suede.jpg', 'img/puma/suede2.jpg', 'img/puma/suede3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(9, 2, 'Menenzo', 'Thể thao', 1500000, 'img/puma/menenzo.jpg', 'img/puma/menenzo2.jpg', 'img/puma/menenzo3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(10, 3, 'Nike Airforce', 'Thể thao', 900000, 'img/nike/airforce.jpg', 'img/nike/airforce2.jpg', 'img/nike/airforce3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(11, 3, 'Nike Jordan 1 Retro', 'Thể thao', 900000, 'img/nike/jordan1retro.jpg', 'img/nike/jordan1retro2.jpg', 'img/nike/jordan1retro3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(12, 3, 'Nike Jordan Orange', 'Thể thao', 900000, 'img/nike/jordanorange.jpg', 'img/nike/jordanorange2.jpg', 'img/nike/jordanorange3.jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(13, 3, 'Air Max 270', 'Thể thao', 1000000, 'img/nike/airmax270.jpg', 'img/nike/airmax270(2).jpg', 'img/nike/airmax270(3).jpg', 'Sản phẩm luôn thuộc vào một trong những thương hiệu thời trang hàng đầu được thiết kế vô cùng trẻ trung và năng động. Với kiểu dáng gọn gàng, màu sắc cá tính và kiểu dáng thanh thoát các dòng sản phẩm luôn giữ cho mình một sức hút riêng. Sự mạnh mẽ vốn có', 300, 1000),
(15, 2, 'sp1', 'Thể thao', 500000, 'img/Puma/20220720125831.png', 'img/Puma/20220720125831.png', 'img/Puma/20221012201841.png', 'sdsafasf', 0, 300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gio_hang` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`id_gio_hang`, `user_id`) VALUES
(1, 9),
(2, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kich_co`
--

CREATE TABLE `kich_co` (
  `id_giay` int(11) NOT NULL,
  `size` int(150) DEFAULT NULL,
  `so_luong_ton_kho_ban` int(50) DEFAULT NULL,
  `so_luong_ton_kho_tong` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kich_co`
--

INSERT INTO `kich_co` (`id_giay`, `size`, `so_luong_ton_kho_ban`, `so_luong_ton_kho_tong`) VALUES
(2, 39, 100, 300),
(2, 40, 100, 300),
(2, 41, 100, 400),
(3, 39, 100, 300),
(3, 40, 100, 303),
(3, 41, 100, 400),
(4, 39, 100, 300),
(4, 40, 100, 300),
(4, 41, 100, 400),
(5, 39, 100, 303),
(5, 40, 100, 300),
(5, 41, 100, 400),
(6, 39, 100, 300),
(6, 40, 100, 300),
(6, 41, 100, 400),
(7, 39, 100, 300),
(7, 40, 100, 300),
(7, 41, 100, 400),
(8, 39, 100, 300),
(8, 40, 100, 300),
(8, 41, 100, 400),
(9, 39, 100, 300),
(9, 40, 100, 300),
(9, 41, 100, 400),
(10, 39, 100, 300),
(10, 40, 100, 300),
(10, 41, 100, 400),
(11, 39, 100, 300),
(11, 40, 100, 300),
(11, 41, 100, 400),
(12, 39, 100, 300),
(12, 40, 100, 300),
(12, 41, 100, 400),
(13, 39, 100, 300),
(13, 40, 100, 300),
(13, 41, 100, 400),
(15, 34, 0, 100),
(15, 36, 0, 200);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhap_kho`
--

CREATE TABLE `nhap_kho` (
  `ma_nhap_kho` int(11) NOT NULL,
  `ma_nha_cung_cap` int(11) DEFAULT NULL,
  `ngay_gio_nhap_kho` varchar(100) DEFAULT NULL,
  `so_luong_hang_nhap` int(30) DEFAULT NULL,
  `tong_tien_nhap_kho` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nhap_kho`
--

INSERT INTO `nhap_kho` (`ma_nhap_kho`, `ma_nha_cung_cap`, `ngay_gio_nhap_kho`, `so_luong_hang_nhap`, `tong_tien_nhap_kho`) VALUES
(6, 1, '2022-10-07 17:39:32', 6, 5400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `ma_nha_cung_cap` int(11) NOT NULL,
  `ten_nha_cung_cap` varchar(150) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`ma_nha_cung_cap`, `ten_nha_cung_cap`, `dia_chi`, `sdt`) VALUES
(1, 'Adidas', '65 abcxyz defgh', '8398129'),
(2, 'Puma', '66 abcxyz defgh', '8398129'),
(3, 'Nike', '67 abcxyz defgh', '8398129');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `sdt` varchar(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `email`, `pass`, `sdt`, `role`) VALUES
(9, 'qjuatx1#@gmail.com', '746459#408801#', '746459#7776#', 'guest'),
(10, 'qjuatx32#@gmail.com', '746459#7776#', '49683#1962333#', 'guest'),
(11, 'gvout@gmail.com', '746459#7776#', '49683#1962333#', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xuat_kho`
--

CREATE TABLE `xuat_kho` (
  `ma_xuat_kho` int(11) NOT NULL,
  `so_luong_xuat_kho` int(30) DEFAULT NULL,
  `ngay_gio_xuat_kho` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD KEY `ma_don_hang` (`ma_don_hang`),
  ADD KEY `id_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD KEY `id_gio_hang` (`id_gio_hang`,`id_giay`),
  ADD KEY `id_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD KEY `ma_nhap_kho` (`ma_nhap_kho`),
  ADD KEY `id_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `chi_tiet_xuat_kho`
--
ALTER TABLE `chi_tiet_xuat_kho`
  ADD KEY `ma_xuat_kho` (`ma_xuat_kho`),
  ADD KEY `id_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_don_hang`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `giay`
--
ALTER TABLE `giay`
  ADD PRIMARY KEY (`id_giay`),
  ADD KEY `ma_nha_cung_cap` (`ma_nha_cung_cap`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gio_hang`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  ADD KEY `id_giay` (`id_giay`);

--
-- Chỉ mục cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD PRIMARY KEY (`ma_nhap_kho`),
  ADD KEY `ma_nha_cung_cap` (`ma_nha_cung_cap`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`ma_nha_cung_cap`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `xuat_kho`
--
ALTER TABLE `xuat_kho`
  ADD PRIMARY KEY (`ma_xuat_kho`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `ma_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `giay`
--
ALTER TABLE `giay`
  MODIFY `id_giay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  MODIFY `ma_nhap_kho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `ma_nha_cung_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `xuat_kho`
--
ALTER TABLE `xuat_kho`
  MODIFY `ma_xuat_kho` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_1` FOREIGN KEY (`ma_don_hang`) REFERENCES `don_hang` (`ma_don_hang`),
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id_giay`);

--
-- Các ràng buộc cho bảng `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_1` FOREIGN KEY (`id_gio_hang`) REFERENCES `gio_hang` (`id_gio_hang`),
  ADD CONSTRAINT `chi_tiet_gio_hang_ibfk_2` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id_giay`);

--
-- Các ràng buộc cho bảng `chi_tiet_nhap_kho`
--
ALTER TABLE `chi_tiet_nhap_kho`
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_1` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id_giay`),
  ADD CONSTRAINT `chi_tiet_nhap_kho_ibfk_2` FOREIGN KEY (`ma_nhap_kho`) REFERENCES `nhap_kho` (`ma_nhap_kho`);

--
-- Các ràng buộc cho bảng `chi_tiet_xuat_kho`
--
ALTER TABLE `chi_tiet_xuat_kho`
  ADD CONSTRAINT `chi_tiet_xuat_kho_ibfk_1` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id_giay`),
  ADD CONSTRAINT `chi_tiet_xuat_kho_ibfk_2` FOREIGN KEY (`ma_xuat_kho`) REFERENCES `xuat_kho` (`ma_xuat_kho`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `giay`
--
ALTER TABLE `giay`
  ADD CONSTRAINT `giay_ibfk_1` FOREIGN KEY (`ma_nha_cung_cap`) REFERENCES `nha_cung_cap` (`ma_nha_cung_cap`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `kich_co`
--
ALTER TABLE `kich_co`
  ADD CONSTRAINT `kich_co_ibfk_1` FOREIGN KEY (`id_giay`) REFERENCES `giay` (`id_giay`);

--
-- Các ràng buộc cho bảng `nhap_kho`
--
ALTER TABLE `nhap_kho`
  ADD CONSTRAINT `nhap_kho_ibfk_1` FOREIGN KEY (`ma_nha_cung_cap`) REFERENCES `nha_cung_cap` (`ma_nha_cung_cap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
