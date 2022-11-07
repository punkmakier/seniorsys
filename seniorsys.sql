-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 11:53 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seniorsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `AccountRole` varchar(50) NOT NULL DEFAULT 'Admin',
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `EmpID` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `PhoneNo` varchar(50) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `DateRegistered` datetime NOT NULL DEFAULT current_timestamp(),
  `LastUpdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `AccountRole`, `LastName`, `FirstName`, `MiddleName`, `Position`, `EmpID`, `Email`, `PhoneNo`, `Username`, `Password`, `DateRegistered`, `LastUpdate`) VALUES
(5, 'Admin', 'Gabales', 'Mark Allen', 'G', 'Software Developer', '123-456-3', 'carbamark@gmail.com', '+639471559441', 'Carba', '4297f44b13955235245b2497399d7a93', '2022-11-07 18:09:12', '0000-00-00 00:00:00'),
(8, 'Admin', 'Caban', 'Louis', 'Sha', 'Head Department', '156-664', 'caban@gmail.com', '+63 9645415', 'Caban', '4297f44b13955235245b2497399d7a93', '2022-11-07 22:14:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `PostedBy` varchar(50) NOT NULL,
  `PostedByPosition` varchar(50) NOT NULL,
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `Title`, `Description`, `PostedBy`, `PostedByPosition`, `DateCreated`) VALUES
(22, 'test', 'test', 'Mark Allan L. Carba', 'Software Engineer', '2022-11-07 21:37:01'),
(23, 'This is Title Announcement Test', 'This is Description Announcement Test Only!!...', 'Mark Allan L. Carba', 'Software Engineer', '2022-11-07 22:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `MessageBy` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Unread',
  `DateCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `Subject`, `Description`, `MessageBy`, `Status`, `DateCreated`) VALUES
