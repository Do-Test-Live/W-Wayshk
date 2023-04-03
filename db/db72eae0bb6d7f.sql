-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2023 at 07:19 AM
-- Server version: 5.7.39-42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db72eae0bb6d7f`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ip` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'sales',
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `name`, `ip`, `image`, `email`, `password`, `role`, `status`, `updated_at`) VALUES
(2, 'Super Admin', '103.107.160.134', 'assets/admin/69281_avatar.png', 'admin@wayshk.com', '@BCD1234', 'admin', 1, '2023-03-21 07:19:18');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `banner_size` varchar(255) NOT NULL,
  `heading_one` varchar(255) NOT NULL,
  `heading_two` varchar(255) NOT NULL,
  `heading_three` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `link_one` varchar(255) NOT NULL,
  `link_two` varchar(255) NOT NULL,
  `link_3` varchar(255) NOT NULL,
  `link_4` varchar(255) NOT NULL,
  `banner_img` varchar(500) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_name`, `banner_size`, `heading_one`, `heading_two`, `heading_three`, `details`, `link_one`, `link_two`, `link_3`, `link_4`, `banner_img`, `updated_at`) VALUES
(1, 'Home Banner Left', '377x670', 'Fresh & Delicious', 'Fresh Bread', '', 'Bento box burritos cherry bomb pepper dark and stormy with ginger\"\"\"', '#', '', '', '', 'assets/images/banner/5569_image_2023_02_16T11_30_29_962Z.jpg', '2023-03-20 21:07:18'),
(2, 'Home Banner Middle', '806x670', 'Exclusive offer', 'WE\'LL MAKE HANDMADE YOUR SWEET', '', 'Earl grey latte Thai basil curry grains alfalfa sprouts banana bread ginger\"', '#', '', '', '', 'assets/images/banner/4993_image_2023_02_16T11_30_01_779Z.jpg', '2023-03-20 21:07:52'),
(3, 'Home Banner Right', '377x670', 'Fresh & Delicious', 'Bakery Sweet', '', 'Peanut butter crunch chia seeds red parsley basil overflowing\"\"', '#', '', '', '', 'assets/images/banner/67703_image_2023_02_16T11_30_55_093Z.jpg', '2023-03-20 21:08:05'),
(4, 'Home Cupon Banner', '1600x138', 'Get $3 Cashback! Min Order of $30', '', '', 'WaysHK100', '#', '', '', '', 'assets/images/banner/61236_1.jpg', '2023-03-20 21:36:17'),
(5, 'Home Add One', '376*792', 'SEAFOOD', 'SPECIAL BRAND', 'UP TO 50% OFF', 'Special offer on the discount very hungry cake and sweets\"\"', '#', '', '', '', 'assets/images/banner/65734_image_2023_03_20T11_42_58_784Z.jpg', '2023-03-20 21:08:40'),
(6, 'Home Add Two', '375x630', 'FRESH EVERY DAY!', 'Delicioud Bread', '', 'Delicious Bread and Brend new fresh bread\"\"', '#', '', '', '', 'assets/images/banner/95721_image_2023_03_20T11_43_11_103Z.jpg', '2023-03-20 21:08:51'),
(7, 'Home banner middle', '1600x415', 'LIMITED TIME OFFER', 'Super', 'Sale', 'www.wayshk.com\"\"', '#', '', '', '', 'assets/images/banner/90157_image_2023_03_20T11_43_26_490Z.jpg', '2023-03-20 21:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `f_name` varchar(150) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  `payment_type` varchar(20) NOT NULL DEFAULT 'Card',
  `total_purchase` double(10,2) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '3',
  `purchase_points` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `customer_id`, `f_name`, `l_name`, `email`, `phone`, `address`, `city`, `zip_code`, `payment_type`, `total_purchase`, `approve`, `purchase_points`, `updated_at`) VALUES
(1, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 12:55:18'),
(2, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:15:55'),
(3, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:20:20'),
(4, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:22:49'),
(5, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:24:36'),
(6, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:26:58'),
(7, 0, 'Monoget', 'Saha', 'monoget2@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:30:13'),
(8, 0, 'Monoget', 'Saha', 'monoget2@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:32:32'),
(9, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:37:36'),
(10, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 13:39:36'),
(11, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 0.00, 3, 0, '2023-04-02 11:58:27'),
(12, 0, 'Monoget', 'Saha', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Card', 0.00, 3, 0, '2023-04-02 11:59:10'),
(13, 0, 'Francis', 'NGT', 'frogbid.khl@gmail.com', '1729277767', '97/6, Boyra Cross Road', 'Khulna GPO', '9000', 'Cash On', 65.00, 3, 0, '2023-04-03 07:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `image` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `c_name`, `image`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Wayshk自製教材', 'assets/cat_img/72390_6qW2XkuI_400x400.png', 1, '2023-03-20 14:14:53', '0000-00-00 00:00:00'),
(2, ' 治療膠及配件', 'assets/cat_img/66266_6qW2XkuI_400x400.png', 1, '2023-03-20 14:15:15', '0000-00-00 00:00:00'),
(3, '小肌肉訓練工具', 'assets/cat_img/88170_6qW2XkuI_400x400.png', 1, '2023-03-20 14:15:31', '0000-00-00 00:00:00'),
(4, '抓夾及配件', 'assets/cat_img/30180_6qW2XkuI_400x400.png', 1, '2023-03-20 14:15:45', '0000-00-00 00:00:00'),
(5, '貼紙_印章', 'assets/cat_img/90626_6qW2XkuI_400x400.png', 1, '2023-03-20 14:16:05', '0000-00-00 00:00:00'),
(6, '剪刀', 'assets/cat_img/78728_6qW2XkuI_400x400.png', 1, '2023-03-20 14:16:19', '0000-00-00 00:00:00'),
(7, ' 其他文具', 'assets/cat_img/93084_6qW2XkuI_400x400.png', 1, '2023-03-20 14:16:36', '0000-00-00 00:00:00'),
(8, '小肌肉訓練盒裝玩具', 'assets/cat_img/52093_6qW2XkuI_400x400.png', 1, '2023-03-20 14:16:49', '0000-00-00 00:00:00'),
(9, ' 視覺感知', 'assets/cat_img/77095_6qW2XkuI_400x400.png', 1, '2023-03-20 14:17:02', '0000-00-00 00:00:00'),
(10, '書寫訓練', 'assets/cat_img/89122_6qW2XkuI_400x400.png', 1, '2023-03-20 14:17:15', '0000-00-00 00:00:00'),
(11, '執筆膠', 'assets/cat_img/80572_6qW2XkuI_400x400.png', 1, '2023-03-20 14:17:32', '0000-00-00 00:00:00'),
(12, '自理訓練', 'assets/cat_img/99015_6qW2XkuI_400x400.png', 1, '2023-03-20 14:18:19', '0000-00-00 00:00:00'),
(13, '情緒及社交', 'assets/cat_img/81876_6qW2XkuI_400x400.png', 1, '2023-03-20 14:18:37', '0000-00-00 00:00:00'),
(14, '口肌訓練_口腔覺刺激', 'assets/cat_img/34861_6qW2XkuI_400x400.png', 1, '2023-03-20 14:18:50', '0000-00-00 00:00:00'),
(15, ' 聽樂治療', 'assets/cat_img/3863_6qW2XkuI_400x400.png', 1, '2023-03-20 14:19:02', '0000-00-00 00:00:00'),
(16, '重力輸入', 'assets/cat_img/66422_6qW2XkuI_400x400.png', 1, '2023-03-20 14:19:15', '0000-00-00 00:00:00'),
(17, '觸覺刺激', 'assets/cat_img/86191_6qW2XkuI_400x400.png', 1, '2023-03-20 14:19:32', '0000-00-00 00:00:00'),
(18, '前庭_本體刺激_大肌肉訓練', 'assets/cat_img/621_6qW2XkuI_400x400.png', 1, '2023-03-20 14:19:44', '0000-00-00 00:00:00'),
(19, '評估工具', 'assets/cat_img/281_6qW2XkuI_400x400.png', 1, '2023-03-20 14:19:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `course_price` decimal(10,2) NOT NULL,
  `course_description` text NOT NULL,
  `course_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_duration`, `course_price`, `course_description`, `course_image`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Test 1', 'course', '11111.00', 'course', 'assets/course/78037_best-test-concept-cube-blocks-with-transition-from-best-test-word-white-background-3d-rendering.jpg', 1, '2023-03-09 14:58:57', '0000-00-00 00:00:00'),
(2, 'Test 2', 'course', '22252.00', 'course', 'assets/course/46974_block-handle-light.jpg', 1, '2023-03-09 14:59:15', '0000-00-00 00:00:00'),
(3, 'Test 3 ', 'course', '3333.00', 'course', 'assets/course/76633_test-word-checking-knowledge-concept.jpg', 1, '2023-03-09 14:59:34', '0000-00-00 00:00:00'),
(4, 'Test 4 ', 'course', '123.00', 'course', 'assets/course/56548_test-word-written-wooden-blocks-business-concept-test-sign-exam-learning-concept.jpg', 1, '2023-03-09 14:59:47', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `membership_point` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email`, `number`, `address`, `city`, `zip_code`, `password`, `profile_image`, `membership_point`, `inserted_at`, `updated_at`) VALUES
(1, 'Test Customer', 'test@ways.com', '000000', '', '', '', '@BCD1234', '', 0, '2023-03-09 16:52:21', '0000-00-00 00:00:00'),
(2, 'Test Customer 2', 'test2@usdt.com', '000000', '', '', '', '@BCD1234', '', 0, '2023-03-09 16:54:45', '0000-00-00 00:00:00'),
(3, 'Test Customer 3', 'test3@usdt.com', '000000', '', '', '', '@BCD1234', '', 0, '2023-03-09 16:57:26', '0000-00-00 00:00:00'),
(4, 'Test Customer 4', 'test4@usdt.com', '000000', '', '', '', '@BCD1234', '', 0, '2023-03-09 16:58:55', '0000-00-00 00:00:00'),
(5, 'Andrew', 'test@usdt.com', '000000', '', '', '', '@BCD1234', '', 200, '2023-03-15 17:11:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `stock_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit_price` double(10,2) NOT NULL,
  `product_total_price` double(10,2) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `customer_id`, `billing_id`, `product_name`, `product_quantity`, `product_unit_price`, `product_total_price`, `updated_at`) VALUES
(1, 0, 1, 'FC16 FC16S 球形剪刀 2', 1, 0.00, 0.00, '2023-04-02 12:55:18'),
(2, 0, 2, 'PF1 Playfoam 單色球1', 1, 0.00, 0.00, '2023-04-02 13:15:55'),
(3, 0, 3, 'SI11 搖滾威力平衡板2', 6, 0.00, 0.00, '2023-04-02 13:20:20'),
(4, 0, 3, 'TA16 金屬手指環1', 1, 0.00, 0.00, '2023-04-02 13:20:20'),
(5, 0, 4, 'WBB3 3磅壓力被重力毯2', 4, 0.00, 0.00, '2023-04-02 13:22:49'),
(6, 0, 5, 'FT7 洞洞板蘑菇釘套裝 1', 5, 0.00, 0.00, '2023-04-02 13:24:36'),
(7, 0, 6, 'PF3 Playfoam 數數學習套裝大', 1, 0.00, 0.00, '2023-04-02 13:26:58'),
(8, 0, 7, 'TA4 迷你拉拉管喇叭1', 1, 0.00, 0.00, '2023-04-02 13:30:13'),
(9, 0, 8, 'PF1 Playfoam 單色球3', 1, 0.00, 0.00, '2023-04-02 13:32:32'),
(10, 0, 9, 'PUT3 動物壓印模具 2', 2, 0.00, 0.00, '2023-04-02 13:37:36'),
(11, 0, 10, 'HW8 特大粉筆3', 1, 0.00, 0.00, '2023-04-02 13:39:36'),
(12, 0, 11, 'FMY32 動物餵食夾夾玩具1', 1, 0.00, 0.00, '2023-04-02 11:58:27'),
(13, 0, 12, 'PPB 普杜釘板測試', 1, 0.00, 0.00, '2023-04-02 11:59:10'),
(14, 0, 13, 'TL3 聽樂治療耳筒替換電線1', 1, 65.00, 65.00, '2023-04-03 07:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT '0',
  `product_code` varchar(50) NOT NULL,
  `product_weight` varchar(255) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `p_image` varchar(500) NOT NULL,
  `status` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `store_id`, `product_code`, `product_weight`, `p_name`, `product_price`, `description`, `p_image`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 1, 0, '001-001', '1', 'SM1A 香港味道治療膠練習本進階1', '100.00', 'This is a test description.', 'assets/products_image/650/1.jpg', 1, '2023-03-20 14:23:52', '0000-00-00 00:00:00'),
