-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2017 at 10:48 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ynetbkk_ynet`
--

-- --------------------------------------------------------

--
-- Table structure for table `acadamic`
--

CREATE TABLE IF NOT EXISTS `acadamic` (
  `id_acadamic` int(4) NOT NULL,
  `img_acadamic` varchar(200) DEFAULT 'noimg.jpg',
  `name_acadamic` text NOT NULL,
  `name_positions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acadamic`
--

INSERT INTO `acadamic` (`id_acadamic`, `img_acadamic`, `name_acadamic`, `name_positions`) VALUES
(1001, 'noimg.jpg', 'พชรพรรษ์ ประจวบลาภ', 'ประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1002, 'noimg.jpg', 'กาญจนา วิจิตรบูรพา', 'รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1003, 'noimg.jpg', 'รวิศุทธ์ คณิตกุลเศรษฐ์', 'รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1004, 'noimg.jpg', 'นายสุรเชษฐ์ โพธิ์แสง', 'รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1005, 'noimg.jpg\r\n\r\n', 'เพชรมงคล วัสสุวรรณ', 'ผู้ช่วยประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1006, 'noimg.jpg', 'ปารณัท กลิ่นหอม', 'ที่ปรึกษาประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร'),
(1007, 'noimg.jpg', 'ยุวทัศน์ กรุงเทพ', 'เลขานุการประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร');

-- --------------------------------------------------------

--
-- Table structure for table `added`
--

CREATE TABLE IF NOT EXISTS `added` (
  `id_added` int(3) NOT NULL,
  `id_admin` int(3) NOT NULL,
  `id_news` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(3) NOT NULL,
  `name_admin` varchar(15) NOT NULL,
  `username_admin` varchar(15) NOT NULL,
  `password_admin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name_admin`, `username_admin`, `password_admin`) VALUES
(0, 'patcharapan ', 'patcharapan', '123465'),
(1, 'metchanon', 'metchanon', '123456'),
(2, 'pr ynet', 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `backup_logs`
--

CREATE TABLE IF NOT EXISTS `backup_logs` (
  `id_backup_logs` varchar(32) NOT NULL,
  `backup_file` varchar(256) NOT NULL,
  `backup_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_key` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE IF NOT EXISTS `components` (
  `id` int(100) NOT NULL,
  `name_components` text NOT NULL,
  `data` text,
  `data2` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `name_components`, `data`, `data2`, `status`) VALUES
(1, 'ข่าวกิจกรรม', '', '', 0),
(2, 'ข่าวประชาสัมพันธ์', '', '', 0),
(3, 'ข่าวจัดซื้อจัดจ้าง', '', '', 1),
(4, 'ดาวน์โหลดเอกสาร', '', '', 0),
(5, 'ยุวทัศน์ links', '', '', 0),
(6, 'ชื่อเว็บไซต์', 'เครือข่ายยุวทัศน์ กรุงเทพมหานคร', 'YOUTH NETWORK OF BANGKOK', 0),
(7, 'favicon', '0ff35d93a3dabef498b0a588d7f3840a.jpeg', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(10) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `verify` int(11) NOT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `picture` varchar(250) NOT NULL,
  `type` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `username`, `password`, `name`, `email`, `verify`, `facebook_id`, `link`, `date`, `picture`, `type`) VALUES
(12, 'admin', '3135134162', 'patcharapan prajuablap', 'ynet-bangkok', 0, NULL, NULL, NULL, '', 'admin'),
(51, 'topspinppy', '432018', 'ประยุทธ์ จันทรโอชา', 's5806021623049@email.kmutnb.ac.th', 0, NULL, NULL, NULL, '', 'member'),
(52, 'ynetbkk', 'ynetbkk', 'เครือข่ายยุวทัศน์ กรุงเทพมหานคร', 'ynet-bangkok@hotmail.com', 0, NULL, NULL, NULL, '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id_news` int(10) NOT NULL,
  `head_news` text NOT NULL,
  `description_news` text NOT NULL,
  `images` varchar(200) DEFAULT 'noimg.jpg',
  `id_type_news` int(15) NOT NULL,
  `doc_download` text NOT NULL,
  `dates` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_name` text NOT NULL,
  `news_status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `head_news`, `description_news`, `images`, `id_type_news`, `doc_download`, `dates`, `admin_name`, `news_status`) VALUES
