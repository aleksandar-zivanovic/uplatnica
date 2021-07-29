-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2021 at 01:38 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uplatnica`
--

-- --------------------------------------------------------

--
-- Table structure for table `primalac`
--

CREATE TABLE `primalac` (
  `id_primaoca` int(11) NOT NULL,
  `naziv_primaoca` varchar(255) NOT NULL,
  `racun_primaoca` varchar(50) NOT NULL,
  `id_uplatioca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sacuvane_uplatnice`
--

CREATE TABLE `sacuvane_uplatnice` (
  `id_uplate` int(11) NOT NULL,
  `su_id_uplatioca` int(11) NOT NULL,
  `su_uplatilac` varchar(255) NOT NULL,
  `su_svrha` varchar(255) NOT NULL,
  `su_primalac` varchar(255) NOT NULL,
  `su_sifra` int(3) NOT NULL,
  `su_valuta` varchar(3) NOT NULL,
  `su_iznos` varchar(12) NOT NULL,
  `su_racun_primaoca` varchar(25) NOT NULL,
  `su_model` varchar(5) NOT NULL,
  `su_poz_na_br` varchar(50) NOT NULL,
  `su_datum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sacuvane_uplatnice`
--

INSERT INTO `sacuvane_uplatnice` (`id_uplate`, `su_id_uplatioca`, `su_uplatilac`, `su_svrha`, `su_primalac`, `su_sifra`, `su_valuta`, `su_iznos`, `su_racun_primaoca`, `su_model`, `su_poz_na_br`, `su_datum`) VALUES
(2, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'Doprinos za zdravstveno osiguranje za 6 meseci', 'ZZZO', 153, 'RSD', '15945,00', '8400000721432843284334', '97', '97-080-1127400676568', '2021-01-17 23:22:08'),
(3, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'id = 3', 'id = 3', 123, 'RSD', '3', '12345', '123', ' ', '2021-01-18 22:43:00'),
(5, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'pokusaj 2. - bez modela i poz na br - posle ispravke imena varijabli', '123', 153, 'RSD', '15945,00', '123', ' ', ' ', '2021-01-19 00:03:50'),
(6, 1, 'Aca Zivanovic', 'pokusaj 2. - bez modela i poz na br - posle ispravke imena varijabli', '123', 153, 'RSD', '15945,00', '123', ' ', ' ', '2021-01-19 00:04:30'),
(8, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'erwr', 'ewrerw', 153, 'RSD', '234', '8400000721432843284334', '123', ' ', '2021-01-19 00:09:37'),
(10, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'testiranje bez modela i poz na br', 'primalac', 153, 'RSD', '10056', '123', ' ', 'sdasdasda', '2021-01-19 14:54:14'),
(14, 1, 'Aleksandar Zivanovic Rudarska 5 12000 Pozarevac', 'id = 2', 'id = 2', 123, 'RSD', '13', '12345', '2', '2', '2021-01-19 15:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `uplatilac`
--

CREATE TABLE `uplatilac` (
  `id_uplatioca` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email_uplatioca` varchar(75) NOT NULL,
  `password_uplatioca` varchar(255) NOT NULL,
  `ime_uplatioca` varchar(50) NOT NULL,
  `prezime_uplatioca` varchar(50) NOT NULL,
  `adresa_uplatioca` varchar(255) NOT NULL,
  `postanski_br_uplatioca` int(5) NOT NULL,
  `mesto_uplatioca` varchar(255) NOT NULL,
  `reset_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uplatilac`
--

