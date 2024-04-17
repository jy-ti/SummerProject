-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 05:10 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', 'jyoti');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(30) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `employee_no` int(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `attendance_date` date NOT NULL DEFAULT current_timestamp(),
  `attendance_time` time NOT NULL,
  `attendance_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `employee_id`, `employee_no`, `fullname`, `attendance_date`, `attendance_time`, `attendance_status`) VALUES
(25, 5, 2033, 'khushi', '2023-05-25', '00:00:00', 'Present'),
(26, 3, 2030, 'saanvika', '2023-05-25', '00:00:00', 'Present'),
(27, 4, 2032, 'rubina', '2023-05-25', '00:00:00', 'Present'),
(28, 6, 2034, 'sita', '2023-05-25', '00:00:00', 'Present'),
(29, 2, 2029, 'neha', '2023-05-25', '00:00:00', 'Present'),
(32, 4, 2032, 'rubina', '2023-05-26', '00:00:00', 'Present'),
(33, 5, 2033, 'khushi', '2023-05-26', '00:00:00', 'Present'),
(34, 3, 2030, 'saanvika', '2023-05-26', '00:00:00', 'Present'),
(35, 3, 2030, 'saanvika', '2023-06-10', '00:00:00', 'Present'),
(36, 3, 2030, 'saanvika', '2023-06-12', '13:34:04', 'Present'),
(37, 5, 2033, 'khushi', '2023-06-12', '14:09:01', 'Present'),
(38, 4, 2032, 'rubina', '2023-06-12', '14:11:24', 'Present'),
(39, 6, 2034, 'sita', '2023-06-12', '14:14:38', 'Present'),
(40, 3, 2030, 'saanvika', '2023-06-20', '07:07:55', 'Present'),
(41, 3, 2030, 'saanvika', '2023-06-24', '06:37:32', 'Present'),
(42, 1, 2028, 'anu dhanuk', '2023-07-07', '00:00:00', 'Present'),
(43, 2, 2029, 'neha', '2023-07-07', '09:01:00', 'Present'),
(44, 3, 2030, 'saanvika', '2023-07-07', '12:46:57', 'present'),
(45, 7, 2011, 'anuska', '2023-07-07', '12:48:45', 'present'),
(46, 5, 2033, 'khushi', '2023-07-07', '12:50:50', 'Present'),
(47, 6, 2034, 'sita', '2023-07-07', '12:56:05', 'Present'),
(48, 4, 2032, 'rubina', '2023-07-07', '12:59:16', 'Present'),
(49, 3, 2030, 'saanvika', '2023-07-08', '15:45:36', 'Present'),
(52, 1, 2028, 'anu dhanuk', '2023-07-08', '15:56:13', 'Present'),
(53, 2, 2029, 'neha', '2023-07-08', '15:58:52', 'Holiday'),
(54, 7, 2011, 'anuska', '2023-07-08', '17:47:05', 'Holiday'),
(55, 3, 2030, 'saanvika', '2023-07-09', '08:42:42', 'Present'),
(56, 2, 2029, 'neha', '2023-07-09', '09:02:55', 'Present'),
(57, 3, 2030, 'saanvika', '2023-07-25', '11:22:48', 'Holiday'),
(58, 3, 2030, 'saanvika', '2023-10-08', '20:09:09', 'Holiday'),
(59, 7, 2011, 'anuska', '2023-10-08', '20:24:15', 'Holiday'),
(60, 3, 2030, 'saanvika', '2023-10-09', '06:43:44', 'Holiday'),
(61, 3, 2030, 'saanvika', '2023-10-30', '20:06:38', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(30) NOT NULL,
  `employee_no` int(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_no`, `fullname`, `department`, `username`, `password`, `email`) VALUES
