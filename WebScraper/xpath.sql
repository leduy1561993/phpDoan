-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 06:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `xpath`
--

CREATE TABLE `xpath` (
  `home_url` varchar(200) NOT NULL,
  `base_url` text,
  `xpath_code` text,
  `job_xpath` text,
  `company_xpath` text,
  `location_xpath` text,
  `description_xpath` text,
  `salary_xpath` text,
  `requirement_xpath` text,
  `benifit_xpath` text,
  `expired_xpath` text,
  `tags_xpath` text,
  `login_url` text NOT NULL,
  `login_data` text NOT NULL,
  `id` int(11) NOT NULL,
  `logo_xpath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xpath`
--

INSERT INTO `xpath` (`home_url`, `base_url`, `xpath_code`, `job_xpath`, `company_xpath`, `location_xpath`, `description_xpath`, `salary_xpath`, `requirement_xpath`, `benifit_xpath`, `expired_xpath`, `tags_xpath`, `login_url`, `login_data`, `id`, `logo_xpath`) VALUES
('http://www.vietnamworks.com/it-hardware-networking-it-software-jobs-i55,35-en/page-', '', '//*[@id="job-list"]/div[1]/table/tbody/tr/td/div/div[1]/div[2]/div[1]/a', '//*[@id="section-job-detail"]/div[3]/div/div[2]/div[2]/div[1]/div[1]/div/div/h1', '//*[@id="section-job-detail"]/div[3]/div/div[2]/div[2]/div[1]/div[1]/div/div/span[1]/strong', '//*[@id="section-job-detail"]/div[3]/div/div[2]/div[2]/div[1]/div[1]/div/div/span[2]', '//*[@id="job-description"]', '//*[@id="section-job-detail"]/div[3]/div/div[2]/div[2]/div[2]/div[1]/div/span', '//*[@id="job-requirement"]/div/div', '//*[@id="what-we-offer"]/div/div[2]/div', '', '//*[@id="job-detail"]/div[1]/div', 'http://www.vietnamworks.com/login/?redirectURL=http%3A%2F%2Fwww.vietnamworks.com%2Fit-hardware-networking-it-software-jobs-i55%2C35-en%2F', 'form%5Busername%5D=anhtuyenpro94%40gmail.com&form%5Bpassword%5D=anhtuyenpro_at&form%5Bsign_in%5D=', 2, '//div[@class="row"]/div[1]/span/a/img/@src'),
('https://itviec.com/?page=', 'https://itviec.com', '/div[class="first-group"]/div[class="job"]/div/div[2]/div[1]/a', '//*[@id]/div[2]/div/div[3]/div[1]/div/h1', '//*[@id]/div[2]/div/div[2]/div[1]/h3', '//*[@id="job-details-mobile"]/div[3]/div/div[1]', '//*[@id]/div[6]/div/div', '//*[@id]/div[3]/div/div[2]/span[2]', '//*[@id]/div[7]/div/div', '//*[@id]/div[8]/div/div[1]', '//*[@id]/div[2]/div/div[3]/div[1]/div/div[5]', '//*[@id]/div[3]/div/div[3]/div', '', '', 1, '//div[@class="logo"]/a/img/@src'),
('https://www.careerlink.vn/vieclam/tim-kiem-viec-lam?sid=34134145&token=LjKUHJM0&page=', 'https://www.careerlink.vn', '//div[@class="list-group-item"]/h2/a ', '/html/body/div[1]/div[2]/div[1]/h1', '/html/body/div[1]/div[2]/div[2]/div[1]/div/ul[1]/li[1]/a', '/html/body/div[1]/div[2]/div[2]/div[1]/div/ul[1]/li[2]', '/html/body/div[1]/div[2]/div[2]/div[1]/div/div[2]/p', '/html/body/div[1]/div[2]/div[2]/div[1]/div/ul[1]/li[3]', '/html/body/div[1]/div[2]/div[2]/div[1]/div/div[3]/p', '', '/html/body/div[1]/div[2]/div[2]/div[1]/div/dl/dd[2]', '/html/body/div[1]/div[2]/div[2]/div[1]/div/p', '', '', 3, '//div[@class="job-side-data"]/p[1]/img/@src');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `xpath`
--
ALTER TABLE `xpath`
  ADD PRIMARY KEY (`home_url`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `xpath`
--
ALTER TABLE `xpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
