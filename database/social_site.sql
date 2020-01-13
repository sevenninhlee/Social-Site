-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 22, 2019 lúc 08:29 PM
-- Phiên bản máy phục vụ: 5.6.41-84.1
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `enlight2_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `actions`
--

CREATE TABLE `actions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `object_article_id` int(11) NOT NULL,
  `table_model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `like` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `favorite` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `recommanded` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `current` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  `owner_status` int(11) DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `actions`
--

INSERT INTO `actions` (`id`, `user_id`, `object_article_id`, `table_model`, `like`, `favorite`, `recommanded`, `current`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(45, 2, 29, 'book_article_model', '0', '1', '0', '0', 1, 1, '2018-11-10 16:53:57', '2018-11-13 16:32:52'),
(46, 2, 16, 'book_article_model', '0', '1', '0', '0', 1, 1, '2018-11-10 16:54:04', '2018-11-10 16:54:04'),
(47, 2, 26, 'book_article_model', '0', '1', '0', '0', 1, 1, '2018-11-10 16:54:12', '2018-11-10 16:54:12'),
(48, 2, 29, 'book_article_model', '0', '0', '1', '0', 1, 1, '2018-11-10 16:54:21', '2018-11-10 16:54:30'),
(49, 2, 26, 'book_article_model', '0', '0', '0', '1', 1, 1, '2018-11-11 15:31:27', '2018-11-11 15:31:27'),
(50, 2, 15, 'book_article_model', '0', '0', '1', '0', 1, 1, '2018-11-11 15:32:27', '2018-11-11 15:32:27'),
(51, 2, 30, 'book_article_model', '0', '0', '0', '1', 1, 1, '2018-11-11 15:32:44', '2018-11-11 15:32:44'),
(52, 2, 2, 'book_article_model', '0', '0', '1', '0', 1, 1, '2018-11-11 15:32:53', '2018-11-11 15:32:53'),
(53, 2, 29, 'book_article_model', '0', '0', '0', '1', 1, 1, '2018-11-12 17:07:40', '2018-11-12 17:07:40'),
(54, 23, 39, 'book_article_model', '0', '0', '1', '0', 1, 1, '2018-12-17 17:11:17', '2018-12-17 17:11:17'),
(55, 23, 9, 'book_article_model', '0', '0', '0', '1', 0, 1, '2018-12-17 17:11:59', '2018-12-18 09:16:44'),
(56, 23, 40, 'book_article_model', '0', '0', '0', '1', 1, 1, '2018-12-17 17:12:53', '2018-12-17 17:12:53'),
(57, 23, 41, 'book_article_model', '0', '1', '0', '0', 1, 1, '2018-12-18 09:14:49', '2018-12-18 09:14:49'),
(65, 17, 53, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-01-28 17:38:57', '2019-01-28 17:38:57'),
(66, 17, 50, 'book_article_model', '0', '0', '1', '0', 1, 1, '2019-01-28 17:39:19', '2019-01-28 17:39:19'),
(68, 26, 61, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-02-05 07:06:44', '2019-02-05 07:06:44'),
(69, 26, 58, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-02-05 07:07:18', '2019-02-05 07:07:18'),
(70, 26, 62, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-02-05 07:08:45', '2019-02-05 07:08:45'),
(72, 26, 63, 'book_article_model', '0', '0', '1', '0', 1, 1, '2019-02-05 07:09:34', '2019-02-05 07:09:34'),
(73, 26, 64, 'book_article_model', '0', '0', '0', '1', 1, 1, '2019-02-05 07:10:38', '2019-02-05 07:10:38'),
(74, 26, 65, 'book_article_model', '0', '0', '0', '1', 1, 1, '2019-02-05 07:11:07', '2019-02-05 07:11:07'),
(75, 34, 61, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-02-06 10:43:04', '2019-02-06 10:43:04'),
(79, 17, 55, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-02-26 07:22:53', '2019-02-26 07:22:53'),
(85, 3, 76, 'book_article_model', '0', '0', '1', '0', 1, 1, '2019-03-19 06:56:30', '2019-03-19 06:56:30'),
(87, 3, 78, 'book_article_model', '0', '0', '0', '1', 1, 1, '2019-03-19 06:57:57', '2019-03-19 06:57:57'),
(94, 3, 83, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-03-22 16:32:51', '2019-03-22 16:32:51'),
(96, 85, 105, 'book_article_model', '0', '0', '1', '0', 1, 1, '2019-12-12 10:34:15', '2019-12-12 10:34:15'),
(97, 85, 108, 'book_article_model', '0', '0', '0', '1', 1, 1, '2019-12-12 10:41:53', '2019-12-12 10:41:53'),
(98, 1, 109, 'book_article_model', '0', '1', '0', '0', 1, 1, '2019-12-13 07:07:27', '2019-12-13 07:07:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_articles`
--

CREATE TABLE `blog_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_my_blog` tinyint(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `featured_my_blog`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(49, 'Warren&#039;s Blue New Deal', 1, 85, 1, '157610457470782.jpeg', 1, '<p><span style=\"font-size:22px\"><span style=\"font-family:Georgia,serif\">I just heard from a friend that Elizabeth Warren has unveiled a Blue New Deal.&nbsp; Good for her&#33;</span></span><br />\r\n&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><span style=\"font-family:Georgia,serif\">I am eager to learn more about it.&nbsp; But just for starters, she promises to protect coastlines and waterways, protect ecosystems, stop overfishing, etc.&nbsp; Some have criticized her for focusing just on the U.S. because climate change is a global issue. &nbsp;</span></span><br />\r\n&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><span style=\"font-family:Georgia,serif\">I think that&#39;s asking too much, at least for now.&nbsp; I would prefer that she focus on having the U.S. play a leading role in international climate change policy-setting and on having us lead the way in curbing carbon emissions and other environmental protection activities.&nbsp; There is so much that needs to be done here in the U.S..&nbsp; She can&#39;t do everything everywhere&#33;</span></span></p>\r\n\r\n<p><span style=\"font-size:22px\">By the way, the photo is by Sarah Brown over at the free photos site, www.unsplash.com&nbsp; Check it out.</span></p>\r\n', 'I just heard from a friend that Elizabeth Warren has unveiled a Blue New Deal.  Good for her&#33;', 'warrens-blue-new-deal', ',17,', 1, 1, '2019-12-12 11:49:35', '2019-12-13 18:22:22'),
(53, 'Test 123', 1, 1, 0, '157621746744878.jpeg', 0, '<p>Long description</p>\r\n', 'Short Descriptuion', 'test-123', ',15,18,', 1, 0, '2019-12-13 07:11:08', '2019-12-13 07:11:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(11, 'Books', 'books', 1, '2019-12-11 13:15:09', '2019-12-11 13:15:09'),
(12, 'Business', 'business', 1, '2019-12-11 13:15:16', '2019-12-11 13:15:16'),
(13, 'Career', 'career', 1, '2019-12-11 13:15:23', '2019-12-11 13:15:23'),
(14, 'Economics', 'economics', 1, '2019-12-11 13:15:28', '2019-12-11 13:15:28'),
(15, 'Education', 'education', 1, '2019-12-11 13:15:35', '2019-12-11 13:15:35'),
(16, 'Entertainment', 'entertainment', 1, '2019-12-11 13:15:41', '2019-12-11 13:15:41'),
(17, 'Environment', 'environment', 1, '2019-12-11 13:15:47', '2019-12-11 13:15:47'),
(18, 'Food', 'food', 1, '2019-12-11 13:15:52', '2019-12-11 13:15:52'),
(19, 'Gaming', 'gaming', 1, '2019-12-11 13:15:58', '2019-12-11 13:15:58'),
(20, 'Health', 'health', 1, '2019-12-11 13:16:05', '2019-12-11 13:16:05'),
(21, 'History', 'history', 1, '2019-12-11 13:16:10', '2019-12-11 13:16:10'),
(22, 'Lifestyle', 'lifestyle', 1, '2019-12-11 13:16:17', '2019-12-11 13:16:17'),
(23, 'Medicine', 'medicine', 1, '2019-12-11 13:16:24', '2019-12-11 13:16:24'),
(24, 'Money', 'money', 1, '2019-12-11 13:16:29', '2019-12-11 13:16:29'),
(25, 'Movies', 'movies', 1, '2019-12-11 13:16:36', '2019-12-11 13:16:36'),
(26, 'Parenting', 'parenting', 1, '2019-12-11 13:16:41', '2019-12-11 13:16:41'),
(27, 'Pets', 'pets', 1, '2019-12-11 13:16:47', '2019-12-11 13:16:47'),
(28, 'Politics', 'politics', 1, '2019-12-11 13:16:52', '2019-12-11 13:16:52'),
(29, 'Products', 'products', 1, '2019-12-11 13:16:57', '2019-12-11 13:16:57'),
(30, 'Psychology', 'psychology', 1, '2019-12-11 13:17:03', '2019-12-11 13:17:03'),
(31, 'Reflections', 'reflections', 1, '2019-12-11 13:17:09', '2019-12-11 13:17:09'),
(32, 'Relationships', 'relationships', 1, '2019-12-11 13:17:15', '2019-12-11 13:17:15'),
(33, 'School', 'school', 1, '2019-12-11 13:17:22', '2019-12-11 13:17:22'),
(34, 'Science', 'science', 1, '2019-12-11 13:17:27', '2019-12-11 13:17:27'),
(35, 'Society', 'society', 1, '2019-12-11 13:17:32', '2019-12-11 13:17:32'),
(36, 'Sports', 'sports', 1, '2019-12-11 13:17:37', '2019-12-11 13:17:37'),
(37, 'Technology', 'technology', 1, '2019-12-11 13:17:46', '2019-12-11 13:17:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `parent_comment_id`, `user_id`, `article_id`, `content`, `status`, `created`, `updated`) VALUES
(22, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(33, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(37, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(67, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(76, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(77, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(80, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_articles`
--

CREATE TABLE `book_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `featured_image` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_my_book` int(11) NOT NULL,
  `book_rating` float DEFAULT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `ISBN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` year(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `owner_group_status` int(11) NOT NULL DEFAULT '0',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_articles`
--

INSERT INTO `book_articles` (`id`, `title`, `categories_id`, `user_id`, `featured_image`, `featured_my_book`, `book_rating`, `author`, `add_homepage`, `ISBN`, `year`, `description`, `slug`, `categories_arr`, `owner_status`, `owner_group_status`, `admin_status`, `created`, `updated`) VALUES
(67, 'The Water Will Come', 1, 26, 'http://books.google.com/books/content?id=LWxFDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Jeff Goodell', 0, '9780316260237', 2017, '<p>In this book, Goodell dutifully tracks down the people who are working on those &quot;solutions&quot; &mdash; the Miami Beach engineers who are raising city streets and buildings; their Venetian counterparts who are building a multibillion-dollar series of inflatable booms that can hold back storm tides. In every case, the engineering is dubious, not to mention hideously expensive. And more to the point, it&#39;s all designed for the relatively mild two- or three-foot rises in sea level that used to constitute the worst-case scenarios. Such tech is essentially useless against the higher totals we now think are coming, a fact that boggles most of the relevant minds&mdash;from Bill McKibben, Washington Post</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>After reading this, are you motivated to join the movement to combat climate change?</li>\r\n	<li>Does this account &ldquo;boggle&rdquo; your mind? 3. What did you learn that you did not know before?</li>\r\n	<li>Do you think much of the solution to climate change effects lies in engineering ways to adjust and adapt?</li>\r\n	<li>General thoughts?</li>\r\n</ol>\r\n', 'the-water-will-come', ',24,', 1, 0, 1, '2019-02-14 07:57:14', '2019-11-11 09:35:55'),
(68, 'The Hidden Life of Trees', 1, 26, 'http://books.google.com/books/content?id=WEn4DAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Peter Wohlleben', 1, '9781771642491', 2016, '<p>After reading this, you will never look at trees in the same way again. Using scientific data, Wohlleben shows us that trees are social beings who nurture their young, protect their kin, take care of the sick, share nutrients, and communicate constantly with other trees in their ecosystem. His overall message is that eco-friendly forest environments (NOT &ldquo;managed&rdquo; plantation forests) are best for the health of trees as trees thrive when they take care of themselves, their kin, and their community. This is a must read.</p>\r\n\r\n<p><strong>Questions to Ponder: </strong></p>\r\n\r\n<ol>\r\n	<li>How do trees take care of their young?</li>\r\n	<li>How do tree communities communicate?</li>\r\n	<li>Do you think the author crosses the line from science to fiction in his narrative? If yes, how does he cross the line?</li>\r\n	<li>Does the author anthropomorphize trees too much?</li>\r\n	<li>General thoughts?</li>\r\n</ol>\r\n', 'the-hidden-life-of-trees', ',24,45,', 1, 0, 1, '2019-02-14 07:57:53', '2019-11-11 09:33:58'),
(72, 'Lab Girl', 1, 1, 'http://books.google.com/books/content?id=16TSCQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Hope Jahren', 0, '9781101874943', 2016, '<p>Winner of the National Book Critics Circle Award for Autobiography A New York Times 2016 Notable Book National Best Seller Named one of TIME magazine&rsquo;s &quot;100 Most Influential People&quot; An Amazon Top 20 Best Book of 2016 A Washington Post Best Memoir of 2016 A TIME and Entertainment Weekly Best Book of 2016 An illuminating debut memoir of a woman in science; a moving portrait of a longtime friendship; and a stunningly fresh look at plants that will forever change how you see the natural world Acclaimed scientist Hope Jahren has built three laboratories in which she&rsquo;s studied trees, flowers, seeds, and soil. Her first book is a revelatory treatise on plant life&mdash;but it is also so much more. Lab Girl is a book about work, love, and the mountains that can be moved when those two things come together. It is told through Jahren&rsquo;s remarkable stories: about her childhood in rural Minnesota with an uncompromising mother and a father who encouraged hours of play in his classroom&rsquo;s labs; about how she found a sanctuary in science, and learned to perform lab work done &ldquo;with both the heart and the hands&rdquo;; and about the inevitable disappointments, but also the triumphs and exhilarating discoveries, of scientific work. Yet at the core of this book is the story of a relationship Jahren forged with a brilliant, wounded man named Bill, who becomes her lab partner and best friend. Their sometimes rogue adventures in science take them from the Midwest across the United States and back again, over the Atlantic to the ever-light skies of the North Pole and to tropical Hawaii, where she and her lab currently make their home. Jahren&rsquo;s probing look at plants, her astonishing tenacity of spirit, and her acute insights on nature enliven every page of this extraordinary book. Lab Girl opens your eyes to the beautiful, sophisticated mechanisms within every leaf, blade of grass, and flower petal. Here is an eloquent demonstration of what can happen when you find the stamina, passion, and sense of sacrifice needed to make a life out of what you truly love, as you discover along the way the person you were meant to be.</p>\r\n', 'lab-girl', ',24,', 1, 0, 1, '2019-03-02 08:45:47', '2019-11-11 09:34:14'),
(88, 'The Omnivore&#039;s Dilemma', 1, 1, 'http://books.google.com/books/content?id=Qh7dkdVsbDkC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Michael Pollan', 0, '1594200823', 2006, '<p>An ecological and anthropological study of eating offers insight into food consumption in the twenty-first century, explaining how an abundance of unlimited food varieties reveals the responsibilities of everyday consumers to protect their health and the environment. By the author of The Botany of Desire. 125,000 first printing.</p>\r\n\r\n<p>The dilemma&mdash;what to have for dinner when you are an omnivorous creature with an open-ended appetite&mdash;leads the author, Michael Pollan, to a fascinating examination of the myriad connections along the principal food chains that lead from earth to dinner table. &ndash;from Kirkus Review<br />\r\n<strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>What exactly is the &ldquo;omnivore&rsquo;s dilemma?&rdquo;</li>\r\n	<li>What are the 3 types of food systems?</li>\r\n	<li>What are the main problems inherent in the industrial food chain?</li>\r\n	<li>What are the key points about corn in the book?</li>\r\n	<li>What is the difference between &ldquo;industrial organic food&rdquo; and the food produced by a farm like Polyface Farm?</li>\r\n	<li>What are your thoughts about solutions to the problems associated with our industrial food chain?</li>\r\n	<li>Your thoughts in general?<br />\r\n	&nbsp;</li>\r\n</ol>\r\n', 'the-omnivores-dilemma', ',23,', 1, 0, 1, '2019-09-21 07:07:06', '2019-11-11 09:34:37'),
(89, 'The Tipping Point', 1, 1, 'http://books.google.com/books/content?id=yBDBEGBIUmgC&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Malcolm Gladwell', 0, '0759574731', 2006, '<p>The tipping point is that magic moment when an idea, trend, or social behavior crosses a threshold, tips, and spreads like wildfire. Just as a single sick person can start an epidemic of the flu, so too can a small but precisely targeted push cause a fashion trend, the popularity of a new product, or a drop in the crime rate. This widely acclaimed bestseller, in which Malcolm Gladwell explores and brilliantly illuminates the tipping point phenomenon, is already changing the way people throughout the world think about selling products and disseminating ideas. -- from Goodreads</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>When do you think it becomes obvious that something has reached a tipping point?</li>\r\n	<li>What is &ldquo;stickiness?&rdquo; &nbsp;What do you think makes something &ldquo;sticky?&rdquo;</li>\r\n	<li>Where do you stand in the &ldquo;nature vs nurture&rdquo; debate?</li>\r\n	<li>Are you a connector, maven, or salesperson? &nbsp;Explain.</li>\r\n	<li>Which points resonated with you the most and why?</li>\r\n	<li>Your thoughts in general?</li>\r\n</ol>\r\n', 'the-tipping-point', ',23,', 1, 0, 1, '2019-09-21 07:10:03', '2019-11-11 09:34:53'),
(90, 'Little Fires Everywhere', 1, 1, 'http://books.google.com/books/content?id=OsUPDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Celeste Ng', 0, '9780735224308', 2017, '<p>Readers of Celeste Ng&rsquo;s second novel, &ldquo;Little Fires Everywhere,&rdquo; will recognize a few elements from her acclaimed debut, &ldquo;Everything I Never Told You.&rdquo; There are the simmering racial tensions and incendiary family dynamics beneath the surface of a quiet Ohio town. There are the appeal and impossibility of assimilation, the all-consuming force of motherhood and the secret lives of teenagers and their parents, each unknowable to the other.</p>\r\n\r\n<p>And there&rsquo;s a familiar frame, too: At each novel&rsquo;s opening, we know at least part of the tragedy that will befall the characters &mdash; the mystery lies in figuring out how they got there. In &ldquo;Little Fires Everywhere,&rdquo; we begin not with a death but a house fire, and new questions: Who set it, and why? &nbsp;--from The New York Time.</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>Who is your favorite character and why?</li>\r\n	<li>Which relationship do you find the &nbsp;most compelling? &nbsp;Why?</li>\r\n	<li>The author contrasts the Richardson&rsquo;s &nbsp;conventional upper middle class mores and lifestyle to Mia&rsquo;s and Pearl&rsquo;s unconventional approach to life. &nbsp;What kind of lifestyle appeals to you?</li>\r\n	<li>Which Richardson kid do you like the most and why?</li>\r\n	<li>Your general thoughts?</li>\r\n</ol>\r\n', 'little-fires-everywhere', ',24,27,', 1, 0, 1, '2019-09-21 07:33:02', '2019-11-11 09:35:35'),
(91, 'Age of Ambition: Chasing Fortune, Truth, and Faith in the New China', 1, 1, 'http://books.google.com/books/content?id=qy2SAgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Evan Osnos', 0, '9780374712044', 2014, '<p>Evan Osnos has portrayed, explained and poked fun at this the new China better than any other writer from the West or the East. In &ldquo;Age of Ambition,&rdquo; Osnos takes his reporting a step further, illuminating what he calls China&rsquo;s Gilded Age, its appetites, challenges and dilemmas, in a way few have done.</p>\r\n\r\n<p>Two themes drive this compelling and accessible investigation of the modern Middle Kingdom. The first is hunger. China is living through &ldquo;a ravenous era,&rdquo; Osnos declares early in the book. And it&rsquo;s a hunger not just for meat &mdash; the consumption of which has increased sixfold since the 1970s. After 40 years of dead-end Maoism, Chinese are combing the globe for commodities, wealth, experiences and respect. The second theme is the chase. &ldquo;All over China people were embarking on journeys, joining the largest migration in human history,&rdquo; Osnos writes, and he doesn&rsquo;t mean that just in physical terms. He peppers the book with tales of characters making spiritual, economic, emotional and philosophical expeditions that have transformed their lives and the world as we know it. &ndash;from The Washington Post</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>What do you think of the New China as depicted by Osnos?</li>\r\n	<li>A main theme of this book is that China has made tremendous progress economically in a very short span of time&mdash;so spectacular has this ascent been &nbsp;that many Chinese are reeling from the prospect of unlimited opportunities for attaining untold wealth. &nbsp;However, Osnos makes clear that China is still in the grip of a draconian authoritarian government. &nbsp;What are your thoughts regarding this state of affairs?</li>\r\n	<li>Which character(s)&rsquo; story or stories did you find most interesting?</li>\r\n	<li>Your general thoughts?</li>\r\n</ol>\r\n', 'age-of-ambition-chasing-fortune-truth-and-faith-in-the-new-china', ',31,47,', 1, 0, 1, '2019-09-21 07:35:46', '2019-11-11 09:20:53'),
(92, 'Climate Justice', 1, 1, 'http://books.google.com/books/content?id=ZuxlDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Mary Robinson', 1, '9781632869302', 2018, '<p>Author Mary Robinson was the first woman president of Ireland, serving from 1990 to 1997; afterward, she served as United Nations High Commissioner for Human Rights from 1997 to 2002. She was also an honorary president of the global development charity Oxfam.</p>\r\n\r\n<p>In November of 2016, Robinson was in Marrakech for UN climate change talks; Donald Trump&rsquo;s election seemed like proof that America was retreating into apathy about the environment. She was determined to &ldquo;forge ahead, with or without the United States,&rdquo; and in Climate Justice she and journalist Caitr&iacute;ona Palmer profile admirable individuals who are coping with climate disasters in vulnerable areas and pointing the way to a sustainable future. &nbsp; &ndash;from Foreword Reviews</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>Do you think climate justice issues should be front and center in all climate action work?</li>\r\n	<li>What did you learn from the stories of the women in the book? &nbsp;</li>\r\n	<li>What are some local examples in your community of how climate justice intersects with environmental protection work? &nbsp;</li>\r\n	<li>Your general thoughts?<br />\r\n	&nbsp;</li>\r\n</ol>\r\n', 'climate-justice', ',24,45,49,', 1, 0, 1, '2019-09-21 07:37:06', '2019-11-11 09:19:52'),
(94, 'A Fighting Chance', 1, 1, 'http://books.google.com/books/content?id=dbGfAgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Elizabeth Warren', 1, '9781627790536', 2014, '<p>A Fighting Chance by Elizabeth Warren This book by Elizabeth Warren interweaves significant events in her personal life with her political battles for a more just capitalist system&mdash;she recounts her battles against increasingly harsh bankruptcy legislation, her unsuccessful attempt to stop the bailout of big banks in the Great Recession of 2007, and her ultimately victorious effort to convince Obama to establish a Consumer Financial Protection Bureau. It&rsquo;s a well-paced, engaging read that reaches a climax at the end with a riveting account of her 2012 senate campaign.</p>\r\n\r\n<p>Questions to Ponder:</p>\r\n\r\n<ol>\r\n	<li>Did this book change your opinion of Elizabeth Warren? Explain.</li>\r\n	<li>Does this account give you a better idea of how a President Warren might govern?</li>\r\n	<li>Was there anything from her background&mdash;her childhood and her young adult years&mdash;that you think shaped her character?</li>\r\n	<li>What impressed you the most?</li>\r\n	<li>Your overall thoughts? What resonated with you?</li>\r\n</ol>\r\n', 'a-fighting-chance', ',22,47,49,', 1, 0, 1, '2019-09-27 06:07:03', '2019-11-11 09:19:05'),
(95, 'This Fight Is Our Fight', 1, 1, 'http://books.google.com/books/content?id=HlcCDgAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Elizabeth Warren', 1, '9781250120625', 2017, '<p>In this new book (published 2018), Elizabeth Warren discusses how America&rsquo;s middle class was a vibrant, upwardly mobile segment of society and explains how and why it has been severely decimated over the past 35 years, a process that started with Ronald Reagan&rsquo;s presidency. This precipitous decline of America&rsquo;s large middle class is at the root of the huge income inequality that is plaguing our country currently. All is not gloom and doom, however, as she provides ways&mdash;structural changes&mdash;that can reverse the tide.</p>\r\n\r\n<p>Questions to Ponder:</p>\r\n\r\n<ol>\r\n	<li>Why is it important to strengthen America&rsquo;s middle class?</li>\r\n	<li>What and who are responsible for the precipitous decline of the middle class? What are the key conservative ideas that are trotted out to justify the dismal state of affairs among America&rsquo;s middle/working class?</li>\r\n	<li>Which stories did you find the most compelling?</li>\r\n	<li>What is the conventional explanation for America&rsquo;s huge income inequality? What are the typical &ldquo;remedies&rdquo; that many people usually think of when it comes to tackling the income inequality problem?</li>\r\n	<li>What is Elizabeth Warren&rsquo;s approach to the problem of income inequality. How does it differ from conventional proposals?</li>\r\n	<li>Do you still think ineluctable technological progress is at the root of job losses and the disempowerment of America&rsquo;s middle and working class?</li>\r\n	<li>Your general thoughts?</li>\r\n</ol>\r\n', 'this-fight-is-our-fight', ',22,47,49,', 1, 0, 1, '2019-09-27 06:09:17', '2019-11-11 09:18:25'),
(96, 'Hacks', 1, 1, 'http://books.google.com/books/content?id=s8YrDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Donna Brazile', 0, '9780316478496', 2017, '<p>This is an angry, but riveting narrative from the former DNC chair woman, Donna Brazile, about what happened from the time she was tapped to take over the chaotic Democratic National Committee during Hillary&rsquo;s presidential campaign. She presents a hard-hitting blow-by-blow account of how Hillary&rsquo;s people took over the DNC, the Russian hacking, and the bumbling missteps of Hillary&rsquo;s top campaign officials, which contributed to her defeat.</p>\r\n\r\n<p><strong>Questions to Ponder: </strong></p>\r\n\r\n<ol>\r\n	<li>Did you find anything shocking in this expose by an insider?</li>\r\n	<li>Which revelation(s) of this insider&rsquo;s account stood out the most for you?</li>\r\n	<li>Does this make you more cynical about the Democratic party and/or politics in general?</li>\r\n	<li>What would you have done differently if you had been in the author&rsquo;s shoes?</li>\r\n	<li>What do you think can be done to prevent national party organizations from being &ldquo;taken over&rdquo; by a candidate?</li>\r\n	<li>Do you think Robbie Mook and/or John Podesta should take a degree of responsibility for Hillary&rsquo;s failed campaign?</li>\r\n	<li>Your general thoughts</li>\r\n</ol>\r\n', 'hacks', ',47,49,', 1, 0, 1, '2019-09-27 06:11:06', '2019-11-11 09:17:47'),
(97, 'Becoming', 1, 1, 'http://books.google.com/books/content?id=YbtNDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Michelle Obama', 1, '9781524763152', 2018, '<p>An engaging read, this autobiographical account of Michelle Robinson Obama&rsquo;s life offers more than just a narrative of her life from her childhood to the present. Not only does it offer insights into Barack Obama&rsquo;s domestic side, but more important than that, it provides an intimate window into the African-American middle class, which may shatter stereotypes many people have of how minorities navigate through the shoals of a white-dominated society.</p>\r\n\r\n<p>It is also an inspirational read of one family&rsquo;s history as you can&rsquo;t help but admire how the Robinsons&rsquo; unrelenting aspirational mindset and high expectations contributed to the choices she made as family was the bedrock of her life.</p>\r\n\r\n<p><strong>Questions to Ponder: </strong></p>\r\n\r\n<ol>\r\n	<li>What do you think of Michelle Obama after reading the book?</li>\r\n	<li>Your thoughts on Barack Obama?</li>\r\n	<li>What were some salient facts/events that stood out to you?</li>\r\n	<li>Do you feel as you&rsquo;ve gained a deeper understanding of the black middle class, or do you see this mostly as just one family&rsquo;s story?</li>\r\n	<li>How do you think race has shaped Michelle Obama life?</li>\r\n</ol>\r\n', 'becoming', ',22,23,', 1, 0, 1, '2019-09-27 06:12:18', '2019-11-11 09:21:54'),
(98, 'Falter', 1, 1, 'http://books.google.com/books/content?id=UapbDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Bill McKibben', 1, '9781250178275', 2019, '<p>In his inimitable style, Bill McKibben has, again, written a compelling visionary work on not only the threats to our environment, but also the obstacles to positive change, the shortcomings of proposed technological solutions, and reasons for hope. If people think this will just be a re-hash of all his old climate change themes, rest assured that it is NOT.</p>\r\n\r\n<p>McKibben reprises the longstanding environmental problems that he has addressed before, but from new perspectives. It&rsquo;s a must read for everyone who cares about our planet, wants to understand the broader political context, and contemplates taking ameliorative action.</p>\r\n\r\n<p><strong>Questions to Ponder: </strong></p>\r\n\r\n<ol>\r\n	<li>What are the most salient points to you?</li>\r\n	<li>What do you think of McKibben&rsquo;s skepticism toward tech solutions?</li>\r\n	<li>Discuss the reasons for hope that he presents. What other reasons for hope can you think of?</li>\r\n</ol>\r\n', 'falter', ',32,', 1, 0, 1, '2019-09-27 06:21:12', '2019-11-11 09:22:08'),
(99, 'The Sixth Extinction', 1, 1, 'http://books.google.com/books/content?id=Ra9RAQAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Elizabeth Kolbert', 1, '9780805099799', 2014, '<p>In her timely, meticulously researched and well-written book, Kolbert combines scientific analysis and personal narratives to explain the world we&rsquo;ve made to us. The result is a clear and comprehensive history of earth&rsquo;s previous mass extinctions &mdash; and the species we&rsquo;ve lost &mdash; and an engaging description of the extraordinarily complex nature of life. Most important, Kolbert delivers a compelling call to action.</p>\r\n\r\n<p>&ldquo;Right now,&rdquo; she writes, &ldquo;we are deciding, without quite meaning to, which evolutionary pathways will remain open and which will forever be closed. No other creature has ever managed this, and it will, unfortunately, be our most enduring legacy.&rdquo; &ndash;from The New York Times</p>\r\n\r\n<p><strong>Questions to Ponder: </strong></p>\r\n\r\n<ol>\r\n	<li>Which story/chapter did you find most impactful?</li>\r\n	<li>What are your thoughts on human-caused extinctions?</li>\r\n	<li>What is Kolbert trying to say about &ldquo;ocean acidification?&rdquo;</li>\r\n	<li>In chapter 8, the author brings up Emily Dickinson&rsquo;s poem &ldquo;Hope is the Thing with Feathers.&rdquo; What are some hopeful avenues of action?</li>\r\n	<li>Your general thoughts and reflections?</li>\r\n</ol>\r\n', 'the-sixth-extinction', ',23,24,', 1, 0, 1, '2019-09-27 06:27:35', '2019-11-11 09:33:02'),
(100, 'This Changes Everything', 1, 1, 'http://books.google.com/books/content?id=kxJ5BAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Naomi Klein', 0, '9781451697384', 2014, '<p>This is a seminal book that presents a completely different approach to climate change than your usual &ldquo;market-based&rdquo; schemes such as cap and trade and other complex financial mechanisms. Klein criticizes not only the fossil fuel industry and their political abettors, but she also impugns the big &ldquo;green organizations such as the Environmental Defense Fund, the Conservation Fund, WWF, and others because they have been coopted by the fossil fuel industry.</p>\r\n\r\n<p>What Klein proposes is much like what Bernie Sanders proffers when asked about solutions: Both Klein and Sanders are banking on collective actions&mdash;grass roots mass movements for change.</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>Do you agree with Klein&rsquo;s approach to climate change?</li>\r\n	<li>Is Klein&rsquo;s approach too unrealistic? If so, what would you propose instead?</li>\r\n	<li>Do you agree with Klein&rsquo;s analysis?</li>\r\n	<li>Your thoughts?</li>\r\n</ol>\r\n', 'this-changes-everything', ',31,', 1, 0, 1, '2019-09-27 06:33:52', '2019-10-23 08:37:17'),
(102, 'The Inner Life of Animals', 1, 1, 'http://books.google.com/books/content?id=i_sjDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Peter Wohlleben', 1, '9781771643023', 2017, '<p>Following his widely-acclaimed book, The Hidden Life of Trees, Peter Wohlleben has written this account of how animals love, mourn, bond, and exhibit compassion. In his usual inimitable style, Wohlleben interweaves scientific studies with engaging case studies. He makes the strongest case to date for treating animals like the sentient beings that they are&mdash;if we take his message to heart, we will no longer consume, exploit, and abuse these kindred beings.</p>\r\n\r\n<p><strong>Questions to Ponder:</strong></p>\r\n\r\n<ol>\r\n	<li>Do you have a personal story of an animal/pet who expressed a range of emotions? Describe your experience.</li>\r\n	<li>Which story did you find the most compelling? Why?</li>\r\n	<li>The author has been criticized for using anthropomorphic terms to describe animal behavior? What do you think?</li>\r\n	<li>Your general thoughts and reflections?</li>\r\n</ol>\r\n', 'the-inner-life-of-animals', ',22,24,45,', 1, 0, 1, '2019-09-27 06:40:40', '2019-11-11 09:32:25'),
(105, 'On Fire', 1, 1, 'http://books.google.com/books/content?id=7R-wDwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Naomi Klein', 1, '9781982129910', 2019, '<p>Klein&rsquo;s book is flawless &mdash; far from it &mdash; but because it makes a strong case for tackling the climate crisis as not just an urgent undertaking, but an inspiring one, states Jeremy Rifkin, in his review of Naomi Klein&rsquo;s new book, On Fire.&nbsp;</p>\r\n\r\n<p>A short and relatively breezy read, On Fire urges &nbsp;our elected federal officials to take the bold step of pursuing a &ldquo;10-year national mobilization&rdquo; plan that would drastically reduce carbon emissions (to zero), re-orient our economy by focusing on green industries, and adopt a labor policy that guarantees &ldquo;family-sustaining wages&rdquo; with social safety nets, chief among which is universal quality health care.</p>\r\n\r\n<p>What Naomi Klein is calling for is a re-visioning of government&rsquo;s role by reviving an FDR style &ldquo;government for the common good&rdquo; paradigm. &nbsp;And, implicit in Klein&rsquo;s 21st century vision of a Green New Deal is a profound critique of capitalism&rsquo;s greed-driven dynamic that has brought us to the brink of environmental Armageddon. &nbsp;</p>\r\n\r\n<p>We cannot agree more with what Rifkin, the aforementioned New York Times reviewer, said: &nbsp;If I were a rich man, I&rsquo;d buy 245 million copies of Naomi Klein&rsquo;s &ldquo;On Fire&rdquo; and hand-deliver them to every eligible voter in America. &nbsp;(more)<br />\r\n<a href=\"https://www.nytimes.com/2019/09/17/books/review/on-fire-green-new-deal-naomi-klein.html\" target=\"_blank\">https://www.nytimes.com/2019/09/17/books/review/on-fire-green-new-deal-naomi-klein.html</a><br />\r\n&nbsp;</p>\r\n', 'on-fire', ',24,47,', 1, 0, 1, '2019-11-11 09:25:54', '2019-11-11 09:26:15'),
(106, 'Feral', 1, 1, 'http://books.google.com/books/content?id=CC-OBAAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'George Monbiot', 1, '9780226205557', 2014, '<p>George Monbiot, the author, despises the sterile confinement of civilization and dreams of transforming Britain&rsquo;s sheep farms&mdash;which he hates with a passion-- into natural ecosystems for re-wilding flora and fauna&hellip;</p>\r\n\r\n<p>To know why Monbiot hates sheep farming is to know what underlies his vision of &ldquo;re-wilding&rsquo; open spaces. He says,&nbsp;Sheep farming&hellip; is a slow-burning ecological disaster, which has done more damage to the living systems of this country than either climate change or industrial pollution. Yet scarcely anyone seems to have noticed.&rdquo; &nbsp;Monbiot is not exaggerating. &nbsp;In Wales alone, there are 3 sheep to 1 human, and the uplands are akin to deserts because sheep gobble up most greenery. &nbsp;The barren soil cannot hold water, so flooding is a big problem. &nbsp;</p>\r\n\r\n<p>Instead of the barren, ugly, monoculture sheep farming landscape he sees around him in the UK, Monbiot envisions&mdash;for not just the UK, &nbsp;but for all of Europe--a re-wilding that reintroduces not just more pedestrian wildlife such as wolves, bison, beavers, lynx, etc., but also hippopotamuses, rhinos, and elephants. &nbsp;</p>\r\n\r\n<p>Monbiot states that such re-wilding will result in vibrant, balanced ecosystems, restored wetlands, and lead to much more sustainable livelihoods for people who are currently involved in sheep farming and forestry. &nbsp;Monbiot does not indulge in what some may consider fantastical visioning all the time. &nbsp;He pauses to consider practical consequences such as the emergence of a booming eco-tourist industry if rewilding occurs.</p>\r\n\r\n<p>But his strongest argument for his re-wilding vision is definitely not rooted in practical considerations. &nbsp;It&rsquo;s philosophical: &nbsp;Monbiot resoundingly proclaims that re-wilding open spaces is good for our souls. &nbsp;(more)<br />\r\n<a href=\"https://www.telegraph.co.uk/culture/books/scienceandnaturebookreviews/10077216/Feral-by-George-Monbiot-review.html\" target=\"_blank\">https://www.telegraph.co.uk/culture/books/scienceandnaturebookreviews/10077216/Feral-by-George-Monbiot-review.html</a><br />\r\n&nbsp;</p>\r\n', 'feral', ',0,', 1, 0, 1, '2019-11-11 09:27:40', '2019-11-11 09:28:12'),
(107, 'Sapiens', 1, 1, 'http://books.google.com/books/content?id=FmyBAwAAQBAJ&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Yuval Noah Harari', 1, '9780062316103', 2015, '<p>In a recent talk at Google on &ldquo;Silicon Prophets,&rdquo; he stunned the audience by convincing them that the most interesting place in the world today in religious terms is Silicon Valley and that &ldquo;techno-religions&rdquo; will replace liberalism&rsquo;s cult of the individual as big data overwhelmingly surpasses the predictive power of our feelings and intuitions.</p>\r\n\r\n<p>Harari&rsquo;s thinking is amplified in his new book, which has quickly become an international bestseller. &ldquo;Sapiens&rdquo; takes readers on a sweeping tour of the history of our species. The author structures this ambitious journey around three momentous events that have irrevocably shaped the destiny of humankind: the Cognitive Revolution, the Agricultural Revolution and the Scientific Revolution.&mdash;from The WashingtonPost (more)</p>\r\n\r\n<p><a href=\"https://www.washingtonpost.com/opinions/our-kind-of-people/2015/03/13/78404422-b84c-11e4-aa05-1ce812b3fdd2_story.html\" target=\"_blank\">https://www.washingtonpost.com/opinions/our-kind-of-people/2015/03/13/78404422-b84c-11e4-aa05-1ce812b3fdd2_story.html</a><br />\r\n&nbsp;</p>\r\n', 'sapiens', ',37,', 1, 0, 1, '2019-11-11 09:30:43', '2019-11-11 09:30:57'),
(108, 'The Great Transformation', 52, 85, 'http://books.google.com/books/content?id=Vgli4QUSOk8C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'Karl Polanyi', 0, '9780807056431', 1944, '<p>One of the twentieth century&#39;s most thorough and discerning historians, Karl Polanyi sheds &quot;new illumination on . . . the social implications of a particular economic system, the market economy that grew into full stature in the nineteenth century.&quot; -R. M. MacIver</p>\r\n', 'the-great-transformation', ',0,', 1, 0, 1, '2019-12-12 10:41:53', '2019-12-12 10:41:53'),
(109, 'The Lord of the Rings', 52, 1, 'http://books.google.com/books/content?id=yl4dILkcqm4C&printsec=frontcover&img=1&zoom=1&edge=curl&source=gbs_api', 0, NULL, 'J.R.R. Tolkien', 0, '9780547951942', 2012, '<p>A PBS Great American Read Top 100 Pick One Ring to rule them all, One Ring to find them, One Ring to bring them all and in the darkness bind them In ancient times the Rings of Power were crafted by the Elven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth, it remained lost to him. After many ages it fell by chance into the hands of the hobbit Bilbo Baggins. From Sauron&#39;s fastness in the Dark Tower of Mordor, his power spread far and wide. Sauron gathered all the Great Rings to him, but always he searched for the One Ring that would complete his dominion. When Bilbo reached his eleventy-first birthday he disappeared, bequeathing to his young cousin Frodo the Ruling Ring and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord, and destroy the Ring by casting it into the Cracks of Doom. The Lord of the Rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the Wizard; the hobbits Merry, Pippin, and Sam; Gimli the Dwarf; Legolas the Elf; Boromir of Gondor; and a tall, mysterious stranger called Strider. This new edition includes the fiftieth-anniversary fully corrected text setting and, for the first time, an extensive new index. J.R.R. Tolkien (1892-1973), beloved throughout the world as the creator of The Hobbit, The Lord of the Rings, and The Silmarillion, was a professor of Anglo-Saxon at Oxford, a fellow of Pembroke College, and a fellow of Merton College until his retirement in 1959. His chief interest was the linguistic aspects of the early English written tradition, but while he studied classic works of the past, he was creating a set of his own.</p>\r\n', 'the-lord-of-the-rings', ',0,', 1, 0, 1, '2019-12-13 07:07:27', '2019-12-13 07:07:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_categories`
--

CREATE TABLE `book_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_categories`
--

INSERT INTO `book_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(21, 'Male friendship', 'male-friendship', 1, '2019-02-01 11:16:53', '2019-02-01 11:16:53'),
(22, 'Biography & Autobiography', 'biography-autobiography', 1, '2019-02-05 07:09:31', '2019-02-05 07:09:31'),
(23, 'Self-Help', 'self-help', 1, '2019-02-05 07:11:07', '2019-02-05 07:11:07'),
(24, 'Nature', 'nature', 1, '2019-02-14 07:57:14', '2019-02-14 07:57:14'),
(25, 'Comics', 'comics', 1, '2019-02-17 09:07:08', '2019-02-17 09:07:08'),
(26, 'Children', 'children', 1, '2019-02-17 09:07:18', '2019-02-17 09:07:18'),
(27, 'Fiction', 'fiction', 1, '2019-02-17 09:07:28', '2019-02-17 09:07:28'),
(28, 'Historical', 'historical', 1, '2019-02-17 09:07:37', '2019-02-17 09:07:37'),
(29, 'Horror', 'horror', 1, '2019-02-17 09:08:07', '2019-02-17 09:08:07'),
(31, 'Social Science', 'social-science', 1, '2019-03-05 17:32:08', '2019-03-05 17:32:08'),
(32, 'Juvenile Fiction', 'juvenile-fiction', 1, '2019-03-19 06:54:20', '2019-03-19 06:54:20'),
(33, 'Comics & Graphic Novels', 'comics-graphic-novels', 1, '2019-03-19 06:56:05', '2019-03-19 06:56:05'),
(35, 'Drawing', 'drawing', 1, '2019-03-19 08:50:57', '2019-03-19 08:50:57'),
(36, 'Children&#39;s stories', 'childrens-stories', 1, '2019-03-21 06:40:54', '2019-03-21 06:40:54'),
(37, 'History', 'history', 1, '2019-03-21 06:42:19', '2019-03-21 06:42:19'),
(38, 'Chrau (Vietnamese people)', 'chrau-vietnamese-people', 1, '2019-03-21 06:43:02', '2019-03-21 06:43:02'),
(39, 'Art', 'art', 1, '2019-03-21 06:56:03', '2019-03-21 06:56:03'),
(40, 'Literary Criticism', 'literary-criticism', 1, '2019-03-26 07:49:18', '2019-03-26 07:49:18'),
(41, 'Performing Arts', 'performing-arts', 1, '2019-03-29 08:06:12', '2019-03-29 08:06:12'),
(42, 'Cooking', 'cooking', 1, '2019-09-21 07:07:06', '2019-09-21 07:07:06'),
(43, 'Psychology', 'psychology', 1, '2019-09-21 07:10:03', '2019-09-21 07:10:03'),
(45, 'Science', 'science', 1, '2019-09-21 07:37:06', '2019-09-21 07:37:06'),
(47, 'Political Science', 'political-science', 1, '2019-09-27 06:09:17', '2019-09-27 06:09:17'),
(49, 'Business & Economics', 'business-economics', 1, '2019-09-27 06:33:52', '2019-09-27 06:33:52'),
(52, '', '', 1, '2019-12-12 10:41:53', '2019-12-12 10:41:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_comments`
--

CREATE TABLE `book_comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_comments`
--

INSERT INTO `book_comments` (`id`, `parent_comment_id`, `user_id`, `article_id`, `content`, `status`, `created`, `updated`) VALUES
(22, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(33, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(37, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(39, 0, 4, 10, 'Good well 1', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(43, 0, 2, 10, 'Awesome', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(53, 0, 4, 10, 'Excellent4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(59, 0, 7, 10, 'Excellent10', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_group_articles`
--

CREATE TABLE `book_group_articles` (
  `id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_group_articles`
--

INSERT INTO `book_group_articles` (`id`, `categories_id`, `user_id`, `add_homepage`, `title`, `slug`, `categories_arr`, `featured_image`, `description`, `short_description`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(18, 1, 1, 1, 'Curious Teens', 'curious-teens', ',23,26,31,', '156905031118795.jpeg', '<p>This is a group for teens and adults interested in understanding how different generations perceive important ideas in both classical and modern works of fiction and non-fiction..</p>\r\n', 'This is a group for teens and adults interested in understanding how different generations perceive important ideas in both classical and modern works of fiction and non-fiction.', 1, 1, '2018-12-27 11:27:32', '2019-09-21 07:18:31'),
(43, 1, 1, 1, 'Politics &amp; Politicians', 'politics-politicians', ',22,23,', '156956492097237.jpeg', '<p>In our Politics &amp; Politicians book group, we read biographies, autobiographies, and political analyses in order to glean insights--we are on a quest to gain a deeper and more multi-faceted understanding of what motivates politicians and what shapes important political developments.</p>\r\n\r\n<p>Right now, we are mostly focused on contemporary politicians and politics. But we are always open to reading historical works, especially ones that shed light on enduring political dynamics. Feel free to recommend reads.</p>\r\n', 'In our Politics &amp; Politicians book group, we read biographies, autobiographies, and political analyses in order to glean insights.', 1, 1, '2019-09-25 08:57:18', '2019-09-27 06:16:57'),
(44, 1, 1, 1, 'Sierra Enviros', 'sierra-enviros', ',23,24,', '156956528452579.jpeg', '<p>Started by Sierra Club activists, our Sierra Enviros book group has been in existence for four years. We have read a wide range of books on climate change, animal behavior, environmental pollution and wildlife conservation as well as works of fiction with overarching environmental themes.</p>\r\n\r\n<p>Sometimes we have even ventured further afield to read books such as Sapiens&mdash;engaging reads that can enhance our contextual understanding of how we arrived at our current historical juncture. Not all the books we have read are listed here under &ldquo;previous reads,&rdquo; but the ones listed should give you some idea of what we have read.</p>\r\n', 'Started by Sierra Club activists, our Sierra Enviros book group has been in existence for four years.', 1, 1, '2019-09-27 06:19:22', '2019-09-27 06:49:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_group_article_books`
--

CREATE TABLE `book_group_article_books` (
  `id` int(11) NOT NULL,
  `book_group_article_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id_not_read` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `current_read_status` int(11) NOT NULL DEFAULT '0',
  `previous_read_status` int(11) NOT NULL DEFAULT '0',
  `owner_status` int(11) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_group_article_books`
--

INSERT INTO `book_group_article_books` (`id`, `book_group_article_id`, `book_id`, `user_id_not_read`, `current_read_status`, `previous_read_status`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(1, 2, 1, '', 1, 1, 1, 1, '2018-10-29 08:58:52', '2018-11-16 00:21:50'),
(2, 2, 15, '', 0, 1, 1, 1, '2018-10-29 08:58:52', '2018-11-16 00:21:50'),
(4, 2, 18, '', 0, 1, 1, 1, '2018-10-29 08:58:52', '2018-11-16 00:21:50'),
(5, 3, 2, '', 0, 1, 1, 1, '2018-10-29 08:58:52', '2018-11-16 00:21:50'),
(6, 6, 36, '', 1, 0, 1, 1, '2018-12-03 07:53:03', '2018-12-03 07:53:03'),
(7, 6, 31, '', 0, 1, 1, 1, '2018-12-03 07:53:22', '2018-12-03 07:53:22'),
(8, 6, 16, '', 1, 0, 1, 1, '2018-12-04 15:38:36', '2018-12-04 15:38:36'),
(9, 4, 19, '', 1, 0, 1, 1, '2018-12-04 17:08:11', '2018-12-04 17:08:11'),
(10, 4, 9, '', 1, 0, 1, 1, '2018-12-04 17:08:23', '2018-12-04 17:08:23'),
(11, 4, 11, '', 1, 0, 1, 1, '2018-12-07 10:02:49', '2018-12-07 10:02:49'),
(12, 9, 31, '', 1, 0, 1, 1, '2018-12-07 10:18:02', '2018-12-07 10:18:02'),
(13, 10, 38, '', 1, 0, 1, 1, '2018-12-11 17:45:22', '2018-12-11 17:45:22'),
(14, 11, 40, '', 1, 0, 1, 1, '2018-12-17 16:51:28', '2018-12-17 16:51:28'),
(15, 4, 40, '', 0, 1, 1, 1, '2018-12-17 17:17:41', '2018-12-17 17:17:41'),
(16, 11, 41, '', 1, 0, 1, 1, '2018-12-18 09:09:00', '2018-12-18 09:09:00'),
(17, 11, 36, '', 0, 1, 1, 1, '2018-12-18 09:10:05', '2018-12-18 09:10:05'),
(18, 13, 40, '', 0, 1, 1, 1, '2018-12-20 10:20:26', '2018-12-20 10:22:20'),
(19, 13, 38, '', 0, 1, 1, 1, '2018-12-20 10:20:51', '2018-12-20 10:20:51'),
(20, 13, 36, '', 1, 0, 1, 1, '2018-12-20 10:23:07', '2018-12-20 10:23:07'),
(21, 14, 40, '', 0, 1, 1, 1, '2018-12-24 12:03:47', '2018-12-24 12:04:41'),
(22, 14, 36, '', 1, 0, 1, 1, '2018-12-24 12:05:02', '2018-12-24 12:05:02'),
(23, 15, 41, '', 0, 1, 1, 1, '2018-12-24 12:25:27', '2018-12-24 12:25:27'),
(24, 15, 40, '', 1, 0, 1, 1, '2018-12-24 12:26:08', '2018-12-24 12:26:08'),
(25, 16, 40, '', 0, 1, 1, 1, '2018-12-25 09:47:42', '2018-12-25 09:47:50'),
(26, 9, 36, '', 0, 1, 1, 1, '2018-12-27 15:34:22', '2018-12-27 15:34:40'),
(29, 12, 40, '', 1, 0, 1, 1, '2019-01-08 07:55:28', '2019-01-08 07:55:28'),
(30, 12, 41, '', 1, 0, 1, 1, '2019-01-16 17:07:54', '2019-01-16 07:42:25'),
(31, 12, 42, '', 1, 0, 1, 1, '2019-01-16 17:22:06', '2019-01-16 17:22:06'),
(32, 12, 43, '', 0, 1, 1, 1, '2019-01-16 17:22:36', '2019-01-16 17:22:36'),
(33, 12, 39, '', 0, 1, 1, 1, '2019-01-16 07:42:04', '2019-01-16 07:42:15'),
(34, 12, 44, '', 1, 0, 1, 1, '2019-01-16 08:18:16', '2019-01-16 08:18:16'),
(35, 21, 46, '', 1, 0, 1, 1, '2019-01-21 07:47:00', '2019-01-21 07:47:00'),
(36, 19, 47, '', 1, 0, 1, 1, '2019-01-21 09:26:20', '2019-01-21 09:26:20'),
(37, 19, 48, '', 0, 1, 1, 1, '2019-01-21 09:26:54', '2019-01-21 09:26:54'),
(38, 12, 49, '', 1, 0, 1, 1, '2019-01-24 09:10:42', '2019-01-24 09:10:42'),
(39, 20, 38, '', 0, 1, 1, 1, '2019-01-28 17:37:26', '2019-01-28 17:38:11'),
(40, 20, 56, '', 1, 0, 1, 1, '2019-01-28 17:38:04', '2019-01-28 17:38:04'),
(43, 18, 88, '', 1, 0, 1, 1, '2019-09-21 07:20:26', '2019-09-21 07:20:26'),
(44, 18, 89, '', 1, 0, 1, 1, '2019-09-21 07:22:17', '2019-09-21 07:22:17'),
(45, 18, 58, '', 0, 1, 1, 1, '2019-09-21 07:27:06', '2019-09-21 07:27:06'),
(46, 18, 90, '', 0, 1, 1, 1, '2019-09-21 07:33:02', '2019-09-21 07:33:02'),
(47, 18, 91, '', 0, 1, 1, 1, '2019-09-21 07:35:46', '2019-09-21 07:35:46'),
(48, 18, 92, '', 0, 1, 1, 1, '2019-09-21 07:37:06', '2019-09-21 07:37:06'),
(49, 41, 93, '', 1, 0, 1, 1, '2019-09-25 09:25:59', '2019-09-25 09:25:59'),
(50, 43, 94, '', 1, 0, 1, 1, '2019-09-27 06:07:03', '2019-09-27 06:07:03'),
(51, 43, 95, '', 1, 0, 1, 1, '2019-09-27 06:09:17', '2019-09-27 06:09:17'),
(52, 43, 96, '', 0, 1, 1, 1, '2019-09-27 06:11:06', '2019-09-27 06:11:06'),
(53, 43, 97, '', 0, 1, 1, 1, '2019-09-27 06:12:18', '2019-09-27 06:12:18'),
(54, 44, 98, '', 1, 0, 1, 1, '2019-09-27 06:21:12', '2019-09-27 06:21:12'),
(55, 44, 58, '', 1, 0, 1, 1, '2019-09-27 06:22:50', '2019-10-03 09:02:20'),
(56, 44, 92, '', 0, 1, 1, 1, '2019-09-27 06:23:13', '2019-09-27 06:23:39'),
(57, 44, 67, '', 0, 1, 1, 1, '2019-09-27 06:24:19', '2019-09-27 06:24:19'),
(58, 44, 68, '', 0, 1, 1, 1, '2019-09-27 06:25:29', '2019-09-27 06:25:29'),
(59, 44, 99, '', 0, 1, 1, 1, '2019-09-27 06:27:35', '2019-09-27 06:27:35'),
(60, 44, 100, '', 0, 1, 1, 1, '2019-09-27 06:33:53', '2019-09-27 06:33:53'),
(61, 44, 101, '', 0, 1, 1, 1, '2019-09-27 06:35:10', '2019-09-27 06:35:10'),
(62, 44, 102, '', 0, 1, 1, 1, '2019-09-27 06:40:40', '2019-09-27 06:40:40'),
(63, 45, 103, '', 1, 0, 1, 1, '2019-10-23 09:16:29', '2019-10-23 09:16:29'),
(64, 45, 104, '', 0, 1, 1, 1, '2019-10-23 09:18:23', '2019-10-23 09:18:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_group_article_users`
--

CREATE TABLE `book_group_article_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_group_article_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `owner_status` int(11) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_group_article_users`
--

INSERT INTO `book_group_article_users` (`id`, `user_id`, `book_group_article_id`, `status`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(1, 2, 5, 0, 1, 1, '2018-10-22 03:02:58', '2018-11-13 03:10:12'),
(2, 5, 5, 0, 1, 1, '2018-10-22 03:02:58', '2018-11-12 16:50:33'),
(4, 4, 2, 0, 1, 1, '2018-10-22 03:02:58', '2018-10-22 03:02:58'),
(7, 7, 3, 0, 1, 1, '2018-10-22 03:02:58', '2018-10-22 03:02:58'),
(8, 8, 3, 0, 1, 1, '2018-10-22 03:02:58', '2018-10-22 03:02:58'),
(9, 9, 3, 0, 1, 1, '2018-10-22 03:02:58', '2018-10-22 03:02:58'),
(10, 2, 4, 2, 0, 1, '2018-10-22 03:02:58', '2018-12-17 17:17:22'),
(11, 17, 4, 1, 1, 1, '2018-12-06 07:56:10', '2018-12-17 17:17:22'),
(12, 3, 3, 0, 1, 1, '2018-12-07 17:47:22', '2018-12-17 10:51:10'),
(13, 3, 6, 0, 1, 1, '2018-12-07 09:32:57', '2018-12-07 09:32:57'),
(17, 3, 10, 0, 1, 1, '2018-12-17 09:43:30', '2018-12-17 09:43:30'),
(18, 1, 11, 1, 1, 1, '2018-12-18 09:04:08', '2018-12-24 12:23:11'),
(19, 5, 12, 0, 1, 1, '2018-12-20 10:16:04', '2018-12-20 10:16:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_group_categories`
--

CREATE TABLE `book_group_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `book_group_categories`
--

INSERT INTO `book_group_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(3, 'history', 'history', 1, '2018-10-19 23:58:11', '2018-10-19 23:58:11'),
(4, 'comedy', 'comedy', 1, '2018-10-19 23:58:24', '2018-10-19 23:58:24'),
(5, 'cartoon', 'cartoon', 1, '2018-10-19 23:58:30', '2018-10-19 23:58:30'),
(6, 'animal', 'animal', 1, '2018-10-19 23:58:34', '2018-10-19 23:58:34'),
(7, 'beach', 'beach', 1, '2018-10-19 23:58:41', '2018-10-19 23:58:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_likes`
--

CREATE TABLE `book_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bulletins`
--

CREATE TABLE `bulletins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` int(11) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bulletins`
--

INSERT INTO `bulletins` (`id`, `user_id`, `content`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(1, 3, 'his had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive.', 1, 1, '2018-11-10 09:00:44', '2018-11-10 09:00:44'),
(2, 2, 'his had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive.', 0, 1, '2018-11-10 09:01:00', '2018-11-10 09:01:06'),
(3, 1, 'his had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive.', 1, 1, '2018-11-10 09:01:00', '2018-11-10 09:01:00'),
(4, 17, 'test test', 1, 1, '2018-12-03 08:46:46', '2018-12-03 08:46:46'),
(5, 3, 'Test 1234', 1, 1, '2018-12-07 08:28:46', '2018-12-07 09:27:44'),
(6, 23, 'Message test 12.16.2018', 1, 1, '2018-12-17 17:09:27', '2018-12-17 17:09:41'),
(8, 23, 'Lorem ipsum dolor sit amet, ad viris molestiae vim, ea nam dicit nominavi suscipiantur. Te usu quidam aliquip, ius diceret lobortis ut. Viris prompta assueverit sit eu, sit nibh noluisse ei. Quo ut graeci contentiones, te vim iusto vituperatoribus. Solet impedit scripserit mei id. Ad nec mutat erant accusam.\n\nNo esse aperiam alterum nec, iusto noster no cum. Eu eam modo fastidii, an mollis bonorum corrumpit vim, no eligendi epicurei eam. Natum intellegat ex his, ex oratio possit vulputate pri. Quo ex fabellas explicari eloquentiam, ex sapientem disputationi mel, usu ut altera concludaturque. Vivendo repudiare consequat ea pri, oblique dissentiunt ne per. Mea ei liber mnesarchum percipitur.\n\nPro no solum consul lobortis. In posse voluptatibus signiferumque his. Natum impetus alterum id eos, omnes voluptatibus ea sed, per consul viderer detraxit ad. Pri deleniti sadipscing no.', 1, 1, '2018-12-17 17:10:44', '2018-12-18 09:15:37'),
(9, 23, 'Perfect day today!', 1, 1, '2018-12-18 09:15:45', '2018-12-18 09:15:45'),
(10, 26, 'Hey All:  I am excited  about exploring this site.  I see there are great documentaries, book groups, and the chance to publish my own blogs&#33;', 1, 1, '2019-01-18 07:08:41', '2019-01-18 07:08:41'),
(11, 26, 'I am going to go to an evironmental conference this Saturday to try to get public officials to declare a state of climate emergency, so that will take up my entire Saturday.  However, on Sunday, I will be going hiking, probably at Coyote Valley in San Jose, so i am really pumped up about this outing.  About the conference, a group of us is eager to see our elected reps.  do the right thing in taking a major step in the direction of protecting our planet', 1, 1, '2019-02-05 08:01:27', '2019-02-05 08:01:27'),
(12, 34, 'Hello, world&#33; ', 1, 1, '2019-02-06 10:44:13', '2019-02-06 10:44:13'),
(13, 85, 'Hi Everyone:\n\nAre you planning on working for a particular candidate in the primaries?', 1, 1, '2019-12-18 16:12:36', '2019-12-18 16:12:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `election_central_articles`
--

CREATE TABLE `election_central_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `election_central_articles`
--

INSERT INTO `election_central_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(24, 'Candidatesâ€™ Positions:  2020 Democratic Candidates', 1, 1, 0, NULL, '<h2><strong>Candidates and their POSITIONS: &nbsp;Top 5 in 2020 Democratic Field &nbsp;</strong></h2>\r\n\r\n<p>Summer &nbsp;2019; &nbsp;Most of the latest polls rank the top 10 Democratic candidates in more or less the same order as listed below: Note that at this early date, it is impossible to tell who will be on top by the time the primaries are in full swing next year.</p>\r\n\r\n<p><strong>We are featuring &nbsp;the key proposed policies of the top 5 candidates. &nbsp;For the rest, we provide links to their websites.</strong></p>\r\n\r\n<ol>\r\n	<li>Joe Biden</li>\r\n	<li>Bernie Sanders</li>\r\n	<li>Elizabeth Warren</li>\r\n	<li>Kamala Harris</li>\r\n	<li>Pete Buttigieg</li>\r\n	<li>Cory Booker</li>\r\n	<li>Amy Klobuchar</li>\r\n	<li>Andrew Yang</li>\r\n	<li>Stephen Bullock</li>\r\n</ol>\r\n\r\n<p>For a summary of each candidate&rsquo;s distinctive characteristics, signature policy, signature apology, etc., read this article in Rolling Stone magazine (<a href=\"https://www.rollingstone.com/politics/politics-features/2020-democrat-candidates-771735/\" target=\"_blank\">more</a>)</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Joe Biden: Basic Positions</strong></h3>\r\n\r\n<p><strong><img alt=\"joe biden\" src=\"http://enlight21.com/media/upload/election_central/Joe-Biden.jpg\" style=\"float:right; height:273px; width:400px\" />Latest Policy Proposals</strong><br />\r\n<a href=\"https://joebiden.com/joes-vision/\" target=\"_blank\">https://joebiden.com/joes-vision/</a><br />\r\n&bull;&nbsp;&nbsp; &nbsp;&#36;15 minimum wage proposal&nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Higher taxes on investment income<br />\r\n&bull;&nbsp;&nbsp; &nbsp;No tuition for students at public colleges and universities,&nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Major infrastructure overhaul</p>\r\n\r\n<p>Vulnerabilities: Biden has a lot of baggage because of his long history as a senator and Obama&rsquo;s Vice President: &nbsp;</p>\r\n\r\n<ol>\r\n	<li>He was a strong supporter of the banking industry &nbsp;</li>\r\n	<li>He supported the 1994 crime bill that many say contributed to a new era of mass incarceration,</li>\r\n	<li>He supported the invasion of Iraq in 2003. &nbsp;</li>\r\n	<li>He&nbsp;voted in favor of the Defense of Marriage Act, which discriminated against same-sex couples.</li>\r\n	<li>He has been classified by liberals as a &ldquo;Wall Street democrat. &ldquo; Here is an interesting op-ed piece by Roger Cohen &nbsp;that labels Biden as part of the &ldquo;Davos&rdquo; crowd (international globalization elite)</li>\r\n</ol>\r\n\r\n<p>Biden and the Party of Davos -&nbsp;<a href=\"https://www.nytimes.com/2019/05/03/opinion/joe-biden.html\" target=\"_blank\">https://www.nytimes.com/2019/05/03/opinion/joe-biden.html</a>. &nbsp;&nbsp;</p>\r\n\r\n<p>Pundits have opined that the reason Biden is still no. 1 in polls is because people view him as the most &ldquo;electable&rdquo; candidate, given his moderate views, the fact that he is a white male, his seeming appeal to working class whites, and African Americans because he is associated with Barack Obama. But as history has shown, polls this early in the primaries say very little about who the eventual candidate will be.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Bernie Sanders: Basic Positions</strong><img alt=\"bernie-sanders\" src=\"http://enlight21.com/media/upload/election_central/bernie-sanders.jpg\" style=\"float:right; height:273px; width:400px\" /></h3>\r\n\r\n<p>Does not accept big donors&rsquo; money in the primaries</p>\r\n\r\n<p><strong>Latest Policy Proposals</strong><br />\r\n<a href=\"https://berniesanders.com/issues/\" target=\"_blank\">https://berniesanders.com/issues/</a></p>\r\n\r\n<ul>\r\n	<li>Medicare for All</li>\r\n	<li>Tuition-free public colleges/universities</li>\r\n	<li>Reduce income inequality through the following:</li>\r\n	<li>Raise the minimum wage to a living wage of at least &#36;15 an hour.</li>\r\n	<li>Enact a universal childcare and pre-kindergarten program.</li>\r\n	<li>Make sure women and men are paid the same wage for the same job through the Paycheck Fairness Act.</li>\r\n	<li>Guarantee all workers paid family and medical leave, paid sick leave and paid vacation.</li>\r\n	<li>Make it easier for workers to join unions through the Workplace Democracy Act.</li>\r\n	<li>Make quality education a right.</li>\r\n	<li>Implement a green jobs program.</li>\r\n	<li>Fight for LBGTQ Equality</li>\r\n	<li>Combat Climate Change and Pass a Green New Deal</li>\r\n	<li>Gun Safety</li>\r\n	<li>Expand Social Security Benefits</li>\r\n	<li>Demand that Wall Street, Corporations and the Rich Pay their Fair Share of Taxes</li>\r\n	<li>Supports Green New Deal</li>\r\n</ul>\r\n\r\n<p><strong>Vulnerabilities</strong>: &nbsp;Bernie&rsquo;s support among Americans of color has always been relatively weak, but this time around his real challenge arises from the fact that many of the candidates in the Dem field have adopted versions of his signature policy proposals&mdash;Medicare for All; &nbsp;&#36;15 minimum wage; &nbsp;free college, etc.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Elizabeth Warren: &nbsp;Basic Positions &nbsp;</strong><img alt=\"Elizabeth-Warren\" src=\"http://enlight21.com/media/upload/election_central/Elizabeth-Warren.jpg\" style=\"float:right; height:273px; width:400px\" /></h3>\r\n\r\n<p>Does not accept big donors&rsquo; money in the primaries.</p>\r\n\r\n<p><strong>Latest Policy Proposals</strong><br />\r\n<a href=\"https://elizabethwarren.com/plans\" target=\"_blank\">https://elizabethwarren.com/plans</a></p>\r\n\r\n<ul>\r\n	<li>Supports Medicare-for-All (just delineated specifics)</li>\r\n	<li>Break Up Big Tech&rsquo;s Monopolies (a driver of extreme income inequality).&nbsp;</li>\r\n	<li>Rebuild the Middle Class\r\n	<ul>\r\n		<li>Ultra Millionaire Tax: &nbsp;taxes the wealth of the richest Americans. It applies only to households with a net worth of &#36;50 million or more&mdash;roughly the wealthiest 75,000 households, or the top 0.1&#37;. Households would pay an annual 2&#37; tax on every dollar of net worth above &#36;50 million and a 3&#37; tax on every dollar of net worth above &#36;1 billion.&nbsp;</li>\r\n		<li>Letting workers elect at least 40&#37; of a company&rsquo;s board members to give them a powerful voice in decisions about wages and outsourcing.</li>\r\n		<li>Strong anti-trust enforcement so giant corporations can&rsquo;t stifle competition, depress wages, and drive up the cost of products.</li>\r\n	</ul>\r\n	</li>\r\n	<li>End Washington Corruption: &nbsp;\r\n	<ul>\r\n		<li>End lobbying as we know it by closing loopholes, so everyone who lobbies must register, shining &nbsp;sunlight on their activities/</li>\r\n		<li>Ban foreign &nbsp;governments from hiring Washington lobbyists</li>\r\n		<li>Shut down the ability of lobbyists to move freely in and out of government jobs.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Strengthen Our Democracy:\r\n	<ul>\r\n		<li>Pass a constitutional amendment to protect the right of every American citizen to vote and to have that vote counted.</li>\r\n	</ul>\r\n	</li>\r\n	<li>Supports Green New Deal</li>\r\n	<li>Eliminate unnecessary and unjustified rules that make voting more difficult, and overturn every single voter suppression rule that racist politicians use to steal votes from people of color.</li>\r\n	<li>Ban partisan gerrymandering</li>\r\n	<li>Overturn Citizens United to prevent Big Money from influencing elections.</li>\r\n	<li>Hold foreign governments accountable when they interfere in our elections.</li>\r\n	<li>Constrain those who seek to weaponize hatred and bigotry in order to divide us.</li>\r\n</ul>\r\n\r\n<p><strong>Vulnerabilities</strong>: &nbsp;While Warren&rsquo;s longstanding progressive credentials are impeccable, not enough support among people of color is one major weakness for Warren. &nbsp;Another vulnerability stems from what some pundits view as the disadvantages of being a woman. &nbsp;Some say she might not be able to overcome the entrenched sexism that still exists in America. &nbsp;The last one has to do with her progressivism&mdash;some say that moderates and independents will not vote for her. The conservatives-generated flap about her &ldquo;Indian&rdquo; heritage will probably not play a role in diminishing her stature.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Kamala Harris: &nbsp;Basic Positions<img alt=\"Kamala-Harris\" src=\"http://enlight21.com/media/upload/election_central/Kamala-Harris.jpg\" style=\"float:right; height:273px; width:400px\" /></strong></h3>\r\n\r\n<p><strong>Latest Policy Proposals</strong><br />\r\n<a href=\"https://www.politico.com/2020-election/candidates-views-on-the-issues/kamala-harris/\" target=\"_blank\">https://www.politico.com/2020-election/candidates-views-on-the-issues/kamala-harris/</a></p>\r\n\r\n<ul>\r\n	<li>Medicare for All &nbsp;(no specifics yet but believes in a &ldquo;staged&rdquo; approach that stretches over 10 years, one that would allow private health insurance companies to continue to play a role)</li>\r\n	<li>&#36;2.8 trillion middle-class tax plan. &nbsp;tax plan for middle- and working-class families, and it will be a centerpiece of her presidential campaign, her aides said. The federal government would pay tax credits that match a person&rsquo;s earnings up to &#36;3,000 (or &#36;6,000 for married couples).&nbsp;Those credits would phase out for higher earners, and would not benefit Americans with no earnings. The program would be funded &nbsp;by eliminating the parts of the Republican tax law passed last fall that benefits the rich, as well as levying a new tax on large financial institutions.</li>\r\n	<li>Rental Relief: &nbsp;Give tax credits to renters who make less than &#36;100,000 a year but spend more than 30 percent of their income on rent. &nbsp;The size of the benefit increases for poorer families and decreases higher up the income distribution</li>\r\n	<li>Reforming cash bail: &nbsp;The current cash bail system disproportionately jails poor Americans who cannot make cash bail payments. &nbsp;As a senator, Harris has already proposed a&nbsp;three-year &#36;10 million grant program to encourage states to figure out how to find alternatives to their cash bail systems.</li>\r\n</ul>\r\n\r\n<p><strong>Vulnerabilities</strong>: Harris&rsquo;s vulnerabilities include the following: Some say that as a woman of color, expect that racists and sexists will not vote for her. That&rsquo;s not all, her progressive credentials have been questioned because of her &ldquo;conservative&rdquo; track record when she was SF district attorney and the CA attorney general. For example: as attorney general, Harris opposed a bill requiring her office to investigate shootings involving police officers. Her office fought a proposed parole program that would release prisoners early if they served half their sentences, arguing that &ldquo;prisons would lose an important labor pool.&rdquo; &nbsp;Harris also supported using prison labor to fight forest fires. &nbsp;Declined to take a stance on the Green New Deal. &nbsp;Both Harris and Feinstein voted present when the Green New Deal came up for a vote in the Senate.</p>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>Pete Buttigieg: &nbsp;Basic Positions<img alt=\"Pete-Buttigieg\" src=\"http://enlight21.com/media/upload/election_central/Pete-Buttigieg.jpg\" style=\"float:right; height:273px; width:400px\" /></strong></h3>\r\n\r\n<p><strong>Latest Policy Proposals</strong><br />\r\n<a href=\"https://www.politico.com/2020-election/candidates-views-on-the-issues/pete-buttigieg/\">https://www.politico.com/2020-election/candidates-views-on-the-issues/pete-buttigieg/</a></p>\r\n\r\n<ul>\r\n	<li>Gun Control: &nbsp;Supports background checks and age restrictions.</li>\r\n	<li>Healthcare: &nbsp;Supports single payer system for no details yet.</li>\r\n	<li>LGBTQ Equality: &nbsp;A gay person himself, &nbsp;Buttigieg&mdash;who married his husband, Chasten Glezman, last year&mdash;supports the Federal Equality Act, a proposed amendment which would expand the 1964 Civil Rights Act so that non-discrimination protections would apply to the LGBTQ communit.</li>\r\n	<li>Immigration: &nbsp;Supports DACA and legislation that would create a pathway towards citizenship for young, undocumented immigrants.&nbsp;</li>\r\n	<li>Supports Green New Deal</li>\r\n</ul>\r\n\r\n<p><strong>Vulnerabilities</strong>: &nbsp;Increasingly seen as a moderate democrat, Mayor Pete is very light on specific policy proposals, preferring to rely on &ldquo;storytelling&rdquo; for his appeal (see New York Times article). &nbsp;This indicates that he believes that image, impressive &nbsp;rhetoric, Ivy League credentials, and subliminal projections of an appealing persona are sufficient to catapult him to the front ranks of the democratic field, the lack of substance notwithstanding. &nbsp;Other vulnerabilities include his obvious lack of accomplishments and experience, lack of support among people of color, and very tepid support among progressives. &nbsp;</p>\r\n\r\n<p>For a summary of each candidate&rsquo;s distinctive characteristics, signature policy, signature apology, etc., read this article in Rolling Stone magazine.<br />\r\n<a href=\"https://www.rollingstone.com/politics/politics-features/2020-democrat-candidates-771735/\" target=\"_blank\">https://www.rollingstone.com/politics/politics-features/2020-democrat-candidates-771735/</a></p>\r\n', 'Candidates and their POSITIONS:  Top 5 in 2020 Democratic Field  \r\nSummer  2019;  Most of the latest polls rank the top 10 Democratic candidates in more or less the same order as listed below: Note that at this early date, it is impossible to tell who will be on top by the time the primaries are in full swing next year.\r\n', 'candidates-positions-2020-democratic-candidates', ',21,22,', 1, 1, '2019-11-29 12:11:01', '2019-11-29 12:17:44'),
(25, 'Would a Dem Progressive Have a Chance in 2020?', 1, 1, 1, '157502986016124.jpeg', '<p>The conventional wisdom is that in the primaries, candidates tend to be more extreme&mdash;for Dems, this means tilting left--as they try to stand out among the field of candidates, but after a nominee has been chosen, he/she will run to the middle, hoping to appeal to independents and moderates. &nbsp;This is because many assume that Dems can&rsquo;t be too progressive as they will lose the white working class vote and the center.</p>\r\n\r\n<p>Because of this conventional belief, many Dems think Biden, the most moderate of the top 4 candidates, is the most &ldquo;electable&rdquo; as he appeals more to the middle swath of the electorate and to the white working class, especially white males.</p>\r\n\r\n<p>The other perspective, one shared by progressives and &nbsp;represented by people like Michael Moore, is that a moderate like Biden will not excite the Obama coalition&mdash;young people, minorities, college-educated white liberals&mdash;and therefore, he/she may go down in defeat just like Hillary did even if the moderate Dem nominee wins the popular vote. &nbsp; The proponents of this perspective believe that Dems do not have to waste money and energy courting the &ldquo;mythic&rdquo; white working class vote to win, as galvanizing the Obama coalition and increasing turnout is the path to victory. &nbsp;</p>\r\n\r\n<p>There are, of course, other perspectives on what the Dem nominee will have to do to win the 2020 presidential election, but the two aforementioned perspectives are the main ones.<br />\r\n&nbsp;</p>\r\n', 'The conventional wisdom is that in the primaries, candidates tend to be more extremeâ€”for Dems, this means tilting left--as they try to stand out among the field of candidates, but after a nominee has been chosen, he/she will run to the middle, hoping to appeal to independents and moderates. ', 'would-a-dem-progressive-have-a-chance-in-2020', ',21,', 1, 1, '2019-11-29 13:17:41', '2019-11-29 13:17:41'),
(26, 'Tom Steyerâ€™s Candidacy', 1, 1, 1, NULL, '<p>A piece by Paul Waldman, a Washington Post opinion writer, questions why Steyer is running for president. &nbsp;Overall, Waldman compliments Steyer for all his positive accomplishments on behalf of progressive causes, especially in combating climate change. &nbsp;But he poses some good questions that Steyer has not yet answered. &nbsp;The primary question is: &nbsp;Why is Steyer running for president as there are candidates in the Dem field that share his progressive values and principles? &nbsp;(<a href=\"https://www.washingtonpost.com/opinions/2019/07/08/tom-steyer-president-do-democrats-really-need-billionaire-candidate/?utm_term=.7ffd0e713c27\" target=\"_blank\">more</a>)</p>\r\n\r\n<p>Progressives believe that Steyer is well-intentioned. &nbsp;Based on his history of helping progressive politicians &nbsp;and the environment, no one doubts his authenticity and his probity, but as Helaine Olen, the author of an op-ed in the Washington Post, opines, &ldquo;his virtuous politics can&rsquo;t disguise the truth: He&rsquo;s buying his way into a race&hellip; their money gives them an outsize influence, no matter what their positions. Steyer has never held elected office, and there&rsquo;s no evidence the public is clamoring for his candidacy&rdquo; (<a href=\"https://www.washingtonpost.com/opinions/2019/07/08/dear-tom-steyer-dont-run-president/\" target=\"_blank\">more</a>)</p>\r\n', 'A piece by Paul Waldman, a Washington Post opinion writer, questions why Steyer is running for president. Â Overall, Waldman compliments Steyer for all his positive accomplishments on behalf of progressive causes, especially in combating climate change. Â But he poses some good questions that Steyer has not yet answered. ', 'tom-steyers-candidacy', ',21,', 1, 1, '2019-11-29 13:19:28', '2019-11-29 13:19:28'),
(27, 'Prediction: Dem Victory in 2020', 1, 1, 1, '157503007135161.jpeg', '<p>Professor Rachel Bitecofer, the assistant director of the Wason Center for Public Policy at Virginia&rsquo;s Christopher Newport University, accurately predicted that Democrats would gain 42 sits in 2018 (Dems gained 40).&nbsp;</p>\r\n\r\n<p>Now she predicts that Donald Trump will lose in 2020 to almost any Dem opponent except for a &ldquo;disruptor&rdquo; like Bernie. &nbsp;She bases this prediction on a unique model. &nbsp;The main premise that she bases her model on is that elections are now driven by &ldquo;negative partisanship.&rdquo;</p>\r\n\r\n<p>According to Bitecofer, one important factor now that did not exist in 2016 is that the electorate was complacent in 2016, but no more-- many people are horrified by President Trump and regard him as the &ldquo;Terminator.&rdquo; &nbsp;This fear will defeat him, she predicts. &nbsp;(<a href=\"https://www.oregonlive.com/politics/2019/07/donald-trump-will-lose-the-2020-election-concludes-unique-prediction-model-that-nailed-2018-midterm-results.htmlÂ \" target=\"_blank\">more</a>).<br />\r\n&nbsp;</p>\r\n', 'Professor Rachel Bitecofer, the assistant director of the Wason Center for Public Policy at Virginiaâ€™s Christopher Newport University, accurately predicted that Democrats would gain 42 sits in 2018 (Dems gained 40).Â ', 'prediction-dem-victory-in-2020', ',21,', 1, 1, '2019-11-29 13:21:12', '2019-11-29 13:21:12'),
(28, 'The Chances  of a Dem Majority in the Senate in 2020', 1, 1, 1, '157503026519303.jpeg', '<p>Most analysts agree that the Democrats&rsquo; chances of carrying out their agenda after 2020 (regardless of which party is in the White House) will depend on whether they can become the majority party in the Senate. &nbsp;If the Republicans are still the majority party in the Senate, Mitch McConnell will continue to block bills. &nbsp;</p>\r\n\r\n<p>Currently, there is a consensus that even though there are many more Republican &nbsp;seats open in 2020 (Republicans have to defend 22 seats while Dems only have to defend 12), only 3 Republican seats are up for grabs: &nbsp;Maine, Colorado, Arizona. &nbsp;The other 19 Republican seats are in RED areas, including 1 seat Democratic seat (Alabama). &nbsp;(<a href=\"https://www.vox.com/policy-and-politics/2019/6/5/18306339/senate-democrats-2020-election-map\" target=\"_blank\">more</a>)</p>\r\n', 'Most analysts agree that the Democratsâ€™ chances of carrying out their agenda after 2020 (regardless of which party is in the White House) will depend on whether they can become the majority party in the Senate. Â If the Republicans are still the majority party in the Senate, Mitch McConnell will continue to block bills. Â ', 'the-chances-of-a-dem-majority-in-the-senate-in-2020', ',21,', 1, 1, '2019-11-29 13:24:26', '2019-11-29 13:24:26'),
(29, 'Can Dems Win Back the White House in 2020 with a Moderate Candidate?', 1, 1, 1, NULL, '<p>While media commentators have focused on the energy generated by the progressive wing of the Democratic Party and its leading campaign issue&mdash;Medicare-for-All&mdash;this could be deceptive. &nbsp;In this article, the author shows that for the 2018 mid0term elections, significantly more moderate Democrats were able to flip seats than progressives supported by Bernie Sanders&rsquo; grassroots organization, Our Revolution. &nbsp;Extrapolating from this, it appears that a moderate Dem nominee&mdash;someone like Biden&mdash;can indeed win the 2020 Presidential election. &nbsp;(<a href=\"https://www.washingtonpost.com/opinions/dont-let-progressives-fool-you-moderate-democrats-can-win/2018/11/07/37648218-e2b1-11e8-ab2c-b31dcd53ca6b_story.html\" target=\"_blank\">more</a>)<br />\r\n<br />\r\n&nbsp;</p>\r\n', 'While media commentators have focused on the energy generated by the progressive wing of the Democratic Party and its leading campaign issueâ€”Medicare-for-Allâ€”this could be deceptive. Â In this article, the author shows that for the 2018 mid0term elections, significantly more moderate Democrats were able to flip seats than progressives supported by Bernie Sandersâ€™ grassroots organization, Our Revolution.', 'can-dems-win-back-the-white-house-in-2020-with-a-moderate-candidate', ',21,', 1, 1, '2019-11-29 13:26:48', '2019-11-29 13:26:48'),
(30, 'Pete Buttigieg:  Alluring to Some, But Not to All', 1, 1, 1, '157503050932319.jpeg', '<p>2020 Democratic Party presidential candidate Pete Buttigieg, the eloquent 37 year old mayor of South Bend, Indiana, has taken the wealthy white liberal class by storm. &nbsp;In fact, he is so popular among the latter that he outraised all other candidates for the 2nd quarter 2019, taking in a whopping &#36;24 million. &nbsp;</p>\r\n\r\n<p>However, there are storms on the horizon. &nbsp;Some pundits aver that the reason &nbsp;his recent poll numbers have stalled in the mid-single digits (around 5&#37;) is that people have doubts about his ability to handle race problems and crime/policing issues. &nbsp;His deficiencies in this area were on full display when South Bend police shot a black man in June (2019) which gave rise to protests. &nbsp;To his credit, he left the campaign trail and went back to South Bend to face the heat.</p>\r\n\r\n<p>But this incident has led to a closer look at Mayor Pete&rsquo;s governing history in South Bend. &nbsp;During his first term (2012 to 2016) South Bend crime rates were relatively stable, but from the start of his second term, crime rates increased sharply. &nbsp;Some say the increase was due to a different method of calculating crime statistics. &nbsp;<br />\r\nRegardless, Mayor Pete has other problematic incidents on his record&mdash;such as a number of what some see as questionable personnel moves, including the demotion of the city&rsquo;s first black police chief, Darryl Boykins, during his first months as mayor. &nbsp;</p>\r\n\r\n<p>Apparently, these problems have been enough to sow distrust and doubt among votes, especially black voters (in a recent Fox News Poll, he received less than 1 &#37; among black primary voters).</p>\r\n\r\n<p>Despite these recent revelations and problems, no one should count him out, especially in the long run. &nbsp;He&rsquo;s smart, articulate, has integrity, knows how to appeal to big donors, and his left-of-center moderate views provide him with enough lasting appeal that if he persists, he may just find himself in the White House if not in 2021, then later. &nbsp;Unlike virtually all the other candidates, he has time, lots of time&mdash;maybe even 40 years as he will be just around Joe Biden&rsquo;s and Bernie&rsquo;s age in 4 decades. &nbsp;He can use the time too&mdash;as it looks like he has a lot to learn. (<a href=\"https://www.nytimes.com/2019/08/30/us/politics/pete-buttigieg-south-bend-police.html?searchResultPosition=1\" target=\"_blank\">more</a>)</p>\r\n', '2020 Democratic Party presidential candidate Pete Buttigieg, the eloquent 37 year old mayor of South Bend, Indiana, has taken the wealthy white liberal class by storm. Â In fact, he is so popular among the latter that he outraised all other candidates for the 2nd quarter 2019, taking in a whopping &#36;24 million. Â ', 'pete-buttigieg-alluring-to-some-but-not-to-all', ',21,', 1, 1, '2019-11-29 13:28:29', '2019-11-29 13:28:29'),
(31, 'Why Universal Basic Income Will Not Work', 1, 1, 1, '157503063912876.jpeg', '<p>Universal Basic Income, or UBI, is an idea that has been promoted by &ldquo;progressive&rdquo; capitalists who are not interested in fundamental structural changes. &nbsp;Instead, they advocate glitzy band aids slapped on gushing wounds, believing that such measures would alleviate serious problems like the extreme income inequality that plagues many developed countries.</p>\r\n\r\n<p>There have been a few real-life experiments with UBI schemes. &nbsp;Most of these experiments show that it only works in improving wellbeing among extremely impoverished groups in third world countries. &nbsp;Even the well-received &ldquo;Alaska Fund&rdquo; that has been giving out &#36;1600 in dividends to each adult and child in Alaska supports the finding that positive impacts are mostly limited &nbsp;to impoverished groups&mdash;in this case, rural indigenous Alaskans. &nbsp;Moreover, the Alaska Fund payouts have done nothing to reduce child poverty, much less reduce overall income inequality.</p>\r\n\r\n<p>The cost of UBI programs is very high as most estimates show that these payments will constitute 20 to 30&#37; of a country&rsquo;s GDP&mdash;this is money that can be put to much better use in establishing sustainable programs that will pave the way for jobs that pay family-supporting wages.&nbsp;</p>\r\n\r\n<p>Finally, there are some clear negative consequences of adopting University Basic Income programs: &nbsp;UBIs will divert attention away from programs such as infrastructure projects offering family-sustaining incomes and the urgent need to reform &nbsp;social safety nets, strengthen unions, regulate the power of large monopolies, help small business, and improve public education/public services.&nbsp;</p>\r\n\r\n<p>Instead of the minimal government handouts from UBI, most people would prefer the sustainability and dignity of well-paying jobs over which they have a degree of control. (<a href=\"https://www.theguardian.com/commentisfree/2019/may/06/universal-basic-income-public-realm-poverty-inequality\" target=\"_blank\">more</a>)</p>\r\n', 'Universal Basic Income, or UBI, is an idea that has been promoted by â€œprogressiveâ€ capitalists who are not interested in fundamental structural changes. Â Instead, they advocate glitzy band aids slapped on gushing wounds, believing that such measures would alleviate serious problems like the extreme income inequality that plagues many developed countries.', 'why-universal-basic-income-will-not-work', ',21,', 1, 1, '2019-11-29 13:30:40', '2019-11-29 13:38:27'),
(32, 'The Difference Between Warren and Sanders', 1, 1, 1, '157503083828642.jpeg', '<p>Elizabeth Warren and Bernie Sanders seem to agree on a lot of issues&mdash;Medicare for All, &nbsp;Free College, &nbsp;Taxing the Rich, &nbsp;Forgiving College Loan Debt and more. &nbsp;The two are in complete agreement that the system is currently rigged in favor of the rich and corporations. . &nbsp;So, what are the differences between the two?</p>\r\n\r\n<p>For those who are watching their campaigns closely, they will know that Warren believes in markets and that she is a capitalist &ldquo;to the bone.&rdquo; &nbsp; She believes that a well-regulated capitalist system &nbsp;can lead to shared prosperity. &nbsp; Bernie, on the other hand, self-identifies as a &ldquo;democratic socialist.&rdquo; &nbsp;It is unclear whether he thinks capitalism is salvageable, and when asked about how his goals can be achieved, he often alludes to a &ldquo;political revolution&rdquo; that transfers a large share of power to the masses.&nbsp;</p>\r\n\r\n<p>As for the demographics of their supporters, there are also significant differences: &nbsp;Warren&rsquo;s supporters tend to be highly educated (post-grad degrees), female, and avid followers of &nbsp;political news. Bernie&rsquo;s supporters, on the other hand, tend to be &nbsp;less educated, male, &nbsp;and don&rsquo;t follow the news much. &nbsp;Also, many of Bernie&rsquo;s supporters say that Biden is their 2nd choice, while Warren&rsquo;s supporters name Kamala Harris as their 2nd choice. &nbsp;</p>\r\n\r\n<p>So, if either one drops out, it&rsquo;s not certain that a substantial proportion of his or her supporters will support the other candidate.&nbsp;</p>\r\n\r\n<p>This article in the Washington Post delineates their differences succinctly: (<a href=\"https://www.washingtonpost.com/opinions/with-warren-and-sanders-its-regulation-vs-revolution/2019/06/12/9e279b4a-8d4f-11e9-8f69-a2795fca3343_story.html?utm_term=.8c59adbb16b4\" target=\"_blank\">more</a>)</p>\r\n', 'Elizabeth Warren and Bernie Sanders seem to agree on a lot of issuesâ€”Medicare for All, Â Free College, Â Taxing the Rich, Â Forgiving College Loan Debt and more. Â The two are in complete agreement that the system is currently rigged in favor of the rich and corporations. . Â So, what are the differences between the two?', 'the-difference-between-warren-and-sanders', ',21,', 1, 1, '2019-11-29 13:33:58', '2019-11-29 13:33:58'),
(33, 'Elizabeth Warrenâ€™s Brilliant Campaign', 1, 1, 1, '157503091039481.jpeg', '<p>Most people who have been following Elizabeth Warren&rsquo;s campaign would readily acknowledge that she has run an impressive campaign so far: &nbsp;From having been declared &ldquo;dead&rdquo; after the DNA test flap, she has come roaring back at a steady pace. By mid summer of 2019, she is polling either no. 2 or 3 (behind Biden and sometimes behind Bernie) in most Dem 2020 primary polls. &nbsp;David Axelrod, Obama&rsquo;s former campaign manager, asserts in this article, that her campaign is nothing short of &ldquo;strategically brilliant.&rdquo; &nbsp;</p>\r\n\r\n<p>Axelrod states: she has a clear, unambiguous message that is thoroughly integrated with her biography. That is essential to a successful campaign. (<a href=\"https://www.washingtonexaminer.com/news/top-obama-adviser-david-axelrod-elizabeth-warren-running-a-strategically-brilliant-campaign\" target=\"_blank\">more</a>)&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Most people who have been following Elizabeth Warrenâ€™s campaign would readily acknowledge that she has run an impressive campaign so far: Â From having been declared â€œdeadâ€ after the DNA test flap, she has come roaring back at a steady pace.', 'elizabeth-warrens-brilliant-campaign', ',21,', 1, 1, '2019-11-29 13:35:10', '2019-11-29 13:35:43'),
(34, 'The Impact of Michael Bloombergâ€™s Candidacy', 1, 1, 1, '157503109675399.jpeg', '<p>Michael Bloomberg, former mayor of New York City and multi-billionaire businessman, just announced that he will be running in the primaries as a Democratic Party candidate. &nbsp;This has a lot of Democrats vexed, or even distressed, because the most immediate impact, according to TV pundits, is that Bloomberg will be a threat to other moderate Democrats&mdash;namely Biden. &nbsp;And, by weakening the chances of Biden, it will only strengthen the hand of progressives like Warren and Sanders.</p>\r\n\r\n<p>Bloomberg&rsquo;s reason for running, according to those who know him well, is that he thinks Biden is too weak and may lose the Democratic Party nomination to a left liberal like Warren, who, in his opinion cannot win the general election against Trump. Bloomberg&rsquo;s strategy is to take over after Biden loses, or has a weak showing &nbsp;in early primary states like Iowa, New Hampshire, Nevada, and South Carolina. &nbsp;His advisors think that Biden will be so weakened after his weak showing in these states that he will momentum as his funding dries up. &nbsp;Bloomberg can then focus intensely on the Super Tuesday states and become the leading moderate Dem candidate going into the summer Democratic Party convention.</p>\r\n\r\n<p>While strong on gun control and climate change, Bloomberg is known for not supporting the #MeToo movement and for &ldquo;disparaging&rdquo; women&rsquo;s appearances. &nbsp;Also, he has no natural base aside from financiers on Wall Street. &nbsp;So, he has his work cut out for him in terms of appealing to members of his own party. &nbsp;(<a href=\"https://www.washingtonpost.com/opinions/bloomberg-has-a-narrow-path-to-winning-but-hell-sure-get-under-trumps-skin/2019/11/08/8699b6e8-024d-11ea-8501-2a7123a38c58_story.html\" target=\"_blank\">more</a>)</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', 'Michael Bloomberg, former mayor of New York City and multi-billionaire businessman, just announced that he will be running in the primaries as a Democratic Party candidate. Â This has a lot of Democrats vexed, or even distressed, because the most immediate impact, according to TV pundits, is that Bloomberg will be a threat to other moderate Democratsâ€”namely Biden.', 'the-impact-of-michael-bloombergs-candidacy', ',21,', 1, 1, '2019-11-29 13:38:16', '2019-11-29 13:38:16'),
(35, 'Is Elizabeth Warrenâ€™s Medicare-for-All Plan Feasible?', 1, 1, 1, '157503122374800.jpeg', '<p>Criticized by her fellow Democrats for not talking about how she plans to pay for a single-payer Medicare for all program and for insisting that under her plan, the middle class will not see higher taxes, Warren has responded by unveiling details about where the money for her Medicare for all &nbsp;plan would &nbsp;come from.</p>\r\n\r\n<p>To date (fall of 2019), Warren&rsquo;s Medicare for all plan is the most detailed of all the Democratic party candidates&rsquo; plans. &nbsp;Even Bernie, the author of a Senate Medicare for all bill, does not have a clearly-delineated Medicare for all &nbsp;payment plan and has indicated that his plan will require higher taxes for the middle class.</p>\r\n\r\n<p>Before we go &nbsp;into the specifics of Warren&rsquo;s Medicare for all payment plan, we need to remember that our current healthcare system is unsustainable: &nbsp;Medical costs are the number 1 reason for bankruptcy in America; compared to most developed countries, our per capita healthcare costs are significantly higher but health outcomes are worse (the infant mortality rate is higher in the U.S. and the average life span is shorter). &nbsp;Even Americans with insurance are often burdened with healthcare costs not covered by their private insurance companies.</p>\r\n\r\n<p>So, a single payer healthcare system that covers everyone, such as Medicare for all, is not a radical &ldquo;socialist&rdquo; proposal, and certainly should not be viewed as a pipe dream, especially since many developed, affluent &nbsp;countries &nbsp;have had such healthcare systems for decades&mdash;countries in which the quality of health care is higher and no one is forced into &nbsp;bankruptcy because of healthcare costs.</p>\r\n\r\n<p>This is how Warren proposes to pay for her Medicare for all program: &nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Employers that are now offering health care insurance will pay essentially the same amount in premiums &nbsp;to the government. &nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;States will pay the federal government what they are currently paying for state employees and Medicaid recipients</p>\r\n\r\n<p>There is an &#36;11 trillion additional cost after proceeds from the above two payment sources are accounted for. &nbsp;She proposes to pay for these additional costs through the following:</p>\r\n\r\n<p>&bull;&nbsp;&nbsp; &nbsp;A 6&#37; tax on the net worth of billionaires and for the top 1 percent of households, investment gains will be taxed annually instead of when stocks are sold.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;A 35&#37; total tax rate on U.S. corporations doing business overseas.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;More stringent tax enforcement&nbsp;<br />\r\n&bull;&nbsp;&nbsp; &nbsp;cutting military spending.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Pharmaceutical companies will receive about 30&#37; less than what Medicare pays currently.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Doctors&rsquo; pay would be cut to what Medicare pays currently<br />\r\n(reductions for specialists and small increases for primary care physicians)<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Hospitals will see about a 10&#37; increase in payments compared to what Medicare pays now. (<a href=\"https://www.nytimes.com/2019/11/01/us/politics/elizabeth-warren-medicare-for-all.html\" target=\"_blank\">more</a>)<br />\r\n<br />\r\n&nbsp;</p>\r\n', 'Criticized by her fellow Democrats for not talking about how she plans to pay for a single-payer Medicare for all program and for insisting that under her plan, the middle class will not see higher taxes, Warren has responded by unveiling details about where the money for her Medicare for all Â plan would Â come from.', 'is-elizabeth-warrens-medicare-for-all-plan-feasible', ',21,', 1, 1, '2019-11-29 13:40:23', '2019-11-29 13:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `election_central_categories`
--

CREATE TABLE `election_central_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `election_central_categories`
--

INSERT INTO `election_central_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(21, 'Democrats', 'democrats', 1, '2019-11-29 11:36:42', '2019-11-29 11:37:02'),
(22, 'Republicans', 'republicans', 1, '2019-11-29 11:36:56', '2019-11-29 11:36:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `election_central_comments`
--

CREATE TABLE `election_central_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `election_central_likes`
--

CREATE TABLE `election_central_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `environment_articles`
--

CREATE TABLE `environment_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `environment_articles`
--

INSERT INTO `environment_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(26, 'Birds Are Facing Extinction', 1, 1, 0, '157502898367933.jpeg', '<p>An earth without birds. No chirping sounds, no fluttering wings. Silence. Whether or not we can imagine a bird-less world, it&rsquo;s coming. According to a new study conducted by a team of university, government, and non-profit researchers, a world devoid of birds is our future, perhaps our near future.</p>\r\n\r\n<p>The study, published in the highly-respected journal, Science, surveyed 76 percent of all bird species (over 500 species) in the U.S. and Canada, a population that represents close to the entire population of birds in the world.</p>\r\n\r\n<p>What the team found shocked researchers: there are now almost 3 billion fewer birds than there were &frac12; a century ago. The number of birds in the U.S. and Canada alone has declined by almost 30 percent since 1970. The study underscored that this precipitous decline included even common birds such as sparrows, robins, and other common bird species.</p>\r\n\r\n<p>The key causes are habitat loss and pervasive pesticide usage. But the decimation of birds has ramifications that go beyond the extinction of other categories of wildlife. Referring to the massive loss of birds, Conservation biologist, Kevin Gaston, states: &ldquo;This is the loss of nature.&rdquo;</p>\r\n\r\n<p>Because common bird species constitute the foundation of whole ecosystems&mdash;through their activities as pest controllers, plant pollinators, seed spreaders, and forest regenerators&mdash;their precipitous decline means that nature is in peril.</p>\r\n\r\n<p>Hopefully, the public, especially bird watchers, nature lovers, and conservation organizations, will be able to launch a full-scale movement to make the earth more bird-friendly. Stopping the extinction of birds will require a large scale political movement on the part of concerned citizens around the world. Without such a movement, not only are birds doomed, but the end of nature will be here soon, perhaps sooner than the most pessimistic experts had predicted. (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/09/19/science/bird-populations-america-canada.html\" target=\"_blank\">https://www.nytimes.com/2019/09/19/science/bird-populations-america-canada.html</a></p>\r\n', 'An earth without birds.  No chirping sounds, no fluttering wings.  Silence.   Whether or not we can imagine a bird-less world, itâ€™s coming. ', 'birds-are-facing-extinction', ',21,', 1, 1, '2019-11-29 13:03:03', '2019-11-29 13:03:03'),
(27, 'Endangered Species Act Significantly Undermined', 1, 1, 0, '157502905681005.jpeg', '<p>The Environmental Protection Agency (EPA) has taken a first step towards weakening the 1973 Endangered Species Act.</p>\r\n\r\n<p>The new regulations will make it much easier to remove species from the Endangered Species list, and current wildlife on the threatened species list (one step down from Endangered Species) will not be as well protected as they are now. Also, the effects of climate change on habitats will not receive much weight when decisions are being made regarding logging, land use, etc.</p>\r\n\r\n<p>This is all to say that these new regulations are meant to pave the way for clearcutting (deforestation), oil/gas exploitation, and housing developments. (more)</p>\r\n\r\n<p><a href=\"https://www.vox.com/science-and-health/2019/8/12/20802132/endangered-species-act-trump-weakening\" target=\"_blank\">https://www.vox.com/science-and-health/2019/8/12/20802132/endangered-species-act-trump-weakening</a></p>\r\n', 'The Environmental Protection Agency (EPA) has taken a first step towards weakening the Endangered Species Act.', 'endangered-species-act-significantly-undermined', ',21,', 1, 1, '2019-11-29 13:04:16', '2019-11-29 13:04:25'),
(28, 'Car Companies:  The Bad and the Good', 1, 1, 1, '157502917544065.jpeg', '<p>While Toyota is famous for its &ldquo;green&rdquo; hybrid Prius, a recent action they took will lead to increased carbon emissions from cars, perhaps significantly. &nbsp;Toyota, GM, Subaru, Chrysler , Nissan, Hyundai, Mazda, and Kia have sided with the Trump administration in its attack on California&rsquo;s much more stringent &nbsp;carbon emissions standards.</p>\r\n\r\n<p>The Trump administration has gone to war with California &nbsp;over its &nbsp;much stricter tailpipe emissions standards, and auto companies are taking sides, with Toyota, together with, GM, Subaru, Chrysler, Nissan, Hyundai, Mazda, and Kia filing a legal brief (on October 28th) that supports the Trump administration. By doing this in the ongoing lawsuit that pits California against the Trump administration, they are signaling their opposition to the stricter standards that California is fighting for. &nbsp;The companies tried to sugarcoat this act by saying that they are merely supporting uniform standards. &nbsp;</p>\r\n\r\n<p>On the other side, 4 auto companies, Ford, Honda, BMW, and Volkswagon have signed an agreement with California agreeing to follow the state&rsquo;s much stricter standards. &nbsp;Mercedes has indicated that it is on the verge of signing on to California&rsquo;s emissions requirements.</p>\r\n\r\n<p>California was given the right &nbsp;to set its &nbsp;own clean air standards back in 1970 &nbsp;when the state &nbsp;received &nbsp;a legal &ldquo;waiver&rdquo; by the EPA under the 1970 Clean Air Act. &nbsp;This legal waiver allowed California &nbsp;to set tougher state-level standards than those set by the federal government. &nbsp;Since then, 14 states and the District of Columbia have been following California&rsquo;s more stringent tailpipe emissions standards. &nbsp;They are the following: &nbsp;Colorado, Connecticut, Delaware, Maine, Maryland, Massachusetts, New Jersey, New Mexico (2011 model year and later), New York, Oregon, Pennsylvania, Rhode Island, Vermont, and Washington, as well as the District of Columbia.</p>\r\n\r\n<p>&nbsp;Consumers shopping for cars should decide whether they will vote with their dollars. &nbsp;If you are pro-environment and are worried about &nbsp;climate change, then buy a Ford, Honda, BMW, or Volkswagon. &nbsp;If you want to support the Trump administration, you know the car companies to go to. &nbsp; (<a href=\"https://www.latimes.com/business/story/2019-10-29/automakers-trump-emissions\" target=\"_blank\">more</a>)</p>\r\n', 'Toyota, GM, Subaru, Chrysler , Nissan, Hyundai, Mazda, and Kia have sided with the Trump administration in its attack on Californiaâ€™s much stricter carbon emissions standards.', 'car-companies-the-bad-and-the-good', ',21,', 1, 1, '2019-11-29 13:06:15', '2019-11-29 13:06:15'),
(29, 'Cutting Down Trees is NOT A Solution to Wildfires', 1, 1, 1, '157502942462167.jpeg', '<p>By Tina Zeng, Sierra Club Loma Prieta Chapter Youth Columnist</p>\r\n\r\n<h3><strong>Wildfires, &nbsp;Human Triggers, and Climate Change</strong></h3>\r\n\r\n<p>Fires are a natural part of the cycle of California forests; they help clean the forest floor and &nbsp;renew the soil with nutrients. In fact, through the grand sweep of time, forest ecosystems have proven to be able to withstand fire. Currently, however, ninety percent of fires are not natural as they are caused by humans: Roughly, of the 7,500 wildfires started in 2018, 1.8 million acres burned, and 22,700 structures were destroyed&mdash;forests are burning more and longer than in the past. Why? Well, a lot of factors, but mostly it is due to climate change and fire triggers caused by humans.</p>\r\n\r\n<p>As we all know, climate change is heating up the earth. With this heat comes less moisture in the air&mdash;the less atmospheric moisture, the easier it is for sparks or embers from a power line or campfire to start burning. The combination of less moisture in the air caused by warmer temperatures &nbsp;means dryer vegetation, which significantly increases the length of the fire season when the forest is most vulnerable. Ten years ago, the fire season was eighty days shorter than it is now. In fact, currently, a yearlong fire season is becoming increasingly likely. &nbsp; Also, with climate change, nights are no longer as cold as they once were. As nights become warmer, fires are more likely to burn throughout the night and intensify. &nbsp;In the past, with cooler nighttime temperatures, fires diminished at night and the overall intensity and duration of fires were much more subdued. &nbsp;</p>\r\n\r\n<h2><strong>Fire Prevention, PG &amp; E, and What Should be Done</strong></h2>\r\n\r\n<p>It is clear to all experts that wildfires cannot be reduced to the levels of decades ago, given the backdrop of our warming planet and reduced moisture in the air. &nbsp;But one major category of human-caused triggers can be significantly reduced&mdash;fires caused by downed power lines and other malfunctioning of transmission equipment. In fact, it has been determined that 17 of the 21 major wildfires in 2017 in Northern California were caused by malfunctioning of &nbsp;PG &amp; E&rsquo;s power lines, poles, and other equipment.</p>\r\n\r\n<p>Despite its role in causing wildfires, PG &amp; E&rsquo;s response to fire prevention has been completely ineffective. &nbsp;Rather than upgrading inadequate infrastructure, the company has &nbsp;been &nbsp;continuing a tree and vegetation removal program. It is vital to note that tree-thinning will not reduce the impact of wildfires.&nbsp;</p>\r\n\r\n<p>An example that proves this point is the 2018 Camp Fire&mdash;also known as the fire that decimated &nbsp;Paradise, CA. &nbsp;It was&nbsp;the most lethal and destructive wildfire in California &nbsp;history. &nbsp;It was not triggered &nbsp;by the massive burning of trees or grass but instead, experts now all agree that it was most likely caused by a downed PG &amp; E transmission wire or malfunctioning PG &amp; E equipment, just like in many of the deadliest fires in California in recent years. &nbsp;That the fire was NOT caused by burning trees that spread rapidly from tree to tree is borne out by the fact that the trees surrounding many burnt houses were still green at the top despite the entire neighborhood being in ruins. Clearly, the trees were not the root cause of the rapid spread of the fire. Flying embers&mdash;many generated by materials from burnt houses&mdash;blown by strong winds traveled rapidly through the air, spreading the fire by igniting everything in their path. &nbsp; In fact, &ldquo;fuel breaks&rdquo; (areas with very little vegetation used to curb fires) were completely useless against the strong winds in Paradise, winds &nbsp;that blew sparks and embers onward and into houses instead of tree-thinning, PG &amp; E should be upgrading its infrastructure. In fact, half of the most destructive Californian fires are caused by power lines. Imagine this: sagging power lines slap against each other and create sparks; the sparks fly down and begin burning. Or this: a tree falls on a distribution line, causing sparks and igniting a fire.&nbsp;</p>\r\n\r\n<p>There are, however, many ways to eliminate or mitigate this risk: the most expensive but most effective is undergrounding. This method would eliminate power lines altogether&#33; After all, many fire accidents would be impossible without lines to start them. Another approach is protecting the power lines through insulation. Another company, the SDG&amp;E (San Diego Gas &amp; Electric), completely protected all their power lines through insulating them. Even if two wires hit each other, the insulation would not allow any sparks to fly. Currently, however, PG&amp;E has not taken any of these measures on a large enough scale to make a difference&mdash;many lines are completely exposed wires, ready to spark at any time.&nbsp;</p>\r\n\r\n<p>A third approach is to bring the power closer to home, a practice often referred to as &ldquo;distributive power.&rdquo; &nbsp;If cities had their own energy generation infrastructures, power would not have to travel far; this would decrease the need for many lines. No matter what strategy is employed, something must be done, because in the current situation, we&rsquo;re practically begging for more fires to burn up our communities and forest.&nbsp;</p>\r\n\r\n<h3><strong>Preventing Wildfire Damage to Homes</strong></h3>\r\n\r\n<p>So what can be done to prevent houses from bursting into flame? To start, we should stop building houses in fire-prone areas and retrofit those that are already there. There are seven areas that are &nbsp;most important when fireproofing a house: roofs, vents, doors, fences, exterior siding, windows, and decks. The key is to keep any sparks outside of the house because if let in, everything will begin to ignite. Roofs should be fireproof, not wooden or made with flammable material, either in the shingles or between shingles. They should also be carefully maintained to clear away all combustible materials. Otherwise, the roof could burn up and allow lots of sparks and fire into the house. Also, vents need to be thick enough to block out sparks. Doors should not be solid wood and pet doors should be magnetic or have auto-locks. &nbsp;Plastic should be avoided as it will melt and allow sparks to fly in. Only low-growing vegetation should be grown underneath windows or they will cause the window to burn and let the fire into the house. Also, skylights could be easily burned through to let fire in. Wooden decks are common in the Bay Area, but ideally, they should not be attached to the house and should not have vegetation surrounding it. To learn more about how to fireproof a house, reach out to your local fire marshal.</p>\r\n\r\n<h3><strong>Summary</strong></h3>\r\n\r\n<p>Cutting down trees and forests will not stop wildfires. To reduce the likelihood of wildfires and to minimize the damage, we must pressure utilities like PG &amp; E to fireproof their transmission lines and upgrade their infrastructure, protect our homes, and begin building local power generation facilities. &nbsp;Finally, most important of all, we must fight climate change and ensure that California will not become increasingly hotter and drier until our forests are in extreme danger year-round&mdash;or worse, there may be no forest left at all.&nbsp;<br />\r\n&nbsp;</p>\r\n', 'Instead of tree-thinning, PG &amp; E should be upgrading its infrastructureâ€¦', 'cutting-down-trees-is-not-a-solution-to-wildfires', ',21,', 1, 1, '2019-11-29 13:10:25', '2019-11-29 13:10:25'),
(30, 'Local Climate Actions Are Critical', 1, 1, 1, '157502951623373.jpeg', '<p>Actions to combat climate change need to focus much more on local actions. &nbsp;Protecting open spaces, wetlands, wildlife, ecosystems, and getting local municipalities to prioritize transit-oriented housing and green building codes are all key actions that all of us can participate in. &nbsp;</p>\r\n\r\n<p>It has always been important to take local actions, but it is especially important now because the Trump administration has rolled back many environmental protection regulations (in particular limits on carbon emissions) given the green light to fossil fuel companies, and has started the process of withdrawing from the Paris Agreement. &nbsp;The U.S. had promised to reduce greenhouse gas emissions by about 25&#37; by 2025, from 2005 levels, a goal that will definitely not be reached.&nbsp;</p>\r\n\r\n<p>But we should not despair.&nbsp;Take action wherever you live&#33;<br />\r\nThe Sierra Club in the SF Bay Area is actively engaged in local climate actions. &nbsp;These are some of the key actions members are undertaking in late 2019 through 2020: &nbsp;&nbsp; &nbsp;</p>\r\n\r\n<p><strong>They are lobbying local city councils and county governments to do the following:</strong><br />\r\n1.&nbsp;&nbsp; &nbsp;Declare a state of climate emergency. &nbsp;(more)<br />\r\n2.&nbsp;&nbsp; &nbsp;Adopt aggressive green building codes to expedite the process of transitioning away from fossil fuels (gas) through electrification.<br />\r\n3.&nbsp;&nbsp; &nbsp;Divestment: Stop investing government funds in the stocks and bonds of fossil fuel companies and related entities.<br />\r\n4.&nbsp;&nbsp; &nbsp;Stop allowing developers to destroy valuable ecosystems (such as San Francisco Bay) by building on them.</p>\r\n\r\n<p>You can participate by contacting your local Sierra Club office, or by working with other groups such as 350.org.</p>\r\n\r\n<p>Link for Sierra Club: &nbsp; <a href=\"https://www.sierraclub.org/Â \" target=\"_blank\">https://www.sierraclub.org/&nbsp;</a></p>\r\n\r\n<p>Link for 350.org: &nbsp; &nbsp;<a href=\"https://350.org/\" target=\"_blank\">https://350.org/</a><br />\r\n&nbsp;</p>\r\n', 'Actions to combat climate change need to focus much more on local actions.  ', 'local-climate-actions-are-critical', ',21,', 1, 1, '2019-11-29 13:11:56', '2019-11-29 13:11:56'),
(31, 'Climate Change, Fish Migration, and Political Conflict', 1, 85, 1, '157627178922412.jpeg', '<p>As our planet heats up, fish are migrating north, spurring conflict between nations, especially among those that depend on fishing for a substantial proportion of their GDP.&nbsp;</p>\r\n\r\n<p>Iceland, a nation whose fortunes rise and fall with their fishing industry, has been noticing that fish that used to inhabit waters around Iceland, are disappearing and being replaced by fish from warmer waters.&nbsp; For example, capelin used to be a staple fish for Icelandic fisheries, but they have moved farther north and are being replaced by fish such as mackerel and monkfish from the south.&nbsp;</p>\r\n\r\n<p>Conflict has been heating up in recent years between Iceland, Norway, the Faroe Islands and the European Union over mackerel, but a consensus was never reached because Iceland, whose waters mackerel have been migrating to, simply declared their long-standing exclusive fishing rights and ignored complaints lodged by the other nations.</p>\r\n\r\n<p>The worst consequence of the massive migration of fish to the north is that southern waters are increasingly devoid of fish altogether.&nbsp; African nations like Ghana and Nigeria, who obtain&nbsp; 70&#37; of their protein from fish according to the Food and Agriculture Organization, will soon see mass outflows of people moving north in search of food.</p>\r\n\r\n<p>The countries that are least responsible for the carbon emissions that gave us climate change will most likely suffer its negative effects the most. (<a href=\"https://www.nytimes.com/2019/11/29/climate/climate-change-ocean-fish-iceland.html\">more</a>)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'As our planet heats up, fish are migrating north, spurring conflict among nations.', 'climate-change-fish-migration-and-political-conflict', ',21,', 1, 1, '2019-12-14 10:16:30', '2019-12-14 10:27:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `environment_categories`
--

CREATE TABLE `environment_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `environment_categories`
--

INSERT INTO `environment_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(21, 'Environment', 'environment', 1, '2019-11-29 10:58:26', '2019-11-29 10:58:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `environment_comments`
--

CREATE TABLE `environment_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `environment_likes`
--

CREATE TABLE `environment_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_articles`
--

CREATE TABLE `film_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `film_rating` float DEFAULT NULL,
  `ISBN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` year(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `film_articles`
--

INSERT INTO `film_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `link`, `featured_image`, `film_rating`, `ISBN`, `year`, `description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(38, 'Polishing up the Reef Tank at Home 35,252 views', 1, 1, 0, 'https://www.youtube.com/watch?v=nSOIZNc0ZNs', '154870100081593.png', NULL, NULL, 2018, '<p>Reef Builders is the source for all your reef aquarium news - the latest on exotic fish, rare corals and hot new aquarium gear. Visit the website: <a href=\"https://www.youtube.com/redirect?redir_token=61AxPp2C_U7J9OYJgrERa0zfH3l8MTU0ODc4NzMwMEAxNTQ4NzAwOTAw&amp;q=http&#37;3A&#37;2F&#37;2FReefBuilders.com&amp;event=video_description&amp;v=nSOIZNc0ZNs\" rel=\"nofollow\">http://ReefBuilders.com</a></p>\r\n\r\n<p>Follow on InstaGram @reefbuilders</p>\r\n\r\n<p>Come to the conference: <a href=\"https://www.youtube.com/redirect?redir_token=61AxPp2C_U7J9OYJgrERa0zfH3l8MTU0ODc4NzMwMEAxNTQ4NzAwOTAw&amp;q=http&#37;3A&#37;2F&#37;2FReefStock.Show&amp;event=video_description&amp;v=nSOIZNc0ZNs\" rel=\"nofollow\">http://ReefStock.Show</a></p>\r\n\r\n<p>Send analog mail to: Jake Adams&nbsp; P.O.&nbsp;Box&nbsp;467&nbsp; Golden CO 80402</p>\r\n', 'polishing-up-the-reef-tank-at-home-35-252-views', ',41,', 1, 1, '2019-01-29 07:43:22', '2019-03-04 17:31:17'),
(39, 'Top 5 LPS Corals for Beginners', 0, 1, 0, 'https://www.youtube.com/watch?v=SLjjJG8zn1c', '154884037416148.png', NULL, NULL, 2018, '<p>The much awaited Top 5 LPS Corals for Beginners list. Mixed in are some care tips for corals and what to look for in corals if you are just starting out in the reef keeping hobby. <a href=&quot;https://www.youtube.com/results?search_query=&#37;23tidalgardens&quot;>#tidalgardens</a> <a href=&quot;https://www.youtube.com/results?search_query=&#37;23coral&quot;>#coral</a> <a href=&quot;https://www.youtube.com/results?search_query=&#37;23lpscoral&quot;>#lpscoral</a> <a href=&quot;https://www.youtube.com/results?search_query=&#37;23lps&quot;>#lps</a> <a href=&quot;https://www.youtube.com/results?search_query=&#37;23stonycorals&quot;>#stonycorals</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Copyright Information: This video was shot and edited by Tidal Gardens. Tidal Gardens owns all intellectual property rights to this content.</p>\r\n', 'top-5-lps-corals-for-beginners', ',0,', 1, 1, '2019-01-30 10:26:16', '2019-02-17 06:56:45'),
(40, 'Filming Wildlife : Behind The Scenes', 0, 1, 0, 'https://www.youtube.com/watch?v=ZM0uEBZoYD8', '155008869114805.png', NULL, NULL, 2017, '<p>This is the video description content.</p>\r\n', 'filming-wildlife-behind-the-scenes', ',0,', 1, 1, '2019-02-14 09:11:32', '2019-02-17 06:56:45'),
(41, 'A Certain Kind of Death', 62, 1, 0, 'https://www.youtube.com/watch?v=ErooOhzE268', '155038723179295.png', NULL, NULL, 2012, '<p>Unblinking and unsettling, this documentary lays bare a mysterious process that goes on all around us - what happens to people who die with no next of kin.</p>\r\n\r\n<p>Dead bodies in various stages of decomposition are seen, but not played for shock factor. Instead, you learn a little about each person, both what they were before death and what will happen to them afterward. They are followed from the discovery of the body to the final disposition of the remains, and each step in between.&nbsp;(Youtube)</p>\r\n', 'a-certain-kind-of-death', ',0,', 1, 1, '2019-02-17 08:07:13', '2019-02-17 08:07:13'),
(42, 'The Extraordinary Genius of Albert Einstein', 1, 1, 0, 'https://www.youtube.com/watch?v=Uvpw6Jh1WGQ', '155038761125003.png', NULL, NULL, 2015, '<p>The Extraordinary Genius of Albert Einstein - Full Documentary HD</p>\r\n\r\n<p>The core of the video is a workshop pedagogical on the Theory of Special Relativity as part of the educational process conducted by our youth leadership, not for the sake of understanding the theory itself, but using Einstein&#39;s particular discovery as a case study to demonstrate and walk people through real human thinking, as being something above sense perceptions or opinions.</p>\r\n\r\n<p>We end with reflecting on the principle of relativity in terms of social relations and individual identities or thought processes, asking the question --how was Einstein able to make his breakthrough?</p>\r\n\r\n<p>Einstein&#39;s personality, his method of thinking, and his theories. Our &quot;narrow path&quot; has led us primarily through Kepler, Fermat, Leibniz, Gauss, and Riemann; all representing a higher potential of man&#39;s creativity, who contributed to distinct up-shifts in human knowledge. Our mission in presenting such material is to provide an example of how a mind overcomes the variable and false nature of the senses to discover true invariant principles.</p>\r\n\r\n<p>In reliving these ideas for one&#39;s self, each person gets a chance to become acquainted with what separates them from an animal, their own innate creativity. These mental exercises are not only intended to improve one&#39;s knowledge in history, science, and culture, but are intended to help one&#39;s understanding generally in economics, politics, and beyond. (youtube.com)</p>\r\n', 'the-extraordinary-genius-of-albert-einstein', ',58,', 1, 1, '2019-02-17 08:13:32', '2019-03-04 17:30:58'),
(43, 'The Family that Walks on All Fours', 1, 1, 0, 'https://www.youtube.com/watch?v=094qMovHark', '155038785083585.png', NULL, NULL, 2015, '<p>The Family That Walks On All Fours is a BBC Two documentary that explored the science and the story of five individuals in the Ulas family, a Kurdish family in Southeastern Turkey that walk with a previously unreported quadruped gait. (wilipedia.org)</p>\r\n', 'the-family-that-walks-on-all-fours', ',46,62,', 1, 1, '2019-02-17 08:17:31', '2019-03-04 17:29:29'),
(44, 'The Secret Life of Isaac Newton', 1, 1, 0, 'https://www.youtube.com/watch?v=xq98FbsEhaM', '155038802267023.png', NULL, NULL, 2015, '<p>When an Englishman buys many of Sir Isaac Newton&#39;s journals, he spends years decoding them and discovers a secretive side to the great genius. Apart from inventing calculus, outlining the laws of gravity, writing treatises on optics and the properties of color, and other brilliant scientific discoveries, Newton also practiced alchemy and was a disbeliever in the divinity of Christ (a criminal offense in his time.) He also proved to be a secretive man, who kept many of his thoughts to himself for many years, possibly afraid of the criticism he couldn&#39;t abide. Ron Kerrigan IMDB</p>\r\n', 'the-secret-life-of-isaac-newton', ',47,', 1, 1, '2019-02-17 08:20:24', '2019-03-04 17:30:39'),
(46, 'Greatest Love Songs of 70s, 80s, and 90s', 55, 1, 0, 'https://www.youtube.com/watch?v=w6lal2E56gc', '155038828850734.png', NULL, NULL, 2018, '<p>Relaxing Beautiful Love Songs 70s 80s 90s Playlist - Greatest Hits Love Songs Ever</p>\r\n', 'greatest-love-songs-of-70s-80s-and-90s', ',0,', 1, 1, '2019-02-17 08:24:49', '2019-02-17 08:24:49'),
(47, 'Greatest  Hits,  50s, 60s, 70s', 55, 1, 0, 'https://www.youtube.com/watch?v=dQ2dnzhFD6Y', '155038838790670.png', NULL, NULL, 2018, '<p>Stand By Me, Sound of Silence, There Ain&rsquo;t No Sunshine, Dream Lover and many more..</p>\r\n', 'greatest-hits-50s-60s-70s', ',0,', 1, 1, '2019-02-17 08:26:28', '2019-02-17 08:26:28'),
(48, 'Elvis Presley  Greatest Hits', 55, 1, 0, 'https://www.youtube.com/watch?v=RLU9M5BUu8A', '155038861581291.png', NULL, NULL, 2018, '<p>Elvis Presley Greatest Hits Full Album | The Very Best Of Elvis Presley</p>\r\n', 'elvis-presley-greatest-hits', ',0,', 1, 1, '2019-02-17 08:30:17', '2019-02-17 08:30:17'),
(51, 'John Denver Greatest Hits', 1, 1, 1, 'https://www.youtube.com/watch?v=xefc4CdNWFY', '155038908235478.png', NULL, NULL, 2017, '<p>John Denver Playlistâ™ªáƒ¦â™«John Denver Greatest Hitsâ™ªáƒ¦â™«Best Songs Of John Denver</p>\r\n', 'john-denver-greatest-hits', ',41,43,', 1, 0, '2019-02-17 08:38:03', '2019-11-13 16:24:42'),
(53, 'Plutocracy:  Political Repression in America', 1, 1, 1, 'https://www.youtube.com/watch?v=gohal9CW7t0', '155038927270674.png', NULL, NULL, 2015, '<p>Income inequality has become a key hot button issue in the modern day political spectrum. While these economic and class divides seem more pronounced than ever before, the impressive new documentary Plutocracy: Political Repression in the USA reveals that the core of these struggles pre-date the beginnings of the industrialized labor force. The long and painful journey towards achieving worker rights and fair wages has been marked by violence, discrimination, and inhumane exploitation. (topdocumentaryfilms.org)</p>\r\n', 'plutocracy-political-repression-in-america', ',41,44,47,', 1, 0, '2019-02-17 08:41:14', '2019-11-13 16:24:31'),
(54, 'Disobedience:  The Courage to Break Free', 1, 1, 0, 'https://www.youtube.com/watch?v=Tdtc7ltYB8E', '155038940957480.png', NULL, NULL, 2016, '<p>Disobedience is a new film about a new phase of the climate movement: courageous action that is being taken on the front lines of the climate crisis on every continent, led by regular people fed up with the power and pollution of the fossil fuel industry. (FilmsforAction.org)</p>\r\n', 'disobedience-the-courage-to-break-free', ',44,47,49,', 1, 1, '2019-02-17 08:43:30', '2019-03-04 17:28:52'),
(55, 'A Simpler Way', 1, 1, 1, 'https://www.youtube.com/watch?v=XUwLAvfBCzw', '155038958643201.png', NULL, NULL, 2016, '<p>A Simpler Way: Crisis as Opportunity is a free feature-length documentary that follows a community in Australia who came together to explore and demonstrate a simpler way to live in response to global crises. Throughout the year the group build tiny houses, plant veggie gardens, practice simple living, and discover the challenges of living in community. This film is the product of hours and hours of footage that I shot during that year-long experiment in simple living. The documentary includes interviews with David Holmgren, Helena Norberg-Hodge, Nicole Foss, Ted Trainer, Graham Turner, and more. (YouTube)</p>\r\n', 'a-simpler-way', ',43,46,51,53,', 1, 0, '2019-02-17 08:46:28', '2019-11-13 16:31:39'),
(56, 'Earthlings', 1, 1, 0, 'https://www.youtube.com/watch?v=aEdCA67rD9M', '155038976044210.png', NULL, NULL, 2018, '<p>&quot;Using hidden cameras and never-before-seen footage, Earthlings chronicles the day-to-day practices of the largest industries in the world, all of which rely entirely on animals for profit.&quot; (IMDB)</p>\r\n', 'earthlings', ',46,51,52,', 1, 1, '2019-02-17 08:49:21', '2019-03-04 17:28:21'),
(57, 'Wisconsin Death Trip', 1, 1, 0, 'https://www.youtube.com/watch?v=KXLnnvaNd9E', '155038995499681.png', NULL, NULL, 2018, '<p>A series of grisly events that took place in Black River Falls, Wisconsin, between 1890 and 1900 are dramatized. (IMDB)</p>\r\n', 'wisconsin-death-trip', ',42,45,49,', 1, 1, '2019-02-17 08:52:36', '2019-03-04 09:40:42'),
(58, 'A Murder in the Family', 1, 1, 0, 'https://www.youtube.com/watch?v=vABOFleXLJQ', '155039006897618.png', NULL, NULL, 2016, '<p>Exploration of the murder of an English businessman in the Phillipines</p>\r\n', 'a-murder-in-the-family', ',43,46,49,', 1, 1, '2019-02-17 08:54:29', '2019-03-04 09:40:47'),
(59, 'The Century of the Self', 1, 1, 0, 'https://www.youtube.com/watch?v=eJ3RzGoQC4s', '155039025325362.png', NULL, NULL, 2015, '<p>The Century of the Self, written and produced by Adam Curtis, is an exhaustive examination of Sigmund Freud&rsquo;s theories on human desire, and how they&#39;re applied to platforms such as advertising, consumerism and politics. This four-hour odyssey is divided into four distinct segments.</p>\r\n\r\n<p>1. Happiness Machines.</p>\r\n\r\n<p>2. The Engineering of Consent.</p>\r\n\r\n<p>3. There is a Policeman Inside All of Our (topdocumentaryfilms.com)</p>\r\n\r\n<p>The Century of the Self, written and produced by Adam Curtis, is an exhaustive examination of Sigmund Freud&rsquo;s theories on human desire, and how they&#39;re applied to platforms such as advertising, consumerism and politics. This four-hour odyssey is divided into four distinct segments.</p>\r\n\r\n<p>1. Happiness Machines.</p>\r\n\r\n<p>2. The Engineering of Consent.</p>\r\n\r\n<p>3. There is a Policeman Inside All of Our (topdocumentaryfilms.com)</p>\r\n', 'the-century-of-the-self', ',47,', 1, 1, '2019-02-17 08:57:35', '2019-11-27 14:05:07'),
(60, 'The Next Black', 1, 1, 0, 'https://www.youtube.com/watch?v=XCsGLWrfE4Y', '155039035893283.png', NULL, NULL, 2014, '<p>The Next Black is a film that explores the future of fashion. While that is a large and overarching concept, each facet of exploration awakens things you probably haven&rsquo;t even considered like what it truly means to be sustainable, how technology is aiding us, and why the industry is a leading producer of pollutants in the world.(highsnobiety)</p>\r\n', 'the-next-black', ',43,46,50,', 1, 1, '2019-02-17 08:59:19', '2019-11-27 14:04:53'),
(61, 'The Secret Life of the Brain:  The Aging Brain: Through Many Lives. ', 1, 1, 0, 'https://www.youtube.com/watch?v=d-8NmkSfM-8', '157361313547445.png', NULL, NULL, 2016, '<p>The Secret Life of the Brain, a David Grubin Production, reveals new findings on brain development through the life cycle--from babyhood through childhood and the teenage years to the long span of adult years, and finally, to the last decades of life. &nbsp;</p>\r\n\r\n<p>In this five-part series, cutting edge information is introduced by neuroscience researchers and human stories are presented to engage lay audiences. Many of your previous notions of the brain will be overturned. &nbsp;This is a fascinating film that will keep you riveted.</p>\r\n', 'the-secret-life-of-the-brain-the-aging-brain-through-many-lives', ',61,', 1, 1, '2019-11-13 15:45:37', '2019-11-13 15:45:37'),
(62, 'The Secret Life of the Brain:  The Adult Brain: To Think by Feeling', 1, 1, 0, 'https://www.youtube.com/watch?v=G5-HTuRGMmk', '157361335916806.png', NULL, NULL, 2016, '<p>The Secret Life of the Brain, a David Grubin Production, reveals new findings on brain development through the life cycle--from babyhood through childhood and the teenage years to the long span of adult years, and finally, to the last decades of life. &nbsp;</p>\r\n\r\n<p>In this five-part series, cutting edge information is introduced by neuroscience researchers and human stories are presented to engage lay audiences. Many of your previous notions of the brain will be overturned. &nbsp;This is a fascinating film that will keep you riveted.<br />\r\n&nbsp;</p>\r\n', 'the-secret-life-of-the-brain-the-adult-brain-to-think-by-feeling', ',61,', 1, 1, '2019-11-13 15:49:21', '2019-11-13 15:49:21'),
(63, 'The Secret Life of the Brain:  The Teenage Brain: A World of Their Own', 1, 1, 0, 'https://www.youtube.com/watch?v=FGaz_fHLHNU', '157361347968070.png', NULL, NULL, 2016, '<p>The Secret Life of the Brain, a David Grubin Production, reveals new findings on brain development through the life cycle--from babyhood through childhood and the teenage years to the long span of adult years, and finally, to the last decades of life. &nbsp;</p>\r\n\r\n<p>In this five-part series, cutting edge information is introduced by neuroscience researchers and human stories are presented to engage lay audiences. Many of your previous notions of the brain will be overturned. &nbsp;This is a fascinating film that will keep you riveted.<br />\r\n&nbsp;</p>\r\n', 'the-secret-life-of-the-brain-the-teenage-brain-a-world-of-their-own', ',61,', 1, 1, '2019-11-13 15:51:21', '2019-11-13 15:51:21'),
(64, 'The Secret Life of the Brain:  The Child&#039;s Brain: Syllable from Sound', 1, 1, 0, 'https://www.youtube.com/watch?v=DK4NhmY5bK0', '157361363430486.png', NULL, NULL, 2002, '<p>The Secret Life of the Brain, a David Grubin Production, reveals new findings on brain development through the life cycle--from babyhood through childhood and the teenage years to the long span of adult years, and finally, to the last decades of life. &nbsp;</p>\r\n\r\n<p>In this five-part series, cutting edge information is introduced by neuroscience researchers and human stories are presented to engage lay audiences. Many of your previous notions of the brain will be overturned. &nbsp;This is a fascinating film that will keep you riveted.<br />\r\n&nbsp;</p>\r\n', 'the-secret-life-of-the-brain-the-childs-brain-syllable-from-sound', ',61,', 1, 1, '2019-11-13 15:53:55', '2019-11-13 15:53:55'),
(65, 'The Secret Life of the Brain:  A Babyâ€™s Brain', 1, 1, 1, 'https://www.youtube.com/watch?v=U0L0mYi_ftc', '157361377059989.png', NULL, NULL, 2002, '<p>The Secret Life of the Brain, a David Grubin Production, reveals new findings on brain development through the life cycle--from babyhood through childhood and the teenage years to the long span of adult years, and finally, to the last decades of life. &nbsp;</p>\r\n\r\n<p>In this five-part series, cutting edge information is introduced by neuroscience researchers and human stories are presented to engage lay audiences. Many of your previous notions of the brain will be overturned. &nbsp;This is a fascinating film that will keep you riveted.<br />\r\n&nbsp;</p>\r\n', 'the-secret-life-of-the-brain-a-babys-brain', ',61,', 1, 1, '2019-11-13 15:56:11', '2019-11-13 15:56:11'),
(67, 'The Dark Side of Tolum', 1, 1, 1, 'https://www.youtube.com/watch?v=izKoyIfDI3w', '157361409927095.png', NULL, NULL, 2019, '<p>Tulum, Mexico &nbsp;a city rich in history and environmental wonders&mdash;such as earth&rsquo;s largest underground river, Mayan ruins, large barrier reefs, and stunning landscapes &mdash;is now on the brink of &nbsp;ecological disaster.</p>\r\n\r\n<p>This film examines how this paradise turned into a heavily-polluted place full of not just tourists and new buildings springing up every day, but also the detritus that developers&rsquo; greed and hordes of tourists usually leave in their wake.<br />\r\n&nbsp;</p>\r\n', 'the-dark-side-of-tolum', ',50,', 1, 1, '2019-11-13 16:01:41', '2019-11-13 16:01:41'),
(68, 'Children Full of Life', 1, 1, 1, 'https://www.youtube.com/watch?v=1tLB1lU-H0M', '157361438651519.png', NULL, NULL, 2012, '<p>Mr. Kanamori, a teacher of a 4th grade class in Northeast Tokyo, teaches his students not only how to be students, but how to live. He gives them lessons on teamwork, community, the importance of openness, how to cope, and the harm caused by bullying. The class goal is how to live a happy life and how to care for other people.</p>\r\n', 'children-full-of-life', ',49,', 1, 1, '2019-11-13 16:06:27', '2019-11-13 16:06:27'),
(69, 'Making Dogs Happy   ', 1, 1, 1, 'https://www.youtube.com/watch?v=DjEVYsh-Gv8', '157361447636839.png', NULL, NULL, 2016, 'A fascinating  documentary about dog behavior, Making Dogs Happy, a production of Australiaâ€™s ABC-TV Catalyst series, will educate and entertain all dog lovers.  Three dog owners are partnered with canine specialists over a period of 2 weeks.  They work together by meeting challenges, and by the end of the course, the owners understand their dogs on a much deeper level .  A must watch for dog owners&#33;', 'making-dogs-happy', ',40,', 1, 1, '2019-11-13 16:07:58', '2019-11-13 16:07:58'),
(70, 'The Insect Apocalypse', 1, 1, 1, 'https://www.youtube.com/watch?v=GzhHHVFp32U', '157361457586326.png', NULL, NULL, 2019, '<p>The world&#39;s insect populations has declined by 75&#37;, in some areas. &nbsp;This decline indicates that something deeply disturbing is happening in our environment.</p>\r\n\r\n<p>Without a doubt, humans are responsible for the rapid extinction of insects. Habitat destruction (deforestation), climate change, pesticide usage, water, land, and light &nbsp;pollution are all major factors in the demise of insects. &nbsp;The film presents studies that examine the devastating effect of these human activities on the smallest, but most essential members of the animal kingdom. &nbsp;</p>\r\n\r\n<p>Through a series of studies featured in the film, we can witness this stark reality at work. Chemicals, widespread deforestation, water and land pollution, and climate change are the main culprits.</p>\r\n', 'the-insect-apocalypse', ',40,65,', 1, 1, '2019-11-13 16:09:37', '2019-11-13 16:09:37'),
(71, 'There is a Rhino in My House', 1, 1, 1, 'https://www.youtube.com/watch?v=OadEszfTtJk', '157361507815710.png', NULL, NULL, 2011, 'There is a Rhino in my House is an engaging and uplifting documentary that tells the  story of John and Judy Travers, a Zimbabwean couple, who are dedicated  to preventing the  extinction of the rhino.  When an irresistibly cute baby rhino, a warthog and a hyper hyena are orphaned, Judy Travers decides to raise all three - in her home&#33;', 'there-is-a-rhino-in-my-house', ',40,65,', 1, 1, '2019-11-13 16:17:59', '2019-11-13 16:17:59'),
(72, 'The Monsanto Papers', 1, 1, 1, 'https://www.youtube.com/watch?v=lidkYEUqw-Q  ', '157361519423936.png', NULL, NULL, 2019, '<p>Roundup&reg;, first marketed in the 1970s, is now the most widely used herbicide in the world. It has been implicated in cases of cancer in humans and animals, and It has wreaked environmental havoc. But, because it is the main revenue generator for Monsanto, there have been extensive coverups of Roundup&rsquo;s toxicity and other maneuvers by Monsanto to deny responsibility.</p>\r\n', 'the-monsanto-papers', ',50,58,', 1, 1, '2019-11-13 16:19:56', '2019-11-13 16:19:56'),
(73, 'Fools and Dreamers:  Regenerating a Native Forest 2019', 1, 1, 1, 'https://www.youtube.com/watch?v=3VZSJKbzyMc', '157361536690569.png', NULL, NULL, 2019, '<p>A man spends 30 years regenerating a forest&hellip; &nbsp;The incredible story of how degraded gorse-infested farmland has been regenerated back into beautiful native forest.</p>\r\n\r\n<p>Fools &amp; Dreamers: Regenerating a Native Forest is a 30-minute documentary about Hinewai Nature Reserve, on New Zealand&rsquo;s Banks Peninsula, and its kaitiaki/manager of 30 years, botanist Hugh Wilson. When, in 1987, Hugh let the local community know of his plans to allow the introduced &lsquo;weed&rsquo; gorse to grow as a nurse canopy to regenerate farmland into native forest, people were not only skeptical but outright angry &ndash; the plan was the sort to be expected only of &ldquo;fools and dreamers&rdquo;.</p>\r\n', 'fools-and-dreamers-regenerating-a-native-forest-2019', ',50,65,', 1, 1, '2019-11-13 16:22:27', '2019-11-13 16:22:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_categories`
--

CREATE TABLE `film_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `film_categories`
--

INSERT INTO `film_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(40, 'Animals', 'animals', 1, '2019-02-17 07:57:13', '2019-02-17 07:57:13'),
(41, 'Art', 'art', 1, '2019-02-17 07:57:44', '2019-02-17 07:57:44'),
(42, 'Athletics', 'athletics', 1, '2019-02-17 07:57:56', '2019-02-17 07:57:56'),
(43, 'Biography', 'biography', 1, '2019-02-17 07:58:06', '2019-02-17 07:58:06'),
(44, 'Business', 'business', 1, '2019-02-17 07:58:15', '2019-02-17 07:58:15'),
(45, 'Comedy', 'comedy', 1, '2019-02-17 07:58:25', '2019-02-17 07:58:25'),
(46, 'Crime', 'crime', 1, '2019-02-17 07:58:34', '2019-02-17 07:58:34'),
(47, 'Drugs', 'drugs', 1, '2019-02-17 07:58:42', '2019-02-17 07:58:42'),
(48, 'Economics', 'economics', 1, '2019-02-17 07:58:53', '2019-02-17 07:58:53'),
(49, 'Education', 'education', 1, '2019-02-17 07:59:03', '2019-02-17 07:59:03'),
(50, 'Environment', 'environment', 1, '2019-02-17 07:59:16', '2019-02-17 07:59:16'),
(51, 'Investments', 'investments', 1, '2019-02-17 07:59:25', '2019-02-17 07:59:25'),
(52, 'Health', 'health', 1, '2019-02-17 07:59:35', '2019-02-17 07:59:35'),
(53, 'History', 'history', 1, '2019-02-17 07:59:44', '2019-02-17 07:59:44'),
(54, 'Mystery', 'mystery', 1, '2019-02-17 07:59:54', '2019-02-17 07:59:54'),
(55, 'Music', 'music', 1, '2019-02-17 08:00:02', '2019-02-17 08:00:02'),
(56, 'Performing Arts', 'performing-arts', 1, '2019-02-17 08:00:13', '2019-02-17 08:00:13'),
(57, 'Philosophy', 'philosophy', 1, '2019-02-17 08:00:21', '2019-02-17 08:00:21'),
(58, 'Politics', 'politics', 1, '2019-02-17 08:00:35', '2019-02-17 08:00:35'),
(59, 'Psychology', 'psychology', 1, '2019-02-17 08:00:47', '2019-02-17 08:00:47'),
(60, 'Religion', 'religion', 1, '2019-02-17 08:00:56', '2019-02-17 08:00:56'),
(61, 'Science', 'science', 1, '2019-02-17 08:01:05', '2019-02-17 08:01:05'),
(62, 'Society', 'society', 1, '2019-02-17 08:01:15', '2019-02-17 08:01:15'),
(63, 'Sexuality', 'sexuality', 1, '2019-02-17 08:01:24', '2019-02-17 08:01:24'),
(64, 'Technology', 'technology', 1, '2019-02-17 08:01:28', '2019-02-17 08:01:28'),
(65, 'Nature', 'nature', 1, '2019-11-13 16:01:56', '2019-11-13 16:01:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_comments`
--

CREATE TABLE `film_comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `film_comments`
--

INSERT INTO `film_comments` (`id`, `parent_comment_id`, `user_id`, `article_id`, `content`, `status`, `created`, `updated`) VALUES
(21, 0, 4, 3, 'Awesome 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(22, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(33, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(37, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film_likes`
--

CREATE TABLE `film_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_id_friend` int(11) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `status_user` int(11) NOT NULL DEFAULT '1',
  `status_user_friend` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `user_id_friend`, `approved`, `status_user`, `status_user_friend`, `created`, `updated`) VALUES
(1, 1, 2, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:46:43'),
(3, 1, 4, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:15'),
(4, 1, 5, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:18'),
(5, 1, 6, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:20'),
(6, 1, 7, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:22'),
(8, 2, 4, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:51'),
(9, 2, 5, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:53'),
(10, 2, 6, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:55'),
(11, 2, 7, 1, 1, 1, '2018-11-27 06:46:43', '2018-11-27 06:47:57'),
(13, 3, 2, 0, 1, 1, '2018-11-27 06:46:43', '2018-11-28 03:25:13'),
(16, 3, 11, 0, 1, 1, '2018-11-27 06:46:43', '2018-11-28 03:30:06'),
(28, 6, 10, 0, 1, 1, '2018-11-28 02:15:13', '2018-11-28 03:25:28'),
(29, 3, 12, 0, 1, 1, '2018-11-28 03:00:48', '2018-11-28 03:00:48'),
(31, 17, 1, 0, 1, 1, '2018-12-03 08:47:13', '2018-12-03 08:47:13'),
(33, 24, 1, 1, 1, 1, '2019-01-28 11:15:37', '2019-01-28 11:15:57'),
(34, 23, 1, 0, 1, 1, '2019-01-29 08:55:32', '2019-01-29 08:55:32'),
(39, 3, 17, 1, 1, 1, '2019-02-26 17:23:10', '2019-02-26 17:24:03'),
(40, 1, 20, 0, 1, 1, '2019-03-01 09:20:48', '2019-03-01 09:20:48'),
(41, 1, 26, 0, 1, 1, '2019-12-01 17:11:53', '2019-12-01 17:11:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `object_article_id` int(11) NOT NULL,
  `table_model` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `object_article_id`, `table_model`, `created`, `updated`) VALUES
(1, 9, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 09:11:50'),
(2, 3, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(3, 4, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(5, 6, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(6, 7, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(7, 8, 1, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(8, 3, 2, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(9, 4, 2, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(10, 5, 2, 'review_rating_model', '2018-11-02 04:14:11', '2018-11-02 04:14:11'),
(38, 2, 3, 'review_rating_model', '2018-11-04 05:09:06', '2018-11-04 05:09:06'),
(40, 1, 3, 'review_rating_model', '2018-11-05 01:04:07', '2018-11-05 01:04:07'),
(41, 1, 2, 'review_rating_model', '2018-11-05 01:04:08', '2018-11-05 01:04:08'),
(42, 1, 1, 'review_rating_model', '2018-11-05 01:04:12', '2018-11-05 01:04:12'),
(47, 2, 4, 'review_rating_model', '2018-11-10 12:25:22', '2018-11-10 12:25:22'),
(48, 2, 1, 'review_rating_model', '2018-11-10 12:29:12', '2018-11-10 12:29:12'),
(49, 2, 76, 'review_rating_model', '2018-11-13 17:00:13', '2018-11-13 17:00:13'),
(50, 2, 77, 'review_rating_model', '2018-11-13 17:00:15', '2018-11-13 17:00:15'),
(51, 2, 78, 'review_rating_model', '2018-11-13 17:00:17', '2018-11-13 17:00:17'),
(52, 2, 81, 'review_rating_model', '2018-11-13 17:00:18', '2018-11-13 17:00:18'),
(53, 3, 117, 'review_rating_model', '2018-11-14 18:02:37', '2018-11-14 18:02:37'),
(55, 3, 115, 'review_rating_model', '2018-11-14 09:31:37', '2018-11-14 09:31:37'),
(56, 3, 76, 'review_rating_model', '2018-11-14 09:31:37', '2018-11-14 09:31:37'),
(57, 3, 115, 'review_rating_model', '2018-11-14 09:31:37', '2018-11-14 09:31:37'),
(58, 3, 115, 'review_rating_model', '2018-11-14 09:31:38', '2018-11-14 09:31:38'),
(60, 3, 119, 'review_rating_model', '2018-11-14 09:31:56', '2018-11-14 09:31:56'),
(61, 19, 121, 'review_rating_model', '2018-11-16 09:24:42', '2018-11-16 09:24:42'),
(63, 21, 120, 'review_rating_model', '2018-11-17 08:53:39', '2018-11-17 08:53:39'),
(64, 21, 129, 'review_rating_model', '2018-11-19 17:32:34', '2018-11-19 17:32:34'),
(65, 24, 142, 'review_rating_model', '2018-12-18 08:56:05', '2018-12-18 08:56:05'),
(66, 1, 186, 'review_rating_model', '2019-01-29 08:26:58', '2019-01-29 08:26:58'),
(67, 1, 206, 'review_rating_model', '2019-03-28 09:33:29', '2019-03-28 09:33:29'),
(68, 3, 208, 'review_rating_model', '2019-07-20 15:35:57', '2019-07-20 15:35:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `must_reads_articles`
--

CREATE TABLE `must_reads_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `must_reads_articles`
--

INSERT INTO `must_reads_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(22, 'Trickle Down Economics Does Not Work', 1, 1, 1, '157361644794587.jpeg', '<p>The economic theory championed by conservatives that emerged during the Reagan era&mdash;that by cutting the tax rates of the rich/corporations would &ldquo;trickle down&rdquo; to everyone else through economic growth and job creation&mdash;has been proven to be INVALID.</p>\r\n\r\n<p>Research actually shows the following:</p>\r\n\r\n<p>1. Cutting the top tax rate does not lead to economic growth.</p>\r\n\r\n<p>2. Cutting the top tax rate does not lead to income growth.</p>\r\n\r\n<p>3. Cutting the top tax rate does not lead to wage growth.</p>\r\n\r\n<p>4. Cutting the top tax rate does not lead to job creation. (more)</p>\r\n\r\n<p><a href=\"http://www.faireconomy.org/trickle_down_economics_four_reasons\" target=\"_blank\">http://www.faireconomy.org/trickle_down_economics_four_reasons </a></p>\r\n\r\n<p>Cutting taxes for people at the top increases income inequality. That&rsquo;s what it does. (more)</p>\r\n\r\n<p><a href=\"https://www.salon.com/2019/04/12/echoes-of-history-trumps-movement-now-has-a-uniform-and-a-membership-card/\" target=\"_blank\">https://www.salon.com/2019/04/12/echoes-of-history-trumps-movement-now-has-a-uniform-and-a-membership-card/</a></p>\r\n', 'The economic theory championed by conservatives that emerged during the Reagan eraâ€”that by cutting the tax rates of the rich/corporations would â€œtrickle downâ€ to everyone else through economic growth and job creationâ€”has been proven to be INVALID. ', 'trickle-down-economics-does-not-work', ',21,24,27,28,', 1, 1, '2019-11-13 16:40:47', '2019-11-13 16:40:47'),
(23, 'Donâ€™t Blame the Robots for Manufacturing Job Losses in U.S.', 1, 1, 1, '157361652185570.jpeg', '<p>This piece by the Economic Policy Institute (EPI) is based on studies comparing countries&rsquo; levels of automation and job loss. It concludes that while there is a relationship, it is definitely not the only reason. Why? Countries like Germany where industries are much more mechanized/automated than in the U.S. have seen significantly less job loss. (more)</p>\r\n\r\n<p><a href=\"https://www.epi.org/publication/technology-inequality-dont-blame-the-robots/\" target=\"_blank\">https://www.epi.org/publication/technology-inequality-dont-blame-the-robots/ </a></p>\r\n\r\n<p>Another piece is even more explicit in pointing out that while German factories are way more mechanized than US ones, Germany has not seen the job losses that we&rsquo;ve seen in the U.S. According to a major German study based on data over a 20 year span, in 1994, Germany had about two industrial robots per thousand workers&mdash;about 4 times more than in the U.S. at the time. By 2014, the number of robots had risen to 7.6 robots per thousand workers in Germany compared to only 1.6 robots per thousand workers in the U.S. (more)</p>\r\n\r\n<p>Other key points are:</p>\r\n\r\n<p>1. While manufacturing jobs have been reduced by automation in Germany, job losses were insignificant, in part because in Germany, workers found jobs in other industries, especially new entrants. In other words, there were plenty of other jobs to be had, especially in the service sector, for the 25&#37; of the population who would have worked in manufacturing, This point was made in the October Democratic party debate by Senator Bernie Sanders when another candidate insisted that automation was the prime culprit in job losses and increasing income inequality. The researchers &ldquo;found that despite the significant growth in the use of robots, they hadn&rsquo;t made any dent in aggregate German employment. &ldquo;Once industry structures and demographics are taken into account, we find effects close to zero,&rdquo; the researchers said .</p>\r\n\r\n<p>2. While some existing medium-skilled German workers in increasingly automated industries such as the auto industry, found their jobs downgraded because of automation, most kept their jobs, although some did take pay cuts. Germans were &ldquo;significantly more likely to keep their jobs, though some ended up doing different roles from before&hellip;&rdquo; according to the study. Why the difference between Germany and the U.S.? One main reason is because of Germany&rsquo;s powerful unions.</p>\r\n\r\n<p>3. But even though many more German workers were able to keep their jobs (often at lower wages) and unemployment is minimal, Germany is NOT perfect: Like other capitalist countries, income inequality is significant. But here again, income inequality in the U.S. is more extreme than in Germany&mdash;perhaps, again, because German unions are stronger than those in the U.S. According to data provided by the Organization for Economic Co-operation and Development, &ldquo;in Germany, the bottom 60 percent of the population possess just 6.5 percent of wealth in the country, the lowest figure in Europe. In the U.S., the bottom 60 percent possess just 2.4 percent&rdquo; (more)</p>\r\n\r\n<p><a href=\"https://geopoliticalfutures.com/germany-us-grapple-wealth-inequality/\" target=\"_blank\">https://geopoliticalfutures.com/germany-us-grapple-wealth-inequality/</a></p>\r\n', 'This piece by the Economic Policy Institute (EPI) is based on studies comparing countriesâ€™ levels of automation and job loss. It concludes that while there is a relationship, it is definitely not the only reason. Why?', 'dont-blame-the-robots-for-manufacturing-job-losses-in-us', ',21,22,23,24,25,26,', 1, 1, '2019-11-13 16:41:45', '2019-11-13 16:42:01'),
(24, 'Madeleine Albright: 21st Century Fascism ', 1, 1, 1, '157361664184816.jpeg', '<p>The rise of demagogues with autocratic tendencies--men who can rally certain segments of society using nativist, racist, and fake populist appeals--is an emerging trend today. Madeleine Albright and Bill Woodward have written a book, Fascism: A Warning, about how Hitler and Mussolini rose to power. The parallels between their tactics and those of today&rsquo;s budding autocrats are strikingly similar.</p>\r\n\r\n<p>Here is an excerpt from a New Yorker article about the book:</p>\r\n\r\n<p>Albright writes. &ldquo;This was how twentieth-century fascism began: with a magnetic leader exploiting widespread dissatisfaction by promising all things.&rdquo; Il Duce, who was Italy&rsquo;s Prime Minister from 1922 until 1943, said that his mission was &ldquo;to break the bones of the democrats .&thinsp;.&thinsp;. and the sooner the better.&rdquo; He used the term &ldquo;drenare la palude,&rdquo; or &ldquo;drain the swamp.&rdquo; He had a talent for theatre, Albright notes, and was a poor listener who disliked hearing other people talk. He discouraged cabinet members from &ldquo;proposing any idea that might cause him to doubt his instincts,&rdquo; which, he insisted, were always right. He also promoted the idea of national self-sufficiency &ldquo;without ever grasping how unrealistic that ambition had become.&rdquo;</p>\r\n\r\n<p>Adolf Hitler catapulted to power in Germany using similar tactics in a similar environment&mdash;a craving by the people for direction that conventional politicians weren&rsquo;t providing. He &ldquo;lied incessantly about himself and about his enemies,&rdquo; Albright writes. He convinced millions that he &ldquo;cared for them deeply when, in fact, he would have willingly sacrificed them all.&rdquo; (MORE)</p>\r\n\r\n<p><a href=\"https://www.newyorker.com/news/news-desk/madeleine-albright-warns-of-a- new-fascism-and-trump\" target=\"_blank\">https://www.newyorker.com/news/news-desk/madeleine-albright-warns-of-a- new-fascism-and-trump</a></p>\r\n', 'The rise of demagogues with autocratic tendencies--men who can rally certain segments of society using nativist, racist, and fake populist appeals--is an emerging trend today.', 'madeleine-albright-21st-century-fascism', ',25,26,27,28,', 1, 1, '2019-11-13 16:44:02', '2019-11-13 16:44:02'),
(25, 'Automation is Not the Main Reason for Low Wages and Job Loss', 1, 1, 1, '157361668596234.jpeg', '<p>In an opinion piece, Princeton economist Paul Krugman states that while many people assume that automation is the main reason for job loss and low wages, this is just not the case. Instead, it is the lopsided power balance between employers and workers, a trend since the 1970s, that is responsible for the declining pay and status of workers in the U.S. In other words, it is not technological advances but the &ldquo;failure of workers to share in the fruits of technology change&rdquo; that is responsible.</p>\r\n\r\n<p>&ldquo;The other day I found myself, as I often do, at a conference discussing lagging wages and soaring inequality. There was a lot of interesting discussion. But one thing that struck me was how many of the participants just assumed that robots are a big part of the problem &mdash; that machines are taking away the good jobs, or even jobs in general. For the most part this wasn&rsquo;t even presented as a hypothesis, just as part of what everyone knows.</p>\r\n\r\n<p>And this assumption has real implications for policy discussion. For example, a lot of the agitation for a universal basic income comes from the belief that jobs will become ever scarcer as the robot apocalypse overtakes the economy. So it seems like a good idea to point out that in this case what everyone knows isn&rsquo;t true.&rdquo; (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/03/14/opinion/robots-jobs.html\" target=\"_blank\">https://www.nytimes.com/2019/03/14/opinion/robots-jobs.html</a></p>\r\n', 'In an opinion piece, Princeton economist Paul Krugman states that while many people assume that automation is the main reason for job loss and low wages, this is just not the case. ', 'automation-is-not-the-main-reason-for-low-wages-and-job-loss', ',21,22,23,24,25,27,', 1, 1, '2019-11-13 16:44:45', '2019-11-13 16:44:45'),
(26, 'Reasons to Worry About the Disappearing American Middle Class', 1, 1, 1, '157361672980024.jpeg', '<p>Despite gains in national income over the past half-century, American households in the middle of the distribution have experienced very little income growth in recent decades&hellip;The stagnant growth in median incomes is in stark contrast to the income trajectories of those at the very top of the income distribution. (more)</p>\r\n\r\n<p><a href=\"https://www.brookings.edu/blog/social-mobility-memos/2018/06/05/seven-reasons-to-worry-about-the-american-middle-class/\" target=\"_blank\">https://www.brookings.edu/blog/social-mobility-memos/2018/06/05/seven-reasons-to-worry-about-the-american-middle-class/</a></p>\r\n', 'Despite gains in national income over the past half-century, American households in the middle of the distribution have experienced very little income growth in recent decades.', 'reasons-to-worry-about-the-disappearing-american-middle-class', ',21,24,25,26,28,', 1, 1, '2019-11-13 16:45:30', '2019-11-13 16:45:30'),
(27, 'A Middle Class is Essential to Democracies', 1, 1, 1, '157361678446216.jpeg', '<p>It&#39;s no secret that America&#39;s middle class is in decline. But while we focus on how that decline started (and who is to blame), we often forget to consider what happens if our middle class is wiped out entirely.</p>\r\n\r\n<p>If we don&#39;t work to restore the American middle class to the vibrant, robust segment of our nation it once was, we may soon witness the end of small-d democracy as we know it. As history and nature both show us, working for the collective good is essential to a functioning democracy, and the natural outcome of that work is a strong and vibrant middle class.(more)</p>\r\n\r\n<p><a href=\"https://www.salon.com/2016/04/08/kiss_our_democracy_goodbye_partner/\" target=\"_blank\">https://www.salon.com/2016/04/08/kiss_our_democracy_goodbye_partner/</a></p>\r\n', 'It&#039;s no secret that America&#039;s middle class is in decline. But while we focus on how that decline started (and who is to blame), we often forget to consider what happens if our middle class is wiped out entirely. ', 'a-middle-class-is-essential-to-democracies', ',21,24,25,26,27,28,', 1, 1, '2019-11-13 16:46:24', '2019-11-13 16:46:24'),
(28, 'How Amazon Gobbles Up Small Businesses', 1, 1, 1, '157361683443797.jpeg', '<p>The way Amazon competes and the power of its monopoly are seldom highlighted in the media. Elizabeth Warren mentions it frequently as the reason why breaking up big tech is important, because the &ldquo;winner take all&rdquo; monopolies like Facebook, Apply, Google, and Amazon depresses competition, stifles innovation, and contribute mightily to the extreme income inequality that plagues the U.S.</p>\r\n\r\n<p>Warren&rsquo;s basic point is that if a company owns a dominant &ldquo;platform&rdquo; that many small businesses must use in order to sell their products, it means that the platform owner has access to data about how popular certain products are. This, in Amazon&rsquo;s case, has resulted in Amazon selling its own copycat products under &ldquo;private labels,&rsquo; thereby competing with the companies selling such products and before long, Amazon owns the market for that product&#33; (more).</p>\r\n\r\n<p><a href=\"https://www.bloomberg.com/opinion/articles/2019-02-19/amazon-uses-search-to-undercut-small-businesses-on-its-site\" target=\"_blank\">https://www.bloomberg.com/opinion/articles/2019-02-19/amazon-uses-search-to-undercut-small-businesses-on-its-site</a></p>\r\n', 'The way Amazon competes and the power of its monopoly are seldom highlighted in the media. Elizabeth Warren mentions it frequently as the reason why breaking up big tech is important, because the â€œwinner take allâ€ &#33;', 'how-amazon-gobbles-up-small-businesses', ',21,23,24,25,28,', 1, 1, '2019-11-13 16:47:14', '2019-11-13 16:47:14'),
(29, 'Breaking Up Big Tech by Elizabeth Warren', 1, 1, 1, '157361687327277.jpeg', '<p>These are exerpts of key points: &nbsp;For the entire text, click here<br />\r\n<a href=\"https://medium.com/@teamwarren/heres-how-we-can-break-up-big-tech-9ad9e0da324c\" target=\"_blank\">https://medium.com/@teamwarren/heres-how-we-can-break-up-big-tech-9ad9e0da324c</a></p>\r\n\r\n<p>Today&rsquo;s big tech companies have too much power &mdash; too much power over our economy, our society, and our democracy. They&rsquo;ve bulldozed competition, used our private information for profit, and tilted the playing field against everyone else. And in the process, they have hurt small businesses and stifled innovation.</p>\r\n\r\n<p>I want a government that makes sure everybody &mdash; even the biggest and most powerful companies in America &mdash; plays by the rules. And I want to make sure that the next generation of great American tech companies can flourish. To do that, we need to stop this generation of big tech companies from throwing around their political power to shape the rules in their favor and throwing around their economic power to snuff out or buy up every potential competitor.</p>\r\n\r\n<p>How the new tech monopolies hurt small businesses and innovation:</p>\r\n\r\n<ul>\r\n	<li>Using Mergers to Limit Competition. Facebook has purchased potential competitors Instagram and WhatsApp. Amazon has used its immense market power to force smaller competitors like Diapers.com to sell at a discounted rate. Google has snapped up the mapping company Waze and the ad company DoubleClick. Rather than blocking these transactions for their negative long-term effects on competition and innovation, government regulators have waved them through.</li>\r\n	<li>Using Proprietary Marketplaces to Limit Competition. Many big tech companies own a marketplace &mdash; where buyers and sellers transact &mdash; while also participating on the marketplace. This can create a conflict of interest that undermines competition. Amazon crushes small companies by copying the goods they sell on the Amazon Marketplace and then selling its own branded version. Google allegedly snuffed out a competing small search engine by demoting its content on its search algorithm, and it has favored its own restaurant ratings over those of Yelp.</li>\r\n</ul>\r\n\r\n<p>Weak antitrust enforcement has led to a dramatic reduction in competition and innovation in the tech sector.</p>\r\n\r\n<p>We must ensure that today&rsquo;s tech giants do not crowd out potential competitors, smother the next generation of great tech companies, and wield so much power that they can undermine our democracy.</p>\r\n\r\n<p><strong>Restoring Competition in the Tech Sector</strong></p>\r\n\r\n<p>First, by passng legislation that requires large tech platforms to be designated as &ldquo;Platform Utilities&rdquo; and broken apart from any participant on that platform.</p>\r\n\r\n<p>Companies with an annual global revenue of &#36;25 billion or more and that offer to the public an online marketplace, an exchange, or a platform for connecting third parties would be designated as &ldquo;platform utilities.&rdquo;</p>\r\n\r\n<p>These companies would be prohibited from owning both the platform utility and any participants on that platform. Platform utilities would be required to meet a standard of fair, reasonable, and nondiscriminatory dealing with users. Platform utilities would not be allowed to transfer or share data with third parties.<br />\r\nAmazon Marketplace, Google&rsquo;s ad exchange, and Google Search would be platform utilities under this law. Therefore, Amazon Marketplace and Basics, and Google&rsquo;s ad exchange and businesses on the exchange would be split apart. Google Search would have to be spun off as well.</p>\r\n\r\n<p>Second, my administration would appoint regulators committed to reversing illegal and anti-competitive tech mergers.</p>\r\n\r\n<p>Current antitrust laws empower federal regulators to break up mergers that reduce competition. I will appoint regulators who are committed to using existing tools to unwind anti-competitive mergers, including:</p>\r\n\r\n<ul>\r\n	<li>Amazon: Whole Foods; Zappos</li>\r\n	<li>Facebook: WhatsApp; Instagram</li>\r\n	<li>Google: Waze; Nest; DoubleClick</li>\r\n</ul>\r\n\r\n<p>Unwinding these mergers will promote healthy competition in the market &mdash; which will put pressure on big tech companies to be more responsive to user concerns, including about privacy.</p>\r\n\r\n<p><strong>Protecting the future of the internet</strong></p>\r\n\r\n<p>So what would the Internet look like after all these reforms?<br />\r\nHere&rsquo;s what won&rsquo;t change: You&rsquo;ll still be able to go on Google and search like you do today. You&rsquo;ll still be able to go on Amazon and find 30 different coffee machines that you can get delivered to your house in two days. You&rsquo;ll still be able to go on Facebook and see how your old friend from school is doing.<br />\r\nHere&rsquo;s what will change: Small businesses would have a fair shot to sell their products on Amazon without the fear of Amazon pushing them out of business. Google couldn&rsquo;t smother competitors by demoting their products on Google Search. Facebook would face real pressure from Instagram and WhatsApp to improve the user experience and protect our privacy. Tech entrepreneurs would have a fighting chance to compete against the tech giants.</p>\r\n\r\n<p>Of course, my proposals today won&rsquo;t solve every problem we have with our big tech companies.<br />\r\nWe must give people more control over how their personal information is collected, shared, and sold &mdash; and do it in a way that doesn&rsquo;t lock in massive competitive advantages for the companies that already have a ton of our data.</p>\r\n\r\n<p>We must help America&rsquo;s content creators &mdash; from local newspapers and national magazines to comedians and musicians &mdash; keep more of the value their content generates, rather than seeing it scooped up by companies like Google and Facebook.</p>\r\n\r\n<p>And we must ensure that Russia &mdash; or any other foreign power &mdash; can&rsquo;t use Facebook or any other form of social media to influence our elections.</p>\r\n\r\n<p>Those are each tough problems, but the benefit of taking these steps to promote competition is that it allows us to make some progress on each of these important issues too. More competition means more options for consumers and content creators, and more pressure on companies like Facebook to address the glaring problems with their businesses.</p>\r\n\r\n<p>Healthy competition can solve a lot of problems. The steps I&rsquo;m proposing today will allow existing big tech companies to keep offering customer-friendly services, while promoting competition, stimulating innovation in the tech sector, and ensuring that America continues to lead the world in producing cutting-edge tech companies. It&rsquo;s how we protect the future of the Internet.</p>\r\n\r\n<p>We can get this done. We can make big, structural change. But it&rsquo;s going to take a grassroots movement, and it starts right now. Sign our petition if you agree, and let&rsquo;s get ready to fight hard together.</p>\r\n\r\n<p><a href=\"https://my.elizabethwarren.com/page/s/ew-breakupbigtech?source=20190308md\" target=\"_blank\">https://my.elizabethwarren.com/page/s/ew-breakupbigtech?source=20190308md</a></p>\r\n', 'Todayâ€™s big tech companies have too much power â€” too much power over our economy, our society, and our democracy. Theyâ€™ve bulldozed competition, used our private information for profit, and tilted the playing field against everyone else. ', 'breaking-up-big-tech-by-elizabeth-warren', ',21,23,24,25,28,', 1, 1, '2019-11-13 16:47:54', '2019-11-13 16:47:54'),
(30, 'Green New Deal 101', 1, 1, 1, '157361693787771.jpeg', '<p>The idea of a &ldquo;Green New Deal&rdquo; has been germinating for a little over 20 years &nbsp;in the U.S. and U.K. &nbsp;The name is inspired by President Franklin Delano Roosevelt&rsquo;s New Deal in the 1930s when his administration &nbsp;created a whole host of new programs and social safety legislation to lift America out of the Depression.&nbsp;</p>\r\n\r\n<p>The basic idea of the Green New Deal is that if a country focuses on green technologies, especially clean, non-carbon-generating renewable energy, we can &nbsp;effectively combat climate change. &nbsp;At the same time, this idea was combined with an overarching vision of a &nbsp;job-creating economic renaissance that will juice up the national economy and create wide-spread shared prosperity. &nbsp;Up to the present, the Green New Deal is primarily supported by Green Party candidates, Democrats, environmental organizations, and progressive Americans.</p>\r\n\r\n<p>The Green New Deal is a work in progress. &nbsp;While the general mission has been presented, the details of the program and implementation have not been worked out yet. &nbsp;</p>\r\n\r\n<p><strong>Recent Green New Deal developments in the U.S.:</strong></p>\r\n\r\n<ul>\r\n	<li>In November 2018: &nbsp;18 Democratic members of Congress co-sponsored a proposal for a &nbsp;House Select Committee on a Green New Deal that were tasked with coming up with a draft legislation in 90 days, after which the committee would work on a detailed plan to make the US &ldquo;carbon neutral&rdquo; through programs that would promote equality and justice. &nbsp;</li>\r\n	<li>February 7, 2019: &nbsp;Senator Edward Markey and Representative Alexandria Ocasio-Cortez released a fourteen-page resolution[8] for their Green New Deal. &nbsp;Summary of what is in this resolution (<a href=\"https://www.vox.com/energy-and-environment/2019/2/7/18211709/green-new-deal-resolution-alexandria-ocasio-cortez-markey\" target=\"_blank\">https://www.vox.com/energy-and-environment/2019/2/7/18211709/green-new-deal-resolution-alexandria-ocasio-cortez-markey</a>)</li>\r\n	<li>As of fall 2019: &nbsp;This house resolution was blocked in the Senate in March 2019 through a &ldquo;procedural vote,&rdquo; with most Democrats voting &ldquo;present,&rdquo; which meant that &nbsp;that there were not even enough Democratic votes, so there is no hope that it would pass the Senate because Republicans will not support it.</li>\r\n	<li>Right now, supporters of the Green New Deal such as Ocasio-Cortez, are trying another approach&mdash;they are focusing on breaking down the Green NewDeal into smaller bills on climate change and green energy jobs. (more)</li>\r\n</ul>\r\n\r\n<p><a href=\"https://thehill.com/policy/energy-environment/436171-democrats-to-move-on-from-green-new-deal\" target=\"_blank\">https://thehill.com/policy/energy-environment/436171-democrats-to-move-on-from-green-new-deal</a></p>\r\n', 'The idea of a â€œGreen New Dealâ€ has been germinating for a little over 20 years Â in the U.S. and U.K. Â The name is inspired by President Franklin Delano Rooseveltâ€™s New Deal in the 1930s when his administration Â created a whole host of new programs and social safety legislation to lift America out of the Depression.Â ', 'green-new-deal-101', ',24,25,26,28,30,', 1, 1, '2019-11-13 16:48:57', '2019-11-13 16:48:57'),
(31, 'Immigration 101:  History of Immigration Law and Current Situation', 1, 1, 1, '157362314232801.jpeg', '<p>First, a few key historical facts about Immigration in the U.S.:</p>\r\n\r\n<ol>\r\n	<li>Until 1965, American immigration law has always been racist, starting with the 1882 Chinese Exclusion Act: &nbsp;The Western Hemisphere, or European immigrants, have always had much higher quotas than immigrants from Asia, South America, Africa, and those from the Eastern Hemisphere..</li>\r\n	<li>In 1965, the Immigration and Nationality Act mitigated the extreme racist quota system somewhat in that it gave first preference to relatives of U.S. citizens and permanent residents. &nbsp;The racist quota system was still maintained in that the Eastern Hemisphere, where the population was much higher and from where many more people have sought to immigrate to the U.S., had a per country quota of &nbsp;just &#36;20,000 per year. &nbsp;It was not until 1978 that the separate quotas for Eastern and Western Hemispheres were combined into a global limit of 290,000 per year.&nbsp;</li>\r\n	<li>1986 Immigration Reform and Control Act: &nbsp;The key provisions of this comprehensive reform effort were the following: (1) gave legal status to illegal aliens who had lived in the United States since January 1, 1982, (2) created a new category of temporary agricultural worker and gave them a path to permanent residency. (3) established a visa waiver pilot program allowing the admission of certain nonimmigrants from friendly nations to enter the U.S. without visas.</li>\r\n	<li>1990: &nbsp;Establishment of current immigration category system: &nbsp;Key Provisions: &nbsp;(1) Increased total immigration quota under an flexible cap of 675,000 (2) created distinct categories such as family-sponsored, employment-based, etc. (3) revised all rules for exclusion and deportation, significantly rewrote the political and ideological principles undergirding immigration decisions. ,&nbsp;</li>\r\n	<li>Minor immigration acts through the 1990s and 2000s: &nbsp;There were a series of Acts that gave preference to certain &nbsp;&nbsp; &nbsp;groups of persecuted aliens (e.g. Haitians) and most &nbsp;&nbsp; &nbsp;significantly, H1-B (educated workers that are sponsored by &nbsp;&nbsp; &nbsp;employers) caps were removed and permitted renewals that did &nbsp;&nbsp; &nbsp;not count under the cap.</li>\r\n	<li>DACA &nbsp; &nbsp;</li>\r\n	<li>Deferred Action for Childhood Arrivals (DACA), is an executive order signed by President Obama in 2012 that gives some undocumented people who came to this country as children permission to receive renewable 2-year permits to work legally. &nbsp;This executive order defers deportation for eligible people who have applied for DACA status. &nbsp;To be eligible for the program, recipients cannot have felonies or serious misdemeanors on their records and must be born after June 15, 1981. DACA is NOT &nbsp;a path to citizenship for recipients, known as Dreamers.</li>\r\n</ol>\r\n\r\n<p>The Trump administration has been planning to scrap the DACA program but these plans are now on hold by court order and the case is likely to be heard by the Supreme Court sometime in 2020.</p>\r\n\r\n<p><strong>Current Major Immigration Issues:</strong></p>\r\n\r\n<ul>\r\n	<li>What should be done about DACA (see above)?</li>\r\n	<li>What should be done about the migrants streaming in from the southern border (mostly from Mexico)?</li>\r\n	<li>What should be done about people who have overstayed their visas and are now undocumented?</li>\r\n	<li>Should overall immigration be reduced, increased, or stay the same?</li>\r\n	<li>How should America set priorities for people (refugees, asylum seekers, family members, economic migrants, skilled workers) seeking entry</li>\r\n</ul>\r\n\r\n<p><a href=\"https://www.fairus.org/legislation/reports-and-analysis/history-of-us-immigration-laws\" target=\"_blank\">https://www.fairus.org/legislation/reports-and-analysis/history-of-us-immigration-laws</a> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n', 'First, a few key historical facts about Immigration in the U.S.\r\nUntil 1965, American immigration law has always been racist, starting with the 1882 Chinese Exclusion Act', 'immigration-101-history-of-immigration-law-and-current-situation', ',25,26,27,28,30,', 1, 1, '2019-11-13 18:32:23', '2019-11-13 18:32:23'),
(32, 'Obstacles to Medicare for All', 1, 1, 1, NULL, '<p><strong>Two primary obstacles are: &nbsp;</strong></p>\r\n\r\n<ol>\r\n	<li>The for-profit private healthcare insurance companies, &nbsp;hospitals, &nbsp;and big pharma will fight Medicare-for-All to the bitter end. &nbsp;They have everything to lose and nothing to gain.</li>\r\n	<li>People who are covered through their workplace are generally &ldquo;satisfied&rdquo; with their coverage, because many who have never had to use their health insurance &ldquo;benefits&rdquo; beyond a limited extent, don&rsquo;t know that &nbsp;even people with health insurance can go bankrupt because their insurance is inadequate.</li>\r\n</ol>\r\n\r\n<p>Physicians for a National Health Program (PNHP), Dr. David U. Himmelstein, M.D. said: &nbsp;&ldquo;For middle-class Americans, health insurance offers little protection. Most of us have policies with so many loopholes, copayments and deductibles that illness can put you in the poorhouse.&rdquo; &nbsp;(more)</p>\r\n\r\n<p><a href=\"https://www.nasdaq.com/article/medical-bankruptcy-is-killing-the-american-middle-class-cm1099561\" target=\"_blank\">https://www.nasdaq.com/article/medical-bankruptcy-is-killing-the-american-middle-class-cm1099561</a></p>\r\n\r\n<p><strong>Reasons for Optimism</strong></p>\r\n\r\n<p>Despite the complacency of people who &ldquo;like&rdquo; their existing health insurance and the fact that health insurance companies will fight tooth and nail against Medicare-for-All, there are reasons for optimism when it comes to changing to a single payer government-run system. &nbsp;&nbsp;</p>\r\n\r\n<p>There are at least a few reasons for optimism: &nbsp;Two other major players in the healthcare system&mdash;doctors and companies that offer healthcare to their employees&mdash;are not adamantly opposed to Medicare-for-All as the insurance companies would have you believe..</p>\r\n\r\n<p>In a recent survey, almost 50&#37; of physicians support Medicare-for-All (more) despite knowing that they may earn less under such a system.</p>\r\n\r\n<p><a href=\"https://www.fiercehealthcare.com/practices/poll-finds-49-doctors-support-medicare-for-all\" target=\"_blank\">https://www.fiercehealthcare.com/practices/poll-finds-49-doctors-support-medicare-for-all</a></p>\r\n\r\n<p><a href=\"https://www.health.harvard.edu/blog/single-payer-healthcare-pluses-minuses-means-201606279835\" target=\"_blank\">https://www.health.harvard.edu/blog/single-payer-healthcare-pluses-minuses-means-201606279835</a></p>\r\n\r\n<p>There are no surveys as yet of CEOs who support Medicare-for-All, but there are individual CEOs who have spoken up to support a single payer healthcare system. &nbsp;They cite the advantages of a portable healthcare insurance and the burden of being responsible for the ever increasing cost of offering healthcare to employees&mdash;which often means they can&rsquo;t offer pay raises. &nbsp;And they say that a single payer system will relieve them of the huge administrative responsibility of managing an employee healthcare insurance program. (more)</p>\r\n\r\n<p><a href=\"https://khn.org/news/a-large-employer-frames-the-medicare-for-all-debate/\" target=\"_blank\">https://khn.org/news/a-large-employer-frames-the-medicare-for-all-debate/</a></p>\r\n\r\n<p><br />\r\nAll in all, there are reasons to believe that the obstacles can be overcome and all major healthcare players&mdash;with the exception of for-profit healthcare companies, hospitals, big pharma&mdash;can be persuaded. &nbsp;</p>\r\n\r\n<p>After all, surveys show that currently (2019), 70&#37; of Americans support Medicare-for-All. &nbsp;(more). &nbsp;<br />\r\n<a href=\"https://www.thenation.com/article/can-medicare-for-all-succeed/\" target=\"_blank\">https://khn.org/news/a-large-employer-frames-the-medicare-for-all-debate/</a></p>\r\n\r\n<p><strong>Medicare-for-All Can Take Many Forms</strong></p>\r\n\r\n<p>Medicare -for-All can take many forms. &nbsp;And, because the U.S. has been so mired in a complex &nbsp;system of healthcare in which for-profit companies and the government have been jointly involved, unwinding the entangled system will not be easy. &nbsp;In any case, Western European democracies, the UK, and a number of other countries such as Taiwan, all have universal health care, but each has its own unique characteristics.</p>\r\n\r\n<p>UK System: &nbsp;Single Payer System administered by national government. &nbsp;The health care system in the United Kingdom, the NHS (National Health Service) is the oldest, having started right after WWII. &nbsp;These are the primary characteristics of UK&rsquo;s universal health care system:</p>\r\n\r\n<p>&bull;&nbsp;&nbsp; &nbsp;Only one medical authority that pays for and administers the system&mdash;the National Health Service&mdash;through taxes paid to the national government. &nbsp;The national government owns and operates hospitals.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Relatively comprehensive coverage&mdash;includes dental and vision and virtually all necessary prescription drugs.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Doctors are government employees and are paid directly by the national government<br />\r\n&bull;&nbsp;&nbsp; &nbsp;The only private insurances companies allowed are ones that cater to mostly high income people who would like more extras such as shorter waits for elective surgeries and bells and whistles. &nbsp;About 10&#37; of affluent citizens have private health insurance.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Pros: &nbsp;Per capital health care costs are quite low (at &#36;4246 per capita in 2017&mdash;it is the lowest among developed countries), much lower than in the U.S.(at &#36;10,224 per capita in 2018&mdash;it is the highest among developed countries), and most basic healthcare services are adequate. &nbsp;Prescription drug prices are significantly lower than in many other developed countries, mainly because the NHS negotiates aggressively with drug companies and since NHS is the only buyer, drug companies have little choice but to sell at a lower price. &nbsp;Reason for the pros: &nbsp;If there are no for-profit middlemen insurance companies squeezing out profits, care can be much cheaper even when doctors are paid quite well as in the UK<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Cons: &nbsp;Sometimes the waits are long, especially for elective procedures.</p>\r\n\r\n<p>Canadian System: &nbsp;Single-Payer System but administered by Provinces. &nbsp;Coverage not as good as UK&rsquo;s.</p>\r\n\r\n<p>&bull;&nbsp;&nbsp; &nbsp;The national government collects taxes for healthcare and then distributes it to the 14 entities (10 provinces, 3 territories, and the military) that administers and pays for healthcare costs in their region. &nbsp;There are national guidelines that must be met.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;The provinces that receive national government money, own and operate hospitals.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Doctors, dentists and midwives are NOT direct employees of the government. &nbsp;Physician organizations negotiate directly &nbsp;with provincial administrators over rates for services.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Coverage does not include vision, dental and prescription drugs. &nbsp;So, about 30&#37; of healthcare costs are not covered by the government.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;65 to 75&#37; of Canadians pay private insurance companies for supplemental care. &nbsp;Poor families, seniors, and some minors receive government subsidies for supplemental care. But there are limits on how much private insurance companies can charge.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Pros: &nbsp;Fairly good coverage, healthcare costs are much lower than in countries like the U.S. where private insurance companies play a much more significant role and can siphon off substantial profits. &nbsp;Prescription drug prices are among the highest compared to other developed countries.<br />\r\n&bull;&nbsp;&nbsp; &nbsp;Cons: &nbsp;Complaints about wait times and the fact that vision, dental, and prescription drugs are not covered by the government. &nbsp;Prescription drug prices are lower than in the U.S. but much higher than in other countries. &nbsp;That&rsquo;s because unlike in the UK, prescription drugs are NOT covered by national healthcare &nbsp;dollars even though the provinces do try to negotiate for lower prices with the drug companies.</p>\r\n\r\n<p>So, there are many ways that Medicare for All can be structured.</p>\r\n\r\n<p>From the above glance at the UK and Canadian systems, it seems that the cheapest and most comprehensive system is a Medicare-for-All system that not only has a single payer (national government) &nbsp;but offers more comprehensive coverage (includes, prescription drugs, vision, dental) as in the UK. &nbsp; &nbsp;Ironically, a more comprehensive system (UK) will cost less than one that has less comprehensive coverage (Canada).</p>\r\n\r\n<p>Again, the worst and most expensive system in developed countries is America&rsquo;s, where many are uninsured, private insurance coverage is often inadequate, healthcare outcomes are relatively poor, and costs are very high. &nbsp;This is primarily because private for-profit health insurance companies play a major role and their goal is profits, not good healthcare.&nbsp;</p>\r\n\r\n<p>But there should be the option of private insurance for people who want shorter waits, access to particular specialists, etc. &nbsp;In the UK only 10&#37; have private health insurance on top of their government coverage. &nbsp;Even these affluent Brits use government services for most of their basic medical needs. &nbsp;(more)</p>\r\n\r\n<p><strong>Doctors for Medicare for All.</strong><br />\r\n<a href=\"https://www.thenation.com/article/can-medicare-for-all-succeed/\" target=\"_blank\">https://www.thenation.com/article/can-medicare-for-all-succeed/</a></p>\r\n\r\n<p><strong>Businesses will Benefit from Medicare for All</strong><br />\r\n<a href=\"https://fortune.com/2019/05/15/joe-biden-medicare-for-all/\" target=\"_blank\">https://fortune.com/2019/05/15/joe-biden-medicare-for-all/</a><br />\r\n<a href=\"https://www.healthsystemtracker.org/chart-collection/health-spending-u-s-compare-countries/#item-average-wealthy-countries-spend-half-much-per-person-health-u-s-spends\" target=\"_blank\">https://www.healthsystemtracker.org/chart-collection/health-spending-u-s-compare-countries/#item-average-wealthy-countries-spend-half-much-per-person-health-u-s-spends</a></p>\r\n', 'The for-profit private healthcare insurance companies, Â hospitals, Â and big pharmaceutical will fight Medicare-for-All to the bitter end. Â They have everything to lose and nothing to gain.', 'obstacles-to-medicare-for-all', ',25,26,27,31,', 1, 1, '2019-11-13 18:34:00', '2019-11-13 18:34:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `must_reads_categories`
--

CREATE TABLE `must_reads_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `must_reads_categories`
--

INSERT INTO `must_reads_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(21, 'Business', 'business', 1, '2019-11-13 16:36:30', '2019-11-13 16:36:30'),
(22, 'Science', 'science', 1, '2019-11-13 16:36:38', '2019-11-13 16:36:38'),
(23, 'Technology', 'technology', 1, '2019-11-13 16:36:47', '2019-11-13 16:36:47'),
(24, 'Economy', 'economy', 1, '2019-11-13 16:36:56', '2019-11-13 16:36:56'),
(25, 'Society', 'society', 1, '2019-11-13 16:37:06', '2019-11-13 16:37:06'),
(26, 'Lifestyles', 'lifestyles', 1, '2019-11-13 16:37:16', '2019-11-13 16:37:16'),
(27, 'Human Interest', 'human-interest', 1, '2019-11-13 16:37:31', '2019-11-13 16:37:31'),
(28, 'Politics National', 'politics-national', 1, '2019-11-13 16:37:43', '2019-11-13 16:37:43'),
(29, 'Politics International', 'politics-international', 1, '2019-11-13 16:38:02', '2019-11-13 16:38:02'),
(30, 'Education', 'education', 1, '2019-11-13 16:48:25', '2019-11-13 16:48:25'),
(31, 'Health', 'health', 1, '2019-11-13 18:33:08', '2019-11-13 18:33:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `must_reads_comments`
--

CREATE TABLE `must_reads_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `must_reads_likes`
--

CREATE TABLE `must_reads_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_articles`
--

CREATE TABLE `new_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new_articles`
--

INSERT INTO `new_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(31, 'For Democrats in 2020, Race-Conscious Policies Could Become Divisive', 1, 1, 0, '155147120829837.jpeg', '<p>by Astead Herndon</p>\r\n\r\n<p>February 22, 2019</p>\r\n\r\n<p>From the very first day of the 2020 presidential race, when Senator Elizabeth Warren of Massachusetts blamed &ldquo;generations of discrimination&rdquo; for black families earning far less than white households, Democratic hopefuls have broadly emphasized racial justice and closing the wealth gap in their policy platforms. But in recent weeks, some candidates have started embracing specific goals and overtly race-conscious legislation that even the most left-wing elected officials stayed away from in recent years.</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/02/21/us/politics/2020-democrats-race-policy.html\" target=\"_blank\">Read more</a></p>\r\n', 'From the very first day of the 2020 presidential race, when Senator Elizabeth Warren of Massachusetts blamed â€œgenerations of discriminationâ€ for black families earning far less than white households, Democratic hopefuls have broadly emphasized racial justice and closing the wealth gap in their policy platforms.', 'for-democrats-in-2020-race-conscious-policies-could-become-divisive', ',28,32,34,36,', 1, 1, '2019-03-02 09:13:28', '2019-11-02 07:26:34'),
(32, 'How New York Became A Tech Town  ', 1, 1, 0, '155147213086370.jpeg', '<p>By Steve Lohr</p>\r\n\r\n<p>February 22, 2019</p>\r\n\r\n<p>Euan Robertson started his job with New York City&rsquo;s economic development team at an ominous moment. It was Monday, Sept. 15, 2008, the day Lehman Brothers filed for bankruptcy and ignited the financial crisis.</p>\r\n\r\n<p>Mr. Robertson made his way through City Hall&rsquo;s sprawling open office to a conference table, where he huddled with top advisers to Mayor Michael R. Bloomberg. &ldquo;No one knew what was going to happen or how bad it would be,&rdquo; Mr. Robertson recalled. &ldquo;But everyone agreed we&rsquo;d better come up with a plan.&rdquo;</p>\r\n\r\n<p>The plan that emerged called for developing tech start-ups and tech workers in New York. The goal, Mr. Robertson said, was to &ldquo;build a talent engine&rdquo; that would help make the city a magnet for coders and companies.</p>\r\n\r\n<p>A decade later, there is ample evidence that the city is well on its way to achieving that goal.</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/02/22/technology/nyc-tech-startups.html\" target=\"_blank\">Read more</a></p>\r\n', 'Euan Robertson started his job with New York Cityâ€™s economic development team at an ominous moment. It was Monday, Sept. 15, 2008, the day Lehman Brothers filed for bankruptcy and ignited the financial crisis', 'how-new-york-became-a-tech-town', ',26,31,33,42,45,', 1, 1, '2019-03-02 09:28:51', '2019-11-02 07:26:28'),
(33, 'The Real Legacy of the 1970s', 1, 1, 0, '155147237989301.jpeg', '<p>by&nbsp;Michael Tomasky</p>\r\n\r\n<p>February 2, 2019</p>\r\n\r\n<p>In most histories of how Americans became so polarized, the Great Inflation of the 1970s is given short shrift &mdash; sometimes no shrift at all. This is wrong. Inflation was as pivotal a factor in our national crackup as Vietnam and Watergate. Inflation changed how Americans thought about their economic relationships to their fellow citizens &mdash; which is to say, inflation and its associated economic traumas changed who we were as a people. It also called into question the economic assumptions that had guided the country since World War II, opening the door for new assumptions that have governed us ever since.</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/02/02/opinion/sunday/inflation-economy-united- states-1970s.html\" target=\"_blank\">Read more</a>.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:0px; position:absolute; top:60px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', 'In most histories of how Americans became so polarized, the Great Inflation of the 1970s is given short shrift â€” sometimes no shrift at all. This is wrong.', 'the-real-legacy-of-the-1970s', ',32,35,39,42,', 1, 1, '2019-03-02 09:33:00', '2019-09-18 07:49:43'),
(34, 'Saving Bats From Extinction', 1, 1, 0, '155147368365428.jpeg', '<p>By Jim Robbins</p>\r\n\r\n<p>February 19, 2019</p>\r\n\r\n<p>Biologists are searching caves and abandoned mines in the West, hoping to spare many species of the winged creatures from the devastating fungus, white-nose syndrome.</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/02/18/science/bats-white-nose-syndrome.html\" target=\"_blank\">Read more</a>.</p>\r\n\r\n<div id=\"gtx-trans\" style=\"left:-2px; position:absolute; top:60px\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', 'Biologists are searching caves and abandoned mines in the West, hoping to spare many species of the winged creatures from the devastating fungus, white-nose syndrome.', 'saving-bats-from-extinction', ',38,43,44,45,', 1, 1, '2019-03-02 09:54:43', '2019-11-02 07:26:17'),
(35, 'White Womenâ€™s Role in Perpetuating Slavery', 1, 1, 0, '155147420359829.jpeg', '<p>The full role of white women in slavery has long been one of the &ldquo;slave trade&rsquo;s best-kept secrets.&rdquo; &ldquo;They Were Her Property,&rdquo; a taut and cogent corrective, by Stephanie E. Jones-Rogers</p>\r\n', 'The full role of white women in slavery has long been one of the â€œslave tradeâ€™s best-kept secrets.â€ â€œThey Were Her Property,â€ a taut and cogent corrective, by Stephanie E. Jones-Rogers.', 'white-womens-role-in-perpetuating-slavery', ',31,32,35,', 1, 1, '2019-03-02 10:03:23', '2019-12-11 09:53:51'),
(36, 'Deserting Trump on Science', 1, 1, 0, '155147525644248.jpeg', '<p>New efforts by President Trump and his staff to question or undermine the established science of climate change have created a widening rift between the White House on one side, and scientific facts, government agencies, and some leading figures in the president&rsquo;s own party on the other. The president&rsquo;s senior advisers are exploring the idea of creating a panel aimed at questioning the National Climate Assessment.</p>\r\n', 'New efforts by President Trump and his staff to question or undermine the established science of climate change have created a widening rift between the White House on one side, and scientific facts, government agencies, and some leading figures in the presidentâ€™s own party on the other.', 'deserting-trump-on-science', ',25,26,28,31,', 1, 1, '2019-03-02 10:20:57', '2019-12-11 09:53:33'),
(38, 'Elizabeth Warrenâ€™s Brilliant Campaign', 1, 1, 1, NULL, '<p>After the second series of debates in late July, David Axelrod (Obama&rsquo;s campaign chair) writes in an op-ed that Warren has run a brilliant campaign so far. His main points are:</p>\r\n\r\n<p>1) Her personal narrative and her fundamental political message of reigning in corporate greed are perfectly integrated (a difficult task for most politicians).</p>\r\n\r\n<p>2) While she and Bernie align on many issues, &ldquo;where Sanders sometimes seems like a parody of himself&hellip;Warren seems fresher, deeper, and more precise in her execution.&quot; (more)</p>\r\n\r\n<p><a href=\"https://www.washingtonexaminer.com/news/top-obama-adviser-david-axelrod-elizabeth-warren-running-a-strategically-brilliant-campaign\" target=\"_blank\">https://www.washingtonexaminer.com/news/top-obama-adviser-david-axelrod-elizabeth-warren-running-a-strategically-brilliant-campaign</a></p>\r\n', 'After the second series of debates in late July, David Axelrod (Obamaâ€™s campaign chair) writes in an op-ed  that Warren has run a brilliant campaign so far.                  ', 'elizabeth-warrens-brilliant-campaign', ',38,', 1, 0, '2019-09-27 07:22:47', '2019-11-30 09:02:30'),
(39, 'Endangered Species Act Significantly Undermined', 1, 1, 0, '156956956791738.jpeg', '<p>The Environmental Protection Agency (EPA) has taken a first step towards weakening the 1973 Endangered Species Act.</p>\r\n\r\n<p>The new regulations will make it much easier to remove species from the Endangered Species list, and current wildlife on the threatened species list (one step down from Endangered Species) will not be as well protected as they are now. Also, the effects of climate change on habitats will not receive much weight when decisions are being made regarding logging, land use, etc.</p>\r\n\r\n<p>This is all to say that these new regulations are meant to pave the way for clearcutting (deforestation), oil/gas exploitation, and housing developments. (more)</p>\r\n\r\n<p><a href=\"https://www.vox.com/science-and-health/2019/8/12/20802132/endangered-species-act-trump-weakening\" target=\"_blank\">https://www.vox.com/science-and-health/2019/8/12/20802132/endangered-species-act-trump-weakening</a></p>\r\n', 'The Environmental Protection Agency (EPA) has taken a first step towards weakening the Endangered Species Act.', 'endangered-species-act-significantly-undermined', ',31,', 1, 1, '2019-09-27 07:32:47', '2019-09-27 07:32:47'),
(40, 'Communist Chinaâ€™s Baseless Accusations', 1, 1, 0, '156956970246672.jpeg', '<p>The Chinese communist regime&rsquo;s explanation for the Hong Kong riots during the summer of 2019 is that &ldquo;Black Hand&rdquo; of U.S. provocateurs is at work. These are baseless accusations characteristic of autocratic regimes that have caused the social upheavals themselves.</p>\r\n\r\n<p>In Hong Kong&rsquo;s case, the &ldquo;two systems, one country&rdquo; pledge when Hong Kong was &ldquo;turned over&rdquo; to Communist China in 1997 has obviously not worked, so Hong Kong residents are now demanding the democratic rights that were promised. The latest round of protests was sparked by the extradition law that the puppet government in Hong Kong was about to impose, a law that would have silenced future opposition to Communist China since Hong Kong residents can be immediately extradited to China for virtually any offenses.</p>\r\n\r\n<p>To read more about the baseless accusations leveled at the U.S.</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/08/08/world/asia/hong-kong-black-hand.html\" target=\"_blank\">https://www.nytimes.com/2019/08/08/world/asia/hong-kong-black-hand.html</a></p>\r\n', 'The Chinese communist regimeâ€™s explanation for the Hong Kong riots during the summer of 2019 is that â€œBlack Handâ€ of U.S. provocateurs is at work.', 'communist-chinas-baseless-accusations', ',39,', 1, 1, '2019-09-27 07:35:02', '2019-09-27 07:35:02'),
(41, 'Economic Inequality and the Hong Kong Protests', 1, 1, 0, '156956978361507.jpeg', '<p>Extreme income inequality is at the root of the anti-China protests in Hong Kong. Hong Kong represents perhaps the developed world&rsquo;s most extreme case of income inequality. Rents in Hong Kong are even higher than rent paid by denizens in New York City and San Francisco. And, given that the minimum wage in Hong Kong is only &#36;4.82 an hour, it is easy to see how many of Hong Kong&rsquo;s masses end up in cubbyholes with little prospect of upward mobility.</p>\r\n\r\n<p>Exacerbating this situation is the fact that a college degree isn&rsquo;t worth very much in Hong Kong: College graduates often end up in dead end jobs. Thus, the pro-democracy protests are not just political protests, but are anguished expressions of economic frustration. (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/interactive/2019/07/22/world/asia/hong-kong-housing-inequality.html\" target=\"_blank\">https://www.nytimes.com/interactive/2019/07/22/world/asia/hong-kong-housing-inequality.html</a></p>\r\n', 'Extreme income inequality is at the root of the anti-China protests in Hong Kong. ', 'economic-inequality-and-the-hong-kong-protests', ',39,', 1, 1, '2019-09-27 07:36:24', '2019-09-27 07:36:24'),
(42, 'Climate Change and A Lethal Fungus', 1, 1, 0, '156956989333232.jpeg', '<p>Arturo Casadevall, chair of molecular microbiology and immunology at the Johns Hopkins School of Public Health and his colleagues just issued a report on a deadly fungus, Candida auris, that kills approximately 30&#37; of infected people.</p>\r\n\r\n<p>C. auris first appeared in humans in 2009, with genetically different strains afflicting people on three different continents simultaneously, researchers said.</p>\r\n\r\n<p>&quot;What could be common to Venezuela, South Africa and India at the same time? These are different regions, populations, climates, you name it,&quot; Casadevall said.</p>\r\n\r\n<p>Most fungi cannot survive in warm environments such as the human body, but C. auris has adapted to thrive in warmth.</p>\r\n\r\n<p>Researchers hypothesize that C. auriis&rsquo;s mutation is the direct result of global warming and that such adaptations by deadly strains of fungi and other infectious agents could very well occur with increasing frequency as global warming continues apace. Dr. Casadevall states that C. auris could be the &ldquo;canary in the coal mine,&rdquo; warning us that this is just the tip of the iceberg. (more)</p>\r\n\r\n<p><a href=\"https://www.webmd.com/a-to-z-guides/news/20190724/climate-change-blamed-for-deadly-fungus-risk#1\" target=\"_blank\">https://www.webmd.com/a-to-z-guides/news/20190724/climate-change-blamed-for-deadly-fungus-risk#1</a></p>\r\n', 'A deadly fungus has appeared in several different areas of the world.  Scientists believe climate change is the cause of this extremely toxic fungus and predict that this is just the tip of the iceberg.', 'climate-change-and-a-lethal-fungus', ',31,33,', 1, 1, '2019-09-27 07:38:14', '2019-12-01 15:38:31'),
(43, 'Activities that Lower  Risk of Mild Cognitive Impairment', 1, 1, 0, '156957003183123.jpeg', '<p>Two thousand subjects 70 years of age and older were followed for five years to see whether their level of activity in 5 areas--reading books, computer use, social activities, playing games, craft activities)&mdash;was associated with differences in mental functioning. The results showed that high levels of participation in these activities were correlated with a lower risk of developing cognitive impairment. (more)</p>\r\n\r\n<p><a href=\"https://n.neurology.org/content/93/6/e548\" target=\"_blank\">https://n.neurology.org/content/early/2019/07/10/WNL.0000000000007897</a></p>\r\n', 'Which activities help seniors maintain their mental acuity according to a recent study?', 'activities-that-lower-risk-of-mild-cognitive-impairment', ',33,', 1, 1, '2019-09-27 07:40:31', '2019-12-01 15:38:25'),
(44, 'Wealthy Parents are Giving Up Custody', 1, 1, 1, '156957010228647.jpeg', '<p>A strange phenomenon has just been uncovered by observers of the college applications scene: Based on reports from college admissions officers, it appears that some affluent parents who can well afford to pay full tuition as well as room &amp; board, are adopting the strategy of giving up custody of their children, so that they can qualify for financial aid and loans by declaring financial independence. In some cases, the families live in multi-million dollar homes. (more)</p>\r\n\r\n<p><a href=\"https://abc13.com/education/wealthy-parents-giving-up-custody-of-kids-for-financial-aid/5432007/\" target=\"_blank\">https://abc13.com/education/wealthy-parents-giving-up-custody-of-kids-for-financial-aid/5432007/</a></p>\r\n', 'Why are wealthy parents giving up custody of their children in their late teens?', 'wealthy-parents-are-giving-up-custody', ',29,43,', 1, 1, '2019-09-27 07:41:42', '2019-11-13 18:38:00'),
(45, 'Deadly Heat Wave and Climate Change', 1, 1, 1, '156957024078955.jpeg', '<p>The deadly heat wave that swept over Europe and the U.S. in late July, 2019, has moved to Greenland, melting ice at a near record pace. Was climate change responsible? World Weather Attribution, a group of scientists that analyzes events to see if they can be attributed to climate change, stated that climate change most likely exacerbated the heat wave and made it 10 time worse than it would have been without the effects of global warming (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/08/02/climate/european-heatwave-climate-change.html\" target=\"_blank\">https://www.nytimes.com/2019/08/02/climate/european-heatwave-climate-change.html</a></p>\r\n', 'The deadly heat wave that swept over Europe and the U.S. in late July, 2019,  has moved to Greenland, melting ice at a near record pace.', 'deadly-heat-wave-and-climate-change', ',31,', 1, 1, '2019-09-27 07:44:00', '2019-11-13 18:37:53'),
(46, 'Elizabeth Warrenâ€™s Plan to Break Up Big Tech', 1, 1, 1, '156957033223987.jpeg', '<p>Elizabeth Warren will break up big tech monopolies&mdash;Amazon, Google, and more&mdash;because the concentration of corporate power has led to the decline of middle class incomes and is at the root of America&rsquo;s extreme income inequality. This will represent a significant reversal of the American government&rsquo;s four decades long trend towards allowing mergers, conglomerates, and resulting mega-monopolies to dominate. The result has been stagnant wages, decreasing competition, the diminishing power of labor and a country where the top 1 percent of Americans own 40&#37; of America&rsquo;s wealth.</p>\r\n\r\n<p>Warren&rsquo;s plan would designate big tech companies like Amazon, Apple and Google as &ldquo;platform utilities&rdquo; and they will be prohibited from combining ownership of the platform with doing business on the platform themselves.</p>\r\n\r\n<p><a href=\"https://www.newyorker.com/business/currency/how-elizabeth-warren-came-up-with-a-plan-to-break-up-big-tech\" target=\"_blank\">https://www.newyorker.com/business/currency/how-elizabeth-warren-came-up-with-a-plan-to-break-up-big-tech </a></p>\r\n\r\n<p><a href=\"https://www.salon.com/2014/09/27/4_ways_amazons_ruthless_practices_are_crushing_local_economies_partner/\" target=\"_blank\">https://www.salon.com/2014/09/27/4_ways_amazons_ruthless_practices_are_crushing_local_economies_partner/</a></p>\r\n', 'Elizabeth Warren will break up big tech monopoliesâ€”Amazon, Google, and moreâ€”because the concentration of corporate power has led to the decline of middle class incomes and is at the root of Americaâ€™s extreme income inequality.', 'elizabeth-warrens-plan-to-break-up-big-tech', ',27,38,', 1, 1, '2019-09-27 07:45:32', '2019-11-13 18:37:46'),
(47, 'Devastating Brazilian Rainforest Fires', 1, 1, 1, '156957043816015.jpeg', '<p>Hundreds of fires are spreading through Brazil&rsquo;s rainforest at a record rate. Many call it an &ldquo;ecological disaster&rdquo; as the health of the rainforest ecosystem, two-thirds of which is in Brazil, affects the entire world. The rainforest stores massive amounts of carbon (86 billion tons, or over 1/3 of all carbon stored by tropical forests in the world) and emits significant amounts of the world&rsquo;s oxygen. But when the rainforest burns, it becomes a huge source of carbon emissions, so instead of being a carbon storage sink, Brazil&rsquo;s raging rainforest fires are turning the rainforest into a major contributor to global warming.</p>\r\n\r\n<p>Brazil&rsquo;s rainforest is being destroyed rapidly in recent years, in large part due to the policies of President Bolsonaro, the right wing demagogue whose policies have encourage deforestation, and commercial exploitation of the rainforest.</p>\r\n\r\n<p>But after a few days of intense fires, and Bolsonaro&rsquo;s seeming indifference, he is finally feeling the heat after European countries threatened to boycott Brazilian products and cancel a major trade deal. The Trump administration has, so far, remained silent. As a result of European threats, Bolsonaro just announced that he would order Brazil&rsquo;s armed forces to start putting out fires, a rare step, given that he has been complicit in encouraging the destruction of the rainforest from the very beginning of his presidency. (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/08/23/world/americas/brazil-military-amazon-fire.html\" target=\"_blank\">https://www.nytimes.com/2019/08/23/world/americas/brazil-military-amazon-fire.html</a></p>\r\n', 'Hundreds  of fires are spreading through Brazilâ€™s rainforest at a record rate. Many call it an â€œecological disaster.â€', 'devastating-brazilian-rainforest-fires', ',31,', 1, 1, '2019-09-27 07:47:19', '2019-11-13 18:36:58'),
(48, 'Is the US. Headed for a Recession?', 1, 1, 1, '156957056816538.jpeg', '<p>The short answer to whether we are headed for a recession is: No one knows, not even the so-called experts. But what is certain is that a recession is what the Trump administration most fears, because a healthy economy is widely seen as a big plus for Donald Trump&rsquo;s reelection chances. And a recession may just upend his hopes for a second term.</p>\r\n\r\n<p>Let&rsquo;s look at the main factors that sometimes precede a recession.. The first is an inverted yield curve. Long term bonds usually have higher yields than short term bonds, but right now, in the summer of 2019, it&rsquo;s the other way around&mdash;long term bonds have lower yields than short term ones. But this is by no means a foolproof sign of an upcoming recession. It merely increases the chances of one.</p>\r\n\r\n<p>A second sign of a possible recession is that global growth is slowing down in major countries such as China, Germany, and the UK. We don&rsquo;t see solid signs of slowing in the U.S. yet, but it may happen in the near future. If economic growth does slow down and it becomes a persistent trend, then a recession is much more likely.</p>\r\n\r\n<p>So, right now, we can only say that a recession could occur, but it&rsquo;s not definite, and if it does happen, no one knows when.</p>\r\n\r\n<p>However, a long term trend that seems to be brewing could cause recessionary pain down the line or worse. Despite low unemployment rates in the U.S., stagnation in wages and the extreme income inequality that has persisted over the long term could eventually lead to a protracted economic downturn&mdash;even a depression. (more)</p>\r\n\r\n<p><a href=\"https://www.forbes.com/sites/simonmoore/2019/08/20/what-key-recession-indicators-are-telling-us-today/#48a575182156\" target=\"_blank\">https://www.forbes.com/sites/simonmoore/2019/08/20/what-key-recession-indicators-are-telling-us-today/#48a57518215</a></p>\r\n', 'The short answer to whether we are headed for a recession is:  No one knows, not even the so-called experts', 'is-the-us-headed-for-a-recession', ',27,', 1, 1, '2019-09-27 07:49:29', '2019-12-11 09:52:34'),
(49, 'Birds Are Facing Extinction   ', 1, 1, 1, '156957066988449.jpeg', '<p>An earth without birds. No chirping sounds, no fluttering wings. Silence. Whether or not we can imagine a bird-less world, it&rsquo;s coming. According to a new study conducted by a team of university, government, and non-profit researchers, a world devoid of birds is our future, perhaps our near future.</p>\r\n\r\n<p>The study, published in the highly-respected journal, Science, surveyed 76 percent of all bird species (over 500 species) in the U.S. and Canada, a population that represents close to the entire population of birds in the world.</p>\r\n\r\n<p>What the team found shocked researchers: there are now almost 3 billion fewer birds than there were &frac12; a century ago. The number of birds in the U.S. and Canada alone has declined by almost 30 percent since 1970. The study underscored that this precipitous decline included even common birds such as sparrows, robins, and other common bird species.</p>\r\n\r\n<p>The key causes are habitat loss and pervasive pesticide usage. But the decimation of birds has ramifications that go beyond the extinction of other categories of wildlife. Referring to the massive loss of birds, Conservation biologist, Kevin Gaston, states: &ldquo;This is the loss of nature.&rdquo;</p>\r\n\r\n<p>Because common bird species constitute the foundation of whole ecosystems&mdash;through their activities as pest controllers, plant pollinators, seed spreaders, and forest regenerators&mdash;their precipitous decline means that nature is in peril.</p>\r\n\r\n<p>Hopefully, the public, especially bird watchers, nature lovers, and conservation organizations, will be able to launch a full-scale movement to make the earth more bird-friendly. Stopping the extinction of birds will require a large scale political movement on the part of concerned citizens around the world. Without such a movement, not only are birds doomed, but the end of nature will be here soon, perhaps sooner than the most pessimistic experts had predicted. (<a href=\"https://www.nytimes.com/2019/09/19/science/bird-populations-america-canada.html\" target=\"_blank\">more</a>)</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'An earth without birds.  No chirping sounds, no fluttering wings.  Silence.   Whether or not we can imagine a bird-less world, itâ€™s coming. ', 'birds-are-facing-extinction', ',31,', 1, 1, '2019-09-27 07:51:09', '2019-12-11 10:53:19'),
(62, 'Bidenâ€™s Gaffes? Not Really. Itâ€™s his Stuttering', 1, 1, 1, '157516478515723.jpeg', '<p>People should realize that Biden&rsquo;s so-called gaffes are really behaviors that are common to stutterers. Even the oft-heard rumor that he is declining mentally and that he is cognitively slow can be dismissed because stutterers often give people that impression even though they could be the smartest and youngest person in the room.</p>\r\n\r\n<p>That Biden has a documented history of stuttering dating back to early childhood is not something that is widely-known. But it&rsquo;s true. Just ask his childhood friends, including the ones who teased him mercilessly about his stuttering. A family story, which Biden recently related to an Atlantic interviewer, illustrates the suffering and humiliation Biden underwent as a stutterer when he was young:</p>\r\n\r\n<p>One day in 7th grade the students had to take turns reading a passage. Biden still remembers that he was waiting and rehearsing his passage with trepidation as he knew he would trip over certain sounds. When it was his turn, he couldn&rsquo;t say the word &ldquo;gentleman&rdquo; in one smooth flow without stuttering, so he separated it into two words, gentle and man. This was the trigger for the teacher, a nun, who proceeded to taunt him by saying, &ldquo;Mr. Buh-Buh-Buh-Biden, what&rsquo;s that word?&rsquo;&rdquo; Biden was so humiliated and angry that he got up, left the class, and walked home. As the story goes, his mother drove him back to school and told the teacher, &ldquo;You do that again, I&rsquo;ll knock your bonnet off your head&#33;&rdquo;</p>\r\n\r\n<p>Stuttering is a lifelong affliction, the cause of which is still largely a mystery even though researchers agree that there is a strong genetic component. It afflicts approximately 3 million Americans and 70 million in the world. For many, stuttering improves through the life course, but they are never rid of it completely. Stuttering used to be attributed to psychological problems, but studies have never supported this hypothesis. Now, scientists agree that there is a physiological and/or neurological basis, but there is no agreement as to what it is.</p>\r\n\r\n<p>As for the relationship between stuttering and intelligence? There is none. These are a few famous historical figures who stuttered: Moses, Isaac Newton, Lewis Carroll, Clausius, Winston Churchill, James Earl Jones, Marilyn Monroe. So, next time, when you see Biden or anyone else stumble over words, commit so-called gaffes, or seem to be cognitively slow, take a deep breath and tell yourself that he or she could just be stuttering or trying hard not to stutter. (<a href=\"https://www.theatlantic.com/magazine/archive/2020/01/joe-biden-stutter-profile/602401/\" target=\"_blank\">more</a>)</p>\r\n', 'People should realize that Bidenâ€™s so-called gaffes are really behaviors that are common to stutterers.  ', 'bidens-gaffes-not-really-its-his-stuttering', ',38,', 1, 1, '2019-12-01 14:46:25', '2019-12-01 14:46:25'),
(63, 'Rachel Maddowâ€™s Blowout &amp; Naomi Kleinâ€™s On Fire', 1, 1, 1, '157516481081619.jpeg', '<p>Rachel Maddow&rsquo;s new book Blowout must be read together with Naomi Klein&rsquo;s On Fire. &nbsp;Blowout first and then On Fire. &nbsp; Why in this order?</p>\r\n\r\n<p>Blowout is Maddow&rsquo;s expose of the captains of the international fossil fuel industry and the consequences for the world. &nbsp; Maddow tells the story in her unique style&mdash;penetrating interweaving of facts with personalities situated in a multi-strand historical and political context, all spiced with her signature sarcasm. &nbsp;It&rsquo;s an engaging read for everyone who wants to know how the oil and gas industry has corrupted democracy, created rogue states like Russia, and become the most destructive industry on earth. &nbsp; It&rsquo;s a riveting tale, but something is missing: &nbsp;As Fareed Zakaria, the New York Times reviewer said, &ldquo;Blowout is a brilliant description of many of the problems caused by our reliance on fossil fuels. &nbsp;But it does not provide a path out of the darkness.&rdquo;</p>\r\n\r\n<p>What does provide a path out of the darkness is Naomi Klein&rsquo;s On Fire. To counter the state of enlightenment-induced depression you may be in after reading Blowout, you need to read On Fire, because Naomi Klein does offer a path out. &nbsp;While Blowout focuses on the political entanglements and impact of the rapacious fossil fuel industry, On Fire focuses on mot just the widespread ecological destruction that capitalism has wrought around the word but also on the grass roots movements that have emerged to combat humanity&rsquo;s downward spiral towards an ecological apocalypse. &nbsp;But not all is gloom and doom in On Fire: &nbsp;Much of this book of long-form essays is devoted to discussing &nbsp;what a &ldquo;serious climate change agenda&rdquo; would look like. &nbsp;Klein talks about re-localizing production to reduce the need for long haul transport, rethinking the &ldquo;growth imperative&rdquo; that drives consumerism, the absolute incompatibility of growth and a sound climate policy, the need to tax the &ldquo;rich and the filthy,&rdquo; and how power must be dispersed and cultural values transformed. &nbsp;</p>\r\n\r\n<p>Klein saves the most inspiring part of the book&mdash;the Green New Deal&mdash;for the coda, the ending. &nbsp;She states unequivocally that all the promise of the Green New Deal&mdash;the massive job creation focused on green industries; &nbsp;raising funds through taxing rich corporations, especially the polluters; setting a ten year deadline for getting off fossil fuels, the strong commitment to social justice/economic equity&mdash;will not materialize unless grass roots movements pushing for such foundational changes emerge in full force. &nbsp;</p>\r\n\r\n<p>On Fire is a rousing rallying cry for people to take action to combat the environmental destruction and gross economic inequalities that unfettered capitalism and the nefarious fossil fuel industry have created, an industry whose devastating &nbsp;global political consequences are told in riveting narrative strands in Blowout.</p>\r\n', 'Rachel Maddowâ€™s new book Blowout must be read together with Naomi Kleinâ€™s On Fire. Blowout first and then On Fire. Why in this order?', 'rachel-maddows-blowout-naomi-kleins-on-fire', ',26,', 1, 1, '2019-12-01 14:46:51', '2019-12-01 14:46:51'),
(64, 'Elizabeth Warrenâ€™s Latest Healthcare Plan', 1, 1, 1, '157516507421925.jpeg', '<p>Elizabeth Warren has further clarified her Medicare for all rollout plan. It is a 2 stage, 3 year process:<br />\r\nDuring her first 100 days as president, she vows to do the following:</p>\r\n\r\n<ol>\r\n	<li>Expand Medicare coverage to include all American children up to the age of 18, families of four earning less than &#36;50,000 (double the federal poverty level), and Americans over the age of 50.</li>\r\n	<li>Improve current Medicare coverage by including vision, dental, hearing, mental health, and long-term care.</li>\r\n	<li>Lower prescription drug prices immediately.</li>\r\n</ol>\r\n\r\n<p>After three years, the program would expand to include everyone and private health insurance would be phased out and replaced by a national single-payer system.</p>\r\n\r\n<p>Warren estimates that her plan would cost about 20.5 trillion in new federal spending over 10 years and proposes to pay for it through cost cutting such as lowering drug prices, reducing administrative costs, and reducing physician pay to Medicare levels; &nbsp;increasing her proposed tax on billionaires from 3&#37; to 6&#37;; funneling state/local health care spending into federal coffers; taxes on large corporations, financial firms, and the top 1 &#37;; increased tax enforcement; reduced defense spending, etc. &nbsp;(<a href=\"https://www.washingtonpost.com/politics/2019/11/05/warrens-plan-pay-medicare-for-all-does-it-add-up/\" target=\"_blank\">more</a>)</p>\r\n\r\n<p>She underscores again that the middle class will NOT be taxed.</p>\r\n\r\n<p>Is Warren&rsquo;s latest Medicare-for-all specifics feasible? &nbsp;Well, the numbers from all the different components of cost cutting and increased taxation listed above do add up according to the specialists. &nbsp;But that has not stopped criticisms of the assumptions she relies on for her projections.</p>\r\n\r\n<p>We have to applaud her for having the courage to lay out specifics, something no other Dem candidate has done yet, not even Bernie, who prefers to just say that while the middle class will pay increased taxes for Medicare-for-All, their overall medical spending will decrease as there will not be deductibles, co-pays, gaps in coverage, etc. &nbsp;</p>\r\n\r\n<p>At the end of the day, numbers crunching is easy, and Elizabeth Warren&rsquo;s plan is feasible, but the political will needed to make it reality is not on the horizon currently, given that the groups that stand to lose a lot (private insurance companies) will fight Medicare-for-All to the bitter end. But there could come a time when the stars will more less align and, with the right president, America will join virtually all other developed countries in providing government-sponsored universal healthcare coverage for everyone.<br />\r\n&nbsp;</p>\r\n', 'Elizabeth Warren has further clarified her Medicare for all rollout plan. It is a 2 stage, 3 year process.', 'elizabeth-warrens-latest-healthcare-plan', ',38,', 1, 1, '2019-12-01 14:51:14', '2019-12-01 14:52:10'),
(66, 'Medicare for All: Is it Feasible?', 1, 1, 1, '157516607689772.jpeg', '<p>The short answer is: &nbsp;Yes, Medicare-for-All is definitely feasible for the U.S. &nbsp;</p>\r\n\r\n<p>Medicare-for-All, a single payer universal coverage program in which all Americans, not just senior citizens, will get health care through the government is feasible, because it &nbsp;has a proven track record in countries where such health care systems have long been in operation&nbsp;</p>\r\n\r\n<h2><strong>Disadvantages of Our Current System:</strong></h2>\r\n\r\n<p>Don&rsquo;t forget that the main reasons for switching from our current complicated system--seniors on Medicare and most others on a combination of workplace insurance, self-insurance, or no insurance--to&nbsp;Medicare-for-All are the following<strong>:</strong></p>\r\n\r\n<ol>\r\n	<li>Many Uninsured Americans: &nbsp;Many Americans are NOT covered by health insurance as of 2018, almost 14&#37; of Americans lack health insurance due to Republican attacks on Obamacare (Republicans eliminated the insurance mandate and made Medicaid increasingly hard to obtain)</li>\r\n	<li>Health Outcomes in American are &nbsp;poor compared to other developed countries. The U.S. now has the lowest expected life span at birth compared to other developed countries. (<a href=\"https://www.healthsystemtracker.org/chart-collection/u-s-life-expectancy-compare-countries/#item-le_the-u-s-has-the-lowest-life-expectancy-at-birth-among-comparable-countries_2019\" target=\"_blank\">more</a>)&nbsp;</li>\r\n	<li>America&rsquo;s healthcare costs are the highest in all developed countries (10,224 per capita in 2017 compared to &#36;4,246 in the UK). (<a href=\"https://www.healthsystemtracker.org/chart-collection/health-spending-u-s-compare-countries/#item-average-wealthy-countries-spend-half-much-per-person-health-u-s-spends\" target=\"_blank\">more</a>)&nbsp;</li>\r\n	<li>Inadequate coverage even for insured Americans. Among developed countries, we have the most expensive healthcare system, one with unsustainable skyrocketing costs and poorer outcomes as reflected in shorter life expectancies. &nbsp;Also, just as worrisome is the fact that many insured people have insufficient coverage and 15.5&#37; have NO health insurance (2018). (<a href=\"https://www.forbes.com/sites/joshuacohen/2018/07/06/troublesome-news-numbers-of-uninsured-on-the-rise/#45442e7f4309\" target=\"_blank\">more</a>)</li>\r\n</ol>\r\n\r\n<h2><strong>Obstacles to Medicare-for-All:</strong></h2>\r\n\r\n<h3><strong>Two primary obstacles are: &nbsp;</strong></h3>\r\n\r\n<ol>\r\n	<li>The for-profit private healthcare insurance companies, &nbsp;hospitals, &nbsp;and big pharma will fight Medicare-for-All to the bitter end. &nbsp;They have everything to lose and nothing to gain.</li>\r\n	<li>People who are covered through their workplace are generally &ldquo;satisfied&rdquo; with their coverage, because many who have never had to use their health insurance &ldquo;benefits&rdquo; beyond a limited extent, don&rsquo;t know that &nbsp;even people with health insurance can go bankrupt because their insurance is inadequate.</li>\r\n</ol>\r\n\r\n<p>Physicians for a National Health Program (PNHP), Dr. David U. Himmelstein, M.D. said: &nbsp;&ldquo;For middle-class Americans, health insurance offers little protection. Most of us have policies with so many loopholes, copayments and deductibles that illness can put you in the poorhouse.&rdquo; &nbsp;(<a href=\"https://www.nasdaq.com/article/medical-bankruptcy-is-killing-the-american-middle-class-cm1099561\" target=\"_blank\">more</a>)</p>\r\n\r\n<h3><strong>Reasons for Optimism</strong></h3>\r\n\r\n<p>Despite the complacency of people who &ldquo;like&rdquo; their existing health insurance and the fact that health insurance companies will fight tooth and nail against Medicare-for-All, there are reasons for optimism when it comes to changing to a single payer government-run system. &nbsp;&nbsp;</p>\r\n\r\n<p>There are at least a few reasons for optimism: &nbsp;Two other major players in the healthcare system&mdash;doctors and companies that offer healthcare to their employees&mdash;are not adamantly opposed to Medicare-for-All as the insurance companies would have you believe..</p>\r\n\r\n<p>In a recent survey, almost 50&#37; of physicians support Medicare-for-All (<a href=\"https://www.fiercehealthcare.com/practices/poll-finds-49-doctors-support-medicare-for-all\" target=\"_blank\">more</a>) despite knowing that they may earn less under such a system.</p>\r\n\r\n<p>There are no surveys as yet of CEOs who support Medicare-for-All, but there are individual CEOs who have spoken up to support a single payer healthcare system. &nbsp;They cite the advantages of a portable healthcare insurance and the burden of being responsible for the ever increasing cost of offering healthcare to employees&mdash;which often means they can&rsquo;t offer pay raises. &nbsp;And they say that a single payer system will relieve them of the huge administrative responsibility of managing an employee healthcare insurance program. (<a href=\"https://khn.org/news/a-large-employer-frames-the-medicare-for-all-debate/\" target=\"_blank\">more</a>)</p>\r\n\r\n<p>All in all, there are reasons to believe that the obstacles can be overcome and all major healthcare players&mdash;with the exception of for-profit healthcare companies, hospitals, big pharma&mdash;can be persuaded. &nbsp;</p>\r\n\r\n<p>After all, surveys show that currently (2019), 70&#37; of Americans support Medicare-for-All. &nbsp;(<a href=\"https://khn.org/news/a-large-employer-frames-the-medicare-for-all-debate/\">more</a>).</p>\r\n\r\n<h2><strong>Medicare-for-All Can Take Many Forms</strong></h2>\r\n\r\n<p>Medicare -for-All can take many forms. &nbsp;And, because the U.S. has been so mired in a complex &nbsp;system of healthcare in which for-profit companies and the government have been jointly involved, unwinding the entangled system will not be easy. &nbsp;In any case, Western European democracies, the UK, and a number of other countries such as Taiwan, all have universal health care, but each has its own unique characteristics.</p>\r\n\r\n<h2><strong>UK System</strong>: &nbsp;</h2>\r\n\r\n<p>Single Payer System administered by national government. &nbsp;The health care system in the United Kingdom, the NHS (National Health Service) is the oldest, having started right after WWII. &nbsp;These are the primary characteristics of UK&rsquo;s universal health care system:</p>\r\n\r\n<ul>\r\n	<li>Only one medical authority that pays for and administers the system&mdash;the National Health Service&mdash;through taxes paid to the national government. &nbsp;The national government owns and operates hospitals.</li>\r\n	<li>Relatively comprehensive coverage&mdash;includes dental and vision and virtually all necessary prescription drugs.</li>\r\n	<li>Doctors are government employees and are paid directly by the national government</li>\r\n	<li>The only private insurances companies allowed are ones that cater to mostly high income people who would like more extras such as shorter waits for elective surgeries and bells and whistles. &nbsp;About 10&#37; of affluent citizens have private health insurance.</li>\r\n	<li><strong>Pros</strong>: &nbsp;Per capital health care costs are quite low (at &#36;4246 per capita in 2017&mdash;it is the lowest among developed countries), much lower than in the U.S.(at &#36;10,224 per capita in 2018&mdash;it is the highest among developed countries), and most basic healthcare services are adequate. &nbsp;Prescription drug prices are significantly lower than in many other developed countries, mainly because the NHS negotiates aggressively with drug companies and since NHS is the only buyer, drug companies have little choice but to sell at a lower price. &nbsp;Reason for the pros: &nbsp;If there are no for-profit middlemen insurance companies squeezing out profits, care can be much cheaper even when doctors are paid quite well as in the UK</li>\r\n	<li><strong>Cons</strong>: &nbsp;Sometimes the waits are long, especially for elective procedures.</li>\r\n</ul>\r\n\r\n<h2><strong>Canadian System:</strong> &nbsp;</h2>\r\n\r\n<p>Single-Payer System but administered by Provinces. &nbsp;Coverage not as good as UK&rsquo;s.</p>\r\n\r\n<ul>\r\n	<li>The national government collects taxes for healthcare and then distributes it to the 14 entities (10 provinces, 3 territories, and the military) that administers and pays for healthcare costs in their region. &nbsp;There are national guidelines that must be met.</li>\r\n	<li>The provinces that receive national government money, own and operate hospitals.</li>\r\n	<li>Doctors, dentists and midwives are NOT direct employees of the government. &nbsp;Physician organizations negotiate directly &nbsp;with provincial administrators over rates for services.</li>\r\n	<li>Coverage does not include vision, dental and prescription drugs. &nbsp;So, about 30&#37; of healthcare costs are not covered by the government.</li>\r\n	<li>65 to 75&#37; of Canadians pay private insurance companies for supplemental care. &nbsp;Poor families, seniors, and some minors receive government subsidies for supplemental care. But there are limits on how much private insurance companies can charge.</li>\r\n	<li><strong>Pros</strong>: &nbsp;Fairly good coverage, healthcare costs are much lower than in countries like the U.S. where private insurance companies play a much more significant role and can siphon off substantial profits. &nbsp;Prescription drug prices are among the highest compared to other developed countries.</li>\r\n	<li><strong>Cons</strong>: &nbsp;Complaints about wait times and the fact that vision, dental, and prescription drugs are not covered by the government. &nbsp;Prescription drug prices are lower than in the U.S. but much higher than in other countries. &nbsp;That&rsquo;s because unlike in the UK, prescription drugs are NOT covered by national healthcare &nbsp;dollars even though the provinces do try to negotiate for lower prices with the drug companies.</li>\r\n</ul>\r\n\r\n<p><strong>So, there are many ways that Medicare for All can be structured.</strong></p>\r\n\r\n<p>From the above glance at the UK and Canadian systems, it seems that the cheapest and most comprehensive system is a Medicare-for-All system that not only has a single payer (national government) &nbsp;but offers more comprehensive coverage (includes, prescription drugs, vision, dental) as in the UK. &nbsp; &nbsp;Ironically, a more comprehensive system (UK) will cost less than one that has less comprehensive coverage (Canada).</p>\r\n\r\n<p>Again, the worst and most expensive system in developed countries is America&rsquo;s, where many are uninsured, private insurance coverage is often inadequate, healthcare outcomes are relatively poor, and costs are very high. &nbsp;This is primarily because private for-profit health insurance companies play a major role and their goal is profits, not good healthcare.&nbsp;</p>\r\n\r\n<p>But there should be the option of private insurance for individuals in a single-payer Medicare-for-All system--for people who want shorter waits, access to particular specialists, etc. &nbsp;In the UK only 10&#37; have private health insurance on top of their government coverage. &nbsp;Even affluent UK citizens &nbsp;use government services for most of their basic medical needs. &nbsp;<br />\r\n&nbsp;</p>\r\n', 'The short answer is: Â Yes, Medicare-for-All is definitely feasible for the U.S. Â ', 'medicare-for-all-is-it-feasible', ',33,38,', 1, 1, '2019-12-01 15:07:56', '2019-12-12 18:31:46');
INSERT INTO `new_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `short_description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(67, 'Impeachment Chronicles December 19,  2019', 1, 85, 1, '157621607935463.jpeg', '<h2 style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:18px\"><span style=\"font-family:Georgia,serif\"><strong>Update:&nbsp; December 19, 2019</strong></span></span></h2>\r\n\r\n<p><span style=\"font-size:14px\"><span style=\"font-family:Georgia,serif\"><strong>Donald Trump was just impeached by the House, becoming the 3rd president in U.S. history to be impeached&nbsp;</strong></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">The House passed both articles of impeachment on Wednesday, December 18, by largely a partisan vote, with 229 Democrats voting yes on the Abuse of Power article (with 2 Democrats voting no, 1 voting present and 1 not voting).&nbsp; 195 Republicans voted no on the Abuse of Power article&nbsp; (with no Republicans voting&nbsp; yes, none voting present, and 2 not voting).&nbsp; For the second article of impeachment, Obstruction of Congress, 228 Democrats voted yes (with 3 voting no, 1 voting present, and 1 not voting).&nbsp; For the Republicans, 195 voted no on Obstruction of Congress (with 0 voting yes, 0 voting present and 2 not voting). &nbsp; Justin Amash, a Republican turned Independent, voted yes on both articles.</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><strong>So what happens now?</strong>&nbsp; Today, there were heated discussions of the rules of the Senate impeachment trial.&nbsp; Mitch McConnell, the Kentucky senator who is the Senate majority leader (the Republicans have 53 Senators, while the Democrats have 47)&nbsp; said on Tuesday that&nbsp;<span style=\"font-size:14px\"><span style=\"background-color:#ffffff; color:#000000; font-family:Lyon,Arial,Helvetica,sans-serif\">&ldquo;I would anticipate we will have a largely partisan outcome in the Senate. I&rsquo;m not impartial about this at all.&quot;<span style=\"color:#001000; font-family:sans-serif,Arial,Verdana,\"> (read <a href=\"https://www.cnbc.com/2019/12/18/trump-has-been-impeached-by-the-house-heres-what-happens-next.html\">more</a>)</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:14px\"><span style=\"background-color:#ffffff; color:#000000; font-family:Lyon,Arial,Helvetica,sans-serif\"><span style=\"color:#001000; font-family:sans-serif,Arial,Verdana,\">But the formal procedure calls for the House to send &quot;impeachment managers&quot; to the Senate (at Clinton&#39;s trial there were 13 Republican House managers), managers who will act as prosecutors. &nbsp; There is talk that the chairs of the Intelligence Committee (Adam Schiff) and Judiciary Committee (Jerry Nadler) will be among the managers sent by the House, so although it is a foregone conclusion that the Senate would vote to acquit President Trump because they hold the majority in the chamber, there will most likely be some fireworks before the trial concludes.</span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Georgia,serif\"><span style=\"font-size:18px\"><strong>Update:&nbsp; December 13, 2019</strong></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">The judiciary committee just voted to pass the two articles of impeachment--<strong>Abuse of Power and Obstruction of Congress</strong>.&nbsp; The enitre House will vote next week.</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-family:Georgia,serif\"><span style=\"font-size:18px\"><strong>Update:&nbsp; December 12, 2019</strong></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"font-size:14.0pt\">The House Judiciary Committee just concluded a debate over the articles of impeachment.&nbsp; </span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"font-size:14.0pt\">The two articles of impeachment are:&nbsp; 1.&nbsp; <strong>Abuse of Power</strong>&nbsp;&nbsp;&nbsp; 2.&nbsp; <strong>Obstruction of Congress.</strong>&nbsp; Both articles stem from actions taken by President Trump to pressure Ukraine to investigate his political rivals AND his attempts to obstruct congressional investigations into the matter. </span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"font-size:14.0pt\">A vote will be taken in the judiciary committee Friday morning, December 13, 2019.</span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\"><span style=\"font-size:11pt\"><span style=\"font-size:14.0pt\">After the judiciary committee votes, the whole House will vote sometime next week, and then, the case will be turned over to the Republican-controlled Senate for an impeachment trial.&nbsp; </span></span></p>\r\n\r\n<p>Read more <a href=\"https://www.nytimes.com/2019/12/12/us/politics/trump-impeachment.html\">here</a>:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Main issue that led to the impeachment hearings in the House of Representatives:&nbsp;</strong></p>\r\n\r\n<p><strong>Background:</strong></p>\r\n\r\n<p>An &nbsp;anonymous whistleblower reports that in a phone call on July 25 &nbsp;with Ukrainian President Zelensky. President Trump asked for an investigation of Joe Biden, his &nbsp;2020 political opponent, and Biden&rsquo;s son, as well as an investigation of Ukraine&rsquo;s &ldquo;involvement&rdquo; in the 2016 election on behalf of the Democrats (a conspiracy theory perpetrated by right wing media outlets). &nbsp;The complaint specifically charged that Trump exerted pressure on the Ukrainian government by withholding a &#36;400 aid package to Ukraine that Congress had already approved. &nbsp;</p>\r\n\r\n<p>The whistleblower was alarmed because he did not think it was right for President Trump to use his office to solicit foreign interference in the 2020 elections for his own political benefit by threatening to withhold military aid. &nbsp;This whistleblower&rsquo;s complaint was filed on August 12, with bits of information leaked to the press throughout August and early September before it was turned over to Congress on Sept. 9, and finally released on September 26.</p>\r\n\r\n<p>Later the complaint was largely corroborated by a transcript of the phone call released by the White House on September 25. &nbsp;(<a href=\"https://www.npr.org/2019/11/09/776173492/the-whistleblower-complaint-has-largely-been-corroborated-heres-how\" target=\"_blank\">more</a>)</p>\r\n\r\n<h2>November-December 2019: &nbsp;Key Takeaways &nbsp;of Impeachment Hearings so far:</h2>\r\n\r\n<p>The first two weeks of hearings. &nbsp;Key witnesses and important points:&nbsp;</p>\r\n\r\n<h3><strong>William Taylor, acting Ambassador to Ukraine: &nbsp;Key Point(s)</strong></h3>\r\n\r\n<p>He talked about two channels of American policy toward Ukraine, a regular channel that he operated in, and an &ldquo;irregular&rdquo; channel led by Trumps personal lawyer, Rudy Giuliani, and Mick Mulvaney, the acting White House chief of staff. &nbsp;Taylor states that it was through the &ldquo;irregular channel&rdquo; that military aid to Ukraine was used to pressure Ukrainian leaders to investigate Joe Biden in order to help Trump win in 2020. &nbsp;</p>\r\n\r\n<h3><strong>Jennifer Williams</strong></h3>\r\n\r\n<p>Aide to Vice President Mike Pence, Lt. Colonel Alexander Vindman National Security Council aide) and Tim Morrison, former National Security Council aide, all listened to President Trump&#39;s July 25 call with Ukraine&#39;s president and said Trump asked for the investigations on his own and did not have talking points (as is usually the case in such official calls). Vindman further described a July 10 meeting between National Security Advisor, John Bolton, and Ukraine&rsquo;s National Security advisor during which Gordon Sondland, America&rsquo;s European Union Ambassador, demanded an investigation of Joe Biden in return for a meeting between Ukraine&rsquo;s president and Trump. &nbsp;This quid pro quo demand was so disturbing to John Bolton that he cut the meeting short.</p>\r\n\r\n<h3><strong>Marie Yavanovitch, former Ambassador to Ukraine. &nbsp;</strong></h3>\r\n\r\n<p>Trump removed her from her ambassadorship in April, 2019. She describes a smear campaign against her led by Rudy Guiliani, Trump&rsquo;s lawyer, and conservative social media, because she refused to pressure Ukrainian officials to investigate the Bidens. &nbsp;Yovanovitch also testified &nbsp;that she was &quot; felt threatened&rdquo; by Trump&#39;s statement, in a phone call with Zelensky, that &quot;she&#39;s going to go through some things.&rdquo;</p>\r\n\r\n<h3><strong>Gordon Sondland, Ambassador to the European Union.</strong></h3>\r\n\r\n<p>E.U. Ambassador Sondland&rsquo;s testimony was most notable because he highlighted a phone conversation with President Trump. &nbsp;The key takeaway from Sondland&rsquo;s testimony was that &ldquo;everyone was &ldquo;in the loop,&rdquo; &nbsp;and emphasized that even though Trump never said in exact words that there was a quid pro quo, everyone knew that there was--meaning they all knew about Trump&rsquo;s pressure on Ukrainian leaders to investigate the Bidens, his political rivals, and to find dirt on Ukraine&rsquo;s so-called involvement in the 2016 election (a right-wing conspiracy theory). He specifically &nbsp;named Rudy Guiliani, Trump&rsquo;s personal lawyer, Mike Pompeo, the Secretary of State, Mike Pence, and Mick Mulvaney, Trump&rsquo;s Acting Chief of Staff. &nbsp;Sondland also spoke directly on Sept. 7th with Trump in a phone call during which Trump outlined his conditions for releasing military aid to Ukraine (<a href=\"https://www.justsecurity.org/67536/heres-the-proof-that-trumps-no-quid-pro-quo-call-never-happened/\" target=\"_blank\">more</a>)<br />\r\n<br />\r\n<strong>Fiona Hill, former National Security Council Russia expert, and David Holmes, Ukraine diplomat.</strong></p>\r\n\r\n<p>Both Holmes and Fiona Hill, a top Russian expert and a former member of the National Security Council gave eye-opening testimony about Trump&rsquo;s intense pressure campaign to force Ukraine to dig up political dirt by threatening to withhold military aid. &nbsp;Fiona Hill further testified that the right-wing conspiracy theory that Ukraine meddled in our 2016 elections was FICTION and serves Russian interests.&nbsp;</p>\r\n\r\n<p>David Holmes spelled out exactly &nbsp;how the quid pro quo worked and how everyone understood clearly that Trump was demanding that Ukrainian leaders investigate his political enemies in exchange for military aid. Homes testified that there was a conversation &nbsp;on July 26th between Trump and Sondland, which after which Sondland said that Trump didn&rsquo;t care about Ukraine, as he only cared about the &ldquo;big stuff,&rdquo; meaning the investigations of his political enemies. (<a href=\"https://www.washingtonpost.com/politics/2019/11/21/early-takeaways-fiona-hills-david-holmess-testimony/\" target=\"_blank\">more</a>)</p>\r\n\r\n<p>It is important to note that Trump finally released the aid package to Ukraine on Sept.. 11, after lots of news had already emerged about the attempt to withhold aid in exchange for investigations of his political enemies and after intense bipartisan pressure on his administration to release the aid.</p>\r\n\r\n<p>Read more about the impeachment hearings <a href=\"https://crooked.com/articles/impeachment-hearings-takeaways/\">here</a><br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Impeachment Basics:</strong></p>\r\n\r\n<p>The House of Representative is responsible for initiating impeachment proceedings against a public official, draws up articles of impeachment, and votes whether to impeach or not. &nbsp;If the House votes to impeach, then the case goes to the Senate for a trial. &nbsp;</p>\r\n\r\n<p><strong>The current problem: </strong>&nbsp;</p>\r\n\r\n<p>The House of Representatives is controlled by a Democratic majority and will most likely vote to impeach the President, especially since the quid pro quo case - you give me something I want and I will give you something beneficial in return--is so clear. &nbsp;But the Senate is controlled by Republicans because they have a majority (52 Republicans, 45 Democrats, and 2 Independents who usually support Democrats),and virtually all Republican senators are sticking by Trump.&nbsp;To convict a president in a Senate impeachment trial a 2/3 vote is needed. 66 senators must vote for impeachment, which means 19 Republicans will have to vote for impeachment along with all the Democrats.</p>\r\n\r\n<ol>\r\n	<li><strong>The executive branch:</strong> comprised of the president, the VP and most federal agencies. &nbsp;Function: &nbsp;To &nbsp;carry out and enforce the law. Has the right to veto bills passed by Congress.</li>\r\n	<li><strong>The legislative branch:</strong> comprised of the 2 houses that make up the Congress (House of Representatives and the Senate) Function: Writes and passes laws; &nbsp;Handles impeachment proceedings; &nbsp;Decides on budget allocations; &nbsp; Declares War</li>\r\n	<li><strong>The judicial branch:</strong> &nbsp;comprised of the federal courts and the highest court of the land, the Supreme Court. Function: &nbsp;Interprets the law and makes decisions about the constitutionality of laws.</li>\r\n</ol>\r\n\r\n<p>The reason there are 3 branches of the government is so that they can check and balance each other&rsquo;s power.&nbsp; (<a href=\"https://www.washingtonpost.com/opinions/2019/11/23/why-possible-contempt-count-matters-much-rest-impeachment-case/\">more</a>)</p>\r\n\r\n<p>The legal theory is straightforward and compelling. Impeachment is the mechanism that the Constitution provides for the gravest abuses of presidential powers. If the president himself can frustrate the remedy of impeachment, then it fundamentally alters the separation of powers and ultimately places the president above effective constitutional control.</p>\r\n', 'Updates on the developments surrounding the impeachment process', 'impeachment-chronicles-december-19-2019', ',38,', 1, 1, '2019-12-13 18:47:13', '2019-12-20 07:18:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_categories`
--

CREATE TABLE `new_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new_categories`
--

INSERT INTO `new_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(24, 'Animals', 'animals', 1, '2019-03-02 08:55:44', '2019-09-21 07:39:05'),
(25, 'Art', 'art', 1, '2019-03-02 08:55:50', '2019-03-02 08:55:50'),
(26, 'Books', 'books', 1, '2019-03-02 08:55:57', '2019-03-02 08:55:57'),
(27, 'Business & Economy', 'business-economy', 1, '2019-03-02 08:56:55', '2019-03-02 08:57:10'),
(28, 'Crime & Mysteries', 'crime-mysteries', 1, '2019-03-02 08:57:25', '2019-03-02 08:57:31'),
(29, 'Education', 'education', 1, '2019-03-02 08:57:38', '2019-03-02 08:57:38'),
(30, 'Entertainment', 'entertainment', 1, '2019-03-02 08:57:45', '2019-03-02 08:57:45'),
(31, 'Environment & Nature', 'environment-nature', 1, '2019-03-02 08:57:54', '2019-03-02 08:58:01'),
(32, 'Food & Restaurants', 'food-restaurants', 1, '2019-03-02 08:58:16', '2019-03-02 09:00:16'),
(33, 'Health & Medicine', 'health-medicine', 1, '2019-03-02 08:58:23', '2019-03-02 09:00:23'),
(34, 'Human Interest', 'human-interest', 1, '2019-03-02 08:58:34', '2019-03-02 08:58:34'),
(35, 'Movies & TV', 'movies-tv', 1, '2019-03-02 08:58:43', '2019-03-02 09:00:56'),
(36, 'Opinions & Editorials', 'opinions-editorials', 1, '2019-03-02 08:58:54', '2019-03-02 09:00:51'),
(37, 'Poetry', 'poetry', 1, '2019-03-02 08:59:01', '2019-03-02 08:59:01'),
(38, 'Politics National', 'politics-national', 1, '2019-03-02 08:59:08', '2019-03-02 08:59:08'),
(39, 'Politics International', 'politics-international', 1, '2019-03-02 08:59:20', '2019-03-02 08:59:20'),
(40, 'Psychology & Relationships', 'psychology-relationships', 1, '2019-03-02 08:59:29', '2019-03-02 09:00:44'),
(41, 'Religion', 'religion', 1, '2019-03-02 08:59:37', '2019-03-02 08:59:37'),
(42, 'Science & Technology', 'science-technology', 1, '2019-03-02 08:59:46', '2019-03-02 09:00:39'),
(43, 'Society & Lifestyles', 'society-lifestyles', 1, '2019-03-02 08:59:55', '2019-03-02 09:00:34'),
(44, 'Sports', 'sports', 1, '2019-03-02 09:00:00', '2019-03-02 09:00:00'),
(45, 'Travel', 'travel', 1, '2019-03-02 09:00:07', '2019-03-02 09:00:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_comments`
--

CREATE TABLE `new_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new_comments`
--

INSERT INTO `new_comments` (`id`, `user_id`, `article_id`, `parent_comment_id`, `content`, `status`, `created`, `updated`) VALUES
(7, 2, 2, 0, 'Good well 2', 0, '2018-10-14 05:44:11', '2018-10-18 16:20:05'),
(9, 4, 2, 0, 'Good well 1', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(18, 1, 2, 0, 'Good well 4', 0, '2018-10-14 05:44:11', '2018-10-17 20:49:37'),
(19, 2, 2, 0, 'Awesome', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(22, 1, 5, 0, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(28, 1, 2, 0, 'Excellent3', 1, '2018-10-14 05:44:11', '2018-10-18 02:48:21'),
(30, 1, 2, 0, 'Excellent5', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(31, 2, 2, 0, 'Excellent6', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(32, 2, 2, 7, 'Excellent7', 0, '2018-10-14 05:44:11', '2018-10-20 00:36:36'),
(33, 4, 3, 0, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 1, 5, 0, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(35, 1, 2, 0, 'Excellent10', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(36, 1, 2, 0, 'Excellent11', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(37, 2, 3, 0, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(38, 2, 9, 0, 'Good well 02', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(39, 4, 10, 0, 'Good well 1', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(40, 1, 11, 0, 'Good well 2', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(41, 4, 9, 0, 'Good well 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(42, 1, 11, 0, 'Good well 4', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(43, 2, 10, 0, 'Awesome', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(44, 2, 9, 0, 'Awesome 2', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(45, 4, 12, 0, 'Awesome 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(46, 1, 9, 0, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(47, 1, 14, 0, 'Awesome 5', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(48, 1, 15, 0, 'Awesome 6', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(49, 2, 16, 0, 'Excellent', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(50, 2, 18, 0, 'Excellent1', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(51, 4, 14, 0, 'Excellent2', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(52, 1, 9, 0, 'Excellent3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(53, 4, 10, 0, 'Excellent4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(54, 1, 2, 0, 'Excellent5', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(55, 2, 14, 0, 'Excellent6', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(56, 2, 18, 0, 'Excellent7', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(57, 4, 9, 0, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(58, 1, 9, 0, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(59, 7, 10, 0, 'Excellent10', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(60, 1, 12, 0, 'Excellent11', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(61, 2, 2, 0, 'Good well 01', 1, '2018-10-14 05:44:11', '2018-10-18 03:54:45'),
(62, 2, 2, 0, 'Good well 02', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(63, 4, 2, 0, 'Good well 1', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(64, 1, 2, 0, 'Good well 4', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(65, 2, 2, 0, 'Awesome', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(66, 2, 2, 0, 'Awesome 2', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(67, 1, 5, 0, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(68, 1, 2, 0, 'Awesome 5', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(69, 2, 2, 0, 'Excellent', 1, '2018-10-14 05:44:11', '2018-10-18 04:33:18'),
(70, 4, 2, 0, 'Excellent2', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(71, 1, 2, 0, 'Excellent3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(72, 4, 2, 0, 'Excellent4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(73, 1, 2, 0, 'Excellent5', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(74, 2, 2, 0, 'Excellent6', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(75, 2, 2, 0, 'Excellent7', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(76, 4, 3, 0, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(77, 1, 5, 0, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(78, 1, 2, 0, 'Excellent10', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(79, 1, 2, 0, 'Excellent11', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56'),
(80, 2, 3, 0, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06'),
(81, 2, 9, 0, 'Good well 02', 1, '2018-10-14 05:44:11', '2018-10-15 15:41:01'),
(82, 4, 10, 0, 'Good well 1', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(83, 1, 11, 0, 'Good well 2', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(84, 4, 9, 0, 'Good well 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:50'),
(85, 1, 11, 0, 'Good well 4', 1, '2018-10-14 05:44:11', '2018-10-15 15:40:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_likes`
--

CREATE TABLE `new_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `value` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notify_actions`
--

CREATE TABLE `notify_actions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `owner_status` int(11) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notify_actions`
--

INSERT INTO `notify_actions` (`id`, `user_id`, `action`, `status`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(1, 8, 1, 1, 1, 1, '2019-01-16 08:13:30', '2019-01-16 08:13:37'),
(2, 8, 2, 1, 1, 1, '2019-01-16 08:13:30', '2019-01-16 08:13:37'),
(3, 8, 3, 1, 1, 1, '2019-01-16 08:13:30', '2019-01-16 08:13:37'),
(4, 8, 4, 1, 1, 1, '2019-01-16 08:13:30', '2019-01-16 08:13:37'),
(5, 8, 5, 0, 1, 1, '2019-01-16 08:13:30', '2019-01-16 08:13:38'),
(6, 3, 1, 0, 1, 1, '2019-01-16 08:14:11', '2019-10-09 08:25:52'),
(7, 3, 2, 1, 1, 1, '2019-01-16 08:14:11', '2019-10-09 08:25:52'),
(8, 3, 3, 1, 1, 1, '2019-01-16 08:14:11', '2019-10-09 08:25:52'),
(9, 3, 4, 1, 1, 1, '2019-01-16 08:14:12', '2019-10-09 08:25:52'),
(10, 3, 5, 0, 1, 1, '2019-01-16 08:14:12', '2019-10-09 08:25:52'),
(11, 26, 1, 1, 1, 1, '2019-01-18 07:10:07', '2019-01-18 07:15:26'),
(12, 26, 2, 1, 1, 1, '2019-01-18 07:10:07', '2019-01-18 07:15:26'),
(13, 26, 3, 1, 1, 1, '2019-01-18 07:10:07', '2019-01-18 07:15:26'),
(14, 26, 4, 1, 1, 1, '2019-01-18 07:10:07', '2019-01-18 07:15:26'),
(15, 26, 5, 0, 1, 1, '2019-01-18 07:10:07', '2019-01-18 07:15:26'),
(16, 1, 1, 1, 1, 1, '2019-01-28 11:14:28', '2019-01-29 08:40:19'),
(17, 1, 2, 1, 1, 1, '2019-01-28 11:14:28', '2019-01-29 08:40:19'),
(18, 1, 3, 1, 1, 1, '2019-01-28 11:14:28', '2019-01-29 08:40:19'),
(19, 1, 4, 0, 1, 1, '2019-01-28 11:14:28', '2019-01-29 08:40:19'),
(20, 1, 5, 0, 1, 1, '2019-01-28 11:14:28', '2019-01-29 08:40:20'),
(21, 34, 1, 1, 1, 1, '2019-02-06 10:42:22', '2019-02-06 10:42:22'),
(22, 34, 2, 1, 1, 1, '2019-02-06 10:42:22', '2019-02-06 10:42:22'),
(23, 34, 3, 1, 1, 1, '2019-02-06 10:42:22', '2019-02-06 10:42:22'),
(24, 34, 4, 1, 1, 1, '2019-02-06 10:42:22', '2019-02-06 10:42:22'),
(25, 34, 5, 0, 1, 1, '2019-02-06 10:42:22', '2019-02-06 10:42:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notify_contents`
--

CREATE TABLE `notify_contents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `action_id` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` int(11) NOT NULL DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `user_id_read` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notify_contents`
--

INSERT INTO `notify_contents` (`id`, `user_id`, `description`, `action_id`, `link`, `owner_status`, `admin_status`, `user_id_read`, `created`, `updated`) VALUES
(1, 3, 'Your post(Alex Test) has approved', 3, 'blogs', 1, 1, '3', '2019-01-11 09:38:10', '2019-01-11 08:41:30'),
(2, 3, 'A post has created by user user2', 0, 'admin/opinions_debates/index', 1, 0, NULL, '2019-01-11 09:51:28', '2019-01-11 09:51:41'),
(3, 3, 'Your post(test Opinions 1) has approved', 3, 'opinions_debates', 1, 1, '3', '2019-01-11 09:51:51', '2019-01-11 09:52:00'),
(4, 3, 'User User2 created a new post (test Opinions 1) ', 1, 'opinions_debates', 1, 1, NULL, '2019-01-11 09:51:51', '2019-01-11 09:51:51'),
(5, 4, 'A post has created by user user3', 0, 'admin/queries/index', 1, 0, NULL, '2019-01-11 10:21:54', '2019-01-11 10:22:02'),
(6, 4, 'Your post(Test Queries 1) has approved', 3, 'queries', 1, 1, '4', '2019-01-11 10:22:13', '2019-01-11 10:22:22'),
(7, 4, 'User User3 created a new post (Test Queries 1) ', 1, 'queries', 1, 1, '1', '2019-01-11 10:22:13', '2019-01-11 10:34:27'),
(8, 8, 'A post has created by user user8', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-16 08:07:01', '2019-01-16 08:08:51'),
(9, 8, 'Your post(Blog Title user...) has approved', 3, 'blogs', 1, 1, '8', '2019-01-16 08:09:05', '2019-01-16 08:13:47'),
(10, 8, 'User User8 created a new post (Blog Title user...) ', 1, 'blogs', 1, 1, '3', '2019-01-16 08:09:05', '2019-01-16 08:15:15'),
(11, 4, 'Alex Admin has commented on your post', 4, '/news/view/2', 1, 1, '4', '2019-01-16 08:12:35', '2019-02-26 16:01:08'),
(12, 4, 'Alex Admin has commented on your post', 4, '/news/view/2', 1, 1, '4', '2019-01-16 08:12:56', '2019-02-26 16:01:08'),
(13, 26, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-18 07:20:24', '2019-01-21 14:15:48'),
(14, 26, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-19 18:43:10', '2019-01-21 14:15:48'),
(15, 26, 'Your post(A Dog&#39;s Way...) has approved', 3, 'blogs', 1, 1, NULL, '2019-01-21 14:23:04', '2019-01-21 14:23:04'),
(16, 26, 'Sue Chow created a new post (A Dog&#39;s Way...) ', 1, 'blogs', 1, 1, NULL, '2019-01-21 14:23:04', '2019-01-21 14:23:04'),
(17, 26, 'Your post(The Government ...) has approved', 3, 'blogs', 1, 1, NULL, '2019-01-21 14:23:08', '2019-01-21 14:23:08'),
(18, 26, 'Sue Chow created a new post (The Government ...) ', 1, 'blogs', 1, 1, NULL, '2019-01-21 14:23:08', '2019-01-21 14:23:08'),
(19, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-21 09:34:59', '2019-01-21 09:35:39'),
(20, 3, 'Your post(blog user 5....) has approved', 3, 'blogs', 1, 1, '3', '2019-01-21 09:35:46', '2019-01-21 09:35:58'),
(21, 3, 'User User2 created a new post (blog user 5....) ', 1, 'blogs', 1, 1, NULL, '2019-01-21 09:35:46', '2019-01-21 09:35:46'),
(22, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-24 10:37:32', '2019-01-24 10:38:06'),
(23, 3, 'Your post(Test new artile...) has approved', 3, 'blogs', 1, 1, '3', '2019-01-24 10:38:19', '2019-01-25 07:23:36'),
(24, 3, 'User User2 created a new post (Test new artile...) ', 1, 'blogs', 1, 1, NULL, '2019-01-24 10:38:19', '2019-01-24 10:38:19'),
(25, 1, 'User User2 has commented on your post', 4, '/news/view/28', 1, 1, '1', '2019-01-24 10:44:34', '2019-01-28 10:42:24'),
(26, 1, 'User User2 has commented on your post', 4, '/news/view/28', 1, 1, '1', '2019-01-24 10:45:01', '2019-01-28 10:42:24'),
(27, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-24 11:03:10', '2019-01-28 11:08:03'),
(28, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-28 10:50:32', '2019-01-28 11:08:02'),
(29, 1, 'A post has created by Alex Admin', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-28 11:04:05', '2019-01-28 11:08:02'),
(30, 1, 'Your post(Alex 1.28.2019) has approved', 3, 'blogs', 1, 1, '1', '2019-01-28 11:08:11', '2019-01-28 11:08:41'),
(31, 1, 'Alex Admin created a new post (Alex 1.28.2019) ', 1, 'blogs', 1, 1, '24', '2019-01-28 11:08:11', '2019-01-28 11:16:01'),
(32, 1, 'Alex Alexandrubint has commented on your post', 4, '/blogs/view/43', 1, 1, '1', '2019-01-28 11:08:32', '2019-01-28 11:08:41'),
(33, 23, 'Alex Admin has commented on your post', 4, '/books/book_review/40', 1, 1, NULL, '2019-01-28 11:14:09', '2019-01-28 11:14:09'),
(34, 1, 'Alex Alexandrubint has commented on your post', 4, '/blogs/view/43', 1, 1, '1', '2019-01-28 11:14:55', '2019-01-29 08:38:29'),
(35, 1, 'Alex Alexandrubint has requested add friend', 2, 'user/friends/index', 1, 1, '1', '2019-01-28 11:15:37', '2019-01-28 11:15:43'),
(36, 24, 'Alex Admin has confirmed friends with you', 6, 'user/friends/index', 1, 1, '24', '2019-01-28 11:15:57', '2019-01-28 11:16:01'),
(37, 1, 'Alex Alexandrubint has commented on your post', 4, '/films/review/33', 1, 1, '1', '2019-01-28 11:28:45', '2019-01-29 08:38:29'),
(38, 24, 'A post has created by Alex Alexandrubint', 0, 'admin/opinions_debates/index', 1, 0, NULL, '2019-01-28 11:32:47', '2019-01-28 11:37:34'),
(39, 4, 'Adam John has commented on your post', 4, '/queries/view/32', 1, 1, '4', '2019-01-28 17:53:41', '2019-02-26 16:01:08'),
(40, 17, 'Alex Admin has commented on your post', 4, '/books/book_review/56', 1, 1, '17', '2019-01-29 08:26:38', '2019-02-26 15:51:30'),
(41, 1, 'Alex B has commented on your post', 4, '/books/book_review/58', 1, 1, '1', '2019-01-29 08:39:22', '2019-01-29 08:39:30'),
(42, 1, 'Alex B has commented on your post', 4, '/books/book_review/57', 1, 1, NULL, '2019-01-29 08:40:41', '2019-01-29 08:40:41'),
(43, 1, 'A post has created by Alex Admin', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-29 08:47:44', '2019-01-29 08:49:28'),
(44, 1, 'Your post(Alex Test 1.28....) has approved', 3, 'blogs', 1, 1, '1', '2019-01-29 08:50:07', '2019-01-29 08:51:06'),
(45, 1, 'Alex Admin created a new post (Alex Test 1.28....) ', 1, 'blogs', 1, 1, NULL, '2019-01-29 08:50:07', '2019-01-29 08:50:07'),
(46, 1, 'A post has created by Alex Admin', 0, 'admin/blogs/index', 1, 0, NULL, '2019-01-29 08:52:39', '2019-01-29 08:53:00'),
(47, 1, 'Your post(Alex Test 1.28....) has approved', 3, 'blogs', 1, 1, '1', '2019-01-29 08:55:16', '2019-01-29 08:56:41'),
(48, 1, 'Alex Admin created a new post (Alex Test 1.28....) ', 1, 'blogs', 1, 1, NULL, '2019-01-29 08:55:16', '2019-01-29 08:55:16'),
(49, 1, 'Alex B has requested add friend', 2, 'user/friends/index', 1, 1, '1', '2019-01-29 08:55:32', '2019-01-29 08:56:41'),
(50, 3, 'A post has created by user user2', 0, 'admin/opinions_debates/index', 1, 0, NULL, '2019-01-30 08:06:57', '2019-02-13 10:08:53'),
(51, 26, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-02-05 07:55:18', '2019-02-13 10:08:53'),
(52, 26, 'Alex Admin has commented on your post', 4, '/books/book_review/grit', 1, 1, NULL, '2019-02-05 08:26:24', '2019-02-05 08:26:24'),
(53, 1, 'A post has created by Alex Admin', 0, 'admin/opinions_debates/index', 1, 0, NULL, '2019-02-05 08:51:20', '2019-02-13 10:08:53'),
(54, 34, 'A post has created by Belicia  Tang', 0, 'admin/blogs/index', 1, 0, NULL, '2019-02-06 10:45:15', '2019-02-13 10:08:53'),
(55, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-02-11 16:33:32', '2019-02-13 10:08:53'),
(56, 3, 'A post has created by user user2', 0, 'admin/blogs/index', 1, 0, NULL, '2019-02-11 16:33:46', '2019-02-13 10:08:53'),
(57, 26, 'Alex Admin has commented on your post', 4, '/books/book_review/cry-the-beloved-country', 1, 1, NULL, '2019-02-13 09:49:59', '2019-02-13 09:49:59'),
(58, 1, 'Your post(Test 1.28 No Fe...) has approved', 3, 'blogs', 1, 1, '1', '2019-02-13 10:10:05', '2019-02-13 10:12:52'),
(59, 1, 'Alex Admin created a new post (Test 1.28 No Fe...) ', 1, 'blogs', 1, 1, NULL, '2019-02-13 10:10:05', '2019-02-13 10:10:05'),
(60, 26, 'User User2 has commented on your post', 4, '/books/book_review/shoe-dog', 1, 1, NULL, '2019-02-13 11:01:06', '2019-02-13 11:01:06'),
(61, 1, 'Sue Chow has commented on your post', 4, '/films/review/top-5-lps-corals-for-beginners', 1, 1, NULL, '2019-02-14 07:54:43', '2019-02-14 07:54:43'),
(62, 1, 'A post has created by Alex Admin', 0, 'admin/blogs/index', 1, 0, NULL, '2019-02-14 09:17:56', '2019-02-14 09:18:26'),
(63, 1, 'Your post(LPS Coral) has approved', 3, 'blogs', 1, 1, '1', '2019-02-14 09:19:12', '2019-02-14 09:19:24'),
(64, 1, 'Alex Admin created a new post (LPS Coral) ', 1, 'blogs', 1, 1, NULL, '2019-02-14 09:19:12', '2019-02-14 09:19:12'),
(65, 17, 'User User2 has requested add friend', 2, 'user/friends/index', 1, 1, '17', '2019-02-26 15:45:14', '2019-02-26 15:51:30'),
(66, 3, 'Adam John has confirmed friends with you', 6, 'user/friends/index', 1, 1, '3', '2019-02-26 15:51:24', '2019-02-26 15:52:47'),
(67, 17, 'User User2 has requested add friend', 2, 'user/friends/index', 1, 1, '17', '2019-02-26 15:53:29', '2019-02-26 16:01:37'),
(68, 4, 'Adam John has requested add friend', 2, 'user/friends/index', 1, 1, '4', '2019-02-26 16:00:39', '2019-02-26 16:01:08'),
(69, 17, 'User User3 has confirmed friends with you', 6, 'user/friends/index', 1, 1, '17', '2019-02-26 16:01:30', '2019-02-26 16:01:37'),
(70, 17, 'User User2 has requested add friend', 2, 'user/friends/index', 1, 1, '17', '2019-02-26 16:47:52', '2019-02-26 17:22:44'),
(71, 17, 'User User2 has requested add friend', 2, 'user/friends/index', 1, 1, '17', '2019-02-26 17:23:10', '2019-02-26 17:23:52'),
(72, 3, 'Adam John has confirmed friends with you', 6, 'user/friends/index', 1, 1, '3', '2019-02-26 17:24:03', '2019-02-26 17:24:12'),
(73, 20, 'Alex Admin has requested add friend', 2, 'user/friends/index', 1, 1, NULL, '2019-03-01 09:20:48', '2019-03-01 09:20:48'),
(74, 1, 'User User2 has commented on your post', 4, '/news/view/deserting-trump-on-science', 1, 1, NULL, '2019-03-15 14:03:17', '2019-03-15 14:03:17'),
(75, 1, 'User User2 has commented on your post', 4, '/films/review/book-group-blog-vs', 1, 1, NULL, '2019-03-15 15:24:19', '2019-03-15 15:24:19'),
(76, 4, 'User User2 has commented on your post', 4, '/queries/view/test-queries-1', 1, 1, NULL, '2019-03-15 15:32:03', '2019-03-15 15:32:03'),
(77, 1, 'User User2 has commented on your post', 4, '/news/view/deserting-trump-on-science', 1, 1, NULL, '2019-03-15 15:32:39', '2019-03-15 15:32:39'),
(78, 1, 'User User2 has commented on your post', 4, '/books/book_review/54', 1, 1, NULL, '2019-03-15 16:37:48', '2019-03-15 16:37:48'),
(79, 1, 'User User2 has commented on your post', 4, '/books/book_review/fantastic-beasts-and-where-to-find-them-the-original-screenplay', 1, 1, NULL, '2019-07-20 15:35:44', '2019-07-20 15:35:44'),
(80, 3, 'Your post(test Opinions 2) has approved', 3, 'opinions_debates', 1, 1, '3', '2019-08-27 09:52:30', '2019-08-29 14:18:37'),
(81, 3, 'User User2 created a new post (test Opinions 2) ', 1, 'opinions_debates', 1, 1, NULL, '2019-08-27 09:52:30', '2019-08-27 09:52:30'),
(82, 1, 'Your post(Learn how to gr...) has approved', 3, 'opinions_debates', 1, 1, '1', '2019-08-27 09:55:37', '2019-09-12 06:52:49'),
(83, 1, 'Alex  Alexandru B created a new post (Learn how to gr...) ', 1, 'opinions_debates', 1, 1, NULL, '2019-08-27 09:55:38', '2019-08-27 09:55:38'),
(84, 1, 'A post has created by Alex B', 0, 'admin/queries/index', 1, 0, NULL, '2019-11-24 15:39:52', '2019-11-24 15:40:56'),
(85, 1, 'Your post(Should the Olym...) has approved', 3, 'queries', 1, 1, '1', '2019-11-24 15:41:12', '2019-11-27 13:36:44'),
(86, 1, 'Alex B created a new post (Should the Olym...) ', 1, 'queries', 1, 1, '24', '2019-11-24 15:41:12', '2019-11-24 15:44:05'),
(87, 3, 'A post has created by user user2', 0, 'admin/queries/index', 1, 0, NULL, '2019-11-27 17:53:09', '2019-11-28 08:47:50'),
(88, 26, 'Alex B has requested add friend', 2, 'user/friends/index', 1, 1, NULL, '2019-12-01 17:11:53', '2019-12-01 17:11:53'),
(89, 85, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-12 11:49:35', '2019-12-12 12:53:49'),
(90, 1, 'A post has created by Alex B', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-12 12:09:08', '2019-12-12 12:53:49'),
(91, 85, 'Your post(Warren&#039;s B...) has approved', 3, 'blogs', 1, 1, '85', '2019-12-12 18:34:52', '2019-12-13 09:11:27'),
(92, 85, 'Sue Chow created a new post (Warren&#039;s B...) ', 1, 'blogs', 1, 1, NULL, '2019-12-12 18:34:52', '2019-12-12 18:34:52'),
(93, 85, 'Your post(Warren&#039;s B...) has approved', 3, 'blogs', 1, 1, '85', '2019-12-13 09:06:31', '2019-12-13 09:11:27'),
(94, 85, 'Sue Chow created a new post (Warren&#039;s B...) ', 1, 'blogs', 1, 1, NULL, '2019-12-13 09:06:31', '2019-12-13 09:06:31'),
(95, 1, 'A post has created by Alex B', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-13 09:10:11', '2019-12-13 09:25:11'),
(96, 85, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-13 09:12:35', '2019-12-13 09:25:11'),
(97, 85, 'Your post(Dark Waters) has approved', 3, 'blogs', 1, 1, NULL, '2019-12-13 09:13:21', '2019-12-13 09:13:21'),
(98, 85, 'Sue Chow created a new post (Dark Waters) ', 1, 'blogs', 1, 1, NULL, '2019-12-13 09:13:21', '2019-12-13 09:13:21'),
(99, 85, 'A post has created by Sue Chow', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-13 09:13:44', '2019-12-13 09:25:11'),
(100, 85, 'Your post(Dementia and Di...) has approved', 3, 'blogs', 1, 1, NULL, '2019-12-13 18:05:40', '2019-12-13 18:05:40'),
(101, 85, 'Sue Chow created a new post (Dementia and Di...) ', 1, 'blogs', 1, 1, NULL, '2019-12-13 18:05:40', '2019-12-13 18:05:40'),
(102, 1, 'A post has created by Alex B', 0, 'admin/blogs/index', 1, 0, NULL, '2019-12-13 07:11:08', '2019-12-14 09:32:58'),
(103, 1, 'Sue Chow has commented on your post', 4, '/films/review/children-full-of-life', 1, 1, NULL, '2019-12-14 10:40:28', '2019-12-14 10:40:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opinion_debate_articles`
--

CREATE TABLE `opinion_debate_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_my_opinion_debate` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `opinion_debate_articles`
--

INSERT INTO `opinion_debate_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `featured_my_opinion_debate`, `description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(33, 'Donâ€™t Blame the Robots for Manufacturing Job Losses in U.S.           ', 1, 1, 1, '157341926621062.jpeg', 1, '<p>This piece by the Economic Policy Institute (EPI) is based on studies comparing countries&rsquo; levels of automation and job loss. &nbsp;It concludes that while there is a relationship, it is definitely not the only reason. &nbsp;Why? &nbsp;Countries like Germany where industries are much more mechanized/automated than in the U.S. have seen significantly less job loss. (more)</p>\r\n\r\n<p><a href=\"https://www.epi.org/publication/technology-inequality-dont-blame-the-robots/\" target=\"_blank\">https://www.epi.org/publication/technology-inequality-dont-blame-the-robots/</a></p>\r\n\r\n<p>Another piece is even more explicit in pointing out that while German factories are way more mechanized than US ones, Germany has not seen the job losses that we&rsquo;ve seen in the U.S. &nbsp;According to a major German study based on data over a 20 year span, in 1994, Germany had about two industrial robots per thousand workers&mdash;about 4 times more than in the U.S. at the time. &nbsp;By 2014, the number of robots had risen to 7.6 robots per thousand workers in Germany compared to only 1.6 robots per thousand workers in the U.S. (more)</p>\r\n\r\n<p><strong>Other key points are:&nbsp;</strong><br />\r\n1.&nbsp;&nbsp; &nbsp;While manufacturing jobs have been reduced by automation in Germany, job losses were insignificant, &nbsp;in part because in Germany, workers found jobs in other industries, especially new entrants. In other words, there were plenty of other jobs to be had, especially in the service sector, &nbsp;for the 25&#37; of the population &nbsp;who would have worked in manufacturing, This point was made in the October Democratic party debate by Senator Bernie Sanders when another candidate insisted that automation was the prime culprit in job losses and increasing income inequality. The researchers &ldquo;found that despite the significant growth in the use of robots, they hadn&rsquo;t made any dent in aggregate German employment. &ldquo;Once industry structures and demographics are taken into account, we find effects close to zero,&rdquo; the researchers said.</p>\r\n\r\n<p>2.&nbsp;&nbsp; &nbsp;While some existing medium-skilled German workers in increasingly automated industries such as the auto industry, found their jobs downgraded because of automation, most kept their jobs, although some did take pay cuts. &nbsp;Germans were &ldquo;significantly more likely to keep their jobs, though some ended up doing different roles from before&hellip;&rdquo; according to the study. &nbsp;Why the difference between Germany and the U.S.? &nbsp;One main reason is because of Germany&rsquo;s powerful unions.</p>\r\n\r\n<p>3.&nbsp;&nbsp; &nbsp;But even though many more German workers were able to keep their jobs (often at lower wages) and unemployment is minimal, Germany is NOT perfect: &nbsp;Like other capitalist countries, income inequality is significant. &nbsp;But income inequality in the U.S. is more extreme than in Germany&mdash;perhaps, again, because German unions are stronger than those in the U.S. &nbsp;According to data provided by the Organization for Economic Co-operation and Development, &ldquo;in Germany, &nbsp;the bottom 60 percent of the population possess just 6.5 percent of wealth in the country, the lowest figure in Europe. In the U.S., the bottom 60 percent possess just 2.4 percent&rdquo; (more) &nbsp;</p>\r\n\r\n<p><a href=\"https://geopoliticalfutures.com/germany-us-grapple-wealth-inequality/\" target=\"_blank\">https://geopoliticalfutures.com/germany-us-grapple-wealth-inequality/</a><br />\r\n&nbsp;</p>\r\n', '', ',33,34,', 1, 1, '2019-11-11 09:54:26', '2019-12-13 08:13:10'),
(34, 'Automation is Not the Main Reason for Low Wages and Job Loss', 1, 1, 1, '157341938890132.jpeg', 1, '<p>In an opinion piece, Princeton economist Paul Krugman states &nbsp;that while many people assume that automation is the main reason for job loss and low wages, this is just not the case. &nbsp;Instead, it is the lopsided power balance between employers and workers, a trend since the 1970s, that is responsible for the declining pay and status of workers in the U.S. &nbsp;In other words, it is not technological advances but the &ldquo;failure of workers to share in the fruits of technology change&rdquo; that is responsible.</p>\r\n\r\n<p>&ldquo;The other day I found myself, as I often do, at a conference discussing lagging wages and soaring inequality. There was a lot of interesting discussion. But one thing that struck me was how many of the participants just assumed that robots are a big part of the problem &mdash; that machines are taking away the good jobs, or even jobs in general. For the most part this wasn&rsquo;t even presented as a hypothesis, just as part of what everyone knows.</p>\r\n\r\n<p>And this assumption has real implications for policy discussion. For example, a lot of the agitation for a universal basic income comes from the belief that jobs will become ever scarcer as the robot apocalypse overtakes the economy. So it seems like a good idea to point out that in this case what everyone knows isn&rsquo;t true.&rdquo; (more)</p>\r\n\r\n<p><a href=\"https://www.nytimes.com/2019/03/14/opinion/robots-jobs.html\" target=\"_blank\">https://www.nytimes.com/2019/03/14/opinion/robots-jobs.html</a></p>\r\n', 'automation-is-not-the-main-reason-for-low-wages-and-job-loss', ',32,33,34,', 1, 1, '2019-11-11 09:56:28', '2019-11-11 09:56:28'),
(35, 'Why Universal Basic Income Will Not Work', 1, 1, 1, '157341949280592.jpeg', 1, '<p>Universal Basic Income, or UBI, is an idea that has been promoted by &ldquo;progressive&rdquo; capitalists who are not interested in fundamental structural changes. &nbsp;Instead, they advocate glitzy band aids slapped on gushing wounds, believing that such measures would alleviate serious problems like the extreme income inequality that plagues many developed countries.</p>\r\n\r\n<p>There have been a few real-life experiments with UBI schemes. &nbsp;Most of these experiments show that it only works in improving wellbeing among extremely impoverished groups in third world countries. &nbsp;Even the well-received &ldquo;Alaska Fund&rdquo; that has been giving out &#36;1600 in dividends to each adult and child in Alaska supports the finding that positive impacts are mostly limited &nbsp;to impoverished groups&mdash;in this case, rural indigenous Alaskans. &nbsp;Moreover, the Alaska Fund payouts have done nothing to reduce child poverty, much less reduce overall income inequality.</p>\r\n\r\n<p>The cost of UBI programs is very high as most estimates show that these payments will constitute 20 to 30&#37; of a country&rsquo;s GDP&mdash;this is money that can be put to much better use in establishing sustainable programs that will pave the way for jobs that pay family-supporting wages.&nbsp;</p>\r\n\r\n<p>Finally, there are some clear negative consequences of adopting University Basic Income programs: &nbsp;UBIs will divert attention away from programs such as infrastructure projects offering family-sustaining incomes and the urgent need to reform &nbsp;social safety nets, strengthen unions, regulate the power of large monopolies, help small business, and improve public education/public services.&nbsp;</p>\r\n\r\n<p>Instead of the minimal government handouts from UBI, most people would prefer the sustainability and dignity of well-paying jobs over which they have a degree of control. (more)</p>\r\n', 'why-universal-basic-income-will-not-work', ',33,34,', 1, 1, '2019-11-11 09:58:12', '2019-12-13 07:25:41'),
(36, 'Can Dems Win Back the White House in 2020 with a Moderate Candidate?', 1, 1, 1, NULL, 1, '<p>While media commentators have focused on the energy generated by the progressive wing of the Democratic Party and its leading campaign issue&mdash;Medicare-for-All&mdash;this could be deceptive. &nbsp;In this article, the author shows that for the 2018 mid0term elections, significantly more moderate Democrats were able to flip seats than progressives supported by Bernie Sanders&rsquo; grassroots organization, Our Revolution. &nbsp;Extrapolating from this, it appears that a moderate Dem nominee&mdash;someone like Biden&mdash;can indeed win the 2020 Presidential election. &nbsp;(<a href=\"https://www.washingtonpost.com/opinions/dont-let-progressives-fool-you-moderate-democrats-can-win/2018/11/07/37648218-e2b1-11e8-ab2c-b31dcd53ca6b_story.html\" target=\"_blank\">more</a>)</p>\r\n', 'can-dems-win-back-the-white-house-in-2020-with-a-moderate-candidate', ',30,', 1, 1, '2019-11-11 10:00:15', '2019-12-11 11:15:25'),
(37, 'Progressives and The Electability Question ', 1, 1, 1, '157341971555306.jpeg', 1, '<p>The conventional wisdom is that in the primaries, candidates tend to be more extreme&mdash;for Dems, this means tilting left--as they try to stand out among the field of candidates, but after a nominee has been chosen, he/she will run to the middle, hoping to appeal to independents and moderates. &nbsp;This is because many assume that Dems can&rsquo;t be too progressive as they will lose the white working class vote and the center.</p>\r\n\r\n<p>Because of this conventional belief, many Dems think Biden, the most moderate of the top 4 candidates, is the most &ldquo;electable&rdquo; as he appeals more to the middle swath of the electorate and to the white working class, especially white males.</p>\r\n\r\n<p>The other perspective, one shared by progressives and &nbsp;represented by people like Michael Moore, is that a moderate like Biden will not excite the Obama coalition&mdash;young people, minorities, college-educated white liberals&mdash;and therefore, he/she may go down in defeat just like Hillary did even if the moderate Dem nominee wins the popular vote. &nbsp;</p>\r\n\r\n<p>The proponents of this perspective believe that Dems do not have to waste money and energy courting the &ldquo;mythic&rdquo; white working class vote to win, as galvanizing the Obama coalition and increasing turnout is the path to victory. &nbsp;</p>\r\n\r\n<p>There are, of course, other perspectives on what the Dem nominee will have to do to win the 2020 presidential election, but the two aforementioned perspectives are the main ones.<br />\r\n&nbsp;</p>\r\n', 'progressives-and-the-electability-question', ',30,', 1, 1, '2019-11-11 10:01:55', '2019-11-11 10:01:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opinion_debate_categories`
--

CREATE TABLE `opinion_debate_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `opinion_debate_categories`
--

INSERT INTO `opinion_debate_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(30, 'Politics', 'politics', 1, '2019-11-11 09:49:36', '2019-11-11 09:49:36'),
(31, 'Environmental', 'environmental', 1, '2019-11-11 09:49:58', '2019-11-11 09:49:58'),
(32, 'Science', 'science', 1, '2019-11-11 09:50:05', '2019-11-11 09:50:05'),
(33, 'Business', 'business', 1, '2019-11-11 09:51:04', '2019-11-11 09:51:04'),
(34, 'Economics', 'economics', 1, '2019-11-11 09:51:20', '2019-11-11 09:51:20'),
(35, 'Sport', 'sport', 1, '2019-11-11 09:51:45', '2019-11-11 09:51:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opinion_debate_comments`
--

CREATE TABLE `opinion_debate_comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `opinion_debate_comments`
--

INSERT INTO `opinion_debate_comments` (`id`, `parent_comment_id`, `user_id`, `article_id`, `content`, `status`, `created`, `updated`) VALUES
(21, 0, 4, 3, 'Awesome 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(22, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(33, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(37, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opinion_debate_likes`
--

CREATE TABLE `opinion_debate_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `queries_articles`
--

CREATE TABLE `queries_articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `add_homepage` int(11) NOT NULL DEFAULT '0',
  `featured_image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_arr` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT ',0,',
  `owner_status` tinyint(1) NOT NULL DEFAULT '1',
  `admin_status` tinyint(1) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `queries_articles`
--

INSERT INTO `queries_articles` (`id`, `title`, `categories_id`, `user_id`, `add_homepage`, `featured_image`, `description`, `slug`, `categories_arr`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(33, 'Question:  Is Attempted Bribery A Crime? ', 1, 1, 1, NULL, '<p>Because of the impeachment inquiry, we are hearing a lot about &ldquo;quid pro quo,&ldquo; corruption,&rdquo; and &ldquo;bribery.&rdquo; The White House says that because the aid to Ukraine went through at the end after the whole situation was exposed, no one is guilty of anything. Is this true?</p>\r\n\r\n<p><strong>Comments:</strong></p>\r\n\r\n<p>Let&rsquo;s define some terms first: &nbsp;&ldquo;Corruption&rdquo; almost always applies to officials, or someone acting as a representative of a government or an organization with rules. &nbsp;Corruption occurs when officials take or offer bribes (in the form of money or other items of value) in exchange for giving or receiving a personal favor. &nbsp;Quid Pro Quo just means I give you this in exchange for that. &nbsp;</p>\r\n\r\n<p><strong>So, corruption is almost always associated with bribery.</strong></p>\r\n\r\n<p>A government official, especially one with a lot of power, can use his &nbsp;power to get others, including the leaders of other countries, to take actions that will help his own self-interest, not the interest of his own country. If that occurs, then we can say that the government official is corrupt. &nbsp;And when bribery occurs (which is almost always the case)&mdash;such as when the government official uses his official power to &nbsp;threaten someone or to offer a reward for actions that will benefit himself, not his country--then that official is corrupt and is guilty of bribery.</p>\r\n\r\n<p>Bribery is mentioned in the U.S. constitution as an impeachable offense.</p>\r\n\r\n<p>But is attempted bribery a crime? What happens when that government official who tried to offer/hold back something of value to the recipient with a clear understanding that the recipient will only get the valued item if the government official gets something personally beneficial in return, but because this official is about to be exposed, he ends up not going through with this act of bribery. &nbsp;So, in this situation, it is an act of attempted bribery.</p>\r\n\r\n<p><strong>Is attempted bribery a crime?</strong></p>\r\n\r\n<p>Yes, according to most legal experts. Cornell Law School&rsquo;s Legal Information Institute reminds us: &ldquo;Attempts to bribe exist at common law and under the Model Penal Code, and often, the punishment for attempted bribery and completed bribery are identical.&rdquo; &nbsp;&nbsp; &nbsp;(<a href=\"https://www.thenation.com/article/attempted-bribery-yovanovitch-pelosi/\" target=\"_blank\">read more</a>)<br />\r\n&nbsp;&nbsp; &nbsp;<br />\r\n&nbsp;</p>\r\n', 'question-is-attempted-bribery-a-crime', ',59,', 1, 1, '2019-11-24 15:07:15', '2019-11-24 15:07:15'),
(34, 'Is Affirmative Action in College Admissions Unfair?', 1, 1, 1, NULL, '<p>I have been troubled by special breaks that some applicants get in college admissions&hellip;I think all of these special breaks should be abolished. &nbsp;Do you think so too?</p>\r\n\r\n<p><strong>Comments: &nbsp;&nbsp;</strong></p>\r\n\r\n<p>Let&rsquo;s first look at the main preference categories:</p>\r\n\r\n<p>1.&nbsp; BIG DONORS&rsquo; KIDS (BDK)&mdash;There are a lot of rich kids of all races and ethnicities whose parents bought their way into top American schools. &nbsp;In fact, the practice is so widespread that &nbsp;if you meet a rich Chinese kid who is at an Ivy, Stanford, MIT, etc. &nbsp;you can safely assume that the kid did not get in on his or her own merits. He or she is most likely a BDK.&nbsp;<a href=\"https://www.bostonglobe.com/metro/2019/11/10/saber-edge/VQUod6h3w7qwSydHtHc5xL/story.html?p1=Article_Inline_Related_Box\" target=\"_blank\">Read this</a> about a BDK scandal at Harvard. &nbsp;</p>\r\n\r\n<p>2. LEGACY KIDS:&nbsp;Children of alumni. American universities have always engaged in the practice of giving the children of graduates a &ldquo;discount&rdquo; when they apply. &nbsp;But, unlike BDKs, it must be said that &nbsp;generally speaking, legacy kids have much higher GPAs and SAT scores than other special preference kids. &nbsp;One explanation of the motive behind this practice is that American universities want to keep alums happy so that they will keep on contributing. &nbsp;Legacy kids have much higher chances of getting into top schools. &nbsp;Although schools do not release figures for preference category admits, estimates are that for a school like Harvard (regular admit rate is now under 5&#37;), legacy kids have a 30 to 40&#37; chance of getting in.</p>\r\n\r\n<p>3. STAR ATHLETES: &nbsp;Athletes have always been admitted with much lower qualifications than most students, including kids in all of the other preference categories. The motive? Sports play a major role in building school spirit and sustaining the fun, competitive atmosphere, but most of all, sports competitions keep alumni interested, so that the contributions pipeline will be continully greased. &nbsp;</p>\r\n\r\n<p>4. AFFIRMATIVE ACTION &nbsp;students &nbsp;(Underrepresented minorities or UMs) UMs are mostly African Americans, non-affluent Latinos/Asian groups (Vietnamese, Filipino, etc.), and native Americans. &nbsp;Many of these minorities are top students at their high schools, but have lower SAT scores and less stellar activities than the average admit. The rationale for affirmative action is that these students have faced much great adversities than others&mdash;either from racism or socioeconomic deprivation&mdash;so it is only fair to give them a break. &nbsp;One criticism is that affirmative action should but does not apply to kids from impoverished backgrounds.</p>\r\n\r\n<p>5. FACULTY/ADMIN &ldquo;BRATS&rdquo;: These are children of professors and top administrators. &nbsp;Generally speaking, at top universities they get a moderate &ldquo;discount,&rdquo; meaning that their GPAs and SAT scores do not have to be as highly as those for regular admits. &nbsp;Many sub-standard faculty/admin brats &nbsp;that can&rsquo;t meet the lowered standards are rejected. There is no explicit rationale except that it is harder to turn away one of your own.</p>\r\n\r\n<p>6. VIP Kids: These are children of important people&mdash;politicians, movie stars, and other notables. &nbsp;Their chances are about the same as legacy kids&rsquo;.&nbsp;The implicit rationale (never clearly stated) is that it brings fame to the school and thereby, it raises the visibility and status of the school in the public&rsquo;s eye. &nbsp;</p>\r\n\r\n<p>7. GENIUSES in one area:&nbsp;These are students who excel in one area, such as winning a prestigious international medal in math, but may not have very high overall GPAs. The rationale for this is simple: schools are, after all, centers of learning, so accepting someone who is superb in just one area can be easily justified on the basis of the core mission of institutions of higher learning..</p>\r\n\r\n<p>Based on the above, it seems that only numbers 4 (affirmative action for underrepresented minorities) and 7 (geniuses in one area) can be justified on the basis of fairness and idealistic&nbsp;core values.</p>\r\n\r\n<p>All the other preference categories &nbsp;are hard to justify on any grounds other than the institution&rsquo;s self-interest and some may even be said to represent forms of &nbsp;corruption (e.g. the big donor kids who buy their way in).<br />\r\n&nbsp;</p>\r\n', 'is-affirmative-action-in-college-admissions-unfair', ',51,59,61,', 1, 1, '2019-11-24 15:23:54', '2019-11-24 15:23:54'),
(35, 'Should the Olympics be Banned?', 1, 1, 1, NULL, '<p>I &nbsp;have heard some very negative things about the Olympics, especially for the host city. &nbsp;Should citizens of future host cities protest their cities&rsquo; decision to host?&nbsp;</p>\r\n\r\n<p><strong>Comments:</strong></p>\r\n\r\n<p>Aside from occasional doping scandals, the public image of the Olympics has always been relatively pristine. &nbsp;Most people think of it as an international sports event that promotes friendship and peace. The reality of the Olympics, however, cannot be further removed from this image.</p>\r\n\r\n<p>Now that Los Angeles has won the bid to host the 2028 Olympics, this issue is coming to the fore. &nbsp;There are groups actively organizing against the Olympics. &nbsp;Why? &nbsp;Because they see the sordid reality behind the carefully-drafted image.</p>\r\n\r\n<p>In short, the negative impact of hosting the Olympics is extensive: &nbsp;In host countries, policing and military surveillance is significantly increased, corruption runs rampant; people are forcibly displaced, and environmental destruction is widespread. &nbsp;After the Olympics, host cities can often be saddled with tremendous debts, which taxpayers are responsible for.</p>\r\n\r\n<p>Who benefits? &nbsp;Athletes get medals and sometimes lucrative contracts with companies. &nbsp;But the winners are the companies that prepare the site and service the participants (the builders, the hotels, and services companies) and most of all, the multinational corporations that sponsor the Olympics. &nbsp;The sponsors have tremendous advertising reach during the event &nbsp;and control over all aspects of the event. &nbsp;As a result, the monetary rewards from the exposure they get from sponsorships are tremendous. &nbsp;</p>\r\n\r\n<p>So, the answer is YES, if you are concerned about the public good, you should protest your city&rsquo;s hosting of the Olympics, because it makes the rich richer while everyone else suffers. &nbsp;If you don&rsquo;t want to see your city&rsquo;s environment degraded, an increase in corruption, displacement of local residents, and the expansion of surveillance, then you should protest.&nbsp;(<a href=\"https://nolympicsla.com/2019/08/01/nolympics-anywhere-a-joint-statement-in-solidarity/\" target=\"_blank\">read more</a>)</p>\r\n', 'should-the-olympics-be-banned', ',50,51,', 1, 1, '2019-11-24 15:39:52', '2019-11-24 15:41:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `queries_categories`
--

CREATE TABLE `queries_categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `queries_categories`
--

INSERT INTO `queries_categories` (`id`, `name`, `slug`, `status`, `created`, `updated`) VALUES
(50, 'Sport', 'sport', 1, '2019-11-24 14:57:19', '2019-11-24 14:57:19'),
(51, 'Education', 'education', 1, '2019-11-24 14:57:27', '2019-11-24 14:57:27'),
(52, 'Animals', 'animals', 1, '2019-11-24 14:57:43', '2019-11-24 14:57:43'),
(53, 'Art', 'art', 1, '2019-11-24 14:57:49', '2019-11-24 14:57:49'),
(54, 'Business', 'business', 1, '2019-11-24 14:58:20', '2019-11-24 14:58:20'),
(55, 'Entertainment', 'entertainment', 1, '2019-11-24 14:58:36', '2019-11-24 14:58:36'),
(56, 'Environment', 'environment', 1, '2019-11-24 14:58:57', '2019-11-24 14:58:57'),
(57, 'Food', 'food', 1, '2019-11-24 14:59:06', '2019-11-24 14:59:06'),
(58, 'Health', 'health', 1, '2019-11-24 14:59:15', '2019-11-24 14:59:15'),
(59, 'Politics', 'politics', 1, '2019-11-24 14:59:36', '2019-11-24 14:59:36'),
(60, 'Science', 'science', 1, '2019-11-24 15:00:03', '2019-11-24 15:00:03'),
(61, 'Society', 'society', 1, '2019-11-24 15:00:12', '2019-11-24 15:00:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `queries_comments`
--

CREATE TABLE `queries_comments` (
  `id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `queries_comments`
--

INSERT INTO `queries_comments` (`id`, `parent_comment_id`, `user_id`, `article_id`, `content`, `status`, `created`, `updated`) VALUES
(21, 0, 4, 3, 'Awesome 3', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(22, 0, 1, 5, 'Awesome 4', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(33, 0, 4, 3, 'Excellent8', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:29'),
(34, 0, 1, 5, 'Excellent9', 0, '2018-10-14 05:44:11', '2018-10-15 15:40:43'),
(37, 0, 2, 3, 'Good well 01', 0, '2018-10-14 05:44:11', '2018-10-15 15:41:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `queries_likes`
--

CREATE TABLE `queries_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review_ratings`
--

CREATE TABLE `review_ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `object_article_id` int(11) NOT NULL,
  `table_model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` float NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `review_parent_id` int(11) NOT NULL DEFAULT '0',
  `owner_status` int(11) DEFAULT '1',
  `admin_status` int(11) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `review_ratings`
--

INSERT INTO `review_ratings` (`id`, `user_id`, `object_article_id`, `table_model`, `value`, `review`, `review_parent_id`, `owner_status`, `admin_status`, `created`, `updated`) VALUES
(2, 4, 1, 'blog_article_model', 4.5, 'tes', 0, 1, 1, '2018-11-03 16:05:31', '2018-11-06 04:58:34'),
(54, 5, 1, 'blog_article_model', 3.5, 'test1', 0, 0, 0, '2018-11-04 06:56:48', '2018-11-13 08:48:46'),
(72, 5, 1, 'blog_article_model', 3.5, 'test 2 hehe', 2, 1, 1, '2018-11-04 08:34:10', '2018-11-04 08:34:10'),
(74, 4, 1, 'blog_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 54, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(75, 3, 1, 'blog_article_model', 4, 'This had all ', 54, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(76, 5, 1, 'book_article_model', 3.5, 'test1', 0, 1, 1, '2018-11-04 06:56:48', '2018-11-13 10:16:42'),
(77, 5, 1, 'book_article_model', 3.5, 'test 2', 0, 1, 1, '2018-11-04 08:34:10', '2018-11-13 09:06:58'),
(78, 4, 1, 'book_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 0, 1, 0, '2018-11-03 16:05:31', '2018-11-13 08:55:53'),
(79, 3, 1, 'book_article_model', 4, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.', 76, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(80, 5, 1, 'book_article_model', 3.5, 'test1', 76, 1, 0, '2018-11-04 06:56:48', '2018-11-13 09:07:07'),
(81, 5, 1, 'book_article_model', 3.5, 'test 2', 0, 1, 1, '2018-11-04 08:34:10', '2018-11-04 08:34:10'),
(82, 4, 1, 'book_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 81, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(83, 3, 1, 'film_article_model', 4, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.', 0, 1, 1, '2018-11-03 16:05:31', '2018-11-13 08:46:22'),
(84, 5, 1, 'film_article_model', 2, 'test1', 0, 1, 1, '2018-11-04 06:56:48', '2018-11-13 10:17:53'),
(85, 5, 1, 'film_article_model', 1, 'test 2', 84, 1, 1, '2018-11-04 08:34:10', '2018-11-04 08:34:10'),
(86, 4, 1, 'film_article_model', 2, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 84, 1, 0, '2018-11-03 16:05:31', '2018-11-13 09:30:54'),
(87, 3, 1, 'film_article_model', 4, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.', 0, 1, 0, '2018-11-03 16:05:31', '2018-11-13 08:37:00'),
(88, 5, 1, 'film_article_model', 3.5, 'test1', 0, 1, 1, '2018-11-04 06:56:48', '2018-11-04 06:56:48'),
(89, 5, 1, 'film_article_model', 3.5, 'test 2', 0, 1, 1, '2018-11-04 08:34:10', '2018-11-04 08:34:10'),
(90, 4, 1, 'new_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 0, 1, 1, '2018-11-03 16:05:31', '2018-11-13 10:22:22'),
(92, 5, 1, 'new_article_model', 3.5, 'test1', 90, 1, 1, '2018-11-04 06:56:48', '2018-11-04 06:56:48'),
(93, 5, 1, 'new_article_model', 3.5, 'test 2', 0, 1, 0, '2018-11-04 08:34:10', '2018-11-13 08:53:01'),
(94, 4, 1, 'new_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 0, 1, 0, '2018-11-03 16:05:31', '2018-11-13 08:53:01'),
(96, 5, 1, 'blog_article_model', 3.5, 'test1', 0, 0, 1, '2018-11-04 06:56:48', '2018-11-06 04:56:37'),
(97, 5, 1, 'blog_article_model', 3.5, 'test 2', 2, 0, 1, '2018-11-04 08:34:10', '2018-11-06 04:56:44'),
(98, 4, 1, 'blog_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 54, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(99, 3, 1, 'blog_article_model', 4, 'This had all I want in a fantasy book. ', 54, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(100, 5, 1, 'blog_article_model', 3.5, 'test1', 54, 1, 1, '2018-11-04 06:56:48', '2018-11-04 06:56:48'),
(101, 3, 1, 'blog_article_model', 0, 'hay', 0, 1, 0, '2018-11-09 14:30:58', '2018-11-13 08:33:37'),
(102, 3, 1, 'blog_article_model', 0, 'hay lam', 0, 1, 1, '2018-11-09 14:30:58', '2018-11-09 14:30:58'),
(103, 3, 1, 'book_group_article_model', 4, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin, Ro ...more.', 90, 1, 1, '2018-11-03 16:05:31', '2018-11-13 10:22:22'),
(104, 5, 1, 'book_group_article_model', 3.5, 'test1', 90, 1, 1, '2018-11-04 06:56:48', '2018-11-13 10:22:22'),
(105, 5, 1, 'book_group_article_model', 3.5, 'test 2', 0, 1, 1, '2018-11-04 08:34:10', '2018-11-04 08:34:10'),
(106, 4, 1, 'book_group_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 0, 1, 1, '2018-11-03 16:05:31', '2018-11-03 16:05:31'),
(107, 5, 1, 'opinion_debate_article_model', 3.5, 'test1', 0, 1, 1, '2018-11-04 06:56:48', '2018-11-04 06:56:48'),
(108, 5, 1, 'opinion_debate_article_model', 3.5, 'test 2', 107, 1, 1, '2018-11-04 08:34:10', '2018-11-13 08:54:42'),
(109, 4, 1, 'opinion_debate_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 107, 1, 0, '2018-11-03 16:05:31', '2018-11-13 09:05:43'),
(110, 5, 1, 'opinion_debate_article_model', 3.5, 'test1', 0, 0, 1, '2018-11-04 06:56:48', '2018-11-13 08:54:42'),
(111, 5, 1, 'query_article_model', 5, 'test1', 0, 1, 1, '2018-11-04 06:56:48', '2018-11-04 06:56:48'),
(112, 5, 1, 'query_article_model', 3.5, 'test 2', 111, 1, 1, '2018-11-04 08:34:10', '2018-11-13 08:57:12'),
(113, 4, 1, 'query_article_model', 4.5, 'This had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like MartinThis had all I want in a fantasy book. Good characters, some intrigue, a plot that isn\'t entirely predictable, a unique setting, and a set up for future happening all add up to a superb story. The best part is the narrative voice. It\'s told in third person, and the protagonist\'s voice is consistent and distinctive. Reading this as an adult is like reading David Eddings as a child--it\'s the same sense of immersion and fun in a new world. I think this book would appeal to those who like Martin', 111, 1, 0, '2018-11-03 16:05:31', '2018-11-13 09:06:35'),
(114, 5, 1, 'query_article_model', 3.5, 'test1', 0, 0, 1, '2018-11-04 06:56:48', '2018-11-13 08:57:12'),
(116, 3, 1, 'book_article_model', 0, 'Why do you rating that?', 76, 1, 1, '2018-11-14 11:52:39', '2018-11-14 11:52:39'),
(118, 3, 2, 'book_article_model', 0, 'nice book', 117, 1, 1, '2018-11-14 12:02:35', '2018-11-14 12:02:35'),
(120, 17, 32, 'book_article_model', 4.5, 'this book great!', 0, 1, 1, '2018-11-15 12:46:55', '2018-11-15 12:46:55'),
(121, 19, 35, 'book_article_model', 5, 'Test review over here', 0, 1, 1, '2018-11-16 03:24:39', '2018-11-16 03:24:39'),
(122, 19, 35, 'book_article_model', 0, 'Reply test here', 121, 1, 1, '2018-11-16 03:24:58', '2018-11-16 03:24:58'),
(123, 21, 35, 'book_article_model', 0, 'Add reply', 121, 1, 1, '2018-11-17 02:41:23', '2018-11-17 02:41:23'),
(124, 21, 32, 'book_article_model', 2.5, 'Test ', 0, 1, 1, '2018-11-17 02:47:08', '2018-11-17 02:47:08'),
(125, 21, 32, 'book_article_model', 0, 'This is a coomment', 120, 1, 1, '2018-11-17 02:47:25', '2018-11-17 02:47:25'),
(127, 3, 25, 'book_article_model', 0, 'test test', 126, 1, 1, '2018-11-17 09:51:55', '2018-11-17 09:51:55'),
(128, 21, 35, 'book_article_model', 5, 'test', 0, 1, 1, '2018-11-19 11:27:08', '2018-11-19 11:27:08'),
(129, 21, 37, 'book_article_model', 4.5, 'Test', 0, 1, 1, '2018-11-19 11:32:16', '2018-11-19 11:32:16'),
(130, 21, 37, 'book_article_model', 0, 'Test', 129, 1, 1, '2018-11-19 11:32:26', '2018-11-19 11:32:26'),
(131, 21, 37, 'book_article_model', 0, 'asdasda', 129, 1, 1, '2018-11-19 11:36:31', '2018-11-19 11:36:31'),
(132, 17, 38, 'book_article_model', 4, 'good!', 0, 1, 1, '2018-11-28 07:47:38', '2018-11-28 07:47:38'),
(133, 3, 1, 'book_article_model', 0, 'test cooment', 76, 1, 1, '2018-12-07 03:26:03', '2018-12-07 03:26:03'),
(134, 23, 14, 'book_group_article_book_model', 0, 'I like this book', 0, 1, 1, '2018-12-17 10:51:53', '2018-12-17 10:51:53'),
(135, 23, 14, 'book_group_article_book_model', 0, 'good book', 134, 1, 1, '2018-12-17 10:52:01', '2018-12-17 10:52:01'),
(136, 23, 14, 'book_group_article_book_model', 0, 'NIce I want to see more', 134, 1, 1, '2018-12-17 10:52:08', '2018-12-17 10:52:08'),
(137, 23, 14, 'book_group_article_book_model', 0, 'Woohoww', 0, 1, 1, '2018-12-17 10:53:12', '2018-12-17 10:53:12'),
(138, 23, 40, 'book_article_model', 5, 'This is my favorite book', 0, 1, 1, '2018-12-17 10:55:46', '2018-12-17 10:55:46'),
(139, 23, 22, 'film_article_model', 4, 'good movie', 0, 1, 1, '2018-12-17 11:08:24', '2018-12-17 11:08:24'),
(140, 23, 22, 'film_article_model', 0, 'eqweqwe', 139, 1, 1, '2018-12-17 11:08:42', '2018-12-17 11:08:42'),
(141, 1, 21, 'film_article_model', 4.5, 'Nice movie', 0, 1, 1, '2018-12-18 02:48:02', '2018-12-18 02:48:02'),
(143, 24, 41, 'book_article_model', 4, 'It was alright did not like the introduction.', 0, 1, 1, '2018-12-18 02:56:25', '2018-12-18 02:56:25'),
(144, 1, 14, 'book_group_article_book_model', 0, 'Message will be here', 0, 1, 1, '2018-12-18 03:07:05', '2018-12-18 03:07:05'),
(145, 1, 14, 'book_group_article_book_model', 0, 'Good book', 137, 1, 1, '2018-12-18 03:07:24', '2018-12-18 03:07:24'),
(146, 23, 14, 'book_group_article_book_model', 0, 'Let\'s have a meeting tomorrow 12.18.2018', 0, 1, 1, '2018-12-18 03:24:40', '2018-12-18 03:24:40'),
(147, 23, 14, 'book_group_article_book_model', 0, 'Aaa sorry I will miss this meeting out of town', 146, 1, 1, '2018-12-18 03:25:18', '2018-12-18 03:25:18'),
(148, 23, 14, 'book_group_article_book_model', 0, 'Test', 146, 1, 1, '2018-12-18 03:26:45', '2018-12-18 03:26:45'),
(149, 1, 14, 'book_group_article_book_model', 0, 'Test 2', 146, 1, 1, '2018-12-18 03:27:13', '2018-12-18 03:27:13'),
(150, 23, 14, 'book_group_article_book_model', 0, 'OK', 146, 1, 1, '2018-12-18 03:27:37', '2018-12-18 03:27:37'),
(151, 5, 18, 'book_group_article_book_model', 0, 'good!', 0, 1, 1, '2018-12-20 04:21:29', '2018-12-20 04:21:29'),
(152, 5, 18, 'book_group_article_book_model', 0, 'okay....', 151, 1, 1, '2018-12-20 04:21:42', '2018-12-20 04:21:42'),
(153, 21, 22, 'book_group_article_book_model', 0, 'Comment test', 0, 1, 1, '2018-12-24 06:05:21', '2018-12-24 06:05:21'),
(154, 21, 22, 'book_group_article_book_model', 0, 'reply', 153, 1, 1, '2018-12-24 06:05:37', '2018-12-24 06:05:37'),
(155, 21, 22, 'book_group_article_book_model', 0, 'Best book', 153, 1, 1, '2018-12-24 06:05:43', '2018-12-24 06:05:43'),
(156, 23, 21, 'book_group_article_book_model', 0, 'zzz', 0, 1, 1, '2018-12-24 06:07:26', '2018-12-24 06:07:26'),
(157, 23, 22, 'book_group_article_book_model', 0, 'nice', 153, 1, 1, '2018-12-24 06:08:00', '2018-12-24 06:08:00'),
(158, 23, 22, 'book_group_article_book_model', 0, 'good comment', 0, 1, 1, '2018-12-24 06:08:06', '2018-12-24 06:08:06'),
(159, 23, 22, 'book_group_article_book_model', 0, 'zappy', 158, 1, 1, '2018-12-24 06:08:18', '2018-12-24 06:08:18'),
(160, 21, 22, 'book_group_article_book_model', 0, 'yup', 158, 1, 1, '2018-12-24 06:08:29', '2018-12-24 06:08:29'),
(161, 21, 41, 'book_article_model', 5, 'good book\n', 0, 1, 1, '2018-12-24 06:09:45', '2018-12-24 06:09:45'),
(162, 19, 17, 'book_group_article_book_model', 0, 'nice', 0, 1, 1, '2018-12-24 06:23:30', '2018-12-24 06:23:30'),
(163, 19, 16, 'book_group_article_book_model', 0, 'wooho', 0, 1, 1, '2018-12-24 06:23:53', '2018-12-24 06:23:53'),
(164, 19, 23, 'book_group_article_book_model', 0, 'zaaa', 0, 1, 1, '2018-12-24 06:25:40', '2018-12-24 06:25:40'),
(165, 24, 24, 'book_group_article_book_model', 0, 'nicea\n', 0, 1, 1, '2018-12-24 06:26:22', '2018-12-24 06:26:22'),
(166, 19, 34, 'blog_article_model', 0, 'nice', 0, 1, 1, '2018-12-24 06:32:43', '2018-12-24 06:32:43'),
(167, 1, 28, 'book_group_article_book_model', 0, 'test', 0, 1, 1, '2018-12-27 05:29:29', '2018-12-27 05:29:29'),
(168, 1, 28, 'book_group_article_book_model', 0, 'zzaa', 167, 1, 1, '2018-12-27 05:29:34', '2018-12-27 05:29:34'),
(169, 3, 37, 'book_article_model', 0, 'good', 129, 1, 1, '2019-01-05 04:13:51', '2019-01-05 04:13:51'),
(170, 1, 2, 'new_article_model', 0, 'I like this company', 0, 1, 1, '2019-01-16 02:12:35', '2019-01-16 02:12:35'),
(171, 1, 2, 'new_article_model', 0, 'Message reply', 170, 1, 1, '2019-01-16 02:12:49', '2019-01-16 02:12:49'),
(172, 1, 2, 'new_article_model', 0, 'woohoo', 0, 1, 0, '2019-01-16 02:12:56', '2019-01-16 02:15:17'),
(173, 1, 30, 'film_article_model', 5, 'Awesome Movie Thnx', 0, 1, 0, '2019-01-16 02:42:56', '2019-01-16 02:45:06'),
(174, 1, 30, 'film_article_model', 0, 'test', 173, 1, 1, '2019-01-16 02:43:02', '2019-01-16 02:43:02'),
(175, 26, 37, 'blog_article_model', 0, 'What should I say?', 0, 1, 1, '2019-01-19 12:43:52', '2019-01-19 12:43:52'),
(176, 26, 37, 'blog_article_model', 0, 'Not much', 175, 1, 1, '2019-01-19 12:44:06', '2019-01-19 12:44:06'),
(177, 3, 28, 'new_article_model', 0, 'Test the comment', 0, 1, 1, '2019-01-24 04:44:34', '2019-01-24 04:44:34'),
(178, 3, 28, 'new_article_model', 0, 'Test a reply\n', 177, 1, 1, '2019-01-24 04:44:47', '2019-01-24 04:44:47'),
(179, 3, 28, 'new_article_model', 0, 'Test another comment', 0, 1, 1, '2019-01-24 04:45:01', '2019-01-24 04:45:01'),
(180, 24, 43, 'blog_article_model', 0, 'nice blog', 0, 1, 1, '2019-01-28 05:08:32', '2019-01-28 05:08:32'),
(182, 24, 43, 'blog_article_model', 0, 'notification 2', 0, 1, 1, '2019-01-28 05:14:55', '2019-01-28 05:14:55'),
(183, 24, 33, 'film_article_model', 5, 'Good movie', 0, 1, 1, '2019-01-28 05:28:45', '2019-01-28 05:29:09'),
(184, 17, 40, 'book_group_article_book_model', 0, 'good&#33;', 0, 1, 1, '2019-01-28 11:46:23', '2019-01-28 11:46:23'),
(185, 17, 32, 'queries_article_model', 0, 'dfsf', 0, 1, 1, '2019-01-28 11:53:41', '2019-01-28 11:53:41'),
(187, 23, 58, 'book_article_model', 4.5, 'This is a really good book', 0, 1, 1, '2019-01-29 02:39:22', '2019-01-29 02:39:22'),
(188, 23, 57, 'book_article_model', 5, 'Greate book', 0, 1, 1, '2019-01-29 02:40:41', '2019-01-29 02:40:41'),
(190, 26, 65, 'book_article_model', 2.5, 'This is a decent book but its characters are stock figures', 0, 1, 1, '2019-02-05 02:30:02', '2019-02-05 02:30:02'),
(194, 26, 39, 'film_article_model', 0.5, 'This is a very tepid film', 0, 1, 1, '2019-02-14 01:54:43', '2019-02-14 01:54:43'),
(195, 26, 42, 'book_group_article_book_model', 0, 'This is  a must-read for everyone, not just for nature lovers.   You will never look at a tree in the same way again, I guarantee&#33;', 0, 1, 1, '2019-02-14 01:58:56', '2019-02-14 01:58:56'),
(196, 1, 30, 'new_article_model', 0, 'here is a comment', 0, 1, 1, '2019-02-14 02:59:23', '2019-02-14 02:59:23'),
(199, 3, 64, 'film_article_model', 4.5, 'test', 0, 1, 1, '2019-03-15 10:24:19', '2019-03-15 10:24:19'),
(200, 3, 29, 'opinion_debate_article_model', 0, 'vavav', 0, 1, 1, '2019-03-15 10:31:53', '2019-03-15 10:31:53'),
(201, 3, 32, 'queries_article_model', 0, 'vavvv', 0, 1, 1, '2019-03-15 10:32:03', '2019-03-15 10:32:03'),
(203, 3, 54, 'book_article_model', 4.5, 'test ', 0, 1, 1, '2019-03-15 11:37:48', '2019-03-15 11:37:48'),
(205, 1, 36, 'new_article_model', 0, 'zzz', 202, 1, 1, '2019-03-15 03:48:00', '2019-03-15 03:48:00'),
(207, 1, 86, 'book_article_model', 0, 'yup', 206, 1, 1, '2019-03-28 04:33:33', '2019-03-28 04:33:33'),
(208, 3, 87, 'book_article_model', 4, 'great &#33;&#33;&#33;', 0, 1, 1, '2019-07-20 10:35:44', '2019-07-20 10:35:44'),
(209, 85, 68, 'film_article_model', 5, 'Pretty amazing for a teacher to be able to connect \"theory with life,\" inspire students to take responsibility for their own actions, enable students to see how all of us are vulnerable, and encourage them to ive life as if it&#39;s a precious gift.  You wouldn&#39;t think that this would happen in a tradition-bound culture like Japan&#39;s, but it did.  Pay attention to how Mr. Kanamori handles a bullying situation, how he engages students in serious discussions, and how he is able to get students to engage in self-reflection \n\n', 0, 1, 1, '2019-12-14 04:40:28', '2019-12-14 04:40:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `static_pages`
--

CREATE TABLE `static_pages` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `title_slug` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `static_pages`
--

INSERT INTO `static_pages` (`id`, `title`, `title_slug`, `content`, `created`, `updated`) VALUES
(11, 'Enlight 21 - Privacy Policy', 'privacy-policy', '<p><a href=\"http://enlight21.com/\">Enlight21.com&rsquo;s</a> mission is to provide a community for members to interact in a way that will support, inspire, educate, and encourage members to engage in personally, politically, intellectually, and socially meaningful conversations and activities. &nbsp;</p>\n\n<p><strong>PROTECTING MINORS</strong></p>\n\n<p>Children under 13 years of age are not allowed to join <strong>Enlight21.com</strong> as individuals. &nbsp;They may join if a parent registers as a member, in which case, they will have to use the parent&rsquo;s name. &nbsp;By &ldquo;minors&rdquo; we mean members between the age of 13 to 17. &nbsp;Protecting minors (13 to 17) is a top priority for us. &nbsp;Although our community is safer than the great majority of online communities because we require both phone verification and real legal names, we nonetheless urge parents to monitor their minors&rsquo; activities online in general. &nbsp;If parents notice any questionable communications between their minor child and another member, parents should notify us immediately at: &nbsp;admin@enlight21.com</p>\n\n<p><strong>PROTECTING &nbsp;OUR MEMBERS&rsquo; PRIVACY</strong></p>\n\n<p>Protecting our members&rsquo; privacy is very important to us. &nbsp;:<br />\nWe will only provide your personal information to third parties under the following conditions:</p>\n\n<ol>\n	<li>When you give your permission&nbsp;</li>\n	<li>When it is necessary for carrying out what you have asked us to do. &nbsp;</li>\n	<li>When it is necessary in order to provide and maintain Enlight21.com&rsquo;s services to our members.</li>\n	<li>When we believe that laws or regulations call for us to turn over your personal information</li>\n	<li>When it is necessary in order to protect the rights, property, or safety of Enlight21.com, its members, and the public. &nbsp;&nbsp;</li>\n	<li>When we have cause to believe that you have violated Federal Trade Commission regulations, State laws, or local statutes. &nbsp;&nbsp;</li>\n	<li>When we need to enforce our User Terms and Agreements.</li>\n</ol>\n\n<p><strong>SECURITY SAFEGUARDS</strong></p>\n\n<p>We have implemented appropriate security safeguards designed to protect your information in accordance with industry standards.</p>\n\n<p><strong>MODIFICATION OF OUR PRIVACY POLICY</strong></p>\n\n<p>We reserve the right to modify this Privacy Policy in the future. &nbsp;If changes are made to this Privacy Policy, we will send &ldquo;Privacy Policy Change&rdquo; notices to your registered email and changes will be posted on our website &nbsp;in our &ldquo;Privacy Policy&rdquo; section or by other means so that you may review the changes before you continue to use Enlight21.com. &nbsp; If you object to any changes, you may close your account. Continuing to use Enlight21.com &nbsp;after we publish or communicate a notice about any changes to this Privacy Policy means that you are consenting to the changes.</p>\n', '2018-10-16 14:43:31', '2019-12-11 03:00:03'),
(12, 'About', 'about', '<p>Founded in 2008,&nbsp;<a href=\"http://stackoverflow.com/\">Stack Overflow</a>&nbsp;is the largest, most trusted online community for developers to learn, share their knowledge, and build their careers. More than 50 million professional and aspiring programmers visit Stack Overflow each month to help solve coding problems, develop new skills, and find job opportunities.</p>\n\n<p>Stack Overflow partners with businesses to help them understand, hire, engage, and enable the world&#39;s developers. Our products and services are focused on developer marketing, technical recruiting, market research, and enterprise knowledge sharing.&nbsp;<a href=\"https://www.stackoverflowbusiness.com/\">Learn more about our business solutions here</a>.</p>\n\n<ul>\n	<li>&nbsp;</li>\n</ul>\n', '2018-10-16 14:43:37', '2018-10-20 07:16:15'),
(17, 'Election Central', 'election-central', '<p>Election Central&rsquo;s goal is to present both data on important elections AND information on candidates and key issues. &nbsp;Moreover, we will also present summaries of thought-provoking election-related analyses.</p>\n\n<p><strong>Election 2020: &nbsp;</strong></p>\n\n<ol>\n	<li><a href=\"https://www.realclearpolitics.com/epolls/latest_polls/democratic_nomination_polls/\" target=\"_blank\">Latest Dem 2020 Presidential Primary Polls&nbsp;</a></li>\n	<li><a href=\"https://www.realclearpolitics.com/epolls/latest_polls/national_president/\" target=\"_blank\">Latest General Election Presidential Polls</a></li>\n	<li><a href=\"https://projects.fivethirtyeight.com/polls/\" target=\"_blank\">Latest Presidential Approval Polls</a></li>\n	<li>2020 Democratic Party Candidates and Positions: (link to page)</li>\n</ol>\n', '2019-11-12 23:50:43', '2019-11-12 23:50:43'),
(18, 'Terms of Use', 'terms-of-use', '<p><strong>PLEASE READ THESE TERMS OF USE CAREFULLY BEFORE USING THIS SITE. &nbsp;BY USING THIS SITE, YOU ARE AGREEING TO COMPLY WITH AND BE BOUND BY THE FOLLOWING TERMS OF USE. &nbsp;IF YOU DO NOT AGREE TO THESE TERMS OF USE, YOU SHOULD NOT USE THIS SITE.</strong></p>\n\n<p>These Terms of Use apply to Enlight21.com (the &ldquo;Site&rdquo;), a website controlled by its parent company, Ivy Academics, Inc. and/or its subsidiary and affiliated entities (collectively &ldquo;we&rdquo;, &ldquo;us&rdquo;, or &ldquo;our&rdquo;), and to your use of any content, materials, features, and services offered on the Site. The term &ldquo;you&rdquo; refers to the user or viewer of the Site.</p>\n\n<p><strong>1. &nbsp;Agreeing to Terms of Use</strong></p>\n\n<p>These Terms of Use are rules for your interaction with the Site. By using this Site, you are agreeing to these Terms of Use. IF YOU DO NOT AGREE TO THESE TERMS OF USE, PLEASE DO NOT USE OR ACCESS THE SITE.</p>\n\n<p>Other terms may apply to your use of a specific portion of the Site. If there is a conflict between these Terms of Use and terms posted for a specific portion of the Site, the terms posted for such specific portion apply to your use of that portion of the Site.<br />\nBy using the Site, you also acknowledge that these Terms of Use are supported by reasonable and valuable consideration, which includes your use and enjoyment of the Site, the content, materials, features, and services offered on them, and our review, use, or display of any content or materials you share with us.</p>\n\n<p><strong>2. &nbsp;Updates to Terms of Use</strong></p>\n\n<p>We may revise and update these Terms of Use at any time. You are responsible for periodically reading them. If you use the Site after we have updated these Terms of Use, you acknowledge that you have read the updated terms of use and agree to follow them. Your continued use of the Site means you accept those changes.</p>\n\n<p><strong>3. &nbsp;Profiles, Names, Passwords and Security</strong></p>\n\n<p>To take advantage of the interactive features of the Site, you will be required to register as a &ldquo;Member.&rdquo; As part of the registration, you will be able to create a profile with your real legal name based on information and preferences you provide to us.</p>\n\n<p>You agree:</p>\n\n<ul>\n	<li>that you are at least 13 years of age or older&nbsp;</li>\n	<li>that you will only register as a Member with a true, valid email address;</li>\n	<li>to let us know of any changes to such email address;</li>\n	<li>not to use anyone else&rsquo;s name or email address to access the interactive features of the Site;</li>\n	<li>to safeguard your name, password, and any email address you provide, and to take responsibility for all activity on the Member account;</li>\n	<li>to notify us immediately if you find out that someone else is using your name, email address, or Member account without your permission; and</li>\n	<li>not to register for more than one Member account</li>\n</ul>\n\n<p>We do not guarantee that any information you provide will not be intercepted by a third party during transmission over any public networks or otherwise. You bear the risk of communicating with us electronically and we are not responsible for any resulting loss or damage.</p>\n\n<p>We have several tools that allow you to record and store information. You are responsible for taking all reasonable steps to ensure that no unauthorized person shall have access to your Site passwords or accounts. It is your sole responsibility to (1) control the dissemination and use of activation codes and passwords; (2) authorize, monitor, and control access to and use of your membership account and password; (3) promptly inform us of any need to deactivate a password. You grant us and all other persons or entities involved in the operation of the Site the right to transmit, monitor, retrieve, store, and use your information in connection with the operation of the Site. We cannot and do not assume any responsibility or liability for any information you submit, or your or third parties&rsquo; use or misuse of information transmitted or received using our tools and services.</p>\n\n<p><strong>4. &nbsp;Using the Content on the Site</strong></p>\n\n<p>The Site is for the personal use of individual users and the groups they create, and may not be transferred, assigned, or used in connection with any commercial or illegal endeavor.&nbsp;</p>\n\n<p>We have created and/or compiled the content on the Site (including, but not limited to, characters, logos, graphics, illustrations, website layout and design, text, stories, communications, images, audio and video, software, and images, files, or data incorporated in the software or generated by the software) (collectively, the &ldquo;Content&rdquo;) for your information and use. The Content is intended for informational purposes only and does not provide professional advice of any kind, including without limitation financial or medical advice. The Content is not intended to replace or modify the advice of a professional adviser such as your financial adviser or health care provider.</p>\n\n<p>Note the &ldquo;Queries&rdquo; section is for members to give each other advice. &nbsp;It is up to you to decide what advice you will follow. &nbsp;We do NOT endorse any advice given by members and we do not assume liability for any content, including advice content, posted by members.&nbsp;</p>\n\n<p>The Content is owned, controlled, or licensed by or to us. It may be protected by copyright, trademark, and other intellectual property laws and rights throughout the world.<br />\nExcept for Content you originate, you may only use the Content for your personal, non-commercial use. You may not copy, reproduce, distribute, publish, post, upload, transmit, adapt, modify or create derivative works of or from, publicly display or perform, or in any way exploit any Content unless you first request and obtain written permission from the owner of such Content. &nbsp;You may not use the name &ldquo;Enlight21&rdquo; or Enlight21.com or any mark, logo, or trade name owned or used by Enlight21.com in any medium whatsoever, unless you first request and obtain written permission from us.</p>\n\n<p>We and our licensors retain all right, title, and interest in and to the Site and in and to any Content, features, products, or services offered on the Site, including any and all intellectual property rights. We reserve all rights not expressly granted.</p>\n\n<p><strong>5. &nbsp;Materials Posted on the Site</strong></p>\n\n<p>We do not endorse, control, or assume any responsibility or liability for any Content you or others submit, post, or share on or through the Site, including any screen names, profile names, avatars, photos, graphics, ideas, images, creative works and text. &nbsp;You understand that you are solely responsible for any Content you originate. You agree that you must evaluate, and bear all risks associated with, the use and/or disclosure of any Content.</p>\n\n<p>While all visitors to the Site can view the Site, participate in polls and review current poll results, only Members have the ability to post comments and upload media to the Site, participate in the public areas including blogs, message boards, book groups, films, must read, election central, queries, opinions, news, reviews, instant messengers, and forums, chat rooms, comment fields and any other area of the Site (including new sections not mentioned here), to which users can post information (&ldquo;Public Areas&rdquo;) and use the various tools available on the Site. By submitting Content to the Public Areas, you agree that such Content is non-confidential for all purposes.</p>\n\n<p><strong>PLEASE BE EXTREMELY CAREFUL WHEN DISCLOSING ANY INFORMATION ABOUT YOURSELF OR OTHERS IN PUBLIC AREAS OF OUR SITE. WE ARE NOT RESPONSIBLE FOR THE USE OR DISCLOSURE OF SUCH INFORMATION.</strong></p>\n\n<p>By posting, sharing or otherwise providing any Content to the Site, you own your own content, but you agree to grant us an irrevocable, perpetual, worldwide, royalty-free license to:</p>\n\n<ul>\n	<li>use, modify, copy, distribute, and publicly perform and display any such Content, with or without attribution of your name, in whole or in part, throughout the universe in any and all media, now known or hereinafter devised, alone, or together as part of other material of any kind or nature, including without limitation, for commercial use, advertising, and promotional purposes;</li>\n	<li>publish your name with such Content; and</li>\n	<li>give or transfer these rights to others.</li>\n</ul>\n\n<p>You also represent and warrant that you have all the rights necessary for you to grant these rights and that the use and publication of such Content does not violate or infringe the rights of any third party or breach any law, including if such Content contains the name, voice, likeness or image of any individual.<br />\nWe retain the right, but not the obligation, to monitor the Content you or others post on the Site. We may, at our sole discretion, remove any Content that you or others post, share or otherwise provide to the Site at any time without notice.</p>\n\n<p><strong>6. &nbsp;Prohibited Uses and Our Rights</strong></p>\n\n<p>You may not reverse engineer, disassemble, or decompile, derive code or materials from, or capture any source, scripts, layouts, design, metadata, or other information accessible through the Site (including, without limitation, data packets transmitted to and from our Site), or analyze, decipher, &ldquo;sniff&rdquo;, derive code or materials from any packet stream to our from the Site, or attempt any of the foregoing.</p>\n\n<p>Further, in using the Site, you may not do the following:</p>\n\n<ul>\n	<li>violate these terms of use, infringe upon our rights or the rights of others (including, without limitation, intellectually property rights, rights of privacy such as unauthorized disclosure of a person&rsquo;s name or email or physical address or phone number, and rights of publicity), or violate any laws;</li>\n	<li>conduct or solicit illegal or other activity that in any way harms us or any of our affiliates and business partners;</li>\n	<li>post, email, message, or otherwise make available through the Site, any Content that</li>\n	<li>incites, advocates, or expresses pornography, obscenity, vulgarity, profanity, hatred, bigotry, racism, or gratuitous violence,</li>\n	<li>is intended to threaten, stalk, defame, defraud, degrade, victimize, or intimidate an individual or group of individuals for any reason,</li>\n	<li>is illegal or violates any laws, including laws related to adult activities and content, child pornography, criminal activities, gambling, and drugs, or</li>\n	<li>promotes an illegal or unauthorized copy of another person&rsquo;s copyrighted work, such as providing pirated music or videos or computer programs, or links to such materials;</li>\n	<li>engage or attempt to engage in commercial activities or sales, such as contests, sweepstakes, barter, advertising, or the buying or selling of &ldquo;virtual&rdquo; items, without our prior written permission;</li>\n	<li>disguise the origin of any message, communication, or transmittal you send to us through the Site;</li>\n	<li>use any robot, spider, scraper, or other automated or manual means to access our Site, or copy any Content (except for Content you originate) or other information on the Site;</li>\n	<li>attempt to gain unauthorized access to any portion of the Site or any related networks or systems by hacking, password &ldquo;mining&rdquo;, or any other illegitimate means;</li>\n	<li>probe, scan, test the vulnerability of or breach the authentication measures of, the Site or any related networks or systems;</li>\n	<li>modify or reroute or attempt to reroute the Site;</li>\n	<li>link to the Site from any unsolicited bulk messages or unsolicited commercial messages (&ldquo;spam&rdquo;);</li>\n	<li>utilize framing, squeeze back, overlay or other techniques to enclose or display the Site or any Content (except for Content you originate), with any other software or content of a third party;</li>\n	<li>take any action that places a disproportionately large load on the Site or any related networks or systems;</li>\n	<li>post chain letters or pyramid schemes;</li>\n	<li>distribute viruses or other harmful computer code;</li>\n	<li>harvest or otherwise collect information about others, including email addresses, without their written permission;</li>\n	<li>allow any other person or entity to use your identification for posting or viewing comments; &nbsp;or</li>\n	<li>engage in any other conduct that restricts or inhibits any other person from using or enjoying the Site, or which, in our judgment, exposes us or any third party to any liability or detriment of any kind.</li>\n</ul>\n\n<p>We reserve the right, but not the obligation, to investigate and take appropriate legal action against anyone who we believe is violating these Terms of Use, including without limitation, removing any materials, suspending or terminating the registration of such violators, or suspending or terminating their right to use the Site.</p>\n\n<p>This list of prohibited uses is not meant to be exhaustive. &nbsp;We reserve the right to determine what conduct we consider to be in violation of these Terms of Use or otherwise outside the spirit of the intended use of the Site. &nbsp;We reserve the right to take action, which may include termination of your account and exclusion from further participation in any part of the Site.</p>\n\n<p>We reserve the right (but are not obligated) to do any or all of the following:</p>\n\n<ul>\n	<li>Record and archive the Content.</li>\n	<li>Approve any Content before it is posted.</li>\n	<li>Investigate an allegation that any Content does not conform to these Terms of Use.</li>\n	<li>Determine in our sole discretion whether to remove or request the removal of any Content.</li>\n	<li>Remove Content which is abusive, illegal, or disruptive, or that otherwise fail to conform to these Terms of Use.</li>\n	<li>Terminate a user&rsquo;s access to any or all Public Areas and/or the Site upon any breach of these Terms of Use.</li>\n	<li>Monitor, edit, delete or disclose any Content.</li>\n	<li>Edit or delete any Content posted on the Site, regardless of whether such Content violates these Terms of Use</li>\n</ul>\n\n<p><strong>7. &nbsp;Privacy</strong></p>\n\n<p>To understand how and what information we collect, and how we may use or disclose such information, please carefully read our Privacy Policy that is incorporated into these Terms of Use by this reference. &nbsp;By using the Site, you acknowledge that you have read our Privacy Policy and consent to our privacy practices. You further affirm your consent by becoming a registered Member or submitting content or materials to or through the Site.</p>\n\n<p><strong>8. &nbsp;Public Areas and Submissions</strong></p>\n\n<p>If you make any such submission, you agree that you will not send or transmit to us by email, (including through the email addresses listed on the &ldquo;Contact Us&rdquo; link) any communication that infringes or violates any rights of any party. If you submit any business information, idea, concept or invention to us by email, you agree such submission is non-confidential for all purposes.</p>\n\n<p>If you make any submission to a Public Area or if you submit any business information, idea, concept or invention to us, you grant to us, or warrant that the owner of such content or intellectual property has expressly granted to us, a royalty-free, perpetual, irrevocable, world-wide nonexclusive license to use, reproduce, create derivative works from, modify, publish, edit, translate, distribute, perform, and display the communication or content in any media or medium, or any form, format, or forum now known or hereafter developed (and to sublicense these rights through multiple tiers of sublicensors). If you wish to keep any business information, ideas, concepts or inventions private or proprietary, do not submit them to the Public Areas or to us by email or in any other way.</p>\n\n<p>If you use a Public Area you are solely responsible for your own Content, the consequences of posting that Content, and your reliance on any Content found in the Public Areas. We are not responsible for the consequences of any Content in the Public Areas. In cases where you feel threatened or believe someone else is in danger, you should contact your local law enforcement agency immediately. If you think you may have a medical emergency, call your doctor or 911 immediately.</p>\n\n<p><strong>9. &nbsp;Posting and Submission of Media</strong></p>\n\n<p>You agree to only post or upload Content that is media, such as photos, videos or audio, (collectively, &ldquo;Media&rdquo;) that you have taken yourself or that you have all rights to transmit and license and which do not violate trademark, copyright, privacy or any other rights of any other person.</p>\n\n<p>You agree that you will not submit any Media that contains Personally Identifiable Information (including but not limited to name, phone number, email address or web site URL) of you or of anyone else. Uploading Media of other people without their express written permission is strictly prohibited.</p>\n\n<p>By uploading any Media on the Site, you warrant that you have permission from all persons appearing in the Media for you to make this contribution and grant the rights described herein.</p>\n\n<p>By uploading any Media you certify that any person pictured in the submitted Media (or, if a minor, his/her parent/legal guardian) authorizes us &nbsp;to use, copy, print, display, reproduce, modify, publish, post, transmit and distribute the Media and any material included in such Media.</p>\n\n<p>We reserve the right to review all Media prior to submission to the site and to remove any Media for any reason, at any time, without prior notice, at our sole discretion.</p>\n\n<p><strong>10. &nbsp;Electronic Notices and Communications</strong></p>\n\n<p>By visiting the Site or sending us email, you are communicating with us electronically. By communicating with us electronically, you agree that:</p>\n\n<ul>\n	<li>we may communicate with you electronically by email, or as appropriate, by posting general notices on our Site;</li>\n	<li>all notices, disclosures, and other communications that we send you electronically satisfy any legal requirement that such communications be in writing; and</li>\n	<li>any notices are deemed to be given and received on the date we transmit any electronic communication as described above.</li>\n</ul>\n\n<p><strong>11. &nbsp;Unsolicited Ideas and Feedbac</strong>k</p>\n\n<p>If you choose to send us your ideas or submit feedback through the Site feedback@enlight21.com or otherwise, you agree that:</p>\n\n<ul>\n	<li>your ideas automatically become our property, without any compensation to you;</li>\n	<li>we can commercialize these ideas and use them for any purpose and in any way; and</li>\n	<li>we can give and transfer these ideas to others.</li>\n</ul>\n\n<p>You also represent and warrant that such ideas are your original ideas and that you have all the rights necessary for you to grant us rights to them, as described above.</p>\n\n<p><strong>12. &nbsp;Third Party Material</strong></p>\n\n<p>The Site may contain:</p>\n\n<ul>\n	<li>references to names, marks, data, content, products, or services of third parties;</li>\n	<li>links to third-party websites; and</li>\n	<li>descriptions of services and products provided by third parties.</li>\n</ul>\n\n<p>These references, links, and descriptions are provided solely for your convenience, &nbsp;By including these references, we do not endorse these parties, their content, or any products and services they offer. These parties are not under our control and we are not responsible for them, or the operation and availability of their websites or any content of their websites. All disclaimers and other notices associated with such materials shall apply and supplement these terms of use as to the individual content. You are responsible for knowing when you are leaving our Site to visit a third-party website, and for reading and understanding the terms of use and privacy policy statements for each such third-party website.</p>\n\n<p><strong>13. &nbsp;No Warranties and Disclaimer</strong></p>\n\n<p>The Site is for communication and information exchange purposes only. We make no guarantee about the accuracy or reliability of the Site or any Content, materials, features, and services on the Site.</p>\n\n<p>WE DO NOT WARRANT THAT THE SITE OR ANY CONTENT, MATERIALS, FEATURES, OR SERVICE ON IT WILL BE ERROR-FREE, UNINTERRUPTED, PROVIDE YOU WITH SPECIFIC RESULTS, OR BE FREE OF VIRUSES OR OTHER HARMFUL COMPONENTS.</p>\n\n<p>THE CONTENT, MATERIALS, FEATURES, AND SERVICES ON THE SITE ARE PROVIDED &ldquo;AS-IS&rdquo;, &ldquo;WITH ALL FAULTS&rdquo;, AND &ldquo;AS AVAILABLE&rdquo;. TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE DISCLAIM ALL EXPRESS, IMPLIED, AND STATUTORY WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THOSE OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, WORKMANLIKE EFFORT, NON-INFRINGEMENT, AND SATISFACTORY QUALITY. YOU AGREE THAT YOU ARE SOLELY RESPONSIBLE FOR ANY USE OR MISUSE OF THE CONTENT AND SERVICES PROVIDED ON OR THROUGH THE SITE AND FOR COMPLIANCE WITH ALL LAWS APPLICABLE TO SUCH USE. &nbsp;YOU AGREE THAT YOUR USE OF THE SITE IS AT YOUR OWN RISK, AND THAT BY USING THE SITE, YOU MAY BE EXPOSED TO CONTENT THAT IS OFFENSIVE, INDECENT, OBJECTIONABLE, OR THAT DOES OTHERWISE MEET YOUR NEEDS.</p>\n\n<p>YOU MAY HAVE ADDITIONAL RIGHTS UNDER APPLICABLE LAW THAT PRECLUDE OR LIMIT THE EXCLUSION AND DISCLAIMERS ABOVE.</p>\n\n<p><strong>14. &nbsp;Limitation of Liability; Rights and Remedies</strong></p>\n\n<p>NEITHER WE NOR ANY OF OUR RESPECTIVE LICENSORS OR SUPPLIERS WILL BE LIABLE TO YOU UNDER ANY THEORY OF LIABILITY, FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, CONSEQUENTIAL, PUNITIVE, OR EXEMPLARY, OR OTHER DAMAGES ARISING OUT OF YOUR USE OR INABILITY TO USE THE SITE OR ANY CONTENT, SERVICES OR OTHER INFORMATION AVAILABLE THROUGH IT, INCLUDING, BUT NOT LIMITED TO LOSS OF REVENUES, LOSS OF PROFITS, OR LOSS OR CORRUPTION OF DATA, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.</p>\n\n<p>IF YOU ARE DISSATISFIED WITH THE SITE OR ANY OF THE CONTENT, &nbsp;MATERIALS, SERVICES OR INFORMATION AVAILABLE THROUGH THE SITE, YOUR SOLE AND EXCLUSIVE REMEDY IS TO DISCONTINUE ACCESSING AND USING OUR SITE.</p>\n\n<p>THE FOREGOING LIMITATIONS SHALL APPLY EVEN IF YOUR REMEDIES UNDER THESE TERMS OF USE FAIL OF THEIR ESSENTIAL PURPOSE. YOU MAY HAVE ADDITIONAL RIGHTS UNDER APPLICABLE LAW THAT PRECLUDE OR LIMIT THE LIMITATIONS ABOVE.</p>\n\n<p>Without limiting any other rights and remedies available to us, we reserve the right, in our sole discretion and without prior notice, to end your access to the Site or block your future access to the Site for any reason.</p>\n\n<p>You agree that any violation, or threatened violation, by you of these Terms of Use will cause us irreparable and unquantifiable harm. You also agree that monetary damages would be inadequate for such harm and consent to our obtaining any injunctive or equitable relief that we deem necessary or appropriate. &nbsp;These remedies are in addition to any other remedies we may have at law or in equity.</p>\n\n<p><strong>15. &nbsp;Indemnity</strong></p>\n\n<p>You agree to defend, indemnify, and hold Enlight21.com., its officers, directors, employees, agents, licensors, and suppliers, harmless from and against any claims, losses, actions or demands, liabilities and settlements including without limitation, legal and accounting fees, made by a third party due to or arising from:</p>\n\n<ul>\n	<li>Information in your account and any information you (or anyone accessing the Site using your password) submit, post or transmit through the Site</li>\n	<li>Your (or anyone accessing the Site using your password) use of the Site</li>\n	<li>Your (or anyone accessing the Site using your password) violation of these Terms of Use; and</li>\n	<li>Your (or anyone accessing the Site using your password) violation of any rights of any other person or entity.</li>\n</ul>\n\n<p><strong>16. &nbsp;Use Outside of the United States and Export Issues</strong></p>\n\n<p>We are based in the United States of America, and make no claims that the Site may be accessed from, or that Content on the Site is appropriate or may be downloaded from, outside of the United States. &nbsp;The Content and any other materials provided on the Site are not intended for distribution to or use by any person or entity in any jurisdiction where such distribution or use would be contrary to law or regulation or which would subject us to any registration requirement within such jurisdiction or country. &nbsp;Accordingly, those persons who choose to access the Site from other locations do so on their own initiative and are solely responsible for compliance with local laws, if and to the extent local laws are applicable.</p>\n\n<p>Portions of the Site may be subject to United States export controls. You agree to comply with such export controls, as well as similar such controls in any applicable jurisdiction. &nbsp;Without limiting the foregoing, you agree that no software from the Site may be downloaded, exported or re-exported (a) into (or to a national or resident of) People&rsquo;s Republic of China, Cuba, Iraq, North Korea, Iran, Syria, or any other country to which the United States has embargoed goods; or (b) to anyone on the U.S. Treasury Department&rsquo;s list of Specially Designated Nationals or the U.S. Commerce Department&rsquo;s Table of Deny Orders.</p>\n\n<p><strong>17. &nbsp;Force Majeure</strong></p>\n\n<p>We will not be deemed to be in breach of these Terms of Use due to any event or circumstance beyond our reasonable control, including without limitation, war, invasion, failures of any public networks, electrical shortages, terrorist attacks, and earthquakes and other acts of God. We are not responsible for any loss, delay, or damage due to such events or circumstances.</p>\n\n<p><strong>18. &nbsp;Jurisdiction and Applicable Law</strong></p>\n\n<p>The exclusive jurisdiction and venue of any action with respect to the subject matter of these Terms of Use will be the state and federal courts located in San Francisco, California, or San Mateo, California, and each of the parties hereto waives any objection to jurisdiction and venue in such courts. The parties specifically disclaim application of the United Nations Convention on Contracts for the International Sale of Goods. These Terms of Use are governed by the internal substantive laws of the State of California, without respect to its conflict of laws principles.</p>\n\n<p><strong>19. &nbsp;Miscellaneous</strong></p>\n\n<p>You agree that no joint venture, partnership, employment or agency relationship exists between you and us as a result of these Terms of Use or your use of the Site. These Terms of Use constitute the entire agreement between you and us with respect to your use of the Site and any other subject matter hereof and cannot be changed or modified by you except as expressly posted on the Site by us. &nbsp;Any failure by us to exercise or enforce any right or provision of these Terms of Use shall not constitute a waiver of such right or provision, and no waiver by either party of any breach or default hereunder shall be deemed to be a waiver of any preceding or subsequent breach or default. &nbsp;If any provision of these Terms of Use is found by a court of competent jurisdiction to be invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties&rsquo; intentions as reflected in the provision, and the other provisions of these Terms of Use shall remain in full force and effect. &nbsp;Neither the course of conduct between the parties nor trade practice will act to modify these Terms of Use. &nbsp;These Terms of Use shall not be assigned by you without our prior written consent, but are freely assignable by us. &nbsp;The section headings used herein are for convenience only and shall not be given any legal import. &nbsp;Upon our request, you will furnish us any documentation, substantiation or releases necessary to verify your compliance with these Terms of Use. &nbsp;You agree that these Terms of Use will not be construed against us by virtue of having drafted them. You hereby waive any and all defenses you may have based on the electronic form of these Terms of Use and the lack of signing by the parties hereto to execute these Terms of Use. &nbsp;Any provisions of these Terms of Use that, by their nature, are intended to survive termination of these Terms of Use shall survive any termination of these Terms of Use</p>\n\n<p>Thank you for your cooperation. &nbsp;Questions or comments regarding this website should be submitted to info@enlight21.com<br />\n<strong>These Terms of Use were posted on November 20, 2019</strong><br />\n&nbsp;</p>\n', '2019-12-04 08:41:21', '2019-12-11 02:59:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avata` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `tocken` varchar(225) DEFAULT NULL,
  `remember_me_identify` text,
  `remember_me_token` text,
  `remember_active_token` varchar(250) DEFAULT NULL,
  `datebirth` date NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '2',
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `gender` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `interest` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `avata`, `firstname`, `lastname`, `phone`, `address`, `tocken`, `remember_me_identify`, `remember_me_token`, `remember_active_token`, `datebirth`, `role`, `status`, `gender`, `country`, `website`, `interest`, `created`, `updated`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5bebaeb9390d0.jpeg', 'Alex', 'B', '0987654321', '123 ABC street, US', '', '', '', NULL, '1986-08-04', 1, 1, 0, 'United States', 'http://example1.com', 'Music, Dance', '2017-09-16 11:34:12', '2019-12-11 03:08:25'),
(2, 'user@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883327338736.png', 'Adam', 'user1', '0987654322', '124 ABC street, US', '', '', '', NULL, '1980-04-01', 2, 0, 0, 'american', 'http://example2.com', 'Music, Dance', '2017-09-28 11:00:45', '2019-02-14 22:31:57'),
(3, 'user2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c8b0e1f877d6.jpeg', 'user', 'user2', '0987654323', '125 ABC street, US', '', '$2y$10$T8LSsMs1cyEwyEBMbxjmMg==', '$2y$10$T8LSsMs1cyEwyEBMbxjmMe.5IUW0K0JRQ35SMpRWjCxKeQ.9FGZYK', NULL, '1994-02-16', 2, 1, 0, 'vietnam', 'http://example3.com', 'Music, Sport', '2017-09-28 11:01:25', '2019-03-15 09:29:51'),
(4, 'user3@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883328950638.jpeg', 'user', 'user3', '0987654324', '126 ABC street, US', '', '$2y$10$KPv.JqqZy39Vqxc6ZovqRA==', '$2y$10$KPv.JqqZy39Vqxc6ZovqR.RQt0RJFl2rZUeHXCFnVGPg7K0hPcS6e', NULL, '1994-02-21', 2, 1, 1, 'vietnam', 'http://example4.com', 'Music, Dance', '2017-09-28 11:01:25', '2019-02-14 22:31:57'),
(5, 'user4@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883329694197.jpeg', 'user', 'user4', '0987654325', '126 ABC street, US', NULL, NULL, NULL, NULL, '1996-10-12', 2, 1, 0, 'american', 'http://example5.com', 'Music, Dance', '2018-10-05 11:20:41', '2019-02-14 22:31:57'),
(6, 'user6@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883328177193.jpeg', 'user', 'user6', '0987654323', '125 ABC street, US', '', '', '', NULL, '1994-02-16', 2, 1, 0, 'vietnam', 'http://example3.com', 'Music, Dance', '2017-09-28 11:01:25', '2019-02-14 22:31:57'),
(7, 'user7@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883328950638.jpeg', 'user', 'user7', '0987654324', '126 ABC street, US', '', '', '', NULL, '1994-02-21', 2, 1, 1, 'vietnam', 'http://example4.com', 'Music, Dance', '2017-09-28 11:01:25', '2019-02-14 22:31:57'),
(8, 'user8@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883329694197.jpeg', 'user', 'user8', '0987654325', '126 ABC street, US', NULL, NULL, NULL, NULL, '1996-10-12', 2, 1, 0, 'american', 'http://example5.com', 'Music, Dance', '2018-10-05 11:20:41', '2019-02-14 22:31:57'),
(9, 'admin2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883332751056.jpeg', 'user', 'admin2', '0987654329', '126 ABC street, US', NULL, NULL, NULL, NULL, '2018-10-26', 1, 1, 1, 'american', 'http://example9.com', 'Music, Dance', '2018-10-05 05:03:02', '2019-02-14 22:31:57'),
(10, 'nguyenvanan@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153957758959062.png', 'nguyen van an', 'nguyen', '547658658', 'DNang', NULL, NULL, NULL, NULL, '2018-10-12', 2, 0, 1, 'vn', 'http://example.com2', 'Music, Dance', '2018-10-15 11:26:29', '2019-02-14 22:31:57'),
(11, 'user11@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883329694197.jpeg', 'user', 'user11', '0987654325', '126 ABC street, US', NULL, NULL, NULL, NULL, '1996-10-12', 2, 1, 0, 'american', 'http://example5.com', 'Music, Dance', '2018-10-05 11:20:41', '2019-02-14 22:31:57'),
(12, 'nguyenvanan@gmail.com12', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'nguyen van an2', 'nguyen12', '7698709769', 'DNang', NULL, NULL, NULL, NULL, '2018-10-10', 2, 0, 1, 'vn', 'http://example.com2', 'Music, Dance', '2018-10-15 11:27:12', '2019-02-14 22:31:57'),
(15, 'admin13@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '153883332751056.jpeg', 'user', 'admin13', '0987654329', '126 ABC street, US', NULL, NULL, NULL, NULL, '2018-10-26', 1, 1, 1, 'american', 'http://example9.com', 'Music, Dance', '2018-10-05 05:03:02', '2019-02-14 22:31:57'),
(16, 'nguyenan123@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5bebda4ef2b9e.jpeg', 'nguyen van ', 'an 123', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2018-11-14 03:18:23', '2019-02-14 22:31:57'),
(17, 'trietit93@gmail.com', '4297f44b13955235245b2497399d7a93', '5bebe3b3c206d.png', 'Adam', 'John', NULL, NULL, '154804341043775', NULL, NULL, NULL, '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2018-11-14 03:58:28', '2019-02-14 22:31:57'),
(18, 'lenin7118@gmail.com', 'c9dc6bdcdd70e1a2068e154f05975970', 'empty.jpg', 'Le', 'Ninh', NULL, NULL, '154220251943003', NULL, NULL, NULL, '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2018-11-14 08:34:46', '2019-02-14 22:31:57'),
(22, 'pscd123.trietpm@gmail.com\n', '827ccb0eea8a706c4c34a16891f84e7b\n', '5befd40b98c6e.png', 'David', 'Tony', NULL, NULL, NULL, NULL, NULL, '154244404317882', '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2018-11-17 03:40:43', '2019-02-14 22:31:57'),
(27, 'pscd.trietpm&#64;gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c453e00b916b.jpeg', 'John', 'David', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 2, 0, 1, '', '', 'Music, Dance', '2019-01-21 10:35:28', '2019-02-14 22:31:57'),
(29, 'user123&#64;gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'empty.jpg', 'John', 'David', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 2, 0, 0, '', '', 'Music, Dance', '2019-01-21 10:39:23', '2019-02-14 22:31:57'),
(30, 'user001&#64;gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c454049dea54.jpeg', 'test1', 'danh', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', 2, 0, 1, '', '', 'Music, Dance', '2019-01-21 10:45:14', '2019-02-14 22:31:57'),
(31, 'user0001@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c4544567237f.jpeg', 'Danh', 'test', NULL, NULL, NULL, NULL, NULL, '154804335053646', '0000-00-00', 2, 0, 1, '', '', 'Music, Dance', '2019-01-21 11:02:30', '2019-02-14 22:31:57'),
(32, 'tambietnhet@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c4544d65fa79.jpeg', 'test', 'test', NULL, NULL, NULL, NULL, NULL, '154804347844493', '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2019-01-21 11:04:38', '2019-02-14 22:31:57'),
(33, 'pscd.trietpm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '5c45470f63652.jpeg', 'John', 'David', NULL, NULL, NULL, NULL, NULL, '154804404732843', '0000-00-00', 2, 1, 1, '', '', 'Music, Dance', '2019-01-21 11:14:07', '2019-02-14 22:31:57'),
(34, 'btang44@gmail.com', 'c194c4eb50e170d0f6404f1a6f05080f', '5c5aa91361ee9.jpeg', 'Belicia ', 'Tang', NULL, NULL, NULL, NULL, NULL, '154944539511983', '0000-00-00', 2, 1, 0, 'USA ', 'btang44.com', 'Music, Dance', '2019-02-06 04:29:55', '2019-02-14 22:31:57'),
(36, 'fsdf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'empty.jpg', 'xX', 'xZX', NULL, NULL, NULL, NULL, NULL, '155063015111158', '0000-00-00', 2, 0, 1, '', '', NULL, '2019-02-20 09:35:51', '2019-02-19 20:35:51'),
(83, 'dev711815@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'empty.jpg', 'test', 'asda', NULL, NULL, NULL, NULL, NULL, '157551974719992', '0000-00-00', 2, 0, 1, '', '', NULL, '2019-12-05 11:22:27', '2019-12-04 22:22:27'),
(84, 'axelavi@gmail.com', '9701749e59b67cb6c2f8aaba179dcc69', '5de89e94b20b7.png', 'Alex', 'Ba1', '', '', NULL, NULL, NULL, '157552603742500', '1986-08-01', 1, 1, 1, '', '', NULL, '2019-12-05 01:07:17', '2019-12-11 04:41:58'),
(85, 'sue2042@gmail.com', '3d775c2f328cecc78b0f7ca26829ae11', '5deab52176ba7.jpeg', 'Sue', 'Chow', '', '', '157610322374734', NULL, NULL, '157566288113944', '1970-01-01', 1, 1, 0, 'USA', '', 'reading, thinking, debating, hiking. lobbying for environmental protection', '2019-12-07 03:08:01', '2019-12-12 05:29:06'),
(87, 'alex@gmail.com', '638054b67615b83fca5b0ab66a797bc2', 'empty.jpg', 'Alex', 'Z', NULL, NULL, NULL, NULL, NULL, '157605525442898', '0000-00-00', 2, 0, 1, '', '', NULL, '2019-12-11 04:07:34', '2019-12-11 03:07:34'),
(88, 'ivyacademics@gmail.com', 'b42b26a4fe27d81af37d52b9c4f6ba71', '5df2a8df24a98.jpeg', 'Rachel ', 'Nosrac', '6504540259', NULL, NULL, NULL, NULL, '157618403190815', '0000-00-00', 2, 0, 0, '', '', NULL, '2019-12-13 03:53:51', '2019-12-12 14:53:51'),
(89, 'ale@g.co', '7221a7ae112d4036da0e1c822544f83d', 'empty.jpg', 'Ale', 'Test', '4154104995', NULL, NULL, NULL, NULL, '157622205044945', '0000-00-00', 2, 0, 1, '', '', NULL, '2019-12-13 02:27:30', '2019-12-13 01:27:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_articles`
--
ALTER TABLE `blog_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_articles`
--
ALTER TABLE `book_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_comments`
--
ALTER TABLE `book_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_group_articles`
--
ALTER TABLE `book_group_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_group_article_books`
--
ALTER TABLE `book_group_article_books`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_group_article_users`
--
ALTER TABLE `book_group_article_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_group_categories`
--
ALTER TABLE `book_group_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_likes`
--
ALTER TABLE `book_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bulletins`
--
ALTER TABLE `bulletins`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `election_central_articles`
--
ALTER TABLE `election_central_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `election_central_categories`
--
ALTER TABLE `election_central_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `election_central_comments`
--
ALTER TABLE `election_central_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `election_central_likes`
--
ALTER TABLE `election_central_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `environment_articles`
--
ALTER TABLE `environment_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `environment_categories`
--
ALTER TABLE `environment_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `environment_comments`
--
ALTER TABLE `environment_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `environment_likes`
--
ALTER TABLE `environment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film_articles`
--
ALTER TABLE `film_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film_categories`
--
ALTER TABLE `film_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film_comments`
--
ALTER TABLE `film_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `film_likes`
--
ALTER TABLE `film_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `must_reads_articles`
--
ALTER TABLE `must_reads_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `must_reads_categories`
--
ALTER TABLE `must_reads_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `must_reads_comments`
--
ALTER TABLE `must_reads_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `must_reads_likes`
--
ALTER TABLE `must_reads_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_articles`
--
ALTER TABLE `new_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_categories`
--
ALTER TABLE `new_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_comments`
--
ALTER TABLE `new_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_likes`
--
ALTER TABLE `new_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notify_actions`
--
ALTER TABLE `notify_actions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notify_contents`
--
ALTER TABLE `notify_contents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `opinion_debate_articles`
--
ALTER TABLE `opinion_debate_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `opinion_debate_categories`
--
ALTER TABLE `opinion_debate_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `opinion_debate_comments`
--
ALTER TABLE `opinion_debate_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `opinion_debate_likes`
--
ALTER TABLE `opinion_debate_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `queries_articles`
--
ALTER TABLE `queries_articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `queries_categories`
--
ALTER TABLE `queries_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `queries_comments`
--
ALTER TABLE `queries_comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `queries_likes`
--
ALTER TABLE `queries_likes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `review_ratings`
--
ALTER TABLE `review_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `static_pages`
--
ALTER TABLE `static_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `actions`
--
ALTER TABLE `actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `blog_articles`
--
ALTER TABLE `blog_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `book_articles`
--
ALTER TABLE `book_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `book_comments`
--
ALTER TABLE `book_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `book_group_articles`
--
ALTER TABLE `book_group_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `book_group_article_books`
--
ALTER TABLE `book_group_article_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `book_group_article_users`
--
ALTER TABLE `book_group_article_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `book_group_categories`
--
ALTER TABLE `book_group_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `book_likes`
--
ALTER TABLE `book_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bulletins`
--
ALTER TABLE `bulletins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `election_central_articles`
--
ALTER TABLE `election_central_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `election_central_categories`
--
ALTER TABLE `election_central_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `election_central_comments`
--
ALTER TABLE `election_central_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `election_central_likes`
--
ALTER TABLE `election_central_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `environment_articles`
--
ALTER TABLE `environment_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `environment_categories`
--
ALTER TABLE `environment_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `environment_comments`
--
ALTER TABLE `environment_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `environment_likes`
--
ALTER TABLE `environment_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `film_articles`
--
ALTER TABLE `film_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT cho bảng `film_categories`
--
ALTER TABLE `film_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `film_comments`
--
ALTER TABLE `film_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `film_likes`
--
ALTER TABLE `film_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `must_reads_articles`
--
ALTER TABLE `must_reads_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `must_reads_categories`
--
ALTER TABLE `must_reads_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `must_reads_comments`
--
ALTER TABLE `must_reads_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `must_reads_likes`
--
ALTER TABLE `must_reads_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `new_articles`
--
ALTER TABLE `new_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `new_categories`
--
ALTER TABLE `new_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `new_comments`
--
ALTER TABLE `new_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `new_likes`
--
ALTER TABLE `new_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `notify_actions`
--
ALTER TABLE `notify_actions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `notify_contents`
--
ALTER TABLE `notify_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `opinion_debate_articles`
--
ALTER TABLE `opinion_debate_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `opinion_debate_categories`
--
ALTER TABLE `opinion_debate_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `opinion_debate_comments`
--
ALTER TABLE `opinion_debate_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `opinion_debate_likes`
--
ALTER TABLE `opinion_debate_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `queries_articles`
--
ALTER TABLE `queries_articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `queries_categories`
--
ALTER TABLE `queries_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `queries_comments`
--
ALTER TABLE `queries_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `queries_likes`
--
ALTER TABLE `queries_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `review_ratings`
--
ALTER TABLE `review_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT cho bảng `static_pages`
--
ALTER TABLE `static_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
