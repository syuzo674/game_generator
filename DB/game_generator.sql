-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-06-29 11:21:34
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `game_generator`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `resource_table`
--

CREATE TABLE `resource_table` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `age` int(11) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `resource_table`
--

INSERT INTO `resource_table` (`id`, `name`, `age`, `description`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '山田太郎', 0, 'ここに自己紹介の予定', '新規or既存', '2023-06-22 14:07:24', '2023-06-22 14:07:24', NULL),
(4, '青嶋', 40, 'おじさん', 'Existing_member', '2023-06-22 17:36:34', '2023-06-29 17:56:17', NULL),
(6, '吉田直樹', 50, '開発担当執行役員', 'Existing_member', '2023-06-22 18:15:43', '2023-06-22 18:15:43', NULL),
(7, '桜井政博', 52, '有限会社ソラ', 'Existing_member', '2023-06-22 18:16:16', '2023-06-22 18:16:16', NULL),
(8, '原田勝弘', 53, '鉄拳おじさん', 'Existing_member', '2023-06-22 18:16:52', '2023-06-22 18:16:52', NULL),
(9, 'カプコン太郎', 45, 'SF6やりたい', 'Existing_member', '2023-06-22 18:18:00', '2023-06-22 18:18:00', '2023-06-29 18:19:30'),
(10, '中村光一', 58, 'シレン', 'Existing_member', '2023-06-29 16:46:03', '2023-06-29 16:46:03', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `resource_table`
--
ALTER TABLE `resource_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `resource_table`
--
ALTER TABLE `resource_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
