-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2024 pada 15.55
-- Versi server: 11.3.2-MariaDB
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cipat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`) VALUES
(1, 'Bayu', '0888888929', 'Balaraja'),
(2, 'Wahyu', '08223339393', 'Jakarta'),
(3, 'Yahya', '08111293484', 'Serang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(5) UNSIGNED NOT NULL,
  `kode_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `status_dosen` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `kode_dosen`, `nama_dosen`, `status_dosen`) VALUES
(1, '001', 'Agus S.Kom', '1'),
(2, '002', 'Wahyu M.Kom', '1'),
(3, '003', 'Zia S.H', '0'),
(4, '004', 'Cahyo M.M', '1'),
(5, '005', 'Bayu S.Pd.I', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(65, '2024-03-17-062524', 'App\\Database\\Migrations\\Dosen', 'default', 'App', 1715083599, 1),
(66, '2024-03-30-133455', 'App\\Database\\Migrations\\User', 'default', 'App', 1715083599, 1),
(67, '2024-05-01-073144', 'App\\Database\\Migrations\\Product', 'default', 'App', 1715083599, 1),
(68, '2024-05-04-112027', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1715083599, 1),
(69, '2024-05-06-110746', 'App\\Database\\Migrations\\Transaction', 'default', 'App', 1715083599, 1),
(70, '2024-05-06-110758', 'App\\Database\\Migrations\\TransactionDetail', 'default', 'App', 1715083599, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `stock` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `stock`, `price`) VALUES
(1, 'Baju', 8, 75000),
(2, 'Celana', 2, 90000),
(3, 'Jaket', 3, 150000),
(4, 'Tas Ransel', 5, 230000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactiondetails`
--

CREATE TABLE `transactiondetails` (
  `id` int(5) UNSIGNED NOT NULL,
  `product_id` int(5) UNSIGNED NOT NULL,
  `transaction_id` int(5) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `transactiondetails`
--

INSERT INTO `transactiondetails` (`id`, `product_id`, `transaction_id`, `qty`, `price`, `amount`) VALUES
(1, 4, 1, 1, 1000, 1000),
(2, 2, 1, 5, 1000, 5000),
(4, 2, 3, 3, 1000, 3000),
(5, 3, 3, 2, 1000, 2000),
(6, 1, 3, 6, 1000, 6000),
(7, 4, 3, 5, 1000, 5000),
(8, 3, 4, 2, 1000, 2000),
(9, 1, 4, 6, 1000, 6000),
(10, 4, 5, 1, 1000, 1000),
(11, 3, 6, 5, 1000, 5000),
(12, 4, 6, 3, 1000, 3000),
(13, 4, 7, 2, 230000, 460000),
(14, 3, 7, 6, 150000, 900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(5) UNSIGNED NOT NULL,
  `no_transaction` varchar(20) NOT NULL,
  `customer_id` int(5) UNSIGNED NOT NULL,
  `transaction_date` datetime NOT NULL,
  `sub_total` float NOT NULL,
  `discount` float NOT NULL,
  `tax` float NOT NULL,
  `total` float NOT NULL,
  `pay` float NOT NULL,
  `change` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `no_transaction`, `customer_id`, `transaction_date`, `sub_total`, `discount`, `tax`, `total`, `pay`, `change`) VALUES
(1, 'TRX18071205072024', 1, '2024-05-07 00:00:00', 6000, 0, 0, 6000, 10000, 4000),
(3, 'TRX33341405072024', 2, '2024-05-07 00:00:00', 16000, 5, 11, 16960, 20000, 3040),
(4, 'TRX03101505072024', 3, '2024-05-01 00:00:00', 8000, 0, 0, 8000, 10000, 2000),
(5, 'TRX19171105092024', 1, '2024-05-09 00:00:00', 1000, 0, 0, 1000, 5000, 4000),
(6, 'TRX31081405092024', 2, '2024-05-09 00:00:00', 8000, 5, 10, 8400, 10000, 1600),
(7, 'TRX37101405092024', 3, '2024-05-09 00:00:00', 1360000, 0, 0, 1360000, 1500000, 140000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Holiq Ibrahim', 'holiq', '$2y$10$HVaduKBjNbKEsnJzC79VnuVoo6bpu4cZe.hGHSR9gW/uIj.q5tdpS'),
(2, 'Johan', 'johan', '$2y$10$q4TtOd6HBfuFQGTSBjh3ieh7sE5BFmIwZaKaGjjOODOvCC37CrANK'),
(3, 'Agus', 'agus', '$2y$10$QphLkVewwo7kiROTAjSdK.zq3lAGA2RCfM3bHxjMrGQC654ysRDEG');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactiondetails_product_id_foreign` (`product_id`),
  ADD KEY `transactiondetails_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transactiondetails`
--
ALTER TABLE `transactiondetails`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transactiondetails`
--
ALTER TABLE `transactiondetails`
  ADD CONSTRAINT `transactiondetails_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactiondetails_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
