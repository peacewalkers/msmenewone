-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2018 at 10:39 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.12

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `geonames`
--

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `country_abbr`, `country_slug`) VALUES
(100, 'United States of America', 'US', 'united-states-of-america');

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `state_abbr`, `state_slug`, `state_country_abbr`, `country_id`) VALUES
(100, 'Alabama', 'AL', 'alabama', 'US', 100),
(101, 'Alaska', 'AK', 'alaska', 'US', 100),
(102, 'Arizona', 'AZ', 'arizona', 'US', 100),
(103, 'Arkansas', 'AR', 'arkansas', 'US', 100),
(104, 'California', 'CA', 'california', 'US', 100),
(105, 'Colorado', 'CO', 'colorado', 'US', 100),
(106, 'Connecticut', 'CT', 'connecticut', 'US', 100),
(107, 'Delaware', 'DE', 'delaware', 'US', 100),
(108, 'District of Columbia', 'DC', 'district-of-columbia', 'US', 100),
(109, 'Florida', 'FL', 'florida', 'US', 100),
(110, 'Georgia', 'GA', 'georgia', 'US', 100),
(111, 'Hawaii', 'HI', 'hawaii', 'US', 100),
(112, 'Idaho', 'ID', 'idaho', 'US', 100),
(113, 'Illinois', 'IL', 'illinois', 'US', 100),
(114, 'Indiana', 'IN', 'indiana', 'US', 100),
(115, 'Iowa', 'IA', 'iowa', 'US', 100),
(116, 'Kansas', 'KS', 'kansas', 'US', 100),
(117, 'Kentucky', 'KY', 'kentucky', 'US', 100),
(118, 'Louisiana', 'LA', 'louisiana', 'US', 100),
(119, 'Maine', 'ME', 'maine', 'US', 100),
(120, 'Maryland', 'MD', 'maryland', 'US', 100),
(121, 'Massachusetts', 'MA', 'massachusetts', 'US', 100),
(122, 'Michigan', 'MI', 'michigan', 'US', 100),
(123, 'Minnesota', 'MN', 'minnesota', 'US', 100),
(124, 'Mississippi', 'MS', 'mississippi', 'US', 100),
(125, 'Missouri', 'MO', 'missouri', 'US', 100),
(126, 'Montana', 'MT', 'montana', 'US', 100),
(127, 'Nebraska', 'NE', 'nebraska', 'US', 100),
(128, 'Nevada', 'NV', 'nevada', 'US', 100),
(129, 'New Hampshire', 'NH', 'new-hampshire', 'US', 100),
(130, 'New Jersey', 'NJ', 'new-jersey', 'US', 100),
(131, 'New Mexico', 'NM', 'new-mexico', 'US', 100),
(132, 'New York', 'NY', 'new-york', 'US', 100),
(133, 'North Carolina', 'NC', 'north-carolina', 'US', 100),
(134, 'North Dakota', 'ND', 'north-dakota', 'US', 100),
(135, 'Ohio', 'OH', 'ohio', 'US', 100),
(136, 'Oklahoma', 'OK', 'oklahoma', 'US', 100),
(137, 'Oregon', 'OR', 'oregon', 'US', 100),
(138, 'Pennsylvania', 'PA', 'pennsylvania', 'US', 100),
(139, 'Rhode Island', 'RI', 'rhode-island', 'US', 100),
(140, 'South Carolina', 'SC', 'south-carolina', 'US', 100),
(141, 'South Dakota', 'SD', 'south-dakota', 'US', 100),
(142, 'Tennessee', 'TN', 'tennessee', 'US', 100),
(143, 'Texas', 'TX', 'texas', 'US', 100),
(144, 'Utah', 'UT', 'utah', 'US', 100),
(145, 'Vermont', 'VT', 'vermont', 'US', 100),
(146, 'Virginia', 'VA', 'virginia', 'US', 100),
(147, 'Washington', 'WA', 'washington', 'US', 100),
(148, 'West Virginia', 'WV', 'west-virginia', 'US', 100),
(149, 'Wisconsin', 'WI', 'wisconsin', 'US', 100),
(150, 'Wyoming', 'WY', 'wyoming', 'US', 100);
