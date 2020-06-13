-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Cze 2020, 15:00
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
  `Wykupione` tinyint(1) DEFAULT NULL,
  `procent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `inwestycje`
--

INSERT INTO `inwestycje` (`idInwestycje`, `nazwa`, `id_typ`, `koszt_inwestycji`, `Wykupione`, `procent`) VALUES
(0, 'Lokata2% w skali roku', 1, '1000.00', 0, 2),
(1, 'Łazienki, Warszawka', 2, '3000000.00', 0, NULL),
(2, 'Złoto', 3, '11000.00', 0, NULL),
(3, 'Lokata2.0 1%', 1, '20000.00', 0, 1),
(5, '\0Platyna', 3, '670000.00', 0, NULL),
(6, 'Amerykański dolar', 4, '250000.00', 0, NULL),
(7, 'Funt Brytyjski', 4, '9100.00', 0, NULL),
(8, 'Wymarzony start obligacje 3% roczne', 5, '81000.00', 0, 3),
(10, 'CDRED', 6, '9500000.00', 0, NULL),
(11, 'ING', 6, '52000.00', 0, NULL),
(12, 'KontoOszczędnościowe 3%', 1, '10000.00', 0, 3),
(13, 'LokataMobilna 3.0%', 1, '25000.00', 0, 3),
(17, 'Roczna lokata 4%', 1, '75000.00', 0, 4),
(18, 'Program budowy kapitału', 1, '250000.00', 0, 5),
(19, 'Osiedle domków jednorodzinnych Wrocław', 2, '12.00', 0, NULL),
(20, 'Dom na półwyspie Suwałki', 2, '1851000.00', 0, NULL),
(21, 'Hotel Baltic Wave Kołobrzeg', 2, '7500000.00', 0, NULL),
(22, 'Nowe domy w stanie developerskim Katowice', 2, '2000000.00', 0, NULL),
(23, 'Wilanowska Crestent Warszawa', 2, '4500000.00', 0, NULL),
(24, 'Karpatia Karpacz ośrodek wypoczynkowy', 2, '6600000.00', 0, NULL),
(25, 'Wisła apartamenty z basenem', 2, '10000000.00', 0, NULL),
(26, 'Działki usługowe przy DK86 w Będzinie', 2, '2500000.00', 0, NULL),
(27, 'Stone Hill kurort narciarski', 2, '15000000.00', 0, NULL),
(28, 'Synergy Park Gliwice', 2, '1250000.00', 0, NULL),
(29, 'Ropa', 3, '32.74', 0, NULL),
(30, 'Srebro', 3, '590000.00', 0, NULL),
(31, 'Cukier', 3, '222000.00', 0, NULL),
(32, 'Olej opałowy', 3, '1230000.00', 0, NULL),
(33, 'Kawa', 3, '804000.00', 0, NULL),
(34, 'Aluminium', 3, '300000.00', 0, NULL),
(35, 'Pallad', 3, '3000000.00', 0, NULL),
(36, 'Ołów', 3, '420000.00', 0, NULL),
(37, 'Nikiel', 3, '325000.00', 0, NULL),
(38, 'Cyna', 3, '770000.00', 0, NULL),
(39, 'Euro', 4, '1000000.00', 0, NULL),
(40, 'Australisjki dolar', 4, '500000.00', 0, NULL),
(41, 'real brazylijski', 4, '600000.00', 0, NULL),
(42, 'Juan chiński', 4, '2034500.00', 0, NULL),
(43, 'Kuna chorwacka', 4, '777000.00', 0, NULL),
(44, 'Korona islandzka', 4, '300500.00', 0, NULL),
(45, 'Kanadyjski Dolar', 4, '250000.00', 0, NULL),
(46, 'Rubel rosyjski', 4, '3500000.00', 0, NULL),
(47, 'Frank szwajcarski', 4, '654000.00', 0, NULL),
(48, 'Lira turecka', 4, '956000.00', 0, NULL),
(50, 'Roczne obligacje 3%', 5, '100.00', 0, 3),
(56, 'Air France-KLM', 6, '5000000.00', 0, NULL),
(57, 'KGHM Polska Miedź ', 6, '2000000.00', 0, NULL),
(58, 'Banco de Sabadell', 6, '325000.00', 0, NULL),
(59, 'Ryanair', 6, '6500000.00', 0, NULL),
(60, 'PKN Orlen', 6, '1230000.00', 0, NULL);

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
(137, 16, 0, '2020-06-02 08:25:24', '2020-06-04 08:26:03', '900.00', '1000.00'),
(138, 16, 20, '2020-06-09 08:25:31', '2020-06-09 08:26:19', '1851000.00', '1850000.00'),
(139, 16, 2, '2020-06-09 08:25:35', '2020-06-09 08:26:24', '11000.00', '12000.00'),
(140, 16, 7, '2020-06-09 08:25:38', '2020-06-09 08:26:30', '9100.00', '9000.00'),
(141, 16, 8, '2020-06-09 08:25:41', '2020-06-09 08:26:31', '72900.00', '81000.00'),
(142, 16, 11, '2020-06-09 08:25:48', '2020-06-09 08:26:39', '52000.00', '51000.00'),
(143, 16, 50, '2020-06-13 08:52:50', '2020-06-13 11:47:18', '225000.00', '250000.00'),
(144, 16, 18, '2020-06-13 08:58:24', '2020-06-13 11:47:23', '225000.00', '250000.00'),
(145, 16, 0, '2020-06-11 11:47:37', '2020-06-11 22:00:00', '1020.00', '1000.00'),
(146, 16, 50, '2020-06-11 11:47:45', '2020-06-11 22:00:00', '103.00', '100.00');

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
(10, 'admin@admin', 'b1ae47b51f35676b92b963addecbfeb9', 1, 33, 0.00, 'tututu', 'tututututu'),
(16, 'test@test.pl', 'e9b3116e73ae8530e2425bea1f56587e', 2, 22, 9442975.20, 'Jurek', 'Ogórek');

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
  MODIFY `ID_INW` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `idUzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
