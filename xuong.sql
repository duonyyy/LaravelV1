-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 10:37 AM
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
-- Database: `xuong`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `footer` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `content`, `footer`, `created_at`, `updated_at`) VALUES
(1, 'fsdfsdf', 'dsfsdf', '2024-11-22 13:02:35', '2024-11-22 13:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'VĂN HỌC', '2024-11-26 06:04:53', '2024-11-26 06:04:53'),
(4, 'KINH TẾ', '2024-11-26 06:05:10', '2024-11-26 06:05:10'),
(5, 'TÂM LÝ - KĨ NĂNG SỐNG', '2024-11-26 06:05:23', '2024-11-26 06:05:23'),
(6, 'NUÔI DẠY CON', '2024-11-26 06:05:34', '2024-11-26 06:05:34'),
(7, 'SÁCH THIẾU NHI', '2024-11-26 06:05:44', '2024-11-26 06:05:44'),
(8, 'TIỂU SỬ - HỒI KÝ', '2024-11-26 06:06:04', '2024-11-26 06:06:04'),
(9, 'GIÁO KHOA - THAM KHẢO', '2024-11-26 06:06:15', '2024-11-26 06:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `content` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'gsghgd111', '2024-11-22 12:25:06', '2024-11-22 12:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_10_23_081501_create_category_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `status` enum('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment` varchar(600) DEFAULT NULL,
  `shipping` varchar(600) DEFAULT NULL,
  `note` varchar(600) DEFAULT NULL,
  `recipient_name` varchar(600) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `address` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`, `payment`, `shipping`, `note`, `recipient_name`, `phone`, `address`) VALUES
(3, 2, 1318000.00, 'pending', '2024-11-29 00:50:31', '2024-11-29 00:50:31', NULL, NULL, NULL, 'duong', NULL, 'dgbdg');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(3, 3, 22, 1, 350000.00, 350000.00, '2024-11-29 00:50:31', '2024-11-29 00:50:31'),
(4, 3, 14, 6, 145000.00, 870000.00, '2024-11-29 00:50:31', '2024-11-29 00:50:31'),
(5, 3, 15, 1, 98000.00, 98000.00, '2024-11-29 00:50:31', '2024-11-29 00:50:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` mediumtext DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(14, 'Băng Qua Đại Dương Đen', 145000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">BĂNG QUA ĐẠI DƯƠNG ĐEN - Hãy để tôi kéo bạn lên từ nơi bạn đang dần chìm xuống</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Có bao giờ bạn cảm thấy rằng rõ ràng bản thân chỉ muốn sống một cuộc đời bình thường thôi nhưng sao cũng quá đỗi khó khăn?</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Có bao giờ bạn cô đơn chìm sâu vào thất vọng đến tuyệt vọng mà không tài nào tìm được lối thoát?</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Hay có bao giờ bạn cảm thấy dường như mình chẳng còn lý do gì để tiếp tục níu giữ sinh mệnh chỉ còn thoi thóp chút hơi tàn?</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Nếu đã từng, vậy thì hãy để<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Băng qua đại dương đen</strong><span>&nbsp;</span>gửi đến bạn một tia sáng và kéo bạn vực dậy từ nơi bạn đang dần chìm xuống.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách kể về hành trình tìm lại dũng khí để sống tiếp của Tống Nhất Lý - một người đàn ông bị mắc kẹt trong bệnh trầm cảm và muốn kết liễu cuộc đời mình sau khi ly hôn và mẹ bị nhồi máu não, với sự giúp đỡ “âm thầm” từ một cô bé bảy tuổi bị ung thư não mà anh vô tình bắt gặp ở bệnh viện - Dư Tiểu Tụ. Vào lúc sợi dây cuối cùng liên kết anh với cuộc sống sắp sửa bị cắt đứt, cô bé đã xuất hiện và sẵn sàng đổi mấy ngày ít ỏi còn lại của cuộc đời để kéo dài sinh mệnh cho người xứng đáng được sống tiếp. Khởi nguồn từ cuộc gặp gỡ hết sức tình cờ, hai người đã có cơ hội cùng nhau sánh vai trên chiếc xe van cũ nát của Tống Nhất Lý đi đến những miền đất xa lạ, biết tới những con người mới, góp mặt vào câu chuyện của họ để rồi nhận ra ý nghĩa của cuộc sống, có thể tha thứ cho bản thân và trút bỏ gánh nặng của nỗi căm hận với những người từng mang lại thương tổn cho mình.</p><p></p>', 3, '2024-11-26 06:11:49', '2024-11-26 06:11:49'),
(15, 'Tuổi Trẻ Tan Vỡ Cho Một Đời Rực Rỡ', 98000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Ở những năm tháng tuổi trẻ, dường như người ta hầu hết đều sợ phải đối diện với chính bản thân mình trong căn phòng nội tâm tối om, thậm chí chẳng thấy cả cái bóng dáng tích cực nào của mình trong đó.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Ở những năm tháng tuổi trẻ, có khi, người ta chẳng mảy may nghĩ suy hay chiêm nghiệm gì về nỗi đau của chính mình. Tuổi trẻ, luôn có một châm ngôn truyền miệng hết người này đến người kia, đại loại là: Hãy cứ sống hết mình đi! Nhưng thực chất thì, những người trẻ ngoài kia, họ có đang thực sự sống hết mình và hiểu sống hết mình nghĩa là như thế nào không?</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Ở những năm tháng tuổi trẻ, giai đoạn mà con người ta dễ chênh vênh và mất phương hướng nhất. Ở cái độ tuổi này, con người ta có rất nhiều thứ, nào là sức khỏe, sự trẻ trung, lòng nhiệt huyết, và cả những mối quan hệ chất lượng.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Thế nhưng, ở cái độ tuổi đôi mươi ấy, con người ta cũng sẽ mang trong mình rất nhiều ưu tư và lắng lo về cuộc đời.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Tuổi trẻ tan vỡ cho một đời rực rỡ”</strong><span>&nbsp;</span>như những lời tâm sự chân tình mà tác giả muốn gửi gắm tới bạn. Trên hành trình trưởng thành, sẽ có lúc bạn cảm thấy cực kỳ cô đơn và không biết phải đi về đâu. Nhưng đừng lo, vì mỗi câu chuyện nhỏ và ngẫu nhiên trong cuốn sách này sẽ như người bạn đồng hành, cùng bạn đi qua sóng gió tuổi trẻ, cả những khoảng thời gian tươi đẹp, để tìm đến với một phiên bản tốt hơn của chính mình.</p><p></p>', 3, '2024-11-26 06:14:57', '2024-11-26 06:14:57'),
(16, 'Có Một Mùa Hè Chưa Từng Lãng Quên', 120000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách đưa bạn về những năm tháng tuổi trẻ, tìm lại chính mình trong những câu chuyện ngày xưa</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Đã bao giờ bạn tự hỏi, có phải mùa hè giống như tuổi trẻ không?&nbsp;</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Mùa hè bất chợt ùa đến, rực rỡ nhưng ngô nghê, để rồi vội vàng cuốn ta vào những cơn giông không kịp chuẩn bị. Tuổi trẻ cũng thế, đầy những sai lầm và vấp ngã, để mưa bão làm lòng ta ướt sũng, nhưng sau cùng, vẫn trả lại một tấm lòng trong sạch và kiên cường, trong lành như ban đầu.&nbsp;</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Rồi sẽ đến một ngày, như những nhân vật trong cuốn sách, bạn bước qua một ngã rẽ khác của cuộc đời, trở thành một phiên bản khác của chính mình, đồng hành cùng một người không còn là giấc mơ của những tháng năm xưa cũ. Có thể những mùa hè đầu tiên, những ngày rực nắng với trái tim chập chững biết yêu, sẽ dần mờ phai theo thời gian. Nhưng họ tin, những bão giông năm ấy, những vụng về ngây ngô, hay cái cảm giác run rẩy khi lần đầu nắm tay người mình thương, sẽ mãi là những mảnh ký ức khắc sâu, là bản hòa ca không thể nào quên trong cuộc đời mỗi người.&nbsp;</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Họ không muốn hối tiếc khi ngoảnh lại tuổi đôi mươi. Vì thế, mỗi lần nhìn hàng xà cừ thay lá, khi gió khẽ xao động trên những tán cây và nắng lan tỏa thứ mùi hương dịu ngọt, những chàng trai, cô gái ấy lại thấy lòng mình tràn ngập niềm hân hoan. Đó là niềm vui của một thời sống hết mình, khi trái tim yêu thương chẳng ngại tổn thương, khi những ngày non trẻ ngập tràn ánh sáng của hy vọng và đam mê.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Có một mùa hè chưa từng lãng quên”</strong><span>&nbsp;</span>là cuốn sách viết cho những ngày như thế – mùa hạ đầy tiếc nuối nhưng cũng chất chứa những khởi đầu mới mẻ.&nbsp;</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Mùa hè, như tuổi trẻ, luôn vỗ về và nâng đỡ ta lớn lên. Mong rằng, dù bước qua bao giông bão, tôi vẫn giữ được trái tim nguyên vẹn như những năm tháng đôi mươi.</p><p></p>', 3, '2024-11-26 06:17:06', '2024-11-26 06:17:06'),
(17, 'Tiệm Sách Của Nàng', 205000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Bối cảnh là một tiệm sách tại thành phố hiện đại. Nhân vật “anh” xuất hiện trong câu chuyện tình cảm lãng mạn, ở đó có nắng ấm êm, có mưa thành dòng để thả thuyền giấy, những câu thoại vu vơ chỉ hai người mới hiểu, với “một chút hân hoan, một chút dỗi hờn…”</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Nhưng tràn ngập gần 300 trang sách là ký ức về tuổi trưởng thành ngày ấy ở vùng quê miền Trung. Quá khứ và hiện tại mang màu sắc vui buồn trái ngược, khiến cuốn sách có một hấp dẫn khác biệt.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Sự vô tình của con người nhiều khi mang tính ác, nhất là khi dưới vỏ những câu chọc ghẹo trêu đùa dai dẳng. Có những chuyện khốc liệt, vô trách nhiệm, ích kỷ của chính người lớn đã bắt trẻ con phải gánh chịu. Có những đứa trẻ đã trở nên ưa gây gổ, ương bướng, bất cần khi cuộc đời chúng sa vào bi thương, bất hạnh.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">…Câu chuyện chất chứa nhiều cảm xúc, đặc biệt bất ngờ qua những nỗi niềm chưa thể gửi trao của cậu thiếu niên từng nổi tiếng ngang ngược và hung hãn dành cho người bạn gái cậu yêu. Tuổi thơ bị đánh cắp, bị “tra tấn tinh thần”, cuộc sống trở nên bấp bênh, nhưng may thay, sự tử tế và tình yêu thương kỳ diệu đã hóa giải lòng hận khô cứng, cuốn trôi đi sự ngạo ngược, chỉ còn lại sự mạnh mẽ với tâm hồn trong sạch, lòng tin vào nhân ái và sự bao dung dịu dàng.</p><p></p>', 3, '2024-11-26 06:20:25', '2024-11-26 06:20:25'),
(18, 'Nhớ Thương Vẫn Để Ở Trong Lòng', 79000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><em style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-style: italic; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Rồi ai cũng phải hết buồn<br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Rồi ai cũng phải hết thương một người<br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Rồi ai cũng phải thảnh thơi<br style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Bình yên ở giữa những nơi bão bùng”…</em></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Yêu một người không yêu mình là cảm giác thế nào?</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Là thương đấy nhưng chẳng dám quan tâm, là ghen đấy nhưng không có tư cách để giận… Khi tình yêu đến từ một phía chỉ khiến người ta day dứt và hoài niệm, tự cảm động chính mình. Yêu mà không thể nói ra giống như mỗi ngày bạn đều ôm một cục than hồng trong lồng ngực, chỉ toàn là đớn đau…</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Mùa đông này, hãy để trái tim rũ bỏ những tổn thương và thiệt thòi chẳng đáng!<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Nhớ thương vẫn để ở trong lòng”</strong><span>&nbsp;</span>sẽ cùng bạn mạnh mẽ buông bỏ đoạn tình cảm không thuộc về mình và chờ ngày tình yêu lại nở hoa rực rỡ. Mong cho bạn sau những vụn vỡ, mệt nhọc sẽ biết rời đi đúng lúc, ở lại với đúng người.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Vũ kể chuyện tình yêu bằng cảm xúc và những vần thơ. Vẫn là Vũ sâu sắc, tâm tình và thủ thỉ, những câu thơ dung dị nhưng nhẹ nhàng chạm vào trái tim bạn đọc.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách thay lời động viên mà Vũ muốn gửi đến bạn, hay đơn giản như một lá thư bạn viết cho chính mình, nhắc nhở rằng cứ can đảm yêu, mạnh mẽ buông… Nắng rồi sẽ về để con tim lại thêm một lần được sưởi ấm.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Nếu bạn muốn tìm lại chút bình yên và sống trọn vẹn với cảm xúc bên trong chính mình thì hãy để<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Nhớ thương vẫn để ở trong lòng”</strong><span>&nbsp;</span>dịu dàng đến bên bạn, nhé!<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Nhớ thương vẫn để ở trong lòng\"</strong><span>&nbsp;</span>- Cuốn sách dành tặng những ai lỡ thương một người không thương mình…</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\"><u style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Thông tin tác giả</u></strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Vũ</strong><span>&nbsp;</span>– nhà thơ mang tâm sự vào từng lời thơ để ôm lấy những trái tim cô đơn ở ngoài kia. Mỗi câu thơ của Vũ như một lời thủ thỉ xoa dịu bạn sau tổn thương, vụn vỡ. Không cần đến ngôn từ hoa mĩ, câu từ của Vũ nhẹ nhàng mà sâu lắng, chất chứa xúc cảm giúp độc giả bình lặng, chậm rãi tận hưởng buồn vui trong cuộc sống.</p><p></p>', 3, '2024-11-26 06:22:06', '2024-11-26 06:22:06'),
(19, 'WOW! Những Sự Thật Đáng Kinh Ngạc Về Vũ Trụ (Song ngữ Việt-Anh)', 98000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Kiến thức khoa học là một kho báu vô tận, nơi những điều kỳ diệu luôn chờ đợi được khám phá. Bộ sách&nbsp;<strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Wow! a book of extraordinary – Wow! Những sự thật đáng kinh ngạc</strong>&nbsp;chính là cánh cửa đưa các em nhỏ vào một thế giới tri thức phong phú và đầy màu sắc. Mỗi cuốn sách mở ra những bí mật thú vị, từ Vũ trụ bao la, Đại dương sâu thẳm, thời đại Khủng long huy hoàng, Rừng xanh bí ẩn, đến Cơ thể người kỳ diệu và những tiến bộ vượt bậc trong Phương tiện giao thông.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Tại sao bạn nên chọn bộ sách thiếu nhi&nbsp; Bách khoa toàn thư cho bé?</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Sách&nbsp; Bách khoa toàn thư song ngữ Việt – Anh kèm chú thích từ vựng khó: Giúp các bạn nhỏ mở rộng vốn từ vựng và thuật ngữ khoa học bằng cả hai ngôn ngữ: tiếng Anh và tiếng Việt.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– File nghe (audio tặng kèm): Mua 1 được 3 vô cùng hời: Tiếng Việt, Tiếng Anh, Audiobook.Bách khoa toàn thư được thiết kế 3 in 1 giúp các độc giả nhỏ vừa cập nhật kiến thức bổ ích, vừa học thêm Tiếng Anh hiệu quả, có thêm cả Audiobook hỗ trợ luyện nghe.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Nội dung khoa học cô đọng, hấp dẫn:&nbsp; Bách khoa toàn thư cho bé được chắt lọc kiến thức từ hàng nghìn chủ đề khoa học, bộ sách cập nhật thông tin mới nhất và được minh họa bằng những hình ảnh đẹp mắt giúp các bạn nhỏ hứng thú với những môn học tưởng chừng nhàm chán.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Series được yêu thích toàn cầu: Wow! a book of extraordinary được xuất bản tại hơn 10 quốc gia, bộ sách Bách khoa toàn thư cho bé đã chinh phục hàng triệu độc giả nhỏ tuổi tại những thị trường khó tính như: Mỹ, Trung Quốc, Hàn Quốc, Nga và nhiều quốc gia châu Âu khác.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Thiết kế phù hợp với trẻ nhỏ: Bách khoa toàn thư cho bé in 4 màu trên giấy chống lóa, chống cận, khổ lớn, mang lại trải nghiệm đọc thoải mái và thuận tiện cho việc nghiên cứu khoa học.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Hình ảnh sinh động, trực quan: Thông tin sách Bách khoa toàn thư cho trẻ em phong phú kết hợp với hình minh họa sắc nét, màu sắc hài hòa và ngộ nghĩnh giúp các bạn nhỏ dễ hiểu và ghi nhớ nhanh những kiến thức bổ ích.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Khám phá từng cuốn sách thiếu nhi trong bộ Bách khoa toàn thư song ngữ</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">#1. Bách khoa toàn thư: Những sự thật đáng kinh ngạc trong lòng đại dương</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Hãy khám phá đại dương kỳ bí và tìm hiểu về các sinh vật như cá heo thích huýt sáo, cá voi xanh khổng lồ, và các loài cá mê lướt sóng. Cuốn sách mở ra thế giới biển sống động và dạy trẻ cách bảo vệ môi trường biển.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">#2. Bách khoa toàn thư: Những sự thật đáng kinh ngạc trong rừng sâu!</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Đắm chìm vào rừng xanh để gặp gỡ những sinh vật nhỏ bé bận rộn bên dưới những tán cây cổ thụ hàng trăm năm tuổi. Trẻ sẽ học về loài cây khổng lồ, sự đa dạng của các sinh vật, và tầm quan trọng của rừng trong hệ sinh thái.</p><p></p>', 7, '2024-11-26 06:24:38', '2024-11-26 06:24:38');
INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(20, 'WOW! Những Sự Thật Đáng Kinh Ngạc Về Đại Dương (Song ngữ Việt-Anh)', 100000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Kiến thức khoa học là một kho báu vô tận, nơi những điều kỳ diệu luôn chờ đợi được khám phá. Bộ sách&nbsp;<strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Wow! a book of extraordinary – Wow! Những sự thật đáng kinh ngạc</strong>&nbsp;chính là cánh cửa đưa các em nhỏ vào một thế giới tri thức phong phú và đầy màu sắc. Mỗi cuốn sách mở ra những bí mật thú vị, từ Vũ trụ bao la, Đại dương sâu thẳm, thời đại Khủng long huy hoàng, Rừng xanh bí ẩn, đến Cơ thể người kỳ diệu và những tiến bộ vượt bậc trong Phương tiện giao thông.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Tại sao bạn nên chọn bộ sách thiếu nhi&nbsp; Bách khoa toàn thư cho bé?</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Sách&nbsp; Bách khoa toàn thư song ngữ Việt – Anh kèm chú thích từ vựng khó: Giúp các bạn nhỏ mở rộng vốn từ vựng và thuật ngữ khoa học bằng cả hai ngôn ngữ: tiếng Anh và tiếng Việt.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– File nghe (audio tặng kèm): Mua 1 được 3 vô cùng hời: Tiếng Việt, Tiếng Anh, Audiobook.Bách khoa toàn thư được thiết kế 3 in 1 giúp các độc giả nhỏ vừa cập nhật kiến thức bổ ích, vừa học thêm Tiếng Anh hiệu quả, có thêm cả Audiobook hỗ trợ luyện nghe.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Nội dung khoa học cô đọng, hấp dẫn:&nbsp; Bách khoa toàn thư cho bé được chắt lọc kiến thức từ hàng nghìn chủ đề khoa học, bộ sách cập nhật thông tin mới nhất và được minh họa bằng những hình ảnh đẹp mắt giúp các bạn nhỏ hứng thú với những môn học tưởng chừng nhàm chán.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Series được yêu thích toàn cầu: Wow! a book of extraordinary được xuất bản tại hơn 10 quốc gia, bộ sách Bách khoa toàn thư cho bé đã chinh phục hàng triệu độc giả nhỏ tuổi tại những thị trường khó tính như: Mỹ, Trung Quốc, Hàn Quốc, Nga và nhiều quốc gia châu Âu khác.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Thiết kế phù hợp với trẻ nhỏ: Bách khoa toàn thư cho bé in 4 màu trên giấy chống lóa, chống cận, khổ lớn, mang lại trải nghiệm đọc thoải mái và thuận tiện cho việc nghiên cứu khoa học.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">– Hình ảnh sinh động, trực quan: Thông tin sách Bách khoa toàn thư cho trẻ em phong phú kết hợp với hình minh họa sắc nét, màu sắc hài hòa và ngộ nghĩnh giúp các bạn nhỏ dễ hiểu và ghi nhớ nhanh những kiến thức bổ ích.</p><p></p>', 7, '2024-11-26 06:27:49', '2024-11-26 06:27:49'),
(21, '20 Điều Quan Trọng Nhất - Nói Với Con Về Những Điều Quý Giá Trong Đời', 200000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Nếu được hỏi điều gì quan trọng nhất trên đời, ba mẹ sẽ nói gì với con? Cuốn sách bạn cầm trên tay sẽ chia sẻ một góc nhìn đáng yêu về 20 điều không phải ai cũng nhớ đến ngay lập tức, nhưng lại rất đỗi quen thuộc và cần thiết với mỗi chúng ta.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Thế giới hiện đại ngày nay, trẻ em được hưởng ngày càng nhiều tiện nghi, và nhu cầu vật chất cũng lớn lên. Thế nhưng, nếu chỉ được mang theo một va-li hành lí trên đường đời, ta nên chọn thứ gì để xếp vào đó. Chắc hẳn, đây là một đề tài thảo luận cực kì thú vị và hữu ích giữa ba mẹ và con cái, giúp cả nhà tìm ra, nhận ra những điều có giá trị vượt thời gian</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\"><u style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Thông tin tác giả</u></strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">TÁC GIẢ CHRISTOPH HEIN</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Sinh năm 1944 tại thành phố Slesien (Đức). Ông học ngành Triết học và Logic học tại Berlin. Ông là nhà văn, nhà viết kịch, dịch giả và tác giả truyện ngắn. Các vở kịch và tiểu thuyết của ông đã giành được nhiều giải thưởng. Cùng với họa sĩ vẽ tranh minh họa Rotraut Susanne Berner, ông đã xuất bản hai cuốn sách thiếu nhi “Con ngựa hoang dưới lò sưởi” (1989) và “Mẹ đã đi rồi” (2003).</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">HỌA SĨ ROTRAUT SUSANNE BERNER</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Sinh năm 1948 tại thành phố Stuttgart (Đức). Bà học ngành Thiết kế đồ họa, sau đó làm thiết kế sách và vẽ minh họa từ năm 1977.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Với khoảng 50 cuốn sách tranh và sách thiếu nhi, bà đã được trao nhiều giải thưởng, trong đó có giải Đặc biệt ở Giải thưởng Văn học trẻ Đức năm 2006, và nhiều lần được đề cử tại giải thưởng văn học thiếu nhi Hans Christian Andersen, trước khi bà giành giải vào năm 2016.</p><p></p>', 7, '2024-11-26 06:29:15', '2024-11-26 06:29:15'),
(22, 'Lược Sử Về Bình Đẳng', 350000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Best Book of the Year theo Public Books</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Editors’ Choice tại New York Times Book Review</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Tác giả: Thomas Piketty là Giáo sư tại École des Hautes Études en Sciences Sociales (EHESS) và Trường Kinh tế Paris, và là đồng giám đốc tại World Inequality Lab. Tác giả cuốn \"Tư bản thế kỷ 21\".</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">......</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">\"Lược sử về bình đẳng\"</strong><span>&nbsp;</span>xoay quanh bình đẳng và bất bình đẳng trong kinh tế, thể hiện qua chính trị và các thước đo chất lượng cuộc sống con người (tuổi thọ bình quân, cơ hội giáo dục, tỉ lệ mù chữ, các quyền con người như quyền bầu cử, vân vân). Tác giả có nhận định và cái nhìn lạc quan rằng thế giới đang ngày càng bình đẳng hơn, giải thích bằng sự xuất hiện ngày càng phổ biến của thuế luỹ tiến trên thu nhập và tài sản, cũng như phúc lợi xã hội toàn diện.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Đề tài bất bình đẳng trong kinh tế là trọng tâm nghiên cứu của Thomas Piketty. Sách gây được tiếng vang khi xuất bản lần đầu tại Pháp vào năm 2021, hiện đã xuất bản tại Mỹ, có gần 7000 lượt review trên Goodreads và trên Amazon, trung bình 4,2/5 sao.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">Những lời khen tặng:</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">“Một lời kêu gọi hành động thâm thúy và lạc quan. Đối với Piketty, tiến trình lịch sử tuy dài nhưng quả có đang nghiêng về phía bình đẳng. Dù vậy, chẳng có gì là tất yếu ở đây cả: là công dân, chúng ta phải sẵn lòng chiến đấu vì bình đẳng, và liên tục (tái) tạo lập ngàn vạn định chế để đạt được bình đẳng. Cuốn sách này sẽ giúp ta làm điều đó”.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><em style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-style: italic; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">― Esther Duflo, nhà kinh tế học đoạt giải Nobel, đồng tác giả \"Hiểu nghèo thoát nghèo\" và \"Kinh tế học thời khó nhọc\"</em></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">“Thomas Piketty đã giúp đưa vấn đề bất bình đẳng vào vị trí trung tâm của cuộc tranh luận chính trị. Và giờ đây, ông đề xuất một chương trình đầy hoài bão để đối phó với bất bình đẳng. Đây chính là kinh tế chính trị ở quy mô lớn, một điểm khởi đầu cho tranh luận về tương lai của chính trị tiến bộ”.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><em style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-style: italic; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">― Michael J. Sandel, tác giả \"Phải trái đúng sai\" và \"Tiền không mua được gì?\"</em></p><p></p>', 4, '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(24, 'Vương Đạo Kinh Doanh', 125000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Bạn đang nung nấu tinh thần KHỞI NGHIỆP. Và bạn hoàn toàn tin chắc rằng mình đủ khả năng và sức mạnh để khởi nghiệp làm giàu. Sự quyết đoán chắc nịch của bạn thật đáng ghi nhận. Nhưng bạn đã chuẩn bị hành trang gì cho câu chuyện “làm ăn” mà bạn vạch ra chưa? Lâu nay, chúng ta thường quen nghe khởi nghiệp gắn liền với làm giàu nhưng việc xây dựng&nbsp; “cái đạo” trong quá trình làm giàu thì ít bạn trẻ nghĩ tới. Chúng tôi xin gợi ý với các bạn một cuốn sách Vương đạo kinh doanh với tinh thần “Chỉ đường dẫn lối” cùng những nguyên tắc rất cần thiết cho những nhà kinh doanh trẻ của tác giả Hideo Okubo –&nbsp; người sáng lập và đứng đầu của tập đoàn Forval với hơn 2000 nhân viên ở khắp thế giới, có hơn 40 năm kinh nghiệm kinh doanh thành công đa quốc gia và nhất là Nhật Bản.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách xây dựng trên “Nguyên tắc 8.8.8” mang phong cách Hideo Okubo, gồm các phần cơ bản sau:</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Phần I: 8 Tư duy cần thiết cho các nhà lãnh đạo.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Phần II: 8 Nguyên tắc chung của nhà lãnh đạo thành công.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Phần III: 8 Các tiếp cận các doanh nhân cần có để thành công</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Hãy nằm lòng những đạo lý kinh doanh sau:</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Hãy lãnh đạo bản thân trước khi lãnh đạo doanh nghiệp</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Nâng cao năng lực làm người để làm cột trụ nâng cao năng lực lãnh đạo</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Hãy sống hết mình và chính trực, đưa ý nguyện vào tâm thức trước khi thực hiện</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">•&nbsp; Đừng chỉ bán đồ, hãy trở thành nhà cung cấp trải nghiệm</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Học cách vượt qua khó khăn từ bất cứ ai, “luôn biết ơn và trả ơn.”, xem trọng “nhân duyên”, xem “hạnh phúc của người khác là hạnh phúc của bản thân.”</p><p></p>', 4, '2024-11-26 06:33:57', '2024-11-26 06:33:57'),
(25, 'Tâm Thức Tài Chính', 299000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Từ xưa đến nay, “Tiền” là một chủ đề chẳng mấy dễ chịu để thảo luận hay chia sẻ. Trong các buổi họp mặt gia đình, họp mặt bạn bè hay các buổi hẹn hò, hầu hét mọi người thường có xu hướng lảng tránh những câu hỏi liên quan đến thu nhập, chi tiêu và giá cả của các món đồ mình có.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Tiền tác động đến hầu hết mọi mặt của đời sống: công việc, thời gian nghỉ ngơi, các hoạt động sáng tạo, nhà cửa, gia đình và đời sống tinh thần. Mọi thứ chúng ta làm và mơ ước đều bị ảnh hưởng bởi mối quan hệ với hình thái năng lượng mạnh mẽ này. Từ ước mơ to lớn như kinh doanh, mua nhà, mua xe, cho đến những dự định nhỏ như trang trải cuộc sống hay mua một món đồ nào đó, năng lượng của đồng tiền đều có những ảnh hưởng nhất định đến chúng.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Tiền có thể là cội nguồn cho một cuộc sống sung túc, nhưng cũng có thể mang lại sự đau khổ nếu chúng ta không hiểu đúng về năng lượng của đồng tiền. Cuốn sách<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“Tâm thức tài chính”</strong><span>&nbsp;</span>tổng hợp những bài học sâu sắc về tiền bạc và các quy luật tâm thức sẽ giúp bạn thu hút sự thịnh vượng vật chất lẫn tinh thần.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách này giúp bạn:</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">• Thay đổi hoàn toàn cách suy nghĩ về mối quan hệ giữa bản thân với đồng tiền.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">• 12 quy tắc hướng tới sự đủ đầy, gỡ bỏ những quan niệm sai lệch về tiền.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">• Thay đổi hành vi và thói quen sử dụng tiền. Từ đó, quản lý tiền bạc một cách thông minh.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">• Áp dụng những bài học về tiền và luật hấp dẫn vào tất cả mọi lĩnh vực, hướng đến một cuộc sống có ý nghĩa hơn.</p><p></p>', 4, '2024-11-26 06:37:02', '2024-11-26 06:37:02');
INSERT INTO `product` (`id`, `name`, `price`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(26, 'Trí Nhớ Sâu - Cách Ghi Nhớ Hiệu Quả', 135000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">TRÍ NHỚ SÂU - CÁCH GHI NHỚ HIỆU QUẢ: 7 quy tắc ghi nhớ giúp bạn thoát khỏi hội chứng “não cá vàng”</strong></p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">“Não cá vàng” là một cụm từ để chỉ những người có trí nhớ ngắn hạn, hay quên trước quên sau. Nếu bạn từng rời khỏi nhà mà quên mang túi xách, hay thậm chí không nhớ nổi tên của người mình vừa gặp, bạn có thể đang mắc phải hội chứng “não cá vàng\".</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Trong thời đại công nghệ số, não bộ chúng ta phải xử lý hàng triệu thông tin, tạo áp lực cho \"ổ cứng tự nhiên” mỗi ngày. Giáo sư Robert Madigan, chuyên gia tâm lý học tại Đại học Alaska Anchorage chỉ ra rằng: Sự thịnh hành của các nội dung \"ăn liền\", video ngắn dưới một phút đã dẫn đến thói quen lười tư duy, khiến trí nhớ suy giảm.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Cuốn sách<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“TRÍ NHỚ SÂU - CÁCH GHI NHỚ HIỆU QUẢ”</strong><span>&nbsp;</span>sẽ hướng dẫn những nguyên tắc cơ bản của hệ thống trí nhớ, giúp bạn khắc phục vấn đề “não cá vàng” của bản thân. Từ đó nhận ra chứng hay quên không phải là đặc điểm bẩm sinh mà là kết quả của việc sử dụng não bộ chưa đúng cách. Tác giả Robert Madigan không chỉ gợi ý độc giả rèn luyện trí nhớ thông qua trò chơi trí tuệ, bài tập chánh niệm và các hoạt động thể thao mà còn chia sẻ một số phương thức hiệu quả như:</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">- Ghi nhớ tên và gương mặt: Liên kết tên, đặc điểm nổi bật của gương mặt với công việc và hoàn cảnh gặp gỡ người đó.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">- Ghi nhớ thông tin: Tổ chức lại thông tin và tạo ra các “chỉ dẫn” cho khu vực lưu trữ trong não bộ.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">- Ghi nhớ các con số: Mã hóa theo biểu tượng hoặc âm thanh.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">- Ghi nhớ kỹ năng công việc: Tập trung vào chi tiết và mục tiêu cụ thể của từng kỹ năng.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Hy vọng cuốn sách<span>&nbsp;</span><strong style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; font-weight: bold; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent;\">“TRÍ NHỚ SÂU - CÁCH GHI NHỚ HIỆU QUẢ”</strong><span>&nbsp;</span>sẽ trở thành công cụ giúp bạn thoát khỏi những phiền phức mà “não cá vàng” đem lại, xây dựng sự tự tin vào khả năng trí tuệ của bản thân.</p><p></p>', 5, '2024-11-26 06:38:35', '2024-11-26 06:38:35'),
(27, 'Sức Mạnh Nhân Sinh', 129000, '<p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Sách Mạnh Tử được mệnh danh là một trong “Tứ Thư” - bốn tác phẩm kinh điển của Nho học Trung Hoa, được Chu Hy thời nhà Tống lựa chọn. Mạnh Tử vốn là bậc hiền nhân có tài hùng biện hơn người nên từng câu từng chữ ông nói ra cũng chứa đầy sức nặng. Tư tưởng và triết lý của Mạnh Tử đã có ảnh hưởng vô cùng lớn đến nền tảng tinh thần của con người. Những câu nói nổi tiếng của Mạnh Tử vẫn còn vang vọng qua bao thế hệ dù hàng nghìn năm đã trôi qua.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Sau quá trình nghiên cứu kỹ lưỡng suốt nhiều năm liền, tác giả Phàn Đăng đã biên soạn nên Sức mạnh nhân sinh. Anh chọn lọc những nội dung gần gũi nhất với cuộc sống thường ngày của chúng ta, kết hợp với thực tế cuộc sống hiện đại để diễn giải các chương kinh điển trong sách Mạnh Tử, từ ý định ban đầu, nhịp sống, sự lựa chọn, đến mối quan hệ bạn bè, khả năng suy ngẫm, lòng tốt và sự trưởng thành.</p><p class=\"text-justify\" style=\"-webkit-tap-highlight-color: rgba(0, 0, 0, 0); box-sizing: border-box; color: rgb(30, 30, 30); font-family: Inter, -apple-system, sans-serif; font-size: 15px; font-style: normal; font-weight: 400; margin: 0px; padding: 6px 0px; scrollbar-width: thin; scrollbar-color: rgb(162, 162, 162) transparent; text-align: justify; line-height: 1.45; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; white-space: normal; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">Bảy khía cạnh của định hướng phát triển này chắc chắn sẽ mang đến cho bạn đọc những giải thích về sự khôn ngoan trong việc tu dưỡng bản thân và cách cư xử của con người, từ đó giúp bạn đạt được sự bình yên về tinh thần trong thời đại bất ổn hiện nay.</p><p></p>', 5, '2024-11-26 06:39:54', '2024-11-26 06:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `vote_star` enum('1','2','3','4','5') DEFAULT '5',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `comment`, `vote_star`, `created_at`, `updated_at`) VALUES
(10, 14, 14, 'vfvfv', '5', '2024-11-29 02:01:19', '2024-11-29 02:01:19'),
(11, 14, 14, 'đsdfsd', '5', '2024-11-29 02:02:50', '2024-11-29 02:02:50'),
(12, 14, 14, 'fsgsfgd', '5', '2024-11-29 02:05:34', '2024-11-29 02:05:34'),
(13, 14, 14, 'dfsdfsd', '5', '2024-11-29 02:06:26', '2024-11-29 02:06:26'),
(14, 14, 14, 'dfsdfsd', '5', '2024-11-29 02:13:11', '2024-11-29 02:13:11'),
(16, 14, 14, 'cdc', '5', '2024-11-29 02:16:26', '2024-11-29 02:16:26'),
(17, 27, 14, 'dfsdfsd', '5', '2024-11-29 02:28:13', '2024-11-29 02:28:13'),
(18, 27, 14, 'hhh', '5', '2024-11-29 02:31:54', '2024-11-29 02:31:54'),
(19, 27, 14, 'ffrsffgdfgdf', '5', '2024-11-29 02:35:05', '2024-11-29 02:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `image_type` enum('main','secondary') DEFAULT 'main',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_url`, `image_type`, `created_at`, `updated_at`) VALUES
(15, 14, 'products/1732626709-bang-qua-dai-duong-den.jpg', 'main', '2024-11-26 06:11:49', '2024-11-26 06:11:49'),
(16, 14, 'products/1732626709-bang-qua-dai-duong-den-b04.jpg', 'secondary', '2024-11-26 06:11:49', '2024-11-26 06:11:49'),
(17, 14, 'products/1732626709-bang-qua-dai-duong-den-mockup.jpg', 'secondary', '2024-11-26 06:11:49', '2024-11-26 06:11:49'),
(18, 15, 'products/1732626897-tuoi-tre-tan-vo-cho-mot-doi-ruc-ro.jpg', 'main', '2024-11-26 06:14:57', '2024-11-26 06:14:57'),
(19, 15, 'products/1732626897-tuoi-tre-tan-vo-cho-mot-doi-ruc-ro-b04.jpg', 'secondary', '2024-11-26 06:14:57', '2024-11-26 06:14:57'),
(20, 15, 'products/1732626897-tuoi-tre-tan-vo-cho-mot-doi-ruc-ro-mockup.jpg', 'secondary', '2024-11-26 06:14:57', '2024-11-26 06:14:57'),
(21, 16, 'products/1732627026-co-mot-mua-he-chua-tung-lang-quen.jpg', 'main', '2024-11-26 06:17:06', '2024-11-26 06:17:06'),
(22, 16, 'products/1732627026-co-mot-mua-he-chua-tung-lang-quen-b04.jpg', 'secondary', '2024-11-26 06:17:06', '2024-11-26 06:17:06'),
(23, 16, 'products/1732627026-co-mot-mua-he-chua-tung-lang-quen-mockup.jpg', 'secondary', '2024-11-26 06:17:06', '2024-11-26 06:17:06'),
(24, 17, 'products/1732627225-tiem-sach-cua-nang-bia-cung.jpg', 'main', '2024-11-26 06:20:25', '2024-11-26 06:20:25'),
(25, 17, 'products/1732627225-tiem-sach-cua-nang-bia-cung-mockup.jpg', 'secondary', '2024-11-26 06:20:25', '2024-11-26 06:20:25'),
(26, 18, 'products/1732627327-nho-thuong-van-de-o-trong-long.jpg', 'main', '2024-11-26 06:22:07', '2024-11-26 06:22:07'),
(27, 18, 'products/1732627327-nho-thuong-van-de-o-trong-long-mockup.jpg', 'secondary', '2024-11-26 06:22:07', '2024-11-26 06:22:07'),
(28, 18, 'products/1732627327-nho-thuong-van-de-o-trong-long-p01.jpg', 'secondary', '2024-11-26 06:22:07', '2024-11-26 06:22:07'),
(29, 18, 'products/1732627327-nho-thuong-van-de-o-trong-long-p02.jpg', 'secondary', '2024-11-26 06:22:07', '2024-11-26 06:22:07'),
(30, 18, 'products/1732627327-nho-thuong-van-de-o-trong-long-p03.jpg', 'secondary', '2024-11-26 06:22:07', '2024-11-26 06:22:07'),
(31, 19, 'products/1732627478-wow-vu-tru-p02.jpg', 'main', '2024-11-26 06:24:38', '2024-11-26 06:24:38'),
(32, 19, 'products/1732627478-wow-vu-tru.jpg', 'secondary', '2024-11-26 06:24:38', '2024-11-26 06:24:38'),
(33, 19, 'products/1732627478-wow-vu-tru-p01.jpg', 'secondary', '2024-11-26 06:24:38', '2024-11-26 06:24:38'),
(34, 20, 'products/1732627669-wow-dai-duong.jpg', 'main', '2024-11-26 06:27:49', '2024-11-26 06:27:49'),
(35, 20, 'products/1732627669-wow-dai-duong-mockup.jpg', 'secondary', '2024-11-26 06:27:49', '2024-11-26 06:27:49'),
(36, 20, 'products/1732627669-wow-dai-duong-mockup-02.jpg', 'secondary', '2024-11-26 06:27:49', '2024-11-26 06:27:49'),
(37, 21, 'products/1732627755-20-dieu-quan-trong-nhat.jpg', 'main', '2024-11-26 06:29:15', '2024-11-26 06:29:15'),
(38, 21, 'products/1732627755-20-dieu-quan-trong-nhat-p01.jpg', 'secondary', '2024-11-26 06:29:15', '2024-11-26 06:29:15'),
(39, 21, 'products/1732627755-20-dieu-quan-trong-nhat-p02.jpg', 'secondary', '2024-11-26 06:29:15', '2024-11-26 06:29:15'),
(40, 21, 'products/1732627755-20-dieu-quan-trong-nhat-p03.jpg', 'secondary', '2024-11-26 06:29:15', '2024-11-26 06:29:15'),
(41, 22, 'products/1732627900-luoc-su-ve-binh-dang.jpg', 'main', '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(42, 22, 'products/1732627900-luoc-su-ve-binh-dang-b04.jpg', 'secondary', '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(43, 22, 'products/1732627900-luoc-su-ve-binh-dang-p01.jpg', 'secondary', '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(44, 22, 'products/1732627900-luoc-su-ve-binh-dang-p02.jpg', 'secondary', '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(45, 22, 'products/1732627900-luoc-su-ve-binh-dang-p03.jpg', 'secondary', '2024-11-26 06:31:40', '2024-11-26 06:31:40'),
(49, 24, 'products/1732628037-vuong-dao-kinh-doanh.jpg', 'main', '2024-11-26 06:33:57', '2024-11-26 06:33:57'),
(50, 24, 'products/1732628037-vuong-dao-kinh-doanh-b04.jpg', 'secondary', '2024-11-26 06:33:57', '2024-11-26 06:33:57'),
(51, 24, 'products/1732628037-vuong-dao-kinh-doanh-mockup.jpg', 'secondary', '2024-11-26 06:33:57', '2024-11-26 06:33:57'),
(52, 25, 'products/1732628222-tam-thuc-tai-chinh.jpg', 'main', '2024-11-26 06:37:02', '2024-11-26 06:37:02'),
(53, 25, 'products/1732628222-tam-thuc-tai-chinh-b04.jpg', 'secondary', '2024-11-26 06:37:02', '2024-11-26 06:37:02'),
(54, 25, 'products/1732628222-tam-thuc-tai-chinh-mockup.jpg', 'secondary', '2024-11-26 06:37:02', '2024-11-26 06:37:02'),
(55, 26, 'products/1732628315-tri-nho-sau-cach-ghi-nho-hieu-qua.jpg', 'main', '2024-11-26 06:38:35', '2024-11-26 06:38:35'),
(56, 26, 'products/1732628315-tri-nho-sau-cach-ghi-nho-hieu-qua-b04.jpg', 'secondary', '2024-11-26 06:38:35', '2024-11-26 06:38:35'),
(57, 26, 'products/1732628315-tri-nho-sau-cach-ghi-nho-hieu-qua-mockup.jpg', 'secondary', '2024-11-26 06:38:35', '2024-11-26 06:38:35'),
(58, 27, 'products/1732628394-suc-manh-nhan-sinh.jpg', 'main', '2024-11-26 06:39:54', '2024-11-26 06:39:54'),
(59, 27, 'products/1732628394-suc-manh-nhan-sinh-b04.jpg', 'secondary', '2024-11-26 06:39:54', '2024-11-26 06:39:54'),
(60, 27, 'products/1732628394-suc-manh-nhan-sinh-mockup.jpg', 'secondary', '2024-11-26 06:39:54', '2024-11-26 06:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_map` text NOT NULL,
  `site_timezone` varchar(100) NOT NULL,
  `site_footer` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_logo`, `site_favicon`, `site_map`, `site_timezone`, `site_footer`, `contact_phone`, `contact_address`, `contact_email`, `created_at`, `updated_at`) VALUES
(1, 'BookTD', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6055314132323!2d106.67074501099633!3d10.76485388933896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10a9f249b%3A0x54af0b8f63e60391!2zMzMgxJAuIFbEqW5oIFZp4buFbiwgUGjGsOG7nW5nIDIsIFF14bqtbiAxMCwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1714299849880!5m2!1sen!2s\" width=\"800\" height=\"600\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Asia/Ho_Chi_Minh', 'copyright © 2024', '0969273060', '33 Vĩnh Viễn, Phường 2, Quận 10, TP.HCM', '22662057@kthcm.edu.vn', '2024-11-25 22:57:55', '2024-11-25 22:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(3, 'title 1', 'sliders/1732628738-slider_2.png', '2024-11-26 13:45:38', '2024-11-26 13:45:38'),
(4, 'title 2', 'sliders/1732628787-Thanhtoankhongtienmat1124_trangchinh_840x320_1.png', '2024-11-26 13:46:27', '2024-11-26 13:46:27'),
(5, 'title 3', 'sliders/1732628848-TrangBlackfridayT11_ResizeSlideBanner_840x320_3.png', '2024-11-26 13:47:28', '2024-11-26 13:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL,
  `icon` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `url`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Facebookk', 'https://www.facebook.com/', '<i class=\"fa-brands fa-facebook\"></i>', '2024-11-25 03:00:37', '2024-11-25 03:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` int(11) NOT NULL,
  `content` varchar(6000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '12341fdfdsaa', '2024-11-22 17:38:18', '2024-11-25 16:23:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('1','2') DEFAULT '2',
  `image` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `image`) VALUES
(14, 'Admin', 'admin123@gmail.com', NULL, '$2y$12$9ZoPJREimTSkadROau9YJe1YYs7.i0cnlwI2AiwTFX9MXo6i6ecj.', NULL, '2024-11-29 01:59:44', '2024-11-29 01:59:44', '1', 'users/1732870784-anh-avatar-anime-2-1.jpg'),
(15, 'User', 'user123@gmail.com', NULL, '$2y$12$I0GWzUwrVDztLLfXSH9Y6u4kmLI1wRMyQgz0xhMvBaVji3qvAQNxS', NULL, '2024-11-29 02:00:33', '2024-11-29 02:00:33', '2', 'users/1732870833-images.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_details_orders` (`order_id`),
  ADD KEY `fk_order_details_product` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `fk_order_details_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_order_details_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
