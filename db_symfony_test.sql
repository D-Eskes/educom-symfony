-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 jan 2023 om 12:59
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_symfony_test`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `artiest`
--

CREATE TABLE `artiest` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `genre` varchar(59) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `afbeelding_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `artiest`
--

INSERT INTO `artiest` (`id`, `naam`, `genre`, `omschrijving`, `website`, `afbeelding_url`) VALUES
(1, 'David Guetta', 'Dance', 'Pierre David Guetta (Parijs, 7 november 1967), kortweg David Guetta, is een Franse dj en dance-pop-producent (vroeger housemuziek). David Guetta bracht zijn eerste album, Just A Little More Love, in 2002 uit.', 'https://davidguetta.com/', 'https://www.top40.nl/media/cache/info_artist/uploads/artist/108824/6459647206504585745.jpg'),
(2, 'Rihanna', 'Pop', 'Rihanna, artiestennaam van Robyn Rihanna Fenty (Saint Michael, 20 februari 1988), is een Barbadiaanse zangeres. Ze brak in 2005 wereldwijd door met haar debuutsingle Pon de Replay, dat in veel landen de top 5 behaalde.', 'http://www.rihannanow.com/', 'https://www.top40.nl/media/cache/info_artist/uploads/artist/102860/original.jpg'),
(3, 'Madonna', 'Pop', 'Madonna Louise Ciccone (born August 16, 1958) is an American singer-songwriter and actress. Dubbed the \"Queen of Pop\", Madonna has been noted for her continual reinvention and versatility in music production, songwriting, and visual presentation. ', NULL, 'https://www.top40.nl/media/cache/info_artist/uploads/artist/104183/original.jpg'),
(4, 'Ed Sheeran', 'Pop', 'Edward Christopher Sheeran (Halifax, 17 februari 1991) is een Brits singer-songwriter. Na verschillende EP\'s te hebben uitgebracht tussen 2004 en 2010, tekende hij in 2011 een contract bij Asylum/Atlantic Records.', 'http://www.edsheeran.com/', 'https://www.top40.nl/media/cache/info_artist/uploads/artist/104146/original.jpg'),
(5, 'The Rolling Stones', 'Rock', 'The Rolling Stones, vaak kortweg aangeduid als The Stones, zijn een Britse rockband die actief is sinds 1962. De band speelt in de eerste plaats een combinatie van rock en rhythm-and-blues. Daarnaast vertolken ze ook andere stijlen als blues en country.', 'http://www.rollingstones.com/', 'https://www.top40.nl/media/cache/info_artist/uploads/artist/103464/original.jpg'),
(6, 'Coldplay', 'Poprock', 'Coldplay is een Britse rockband, die in 1996 in Londen werd gevormd. De leden zijn zanger Chris Martin, gitarist Jon Buckland, drummer Will Champion en bassist Guy Berryman. In het begin werd Coldplay vergeleken met andere artiesten en bands.', 'http://coldplay.com/', 'https://www.top40.nl/media/cache/info_artist/uploads/artist/108763/2606141654087050277.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230110093802', '2023-01-10 10:38:59', 177),
('DoctrineMigrations\\Version20230110103115', '2023-01-10 11:31:24', 284),
('DoctrineMigrations\\Version20230110103748', '2023-01-10 11:37:56', 135);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `optreden`
--

