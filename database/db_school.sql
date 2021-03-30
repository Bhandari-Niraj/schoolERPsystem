-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 05:31 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `name`, `email`, `password`, `salt`, `status`, `last_login`) VALUES
(1, 'Admin', 'admin@admin.com', '3574d9f3c4647b12c7e440b4e55dd4f1c03a4ec9', '5ece8c3354c1f', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `isbn` varchar(32) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `edition` int(11) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `publish_date` date DEFAULT NULL,
  `copies` int(11) DEFAULT NULL,
  `pdfbook` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `isbn`, `title`, `author`, `edition`, `publisher`, `publish_date`, `copies`, `pdfbook`) VALUES
(1, '1000', 'Java Concept', 'IOn Bell', 8, 'London Met', '2020-06-01', 100, NULL),
(2, '100023', 'core PHp Concept', 'IOn Bell', 8, 'London Met', '2020-06-01', 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `card_no` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`id`, `isbn`, `name`, `card_no`, `date`) VALUES
(1, '100-2090', 'Amrit Khatri Chettri', 732746, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` int(11) NOT NULL,
  `ip_address` longtext NOT NULL,
  `timestamp` int(11) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `numeric_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `numeric_name`) VALUES
(1, 'One', 1),
(4, 'Three', 3),
(10, 'Four', 4),
(12, 'Six', 6),
(14, 'Ten', 10);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `participants` varchar(250) NOT NULL,
  `description` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `start`, `end`, `participants`, `description`) VALUES
(2, 'carnibal', '2020-06-18 14:55:00', '2020-06-23 03:56:00', 'Teacher, Student, Staff, Parents and Guest', 'advahhdjka'),
(4, 'math', '2020-06-12 04:44:00', '2020-06-16 16:42:00', 'Teacher, Student, Staff, Parents and Guest', 'sdsadasd'),
(5, 'correct', '2020-06-17 09:26:00', '2020-06-15 09:28:00', 'Teacher, Student, Staff, Parents and Guest', 'sgdghahsdjas'),
(6, 'mit', '2020-06-22 15:31:00', '2020-06-17 14:33:00', 'Teacher, Student, Staff, Parents and Guest', 'sadasd'),
(7, 'Exam', '2020-06-20 14:03:00', '2020-06-24 12:03:00', 'Student', 'Second Terminal Exam');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `student_id`, `name`, `subject`, `mark`) VALUES
(457, 3232, 'Amrit Khatri Chettri', 'Science', 22),
(459, 30369240, 'Pradeep Ghale', 'Math', 77),
(461, 30369240, 'Pradeep Ghale', 'Science', 90),
(463, 30369240, 'Pradeep Ghale', 'English', 65);

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `file` varchar(220) NOT NULL,
  `uploaded_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`id`, `class_id`, `file`, `uploaded_by`) VALUES
(5, 1, '5ee61bb758823_School ERP System.pdf', 15),
(7, 1, '5ee6b1d08c7bd_GROUP5_ProductRoadmap_ITECH7415.pdf', 15),
(8, 1, '5ee6b789754f7_GROUP5_ProductRoadmap_ITECH7415.pdf', 15);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(32) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `name`, `email`, `mobile_no`, `salt`, `password`, `status`, `last_login`) VALUES
(1, 'Govinda Chettri', 'govin@gmail.com', '0456765823', '5edda05086dc7', '1f7b5510fd57feaf0448534df7a1e72a', 0, '2020-06-08 04:20:00'),
(3, 'Ghale kaji', 'ghale@gmail.com', '23424', '5ee643d02ed14', 'cb00fa64ae398a507e8d24fdb51c2acb', 1, '2020-06-14 05:35:44');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `question` longtext,
  `file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `type`, `class_id`, `question`, `file`) VALUES
(1, 'Question', 1, 'What is RBC?', '');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `name` varchar(12) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `class_id`, `teacher_id`) VALUES
(15, 'A', 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(22) NOT NULL,
  `academic_qualification` varchar(50) NOT NULL,
  `department` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `photo`, `email`, `mobile_no`, `academic_qualification`, `department`, `salt`, `password`, `level`, `status`, `last_login`) VALUES
