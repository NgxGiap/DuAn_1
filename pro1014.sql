-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 24, 2024 at 05:31 PM
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
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FullName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `RoleID` int DEFAULT '2',
  `CreatedAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`AccountID`, `Username`, `PasswordHash`, `Email`, `Phone`, `FullName`, `RoleID`, `CreatedAt`) VALUES
(1, 'nvg0215', '$2y$10$2t4yg02.JRzqY.Ux0sFDmeOU3yZLXAQLMe6giIJHVgb/oHvV/2to6', 'vangiap021@gmail.com', '0867963647', 'Giáp Nguyễn Văn Hi', 2, '2024-11-23 23:11:59'),
(2, 'NVG', '$2y$10$lwkMtIZmujz0c00krPjzv.wV7UAKZuAbwsVLS8O/W3qsgpBDo.DS6', 'nguyenvangiap215@gmail.com', '113', 'Nguyễn Văn Giáp', 1, '2024-11-23 23:11:59'),
(3, 'nvghello123', '$2y$10$MG21HbKAhqXwJkLJMTdtx.w.lzmlPPnnMlBLjRNQLk0bPsbmN1QHa', 'nguyenvangiap2005.giaothuy@gmail.com', '123', 'Nguyễn Văn Giáp123', 1, '2024-11-24 18:29:01');

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
(4, 14, './uploads/173227148920230910_031243.jpg'),
(5, 14, './uploads/173227148920231013_160609.jpg'),
(6, 14, './uploads/1732271489cgc.png'),
(7, 14, './uploads/1732271489cms.png');

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
(1, 1, 3, 2),
(2, 2, 4, 1),
(3, 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `CartID` int NOT NULL,
  `CustomerID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`CartID`, `CustomerID`) VALUES
(1, 1),
(2, 2),
(3, 3);

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
(5, 'Other Gadgets', '');

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
  `Status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 1, 1, '20000000.00', NULL),
(2, 2, 2, 1, '22000000.00', NULL),
(3, 3, 5, 1, '15000000.00', NULL);

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
  `OrderDate` date DEFAULT NULL,
  `TotalAmount` decimal(10,2) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `OrderCode`, `AccountID`, `payment_method_id`, `order_status_id`, `RecipientName`, `RecipientEmail`, `RecipientPhone`, `RecipientAddress`, `Note`, `CustomerID`, `OrderDate`, `TotalAmount`, `Status`) VALUES
(1, 'DH-GNV', 1, 1, 1, 'Giáp Nguyễn Văn', 'vangiap021@gmail.com', '113', '13 Trịnh Văn Bô - Hà Nội', '2 cái Iphone15 ném chó', 1, '2023-10-01', '20000000.00', NULL),
(2, 'DH-NVG', 2, 2, 8, 'Nguyễn Văn Giáp', NULL, '0867963647', 'Đâu cũng được', 'Không có gì', 2, '2023-10-05', '22000000.00', NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, '2023-10-07', '15000000.00', 'Shipped');

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
(8, 'Hoàn thành', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24'),
(9, 'Hoàn hàng', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24'),
(10, 'Hủy đơn', NULL, '2024-11-23 23:07:24', '2024-11-23 23:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `PaymentID` int NOT NULL,
  `OrderID` int DEFAULT NULL,
  `PaymentMethod` varchar(50) DEFAULT NULL,
  `PaymentStatus` varchar(20) DEFAULT NULL,
  `PaymentDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`PaymentID`, `OrderID`, `PaymentMethod`, `PaymentStatus`, `PaymentDate`) VALUES
(1, 1, 'Credit Card', 'Paid', '2023-10-02'),
(2, 2, 'Cash on Delivery', 'Pending', NULL),
(3, 3, 'Bank Transfer', 'Paid', '2023-10-08');

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
  `CategoryID` int NOT NULL,
  `SKU` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `ProductName`, `Image`, `Description`, `Price`, `StockQuantity`, `BrandID`, `Color`, `Storage`, `Size`, `CategoryID`, `SKU`) VALUES
(1, 'iPhone 13', NULL, 'Apple iPhone 13', '20000000.00', 50, 1, 'Blue', '128GB', '6.1 inch', 1, 'IP13-128GB-BLUE'),
(2, 'iPhone 13', NULL, 'Apple iPhone 13', '22000000.00', 30, 1, 'Red', '256GB', '6.1 inch', 1, 'IP13-256GB-RED'),
(3, 'Galaxy S21', NULL, 'Samsung Galaxy S21', '18000000.00', 40, 2, 'White', '128GB', '6.2 inch', 2, 'GS21-128GB-WHITE'),
(4, 'Galaxy S21', NULL, 'Samsung Galaxy S21', '20000000.00', 25, 2, 'Black', '256GB', '6.2 inch', 2, 'GS21-256GB-BLACK'),
(5, 'Mi 11', NULL, 'Xiaomi Mi 11', '15000000.00', 60, 3, 'Gray', '128GB', '6.81 inch', 3, 'MI11-128GB-GRAY'),
(6, 'Mi 11', NULL, 'Xiaomi Mi 11', '17000000.00', 35, 3, 'Blue', '256GB', '6.81 inch', 4, 'MI11-256GB-BLUE'),
(14, 'Image', './uploads/173227148920230910_031243.jpg', '1-2-3-4', '4.00', 4, NULL, 'four', '4', '4', 2, 'f-4-4');

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
  ADD UNIQUE KEY `CustomerID` (`CustomerID`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`PaymentID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`);

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
  ADD KEY `BrandID` (`BrandID`);

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `BrandID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `CartDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `CartID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `CustomerID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `OrderDetailID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `PaymentID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `catogory_product` FOREIGN KEY (`id`) REFERENCES `products` (`ProductID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

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
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`BrandID`) REFERENCES `brands` (`BrandID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
