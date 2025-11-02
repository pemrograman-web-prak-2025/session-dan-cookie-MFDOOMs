CREATE DATABASE IF NOT EXISTS household_tasks;

USE household_tasks;

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,  
  `remember_token` varchar(100) NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NULL,
  `assigned_to` bigint UNSIGNED NOT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`assigned_to`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`name`, `email`, `password`, `created_at`, `updated_at`) VALUES
('Andi', 'andi@example.com', '123wow', NOW(), NOW()),
('Budi', 'budi@example.com', 'wow123', NOW(), NOW());

INSERT INTO `tasks` (`title`, `description`, `assigned_to`, `is_completed`, `created_at`, `updated_at`) VALUES
('Nyapu halaman', 'Bersihkan daun kering di halaman depan', 1, 0, NOW(), NOW()),
('Cuci piring', 'Cuci semua piring setelah makan malam', 2, 1, NOW(), NOW()),
('Belanja bulanan', 'Beli beras, telur, dan sayur', 1, 0, NOW(), NOW());

ALTER TABLE `users` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `tasks` MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;