(2, 1, 0, '001-002', '1', 'SM1A 香港味道治療膠練習本進階2', '100.00', 'This is a test description.', 'assets/products_image/650/2.jpg', 1, '2023-03-20 14:24:45', '0000-00-00 00:00:00'),
(3, 1, 0, '001-003', '1', 'SM1A 香港味道治療膠練習本進階3', '100.00', 'This is a test description.', 'assets/products_image/650/3.jpg', 1, '2023-03-20 14:25:27', '0000-00-00 00:00:00'),
(4, 1, 0, '001-004', '1', 'SM1A 香港味道治療膠練習本進階4', '100.00', 'This is a test description.', 'assets/products_image/650/4.jpg', 1, '2023-03-20 14:26:00', '0000-00-00 00:00:00'),
(5, 1, 0, '001-005', '1', 'SM1A 香港味道治療膠練習本進階5', '100.00', 'This is a test description.', 'assets/products_image/650/5.jpg', 1, '2023-03-20 14:30:53', '0000-00-00 00:00:00'),
(6, 1, 0, '001-006', '1', 'SM1F 香港味道治療膠練習本基礎1', '100.00', 'This is a test description.', 'assets/products_image/650/6.jpg', 1, '2023-03-20 14:32:39', '0000-00-00 00:00:00'),
(7, 1, 0, '001-007', '1', 'SM1F 香港味道治療膠練習本基礎2', '100.00', 'This is a test description.', 'assets/products_image/650/7.jpg', 1, '2023-03-20 14:33:19', '0000-00-00 00:00:00'),
(8, 1, 0, '001-008', '1', 'SM1F 香港味道治療膠練習本基礎3', '100.00', 'This is a test description.', 'assets/products_image/650/8.jpg', 1, '2023-03-20 14:33:54', '0000-00-00 00:00:00'),
(9, 1, 0, '001-009', '1', 'SM1F 香港味道治療膠練習本基礎4', '100.00', 'This is a test description.', 'assets/products_image/650/9.jpg', 1, '2023-03-20 14:34:58', '0000-00-00 00:00:00'),
(10, 1, 0, '001-010', '1', 'SM1F 香港味道治療膠練習本基礎5', '100.00', 'This is a test description.', 'assets/products_image/650/10.jpg', 1, '2023-03-20 14:35:30', '0000-00-00 00:00:00'),
(11, 1, 0, '001-011', '1', 'SM1S 香港味道治療膠工具套裝', '100.00', 'This is a test description.', 'assets/products_image/650/11.jpg', 1, '2023-03-20 14:36:01', '0000-00-00 00:00:00'),
(12, 1, 0, '001-012', '1', 'SM1S 香港味道治療膠工具套裝2', '100.00', 'This is a test description.', 'assets/products_image/650/12.jpg', 1, '2023-03-20 14:36:31', '0000-00-00 00:00:00'),
(13, 1, 0, '001-013', '1', 'SM1S 香港味道治療膠工具套裝3', '100.00', 'This is a test description.', 'assets/products_image/650/13.jpg', 1, '2023-03-20 14:38:11', '0000-00-00 00:00:00'),
(14, 1, 0, '001-014', '1', 'SM2 香港地道小食小肌肉訓練教材', '100.00', 'This is a test description.', 'assets/products_image/650/14.jpg', 1, '2023-03-20 14:38:40', '0000-00-00 00:00:00'),
(15, 1, 0, '001-015', '1', 'SM2 香港地道小食小肌肉訓練教材2', '100.00', 'This is a test description.', 'assets/products_image/650/15.jpg', 1, '2023-03-20 14:39:15', '0000-00-00 00:00:00'),
(16, 1, 0, '001-016', '1', 'SM2 香港地道小食小肌肉訓練教材3', '100.00', 'This is a test description.', 'assets/products_image/650/16.jpg', 1, '2023-03-20 14:39:45', '0000-00-00 00:00:00'),
(17, 1, 0, '001-017', '1', 'SM3 SM3S 小小動物世界練習本3', '100.00', 'This is a test description.', 'assets/products_image/650/17.jpg', 1, '2023-03-20 14:41:17', '0000-00-00 00:00:00'),
(18, 1, 0, '001-018', '1', 'SM3 SM3S小小動物世界練習本1', '100.00', 'This is a test description.', 'assets/products_image/650/18.jpg', 1, '2023-03-20 14:42:00', '0000-00-00 00:00:00'),
(19, 1, 0, '001-019', '', 'SM3 SM3S小小動物世界練習本2', '65.00', 'This is a test description.', 'assets/products_image/650/19.jpg', 1, '2023-03-20 14:43:00', '0000-00-00 00:00:00'),
(20, 1, 0, '001-020', '', 'SM4A 交通工具貼貼紙2cm 1', '65.00', 'This is a test description.', 'assets/products_image/650/20.jpg', 1, '2023-03-20 14:43:25', '0000-00-00 00:00:00'),
(21, 1, 0, '001-021', '', 'SM4A 交通工具貼貼紙2cm 2', '65.00', 'This is a test description.', 'assets/products_image/650/21.jpg', 1, '2023-03-20 14:43:43', '0000-00-00 00:00:00'),
(22, 1, 0, '001-022', '', 'SM4A 交通工具貼貼紙2cm 3', '65.00', 'This is a test description.', 'assets/products_image/650/22.jpg', 1, '2023-03-20 14:44:07', '0000-00-00 00:00:00'),
(23, 1, 0, '001-023', '', 'SM4F 交通工具貼貼紙1cm 1', '65.00', 'This is a test description.', 'assets/products_image/650/23.jpg', 1, '2023-03-20 14:44:25', '0000-00-00 00:00:00'),
(24, 1, 0, '001-024', '', 'SM4F 交通工具貼貼紙1cm 2', '65.00', 'This is a test description.', 'assets/products_image/650/24.jpg', 1, '2023-03-20 14:44:51', '0000-00-00 00:00:00'),
(25, 1, 0, '001-025', '', 'SM4F 交通工具貼貼紙1cm 3', '65.00', 'This is a test description.', 'assets/products_image/650/25.jpg', 1, '2023-03-20 14:45:12', '0000-00-00 00:00:00'),
(26, 1, 0, '001-026', '', 'SM5 專注及小肌肉蓋印練習本1', '65.00', 'This is a test description.', 'assets/products_image/650/26.jpg', 1, '2023-03-20 14:49:54', '0000-00-00 00:00:00'),
(27, 1, 0, '001-027', '', 'SM5 專注及小肌肉蓋印練習本3', '65.00', 'This is a test description.', 'assets/products_image/650/27.jpg', 1, '2023-03-20 14:50:13', '0000-00-00 00:00:00'),
(28, 1, 0, '001-028', '', 'SM5 專注及小肌肉蓋印練習本4', '65.00', 'This is a test description.', 'assets/products_image/650/28.jpg', 1, '2023-03-20 14:50:32', '0000-00-00 00:00:00'),
(29, 1, 0, '001-029', '', 'SM5專注及小肌肉蓋印練習本2', '65.00', 'This is a test description.', 'assets/products_image/650/29.jpg', 1, '2023-03-20 14:50:54', '0000-00-00 00:00:00'),
(30, 1, 0, '001-030', '', 'SM6 髮型創造小手工1', '65.00', 'This is a test description.', 'assets/products_image/650/30.jpg', 1, '2023-03-20 14:51:15', '0000-00-00 00:00:00'),
(31, 1, 0, '001-031', '', 'SM6 髮型創造小手工2', '65.00', 'This is a test description.', 'assets/products_image/650/31.jpg', 1, '2023-03-20 14:51:36', '0000-00-00 00:00:00'),
(32, 1, 0, '001-032', '', 'SM6 髮型創造小手工3', '65.00', 'This is a test description.', 'assets/products_image/650/32.jpg', 1, '2023-03-20 14:51:54', '0000-00-00 00:00:00'),
(33, 1, 0, '001-033', '', 'SM7 刮刮聖誕卡遊戲套裝1', '65.00', 'This is a test description.', 'assets/products_image/650/33.jpg', 1, '2023-03-20 14:52:16', '0000-00-00 00:00:00'),
(34, 1, 0, '001-034', '', 'SM7 刮刮聖誕卡遊戲套裝2', '65.00', 'This is a test description.', 'assets/products_image/650/34.jpg', 1, '2023-03-20 14:52:39', '0000-00-00 00:00:00'),
(35, 1, 0, '001-035', '', 'SM8 蠟繩交通工具遊戲包1', '65.00', 'This is a test description.', 'assets/products_image/650/35.jpg', 1, '2023-03-20 14:53:01', '0000-00-00 00:00:00'),
(36, 1, 0, '001-036', '', 'SM8 蠟繩交通工具遊戲包2', '65.00', 'This is a test description.', 'assets/products_image/650/36.jpg', 1, '2023-03-20 14:53:34', '0000-00-00 00:00:00'),
(37, 1, 0, '001-037', '', 'SM8 蠟繩交通工具遊戲包3', '65.00', 'This is a test description.', 'assets/products_image/650/37.jpg', 1, '2023-03-20 14:53:57', '0000-00-00 00:00:00'),
(38, 1, 0, '001-038', '', 'SM8 蠟繩交通工具遊戲包4', '65.00', 'This is a test description.', 'assets/products_image/650/38.jpg', 1, '2023-03-20 14:54:27', '0000-00-00 00:00:00'),
(39, 1, 0, '001-039', '', 'SM8 蠟繩交通工具遊戲包5', '65.00', 'This is a test description.', 'assets/products_image/650/39.jpg', 1, '2023-03-20 14:54:50', '0000-00-00 00:00:00'),
(40, 1, 0, '001-040', '', 'SM8 蠟繩交通工具遊戲包6', '65.00', 'This is a test description.', 'assets/products_image/650/40.jpg', 1, '2023-03-20 14:55:11', '0000-00-00 00:00:00'),
(41, 1, 0, '001-041', '', 'SM10 打孔火車圖卡 1', '65.00', 'This is a test description.', 'assets/products_image/650/41.jpg', 1, '2023-03-20 14:55:27', '0000-00-00 00:00:00'),
(42, 1, 0, '001-042', '', 'SM10 打孔火車圖卡 2', '65.00', 'This is a test description.', 'assets/products_image/650/42.jpg', 1, '2023-03-20 14:55:43', '0000-00-00 00:00:00'),
(43, 2, 0, '002-001', '', 'PU2S 治療膠2oz 1', '65.00', 'This is a test description.', 'assets/products_image/650/43.jpg', 1, '2023-03-20 15:08:50', '0000-00-00 00:00:00'),
(44, 2, 0, '002-002', '', 'PU2S 治療膠2oz 2', '65.00', 'This is a test description.', 'assets/products_image/650/44.jpg', 1, '2023-03-20 15:09:06', '2023-03-20 15:10:12'),
(45, 2, 0, '002-003', '', 'PU2YRGB 治療膠2oz 1', '65.00', 'This is a test description.', 'assets/products_image/650/45.jpg', 1, '2023-03-20 15:09:32', '0000-00-00 00:00:00'),
(46, 2, 0, '002-004', '', 'PU2YRGB 治療膠2oz 2', '65.00', 'This is a test description.', 'assets/products_image/650/46.jpg', 1, '2023-03-20 15:09:51', '0000-00-00 00:00:00'),
(47, 2, 0, '002-005', '', 'PU2YRGB 治療膠2oz 3', '65.00', 'This is a test description.', 'assets/products_image/650/47.jpg', 1, '2023-03-20 15:10:46', '0000-00-00 00:00:00'),
(48, 2, 0, '002-006', '', 'PU2YRGB 治療膠2oz 4', '65.00', 'This is a test description.', 'assets/products_image/650/48.jpg', 1, '2023-03-20 15:11:07', '0000-00-00 00:00:00'),
(49, 2, 0, '002-007', '', 'PU2YRGB 治療膠2oz 5', '65.00', 'This is a test description.', 'assets/products_image/650/49.jpg', 1, '2023-03-20 15:11:27', '0000-00-00 00:00:00'),
(50, 2, 0, '002-008', '', 'PU4RGB 治療膠4oz 1', '65.00', 'This is a test description.', 'assets/products_image/650/50.jpg', 1, '2023-03-20 15:11:49', '0000-00-00 00:00:00'),
(51, 2, 0, '002-009', '', 'PU4RGB 治療膠4oz 2', '65.00', 'This is a test description.', 'assets/products_image/650/51.jpg', 1, '2023-03-20 15:12:10', '0000-00-00 00:00:00'),
(52, 2, 0, '002-010', '', 'PU4RGB 治療膠4oz 3', '65.00', 'This is a test description.', 'assets/products_image/650/52.jpg', 1, '2023-03-20 15:12:42', '0000-00-00 00:00:00'),
(53, 2, 0, '001-010', '', 'PUT1 麵粉泥膠擀棍 1', '65.00', 'This is a test description.', 'assets/products_image/650/53.jpg', 1, '2023-03-20 15:13:15', '0000-00-00 00:00:00'),
(54, 2, 0, '002-011', '', 'PUT1 麵粉泥膠擀棍 2', '65.00', 'This is a test description.', 'assets/products_image/650/54.jpg', 1, '2023-03-20 15:13:35', '0000-00-00 00:00:00'),
(55, 2, 0, '002-013', '', 'PUT1 麵粉泥膠擀棍 3', '65.00', 'This is a test description.', 'assets/products_image/650/55.jpg', 1, '2023-03-20 15:14:10', '0000-00-00 00:00:00'),
(56, 2, 0, '002-014', '', 'PUT1 麵粉泥膠擀棍 4', '65.00', 'This is a test description.', 'assets/products_image/650/56.jpg', 1, '2023-03-20 15:14:39', '0000-00-00 00:00:00'),
(57, 2, 0, '002-015', '', 'PUT2 雜錦壓印模具 1', '65.00', 'This is a test description.', 'assets/products_image/650/57.jpg', 1, '2023-03-20 15:15:01', '0000-00-00 00:00:00'),
(58, 2, 0, '002-017', '', 'PUT2 雜錦壓印模具 2', '65.00', 'This is a test description.', 'assets/products_image/650/58.jpg', 1, '2023-03-20 15:15:29', '0000-00-00 00:00:00'),
(59, 2, 0, '002-019', '', 'PUT3 動物壓印模具 1', '65.00', 'This is a test description.', 'assets/products_image/650/59.jpg', 1, '2023-03-20 15:15:54', '0000-00-00 00:00:00'),
(60, 2, 0, '002-020', '', 'PUT3 動物壓印模具 2', '65.00', 'This is a test description.', 'assets/products_image/650/60.jpg', 1, '2023-03-20 15:16:12', '0000-00-00 00:00:00'),
(61, 2, 0, '002-021', '', 'PUT4 迷你水果簽 1', '65.00', 'This is a test description.', 'assets/products_image/650/61.jpg', 1, '2023-03-20 15:16:34', '0000-00-00 00:00:00'),
(62, 2, 0, '002-022', '', 'PUT4 迷你水果簽 2', '65.00', 'This is a test description.', 'assets/products_image/650/62.jpg', 1, '2023-03-20 15:16:56', '0000-00-00 00:00:00'),
(63, 3, 0, '003-001', '', 'FT1 FT1S  幾何圖形螺絲 2', '65.00', 'This is a test description.', 'assets/products_image/650/63.jpg', 1, '2023-03-20 15:23:44', '0000-00-00 00:00:00'),
(64, 3, 0, '003-002', '', 'FT1 FT1S 幾何圖形螺絲 1', '65.00', 'This is a test description.', 'assets/products_image/650/64.jpg', 1, '2023-03-20 15:24:09', '0000-00-00 00:00:00'),
(65, 3, 0, '003-003', '', 'FT2 FT2S  大C字扣環 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/65.jpg', 1, '2023-03-20 15:24:31', '0000-00-00 00:00:00'),
(66, 3, 0, '003-004', '', 'FT2 FT2S 大C字扣環 2', '65.00', 'This is a test description.', 'assets/products_image/650/66.jpg', 1, '2023-03-20 15:24:53', '0000-00-00 00:00:00'),
(67, 3, 0, '003-005', '', 'FT2 FT2S 大C字扣環 3', '65.00', 'This is a test description.', 'assets/products_image/650/67.jpg', 1, '2023-03-20 15:25:17', '0000-00-00 00:00:00'),
(68, 3, 0, '003-006', '', 'FT3 FT3S  長形迷你扣環 1', '65.00', 'This is a test description.', 'assets/products_image/650/68.jpg', 1, '2023-03-20 15:25:51', '0000-00-00 00:00:00'),
(69, 3, 0, '003-007', '', 'FT3 FT3S 長形迷你扣環 2', '65.00', 'This is a test description.', 'assets/products_image/650/69.jpg', 1, '2023-03-20 15:26:15', '0000-00-00 00:00:00'),
(70, 3, 0, '003-008', '', 'FT3 FT3S 長形迷你扣環 3', '65.00', 'This is a test description.', 'assets/products_image/650/70.jpg', 1, '2023-03-20 15:26:41', '0000-00-00 00:00:00'),
(71, 3, 0, '003-009', '', 'FT4 FT4S 圖形迷你扣環 1', '65.00', 'This is a test description.', 'assets/products_image/650/71.jpg', 1, '2023-03-20 15:27:00', '0000-00-00 00:00:00'),
(72, 3, 0, '003-010', '', 'FT4 FT4S 圖形迷你扣環 2', '65.00', 'This is a test description.', 'assets/products_image/650/72.jpg', 1, '2023-03-20 15:27:19', '0000-00-00 00:00:00'),
(73, 3, 0, '003-011', '', 'FT4 FT4S 圖形迷你扣環 3', '65.00', 'This is a test description.', 'assets/products_image/650/73.jpg', 1, '2023-03-20 15:27:40', '0000-00-00 00:00:00'),
(74, 3, 0, '003-012', '', 'FT4 FT4S 圖形迷你扣環 4', '65.00', 'This is a test description.', 'assets/products_image/650/74.jpg', 1, '2023-03-20 15:28:01', '0000-00-00 00:00:00'),
(75, 3, 0, '003-013', '', 'FT5 雙色錢幣 1', '65.00', 'This is a test description.', 'assets/products_image/650/75.jpg', 1, '2023-03-20 15:28:24', '0000-00-00 00:00:00'),
(76, 3, 0, '003-014', '', 'FT5 雙色錢幣 2 ', '65.00', 'This is a test description.', 'assets/products_image/650/76.jpg', 1, '2023-03-20 15:28:48', '0000-00-00 00:00:00'),
(77, 3, 0, '003-015', '', 'FT6 蘑菇釘', '65.00', 'This is a test description.', 'assets/products_image/650/77.jpg', 1, '2023-03-20 15:29:12', '0000-00-00 00:00:00'),
(78, 3, 0, '003-016', '', 'FT7 洞洞板蘑菇釘套裝 1', '65.00', 'This is a test description.', 'assets/products_image/650/78.jpg', 1, '2023-03-20 15:29:41', '0000-00-00 00:00:00'),
(79, 3, 0, '003-017', '', 'FT7 洞洞板蘑菇釘套裝 2', '65.00', 'This is a test description.', 'assets/products_image/650/79.jpg', 1, '2023-03-20 15:30:02', '0000-00-00 00:00:00'),
(80, 3, 0, '003-018', '', 'FT8 FT8S  2cm 小方粒 2', '65.00', 'This is a test description.', 'assets/products_image/650/80.jpg', 1, '2023-03-20 15:30:28', '0000-00-00 00:00:00'),
(81, 3, 0, '003-019', '', 'FT8 FT8S 2cm 小方粒 1', '65.00', 'This is a test description.', 'assets/products_image/650/81.jpg', 1, '2023-03-20 15:30:54', '0000-00-00 00:00:00'),
(82, 3, 0, '003-020', '', 'FT8 FT8S 2cm 小方粒 3', '65.00', 'This is a test description.', 'assets/products_image/650/82.jpg', 1, '2023-03-20 15:31:13', '0000-00-00 00:00:00'),
(83, 3, 0, '003-021', '', 'FT9 FT9S 1cm串珠 1', '65.00', 'This is a test description.', 'assets/products_image/650/83.jpg', 1, '2023-03-20 15:31:34', '0000-00-00 00:00:00'),
(84, 3, 0, '003-022', '', 'FT9 FT9S 1cm串珠 2', '65.00', 'This is a test description.', 'assets/products_image/650/84.jpg', 1, '2023-03-20 15:31:57', '0000-00-00 00:00:00'),
(85, 3, 0, '003-023', '', 'FT10  FT10S 2cm串珠 1', '65.00', 'This is a test description.', 'assets/products_image/650/85.jpg', 1, '2023-03-20 15:32:33', '0000-00-00 00:00:00'),
(86, 3, 0, '003-025', '', 'FT10  FT10S 2cm串珠 2', '65.00', 'This is a test description.', 'assets/products_image/650/86.jpg', 1, '2023-03-20 15:33:00', '0000-00-00 00:00:00'),
(87, 3, 0, '003-026', '', 'FT10  FT10S 2cm串珠 3', '65.00', 'This is a test description.', 'assets/products_image/650/87.jpg', 1, '2023-03-20 15:33:25', '0000-00-00 00:00:00'),
(88, 3, 0, '003-027', '', 'FT11 75cm穿珠繩', '65.00', 'This is a test description.', 'assets/products_image/650/88.jpg', 1, '2023-03-20 15:33:50', '0000-00-00 00:00:00'),
(89, 3, 0, '003-027', '', 'FT12 FT12S 花花片 1', '65.00', 'This is a test description.', 'assets/products_image/650/89.jpg', 1, '2023-03-20 15:34:13', '0000-00-00 00:00:00'),
(90, 3, 0, '003-028', '', 'FT12 FT12S 花花片 2', '65.00', 'This is a test description.', 'assets/products_image/650/90.jpg', 1, '2023-03-20 15:34:34', '0000-00-00 00:00:00'),
(91, 3, 0, '003-029', '', 'FT12 FT12S 花花片 3', '65.00', 'This is a test description.', 'assets/products_image/650/91.jpg', 1, '2023-03-20 15:34:59', '0000-00-00 00:00:00'),
(92, 3, 0, '003-030', '', 'FT13 橡皮釘版 ', '65.00', 'This is a test description.', 'assets/products_image/650/92.jpg', 1, '2023-03-20 15:35:21', '0000-00-00 00:00:00'),
(93, 3, 0, '003-031', '', 'FT18  積木眼鏡 2', '65.00', 'This is a test description.', 'assets/products_image/650/93.jpg', 1, '2023-03-20 15:35:41', '0000-00-00 00:00:00'),
(94, 3, 0, '003-032', '', 'FT18  積木眼鏡 3', '65.00', 'This is a test description.', 'assets/products_image/650/94.jpg', 1, '2023-03-20 15:36:11', '0000-00-00 00:00:00'),
(95, 3, 0, '003-033', '', 'FT18 積木眼鏡 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/95.jpg', 1, '2023-03-20 15:36:30', '0000-00-00 00:00:00'),
(96, 3, 0, '003-034', '', 'FT20 雜錦小肌遊戲板 1', '65.00', 'This is a test description.', 'assets/products_image/650/96.jpg', 1, '2023-03-20 15:36:47', '0000-00-00 00:00:00'),
(97, 3, 0, '003-035', '', 'FT20 雜錦小肌遊戲板 2', '65.00', 'This is a test description.', 'assets/products_image/650/97.jpg', 1, '2023-03-20 15:37:10', '0000-00-00 00:00:00'),
(98, 3, 0, '003-036', '', 'FT20 雜錦小肌遊戲板 3', '65.00', 'This is a test description.', 'assets/products_image/650/98.jpg', 1, '2023-03-20 15:37:27', '0000-00-00 00:00:00'),
(99, 3, 0, '003-037', '', 'FT21 綁鞋帶紙板 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/99.jpg', 1, '2023-03-20 15:37:47', '0000-00-00 00:00:00'),
(100, 3, 0, '003-038', '', 'FT21 綁鞋帶紙板 3', '65.00', 'This is a test description.', 'assets/products_image/650/100.jpg', 1, '2023-03-20 15:38:11', '0000-00-00 00:00:00'),
(101, 3, 0, '003-039', '', 'FT21綁鞋帶紙板 2', '65.00', 'This is a test description.', 'assets/products_image/650/101.jpg', 1, '2023-03-20 15:38:39', '0000-00-00 00:00:00'),
(102, 3, 0, '003-040', '', 'FT24 彩色粗雪條棍 1', '65.00', 'This is a test description.', 'assets/products_image/650/102.jpg', 1, '2023-03-20 15:39:06', '0000-00-00 00:00:00'),
(103, 3, 0, '003-041', '', 'FT28 小掃把套裝 1', '65.00', 'This is a test description.', 'assets/products_image/650/103.jpg', 1, '2023-03-20 15:39:25', '0000-00-00 00:00:00'),
(104, 13, 0, '013-1', '', 'EO1 情緒感官沙漏1', '65.00', 'This is a test description.', 'assets/products_image/650/104.jpg', 1, '2023-03-20 17:24:46', '0000-00-00 00:00:00'),
(105, 13, 0, '013-2', '', 'EO1 情緒感官沙漏2', '65.00', 'This is a test description.', 'assets/products_image/650/105.jpg', 1, '2023-03-20 17:26:33', '0000-00-00 00:00:00'),
(106, 8, 0, '008-1', '', 'FMY1  洗澡撈魚玩具1 ', '65.00', 'This is a test description.', 'assets/products_image/650/106.jpg', 1, '2023-03-20 17:27:05', '0000-00-00 00:00:00'),
(107, 8, 0, '008-2', '', 'FMY1  洗澡撈魚玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/107.jpg', 1, '2023-03-20 17:27:38', '0000-00-00 00:00:00'),
(108, 4, 0, '004-001', '', 'FA1 FA1S 彩色小熊膠粒1', '65.00', 'This is a test description.', 'assets/products_image/650/108.jpg', 1, '2023-03-20 17:27:54', '0000-00-00 00:00:00'),
(109, 13, 0, '013-3', '', 'EO2 趣味面孔遊戲 1', '65.00', 'This is a test description.', 'assets/products_image/650/109.jpg', 1, '2023-03-20 17:27:55', '0000-00-00 00:00:00'),
(110, 8, 0, '008-3', '', 'FMY1  洗澡撈魚玩具3', '65.00', 'This is a test description.', 'assets/products_image/650/110.jpg', 1, '2023-03-20 17:28:51', '0000-00-00 00:00:00'),
(111, 13, 0, '013-4', '', 'EO2 趣味面孔遊戲 2', '65.00', 'This is a test description.', 'assets/products_image/650/111.jpg', 1, '2023-03-20 17:29:11', '0000-00-00 00:00:00'),
(112, 8, 0, '008-4', '', 'FMY1  洗澡撈魚玩具4', '65.00', 'This is a test description.', 'assets/products_image/650/112.jpg', 1, '2023-03-20 17:29:15', '0000-00-00 00:00:00'),
(113, 13, 0, '013-5', '', 'EO2 趣味面孔遊戲 3', '65.00', 'This is a test description.', 'assets/products_image/650/113.jpg', 1, '2023-03-20 17:29:55', '0000-00-00 00:00:00'),
(114, 8, 0, '008-5', '', 'FMY5 雞蛋形狀配對玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/114.jpg', 1, '2023-03-20 17:29:57', '0000-00-00 00:00:00'),
(115, 8, 0, '008-6', '', 'FMY5 雞蛋形狀配對玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/115.jpg', 1, '2023-03-20 17:31:28', '0000-00-00 00:00:00'),
(116, 8, 0, '008-7', '', 'FMY6 恐龍配對玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/116.jpg', 1, '2023-03-20 17:32:20', '0000-00-00 00:00:00'),
(117, 8, 0, '008-8', '', 'FMY6 恐龍配對玩具 2jpg', '65.00', 'This is a test description.', 'assets/products_image/650/117.jpg', 1, '2023-03-20 17:33:56', '0000-00-00 00:00:00'),
(118, 8, 0, '008-9', '', 'FMY6 恐龍配對玩具 3', '65.00', 'This is a test description.', 'assets/products_image/650/118.jpg', 1, '2023-03-20 17:35:08', '0000-00-00 00:00:00'),
(119, 8, 0, '008-10', '', 'FMY11 切水果蔬菜玩具1', '65.00', 'This is a test description.', 'assets/products_image/650/119.jpg', 1, '2023-03-20 17:36:07', '0000-00-00 00:00:00'),
(120, 14, 0, '014-1', '', 'OM1 空心長管牙膠', '65.00', 'This is a test description.', 'assets/products_image/650/120.jpg', 1, '2023-03-20 17:36:44', '0000-00-00 00:00:00'),
(121, 8, 0, '008-11', '', 'FMY11 切水果蔬菜玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/121.jpg', 1, '2023-03-20 17:36:45', '0000-00-00 00:00:00'),
(122, 4, 0, '004-002', '', 'FA1 FM1S  彩色小熊膠粒3', '65.00', 'This is a test description.', 'assets/products_image/650/122.jpg', 1, '2023-03-20 17:37:20', '0000-00-00 00:00:00'),
(123, 14, 0, '014-2', '', 'OM5 人仔牙膠頸繩 1', '65.00', 'This is a test description.', 'assets/products_image/650/123.jpg', 1, '2023-03-20 17:37:22', '0000-00-00 00:00:00'),
(124, 4, 0, '004-003', '', 'FA1 FM1S 彩色小熊膠粒2', '65.00', 'This is a test description.', 'assets/products_image/650/124.jpg', 1, '2023-03-20 17:37:42', '0000-00-00 00:00:00'),
(125, 8, 0, '008-12', '', 'FMY11 切水果蔬菜玩具3', '65.00', 'This is a test description.', 'assets/products_image/650/125.jpg', 1, '2023-03-20 17:37:53', '0000-00-00 00:00:00'),
(126, 14, 0, '014-3', '', 'OM5人仔牙膠頸繩 2', '65.00', 'This is a test description.', 'assets/products_image/650/126.jpg', 1, '2023-03-20 17:38:03', '0000-00-00 00:00:00'),
(127, 4, 0, '004-004', '', 'FA2 恐龍膠粒 1', '65.00', 'This is a test description.', 'assets/products_image/650/127.jpg', 1, '2023-03-20 17:38:08', '0000-00-00 00:00:00'),
(128, 4, 0, '004-005', '', 'FA2 恐龍膠粒 2', '65.00', 'This is a test description.', 'assets/products_image/650/128.jpg', 1, '2023-03-20 17:38:32', '0000-00-00 00:00:00'),
(129, 8, 0, '008-13', '', 'FMY16 電鑽扭螺絲玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/129.jpg', 1, '2023-03-20 17:38:36', '0000-00-00 00:00:00'),
(130, 4, 0, '004-006', '', 'FA3 迷你水果橡皮 2', '65.00', 'This is a test description.', 'assets/products_image/650/130.jpg', 1, '2023-03-20 17:38:54', '0000-00-00 00:00:00'),
(131, 14, 0, '014-4', '', 'OM5人仔牙膠頸繩 3', '65.00', 'This is a test description.', 'assets/products_image/650/131.jpg', 1, '2023-03-20 17:39:04', '0000-00-00 00:00:00'),
(132, 8, 0, '008-14', '', 'FMY16 電鑽扭螺絲玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/132.jpg', 1, '2023-03-20 17:39:07', '0000-00-00 00:00:00'),
(133, 4, 0, '004-007', '', 'FA3 迷你水果橡皮 3', '65.00', 'This is a test description.', 'assets/products_image/650/133.jpg', 1, '2023-03-20 17:39:17', '0000-00-00 00:00:00'),
(134, 8, 0, '008-15', '', 'FMY20 疊疊熱香餅玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/134.jpg', 1, '2023-03-20 17:39:39', '0000-00-00 00:00:00'),
(135, 4, 0, '004-008', '', 'FA4 絨毛球連盒 1', '65.00', 'This is a test description.', 'assets/products_image/650/135.jpg', 1, '2023-03-20 17:39:41', '0000-00-00 00:00:00'),
(136, 14, 0, '014-5', '', 'OM6  積木牙膠頸繩2', '65.00', 'This is a test description.', 'assets/products_image/650/136.jpg', 1, '2023-03-20 17:39:44', '0000-00-00 00:00:00'),
(137, 4, 0, '004-009', '', 'FA4 絨毛球連盒 2', '65.00', 'This is a test description.', 'assets/products_image/650/137.jpg', 1, '2023-03-20 17:40:01', '0000-00-00 00:00:00'),
(138, 8, 0, '008-16', '', 'FMY20 疊疊熱香餅玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/138.jpg', 1, '2023-03-20 17:40:14', '0000-00-00 00:00:00'),
(139, 14, 0, '014-6', '', 'OM6  積木牙膠頸繩3', '65.00', 'This is a test description.', 'assets/products_image/650/139.jpg', 1, '2023-03-20 17:40:19', '0000-00-00 00:00:00'),
(140, 4, 0, '004-010', '', 'FA4 絨毛球連盒 3', '65.00', 'This is a test description.', 'assets/products_image/650/140.jpg', 1, '2023-03-20 17:40:21', '0000-00-00 00:00:00'),
(141, 4, 0, '004-011', '', 'FA4 絨毛球連盒 4', '65.00', 'This is a test description.', 'assets/products_image/650/141.jpg', 1, '2023-03-20 17:40:42', '0000-00-00 00:00:00'),
(142, 8, 0, '008-17', '', 'FMY26 手握青蛙餵食玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/142.jpg', 1, '2023-03-20 17:40:42', '0000-00-00 00:00:00'),
(143, 14, 0, '014-7', '', 'OM6 積木牙膠頸繩1', '65.00', 'This is a test description.', 'assets/products_image/650/143.jpg', 1, '2023-03-20 17:40:46', '0000-00-00 00:00:00'),
(144, 4, 0, '004-012', '', 'FA4絨毛球連盒 5', '65.00', 'This is a test description.', 'assets/products_image/650/144.jpg', 1, '2023-03-20 17:41:03', '0000-00-00 00:00:00'),
(145, 8, 0, '008-18', '', 'FMY26 手握青蛙餵食玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/145.jpg', 1, '2023-03-20 17:41:13', '0000-00-00 00:00:00'),
(146, 4, 0, '004-013', '', 'FA7 GOMA 乒乓球', '65.00', 'This is a test description.', 'assets/products_image/650/146.jpg', 1, '2023-03-20 17:41:21', '0000-00-00 00:00:00'),
(147, 4, 0, '004-014', '', 'FC1 機械手臂玩具夾', '65.00', 'This is a test description.', 'assets/products_image/650/147.jpg', 1, '2023-03-20 17:41:41', '0000-00-00 00:00:00'),
(148, 4, 0, '004-015', '', 'FC2 小手掌矽膠夾 1', '65.00', 'This is a test description.', 'assets/products_image/650/148.jpg', 1, '2023-03-20 17:42:02', '0000-00-00 00:00:00'),
(149, 14, 0, '014-8', '', 'OM10 單向吸管', '65.00', 'This is a test description.', 'assets/products_image/650/149.jpg', 1, '2023-03-20 17:42:05', '0000-00-00 00:00:00'),
(150, 8, 0, '008-18', '', 'FMY27  可愛怪獸吸盤玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/150.jpg', 1, '2023-03-20 17:42:18', '0000-00-00 00:00:00'),
(151, 4, 0, '004-016', '', 'FC2 小手掌矽膠夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/151.jpg', 1, '2023-03-20 17:42:20', '0000-00-00 00:00:00'),
(152, 14, 0, '014-9', '', 'OM11 笑臉造型吸管', '65.00', 'This is a test description.', 'assets/products_image/650/152.jpg', 1, '2023-03-20 17:42:29', '0000-00-00 00:00:00'),
(153, 4, 0, '004-017', '', 'FC2 小手掌矽膠夾 3', '65.00', 'This is a test description.', 'assets/products_image/650/153.jpg', 1, '2023-03-20 17:42:35', '0000-00-00 00:00:00'),
(154, 8, 0, '008-19', '', 'FMY27  可愛怪獸吸盤玩具 3', '65.00', 'This is a test description.', 'assets/products_image/650/154.jpg', 1, '2023-03-20 17:42:50', '0000-00-00 00:00:00'),
(155, 4, 0, '004-018', '', 'FC4 FC4S 八爪魚夾 1', '65.00', 'This is a test description.', 'assets/products_image/650/155.jpg', 1, '2023-03-20 17:42:51', '0000-00-00 00:00:00'),
(156, 14, 0, '014-10', '', 'OM12 吸管哨子', '65.00', 'This is a test description.', 'assets/products_image/650/156.jpg', 1, '2023-03-20 17:42:57', '0000-00-00 00:00:00'),
(157, 4, 0, '004-019', '', 'FC4 FC4S 八爪魚夾 3', '65.00', 'This is a test description.', 'assets/products_image/650/157.jpg', 1, '2023-03-20 17:43:11', '0000-00-00 00:00:00'),
(158, 8, 0, '008-20', '', 'FMY27  可愛怪獸吸盤玩具 4', '65.00', 'This is a test description.', 'assets/products_image/650/158.jpg', 1, '2023-03-20 17:43:18', '0000-00-00 00:00:00'),
(159, 14, 0, '014-11', '', 'OM15 變音笛子', '65.00', 'This is a test description.', 'assets/products_image/650/159.jpg', 1, '2023-03-20 17:43:28', '0000-00-00 00:00:00'),
(160, 8, 0, '008-21', '', 'FMY27 可愛怪獸吸盤玩具 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/160.jpg', 1, '2023-03-20 17:43:57', '0000-00-00 00:00:00'),
(161, 14, 0, '014-12', '', 'OM16 笑臉哨子', '65.00', 'This is a test description.', 'assets/products_image/650/161.jpg', 1, '2023-03-20 17:43:58', '0000-00-00 00:00:00'),
(162, 4, 0, '004-020', '', 'FC4 FC4S八爪魚夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/162.jpg', 1, '2023-03-20 17:44:01', '0000-00-00 00:00:00'),
(163, 4, 0, '004-021', '', 'FC6 FC6S  鱷魚夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/163.jpg', 1, '2023-03-20 17:44:18', '0000-00-00 00:00:00'),
(164, 8, 0, '008-22', '', 'FMY27 可愛怪獸吸盤玩具 5', '65.00', 'This is a test description.', 'assets/products_image/650/164.jpg', 1, '2023-03-20 17:44:24', '0000-00-00 00:00:00'),
(165, 14, 0, '014-13', '', 'OM17 火車哨子', '65.00', 'This is a test description.', 'assets/products_image/650/165.jpg', 1, '2023-03-20 17:44:28', '0000-00-00 00:00:00'),
(166, 8, 0, '008-23', '', 'FMY28 蛋蛋怪獸吸盤玩具 5', '65.00', 'This is a test description.', 'assets/products_image/650/166.jpg', 1, '2023-03-20 17:44:59', '0000-00-00 00:00:00'),
(167, 14, 0, '014-14', '', 'OM18 汽笛哨子', '65.00', 'This is a test description.', 'assets/products_image/650/167.jpg', 1, '2023-03-20 17:45:14', '0000-00-00 00:00:00'),
(168, 4, 0, '004-022', '', 'FC6 FC6S 鱷魚夾 1', '65.00', 'This is a test description.', 'assets/products_image/650/168.jpg', 1, '2023-03-20 17:45:17', '0000-00-00 00:00:00'),
(169, 4, 0, '004-023', '', 'FC6 FC6S 鱷魚夾 3', '65.00', 'This is a test description.', 'assets/products_image/650/169.jpg', 1, '2023-03-20 17:45:34', '0000-00-00 00:00:00'),
(170, 8, 0, '008-24', '', 'FMY30 爆谷夾夾蟲蟲玩具 ', '65.00', 'This is a test description.', 'assets/products_image/650/170.jpg', 1, '2023-03-20 17:45:34', '0000-00-00 00:00:00'),
(171, 14, 0, '014-15', '', 'OM20 懸浮球哨子1', '65.00', 'This is a test description.', 'assets/products_image/650/171.jpg', 1, '2023-03-20 17:45:49', '0000-00-00 00:00:00'),
(172, 4, 0, '004-024', '', 'FC7 FC7S 爆谷夾 1  ', '65.00', 'This is a test description.', 'assets/products_image/650/172.jpg', 1, '2023-03-20 17:45:54', '0000-00-00 00:00:00'),
(173, 8, 0, '008-25', '', 'FMY30 爆谷夾夾蟲蟲玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/173.jpg', 1, '2023-03-20 17:46:06', '0000-00-00 00:00:00'),
(174, 14, 0, '014-16', '', 'OM20 懸浮球哨子2', '65.00', 'This is a test description.', 'assets/products_image/650/174.jpg', 1, '2023-03-20 17:46:23', '0000-00-00 00:00:00'),
(175, 4, 0, '004-025', '', 'FC7 FC7S 爆谷夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/175.jpg', 1, '2023-03-20 17:46:28', '0000-00-00 00:00:00'),
(176, 8, 0, '008-26', '', 'FMY30 爆谷夾夾蟲蟲玩具 3', '65.00', 'This is a test description.', 'assets/products_image/650/176.jpg', 1, '2023-03-20 17:46:42', '0000-00-00 00:00:00'),
(177, 4, 0, '004-026', '', 'FC7 FC7S 爆谷夾 3', '65.00', 'This is a test description.', 'assets/products_image/650/177.jpg', 1, '2023-03-20 17:47:22', '0000-00-00 00:00:00'),
(178, 8, 0, '008-27', '', 'FMY31 超級分類派夾夾玩具1 ', '65.00', 'This is a test description.', 'assets/products_image/650/178.jpg', 1, '2023-03-20 17:47:23', '0000-00-00 00:00:00'),
(179, 15, 0, '015-1', '', 'TL1 聽樂治療耳筒1', '65.00', 'This is a test description.', 'assets/products_image/650/179.jpg', 1, '2023-03-20 17:47:55', '0000-00-00 00:00:00'),
(180, 4, 0, '004-027', '', 'FC8 FC8S 珍寶大膠夾 1', '65.00', 'This is a test description.', 'assets/products_image/650/180.jpg', 1, '2023-03-20 17:48:01', '0000-00-00 00:00:00'),
(181, 8, 0, '008-28', '', 'FMY31 超級分類派夾夾玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/181.jpg', 1, '2023-03-20 17:48:08', '0000-00-00 00:00:00'),
(182, 4, 0, '004-028', '', 'FC8 FC8S 珍寶大膠夾 3', '65.00', 'This is a test description.', 'assets/products_image/650/182.jpg', 1, '2023-03-20 17:48:22', '0000-00-00 00:00:00'),
(183, 15, 0, '015-2', '', 'TL2 聽樂治療mp3 播放器1', '65.00', 'This is a test description.', 'assets/products_image/650/183.jpg', 1, '2023-03-20 17:48:26', '0000-00-00 00:00:00'),
(184, 8, 0, '008-29', '', 'FMY31 超級分類派夾夾玩具3', '65.00', 'This is a test description.', 'assets/products_image/650/184.jpg', 1, '2023-03-20 17:48:37', '0000-00-00 00:00:00'),
(185, 4, 0, '004-029', '', 'FC8 FC8S珍寶大膠夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/185.jpg', 1, '2023-03-20 17:48:42', '0000-00-00 00:00:00'),
(186, 15, 0, '015-3', '', 'TL2 聽樂治療mp3 播放器2', '65.00', 'This is a test description.', 'assets/products_image/650/186.jpg', 1, '2023-03-20 17:48:55', '0000-00-00 00:00:00'),
(187, 8, 0, '008-30', '', 'FMY32 動物餵食夾夾玩具1', '65.00', 'This is a test description.', 'assets/products_image/650/187.jpg', 1, '2023-03-20 17:49:10', '0000-00-00 00:00:00'),
(188, 4, 0, '004-030', '', 'FC10 不鏽鋼鐵夾 1', '65.00', 'This is a test description.', 'assets/products_image/650/188.jpg', 1, '2023-03-20 17:49:19', '0000-00-00 00:00:00'),
(189, 15, 0, '015-4', '', 'TL3 聽樂治療耳筒替換電線1', '65.00', 'This is a test description.', 'assets/products_image/650/189.jpg', 1, '2023-03-20 17:49:21', '0000-00-00 00:00:00'),
(190, 4, 0, '004-031', '', 'FC10 不鏽鋼鐵夾 2', '65.00', 'This is a test description.', 'assets/products_image/650/190.jpg', 1, '2023-03-20 17:49:39', '0000-00-00 00:00:00'),
(191, 8, 0, '008-31', '', 'FMY32 動物餵食夾夾玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/191.jpg', 1, '2023-03-20 17:49:43', '0000-00-00 00:00:00'),
(192, 8, 0, '008-32', '', 'FMY32 動物餵食夾夾玩具3', '65.00', 'This is a test description.', 'assets/products_image/650/192.jpg', 1, '2023-03-20 17:50:13', '0000-00-00 00:00:00'),
(193, 16, 0, '016-1', '', 'WB1 1磅重力海獅公仔 ', '65.00', 'This is a test description.', 'assets/products_image/650/193.jpg', 1, '2023-03-20 17:50:35', '0000-00-00 00:00:00'),
(194, 4, 0, '004-032', '', 'FC15 FC15S 剪刀鏟鉗 1', '65.00', 'This is a test description.', 'assets/products_image/650/194.jpg', 1, '2023-03-20 17:50:58', '0000-00-00 00:00:00'),
(195, 8, 0, '008-33', '', 'FMY35F 農場洞洞板穿繩玩具1', '65.00', 'This is a test description.', 'assets/products_image/650/195.jpg', 1, '2023-03-20 17:51:02', '0000-00-00 00:00:00'),
(196, 16, 0, '016-2', '', 'WB2 2磅重力啡熊公仔', '65.00', 'This is a test description.', 'assets/products_image/650/196.jpg', 1, '2023-03-20 17:51:08', '0000-00-00 00:00:00'),
(197, 4, 0, '004-033', '', 'FC15 FC15S 剪刀鏟鉗 2', '65.00', 'This is a test description.', 'assets/products_image/650/197.jpg', 1, '2023-03-20 17:51:22', '0000-00-00 00:00:00'),
(198, 8, 0, '008-34', '', 'FMY35F 農場洞洞板穿繩玩具2 ', '65.00', 'This is a test description.', 'assets/products_image/650/198.jpg', 1, '2023-03-20 17:52:07', '0000-00-00 00:00:00'),
(199, 16, 0, '016-3', '', 'WB4B 4磅重力黑狗仔墊', '65.00', 'This is a test description.', 'assets/products_image/650/199.jpg', 1, '2023-03-20 17:52:33', '0000-00-00 00:00:00'),
(200, 8, 0, '008-35', '', 'FMY35P 寵物洞洞板穿繩玩具1', '65.00', 'This is a test description.', 'assets/products_image/650/200.jpg', 1, '2023-03-20 17:52:38', '0000-00-00 00:00:00'),
(201, 16, 0, '016-4', '', 'WB4D WB4S 4磅動物重力墊1', '65.00', 'This is a test description.', 'assets/products_image/650/201.jpg', 1, '2023-03-20 17:53:02', '0000-00-00 00:00:00'),
(202, 8, 0, '008-36', '', 'FMY35P 寵物洞洞板穿繩玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/202.jpg', 1, '2023-03-20 17:53:04', '0000-00-00 00:00:00'),
(203, 4, 0, '004-034', '', 'FC16 FC16S 球形剪刀 1', '65.00', 'This is a test description.', 'assets/products_image/650/203.jpg', 1, '2023-03-20 17:53:11', '0000-00-00 00:00:00'),
(204, 4, 0, '004-035', '', 'FC16 FC16S 球形剪刀 2', '65.00', 'This is a test description.', 'assets/products_image/650/204.jpg', 1, '2023-03-20 17:53:34', '0000-00-00 00:00:00'),
(205, 16, 0, '016-5', '', 'WB4D WB4S 動物重力墊2', '65.00', 'This is a test description.', 'assets/products_image/650/205.jpg', 1, '2023-03-20 17:53:41', '0000-00-00 00:00:00'),
(206, 8, 0, '008-37', '', 'FMY36 衫鈕穿繩玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/206.jpg', 1, '2023-03-20 17:53:57', '0000-00-00 00:00:00'),
(207, 16, 0, '016-6', '', 'WB4L 4.4磅 重力蜥蜴公仔1', '65.00', 'This is a test description.', 'assets/products_image/650/207.jpg', 1, '2023-03-20 17:54:18', '0000-00-00 00:00:00'),
(208, 5, 0, '005-001', '', 'SK1 2cm 彩色圓形貼紙1', '65.00', 'This is a test description.', 'assets/products_image/650/208.jpg', 1, '2023-03-20 17:54:26', '0000-00-00 00:00:00'),
(209, 8, 0, '008-38', '', 'FMY36 衫鈕穿繩玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/209.jpg', 1, '2023-03-20 17:54:37', '0000-00-00 00:00:00'),
(210, 5, 0, '005-002', '', 'SK1 2cm 彩色圓形貼紙2', '65.00', 'This is a test description.', 'assets/products_image/650/210.jpg', 1, '2023-03-20 17:54:43', '0000-00-00 00:00:00'),
(211, 16, 0, '016-7', '', 'WB4L 4.4磅 重力蜥蜴公仔2', '65.00', 'This is a test description.', 'assets/products_image/650/211.jpg', 1, '2023-03-20 17:54:50', '0000-00-00 00:00:00'),
(212, 5, 0, '005-003', '', 'SK2 1.9cm 彩色圓形貼紙1', '65.00', 'This is a test description.', 'assets/products_image/650/212.jpg', 1, '2023-03-20 17:54:59', '0000-00-00 00:00:00'),
(213, 8, 0, '008-39', '', 'FMY36 衫鈕穿繩玩具 3', '65.00', 'This is a test description.', 'assets/products_image/650/213.jpg', 1, '2023-03-20 17:55:04', '0000-00-00 00:00:00'),
(214, 5, 0, '005-004', '', 'SK2 1.9cm 彩色圓形貼紙2', '65.00', 'This is a test description.', 'assets/products_image/650/214.jpg', 1, '2023-03-20 17:55:17', '0000-00-00 00:00:00'),
(215, 16, 0, '016-8', '', 'WB5K 籃球重力墊1', '65.00', 'This is a test description.', 'assets/products_image/650/215.jpg', 1, '2023-03-20 17:55:31', '0000-00-00 00:00:00'),
(216, 8, 0, '008-40', '', 'FMY40 英文字母釣魚玩具 1', '65.00', 'This is a test description.', 'assets/products_image/650/216.jpg', 1, '2023-03-20 17:55:32', '0000-00-00 00:00:00'),
(217, 5, 0, '005-005', '', 'SK3 單色圓形貼紙1', '65.00', 'This is a test description.', 'assets/products_image/650/217.jpg', 1, '2023-03-20 17:55:36', '0000-00-00 00:00:00'),
(218, 5, 0, '005-006', '', 'SK3 單色圓形貼紙2', '65.00', 'This is a test description.', 'assets/products_image/650/218.jpg', 1, '2023-03-20 17:55:50', '0000-00-00 00:00:00'),
(219, 16, 0, '016-9', '', 'WB5K 籃球重力墊2', '65.00', 'This is a test description.', 'assets/products_image/650/219.jpg', 1, '2023-03-20 17:55:55', '0000-00-00 00:00:00'),
(220, 8, 0, '008-41', '', 'FMY40 英文字母釣魚玩具 2', '65.00', 'This is a test description.', 'assets/products_image/650/220.jpg', 1, '2023-03-20 17:55:59', '0000-00-00 00:00:00'),
(221, 5, 0, '005-007', '', 'SK3 單色圓形貼紙4', '65.00', 'This is a test description.', 'assets/products_image/650/221.jpg', 1, '2023-03-20 17:56:10', '0000-00-00 00:00:00'),
(222, 5, 0, '005-008', '', 'SK4 單色圓形貼紙4', '65.00', 'This is a test description.', 'assets/products_image/650/222.jpg', 1, '2023-03-20 17:56:25', '0000-00-00 00:00:00'),
(223, 16, 0, '016-10', '', 'WB15 重力緊身背心1', '65.00', 'This is a test description.', 'assets/products_image/650/223.jpg', 1, '2023-03-20 17:56:34', '0000-00-00 00:00:00'),
(224, 5, 0, '005-009', '', 'SK5 AP 噴修膠膜 1', '65.00', 'This is a test description.', 'assets/products_image/650/224.jpg', 1, '2023-03-20 17:56:37', '0000-00-00 00:00:00'),
(225, 5, 0, '005-010', '', 'SK6 動物造型貼紙 1', '65.00', 'This is a test description.', 'assets/products_image/650/225.jpg', 1, '2023-03-20 17:56:51', '0000-00-00 00:00:00'),
(226, 16, 0, '016-11', '', 'WB15 重力緊身背心2', '65.00', 'This is a test description.', 'assets/products_image/650/226.jpg', 1, '2023-03-20 17:56:55', '0000-00-00 00:00:00'),
(227, 5, 0, '005-011', '', 'SK6 動物造型貼紙 2', '65.00', 'This is a test description.', 'assets/products_image/650/227.jpg', 1, '2023-03-20 17:57:06', '0000-00-00 00:00:00'),
(228, 9, 0, '009-1', '', 'VP1 木製拼圖積木1', '65.00', 'This is a test description.', 'assets/products_image/650/228.jpg', 1, '2023-03-20 17:57:08', '0000-00-00 00:00:00'),
(229, 5, 0, '005-012', '', 'SK10 工程車印章', '65.00', 'This is a test description.', 'assets/products_image/650/229.jpg', 1, '2023-03-20 17:57:24', '0000-00-00 00:00:00'),
(230, 16, 0, '016-112', '', 'WB15重力緊身背心3', '65.00', 'This is a test description.', 'assets/products_image/650/230.jpg', 1, '2023-03-20 17:57:25', '0000-00-00 00:00:00'),
(231, 5, 0, '005-013', '', 'SK11 動物印章1 ', '65.00', 'This is a test description.', 'assets/products_image/650/231.jpg', 1, '2023-03-20 17:57:40', '0000-00-00 00:00:00'),
(232, 5, 0, '005-014', '', 'SK11 動物印章2', '65.00', 'This is a test description.', 'assets/products_image/650/232.jpg', 1, '2023-03-20 17:57:55', '0000-00-00 00:00:00'),
(233, 9, 0, '009-2', '', 'VP1 木製拼圖積木2', '65.00', 'This is a test description.', 'assets/products_image/650/233.jpg', 1, '2023-03-20 17:58:03', '0000-00-00 00:00:00'),
(234, 5, 0, '005-015', '', 'SK11 動物印章3', '65.00', 'This is a test description.', 'assets/products_image/650/234.jpg', 1, '2023-03-20 17:58:15', '0000-00-00 00:00:00'),
(235, 16, 0, '016-13', '', 'WBB3 3磅壓力被重力毯1', '65.00', 'This is a test description.', 'assets/products_image/650/235.jpg', 1, '2023-03-20 17:58:25', '0000-00-00 00:00:00'),
(236, 9, 0, '009-3', '', 'VP1 木製拼圖積木3', '65.00', 'This is a test description.', 'assets/products_image/650/236.jpg', 1, '2023-03-20 17:58:48', '0000-00-00 00:00:00'),
(237, 16, 0, '016-14', '', 'WBB3 3磅壓力被重力毯2', '65.00', 'This is a test description.', 'assets/products_image/650/237.jpg', 1, '2023-03-20 17:59:29', '0000-00-00 00:00:00'),
(238, 5, 0, '005-016', '', 'SK12 時鐘原子印1', '65.00', 'This is a test description.', 'assets/products_image/650/238.jpg', 1, '2023-03-20 17:59:44', '0000-00-00 00:00:00'),
(239, 9, 0, '009-4', '', 'VP2 Spot it! 卡牌1', '65.00', 'This is a test description.', 'assets/products_image/650/239.jpg', 1, '2023-03-20 17:59:52', '0000-00-00 00:00:00'),
(240, 5, 0, '005-017', '', 'SK15 手指畫顏料印章 1', '65.00', 'This is a test description.', 'assets/products_image/650/240.jpg', 1, '2023-03-20 18:00:02', '0000-00-00 00:00:00'),
(241, 16, 0, '016-15', '', 'WBB3 3磅壓力被重力毯3', '65.00', 'This is a test description.', 'assets/products_image/650/241.jpg', 1, '2023-03-20 18:00:21', '0000-00-00 00:00:00'),
(242, 5, 0, '005-018', '', 'SK15 手指畫顏料印章 2', '65.00', 'This is a test description.', 'assets/products_image/650/242.jpg', 1, '2023-03-20 18:00:25', '0000-00-00 00:00:00'),
(243, 9, 0, '009-5', '', 'VP2 Spot it! 卡牌2', '65.00', 'This is a test description.', 'assets/products_image/650/243.jpg', 1, '2023-03-20 18:00:36', '0000-00-00 00:00:00'),
(244, 5, 0, '005-019', '', 'SK15 手指畫顏料印章 3', '65.00', 'This is a test description.', 'assets/products_image/650/244.jpg', 1, '2023-03-20 18:00:45', '0000-00-00 00:00:00'),
(245, 16, 0, '016-16', '', 'WBB5 5磅壓力被重力毯1', '65.00', 'This is a test description.', 'assets/products_image/650/245.jpg', 1, '2023-03-20 18:01:06', '0000-00-00 00:00:00'),
(246, 9, 0, '009-6', '', 'VP3 橡皮圈創作板1', '65.00', 'This is a test description.', 'assets/products_image/650/246.jpg', 1, '2023-03-20 18:01:06', '0000-00-00 00:00:00'),
(247, 9, 0, '009-7', '', 'VP3 橡皮圈創作板2', '65.00', 'This is a test description.', 'assets/products_image/650/247.jpg', 1, '2023-03-20 18:01:49', '0000-00-00 00:00:00'),
(248, 16, 0, '016-17', '', 'WBB5 5磅壓力被重力毯2', '65.00', 'This is a test description.', 'assets/products_image/650/248.jpg', 1, '2023-03-20 18:02:02', '0000-00-00 00:00:00'),
(249, 9, 0, '009-8', '', 'VP3 橡皮圈創作板3', '65.00', 'This is a test description.', 'assets/products_image/650/249.jpg', 1, '2023-03-20 18:02:27', '0000-00-00 00:00:00'),
(250, 16, 0, '016-18', '', 'WBB7 7 磅重壓力被重力毯2', '65.00', 'This is a test description.', 'assets/products_image/650/250.jpg', 1, '2023-03-20 18:02:38', '0000-00-00 00:00:00'),
(251, 9, 0, '009-9', '', 'VP3 橡皮圈創作板4', '65.00', 'This is a test description.', 'assets/products_image/650/251.jpg', 1, '2023-03-20 18:02:56', '0000-00-00 00:00:00'),
(252, 9, 0, '009-10', '', 'VP4 小精靈方塊遊戲1', '65.00', 'This is a test description.', 'assets/products_image/650/252.jpg', 1, '2023-03-20 18:03:46', '0000-00-00 00:00:00'),
(253, 9, 0, '009-11', '', 'VP4 小精靈方塊遊戲2', '65.00', 'This is a test description.', 'assets/products_image/650/253.jpg', 1, '2023-03-20 18:04:32', '0000-00-00 00:00:00'),
(254, 17, 0, '017-1', '', 'PF1 Playfoam 單色球1', '65.00', 'This is a test description.', 'assets/products_image/650/254.jpg', 1, '2023-03-20 18:04:54', '0000-00-00 00:00:00'),
(255, 17, 0, '017-2', '', 'PF1 Playfoam 單色球1', '65.00', 'This is a test description.', 'assets/products_image/650/255.jpg', 1, '2023-03-20 18:06:24', '0000-00-00 00:00:00'),
(256, 10, 0, '010-1', '', 'HW1 韓國蛋形蠟筆 1', '65.00', 'This is a test description.', 'assets/products_image/650/256.jpg', 1, '2023-03-20 18:06:33', '0000-00-00 00:00:00'),
(257, 17, 0, '017-3', '', 'PF1 Playfoam 單色球3', '65.00', 'This is a test description.', 'assets/products_image/650/257.jpg', 1, '2023-03-20 18:06:56', '0000-00-00 00:00:00'),
(258, 10, 0, '010-2', '', 'HW1 韓國蛋形蠟筆 2', '65.00', 'This is a test description.', 'assets/products_image/650/258.jpg', 1, '2023-03-20 18:07:09', '0000-00-00 00:00:00'),
(259, 10, 0, '010-2', '', 'HW2 日本插插積木蠟筆', '65.00', 'This is a test description.', 'assets/products_image/650/259.jpg', 1, '2023-03-20 18:07:37', '0000-00-00 00:00:00'),
(260, 10, 0, '010-3', '', 'HW3 日本戒指蠟筆1', '65.00', 'This is a test description.', 'assets/products_image/650/260.jpg', 1, '2023-03-20 18:08:07', '0000-00-00 00:00:00'),
(261, 10, 0, '010-4', '', 'HW3 日本戒指蠟筆2', '65.00', 'This is a test description.', 'assets/products_image/650/261.jpg', 1, '2023-03-20 18:08:37', '0000-00-00 00:00:00'),
(262, 10, 0, '010-5', '', 'HW4 日本特大三角蠟筆1', '65.00', 'This is a test description.', 'assets/products_image/650/262.jpg', 1, '2023-03-20 18:09:06', '0000-00-00 00:00:00'),
(263, 10, 0, '010-6', '', 'HW4 日本特大三角蠟筆2', '65.00', 'This is a test description.', 'assets/products_image/650/263.jpg', 1, '2023-03-20 18:09:56', '0000-00-00 00:00:00'),
(264, 10, 0, '010-7', '', 'HW4 日本特大三角蠟筆3', '65.00', 'This is a test description.', 'assets/products_image/650/264.jpg', 1, '2023-03-20 18:10:36', '0000-00-00 00:00:00'),
(265, 10, 0, '010-8', '', 'HW8 特大粉筆2', '65.00', 'This is a test description.', 'assets/products_image/650/265.jpg', 1, '2023-03-20 18:12:00', '0000-00-00 00:00:00'),
(266, 10, 0, '010-9', '', 'HW8 特大粉筆3', '65.00', 'This is a test description.', 'assets/products_image/650/266.jpg', 1, '2023-03-20 18:12:40', '0000-00-00 00:00:00'),
(267, 10, 0, '010-10', '', 'HW10 叉叉筆1', '65.00', 'This is a test description.', 'assets/products_image/650/267.jpg', 1, '2023-03-20 18:13:34', '0000-00-00 00:00:00'),
(268, 10, 0, '010-11', '', 'HW10 叉叉筆2', '65.00', 'This is a test description.', 'assets/products_image/650/268.jpg', 1, '2023-03-20 18:14:13', '0000-00-00 00:00:00'),
(269, 10, 0, '010-12', '', 'HW10R 叉叉筆筆芯1', '65.00', 'This is a test description.', 'assets/products_image/650/269.jpg', 1, '2023-03-20 18:14:43', '0000-00-00 00:00:00'),
(270, 10, 0, '010-13', '', 'HW12  震震筆2', '65.00', 'This is a test description.', 'assets/products_image/650/270.jpg', 1, '2023-03-20 18:15:08', '0000-00-00 00:00:00'),
(271, 10, 0, '010-14', '', 'HW12 震震筆1', '65.00', 'This is a test description.', 'assets/products_image/650/271.jpg', 1, '2023-03-20 18:15:49', '0000-00-00 00:00:00'),
(272, 10, 0, '010-15', '', 'HW15 洞洞三角幼鉛筆', '65.00', 'This is a test description.', 'assets/products_image/650/272.jpg', 1, '2023-03-20 18:16:33', '0000-00-00 00:00:00'),
(273, 10, 0, '010-16', '', 'HW16 幼身白板筆', '65.00', 'This is a test description.', 'assets/products_image/650/273.jpg', 1, '2023-03-20 18:16:56', '0000-00-00 00:00:00'),
(274, 10, 0, '010-17', '', 'HW20 加重手腕帶1', '65.00', 'This is a test description.', 'assets/products_image/650/274.jpg', 1, '2023-03-20 18:17:23', '0000-00-00 00:00:00'),
(275, 10, 0, '010-18', '', 'HW20 加重手腕帶2', '65.00', 'This is a test description.', 'assets/products_image/650/275.jpg', 1, '2023-03-20 18:17:49', '0000-00-00 00:00:00'),
(276, 10, 0, '010-19', '', 'HW21  閱讀書寫斜板3', '65.00', 'This is a test description.', 'assets/products_image/650/276.jpg', 1, '2023-03-20 18:18:14', '0000-00-00 00:00:00'),
(277, 10, 0, '010-20', '', 'HW21  閱讀書寫斜板4', '65.00', 'This is a test description.', 'assets/products_image/650/277.jpg', 1, '2023-03-20 18:18:45', '0000-00-00 00:00:00'),
(278, 10, 0, '010-21', '', 'HW21  閱讀書寫斜板5', '65.00', 'This is a test description.', 'assets/products_image/650/278.jpg', 1, '2023-03-20 18:19:30', '0000-00-00 00:00:00'),
(279, 10, 0, '010-22', '', 'HW21 閱讀書寫斜板1', '65.00', 'This is a test description.', 'assets/products_image/650/279.jpg', 1, '2023-03-20 18:19:59', '0000-00-00 00:00:00'),
(280, 10, 0, '010-23', '', 'HW21 閱讀書寫斜板2', '65.00', 'This is a test description.', 'assets/products_image/650/280.jpg', 1, '2023-03-20 18:20:59', '0000-00-00 00:00:00'),
(281, 10, 0, '010-24', '', 'HW25C HW25E 中英文書寫磁板1', '65.00', 'This is a test description.', 'assets/products_image/650/281.jpg', 1, '2023-03-20 18:21:25', '0000-00-00 00:00:00'),
(282, 10, 0, '010-25', '', 'HW25C HW25E 中英文書寫磁板2', '65.00', 'This is a test description.', 'assets/products_image/650/282.jpg', 1, '2023-03-20 18:21:52', '0000-00-00 00:00:00'),
(283, 17, 0, '017-4', '', 'PF2 Playfoam 英文字學習套裝大盒1', '65.00', 'This is a test description.', 'assets/products_image/650/283.jpg', 1, '2023-03-20 18:21:58', '0000-00-00 00:00:00'),
(284, 10, 0, '010-26', '', 'HW25C HW25E 中英文書寫磁板3', '65.00', 'This is a test description.', 'assets/products_image/650/284.jpg', 1, '2023-03-20 18:22:20', '0000-00-00 00:00:00'),
(285, 10, 0, '010-27', '', 'HW25C HW25E 中英文書寫磁板4', '65.00', 'This is a test description.', 'assets/products_image/650/285.jpg', 1, '2023-03-20 18:22:51', '0000-00-00 00:00:00'),
(286, 10, 0, '010-28', '', 'HW30  英文大楷木片組裝黑白學習套2', '65.00', 'This is a test description.', 'assets/products_image/650/286.jpg', 1, '2023-03-20 18:23:19', '0000-00-00 00:00:00'),
(287, 17, 0, '017-5', '', 'PF2 Playfoam 英文字學習套裝大盒3', '65.00', 'This is a test description.', 'assets/products_image/650/287.jpg', 1, '2023-03-20 18:23:22', '0000-00-00 00:00:00'),
(288, 10, 0, '010-29', '', 'HW30 英文大楷木片組裝黑白學習套1', '65.00', 'This is a test description.', 'assets/products_image/650/288.jpg', 1, '2023-03-20 18:23:47', '0000-00-00 00:00:00'),
(289, 11, 0, '011-1', '', 'PG1 大蛋蛋執筆膠 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/289.jpg', 1, '2023-03-20 18:26:40', '0000-00-00 00:00:00'),
(290, 11, 0, '011-2', '', 'PG1 大蛋蛋執筆膠 2', '65.00', 'This is a test description.', 'assets/products_image/650/290.jpg', 1, '2023-03-20 18:28:19', '0000-00-00 00:00:00'),
(291, 17, 0, '017-6', '', 'PF2Playfoam 英文字學習套裝大盒2', '65.00', 'This is a test description.', 'assets/products_image/650/291.jpg', 1, '2023-03-20 18:28:30', '0000-00-00 00:00:00'),
(292, 11, 0, '011-3', '', 'PG2 長蛋蛋執筆膠 1', '65.00', 'This is a test description.', 'assets/products_image/650/292.jpg', 1, '2023-03-20 18:29:13', '0000-00-00 00:00:00'),
(293, 17, 0, '017-7', '', 'PF3 Playfoam 數數學習套裝大盒 1', '65.00', 'This is a test description.', 'assets/products_image/650/293.jpg', 1, '2023-03-20 18:29:19', '0000-00-00 00:00:00'),
(294, 11, 0, '011-4', '', 'PG2 長蛋蛋執筆膠 2', '65.00', 'This is a test description.', 'assets/products_image/650/294.jpg', 1, '2023-03-20 18:29:49', '0000-00-00 00:00:00');
INSERT INTO `product` (`id`, `category_id`, `store_id`, `product_code`, `product_weight`, `p_name`, `product_price`, `description`, `p_image`, `status`, `inserted_at`, `updated_at`) VALUES
(295, 17, 0, '017-8', '', 'PF3 Playfoam 數數學習套裝大盒 2', '65.00', 'This is a test description.', 'assets/products_image/650/295.jpg', 1, '2023-03-20 18:30:08', '0000-00-00 00:00:00'),
(296, 11, 0, '011-5', '', 'PG2 長蛋蛋執筆膠 3', '65.00', 'This is a test description.', 'assets/products_image/650/296.jpg', 1, '2023-03-20 18:30:34', '0000-00-00 00:00:00'),
(297, 17, 0, '017-9', '', 'PF3 Playfoam 數數學習套裝大盒 3', '65.00', 'This is a test description.', 'assets/products_image/650/297.jpg', 1, '2023-03-20 18:30:58', '0000-00-00 00:00:00'),
(298, 11, 0, '011-6', '', 'PG2 長蛋蛋執筆膠 4', '65.00', 'This is a test description.', 'assets/products_image/650/298.jpg', 1, '2023-03-20 18:31:02', '0000-00-00 00:00:00'),
(299, 11, 0, '011-7', '', 'PG3 盾牌執筆膠1', '65.00', 'This is a test description.', 'assets/products_image/650/299.jpg', 1, '2023-03-20 18:31:31', '0000-00-00 00:00:00'),
(300, 17, 0, '017-10', '', 'PF4E PF4M PF4C PF4A Playfoam 學習套裝小盒 3', '65.00', 'This is a test description.', 'assets/products_image/650/300.jpg', 1, '2023-03-20 18:32:06', '0000-00-00 00:00:00'),
(301, 11, 0, '011-8', '', 'PG3 盾牌執筆膠2', '65.00', 'This is a test description.', 'assets/products_image/650/301.jpg', 1, '2023-03-20 18:32:24', '0000-00-00 00:00:00'),
(302, 17, 0, '017-11', '', 'PF4E PF4M PF4C PF4A Playfoam 學習套裝小盒1', '65.00', 'This is a test description.', 'assets/products_image/650/302.jpg', 1, '2023-03-20 18:32:44', '0000-00-00 00:00:00'),
(303, 17, 0, '017-12', '', 'PF4E PF4M PF4C PF4A Playfoam 學習套裝小盒2', '65.00', 'This is a test description.', 'assets/products_image/650/303.jpg', 1, '2023-03-20 18:33:13', '0000-00-00 00:00:00'),
(304, 17, 0, '017-13', '', 'PF8 Playfoam 春季套裝1', '65.00', 'This is a test description.', 'assets/products_image/650/304.jpg', 1, '2023-03-20 18:33:37', '0000-00-00 00:00:00'),
(305, 17, 0, '017-14', '', 'PF8 Playfoam 春季套裝2', '65.00', 'This is a test description.', 'assets/products_image/650/305.jpg', 1, '2023-03-20 18:33:59', '0000-00-00 00:00:00'),
(306, 17, 0, '017-15', '', 'PF8 Playfoam 春季套裝3', '65.00', 'This is a test description.', 'assets/products_image/650/306.jpg', 1, '2023-03-20 18:34:27', '0000-00-00 00:00:00'),
(307, 11, 0, '011-9', '', 'PG4 猴子款執筆膠 1', '65.00', 'This is a test description.', 'assets/products_image/650/307.jpg', 1, '2023-03-20 18:34:47', '0000-00-00 00:00:00'),
(308, 17, 0, '017-16', '', 'PF8 Playfoam 春季套裝5', '65.00', 'This is a test description.', 'assets/products_image/650/308.jpg', 1, '2023-03-20 18:34:53', '0000-00-00 00:00:00'),
(309, 17, 0, '017-17', '', 'PF8 Playfoam 春季套裝6', '65.00', 'This is a test description.', 'assets/products_image/650/309.jpg', 1, '2023-03-20 18:35:14', '0000-00-00 00:00:00'),
(310, 11, 0, '011-10', '', 'PG4 猴子款執筆膠 2', '65.00', 'This is a test description.', 'assets/products_image/650/310.jpg', 1, '2023-03-20 18:35:20', '0000-00-00 00:00:00'),
(311, 17, 0, '017-18', '', 'PF8 Playfoam春季套裝4', '65.00', 'This is a test description.', 'assets/products_image/650/311.jpg', 1, '2023-03-20 18:35:36', '0000-00-00 00:00:00'),
(312, 11, 0, '011-11', '', 'PG4 猴子款執筆膠 3', '65.00', 'This is a test description.', 'assets/products_image/650/312.jpg', 1, '2023-03-20 18:35:47', '0000-00-00 00:00:00'),
(313, 17, 0, '017-19', '', 'TA1SA 觸感探索套裝 (二) 1', '65.00', 'This is a test description.', 'assets/products_image/650/313.jpg', 1, '2023-03-20 18:35:59', '0000-00-00 00:00:00'),
(314, 11, 0, '011-11', '', 'PG4 猴子款執筆膠 4', '65.00', 'This is a test description.', 'assets/products_image/650/314.jpg', 1, '2023-03-20 18:36:12', '0000-00-00 00:00:00'),
(315, 17, 0, '017-20', '', 'TA1SA 觸感探索套裝 (二) 2', '65.00', 'This is a test description.', 'assets/products_image/650/315.jpg', 1, '2023-03-20 18:36:21', '0000-00-00 00:00:00'),
(316, 11, 0, '011-12', '', 'PG4 猴子款執筆膠 5', '65.00', 'This is a test description.', 'assets/products_image/650/316.jpg', 1, '2023-03-20 18:36:49', '0000-00-00 00:00:00'),
(317, 11, 0, '011-13', '', 'PG5 大象款執筆膠 1', '65.00', 'This is a test description.', 'assets/products_image/650/317.jpg', 1, '2023-03-20 18:37:29', '0000-00-00 00:00:00'),
(318, 17, 0, '017-21', '', 'TA1SF 觸感探索套裝 (一) 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/318.jpg', 1, '2023-03-20 18:37:56', '0000-00-00 00:00:00'),
(319, 11, 0, '011-13', '', 'PG5 大象款執筆膠 2', '65.00', 'This is a test description.', 'assets/products_image/650/319.jpg', 1, '2023-03-20 18:38:01', '0000-00-00 00:00:00'),
(320, 11, 0, '011-14', '', 'PG5 大象款執筆膠 3', '65.00', 'This is a test description.', 'assets/products_image/650/320.jpg', 1, '2023-03-20 18:38:32', '0000-00-00 00:00:00'),
(321, 11, 0, '011-15', '', 'PG5 大象款執筆膠 4', '65.00', 'This is a test description.', 'assets/products_image/650/321.jpg', 1, '2023-03-20 18:39:05', '0000-00-00 00:00:00'),
(322, 11, 0, '011-16', '', 'PG6 重力執筆膠 1', '65.00', 'This is a test description.', 'assets/products_image/650/322.jpg', 1, '2023-03-20 18:39:31', '0000-00-00 00:00:00'),
(324, 11, 0, '011-17', '', 'PG6 重力執筆膠 2', '65.00', 'This is a test description.', 'assets/products_image/650/324.jpg', 1, '2023-03-20 18:40:03', '0000-00-00 00:00:00'),
(325, 11, 0, '011-18', '', 'PG7 條條執筆膠1', '65.00', 'This is a test description.', 'assets/products_image/650/325.jpg', 1, '2023-03-20 18:40:33', '0000-00-00 00:00:00'),
(326, 11, 0, '011-19', '', 'PG7 條條執筆膠13', '65.00', 'This is a test description.', 'assets/products_image/650/326.jpg', 1, '2023-03-20 18:41:42', '0000-00-00 00:00:00'),
(327, 11, 0, '011-20', '', 'PG8 鬚鬚捏捏執筆膠1', '65.00', 'This is a test description.', 'assets/products_image/650/327.jpg', 1, '2023-03-20 18:42:06', '0000-00-00 00:00:00'),
(328, 11, 0, '011-21', '', 'PG8 鬚鬚捏捏執筆膠2', '65.00', 'This is a test description.', 'assets/products_image/650/328.jpg', 1, '2023-03-20 18:43:10', '0000-00-00 00:00:00'),
(329, 12, 0, '012-1', '', 'SC1 彎形匙羹', '65.00', 'This is a test description.', 'assets/products_image/650/329.jpg', 1, '2023-03-20 18:44:37', '0000-00-00 00:00:00'),
(330, 12, 0, '012-2', '', 'SC2 彎形叉子', '65.00', 'This is a test description.', 'assets/products_image/650/330.jpg', 1, '2023-03-20 18:45:18', '0000-00-00 00:00:00'),
(331, 17, 0, '017-22', '', 'TA2 感統治療刷1', '65.00', 'This is a test description.', 'assets/products_image/650/331.jpg', 1, '2023-03-20 18:45:39', '0000-00-00 00:00:00'),
(332, 12, 0, '012-3', '', 'SC3L學習筷子（左手）', '65.00', 'This is a test description.', 'assets/products_image/650/332.jpg', 1, '2023-03-20 18:45:43', '0000-00-00 00:00:00'),
(333, 12, 0, '012-3', '', 'SC3R 學習筷子（右手）', '65.00', 'This is a test description.', 'assets/products_image/650/333.jpg', 1, '2023-03-20 18:46:07', '0000-00-00 00:00:00'),
(334, 17, 0, '017-23', '', 'TA2 感統治療刷2', '65.00', 'This is a test description.', 'assets/products_image/650/334.jpg', 1, '2023-03-20 18:46:07', '0000-00-00 00:00:00'),
(335, 17, 0, '017-24', '', 'TA3 TA3S 拉拉管1', '65.00', 'This is a test description.', 'assets/products_image/650/335.jpg', 1, '2023-03-20 18:46:39', '0000-00-00 00:00:00'),
(336, 12, 0, '012-4', '', 'SC5 雙耳吸管防漏水杯 1', '65.00', 'This is a test description.', 'assets/products_image/650/336.jpg', 1, '2023-03-20 18:46:52', '0000-00-00 00:00:00'),
(337, 17, 0, '017-25', '', 'TA3 TA3S 拉拉管2', '65.00', 'This is a test description.', 'assets/products_image/650/337.jpg', 1, '2023-03-20 18:46:59', '0000-00-00 00:00:00'),
(338, 12, 0, '012-5', '', 'SC5 雙耳吸管防漏水杯 2', '65.00', 'This is a test description.', 'assets/products_image/650/338.jpg', 1, '2023-03-20 18:47:16', '0000-00-00 00:00:00'),
(339, 17, 0, '017-26', '', 'TA3 TA3S 拉拉管3', '65.00', 'This is a test description.', 'assets/products_image/650/339.jpg', 1, '2023-03-20 18:47:37', '0000-00-00 00:00:00'),
(340, 12, 0, '012-6', '', 'SC5 雙耳吸管防漏水杯 3', '65.00', 'This is a test description.', 'assets/products_image/650/340.jpg', 1, '2023-03-20 18:47:50', '0000-00-00 00:00:00'),
(341, 17, 0, '017-27', '', 'TA3 TA3S 拉拉管4', '65.00', 'This is a test description.', 'assets/products_image/650/341.jpg', 1, '2023-03-20 18:48:00', '0000-00-00 00:00:00'),
(342, 12, 0, '012-7', '', 'SC5 雙耳吸管防漏水杯 4', '65.00', 'This is a test description.', 'assets/products_image/650/342.jpg', 1, '2023-03-20 18:48:17', '0000-00-00 00:00:00'),
(343, 17, 0, '017-28', '', 'TA4 迷你拉拉管喇叭1', '65.00', 'This is a test description.', 'assets/products_image/650/343.jpg', 1, '2023-03-20 18:48:30', '0000-00-00 00:00:00'),
(344, 12, 0, '012-8', '', 'SC5 雙耳吸管防漏水杯 5', '65.00', 'This is a test description.', 'assets/products_image/650/344.jpg', 1, '2023-03-20 18:48:40', '0000-00-00 00:00:00'),
(345, 17, 0, '017-29', '', 'TA4 迷你拉拉管喇叭2', '65.00', 'This is a test description.', 'assets/products_image/650/345.jpg', 1, '2023-03-20 18:48:54', '0000-00-00 00:00:00'),
(346, 17, 0, '017-30', '', 'TA5 TA5S 刺蝟環1', '65.00', 'This is a test description.', 'assets/products_image/650/346.jpg', 1, '2023-03-20 18:49:30', '0000-00-00 00:00:00'),
(347, 17, 0, '017-31', '', 'TA5 TA5S 刺蝟環2', '65.00', 'This is a test description.', 'assets/products_image/650/347.jpg', 1, '2023-03-20 18:50:32', '0000-00-00 00:00:00'),
(348, 17, 0, '017-32', '', 'TA6 TA6S 迷你刺蝟滾輪1', '65.00', 'This is a test description.', 'assets/products_image/650/348.jpg', 1, '2023-03-20 18:51:00', '0000-00-00 00:00:00'),
(349, 17, 0, '017-33', '', 'TA7 TA7S長滾輪1', '65.00', 'This is a test description.', 'assets/products_image/650/349.jpg', 1, '2023-03-20 18:51:27', '0000-00-00 00:00:00'),
(350, 17, 0, '017-34', '', 'TA7 TA7S長滾輪2', '65.00', 'This is a test description.', 'assets/products_image/650/350.jpg', 1, '2023-03-20 18:51:59', '0000-00-00 00:00:00'),
(351, 17, 0, '017-34', '', 'TA7 TA7S長滾輪3', '65.00', 'This is a test description.', 'assets/products_image/650/351.jpg', 1, '2023-03-20 18:54:33', '0000-00-00 00:00:00'),
(352, 17, 0, '017-36', '', 'TA7 TA7S長滾輪4 ', '65.00', 'This is a test description.', 'assets/products_image/650/352.jpg', 1, '2023-03-20 18:56:15', '0000-00-00 00:00:00'),
(353, 17, 0, '017-37', '', 'TA7 TA7S長滾輪5', '65.00', 'This is a test description.', 'assets/products_image/650/353.jpg', 1, '2023-03-20 18:57:13', '0000-00-00 00:00:00'),
(354, 17, 0, '017-37', '', 'TA8 軟刺蝟球1', '65.00', 'This is a test description.', 'assets/products_image/650/354.jpg', 1, '2023-03-20 18:58:53', '0000-00-00 00:00:00'),
(355, 17, 0, '017-39', '', 'TA8 軟刺蝟球2', '65.00', 'This is a test description.', 'assets/products_image/650/355.jpg', 1, '2023-03-20 19:00:21', '0000-00-00 00:00:00'),
(356, 17, 0, '017-40', '', 'TA9 編織球 1', '65.00', 'This is a test description.', 'assets/products_image/650/356.jpg', 1, '2023-03-20 19:00:55', '0000-00-00 00:00:00'),
(357, 6, 0, '006-1', '', 'SS1 小環形剪刀1', '65.00', 'This is a test description.', 'assets/products_image/650/357.jpg', 1, '2023-03-20 19:01:16', '0000-00-00 00:00:00'),
(358, 17, 0, '017-41', '', 'TA9 編織球 2', '65.00', 'This is a test description.', 'assets/products_image/650/358.jpg', 1, '2023-03-20 19:01:39', '0000-00-00 00:00:00'),
(359, 6, 0, '006-2', '', 'SS1 小環形剪刀2', '65.00', 'This is a test description.', 'assets/products_image/650/359.jpg', 1, '2023-03-20 19:01:54', '0000-00-00 00:00:00'),
(360, 6, 0, '006-3', '', 'SS2 大環形剪刀2', '65.00', 'This is a test description.', 'assets/products_image/650/360.jpg', 1, '2023-03-20 19:02:21', '0000-00-00 00:00:00'),
(361, 17, 0, '017-42', '', 'TA10 TA10S 捏捏彈彈球2', '65.00', 'This is a test description.', 'assets/products_image/650/361.jpg', 1, '2023-03-20 19:02:36', '0000-00-00 00:00:00'),
(362, 6, 0, '006-4', '', 'SS2大環形剪刀1', '65.00', 'This is a test description.', 'assets/products_image/650/362.jpg', 1, '2023-03-20 19:02:54', '0000-00-00 00:00:00'),
(364, 6, 0, '006-5', '', 'SS3 兒童安全剪刀 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/364.jpg', 1, '2023-03-20 19:03:25', '0000-00-00 00:00:00'),
(365, 6, 0, '006-6', '', 'SS3 兒童安全剪刀 2', '65.00', 'This is a test description.', 'assets/products_image/650/365.jpg', 1, '2023-03-20 19:03:56', '0000-00-00 00:00:00'),
(366, 17, 0, '017-43', '', 'TA10 TA10S捏捏彈彈球1', '65.00', 'This is a test description.', 'assets/products_image/650/366.jpg', 1, '2023-03-20 19:04:14', '0000-00-00 00:00:00'),
(367, 6, 0, '006-7', '', 'SS3 兒童安全剪刀 3', '65.00', 'This is a test description.', 'assets/products_image/650/367.jpg', 1, '2023-03-20 19:04:21', '0000-00-00 00:00:00'),
(368, 17, 0, '017-44', '', 'TA10 TA10S捏捏彈彈球3', '65.00', 'This is a test description.', 'assets/products_image/650/368.jpg', 1, '2023-03-20 19:04:40', '0000-00-00 00:00:00'),
(369, 6, 0, '006-8', '', 'SS4 彈弓輔助剪刀1', '65.00', 'This is a test description.', 'assets/products_image/650/369.jpg', 1, '2023-03-20 19:04:57', '0000-00-00 00:00:00'),
(370, 17, 0, '017-45', '', 'TA11 捏捏河豚球 1', '65.00', 'This is a test description.', 'assets/products_image/650/370.jpg', 1, '2023-03-20 19:05:06', '0000-00-00 00:00:00'),
(371, 6, 0, '006-9', '', 'SS4 彈弓輔助剪刀2', '65.00', 'This is a test description.', 'assets/products_image/650/371.jpg', 1, '2023-03-20 19:05:29', '0000-00-00 00:00:00'),
(372, 17, 0, '017-46', '', 'TA11 捏捏河豚球 2', '65.00', 'This is a test description.', 'assets/products_image/650/372.jpg', 1, '2023-03-20 19:05:52', '0000-00-00 00:00:00'),
(373, 6, 0, '006-10', '', 'SS5L 左手四孔輔助剪刀1', '65.00', 'This is a test description.', 'assets/products_image/650/373.jpg', 1, '2023-03-20 19:05:56', '0000-00-00 00:00:00'),
(374, 6, 0, '006-11', '', 'SS5L 左手四孔輔助剪刀2', '65.00', 'This is a test description.', 'assets/products_image/650/374.jpg', 1, '2023-03-20 19:06:19', '0000-00-00 00:00:00'),
(375, 6, 0, '006-12', '', 'SS5R 右手四孔輔助剪刀1', '65.00', 'This is a test description.', 'assets/products_image/650/375.jpg', 1, '2023-03-20 19:06:46', '0000-00-00 00:00:00'),
(376, 17, 0, '017-47', '', 'TA11 捏捏河豚球 3', '65.00', 'This is a test description.', 'assets/products_image/650/376.jpg', 1, '2023-03-20 19:07:02', '0000-00-00 00:00:00'),
(377, 6, 0, '006-13', '', 'SS5R 右手四孔輔助剪刀2', '65.00', 'This is a test description.', 'assets/products_image/650/377.jpg', 1, '2023-03-20 19:07:13', '0000-00-00 00:00:00'),
(378, 6, 0, '006-14', '', 'SS7 左手剪刀 1', '65.00', 'This is a test description.', 'assets/products_image/650/378.jpg', 1, '2023-03-20 19:07:36', '0000-00-00 00:00:00'),
(380, 17, 0, '017-48', '', 'TA12 TA12S 觸感拍尺手環 1', '65.00', 'This is a test description.', 'assets/products_image/650/380.jpg', 1, '2023-03-20 19:10:10', '0000-00-00 00:00:00'),
(381, 17, 0, '017-49', '', 'TA12 TA12S 觸感拍尺手環2', '65.00', 'This is a test description.', 'assets/products_image/650/381.jpg', 1, '2023-03-20 19:10:38', '0000-00-00 00:00:00'),
(382, 17, 0, '017-50', '', 'TA12 TA12S 觸感拍尺手環3', '65.00', 'This is a test description.', 'assets/products_image/650/382.jpg', 1, '2023-03-20 19:11:02', '0000-00-00 00:00:00'),
(383, 17, 0, '017-51', '', 'TA12 TA12S 觸感拍尺手環4', '65.00', 'This is a test description.', 'assets/products_image/650/383.jpg', 1, '2023-03-20 19:12:30', '0000-00-00 00:00:00'),
(384, 7, 0, '007-1', '', 'ST1 紫色漿糊筆', '65.00', 'This is a test description.', 'assets/products_image/650/384.jpg', 1, '2023-03-20 19:12:57', '0000-00-00 00:00:00'),
(385, 17, 0, '017-52', '', 'TA12 TA12S 觸感拍尺手環5', '65.00', 'This is a test description.', 'assets/products_image/650/385.jpg', 1, '2023-03-20 19:12:59', '0000-00-00 00:00:00'),
(386, 7, 0, '007-2', '', 'ST1紫色漿糊筆 2', '65.00', 'This is a test description.', 'assets/products_image/650/386.jpg', 1, '2023-03-20 19:13:31', '0000-00-00 00:00:00'),
(387, 17, 0, '017-53', '', 'TA13 TA13S 觸感鬚鬚球1', '65.00', 'This is a test description.', 'assets/products_image/650/387.jpg', 1, '2023-03-20 19:13:35', '0000-00-00 00:00:00'),
(388, 7, 0, '007-3', '', 'ST2 單孔打孔機', '65.00', 'This is a test description.', 'assets/products_image/650/388.jpg', 1, '2023-03-20 19:14:01', '0000-00-00 00:00:00'),
(389, 17, 0, '017-54', '', 'TA13 TA13S 觸感鬚鬚球2', '65.00', 'This is a test description.', 'assets/products_image/650/389.jpg', 1, '2023-03-20 19:14:05', '0000-00-00 00:00:00'),
(390, 7, 0, '007-4', '', 'ST3 ST3S 可擦式工作紙膠套', '65.00', 'This is a test description.', 'assets/products_image/650/390.jpg', 1, '2023-03-20 19:14:26', '0000-00-00 00:00:00'),
(391, 17, 0, '017-55', '', 'TA13 TA13S 觸感鬚鬚球3', '65.00', 'This is a test description.', 'assets/products_image/650/391.jpg', 1, '2023-03-20 19:14:34', '0000-00-00 00:00:00'),
(392, 7, 0, '007-5', '', 'ST5 軟身泡泡手柄1', '65.00', 'This is a test description.', 'assets/products_image/650/392.jpg', 1, '2023-03-20 19:14:53', '0000-00-00 00:00:00'),
(393, 17, 0, '017-56', '', 'TA13 TA13S 觸感鬚鬚球4', '65.00', 'This is a test description.', 'assets/products_image/650/393.jpg', 1, '2023-03-20 19:15:08', '0000-00-00 00:00:00'),
(394, 7, 0, '007-6', '', 'ST5 軟身泡泡手柄2', '65.00', 'This is a test description.', 'assets/products_image/650/394.jpg', 1, '2023-03-20 19:15:15', '0000-00-00 00:00:00'),
(395, 7, 0, '007-7', '', 'ST5 軟身泡泡手柄3', '65.00', 'This is a test description.', 'assets/products_image/650/395.jpg', 1, '2023-03-20 19:15:40', '0000-00-00 00:00:00'),
(396, 17, 0, '017-57', '', 'TA13 TA13S 觸感鬚鬚球5', '65.00', 'This is a test description.', 'assets/products_image/650/396.jpg', 1, '2023-03-20 19:15:51', '0000-00-00 00:00:00'),
(397, 7, 0, '007-8', '', 'ST5 軟身泡泡手柄4', '65.00', 'This is a test description.', 'assets/products_image/650/397.jpg', 1, '2023-03-20 19:16:04', '0000-00-00 00:00:00'),
(398, 7, 0, '007-9', '', 'ST5 軟身泡泡手柄5', '65.00', 'This is a test description.', 'assets/products_image/650/398.jpg', 1, '2023-03-20 19:16:30', '0000-00-00 00:00:00'),
(399, 17, 0, '017-58', '', 'TA13 TA13S 觸感鬚鬚球6', '65.00', 'This is a test description.', 'assets/products_image/650/399.jpg', 1, '2023-03-20 19:16:44', '0000-00-00 00:00:00'),
(400, 17, 0, '017-59', '', 'TA15 夜光魷魚吸盤匙扣1', '65.00', 'This is a test description.', 'assets/products_image/650/400.jpg', 1, '2023-03-20 19:17:19', '0000-00-00 00:00:00'),
(401, 17, 0, '017-60', '', 'TA15 夜光魷魚吸盤匙扣2', '65.00', 'This is a test description.', 'assets/products_image/650/401.jpg', 1, '2023-03-20 19:17:58', '0000-00-00 00:00:00'),
(402, 17, 0, '017-61', '', 'TA15-夜光魷魚吸盤匙扣3', '65.00', 'This is a test description.', 'assets/products_image/650/402.jpg', 1, '2023-03-20 19:24:38', '0000-00-00 00:00:00'),
(403, 17, 0, '017-62', '', 'TA15-夜光魷魚吸盤匙扣4', '65.00', 'This is a test description.', 'assets/products_image/650/403.jpg', 1, '2023-03-20 19:25:23', '0000-00-00 00:00:00'),
(404, 17, 0, '017-63', '', 'TA15 夜光魷魚吸盤匙扣5', '65.00', 'This is a test description.', 'assets/products_image/650/404.jpg', 1, '2023-03-20 19:27:17', '0000-00-00 00:00:00'),
(405, 17, 0, '017-64', '', 'TA16 金屬手指環1', '65.00', 'This is a test description.', 'assets/products_image/650/405.jpg', 1, '2023-03-20 19:28:05', '0000-00-00 00:00:00'),
(406, 17, 0, '017-65', '', 'TA16 金屬手指環2', '65.00', 'This is a test description.', 'assets/products_image/650/406.jpg', 1, '2023-03-20 19:29:27', '0000-00-00 00:00:00'),
(407, 17, 0, '017-66', '', 'TA17 珍寶彈力條1', '65.00', 'This is a test description.', 'assets/products_image/650/407.jpg', 1, '2023-03-20 19:30:23', '0000-00-00 00:00:00'),
(408, 17, 0, '017-67', '', 'TA17 珍寶彈力條2', '65.00', 'This is a test description.', 'assets/products_image/650/408.jpg', 1, '2023-03-20 19:31:00', '0000-00-00 00:00:00'),
(409, 17, 0, '017-68', '', 'TA18 迷你波子隧道 1', '65.00', 'This is a test description.', 'assets/products_image/650/409.jpg', 1, '2023-03-20 19:31:57', '0000-00-00 00:00:00'),
(410, 17, 0, '017-69', '', 'TA18 迷你波子隧道 2', '65.00', 'This is a test description.', 'assets/products_image/650/410.jpg', 1, '2023-03-20 19:32:40', '0000-00-00 00:00:00'),
(411, 17, 0, '017-70', '', 'TA18 迷你波子隧道 3', '65.00', 'This is a test description.', 'assets/products_image/650/411.jpg', 1, '2023-03-20 19:33:05', '0000-00-00 00:00:00'),
(412, 17, 0, '017-71', '', 'TA19 扭扭鎖鏈 1', '65.00', 'This is a test description.', 'assets/products_image/650/412.jpg', 1, '2023-03-20 19:34:49', '0000-00-00 00:00:00'),
(413, 17, 0, '017-72', '', 'TA19 扭扭鎖鏈 2', '65.00', 'This is a test description.', 'assets/products_image/650/413.jpg', 1, '2023-03-20 19:35:13', '0000-00-00 00:00:00'),
(414, 17, 0, '017-73', '', 'TA19 扭扭鎖鏈 3', '65.00', 'This is a test description.', 'assets/products_image/650/414.jpg', 1, '2023-03-20 19:36:11', '0000-00-00 00:00:00'),
(415, 17, 0, '017-74', '', 'TA24 鯊魚扭扭關節玩具2', '65.00', 'This is a test description.', 'assets/products_image/650/415.jpg', 1, '2023-03-20 19:36:41', '0000-00-00 00:00:00'),
(416, 19, 0, '019-1', '', 'BOT2 動作能力測驗1', '65.00', 'This is a test description.', 'assets/products_image/650/416.jpg', 1, '2023-03-20 19:37:24', '0000-00-00 00:00:00'),
(417, 19, 0, '019-2', '', 'DVPT DVPT-3視覺感知測試套裝   ', '65.00', 'This is a test description.', 'assets/products_image/650/417.jpg', 1, '2023-03-20 19:38:10', '0000-00-00 00:00:00'),
(418, 17, 0, '017-75', '', 'TA24鯊魚扭扭關節玩具1', '65.00', 'This is a test description.', 'assets/products_image/650/418.jpg', 1, '2023-03-20 19:38:12', '0000-00-00 00:00:00'),
(419, 19, 0, '019-3', '', 'GPB 鎖匙形釘板測試1 ', '65.00', 'This is a test description.', 'assets/products_image/650/419.jpg', 1, '2023-03-20 19:38:43', '0000-00-00 00:00:00'),
(420, 19, 0, '019-4', '', 'GPB 鎖匙形釘板測試2', '65.00', 'This is a test description.', 'assets/products_image/650/420.jpg', 1, '2023-03-20 19:39:14', '0000-00-00 00:00:00'),
(421, 17, 0, '017-76', '', 'TA30 Bunchems蓬蓬球400粒套裝1', '65.00', 'This is a test description.', 'assets/products_image/650/421.jpg', 1, '2023-03-20 19:39:29', '0000-00-00 00:00:00'),
(422, 19, 0, '019-5', '', 'JLRRT 喬丹左右顛倒測試  ', '65.00', 'This is a test description.', 'assets/products_image/650/422.jpg', 1, '2023-03-20 19:39:52', '0000-00-00 00:00:00'),
(423, 17, 0, '017-77', '', 'TA30 Bunchems蓬蓬球400粒套裝2', '65.00', 'This is a test description.', 'assets/products_image/650/423.jpg', 1, '2023-03-20 19:40:35', '0000-00-00 00:00:00'),
(424, 19, 0, '019-6', '', 'MVPT4  MVPT-4 視覺感知測試套裝', '65.00', 'This is a test description.', 'assets/products_image/650/424.jpg', 1, '2023-03-20 19:40:58', '0000-00-00 00:00:00'),
(425, 17, 0, '017-78', '', 'TA31 Bunchems蓬蓬球單色筒', '65.00', 'This is a test description.', 'assets/products_image/650/425.jpg', 1, '2023-03-20 19:41:16', '0000-00-00 00:00:00'),
(426, 19, 0, '019-7', '', 'PDMS3運動發育量表評估測試工具 1', '65.00', 'This is a test description.', 'assets/products_image/650/426.jpg', 1, '2023-03-20 19:41:52', '0000-00-00 00:00:00'),
(427, 19, 0, '019-8', '', 'PPB 普杜釘板測試', '65.00', 'This is a test description.', 'assets/products_image/650/427.jpg', 1, '2023-03-20 19:42:30', '0000-00-00 00:00:00'),
(428, 17, 0, '017-79', '', 'TA35 TA35S Wikki wix 蠟繩包 1', '65.00', 'This is a test description.', 'assets/products_image/650/428.jpg', 1, '2023-03-20 19:42:49', '0000-00-00 00:00:00'),
(429, 19, 0, '019-9', '', 'TVPS4 TVPS-4 視覺感知評估套裝   ', '65.00', 'This is a test description.', 'assets/products_image/650/429.jpg', 1, '2023-03-20 19:43:21', '0000-00-00 00:00:00'),
(430, 17, 0, '017-80', '', 'TA35 TA35S Wikki wix 蠟繩包 2', '65.00', 'This is a test description.', 'assets/products_image/650/430.jpg', 1, '2023-03-20 19:43:53', '0000-00-00 00:00:00'),
(431, 19, 0, '019-10', '', 'VMI Beery VMI 視覺—動作統合發展測驗', '65.00', 'This is a test description.', 'assets/products_image/650/431.jpg', 1, '2023-03-20 19:44:12', '0000-00-00 00:00:00'),
(432, 17, 0, '017-81', '', 'TA35 TA35S Wikki wix 蠟繩包 3', '65.00', 'This is a test description.', 'assets/products_image/650/432.jpg', 1, '2023-03-20 19:45:28', '0000-00-00 00:00:00'),
(433, 17, 0, '017-82', '', 'TA40S TA40L 魔法白雪 1', '65.00', 'This is a test description.', 'assets/products_image/650/433.jpg', 1, '2023-03-20 19:45:56', '0000-00-00 00:00:00'),
(434, 17, 0, '017-83', '', 'TA40S TA40L 魔法白雪 2', '65.00', 'This is a test description.', 'assets/products_image/650/434.jpg', 1, '2023-03-20 19:46:30', '0000-00-00 00:00:00'),
(435, 18, 0, '018-1', '', 'SI1 絨毛震動坐墊1', '65.00', 'This is a test description.', 'assets/products_image/650/435.jpg', 1, '2023-03-20 19:46:35', '0000-00-00 00:00:00'),
(436, 18, 0, '018-2', '', 'SI1 絨毛震動坐墊2', '65.00', 'This is a test description.', 'assets/products_image/650/436.jpg', 1, '2023-03-20 19:47:24', '0000-00-00 00:00:00'),
(437, 17, 0, '017-84', '', 'TA40S TA40L 魔法白雪 3', '65.00', 'This is a test description.', 'assets/products_image/650/437.jpg', 1, '2023-03-20 19:47:44', '0000-00-00 00:00:00'),
(438, 18, 0, '018-3', '', 'SI2布面震動坐墊 1', '65.00', 'This is a test description.', 'assets/products_image/650/438.jpg', 1, '2023-03-20 19:48:09', '0000-00-00 00:00:00'),
(439, 17, 0, '017-85', '', 'TA40S TA40L 魔法白雪 4', '65.00', 'This is a test description.', 'assets/products_image/650/439.jpg', 1, '2023-03-20 19:48:17', '0000-00-00 00:00:00'),
(440, 17, 0, '017-86', '', 'TA40S TA40L 魔法白雪 5', '65.00', 'This is a test description.', 'assets/products_image/650/440.jpg', 1, '2023-03-20 19:48:53', '0000-00-00 00:00:00'),
(441, 18, 0, '018-4', '', 'SI2布面震動坐墊2', '65.00', 'This is a test description.', 'assets/products_image/650/441.jpg', 1, '2023-03-20 19:49:05', '0000-00-00 00:00:00'),
(442, 17, 0, '017-87', '', 'TA40S TA40L 魔法白雪 6', '65.00', 'This is a test description.', 'assets/products_image/650/442.jpg', 1, '2023-03-20 19:49:38', '0000-00-00 00:00:00'),
(443, 18, 0, '018-5', '', 'SI3 觸感平衡墊1', '65.00', 'This is a test description.', 'assets/products_image/650/443.jpg', 1, '2023-03-20 19:49:48', '0000-00-00 00:00:00'),
(444, 17, 0, '017-88', '', 'TA49 顏色和形狀感官墊1', '65.00', 'This is a test description.', 'assets/products_image/650/444.jpg', 1, '2023-03-20 19:50:04', '0000-00-00 00:00:00'),
(445, 18, 0, '018-6', '', 'SI3 觸感平衡墊2', '65.00', 'This is a test description.', 'assets/products_image/650/445.jpg', 1, '2023-03-20 19:50:22', '0000-00-00 00:00:00'),
(446, 17, 0, '017-89', '', 'TA49 顏色和形狀感官墊2', '65.00', 'This is a test description.', 'assets/products_image/650/446.jpg', 1, '2023-03-20 19:50:31', '0000-00-00 00:00:00'),
(447, 18, 0, '018-7', '', 'SI10 火山搖搖椅 3', '65.00', 'This is a test description.', 'assets/products_image/650/447.jpg', 1, '2023-03-20 19:50:53', '0000-00-00 00:00:00'),
(448, 18, 0, '018-8', '', 'SI10火山搖搖椅 1', '65.00', 'This is a test description.', 'assets/products_image/650/448.jpg', 1, '2023-03-20 19:51:21', '0000-00-00 00:00:00'),
(449, 17, 0, '017-90', '', 'TA49 顏色和形狀感官墊3', '65.00', 'This is a test description.', 'assets/products_image/650/449.jpg', 1, '2023-03-20 19:51:26', '0000-00-00 00:00:00'),
(450, 17, 0, '017-91', '', 'TA51 觸感分辨圈圈矽膠地墊 1 ', '65.00', 'This is a test description.', 'assets/products_image/650/450.jpg', 1, '2023-03-20 19:52:14', '0000-00-00 00:00:00'),
(451, 18, 0, '018-9', '', 'SI10火山搖搖椅 2', '65.00', 'This is a test description.', 'assets/products_image/650/451.jpg', 1, '2023-03-20 19:52:50', '0000-00-00 00:00:00'),
(452, 18, 0, '018-10', '', 'SI10火山搖搖椅 4', '65.00', 'This is a test description.', 'assets/products_image/650/452.jpg', 1, '2023-03-20 19:53:17', '0000-00-00 00:00:00'),
(453, 18, 0, '018-11', '', 'SI11 搖滾威力平衡板1', '65.00', 'This is a test description.', 'assets/products_image/650/453.jpg', 1, '2023-03-20 19:53:59', '0000-00-00 00:00:00'),
(454, 18, 0, '018-12', '', 'SI11 搖滾威力平衡板2', '65.00', 'This is a test description.', 'assets/products_image/650/454.jpg', 1, '2023-03-20 19:54:33', '0000-00-00 00:00:00'),
(455, 17, 0, '017-92', '', 'TA51 觸感分辨圈圈矽膠地墊 2', '65.00', 'This is a test description.', 'assets/products_image/650/455.jpg', 1, '2023-03-20 19:54:44', '0000-00-00 00:00:00'),
(456, 18, 0, '018-13', '', 'SI11 搖滾威力平衡板3', '65.00', 'This is a test description.', 'assets/products_image/650/456.jpg', 1, '2023-03-20 19:55:06', '0000-00-00 00:00:00'),
(457, 17, 0, '017-93', '', 'TA52 觸感分辨遊戲板 1', '65.00', 'This is a test description.', 'assets/products_image/650/457.jpg', 1, '2023-03-20 19:55:19', '0000-00-00 00:00:00'),
(458, 18, 0, '018-14', '', 'SI11 搖滾威力平衡板4', '65.00', 'This is a test description.', 'assets/products_image/650/458.jpg', 1, '2023-03-20 19:55:46', '0000-00-00 00:00:00'),
(459, 18, 0, '018-15', '', 'SI13 比力寶旋轉盤子1', '65.00', 'This is a test description.', 'assets/products_image/650/459.jpg', 1, '2023-03-20 19:56:19', '0000-00-00 00:00:00'),
(460, 18, 0, '018-16', '', 'SI13 比力寶旋轉盤子2', '65.00', 'This is a test description.', 'assets/products_image/650/460.jpg', 1, '2023-03-20 19:57:03', '0000-00-00 00:00:00'),
(461, 18, 0, '018-17', '', 'SI13 比力寶旋轉盤子3', '65.00', 'This is a test description.', 'assets/products_image/650/461.jpg', 1, '2023-03-20 19:57:36', '0000-00-00 00:00:00'),
(462, 18, 0, '018-18', '', 'SI13 比力寶旋轉盤子4', '65.00', 'This is a test description.', 'assets/products_image/650/462.jpg', 1, '2023-03-20 19:58:19', '0000-00-00 00:00:00'),
(463, 18, 0, '018-19', '', 'SI13 比力寶旋轉盤子5', '65.00', 'This is a test description.', 'assets/products_image/650/463.jpg', 1, '2023-03-20 19:59:10', '0000-00-00 00:00:00'),
(464, 18, 0, '018-20', '', 'SI14 彩色爬行隧道', '65.00', 'This is a test description.', 'assets/products_image/650/464.jpg', 1, '2023-03-20 20:00:03', '0000-00-00 00:00:00'),
(465, 17, 0, '017-94', '', 'TA52 觸感分辨遊戲板 2', '65.00', 'This is a test description.', 'assets/products_image/650/465.jpg', 1, '2023-03-20 20:00:35', '0000-00-00 00:00:00'),
(466, 18, 0, '018-21', '', 'SI15 太空人訓練轉板1', '65.00', 'This is a test description.', 'assets/products_image/650/466.jpg', 1, '2023-03-20 20:00:37', '0000-00-00 00:00:00'),
(467, 18, 0, '018-22', '', 'SI15 太空人訓練轉板2', '65.00', 'This is a test description.', 'assets/products_image/650/467.jpg', 1, '2023-03-20 20:01:12', '0000-00-00 00:00:00'),
(468, 17, 0, '017-95', '', 'TAK1 動力沙1kg 1', '65.00', 'This is a test description.', 'assets/products_image/650/468.jpg', 1, '2023-03-20 20:01:15', '0000-00-00 00:00:00'),
(469, 18, 0, '018-23', '', 'SI15 太空人訓練轉板3', '65.00', 'This is a test description.', 'assets/products_image/650/469.jpg', 1, '2023-03-20 20:01:43', '0000-00-00 00:00:00'),
(470, 18, 0, '018-24', '', 'SI16 太空人訓練眼睛電筒', '65.00', 'This is a test description.', 'assets/products_image/650/470.jpg', 1, '2023-03-20 20:02:11', '0000-00-00 00:00:00'),
(471, 18, 0, '018-25', '', 'SI20S SI20M Lycra 彈力感官身體襪1', '65.00', 'This is a test description.', 'assets/products_image/650/471.jpg', 1, '2023-03-20 20:02:41', '0000-00-00 00:00:00'),
(472, 17, 0, '017-96', '', 'TAK1 動力沙1kg 2jpg', '65.00', 'This is a test description.', 'assets/products_image/650/472.jpg', 1, '2023-03-20 20:03:01', '0000-00-00 00:00:00'),
(473, 18, 0, '018-26', '', 'SI20S SI20M Lycra 彈力感官身體襪2', '65.00', 'This is a test description.', 'assets/products_image/650/473.jpg', 1, '2023-03-20 20:03:09', '0000-00-00 00:00:00'),
(474, 17, 0, '017-97', '', 'TAK1 動力沙1kg 3', '65.00', 'This is a test description.', 'assets/products_image/650/474.jpg', 1, '2023-03-20 20:03:36', '0000-00-00 00:00:00'),
(475, 18, 0, '018-27', '', 'SI22 椅子帶1', '65.00', 'This is a test description.', 'assets/products_image/650/475.jpg', 1, '2023-03-20 20:03:47', '0000-00-00 00:00:00'),
(476, 18, 0, '018-28', '', 'SI22 椅子帶2', '65.00', 'This is a test description.', 'assets/products_image/650/476.jpg', 1, '2023-03-20 20:04:13', '0000-00-00 00:00:00'),
(477, 17, 0, '017-98', '', 'TAK2 動力沙沙灘套裝1', '65.00', 'This is a test description.', 'assets/products_image/650/477.jpg', 1, '2023-03-20 20:04:18', '0000-00-00 00:00:00'),
(478, 17, 0, '017-99', '', 'TAK2 動力沙沙灘套裝2', '65.00', 'This is a test description.', 'assets/products_image/650/478.jpg', 1, '2023-03-20 20:04:44', '0000-00-00 00:00:00'),
(479, 18, 0, '018-29', '', 'SI22 椅子帶3', '65.00', 'This is a test description.', 'assets/products_image/650/479.jpg', 1, '2023-03-20 20:04:52', '0000-00-00 00:00:00'),
(480, 17, 0, '017-100', '', 'TAK2 動力沙沙灘套裝3', '65.00', 'This is a test description.', 'assets/products_image/650/480.jpg', 1, '2023-03-20 20:05:15', '0000-00-00 00:00:00'),
(481, 18, 0, '018-30', '', 'SI22 椅子帶4', '65.00', 'This is a test description.', 'assets/products_image/650/481.jpg', 1, '2023-03-20 20:05:31', '0000-00-00 00:00:00'),
(482, 17, 0, '017-101', '', 'TAK2 動力沙沙灘套裝4', '65.00', 'This is a test description.', 'assets/products_image/650/482.jpg', 1, '2023-03-20 20:05:43', '0000-00-00 00:00:00'),
(483, 18, 0, '018-31', '', 'SI30 數字保齡球1', '65.00', 'This is a test description.', 'assets/products_image/650/483.jpg', 1, '2023-03-20 20:06:33', '0000-00-00 00:00:00'),
(484, 18, 0, '018-32', '', 'SI30 數字保齡球2', '65.00', 'This is a test description.', 'assets/products_image/650/484.jpg', 1, '2023-03-20 20:07:06', '0000-00-00 00:00:00'),
(485, 18, 0, '018-33', '', 'SI31 豆袋4色', '65.00', 'This is a test description.', 'assets/products_image/650/485.jpg', 1, '2023-03-20 20:07:35', '0000-00-00 00:00:00'),
(486, 18, 0, '018-34', '', 'SI32 老虎不倒翁1', '65.00', 'This is a test description.', 'assets/products_image/650/486.jpg', 1, '2023-03-20 20:08:08', '0000-00-00 00:00:00'),
(487, 18, 0, '018-35', '', 'SI32 老虎不倒翁2', '65.00', 'This is a test description.', 'assets/products_image/650/487.jpg', 1, '2023-03-20 20:09:07', '0000-00-00 00:00:00'),
(488, 18, 0, '018-36', '', 'SI35 瑜珈轉盤遊戲 1', '65.00', 'This is a test description.', 'assets/products_image/650/488.jpg', 1, '2023-03-20 20:09:38', '0000-00-00 00:00:00'),
(489, 18, 0, '018-37', '', 'SI35 瑜珈轉盤遊戲 2', '65.00', 'This is a test description.', 'assets/products_image/650/489.jpg', 1, '2023-03-20 20:10:10', '0000-00-00 00:00:00'),
(490, 18, 0, '018-38', '', 'SI35 瑜珈轉盤遊戲 3', '65.00', 'This is a test description.', 'assets/products_image/650/490.jpg', 1, '2023-03-20 20:11:20', '0000-00-00 00:00:00'),
(491, 18, 0, '018-39', '', 'SIB1 45cm 防爆治療球1', '65.00', 'This is a test description.', 'assets/products_image/650/491.jpg', 1, '2023-03-20 20:11:47', '0000-00-00 00:00:00'),
(492, 18, 0, '018-40', '', 'SIB1 45cm 防爆治療球2', '65.00', 'This is a test description.', 'assets/products_image/650/492.jpg', 1, '2023-03-20 20:12:14', '0000-00-00 00:00:00'),
(493, 18, 0, '018-41', '', 'SIB2 55cm 防爆治療球1', '65.00', 'This is a test description.', 'assets/products_image/650/493.jpg', 1, '2023-03-20 20:12:46', '0000-00-00 00:00:00'),
(494, 18, 0, '018-42', '', 'SIB2 55cm 防爆治療球2', '65.00', 'This is a test description.', 'assets/products_image/650/494.jpg', 1, '2023-03-20 20:13:17', '0000-00-00 00:00:00'),
(495, 18, 0, '018-43', '', 'SIB3 65cm 防爆治療球1', '65.00', 'This is a test description.', 'assets/products_image/650/495.jpg', 1, '2023-03-20 20:13:48', '0000-00-00 00:00:00'),
(496, 18, 0, '018-44', '', 'SIB3 65cm 防爆治療球2', '65.00', 'This is a test description.', 'assets/products_image/650/496.jpg', 1, '2023-03-20 20:14:10', '0000-00-00 00:00:00'),
(497, 18, 0, '018-45', '', 'SIB4 迷你跳跳球1', '65.00', 'This is a test description.', 'assets/products_image/650/497.jpg', 1, '2023-03-20 20:14:35', '0000-00-00 00:00:00'),
(498, 18, 0, '018-46', '', 'SIB4 迷你跳跳球2', '65.00', 'This is a test description.', 'assets/products_image/650/498.jpg', 1, '2023-03-20 20:15:05', '0000-00-00 00:00:00'),
(499, 18, 0, '018-47', '', 'SIB4 迷你跳跳球3', '65.00', 'This is a test description.', 'assets/products_image/650/499.jpg', 1, '2023-03-20 20:15:33', '0000-00-00 00:00:00'),
(500, 18, 0, '018-48', '', 'SIB4 迷你跳跳球4', '65.00', 'This is a test description.', 'assets/products_image/650/500.jpg', 1, '2023-03-20 20:15:58', '0000-00-00 00:00:00'),
(502, 18, 0, '018-49', '', 'SIB5 跳跳球2', '65.00', 'This is a test description.', 'assets/products_image/650/502.jpg', 1, '2023-03-20 20:17:15', '0000-00-00 00:00:00'),
(503, 18, 0, '018-50', '', 'SIB5 跳跳球3', '65.00', 'This is a test description.', 'assets/products_image/650/503.jpg', 1, '2023-03-20 20:17:48', '0000-00-00 00:00:00'),
(504, 18, 0, '018-51', '', 'SIB5 跳跳球4', '65.00', 'This is a test description.', 'assets/products_image/650/504.jpg', 1, '2023-03-20 20:18:16', '0000-00-00 00:00:00'),
(505, 18, 0, '018-52', '', 'SIB5 跳跳球5', '65.00', 'This is a test description.', 'assets/products_image/650/505.jpg', 1, '2023-03-20 20:18:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `promo_code`
--

CREATE TABLE `promo_code` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `code` varchar(20) NOT NULL,
  `coupon_type` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `expirey_date` datetime NOT NULL,
  `status` int(10) NOT NULL DEFAULT '1',
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo_code`
--

INSERT INTO `promo_code` (`id`, `coupon_name`, `description`, `code`, `coupon_type`, `amount`, `start_date`, `expirey_date`, `status`, `inserted_at`, `updated_at`) VALUES
(1, 'Test', '1 y', '258', '1', 1203, '2020-12-12 00:00:00', '2021-01-01 00:00:00', 1, '2023-03-09 15:01:16', '0000-00-00 00:00:00'),
(2, 'Test 1', 'course', '369', '0', 1478, '2020-02-28 00:00:00', '2023-02-03 00:00:00', 1, '2023-03-09 15:02:21', '0000-00-00 00:00:00'),
(3, 'Test 3', 'course', '147', '0', 3698, '2010-07-12 00:00:00', '2015-10-31 00:00:00', 1, '2023-03-09 15:03:10', '0000-00-00 00:00:00'),
(4, 'Test 4', 'course', '789', '0', 3698, '2022-12-12 00:00:00', '2023-12-12 00:00:00', 1, '2023-03-09 15:03:43', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `category_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `category_id`, `product_id`, `quantity`, `inserted_at`) VALUES
(1, 4, 3, 150, '2023-03-15 14:46:07'),
(2, 5, 6, 50, '2023-03-15 14:46:23'),
(3, 1, 41, 200, '2023-03-21 15:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `s_image` varchar(200) NOT NULL,
  `inserted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `billing_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `item_price` float(10,2) NOT NULL,
  `item_price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_amount_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_checkout_session_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `billing_id`, `customer_name`, `customer_email`, `item_name`, `item_number`, `item_price`, `item_price_currency`, `paid_amount`, `paid_amount_currency`, `txn_id`, `payment_status`, `stripe_checkout_session_id`, `created`, `modified`) VALUES
(1, 13, 'Monoget Saha', 'frogbid.khl@gmail.com', '1小時30分鐘租場服務', 'DP12345', 190.00, 'hkd', 65.00, 'hkd', 'pi_3Mshb0Eef0ZfRYif10nA9s16', 'succeeded', 'cs_test_a1RGmiZqzDkWfHLVt95BD8UQM6j6N2oUE8PFwv6tmMMe3wbse5qiNEbQ89', '2023-04-03 15:15:02', '2023-04-03 15:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `inserted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo_code`
--
ALTER TABLE `promo_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=506;

--
-- AUTO_INCREMENT for table `promo_code`
--
ALTER TABLE `promo_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
