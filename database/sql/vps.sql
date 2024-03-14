-- Adminer 4.8.1 MySQL 8.0.35-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `vps` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `vps`;

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1);

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'Katelynn Effertz DDS',	'jreinger@example.org',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'PoMGtk1fug',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(2,	'Mr. Rusty Davis',	'lydia15@example.org',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'R4Vb1rGNQ4',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(3,	'Emelia Bode',	'giovanna06@example.org',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'YRkNmWJkKT',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(4,	'Harvey Monahan',	'ziemann.precious@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'cwXohTgP5q',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(5,	'Tamara Bode',	'gdach@example.org',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'neFpdgaVvc',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(6,	'Ms. Nichole Brakus IV',	'auer.lorenzo@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'v5GTRYKUgE',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(7,	'Simone Pagac',	'ewilliamson@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'igzEz08wlo',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(8,	'Dr. Eduardo Skiles I',	'welch.estell@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'HTpIoRfxw8',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(9,	'Prof. Guiseppe Treutel',	'weldon19@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'zPdZBGSSkN',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(10,	'Micheal Mosciski',	'ted.keebler@example.net',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'Ac84283Qcl',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(11,	'Test User',	'test@example.com',	'2024-01-18 05:45:54',	'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',	'yqaWf6F2na',	'2024-01-18 05:45:54',	'2024-01-18 05:45:54'),
(12,	'Andrew Welch',	'qyxepagu@mailinator.com',	NULL,	'$2y$10$F1iNQ/3STjqTMz7Zv1dX0.8xcdLQfLyhg3nyGHL0wKfE9oxORZyNC',	NULL,	'2024-01-18 07:26:58',	'2024-01-18 07:26:58'),
(13,	'admin',	'admin@mailinator.com',	NULL,	'$2y$10$s3/Y1SFsMmQhRR72gP1hnu0g8fRnBGW9OpzHGgHQ3N6I1ZZAnfzJG',	NULL,	'2024-01-18 07:27:39',	'2024-01-18 07:27:39'),
(14,	'Linda Washington',	'wimezopyre@mailinator.com',	NULL,	'$2y$10$moUCGl8dwTaitzcOvGDht.TGTlsMRPoBn7lbogOh1F8IAXCficpf.',	NULL,	'2024-01-19 04:40:02',	'2024-01-19 04:40:02'),
(15,	'Nita Benton',	'lolofujy@mailinator.com',	NULL,	'$2y$10$Z5IfrXEzSPEN7sA2h9CRduy1LDPP1FN6qFIFK2upD8vtGn7PWu5Y6',	NULL,	'2024-01-19 04:41:05',	'2024-01-19 04:41:05'),
(16,	'Evelyn Herman',	'zytyfy@mailinator.com',	NULL,	'$2y$10$J29fhortqs6JvOBZwwBcH.XHNGk9A1wWPmG111iICVQB33HlLZYV.',	NULL,	'2024-01-19 04:53:52',	'2024-01-19 04:53:52'),
(17,	'Buckminster Bridges',	'rinibu@mailinator.com',	NULL,	'$2y$10$CSAVv5HLscLVvg50yXXbTOi2JR2oI1rtWOzatL.cvyf9yrH4aVOTm',	NULL,	'2024-01-19 04:56:45',	'2024-01-19 04:56:45'),
(18,	'Xena Ruiz',	'nadem@mailinator.com',	NULL,	'$2y$10$0NisGZkvz8gGWgu8yzN8A.xLoXLrZEIa0nVA6gbCaFm63vspckSjO',	NULL,	'2024-01-19 05:01:17',	'2024-01-19 05:01:17'),
(19,	'Daryl Macdonald',	'korybekefe@mailinator.com',	NULL,	'$2y$10$ulkWRH5Y8zTsCPffMwtMXeASr10mwgGvvZfSleJLpbqdhbLB1Xk.q',	NULL,	'2024-01-19 05:02:49',	'2024-01-19 05:02:49'),
(20,	'Bianca Delacruz',	'fypugexugi@mailinator.com',	NULL,	'$2y$10$ch6w7ridZTgtnH.zFyUXvuC1QEUxQUkbGynPyU9ydPss6Cci2pK8q',	NULL,	'2024-01-19 05:07:34',	'2024-01-19 05:07:34'),
(21,	'Maxine Gallagher',	'hedakinepa@mailinator.com',	NULL,	'$2y$10$YXJDUgrBuRGyRElJadlEau.mAbGweg1cNwK3er8X5v465tNkm6d6S',	NULL,	'2024-01-19 05:44:13',	'2024-01-19 05:44:13'),
(22,	'Naida Peck',	'sapovify@mailinator.com',	NULL,	'$2y$10$wuhL4V1ZBViizRsIyv5r/OmN2BUouWKQUffwoyDFc0xmthjZMmJfe',	NULL,	'2024-01-19 07:59:51',	'2024-01-19 07:59:51'),
(23,	'Emerald Conner',	'nekutyw@mailinator.com',	NULL,	'$2y$10$eUzQ0U2xjSqdHzkWy6DznO14YUTn161qu1JaYSHQxdELIPIufLfX.',	NULL,	'2024-01-19 08:05:06',	'2024-01-19 08:05:06'),
(24,	'Mira Rivera',	'cipe@mailinator.com',	NULL,	'$2y$10$ys.CqVG2DagDFOX9rJnm4eYdZEwR0CH2sLGvtoQQttz2PybxmguNi',	NULL,	'2024-01-19 08:12:25',	'2024-01-19 08:12:25'),
(25,	'wadqd',	'sapovify@mailinator.com1',	NULL,	'$2y$10$CKLRh5lMIgkXjvOd7qp5AeYHw5ayWbh1mIdYZF4Fcnxiu/pXfQzdi',	NULL,	'2024-01-19 08:14:35',	'2024-01-19 08:14:35'),
(26,	'qqq',	'sapovify1@mailinator.com',	NULL,	'$2y$10$g3947f4Mar6dXf1t14fFcOGKEijqu1eMJ7Cheqh5kDmdMp7YeHtwK',	NULL,	'2024-01-20 00:02:05',	'2024-01-20 00:02:05'),
(27,	'Davis Lewis',	'mofomid@mailinator.com',	NULL,	'$2y$10$ioO4wUxkCeHMLUzK3sLJaOeeR6zPfBUzRJA241x0zJjbmIRU6rE7W',	NULL,	'2024-01-20 00:19:53',	'2024-01-20 00:19:53'),
(28,	'Tanek Peters',	'sutetys@mailinator.com',	NULL,	'$2y$10$Q1GeDPYvt2IPEesdslKS7OXUZHbBh2UeX50uaJV5Y6FlMZvxq501G',	NULL,	'2024-01-20 00:20:40',	'2024-01-20 00:20:40'),
(29,	'Vera Hickman',	'deruco@mailinator.com',	NULL,	'$2y$10$9QLgcIcjyOWUY..6SwVK/uTWeObLJRVovxuC8KqCMpgrvkaI5n9n2',	NULL,	'2024-01-20 01:01:24',	'2024-01-20 01:01:24');

-- 2024-01-20 06:39:31
