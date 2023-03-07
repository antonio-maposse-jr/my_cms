-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 18, 2023 at 03:53 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_spaces`
--

CREATE TABLE `ad_spaces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_spaces` int(11) NOT NULL,
  `ad_view` int(11) NOT NULL,
  `ad_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ad_spaces`
--

INSERT INTO `ad_spaces` (`id`, `ad_spaces`, `ad_view`, `ad_url`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(2, 2, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(3, 2, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(4, 3, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(5, 3, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(6, 4, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(7, 4, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(8, 5, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(9, 6, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(10, 6, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(11, 7, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(12, 7, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(13, 8, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(14, 8, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(15, 9, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(16, 9, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(17, 10, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(18, 10, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(19, 11, 0, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(20, 11, 1, 'https://codecanyon.net/item/infynews-laravel-news-and-magazines-blog-articles-php-script/38138839', NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `album_categories`
--

CREATE TABLE `album_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `analytics`
--

CREATE TABLE `analytics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_post`
--

CREATE TABLE `article_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `article_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_post`
--

INSERT INTO `article_post` (`id`, `post_id`, `article_content`, `created_at`, `updated_at`) VALUES
(1, 1, '\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 2, '\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/assets/image/post-image/post-19.jpg\" width=\"380\" height=\"253\" /></p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 3, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 4, '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.\n\n<p>Because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?</p>\n\n<p>When our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 5, '<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself</p>.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(6, 6, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of.</p>\n<p>How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(7, 7, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"423\" height=\"282\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(8, 8, '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.&nbsp;</p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.</p>\n<p><img class=\"images\" src=\"http://infy-news.test/front_web/images/default.jpg\" width=\"380\" height=\"253\" /></p>\n<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(9, 9, '\n                <p>In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>\n\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\n                ', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(10, 10, '\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(11, 11, '\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(12, 12, '\n<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish.</p>\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(13, 13, '\n                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(14, 14, '<p>\nتقليديا ، شدد العديد من اللغويين على أهمية إتقان الهياكل النحوية أولاً أثناء تدريس اللغة الإنجليزية. في السنوات الأخيرة ، أصبح غالبية اختصاصيي التوعية أكثر وعيًا بأخطاء هذا النهج ، واكتسبت المناهج الأخرى التي تعزز تطوير المفردات شعبية. تم اكتشاف أنه بدون مفردات لوضعها على رأس نظام القواعد ، يمكن للمتعلمين في الواقع أن يقولوا القليل جدًا على الرغم من قدرتهم على التلاعب بالبنى النحوية المعقدة في التدريبات الرياضية. من الواضح أنه لتعلم اللغة الإنجليزية ، يحتاج المرء إلى تعلم العديد من الكلمات.\n</p>\n<p>\nالمتحدثون الأصليون لديهم مفردات من حوالي 20000 كلمة لكن المتعلمين الأجانب للغة الإنجليزية يحتاجون أقل بكثير. يحتاجون فقط إلى حوالي 5000 كلمة ليكونوا مؤهلين تمامًا في التحدث والاستماع. سبب هذا العدد الصغير على ما يبدو هو طبيعة الكلمات وتكرار ظهورها في اللغة. يبدو واضحًا أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.\n</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(15, 15, '<p>التوحد هو اضطراب في نمو الدماغ يضعف التفاعل الاجتماعي والتواصل ويسبب سلوكًا مقيدًا ومتكررًا ، كل ذلك يبدأ قبل أن يبلغ الطفل سن الثالثة. تعتبر جينات التوحد معقدة ومن غير الواضح بشكل عام الجينات المسؤولة عن ذلك. يؤثر التوحد على أجزاء كثيرة من الدماغ ولكن كيفية حدوث ذلك غير مفهومة بشكل جيد. يرتبط التوحد ارتباطًا وثيقًا بالعوامل التي تسبب تشوهات خلقية. الأسباب الأخرى المقترحة ، مثل لقاحات الطفولة ، مثيرة للجدل وتفتقر فرضيات اللقاح إلى أدلة علمية مقنعة.\nزاد عدد الأشخاص المعروف أنهم مصابون بالتوحد بشكل كبير منذ الثمانينيات. عادة ما يلاحظ الآباء العلامات في العامين الأولين من حياة طفلهم. يمكن أن يساعد التدخل المعرفي السلوكي المبكر الأطفال على اكتساب مهارات الرعاية الذاتية ، ومهارات التواصل الاجتماعي ، ولكن لا يوجد علاج لذلك. قلة من الأطفال المصابين بالتوحد يعيشون بشكل مستقل بعد بلوغهم سن الرشد ، لكن الأمر نفسه أصبح ناجحًا وتطورت ثقافة التوحد ، مع السعي للحصول على علاج واعتقد آخرون أن التوحد هو حالة وليست اضطرابًا.</p>', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `audio_post`
--

CREATE TABLE `audio_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `audio_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_home_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `show_in_menu`, `show_in_home_page`, `color`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Animal', 'animal', '1', '1', '#b51cb2', 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'Gaming', 'gaming', '1', '0', '#2bc3a9', 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'Music', 'music', '0', '1', '#d514a5', 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 'Technology', 'technology', '0', '0', '#2a10ac', 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 'Sports', 'sports', '1', '1', '#5c1030', 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `currency_name`, `currency_icon`, `currency_code`, `created_at`, `updated_at`) VALUES
(1, 'USD US Dollar', '$', 'USD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(2, 'EUR Euro', '€', 'EUR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(3, 'HKD Hong Kong Dollar', '$', 'HKD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(4, 'INR Indian Rupee', '₹', 'INR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(5, 'AUD Australian Dollar', '$', 'AUD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(6, 'JMD Jamaican Dollar', 'J$', 'JMD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(7, 'CAD Canadian Dollar', '$', 'CAD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(8, 'AED United Arab Emirates Dirham', 'د.إ', 'AED', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(9, 'AFN Afghanistan Afghani', '؋', 'AFN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(10, 'ALL Albania Lek', 'Lek', 'ALL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(11, 'AMD Armenian Dram', '֏', 'AMD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(12, 'ANG Netherlands Antilles Guilder', 'ƒ', 'ANG', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(13, 'AOA Angola kwanza', 'Kz', 'AOA', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(14, 'ARS Argentina Peso', '$', 'ARS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(15, 'AWG Aruba Guilder', 'ƒ', 'AWG', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(16, 'AZN Azerbaijan Manat', '₼', 'AZN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(17, 'BAM Bosnia and Herzegovina Convertible Marka', 'KM', 'BAM', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(18, 'BBD Barbados Dollar', '$', 'BBD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(19, 'BDT Bangladesh Taka', '৳', 'BDT', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(20, 'BGN Bulgaria Lev', 'лв', 'BGN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(21, 'BMD Bermuda Dollar', '$', 'BMD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(22, 'BND Brunei Darussalam Dollar', '$', 'BND', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(23, 'BOB Bolivia Boliviano', '$b', 'BOB', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(24, 'BRL Brazil Real', 'R$', 'BRL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(25, 'BSD Bahamas Dollar', '$', 'BSD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(26, 'BWP Botswana Pula', 'P', 'BWP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(27, 'BZD Belize Dollar', 'BZ$', 'BZD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(28, 'CDF Congo Congolese franc', 'FC', 'CDF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(29, 'CHF Switzerland Franc', 'CHF', 'CHF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(30, 'CNY China Yuan Renminbi', '¥', 'CNY', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(31, 'COP Colombia Peso', '$', 'COP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(32, 'CRC Costa Rica Colon', '₡', 'CRC', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(33, 'CVE Cape Verde Escudo', '$', 'CVE', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(34, 'CZK Czech Republic Koruna', 'Kč', 'CZK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(35, 'DKK Denmark Krone', 'kr', 'DKK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(36, 'DOP Dominican Republic Peso', 'RD$', 'DOP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(37, 'DZD Algeria Dinar', 'دج', 'DZD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(38, 'EGP Egypt Pound', '£', 'EGP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(39, 'ETB Ethiopia Birr', 'ብር', 'ETB', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(40, 'FJD Fiji Dollar', '$', 'FJD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(41, 'FKP Falkland Islands Pound', '£', 'FKP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(42, 'GBP United Kingdom Pound', '£', 'GBP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(43, 'GEL Georgia Lari', '₾', 'GEL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(44, 'GIP Gibraltar Pound', '£', 'GIP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(45, 'GMD Gambia Dalasi', 'D', 'GMD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(46, 'GTQ Guatemala Quetzal', 'Q', 'GTQ', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(47, 'GYD Guyana Dollar', '$', 'GYD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(48, 'HNL Honduras Lempira', 'L', 'HNL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(49, 'HRK Croatia Kuna', 'kn', 'HRK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(50, 'HTG Haiti Gourde', 'G', 'HTG', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(51, 'HUF Hungary Forint', 'Ft', 'HUF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(52, 'IDR Indonesia Rupiah', 'Rp', 'IDR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(53, 'ILS Israel Shekel', '₪', 'ILS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(54, 'ISK Iceland Krona', 'kr', 'ISK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(55, 'KES Kenya Shilling', '/=', 'KES', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(56, 'KGS Kyrgyzstan Som', 'лв', 'KGS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(57, 'KHR Cambodia Riel', '៛', 'KHR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(58, 'KYD Cayman Dollar', '$', 'KYD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(59, 'KZT Kazakhstan Tenge', 'лв', 'KZT', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(60, 'LAK Laos Kip', '₭', 'LAK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(61, 'LBP Lebanon Pound', '£', 'LBP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(62, 'LKR Sri Lanka Rupee', '₨', 'LKR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(63, 'LRD Liberia Dollar', '$', 'LRD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(64, 'LSL Lesotho Loti', 'L', 'LSL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(65, 'MAD Morocco Dirham', 'MAD', 'MAD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(66, 'MDL Moldova Leu', 'L', 'MDL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(67, 'MKD Macedonia Denar', 'ден', 'MKD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(68, 'MMK Myanmar Kyat', 'K', 'MMK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(69, 'MNT Mongolia Tughrik', '₮', 'MNT', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(70, 'MOP Macau P ataca', 'MOP$', 'MOP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(71, 'MRO Mauritania Ouguiya', 'MRU', 'MRO', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(72, 'MUR Mauritius Rupee', '₨', 'MUR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(73, 'MVR Maldives Rufiyaa', '.ރ', 'MVR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(74, 'MWK Malawi Kwacha', 'MK', 'MWK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(75, 'MXN Mexico Peso', '$', 'MXN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(76, 'MYR Malaysia Ringgit', 'RM', 'MYR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(77, 'MZN Mozambique Metical', 'MT', 'MZN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(78, 'NAD Namibia Dollar', '$', 'NAD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(79, 'NGN Nigeria Naira', '₦', 'NGN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(80, 'NIO Nicaragua Cordoba', 'C$', 'NIO', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(81, 'NOK Norway Krone', 'kr', 'NOK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(82, 'NPR Nepal Rupee', '₨', 'NPR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(83, 'NZD New Zealand Dollar', '$', 'NZD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(84, 'PAB Panama Balboa', 'B/.', 'PAB', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(85, 'PEN Peru Nuevo Sol', 'S/.', 'PEN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(86, 'PGK Papua New Guinea Kina', 'K', 'PGK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(87, 'PHP Philippines Peso', '₱', 'PHP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(88, 'PKR Pakistan Rupee', '₨', 'PKR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(89, 'PLN Poland Zloty', 'zł', 'PLN', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(90, 'QAR Qatar Riyal', '﷼', 'QAR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(91, 'RON Romania New Leu', 'lei', 'RON', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(92, 'RSD Serbia Dinar', 'Дин.', 'RSD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(93, 'RUB Russia Ruble', '₽', 'RUB', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(94, 'SAR Saudi Arabia Riyal', '﷼', 'SAR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(95, 'SBD Solomon Islands Dollar', '$', 'SBD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(96, 'SCR Seychelles Rupee', '₨', 'SCR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(97, 'SEK Sweden Krona', 'kr', 'SEK', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(98, 'SGD Singapore Dollar', '$', 'SGD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(99, 'SHP Saint Helena Pound', '£', 'SHP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(100, 'SLL Sierra Leone Leone', 'Le', 'SLL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(101, 'SOS Somalia Shilling', 'S', 'SOS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(102, 'SRD Suriname Dollar', '$', 'SRD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(103, 'STD São Tomé and Príncipe Dobra', 'Db', 'STD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(104, 'SZL Eswatini lilangeni', 'L', 'SZL', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(105, 'THB Thailand Baht', '฿', 'THB', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(106, 'TJS Tajikistan Somoni', 'ЅM', 'TJS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(107, 'TOP Tonga Pa’anga', 'T$', 'TOP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(108, 'TRY Turkey Lira', '₺', 'TRY', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(109, 'TTD Trinidad and Tobago Dollar', 'TT$', 'TTD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(110, 'TWD Taiwan New Dollar', 'NT$', 'TWD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(111, 'TZS Tanzania Shiling', 'TSh', 'TZS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(112, 'UAH Ukraine Hryvna', '₴', 'UAH', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(113, 'UYU Uruguay Peso', '$U', 'UYU', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(114, 'UZS Uzbekistan Som', 'лв', 'UZS', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(115, 'WST Samoa  Tālā', 'WS$', 'WST', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(116, 'XCD Eastern Caribbean States Dollar', '$', 'XCD', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(117, 'YER Yemen Rial', '﷼', 'YER', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(118, 'ZAR South Africa Rand', 'R', 'ZAR', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(119, 'ZMW Zambia Kwacha', 'ZK', 'ZMW', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(120, 'BIF Burundi Franc', 'FBu', 'BIF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(121, 'CLP Chile Peso', '$', 'CLP', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(122, 'DJF Djibouti Franc', 'Fdj', 'DJF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(123, 'GNF Guinea Franc', 'GFr', 'GNF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(124, 'JPY Japan Yen', '¥', 'JPY', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(125, 'KMF Comoros Franc', 'CF', 'KMF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(126, 'KRW Korea Won', '₩', 'KRW', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(127, 'MGA Madagascar Ariary ', 'Ar', 'MGA', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(128, 'PYG Paraguay Guarani', 'Gs', 'PYG', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(129, 'RWF Rwanda Franc', 'R₣', 'RWF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(130, 'UGX Uganda Shilling', 'USh', 'UGX', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(131, 'VND Viet Nam Dong', '₫', 'VND', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(132, 'VUV Vanuatu Vatu', 'VT', 'VUV', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(133, 'XAF Central Africa Central African CFA Franc', 'FCFA', 'XAF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(134, 'XOF West Africa West African CFA Franc', 'CFA', 'XOF', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(135, 'XPF France Franc', '₣', 'XPF', '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `emoji`
--

CREATE TABLE `emoji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emoji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emoji`
--

INSERT INTO `emoji` (`id`, `emoji`, `name`, `status`, `created_at`, `updated_at`) VALUES
(8, '&#128077;', 'like', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(9, '&#128078;', 'dislike', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(10, '&#128525;', 'love', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(11, '&#128545;', 'angry', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(12, '&#128557;', 'sad', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(13, '&#128514;', 'funny', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(14, '&#128561;', 'wow', 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(15, '&#128591;', 'pray', 0, '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(16, '&#128076;', 'super', 0, '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_post`
--

