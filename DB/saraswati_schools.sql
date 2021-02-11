-- phpMiniAdmin dump 1.9.170730
-- Datetime: 2020-09-28 05:50:16
-- Host: localhost
-- Database: saraswati_schools

/*!40030 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `image` varchar(50) NOT NULL,
  `display_date` date NOT NULL,
  `description` text NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'A',
  `position` int(5) NOT NULL,
  `type` enum('E','S','N') NOT NULL DEFAULT 'N' COMMENT '''E'' => event ,''S'' => student corner,''N''=>notice',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `contents` DISABLE KEYS */;
INSERT INTO `contents` VALUES ('5','New Admission ','5_event.JPG','2019-11-20','<p>New admission For the session 2020-21 is going on&nbsp;</p>\r\n','A','1','E'),('14','Events in SPS Main Campus','14_event.JPG','2018-04-15','<p>BIHU Festival is the main festival of Assam. It is associated with Agriculture and harvesting. There are three types of Bihu.&nbsp;Rongali Bihu celebrated in the month of April when the nature become colorful, the heart of the Assames people signs and dance with the flutes and Dhol. 2nd Bihu is celebrated in the month of October. It is known as Kongali Bihu. At that time there are less food at the farmers house, so this Bihu is being celebrated very simple way. 3rd Bihu is Bhogali Bihu. It is associated with Harvesting. now all the graineries are filled with crops, people are very happy so they building &quot;Megi Ghar&quot; with the waste of crop field and burned it.</p>\r\n','A','1','E'),('15','Student of the Year','','2018-05-20','<p><strong>On a matter of basic human nature, we are forever in a quest looking for the best version of life. The &lsquo;Perfect Fit&rsquo;, is a dream and a goal. It&rsquo;s what we aim to achieve. The perfect job, the perfect partner, the perfect house and the perfect image of what life, is supposed to look like</strong>.</p>\r\n','A','1','S'),('16','Where does it come from?','','2018-05-20','<p>On a matter of basic human nature, we are forever in a quest looking for the best version of life. The &lsquo;Perfect Fit&rsquo;, is a dream and a goal. It&rsquo;s what we aim to achieve. The perfect job, the perfect partner, the perfect house and the perfect image of what life, is supposed to look like.</p>\r\n','A','2','S'),('17','Student Corner','17_event.jpg','2018-05-16','<p>On a matter of basic human nature, we are forever in a quest looking for the best version of life. The &lsquo;Perfect Fit&rsquo;, is a dream and a goal. It&rsquo;s what we aim to achieve. The perfect job, the perfect partner, the perfect house and the perfect image of what life, is supposed to look like.</p>\r\n','A','3','E'),('18','World Environment Day Celebration','18_event.jpg','2018-06-05','<p>Celebrating World Environment Day at Saraswati Public School. Natun Sirajuli in presence of SMC President Mr. Nareswar Upadhyaya( retd. ADC), Mr. Sabyasachi Kashyap Circle Officer Dhekiajuli Revenue Circle, Mr. Prabal Piush Bharali Superindendent of Sale Tax, Mr. Rajib Gautam Secratary Saraswati Public School and students.</p>\r\n','A','0','E'),('20','World Yoga Day 21.06.19','','2019-06-06','<p>SPS Natun Sirajuli is going to celebrate International&nbsp;Day of Yoga on 21.06.19 (Friday) at 10 am in the school premises .All&nbsp; the students, parents, well wishers are cordially invited to &nbsp;make ithe events successfull.&nbsp;&nbsp;</p>\r\n','A','3','N'),('21','Mid Term Examination','','2019-09-17','<p>Mid term examination for class 1 to 8 started from 16.09.19 .</p>\r\n','A','2','N'),('22','admission','','2019-10-29','','A','1','N'),('23','Science exhibition ','23_event.jpg','2019-11-27','','A','1','E'),('24','Winter vaccation','','2019-12-27','<p><em>Winter vaccation will start from 28.12.19 andschool will reopen on 02.01.20</em></p>\r\n','A','1','N'),('25','Result 2019-20','','2020-03-28','<p>Result of Annual examination 2019-20 will be announce when Government will open the lock down.&nbsp;</p>\r\n\r\n<p>School will reopen as per Government Notification&nbsp; when situation will be&nbsp; normal.</p>\r\n','A','1','N'),('26','Result 2019-20','','2020-03-28','<p>Result of Annual examination 2019-20 will be announce when Government will open the lock down.&nbsp;</p>\r\n\r\n<p>School will reopen as per Government Notification&nbsp; when situation will be&nbsp; normal.</p>\r\n','A','1','N'),('27',' CBSE affiliation ','','2020-04-23','<p>SARASWATI PUBLIC SCHOOL\r\n ( Affiliated  to CBSE NewDelhi. Affiliation No- 230185)\r\nAdmission is open for class I to IX for the session 2020-21.\r\nSalient Features are- Yoga, Meditation, Co Curricular activities, Value Based Education, Good and cordial Relationship between teachers and students, well equipped laboratories and library, wellness teacher and special educator, CCTV surveillance etc.\r\n','A','1','N');
/*!40000 ALTER TABLE `contents` ENABLE KEYS */;

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE `galleries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `image` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `position` int(3) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` VALUES ('14','14_image.jpg','Description','1','A'),('15','15_image.jpg','Description','3','A'),('16','16_image.jpg','Description','4','A'),('17','17_image.jpg','Description','5','A'),('18','18_image.jpg','Description','6','A'),('20','20_image.jpg','Description','8','A'),('21','21_image.jpg','Description','9','A'),('22','22_image.jpg','Description','10','A'),('23','23_image.jpg','Description','11','A'),('24','24_image.jpg','Description','12','A'),('25','25_image.jpg','Students','1','A'),('26','26_image.jpg','campus','1','A'),('27','27_image.jpg','classroom','1','A'),('28','28_image.jpg','campus','1','A'),('29','29_image.jpg','tea garden','2','A'),('30','30_image.jpg','tea garden','2','A'),('31','31_image.jpg','campus','2','A'),('32','32_image.jpg','Rongoli competetion','1','A'),('33','33_image.jpg','Celebration of Children\'s Day 14.11,19\r\nCircle officer Mr. Sabyasachi Kashyap is addressing the children of Saraswati Public School.','1','A'),('34','34_image.jpg','Traditional dress and food festivals','2','A'),('35','35_image.jpg','Republic Day celebration At Saraswati Public School Natun Sirajuli','1','A');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;

DROP TABLE IF EXISTS `seos`;
CREATE TABLE `seos` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `slug` varchar(30) NOT NULL,
  `seo_title` text NOT NULL,
  `seo_meta_tag` text NOT NULL,
  `seo_meta_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `seos` DISABLE KEYS */;
INSERT INTO `seos` VALUES ('1','','saraswatipublicschools.in','saraswatipublicschools.in','saraswatipublicschools.in'),('2','about_us','title','tag','desc'),('3','gallery','title','tag','desc'),('4','events','title','tag','desc'),('5','notice','title','tag','desc'),('6','student_corner','title','tag','desc');
/*!40000 ALTER TABLE `seos` ENABLE KEYS */;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('2','Administrator','Administrator','sidd.123hai@gmail.com','88a798cec0ecc9a25da909c451adcfb8b2b6c5ef');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;


-- phpMiniAdmin dump end