CREATE TABLE `optreden` (
  `id` int(11) NOT NULL,
  `poppodium_id` int(11) NOT NULL,
  `artiest_id` int(11) NOT NULL,
  `voorprogramma_id` int(11) DEFAULT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `datum` datetime NOT NULL,
  `prijs` int(11) NOT NULL,
  `ticket_url` varchar(255) NOT NULL,
  `afbeelding_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `optreden`
--

INSERT INTO `optreden` (`id`, `poppodium_id`, `artiest_id`, `voorprogramma_id`, `omschrijving`, `datum`, `prijs`, `ticket_url`, `afbeelding_url`) VALUES
(1, 2, 5, 4, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.', '2022-07-07 17:00:00', 8000, 'https://www.mojo.nl/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Standing_Ovation_For_Patti_Smith.png/390px-Standing_Ovation_For_Patti_Smith.png'),
(2, 3, 4, 6, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.', '2023-03-07 19:00:00', 5000, 'https://www.mojo.nl/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/The_New_Dominion_at_013_Tilburg_Thrashfest_-_2007-02-18.jpg/390px-The_New_Dominion_at_013_Tilburg_Thrashfest_-_2007-02-18.jpg'),
(3, 1, 3, NULL, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.', '2023-05-10 19:00:00', 12000, 'https://www.mojo.nl/', 'https://assets.melkweg.nl/scaled/900x/pages/48a45969-031b-48a4-a882-2d3408f2d631/bezoekersinfo.png'),
(4, 4, 1, 2, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis.', '2023-01-10 12:51:20', 9500, 'https://www.mojo.nl/', 'https://www.tivolivredenburg.nl/wp-content/uploads/2022/03/Caribou-Ronda-Tim-van-Veen-760x428.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `poppodium`
--

CREATE TABLE `poppodium` (
  `id` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `woonplaats` varchar(50) NOT NULL,
  `telefoonnummer` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `afbeelding_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `poppodium`
--

INSERT INTO `poppodium` (`id`, `naam`, `adres`, `postcode`, `woonplaats`, `telefoonnummer`, `email`, `website`, `afbeelding_url`) VALUES
(1, 'Melkweg', 'Lijnbaansgracht 234a', '1017 PH', 'Amsterdam', '0205318181', 'info@melkweg.nl', 'https://www.melkweg.nl', 'https://assets.melkweg.nl/scaled/900x/pages/48a45969-031b-48a4-a882-2d3408f2d631/bezoekersinfo.png'),
(2, 'Paradiso', 'Weteringschans 6', '1017 SG', 'Amsterdam', '0206264521', 'info@paradiso.nl', 'https://www.paradiso.nl\r\n', 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Standing_Ovation_For_Patti_Smith.png/390px-Standing_Ovation_For_Patti_Smith.png'),
(3, '013', 'Veemarktstraat 44', '5038 CV', 'Tilburg', '0134609500', 'info@013.nl', 'https://www.013.nl/', 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/The_New_Dominion_at_013_Tilburg_Thrashfest_-_2007-02-18.jpg/390px-The_New_Dominion_at_013_Tilburg_Thrashfest_-_2007-02-18.jpg'),
(4, 'Tivoli', 'Vredenburgkade 11', '3511 WC', 'Utrecht', '0302314544', 'info@tivolivredenburg.nl', 'https://www.tivolivredenburg.nl/', 'https://www.tivolivredenburg.nl/wp-content/uploads/2022/03/Caribou-Ronda-Tim-van-Veen-760x428.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `artiest`
--
ALTER TABLE `artiest`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexen voor tabel `optreden`
--
ALTER TABLE `optreden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6286F65DA2EEBB18` (`poppodium_id`),
  ADD KEY `IDX_6286F65DAED85528` (`artiest_id`),
  ADD KEY `IDX_6286F65DE017CE10` (`voorprogramma_id`);

--
-- Indexen voor tabel `poppodium`
--
ALTER TABLE `poppodium`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `artiest`
--
ALTER TABLE `artiest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `optreden`
--
ALTER TABLE `optreden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `poppodium`
--
ALTER TABLE `poppodium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `optreden`
--
ALTER TABLE `optreden`
  ADD CONSTRAINT `FK_6286F65DA2EEBB18` FOREIGN KEY (`poppodium_id`) REFERENCES `poppodium` (`id`),
  ADD CONSTRAINT `FK_6286F65DAED85528` FOREIGN KEY (`artiest_id`) REFERENCES `artiest` (`id`),
  ADD CONSTRAINT `FK_6286F65DE017CE10` FOREIGN KEY (`voorprogramma_id`) REFERENCES `artiest` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
