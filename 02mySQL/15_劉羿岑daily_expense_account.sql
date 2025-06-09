-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-21 10:11:34
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `daily_expense_account`
--

-- --------------------------------------------------------

--
-- 資料表結構 `expense_daily`
--

CREATE TABLE `expense_daily` (
  `id` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `item` text NOT NULL,
  `type` varchar(12) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `place` varchar(20) NOT NULL,
  `store` varchar(20) NOT NULL,
  `receipt` varchar(12) NOT NULL,
  `tags` varchar(16) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `expense_daily`
--

INSERT INTO `expense_daily` (`id`, `pay_date`, `amount`, `item`, `type`, `payment`, `account`, `place`, `store`, `receipt`, `tags`, `note`, `created_at`, `updated_at`) VALUES
(1, '2025-05-20', 72, '比菲多減糖纖維\r\n焗烤雙起司鮪魚三明治', '食', 'creditcard', 'cube卡', '新莊', '7-11', 'NM57696998', '', '', '2025-05-21 07:49:55', '2025-05-21 07:49:55'),
(2, '2025-05-21', 260, '油雞便當*2', '食', 'cash', 'cash', '新莊', '正斗港式燒臘', '', '', '', '2025-05-21 07:55:55', '2025-05-21 07:55:55'),
(3, '2025-05-22', 800, '火鍋', '食', 'cash', 'cash', '新莊', '加分100%浜中特選昆布鍋物', '', '', '', '2025-05-21 07:55:55', '2025-05-21 07:55:55'),
(4, '2025-05-19', 440, 'PIZZA', '食', 'bank', 'LINEBank', '新莊', '7-11', '', '', '', '2025-05-21 08:01:18', '2025-05-21 08:01:18'),
(5, '2025-05-18', 224, '統一布丁\r\n椰子水', '食', 'creditcard', 'cube', '新莊', '全聯', 'NA90011328', '', '', '2025-05-21 08:01:18', '2025-05-21 08:01:18'),
(6, '2025-05-17', 130, '柚子皮', '食', 'creditcard', 'cube卡', '宏匯', '日商超市', 'PK21332739', '', '', '2025-05-21 08:08:42', '2025-05-21 08:09:39'),
(7, '2025-05-17', 3450, '衣服', '衣', 'creditcard', 'cube', '網路', '波波貴媽咪', 'PG61043754', '', '', '2025-05-21 08:08:42', '2025-05-21 08:08:42'),
(8, '2025-05-17', 1439, '晚餐', '食', 'bank', 'LINEBank', '宏匯', '銀杏子豬排', 'PC64163485', '', '代付400', '2025-05-21 08:08:42', '2025-05-21 08:10:40'),
(9, '2025-05-17', 3122, '包包', '衣', 'creditcard', 'cube', '宏匯', 'playboy', 'PC63939763', '', '', '2025-05-21 08:08:42', '2025-05-21 08:08:42'),
(10, '2025-05-13', 699, '電話費', '電話費', 'creditcard', 'cube', '', '遠傳', 'NL74049777', '', '', '2025-05-21 08:08:42', '2025-05-21 08:08:42');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `expense_daily`
--
ALTER TABLE `expense_daily`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `expense_daily`
--
ALTER TABLE `expense_daily`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