(23, 'ยทก.เข้าร่วมงานเปิดตัวศูนย์ชัวร์ก่อนแชร์ อสมท.', 'วันนี้ (๐๓/๐๔/๒๕๖๐) เวลา ๑๔.๐๐ เครือข่ายยุวทัศน์ กรุงเทพมหานคร นำโดย นายพชรพรรษ์ ประจวบลาภ ประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร ร่วมงานเปิดตัวศูนย์ชัวร์ก่อนแชร์ ที่สำนักข่าวไทย อสมท. ร่วมกับกองทุนพัฒนาสื่อปลอดภัยและสร้างสรรค์ และหน่วยงานองค์กรพันธมิตร เพื่อเฝ้าระวังและตรวจสอบข้อมูลบนโลกออนไลน์', '201744_47966.jpg', 1, '', '2017-07-05 11:32:57', 'admin', 0),
(43, 'ยทก.จัดกิจกรรมร่วมกับสภานักเรียนฯ', 'เมื่อวันที่ 16 มิถุนายน 2560 เวลา 08.00 - 15.30 นาฬิกา เครือข่ายยุวทัศน์ กรุงเทพมหานคร ร่วมกับ สภานักเรียนโรงเรียนนนทบุรีวิทยาลัย จัดกิจกรรม "ํYNET School" โดยมีวัตถุประสงค์เพื่อให้นักเรียนในสภานศึกษาได้เรียนรู้เรื่องปัจจัยเสี่ยงในสังคม อาทิ เรื่องพิษภัยจากบุหรี่ การพนันออนไลน์ เพศศึกษา ตลอดจนเสริมสร้างนักเรียนให้เป็นเด็กดี มีคุณธรรม โดยมีนักเรียนเข้าร่วมกว่า 80 คน จัดขึ้น ณ ห้องประชุมชั้น 5 โรงเรียนนนทบุรีวิทยาลัย จังหวัดนนทบุรี', '2017619_53532.jpg', 1, '', '2017-07-06 06:55:47', 'admin', 0),
(59, 'เช่ารถยนต์บรรทุก 1 ตัน 4 ประตู แบบ Double Cab จำนวน 2 คัน', 'รายละเอียดดังไฟล์แนบ สามารถดาวน์โหลดได้ลิงค์ด้านล่าง', '2017826_61951.jpg', 3, '', '2017-07-11 11:29:34', 'admin', 0),
(61, 'ยทก. จัดกิจกรรมปลูกป่าถวายในหลวง ร.9', 'เมื่อวันอาทิตย์ที่ 3 กันยายน 2560 เวลา 11.30 นาฬิกา เครือข่ายยุวทัศน์ กรุงเทพมหานคร จัดกิจกรรมปลูกป่าถวายในหลวง รัชกาลที่ 9 โดยร่วมกับภาคประชาสังคมผู้ขับขี่รถยนต์ยี่ห้อ MG ปลูกต้นกล้าจำนวน 99 ต้น เพื่อถวายเป็นพระราชกุศลแด่พระบาทสมเด็จพระปรมินทรมหาภูมิพลอดุลยเดช ณ อุทยานแห่งชาติไทรโยค อำเภอไทรโยค จังหวัดกาญจนบุรี ซึ่งในอนาคตทางอุทยานแห่งชาติไทรโยคจะพัฒนาพื้นที่ตรงนี้ให้เป็นสถานที่ท่องเที่ยวตามรอยพระราชา ตลอดจนเป็นการสนองแนวพระราชดำริที่ทรงห่วงใยทรัพยากรป่าไม้ และสิ่งแวดล้อม', '201797_56865.jpg', 2, '', '2017-09-08 11:20:52', 'admin', 0),
(62, 'ยทก.จัดประชุมโครงการ"มีวินัย ช่วยลดอุบัติเหตุ"', 'วันพฤหัสบดีที่ 31 สิงหาคม 2560 เครือข่ายยุวทัศน์ กรุงเทพมหานคร ร่วมกับศูนย์คุณธรรม (องค์การมหาชน) และบริษัทเอ็มจี เซลส์ (ประเทศไทย) จัดประชุมปรึกษาหารือแนวทางการดำเนินโครงการ"มีวินัย ช่วยลดอุบัติเหตุ" ณ ห้องประชุม 1 ชั้น 16 ศูนย์คุณธรรม (องค์การมหาชน) โดยมีผู้แทนจากมหาวิทยาลัยรัฐและเอกชนเข้าร่วม การประชุมครั้งนี้มีวัตถุประสงค์เพื่อหารือแนวทางการมีส่วนร่วมของนักศึกษากับการสร้างวินัยบนท้องถนน ตลอดจนส่งเสริมทักษะการขับขี่รถยนต์ในระดับอุดุมศึกษา', '2017831_68391.jpg', 2, '', '2017-09-08 14:43:12', 'admin', 0),
(63, 'ยทก. ประชุมปรึกษาหารือการจัดสมัชชาเด็กและเยาวชน ไทย-ลาว', 'เมื่อระหว่างวันที่ 23 - 24 สิงหาคม 2560 เครือข่ายยุวทัศน์ กรุงเทพมหานคร นำโดย นายรวิศุทธ์ คณิตกุลเศรษฐ์ รองประธานเครือข่ายยุวทัศน์ กรุงเทพมหานคร พร้อมด้วยนายเมธชนนท์ ประจวบลาภ รองเลขาธิการเครือข่ายยุวทัศน์ กรุงเทพมหานคร นายรัฐธรรมนูญ ทั่งทอง หัวหน้าสำนักวิชาการและแผนงาน และนายสุริยันต์ ผาละนัด หัวหน้ากลุ่มอำนวยการและบริหาร เดินทางไปยัง สถานเอกอัครราชทูตไทย ณ กรุงเวียงจันทร์ สาธารณรัฐประชาธิปไตยประชาชนลาว เพื่อปรึกษาหารือการจัดประชุมสมัชชาเด็กและเยาวชนสองฝั่งโขง (ไทย-ลาว) โดยมีวัตถุประสงค์เพื่อแลกเปลี่ยนการทำงานและแนวทางการดำเนินงานด้านการควบคุมยาสูบของแต่ละประเทศ ตลอดจนสร้างเครือข่ายระหว่างแกนนำเด็กและเยาวชนทั้ง 2 ประเทศ ซึ่งมีกำหนดจัดประชุมขึ้นในระหว่างวันที่ 29 - 30 กันยายน 2560 ณ โรงแรมอัครวรรณ (ศูนย์การค้าอัครวรรณช๊อปปิ้งคอมเพล็กซ์) อำเภอเมือง จังหวัดหนองคาย', '2017826_61951.jpg', 2, '', '2017-09-08 14:44:21', 'admin', 0),
(65, 'ศรีสะเกษเปิดตัว Gen Z สืบสานความดี ถวายแด่ในหลวงรัชกาลที่ 9 (มติชน) 15-12-59 \r\n', 'http://www.matichon.co.th/news/394727', 'noimg.jpg', 4, '', '2017-09-08 22:33:34', '', 0),
(67, 'เครือข่ายยุวทัศน์ฯ จัดกิจกรรมเซ็นใบหย่า เลิกบุหรี่ เนื่องในวันแห่งความรัก (ครอบครัวข่าว 3) 15-02-60', 'https://goo.gl/KIWVLc', 'noimg.jpg', 4, '', '2017-09-12 05:51:58', 'admin', 0),
(68, 'ยุวทัศน์หนุนขับขี่ปลอดภัย (ข่าวสด) 21-11-59', 'http://daily.khaosod.co.th/view_news.php?newsid=TURONWIzVXdOakl4TVRFMU9RPT0=&sectionid=TURNeE1RPT0=&day=TWpBeE5pMHhNUzB5TVE9PQ==', 'noimg.jpg', 4, '', '2017-09-12 05:53:55', 'admin', 0),
(70, 'ยุวทัศน์ฯ แถลงข่าวหลักสูตรคุ้มครองเด็กจากสื่อออนไลน์', 'วันที่ 14 กันยายน 2560 เวลา 09.30 นาฬิกา นายสิรวิชญ์ โรจน์วัฒนาศิริ เลขาธิการเครือข่ายยุวทัศน์ กรุงเทพมหานคร   แถลงข่าวเปิดตัวหลักสูตรองค์กรผู้นำเยาวชนเพื่อการคุ้มครองเด็กและเยาวชนจากสื่อออนไลน์ ซึ่งเป็นการร่วมมือระหว่างเครือข่ายยุวทัศน์ กรุงเทพมหานคร และสถาบันกฎหมายสื่อดิจิทัล มหาวิทยาลัยเกษมบัณฑิต ทั้งนี้ยังมีพิธีลงนามบันทึกข้อตกลงความร่วมมือทางวิชาการร่วมกันอีกด้วย ภายในงานได้รับเกียรติจาก ดร.วัลลภ สุวรรณดี อธิการบดีมหาวิทยาลัยเกษมบัณฑิต และประธานที่ปรึกษาของผู้ว่าราชการกรุงเทพมหานคร  และนายธาดา เศวตศิลา กรรมการผู้ทรงคุณวุฒิศูนย์คุณธรรม (องค์การมหาชน) ร่วมเป็นสักขีพยาน', '25600914_๑๗๐๙๑๔_0163.jpg', 2, '', '2017-09-14 14:15:35', 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slideshow`
--

CREATE TABLE IF NOT EXISTS `slideshow` (
  `slide_key` int(100) NOT NULL,
  `slide_file` varchar(256) NOT NULL,
  `slide_link` text NOT NULL,
  `slide_status` tinyint(1) NOT NULL,
  `slide_insert` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploadby` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slideshow`
--

INSERT INTO `slideshow` (`slide_key`, `slide_file`, `slide_link`, `slide_status`, `slide_insert`, `uploadby`) VALUES
(2, 'king9.png', 'http://king.ynetbangkok.or.th', 0, '2017-07-08 14:04:39', ''),
(4, '215571971483770218381709500480036o.jpg', 'http://kidsdee.ynetbangkok.or.th', 0, '2017-09-10 07:44:28', 'admin'),
(5, 'BannerKilaThamDcopy(1).jpg', 'http://klatamdee.ynetbangkok.or.th', 0, '2017-09-10 17:46:18', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `type_news`
--

CREATE TABLE IF NOT EXISTS `type_news` (
  `id_type_news` int(15) NOT NULL,
  `name_type_news` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type_news`
--

INSERT INTO `type_news` (`id_type_news`, `name_type_news`) VALUES
(1, 'ข่าวประชาสัมพันธ์'),
(2, 'ข่าวกิจกรรม'),
(3, 'ข่าวจัดซื้อจัดจ้าง'),
(4, 'ข่าวจากสื่อ');

-- --------------------------------------------------------

--
-- Table structure for table `webstats`
--

CREATE TABLE IF NOT EXISTS `webstats` (
  `date_visited` date NOT NULL,
  `ip` varchar(30) NOT NULL,
  `browser` varchar(20) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `webstats`
--

INSERT INTO `webstats` (`date_visited`, `ip`, `browser`, `os`) VALUES
('2017-06-09', '::1', 'Chrome', 'Unknown');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acadamic`
--
ALTER TABLE `acadamic`
  ADD PRIMARY KEY (`id_acadamic`);

--
-- Indexes for table `added`
--
ALTER TABLE `added`
  ADD PRIMARY KEY (`id_added`),
  ADD KEY `id_news` (`id_news`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_type_news` (`id_type_news`);

--
-- Indexes for table `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`slide_key`);

--
-- Indexes for table `type_news`
--
ALTER TABLE `type_news`
  ADD PRIMARY KEY (`id_type_news`);

--
-- Indexes for table `webstats`
--
ALTER TABLE `webstats`
  ADD PRIMARY KEY (`date_visited`,`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `slide_key` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_news`
--
ALTER TABLE `type_news`
  MODIFY `id_type_news` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `added`
--
ALTER TABLE `added`
  ADD CONSTRAINT `added_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `added_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_type_news`) REFERENCES `type_news` (`id_type_news`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