(15, 'Sweta Baniya', '5ee5d2bd85247_56364670_2366581526687297_337341239827365888_n.jpg', 'sweta@gmail.com', '041034567', 'PHD', 'Academic', '5ee5d2bd85266', 'e8b6d632bebe9d1b8c3ba931cc478f1c6ecb486c', 5, 1, '2020-06-14 09:33:17'),
(16, 'Amrit KC', '5ee6afd57cab0_screencapture-localhost-ezone-backend-admin-add-subject-2020-06-15-04_38_08.png', 'amrit@gmail.com', '73268749', 'Bachelor', 'Academic', '5ee6afd57cabe', '495f132e8fc87848f2cf4da1bce7d1ba71bca215', 1, 1, '2020-06-15 01:16:37'),
(17, 'Deep Deshar', '5ee6cdc16abae_p3v1.png', 'deep@gmail.com', '9875443', 'PHD', 'Library', '5ee6cdc16abbe', 'c4ebdaf722ab7f691cdd8e1aec9fa82c171c8ed4', 1, 1, '2020-06-15 03:24:17'),
(18, 'Avishek Dawadi', '5ee6ce154f722_p3.PNG', 'avishek@gmail.com', '08654', 'Bachelor', 'Academic', '5ee6ce154f731', '20f5c722ae236abcfc4d579b73487a26e744e8df', 1, 1, '2020-06-15 03:25:41'),
(19, 'Pradeep Ghale', '5ee6f946e239b_50792059_232524514366109_2973755366279479296_n.jpg', 'pradeep@gmail.com', '7678789', 'Bachelor', 'Academic', '5ee6f946e23d2', '0a46d48c73ba4b360ed389e3c18de0b62f7cfae2', 1, 1, '2020-06-15 06:29:58'),
(20, 'dhiren Hamal', '5eea2e3b40c43_p3v1.png', 'dhiren@gmail.com', '6567678', 'Bachelor', 'Library', '5eea2e3b40c63', '2558e792780e35dc87f166dbbdc15ef4ea1e8271', 1, 1, '2020-06-17 04:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `staff_attendance`
--

CREATE TABLE `staff_attendance` (
  `attendance_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `attend_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_attendance`
--

INSERT INTO `staff_attendance` (`attendance_id`, `staff_id`, `status`, `attend_date`) VALUES
(102, 15, 1, '2020-06-14'),
(103, 15, 1, '2020-06-15'),
(104, 16, 0, '2020-06-15'),
(105, 15, 0, '2020-06-19'),
(106, 16, 1, '2020-06-19'),
(107, 17, 0, '2020-06-19'),
(108, 18, 1, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave`
--

CREATE TABLE `staff_leave` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `letter` longtext NOT NULL,
  `day` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(32) NOT NULL,
  `address` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `parent_email` varchar(255) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `password` varchar(54) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `photo`, `email`, `mobile_no`, `address`, `class`, `parent_email`, `salt`, `password`, `status`, `last_login`) VALUES
(3, 'Niraj Chettri', '5edddba1a68f9_niraj_bhandari.jpg', 'el.niraj@gmail.com', '04103541421', 'Unit 8', 1, 'govin@gmail.com', '5edddba1a6917', 'c2523eaa1608ed30ad01d87986fed41b', 1, '2020-06-08 08:33:05'),
(10, 'Pradeep Ghale', '5ee64c5d45460_0-02-07-841ad39a8f961fc942bbe835b04b88bfba26694175eccb90a92465d7f369d011_6fdcb0ee.jpg', 'pradeep@gmail.com', '04995', 'croydon', 1, 'ghale@gmail.com', '5ee64c5d45477', '6a1772fde898bbd3cec9b1a3c3eecf742a3ad8ca', 1, '2020-06-14 06:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

CREATE TABLE `student_attendance` (
  `Id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `attend_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`Id`, `student_id`, `status`, `attend_date`) VALUES
(7, 3, 0, '2020-06-19'),
(8, 10, 0, '2020-06-19');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(10, 'A'),
(9, 'corrected'),
(12, 'Mathematics');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `sectionclass_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `subject_id`, `sectionclass_id`, `teacher_id`, `start`, `end`) VALUES
(1, 12, 15, 15, '10:00:00', '11:00:00'),
(2, 9, 15, 15, '09:24:00', '10:24:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `numeric_name` (`numeric_name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqueStudent` (`student_id`,`subject`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `uploaded_by` (`uploaded_by`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `className` (`name`,`class_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD UNIQUE KEY `staff_day` (`staff_id`,`attend_date`);

--
-- Indexes for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staff_id` (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `parent_id` (`parent_email`);

--
-- Indexes for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `student_id` (`student_id`,`attend_date`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `sectionclass_id` (`sectionclass_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=464;
--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `staff_leave`
--
ALTER TABLE `staff_leave`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student_attendance`
--
ALTER TABLE `student_attendance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`uploaded_by`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_attendance`
--
ALTER TABLE `staff_attendance`
  ADD CONSTRAINT `staff_attendance_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD CONSTRAINT `staff_leave_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`parent_email`) REFERENCES `parent` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_attendance`
--
ALTER TABLE `student_attendance`
  ADD CONSTRAINT `student_attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `timetable_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_2` FOREIGN KEY (`sectionclass_id`) REFERENCES `section` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timetable_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