(1, 2028, 'anu dhanuk', 'IT', 'anita', 'anita', 'anita@gmail.com'),
(2, 2029, 'neha', 'IT', 'neha', 'neha', 'neha@gmail.com'),
(3, 2030, 'saanvika', 'Project', 'saanvika', 'saanvika', 'saanvika@gmail.com'),
(4, 2032, 'rubina', 'Account', 'rubina', 'rubina', 'rubina@gmail.com'),
(5, 2033, 'khushi', 'Account', 'khushi', 'khushi', 'khushi@gmail.com'),
(6, 2034, 'sita', 'Management', 'sita', 'sita', 'sita@gmail.com'),
(7, 2011, 'anuskaa', 'projecte', 'anuska', 'anuska', 'anuska@gmail.com'),
(9, 2222, 'jyoti', 'Management', 'jyoti', 'jyoti', 'jyotibim19@oic.edu.np');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `holiday_id` int(11) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`holiday_id`, `holiday_date`, `holiday_name`, `description`) VALUES
(3, '2023-01-01', 'New Year\'s Day', ''),
(4, '2023-01-01', 'New Year\'s Day', ''),
(5, '2023-01-01', 'New Year\'s Day', ''),
(6, '2023-01-01', 'New Year\'s Day', ''),
(7, '2023-01-01', 'New Year\'s Day', ''),
(8, '2023-01-02', 'New Year\'s Day (substitute)', ''),
(9, '2023-01-02', 'New Year\'s Day (substitute)', ''),
(10, '2023-01-02', 'New Year\'s Day (substitute)', ''),
(11, '2023-01-02', 'New Year\'s Day (substitute)', ''),
(12, '2023-01-03', 'Asarah B\'Tevet', ''),
(13, '2023-01-04', 'World Braille Day', ''),
(14, '2023-01-06', 'Epiphany', ''),
(15, '2023-01-07', 'Orthodox Christmas Day', ''),
(16, '2023-01-07', 'International Programmers\' Day', ''),
(17, '2023-01-07', 'Estelle Reel Day', ''),
(18, '2023-01-08', 'Battle of New Orleans', ''),
(19, '2023-01-13', 'Friday the 13th', ''),
(20, '2023-01-13', 'Stephen Foster Memorial Day', ''),
(21, '2023-01-14', 'Orthodox New Year', ''),
(22, '2023-01-15', 'World Religion Day', ''),
(23, '2023-01-16', 'Martin Luther King Jr. Day', ''),
(24, '2023-01-16', 'Martin Luther King Jr. Day', ''),
(25, '2023-01-16', 'Robert E. Lee\'s Birthday', ''),
(26, '2023-01-16', 'Robert E. Lee\'s Birthday', ''),
(27, '2023-01-16', 'Idaho Human Rights Day', ''),
(28, '2023-01-16', 'Civil Rights Day', ''),
(29, '2023-01-16', 'Civil Rights Day', ''),
(30, '2023-01-19', 'Robert E. Lee\'s Birthday', ''),
(31, '2023-01-19', 'State Holiday', ''),
(32, '2023-01-19', 'Confederate Heroes\' Day', ''),
(33, '2023-01-22', 'Lunar New Year', ''),
(34, '2023-01-24', 'International Day of Education', ''),
(35, '2023-01-26', 'International Customs Day', ''),
(36, '2023-01-27', 'International Day of Commemora', ''),
(37, '2023-01-29', 'World Leprosy Day', ''),
(38, '2023-01-29', 'Kansas Day', ''),
(39, '2023-02-01', 'National Freedom Day', ''),
(40, '2023-02-01', 'National Girls and Women in Sp', ''),
(41, '2023-02-01', 'First Day of Black History Mon', ''),
(42, '2023-02-02', 'World Wetlands Day', ''),
(43, '2023-02-02', 'Groundhog Day', ''),
(44, '2023-02-03', 'National Wear Red Day', ''),
(45, '2023-02-04', 'International Day of Human Fra', ''),
(46, '2023-02-04', 'World Cancer Day', ''),
(47, '2023-02-04', 'Rosa Parks Day', ''),
(48, '2023-02-04', 'Rosa Parks Day', ''),
(49, '2023-02-04', 'Rosa Parks Day', ''),
(50, '2023-02-06', 'Tu Bishvat/Tu B\'Shevat', ''),
(51, '2023-02-06', 'International Day of Zero Tole', ''),
(52, '2023-02-06', 'Ronald Reagan Day', ''),
(53, '2023-02-10', 'World Pulses Day', ''),
(54, '2023-02-11', 'International Day of Women and', ''),
(55, '2023-02-11', 'World Day of the Sick', ''),
(56, '2023-02-12', 'Lincoln\'s Birthday', ''),
(57, '2023-02-12', 'Lincoln\'s Birthday', ''),
(58, '2023-02-12', 'Georgia Day', ''),
(59, '2023-02-12', 'Super Bowl', ''),
(60, '2023-02-13', 'World Radio Day', ''),
(61, '2023-02-13', 'Lincoln\'s Birthday observed', ''),
(62, '2023-02-14', 'Valentine\'s Day', ''),
(63, '2023-02-14', 'Statehood Day', ''),
(64, '2023-02-15', 'Susan B. Anthony\'s Birthday', ''),
(65, '2023-02-15', 'Susan B. Anthony Day', ''),
(66, '2023-02-16', 'Elizabeth Peratrovich Day', ''),
(67, '2023-02-18', 'Maha Shivaratri', ''),
(68, '2023-02-18', 'Isra and Mi\'raj', ''),
(69, '2023-02-20', 'World Day of Social Justice', ''),
(70, '2023-02-20', 'Presidents\' Day', ''),
(71, '2023-02-20', 'Presidents\' Day', ''),
(72, '2023-02-20', 'Presidents\' Day', ''),
(73, '2023-02-20', 'Daisy Gatson Bates Day', ''),
(74, '2023-02-21', 'International Mother Language ', ''),
(75, '2023-02-21', 'Shrove Tuesday/Mardi Gras', ''),
(76, '2023-02-21', 'Shrove Tuesday/Mardi Gras', ''),
(77, '2023-02-21', 'Shrove Tuesday/Mardi Gras', ''),
(78, '2023-02-21', 'Shrove Tuesday/Mardi Gras', ''),
(79, '2023-02-21', 'Shrove Tuesday/Mardi Gras', ''),
(80, '2023-02-22', 'Ash Wednesday', ''),
(81, '2023-02-25', 'African-American Scientist and', ''),
(82, '2023-02-25', 'George Rogers Clark Day', ''),
(83, '2023-02-28', 'Linus Pauling Day', ''),
(84, '2023-03-01', 'Zero Discrimination Day', ''),
(85, '2023-03-01', 'Self-Injury Awareness Day', ''),
(86, '2023-03-01', 'St. David\'s Day', ''),
(87, '2023-03-01', 'First Day of Women\'s History M', ''),
(88, '2023-03-01', 'First Day of Irish American He', ''),
(89, '2023-03-02', 'Texas Independence Day', ''),
(90, '2023-03-02', 'Read Across America Day', ''),
(91, '2023-03-03', 'World Wildlife Day', ''),
(92, '2023-03-03', 'Employee Appreciation Day', ''),
(93, '2023-03-04', 'Casimir Pulaski Day', ''),
(94, '2023-03-06', 'Casimir Pulaski Day', ''),
(95, '2023-03-06', 'Casimir Pulaski Day', ''),
(96, '2023-03-07', 'Holi', ''),
(97, '2023-03-07', 'Purim', ''),
(98, '2023-03-07', 'Town Meeting Day', ''),
(99, '2023-03-08', 'International Women\'s Day', ''),
(100, '2023-03-09', 'World Kidney Day', ''),
(101, '2023-03-10', 'International Day of Women Jud', ''),
(102, '2023-03-12', 'Daylight Saving Time starts', ''),
(103, '2023-03-15', 'Long Covid Awareness Day', ''),
(104, '2023-03-17', 'St. Patrick\'s Day', ''),
(105, '2023-03-17', 'Evacuation Day', ''),
(106, '2023-03-20', 'French Language Day', ''),
(107, '2023-03-20', 'International Day of Happiness', ''),
(108, '2023-03-20', 'March Equinox', ''),
(109, '2023-03-21', 'International Day for the Elim', ''),
(110, '2023-03-21', 'World Poetry Day', ''),
(111, '2023-03-21', 'International Day of Nowruz', ''),
(112, '2023-03-21', 'World Down Syndrome Day', ''),
(113, '2023-03-21', 'International Day of Forests', ''),
(114, '2023-03-22', 'World Water Day', ''),
(115, '2023-03-23', 'Ramadan Starts', ''),
(116, '2023-03-23', 'World Meteorological Day', ''),
(117, '2023-03-24', 'World Tuberculosis Day', ''),
(118, '2023-03-24', 'International Day for the Righ', ''),
(119, '2023-03-25', 'International Day of Remembran', ''),
(120, '2023-03-25', 'International Day of Solidarit', ''),
(121, '2023-03-25', 'Earth Hour', ''),
(122, '2023-03-25', 'Maryland Day', ''),
(123, '2023-03-26', 'Prince Jonah Kuhio Kalanianaol', ''),
(124, '2023-03-27', 'Prince Jonah Kuhio Kalanianaol', ''),
(125, '2023-03-27', 'Seward\'s Day', ''),
(126, '2023-03-29', 'National Vietnam War Veterans ', ''),
(127, '2023-03-30', 'Wyoming Veterans Welcome Home ', ''),
(128, '2023-03-30', 'Doctors\' Day', ''),
(129, '2023-03-30', 'Vietnam Veterans Day', ''),
(130, '2023-03-30', 'Vietnam Veteran Recognition Da', ''),
(131, '2023-03-31', 'International Transgender Day ', ''),
(132, '2023-03-31', 'César Chávez Day', ''),
(133, '2023-03-31', 'César Chávez Day', ''),
(134, '2023-03-31', 'César Chávez Day', ''),
(135, '2023-03-31', 'César Chávez Day', ''),
(136, '2023-04-01', 'April Fool\'s Day', ''),
(137, '2023-04-02', 'Palm Sunday', ''),
(138, '2023-04-02', 'World Autism Awareness Day', ''),
(139, '2023-04-02', 'Pascua Florida Day', ''),
(140, '2023-04-03', 'Pascua Florida Day observed', ''),
(141, '2023-04-04', 'United Nations\' Mine Awareness', ''),
(142, '2023-04-05', 'Passover Eve', ''),
(143, '2023-04-05', 'International Day of Conscienc', ''),
(144, '2023-04-06', 'Maundy Thursday', ''),
(145, '2023-04-06', 'Passover (first day)', ''),
(146, '2023-04-06', 'International Day of Sport for', ''),
(147, '2023-04-06', 'National Tartan Day', ''),
(148, '2023-04-07', 'United Nations\' World Health D', ''),
(149, '2023-04-07', 'Day of Remembrance of the Vict', ''),
(150, '2023-04-07', 'Good Friday', ''),
(151, '2023-04-07', 'State Holiday', ''),
(152, '2023-04-08', 'Holy Saturday', ''),
(153, '2023-04-09', 'Easter Sunday', ''),
(154, '2023-04-10', 'Easter Monday', ''),
(155, '2023-04-12', 'International Day of Human Spa', ''),
(156, '2023-04-13', 'Last Day of Passover', ''),
(157, '2023-04-13', 'Thomas Jefferson\'s Birthday', ''),
(158, '2023-04-14', 'Orthodox Good Friday', ''),
(159, '2023-04-14', 'World Chagas Disease Day', ''),
(160, '2023-04-15', 'Orthodox Holy Saturday', ''),
(161, '2023-04-15', 'World Art Day', ''),
(162, '2023-04-15', 'Father Damien Day', ''),
(163, '2023-04-16', 'Orthodox Easter', ''),
(164, '2023-04-16', 'Emancipation Day', ''),
(165, '2023-04-17', 'Lailat al-Qadr', ''),
(166, '2023-04-17', 'Orthodox Easter Monday', ''),
(167, '2023-04-17', 'Emancipation Day observed', ''),
(168, '2023-04-17', 'Patriots\' Day', ''),
(169, '2023-04-17', 'Boston Marathon', ''),
(170, '2023-04-18', 'Yom HaShoah', ''),
(171, '2023-04-18', 'International Day for Monument', ''),
(172, '2023-04-18', 'Tax Day', ''),
(173, '2023-04-20', 'Chinese Language Day', ''),
(174, '2023-04-21', 'Eid al-Fitr', ''),
(175, '2023-04-21', 'World Creativity and Innovatio', ''),
(176, '2023-04-21', 'San Jacinto Day', ''),
(177, '2023-04-21', 'Arbor Day', ''),
(178, '2023-04-22', 'Earth Day', ''),
(179, '2023-04-22', 'Oklahoma Day', ''),
(180, '2023-04-23', 'World Book and Copyright Day', ''),
(181, '2023-04-23', 'English Language Day', ''),
(182, '2023-04-24', 'International Day of Multilate', ''),
(183, '2023-04-24', 'Arbor Day', ''),
(184, '2023-04-24', 'Confederate Memorial Day', ''),
(185, '2023-04-24', 'Confederate Memorial Day', ''),
(186, '2023-04-25', 'International Delegate\'s Day', ''),
(187, '2023-04-25', 'World Malaria Day', ''),
(188, '2023-04-25', 'National Library Workers\' Day', ''),
(189, '2023-04-26', 'Yom Ha\'atzmaut', ''),
(190, '2023-04-26', 'World Intellectual Property Da', ''),
(191, '2023-04-26', 'International Chernobyl Disast', ''),
(192, '2023-04-26', 'Confederate Memorial Day', ''),
(193, '2023-04-26', 'State Holiday', ''),
(194, '2023-04-26', 'Administrative Professionals D', ''),
(195, '2023-04-27', 'International Girls in ICT Day', ''),
(196, '2023-04-27', 'Take our Daughters and Sons to', ''),
(197, '2023-04-28', 'World Day for Safety and Healt', ''),
(198, '2023-04-28', 'Arbor Day', ''),
(199, '2023-04-28', 'Arbor Day', ''),
(200, '2023-04-30', 'International Jazz Day', ''),
(201, '2023-05-01', 'Law Day', ''),
(202, '2023-05-01', 'Loyalty Day', ''),
(203, '2023-05-01', 'Lei Day', ''),
(204, '2023-05-01', 'First Day of Military Apprecia', ''),
(205, '2023-05-01', 'First Day of Asian Pacific Ame', ''),
(206, '2023-05-01', 'First Day of Jewish American H', ''),
(207, '2023-05-02', 'World Tuna Day', ''),
(208, '2023-05-02', 'National Teacher Appreciation ', ''),
(209, '2023-05-03', 'World Press Freedom Day', ''),
(210, '2023-05-04', 'Kent State Shootings Remembran', ''),
(211, '2023-05-04', 'National Day of Prayer', ''),
(212, '2023-05-04', 'Rhode Island Independence Day', ''),
(213, '2023-05-04', 'West Virginia Day of Prayer', ''),
(214, '2023-05-05', 'Day of Vesak', ''),
(215, '2023-05-05', 'World Portuguese Language Day', ''),
(216, '2023-05-05', 'Cinco de Mayo', ''),
(217, '2023-05-05', 'Kentucky Oaks', ''),
(218, '2023-05-06', 'Kentucky Derby', ''),
(219, '2023-05-06', 'National Nurses Day', ''),
(220, '2023-05-06', 'National Explosive Ordnance Di', ''),
(221, '2023-05-07', 'International Family Equality ', ''),
(222, '2023-05-08', 'Time of Remembrance and Reconc', ''),
(223, '2023-05-08', 'World Ovarian Cancer Day', ''),
(224, '2023-05-08', 'World Red Cross and Red Cresce', ''),
(225, '2023-05-08', 'Truman Day', ''),
(226, '2023-05-08', 'Victory in Europe Day', ''),
(227, '2023-05-09', 'Lag BaOmer', ''),
(228, '2023-05-10', 'International Day of Argania', ''),
(229, '2023-05-10', 'Confederate Memorial Day', ''),
(230, '2023-05-10', 'Confederate Memorial Day', ''),
(231, '2023-05-12', 'International Nurses Day', ''),
(232, '2023-05-12', 'Native American Day', ''),
(233, '2023-05-12', 'Military Spouse Appreciation D', ''),
(234, '2023-05-12', 'Military Spouse Appreciation D', ''),
(235, '2023-05-13', 'World Migratory Bird Day', ''),
(236, '2023-05-14', 'Mother\'s Day', ''),
(237, '2023-05-14', 'Mother\'s Day', ''),
(238, '2023-05-15', 'International Day of Families', ''),
(239, '2023-05-15', 'Peace Officers Memorial Day', ''),
(240, '2023-05-16', 'International Day of Living To', ''),
(241, '2023-05-16', 'International Day of Light', ''),
(242, '2023-05-17', 'World Telecommunication and In', ''),
(243, '2023-05-18', 'Ascension Day', ''),
(244, '2023-05-19', 'National Defense Transportatio', ''),
(245, '2023-05-20', 'World Bee Day', ''),
(246, '2023-05-20', 'World Autoimmune / Autoinflamm', ''),
(247, '2023-05-20', 'Public Lands Day', ''),
(248, '2023-05-20', 'Armed Forces Day', ''),
(249, '2023-05-20', 'Preakness Stakes', ''),
(250, '2023-05-21', 'World Day for Cultural Diversi', ''),
(251, '2023-05-21', 'International Tea Day', ''),
(252, '2023-05-22', 'International Day for Biologic', ''),
(253, '2023-05-22', 'National Maritime Day', ''),
(254, '2023-05-22', 'Harvey Milk Day', ''),
(255, '2023-05-23', 'International Day to End Obste', ''),
(256, '2023-05-24', 'Emergency Medical Services for', ''),
(257, '2023-05-25', 'African Liberation Day', ''),
(258, '2023-05-25', 'National Missing Children\'s Da', ''),
(259, '2023-05-26', 'Shavuot', ''),
(260, '2023-05-28', 'Pentecost', ''),
(261, '2023-05-29', 'Whit Monday', ''),
(262, '2023-05-29', 'International Day of United Na', ''),
(263, '2023-05-29', 'Memorial Day', ''),
(264, '2023-05-29', 'Decoration Day', ''),
(265, '2023-05-29', 'Jefferson Davis\' Birthday', ''),
(266, '2023-05-31', 'World No Tobacco Day', ''),
(267, '2023-06-01', 'Global Day of Parents', ''),
(268, '2023-06-01', 'First Day of Pride Month', ''),
(269, '2023-06-01', 'First Day of Caribbean-America', ''),
(270, '2023-06-01', 'Statehood Day', ''),
(271, '2023-06-03', 'World Bicycle Day', ''),
(272, '2023-06-03', 'Jefferson Davis\' Birthday', ''),
(273, '2023-06-04', 'Trinity Sunday', ''),
(274, '2023-06-04', 'International Day of Innocent ', ''),
(275, '2023-06-04', 'Native American Day', ''),
(276, '2023-06-05', 'World Environment Day', ''),
(277, '2023-06-05', 'International Day for the Figh', ''),
(278, '2023-06-05', 'Jefferson Davis\' Birthday', ''),
(279, '2023-06-06', 'Day of the Russian Language', ''),
(280, '2023-06-06', 'D-Day', ''),
(281, '2023-06-07', 'World Food Safety Day', ''),
(282, '2023-06-08', 'Corpus Christi', ''),
(283, '2023-06-08', 'World Oceans Day', ''),
(284, '2023-06-10', 'Belmont Stakes', ''),
(285, '2023-06-11', 'Kamehameha Day', ''),
(286, '2023-06-12', 'World Day Against Child Labour', ''),
(287, '2023-06-12', 'Kamehameha Day observed', ''),
(288, '2023-06-12', 'Loving Day', ''),
(289, '2023-06-13', 'International Albinism Awarene', ''),
(290, '2023-06-14', 'World Blood Donor Day', ''),
(291, '2023-06-14', 'Army Birthday', ''),
(292, '2023-06-14', 'Flag Day', ''),
(293, '2023-06-15', 'World Elder Abuse Awareness Da', ''),
(294, '2023-06-16', 'International Day of Family Re', ''),
(295, '2023-06-16', 'Juneteenth', ''),
(296, '2023-06-16', 'Juneteenth Day', ''),
(297, '2023-06-17', 'World Day to Combat Desertific', ''),
(298, '2023-06-17', 'Bunker Hill Day', ''),
(299, '2023-06-17', 'Juneteenth Day', ''),
(300, '2023-06-17', 'Juneteenth National Freedom Da', ''),
(301, '2023-06-17', 'Juneteenth', ''),
(302, '2023-06-17', 'Juneteenth National Freedom Da', ''),
(303, '2023-06-17', 'Juneteenth', ''),
(304, '2023-06-17', 'Juneteenth National Freedom Da', ''),
(305, '2023-06-17', 'Juneteenth National Freedom Da', ''),
(306, '2023-06-18', 'Sustainable Gastronomy Day', ''),
(307, '2023-06-18', 'Father\'s Day', ''),
(308, '2023-06-18', 'Father\'s Day', ''),
(309, '2023-06-19', 'International Day for the Elim', ''),
(310, '2023-06-19', 'Juneteenth', ''),
(311, '2023-06-19', 'Juneteenth National Freedom Da', ''),
(312, '2023-06-19', 'Juneteenth', ''),
(313, '2023-06-19', 'Juneteenth Day', ''),
(314, '2023-06-19', 'Juneteenth', ''),
(315, '2023-06-19', 'Juneteenth Day', ''),
(316, '2023-06-19', 'Juneteenth National Freedom Da', ''),
(317, '2023-06-19', 'Juneteenth', ''),
(318, '2023-06-19', 'Juneteenth Independence Day', ''),
(319, '2023-06-19', 'Juneteenth National Freedom Da', ''),
(320, '2023-06-19', 'Juneteenth National Freedom Da', ''),
(321, '2023-06-19', 'Juneteenth', ''),
(322, '2023-06-19', 'National Juneteenth Freedom Da', ''),
(323, '2023-06-19', 'Juneteenth', ''),
(324, '2023-06-19', 'Juneteenth National Independen', ''),
(325, '2023-06-19', 'Juneteenth Independence Day', ''),
(326, '2023-06-19', 'Juneteenth Freedom Day', ''),
(327, '2023-06-19', 'Emancipation Day', ''),
(328, '2023-06-19', 'Juneteenth', ''),
(329, '2023-06-19', 'Juneteenth Day', ''),
(330, '2023-06-19', 'Juneteenth', ''),
(331, '2023-06-19', 'Juneteenth', ''),
(332, '2023-06-19', 'Juneteenth Freedom Day', ''),
(333, '2023-06-19', 'Juneteenth', ''),
(334, '2023-06-19', 'Juneteenth', ''),
(335, '2023-06-19', 'Juneteenth', ''),
(336, '2023-06-19', 'Juneteenth', ''),
(337, '2023-06-19', 'Juneteenth National Freedom Da', ''),
(338, '2023-06-19', 'Juneteenth Independence Day', ''),
(339, '2023-06-19', 'Juneteenth Celebration of Free', ''),
(340, '2023-06-19', 'Juneteenth Freedom Day', ''),
(341, '2023-06-19', 'Juneteenth', ''),
(342, '2023-06-19', 'Emancipation Day', ''),
(343, '2023-06-20', 'World Refugee Day', ''),
(344, '2023-06-20', 'West Virginia Day', ''),
(345, '2023-06-20', 'American Eagle Day', ''),
(346, '2023-06-21', 'International Day of Yoga', ''),
(347, '2023-06-21', 'International Day of the Celeb', ''),
(348, '2023-06-21', 'June Solstice', ''),
(349, '2023-06-23', 'Public Service Day', ''),
(350, '2023-06-23', 'International Widows\' Day', ''),
(351, '2023-06-25', 'Day of the Seafarer', ''),
(352, '2023-06-26', 'International Day Against Drug', ''),
(353, '2023-06-26', 'International Day in Support o', ''),
(354, '2023-06-27', 'Micro-, Small and Medium-sized', ''),
(355, '2023-06-28', 'Carolina Day', ''),
(356, '2023-06-29', 'Eid al-Adha', ''),
(357, '2023-06-29', 'International Day of the Tropi', ''),
(358, '2023-06-30', 'International Asteroid Day', ''),
(359, '2023-06-30', 'International Day of Parliamen', ''),
(360, '2023-07-01', 'International Day of Cooperati', ''),
(361, '2023-07-04', 'Independence Day', ''),
(362, '2023-07-04', 'Independence Day', ''),
(363, '2023-07-04', 'Independence Day', ''),
(364, '2023-07-11', 'World Population Day', ''),
(365, '2023-07-13', 'Nathan Bedford Forrest Day', ''),
(366, '2023-07-14', 'Bastille Day', ''),
(367, '2023-07-15', 'World Youth Skills Day', ''),
(368, '2023-07-16', 'Rural Transit Day', ''),
(369, '2023-07-18', 'Nelson Mandela Day', ''),
(370, '2023-07-19', 'Muharram', ''),
(371, '2023-07-20', 'World Chess Day', ''),
(372, '2023-07-23', 'Parents\' Day', ''),
(373, '2023-07-24', 'Pioneer Day', ''),
(374, '2023-07-25', 'World Drowning Prevention Day', ''),
(375, '2023-07-27', 'Tisha B\'Av', ''),
(376, '2023-07-27', 'Korean War Veteran Recognition', ''),
(377, '2023-07-27', 'National Korean War Veterans A', ''),
(378, '2023-07-28', 'Ashura', ''),
(379, '2023-07-28', 'World Hepatitis Day', ''),
(380, '2023-07-30', 'International Day of Friendshi', ''),
(381, '2023-07-30', 'World Day Against Trafficking ', ''),
(382, '2023-08-01', 'Colorado Day', ''),
(383, '2023-08-04', 'Coast Guard Birthday', ''),
(384, '2023-08-04', 'Barack Obama Day', ''),
(385, '2023-08-06', 'American Family Day', ''),
(386, '2023-08-07', 'Purple Heart Day', ''),
(387, '2023-08-07', 'Purple Heart Day', ''),
(388, '2023-08-07', 'Purple Heart Day', ''),
(389, '2023-08-09', 'International Day of the World', ''),
(390, '2023-08-12', 'International Youth Day', ''),
(391, '2023-08-14', 'Victory Day', ''),
(392, '2023-08-15', 'Assumption of Mary', ''),
(393, '2023-08-16', 'Bennington Battle Day', ''),
(394, '2023-08-18', 'Hawaii Statehood Day', ''),
(395, '2023-08-19', 'World Humanitarian Day', ''),
(396, '2023-08-19', 'National Aviation Day', ''),
(397, '2023-08-20', 'National Navajo Code Talkers D', ''),
(398, '2023-08-20', 'National Senior Citizens Day', ''),
(399, '2023-08-21', 'International Day of Remembran', ''),
(400, '2023-08-22', 'International Day Commemoratin', ''),
(401, '2023-08-23', 'International Day for the Reme', ''),
(402, '2023-08-26', 'Susan B. Anthony Day', ''),
(403, '2023-08-26', 'Women\'s Equality Day', ''),
(404, '2023-08-27', 'Lyndon Baines Johnson Day', ''),
(405, '2023-08-29', 'International Day against Nucl', ''),
(406, '2023-08-30', 'Raksha Bandhan', ''),
(407, '2023-08-30', 'International Day of the Victi', ''),
(408, '2023-08-31', 'International Day for People o', ''),
(409, '2023-08-31', 'International Overdose Awarene', ''),
(410, '2023-09-04', 'World Sexual Health Day', ''),
(411, '2023-09-04', 'Labor Day', ''),
(412, '2023-09-04', 'Labor Day', ''),
(413, '2023-09-05', 'International Day of Charity', ''),
(414, '2023-09-06', 'Janmashtami', ''),
(415, '2023-09-07', 'International Day of Clean Air', ''),
(416, '2023-09-07', 'Still\'s Disease Awareness Day', ''),
(417, '2023-09-08', 'International Literacy Day', ''),
(418, '2023-09-09', 'International Day to Protect E', ''),
(419, '2023-09-09', 'Carl Garner Federal Lands Clea', ''),
(420, '2023-09-09', 'Native American Day', ''),
(421, '2023-09-09', 'California Admission Day', ''),
(422, '2023-09-10', 'World Suicide Prevention Day', ''),
(423, '2023-09-10', 'National Grandparents Day', ''),
(424, '2023-09-11', 'First Responders Day', ''),
(425, '2023-09-11', 'Patriot Day', ''),
(426, '2023-09-11', 'Patriot Day', ''),
(427, '2023-09-12', 'International Day for South-So', ''),
(428, '2023-09-13', 'International Programmers\' Day', ''),
(429, '2023-09-15', 'International Day of Democracy', ''),
(430, '2023-09-15', 'First Day of National Hispanic', ''),
(431, '2023-09-15', 'National POW/MIA Recognition D', ''),
(432, '2023-09-16', 'Rosh Hashana', ''),
(433, '2023-09-16', 'International Day for the Pres', ''),
(434, '2023-09-16', 'Rosh Hashana', ''),
(435, '2023-09-17', 'World Patient Safety Day', ''),
(436, '2023-09-17', 'Constitution Day and Citizensh', ''),
(437, '2023-09-17', 'Constitution Commemoration Day', ''),
(438, '2023-09-18', 'Ganesh Chaturthi', ''),
(439, '2023-09-18', 'International Equal Pay Day', ''),
(440, '2023-09-18', 'Air Force Birthday', ''),
(441, '2023-09-18', 'Constitution Day and Citizensh', ''),
(442, '2023-09-21', 'International Day of Peace', ''),
(443, '2023-09-22', 'Emancipation Day', ''),
(444, '2023-09-22', 'Native American Day', ''),
(445, '2023-09-22', 'Native American Day', ''),
(446, '2023-09-22', 'Michigan Indian Day', ''),
(447, '2023-09-23', 'International Day of Sign Lang', ''),
(448, '2023-09-23', 'International Celebrate Bisexu', ''),
(449, '2023-09-23', 'Public Lands Day', ''),
(450, '2023-09-23', 'National Public Lands Day', ''),
(451, '2023-09-23', 'September Equinox', ''),
(452, '2023-09-24', 'Gold Star Mother\'s Day', ''),
(453, '2023-09-25', 'Yom Kippur', ''),
(454, '2023-09-25', 'American Indian Day', ''),
(455, '2023-09-25', 'Yom Kippur', ''),
(456, '2023-09-26', 'International Day for the Tota', ''),
(457, '2023-09-27', 'The Prophet\'s Birthday', ''),
(458, '2023-09-27', 'World Tourism Day', ''),
(459, '2023-09-28', 'World Maritime Day', ''),
(460, '2023-09-28', 'International Day for Universa', ''),
(461, '2023-09-28', 'World Rabies Day', ''),
(462, '2023-09-29', 'International Day of Awareness', ''),
(463, '2023-09-29', 'World Heart Day', ''),
(464, '2023-09-29', 'American Indian Heritage Day', ''),
(465, '2023-09-29', 'American Indian Heritage Day', ''),
(466, '2023-09-30', 'First Day of Sukkot', ''),
(467, '2023-09-30', 'International Translation Day', ''),
(468, '2023-10-01', 'International Day of Older Per', ''),
(469, '2023-10-01', 'World Vegetarian Day', ''),
(470, '2023-10-02', 'World Habitat Day', ''),
(471, '2023-10-02', 'International Day of Non-Viole', ''),
(472, '2023-10-02', 'Frances Xavier Cabrini Day', ''),
(473, '2023-10-02', 'Child Health Day', ''),
(474, '2023-10-04', 'Feast of St Francis of Assisi', ''),
(475, '2023-10-05', 'World Teachers\' Day', ''),
(476, '2023-10-06', 'Last Day of Sukkot', ''),
(477, '2023-10-06', 'World Cerebral Palsy Day', ''),
(478, '2023-10-06', 'German American Day', ''),
(479, '2023-10-07', 'Shmini Atzeret', ''),
(480, '2023-10-08', 'Simchat Torah', ''),
(481, '2023-10-08', 'Chicago Marathon', ''),
(482, '2023-10-09', 'World Post Day', ''),
(483, '2023-10-09', 'Leif Erikson Day', ''),
(484, '2023-10-09', 'Leif Erikson Day', ''),
(485, '2023-10-09', 'Columbus Day', ''),
(486, '2023-10-09', 'Columbus Day', ''),
(487, '2023-10-09', 'Columbus Day', ''),
(488, '2023-10-09', 'Fraternal Day', ''),
(489, '2023-10-09', 'Yorktown Victory Day', ''),
(490, '2023-10-09', 'Discoverers’ Day', ''),
(491, '2023-10-09', 'Native American Day', ''),
(492, '2023-10-09', 'Native American Day', ''),
(493, '2023-10-09', 'Indigenous People\'s Day', ''),
(494, '2023-10-09', 'Indigenous People\'s Day', ''),
(495, '2023-10-09', 'Indigenous People\'s Day', ''),
(496, '2023-10-09', 'American Indian Heritage Day', ''),
(497, '2023-10-10', 'World Mental Health Day', ''),
(498, '2023-10-11', 'International Day for Natural ', ''),
(499, '2023-10-11', 'International Day of the Girl ', ''),
(500, '2023-10-11', 'Casimir Pulaski Day', ''),
(501, '2023-10-11', 'Casimir Pulaski Day', ''),
(502, '2023-10-11', 'Casimir Pulaski Day', ''),
(503, '2023-10-11', 'Anniversary of Death of Genera', ''),
(504, '2023-10-12', 'World Spanish Language Day', ''),
(505, '2023-10-12', 'World Sight Day', ''),
(506, '2023-10-13', 'Friday the 13th', ''),
(507, '2023-10-13', 'Navy Birthday', ''),
(508, '2023-10-14', 'Robert E. Lee\'s Birthday', ''),
(509, '2023-10-15', 'Navratri', ''),
(510, '2023-10-15', 'International Day of Rural Wom', ''),
(511, '2023-10-15', 'White Cane Safety Day', ''),
(512, '2023-10-16', 'World Food Day', ''),
(513, '2023-10-16', 'Boss\'s Day', ''),
(514, '2023-10-17', 'International Day for the Erad', ''),
(515, '2023-10-18', 'Alaska Day', ''),
(516, '2023-10-21', 'Sweetest Day', ''),
(517, '2023-10-23', 'Dussehra', ''),
(518, '2023-10-24', 'United Nations Day', ''),
(519, '2023-10-24', 'World Development Information ', ''),
(520, '2023-10-27', 'World Day for Audiovisual Heri', ''),
(521, '2023-10-27', 'Nevada Day', ''),
(522, '2023-10-29', 'World Stroke Day', ''),
(523, '2023-10-31', 'World Cities Day', ''),
(524, '2023-10-31', 'Halloween', ''),
(525, '2023-11-01', 'All Saints\' Day', ''),
(526, '2023-11-01', 'World Vegan Day', ''),
(527, '2023-11-01', 'First Day of Native American H', ''),
(528, '2023-11-02', 'All Souls\' Day', ''),
(529, '2023-11-02', 'International Day to End Impun', ''),
(530, '2023-11-05', 'World Tsunami Awareness Day', ''),
(531, '2023-11-05', 'New York City Marathon', ''),
(532, '2023-11-05', 'Daylight Saving Time ends', ''),
(533, '2023-11-06', 'International Day for Preventi', ''),
(534, '2023-11-07', 'Election Day', ''),
(535, '2023-11-07', 'Election Day', ''),
(536, '2023-11-07', 'Election Day', ''),
(537, '2023-11-10', 'World Science Day for Peace an', ''),
(538, '2023-11-10', 'Marine Corps Birthday', ''),
(539, '2023-11-10', 'Veterans Day (substitute)', ''),
(540, '2023-11-10', 'Veterans Day (substitute)', ''),
(541, '2023-11-11', 'Veterans Day', ''),
(542, '2023-11-11', 'Veterans Day', ''),
(543, '2023-11-11', 'Veterans Day', ''),
(544, '2023-11-11', 'Veterans\' Day/Armistice Day', ''),
(545, '2023-11-11', 'Veterans\' Day/Armistice Day', ''),
(546, '2023-11-11', 'Veterans\' Day/Armistice Day', ''),
(547, '2023-11-12', 'Diwali/Deepavali', ''),
(548, '2023-11-12', 'World Pneumonia Day', ''),
(549, '2023-11-13', 'Barack Obama Day', ''),
(550, '2023-11-13', 'Veterans\' Day/Armistice Day (s', ''),
(551, '2023-11-14', 'World Diabetes Day', ''),
(552, '2023-11-16', 'International Day for Toleranc', ''),
(553, '2023-11-16', 'World Philosophy Day', ''),
(554, '2023-11-17', 'World Prematurity Day', ''),
(555, '2023-11-19', 'World Day of Remembrance for R', ''),
(556, '2023-11-19', 'World Toilet Day', ''),
(557, '2023-11-19', 'International Men\'s Day', ''),
(558, '2023-11-19', 'George Rogers Clark Day', ''),
(559, '2023-11-20', 'Universal Children\'s Day', ''),
(560, '2023-11-20', 'Africa Industrialization Day', ''),
(561, '2023-11-20', 'Transgender Day of Remembrance', ''),
(562, '2023-11-21', 'World Television Day', ''),
(563, '2023-11-23', 'Thanksgiving Day', ''),
(564, '2023-11-23', 'Thanksgiving Day', ''),
(565, '2023-11-24', 'State Holiday', ''),
(566, '2023-11-24', 'Presidents\' Day', ''),
(567, '2023-11-24', 'Lincoln\'s Birthday/Lincoln\'s D', ''),
(568, '2023-11-24', 'Day After Thanksgiving', ''),
(569, '2023-11-24', 'Day After Thanksgiving', ''),
(570, '2023-11-24', 'Family Day', ''),
(571, '2023-11-24', 'Acadian Day', ''),
(572, '2023-11-24', 'Black Friday', ''),
(573, '2023-11-24', 'American Indian Heritage Day', ''),
(574, '2023-11-24', 'Native American Heritage Day', ''),
(575, '2023-11-24', 'Native American Heritage Day', ''),
(576, '2023-11-25', 'International Day for the Elim', ''),
(577, '2023-11-27', 'Cyber Monday', ''),
(578, '2023-11-28', 'Giving Tuesday', ''),
(579, '2023-11-29', 'International Day of Solidarit', ''),
(580, '2023-11-29', 'Nellie Tayloe Ross\'s Birthday', ''),
(581, '2023-11-30', 'Day of Remembrance for all Vic', ''),
(582, '2023-12-01', 'World AIDS Day', ''),
(583, '2023-12-01', 'Rosa Parks Day', ''),
(584, '2023-12-01', 'Rosa Parks Day', ''),
(585, '2023-12-02', 'International Day for the Abol', ''),
(586, '2023-12-03', 'First Sunday of Advent', ''),
(587, '2023-12-03', 'International Day of Persons w', ''),
(588, '2023-12-04', 'International Day of Banks', ''),
(589, '2023-12-05', 'International Volunteer Day fo', ''),
(590, '2023-12-05', 'World Soil Day', ''),
(591, '2023-12-06', 'St Nicholas Day', ''),
(592, '2023-12-07', 'International Civil Aviation D', ''),
(593, '2023-12-07', 'Pearl Harbor Remembrance Day', ''),
(594, '2023-12-07', 'Pearl Harbor Remembrance Day', ''),
(595, '2023-12-07', 'Pearl Harbor Remembrance Day', ''),
(596, '2023-12-07', 'Delaware Day', ''),
(597, '2023-12-08', 'Feast of the Immaculate Concep', ''),
(598, '2023-12-08', 'Chanukah/Hanukkah (first day)', ''),
(599, '2023-12-09', 'International Anti-Corruption ', ''),
(600, '2023-12-09', 'World Genocide Commemoration D', ''),
(601, '2023-12-10', 'Human Rights Day', ''),
(602, '2023-12-10', 'Wyoming Day', ''),
(603, '2023-12-11', 'International Mountain Day', ''),
(604, '2023-12-12', 'International Day of Neutralit', ''),
(605, '2023-12-12', 'International Universal Health', ''),
(606, '2023-12-12', 'Feast of Our Lady of Guadalupe', ''),
(607, '2023-12-13', 'National Guard Birthday', ''),
(608, '2023-12-15', 'Last Day of Chanukah', ''),
(609, '2023-12-15', 'Bill of Rights Day', ''),
(610, '2023-12-17', 'Pan American Aviation Day', ''),
(611, '2023-12-17', 'Wright Brothers Day', ''),
(612, '2023-12-18', 'International Migrants Day', ''),
(613, '2023-12-18', 'Arabic Language Day', ''),
(614, '2023-12-20', 'International Human Solidarity', ''),
(615, '2023-12-22', 'Asarah B\'Tevet', ''),
(616, '2023-12-21', 'December Solstice', ''),
(617, '2023-12-24', 'Christmas Eve', ''),
(618, '2023-12-24', 'Christmas Eve', ''),
(619, '2023-12-24', 'Christmas Eve', ''),
(620, '2023-12-25', 'Christmas Day', ''),
(621, '2023-12-25', 'Christmas Day', ''),
(622, '2023-12-25', 'Christmas Day', ''),
(623, '2023-12-25', 'Christmas Day', ''),
(624, '2023-12-25', 'Christmas Day', ''),
(625, '2023-12-25', 'Christmas Eve observed', ''),
(626, '2023-12-25', 'Christmas Eve observed', ''),
(627, '2023-12-26', 'Kwanzaa (first day)', ''),
(628, '2023-12-26', 'Day After Christmas Day', ''),
(629, '2023-12-26', 'Day After Christmas Day', ''),
(630, '2023-12-27', 'International Day of Epidemic ', ''),
(631, '2023-12-31', 'New Year\'s Eve', ''),
(632, '2023-12-31', 'New Year\'s Eve', ''),
(633, '2023-03-12', 'Daylight Saving Time starts', 'Daylight Saving Time starts in'),
(634, '2023-03-20', 'March Equinox', 'March Equinox in the USA (New '),
(635, '2023-06-21', 'June Solstice', 'June Solstice in the USA (New '),
(636, '2023-09-23', 'September Equinox', 'September Equinox in the USA ('),
(637, '2023-11-05', 'Daylight Saving Time ends', 'Daylight Saving Time ends in t'),
(638, '2023-12-21', 'December Solstice', 'December Solstice in the USA ('),
(639, '2023-01-11', 'Prithvi Jayanti', 'Prithvi Jayanti is a public ho'),
(640, '2023-02-19', 'National Democracy Day', 'National Democracy Day is a pu'),
(641, '2023-03-21', 'March Equinox', 'March Equinox in Nepal (Kathma'),
(642, '2023-06-21', 'June Solstice', 'June Solstice in Nepal (Kathma'),
(643, '2023-09-01', 'Gai Jatra', 'Gai Jatra is a public holiday '),
(644, '2023-09-19', 'Constitution Day', 'Constitution Day is a public h'),
(645, '2023-09-23', 'September Equinox', 'September Equinox in Nepal (Ka'),
(646, '2023-10-22', 'Astami (Dashain)', 'Astami (Dashain) is a public h'),
(647, '2023-10-25', 'Ekadashi (Dashain)', 'Ekadashi (Dashain) is a public'),
(648, '2023-11-15', 'Bhai Tika (Tihar)', 'Bhai Tika (Tihar) is a public '),
(649, '2023-12-22', 'December Solstice', 'December Solstice in Nepal (Ka'),
(650, '2023-12-30', 'Tamu Lhosar', 'Tamu Lhosar is a optional holi'),
(651, '2023-07-08', 'abc', 'ashjs');

