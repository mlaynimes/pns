-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 09:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pns`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `assign_id` int(11) NOT NULL,
  `assign_class_id` int(11) NOT NULL,
  `assign_standard_id` int(11) NOT NULL,
  `assign_teacher_id` int(11) NOT NULL,
  `assign_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `assign_class_id`, `assign_standard_id`, `assign_teacher_id`, `assign_school_id`) VALUES
(2, 1, 1, 4, 8),
(5, 4, 6, 6, 11),
(6, 6, 5, 6, 11),
(10, 8, 9, 7, 13),
(11, 9, 10, 8, 14),
(14, 13, 15, 10, 15),
(15, 2, 1, 9, 8);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `attendance_data` varchar(10) NOT NULL,
  `d1` varchar(5) NOT NULL,
  `d2` varchar(5) NOT NULL,
  `d3` varchar(5) NOT NULL,
  `d4` varchar(5) NOT NULL,
  `d5` varchar(5) NOT NULL,
  `d6` varchar(5) NOT NULL,
  `d7` varchar(5) NOT NULL,
  `d8` varchar(5) NOT NULL,
  `d9` varchar(5) NOT NULL,
  `d10` varchar(5) NOT NULL,
  `d11` varchar(5) NOT NULL,
  `d12` varchar(5) NOT NULL,
  `d13` varchar(5) NOT NULL,
  `d14` varchar(5) NOT NULL,
  `d15` varchar(5) NOT NULL,
  `d16` varchar(5) NOT NULL,
  `d17` varchar(5) NOT NULL,
  `d18` varchar(5) NOT NULL,
  `d19` varchar(5) NOT NULL,
  `d20` varchar(5) NOT NULL,
  `d21` varchar(5) NOT NULL,
  `d22` varchar(5) NOT NULL,
  `d23` varchar(5) NOT NULL,
  `d24` varchar(5) NOT NULL,
  `d25` varchar(5) NOT NULL,
  `d26` varchar(5) NOT NULL,
  `d27` varchar(5) NOT NULL,
  `d28` varchar(5) NOT NULL,
  `d29` varchar(5) NOT NULL,
  `d30` varchar(5) NOT NULL,
  `d31` varchar(5) NOT NULL,
  `attendance_schools_id` int(11) NOT NULL,
  `attendance_teachers_id` int(11) NOT NULL,
  `attendance_students_id` int(11) NOT NULL,
  `attendance_standard_id` int(11) NOT NULL,
  `attendance_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_data`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d13`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `d26`, `d27`, `d28`, `d29`, `d30`, `d31`, `attendance_schools_id`, `attendance_teachers_id`, `attendance_students_id`, `attendance_standard_id`, `attendance_class_id`) VALUES
(1, '11-2020', '', '', '', '', '', '', '', 'V', 'X', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'V', '', '', '', '', '', '', '', 8, 4, 1, 1, 1),
(2, '12-2020', '', 'V', '', 'V', '', '', '', 'R', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 8, 4, 1, 1, 1),
(3, '12-2020', '', 'V', '', 'V', '', '', '', 'V', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 8, 4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_id`, `class_name`, `class_school_id`) VALUES
(1, 'A', 8),
(2, 'B', 8),
(3, 'C', 8),
(4, 'A', 11),
(5, 'B', 11),
(6, 'C', 11),
(7, 'A', 12),
(8, 'A', 13),
(9, 'A', 14),
(10, 'B', 14),
(11, 'C', 14),
(12, 'F', 8),
(13, 'ONE', 15),
(14, 'two', 15);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `exam_info` varchar(150) NOT NULL,
  `exam_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_info`, `exam_school_id`) VALUES
(1, 'first semister', 8),
(2, 'second semister', 8),
(5, 'third semister', 8);

-- --------------------------------------------------------

--
-- Table structure for table `limit`
--

CREATE TABLE `limit` (
  `limit_id` int(11) NOT NULL,
  `limit_date` varchar(20) NOT NULL,
  `limit_status` int(11) NOT NULL,
  `limit_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `limit`
--

INSERT INTO `limit` (`limit_id`, `limit_date`, `limit_status`, `limit_school_id`) VALUES
(10, '08-Dec-2020', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `result_subject_id` int(11) NOT NULL,
  `result_marks` int(11) NOT NULL,
  `result_exam_id` int(11) NOT NULL,
  `result_class_id` int(11) NOT NULL,
  `result_standard_id` int(11) NOT NULL,
  `result_student_id` int(11) NOT NULL,
  `result_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `result_subject_id`, `result_marks`, `result_exam_id`, `result_class_id`, `result_standard_id`, `result_student_id`, `result_school_id`) VALUES
