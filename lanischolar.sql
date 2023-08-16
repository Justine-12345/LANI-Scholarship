-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 10:33 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanischolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `adminFirstName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminLastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminMiddleName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminPassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminAddressline` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminBirthDate` date NOT NULL,
  `adminStatus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adminId`, `adminFirstName`, `adminLastName`, `adminMiddleName`, `adminPassword`, `adminEmail`, `adminAddressline`, `adminBirthDate`, `adminStatus`, `username`, `userTitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'zdfsd', 'sdfsd', 'sdfsd', 'sdf', 'sdfsd', 'sdfsd', '2021-04-19', 'banned', 'sfsdf', 'sdfs', NULL, '2021-04-29 04:47:36', NULL),
(2, 'nmb', 'bnmbn', 'mbnm', 'reewrwe', 'wqeqw1@dsas', 'vnbwerwe', '2021-04-30', 'member', 'nmb bnmbn', 'admin', '2021-04-27 09:39:09', '2021-04-28 07:46:11', NULL),
(3, 'admin1', 'adminS', 'adminM', '12345678', 'admin@gmail.com', 'adminAddress', '2021-04-30', 'member', 'admin1 adminS', 'admin', '2021-04-27 17:24:38', '2021-04-29 04:49:10', NULL),
(4, 'admin1', 'asdsa', 'asd', '$2y$10$FK0oPszYTwxdjtmMj0y/w.aw/dRwUocJcxA9R5MdxS70EE7AToDbW', 'wqeqw2@dsas', 'adminAddress', '2021-04-28', 'member', 'admin1 asdsa', 'admin', '2021-04-27 17:57:24', '2021-04-29 02:20:23', NULL),
(5, 'admin1', 'asdsa', NULL, '$2y$10$bXqQaD./DIF1INtsXn7BU.DbCtexPmbRw3ilB81FgzNDe7RULQjAm', 'wqeqw@dsas', 'adminAddress', '2021-04-28', 'new', 'admin1 asdsa', 'admin', '2021-04-27 17:59:08', '2021-04-27 17:59:08', NULL),
(6, 'Justine', 'Castaneda', 'Sarabia', '$2y$10$SeDeT6NYBIGxzT9FOt2LBei9acqxYYMSCtI5Ck5Nq1cLeNZlQEwxq', 'castanedajustine09@gmail.com', 'adminAddress', '2021-04-28', 'main', 'Justine Castaneda', 'admin', '2021-04-27 19:20:06', '2021-05-02 06:14:55', NULL),
(7, 'admin1', 'adminS', NULL, '$2y$10$Fi4QsvjHMfmNRr9/C5zo.OZW5xX3tgjqA5mrIm7.gqySX646xzSpa', 'email@gmail.com', 'adminAddress', '2021-04-28', 'member', 'admin1 adminS', 'admin', '2021-04-28 02:00:47', '2021-04-28 07:46:24', NULL),
(8, 'admin1', 'asdsa', NULL, '$2y$10$wCsG4MHoeOLY/nBHiMsBW.EdcqniXtbgMdL/tSzzZC3ETdL8Z/1FO', 'asdasdas@gmail.com', 'adminAddress', '2021-05-09', 'new', 'admin1 asdsa', 'admin', '2021-05-08 22:53:49', '2021-05-08 22:53:49', NULL),
(9, 'admin1', 'asdsa', 'zxczx', '$2y$10$Zty5FneZs4EoZt1CRdcxnufNPKzDfoUDlhVq70Qei/bq5Zi9KHxdO', 'adasdsa@zxczx', 'adminAddress', '2021-05-09', 'new', 'admin1 asdsa', 'admin', '2021-05-08 22:56:03', '2021-05-08 22:56:03', NULL),
(10, 'sadas', 'asdsa', NULL, '$2y$10$a.Nq.BMMfXbXg7G7WbwuLeT.FE1aa3/p/mSkPSFgb97jMVUtfESni', 'sfsdfsd@dsas', 'zxczxc', '2021-05-09', 'new', 'sadas asdsa', 'admin', '2021-05-08 23:15:03', '2021-05-08 23:15:03', NULL),
(11, 'admin1', 'asdsa', 'dasdas', '$2y$10$ENKs/sat66WBNMfk6Ju5IOjVaxOcy8OgITFo8Ayj1DSa8Lx/zYYhy', 'harrisgurion8@gmail.com', 'adminAddress', '2021-05-09', 'new', 'admin1 asdsa', 'admin', '2021-05-08 23:36:43', '2021-05-08 23:36:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementId` bigint(20) UNSIGNED NOT NULL,
  `announcementImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `announcementDate` date NOT NULL,
  `announcementContent` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementId`, `announcementImage`, `announcementDate`, `announcementContent`, `adminId`, `created_at`, `updated_at`) VALUES
(1, 'homeAssets/img/aa.png', '2021-04-28', 'dfgdfgdfgdfgdfgdfgdgfdg', 6, NULL, NULL),
(2, NULL, '2021-04-28', 'sadasdsa', 5, NULL, NULL),
(3, NULL, '2021-04-28', 'asdasdasdas', 4, NULL, NULL),
(9, NULL, '2021-05-05', 'Pasahan na po ng requiements', 6, '2021-05-04 23:46:55', '2021-05-04 23:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `applicationScholarStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationIdPicture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationScholarType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationEnrollmentForm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationReportCard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationDiploma` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationGoodMoral` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationSchoolId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationAcademicExcellence` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationVotersCertificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationVotersCertificateP` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationBirthCertificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationOtherDocs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED NOT NULL,
  `applicationSubmitDate` date DEFAULT NULL,
  `applicationApplicant` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationApplicantParent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationNumOfEdit` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationId`, `applicationScholarStatus`, `applicationIdPicture`, `applicationScholarType`, `applicationEnrollmentForm`, `applicationReportCard`, `applicationDiploma`, `applicationGoodMoral`, `applicationSchoolId`, `applicationAcademicExcellence`, `applicationVotersCertificate`, `applicationVotersCertificateP`, `applicationBirthCertificate`, `applicationOtherDocs`, `scholarId`, `applicationSubmitDate`, `applicationApplicant`, `applicationApplicantParent`, `applicationNumOfEdit`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'SUC/LCU', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 1, '2021-04-27', 'asdasd', 'sdsd', 1, '2021-04-18 23:28:25', '2021-04-29 23:16:56', NULL),
