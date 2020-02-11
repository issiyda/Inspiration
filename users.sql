-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: inspiration
-- Generation Time: 2020-02-12 07:59:34.5220
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('1', 'いしaaaaaaaa', 'issiy@gmail.c', NULL, '$2y$10$9ZBvp.QFmdIae2ru96DgneMXUFxhMkj8UbL/0rATY5UHbqnqC0lva', 'ぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすにぬねのはばぱひびぴふぶぷへべぺほぼぽまみむめもゃやゅゆょよらりるれろゎわゐゑをんぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすずせぜそぞただちぢっつづてでとどなにぬねのはばぱひびぴふぶぷへべぺほぼぽまみむめもゃやゅゆょよらりるれろゎわゐゑをんぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすずせぜそぞただちぢっつづてでとどなにぬねのはばぱひびぴふぶぷへべぺほぼぽまみむめもゃやゅゆょよらりるれろゎわゐゑをんぁあぃいぅうぇえぉおかがきぎくぐけげこごさざしじすずせぜそぞただちぢっつづてaaaaaa', '/images/maxresdefault.jpg', NULL, NULL, '2020-01-13 08:28:09', '2020-02-11 21:47:35', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('2', NULL, 'test@gmail.com', NULL, '$2y$10$Pjt1hX45QVkO/HwOpa50lumHTP4CP9ZDVuyGojOTsEnEmKOuZTP2C', NULL, '/storage/スクリーンショット 2019-12-29 14.47.31.png', NULL, NULL, '2020-01-19 03:42:18', '2020-01-26 11:46:38', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('3', NULL, 'testtest@gmail.com', NULL, '$2y$10$oW9nNSCJPW0ZvP10H23mZ.GqMWVKwW55N3.f8lHbO9LD4T8KTRXty', NULL, '/storage/staff6.jpg', NULL, NULL, '2020-01-19 03:43:03', '2020-01-19 03:43:03', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('4', NULL, 'issiysansan@gmail.com', NULL, '$2y$10$emN2YvcB5LxUVEkr3A.sf.gr656.T8R/eY1RdJ/WRsFevbfOORHNC', NULL, NULL, NULL, NULL, '2020-01-31 07:27:12', '2020-01-31 07:27:12', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('5', 'テスト', 'ishida@life-innovation.com', NULL, '$2y$10$FkmkC3lyOrJxodc.x/KLvuzm8cM/VK5jfW1GtUsiBLHH4JGdo7yhG', 'これからがしがし成長していくつもりですので何卒よろしくお願いいたします。\n\nプログラミングだけではない\nそんなエンジニアであります。', '/images/アイコン.jpg', NULL, NULL, '2020-01-31 07:28:43', '2020-02-03 22:16:29', NULL, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `introduction`, `img`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`) VALUES ('6', 'いしだ', 'tes@gmail.com', NULL, '$2y$10$lHMr/mbYCvcDMRe1YBlJYeD2KNcHSdBDrG0GL6XXX7lJB9JbK4boa', 'aaaaaaaaaaaa', NULL, NULL, NULL, '2020-02-12 07:24:01', '2020-02-12 07:35:32', NULL, NULL, NULL, NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;