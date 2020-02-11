-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: inspiration
-- Generation Time: 2020-02-12 08:01:34.9660
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `ideas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `overflow` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `bought_flag` tinyint(1) NOT NULL DEFAULT '0',
  `delete_flag` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('1', '1', '2', NULL, 'joy', 'aaaa', 'aaa', '10000', '0', '0', NULL, NULL);
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('4', '1', '2', 'https://lorempixel.com/640/480/?24610', 'Mr.', 'Nulla nemo rem nulla porro quo rem numquam. Officia laborum omnis reiciendis. Ex ipsa quae aspernatur et harum itaque veritatis. Blanditiis possimus debitis ipsa et labore.', 'Qui ducimus vel voluptas. Aliquam in tenetur consequatur repellat molestias sed blanditiis. Consequuntur ea enim velit ea nihil maiores exercitationem.', '1826195753', '1', '0', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('5', '1', '2', 'https://lorempixel.com/640/480/?72349', 'Dr.', 'Error eum aut voluptatem magni aut. Ipsa ullam officia ducimus. Doloremque corrupti aliquid tempore facilis tempore. Esse quidem error id maiores ut ea.', 'Distinctio maiores consequatur labore repudiandae rerum. Iste non veniam ipsam sapiente. Esse officiis ex laborum. Ut quis tempore illo tenetur.', '2033551958', '1', '1', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('6', '1', '2', 'https://lorempixel.com/640/480/?40661', 'Miss', 'Totam natus beatae autem sed fugit itaque. Et ea ea et odio in sit labore fuga.', 'Nemo asperiores voluptatem et aut totam. Veritatis voluptatem ducimus distinctio doloremque sunt ex. Autem dolores possimus labore ab perferendis.', '1633997678', '0', '0', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('7', '1', '2', 'https://lorempixel.com/640/480/?91945', 'Miss', 'Et sed sint tempora nostrum est ea. Et quaerat rerum voluptatem et ratione est praesentium. Ea et laudantium doloribus et praesentium.', 'Dolorum nulla quidem possimus placeat hic saepe. Voluptatem nam voluptatem sunt. Quia fugiat quis consequatur.', '825665563', '1', '0', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('8', '1', '2', 'https://lorempixel.com/640/480/?36771', 'Dr.', 'Dolores dignissimos adipisci numquam tenetur amet ut. Provident commodi suscipit aut et in tempore dicta. Repudiandae ex optio libero vel aut quod placeat.', 'Cumque ipsum maiores est ut eos. Iste iste natus eum autem ipsa doloribus qui. Et ut aspernatur iure. Optio consequatur doloremque nulla sint sed dolor.', '2070924659', '0', '0', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('9', '1', '2', 'https://lorempixel.com/640/480/?91277', 'Dr.', 'Quasi non consequuntur nobis et dolor. Voluptatem enim a consequatur eum voluptatibus ex commodi et. Ut quisquam mollitia harum qui. Corrupti quod ipsum est mollitia dolore facilis et.', 'Impedit voluptatum minima modi quam qui iure. A deserunt sequi facilis vel sequi consequatur. Possimus quaerat est magni molestias id. In est cumque porro accusamus alias.', '1639008141', '0', '1', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('10', '1', '2', 'https://lorempixel.com/640/480/?36700', 'Prof.', 'Eligendi velit voluptas quia quo. Et a excepturi velit dolorem debitis blanditiis quo. Consequuntur similique maiores id cumque.', 'Libero porro iusto eum non architecto velit non. A eos eligendi est nesciunt ex dolorem. Harum nobis ipsam debitis eos est. Ut necessitatibus maxime reiciendis minus veritatis corrupti iure.', '1155428834', '1', '1', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('11', '1', '2', 'https://lorempixel.com/640/480/?12889', 'Miss', 'Aliquam est et rerum laborum. Deserunt harum velit quo impedit quam.', 'Dolores mollitia sunt perspiciatis culpa aut nam. Excepturi est magnam dolor deserunt sit consequatur. Quidem et qui magni. Ad rem quod rerum natus.', '1651333728', '1', '0', '2020-01-13 08:28:10', '2020-01-13 08:28:10');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('12', '1', '5', NULL, 'issiy', 'baonbhao', 'hboash', '1000', '0', '0', '2020-01-22 13:23:11', '2020-01-22 13:23:11');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('13', '1', '3', NULL, 'test', 'angbahbahipn', 'bapinbhaipn', '100000', '0', '0', '2020-01-25 11:25:17', '2020-01-25 11:25:17');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('14', '1', '2', NULL, 'gapj', 'baossbip', 'bnsi', '10000', '0', '0', '2020-01-25 14:51:49', '2020-01-25 14:51:49');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('15', '1', '2', NULL, 'gapj', 'baossbip', 'bnsi', '10000', '0', '0', '2020-01-25 14:51:50', '2020-01-25 14:51:50');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('16', '1', '3', NULL, 'issiy', 'bjajnpa', 'jnapnjagp', '1000', '0', '0', '2020-01-25 15:22:22', '2020-01-25 15:22:22');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('17', '1', '1', NULL, 'aaa', 'gjhpabnhtaps', 'jbaspjtasp;', '1000', '0', '0', '2020-01-25 16:08:24', '2020-01-25 16:08:24');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('18', '1', '1', NULL, 'issiy', 'ganb', 'bjaip', '1000', '0', '0', '2020-01-25 16:18:26', '2020-01-25 16:18:26');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('19', '1', '3', '/ideaImages/スクリーンショット 2019-12-29 14.47.31.png', 'isssiy', 'hboshbso', 'bhaobha', '1000', '0', '0', '2020-01-27 22:27:17', '2020-01-27 22:27:17');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('20', '1', '3', '/ideaImages/スクリーンショット 2019-12-29 14.47.31.png', '100', 'bahbaouh', 'hsobh', '100', '0', '0', '2020-01-27 22:37:54', '2020-01-27 22:37:54');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('21', '1', '1', '/ideaImages/スクリーンショット 2020-01-18 9.26.59.png', 'issiy', 'nbsohb', 'bosbj', '100', '0', '0', '2020-01-27 22:38:23', '2020-01-27 22:38:23');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('22', '1', '3', '/ideaImages/スクリーンショット 2019-12-29 14.47.31.png', 'isiy', 'fhfishvojkl', 'jklfds', '1000', '0', '0', '2020-01-27 22:39:09', '2020-01-27 22:39:09');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('23', '1', '1', '/ideaImages/スクリーンショット 2020-01-19 21.54.46.png', 'test', 'boanhbsaaa', 'bsonbhaipaaaaa', '10000', '1', '0', '2020-01-27 22:41:27', '2020-02-02 22:44:53');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('25', '1', '1', '/ideaImages/jazz.jpg', 'jazz', 'test', 'test', '1000', '1', '0', '2020-02-04 08:03:14', '2020-02-07 07:38:19');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('26', '5', '2', '/ideaImages/jazz.jpg', 'jazz', 'aaaaaaaaaa', 'aaaaaaaaaaaaaaaa', '10000', '1', '0', '2020-02-04 08:14:53', '2020-02-08 09:39:15');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('27', '5', '2', '/ideaImages/maxresdefault.jpg', 'aaaa', 'gsts', 'bafsbrs', '1000', '0', '0', '2020-02-04 08:41:42', '2020-02-04 08:41:42');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('28', '1', '1', '/ideaImages/アイコン.jpg', 'issiy', 'bj0riap;jhbt-aspnjhts-p:ntjeaips', 'bhiap;onjtajf@o;netajo', '10000', '0', '0', '2020-02-08 13:30:24', '2020-02-08 13:30:24');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('29', '1', '2', '/ideaImages/スクリーンショット 2020-01-31 7.30.15.png', 'aaa', 'tstsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'nsnts', '1000', '0', '0', '2020-02-10 08:27:16', '2020-02-10 08:27:16');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('30', '1', '3', '/ideaImages/スクリーンショット 2020-02-08 15.44.35.png', 'あ', 'ああああああああああああああああああああああああああ', 'ざジズゼオaaaaaaaa', '10000', '0', '0', '2020-02-10 08:30:44', '2020-02-11 15:33:28');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('31', '1', '5', '/ideaImages/スクリーンショット 2020-02-03 8.33.27.png', 'ああああああああああ', 'bpfbpi', 'f', '100', '0', '0', '2020-02-10 08:33:28', '2020-02-10 08:33:28');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('32', '1', '2', '/ideaImages/スクリーンショット 2020-02-03 8.33.27.png', 'aaaaa', 'bjraemghjaesph;jrsp', 'gaoihsip', '10000', '0', '0', '2020-02-11 13:52:38', '2020-02-11 13:52:38');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('33', '1', '3', '/ideaImages/スクリーンショット 2020-02-03 8.33.27.png', 'test', 'bniosjbsip', 'bnpiasbjrsinpnjtsig@', '10000', '0', '0', '2020-02-11 13:56:03', '2020-02-11 13:56:03');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('34', '1', '2', '/ideaImages/スクリーンショット 2020-02-03 8.33.27.png', 'aaaaaa', 'bjpsjbzsp', 'bnjipsnjtirsp', '1000', '0', '0', '2020-02-11 13:59:16', '2020-02-11 13:59:16');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('35', '1', '3', '/ideaImages/スクリーンショット 2020-02-09 21.23.20.png', 'aaaaa', 'nbpasjbinsbpo', 'bipashntsbiphtjes', '1000', '0', '0', '2020-02-11 15:37:17', '2020-02-11 15:37:17');
INSERT INTO `ideas` (`id`, `user_id`, `category_id`, `img`, `title`, `overflow`, `content`, `price`, `bought_flag`, `delete_flag`, `created_at`, `updated_at`) VALUES ('36', '1', '3', '/ideaImages/スクリーンショット 2020-02-03 8.33.27.png', 'aaaaa', 'ssss', 'ssss', '10', '0', '0', '2020-02-11 16:25:52', '2020-02-11 16:25:52');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;