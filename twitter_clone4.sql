-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-11-24 13:05:25
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `twitter_clone`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `follow_user_id` int(11) NOT NULL,
  `followed_user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `follows`
--

INSERT INTO `follows` (`id`, `status`, `follow_user_id`, `followed_user_id`, `created_at`, `updated_at`) VALUES
(1, 'active', 2, 3, '2021-02-19 07:05:49', '2021-02-19 07:05:49'),
(2, 'active', 2, 1, '2021-02-19 07:05:54', '2021-02-19 07:05:54'),
(3, 'active', 4, 1, '2021-11-22 14:12:27', '2021-11-22 14:12:27'),
(4, 'active', 1, 4, '2021-11-22 14:16:39', '2021-11-22 14:16:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `likes`
--

INSERT INTO `likes` (`id`, `status`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(1, 'active', 2, 12, '2021-02-19 07:17:43', '2021-02-19 07:17:43'),
(2, 'deleted', 2, 5, '2021-02-19 07:17:58', '2021-02-19 07:17:58'),
(3, 'active', 2, 7, '2021-02-19 07:17:59', '2021-02-19 07:17:59'),
(4, 'active', 2, 14, '2021-02-19 07:18:01', '2021-02-19 07:18:01'),
(5, 'active', 2, 16, '2021-02-19 07:18:06', '2021-02-19 07:18:06'),
(6, 'active', 2, 18, '2021-02-19 07:18:06', '2021-02-19 07:18:06'),
(7, 'deleted', 4, 17, '2021-11-22 14:14:54', '2021-11-22 14:14:54'),
(8, 'deleted', 4, 17, '2021-11-22 14:15:17', '2021-11-22 14:15:17'),
(9, 'active', 4, 17, '2021-11-22 14:15:35', '2021-11-22 14:15:35'),
(10, 'active', 4, 16, '2021-11-22 14:15:35', '2021-11-22 14:15:35'),
(11, 'active', 1, 20, '2021-11-22 14:16:32', '2021-11-22 14:16:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `received_user_id` int(11) NOT NULL,
  `sent_user_id` int(11) NOT NULL,
  `message` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `notifications`
--

INSERT INTO `notifications` (`id`, `status`, `received_user_id`, `sent_user_id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'active', 3, 2, 'フォローされました。', '2021-02-19 07:05:49', '2021-02-19 07:05:49'),
(2, 'active', 1, 2, 'フォローされました。', '2021-02-19 07:05:54', '2021-02-19 07:05:54'),
(3, 'active', 3, 2, 'いいね！されました。', '2021-02-19 07:17:43', '2021-02-19 07:17:43'),
(4, 'active', 1, 2, 'いいね！されました。', '2021-02-19 07:17:58', '2021-02-19 07:17:58'),
(5, 'active', 1, 4, 'フォローされました。', '2021-11-22 14:12:27', '2021-11-22 14:12:27'),
(6, 'active', 1, 4, 'いいね！されました。', '2021-11-22 14:14:54', '2021-11-22 14:14:54'),
(7, 'active', 1, 4, 'いいね！されました。', '2021-11-22 14:15:17', '2021-11-22 14:15:17'),
(8, 'active', 1, 4, 'いいね！されました。', '2021-11-22 14:15:35', '2021-11-22 14:15:35'),
(9, 'active', 1, 4, 'いいね！されました。', '2021-11-22 14:15:35', '2021-11-22 14:15:35'),
(10, 'active', 4, 1, 'いいね！されました。', '2021-11-22 14:16:32', '2021-11-22 14:16:32'),
(11, 'active', 4, 1, 'フォローされました。', '2021-11-22 14:16:39', '2021-11-22 14:16:39');

-- --------------------------------------------------------

