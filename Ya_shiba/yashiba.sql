-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 05:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yashiba`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom`
--

CREATE TABLE `classroom` (
  `CLASSROOM_ID` int(11) NOT NULL,
  `CLASS_CODE` varchar(8) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `CLASS_NAME` varchar(20) NOT NULL,
  `CLASS_DESCRIPTION` text NOT NULL,
  `CLASS_BACKGROUND` text NOT NULL,
  `NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom`
--

INSERT INTO `classroom` (`CLASSROOM_ID`, `CLASS_CODE`, `USER_ID`, `CLASS_NAME`, `CLASS_DESCRIPTION`, `CLASS_BACKGROUND`, `NUM`) VALUES
(13, 'MATH1234', 2, 'Addtional Math', 'Additional math for 4sc2', 'hihi.png', 2),
(14, 'CCCC4333', 2, 'Chinese', 'chinese for student 4sc3', 'hihi.png', 6),
(15, 'ENNG4235', 2, 'Japanese', 'For all Form 4', 'hihi.png', 5),
(16, 'ENNG0123', 17, 'English', 'English for 4sc3', 'hihi.png', 5),
(17, 'JJJJ4444', 2, 'Bahasa Malaysia', 'This is a BM classroom', 'hihi.png', 2),
(18, 'MMMN1239', 2, 'Moral', 'moral class', 'IMG-64a7a1f8eb44e8.91295251.png', 3),
(19, 'BIOL0123', 2, 'Biology', 'biology class', 'hihi.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_classroom`
--

CREATE TABLE `enrolled_classroom` (
  `ENROLLED_CLASS_ID` int(11) NOT NULL,
  `CLASSROOM_ID` int(5) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled_classroom`
--

INSERT INTO `enrolled_classroom` (`ENROLLED_CLASS_ID`, `CLASSROOM_ID`, `USER_ID`, `STATUS`) VALUES
(42, 13, 2, 'Show'),
(43, 14, 2, 'Hidden'),
(44, 15, 2, 'Show'),
(45, 15, 10, 'Show'),
(53, 15, 8, 'Show'),
(54, 15, 6, 'Show'),
(55, 15, 7, 'Show'),
(57, 16, 17, 'Show'),
(58, 16, 33, 'Show'),
(59, 16, 45, 'Show'),
(60, 16, 44, 'Show'),
(61, 16, 43, 'Show'),
(64, 16, 32, 'Show'),
(65, 17, 2, 'Show'),
(66, 14, 7, 'Hidden'),
(67, 14, 37, 'Hidden'),
(68, 14, 10, 'Hidden'),
(69, 14, 6, 'Hidden'),
(70, 14, 35, 'Hidden'),
(71, 16, 37, 'Show'),
(72, 18, 2, 'Hidden'),
(73, 18, 6, 'Hidden'),
(74, 13, 6, 'Show'),
(75, 17, 6, 'Show'),
(80, 18, 46, 'Show'),
(81, 19, 2, 'Show'),
(82, 19, 46, 'Show');

-- --------------------------------------------------------

--
-- Table structure for table `marking`
--

CREATE TABLE `marking` (
  `MARKING_ID` int(11) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `TASK_ID` int(5) NOT NULL,
  `SUBMIT_DATE` datetime NOT NULL,
  `MARKING_DATE` datetime DEFAULT NULL,
  `UPLOAD_FILE` text NOT NULL,
  `RETURN_FILE` text DEFAULT NULL,
  `MARKING_STATUS` varchar(50) NOT NULL,
  `MARKED` varchar(11) DEFAULT NULL,
  `FEEDBACK` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marking`
--

INSERT INTO `marking` (`MARKING_ID`, `USER_ID`, `TASK_ID`, `SUBMIT_DATE`, `MARKING_DATE`, `UPLOAD_FILE`, `RETURN_FILE`, `MARKING_STATUS`, `MARKED`, `FEEDBACK`) VALUES
(9, 6, 31, '2023-07-06 15:45:05', '2023-07-06 16:05:52', 'TASK 3 (2).docx', 'Assignment Cover (1) (1).doc', 'Graded', '50', 'Good, but there is some changes on the assignment cover as there is many file'),
(11, 33, 36, '2023-07-07 12:33:58', '2023-07-07 16:23:14', 'English - Jason.docx', 'Jason file.docx', 'Graded', '90', 'Good'),
(12, 37, 36, '2023-07-07 12:52:23', '2023-07-07 16:26:00', 'English - 77.docx', 'Noah Chang edited.docx', 'Graded', '75', 'Good'),
(13, 32, 36, '2023-07-07 13:02:17', '2023-07-07 16:25:15', 'English David.docx', 'David Wang editted.docx', 'Graded', '3', 'Poor'),
(14, 6, 41, '2023-07-07 13:39:21', NULL, 'Chinese 2.docx', NULL, 'Submitted', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MESSAGE_ID` int(11) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `TASK_ID` int(5) NOT NULL,
  `MESSAGE_DETAIL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MESSAGE_ID`, `USER_ID`, `TASK_ID`, `MESSAGE_DETAIL`) VALUES
(46, 2, 31, 'please watch it and let me know during the class'),
(47, 2, 31, 'it was informative'),
(48, 6, 34, 'i like the work'),
(49, 17, 36, 'by tmr'),
(50, 32, 36, 'test'),
(54, 6, 40, 'okay');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `REPOT_ID` int(11) NOT NULL,
  `USER_ID` int(5) NOT NULL,
  `REPORT_NAME` varchar(20) NOT NULL,
  `REPORT_DESCRIPTION` text NOT NULL,
  `REPORT_STATUS` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`REPOT_ID`, `USER_ID`, `REPORT_NAME`, `REPORT_DESCRIPTION`, `REPORT_STATUS`) VALUES
(12, 7, 'Math Quiz Report', 'Summary of the Math Quiz', 'Solved'),
(13, 3, 'English Essay Report', 'Feedback on the English Essay', 'Unsolved'),
(14, 8, 'Science Experiment R', 'Observations and Results of the Experiment', 'Solved'),
(15, 10, 'History Presentation', 'Evaluation of the History Presentation', 'Unsolved'),
(16, 12, 'Programming Project ', 'Documentation of the Programming Project', 'Unsolved');

-- --------------------------------------------------------

--
-- Table structure for table `student_batch`
--

CREATE TABLE `student_batch` (
  `STUDENT_BATCH_ID` varchar(6) NOT NULL,
  `STUDENT_BATCH_NAME` varchar(20) NOT NULL,
  `CREATED_TIME` datetime NOT NULL,
  `CREATED_USER_ID_TEACHER` int(5) NOT NULL,
  `NUM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_batch`
--

INSERT INTO `student_batch` (`STUDENT_BATCH_ID`, `STUDENT_BATCH_NAME`, `CREATED_TIME`, `CREATED_USER_ID_TEACHER`, `NUM`) VALUES
('YS0001', '4sc1', '2023-07-07 12:59:28', 2, 3),
('YS1234', '4sc3', '2023-07-06 00:37:06', 2, 3),
('YS1452', '4sc2', '2023-07-06 00:37:41', 2, 2),
('YS5252', 'Sckool 2', '2023-07-05 18:56:37', 13, 1),
('YS5452', 'Sckool 2', '2023-07-05 18:56:37', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `TASK_ID` int(11) NOT NULL,
  `CLASSROOM_ID` int(5) NOT NULL,
  `TASK_NAME` varchar(20) NOT NULL,
  `TASK_DESCRIPTION` text NOT NULL,
  `UPLOAD_FILE_NUM` int(11) NOT NULL,
  `TASK_CREATE_TIME` datetime NOT NULL,
  `TASK_SUBMIT_DATE` date NOT NULL,
  `TASK_CATEGORY` varchar(50) NOT NULL,
  `POINT` int(11) NOT NULL,
  `MESSAGES_NUM` int(11) NOT NULL,
  `HAND_IN_NUM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`TASK_ID`, `CLASSROOM_ID`, `TASK_NAME`, `TASK_DESCRIPTION`, `UPLOAD_FILE_NUM`, `TASK_CREATE_TIME`, `TASK_SUBMIT_DATE`, `TASK_CATEGORY`, `POINT`, `MESSAGES_NUM`, `HAND_IN_NUM`) VALUES
(29, 13, 'MathTest', 'this is math test', 1, '2023-07-05 23:26:13', '2023-07-24', 'Task', 50, 0, 0),
(31, 15, 'Quiz', 'Answer the quiz given \r\nhttps://www.efset.org/quick-check/\r\nSubmit the file to me by blabla', 4, '2023-07-06 14:05:04', '2023-07-12', 'Task', 40, 2, 1),
(34, 13, 'Math test', 'SPM 2022', 0, '2023-07-06 15:19:23', '0000-00-00', 'Annoucement', 0, 1, 0),
(35, 14, 'Chinese SPM 25', 'here is the file for the SPM 2025', 1, '2023-07-06 15:24:29', '1970-01-01', 'Material', 0, 0, 0),
(36, 16, 'Test 1', 'answer the test', 1, '2023-07-07 12:31:10', '2023-07-17', 'Task', 50, 2, 3),
(37, 16, 'English Text Book', 'english text book', 1, '2023-07-07 12:31:45', '1970-01-01', 'Material', 0, 0, 0),
(38, 14, 'Chinese test 2', 'chinese test 2', 1, '2023-07-07 13:08:45', '2023-07-24', 'Task', 40, 0, 0),
(39, 15, 'test 1', 'test 1', 1, '2023-07-07 13:27:07', '1970-01-01', 'Material', 0, 0, 0),
(40, 15, 'English class cancel', 'cancel for tmr', 0, '2023-07-07 13:27:26', '0000-00-00', 'Annoucement', 0, 1, 0),
(41, 15, 'Task 1', 'tak 1 description', 1, '2023-07-07 13:29:24', '2023-07-09', 'Task', 40, 0, 1),
(42, 16, 'English Test', 'English test on next Monday', 0, '2023-07-07 16:29:14', '0000-00-00', 'Annoucement', 1, 0, 0),
(43, 13, 'AddMath SPM 2023', 'answer the addmath SPM 2023 ', 1, '2023-07-07 17:27:12', '2023-07-31', 'Task', 80, 0, 0),
(47, 13, 'Material 2', 'Description for Material 2', 1, '2023-07-07 17:31:25', '0000-00-00', 'Material', 1, 0, 0),
(48, 14, 'Task 5', 'Description for Task 5', 1, '2023-07-07 17:31:25', '2023-07-13', 'Task', 40, 0, 0),
(49, 15, 'Announcement 1', 'Description for Announcement 1', 0, '2023-07-07 17:31:25', '0000-00-00', 'Announcement', 1, 0, 0),
(50, 16, 'Announcement 2', 'Description for Announcement 2', 0, '2023-07-07 17:31:25', '0000-00-00', 'Announcement', 1, 0, 0),
(51, 17, 'Task 6', 'Complete the task given', 1, '2023-07-07 17:31:25', '2023-07-14', 'Task', 40, 0, 0),
(52, 18, 'Announcement 3', 'Description for Announcement 3', 0, '2023-07-07 17:31:25', '0000-00-00', 'Announcement', 1, 0, 0),
(53, 14, 'AddMath SPM 2023', 'answer the addmath SPM 2023 ', 1, '2023-07-07 17:42:35', '2023-07-31', 'Task', 80, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tec_uploaded_file`
--

CREATE TABLE `tec_uploaded_file` (
  `UPLOADED_FILE_ID` int(11) NOT NULL,
  `TASK_ID` int(5) NOT NULL,
  `FILE_1` text NOT NULL,
  `FILE_2` text NOT NULL,
  `FILE_3` text NOT NULL,
  `FILE_4` text NOT NULL,
  `FILE_5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tec_uploaded_file`
--

INSERT INTO `tec_uploaded_file` (`UPLOADED_FILE_ID`, `TASK_ID`, `FILE_1`, `FILE_2`, `FILE_3`, `FILE_4`, `FILE_5`) VALUES
(35, 29, 'Assignment_Q (1).docx', '', '', '', ''),
(40, 35, 'TASK 3 (2).docx', '', '', '', ''),
(42, 31, 'Sample 1.docx', 'Sample 2.docx', 'Sample 3.docx', 'Sample 4.docx', ''),
(44, 37, 'English - Chap 1.docx', '', '', '', ''),
(45, 38, 'Chinese 2.docx', '', '', '', ''),
(46, 39, 'mmoral chap 1.docx', '', '', '', ''),
(47, 41, 'jpns task.docx', '', '', '', ''),
(51, 36, 'Sample 5.docx', '', '', '', ''),
(52, 43, 'Sample 6.docx', '', '', '', ''),
(56, 47, 'Sample 10.docx', '', '', '', ''),
(57, 48, 'Sample 11.docx', '', '', '', ''),
(58, 51, 'Sample 12.docx', '', '', '', ''),
(59, 53, 'Add math.docx', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `yashiba_school`
--

CREATE TABLE `yashiba_school` (
  `SCHOOL_ID` varchar(11) NOT NULL,
  `SCHOOL_NAME` varchar(50) NOT NULL,
  `SCHOOL_ADDRESS` varchar(100) NOT NULL,
  `PERSON_IN_CHARGE` varchar(50) NOT NULL,
  `PERSON_IN_CHARGE_PHONE` varchar(10) NOT NULL,
  `SCHOOL_REGISTER_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yashiba_school`
--

INSERT INTO `yashiba_school` (`SCHOOL_ID`, `SCHOOL_NAME`, `SCHOOL_ADDRESS`, `PERSON_IN_CHARGE`, `PERSON_IN_CHARGE_PHONE`, `SCHOOL_REGISTER_DATE`) VALUES
('SCKL001', 'SMK St.Mary', ' 7, Jalan Intan Baiduri 5d, Taman Intan Baiduri, 52100 Kuala Lumpur Wilayah Persekutuan Kuala Lumpur', 'Puan Chee', '0122177537', '2023-06-01 07:21:15'),
('SCKL003', 'SMK Taman Maluri', '42, Jalan Wirawati 6, Maluri, 55100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', 'Sean', '0392653023', '2023-07-07 00:08:51'),
('SCKL006', 'SMK Seri Serdang', 'Seri Serdang', 'Puan Chee', '0124578938', '2023-07-07 13:42:17'),
('SCKL120', 'SMK Kepong Baru', 'Lencana SMK Kepong Baru ; Alamat, Malaysia Jalan Helang, Kepong Baru, Kuala Lumpur', 'Cik Muhamad', '0362736593', '2023-07-06 16:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `yashiba_user`
--

CREATE TABLE `yashiba_user` (
  `USER_ID` int(5) NOT NULL,
  `SCHOOL_ID` varchar(11) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `CONTACT_NUMBER` text NOT NULL,
  `PASSWORD` varchar(60) NOT NULL,
  `ROLE` varchar(10) NOT NULL,
  `STUDENT_BATCH_ID` varchar(6) DEFAULT NULL,
  `USER_STATUS` varchar(10) NOT NULL,
  `USER_PROFILE` text DEFAULT NULL,
  `REGISTERED_DATE` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yashiba_user`
--

INSERT INTO `yashiba_user` (`USER_ID`, `SCHOOL_ID`, `USERNAME`, `USER_NAME`, `EMAIL`, `CONTACT_NUMBER`, `PASSWORD`, `ROLE`, `STUDENT_BATCH_ID`, `USER_STATUS`, `USER_PROFILE`, `REGISTERED_DATE`) VALUES
(2, 'SCKL001', 'usman', 'Usman', 'a@gmail.com', '0125236985', '12341234', 'Teacher', NULL, 'Active', 'images.jpeg', '2023-07-01 21:06:53'),
(3, '', 'Admin1', 'Hashana', 'wew@gmail.com', '0122555788', '12341234', 'Admin', NULL, 'Active', NULL, '2023-06-11 01:59:14'),
(6, 'SCKL001', 'bn123a', 'Bernard Ong', 'g@gmail.com', '0122175556', '12341234', 'Student', 'YS1234', 'Active', NULL, '2023-07-01 21:11:12'),
(7, 'SCKL001', 'mk123', 'Teoh Mae Kay', 'a@gmail.com', '0122177888', '12121212', 'Student', 'YS1234', 'Active', NULL, '2023-07-01 21:20:17'),
(8, 'SCKL001', 'js123', 'Jason She', 'g@gmail.com', '0122177537', '12341234', 'Student', 'YS1234', 'Active', 'jason3.jpg', '2023-07-01 21:22:39'),
(10, 'SCKL001', 'xy123', 'Xin Yee', 'xinyee@gmail.com', '0125554788', '12341234', 'Student', 'YS1452', 'Active', 'IMG-64a2d6920a3900.70642343.jpg', '2023-07-05 18:22:35'),
(11, 'SCKL120', 'js123', 'John Smith', 'johnsmith@example.com', '1234567890', '12341234', 'Student', NULL, 'Active', NULL, '2023-07-05 18:22:35'),
(12, 'SCKL120', 'jd123', 'Jane Doe', 'janedoe@example.com', '0987654321', '12341234', 'Student', NULL, 'Active', NULL, '2023-07-05 18:22:35'),
(13, 'SCKL120', 'mb123', 'Michael Brown', 'michaelbrown@example.com', '9876543210', '12341234', 'Student', 'YS5252', 'Active', NULL, '2023-07-05 18:22:35'),
(14, 'SCKL120', 'ej123', 'Emily Jones', 'emilyjones@example.com', '0123456789', '12341234', 'Student', 'YS5452', 'Active', NULL, '2023-07-05 18:22:35'),
(16, 'SCKL120', 'st123', 'Sarah Thompson', 'sarahthompson@example.com', '0123456789', '12341234', 'Teacher', NULL, 'Pending', NULL, '2023-07-05 18:22:35'),
(17, 'SCKL120', 'rj123', 'Robert Johnson', 'robertjohnson@example.com', '1234567890', '12341234', 'Teacher', NULL, 'Active', NULL, '2023-07-05 18:22:35'),
(32, 'SCKL001', 'david_wang', 'David Wang', 'davidwang@example.com', '5678901234', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-16 12:15:00'),
(33, 'SCKL120', 'jason_chen', 'Jason Chen', 'jasonchen@example.com', '3456789012', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(34, 'SCKL001', 'olivia_gonzalez', 'Olivia Gonzalez', 'oliviagonzalez@example.com', '8901234567', 'mypassword123', 'Teacher', NULL, 'Pending', NULL, '2023-06-18 14:45:00'),
(35, 'SCKL001', 'ethan_liu', 'Ethan Liu', 'ethanliu@example.com', '2345678901', 'mypassword123', 'Student', NULL, 'Deactivate', NULL, '2023-06-18 14:45:00'),
(36, 'SCKL001', 'ava_nguyen', 'Ava Nguyen', 'avanguyen@example.com', '6789012345', 'mypassword567', 'Student', 'YS0001', 'Active', NULL, '2023-06-18 14:45:00'),
(37, 'SCKL001', 'noah_chang', 'Noah Chang', 'noahchang@example.com', '0123456789', 'mypassword123', 'Student', 'YS0001', 'Active', NULL, '2023-06-18 14:45:00'),
(38, 'SCKL120', 'mia_kim', 'Mia Kim', 'miakim@example.com', '4567890123', 'mypassword123', 'Teacher', NULL, 'Pending', NULL, '2023-06-18 14:45:00'),
(39, 'SCKL120', 'william_lee', 'William Lee', 'williamlee@example.com', '8901234567', 'mypassword123', 'Teacjer', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(40, 'SCKL120', 'sophia_yang', 'Sophia Yang', 'sophiayang@example.com', '2345678901', 'mypassword123', 'Teacher', NULL, 'Rejected', NULL, '2023-06-18 14:45:00'),
(41, 'SCKL120', 'logan_kim', 'Logan Kim', 'logankim@example.com', '6789012345', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(42, 'SCKL120', 'lily_choi', 'Lily Choi', 'lilychoi@example.com', '0123456789', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(43, 'SCKL120', 'owen_kim', 'Owen Kim', 'owenkim@example.com', '4567890123', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(44, 'SCKL120', 'zoey_wang', 'Zoey Wang', 'zoeywang@example.com', '8901234567', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(45, 'SCKL120', 'jackson_lai', 'Jackson Lai', 'jacksonlai@example.com', '2345678901', 'mypassword123', 'Student', NULL, 'Active', NULL, '2023-06-18 14:45:00'),
(46, 'SCKL001', 'jason', 'She Jun Yuan', 'jasonshe@gmail.com', '192837482', '1234512345', 'Student', 'YS0001', 'Active', NULL, '2023-07-07 13:24:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`CLASSROOM_ID`),
  ADD KEY `test2` (`USER_ID`);

--
-- Indexes for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD PRIMARY KEY (`ENROLLED_CLASS_ID`),
  ADD KEY `test3` (`CLASSROOM_ID`),
  ADD KEY `test4` (`USER_ID`);

--
-- Indexes for table `marking`
--
ALTER TABLE `marking`
  ADD PRIMARY KEY (`MARKING_ID`),
  ADD KEY `test9` (`USER_ID`),
  ADD KEY `test10` (`TASK_ID`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MESSAGE_ID`),
  ADD KEY `test7` (`TASK_ID`),
  ADD KEY `test8` (`USER_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`REPOT_ID`),
  ADD KEY `test11` (`USER_ID`);

--
-- Indexes for table `student_batch`
--
ALTER TABLE `student_batch`
  ADD PRIMARY KEY (`STUDENT_BATCH_ID`),
  ADD KEY `test12` (`CREATED_USER_ID_TEACHER`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`TASK_ID`),
  ADD KEY `test5` (`CLASSROOM_ID`);

--
-- Indexes for table `tec_uploaded_file`
--
ALTER TABLE `tec_uploaded_file`
  ADD PRIMARY KEY (`UPLOADED_FILE_ID`),
  ADD KEY `test6` (`TASK_ID`);

--
-- Indexes for table `yashiba_school`
--
ALTER TABLE `yashiba_school`
  ADD PRIMARY KEY (`SCHOOL_ID`);

--
-- Indexes for table `yashiba_user`
--
ALTER TABLE `yashiba_user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `TEST` (`SCHOOL_ID`),
  ADD KEY `a` (`STUDENT_BATCH_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom`
--
ALTER TABLE `classroom`
  MODIFY `CLASSROOM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  MODIFY `ENROLLED_CLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `marking`
--
ALTER TABLE `marking`
  MODIFY `MARKING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MESSAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `REPOT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `TASK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tec_uploaded_file`
--
ALTER TABLE `tec_uploaded_file`
  MODIFY `UPLOADED_FILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `yashiba_user`
--
ALTER TABLE `yashiba_user`
  MODIFY `USER_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classroom`
--
ALTER TABLE `classroom`
  ADD CONSTRAINT `test2` FOREIGN KEY (`USER_ID`) REFERENCES `yashiba_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `enrolled_classroom`
--
ALTER TABLE `enrolled_classroom`
  ADD CONSTRAINT `test3` FOREIGN KEY (`CLASSROOM_ID`) REFERENCES `classroom` (`CLASSROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test4` FOREIGN KEY (`USER_ID`) REFERENCES `yashiba_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marking`
--
ALTER TABLE `marking`
  ADD CONSTRAINT `test10` FOREIGN KEY (`TASK_ID`) REFERENCES `task` (`TASK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test9` FOREIGN KEY (`USER_ID`) REFERENCES `yashiba_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `test7` FOREIGN KEY (`TASK_ID`) REFERENCES `task` (`TASK_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test8` FOREIGN KEY (`USER_ID`) REFERENCES `yashiba_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `test11` FOREIGN KEY (`USER_ID`) REFERENCES `yashiba_user` (`USER_ID`);

--
-- Constraints for table `student_batch`
--
ALTER TABLE `student_batch`
  ADD CONSTRAINT `test12` FOREIGN KEY (`CREATED_USER_ID_TEACHER`) REFERENCES `yashiba_user` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `test5` FOREIGN KEY (`CLASSROOM_ID`) REFERENCES `classroom` (`CLASSROOM_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tec_uploaded_file`
--
ALTER TABLE `tec_uploaded_file`
  ADD CONSTRAINT `test6` FOREIGN KEY (`TASK_ID`) REFERENCES `task` (`TASK_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yashiba_user`
--
ALTER TABLE `yashiba_user`
  ADD CONSTRAINT `a` FOREIGN KEY (`STUDENT_BATCH_ID`) REFERENCES `student_batch` (`STUDENT_BATCH_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
