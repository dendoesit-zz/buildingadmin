-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 01:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `facturi`
--

CREATE TABLE `facturi` (
  `id_locatar` int(11) NOT NULL,
  `luna` int(11) NOT NULL,
  `an` year(4) NOT NULL,
  `suma` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locatari`
--

CREATE TABLE `locatari` (
  `id` int(10) NOT NULL,
  `ap` int(10) NOT NULL,
  `nume` varchar(40) NOT NULL,
  `nr_pers` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locatari`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pw` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (1, 'admin@admin.com', 'admin', 'admin');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (2, 'admin1@admin1.com', 'admin', 'admin');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (3, 'user@user.com', '1', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (4, 'bins.thad@gmail.com', '7', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (5, 'britney.altenwerth@yahoo.com', '8', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (6, 'marco.rohan@gmail.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (7, 'kaela.konopelski@yahoo.com', '9', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (8, 'ed45@maggio.com', '1', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (9, 'kdibbert@halvorson.info', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (10, 'vheaney@weissnatkemmer.com', '3', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (11, 'josefina77@yahoo.com', '7', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (12, 'harris.lupe@yahoo.com', '1', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (13, 'elias.muller@beer.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (14, 'leuschke.halie@yahoo.com', '4', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (15, 'norene.emard@gmail.com', '1', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (16, 'brooke.baumbach@gmail.com', '4', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (17, 'mitchell.susana@bartolettischneider.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (18, 'wiley.simonis@hotmail.com', '7', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (19, 'mdaugherty@gmail.com', '4', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (20, 'rhea.turcotte@towne.info', '8', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (21, 'gordon55@conn.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (22, 'nakia80@zulauf.com', '4', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (23, 'corkery.lavina@hotmail.com', '3', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (24, 'klein.tevin@blanda.com', '4', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (25, 'greyson.weimann@lemke.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (26, 'lillian57@yahoo.com', '3', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (27, 'myron.funk@lemke.com', '3', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (28, 'waters.reilly@stammbeatty.com', '5', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (29, 'hazle17@heidenreich.com', '8', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (30, 'hope.stracke@thompsonklocko.com', '6', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (31, 'ozulauf@yahoo.com', '3', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (32, 'ucremin@kohler.com', '7', 'user');
INSERT INTO `users` (`id`, `email`, `pw`, `role`) VALUES (33, 'ucremdsain@kosdsahler.com', '4', 'user');

INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (1, 33, 'Morosanu', 4, 33);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (2, 32, 'Dr. Omer Gislason IV', 4, 1);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (3, 11, 'Krista Lindgren DDS', 2, 2);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (4, 21, 'Flossie Bins', 3, 3);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (5, 27, 'Shanel Kunze', 2, 4);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (6, 7, 'Durward Jacobson', 2, 5);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (7, 1, 'Sammie Feest', 4, 6);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (8, 31, 'Berenice Ritchie V', 3, 7);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (9, 4, 'Vivian Batz', 2, 8);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (10, 8, 'Ms. Kirsten Hettinger', 1, 9);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (11, 22, 'Dr. Dominique Fisher', 1, 10);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (12, 30, 'Kraig Johnson', 2, 11);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (13, 23, 'Miss Melyssa Frami', 2, 12);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (14, 17, 'Edyth Thiel', 2, 13);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (15, 26, 'Ms. Bridgette Volkman PhD', 5, 14);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (16, 29, 'Aylin Hudson', 1, 15);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (17, 15, 'Yoshiko Rempel', 3, 16);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (18, 2, 'Rosa Jenkins', 4, 17);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (19, 12, 'Ms. Amanda Hodkiewicz DDS', 3, 18);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (20, 19, 'Joesph Ferry', 1, 19);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (21, 25, 'Sim Glover', 4, 20);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (22, 18, 'Miss Vivianne Wolf', 3, 21);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (23, 20, 'Afton Schroeder Sr.', 3, 22);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (24, 5, 'Ms. Margret Becker', 1, 23);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (25, 9, 'Maeve Bode III', 4, 24);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (26, 6, 'Delbert Kling DDS', 3, 25);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (27, 24, 'Coy D\'Amore Sr.', 3, 26);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (28, 28, 'Elna Gulgowski', 2, 27);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (29, 13, 'Zora Wehner', 3, 28);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (30, 10, 'Mr. Jarred Kassulke', 4, 29);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (31, 14, 'Miss Roberta Upton Sr.', 2, 30);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (32, 16, 'Creola DuBuque', 5, 31);
INSERT INTO `locatari` (`id`, `ap`, `nume`, `nr_pers`, `user_id`) VALUES (33, 3, 'Loma Stark', 1, 32);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `facturi`
--
ALTER TABLE `facturi`
  ADD PRIMARY KEY (`id_locatar`,`luna`,`an`);

--
-- Indexes for table `locatari`
--
ALTER TABLE `locatari`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locatari`
--
ALTER TABLE `locatari`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `facturi`
--
ALTER TABLE `facturi`
  ADD CONSTRAINT `facturi_locatari_fk` FOREIGN KEY (`id_locatar`) REFERENCES `locatari` (`id`);

--
-- Constraints for table `locatari`
--
ALTER TABLE `locatari`
  ADD CONSTRAINT `locatari_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (1, 2, '2018', '491');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (2, 4, '2018', '502');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (3, 2, '2018', '683');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (4, 3, '2018', '688');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (5, 4, '2018', '517');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (6, 4, '2018', '549');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (7, 2, '2018', '1046');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (8, 3, '2018', '641');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (9, 1, '2018', '1142');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (10, 4, '2018', '850');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (11, 2, '2018', '717');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (12, 1, '2018', '1082');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (13, 2, '2018', '792');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (14, 1, '2018', '927');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (15, 4, '2018', '375');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (16, 3, '2018', '1098');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (17, 1, '2018', '474');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (18, 2, '2018', '427');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (19, 2, '2018', '1137');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (20, 4, '2018', '752');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (21, 2, '2018', '441');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (22, 3, '2018', '340');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (23, 1, '2018', '1066');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (24, 3, '2018', '494');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (25, 4, '2018', '527');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (26, 1, '2018', '1123');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (27, 2, '2018', '725');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (28, 4, '2018', '1198');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (29, 4, '2018', '370');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (30, 2, '2018', '700');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (31, 4, '2018', '250');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (32, 4, '2018', '800');
INSERT INTO `facturi` (`id_locatar`, `luna`, `an`, `suma`) VALUES (33, 3, '2018', '600');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
