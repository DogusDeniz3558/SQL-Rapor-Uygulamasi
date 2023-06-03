-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2023, 19:04:36
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisiler`
--

CREATE TABLE `kisiler` (
  `id` int(11) NOT NULL,
  `AdSoyad` varchar(255) DEFAULT NULL,
  `Sehir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kisiler`
--

INSERT INTO `kisiler` (`id`, `AdSoyad`, `Sehir`) VALUES
(1, 'Meral Akşener', 'Sivas'),
(2, 'Mustafa Kemal Atatürk', 'Selanik');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `name`, `surname`, `age`, `gender`) VALUES
(1, 'Meral', 'Değerli', 18, 'Kadın'),
(2, 'Ahmet', 'Kara', 45, 'Erkek'),
(3, 'Deniz', 'Güneş', 34, 'Kadın'),
(4, 'Mehmet', 'Öztürk', 22, 'Erkek'),
(5, 'Ayşe', 'Sarı', 31, 'Kadın'),
(6, 'Emre', 'Aktaş', 28, 'Erkek'),
(7, 'Zeynep', 'Aydın', 19, 'Kadın'),
(8, 'Gizem', 'Kılıç', 36, 'Kadın'),
(9, 'Tolga', 'Demir', 42, 'Erkek'),
(10, 'Selin', 'Köse', 27, 'Kadın'),
(11, 'Yusuf', 'Ateş', 23, 'Erkek'),
(12, 'Ebru', 'Bulut', 20, 'Kadın'),
(13, 'Serkan', 'Demirci', 39, 'Erkek'),
(14, 'Elif', 'Kaya', 25, 'Kadın'),
(15, 'Mehmet', 'Sönmez', 43, 'Erkek'),
(16, 'Aslı', 'Demir', 32, 'Kadın'),
(17, 'Hasan', 'Çelik', 29, 'Erkek'),
(18, 'Deniz', 'Atalay', 21, 'Kadın'),
(19, 'Ali', 'Esen', 47, 'Erkek'),
(20, 'Sevgi', 'Özdemir', 33, 'Kadın'),
(21, 'Cem', 'Yıldız', 26, 'Erkek'),
(22, 'Seda', 'Kaplan', 28, 'Kadın'),
(23, 'Murat', 'Aydın', 40, 'Erkek'),
(24, 'Ebru', 'Aksoy', 24, 'Kadın'),
(25, 'Hakan', 'Bakır', 37, 'Erkek'),
(26, 'Gizem', 'Güzel', 29, 'Kadın'),
(27, 'Emre', 'Keskin', 30, 'Erkek'),
(28, 'Merve', 'Taş', 22, 'Kadın'),
(29, 'Mustafa', 'Kara', 46, 'Erkek'),
(30, 'Duygu', 'Yıldız', 31, 'Kadın'),
(31, 'Oğuz', 'Öztürk', 27, 'Erkek'),
(32, 'Ebru', 'Kılıç', 23, 'Kadın'),
(33, 'Yunus', 'Çetin', 35, 'Erkek'),
(34, 'Büşra', 'Gökgöz', 26, 'Kadın'),
(35, 'Murat', 'Özkan', 39, 'Erkek'),
(36, 'Nazlı', 'Karaaslan', 27, 'Kadın'),
(37, 'Cemal', 'Erdem', 33, 'Erkek'),
(38, 'Fatma', 'Yavuz', 31, 'Kadın'),
(39, 'Kadir', 'Kılıç', 44, 'Erkek'),
(40, 'Sema', 'Toprak', 29, 'Kadın'),
(41, 'Mehmet', 'Demir', 48, 'Erkek'),
(42, 'Selin', 'Çelik', 25, 'Kadın'),
(43, 'Can', 'Kurt', 34, 'Erkek'),
(44, 'Özge', 'Kaya', 27, 'Kadın'),
(45, 'Levent', 'Yılmaz', 38, 'Erkek'),
(46, 'Merve', 'Çalışkan', 22, 'Kadın'),
(47, 'Ege', 'Doğan', 25, 'Erkek'),
(48, 'Esra', 'Aydın', 29, 'Kadın'),
(49, 'Soner', 'Arslan', 37, 'Erkek'),
(50, 'Melis', 'Uzun', 26, 'Kadın'),
(51, 'Yıldız', 'Yılmaz', 55, 'Kadın'),
(52, 'Mert', 'Kolsuz', 41, 'Erkek'),
(53, 'Bengü', 'Koç', 24, 'Kadın'),
(54, 'Murtaza', 'Mük', 47, 'Erkek'),
(55, 'Gülsen', 'Ay', 20, 'Kadın'),
(56, 'Doğuş', 'Deniz', 25, 'Erkek');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kisiler`
--
ALTER TABLE `kisiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kisiler`
--
ALTER TABLE `kisiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