(87, 2, 86, 1, 2, 1, 3, 8),
(88, 3, 12, 1, 2, 1, 3, 8),
(89, 6, 60, 1, 2, 1, 3, 8),
(90, 2, 50, 1, 2, 1, 4, 8),
(91, 3, 54, 1, 2, 1, 4, 8),
(92, 6, 90, 1, 2, 1, 4, 8),
(282, 2, 100, 1, 1, 1, 1, 8),
(283, 3, 100, 1, 1, 1, 1, 8),
(284, 6, 70, 1, 1, 1, 1, 8),
(285, 2, 100, 1, 1, 1, 2, 8),
(286, 3, 100, 1, 1, 1, 2, 8),
(287, 6, 70, 1, 1, 1, 2, 8),
(288, 2, 90, 2, 1, 1, 1, 8),
(289, 3, 90, 2, 1, 1, 1, 8),
(290, 6, 52, 2, 1, 1, 1, 8),
(291, 2, 80, 2, 1, 1, 2, 8),
(292, 3, 90, 2, 1, 1, 2, 8),
(293, 6, 70, 2, 1, 1, 2, 8),
(294, 2, 100, 5, 1, 1, 1, 8),
(295, 3, 100, 5, 1, 1, 1, 8),
(296, 6, 70, 5, 1, 1, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schools_id` int(11) NOT NULL,
  `schools_name` varchar(100) NOT NULL,
  `schools_regno` varchar(100) NOT NULL,
  `schools_pass` varchar(100) NOT NULL,
  `schools_image` varchar(100) NOT NULL,
  `schools_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schools_id`, `schools_name`, `schools_regno`, `schools_pass`, `schools_image`, `schools_email`) VALUES
(8, 'Ungalimited', '11313', '$2y$10$LVOIEHLsTIXwdv5qzQvS/OoeVwIUMwHNc3TV56IavAABULB8yolaq', 'epaflas.png', 'kelvinmlay18@gmail.com'),
(9, 'v', 'v', '$2y$10$iFe2M.kJOgZUKa7At7lKK.0uQVIivgZ.NgVcj1ke3cj4vK7hZzgCa', 'epaflas1.png', 'v@gmail.com'),
(10, 'aaa', '111', '$2y$10$mK8.hF.ALDOmCK6IOFxPluJehB/pdk1tFbFHfRhSEx8eZ6SBZ2BHe', '29790170_1413984362040128_4408440632608030720_n.jpg', 'a@a.a'),
(11, 'arusha school', '757657', '$2y$10$ycUUJPfn125CPd5tUVjm6uTZvEg5RqapSZDCzy0aH7G.lAmEoQNd2', 'tour_1549280700.jpg', 'arusha@gmail.com'),
(12, 'kisutu Girls Highschool', 'S.0208', '$2y$10$H1CpBSkzEyQ6Ss6Sdks.eebXhHOXY/CU8VOc5/Fy.W9.XWoB4A3AK', '19_10_05-kilimanjaro-rongai-route-7-days-gallery-2.jpg', 'nabwienn@gmail.com'),
(13, 'technical', '1234', '$2y$10$2yb7.ym3I/svjFCV3KCmIu4qYuIru9zRC9V2goo2WRaatCnEDpr5e', '19_12_26-Wild_Dog_at_Selouse.jpg', 'techb@gmail.com'),
(14, 'madata primary school', '1234', '$2y$10$VhCbJSfUzP6/6wYq.owApOLS22p36PD2IFK3PcKJHIZDjb75U0aie', '19_08_24-6f.jpg', 'madata@gmail.com'),
(15, 'sokoni one', 't1', '$2y$10$lHoiYQ0D6zVw/Vn3ebzFQu5ypNBcl9tq7xFRuyKbJr6/CilXGHg4a', 'blackTheme.png', 't@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `standards`
--

CREATE TABLE `standards` (
  `standards_id` int(11) NOT NULL,
  `standards_name` varchar(100) NOT NULL,
  `standards_schools_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standards`
--

INSERT INTO `standards` (`standards_id`, `standards_name`, `standards_schools_id`) VALUES
(1, 'One', 8),
(2, 'Two', 8),
(3, 'Three', 8),
(4, 'Four', 8),
(5, 'ONE', 11),
(6, 'TWO', 11),
(7, 'THREE', 11),
(8, '1', 12),
(9, 'One', 13),
(10, 'Darasa la kwanza', 14),
(11, 'Darasa la pili', 14),
(12, 'Darasa la tatu', 14),
(13, 'Darasa la nne', 14),
(14, 'Five', 8),
(15, 'A', 15),
(16, 'B', 15);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `students_id` int(11) NOT NULL,
  `students_fname` varchar(100) NOT NULL,
  `students_mname` varchar(100) NOT NULL,
  `students_lname` varchar(100) NOT NULL,
  `students_parent_fno` varchar(100) NOT NULL,
  `students_year_entry` varchar(50) NOT NULL,
  `students_register_no` varchar(50) NOT NULL,
  `students_birthday` varchar(50) NOT NULL,
  `students_nationality` varchar(50) NOT NULL,
  `students_parent_name` varchar(50) NOT NULL,
  `students_parent_occupation` varchar(50) NOT NULL,
  `students_gender` varchar(100) NOT NULL,
  `students_classes_id` int(11) NOT NULL,
  `students_standard_id` int(11) NOT NULL,
  `students_schools_id` int(11) NOT NULL,
  `students_teachers_id` int(11) NOT NULL,
  `students_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`students_id`, `students_fname`, `students_mname`, `students_lname`, `students_parent_fno`, `students_year_entry`, `students_register_no`, `students_birthday`, `students_nationality`, `students_parent_name`, `students_parent_occupation`, `students_gender`, `students_classes_id`, `students_standard_id`, `students_schools_id`, `students_teachers_id`, `students_status`) VALUES
