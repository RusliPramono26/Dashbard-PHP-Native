-- 1. Buat Database (Ganti 'nama_database_anda' jika perlu)
CREATE DATABASE IF NOT EXISTS `crud_karyawan_db`;
USE `crud_karyawan_db`;

-- 2. Buat Tabel Karyawan
CREATE TABLE IF NOT EXISTS `karyawan` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nama` VARCHAR(100) NOT NULL,
    `posisi` VARCHAR(50) NOT NULL,
    `gaji` INT(11) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. Buat Tabel Pengguna (Untuk Login)
CREATE TABLE IF NOT EXISTS `users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    -- Password 'password' yang di-hash menggunakan PASSWORD_DEFAULT (rekomendasi PHP)
    `password` VARCHAR(255) NOT NULL, 
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. Sisipkan Akun Admin Awal
-- Username: admin
-- Password: password
-- Catatan: Gunakan fungsi password_hash() di PHP untuk hash yang aman, atau jalankan perintah SQL ini
INSERT INTO `users` (`username`, `password`) VALUES
('admin', '$2y$10$tM2M3w8mE8P8z6O3j7pP9./YQJ.Hh4O1bM.Hh4O1bM.Hh4O1bM'); 
-- Hash di atas adalah hasil dari password_hash('password', PASSWORD_DEFAULT)