-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2025 at 03:33 PM
-- Wersja serwera: 9.1.0
-- Wersja PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edusmart`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `class_id` int NOT NULL,
  `lesson_id` int NOT NULL,
  `status` enum('Obecność','Nieobecność','Spóźnienie') NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `lesson_id` (`lesson_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `class_id`, `lesson_id`, `status`, `date`) VALUES
(15, 1, 1, 30, 'Obecność', '2025-01-03'),
(16, 8, 1, 30, 'Obecność', '2025-01-03'),
(17, 6, 1, 30, 'Obecność', '2025-01-03'),
(18, 7, 1, 30, 'Obecność', '2025-01-03'),
(23, 1, 1, 31, 'Obecność', '2025-01-03'),
(24, 6, 1, 31, 'Nieobecność', '2025-01-03'),
(25, 7, 1, 31, 'Obecność', '2025-01-03'),
(26, 8, 1, 31, 'Obecność', '2025-01-03'),
(27, 1, 1, 8, 'Obecność', '2025-01-06'),
(28, 8, 1, 8, 'Obecność', '2025-01-06'),
(29, 6, 1, 8, 'Obecność', '2025-01-06'),
(30, 7, 1, 8, 'Nieobecność', '2025-01-06'),
(31, 1, 1, 9, 'Nieobecność', '2025-01-06'),
(32, 8, 1, 9, 'Obecność', '2025-01-06'),
(33, 6, 1, 9, 'Spóźnienie', '2025-01-06'),
(34, 7, 1, 9, 'Obecność', '2025-01-06'),
(35, 1, 1, 10, 'Spóźnienie', '2025-01-06'),
(36, 8, 1, 10, 'Obecność', '2025-01-06'),
(37, 7, 1, 10, 'Obecność', '2025-01-06'),
(38, 6, 1, 10, 'Obecność', '2025-01-06'),
(39, 1, 1, 11, 'Obecność', '2025-01-06'),
(40, 8, 1, 11, 'Obecność', '2025-01-06'),
(41, 6, 1, 11, 'Obecność', '2025-01-06'),
(42, 7, 1, 11, 'Obecność', '2025-01-06'),
(43, 1, 1, 12, 'Obecność', '2025-01-06'),
(44, 8, 1, 12, 'Obecność', '2025-01-06'),
(45, 6, 1, 12, 'Obecność', '2025-01-06'),
(46, 7, 1, 12, 'Obecność', '2025-01-06'),
(47, 1, 1, 13, 'Obecność', '2025-01-07'),
(48, 8, 1, 13, 'Obecność', '2025-01-07'),
(49, 6, 1, 13, 'Obecność', '2025-01-07'),
(50, 7, 1, 13, 'Obecność', '2025-01-07'),
(51, 1, 1, 14, 'Obecność', '2025-01-07'),
(52, 8, 1, 14, 'Obecność', '2025-01-07'),
(53, 6, 1, 14, 'Obecność', '2025-01-07'),
(54, 7, 1, 14, 'Obecność', '2025-01-07'),
(55, 1, 1, 15, 'Obecność', '2025-01-07'),
(56, 8, 1, 15, 'Obecność', '2025-01-07'),
(57, 6, 1, 15, 'Obecność', '2025-01-07'),
(58, 7, 1, 15, 'Obecność', '2025-01-07'),
(59, 1, 1, 16, 'Obecność', '2025-01-07'),
(60, 8, 1, 16, 'Obecność', '2025-01-07'),
(61, 6, 1, 16, 'Obecność', '2025-01-07'),
(62, 7, 1, 16, 'Obecność', '2025-01-07'),
(63, 1, 1, 17, 'Obecność', '2025-01-08'),
(64, 8, 1, 17, 'Obecność', '2025-01-08'),
(65, 6, 1, 17, 'Obecność', '2025-01-08'),
(66, 7, 1, 17, 'Obecność', '2025-01-08'),
(67, 1, 1, 18, 'Obecność', '2025-01-08'),
(68, 8, 1, 18, 'Obecność', '2025-01-08'),
(69, 6, 1, 18, 'Obecność', '2025-01-08'),
(70, 7, 1, 18, 'Obecność', '2025-01-08'),
(71, 1, 1, 19, 'Obecność', '2025-01-08'),
(72, 8, 1, 19, 'Obecność', '2025-01-08'),
(73, 6, 1, 19, 'Obecność', '2025-01-08'),
(74, 7, 1, 19, 'Obecność', '2025-01-08'),
(75, 8, 1, 23, 'Obecność', '2025-01-08'),
(76, 1, 1, 23, 'Obecność', '2025-01-08'),
(77, 6, 1, 23, 'Obecność', '2025-01-08'),
(78, 7, 1, 23, 'Obecność', '2025-01-08'),
(79, 1, 1, 22, 'Obecność', '2025-01-08'),
(80, 8, 1, 22, 'Obecność', '2025-01-08'),
(81, 6, 1, 22, 'Obecność', '2025-01-08'),
(82, 7, 1, 22, 'Obecność', '2025-01-08'),
(83, 1, 1, 21, 'Obecność', '2025-01-08'),
(84, 8, 1, 21, 'Obecność', '2025-01-08'),
(85, 6, 1, 21, 'Obecność', '2025-01-08'),
(86, 7, 1, 21, 'Obecność', '2025-01-08'),
(87, 1, 1, 20, 'Obecność', '2025-01-08'),
(88, 8, 1, 20, 'Obecność', '2025-01-08'),
(89, 6, 1, 20, 'Obecność', '2025-01-08'),
(90, 7, 1, 20, 'Obecność', '2025-01-08'),
(91, 5, 2, 57, 'Obecność', '2025-01-24'),
(92, 5, 2, 58, 'Obecność', '2025-01-24'),
(93, 5, 2, 59, 'Obecność', '2025-01-24'),
(94, 5, 2, 60, 'Nieobecność', '2025-01-24'),
(95, 1, 1, 30, 'Obecność', '2025-01-24'),
(96, 8, 1, 30, 'Obecność', '2025-01-24'),
(97, 6, 1, 30, 'Obecność', '2025-01-24'),
(98, 7, 1, 30, 'Obecność', '2025-01-24'),
(99, 1, 1, 29, 'Obecność', '2025-02-06'),
(100, 8, 1, 29, 'Obecność', '2025-02-06'),
(101, 6, 1, 29, 'Obecność', '2025-02-06'),
(102, 7, 1, 29, 'Nieobecność', '2025-02-06'),
(103, 12, 16, 95, 'Obecność', '2025-02-07'),
(104, 9, 16, 95, 'Obecność', '2025-02-07'),
(105, 11, 16, 95, 'Obecność', '2025-02-07'),
(106, 10, 16, 95, 'Obecność', '2025-02-07'),
(107, 1, 1, 27, 'Obecność', '2025-02-20'),
(108, 8, 1, 27, 'Obecność', '2025-02-20'),
(109, 6, 1, 27, 'Spóźnienie', '2025-02-20'),
(110, 7, 1, 27, 'Nieobecność', '2025-02-20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `form_teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `form_teacher_id` (`form_teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `form_teacher_id`) VALUES
(1, '4A', 1),
(2, '5B', 2),
(16, '8F', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classes_subjects_teachers`
--

DROP TABLE IF EXISTS `classes_subjects_teachers`;
CREATE TABLE IF NOT EXISTS `classes_subjects_teachers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes_subjects_teachers`
--

INSERT INTO `classes_subjects_teachers` (`id`, `class_id`, `subject_id`, `teacher_id`) VALUES
(1, 1, 7, 6),
(4, 2, 7, 6),
(5, 1, 9, 8),
(6, 1, 8, 7),
(7, 1, 10, 9),
(8, 1, 11, 10),
(9, 1, 12, 11),
(10, 1, 13, 12),
(11, 1, 14, 13),
(12, 1, 15, 14),
(13, 1, 16, 15),
(14, 1, 18, 17),
(15, 1, 19, 18),
(16, 1, 20, 19),
(17, 2, 9, 8),
(18, 2, 8, 7),
(19, 2, 10, 9),
(20, 2, 11, 10),
(21, 2, 12, 11),
(22, 2, 13, 12),
(23, 2, 14, 13),
(25, 2, 16, 15),
(26, 2, 18, 17),
(27, 2, 19, 18),
(28, 2, 20, 19),
(50, 16, 2, 1),
(51, 16, 3, 2),
(52, 16, 4, 3),
(53, 16, 20, 19),
(54, 16, 5, 4),
(55, 16, 6, 5),
(56, 16, 7, 6),
(57, 16, 8, 7),
(58, 16, 9, 8),
(59, 16, 10, 9),
(60, 16, 11, 10),
(61, 16, 12, 11),
(62, 16, 17, 16),
(63, 16, 18, 17),
(64, 16, 19, 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `expected_final_marks`
--

DROP TABLE IF EXISTS `expected_final_marks`;
CREATE TABLE IF NOT EXISTS `expected_final_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` int NOT NULL,
  `semester` int NOT NULL,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `final_marks`
--

DROP TABLE IF EXISTS `final_marks`;
CREATE TABLE IF NOT EXISTS `final_marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` int NOT NULL,
  `semester` int NOT NULL,
  `student_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `student_id` (`student_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `marks`
--

DROP TABLE IF EXISTS `marks`;
CREATE TABLE IF NOT EXISTS `marks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mark` float NOT NULL,
  `date` date NOT NULL,
  `semester` int NOT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `weight` int NOT NULL,
  `subject_id` int NOT NULL,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `class_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `student_id` (`student_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`id`, `mark`, `date`, `semester`, `type`, `description`, `weight`, `subject_id`, `student_id`, `teacher_id`, `class_id`) VALUES
(1, 2, '2024-09-10', 2, 'Kartkówka', 'kartkówka - funkcja kwadratowa', 2, 12, 1, 3, 1),
(5, 5, '2024-09-18', 1, 'Praca domowa', 'praca domowa - zadania z matematyki', 1, 12, 1, 8, 1),
(7, 4, '2024-09-22', 1, 'Odpowiedź ustna', 'odpowiedź ustna - Język polski', 1, 11, 1, 9, 1),
(8, 5, '2024-09-25', 1, 'Sprawdzian', 'sprawdzian - równania kwadratowe', 4, 12, 1, 7, 1),
(9, 2.75, '2025-01-01', 1, 'Praca domowa', 'Pracka dowmowka 34', 2, 7, 1, 6, 1),
(10, 5, '2024-10-01', 1, 'Kartkówka', 'kartkówka - technika', 2, 16, 1, 10, 1),
(11, 4, '2024-10-05', 1, 'Kartkówka', 'kartkówka - plastyka', 2, 14, 1, 3, 1),
(13, 3, '2024-10-10', 1, 'Kartkówka', 'kartkówka - przyroda', 2, 15, 1, 5, 1),
(14, 4, '2024-10-12', 1, 'Kartkówka', 'kartkówka - matematyka', 2, 12, 1, 4, 1),
(18, 5, '2024-10-22', 1, 'Sprawdzian', 'sprawdzian - wychowanie fizyczne', 4, 18, 1, 7, 1),
(19, 2, '2024-10-25', 1, 'Odpowiedź ustna', 'odpowiedź ustna - matematyka', 1, 12, 1, 3, 1),
(21, 3, '2024-10-31', 1, 'Sprawdzian', 'sprawdzian - język niemiecki', 4, 10, 1, 2, 1),
(22, 1, '2024-11-03', 1, 'Kartkówka', 'kartkówka - technika', 2, 16, 1, 11, 1),
(25, 2, '2024-11-11', 1, 'Sprawdzian', 'sprawdzian - muzyka', 4, 13, 1, 9, 1),
(26, 5, '2024-11-14', 1, 'Kartkówka', 'kartkówka - język polski', 2, 11, 1, 5, 1),
(29, 4, '2024-11-23', 1, 'Sprawdzian', 'sprawdzian - plastyka', 4, 14, 1, 5, 1),
(30, 1, '2024-11-26', 1, 'Kartkówka', 'kartkówka - matematyka', 2, 12, 1, 7, 1),
(32, 4, '2024-12-02', 1, 'Kartkówka', 'kartkówka - matematyka', 2, 12, 1, 4, 1),
(33, 5, '2024-12-05', 1, 'Sprawdzian', 'sprawdzian - język polski', 4, 11, 1, 8, 1),
(34, 3, '2024-12-07', 1, 'Praca domowa', 'praca domowa - przyroda', 1, 15, 1, 9, 1),
(37, 4, '2024-12-15', 1, 'Kartkówka', 'kartkówka - technika', 2, 16, 1, 5, 1),
(39, 3, '2024-12-20', 1, 'Praca domowa', 'praca domowa - plastyka', 1, 14, 1, 8, 1),
(40, 2, '2024-12-22', 1, 'Kartkówka', 'kartkówka - wychowanie fizyczne', 2, 18, 1, 11, 1),
(41, 1, '2024-12-25', 1, 'Kartkówka', 'kartkówka - matematyka', 2, 12, 1, 5, 1),
(42, 4, '2024-12-28', 1, 'Sprawdzian', 'sprawdzian - muzyka', 4, 13, 1, 9, 1),
(51, 4, '2024-09-17', 1, 'Kartkówka', 'kartkówka - II wojna światowa', 2, 7, 1, 6, 1),
(52, 5, '2024-09-23', 1, 'Sprawdzian', 'spr. -j. niem.', 4, 10, 1, 9, 1),
(53, 4, '2024-09-10', 1, 'Praca na lekcji', 'aktywność', 1, 9, 1, 8, 1),
(54, 5, '2024-09-24', 1, 'Kartkówka', 'kart. 1', 2, 8, 1, 7, 1),
(55, 6, '2024-09-30', 1, 'Praca na lekcji', 'Praca na lekcji', 1, 19, 1, 18, 1),
(56, 5, '2024-09-10', 1, 'Praca na lekcji', 'aktywność', 1, 9, 1, 8, 1),
(57, 4, '2024-09-24', 1, 'Kartkówka', 'kart. 1', 2, 8, 1, 7, 1),
(58, 6, '2024-09-30', 1, 'Praca na lekcji', 'Praca na lekcji', 1, 19, 1, 18, 1),
(59, 4, '2024-09-10', 1, 'Praca na lekcji', 'aktywność', 1, 9, 1, 8, 1),
(60, 5, '2024-09-24', 1, 'Kartkówka', 'kart. 1', 2, 8, 1, 7, 1),
(61, 6, '2024-09-30', 1, 'Praca na lekcji', 'Praca na lekcji', 1, 19, 1, 18, 1),
(63, 2, '2024-09-16', 1, 'Kartkówka', 'kartkówka - historia średniowiecza', 2, 7, 6, 6, 1),
(64, 6, '2024-09-30', 1, 'Praca na lekcji', 'Praca na lekcji', 1, 19, 6, 18, 1),
(65, 5, '2024-09-24', 1, 'Kartkówka', 'kart. 1', 2, 8, 6, 7, 1),
(66, 4, '2024-09-10', 1, 'Praca na lekcji', 'aktywność', 1, 9, 6, 8, 1),
(67, 6, '2024-09-30', 1, 'Praca na lekcji', 'Praca na lekcji', 1, 19, 6, 18, 1),
(68, 4, '2024-09-24', 1, 'Kartkówka', 'kart. 1', 2, 8, 6, 7, 1),
(69, 2, '2025-01-01', 1, 'Sprawdzian', 'hgfghfgh', 2, 7, 1, 6, 1),
(70, 3.25, '2025-01-01', 1, 'Odpowiedź ustna', 'hgfghfgh', 4, 7, 1, 6, 1),
(87, 1.75, '2025-01-02', 1, 'Praca domowa', 'PD', 1, 7, 6, 6, 1),
(88, 1.25, '2025-01-02', 1, 'Kartkówka', 'rerferfrewrrwer', 6, 7, 8, 6, 1),
(89, 2.25, '2024-09-18', 1, 'Kartkówka', 'sadasadsad', 1, 7, 5, 6, 2),
(91, 6, '2025-01-03', 1, 'Praca domowa', 'fuytjjy', 2, 7, 8, 6, 1),
(92, 1.75, '2025-01-03', 1, 'Praca domowa', 'fuytjjy', 2, 7, 8, 6, 1),
(93, 5.25, '2025-01-03', 1, 'Sprawdzian', 'hjkhbgv', 2, 7, 8, 6, 1),
(96, 1.75, '2025-01-05', 1, 'Praca domowa', 'klkl', 2, 7, 7, 6, 1),
(97, 4.25, '2025-01-25', 1, 'Sprawdzian', 'Spr pk2', 6, 7, 1, 6, 1),
(98, 4.75, '2025-01-26', 2, 'Odpowiedź ustna', 'dsfdg', 2, 7, 1, 6, 1),
(99, 3.75, '2025-01-26', 2, 'Praca domowa', 'qwwewe', 1, 7, 5, 6, 2),
(100, 4, '2025-01-26', 1, 'Praca domowa', '122121', 3, 7, 1, 6, 1),
(102, 2.25, '2025-02-23', 1, 'Sprawdzian', 'Sprawdzian dział III', 3, 7, 1, 6, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `subject` varchar(50) NOT NULL,
  `weekday` enum('1','2','3','4','5') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hour` int NOT NULL,
  `classroom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `class_id`, `teacher_id`, `subject`, `weekday`, `hour`, `classroom`) VALUES
(8, 1, 14, 'Przyroda', '1', 4, '208'),
(9, 1, 8, 'Język angielski', '1', 5, '126'),
(10, 1, 11, 'Matematyka', '1', 6, '209'),
(11, 1, 10, 'Język polski', '1', 7, '204'),
(12, 1, 17, 'WF', '1', 8, '1'),
(13, 1, 13, 'Plastyka', '2', 2, '228'),
(14, 1, 10, 'Język polski', '2', 3, '204'),
(15, 1, 14, 'Przyroda', '2', 4, '214'),
(16, 1, 11, 'Matematyka', '2', 5, '214'),
(17, 1, 11, 'Matematyka', '3', 1, '228'),
(18, 1, 17, 'WF', '3', 2, '1'),
(19, 1, 8, 'Język angielski', '3', 3, '113'),
(20, 1, 10, 'Język polski', '3', 4, '107'),
(21, 1, 10, 'Język polski', '3', 5, '107'),
(22, 1, 6, 'Historia', '3', 6, '211'),
(23, 1, 12, 'Muzyka', '3', 7, '104'),
(24, 1, 18, 'Religia', '4', 1, '228'),
(25, 1, 11, 'Matematyka', '4', 2, '209'),
(26, 1, 11, 'Matematyka', '4', 3, '209'),
(27, 1, 6, 'Historia', '4', 4, '211'),
(28, 1, 7, 'Informatyka', '4', 5, '215'),
(29, 1, 17, 'WF', '4', 6, '1'),
(30, 1, 10, 'Język polski', '5', 1, '216'),
(31, 1, 8, 'Język angielski', '5', 2, '107'),
(32, 1, 17, 'WF', '5', 3, '1'),
(33, 1, 15, 'Technika', '5', 4, '203'),
(34, 2, 15, 'Technika', '1', 1, '201'),
(35, 2, 17, 'WF', '1', 2, '1'),
(36, 2, 8, 'Język angielski', '1', 3, '200'),
(37, 2, 11, 'Matematyka', '1', 4, '126'),
(38, 2, 18, 'Religia', '2', 3, '228'),
(39, 2, 17, 'WF', '2', 4, '1'),
(40, 2, 13, 'Plastyka', '2', 5, '203'),
(41, 2, 7, 'Informatyka', '2', 6, '125'),
(42, 2, 10, 'Język polski', '2', 7, '107'),
(43, 2, 12, 'Muzyka', '2', 8, '104'),
(44, 2, 8, 'Język angielski', '3', 1, '200'),
(45, 2, 5, 'Geografia', '3', 2, '204'),
(46, 2, 6, 'Historia', '3', 3, '210'),
(47, 2, 10, 'Język polski', '3', 4, '207'),
(48, 2, 11, 'Matematyka', '3', 5, '12'),
(49, 2, 11, 'Matematyka', '3', 6, '12'),
(50, 2, 19, 'Etyka', '3', 7, '201'),
(51, 2, 6, 'Historia', '4', 1, '204'),
(53, 2, 8, 'Język angielski', '4', 3, '113'),
(54, 2, 10, 'Język polski', '4', 4, '207'),
(55, 2, 10, 'Język polski', '4', 5, '207'),
(56, 2, 17, 'WF', '4', 6, '1'),
(57, 2, 1, 'Biologia', '5', 1, '214'),
(58, 2, 11, 'Matematyka', '5', 2, '214'),
(59, 2, 10, 'Język polski', '5', 3, '201'),
(60, 2, 17, 'WF', '5', 4, '1'),
(61, 16, 16, 'WOS', '1', 1, '210'),
(62, 16, 16, 'WOS', '1', 2, '210'),
(63, 16, 2, 'Chemia', '1', 3, '220'),
(64, 16, 17, 'WF', '1', 4, '1'),
(65, 16, 8, 'Język angielski', '1', 5, '207'),
(66, 16, 11, 'Matematyka', '1', 6, '225'),
(67, 16, 11, 'Matematyka', '1', 7, '225'),
(68, 16, 7, 'Informatyka', '2', 1, '125'),
(69, 16, 5, 'Geografia', '2', 2, '213'),
(70, 16, 8, 'Język angielski', '2', 3, '211'),
(71, 16, 17, 'WF', '2', 4, '1'),
(72, 16, 9, 'Język niemiecki', '2', 5, '104'),
(73, 16, 11, 'Matematyka', '2', 6, '200'),
(74, 16, 10, 'Język polski', '2', 7, '107'),
(75, 16, 4, 'Fizyka', '2', 8, '225'),
(76, 16, 2, 'Chemia', '3', 1, '220'),
(77, 16, 8, 'Język angielski', '3', 2, '211'),
(78, 16, 4, 'Fizyka', '3', 3, '211'),
(79, 16, 9, 'Język niemiecki', '3', 4, '13'),
(80, 16, 6, 'Historia', '3', 5, '211'),
(81, 16, 10, 'Język polski', '3', 6, '207'),
(82, 16, 10, 'Język polski', '3', 7, '207'),
(83, 16, 3, 'EDB', '3', 8, '204'),
(84, 16, 4, 'Fizyka', '4', 2, '225'),
(85, 16, 10, 'Język polski', '4', 3, '207'),
(86, 16, 17, 'WF', '4', 4, '1'),
(87, 16, 8, 'Język angielski', '4', 5, '201'),
(88, 16, 6, 'Historia', '4', 6, '201'),
(89, 16, 11, 'Matematyka', '4', 7, '209'),
(90, 16, 18, 'Religia', '4', 8, '228'),
(91, 16, 1, 'Biologia', '5', 1, '213'),
(92, 16, 17, 'WF', '5', 2, '1'),
(93, 16, 11, 'Matematyka', '5', 3, '208'),
(94, 16, 8, 'Język angielski', '5', 4, '220'),
(95, 16, 10, 'Język polski', '5', 5, '201');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `identifier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `address`, `identifier`) VALUES
(1, 'Szkoła Podstawowa nr. 96 im. Adama Mickiewicza', 'ul. Kwiatowa 46, Warszawa', 'fe665637-d901-46ae-bfb5-94dc871a496b');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined` date NOT NULL,
  `class_id` int NOT NULL,
  `user_id` int NOT NULL,
  `school_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `surname`, `email`, `gender`, `date_of_birth`, `date_joined`, `class_id`, `user_id`, `school_id`) VALUES
(1, 'Bożydar', NULL, 'Jaworski', 'BozydarJaworski@dayrep.com', 'Male', '2014-11-25', '2024-09-01', 1, 1, 1),
(5, 'Anna', 'Magdalena', 'Kaczmarek', 'AnnaKaczmarek@jourrapide.com', 'Female', '2013-06-23', '2024-09-01', 2, 2, 1),
(6, 'Jan', 'Janusz', 'Kowalski', 'JanuszKowalski@gmail.com', 'Male', '2014-12-05', '2024-09-01', 1, 5, 1),
(7, 'Radzimierz', NULL, 'Nowakowski', 'RadzimierzNowakowski@dayrep.com', 'Male', '2014-11-06', '2024-09-01', 1, 6, 1),
(8, 'Waleria', NULL, 'Jurkowska', 'WaleriaJurkowska@armyspy.com', 'Male', '2014-11-28', '2024-10-01', 1, 7, 1),
(9, 'Juliusz', 'Jan', 'Dudek', 'JuliuszDudek@dayrep.com', 'Male', '2010-10-01', '2024-09-01', 16, 26, 1),
(10, 'Ziemowit', NULL, 'Sokołowski', 'ZiemowitSokołowski@armyspy.com', 'Male', '2010-04-29', '2024-09-01', 16, 27, 1),
(11, 'Agnieszka', 'Maria', 'Jaworska', 'AgnieszkaJaworska@armyspy.com', 'Female', '2010-01-05', '2024-09-01', 16, 28, 1),
(12, 'Jadwiga', NULL, 'Adamska', 'JadwikaAdamska@teleworm.us', 'Female', '2010-07-20', '2024-09-01', 16, 29, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `student_messages`
--

DROP TABLE IF EXISTS `student_messages`;
CREATE TABLE IF NOT EXISTS `student_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `date` date NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_messages`
--

INSERT INTO `student_messages` (`id`, `student_id`, `teacher_id`, `date`, `subject`, `content`) VALUES
(6, 5, 6, '2025-01-26', 'Usprawiedliwienie', 'Dzień dobry,\nDzień dobry,\nDzień dobry,\nDzień dobry,Dzień dobry,Dzień dobry,'),
(8, 11, 6, '2025-02-10', 'Wiadomość', 'Dzień dobry,\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent auctor, justo nec venenatis dictum, nulla ligula placerat lacus, ut imperdiet lacus ante id sem.\n\nPozdrawiam'),
(9, 1, 9, '2025-02-23', 'Pytanie', 'Dzień dobry,\nCzy na sprawdzian obowiązuje również temat 9?\n\nZ poważaniem Bożydar Jaworski'),
(11, 1, 1, '2025-02-23', 'Wiadomość', 'Dzień dobry,\nczy jutro obowiązuje strój galowy?\n\nPozdrawiam Bożydar Jaworski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`) VALUES
(1, 'Zachowanie'),
(2, 'Biologia'),
(3, 'Chemia'),
(4, 'Edukacja dla bezpieczeństwa'),
(5, 'Fizyka'),
(6, 'Geografia'),
(7, 'Historia'),
(8, 'Informatyka'),
(9, 'Język angielski'),
(10, 'Język niemiecki'),
(11, 'Język polski'),
(12, 'Matematyka'),
(13, 'Muzyka'),
(14, 'Plastyka'),
(15, 'Przyroda'),
(16, 'Technika'),
(17, 'Wiedza o społeczeństwie'),
(18, 'Wychowanie fizyczne'),
(19, 'Religia'),
(20, 'Etyka');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined` date NOT NULL,
  `subject_id` int NOT NULL,
  `class_id` int NOT NULL,
  `user_id` int NOT NULL,
  `school_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `subject_id_2` (`subject_id`),
  KEY `class_id` (`class_id`),
  KEY `user_id` (`user_id`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `middle_name`, `surname`, `email`, `gender`, `date_of_birth`, `date_joined`, `subject_id`, `class_id`, `user_id`, `school_id`) VALUES
(1, 'Henryk', NULL, 'Szczepański', 'HenrykSzczepanski@jourrapide.com', 'Male', '1982-11-11', '2024-09-01', 2, 1, 3, 1),
(2, 'Władysława', 'Konstancja', 'Nowak', 'WladyslawaNowak@armyspy.com', 'Female', '1964-08-27', '2024-09-01', 3, 1, 10, 1),
(3, 'Matylda', NULL, 'Walczak', 'MatyldaWalczak@dayrep.com', 'Female', '1980-10-31', '2024-09-01', 4, 1, 11, 1),
(4, 'Kazimierz', NULL, 'Kowalski', 'KazimierzKowalski@teleworm.com', 'Male', '1970-05-15', '2024-09-01', 5, 1, 12, 1),
(5, 'Agnieszka', NULL, 'Sikora', 'AgnieszkaSikora@rhyta.com', 'Female', '1990-03-22', '2024-09-01', 6, 1, 13, 1),
(6, 'Zdzisław', NULL, 'Adamski', 'ZdzislawAdamski@gustr.com', 'Male', '1987-07-19', '2024-09-01', 7, 1, 4, 1),
(7, 'Elżbieta', 'Maria', 'Zawadzka', 'ElzbietaZawadzka@jourrapide.com', 'Female', '1983-04-02', '2024-09-01', 8, 1, 14, 1),
(8, 'Janusz', NULL, 'Kamiński', 'JanuszKaminski@dayrep.com', 'Male', '1975-09-08', '2024-09-01', 9, 1, 15, 1),
(9, 'Beata', NULL, 'Wojciechowska', 'BeataWojciechowska@jourrapide.com', 'Female', '1989-06-10', '2024-09-01', 10, 1, 16, 1),
(10, 'Stanisław', NULL, 'Wiśniewski', 'StanislawWisniewski@armyspy.com', 'Male', '1968-01-30', '2024-09-01', 11, 1, 17, 1),
(11, 'Ewa', 'Katarzyna', 'Domańska', 'EwaDomanska@jourrapide.com', 'Female', '1978-12-24', '2024-09-01', 12, 1, 8, 1),
(12, 'Michał', NULL, 'Grabowski', 'MichalGrabowski@gustr.com', 'Male', '1985-11-05', '2024-09-01', 13, 1, 18, 1),
(13, 'Joanna', NULL, 'Rutkowska', 'JoannaRutkowska@teleworm.com', 'Female', '1982-02-18', '2024-09-01', 14, 1, 19, 1),
(14, 'Zofia', NULL, 'Piotrowska', 'ZofiaPiotrowska@armyspy.com', 'Female', '1991-10-10', '2024-09-01', 15, 1, 20, 1),
(15, 'Roman', 'Karol', 'Borkowski', 'RomanBorkowski@dayrep.com', 'Male', '1986-05-20', '2024-09-01', 16, 1, 21, 1),
(16, 'Krzysztof', NULL, 'Zieliński', 'KrzysztofZielinski@teleworm.com', 'Male', '1979-03-03', '2024-09-01', 17, 1, 22, 1),
(17, 'Anna', 'Helena', 'Pawlak', 'AnnaPawlak@jourrapide.com', 'Female', '1984-07-13', '2024-09-01', 18, 1, 23, 1),
(18, 'Barbara', NULL, 'Kaczmarek', 'BarbaraKaczmarek@armyspy.com', 'Female', '1971-02-07', '2024-09-01', 19, 1, 24, 1),
(19, 'Tomasz', 'Marcin', 'Lewandowski', 'TomaszLewandowski@gustr.com', 'Male', '1988-06-21', '2024-09-01', 20, 1, 25, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `teacher_messages`
--

DROP TABLE IF EXISTS `teacher_messages`;
CREATE TABLE IF NOT EXISTS `teacher_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `class_id` int NOT NULL,
  `date` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_messages`
--

INSERT INTO `teacher_messages` (`id`, `teacher_id`, `class_id`, `date`, `subject`, `content`) VALUES
(9, 11, 2, '2025-01-26', 'Zmiana sali', 'Dzień dobry,\njutro w poniedziałek (27.01) następuje zmiana sali i mamy lekcje w 127.\n\nPozdrawiam Ewa Domańska'),
(14, 6, 1, '2025-02-23', 'Wycieczka', 'Dzień dobry,\nw piątek 28.02.2025 idziemy na wycieczkę do muzeum.\n\nPozdrawiam Zdzisław Adamski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `tests_homeworks`
--

DROP TABLE IF EXISTS `tests_homeworks`;
CREATE TABLE IF NOT EXISTS `tests_homeworks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `class_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  KEY `class_id` (`class_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tests_homeworks`
--

INSERT INTO `tests_homeworks` (`id`, `subject_id`, `category`, `description`, `date`, `class_id`, `teacher_id`) VALUES
(1, 9, 'Kartkówka', 'kartkówka 3 ostatnie tematy', '2025-01-08', 1, 17),
(5, 11, 'Praca domowa', 'ćwiczenia strona 36', '2025-01-03', 1, 12),
(6, 10, 'Praca domowa', 'zadanie 6, 7 str 45 podręcznik', '2024-12-27', 1, 14),
(7, 9, 'Kartkówka', 'kartkówka 3 ostatnie tematy', '2025-01-08', 1, 17),
(8, 16, 'Sprawdzian', 'sprawdzian dział IV', '2025-01-30', 1, 15),
(9, 12, 'Kartkówka', 'kartkówka z matematyki', '2024-12-27', 1, 19),
(10, 9, 'Kartkówka', 'kartkówka 3 ostatnie tematy', '2025-01-08', 1, 17),
(11, 9, 'Kartkówka', 'kartkówka 3 ostatnie tematy', '2025-01-08', 1, 17),
(12, 16, 'Sprawdzian', 'sprawdzian dział IV', '2025-01-30', 1, 15),
(18, 7, 'Kartkówka', 'Kartkówka historia', '2025-01-14', 1, 6),
(19, 7, 'Sprawdzian', 'pk2', '2025-01-16', 1, 6),
(20, 7, 'Praca domowa', 'Strony 36-37 zeszyt ćwiczeń', '2025-01-17', 1, 6),
(24, 7, 'Sprawdzian', 'fdsfssdsfd', '2025-02-05', 1, 6),
(25, 7, 'Praca domowa', 'str 36 podr', '2025-01-30', 1, 6),
(26, 7, 'Praca domowa', 'str 43 cwiczenia', '2025-01-30', 2, 6),
(27, 7, 'Praca domowa', 'rtytydty', '2025-02-18', 1, 6),
(29, 7, 'Sprawdzian', 'cxcvccv', '2025-02-11', 1, 6),
(33, 7, 'Kartkówka', 'Ostatnie trzy tematy (25, 26, 27)', '2025-03-05', 1, 6),
(34, 7, 'Praca domowa', 'Ćwiczenia str. 34 zad. 5, 6', '2025-03-06', 1, 6),
(35, 7, 'Sprawdzian', 'Sprawdzian dział IV', '2025-04-24', 1, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('teacher','student','parent') NOT NULL,
  `school_id` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `school_id` (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `school_id`) VALUES
(1, 'BozydarJaworski@dayrep.com', '123', 'student', 1),
(2, 'AnnaKaczmarek@jourrapide.com', '123', 'student', 1),
(3, 'HenrykSzczepanski@jourrapide.com', '123', 'teacher', 1),
(4, 'ZdzislawAdamski@gustr.com', '123', 'teacher', 1),
(5, 'JanuszKowalski@gmail.com', '123', 'student', 1),
(6, 'RadzimierzNowakowski@dayrep.com', '123', 'student', 1),
(7, 'WaleriaJurkowska@armyspy.com', '123', 'student', 1),
(8, 'EwaDomanska@jourrapide.com', '123', 'teacher', 1),
(10, 'WladyslawaNowak@armyspy.com', '123', 'teacher', 1),
(11, 'MatyldaWalczak@dayrep.com', '123', 'teacher', 1),
(12, 'KazimierzKowalski@teleworm.com', '123', 'teacher', 1),
(13, 'AgnieszkaSikora@rhyta.com', '123', 'teacher', 1),
(14, 'ElzbietaZawadzka@jourrapide.com', '123', 'teacher', 1),
(15, 'JanuszKaminski@dayrep.com', '123', 'teacher', 1),
(16, 'BeataWojciechowska@jourrapide.com', '123', 'teacher', 1),
(17, 'StanislawWisniewski@armyspy.com', '123', 'teacher', 1),
(18, 'MichalGrabowski@gustr.com', '123', 'teacher', 1),
(19, 'JoannaRutkowska@teleworm.com', '123', 'teacher', 1),
(20, 'ZofiaPiotrowska@armyspy.com', '123', 'teacher', 1),
(21, 'RomanBorkowski@dayrep.com', '123', 'teacher', 1),
(22, 'KrzysztofZielinski@teleworm.com', '123', 'teacher', 1),
(23, 'AnnaPawlak@jourrapide.com', '123', 'teacher', 1),
(24, 'BarbaraKaczmarek@armyspy.com', '123', 'teacher', 1),
(25, 'TomaszLewandowski@gustr.com', '123', 'teacher', 1),
(26, 'JuliuszDudek@dayrep.com', '123', 'student', 1),
(27, 'ZiemowitSokolowski@armyspy.com', '123', 'student', 1),
(28, 'AgnieszkaJaworska@armyspy.com', '123', 'student', 1),
(29, 'JadwigaAdamska@teleworm.us', '123', 'student', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `warnings`
--

DROP TABLE IF EXISTS `warnings`;
CREATE TABLE IF NOT EXISTS `warnings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `points` int NOT NULL,
  `date` date NOT NULL,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `warnings`
--

INSERT INTO `warnings` (`id`, `category`, `description`, `points`, `date`, `student_id`, `teacher_id`) VALUES
(2, 'Zachowanie', 'Uczeń przyniósł dary dla powodzian', 30, '2024-12-10', 1, 8),
(9, 'Zachowanie', 'Ciągła rozmowa na lekcji', -15, '2025-01-10', 1, 6),
(13, 'Zachowanie', 'Uczeń gra na telefonie podczas lekcji.', -15, '2025-01-11', 7, 6),
(14, 'Zachowanie', 'Pomoc przy makulaturze', 15, '2025-01-26', 5, 6);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `schedule` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `classes_subjects_teachers`
--
ALTER TABLE `classes_subjects_teachers`
  ADD CONSTRAINT `classes_subjects_teachers_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `classes_subjects_teachers_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `classes_subjects_teachers_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `expected_final_marks`
--
ALTER TABLE `expected_final_marks`
  ADD CONSTRAINT `expected_final_marks_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `expected_final_marks_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `expected_final_marks_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `final_marks`
--
ALTER TABLE `final_marks`
  ADD CONSTRAINT `final_marks_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `final_marks_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `final_marks_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `marks_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `marks_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `student_messages`
--
ALTER TABLE `student_messages`
  ADD CONSTRAINT `student_messages_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_messages_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `teacher_messages`
--
ALTER TABLE `teacher_messages`
  ADD CONSTRAINT `teacher_messages_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`),
  ADD CONSTRAINT `teacher_messages_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`);

--
-- Constraints for table `tests_homeworks`
--
ALTER TABLE `tests_homeworks`
  ADD CONSTRAINT `tests_homeworks_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`),
  ADD CONSTRAINT `tests_homeworks_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `tests_homeworks_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `warnings`
--
ALTER TABLE `warnings`
  ADD CONSTRAINT `warnings_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `warnings_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
