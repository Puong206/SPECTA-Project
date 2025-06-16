-- File: database.sql

-- Membuat tabel untuk pengguna (admin dan user)
CREATE TABLE `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `username` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('admin', 'user') NOT NULL DEFAULT 'user',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Membuat tabel untuk acara (Seminar, Fun Run)
CREATE TABLE `events` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `date` DATE NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL
);

-- Membuat tabel untuk transaksi
CREATE TABLE `transactions` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT NOT NULL,
  `event_id` INT NOT NULL,
  `amount` DECIMAL(10, 2) NOT NULL,
  `status` VARCHAR(50) NOT NULL DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (event_id) REFERENCES events(id)
);

-- Memasukkan data admin default dan data acara
INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', SHA2('admin123', 256), 'admin'),
('user', SHA2('user123', 256), 'user');

INSERT INTO `events` (`name`, `description`, `date`, `price`) VALUES
('Seminar Nasional', 'Seminar Nasional dengan tema "Manusia vs Mesin siapa yang akan bertahan di era AI".', '2025-04-26', 25000.00),
('Fun Run', 'Kegiatan Fun Run sejauh 5K sekaligus closing ceremony.', '2025-05-26', 150000.00);