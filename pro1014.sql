-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2024 at 05:44 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro1014`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `AccountID` int NOT NULL,
  `Username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PasswordHash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT './uploads/personal-icon-1.jpg',
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FullName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` text COLLATE utf8mb4_unicode_ci,
  `RoleID` int DEFAULT '2',
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `Username`, `PasswordHash`, `Avatar`, `Email`, `Phone`, `FullName`, `Address`, `RoleID`, `CreatedAt`) VALUES
(1, 'nvg0215', '$2y$10$7Qdk1f.nbz4ILoBFpSOEvOsD/I3OlDiuu/FFEc7pFZFcY2WBQDnjO', 'https://icon-library.com/images/personal-icon/personal-icon-1.jpg', 'vangiap021@gmail.com', '0867963647', 'Giáp Nguyễn Văn Hi', '123 Đường ABC, Hà Nội', 2, '2024-11-23 23:11:59'),
(2, 'NVG', '$2y$10$JU5COCjXbJ/zKPb0xhx7d.D5j9LgJw/tSFH/G6obP2bNPy.CBy0hS', 'https://icon-library.com/images/personal-icon/personal-icon-1.jpg', 'nguyenvangiap215@gmail.com', '113', 'Nguyễn Văn Giáp', NULL, 1, '2024-11-23 23:11:59'),
(3, 'nvghelo1', '$2y$10$FoBVV9kXBvBdNfH1v7zTz.Z.4WMGDkPZ9Olom5wDfkJ8wmygXqID.', 'https://icon-library.com/images/personal-icon/personal-icon-1.jpg', 'nguyenvangiap2005.giaothuy@gmail.com', '0901234567', 'Nguyễn Văn Giáp1222222', NULL, 1, '2024-11-24 18:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int NOT NULL,
  `ProductID` int NOT NULL,
  `SRC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `ProductID`, `SRC`) VALUES
(30, 21, './uploads/1732869546samsung-galaxy-s24-ultra-xam-titan.jpg.webp'),
(31, 21, './uploads/1732869546samsung-galaxy-s24-ultra-xanh-luc-titan.jpg.webp'),
(32, 22, './uploads/1732869680xiaomi-13-pro-sac-120w-den.png.webp'),
(33, 22, './uploads/1732869680xiaomi-13-pro-sac-120w-trang.png.webp'),
(34, 23, './uploads/1732869794xiaomi-14-ultra-den.jpg.webp'),
(35, 23, './uploads/1732869794xiaomi-14-ultra-xanh-duong.jpg.webp'),
(37, 21, './uploads/1732869911samsung-galaxy-s24-ultra-cam-titan.jpg.webp'),
(38, 21, './uploads/1732869927samsung-galaxy-s24-ultra-den-titan.jpg.webp'),
(40, 24, './uploads/1732870675vivo-x200-pro-mini-xanh-la.jpg.webp'),
(41, 20, './uploads/1732872781iphone-16-xanh-mong-ket.jpg.webp'),
(42, 19, './uploads/1732872794iphone-13-pro-xanh.jpg.webp'),
(43, 24, './uploads/1732872825vivo-x200-pro-mini-hong.jpg.webp'),
(44, 25, './uploads/1732872840sony-xperia-5-iii-5-mark-3-5g-pin-4500-mah-green.jpg.webp'),
(45, 26, './uploads/1732872851oppo-find-n3-vang.jpg.webp'),
(47, 27, './uploads/1732872878rog-phone-9-pro-dai-dien.jpg.webp'),
(48, 28, './uploads/1732872887asus-rog-phone-7-ultimate-trang.jpg.webp'),
(49, 29, './uploads/1732872897nubia-red-magic-9-pro-bumblebee-transformers-edition.jpg.webp'),
(50, 30, './uploads/1732872907tesla-pi-phone-ro-ri-02.jpg.webp');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `BrandID` int NOT NULL,
  `BrandName` varchar(100) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`BrandID`, `BrandName`, `Country`) VALUES
(1, 'Apple', 'USA'),
(2, 'Samsung', 'South Korea'),
(3, 'Xiaomi', 'China');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `CartDetailID` int NOT NULL,
  `CartID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cartdetails`