INSERT INTO `uplatilac` (`id_uplatioca`, `username`, `email_uplatioca`, `password_uplatioca`, `ime_uplatioca`, `prezime_uplatioca`, `adresa_uplatioca`, `postanski_br_uplatioca`, `mesto_uplatioca`, `reset_token`) VALUES
(1, 'AcaZ', 'acas_mail@yahoo.com', '$2y$10$faurG2NUZMUIAw7mHjTeXeiotdT.v.ovqP08w6Dp2DCe5z6qQGybq', 'Aleksandar', 'Zivanovic', 'Rudarska 5', 12000, 'Pozarevac', ''),
(2, 'pera', 'pera@ptt.rs', '$2y$10$idNIcNEdgDrX9FHt2VhRIu0a.JncvJxHKeCzTYoiPSqWF/R1TOTGy', 'Petar', 'Petrovic', 'Pere Bandere 127', 11000, 'Beograd', ''),
(3, 'mika', 'mika@mika.com', '$2y$10$idNIcNEdgDrX9FHt2VhRIu0a.JncvJxHKeCzTYoiPSqWF/R1TOTGy', 'Mika', 'Mikic', 'Mike Alasa 23/4 ulaz B', 11000, 'Beograd', ''),
(4, 'Maksa', '', '', 'Maksim', 'Gorki', 'Maksima Gorkog 6/A', 26000, 'Smederevo', ''),
(6, 'zika_zmaj', '', '123', 'Zika', 'Zmaj', 'Jove Jovanovica Zmaja 12', 2344412, '&lt;script&gt;alert(\'pera\')&lt;/script&gt;', ''),
(7, 'Izmenjeni', 'izmenjeni@izmena.com', '123', 'Ime', 'Prezime', 'adresa', 12345, 'Vukojebina', ''),
(46, 'osoba1', 'osoba1@gmail.com', 'osoba1', 'osoba1', 'osoba1', 'osoba1ghj', 11111111, 'osoba1', ''),
(51, 'trta', 'trta@trta.com', '$2y$10$idNIcNEdgDrX9FHt2VhRIu0a.JncvJxHKeCzTYoiPSqWF/R1TOTGy', 'trta', 'trta', 'trta', 123, 'trta', ''),
(52, 'djoka', 'djoka@djoka.com', '$2y$10$VbIDlVmgnQ3qQ5y.l0.emO.hkR/sQNuX1Nj3.RwoM3w/5kBuoJQeG', 'Djoka', 'Djokic', 'Brace Dobrnjac 132', 12000, 'Pozarevac', '13223bc203712e4f6456dc2e4806573dfefce4c4'),
(54, 'mirko', 'mirko@mirko.com', '$2y$10$LA5qGaJoIXu5TJlofKLsIeQ1LhUdpY9CGWQcvTqyFLskmZrKTAZUS', 'Mirko', 'Mirkovic', 'Cane Babovica bb', 11000, 'Beograd', '5a4ccd0079d9c333b6c73e0e0923cfe3b23400d3'),
(55, 'slavko', 'slavko@slavko.com', '$2y$10$TXqtagbyUG36xBeS0UTHoOdiByo47RCZiNkNVAz3dbszFwt57s0r2', 'Slavko', 'Slavkovic', 'Neznanog junaka 12', 12000, 'Pozarevac', ''),
(56, 'draza', 'resetovanjekorisnickesifre@gmail.com', '$2y$10$9dQF45yMFl5gMV.VuIT1aeTB7FbLL0kgaUMaQZjWNembZiSrfhheW', 'Draza', 'Reglaza', 'Hipodrom 12', 11000, 'Beograd', '9186476a0349a7e725642fc562dc7b939c0b3ef1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `primalac`
--
ALTER TABLE `primalac`
  ADD PRIMARY KEY (`id_primaoca`),
  ADD KEY `fk_id_uplatioca` (`id_uplatioca`);

--
-- Indexes for table `sacuvane_uplatnice`
--
ALTER TABLE `sacuvane_uplatnice`
  ADD PRIMARY KEY (`id_uplate`);

--
-- Indexes for table `uplatilac`
--
ALTER TABLE `uplatilac`
  ADD PRIMARY KEY (`id_uplatioca`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `primalac`
--
ALTER TABLE `primalac`
  MODIFY `id_primaoca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sacuvane_uplatnice`
--
ALTER TABLE `sacuvane_uplatnice`
  MODIFY `id_uplate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `uplatilac`
--
ALTER TABLE `uplatilac`
  MODIFY `id_uplatioca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `primalac`
--
ALTER TABLE `primalac`
  ADD CONSTRAINT `fk_id_uplatioca` FOREIGN KEY (`id_uplatioca`) REFERENCES `primalac` (`id_primaoca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