-- --------------------------------------------------------

--
-- Table structure for table `leave_records`
--

CREATE TABLE `leave_records` (
  `leave_id` int(30) NOT NULL,
  `employee_no` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `reason` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_records`
--

INSERT INTO `leave_records` (`leave_id`, `employee_no`, `employee_id`, `fullname`, `start_date`, `end_date`, `leave_type`, `status`, `reason`) VALUES
(9, 2033, 5, 'khushi', '2023-05-26', '2023-05-26', 'Personal Leave', 'Accepted', 'asm,as'),
(12, 2034, 6, 'sita', '2023-06-14', '2023-06-15', 'Cassual Leave', 'pending..', 'dfff'),
(13, 2030, 3, 'saanvika', '2023-06-24', '2023-06-26', 'Annual Leave', 'Accepted', 'hdsk'),
(14, 2030, 3, 'saanvika', '2023-07-05', '2023-07-08', 'Cassual Leave', 'pending..', 'esd'),
(15, 2011, 7, 'anuska', '2023-07-08', '2023-07-09', 'Sick Leave', 'pending..', 'fever'),
(16, 2030, 3, 'saanvika', '2023-07-09', '2023-07-10', 'Cassual Leave', 'pending..', 'kjdjkf'),
(17, 2030, 3, 'saanvika', '2023-07-10', '2023-07-10', 'Sick Leave', 'pending..', 'jkskf'),
(18, 2030, 3, 'saanvika', '2023-10-08', '2023-10-11', 'Cassual Leave', 'pending..', 'kdksl');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(30) NOT NULL,
  `employee_id` int(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `employee_no` int(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `total_attendance` varchar(30) NOT NULL,
  `total_leave` varchar(30) NOT NULL,
  `fine` int(30) NOT NULL,
  `Appreciation` int(30) NOT NULL,
  `start_date` datetime NOT NULL DEFAULT current_timestamp(),
  `end_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `employee_id`, `fullname`, `employee_no`, `department`, `total_attendance`, `total_leave`, `fine`, `Appreciation`, `start_date`, `end_date`) VALUES
(123, 1, 'anu dhanuk', 0, 'IT', '2', '0', 0, 0, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(124, 2, 'neha', 0, 'IT', '4', '0', 0, 500, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(125, 3, 'saanvika', 0, 'Project', '10', '1', 0, 500, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(126, 4, 'rubina', 0, 'Account', '4', '0', 0, 0, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(127, 5, 'khushi', 0, 'Account', '4', '1', 0, 0, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(128, 6, 'sita', 0, 'Management', '3', '0', 0, 0, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(129, 7, 'anuska', 0, 'Project', '2', '0', 0, 500, '2023-07-10 13:39:23', '2023-07-10 13:39:23'),
(130, 9, 'jyoti', 0, 'Account', '0', '0', 0, 0, '2023-07-10 13:39:23', '2023-07-10 13:39:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `leave_records`
--
ALTER TABLE `leave_records`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=652;

--
-- AUTO_INCREMENT for table `leave_records`
--
ALTER TABLE `leave_records`
  MODIFY `leave_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leave_records`
--
ALTER TABLE `leave_records`
  ADD CONSTRAINT `leave_records_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