--

INSERT INTO `cartdetails` (`CartDetailID`, `CartID`, `ProductID`, `Quantity`) VALUES
(4, 1, 19, 8),
(5, 1, 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int NOT NULL,
  `AccountID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartID`, `AccountID`) VALUES
(4, NULL),
(5, NULL),
(6, NULL),
(7, NULL),
(8, NULL),
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `Description`) VALUES
(1, 'Smartphones', NULL),
(2, 'Tablets', NULL),
(3, 'Smartwatches', NULL),
(4, 'Power Banks', NULL),
(5, 'Other Gadgets', 'Edit'),
(30, 'Hello ', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int NOT NULL,
  `ProductID` int NOT NULL,
  `AccountID` int NOT NULL,
  `Content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `CommentDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('approved','hide') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'approved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `ProductID`, `AccountID`, `Content`, `CommentDate`, `Status`) VALUES
(2, 20, 1, 'Aliquam fringilla euismod risus ac bibendum. Sed sit amet sem varius ante feugiat lacinia. Nunc ipsum nulla, vulputate ut venenatis vitae, malesuada ut mi. Quisque iaculis, dui congue placerat pretium, augue erat accumsan lacus', '2024-11-27 17:18:51', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `RegistrationDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CustomerID`, `FullName`, `Address`, `Phone`, `Email`, `RegistrationDate`) VALUES
(1, 'Nguyễn Văn A', '123 Đường ABC, Hà Nội', '0123456789', 'vana@example.com', '2023-01-10'),
(2, 'Trần Thị B', '456 Đường XYZ, TP HCM', '0987654321', 'thib@example.com', '2023-02-15'),
(3, 'Lê Văn C', '789 Đường QRS, Đà Nẵng', '0912345678', 'vanc@example.com', '2023-03-20');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderDetailID` int NOT NULL,
  `OrderID` int DEFAULT NULL,
  `ProductID` int DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `PriceAtOrder` decimal(10,2) DEFAULT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderDetailID`, `OrderID`, `ProductID`, `Quantity`, `PriceAtOrder`, `TotalPrice`) VALUES
(3, 3, 19, 3, '30.00', '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int NOT NULL,
  `OrderCode` varchar(255) DEFAULT NULL,
  `AccountID` int DEFAULT NULL,
  `payment_method_id` int DEFAULT NULL,
  `order_status_id` int DEFAULT NULL,
  `RecipientName` varchar(100) DEFAULT NULL,
  `RecipientEmail` varchar(100) DEFAULT NULL,
  `RecipientPhone` varchar(15) DEFAULT NULL,
  `RecipientAddress` varchar(255) DEFAULT NULL,
  `Note` text,
  `CustomerID` int DEFAULT NULL,
  `OrderDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `TotalAmount` varchar(255) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderCode`, `AccountID`, `payment_method_id`, `order_status_id`, `RecipientName`, `RecipientEmail`, `RecipientPhone`, `RecipientAddress`, `Note`, `CustomerID`, `OrderDate`, `TotalAmount`, `Status`) VALUES
(1, 'DH-GNV', 1, 1, 2, 'Giáp Nguyễn Văn Edit 2', 'vangiap021@gmail.com', '113', '13 Trịnh Văn Bô - Hà Nội', '2 cái Iphone15 ném chó', 1, '2023-10-01 00:00:00', '20000000.00', NULL),
(2, 'DH-NVG', 2, 2, 8, 'Nguyễn Văn Giáp', NULL, '0867963647', 'Đâu cũng được', 'Không có gì', 2, '2023-10-05 00:00:00', '22000000.00', NULL),
(3, 'DH-003', 1, 2, 4, 'NVG', NULL, '113', NULL, 'Không', 3, '2023-10-07 00:00:00', '15000000.00', 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `ID` int NOT NULL,
  `StatusName` varchar(50) NOT NULL,
  `Description` text,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`ID`, `StatusName`, `Description`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'Chưa xác nhận', '', '2024-11-23 23:02:51', '2024-11-23 23:05:07'),