(1, 'kelvin', 'E', 'Mlay', '255767657905', '2020', 't/ae/aa', '2020-11-12', 'Tanzania', 'Mlay', 'artista', 'Male', 1, 1, 8, 0, 0),
(2, 'abuu', 'h', 'Mamdali', '255753191870', '2020', 't/ae/aa', '2020-11-28', 'Tanzania', 'mamdali', 'sheikh', 'Male', 1, 1, 8, 0, 0),
(3, 'john', 'john', 'john', '+255768128197', '2020', 't/ae/aa', '2020-12-14', 'Tanzania', 'Mlay', 'artist', 'Male', 2, 1, 8, 0, 0),
(4, 'john', 'john', 'john', '+255768128197', '2020', 't/ae/aa', '2020-12-14', 'Tanzania', 'Mlay', 'artist', 'Male', 2, 1, 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_standard_id` int(11) NOT NULL,
  `subject_school_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_standard_id`, `subject_school_id`) VALUES
(2, 'kiswahili', 1, 8),
(3, 'civics', 1, 8),
(5, 'history', 4, 8),
(6, 'history', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teachers_id` int(11) NOT NULL,
  `teachers_fname` varchar(100) NOT NULL,
  `teachers_mname` varchar(100) NOT NULL,
  `teachers_lname` varchar(100) NOT NULL,
  `teachers_mobile` varchar(100) NOT NULL,
  `teachers_gender` varchar(100) NOT NULL,
  `teachers_roles` varchar(100) NOT NULL,
  `teachers_email` varchar(100) NOT NULL,
  `teachers_password` varchar(100) NOT NULL,
  `teachers_schools_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teachers_id`, `teachers_fname`, `teachers_mname`, `teachers_lname`, `teachers_mobile`, `teachers_gender`, `teachers_roles`, `teachers_email`, `teachers_password`, `teachers_schools_id`) VALUES
(4, 'Dorcas', 'E', 'Mlay', '081378748264', 'Female', 'Admin', 'dor@gmail.com', '$2y$10$rJnf2rGC5WKokdPRCJgezuIVOkajj2vQbCADo4XKhZ/BH6DEr6zJm', 8),
(5, 'Jose', 'Jose', 'Jose', '0987654321', 'Male', 'Admin', 'a@a.a', '111', 10),
(6, 'JOHN', 'JOHN', 'JOHN', '907986868', 'Male', 'Admin', 'john@gmail.com', '20000', 11),
(7, 'dssa', 'sad', 'sda', '+255768128197', 'Male', 'Normal', 'kelvinmlay18@gmail.com', '$2y$10$WJzA121rPppW8Blx7uEtx.Vk3rHHk0lyq9g0fUPOXyEOfa0QYeAj.', 13),
(8, 'GOYI', 'GOYI', 'GOYI', '812987418964981', 'Male', 'Admin', 'goyi@gmail.com', '$2y$10$Dw9xUpIe89mzKde50O6qruGERR5dDpMKK5s.0SOZvFJNZORwnVKWa', 14),
(9, 'testone', 'testone', 'testone ', '+255768128197', 'Male', 'Admin', 'testone@gmail.com', '$2y$10$xMA/UjDmSDXeDj8.I5MAleXh1QrVgYoKfugfZzobZIafpfbPQf.ga', 8),
(10, 'k', 'k', 'k', '08763762361', 'Male', 'Admin', 'k@gmail.com', '$2y$10$qDZSIb6wNejxUNqmGV5uruMBPTJGdMG9p28MQCzA9kQbIbUjgvc/6', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `limit`
--
ALTER TABLE `limit`
  ADD PRIMARY KEY (`limit_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schools_id`);

--
-- Indexes for table `standards`
--
ALTER TABLE `standards`
  ADD PRIMARY KEY (`standards_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`students_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teachers_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign`
--
ALTER TABLE `assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `limit`
--
ALTER TABLE `limit`
  MODIFY `limit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schools_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `standards`
--
ALTER TABLE `standards`
  MODIFY `standards_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `students_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teachers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
