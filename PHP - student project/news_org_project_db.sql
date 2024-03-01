-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 11:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_org_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_title` varchar(255) NOT NULL,
  `gallery_description` varchar(1024) NOT NULL,
  `gallery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `gallery_title`, `gallery_description`, `gallery_date`) VALUES
(1, 'Image #1', 'Image 1 description', '2023-08-14 13:13:13'),
(2, 'Image #2', 'Image 2 description test', '2023-08-14 14:13:13'),
(3, 'Image #3', 'Image 3 description', '2023-08-14 14:12:13'),
(4, 'Image #4', 'Image 4 description', '2023-08-14 12:13:12'),
(5, 'Image #5', 'Image 5 description', '2023-08-14 14:12:14'),
(6, 'Image #6', 'Image 6 description', '2023-08-14 13:12:13'),
(7, 'Image #7', 'Image 7 description', '2023-08-14 11:13:11'),
(8, 'Image #8', 'Image 8 description', '2023-08-14 13:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(128) NOT NULL,
  `news_short` varchar(2048) NOT NULL,
  `news_description` text NOT NULL,
  `news_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_short`, `news_description`, `news_date`) VALUES
(1, 'News #1', 'Short news 1', 'News 1 complete', '2023-08-13 13:13:13'),
(2, 'News #2', 'Short news 2', 'News 2 complete', '2023-08-13 12:13:13'),
(3, 'News #3', 'Short news 3', 'News 3 complete', '2023-08-13 13:12:13'),
(4, 'News #4', 'Short news 4', 'News 4 complete', '2023-08-13 13:14:13'),
(5, 'News #5', 'Short news 5', 'News 5 complete', '2023-08-13 15:13:13'),
(6, 'News #6', 'Short news 6', 'News 6 complete', '2023-08-13 13:16:13'),
(7, 'News #7', 'Short news 7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nibh neque, volutpat vitae interdum ac, sollicitudin sed odio. Nunc venenatis id mauris ac ultricies. Quisque maximus lacus quis sapien fringilla sodales. Ut aliquet, risus sed hendrerit interdum, nibh massa imperdiet urna, non tempor mauris orci a nisl. Donec fermentum id turpis vitae tristique. Nam interdum placerat mi, a aliquam tortor imperdiet in. Sed dictum ligula quis odio pellentesque egestas. Sed ut nisi nulla. Cras finibus faucibus magna, a ultricies nunc auctor ut. Curabitur non velit arcu. Phasellus nec justo odio. Praesent ut lacus rhoncus, pellentesque leo in, luctus est. Nulla id diam quis purus ultricies vehicula. Phasellus facilisis vulputate facilisis. Nulla eu sem id velit consequat pellentesque. Aenean sollicitudin convallis enim, et aliquet neque porta at.\n            \n            Integer dolor purus, eleifend eu augue vel, aliquam lobortis nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent tincidunt urna vitae elit viverra, ut porta lacus luctus. Integer quis justo feugiat, sodales tortor ac, rhoncus justo. Sed massa risus, accumsan vel scelerisque vitae, dignissim eu diam. Fusce blandit elit nisl, a commodo dui laoreet id. Vivamus fermentum interdum pulvinar.\n            \n            Donec ut nisl non erat efficitur lacinia et ut erat. Curabitur leo nibh, egestas ac rhoncus vitae, fermentum sit amet nisi. Quisque nisi diam, facilisis vel elit eu, vehicula ultrices urna. Praesent quis augue eu lorem efficitur dignissim sit amet ac orci. Phasellus viverra quam eu nibh eleifend feugiat. Cras tempus est vel ornare tincidunt. Suspendisse sed ultrices velit. Duis et erat nisi. Pellentesque vitae libero vitae enim posuere dignissim vitae accumsan nulla. Cras nunc est, laoreet sed nibh non, efficitur bibendum urna. Proin bibendum sodales nisi, blandit pretium elit posuere ac. Suspendisse potenti. Praesent ut neque magna. Donec at consectetur odio, quis facilisis ipsum. Donec varius metus id varius interdum. Nullam euismod, massa pulvinar finibus malesuada, elit lorem dictum nulla, vitae ornare velit nunc a felis.\n            \n            Mauris ultricies non nunc a accumsan. Aliquam sit amet bibendum massa. Quisque non massa sodales, vehicula enim eget, congue purus. Etiam condimentum convallis rhoncus. Proin in dignissim lorem. Ut sapien quam, scelerisque sed dignissim a, venenatis non mauris. Integer risus diam, maximus vel dapibus eu, rhoncus ut urna. Ut dignissim iaculis purus, eget porttitor quam ultricies sit amet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean quis ante vitae magna molestie suscipit et in lectus. Duis eget consectetur quam, finibus volutpat risus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\n            \n            Aliquam ac lorem ante. Aenean pharetra eros nec purus ullamcorper, sed egestas nisi pretium. Ut porta luctus arcu, ultrices maximus ex tempor quis. Vestibulum gravida eu odio sed faucibus. Sed semper orci a vestibulum dapibus. Donec et ligula at lectus laoreet consequat eu rhoncus ligula. Donec elementum, felis vel porttitor commodo, dolor risus dictum lectus, in accumsan quam lorem nec quam. Duis vel tellus nec lorem posuere aliquam.\n', '2023-08-13 17:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_username` varchar(30) NOT NULL,
  `users_password` varchar(32) NOT NULL,
  `users_level` tinyint(1) NOT NULL DEFAULT 0,
  `users_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_username`, `users_password`, `users_level`, `users_date`) VALUES
(6, 'qqqq', '123', 0, '2023-08-10 00:08:43'),
(8, 'qqqqq', '123', 0, '2023-08-10 00:16:38'),
(9, 'www', '123', 0, '2023-08-10 00:18:18'),
(10, 'wwww', '111', 0, '2023-08-10 00:20:11'),
(11, 'qwe', 'qwe', 0, '2023-08-10 00:20:49'),
(12, 'eee', 'eee', 0, '2023-08-10 00:21:58'),
(13, 'rrr', 'rrr', 0, '2023-08-10 00:22:38'),
(15, 'rrre', '111', 0, '2023-08-10 00:24:45'),
(16, 'weqw', 'qqq', 0, '2023-08-10 00:25:13'),
(18, 'weqww', 'www', 0, '2023-08-10 00:27:39'),
(20, 'weqwwa', 'aaa', 0, '2023-08-10 00:31:59'),
(22, 'weqwwaw', 'wwwww', 0, '2023-08-10 00:39:27'),
(24, 'rrrr', 'rrr', 0, '2023-08-10 16:23:40'),
(25, 'admin', 'admin', 1, '2023-08-12 08:01:14'),
(26, 'qqqr', 'qqq', 0, '2023-08-12 16:10:45'),
(27, 'eerr', '111', 0, '2023-08-12 17:19:41'),
(36, 'qqq', '123', 0, '2023-08-16 06:35:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_username` (`users_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
