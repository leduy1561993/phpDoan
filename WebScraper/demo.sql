-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2015 at 06:05 PM
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
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JobId` int(11) NOT NULL,
  `JobName` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Salary` text,
  `Description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Tags` varchar(120) DEFAULT NULL,
  `Requirement` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Benifit` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Expired` text,
  `Logo` text NOT NULL,
  `Source` text,
  `Company` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DateCreate` datetime DEFAULT NULL,
  `IsExpired` tinyint(1) DEFAULT NULL,
  `ratepoint` float DEFAULT NULL,
  `savepoint` int(11) NOT NULL DEFAULT '0',
  `seenpoint` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rate_save_seen`
--

CREATE TABLE `rate_save_seen` (
  `UserId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `Rate` float NOT NULL DEFAULT '0',
  `IsSave` char(1) COLLATE utf8mb4_vietnamese_ci DEFAULT '0',
  `Seen` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result_recommended`
--

CREATE TABLE `result_recommended` (
  `UserId` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `Rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `SkillId` int(11) NOT NULL,
  `SkillName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`SkillId`, `SkillName`) VALUES
(1, '.NET'),
(2, '10 Base - T Switching'),
(3, '3D Max'),
(4, 'ABAP'),
(5, 'Abinitio'),
(6, 'Active Directory'),
(7, 'Active X'),
(8, 'ADO.NET'),
(9, 'Adobe CQ5'),
(10, 'Adobe Illustrator'),
(11, 'Adobe Indesign'),
(12, 'Adobe Pagemaker'),
(13, 'Adobe Photoshop'),
(14, 'Agile'),
(15, 'Agile PLM'),
(16, 'AIX'),
(17, 'AJAX'),
(18, 'ALE'),
(19, 'Android'),
(20, 'Anglais'),
(21, 'AngularJS'),
(22, 'Ansys'),
(23, 'Apache'),
(24, 'Apache Solr'),
(25, 'Apache Tomcat'),
(26, 'Apex'),
(27, 'Apple iOS'),
(28, 'Aqualogic Service bus'),
(29, 'Ariba'),
(30, 'Artpro'),
(31, 'AS400'),
(32, 'ASIC'),
(33, 'ASP'),
(34, 'ASP.NET'),
(35, 'ASSEMBLER'),
(36, 'Assembly Language'),
(37, 'Asynchronous Transfer Mode'),
(38, 'ATG - Commerce'),
(39, 'ATL'),
(40, 'Auto CAD'),
(41, 'Automation Testing'),
(42, 'Autosys'),
(43, 'Axapta'),
(44, 'BAAN'),
(45, 'Base24'),
(46, 'BASIC'),
(47, 'BGP'),
(48, 'Bigdata'),
(49, 'BizTalk Server'),
(50, 'Blue Coat'),
(51, 'BlueTooth'),
(52, 'BMC CLM'),
(53, 'BPCS'),
(54, 'BPEL'),
(55, 'Bridge Engineer'),
(56, 'BSCS'),
(57, 'Business Analyst'),
(58, 'Business Continuty Planning'),
(59, 'Business Objects'),
(60, 'Business Process Modeling'),
(61, 'C'),
(62, 'C#'),
(63, 'C#.NET'),
(64, 'C++'),
(65, 'CA Identity Manager'),
(66, 'CAD/CAM'),
(67, 'Calypso'),
(68, 'CATI'),
(69, 'CATIA'),
(70, 'CATV'),
(71, 'CCIE'),
(72, 'CDMA'),
(73, 'CGI'),
(74, 'Checkpoint'),
(75, 'CICS'),
(76, 'CIN'),
(77, 'CISCO'),
(78, 'Citrix'),
(79, 'C Language'),
(80, 'Cloud computing'),
(81, 'CMTS'),
(82, 'Cobol'),
(83, 'Codeigniter'),
(84, 'Cognos'),
(85, 'Cold Fusion'),
(86, 'COM/COM+/DCOM'),
(87, 'Communique'),
(88, 'Confirmit'),
(89, 'CORBA'),
(90, 'Core PHP'),
(91, 'Core Java'),
(92, 'Corel Draw'),
(93, 'Coremetrics'),
(94, 'CQ'),
(95, 'CRM'),
(96, 'Cryptography (encrypition, VPN, SSL/TLS.Hybrids)'),
(97, 'Crystal Report'),
(98, 'CSS'),
(99, 'Data Mining'),
(100, 'Data Modeling'),
(101, 'Data Phone'),
(102, 'Data Structures'),
(103, 'Database'),
(104, 'Data Developer'),
(105, 'Datastage'),
(106, 'Data warehousing'),
(107, 'DB2'),
(108, 'DBASE'),
(109, 'DBMS'),
(110, 'Dbus'),
(111, 'DCA'),
(112, 'Delphi'),
(113, 'Demontra'),
(114, 'Designer'),
(115, 'Developer 2000'),
(116, 'DHCP'),
(117, 'Dimensions'),
(118, 'Disaster Recovery Planning'),
(119, 'DJANGO'),
(120, 'DNS'),
(121, 'Documentum'),
(122, 'DOJO'),
(123, 'Downstream'),
(124, 'Dreamweaver'),
(125, 'Drools developer'),
(126, 'Drupal'),
(127, 'DSP'),
(128, 'DTP'),
(129, 'Duck Creek'),
(130, 'DWDM'),
(131, 'Dynamics CRM'),
(132, 'Eclipse'),
(133, 'EIGRP'),
(134, 'EJB'),
(135, 'Embedded C'),
(136, 'English'),
(137, 'Enovia'),
(138, 'Enterprise Asset'),
(139, 'Management'),
(140, 'Entity Framework'),
(141, 'ERP'),
(142, 'Ethernet'),
(143, 'Expeditor'),
(144, 'ExtJS'),
(145, 'Fast Ethernet'),
(146, 'Fatwire'),
(147, 'FileNet'),
(148, 'Finade'),
(149, 'Finagle'),
(150, 'Firewall'),
(151, 'FireWorks'),
(152, 'Flash'),
(153, 'Flex'),
(154, 'Flexcube'),
(155, 'Focus'),
(156, 'ForTran'),
(157, 'FoxPro'),
(158, 'FPGA'),
(159, 'FreeBSD'),
(160, 'Front End Development'),
(161, 'FIP'),
(162, 'Fusion Middleware'),
(163, 'Games'),
(164, 'Groovy/Groovy on Grails'),
(165, 'GSM'),
(166, 'GUI design'),
(167, 'H.323'),
(168, 'Hadoop'),
(169, 'Hbase'),
(170, 'HDLC'),
(171, 'Hibernate'),
(172, 'Hiper v'),
(173, 'Hitachi'),
(174, 'HOGN'),
(175, 'HP UNIX'),
(176, 'HSRP'),
(177, 'HTML5'),
(178, 'HTML/DHTML'),
(179, 'HTTP'),
(180, 'Hybris'),
(181, 'Hyperion'),
(182, 'Ibatis'),
(183, 'Ideas'),
(184, 'IIS'),
(185, 'Impromptu'),
(186, 'IMS'),
(187, 'IMSDB'),
(188, 'Informatica'),
(189, 'Input Accel'),
(190, 'Installshield'),
(191, 'Insteon'),
(192, 'Intershop Enfinity'),
(193, 'Intrusion prevention/detection systems'),
(194, 'iOS'),
(195, 'Ipad/Iphone'),
(196, 'iPhone'),
(197, 'IPSec'),
(198, 'IPV'),
(199, 'iRise'),
(200, 'Iron Port'),
(201, 'ISA Server'),
(202, 'ISDN'),
(203, 'IT architecture'),
(204, 'IT security'),
(205, 'IT Support'),
(206, 'ITIL'),
(207, 'ITSM'),
(208, 'J.D.Edwards'),
(209, 'J2EE'),
(210, 'J2ME'),
(211, 'J2SE'),
(212, 'Japanese'),
(213, 'Japanese Bilingual SAP'),
(214, 'Java'),
(215, 'Java Database Connectivity'),
(216, 'Java EE'),
(217, 'Java Swing'),
(218, 'Java Beans/EJB 3.0'),
(219, 'Java FX'),
(220, 'JavaScript'),
(221, 'Jax - rs'),
(222, 'Jax - ws'),
(223, 'JBoss'),
(224, 'JBoss Enterprise'),
(225, 'JCL'),
(226, 'JDBC'),
(227, 'JIRA'),
(228, 'Joomla'),
(229, 'JPA'),
(230, 'Jprofiler'),
(231, 'JQuery'),
(232, 'JSF'),
(233, 'JSON'),
(234, 'JSP'),
(235, 'Juniper'),
(236, 'Kabira Action Language'),
(237, 'KBE (Knowledge based Engineering)'),
(238, 'LabVIEW'),
(239, 'LAMP'),
(240, 'LAN'),
(241, 'Lawson'),
(242, 'LDAP'),
(243, 'Life400'),
(244, 'Liferay'),
(245, 'LINQ'),
(246, 'Linux'),
(247, 'LIS'),
(248, 'Loadrunner'),
(249, 'Loan IQ'),
(250, 'Lotus Domino Developer'),
(251, 'Lotus Notes'),
(252, 'LTE/WiMAX'),
(253, 'Mac OS'),
(254, 'Magento'),
(255, 'Mainframes'),
(256, 'Manager'),
(257, 'Manual Testing'),
(258, 'Manufacturing execution system'),
(259, 'MATLAB'),
(260, 'Maven'),
(261, 'Maximo'),
(262, 'Maya'),
(263, 'MCP'),
(264, 'MCSA'),
(265, 'MCSE'),
(266, 'Message Broker'),
(267, 'MFC'),
(268, 'Microsoft Access'),
(269, 'Microsoft Excel'),
(270, 'Microsoft Exchange'),
(271, 'Microsoft Hyper - V'),
(272, 'Microsoft Identity Integration Server (MIIS)'),
(273, 'Microsoft NT Server'),
(274, 'Microsoft Office'),
(275, 'Microsoft Outlook'),
(276, 'Microsoft Virtual Server'),
(277, 'Microsoft - Deployment Toolkit'),
(278, 'Micro Station'),
(279, 'Mobile Apps'),
(280, 'MongoDB'),
(281, 'MPLS'),
(282, 'MQ'),
(283, 'MQ Admin'),
(284, 'MS Access'),
(285, 'MS Excel'),
(286, 'MS Powerpoint'),
(287, 'MS Project'),
(288, 'MS SQL'),
(289, 'MS Visio'),
(290, 'MS - dos'),
(291, 'MSCIT'),
(292, 'Multimedia'),
(293, 'Multithreading'),
(294, 'MVC'),
(295, 'MVS'),
(296, 'MVS Assembler'),
(297, 'MySQL'),
(298, 'NAS/Network Attached Storage'),
(299, 'Natural Adabas'),
(300, 'Nebu'),
(301, 'Netcool'),
(302, 'Netsol'),
(303, 'Network security'),
(304, 'Networking'),
(305, 'NodeJS'),
(306, 'Nortel'),
(307, 'NoSQL'),
(308, 'Novell'),
(309, 'Objective - C'),
(310, 'Omniture'),
(311, 'OOP'),
(312, 'OOPS'),
(313, 'Operating Systems'),
(314, 'Optimax'),
(315, 'Oracle'),
(316, 'Oracle Apps'),
(317, 'Oracle BPM'),
(318, 'Oracle Database'),
(319, 'Oracle Function Middleware'),
(320, 'Oracle SOA'),
(321, 'Oracle WareHouse Builder'),
(322, 'Orbeon'),
(323, 'ORCAD'),
(324, 'Page Maker'),
(325, 'PASCAL'),
(326, 'PDH'),
(327, 'PEGA PRPC'),
(328, 'Peoplesoft'),
(329, 'Perl'),
(330, 'PHP'),
(331, 'PTM'),
(332, 'Picanol Gammex'),
(333, 'PL/1'),
(334, 'PLC Programming'),
(335, 'Polyurea Sprayer'),
(336, 'PostgreSQL'),
(337, 'PowerBuilder'),
(338, 'PowerPlay'),
(339, 'Predictive Analytics and Modeling'),
(340, 'Primavera'),
(341, 'Pro - C'),
(342, 'Product Manager'),
(343, 'PRO - E'),
(344, 'Project Manager'),
(345, 'Programming and Application Development'),
(346, 'Progress 4GL'),
(347, 'Puppet'),
(348, 'PVST'),
(349, 'Python'),
(350, 'QA/QC'),
(351, 'QTP'),
(352, 'Quantum'),
(353, 'QuarkXpress'),
(354, 'Radius'),
(355, 'Rapier looms'),
(356, 'Rational Tools'),
(357, 'RDBMS'),
(358, 'Red Hat Enterprise Linux'),
(359, 'Red Hat/Linux'),
(360, 'Remedy'),
(361, 'Remedy ITSM'),
(362, 'Remoting'),
(363, 'REST'),
(364, 'RESTful'),
(365, 'REXX'),
(366, 'RFID (radio frequency identification)'),
(367, 'RMI'),
(368, 'Routing'),
(369, 'RPG'),
(370, 'RPGILE'),
(371, 'RTOS'),
(372, 'RTSP'),
(373, 'Ruby'),
(374, 'Ruby on Rails'),
(375, 'SAAS'),
(376, 'Sales Engineer'),
(377, 'Salesforce'),
(378, 'SAN/Storage Area Networks'),
(379, 'SAP'),
(380, 'SAP ABAP'),
(381, 'SAP AFS'),
(382, 'SAP APO'),
(383, 'SAP Blanking'),
(384, 'SAP Basis'),
(385, 'SAP BODI (Business Objects Data Integrator)'),
(386, 'SAP BPC'),
(387, 'SAP BSP'),
(388, 'SAP Business One'),
(389, 'SAP BW/BI'),
(390, 'SAP CIM'),
(391, 'SAP CO'),
(392, 'SAP Controlling'),
(393, 'SAP CRM'),
(394, 'SAP Crystal Reports'),
(395, 'SAP CS'),
(396, 'SAP EP'),
(397, 'SAP HR'),
(398, 'SAP IM'),
(399, 'SAP IS - Gas/Oil'),
(400, 'SAP IS - Retail'),
(401, 'SAP MDM'),
(402, 'SAP MDX'),
(403, 'SAP MI'),
(404, 'SAP MM'),
(405, 'SAP Mobile'),
(406, 'SAP MRO'),
(407, 'SAP Netweaver'),
(408, 'SAP Netweaver Applications Server'),
(409, 'SAP Netweaver Visual Composer'),
(410, 'SAP PLM'),
(411, 'SAP PM'),
(412, 'SAP PP'),
(413, 'SAP PS'),
(414, 'SAP PSCD'),
(415, 'SAP PY (Payroll)'),
(416, 'SAP QM'),
(417, 'SAP Retail'),
(418, 'SAP RF/Auto - ID'),
(419, 'SAP SCM'),
(420, 'SAP SD'),
(421, 'SAP SD - GTS'),
(422, 'SAP Security'),
(423, 'SAP SEM'),
(424, 'SAP Service and Asset Mgt.'),
(425, 'SAP SM'),
(426, 'SAP Smart Forms'),
(427, 'SAP Solution Manager'),
(428, 'SAP SRM'),
(429, 'SAP Testing'),
(430, 'SAP TM'),
(431, 'SAP Web Application Server'),
(432, 'SAP WM'),
(433, 'SAP WM - EWM'),
(434, 'SAP WMS'),
(435, 'SAP Xcelsius'),
(436, 'SAP XI'),
(437, 'SAP xMII'),
(438, 'SAS'),
(439, 'SCADA'),
(440, 'SCCM'),
(441, 'Scrum'),
(442, 'SDH'),
(443, 'SDLC'),
(444, 'Selenium'),
(445, 'SEO'),
(446, 'Servlet'),
(447, 'SFDC'),
(448, 'Sharepoint'),
(449, 'Shell Script'),
(450, 'Siebel'),
(451, 'Silverlight'),
(452, 'Singleview'),
(453, 'SIP'),
(454, 'Siteminder'),
(455, 'Smartplant'),
(456, 'SmartStream'),
(457, 'SMARTY'),
(458, 'SMTP'),
(459, 'SNMP'),
(460, 'SOA developer'),
(461, 'SOAP'),
(462, 'Software Architect'),
(463, 'Solaris'),
(464, 'Solidworks'),
(465, 'Spring'),
(466, 'SPSS'),
(467, 'SQL'),
(468, 'SQL Server'),
(469, 'SSIS'),
(470, 'SSRS'),
(471, 'Sterling Commerce'),
(472, 'Storage & Virtualization'),
(473, 'STP'),
(474, 'Struts'),
(475, 'Switching'),
(476, 'Sybase'),
(477, 'Symbian'),
(478, 'SYNON'),
(479, 'System Admin'),
(480, 'System Engineer'),
(481, 'SystemC TLM 2.0 Modeling'),
(482, 'SystemC Virtual prototype modeling'),
(483, 'T - SQL'),
(484, 'Tally'),
(485, 'Tandem'),
(486, 'TCL/TK'),
(487, 'TCP/IP'),
(488, 'Teamcenter'),
(489, 'Team Leader'),
(490, 'TELNET'),
(491, 'Teradata'),
(492, 'Tester'),
(493, 'Tibco'),
(494, 'TIBCO - BusinessEvents'),
(495, 'TIBCO - Business Works'),
(496, 'TIBCO - MDM'),
(497, 'TIBCO - Spotfire'),
(498, 'TIBCO - Tibbr'),
(499, 'Tivoil'),
(500, 'TOAD'),
(501, 'Tomcat'),
(502, 'UML'),
(503, 'Unified communications'),
(504, 'Uni Graphics'),
(505, 'Unit testing'),
(506, 'Unity'),
(507, 'Unix'),
(508, 'Upstream'),
(509, 'UX/UI Design'),
(510, 'VB.NET'),
(511, 'Veriblog'),
(512, 'VHDL'),
(513, 'Vignette'),
(514, 'Virtualization'),
(515, 'Visio'),
(516, 'Vision Plus'),
(517, 'Visual Basic'),
(518, 'Visual C++'),
(519, 'Visual Foxpro'),
(520, 'Visual Studio'),
(521, 'Visual Interdev'),
(522, 'Visual J++'),
(523, 'Visual SQL'),
(524, 'VLSI'),
(525, 'VMWare'),
(526, 'VMware vSphere'),
(527, 'Voice XML'),
(528, 'VOIP'),
(529, 'VPN'),
(530, 'VRRP'),
(531, 'VSAM'),
(532, 'VSAT'),
(533, 'VxWorks'),
(534, 'WAN'),
(535, 'WAP'),
(536, 'Warping'),
(537, 'Waterfall'),
(538, 'WCF'),
(539, 'Web Development'),
(540, 'Web Dynapro'),
(541, 'Web Services'),
(542, 'Webcenter'),
(543, 'WebLogic'),
(544, 'Web Methods'),
(545, 'Web Riposte'),
(546, 'Web Sphere'),
(547, 'Wind chill'),
(548, 'Windows 2K/XP'),
(549, 'Windows CE'),
(550, 'Windows Phone'),
(551, 'Winform'),
(552, 'Winrunner'),
(553, 'WML'),
(554, 'Wordpress'),
(555, 'Workflow'),
(556, 'Foundation'),
(557, 'WPC'),
(558, 'WPF'),
(559, 'xforms'),
(560, 'XHTML'),
(561, 'XML'),
(562, 'XML Publisher'),
(563, 'XSL'),
(564, 'Yii');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `FullName` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Birthday` text,
  `Gender` text,
  `Address` text,
  `DesireLocation` text,
  `Phone` text,
  `Career_Objective` text,
  `image_user` text,
  `activation` varchar(40) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `FullName`, `Email`, `Password`, `Birthday`, `Gender`, `Address`, `DesireLocation`, `Phone`, `Career_Objective`, `image_user`, `activation`, `status`) VALUES
(55, 'Ngọc Bích', 'duthienthan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1993-10-15 ', 'Nam', 'Bình Thuận', NULL, '01234582695', '', NULL, '66921c014bb3a49a9c57eaf235607e15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_setting`
--

CREATE TABLE `user_setting` (
  `UserId` int(11) NOT NULL,
  `Location` text CHARACTER SET utf8,
  `NumberRec` int(11) DEFAULT '5',
  `SkillId` int(11) DEFAULT '0',
  `TimeRec` int(11) DEFAULT '3',
  `State` enum('0','1') COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT '0',
  `last_update` bigint(15) NOT NULL DEFAULT '0',
  `offset` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `user_setting`
--

INSERT INTO `user_setting` (`UserId`, `Location`, `NumberRec`, `SkillId`, `TimeRec`, `State`, `last_update`, `offset`) VALUES
(55, 'Bình Thuận', 5, 0, 3, '1', 1449845018000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_similarity`
--

CREATE TABLE `user_similarity` (
  `UserId` int(11) NOT NULL,
  `User_Similarity` int(11) NOT NULL,
  `Index_Similarity` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_skill`
--

CREATE TABLE `user_skill` (
  `UserId` int(11) NOT NULL,
  `SkillId` int(11) NOT NULL,
  `Experience_Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JobId`);

--
-- Indexes for table `rate_save_seen`
--
ALTER TABLE `rate_save_seen`
  ADD PRIMARY KEY (`UserId`,`JobId`),
  ADD KEY `t9` (`JobId`);

--
-- Indexes for table `result_recommended`
--
ALTER TABLE `result_recommended`
  ADD PRIMARY KEY (`UserId`,`JobId`),
  ADD KEY `t7` (`JobId`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`SkillId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_setting`
--
ALTER TABLE `user_setting`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_similarity`
--
ALTER TABLE `user_similarity`
  ADD PRIMARY KEY (`UserId`,`User_Similarity`),
  ADD KEY `t4` (`User_Similarity`);

--
-- Indexes for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`UserId`,`SkillId`),
  ADD KEY `t1` (`UserId`),
  ADD KEY `t2` (`SkillId`);

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
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JobId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=422;
--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `SkillId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `xpath`
--
ALTER TABLE `xpath`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rate_save_seen`
--
ALTER TABLE `rate_save_seen`
  ADD CONSTRAINT `t8` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `t9` FOREIGN KEY (`JobId`) REFERENCES `job` (`JobId`);

--
-- Constraints for table `result_recommended`
--
ALTER TABLE `result_recommended`
  ADD CONSTRAINT `t6` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `t7` FOREIGN KEY (`JobId`) REFERENCES `job` (`JobId`);

--
-- Constraints for table `user_setting`
--
ALTER TABLE `user_setting`
  ADD CONSTRAINT `t5` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `user_similarity`
--
ALTER TABLE `user_similarity`
  ADD CONSTRAINT `t3` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `t4` FOREIGN KEY (`User_Similarity`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `t1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`),
  ADD CONSTRAINT `t2` FOREIGN KEY (`SkillId`) REFERENCES `skill` (`SkillId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
