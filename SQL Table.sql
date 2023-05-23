-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-05-13 14:12:50
-- 服务器版本： 10.4.27-MariaDB
-- PHP 版本： 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `clinic`
--

-- --------------------------------------------------------

--
-- 表的结构 `appointment`
--

CREATE TABLE `appointment` (
  `appt_id` varchar(7) DEFAULT NULL,
  `patient_id` varchar(5) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phone_num` varchar(13) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `doc_name` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `possition` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `appointment`
--

INSERT INTO `appointment` (`appt_id`, `patient_id`, `username`, `phone_num`, `date`, `time`, `reason`, `pattern`, `doc_name`, `status`, `possition`) VALUES
('A00003', 'P001', 'Lee ka xiang', '0123036668', '2023-05-19', '11:00', 'AnnualPhysicals', 'Home Visit', 'S003', 'Active', 'Pending'),
('A00003', 'P001', 'Lee ka xiang', '0123036668', '2023-05-19', '11:00', 'AnnualPhysicals', 'Home Visit', 'S003', 'Active', 'Pending'),
('A00004', 'P001', 'Lee ka xiang', '0123036668', '2023-05-13', '1pm-2pm', 'Vaccinations', 'Walk in', 'S003', 'Done', 'Pending'),
('A00005', 'P001', 'Lee ka xiang', '0123036668', '2023-05-19', '1pm-2pm', 'Vaccinations', 'Walk in', 'S008', 'Active', 'Pending'),
('A00006', 'P001', 'Lee ka xiang', '0123036668', '2023-06-03', '11am-12pm', 'AnnualPhysicals', 'Walk in', 'S008', 'Active', 'Pending');

-- --------------------------------------------------------

--
-- 表的结构 `bot`
--

CREATE TABLE `bot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `bot`
--

INSERT INTO `bot` (`id`, `queries`, `replies`) VALUES
(1, 'Hello', 'Hello Welcome To L&M Clinic Center'),
(3, 'It is avaible for any payment', 'Yes, we are using paypal to let the customer make payment.'),
(4, 'Today', 'bye'),
(5, 'Bye', 'Welcome Again'),
(9, 'How to make appointment', 'Step 1 Please login first as patient.\nStep 2 Select the doctor you want appointment .\nStep 3 Select the date and time you want.\nStep 4 You can check the appointment date from the patient profile.'),
(10, 'Hello', 'Welcome to our clinic ');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(5) DEFAULT NULL,
  `product_list` varchar(20) DEFAULT NULL,
  `patient_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`cart_id`, `product_list`, `patient_id`) VALUES
('C0000', 'Cotton pad,cough dro', 'P000'),
('C0001', 'cough drop bena,Cott', 'P000'),
('C0002', 'cough_drop,cough dro', 'P000'),
('C0003', 'cough drop bena,', 'P000'),
('C0004', 'Cotton pad,', 'P000'),
('C0005', 'Cotton pad,', 'P000'),
('C0006', 'Cotton pad,cough dro', 'P001');

-- --------------------------------------------------------

--
-- 表的结构 `doctor`
--

CREATE TABLE `doctor` (
  `doctorId` varchar(5) DEFAULT NULL,
  `doctorName` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Phone` varchar(200) DEFAULT NULL,
  `Age` varchar(200) DEFAULT NULL,
  `specialization` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `created_datetime` varchar(200) DEFAULT NULL,
  `StaffImage` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `doctor`
--

INSERT INTO `doctor` (`doctorId`, `doctorName`, `Password`, `Email`, `Address`, `Phone`, `Age`, `specialization`, `Status`, `created_datetime`, `StaffImage`) VALUES
('D001', 'qwe', 'qwe', 'nic3568@gmail.com', '123', '123', '123', 'qwe', 'qwe', '09-05-2023 10:32:46', '../Image/20221114_135211.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `medical`
--

CREATE TABLE `medical` (
  `id` int(11) UNSIGNED NOT NULL,
  `StaffId` varchar(100) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `Patient_Name` varchar(100) NOT NULL,
  `Patient_Id` varchar(20) NOT NULL,
  `appt_id` varchar(6) NOT NULL,
  `Services` varchar(100) NOT NULL,
  `Charge` double NOT NULL,
  `Details` varchar(255) NOT NULL,
  `B_Pressure` varchar(20) NOT NULL,
  `B_Temperature` varchar(20) NOT NULL,
  `Medical` varchar(255) NOT NULL,
  `Medical1` varchar(100) NOT NULL,
  `Medical2` varchar(100) NOT NULL,
  `ChargeMedical` double NOT NULL,
  `ChargeMedical1` double NOT NULL,
  `ChargeMedical2` double NOT NULL,
  `Time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `medical`
--

INSERT INTO `medical` (`id`, `StaffId`, `StaffName`, `Patient_Name`, `Patient_Id`, `appt_id`, `Services`, `Charge`, `Details`, `B_Pressure`, `B_Temperature`, `Medical`, `Medical1`, `Medical2`, `ChargeMedical`, `ChargeMedical1`, `ChargeMedical2`, `Time`) VALUES
(2, 'S012', 'qwe', 'qwe', 'P000', 'A00000', 'Vaccinations', 100, 'qwe', 'qwe', 'qwe', 'Panadol', 'ZamBuk', 'Cotton Pad', 20, 15, 30, '09-05-23 23:19:25'),
(6, 'S012', 'qwe', 'we', 'P000', 'A0002', 'Vaccinations', 100, 'wer', 'qwe', 'wer', 'ZamBuk', 'ZamBuk', 'Cotton Pad', 15, 15, 30, '10-05-23 01:08:57'),
(7, 'S010', 'Tan Dian Yao', 'Lee Ka Xiang', 'P001', 'A00003', 'Annual Physicals', 50, 'Stick', '120 md/pc', '37C', 'Panadol', 'Antibiotic', '-', 20, 50, 0, '10-05-23 03:40:40'),
(8, 'S001', 'Tan Ling Lingwww', 'Tan Dian Yao', 'P001', 'A00006', 'Vaccinations', 100, 'take vaccin', '120 md/pc', '37C', 'Antibiotic', '-', '-', 50, 0, 0, '12-05-23 11:56:36');

-- --------------------------------------------------------

--
-- 表的结构 `patient`
--
-- 读取表 clinic.patient 的结构时出错： #1932 - Table &#039;clinic.patient&#039; doesn&#039;t exist in engine
-- 读取表 clinic.patient 的数据时发生错误： #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `clinic`.`patient`&#039; at line 1

-- --------------------------------------------------------

--
-- 表的结构 `patients`
--

CREATE TABLE `patients` (
  `patient_id` varchar(5) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(13) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `ic_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_num` varchar(255) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `patients`
--

INSERT INTO `patients` (`patient_id`, `password`, `username`, `gender`, `ic_number`, `email`, `phone_num`, `address`, `age`) VALUES
('P000', 'asd123', 'Tan Dian Yaoq', 'Male', '0123-45-678915', 'ngpl-wm19@student.tarc.edu.my', '0123036668', 'Prima Setapak Condom', '12'),
('P001', '123456', 'Lee ka xiang', 'Male', '0123-45-678915', 'kakaxiang181@gmail.com', '0123036668', 'Prima Setapak Condom', '20');

-- --------------------------------------------------------

--
-- 表的结构 `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(5) DEFAULT NULL,
  `patient_id` varchar(5) DEFAULT NULL,
  `cart_id` varchar(5) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `paymentTime` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `payment`
--

INSERT INTO `payment` (`payment_id`, `patient_id`, `cart_id`, `total_price`, `paymentTime`, `status`) VALUES
('P0000', 'P000', 'C0000', 65, '2023-05-10', '1'),
('P0001', 'P001', 'C0006', 130, '2023-05-10', '1'),
('P0002', 'P002', 'C0008', 15, '2023-05-13', '1'),
('P0003', 'P002', 'C0012', 55, '2023-05-13', '1');

-- --------------------------------------------------------

--
-- 表的结构 `paymentdetail`
--

CREATE TABLE `paymentdetail` (
  `payment_id` varchar(11) NOT NULL,
  `productName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `paymentdetail`
--

INSERT INTO `paymentdetail` (`payment_id`, `productName`) VALUES
('462554', 'Cotton pad'),
('462554', 'cough drop bena'),
('462554', 'cough_drop'),
('285760', 'cough drop bena'),
('285760', 'Cotton pad'),
('285760', 'cough_drop'),
('406455', 'cough_drop'),
('406455', 'cough drop bena'),
('406455', 'Cotton pad'),
('333647', 'cough drop bena'),
('628108', 'Cotton pad'),
('459887', 'Cotton pad'),
('742839', 'Cotton pad'),
('742839', 'cough drop bena');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `StaffId` varchar(11) NOT NULL,
  `ProductId` varchar(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductDetails` varchar(255) NOT NULL,
  `ProductPrices` double NOT NULL,
  `ProductImage` varchar(255) NOT NULL,
  `AddTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`StaffId`, `ProductId`, `ProductName`, `ProductDetails`, `ProductPrices`, `ProductImage`, `AddTime`) VALUES
('S010', 'P008', 'Angry', 'Angry', 15, '../Image/angry (2).jpg', '10-05-2023 03:46:20'),
('S003', 'P003', 'Cotton pad', 'Cotton pads are pads made of cotton which are used for medical or cosmetic purposes. For medical purposes, cotton pads are used to stop or prevent bleeding from minor punctures such as injections or venipuncture. They may be secured in place with tape.', 15, '../Image/cotton pad.jpg', '2022-12-20 01:57:21'),
('S003', 'P005', 'cough drop bena', 'Diphenhydramine Hydrochloride is an antihistamine that works by blocking a certain natural substance (histamine) that your body makes during an allergic reaction. Its drying effects are caused by blocking another natural substance made by your body (acety', 25, '../Image/cough_drop1.jpg', '2022-12-20 02:08:41'),
('S003', 'P004', 'cough_drop', 'Coughs always seem to materialize at the worst possible times—in the middle of an interview, while you’re taking a test, or right after boarding a plane. And it doesn’t really matter whether the cough is due to a simple tickle in your throat, airborne all', 25, '../Image/cough_drop.jpg', '2022-12-20 01:58:46'),
('S003', 'P006', 'cough_drop1', 'Diphenhydramine Hydrochloride is an antihistamine that works by blocking a certain natural substance (histamine) that your body makes during an allergic reaction. Its drying effects are caused by blocking another natural substance made by your body (acety', 25, '../Image/cough_drop.jpg', '2022-12-20 02:13:17'),
('S001', 'P001', 'Panaldo', 'Panadol Tablets provide gentle relief of aches and pains, such as headaches, migraines, sore throats and dental pain. The tablets are round and, because they are film-coated, are easier to swallow. It’s also comforting to know that Panadol Regular is also', 10, '../Image/Panadol.jpg', '2022-12-16 16:16:56'),
('S001', 'P002', 'Panaldo soluble', 'Panadol Tablets provide gentle relief of aches and pains, such as headaches, migraines, sore throats and dental pain. The tablets are round and, because they are film-coated, are easier to swallow. It’s also comforting to know that Panadol Regular is also', 20, '../Image/Panadol_Soluble.jpg', '2022-12-16 19:48:20');

-- --------------------------------------------------------

--
-- 表的结构 `resetpassword`
--

CREATE TABLE `resetpassword` (
  `rpId` int(6) NOT NULL,
  `rpEmail` varchar(20) DEFAULT NULL,
  `rpToken` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `resetpassword`
--

INSERT INTO `resetpassword` (`rpId`, `rpEmail`, `rpToken`) VALUES
(3, 'kakaxiang181@gmail.c', '$2y$10$XIYQpII5J81Vi5GG95tr9e16DmLdVGr.KrTeu5Jb701PZsZ1fi6SO'),
(4, 'ngpl-wm19@student.ta', '$2y$10$krMq3rebyR8g5ZbeF4OYKOs8rWdZ7D.QIqKdJBcAdr1bXAugTFS4K'),
(5, 'ngpl-wm19@student.ta', '$2y$10$EcOr8BR44vAavZS/fREm9O.w2S32Em.BSNDCuOQTfHoZVz2SXSeTy'),
(6, 'kakaxiang181@gmail.c', '$2y$10$U0PoaYAgtttAuk7OfF4a0OCVaKqxI.d0W4x5zI2JiBXMmQmwbx36u');

-- --------------------------------------------------------

--
-- 表的结构 `servicecharges`
--

CREATE TABLE `servicecharges` (
  `Payment_service_id` varchar(5) DEFAULT NULL,
  `doctorId` varchar(11) DEFAULT NULL,
  `appt_id` varchar(7) DEFAULT NULL,
  `patient_id` varchar(10) DEFAULT NULL,
  `total_price` double DEFAULT NULL,
  `paymentTime` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `servicecharges`
--

INSERT INTO `servicecharges` (`Payment_service_id`, `doctorId`, `appt_id`, `patient_id`, `total_price`, `paymentTime`, `status`) VALUES
('SC000', 'S001', 'A00001', 'P002', 120, '2023-05-13', 'Paid'),
('SC001', 'S001', 'A00000', 'P002', 100, '2023-05-13', 'Paid'),
('SC002', 'S001', 'A00002', 'P001', 120, '13-05-2023 09:32:48', 'Unpaid');


-- --------------------------------------------------------

--
-- 表的结构 `staff`
--

CREATE TABLE `staff` (
  `StaffId` varchar(11) NOT NULL,
  `StaffName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Phone` varchar(100) NOT NULL,
  `Age` int(11) NOT NULL,
  `Possition` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `StaffImage` varchar(100) NOT NULL,
  `created_datetime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `staff`
--

INSERT INTO `staff` (`StaffId`, `StaffName`, `Password`, `Email`, `Address`, `Phone`, `Age`, `Possition`, `Status`, `StaffImage`, `created_datetime`) VALUES
('S001', 'Tan Ling Lingwww', 'S001', 'Tanll181@gmail.com', 'Prima Setapak Condominium, Taman Setapak, 53100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '0127399123', 23, 'Staff', 'Active', '../Image/Staff2.jpg', '2022-12-16 15:24:05'),
('S003', 'Tan Mei Mei', 'S003', 'kakaxiang181@gmail.com', 'Prima Setapak Condominium, Taman Setapak, 53100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '0127399869', 23, 'Staff', 'Active', '../Image/Staff3.png', '2022-12-20 01:55:02'),
('S008', 'Ang Hougi', 'S008', 'anghg-wm19@student.tarc.edu.my', 'Jalan Senai', '0123789456', 21, 'Staff', 'Active', '../Image/Staff2.jpg', '2022-12-19 17:26:37'),
('S010', 'Tan Dian Yao', 'tan1234', 'kakaxiang181@gmail.com', 'Prima Setapak Condominium, Taman Setapak, 53100 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur', '0123036668', 21, 'Staff', 'Active', '../Image/tan.png', '10-05-2023 03:38:37'),
('S011', 'Tan Dian Yao', 'tan123', 'akiyao@gmail.com', 'No 2 Jalan Kasturi 1 Kasturi Height Bandar baru nilai', '0123013886', 23, 'Staff', 'Active', '../Image/Doctor1.jpg', '03-05-2023 14:47:17');

--
-- 转储表的索引
--

--
-- 表的索引 `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductName`),
  ADD KEY `StaffId` (`StaffId`);

--
-- 表的索引 `resetpassword`
--
ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`rpId`);

--
-- 表的索引 `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffId`),
  ADD KEY `StaffName` (`StaffName`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bot`
--
ALTER TABLE `bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `resetpassword`
--
ALTER TABLE `resetpassword`
  MODIFY `rpId` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 限制导出的表
--

--
-- 限制表 `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`StaffId`) REFERENCES `staff` (`StaffId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
