-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Tem 2023, 20:14:04
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `quiz`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer1` varchar(100) NOT NULL,
  `answer2` varchar(100) NOT NULL,
  `answer3` varchar(100) NOT NULL,
  `answer4` varchar(100) NOT NULL,
  `correctAnswer` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `questions`
--

INSERT INTO `questions` (`id`, `quizId`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `correctAnswer`) VALUES
(51, 1, 'Türkiye\'nin başkenti neresidir?', 'İstanbul', 'Ankara', 'Edirne', 'Trabzon', '2'),
(52, 1, 'Aşağıdakilerden hangisi 3 büyük takımdan biri değildir?', 'Fenerbahçe', 'Beşiktaş', 'Kayserispor', 'Beşiktaş', '3'),
(53, 1, 'Aşağıdakilerden hangisi çift sayıdır?', '9', '21', '33', '46', '4'),
(54, 1, 'Türkiye\'nin nüfusu en yüksek ili hangisidir?', 'İstanbul', 'Ankara', 'İzmir', 'Konya', '1'),
(55, 1, 'En büyük 2 basamaklı çift sayı kaçtır?', '97', '98', '99', '100', '2'),
(56, 2, 'En büyük rakam kaçtır?', '8', '9', '10', '13', '2'),
(57, 2, 'Çarpmada yutan eleman olarak adlandırılan sayı kaçtır?', '-2', '-6', '0', '555', '3'),
(58, 2, 'Aşağıdakilerden hangisi asal sayıdır?', '55', '68', '11', '96', '3'),
(59, 2, 'Çıkarma işlemi hangi işlemin tersidir?', 'Toplama', 'Bölme', 'Çarpma', 'Mod alma', '1'),
(60, 2, 'En büyük negatif tam sayı kaçtır?', '-999', '-9', '-99', '-1', '4');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `quizzes`
--

INSERT INTO `quizzes` (`id`, `code`) VALUES
(1, 'iqPriIaCyB'),
(2, 'pyh41ocHFy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `quizId` int(11) NOT NULL,
  `nickName` varchar(15) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `scores`
--

INSERT INTO `scores` (`id`, `quizId`, `nickName`, `score`) VALUES
(22, 1, 'Samet Tatlıcak', 100),
(23, 1, 'Ahmet Yıldız', 40),
(24, 2, 'Samet Tatlıcak', 100),
(25, 2, 'Ahmet Yıldız', 80),
(26, 2, 'Veli Kurt', 40),
(27, 2, 'Onur Kılıç', 40),
(31, 1, 'Deniz Bal', 20);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Tablo için AUTO_INCREMENT değeri `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
