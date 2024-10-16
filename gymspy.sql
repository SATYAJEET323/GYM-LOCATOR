-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 06:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymspy`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `sno` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `contact_number` char(10) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `name`, `location`, `info`, `created_at`, `address`, `price`, `contact_number`, `image`) VALUES
(23, 'Fitness Zone', 'Seawoods', 'Fitness Zone is a state-of-the-art gym facility located in the heart of Seawoods. We offer a wide range of fitness equipment, including cardio machines, weightlifting equipment, and group exercise classes. Our experienced trainers are dedicated to helping you achieve your fitness goals in a supportive and motivating environment. Whether you\'re a beginner or an experienced athlete, Fitness Zone has something for everyone. Join us today and start your journey to a healthier, fitter you!', '2024-03-17 07:32:15', ' Sunrise Building, Sector 19, Seawoods, Navi Mumbai', 3000.00, '9890058956', 'uploads/img1.png'),
(24, 'Watson Gym', 'Seawoods', 'Watson Fitness Center is a state-of-the-art gym located in the bustling area of Seawoods. With top-of-the-line equipment, experienced trainers, and a motivating atmosphere, we aim to help individuals of all fitness levels achieve their health goals. Whether you\'re looking to lose weight, build muscle, or improve overall wellness, our friendly staff is dedicated to supporting you on your fitness journey. Come join us and experience the Watson difference!', '2024-03-17 09:27:10', ' Plot No. 3A, Sector 5, Seawoods, Navi Mumbai', 6000.00, '7898349812', 'uploads/img2.png'),
(25, 'Sweat n\' rise', 'Seawoods', 'Sweat n\' Rise Fitness Studio is a dynamic fitness center nestled in the heart of Seawoods. Our studio offers a diverse range of classes and training programs tailored to suit every fitness enthusiast\'s needs. From high-intensity interval training (HIIT) and yoga to strength training and cardio workouts, our experienced instructors are dedicated to helping you achieve your fitness goals. Join our vibrant community and elevate your fitness journey at Sweat n\' Rise!', '2024-03-17 09:32:25', 'Opp. L&amp;t Suntech high, Sector-35, Seawoods, Navi Mumbai', 9000.00, '8997867123', 'uploads/img3.png'),
(26, 'Turbo\'s Space', 'Kharghar', 'Turbo\'s Space Gym blends traditional workouts with futuristic tech for an unparalleled fitness experience. With cutting-edge equipment and virtual reality training, it\'s a hub for pushing physical limits. Motivating instructors and a supportive community foster growth for all fitness levels. Turbo\'s Space Gym is where innovation meets inspiration for reaching new heights in fitness', '2024-03-17 10:33:21', 'Under Orhids CHS Basement, Plot no:10, Sector-21,    Kharghar, Navi Mumbai ', 4000.00, '7045264201', 'uploads/img4.png'),
(27, 'Nice gym', 'Kharghar', 'Wow Lookung gyym', '2024-03-25 17:47:29', 'Good kharghar', 3000.00, '58', 'uploads/img9.png'),
(28, 'Tat gym', 'Belapur', 'Wow Waah gym', '2024-03-27 10:38:15', 'Excellent building', 4000.00, '0', 'uploads/img6.png'),
(29, 'reet gym', 'Mansarovar', 'batata', '2024-03-27 10:41:44', 'Waah waah agon', 2350.00, '4', 'uploads/img8.png'),
(30, 'Fitzone Mansarovar', 'Belapur', 'Good and Great gym for all', '2024-03-28 06:04:01', 'Sector-34,Mansarovar', 5600.00, '7', 'uploads/img7.png'),
(31, 'Fitzone Mansarovar', 'Belapur', 'Good and Great gym for all', '2024-03-28 06:08:35', 'Sector-34,Mansarovar', 5600.00, '7', 'uploads/img1.png'),
(32, 'ert gym', 'Kharghar', 'best gym', '2024-03-28 10:16:11', 'Sad', 6700.00, '2', 'uploads/imgg9.png'),
(33, 'abC GYM', 'Nerul', 'Good', '2024-03-28 10:23:31', 'Nerul', 6700.00, NULL, 'uploads/img2.png'),
(34, 'abC GYM', 'Nerul', 'Good', '2024-03-28 10:26:07', 'Nerul', 6700.00, NULL, 'uploads/img2.png'),
(35, 'Sunshine gym', 'Mansarovar', 'Great gym', '2024-04-02 10:55:39', 'Mansarover heights,Mansarover station', 3400.00, NULL, 'uploads/img8.png'),
(36, 'Saturn gym', 'Belapur', 'Best gym in belapur', '2024-04-02 11:11:43', '6787340923', 2100.00, NULL, 'uploads/img1.png'),
(37, 'Saturn gym', 'Belapur', 'Best gym in belapur', '2024-04-02 11:16:53', 'Belapur', 2100.00, NULL, 'uploads/img1.png'),
(38, 'Saturn gym', 'Belapur', 'Best gym in belapur', '2024-04-02 11:16:53', 'Belapur', 2100.00, NULL, 'uploads/img1.png'),
(39, 'Sample Gym', 'Sample Location', 'Sample Info', '2024-04-02 11:20:26', '123 Sample St', 5000.00, '1234567890', 'img1.png'),
(40, 'Saturn gym', 'Seawoods', 'Best gym in belapur', '2024-04-02 11:25:25', 'Belapur', 2100.00, '9823673456', 'uploads/img1.png'),
(41, 'gata', 'Nerul', 'good', '2024-04-03 07:24:50', 'kharghar pada', 5000.00, '1234567890', 'uploads/img10.png'),
(42, 'haa', 'Nerul', 'good and perfect', '2024-04-03 11:50:39', 'kharghar', 2000.00, '1236547890', 'uploads/img8.png'),
(43, 'DESAI Fitness center', 'Mansarovar', 'The best gym in allover area', '2024-04-07 10:17:07', 'near railway station', 9999.00, '8668689383', 'uploads/img1.png');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`name`, `email`, `phone`, `password`, `gender`, `id`) VALUES
('user kaka', 'user123@gmail.com', 2147483647, '123456', 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `password` varchar(11) NOT NULL,
  `gender` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `gender`) VALUES
(1, 'Satyajeet Desai', 'sattudesai007@gmail.co', '$2y$10$87Uu', 'male'),
(2, 'Satyajeet Desai', 'sattudesai@gmail.com', '123456789', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