--
-- テーブルの構造 `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `body` varchar(140) NOT NULL,
  `image_name` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `tweets`
--

INSERT INTO `tweets` (`id`, `status`, `user_id`, `body`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'active', 2, 'あああああ\r\nあああああ', NULL, '2018-01-19 05:32:02', '2018-01-19 05:32:02'),
(2, 'active', 2, 'いいいいい\r\nいいいいい', NULL, '2018-02-20 05:32:15', '2018-02-20 05:32:15'),
(3, 'active', 2, 'ううううう\r\nううううう', NULL, '2018-08-05 05:32:30', '2018-08-05 05:32:30'),
(4, 'active', 1, '太郎1です', NULL, '2018-08-21 06:32:57', '2018-08-21 06:32:57'),
(5, 'active', 1, '太郎1のつぶやき2', NULL, '2019-03-22 05:33:12', '2019-03-22 05:33:12'),
(6, 'active', 1, '太郎1のつぶやき3', NULL, '2019-04-09 05:33:38', '2019-04-09 05:33:38'),
(7, 'active', 1, '太郎1のつぶやき4', NULL, '2019-11-10 05:33:54', '2019-11-10 05:33:54'),
(8, 'active', 1, '太郎1のつぶやき5', NULL, '2019-12-01 05:34:40', '2019-12-01 05:34:40'),
(9, 'active', 2, 'えええええ\r\nえええええ', NULL, '2020-06-18 05:35:10', '2020-06-18 05:35:10'),
(10, 'active', 2, 'おおおおお\r\nおおおおお', NULL, '2020-07-11 05:35:17', '2020-07-11 05:35:17'),
(11, 'active', 3, 'XXX', NULL, '2020-08-10 05:35:29', '2020-08-10 05:35:29'),
(12, 'active', 3, 'YYY', NULL, '2020-10-25 05:35:31', '2020-10-25 05:35:31'),
(13, 'active', 3, 'ZZZ', NULL, '2021-01-03 05:35:34', '2021-01-03 05:35:34'),
(14, 'active', 1, '太郎1のつぶやき6', NULL, '2021-01-19 05:35:57', '2021-01-19 05:35:57'),
(15, 'active', 1, '太郎1のつぶやき7', NULL, '2021-02-28 05:36:00', '2021-02-28 05:36:00'),
(16, 'active', 1, '太郎1のつぶやき8', NULL, '2021-03-10 05:40:04', '2021-03-10 05:40:04'),
(17, 'active', 1, '太郎1のつぶやき9', 'sample-post.jpg', '2021-04-05 05:36:07', '2021-04-05 05:36:07'),
(18, 'active', 1, '太郎1のつぶやき10', NULL, '2021-04-18 12:36:12', '2021-04-18 12:36:12'),
(19, 'active', 4, '日本語でテストツイート\r\nTest tweet on English', NULL, '2021-11-22 14:14:04', '2021-11-22 14:14:04'),
(20, 'active', 4, '試しに花火を打ち上げました（画像投稿テスト）', '4_20211122141432.JPG', '2021-11-22 14:14:32', '2021-11-22 14:14:32'),
(21, 'active', 4, '', NULL, '2021-11-22 14:58:41', '2021-11-22 14:58:41');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `nickname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image_name` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `status`, `nickname`, `name`, `email`, `password`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 'active', '太郎1', 'user1', 'test1@example.com', '$2y$10$vH3LhLuEfhLPxtpxsQ7z8.ZEkXZQqfLX9uFG9snf30EZedPB58LJW', 'sample-person.jpg', '2021-02-19 05:28:51', '2021-02-19 05:28:51'),
(2, 'active', '太郎2', 'user2', 'test2@example.com', '$2y$10$zXEIm1IExBFyg/JU4PTxwOoKv3ylTCV7Dtx89LtStxaJE/5k9EbVK', NULL, '2021-02-19 05:30:36', '2021-02-19 05:30:36'),
(3, 'active', '太郎3', 'user3', 'test3@example.com', '$2y$10$TtuLPc4ybw/8TX1bFVp99ehvpfhyISVbdBC9kdZsX7U74qyRlquZm', NULL, '2021-02-19 05:31:13', '2021-02-19 05:31:13'),
(4, 'active', '次郎', 'test_jiro', 'test4@example.com', '$2y$10$TMDx/qN/RGog6Y9NL9TNUeZt2Y8ORV4g4f1Y2KnvnabOdaQdOmYla', '4_20211122141335.png', '2021-11-22 14:12:00', '2021-11-22 14:13:35');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `follow_user_id` (`follow_user_id`),
  ADD KEY `followed_user_id` (`followed_user_id`);

--
-- テーブルのインデックス `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tweet_id` (`tweet_id`);

--
-- テーブルのインデックス `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `received_user_id` (`received_user_id`),
  ADD KEY `sent_user_id` (`sent_user_id`);

--
-- テーブルのインデックス `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `body` (`body`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `nickname` (`nickname`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- テーブルの AUTO_INCREMENT `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