(2, 'Đã xác nhận', '', '2024-11-23 23:02:51', '2024-11-23 23:05:19'),
(3, 'Chưa thanh toán', NULL, '2024-11-23 23:05:56', '2024-11-23 23:05:56'),
(4, 'Đã thanh toán', NULL, '2024-11-23 23:05:56', '2024-11-23 23:05:56'),
(5, 'Đang chuẩn bị hàng', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24'),
(6, 'Đang giao', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24'),
(7, 'Đã giao', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24'),
(8, 'Hoàn hàng', NULL, '2024-11-23 23:07:24', '2024-11-26 01:02:48'),
(9, 'Hủy đơn', NULL, '2024-11-23 23:07:24', '2024-11-26 01:02:54'),
(10, 'Hoàn thành', NULL, '2024-11-23 23:07:24', '2024-11-26 01:02:36');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `ID` int NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` text,
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`ID`, `Name`, `Description`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'COD', 'Thanh toán khi nhận hàng', '2024-11-23 22:54:00', '2024-11-23 23:03:58'),
(2, 'Chuyển khoản ngân hàng', 'QR Code', '2024-11-23 22:54:00', '2024-11-23 23:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ProductID` int NOT NULL,
  `ProductName` varchar(100) DEFAULT NULL,
  `Image` text,
  `Description` text,
  `Price` decimal(10,2) DEFAULT NULL,
  `StockQuantity` int DEFAULT NULL,
  `BrandID` int DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Storage` varchar(50) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `CategoryID` int DEFAULT NULL,
  `SKU` varchar(50) DEFAULT NULL,
  `CommentID` int DEFAULT NULL,
  `CreateAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Image`, `Description`, `Price`, `StockQuantity`, `BrandID`, `Color`, `Storage`, `Size`, `CategoryID`, `SKU`, `CommentID`, `CreateAt`) VALUES
(19, 'Điện thoại iPhone 13 Pro Chính hãng VN/A', './uploads/1732870280iphone-13-pro-xanh.jpg.webp', 'Điện thoại iPhone 13 Pro Chính hãng VN/A (128GB, 256GB, 512GB)', '26950000.00', 30, NULL, 'Xanh', '128GB', '6.1 inches', 1, 'Xanh-128-6.1', NULL, '2024-11-11 15:47:00'),
(20, 'Điện thoại iPhone 16 Chính hãng', './uploads/1732870404iphone-16-xanh-mong-ket.jpg.webp', 'Điện thoại iPhone 16 Chính hãng VN/A', '22999000.00', 2, 2, 'Xanh', '256GB', '6.1 inches', 1, 'Xanh-256-6.1', NULL, '2024-11-27 15:47:00'),
(21, 'Điện thoại Samsung Galaxy S24 Ultra Chính hãng AI', './uploads/1732869546samsung-galaxy-s24-ultra-xam-titan.jpg.webp', 'Điện thoại Samsung Galaxy S24 Ultra Chính hãng AI (Snapdragon 8 Gen 3)', '23450000.00', 50, NULL, 'Gray', '256GB', '6.8 inches', 1, 'Gray-256-6.8', NULL, '2024-11-29 15:39:06'),
(22, 'Điện thoại Xiaomi 13 Pro', './uploads/1732869680xiaomi-13-pro-sac-120w-trang.png.webp', 'Điện thoại Xiaomi 13 Pro', '12950000.00', 30, NULL, 'White', '128GB', '6.73 inches', 1, 'White-128-6.73', NULL, '2024-11-29 15:41:20'),
(23, 'Điện thoại Xiaomi 14 Ultra 5G (Camera khủng)', './uploads/1732869794xiaomi-14-ultra-den.jpg.webp', 'Điện thoại Xiaomi 14 Ultra 5G (Snapdragon 8 Gen 3 - Camera khủng)', '23950000.00', 20, NULL, 'Black', '256GB', '6.73 inches', 1, 'Black-256-6.73', NULL, '2024-11-29 15:43:14'),
(24, 'Điện thoại Vivo X200 Pro Mini', './uploads/1732870675vivo-x200-pro-mini-xanh-la.jpg.webp', 'Điện thoại Vivo X200 Pro Mini', '16450000.00', 10, NULL, 'Green', '256GB', '6.31 inches', 1, 'Green-256-6.31', NULL, '2024-11-29 15:57:55'),
(25, 'Điện thoại Sony Xperia 5 III (5 Mark 3) 5G', './uploads/1732872072sony-xperia-5-iii-5-mark-3-5g-pin-4500-mah-green.jpg.webp', 'Điện thoại Sony Xperia 5 III (5 Mark 3) 5G (Snapdragon 888, 99.9%)', '7950000.00', 79, NULL, 'Green', '128GB', '6.1 inches', 1, 'Green-128-6.1', NULL, '2024-11-29 16:21:12'),
(26, 'Điện thoại Oppo Find N3 5G', './uploads/1732872174oppo-find-n3-vang.jpg.webp', 'Điện thoại Oppo Find N3 5G (Snapdragon 8 Gen 2)', '33650000.00', 5, NULL, 'Yellow', '512GB', '7.82 inches', 1, 'Yellow-512-7.82', NULL, '2024-11-29 16:22:54'),
(27, 'Điện thoại Asus ROG Phone 9 Pro (Snapdragon 8 Elite)', './uploads/1732872391rog-phone-9-pro-dai-dien.jpg.webp', 'Điện thoại Asus ROG Phone 9 Pro (Snapdragon 8 Elite)', '27950000.00', 15, NULL, 'Black', '512GB', '6.78 inches', 1, 'Black-512-6.78', NULL, '2024-11-29 16:26:31'),
(28, 'Điện thoại Asus ROG Phone 7 Ultimate', './uploads/1732872447asus-rog-phone-7-ultimate-trang.jpg.webp', 'Điện thoại Asus ROG Phone 7 Ultimate', '31550000.00', 31, NULL, 'White', '512GB', '6.78 inches', 1, 'White-512-6.78', NULL, '2024-11-29 16:27:27'),
(29, 'Điện thoại Nubia Red Magic 9 Pro Plus Bumblebee Transformers Edition', './uploads/1732872550nubia-red-magic-9-pro-bumblebee-transformers-edition.jpg.webp', 'Điện thoại Nubia Red Magic 9 Pro Plus Bumblebee Transformers Edition', '22790000.00', 22, NULL, 'Yellow', '512GB', '6.8 inches', 1, 'Yellow-512-6.8', NULL, '2024-11-29 16:29:10'),
(30, 'Điện thoại Tesla Pi Phone', './uploads/1732872622tesla-pi-phone-ro-ri-02.jpg.webp', 'Điện thoại Tesla Pi Phone', '29950000.00', 30, NULL, 'Gray', '128GB', '6.7 inches', 1, 'Gray-128-6.7', NULL, '2024-11-29 16:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `RoleID` int NOT NULL,
  `RoleName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Moderator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`AccountID`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_accounts_roles` (`RoleID`);

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `albums_products` (`ProductID`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`BrandID`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`CartDetailID`),
  ADD KEY `CartID` (`CartID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `carts_accounts` (`AccountID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderDetailID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `order_account_fk` (`AccountID`),
  ADD KEY `fk_orders_payment_methods` (`payment_method_id`),
  ADD KEY `fk_orders_order_statuses` (`order_status_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `BrandID` (`BrandID`),
  ADD KEY `products_cmt` (`CommentID`),
  ADD KEY `products_categories` (`CategoryID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `AccountID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `CartDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `fk_accounts_roles` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `albums_products` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `cartdetails_ibfk_1` FOREIGN KEY (`CartID`) REFERENCES `carts` (`CartID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cartdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_accounts` FOREIGN KEY (`AccountID`) REFERENCES `accounts` (`AccountID`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`AccountID`) REFERENCES `accounts` (`AccountID`) ON DELETE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_order_statuses` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`ID`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_payment_methods` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_account_fk` FOREIGN KEY (`AccountID`) REFERENCES `accounts` (`AccountID`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categories` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_cmt` FOREIGN KEY (`CommentID`) REFERENCES `comments` (`CommentID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
