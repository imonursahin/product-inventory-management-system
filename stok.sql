-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 17 Haz 2020, 18:03:45
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `stok`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `sifre` varchar(16) CHARACTER SET latin1 NOT NULL,
  `type` int(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `adres` text CHARACTER SET latin1 NOT NULL,
  `telefon` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `name`, `sifre`, `type`, `adres`, `telefon`) VALUES
(111111, 'admin', '123456', 1, 'istanbul', '123456789'),
(222230, 'Ali Veli', '', 0, 'Türkiye', '147258369');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `pid` int(5) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `urun_kat` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tarih` date NOT NULL,
  `cfiyat` float NOT NULL,
  `miktar` float NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`pid`, `name`, `urun_kat`, `tarih`, `cfiyat`, `miktar`) VALUES
(10064, 'Televizyon', 'Elektronik', '2020-05-20', 5500, 255),
(10065, 'Ütü', 'Elektronik', '2020-05-20', 500, 10),
(10066, 'Laptop', 'Elektronik', '2020-04-10', 8000, 5),
(10067, 'Cilt Maskesi', 'Kozmetik', '2020-05-05', 12, 50),
(10069, 'Sabun', 'Kozmetik', '2020-05-05', 5, 150);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`pid`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222231;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `pid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10071;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
