-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: inspiration
-- Generation Time: 2020-02-12 08:01:53.3890
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `favorites` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `fav_flag` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('1', '1', '2', '0', '2020-01-14 00:11:23', '2020-01-19 02:25:00');
INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('2', '1', '1', '0', '2020-01-25 07:33:32', '2020-01-25 07:36:36');
INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('3', '1', '5', '0', '2020-01-25 07:38:52', '2020-01-25 14:12:14');
INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('4', '1', '16', '0', '2020-01-25 18:32:31', '2020-01-25 18:36:05');
INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('5', '5', '23', '1', '2020-01-31 07:49:14', '2020-01-31 07:49:39');
INSERT INTO `favorites` (`id`, `user_id`, `idea_id`, `fav_flag`, `created_at`, `updated_at`) VALUES ('6', '5', '22', '1', '2020-02-01 18:47:20', '2020-02-01 18:47:41');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;