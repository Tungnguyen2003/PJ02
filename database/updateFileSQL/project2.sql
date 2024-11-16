-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 08:51 PM
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
-- Cơ sở dữ liệu: `project2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryCode` varchar(20) NOT NULL,
  `CategoryName` varchar(40) NOT NULL,
  `Description` text NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryCode`, `CategoryName`, `Description`, `deleted`) VALUES
('FSC00003', 'Áo', 'Các loại áo thời trang', 0),
('FSC00004', 'Giày', 'Các loại giày thể thao và thời trang', 0),
('FSC00005', 'Vợt', 'Các loại vợt dùng trong thể thao', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerCode` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Birthday` datetime NOT NULL,
  `Registered` datetime NOT NULL,
  `Sale` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerCode`, `email`, `password`, `FullName`, `Address`, `Phone`, `Birthday`, `Registered`, `Sale`, `remember_token`) VALUES
('FSU00001', 'maithaiquoc@gmail.com', '$2y$10$8Vf6o0erVmwYpPkE4c7l6OO7Pc1OmrQAuWtVmh6dbVPRnsw4Q66W6', 'Demo User', '123 Lorem ipsum', '0912345678', '1980-01-01 00:00:00', '2024-11-02 07:59:32', 0, '7BcR0vDn9OqjXN8MxFWpiHEYmqtWfJJPO4QkTClUd7dEyeISLeoY9K2LOw3E'),
('FSU00002', 'khangyhh0301@gmail.com', '$2y$10$DfWLQtdwKro4T11WzOc9N.anqx9j7FxH5lbUibECCz.zzRG5WURN6', 'Trần Vĩnh khang', '0346917938', '0346917938', '2024-11-15 00:00:00', '2024-11-16 17:16:49', 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employees`
--

CREATE TABLE `employees` (
  `EmployeeCode` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `FullName` varchar(40) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Worked` datetime NOT NULL,
  `Group` int(11) NOT NULL,
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `employees`
--

INSERT INTO `employees` (`EmployeeCode`, `password`, `email`, `FullName`, `Phone`, `Worked`, `Group`, `remember_token`) VALUES
('FSE00001', '$2y$10$8Vf6o0erVmwYpPkE4c7l6OO7Pc1OmrQAuWtVmh6dbVPRnsw4Q66W6', 'admin@fs.com', 'Admin', '0811234568', '2024-11-13 02:17:37', 0, '');

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
(13, '2024_10_10_041623_create_categories_table', 1),
(14, '2024_10_17_020037_create_employees_table', 2),
(15, '2024_10_17_015154_create_customers_table', 3),
(16, '2024_10_17_014320_create_orders_table', 4),
(17, '2024_10_26_084019_add_deleted_column_to_categories_table', 5),
(18, '2024_10_30_020213_add_deleted_column_to_products_table', 6),
(19, '2024_11_02_065459_add_remember_token_to_customers_table', 7),
(20, '2024_11_07_042959_add_status_and_token_columns_to_orders_table', 8),
(21, '2024_11_13_033625_add_remember_column_to_employees_table', 9),
(22, '2024_11_13_041424_add_deleted_column_to_orders_table', 10),
(23, '2024_11_14_013726_create_warehouses_table', 11),
(25, '2024_11_14_014307_create_warehouse_details_table', 12),
(26, '2024_11_14_040128_add_status_column_to_order_details_table', 13),
(29, '2024_11_16_075050_create_warehouse_to_warehouses_table', 14),
(30, '2014_10_12_000000_create_users_table', 15),
(31, '2014_10_12_100000_create_password_resets_table', 15),
(32, '2019_08_19_000000_create_failed_jobs_table', 15),
(33, '2019_12_14_000001_create_personal_access_tokens_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderNumber` varchar(20) NOT NULL,
  `OrderCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `CustomerCode` varchar(20) NOT NULL,
  `EmployeeCode` varchar(20) NOT NULL,
  `Total` int(10) UNSIGNED NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `Token` varchar(255) DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderNumber`, `OrderCreated`, `CustomerCode`, `EmployeeCode`, `Total`, `Status`, `Token`, `deleted`) VALUES
('FSO00001', '2024-11-13 08:51:24', 'FSU00001', 'FSE00001', 905000, 2, 'iI1ZU7R3cbDOAcRAxBzpXfItnGHZyCtNnyvlxyeL', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `OrderNumber` varchar(20) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OriginalPrice` int(11) NOT NULL,
  `SalePrice` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`OrderNumber`, `ProductCode`, `Quantity`, `OriginalPrice`, `SalePrice`, `Status`) VALUES
('FSO00001', 'FSP00001', 2, 129000, 129000, 3),
('FSO00001', 'FSP00002', 3, 199000, 199000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductCode` varchar(20) NOT NULL,
  `ProductName` varchar(40) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Unit` varchar(20) NOT NULL,
  `ManufNation` varchar(40) NOT NULL,
  `Price` int(10) UNSIGNED NOT NULL,
  `Description` text NOT NULL,
  `CategoryCode` varchar(20) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductCode`, `ProductName`, `Image`, `Unit`, `ManufNation`, `Price`, `Description`, `CategoryCode`, `deleted`) VALUES
('FSP00001', 'USB Kingston 64GB', '77d65edaa1150f24922e8c554c1356cf.png', 'cái', 'Việt Nam', 129000, 'Test USB', 'FSC00001', 1),
('FSP00002', 'HDMI không dây Mirascreen G26 chính hãng', 'b44ca38ac16482ca367a3d2f2d6dbd29.png', 'bộ', 'Việt Nam', 199000, 'Test HDMI', 'FSC00002', 1),
('FSP00003', 'Áo Thun Nam', 'ao1.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00004', 'Áo Thun Nam', 'ao2.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00005', 'Áo Thun Nam', 'ao3.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00006', 'Áo Thun Nam', 'ao4.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00007', 'Áo Thun Nam', 'ao5.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00008', 'Áo Thun Nam', 'ao6.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00009', 'Áo Thun Nam', 'ao7.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00010', 'Áo Thun Nam', 'ao8.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00011', 'Áo Thun Nam', 'ao9.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00012', 'Áo Thun Nam', 'ao10.webp', 'cái', 'Việt Nam', 129000, 'Áo thun nam chất lượng', 'FSC00003', 0),
('FSP00013', 'Giày L1', 'giayl1.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L1', 'FSC00004', 0),
('FSP00014', 'Giày L2', 'giayl2.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L2', 'FSC00004', 0),
('FSP00015', 'Giày L3', 'giayl3.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L3', 'FSC00004', 0),
('FSP00016', 'Giày L4', 'giayl4.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L4', 'FSC00004', 0),
('FSP00017', 'Giày L5', 'giayl5.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L5', 'FSC00004', 0),
('FSP00018', 'Giày L6', 'giayl6.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L6', 'FSC00004', 0),
('FSP00019', 'Giày L7', 'giayl7.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L7', 'FSC00004', 0),
('FSP00020', 'Giày L8', 'giayl8.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L8', 'FSC00004', 0),
('FSP00021', 'Giày L9', 'giayl9.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L9', 'FSC00004', 0),
('FSP00022', 'Giày L10', 'giayl10.webp', 'cái', 'Việt Nam', 199000, 'Giày nam L10', 'FSC00004', 0),
('FSP00023', 'Giày V1', 'giayv1.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V1', 'FSC00004', 0),
('FSP00024', 'Giày V2', 'giayv2.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V2', 'FSC00004', 0),
('FSP00025', 'Giày V3', 'giayv3.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V3', 'FSC00004', 0),
('FSP00026', 'Giày V4', 'giayv4.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V4', 'FSC00004', 0),
('FSP00027', 'Giày V5', 'giayv5.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V5', 'FSC00004', 0),
('FSP00028', 'Giày V6', 'giayv6.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V6', 'FSC00004', 0),
('FSP00029', 'Giày V7', 'giayv7.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V7', 'FSC00004', 0),
('FSP00030', 'Giày V8', 'giayv8.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V8', 'FSC00004', 0),
('FSP00031', 'Giày V9', 'giayv9.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V9', 'FSC00004', 0),
('FSP00032', 'Giày V10', 'giayv10.webp', 'cái', 'Việt Nam', 249000, 'Giày nam V10', 'FSC00004', 0),
('FSP00033', 'Giày YY1', 'giayy1.webp', 'cái', 'Việt Nam', 299000, 'Giày YY1', 'FSC00004', 0),
('FSP00034', 'Giày YY2', 'giayy2.webp', 'cái', 'Việt Nam', 299000, 'Giày YY2', 'FSC00004', 0),
('FSP00035', 'Giày YY3', 'giayy3.webp', 'cái', 'Việt Nam', 299000, 'Giày YY3', 'FSC00004', 0),
('FSP00036', 'Giày YY4', 'giayy4.webp', 'cái', 'Việt Nam', 299000, 'Giày YY4', 'FSC00004', 0),
('FSP00037', 'Giày YY5', 'giayy5.webp', 'cái', 'Việt Nam', 299000, 'Giày YY5', 'FSC00004', 0),
('FSP00038', 'Giày YY6', 'giayy6.webp', 'cái', 'Việt Nam', 299000, 'Giày YY6', 'FSC00004', 0),
('FSP00039', 'Giày YY7', 'giayy7.webp', 'cái', 'Việt Nam', 299000, 'Giày YY7', 'FSC00004', 0),
('FSP00040', 'Giày YY8', 'giayy8.webp', 'cái', 'Việt Nam', 299000, 'Giày YY8', 'FSC00004', 0),
('FSP00041', 'Giày YY9', 'giayy9.webp', 'cái', 'Việt Nam', 299000, 'Giày YY9', 'FSC00004', 0),
('FSP00042', 'Giày YY10', 'giayy10.webp', 'cái', 'Việt Nam', 299000, 'Giày YY10', 'FSC00004', 0),
('FSP00043', 'Vợt L1', 'l1.webp', 'cái', 'Việt Nam', 159000, 'Vợt L1 chất lượng cao', 'FSC00005', 0),
('FSP00044', 'Vợt L2', 'l2.webp', 'cái', 'Việt Nam', 159000, 'Vợt L2 chất lượng cao', 'FSC00005', 0),
('FSP00045', 'Vợt L3', 'l3.webp', 'cái', 'Việt Nam', 159000, 'Vợt L3 chất lượng cao', 'FSC00005', 0),
('FSP00046', 'Vợt L4', 'l4.webp', 'cái', 'Việt Nam', 159000, 'Vợt L4 chất lượng cao', 'FSC00005', 0),
('FSP00047', 'Vợt L5', 'l5.webp', 'cái', 'Việt Nam', 159000, 'Vợt L5 chất lượng cao', 'FSC00005', 0),
('FSP00048', 'Vợt L6', 'l6.jpg', 'cái', 'Việt Nam', 159000, 'Vợt L6 chất lượng cao', 'FSC00005', 0),
('FSP00049', 'Vợt L7', 'l7.webp', 'cái', 'Việt Nam', 159000, 'Vợt L7 chất lượng cao', 'FSC00005', 0),
('FSP00050', 'Vợt L8', 'l8.webp', 'cái', 'Việt Nam', 159000, 'Vợt L8 chất lượng cao', 'FSC00005', 0),
('FSP00051', 'Vợt L9', 'l9.webp', 'cái', 'Việt Nam', 159000, 'Vợt L9 chất lượng cao', 'FSC00005', 0),
('FSP00052', 'Vợt L10', 'l10.webp', 'cái', 'Việt Nam', 159000, 'Vợt L10 chất lượng cao', 'FSC00005', 0),
('FSP00053', 'Vợt V1', 'v1.webp', 'cái', 'Việt Nam', 159000, 'Vợt V1 chất lượng cao', 'FSC00005', 0),
('FSP00054', 'Vợt V2', 'v2.webp', 'cái', 'Việt Nam', 159000, 'Vợt V2 chất lượng cao', 'FSC00005', 0),
('FSP00055', 'Vợt V3', 'v3.webp', 'cái', 'Việt Nam', 159000, 'Vợt V3 chất lượng cao', 'FSC00005', 0),
('FSP00056', 'Vợt V4', 'v4.webp', 'cái', 'Việt Nam', 159000, 'Vợt V4 chất lượng cao', 'FSC00005', 0),
('FSP00057', 'Vợt V5', 'v5.webp', 'cái', 'Việt Nam', 159000, 'Vợt V5 chất lượng cao', 'FSC00005', 0),
('FSP00058', 'Vợt V6', 'v6.webp', 'cái', 'Việt Nam', 159000, 'Vợt V6 chất lượng cao', 'FSC00005', 0),
('FSP00059', 'Vợt V7', 'v7.webp', 'cái', 'Việt Nam', 159000, 'Vợt V7 chất lượng cao', 'FSC00005', 0),
('FSP00060', 'Vợt V8', 'v8.webp', 'cái', 'Việt Nam', 159000, 'Vợt V8 chất lượng cao', 'FSC00005', 0),
('FSP00061', 'Vợt V9', 'v9.webp', 'cái', 'Việt Nam', 159000, 'Vợt V9 chất lượng cao', 'FSC00005', 0),
('FSP00062', 'Vợt V10', 'v10.webp', 'cái', 'Việt Nam', 159000, 'Vợt V10 chất lượng cao', 'FSC00005', 0),
('FSP00063', 'Y Y1', 'y1.webp', 'cái', 'Việt Nam', 159000, 'Y Y1 chất lượng cao', 'FSC00005', 0),
('FSP00064', 'Y Y2', 'y2.webp', 'cái', 'Việt Nam', 159000, 'Y Y2 chất lượng cao', 'FSC00005', 0),
('FSP00065', 'Y Y3', 'y3.webp', 'cái', 'Việt Nam', 159000, 'Y Y3 chất lượng cao', 'FSC00005', 0),
('FSP00066', 'Y Y4', 'y4.webp', 'cái', 'Việt Nam', 159000, 'Y Y4 chất lượng cao', 'FSC00005', 0),
('FSP00067', 'Y Y5', 'y5.webp', 'cái', 'Việt Nam', 159000, 'Y Y5 chất lượng cao', 'FSC00005', 0),
('FSP00068', 'Y Y6', '', 'cái', 'Việt Nam', 159000, 'Y Y6 chất lượng cao', 'FSC00007', 0),
('FSP00069', 'Y Y7', 'y7.webp', 'cái', 'Việt Nam', 159000, 'Y Y7 chất lượng cao', 'FSC00007', 0),
('FSP00070', 'Y Y8', 'y8.webp', 'cái', 'Việt Nam', 159000, 'Y Y8 chất lượng cao', 'FSC00007', 0),
('FSP00071', 'Y Y9', 'y9.webp', 'cái', 'Việt Nam', 159000, 'Y Y9 chất lượng cao', 'FSC00007', 0),
('FSP00072', 'Y Y10', 'y10.webp', 'cái', 'Việt Nam', 159000, 'Y Y10 chất lượng cao', 'FSC00007', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouses`
--

CREATE TABLE `warehouses` (
  `WarehouseCode` varchar(20) NOT NULL,
  `WarehouseName` varchar(40) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouses`
--

INSERT INTO `warehouses` (`WarehouseCode`, `WarehouseName`, `Address`, `Phone`, `deleted`) VALUES
('FSW00001', 'Kho 001', '235 Lorem ipsum', '0280000009', 0),
('FSW00002', 'Kho 002', '152 Lorem ipsum', '0240000009', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_details`
--

CREATE TABLE `warehouse_details` (
  `WarehouseCode` varchar(20) NOT NULL,
  `ProductCode` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `warehouse_details`
--

INSERT INTO `warehouse_details` (`WarehouseCode`, `ProductCode`, `Quantity`) VALUES
('FSW00001', 'FSP00001', 97);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `warehouse_to_warehouse`
--

CREATE TABLE `warehouse_to_warehouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Source` varchar(20) NOT NULL,
  `Dest` varchar(20) NOT NULL,
  `Item` varchar(20) NOT NULL,
  `Quantity` int(11) NOT NULL DEFAULT 0,
  `Created` date NOT NULL DEFAULT current_timestamp(),
  `Received` date NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryCode`),
  ADD UNIQUE KEY `categories_categoryname_unique` (`CategoryName`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerCode`);

--
-- Chỉ mục cho bảng `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`EmployeeCode`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderNumber`),
  ADD KEY `orders_customercode_foreign` (`CustomerCode`),
  ADD KEY `orders_employeecode_foreign` (`EmployeeCode`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`OrderNumber`,`ProductCode`),
  ADD KEY `ProductCode` (`ProductCode`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductCode`),
  ADD KEY `CategoryCode` (`CategoryCode`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`WarehouseCode`),
  ADD UNIQUE KEY `warehouses_warehousename_unique` (`WarehouseName`);

--
-- Chỉ mục cho bảng `warehouse_details`
--
ALTER TABLE `warehouse_details`
  ADD PRIMARY KEY (`WarehouseCode`,`ProductCode`),
  ADD KEY `warehouse_details_productcode_foreign` (`ProductCode`);

--
-- Chỉ mục cho bảng `warehouse_to_warehouse`
--
ALTER TABLE `warehouse_to_warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warehouse_to_warehouses_source_foreign` (`Source`),
  ADD KEY `warehouse_to_warehouses_dest_foreign` (`Dest`),
  ADD KEY `warehouse_to_warehouses_item_foreign` (`Item`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `warehouse_to_warehouse`
--
ALTER TABLE `warehouse_to_warehouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customercode_foreign` FOREIGN KEY (`CustomerCode`) REFERENCES `customers` (`CustomerCode`),
  ADD CONSTRAINT `orders_employeecode_foreign` FOREIGN KEY (`EmployeeCode`) REFERENCES `employees` (`EmployeeCode`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`OrderNumber`) REFERENCES `orders` (`OrderNumber`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`ProductCode`) REFERENCES `products` (`ProductCode`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryCode`) REFERENCES `categories` (`CategoryCode`);

--
-- Các ràng buộc cho bảng `warehouse_details`
--
ALTER TABLE `warehouse_details`
  ADD CONSTRAINT `warehouse_details_productcode_foreign` FOREIGN KEY (`ProductCode`) REFERENCES `products` (`ProductCode`),
  ADD CONSTRAINT `warehouse_details_warehousecode_foreign` FOREIGN KEY (`WarehouseCode`) REFERENCES `warehouses` (`WarehouseCode`);

--
-- Các ràng buộc cho bảng `warehouse_to_warehouse`
--
ALTER TABLE `warehouse_to_warehouse`
  ADD CONSTRAINT `warehouse_to_warehouses_dest_foreign` FOREIGN KEY (`Dest`) REFERENCES `warehouses` (`WarehouseCode`),
  ADD CONSTRAINT `warehouse_to_warehouses_item_foreign` FOREIGN KEY (`Item`) REFERENCES `products` (`ProductCode`),
  ADD CONSTRAINT `warehouse_to_warehouses_source_foreign` FOREIGN KEY (`Source`) REFERENCES `warehouses` (`WarehouseCode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
