-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: inspiration
-- Generation Time: 2020-02-12 08:02:12.9280
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `buying_histories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `buying_histories` (`id`, `user_id`, `post_id`, `price`, `created_at`, `updated_at`) VALUES ('1', '1', '23', '10000', '2020-02-01 17:30:49', '2020-02-01 17:30:49');
INSERT INTO `buying_histories` (`id`, `user_id`, `post_id`, `price`, `created_at`, `updated_at`) VALUES ('2', '5', '23', '10000', '2020-02-02 22:44:53', '2020-02-02 22:44:53');
INSERT INTO `buying_histories` (`id`, `user_id`, `post_id`, `price`, `created_at`, `updated_at`) VALUES ('3', '5', '25', '1000', '2020-02-07 07:34:05', '2020-02-07 07:34:05');
INSERT INTO `buying_histories` (`id`, `user_id`, `post_id`, `price`, `created_at`, `updated_at`) VALUES ('4', '5', '25', '1000', '2020-02-07 07:38:19', '2020-02-07 07:38:19');
INSERT INTO `buying_histories` (`id`, `user_id`, `post_id`, `price`, `created_at`, `updated_at`) VALUES ('5', '1', '26', '10000', '2020-02-08 09:39:15', '2020-02-08 09:39:15');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;