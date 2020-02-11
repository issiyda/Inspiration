-- -------------------------------------------------------------
-- TablePlus 3.1.0(290)
--
-- https://tableplus.com/
--
-- Database: inspiration
-- Generation Time: 2020-02-12 08:01:02.8740
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('108', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('109', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('110', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('111', '2020_01_04_102621_create_ideas_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('112', '2020_01_04_102835_create_buy_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('113', '2020_01_04_102905_create_categories_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('114', '2020_01_04_102932_create_favorites_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('115', '2020_01_04_103012_create_reviews_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('116', '2020_01_11_020958_create_buying_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('117', '2019_05_03_000001_create_customer_columns', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('118', '2019_05_03_000002_create_subscriptions_table', '2');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('119', '2020_02_01_144855_create_settlement_table', '3');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('121', '2020_02_01_164524_create_buying_histories_table', '4');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('123', '2020_02_02_113347_reviews_table_change_column_content_to_comment', '5');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('124', '2020_02_10_074622_change_column_users_table', '6');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;