(2, 'new', 'batch-1_sem-1_year-2020-2021_0.gif|', 'Basic Plus', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|batch-1_sem-1_year-2020-2021_2.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|batch-1_sem-1_year-2020-2021_2.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|batch-1_sem-1_year-2020-2021_2.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|batch-1_sem-1_year-2020-2021_2.jpg|', 'batch-1_sem-1_year-2020-2021_0.png|batch-1_sem-1_year-2020-2021_1.png|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|batch-1_sem-1_year-2020-2021_2.jpg|', 'batch-1_sem-1_year-2020-2021_0.png|batch-1_sem-1_year-2020-2021_1.png|', 'batch-1_sem-1_year-2020-2021_0.png|batch-1_sem-1_year-2020-2021_1.png|', 1, '2021-04-19', 'Phase 2', 'sdsd', 0, '2021-04-19 01:10:35', '2021-04-30 02:04:16', NULL),
(3, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-1_year-2020-2021_0.png|', 'batch-1_sem-1_year-2020-2021_0.png|', 'batch-1_sem-1_year-2020-2021_0.png|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 'batch-1_sem-1_year-2020-2021_0.gif|', 1, '2021-04-19', 'Phase 2', 'sdsd', 0, '2021-04-19 01:19:32', '2021-04-30 02:12:45', NULL),
(7, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.jpeg|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.png|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.jpeg|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.png|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|batch-1_sem-1_year-2020-2021_1.png|batch-1_sem-1_year-2020-2021_2.png|batch-1_sem-1_year-2020-2021_3.jpeg|', 9, '2021-05-02', 'Justine S. Castaneda', 'Daisy Castaneda', 0, '2021-05-02 00:39:11', '2021-05-02 00:39:11', NULL),
(8, 'renew', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'Honors', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|batch-1_sem-2_year-2020-2021_2.jpeg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpeg|batch-1_sem-2_year-2020-2021_2.jpg|batch-1_sem-2_year-2020-2021_3.jpg|', 9, '2021-05-02', 'Justine S. Castaneda', 'Daisy Castaneda', 0, '2021-05-02 01:07:51', '2021-05-02 01:07:51', NULL),
(9, 'new', 'batch-1_sem-1_year-2021-2022_0.jpg|', 'Basic Plus', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|batch-1_sem-1_year-2021-2022_2.jpg|', '', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 'batch-1_sem-1_year-2021-2022_0.gif|batch-1_sem-1_year-2021-2022_1.jpg|batch-1_sem-1_year-2021-2022_2.jpg|', 10, '2021-05-05', 'Justine Castaneda', 'Daisy S. Castaneda', 0, '2021-05-04 23:31:07', '2021-05-04 23:31:07', NULL),
(10, 'new', 'batch-1_sem-1_year-2021-2022_0.jpg|', 'Basic Plus', 'batch-1_sem-1_year-2021-2022_0.jpg|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 'batch-1_sem-1_year-2021-2022_0.jpg|batch-1_sem-1_year-2021-2022_1.gif|', 13, '2021-05-06', 'Phase 2', 'sdsd', 1, '2021-05-06 03:05:43', '2021-05-06 03:11:07', NULL),
(11, 'renew', 'batch-1_sem-2_year-2021-2022_0.gif|', 'Basic Plus', 'batch-1_sem-2_year-2021-2022_0.jpg|batch-1_sem-2_year-2021-2022_1.gif|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', '', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 'batch-1_sem-2_year-2021-2022_0.gif|batch-1_sem-2_year-2021-2022_1.jpg|', 13, '2021-05-06', 'Phase 2', 'sdsd', 1, '2021-05-06 03:29:55', '2021-05-06 03:45:54', NULL),
(12, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Honors', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', '', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '', 14, '2021-05-08', 'Justine Castaneda', 'Daisy S. Castaneda', 1, '2021-05-07 18:42:42', '2021-05-07 18:55:22', NULL),
(13, 'renew', 'batch-1_sem-2_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '', 14, '2021-05-08', 'Justine Castaneda', 'Daisy S. Castaneda', 0, '2021-05-07 20:03:03', '2021-05-07 20:03:03', NULL),
(14, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', '', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '', 15, '2021-05-08', 'Harris A. Gurion', 'Mother of Gurion', 1, '2021-05-07 21:59:36', '2021-05-07 22:08:52', NULL),
(15, 'renew', 'batch-1_sem-2_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '', 15, '2021-05-08', 'Harris A. Gurion', 'Mother of Gurion', 0, '2021-05-07 22:21:31', '2021-05-07 22:21:31', NULL),
(16, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Honors', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', '', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '', 16, '2021-05-09', 'Harris A. Gurion', 'Mother of Gurion', 1, '2021-05-09 03:52:46', '2021-05-09 04:05:29', NULL),
(17, 'renew', 'batch-1_sem-2_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '', 16, '2021-05-09', 'Harris A. Gurion', 'Mother of Gurion', 0, '2021-05-09 04:28:38', '2021-05-09 04:28:38', NULL),
(18, 'new', 'batch-1_sem-1_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|batch-1_sem-1_year-2020-2021_1.jpg|', '', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '', 17, '2021-05-10', 'Harris A. Gurion', 'Marian Gurion', 1, '2021-05-09 21:59:02', '2021-05-09 22:06:14', NULL),
(19, 'renew', 'batch-1_sem-2_year-2020-2021_0.png|', 'Basic Plus', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', '', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|batch-1_sem-2_year-2020-2021_1.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '', 17, '2021-05-10', 'Harris A. Gurion', 'Marian Gurion', 0, '2021-05-09 22:16:54', '2021-05-09 22:16:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` bigint(20) UNSIGNED NOT NULL,
  `commentContent` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentDate` date NOT NULL,
  `postId` bigint(20) UNSIGNED NOT NULL,
  `adminId` bigint(20) UNSIGNED DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentContent`, `commentDate`, `postId`, `adminId`, `scholarId`, `created_at`, `updated_at`) VALUES
(1, 'ok fine', '2021-04-19', 13, NULL, 1, '2021-04-19 06:30:25', '2021-04-19 06:30:25'),
(2, 'God Bless', '2021-04-19', 15, NULL, 1, '2021-04-19 07:04:14', '2021-04-19 07:04:14'),
(3, 'thank you po', '2021-04-19', 15, NULL, 1, '2021-04-19 07:06:06', '2021-04-19 07:06:06'),
(4, 'ok', '2021-04-19', 16, NULL, 1, '2021-04-19 07:07:02', '2021-04-19 07:07:02'),
(5, 'yes', '2021-04-19', 16, NULL, 1, '2021-04-19 07:07:15', '2021-04-19 07:07:15'),
(6, 'sdfsfdsfsd', '2021-04-07', 16, 1, NULL, NULL, NULL),
(11, 'dasdas', '2021-04-08', 16, NULL, 1, NULL, NULL),
(14, 'dfgdf', '2021-05-05', 29, NULL, 12, '2021-05-05 04:27:59', '2021-05-05 04:27:59'),
(16, 'sadsa', '2021-05-05', 29, NULL, 11, '2021-05-05 05:03:42', '2021-05-05 05:03:42'),
(17, 'adaw', '2021-05-05', 27, NULL, 11, '2021-05-05 05:09:22', '2021-05-05 05:09:22'),
(18, 'cvc', '2021-05-09', 29, 6, NULL, '2021-05-09 15:45:28', '2021-05-09 15:45:28'),
(19, 'xxcx', '2021-05-10', 30, 6, NULL, '2021-05-09 15:46:26', '2021-05-09 15:46:26'),
(20, 'zxz', '2021-05-09', 29, 6, NULL, '2021-05-09 15:52:07', '2021-05-09 15:52:07');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseId` bigint(20) UNSIGNED NOT NULL,
  `courseName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseLadderized` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseGwa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseYearLevel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseUnitsEnrolled` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseDuration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseGraduating` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseGraduatingHonor` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseNeededSemester` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseOthers` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `courseTransferee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courseShiftee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseId`, `courseName`, `courseLadderized`, `courseGwa`, `courseYearLevel`, `courseUnitsEnrolled`, `courseDuration`, `courseGraduating`, `courseGraduatingHonor`, `courseNeededSemester`, `courseOthers`, `courseTransferee`, `courseShiftee`, `applicationId`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', 'No', '3', '4th', '25', '5 Years', 'No', 'No', '1', 'Octoberian', NULL, NULL, 1, '2021-04-18 23:28:26', '2021-04-21 03:47:42'),
(2, 'BSIT', 'No', '3', '2nd', '12', '3 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 2, '2021-04-19 01:10:36', '2021-04-19 01:10:36'),
(3, 'BSIT', 'No', '3', '12', '14', '3 Years', 'No', 'No', '2', 'Regular', 'wqwq', 'wqwq', 3, '2021-04-19 01:19:33', '2021-04-19 01:19:33'),
(4, 'BSIT', 'No', '1', '2nd Year', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 7, '2021-05-02 00:39:12', '2021-05-02 00:39:12'),
(5, 'BSIT', 'No', '1', '2nd Year', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 8, '2021-05-02 01:07:52', '2021-05-02 01:07:52'),
(6, 'BSIT', 'No', '2', '2nd', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 9, '2021-05-04 23:31:07', '2021-05-04 23:31:07'),
(7, 'BSIT', 'No', '3', '2nd', '14', '3 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 10, '2021-05-06 03:05:43', '2021-05-06 03:05:43'),
(8, 'BSIT', 'No', '3', '2nd', '14', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 11, '2021-05-06 03:29:56', '2021-05-06 03:29:56'),
(9, 'BSIT', 'No', '2', '2nd', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 12, '2021-05-07 18:42:43', '2021-05-07 18:42:43'),
(10, 'BSIT', 'No', '2', '2nd', '14', '4 Years', 'No', 'No', '1', 'Regular', NULL, NULL, 13, '2021-05-07 20:03:04', '2021-05-07 20:03:04'),
(11, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 14, '2021-05-07 21:59:37', '2021-05-07 21:59:37'),
(12, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '1', 'Regular', NULL, NULL, 15, '2021-05-07 22:21:31', '2021-05-07 22:21:31'),
(13, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 16, '2021-05-09 03:52:46', '2021-05-09 03:52:46'),
(14, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '1', 'Regular', NULL, NULL, 17, '2021-05-09 04:28:39', '2021-05-09 04:28:39'),
(15, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '2', 'Regular', NULL, NULL, 18, '2021-05-09 21:59:03', '2021-05-09 21:59:03'),
(16, 'BSIT', 'No', '2', '2nd Year', '25', '4 Years', 'No', 'No', '1', 'Regular', NULL, NULL, 19, '2021-05-09 22:16:54', '2021-05-09 22:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educationId` bigint(20) UNSIGNED NOT NULL,
  `educationSHName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationSHType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationSHAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationSHGraduated` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationSHHonor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educationJHName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationJHType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationJHAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationJHGraduated` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationJHHonor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educationELName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationELType` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationELAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationELGraduated` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `educationELHonor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educationId`, `educationSHName`, `educationSHType`, `educationSHAddress`, `educationSHGraduated`, `educationSHHonor`, `educationJHName`, `educationJHType`, `educationJHAddress`, `educationJHGraduated`, `educationJHHonor`, `educationELName`, `educationELType`, `educationELAddress`, `educationELGraduated`, `educationELHonor`, `scholarId`, `created_at`, `updated_at`) VALUES
(4, 'wqwqw', 'Public', 'Phase 2', 'fdsf', 'asdas', 'wqwq', 'Public', 'Phase 2', 'qwqw', 'asda', 'wqwqwq', 'Public', 'Phase 2', 'dsds', 'asdas', 1, NULL, '2021-04-20 06:56:22'),
(5, 'adsada', 'dadad', 'adasd', 'dasda', 'asdad', 'adada', 'daasd', 'asdad', 'adada', 'asdad', 'adada', 'dada', 'asdad', 'asdasd', 'asdas', 1, NULL, NULL),
(6, 'asdad', 'asdasdsa', 'asdad', 'sada', 'asda', 'dada', 'dasdad', 'asdsa', 'dasdsa', 'asdsa', 'dasdadsas', 'dadada', 'aadas', 'dasdsa', 'asda', 1, NULL, NULL),
(7, 'GCA', 'Public', 'Taguig', '2007', 'with honor', 'PDMHS', 'Public', 'Taguig', '2015', NULL, 'KERIS', 'Public', 'Taguig', '20013', NULL, 9, '2021-05-02 00:39:13', '2021-05-02 00:39:13'),
(8, 'wqwqw', 'Public', 'Phase 2', 'wqwq', 'wqwq', 'wqwq', 'Public', 'sadas', 'qwqw', 'wqwqwq', 'wqwqwq', 'Public', 'asdasdas', 'dsds', NULL, 13, '2021-05-06 03:05:44', '2021-05-06 03:05:44'),
(9, 'GCA', 'Private', 'North Signal Taguig City', '2019', 'with honor', 'PDMHS', 'Public', 'North Signal Taguig City', '2017', NULL, 'KERIS', 'Public', 'Pinagsama Taguig City', '2013', NULL, 14, '2021-05-07 18:42:44', '2021-05-07 18:42:44'),
(10, 'GCA', 'Private', 'North signal Taguig City', '2019', 'with honor', 'PDMHS', 'Public', 'North Signal Taguig City', '2017', NULL, 'KERIS', 'Public', 'Pinagsama Taguig City', '2013', NULL, 15, '2021-05-07 21:59:37', '2021-05-07 21:59:37'),
(11, 'GCA', 'Private', 'North signal Taguig City', '2019', 'with honor', 'PDMHS', 'Public', 'North Signal Taguig City', '2017', NULL, 'KERIS', 'Public', 'Pinagsama Taguig City', '20013', NULL, 16, '2021-05-09 03:52:47', '2021-05-09 03:52:47'),
(12, 'GCA', 'Private', 'North signal Taguig City', '2019', 'with honor', 'PDMHS', 'Public', 'North Signal Taguig City', '2017', NULL, 'KERIS', 'Public', 'Pinagsama Taguig City', '20013', NULL, 17, '2021-05-09 21:59:04', '2021-05-09 21:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `entriesId` bigint(20) UNSIGNED NOT NULL,
  `entriesStatus` varchar(24) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entriesComment` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `submissionId` bigint(20) UNSIGNED NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`entriesId`, `entriesStatus`, `entriesComment`, `submissionId`, `applicationId`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'accepted', 'Change your scholar type to Basic Plus', 16, 18, '2021-05-09 21:59:05', '2021-05-09 22:07:43', NULL),
(8, 'accepted', NULL, 17, 19, '2021-05-09 22:16:55', '2021-05-09 22:18:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `families`
--

CREATE TABLE `families` (
  `familyId` bigint(20) UNSIGNED NOT NULL,
  `familyFatherLiving` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherAddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherOccupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherWorkPlace` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyFatherHighestEduc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherLiving` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherAddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherOccupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherWorkPlace` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyMotherHighestEduc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseLiving` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseAddress` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseContact` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseOccupation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseWorkPlace` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familySpouseHighestEduc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `families`
--

INSERT INTO `families` (`familyId`, `familyFatherLiving`, `familyFatherName`, `familyFatherAddress`, `familyFatherContact`, `familyFatherOccupation`, `familyFatherWorkPlace`, `familyFatherHighestEduc`, `familyMotherLiving`, `familyMotherName`, `familyMotherAddress`, `familyMotherContact`, `familyMotherOccupation`, `familyMotherWorkPlace`, `familyMotherHighestEduc`, `familySpouseLiving`, `familySpouseName`, `familySpouseAddress`, `familySpouseContact`, `familySpouseOccupation`, `familySpouseWorkPlace`, `familySpouseHighestEduc`, `scholarId`, `created_at`, `updated_at`) VALUES
(1, 'Living', 'George Castaneda', 'Taguig City', '09207888638', 'Civil technician', 'BGC', 'Elementary', 'Living', 'Daisy Castaneda', 'Taguig City', '09104359264', 'House wife', 'Pacific Residence', 'High School', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-18 23:28:27', '2021-04-20 05:43:05'),
(2, 'Living', 'dfdfd', 'Phase 2', '42332', 'sdsdsd', 'dsfsdf', 'asdsadsa', 'Living', 'xdfs', 'czxcz', '4234', 'sdsdsd', 'asasas', 'dasdasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-19 01:10:37', '2021-04-19 01:10:37'),
(3, 'Living', 'dfdfd', 'Phase 2', '42332', 'sdsdsd', 'wqwqw', 'asdsadsa', 'Living', 'dfsdsds', 'czxcz', '56456', 'erer', 'asasas', 'vxcvcxv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-19 01:19:33', '2021-04-19 01:19:33'),
(4, 'Living', 'George Castaneda', 'Taguig City', '09207888638', 'Civil Technician', 'BGC', 'Elementery', 'Living', 'Daisy Castaneda', 'Taguig City', '09207888638', 'House Keeping', 'Pacific Residence', 'High School', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, '2021-05-02 00:39:13', '2021-05-02 00:39:13'),
(5, 'Living', 'George Castaneda', 'Phase 2', '32432', 'sdsdsd', 'sdsdsd', 'wqwqww', 'Living', 'dfsdsds', 'asSA', '12321', 'sdsdsd', 'sadsadas', 'asdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 13, '2021-05-06 03:05:44', '2021-05-06 03:05:44'),
(6, 'Living', 'George Castaneda', 'Taguig City', '09104359264', 'Civil technician', 'BGC', 'High School Graduate', 'Living', 'Daisy Castaneda', 'Taguig City', '09104359264', 'House Keeping', 'Pacific Residence', 'High School Graduate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 14, '2021-05-07 18:42:44', '2021-05-07 18:42:44'),
(7, 'Living', 'George Castaneda', 'aadsad', '21312312', 'sdasda', 'asdasd', 'asdasdas', 'Living', 'asdasdas', 'sadasda', '123123', 'asdasd', 'asdasds', 'asdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 15, '2021-05-07 21:59:38', '2021-05-07 21:59:38'),
(8, 'Living', 'George Castaneda', 'Taguig City', '12121', 'Engineer', 'BGC', 'College Graduate', 'Living', 'Daisy Castaneda', 'Taguig City', '2323', 'Accountant', 'Ayala Makati City', 'College Graduate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 16, '2021-05-09 03:52:47', '2021-05-09 03:52:47'),
(9, 'Living', 'John Gurion', 'Taguig City', '09207888638', 'Engineer', 'BGC', 'College Graduate', 'Living', 'Marian Gurion', 'Taguig City', '09207888638', 'Accountant', 'Ayala Makati City', 'College Graduate', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17, '2021-05-09 21:59:04', '2021-05-09 21:59:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2021_03_30_063354_create_scholars_table', 1),
(3, '2021_03_30_081750_create_education_table', 1),
(4, '2021_03_30_083018_create_siblings_table', 1),
(5, '2021_03_30_084122_create_families_table', 1),
(6, '2021_03_30_084540_create_applications_table', 1),
(7, '2021_03_30_085029_create_schools_table', 1),
(8, '2021_03_30_085401_create_signatures_table', 1),
(9, '2021_03_30_085700_create_courses_table', 1),
(10, '2021_03_30_090105_create_transactions_table', 1),
(11, '2021_03_30_091217_create_admins_table', 1),
(12, '2021_03_30_091555_create_posts_table', 1),
(13, '2021_03_30_091946_create_comments_table', 1),
(14, '2021_04_03_035926_create_submissions_table', 1),
(15, '2021_04_03_042252_create_entries_table', 1),
(16, '2021_04_03_072610_create_announcements_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` bigint(20) UNSIGNED NOT NULL,
  `postTitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postContent` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postDate` date NOT NULL,
  `adminId` bigint(20) UNSIGNED DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postTitle`, `postContent`, `postDate`, `adminId`, `scholarId`, `created_at`, `updated_at`) VALUES
(2, 'scholar', 'kamusta', '2021-04-19', NULL, 1, '2021-04-19 06:25:11', '2021-04-19 06:25:11'),
(3, 'scholar', 'kamusta', '2021-04-19', NULL, 1, '2021-04-19 06:25:11', '2021-04-19 06:25:11'),
(5, 'scholar', 'kamusta', '2021-04-19', NULL, 1, '2021-04-19 06:25:12', '2021-04-19 06:25:12'),
(6, 'scholar', 'hola', '2021-04-19', NULL, 1, '2021-04-19 06:27:04', '2021-04-19 06:27:04'),
(7, 'scholar', 'hola', '2021-04-19', NULL, 1, '2021-04-19 06:27:05', '2021-04-19 06:27:05'),
(8, 'scholar', 'hola', '2021-04-19', NULL, 1, '2021-04-19 06:27:05', '2021-04-19 06:27:05'),
(9, 'scholar', 'hola', '2021-04-19', NULL, 1, '2021-04-19 06:27:05', '2021-04-19 06:27:05'),
(10, 'scholar', 'hola', '2021-04-19', NULL, 1, '2021-04-19 06:27:16', '2021-04-19 06:27:16'),
(11, 'scholar', 'wewew', '2021-04-19', NULL, 1, '2021-04-19 06:27:20', '2021-04-19 06:27:20'),
(12, 'scholar', 'wewew', '2021-04-19', NULL, 1, '2021-04-19 06:27:21', '2021-04-19 06:27:21'),
(13, 'scholar', 'wewew', '2021-04-19', NULL, 1, '2021-04-19 06:27:21', '2021-04-19 06:27:21'),
(14, 'scholar', 'sdadadasdas', '2021-04-19', NULL, 1, '2021-04-19 06:27:49', '2021-04-19 06:27:49'),
(15, 'scholar', 'ok', '2021-04-19', 1, NULL, '2021-04-19 06:47:50', '2021-04-19 06:47:50'),
(16, 'scholar', 'Say somthing', '2021-04-19', NULL, 1, '2021-04-19 07:06:28', '2021-04-19 07:06:28'),
(17, 'scholar', 'Announcement', '2021-04-26', NULL, 1, '2021-04-25 19:41:53', '2021-04-25 19:41:53'),
(26, 'scholar', 'hi everyone', '2021-05-05', NULL, 10, '2021-05-04 23:19:39', '2021-05-04 23:19:39'),
(27, 'scholar', 'post try', '2021-05-05', NULL, 12, '2021-05-05 04:21:29', '2021-05-05 04:21:29'),
(29, 'admin', 'dfsdf', '2021-05-05', 6, NULL, '2021-05-05 04:25:19', '2021-05-05 04:25:19'),
(30, 'scholar', 'bell', '2021-05-05', NULL, 11, '2021-05-05 04:59:05', '2021-05-05 04:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `scholars`
--

CREATE TABLE `scholars` (
  `scholarId` bigint(20) UNSIGNED NOT NULL,
  `scholarStatus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarLastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarFirstName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarSuffix` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarMiddleName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarAddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarBarangay` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarDistrict` int(10) UNSIGNED NOT NULL,
  `scholarCity` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarStartedDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarAge` int(10) UNSIGNED NOT NULL,
  `scholarGender` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarEmail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarContactNum` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarReligion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scholarBirthDate` date NOT NULL,
  `scholarBirthPlace` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarCivilStatus` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarPassword` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `scholarProfilePic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTitle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholars`
--

INSERT INTO `scholars` (`scholarId`, `scholarStatus`, `scholarLastName`, `scholarFirstName`, `scholarSuffix`, `scholarMiddleName`, `scholarAddress`, `scholarBarangay`, `scholarDistrict`, `scholarCity`, `scholarStartedDate`, `scholarAge`, `scholarGender`, `scholarEmail`, `scholarContactNum`, `scholarReligion`, `scholarBirthDate`, `scholarBirthPlace`, `scholarCivilStatus`, `scholarPassword`, `scholarProfilePic`, `username`, `userTitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new', 'Castaneda', 'Steph', NULL, 'Sarabia', 'asdasdas dasdasdsa', 'Pinagsama', 2, 'Taguig', '2001', 3, 'Female', 'castanedajustine093@gmail.com', '0912345678', 'zxczxczx', '2017-12-30', 'Taiwan', 'Single', '$2y$10$4vcrGFp5.v0jpQbxgqkf4.P68GSWzNJqHQI1Dpw0KIByfhJh5GgOC', 'scholarId-1.jpg', 'Justine Castaneda', 'scholar', '2021-04-18 23:18:58', '2021-04-29 06:03:19', NULL),
(2, 'new', 'fsdfdsf', 'dfsdfsd', 'fsdfsd', 'sdfsdf', 'sadas asdas', 'Bagumbayan', 1, 'Taguig', '2001', 3, 'Male', 'qwerty@gmail.com', '09207888638', 'sdfsd', '2017-12-30', 'sdfsd', 'Single', '$2y$10$H9Ay9Ryu3SgVRPQUdFqdde0tsag0gincJ3Fj8ucUCFPGPJdjiTtcK', 'scholarId-6.jpg', 'dfsdfsd fsdfdsf', 'scholar', '2021-04-28 21:14:34', '2021-05-09 03:38:31', NULL),
(3, 'renew', 'fsdfsdf', 'ddsfsdfsd', 'fsdfsd', 'sdfsd', 'fsdfsd fsdfd', 'Central Bicutan', 2, 'Butuan', '2001', 3, 'Male', 'billy@gmail.com', '09207888638', 'sdfsd', '2017-12-30', 'dsfs', 'Single', '$2y$10$jdxCVTcuFI7NzwkZHg6sjun0kdxIcKDozUPBJU7W1wNJUn16e2eUa', NULL, 'Ddsfsdfsd Fsdfsdf Fsdfsd ', 'scholar', '2021-04-28 21:24:53', '2021-04-29 04:52:44', NULL),
(9, 'renew', 'Akil', 'Aria', NULL, NULL, ' 123', 'Pinagsama', 2, 'Taguig', '2001', 3, 'Female', 'castanedajustine091@gmail.com', '09207888638', 'asasa', '2017-12-30', 'Taguig City', 'Single', '$2y$10$rcpU/mqbQl172TUiM50OQeCIzhupt4NDsVQ38SiUXREYBA0CoGMAq', NULL, 'Aria Akil ', 'scholar', '2021-04-29 06:55:16', '2021-05-02 00:55:56', NULL),
(10, 'renew', 'Castaneda', 'John', NULL, 'Sarabia', 'Phase 2 asSA', 'Pinagsama', 2, 'Taguig', '2001', 19, 'Male', 'castanedajustine095@gmail.com', '0912345678', 'Catholic', '2001-05-09', 'Makati City', 'Single', '$2y$10$LtcbPsLM.LZ9pUzsxnfYIOMHaTnhv2U1bpeHDpYuaW0z8XwwW3YZe', 'scholarId-10.jpg', 'Justine Castaneda', 'scholar', '2021-05-04 23:14:26', '2021-05-04 23:37:45', NULL),
(11, 'new', 'Castaneda', 'lebron', NULL, 'Sarabia', 'Phase 2 asSA', 'Bagumbayan', 1, 'Taguig', '2001', 19, 'Female', 'erin@gmail.com', '0912345678', 'Catholic', '2001-05-09', 'Taguig city', 'Single', '$2y$10$.M95wHcNVOhgcGIGfAPSHOqJ98XwEkubu00huA5RjLzOvl1IRylA6', 'scholarId-11.jpg', 'Justine Castaneda', 'scholar', '2021-05-04 23:16:15', '2021-05-05 04:58:43', NULL),
(12, 'new', 'Castaneda', 'Justine', NULL, 'Sarabia', 'Phase 2 asSA', 'Pinagsama', 2, 'Taguig', '2001', 3, 'Female', 'mariah@gmail.com', '0912345678', 'ioiu', '2017-12-30', 'Philippines', 'Single', '$2y$10$MEVhYCqI.CfLkA6U6xkuzu7B9y7Q3Vxlj212NcBp6dFw5Pvv7MRxm', 'scholarId-12.jpg', 'Justine Castaneda', 'scholar', '2021-05-05 04:09:05', '2021-05-05 04:20:29', NULL),
(13, 'renew', 'Chou', 'Tzuyu', NULL, NULL, 'Phase 2 czxcz', 'Pinagsama', 2, 'Taguig', '2001', 3, 'Female', 'castanedajustine098@gmail.com', '0912345678', 'zxczxczc', '2017-12-30', 'Taiwan', 'Single', '$2y$10$oZ3GnUgybaC/ngd5VGHqqeXSDZECJAEFPI3mmvp2QbAYsEcycKk9e', 'scholarId-13.png', 'Tzuyu Chou', 'scholar', '2021-05-06 02:58:26', '2021-05-06 03:12:18', NULL),
(14, 'renew', 'Dela Cruz', 'Juan', NULL, 'Garcia', 'Santol Street BLK 1 LOT 2', 'Pinagsama', 2, 'Taguig City', '2001', 19, 'Male', 'castanedajustine09324234@gmail.com', '09207888638', 'Roman Catholic', '2001-12-30', 'Taguig City', 'Single', '$2y$10$Jo/nDwZ7Pp.9U4RT7UwCLuSfrGWshD3eeD8AcKTtcgn8ao9Du0VJS', NULL, 'Juan Dela Cruz ', 'scholar', '2021-05-07 17:40:33', '2021-05-07 18:59:41', NULL),
(15, 'renew', 'Gurion', 'Harris', NULL, 'Alalong', ' BLK 1 LOT 2', 'Ususan', 2, 'Taguig City', '2001', 19, 'Male', 'castanedajustine09dfgfd@gmail.com', '09207888638', 'Christian', '2001-12-30', 'Taguig City', 'Single', '$2y$10$kGN8VEyFmMd0tfaNVOYQNeJiNLdy4welfcoG96Jnd0YmskDSWdo8q', NULL, 'Harris Gurion ', 'scholar', '2021-05-07 21:46:41', '2021-05-07 22:10:36', NULL),
(16, 'renew', 'Square', 'Bob', NULL, 'Sponge', ' 123', 'Pinagsama', 2, 'Taguig City', '2001', 19, 'Male', 'castanedajustine09fsdfsdfs@gmail.com', '09207888638', 'Roman Catholic', '2001-12-30', 'Taguig City', 'Single', '$2y$10$jLktxN7Pyz.fJU5ii2h5/.KG5kWZD6zUSoNjQR02t66P6KRJRbDEO', NULL, 'Bob Square ', 'scholar', '2021-05-09 03:36:25', '2021-05-09 04:06:49', NULL),
(17, 'renew', 'Gurion', 'Harris', NULL, 'Alalong', 'Santol Street BLK 1 LOT 2', 'Bagumbayan', 1, 'Taguig City', '2001', 19, 'Male', 'castanedajustine09@gmail.com', '09207888638', 'Roman Catholic', '2001-12-30', 'Taguig City', 'Single', '$2y$10$PWdJ0pJXI3gvld8sLFLPcuwgqeOwl.8ZAkZSvKCNEfLDGqc/Ri0dO', NULL, 'Harris Gurion ', 'scholar', '2021-05-09 21:46:55', '2021-05-09 22:07:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `schoolId` bigint(20) UNSIGNED NOT NULL,
  `schoolName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schoolAddress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`schoolId`, `schoolName`, `schoolAddress`, `applicationId`, `created_at`, `updated_at`) VALUES
(1, 'DLSU', 'Manila', 1, '2021-04-18 23:28:26', '2021-04-20 02:58:17'),
(2, 'Puto', 'Phase 2', 2, '2021-04-19 01:10:35', '2021-04-19 01:10:35'),
(3, 'Puto', 'Phase 2', 3, '2021-04-19 01:19:33', '2021-04-19 01:19:33'),
(4, 'TUPT', 'Taguig City', 7, '2021-05-02 00:39:11', '2021-05-02 00:39:11'),
(5, 'TUPT', 'Taguig City', 8, '2021-05-02 01:07:52', '2021-05-02 01:07:52'),
(6, 'TUPT', 'Western Bicutan', 9, '2021-05-04 23:31:07', '2021-05-04 23:31:07'),
(7, 'Puto', 'Phase 2', 10, '2021-05-06 03:05:43', '2021-05-06 03:05:43'),
(8, 'Puto', 'Phase 2', 11, '2021-05-06 03:29:56', '2021-05-06 03:29:56'),
(9, 'TUPT', 'Western Bicutan Taguig City', 12, '2021-05-07 18:42:43', '2021-05-07 18:42:43'),
(10, 'TUPT', 'Western Bicutan Taguig City', 13, '2021-05-07 20:03:04', '2021-05-07 20:03:04'),
(11, 'TUPT', 'Western Bicutan Taguig City', 14, '2021-05-07 21:59:36', '2021-05-07 21:59:36'),
(12, 'TUPT', 'Western Bicutan Taguig City', 15, '2021-05-07 22:21:31', '2021-05-07 22:21:31'),
(13, 'TUPT', 'Taguig City', 16, '2021-05-09 03:52:46', '2021-05-09 03:52:46'),
(14, 'TUPT', 'Western Bicutan Taguig City', 17, '2021-05-09 04:28:39', '2021-05-09 04:28:39'),
(15, 'TUPT', 'Western Bicutan Taguig City', 18, '2021-05-09 21:59:02', '2021-05-09 21:59:02'),
(16, 'TUPT', 'Western Bicutan Taguig City', 19, '2021-05-09 22:16:54', '2021-05-09 22:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `siblings`
--

CREATE TABLE `siblings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siblingName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblingAge` int(10) UNSIGNED DEFAULT NULL,
  `siblingCivilStatus` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblingHighestEduc` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblingWork` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `siblingMontlyIncome` bigint(20) UNSIGNED DEFAULT NULL,
  `scholarId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siblings`
--

INSERT INTO `siblings` (`id`, `siblingName`, `siblingAge`, `siblingCivilStatus`, `siblingHighestEduc`, `siblingWork`, `siblingMontlyIncome`, `scholarId`, `created_at`, `updated_at`) VALUES
(44, 'Jashen S. Castaneda', 18, 'Single', 'Senior High School', 'No', NULL, 1, '2021-04-27 02:48:37', '2021-04-27 02:48:37'),
(45, 'Rose Ann S. Castaneda', 16, 'Single', 'sds', 'No', NULL, 1, '2021-04-27 02:48:38', '2021-04-27 02:48:38'),
(46, 'Justine', 19, 'Single', 'Collage', 'No', NULL, 9, '2021-05-02 00:39:13', '2021-05-02 00:39:13'),
(47, 'Jashen', 17, 'Single', 'SHS', 'No', NULL, 9, '2021-05-02 00:39:13', '2021-05-02 00:39:13'),
(48, 'Roseann', 16, 'Single', 'SHS', 'No', NULL, 9, '2021-05-02 00:39:14', '2021-05-02 00:39:14'),
(51, 'dsdsdsds', 232, 'Single', 'sds', 'No', NULL, 13, '2021-05-06 03:11:07', '2021-05-06 03:11:07'),
(55, 'Justine S. Castaneda', 19, 'Single', 'College', 'No', NULL, 14, '2021-05-07 18:55:22', '2021-05-07 18:55:22'),
(56, 'Jashen S. Castaneda', 17, 'Single', 'Senior High School', 'No', NULL, 14, '2021-05-07 18:55:22', '2021-05-07 18:55:22'),
(57, 'Rose Ann S Castaneda', 16, 'Single', 'High School', 'No', NULL, 14, '2021-05-07 18:55:22', '2021-05-07 18:55:22'),
(61, 'dafsfs', 23, 'Single', 'sdfsdf', 'No', NULL, 15, '2021-05-07 22:08:52', '2021-05-07 22:08:52'),
(62, 'dfsf', 17, 'Single', 'dsfsdfs', 'No', NULL, 15, '2021-05-07 22:08:52', '2021-05-07 22:08:52'),
(63, 'dfdsfsd', 16, 'Single', 'sdfsdfsd', 'No', NULL, 15, '2021-05-07 22:08:53', '2021-05-07 22:08:53'),
(66, 'Justine', 12, 'Single', 'Collage', 'No', NULL, 16, '2021-05-09 04:05:30', '2021-05-09 04:05:30'),
(67, 'Jashen', 17, 'Single', 'Junior High School', 'No', NULL, 16, '2021-05-09 04:05:30', '2021-05-09 04:05:30'),
(70, 'Harris Gurion', 19, 'Single', 'Collage', 'No', NULL, 17, '2021-05-09 22:06:15', '2021-05-09 22:06:15'),
(71, 'Merry Gurion', 14, 'Single', 'Junior High School', 'No', NULL, 17, '2021-05-09 22:06:15', '2021-05-09 22:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `signatures`
--

CREATE TABLE `signatures` (
  `signatureId` bigint(20) UNSIGNED NOT NULL,
  `scholarSignature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardianSignature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signatureDate` date NOT NULL,
  `signatureDateParent` date NOT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signatures`
--

INSERT INTO `signatures` (`signatureId`, `scholarSignature`, `guardianSignature`, `signatureDate`, `signatureDateParent`, `applicationId`, `created_at`, `updated_at`) VALUES
(1, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.gif|', '2021-04-19', '2021-04-19', 1, '2021-04-18 23:28:25', '2021-04-27 02:48:36'),
(2, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.png|', '2021-04-19', '2021-04-19', 2, '2021-04-19 01:10:35', '2021-04-19 01:10:35'),
(3, 'batch-1_sem-1_year-2020-2021_0.png|', 'batch-1_sem-1_year-2020-2021_0.png|', '2021-04-19', '2021-04-19', 3, '2021-04-19 01:19:33', '2021-04-19 01:19:33'),
(4, 'batch-1_sem-1_year-2020-2021_0.jpeg|', 'batch-1_sem-1_year-2020-2021_0.jpeg|', '2021-05-02', '2021-05-02', 7, '2021-05-02 00:39:11', '2021-05-02 00:39:11'),
(5, 'batch-1_sem-2_year-2020-2021_0.png|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '2021-05-02', '2021-05-02', 8, '2021-05-02 01:07:51', '2021-05-02 01:07:51'),
(6, 'batch-1_sem-1_year-2021-2022_0.jpeg|', 'batch-1_sem-1_year-2021-2022_0.jpeg|', '2021-05-05', '2021-05-05', 9, '2021-05-04 23:31:07', '2021-05-04 23:31:07'),
(7, 'batch-1_sem-1_year-2021-2022_0.jpg|', 'batch-1_sem-1_year-2021-2022_0.png|', '2021-05-06', '2021-05-06', 10, '2021-05-06 03:05:43', '2021-05-06 03:05:43'),
(8, 'batch-1_sem-2_year-2021-2022_0.png|', 'batch-1_sem-2_year-2021-2022_0.jpg|', '2021-05-05', '2021-05-06', 11, '2021-05-06 03:29:55', '2021-05-06 03:29:55'),
(9, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '2021-05-08', '2021-05-08', 12, '2021-05-07 18:42:43', '2021-05-07 18:42:43'),
(10, 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '2021-05-08', '2021-05-08', 13, '2021-05-07 20:03:03', '2021-05-07 20:03:03'),
(11, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '2021-05-08', '2021-05-08', 14, '2021-05-07 21:59:36', '2021-05-07 21:59:36'),
(12, 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '2021-05-08', '2021-05-08', 15, '2021-05-07 22:21:31', '2021-05-07 22:21:31'),
(13, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '2021-05-09', '2021-05-09', 16, '2021-05-09 03:52:46', '2021-05-09 03:52:46'),
(14, 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '2021-05-09', '2021-05-09', 17, '2021-05-09 04:28:39', '2021-05-09 04:28:39'),
(15, 'batch-1_sem-1_year-2020-2021_0.jpg|', 'batch-1_sem-1_year-2020-2021_0.jpg|', '2021-05-10', '2021-05-10', 18, '2021-05-09 21:59:02', '2021-05-09 21:59:02'),
(16, 'batch-1_sem-2_year-2020-2021_0.jpg|', 'batch-1_sem-2_year-2020-2021_0.jpg|', '2021-05-10', '2021-05-10', 19, '2021-05-09 22:16:54', '2021-05-09 22:16:54');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submissionId` bigint(20) UNSIGNED NOT NULL,
  `submissionBatch` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submissionSem` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submissionYear` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submissionDesc` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `submissionStart` date NOT NULL,
  `submissionEnd` date NOT NULL,
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `submissionStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submissionId`, `submissionBatch`, `submissionSem`, `submissionYear`, `submissionDesc`, `submissionStart`, `submissionEnd`, `adminId`, `submissionStatus`, `created_at`, `updated_at`, `deleted_at`) VALUES
(16, '1', '1', '2020-2021', 'Please Submit Your Requirements', '2021-05-09', '2021-05-09', 6, 'close', '2021-05-09 21:50:48', '2021-05-09 21:51:14', NULL),
(17, '1', '2', '2020-2021', 'Please pass your requirements', '2021-05-11', '2021-05-18', 6, 'open', '2021-05-09 22:12:47', '2021-05-09 22:12:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transactionId` bigint(20) UNSIGNED NOT NULL,
  `transactionDateRecieving` date DEFAULT NULL,
  `transactionAmount` bigint(20) UNSIGNED DEFAULT NULL,
  `transactionGcashNum` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionGcashName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionQRCode` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transactionDateReceived` date DEFAULT NULL,
  `applicationId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transactionId`, `transactionDateRecieving`, `transactionAmount`, `transactionGcashNum`, `transactionGcashName`, `transactionQRCode`, `transactionDateReceived`, `applicationId`, `created_at`, `updated_at`) VALUES
(47, '2021-05-15', 10000, NULL, NULL, '6095fe9add453', '2021-05-08', 12, '2021-05-07 18:59:41', '2021-05-07 19:05:26'),
(48, '2021-05-15', 10000, '09123456789', 'Justine Castaneda', NULL, '2021-05-08', 13, '2021-05-07 20:03:04', '2021-05-07 20:10:10'),
(49, '2021-05-22', 10000, NULL, NULL, '60962b5c46827', '2021-05-08', 14, '2021-05-07 22:10:36', '2021-05-07 22:14:12'),
(50, '2021-05-22', 10000, '09207888638', 'harris gurion', NULL, '2021-05-08', 15, '2021-05-07 22:21:31', '2021-05-07 22:24:18'),
(51, '2021-05-17', 10000, NULL, NULL, '6097d0591e4b7', '2021-05-09', 16, '2021-05-09 04:06:49', '2021-05-09 04:09:46'),
(52, '2021-05-16', 10000, '09207888638', 'harris gurion', NULL, '2021-05-09', 17, '2021-05-09 04:28:40', '2021-05-09 04:31:27'),
(53, '2021-05-17', 10000, NULL, NULL, '6098cdaeed82a', '2021-05-10', 18, '2021-05-09 22:07:43', '2021-05-09 22:10:23'),
(54, '2021-05-10', 10000, '09207888638', 'harris gurion', NULL, '2021-05-10', 19, '2021-05-09 22:16:54', '2021-05-09 22:20:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementId`),
  ADD KEY `announcements_adminid_foreign` (`adminId`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationId`),
  ADD KEY `applications_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `comments_postid_foreign` (`postId`),
  ADD KEY `comments_adminid_foreign` (`adminId`),
  ADD KEY `comments_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseId`),
  ADD KEY `courses_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educationId`),
  ADD KEY `education_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`entriesId`),
  ADD KEY `entries_submissionid_foreign` (`submissionId`),
  ADD KEY `entries_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `families`
--
ALTER TABLE `families`
  ADD PRIMARY KEY (`familyId`),
  ADD KEY `families_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `posts_adminid_foreign` (`adminId`),
  ADD KEY `posts_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `scholars`
--
ALTER TABLE `scholars`
  ADD PRIMARY KEY (`scholarId`),
  ADD UNIQUE KEY `scholars_scholaremail_unique` (`scholarEmail`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`schoolId`),
  ADD KEY `schools_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `siblings`
--
ALTER TABLE `siblings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siblings_scholarid_foreign` (`scholarId`);

--
-- Indexes for table `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`signatureId`),
  ADD KEY `signatures_applicationid_foreign` (`applicationId`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submissionId`),
  ADD KEY `submissions_adminid_foreign` (`adminId`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `transactions_applicationid_foreign` (`applicationId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adminId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `applicationId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educationId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `entriesId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `families`
--
ALTER TABLE `families`
  MODIFY `familyId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `scholars`
--
ALTER TABLE `scholars`
  MODIFY `scholarId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `schoolId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `siblings`
--
ALTER TABLE `siblings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `signatures`
--
ALTER TABLE `signatures`
  MODIFY `signatureId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submissionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transactionId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_adminid_foreign` FOREIGN KEY (`adminId`) REFERENCES `admins` (`adminId`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_adminid_foreign` FOREIGN KEY (`adminId`) REFERENCES `admins` (`adminId`),
  ADD CONSTRAINT `comments_postid_foreign` FOREIGN KEY (`postId`) REFERENCES `posts` (`postId`),
  ADD CONSTRAINT `comments_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`),
  ADD CONSTRAINT `entries_submissionid_foreign` FOREIGN KEY (`submissionId`) REFERENCES `submissions` (`submissionId`);

--
-- Constraints for table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_adminid_foreign` FOREIGN KEY (`adminId`) REFERENCES `admins` (`adminId`),
  ADD CONSTRAINT `posts_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`);

--
-- Constraints for table `siblings`
--
ALTER TABLE `siblings`
  ADD CONSTRAINT `siblings_scholarid_foreign` FOREIGN KEY (`scholarId`) REFERENCES `scholars` (`scholarId`);

--
-- Constraints for table `signatures`
--
ALTER TABLE `signatures`
  ADD CONSTRAINT `signatures_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`);

--
-- Constraints for table `submissions`
--
ALTER TABLE `submissions`
  ADD CONSTRAINT `submissions_adminid_foreign` FOREIGN KEY (`adminId`) REFERENCES `admins` (`adminId`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_applicationid_foreign` FOREIGN KEY (`applicationId`) REFERENCES `applications` (`applicationId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