CREATE TABLE `gallery_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` text COLLATE utf8mb4_unicode_ci,
  `gallery_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_post`
--

INSERT INTO `gallery_post` (`id`, `post_id`, `gallery_title`, `image_description`, `gallery_content`, `created_at`, `updated_at`) VALUES
(1, 16, 'Contrary to popular belief, Lorem Ipsum is not simply random text', 'Avoids a pain that produces no resultant pleasure', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 16, 'Implementing these goals requires a careful examination', 'The standard chunk of Lorem Ipsum used since the', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 17, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 'Donec rhoncus feugiat magna ut hendrerit', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 17, 'Vivamus sit amet turpis at nisl elementum pellentesque', 'Nam sapien neque, interdum at mi quis', 'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 18, 'Effect twenty indeed beyond for not had county', 'These cases are perfectly simple and easy to distinguish', 'On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(6, 18, 'Photography Greatly hearted has who believe', 'variations of passages of Lorem Ipsum', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(7, 19, 'Quisque efficitur augue eget enim malesuada auctor', 'Maecenas quis maximus ipsum', 'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(8, 19, 'Nulla consequat est tellus, non sodales ante congue facilisis', 'Praesent nec purus ac nulla mollis dapibus ac at dolor', 'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `front_language_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `iso_code`, `is_default`, `created_at`, `updated_at`, `front_language_status`) VALUES
(1, 'English', 'en', 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34', 1),
(2, 'Arabic', 'ar', 0, '2023-02-17 22:21:34', '2023-02-17 22:21:34', 1),
(3, 'Chinese', 'zh', 0, '2023-02-17 22:21:34', '2023-02-17 22:21:34', 1),
(4, 'Spanish', 'es', 0, '2023-02-17 22:21:34', '2023-02-17 22:21:34', 1),
(5, 'German', 'de', 0, '2023-02-17 22:21:34', '2023-02-17 22:21:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_protocol` int(11) NOT NULL,
  `mail_library` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encryption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_port` int(11) NOT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification` int(11) NOT NULL,
  `contact_messages` int(11) DEFAULT NULL,
  `contact_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`id`, `mail_protocol`, `mail_library`, `encryption`, `mail_port`, `mail_host`, `mail_username`, `mail_password`, `mail_title`, `reply_to`, `email_verification`, `contact_messages`, `contact_mail`, `send_mail`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '1', 587, 'mail@codingest.com', 'info@codingest.com', 'mail@123', 'Varient', 'info2@codingest.com', 1, 1, 'info3@codingest.com', 'info4@codingest.com', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(160) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(170) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(170) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_properties` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `generated_conversions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsive_images` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `show_in_menu` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `link`, `parent_menu_id`, `order`, `show_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'Election', 'www.politicsinfo.com', NULL, 2, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'Upcoming Sports', 'www.SportsDaily.com', 1, 1, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'New Launches', 'www.MyGamez.com', 1, 3, 0, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_26_044558_create_media_table', 1),
(5, '2021_07_28_114939_create_settings_table', 1),
(6, '2021_08_05_085326_create_permission_tables', 1),
(7, '2022_03_09_073651_creat_languages_table', 1),
(8, '2022_03_09_090704_create_categories_table', 1),
(9, '2022_03_09_120141_create_albums_table', 1),
(10, '2022_03_09_120142_create_album_categories_table', 1),
(11, '2022_03_10_054126_create_sub_categories_table', 1),
(12, '2022_03_10_055607_create_menus_table', 1),
(13, '2022_03_10_105057_create_polls_table', 1),
(14, '2022_03_11_054720_create_pages_table', 1),
(15, '2022_03_11_105713_create_navigation_table', 1),
(16, '2022_03_11_121526_create_mail_settings_table', 1),
(17, '2022_03_12_062921_create_seo_tools_table', 1),
(18, '2022_03_14_060718_create_galleries_table', 1),
(19, '2022_03_15_060007_create_posts_table', 1),
(20, '2022_03_17_122201_create_gallery_post', 1),
(21, '2022_03_19_050520_create_article_post', 1),
(22, '2022_03_21_065053_create_sort_list_post', 1),
(23, '2022_03_24_043738_add_parent_menu_id_to_menus_table', 1),
(24, '2022_03_24_111534_change_column_to_article_post_table', 1),
(25, '2022_03_24_123132_create_subscribers', 1),
(26, '2022_03_30_043655_create_analytics_table', 1),
(27, '2022_03_30_085103_create_poll_result_table', 1),
(28, '2022_04_01_062431_create_comments_table', 1),
(29, '2022_04_09_062145_create_contacts_table', 1),
(30, '2022_05_18_103900_change_media_table', 1),
(31, '2022_06_06_075009_add_slug_sub_categories_table', 1),
(32, '2022_07_08_074541_add_dark_mode_field_to_users_table', 1),
(33, '2022_08_24_085555_update_field_type_in_article_post_table', 1),
(34, '2022_12_05_053847_create_video_post', 1),
(35, '2022_12_05_092203_create_rss_feeds_table', 1),
(36, '2022_12_06_064321_create_audio_post', 1),
(37, '2022_12_06_072438_add_rss_feed_to_posts_table', 1),
(38, '2022_12_08_085841_create_ad_spaces_table', 1),
(39, '2022_12_10_052005_add_rss_feed_seeder_to_setting_table', 1),
(40, '2022_12_12_120235_add_ad_spaces_seeder_to_setting_table', 1),
(41, '2022_12_13_043816_add_default_ad_seeder_to_ad_spaces_table', 1),
(42, '2022_12_14_042144_add_default_ad_permission_to_ad_spaces_table', 1),
(43, '2022_12_30_043615_create_currencies_table', 1),
(44, '2022_12_30_044834_create_plans_table', 1),
(45, '2022_12_31_094536_add_customer_role_permission_table', 1),
(46, '2023_01_02_055032_create_transactions_table', 1),
(47, '2023_01_02_055033_create_subscriptions_table', 1),
(48, '2023_01_03_095117_create_post_reactions_table', 1),
(49, '2023_01_04_070136_create_social_accounts_table', 1),
(50, '2023_01_05_051819_add_payment_guide_setting_seeder_table', 1),
(51, '2023_01_16_062238_create_payment_gateways_table', 1),
(52, '2023_01_17_105551_add_payment_rejected_notes_to_subscriptions_table', 1),
(53, '2023_01_18_065211_add_code_in_ad_spaces_table', 1),
(54, '2023_01_24_073135_create_emoji_table', 1),
(55, '2023_01_26_041021_add_default_emojis_on_emoji_table', 1),
(56, '2023_02_08_123737_add_front_language_status_to_languages_table', 1),
(57, '2023_02_16_041456_add_default_emaji_seeder_to_emoji_table', 1),
(58, '2023_02_17_060213_add_emoji_permission_to_emoji_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `navigationable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `navigationable_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `navigationable_type`, `navigationable_id`, `order_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Category', 1, 1, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'App\\Models\\Category', 2, 2, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'App\\Models\\Category', 3, 3, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 'App\\Models\\Category', 4, 4, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 'App\\Models\\Category', 5, 5, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(6, 'App\\Models\\SubCategory', 1, 1, 5, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(7, 'App\\Models\\SubCategory', 2, 1, 3, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(8, 'App\\Models\\SubCategory', 3, 1, 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(9, 'App\\Models\\SubCategory', 4, 1, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(10, 'App\\Models\\SubCategory', 5, 1, 4, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(11, 'App\\Models\\Menu', 1, 6, NULL, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(12, 'App\\Models\\Menu', 2, 2, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(13, 'App\\Models\\Menu', 3, 3, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` int(11) NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `show_title` tinyint(1) NOT NULL,
  `show_right_column` tinyint(1) NOT NULL,
  `show_breadcrumb` tinyint(1) NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `parent_menu_link` bigint(20) UNSIGNED DEFAULT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `slug`, `meta_title`, `meta_description`, `location`, `visibility`, `show_title`, `show_right_column`, `show_breadcrumb`, `permission`, `content`, `parent_menu_link`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'Olympics', 'Upcoming olympics', 'upcoming-olympics', 'Everything about next olympics', 'Read about where and when will the next winter olympics be held ??', 2, 1, 0, 1, 0, 1, '<p>The 2022 Beijing Winter Olympics will be spread over three distinct zones and merge new venues with existing ones from the 2008 Games, including the Bird\'s Nest stadium.</p>\n\n<p>With 100 days to go, AFP Sport takes an in-depth look at where the Olympics will take place:</p>\n\n<p>Beijing - The 80,000-seater Bird\'s Nest National Stadium -- whose cross-hatched steel girders produce a nest-like appearance -- will stage the opening and closing ceremony.</p>\n\n<p>sting Olympic Park is a 12,000-capacity speed skating oval nicknamed the Ice Ribbon.</p>\n\n<p>New venues have been built in other parts of the city, such as the striking location for some of the skiing and snowboarding events.</p>\n\n<p>The 60-metre-high Big Air jumping platform stands in the shadow of four vast cooling towers at a former steel mill that once employed tens of thousands of workers and is now a trendy bar, restaurant and office complex. </p>\n    </p>', 2, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'future of gaming', 'technology used in gaming', 'technology-used-in-gaming', 'Usage of new technology in gaming', 'Which new technology used in gaming Read now !!', 4, 1, 1, 0, 1, 1, '22032022.jpg', 3, 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_gateway_id` int(11) NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage_ad', 'Manage Ad', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(2, 'manage_plans', 'Manage Plans', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(3, 'cash_payment', 'Cash Payment', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(4, 'manage_emoji', 'Manage Emoji', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(5, 'manage_menu', 'Manage Menu', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(6, 'manage_categories', 'Manage Categories', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(7, 'manage_sub_categories', 'Manage Sub Categories', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(8, 'manage_albums', 'Manage Albums', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(9, 'manage_albums_category', 'Manage Albums Category', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(10, 'manage_gallery', 'Manage Gallery', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(11, 'manage_pages', 'Manage Pages', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(12, 'manage_settings', 'Manage Settings', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(13, 'manage_staff', 'Manage Staff', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(14, 'manage_roles_permission', 'Manage Roles Permission', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(15, 'manage_add_post', 'Manage Add Post ', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(16, 'manage_all_post', 'Manage All Post', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(17, 'manage_rss_feeds', 'Manage Rss Feeds', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(18, 'manage_mail_setting', 'Manage Mail Setting', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(19, 'manage_polls', 'Manage polls', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(20, 'manage_all_user_can_vote', 'Manage All User Can Vote', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(21, 'manage_only_register_user_vote', 'Manage Only Register User Vote', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(22, 'manage_gallery_image', 'Manage Gallery Image', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(23, 'manage_language', 'Manage Language', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(24, 'manage_navigation', 'Manage Navigation', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(25, 'manage_seo_tools', 'Manage SEO Tools', 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(26, 'manage_news_letter', 'Manage News Letter', 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(27, 'manage_comment', 'Manage Comment', 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(28, 'manage_contacts', 'Manage Contacts', 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_count` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `frequency` int(11) NOT NULL,
  `trial_days` int(11) DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `post_count`, `price`, `currency_id`, `frequency`, `trial_days`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 'Standard', 7, 10.00, 1, 1, 7, 1, '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(181) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option1` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option2` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option3` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option4` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option5` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option6` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option7` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option8` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option9` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `option10` varchar(181) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `vote_permission` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poll_result`
--

CREATE TABLE `poll_result` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL,
  `featured` tinyint(1) NOT NULL,
  `breaking` tinyint(1) NOT NULL,
  `slider` tinyint(1) NOT NULL,
  `recommended` tinyint(1) NOT NULL,
  `show_on_headline` tinyint(1) NOT NULL,
  `show_registered_user` tinyint(1) NOT NULL,
  `optional_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_types` int(11) NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `scheduled_post` int(11) NOT NULL DEFAULT '0',
  `scheduled_post_time` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `rss_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_rss` tinyint(1) NOT NULL DEFAULT '0',
  `rss_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `keywords`, `visibility`, `featured`, `breaking`, `slider`, `recommended`, `show_on_headline`, `show_registered_user`, `optional_url`, `tags`, `post_types`, `lang_id`, `category_id`, `sub_category_id`, `scheduled_post`, `scheduled_post_time`, `status`, `rss_link`, `is_rss`, `rss_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'The Coelacanth May Live for a Century. That’s Not Great News', 'the-coelacanth-may-live-for-a-century-thats-not-great-news', 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 'The, Coelacanth, May, Live, for, Century., That’s, Not, Great, News', 1, 1, 0, 1, 1, 1, 0, '', 'News', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'Cordially convinced did incommode existence', 'cordially-convinced-did-incommode-existence', 'Easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best', 'incommode', 1, 1, 0, 1, 1, 0, 0, '', 'Rare animal,wild life', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'Situation admitting promotion at or to perceived be', 'situation-admitting-promotion-at-or-to-perceived-be', 'Denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded', 'promotion', 1, 1, 1, 1, 0, 0, 0, '', 'wild life', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 'Are own design entire former get should', 'are-own-design-entire-former-get-should', 'To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it', 'design', 1, 1, 1, 1, 1, 1, 0, '', 'Design,music', 1, 1, 2, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 'How well do you know the famous places in the world?', 'how-well-do-you-know-the-famous-places-in-the-world', 'Sed bibendum gravida ipsum ac mattis. Morbi id felis a tellus faucibus tempor. Pellentesque tellus justo', 'world', 1, 1, 1, 0, 1, 1, 0, '', 'Environment, Nature', 1, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(6, 'Decisively advantages nor expression untrammelled', 'decisively-advantages-nor-expression-untrammelled', 'These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled', 'advantages', 1, 1, 1, 0, 1, 0, 0, '', 'advantages,power', 1, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(7, 'Far concluded not his something extremity', 'far-concluded-not-his-something-extremity', 'Far concluded not his something extremity', 'something', 1, 1, 1, 0, 1, 0, 0, '', 'extremity', 1, 1, 2, 3, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(8, 'Greatly hearted has who believe', 'greatly-hearted-has-who-believe', 'Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated', 'hearted', 1, 1, 0, 0, 1, 0, 0, '', 'believe', 1, 1, 2, 3, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(9, 'Idea of denouncing pleasure and praising pain was born', 'idea-of-denouncing-pleasure-and-praising-pain-was-born', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete ', 'denouncing', 1, 0, 0, 1, 1, 1, 0, '', 'denouncing', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(10, 'There are many variations of passages available', 'there-are-many-variations-of-passages-available', 'More recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'available', 1, 1, 1, 1, 1, 0, 0, '', 'extremity', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(11, 'When an unknown printer took a galley of type and scrambled', 'when-an-unknown-printer-took-a-galley-of-type-and-scrambled', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for', 'unknown', 1, 1, 1, 0, 1, 0, 0, '', 'unknown', 1, 1, 2, 3, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(12, 'Various versions have evolved over the years, sometimes by acciden', 'various-versions-have-evolved-over-the-years-sometimes-by-acciden', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', 'sometimes', 1, 1, 1, 0, 1, 0, 0, '', 'evolved', 1, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(13, 'Contrary to popular belief, Lorem Ipsum is not simply random text', 'contrary-to-popular-belief-lorem-ipsum-is-not-simply-random-text', 'College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word', 'popular', 1, 0, 0, 0, 1, 0, 0, '', 'random', 1, 2, 3, 2, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(14, 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للغرق', 'لم-يزعم-المهندسون-المعماريون-البحريون-أبدا-أن-السفينة-غير-قابلة-للغرق', 'لم يزعم المهندسون المعماريون البحريون أبدًا أن السفينة غير قابلة للإغراق ، لكن غرق عبّارة الركاب والسيارات إستونيا في بحر البلطيق بالتأكيد لم يكن ليحدث أبدًا.', 'المهندسون', 1, 0, 0, 0, 1, 0, 0, '', 'المهندسون, البحريون', 1, 2, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(15, 'تقليديا ، شدد العديد من اللغويين على أهمية الإتقان', 'تقليديا-شدد-العديد-من-اللغويين-على-أهمية-الإتقان', 'يبدو من الواضح أن الكلمات المتكررة يجب أن تكون من بين الكلمات الأولى التي يجب تعلمها لأنها ستقابل معظم الكلمات العشر وستكون مطلوبة في الكلام أو الكتابة.', 'أهمية', 1, 0, 0, 0, 0, 0, 0, '', 'العديد, أهمية', 1, 2, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(16, 'Through weakness of will, which is the same as saying through', 'through-weakness-of-will-which-is-the-same-as-saying-through', 'There anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil', 'weakness', 1, 1, 1, 0, 1, 0, 0, '', 'weakness', 2, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(17, 'Implementing these goals requires a careful examination', 'implementing-these-goals-requires-a-careful-examination', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have', 'goals', 1, 0, 0, 1, 1, 0, 0, '', 'goals', 2, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(18, 'NASA and ESA Astronauts Continue Installing Space Station Solar Arrays', 'nasa-and-esa-astronauts-continue-installing-space-station-solar-arrays', 'Spacewalkers Shane Kimbrough of NASA (left) and Thomas Pesquet of the European Space Agency worked to install new roll out solar arrays on the space station.', 'Astronauts', 1, 1, 1, 1, 1, 0, 0, '', 'Strength', 2, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(19, 'Hubble Images a Dazzling Dynamic Duo', 'hubble-images-a-dazzling-dynamic-duo', 'A cataclysmic cosmic collision takes center stage in this image taken with the NASA/ESA Hubble Space Telescope.', 'Images', 1, 0, 0, 0, 0, 0, 0, '', 'Adventure', 2, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(20, 'It is a long established fact that a reader will be distracted by the readable', 'it-is-a-long-established-fact-that-a-reader-will-be-distracted-by-the-readable', 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infanc', 'explorer', 1, 1, 1, 1, 0, 0, 0, '', 'actual', 3, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(21, 'Implementing these goals requires a careful examination', 'implementing-these-goals-requires-a-careful-examination', 'But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have', 'examination, careful, goals', 1, 0, 0, 1, 0, 0, 0, '', 'sky', 3, 1, 1, 4, 0, NULL, 1, NULL, 0, NULL, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emoji_id` int(11) NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `guard_name` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `is_default`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'customer', 'Customer', 1, 'web', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(2, 'admin', 'Admin', 1, 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'staff', 'Staff', 1, 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 'moderator', 'Moderator', 1, 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 'author', 'Author', 1, 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(6, 'user', 'User', 1, 'web', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(6, 3),
(7, 3),
(8, 3),
(9, 3),
(16, 3),
(19, 3),
(22, 3),
(6, 4),
(9, 4),
(10, 4),
(11, 4),
(16, 4),
(17, 5),
(16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `rss_feeds`
--

CREATE TABLE `rss_feeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `feed_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feed_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_post` int(11) NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `auto_update` tinyint(1) NOT NULL DEFAULT '1',
  `show_btn` tinyint(1) NOT NULL DEFAULT '1',
  `post_draft` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_tools`
--

CREATE TABLE `seo_tools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_tools`
--

INSERT INTO `seo_tools` (`id`, `lang_id`, `site_title`, `home_title`, `site_description`, `keyword`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 1, 'InfyNews', 'Home', 'Get Latest News', 'world news website', '', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'rss_feed_update_time', '3', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(2, 'header', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(3, 'index_top', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(4, 'index_bottom', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(5, 'post_details', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(6, 'details_side', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(7, 'categories', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(8, 'trending_post', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(9, 'popular_news', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(10, 'trending_post_index_page', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(11, 'popular_news_index_page', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(12, 'recommended_post_index_page', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(13, 'manual_payment_guide', '', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(14, 'application_name', 'InfyNews', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(15, 'contact_no', '+91 70963 36561', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(16, 'email', 'test@email.com', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(17, 'copy_right_text', 'All Rights Reserved ©2022', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(18, 'site_key', ' ', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(19, 'secret_key', ' ', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(20, 'show_captcha', '0', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(21, 'facebook_url', 'https://www.facebook.com/infyom/', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(22, 'twitter_url', 'https://twitter.com/infyom?lang=en', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(23, 'instagram_url', 'https://www.instagram.com/?hl=en', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(24, 'pinterest_url', 'https://www.pinterest.com/', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(25, 'linkedin_url', 'https://www.linkedin.com/organization-guest/company/infyom-technologies?challengeId=AQFgQaMxwSxCdAAAAXOA_wosiB2vYdQEoITs6w676AzV8cu8OzhnWEBNUQ7LCG4vds5-A12UIQk1M4aWfKmn6iM58OFJbpoRiA&submissionId=0088318b-13b3-2416-9933-b463017e531e', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(26, 'vk_url', 'https://vk.com/?lang=en', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(27, 'telegram_url', 'https://www.telegram.org/k/', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(28, 'youtube_url', 'https://www.youtube.com/', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(29, 'show_cookie', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(30, 'cookie_warning', 'Your experience on this site will be improved by allowing cookies.', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(31, 'logo', '/assets/image/infyom-logo.png', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(32, 'favicon', '/assets/image/favicon-infyom.png', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(33, 'contact_address', 'C-303, Atlanta Shopping Mall,Nr.Sudama Chowk, Mota Varachha,Surat-394101, Gujarat, India.', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(34, 'about_text', 'Leading Web & Mobile Development Company with proven expertise, India\'s Leading Laravel Open-Source contributor with over 3 million+ Downloads.', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(35, 'terms&conditions', '', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(36, 'privacy', '', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(37, 'support', '', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(38, 'comment_approved', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33'),
(39, 'front_language', '1', '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sort_list_post`
--

CREATE TABLE `sort_list_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `sort_list_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_description` text COLLATE utf8mb4_unicode_ci,
  `sort_list_content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sort_list_post`
--

INSERT INTO `sort_list_post` (`id`, `post_id`, `sort_list_title`, `image_description`, `sort_list_content`, `created_at`, `updated_at`) VALUES
(1, 20, 'Quisque efficitur augue eget enim malesuada auctor', 'Maecenas quis maximus ipsum', 'Cras hendrerit enim ut turpis commodo, eget porta massa ullamcorper. Maecenas quis maximus ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed hendrerit magna ligula, nec malesuada lectus finibus vel. Praesent varius rutrum nunc, sit amet tincidunt dolor ultrices nec.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 20, 'Nulla consequat est tellus, non sodales ante congue facilisis', 'Praesent nec purus ac nulla mollis dapibus ac at dolor', 'Phasellus cursus nec massa vel mollis. Sed ut nisl vitae elit blandit tempus at ut tortor. Nullam tempor, ligula non molestie elementum, mi metus imperdiet eros, eu dictum ante lectus sed ligula. Aliquam felis risus, vestibulum sagittis dolor dapibus, laoreet luctus arcu. Donec a eros malesuada, varius augue sit amet, iaculis felis. Praesent nec purus ac nulla mollis dapibus ac at dolor. Ut in vestibulum nibh.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 21, 'Class aptent taciti sociosqu ad litora torquent per conubia nostra', 'Donec rhoncus feugiat magna ut hendrerit', 'Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Donec rhoncus feugiat magna ut hendrerit. Mauris non consectetur nunc. Nam scelerisque ex a posuere porttitor. Morbi tincidunt eget odio nec pretium. Morbi aliquam, elit nec interdum commodo, metus neque tincidunt tellus, a hendrerit risus magna sit amet turpis.', '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 21, 'Vivamus sit amet turpis at nisl elementum pellentesque', 'Nam sapien neque, interdum at mi quis', 'Integer non cursus ligula, et varius diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum auctor, tellus sit amet dapibus ultricies, lorem tortor efficitur enim, et gravida eros felis et lectus. Cras a condimentum felis. Sed congue mauris vel lectus scelerisque, id rutrum velit dictum. Nam sapien neque, interdum at mi quis, viverra pellentesque metus. Etiam in ante nunc.', '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_amount` double(8,2) NOT NULL DEFAULT '0.00',
  `payable_amount` double(8,2) NOT NULL,
  `plan_frequency` int(11) NOT NULL,
  `starts_at` date NOT NULL,
  `ends_at` date NOT NULL,
  `trial_ends_at` date DEFAULT NULL,
  `no_of_post` int(11) NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_type` text COLLATE utf8mb4_unicode_ci,
  `reject_notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `parent_category_id` bigint(20) UNSIGNED NOT NULL,
  `lang_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `slug`, `show_in_menu`, `parent_category_id`, `lang_id`, `created_at`, `updated_at`) VALUES
(1, 'World Wide Sports', 'world-wide-sports', '1', 5, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(2, 'Arabic music', 'arabic-music', '0', 3, 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(3, 'Mobile Gaming', 'mobile-gaming', '1', 2, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(4, 'Wild life', 'wild-life', '1', 1, 2, '2023-02-17 22:21:34', '2023-02-17 22:21:34'),
(5, 'Great Technology', 'great-technology', '1', 4, 1, '2023-02-17 22:21:34', '2023-02-17 22:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `type` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) DEFAULT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(160) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'en',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `contact`, `dob`, `gender`, `status`, `language`, `dark_mode`, `email_verified_at`, `password`, `type`, `blood_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super', 'Admin', 'admin@infynews.com', '1234567890', NULL, 1, 1, 'en', 0, '2023-02-17 22:21:33', '$2y$10$p..rIb30mchB322W8fcFl.YtjjIJtJkQ.Z47fKpWnw3.YT.RJSp.S', 1, NULL, NULL, '2023-02-17 22:21:33', '2023-02-17 22:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `video_post`
--

CREATE TABLE `video_post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `video_content` longtext COLLATE utf8mb4_unicode_ci,
  `thumbnail_image_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_embed_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_spaces`
--
ALTER TABLE `ad_spaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `album_categories`
--
ALTER TABLE `album_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_categories_album_id_foreign` (`album_id`),
  ADD KEY `album_categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `analytics`
--
ALTER TABLE `analytics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_post`
--
ALTER TABLE `article_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `audio_post`
--
ALTER TABLE `audio_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audio_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emoji`
--
ALTER TABLE `emoji`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emoji_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `galleries_title_unique` (`title`),
  ADD KEY `galleries_lang_id_foreign` (`lang_id`),
  ADD KEY `galleries_album_id_foreign` (`album_id`),
  ADD KEY `galleries_category_id_foreign` (`category_id`);

--
-- Indexes for table `gallery_post`
--
ALTER TABLE `gallery_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `languages_iso_code_unique` (`iso_code`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_menu_id_foreign` (`parent_menu_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_parent_menu_link_foreign` (`parent_menu_link`),
  ADD KEY `pages_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`),
  ADD KEY `plans_currency_id_foreign` (`currency_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `polls_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `poll_result`
--
ALTER TABLE `poll_result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll_result_user_id_foreign` (`user_id`),
  ADD KEY `poll_result_poll_id_foreign` (`poll_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_created_by_foreign` (`created_by`),
  ADD KEY `posts_lang_id_foreign` (`lang_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `posts_rss_id_foreign` (`rss_id`);

--
-- Indexes for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_reactions_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rss_feeds_feed_url_unique` (`feed_url`),
  ADD KEY `rss_feeds_language_id_foreign` (`language_id`),
  ADD KEY `rss_feeds_user_id_foreign` (`user_id`),
  ADD KEY `rss_feeds_category_id_foreign` (`category_id`),
  ADD KEY `rss_feeds_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `seo_tools`
--
ALTER TABLE `seo_tools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_tools_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_accounts_provider_id_unique` (`provider_id`),
  ADD KEY `social_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sort_list_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_parent_category_id_foreign` (`parent_category_id`),
  ADD KEY `sub_categories_lang_id_foreign` (`lang_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `video_post`
--
ALTER TABLE `video_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_post_post_id_foreign` (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_spaces`
--
ALTER TABLE `ad_spaces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `album_categories`
--
ALTER TABLE `album_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `analytics`
--
ALTER TABLE `analytics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_post`
--
ALTER TABLE `article_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `audio_post`
--
ALTER TABLE `audio_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `emoji`
--
ALTER TABLE `emoji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_post`
--
ALTER TABLE `gallery_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poll_result`
--
ALTER TABLE `poll_result`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seo_tools`
--
ALTER TABLE `seo_tools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `video_post`
--
ALTER TABLE `video_post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `album_categories`
--
ALTER TABLE `album_categories`
  ADD CONSTRAINT `album_categories_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_post`
--
ALTER TABLE `article_post`
  ADD CONSTRAINT `article_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `audio_post`
--
ALTER TABLE `audio_post`
  ADD CONSTRAINT `audio_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `album_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `galleries_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gallery_post`
--
ALTER TABLE `gallery_post`
  ADD CONSTRAINT `gallery_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_menu_id_foreign` FOREIGN KEY (`parent_menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pages_parent_menu_link_foreign` FOREIGN KEY (`parent_menu_link`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poll_result`
--
ALTER TABLE `poll_result`
  ADD CONSTRAINT `poll_result_poll_id_foreign` FOREIGN KEY (`poll_id`) REFERENCES `polls` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `poll_result_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_rss_id_foreign` FOREIGN KEY (`rss_id`) REFERENCES `rss_feeds` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD CONSTRAINT `post_reactions_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rss_feeds`
--
ALTER TABLE `rss_feeds`
  ADD CONSTRAINT `rss_feeds_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rss_feeds_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rss_feeds_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rss_feeds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seo_tools`
--
ALTER TABLE `seo_tools`
  ADD CONSTRAINT `seo_tools_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD CONSTRAINT `social_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sort_list_post`
--
ALTER TABLE `sort_list_post`
  ADD CONSTRAINT `sort_list_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_lang_id_foreign` FOREIGN KEY (`lang_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sub_categories_parent_category_id_foreign` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_post`
--
ALTER TABLE `video_post`
  ADD CONSTRAINT `video_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