(1, '', '0', '20221106-636794dc98a1c', 'Unread', '2022-11-06 22:34:59'),
(3, 'Hello', '0', 'Dracula D Drac ', 'Unread', '2022-11-06 22:42:02'),
(4, 'heh', '0', 'Dracula D Drac ', 'Unread', '2022-11-06 22:43:16'),
(5, 'jhsd', 'sdjskgyklghjkghjk', 'Dracula D Drac ', 'Unread', '2022-11-06 22:43:41'),
(6, 'Hello This is just a Test', 'Body Test 1', 'Lourence Catong Mayonila ', 'Unread', '2022-11-07 01:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `reqpension`
--

CREATE TABLE `reqpension` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(255) NOT NULL,
  `SrCitId` varchar(255) NOT NULL,
  `ThreeSignature` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Pending',
  `DateRequested` datetime NOT NULL DEFAULT current_timestamp(),
  `DateApprove` datetime NOT NULL,
  `ApproveBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reqsrid`
--

CREATE TABLE `reqsrid` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(255) NOT NULL,
  `TwoByTwoPic` varchar(255) NOT NULL,
  `ValidIDBirthCert` varchar(255) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Pending',
  `DateRequested` datetime NOT NULL DEFAULT current_timestamp(),
  `DateApproved` datetime NOT NULL,
  `ApprovedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sremercontact`
--

CREATE TABLE `sremercontact` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(255) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `CellphoneNumber` varchar(100) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `SrEmerContactStatus` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sremercontact`
--

INSERT INTO `sremercontact` (`id`, `UserUniqueID`, `Lastname`, `FirstName`, `MiddleName`, `Address`, `CellphoneNumber`, `DateUpdated`, `SrEmerContactStatus`) VALUES
(3, '20221106-6367f27a20b27', 'Carba', 'Mark Allan', 'Laranjo', 'Lapu-lapu', '09364651515', '2022-11-07 01:47:25', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `srhealthissue`
--

CREATE TABLE `srhealthissue` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(100) NOT NULL,
  `CMIC` varchar(255) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `SrHealthIssueStatus` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `srhealthissue`
--

INSERT INTO `srhealthissue` (`id`, `UserUniqueID`, `CMIC`, `DateUpdated`, `SrHealthIssueStatus`) VALUES
(3, '20221106-6367f27a20b27', 'Others', '2022-11-07 01:46:54', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `srparterinfo`
--

CREATE TABLE `srparterinfo` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(255) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Birthdate` varchar(100) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `EducAttainment` varchar(255) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `MonthlyIncome` varchar(255) NOT NULL,
  `DateUpdated` datetime NOT NULL,
  `SrPartnerInfoStatus` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `srparterinfo`
--

INSERT INTO `srparterinfo` (`id`, `UserUniqueID`, `LastName`, `FirstName`, `MiddleName`, `Birthdate`, `Age`, `EducAttainment`, `Occupation`, `MonthlyIncome`, `DateUpdated`, `SrPartnerInfoStatus`) VALUES
(4, '20221106-6367f27a20b27', 'Carba', 'Eloisa', 'Gabales', '2015-03-01', '20', 'High School Graduate', 'Housewife', '5000', '2022-11-07 01:46:33', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `srpersonalinfo`
--

CREATE TABLE `srpersonalinfo` (
  `id` int(11) NOT NULL,
  `UserUniqueID` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `MiddleName` varchar(100) NOT NULL,
  `Birthdate` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `CellphoneNo` varchar(50) NOT NULL,
  `BirthCert` text NOT NULL,
  `BrgyClear` text NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Status` varchar(10) NOT NULL DEFAULT 'Unverified',
  `DateRegistered` datetime NOT NULL DEFAULT current_timestamp(),
  `PlaceOfBirth` varchar(255) NOT NULL,
  `Age` varchar(20) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `EducAttainment` varchar(100) NOT NULL,
  `VoterStatus` varchar(20) NOT NULL,
  `CivilStatus` varchar(50) NOT NULL,
  `Citizenship` varchar(50) NOT NULL,
  `Religion` varchar(100) NOT NULL,
  `TeleNumber` varchar(50) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `MonthlyIncome` varchar(255) NOT NULL,
  `UpdatedAt` datetime NOT NULL,
  `BasicInfoStatus` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `srpersonalinfo`
--

INSERT INTO `srpersonalinfo` (`id`, `UserUniqueID`, `LastName`, `FirstName`, `MiddleName`, `Birthdate`, `Address`, `Email`, `CellphoneNo`, `BirthCert`, `BrgyClear`, `Username`, `Password`, `Status`, `DateRegistered`, `PlaceOfBirth`, `Age`, `Gender`, `EducAttainment`, `VoterStatus`, `CivilStatus`, `Citizenship`, `Religion`, `TeleNumber`, `Occupation`, `MonthlyIncome`, `UpdatedAt`, `BasicInfoStatus`) VALUES
(4, '20221106-636755577ef18', 'Carba ', 'Mark Allan ', 'Laranjo', '1999-03-01', 'basdiot, moalboal cebu', 'catong@gmail.com', '09471559441', 'BirthCertificate-636755577ef268.92636731.png', 'BrgyClearance-636755577f1b65.33672253.gif', 'catong1', '4297f44b13955235245b2497399d7a93', 'Unverified', '2022-11-06 14:33:59', '', '', '- Select -', '', '- Select -', '- Select -', '', '', '', '', '', '2022-11-06 16:23:56', 'Yes'),
(5, '20221106-636755b0414fd', 'Carba ', 'Mark Allan ', 'Laranjo', '1999-03-01', 'basdiot, moalboal cebu', 'catong@gmail.com', '09471559441', 'BirthCertificate-636755b04150c9.47023639.gif', 'BrgyClearance-636755b0415215.13480517.gif', 'catong1', '4297f44b13955235245b2497399d7a93', 'Unverified', '2022-11-06 14:35:28', '', '', '- Select -', '', '- Select -', '- Select -', '', '', '', '', '', '2022-11-06 16:23:56', 'Yes'),
(10, '20221106-6367f27a20b27', 'Mayonila', 'Lourence', 'Catong', '2013-01-01', 'Cebu, Lahug', 'catong@gmail.com', '092564648412', 'BirthCertificate-6367f27a20b385.98056606.gif', 'BrgyClearance-6367f27a20b425.67873579.png', 'catong2', '202cb962ac59075b964b07152d234b70', 'Verified', '2022-11-07 01:44:26', 'Mandaue', '23', 'Male', 'College Graduate', 'Yes', 'Single', 'Filipino', 'Roman Catholic', '+63 996441', 'Software Engineer', '25000', '2022-11-07 01:45:47', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqpension`
--
ALTER TABLE `reqpension`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reqsrid`
--
ALTER TABLE `reqsrid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sremercontact`
--
ALTER TABLE `sremercontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srhealthissue`
--
ALTER TABLE `srhealthissue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srparterinfo`
--
ALTER TABLE `srparterinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srpersonalinfo`
--
ALTER TABLE `srpersonalinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reqpension`
--
ALTER TABLE `reqpension`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reqsrid`
--
ALTER TABLE `reqsrid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sremercontact`
--
ALTER TABLE `sremercontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `srhealthissue`
--
ALTER TABLE `srhealthissue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `srparterinfo`
--
ALTER TABLE `srparterinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `srpersonalinfo`
--
ALTER TABLE `srpersonalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
