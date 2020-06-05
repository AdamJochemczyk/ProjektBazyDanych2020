-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Cze 2020, 15:49
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mydb`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inwestycje`
--

CREATE TABLE `inwestycje` (
  `idInwestycje` int(11) NOT NULL,
  `nazwa` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_typ` int(11) NOT NULL,
  `koszt_inwestycji` decimal(10,2) NOT NULL,
  `Wykupione` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `inwestycje`
--

INSERT INTO `inwestycje` (`idInwestycje`, `nazwa`, `id_typ`, `koszt_inwestycji`, `Wykupione`) VALUES
(0, 'Lokata4% w skali roku', 1, '1000.00', 0),
(1, 'Łazienki, Warszawka', 2, '23.00', 1),
(2, 'Złoto', 3, '12.00', 0),
(3, 'Lokata2.0', 1, '20000.00', 1),
(5, '\0Platyna', 3, '670000.00', 0),
(6, 'Dolar Amerykański', 4, '250000.00', 0),
(7, 'Funt Brytyjski', 4, '160000.00', 1),
(8, 'Wymarzony start obligacje', 5, '80000.00', 1),
(10, 'CDRED', 6, '9500000.00', 0),
(11, 'ING', 6, '50000.00', 1),
(12, 'KontoOszczędnościowe 2.5%', 1, '10000.00', 0),
(13, 'LokataMobilna 2.0%', 1, '25000.00', 0),
(14, 'Lokata3.0%', 1, '50000.00', 0),
(17, 'Roczna lokata', 1, '75000.00', 0),
(18, 'Program budowy kapitału', 1, '250000.00', 0),
(19, 'Osiedle domków jednorodzinnych Wrocław', 2, '12.00', 1),
(20, 'Dom na półwyspie Suwałki', 2, '1850000.00', 0),
(21, 'Hotel Baltic Wave Kołobrzeg', 2, '7500000.00', 0),
(22, 'Nowe domy w stanie developerskim Katowice', 2, '2000000.00', 0),
(23, 'Wilanowska Crestent Warszawa', 2, '4500000.00', 0),
(24, 'Karpatia Karpacz ośrodek wypoczynkowy', 2, '6600000.00', 0),
(25, 'Wisła apartamenty z basenem', 2, '10000000.00', 0),
(26, 'Działki usługowe przy DK86 w Będzinie', 2, '2500000.00', 1),
(27, 'Stone Hill kurort narciarski', 2, '15000000.00', 0),
(28, 'Synergy Park Gliwice', 2, '1250000.00', 1),
(29, 'Ropa', 3, '32.74', 1),
(30, 'Srebro', 3, '590000.00', 0),
(31, 'Cukier', 3, '222000.00', 0),
(32, 'Olej opałowy', 3, '1230000.00', 0),
(33, 'Kawa', 3, '804000.00', 0),
(34, 'Aluminium', 3, '300000.00', 0),
(35, 'Pallad', 3, '3000000.00', 0),
(36, 'Ołów', 3, '420000.00', 0),
(37, 'Nikiel', 3, '325000.00', 0),
(38, 'Cyna', 3, '770000.00', 0),
(39, 'Euro', 4, '1000000.00', 0),
(40, 'Australisjki dolar', 4, '500000.00', 1),
(41, 'real brazylijski', 4, '600000.00', 1),
(42, 'Juan chiński', 4, '2034500.00', 1),
(43, 'Kuna chorwacka', 4, '777000.00', 1),
(44, 'Korona islandzka', 4, '300500.00', 0),
(45, 'Kanadyjski Dolar', 4, '250000.00', 0),
(46, 'Rubel rosyjski', 4, '3500000.00', 1),
(47, 'Frank szwajcarski', 4, '654000.00', 1),
(48, 'Lira turecka', 4, '956000.00', 1),
(49, '3-miesięczne obligacje 0.5%', 5, '100000.00', 1),
(50, '2-letnie obligacje 1%', 5, '250000.00', 1),
(51, '3-letnie obligacje 1.1%', 5, '300000.00', 1),
(52, 'Obligacje 4-letnie 1.3%', 5, '400000.00', 1),
(53, '10-letnie obligacje 1.7%', 5, '800000.00', 1),
(54, '6-letnie obligacje 1.5%', 5, '900000.00', 0),
(55, '12-letnie obligacje korporacyjne 2%', 5, '2000000.00', 0),
(56, 'Air France-KLM', 6, '5000000.00', 0),
(57, 'KGHM Polska Miedź ', 6, '2000000.00', 0),
(58, 'Banco de Sabadell', 6, '325000.00', 0),
(59, 'Ryanair', 6, '6500000.00', 0),
(60, 'PKN Orlen', 6, '1230000.00', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inwestycjeuzytkownik`
--

CREATE TABLE `inwestycjeuzytkownik` (
  `ID_INW` int(11) NOT NULL,
  `idUzytkownik` int(11) NOT NULL,
  `idInwestycje` int(11) NOT NULL,
  `DATA_R` timestamp NOT NULL DEFAULT current_timestamp(),
  `DATA_Z` timestamp NULL DEFAULT NULL,
  `kwotaSprzedazy` decimal(20,2) DEFAULT NULL,
  `kwotaZakupu` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `inwestycjeuzytkownik`
--

INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`, `kwotaSprzedazy`, `kwotaZakupu`) VALUES
(71, 3, 1, '2020-06-05 09:18:43', '2020-06-05 10:34:11', '101.00', '100.00'),
(72, 3, 29, '2020-06-05 09:18:49', NULL, NULL, NULL),
(73, 3, 7, '2020-06-05 09:18:58', NULL, NULL, NULL),
(74, 3, 11, '2020-06-05 09:21:08', NULL, NULL, NULL),
(75, 3, 3, '2020-06-05 09:39:34', NULL, NULL, NULL),
(77, 3, 8, '2020-06-05 09:43:04', NULL, NULL, NULL),
(78, 3, 0, '2020-06-05 09:47:00', NULL, NULL, '222.00'),
(79, 3, 55, '2020-06-05 10:03:55', NULL, NULL, '10000.00'),
(80, 3, 19, '2020-06-05 10:06:14', NULL, NULL, NULL),
(81, 3, 1, '2020-06-05 10:47:00', NULL, NULL, NULL),
(82, 3, 53, '2020-06-05 10:48:43', NULL, NULL, '800000.00'),
(83, 3, 54, '2020-06-05 11:59:54', '2020-06-05 12:00:19', '900000.00', '1000000.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rola`
--

CREATE TABLE `rola` (
  `nazwa_roli` varchar(45) DEFAULT NULL,
  `id_roli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `rola`
--

INSERT INTO `rola` (`nazwa_roli`, `id_roli`) VALUES
('admin', 1),
('user', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typinwestycji`
--

CREATE TABLE `typinwestycji` (
  `idTypInwestycji` int(11) NOT NULL,
  `nazwaInw` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `typinwestycji`
--

INSERT INTO `typinwestycji` (`idTypInwestycji`, `nazwaInw`) VALUES
(1, 'lokata'),
(2, 'nieruchomosc'),
(3, 'surowce'),
(4, 'waluty'),
(5, 'obligacje'),
(6, 'akcje');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `idUzytkownik` int(11) NOT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `haslo` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_roli` int(11) NOT NULL,
  `wiek` int(11) NOT NULL,
  `kwota` double(20,2) DEFAULT NULL,
  `Imie` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nazwisko` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`idUzytkownik`, `email`, `haslo`, `id_roli`, `wiek`, `kwota`, `Imie`, `Nazwisko`) VALUES
(3, 'test@test.pl', '021b70ef48be3f049c8ec9864e251b89', 2, 21, 9049988.00, 'Teścik', 'TUTU'),
(10, 'admin@admin', 'd0dcf063a9c7678ef849da47e7b5c359', 1, 33, 1000000.00, 'tututu', 'tututututu');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `inwestycje`
--
ALTER TABLE `inwestycje`
  ADD PRIMARY KEY (`idInwestycje`),
  ADD KEY `fk_Inwestycje_TypInwestycji1` (`id_typ`);

--
-- Indeksy dla tabeli `inwestycjeuzytkownik`
--
ALTER TABLE `inwestycjeuzytkownik`
  ADD PRIMARY KEY (`ID_INW`),
  ADD KEY `fk_Uzytkownik_has_Inwestycje_Inwestycje1` (`idInwestycje`),
  ADD KEY `fk_Uzytkownik_has_Inwestycje_Uzytkownik1` (`idUzytkownik`);

--
-- Indeksy dla tabeli `rola`
--
ALTER TABLE `rola`
  ADD PRIMARY KEY (`id_roli`);

--
-- Indeksy dla tabeli `typinwestycji`
--
ALTER TABLE `typinwestycji`
  ADD PRIMARY KEY (`idTypInwestycji`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`idUzytkownik`),
  ADD KEY `fk_Uzytkownik_Rola` (`id_roli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `inwestycjeuzytkownik`
--
ALTER TABLE `inwestycjeuzytkownik`
  MODIFY `ID_INW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `idUzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `inwestycje`
--
ALTER TABLE `inwestycje`
  ADD CONSTRAINT `fk_Inwestycje_TypInwestycji1` FOREIGN KEY (`id_typ`) REFERENCES `typinwestycji` (`idTypInwestycji`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `inwestycjeuzytkownik`
--
ALTER TABLE `inwestycjeuzytkownik`
  ADD CONSTRAINT `fk_Uzytkownik_has_Inwestycje_Inwestycje1` FOREIGN KEY (`idInwestycje`) REFERENCES `inwestycje` (`idInwestycje`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Uzytkownik_has_Inwestycje_Uzytkownik1` FOREIGN KEY (`idUzytkownik`) REFERENCES `uzytkownik` (`idUzytkownik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `fk_Uzytkownik_Rola` FOREIGN KEY (`id_roli`) REFERENCES `rola` (`id_roli`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
