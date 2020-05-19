-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Maj 2020, 11:39
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
(0, 'Lokata 4% w skali roku', 1, '1000.00', NULL),
(1, 'Łazienki, Warszafka', 2, '99999999.99', NULL),
(2, 'Złoto', 2, '260000.00', NULL),
(3, '\0Super lokata2.0', 1, '20000.00', NULL),
(4, 'Złoto', 3, '500000.00', NULL),
(5, '\0Platyna', 3, '670000.00', NULL),
(6, 'Dolar Amerykański', 4, '250000.00', NULL),
(7, 'Funt Brytyjski', 4, '160000.00', 1),
(8, '\0Obligacja wymarzony start', 5, '80000.00', NULL),
(9, 'Obligacje skarbowe', 5, '3200000.00', NULL),
(10, '\0Akcje CDRED', 6, '9500000.00', NULL),
(11, '\0Akcje ING', 6, '50000.00', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `inwestycjeuzytkownik`
--

CREATE TABLE `inwestycjeuzytkownik` (
  `ID_INW` int(11) NOT NULL,
  `idUzytkownik` int(11) NOT NULL,
  `idInwestycje` int(11) NOT NULL,
  `DATA_R` date NOT NULL DEFAULT current_timestamp(),
  `DATA_Z` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `inwestycjeuzytkownik`
--

INSERT INTO `inwestycjeuzytkownik` (`ID_INW`, `idUzytkownik`, `idInwestycje`, `DATA_R`, `DATA_Z`) VALUES
(1, 6, 1, '2020-05-13', '2020-06-13');

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
  `nazwa` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `typinwestycji`
--

INSERT INTO `typinwestycji` (`idTypInwestycji`, `nazwa`) VALUES
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
  `kwota` decimal(10,2) DEFAULT NULL,
  `Imie` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Nazwisko` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`idUzytkownik`, `email`, `haslo`, `id_roli`, `wiek`, `kwota`, `Imie`, `Nazwisko`) VALUES
(3, 'test@test.pl', 'asdfg123', 2, 21, '10000.00', 'Test', 'Tescikowy'),
(4, 'rambus2013@aaa.com', 'aasda', 2, 21, '0.00', 'Daw', 'Kan'),
(5, 'asdf@onet.pl', 'zaq12wsx', 2, 23, '22.00', 'TSES1', 'TSES12'),
(6, 'tututu@gmail.com', 'Dzekula21', 2, 21, '1000000.00', 'sebix', 'Szczypek'),
(10, 'admin@admin', 'admin', 1, 33, '1000000.00', 'tututu', 'tututututu');

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
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `idUzytkownik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
