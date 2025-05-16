-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2025 at 08:05 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brightminds`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `FullName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(255) NOT NULL,
  `phNumber` varchar(100) NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  UNIQUE KEY `phNumber` (`phNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`FullName`, `Email`, `phNumber`, `comment`) VALUES
('Andre Ragbir', 'andre@gmail.com', '18687271324', 'dfdsdfsfsfsfsfsf'),
('Andre Ragbir', 'andreragbir121@gmail.com', '8687285702', 'Well structured site');

-- --------------------------------------------------------

--
-- Table structure for table `essaydetails`
--

DROP TABLE IF EXISTS `essaydetails`;
CREATE TABLE IF NOT EXISTS `essaydetails` (
  `essayID` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `essayTitle` varchar(100) NOT NULL,
  `fullEssay` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `essayDate` date NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `schoolName` enum('Penal_Secondary_School','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classLevel` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `instructorID` int DEFAULT NULL,
  `instructorName` varchar(255) NOT NULL DEFAULT 'UNGRADED',
  `essayRating` int NOT NULL,
  `grade` enum('UNGRADED','A (Excellent)','B (Good)','C (Satisfactory)','D (Needs Improvement)','F (Fail)') NOT NULL DEFAULT 'UNGRADED',
  `comment` varchar(255) NOT NULL DEFAULT 'UNGRADED',
  PRIMARY KEY (`essayID`),
  KEY `essayTitle` (`essayTitle`),
  KEY `studentName` (`studentName`),
  KEY `schoolName` (`schoolName`),
  KEY `studentClass_2` (`classLevel`),
  KEY `username` (`username`),
  KEY `essayID` (`essayID`),
  KEY `instructorID` (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `essaydetails`
--

INSERT INTO `essaydetails` (`essayID`, `username`, `essayTitle`, `fullEssay`, `essayDate`, `studentName`, `schoolName`, `classLevel`, `instructorID`, `instructorName`, `essayRating`, `grade`, `comment`) VALUES
('Andre2', 'andreragbir', 'Television', 'Television is one of the many wonders of modern science and technology. It was invented in England by the Scottish scientist J.N. Baird in 1928 and the British Broadcasting Corporation was the first to broadcast television images in 1929. Previously the radio helped us hear things from far and near and spread information and knowledge from one corner of the globe to another. But all this was done through sound only. But television combined visual images with sound.\r\n\r\nToday we can watch games, shows, and song and dance programs from all corners of the world while sitting in our own homes. TV can be used for  educating the masses, for bringing to us the latest pieces of information audio-visually, and can provide us with all kinds of entertainment even in colour.\r\n\r\nBut as in all things, too much televiewing may prove harmful. TV provides visual images but the televiewer has a limited choice of programs. He has to adjust himself to the scheduled programs of a particular television channel. But as for the book, a reader’s imagination plays a vital role. He can freely read a book which is a personal activity and it cannot be shared with others at the same time. In many cases, the habit of watching TV has an adverse effect on the study habits of the young. When we read books, we have to use our intelligence and imagination. But in most cases, TV watching is a passive thing. It may dull our imagination and intelligence.', '2024-09-21', 'Andre Ragbir', 'Penal_Secondary_School', 'form5', 2, 'Josh May', 4, 'B (Good)', 'sdsafdfggdghfhgjhjg'),
('andre4', 'andreragbir', 'Science', 'Science is a great boon to human civilization. All signs of Progress in civilization have been made possible by science. Science has made our life easy and comfortable. It has given us electric fans, and lights. fans cool us, lights remove darkness. Lift, washing machine, etc. save our labour. Car, train, bus, and aircraft have made our travel speedy and comfortable. The computer has taken the excess load off our brains. Science has given us life-saving medicine. Surgery can do something miraculous. Space flight is another wonder of science.\r\n\r\nThus through the gifts of science, the man who had once lived in the cave has now landed on the science of the moon is a blessing to us. But it is a curse at the same time. Science has given us speed but has taken away our emotions. It has made our machine. The introduction of the mobile phone has destroyed the art of letter writing. Science has made war more dreadful by inventing sophisticated weapons. Peace has become scarce. Yet there are some abuses of science. It has given us the frightful nuclear weapons that can destroy the whole world.\r\n\r\nBut who is responsible for making Science a curse? Certainly, it is the evil intention of a few scientists and malignant politicians. We can use fire for cooking our food or burning other’s houses. It is not the fault of fire, but of its users. Likewise, man is responsible for the uses and abuses of science. But science cannot be blamed for this.', '2023-06-20', 'Andre Ragbir', 'Penal_Secondary_School', 'form5', 2, 'Josh May', 2, 'F (Fail)', 'dnafjsnghsrtghruhnrhgrh'),
('baron1', 'BaronJoice', 'Health is Wealth', 'The greatest wealth is our own health. A healthy body can earn great wealth but, a wealthy person cannot earn great health. We live in a fast-moving world where individuals have no time for themselves. Most part of their life withers away in search of materialistic wealth in order to outshine others but, along the way, they lose their health.\r\n\r\nRecent studies have shown that the increased stress of the present speedy life is leading to various medical conditions. Major among those are heart and neurological problems. Good health assists an individual to keep a positive attitude toward work and life in general. Wealth matters, but, is not as important as health.\r\n\r\nSpending lots of money on junk food in five-star hotels or on other entertainment sources like watching films for a day and so on has no advantages other than self-satisfaction. Being physically and mentally healthy helps an individual to be socially and financially healthy as well. A healthy person can earn lots of money however an unhealthy person cannot because of a lack of motivation, interest, and concentration level.\r\n\r\nMoney is the source to carry on with a healthy life however good health is the source of living a happy and peaceful life. So, everyone should take many precautions in maintaining good health. Everyone should be away from bad habits and unhealthy lifestyles. Being healthy isn’t only the condition of being free of disease, ailment, or injury but also being happy physically, mentally, socially, intellectually, and financially. Good health is an actual necessity of happy life and the greatest gift from nature.', '2024-03-20', 'Baron Joice', 'Iere_High_School', 'form4', NULL, 'UNGRADED', 0, 'UNGRADED', 'UNGRADED'),
('BruceCharles1', 'BruceCharles', 'Balanced Diet', 'A diet that contains all kinds of necessary ingredients in almost the required quantity is called the “Balanced Diet”. A Balanced diet is one that helps to maintain or improve overall health. We should consume a balanced diet consisting of essential nutrition: liquids, adequate proteins, essential fatty acids, vitamins, minerals, and calories. We must eat fresh fruits, salad, green leafy vegetables, milk, egg, yoghurt, etc. on time in order to maintain a healthy body.\r\n\r\nAmong the minerals, we require chiefly iron, calcium, sodium, potassium, and small quantities of iodine, copper, etc. They are found in green vegetables and most fruits, Vitamins have a number of kinds like A, B, C, D, etc. Vitamin A is found in fish oil, butter, carrot, papaya, etc., and Vitamin B is found in green leafy vegetables, wheat grain, etc. Vitamin C is found in green chilli, green vegetables, amla, lemon, and citric fruits. Vitamin D is found in the first oil, butter, and rays of the sun. We also need Vitamins E and K for our health. Milk is perhaps the only single item that can be called a balanced diet in itself.\r\n\r\nAnimal protein is found in meats, poultry, and fish. The white of an egg also contains protein. Another kind of protein is found in milk (casein), cheese, curd, pulses, soybean, dry fruits, etc. Fat is found in butter, pork, coconut, all edible oils, cod liver oil, the yolk of an egg, etc. We should drink more water at least 7-8 glasses of water. A healthy body also needs some daily physical activities, proper rest and sleep neatness, a healthy environment, fresh air, and water, personal hygiene, etc.', '2024-03-01', 'Bruce Charles', 'Penal_Secondary_School', 'form5', NULL, 'UNGRADED', 0, 'UNGRADED', 'UNGRADED'),
('ChristianTeal1', 'ChristianTeal', 'Co-Education', 'Co-education is a system of education in which boys and girls study together in a common school or college. Co-education was not prevalent in ancient times. It is a groundbreaking thought. Co-education is exceptionally practical. The number of schools required is less. The strength of the teaching staff is diminished. The government spends less money on infrastructure and laboratories. The balance of money so saved is spent on better maintenance of schools and colleges, which facilitates the students for better study.\r\n\r\nThe parents supported the case for adequate education for the children irrespective of their sex. The countrymen realized that the boys and girls have to move together and shoulder to shoulder in every walk of life in the free world. They started educating their children in co-educational institutions. That is the reason why the students of co-educational institutions do better in every walk of their life.\r\n\r\n\r\nIt is useful in producing a sensation of solidarity and a feeling of equivalent obligation among boys and girls. When young boys and girls come closer to each other, they take more care in understanding each other. That helps in creating a friendly atmosphere between the two. The boys and the girls partake in their joint exercises consistently in schools and universities.\r\n\r\nIf we want that our country ought to sparkle, we need to bring young boys and young girls together for making a power of working hands in the country, which can give a compelling reaction for greatness by accelerating the advancement in every one of the fields.', '2024-02-25', 'Christian Teal', 'Penal_Secondary_School', 'form3', NULL, 'UNGRADED', 0, 'UNGRADED', 'UNGRADED'),
('DavonKey1', 'DavonKey', 'Noise Pollution', 'Any unwanted loud sound which causes stress and irritation can be termed noise pollution. Of late, sound or noise pollution has adversely affected our normal life in a major way. It is chasing us at almost every step. In schools, colleges, offices, and even hospitals we have an explosion of deafening sound. The main sources of noise pollution are Means of transport, the Use of loudspeakers, the Industrial sector, and the Celebration of festivals and wedding ceremonies. We are almost deafened by the blaring mikes or the record players which are often played at full volume.\r\n\r\nSecondly, we have noise pollution caused by various groups of people shouting out their slogans or impatient automobiles always honking their horns. During some social and religious festivals, crackers are burst indiscriminately. Noise pollution can have serious effects on human health. It may cause impairment of hearing and can cause sleep disruption. People who are frequently subjected to a high level of noise pollution may suffer from hypertension, depression, and panic attacks. It may lead to an abnormal increase in heartbeat and heart palpitation. It can also cause migraine headaches, nausea, and dizziness.\r\n\r\nSome Measures to Minimise Noise Pollution are Prohibiting the blowing of horns, The use of loudspeakers should be banned, Airports should be located away from residential areas, and People should restrain themselves from lighting firecrackers. In recent times laws have been passed to take effective steps to control sound pollution. People must also be made aware of the dangers of noise pollution.', '2024-07-05', 'Davon Key', 'Shiva_Boys_Hindu_College', 'form3', NULL, 'UNGRADED', 0, 'UNGRADED', 'UNGRADED'),
('Dylan2', 'DylanG', 'My Family', 'Family is the place where you learn your first lesson in life. Your family members are the only assets that will remain with you forever. Whatever the circumstances, family members are always there for each other to support us. Good values and good morals are always taught in a family.\r\n\r\nIn the family, we are prepared to respect our elders and love younger ones. We learn lessons consistently from our family, about honesty, dependability, kindness and so on. Although I am a student in my final year, my family always treats me like a child but always provides us with a sensation of so much love and care. My family is the best family for me. I live in a nuclear family of four members.\r\n\r\nMy father is a teacher. He is the man who heads and leads our family. My mother is a housewife as well as a beautician. She is a lovely woman. My mother is everything to me. She is the one who understands me best and most closely. My grandmother is the cutest person of all.\r\n\r\nI love my family because they are the jewels of my life. They work hard so that we can get anything we desire makes me love and respect my parents considerably more. We play games every night and discuss various topics to spend quality time together. I give deep respect and pay the highest regard to my family not just because they are my family, but for their unmatched and incredible sacrifices for me.', '2024-07-29', 'Dylan Gopaul', 'Iere_High_School', 'form4', 2, 'Josh May', 5, 'A (Excellent)', 'Job well done. Nice essay!'),
('JennyAlly1', 'JennyAlly', 'Christmas', 'Christmas is one of the most famous and light-hearted festivals which is celebrated across the world by billions of people. People of the Christian religion celebrate Christmas to remember the great works of Jesus Christ. 25th December is celebrated as Christmas Day across the world. Christians celebrate Christmas Day as the birth anniversary of Jesus Christ. Jesus Christ of Bethlehem was a spiritual leader and prophet whose teachings structure the premise of their religion.\r\n\r\nChristmas Day is celebrated every year with great joy, happiness and enthusiasm. Everyone whether they are poor or rich gets together and partakes in this celebration with lots of activities. On this day people decorate their houses with candles, lights, balloons etc. People decorate Christmas trees on this day in their homes or a public square. They decorate Christmas trees with small electric lights of various colours, gift items, balloons, flowers, and other materials. After that, the Christmas tree looks very appealing and wonderful.\r\n\r\nPeople follow popular customs including exchanging gifts, decorating Christmas trees, attending church, sharing meals with family and friends and, obviously, trusting that Santa Claus will arrive. Children eagerly wait for Christmas day very anxiously as they get lots of beautiful gifts and chocolates. In most cases, the fat person in the family dressed up as Santa Clause with a bell in his hand which attract kids and they get lots of beautiful gifts and chocolates from Santa Clause. 25th December, Christmas Day, has been a federal holiday in the United States since 1870.', '2024-10-05', 'Jenny Ally', 'Iere_High_School', 'form3', NULL, 'UNGRADED', 0, 'UNGRADED', 'UNGRADED'),
('Nyan134', 'NyanG', 'Save Environment', 'Environment means a healthy natural balance in the air, water, animals, plants, and other natural resources. The environment influences the existence and development of an organism. Pollution is the process of creating the environment dirty by adding harmful substances thereto. Owing to indiscriminate industrialization man has created a polluted environment. He has continuously tampered with nature which led to a threat to the sustenance of mankind.\r\n\r\nThe constant more in the world population is the main reason for environmental pollution. More population means more industry. Factories release toxic gases into the air, and filthy poisonous waters from factories and mills For also released into the waters of rivers; trees are cut down for fuel and other commercial purposes, or for procuring land for building houses. This results in a fall in the supply of oxygen that the trees provide With the felling of trees animals and birds also lose their shelter and this destroys the balance in the ecology.\r\n\r\nTo prevent these hazards from endangering human, animal, and plant life measures should be taken before the situation goes out of control. More trees should be planted. Anti-pollution scientific methods should be devised, so that toxic gases and poisonous effluents are not released by factories and mills into the air and water respectively. Cutting down trees should be made punishable by law. Poaching and hunting of animals for monetary gain and recreation should also be stopped. Finally, from early life, people should be so educated that they become aware of the vital importance of a healthy, natural, and toxic-free environment.', '2000-02-22', 'Nyan Gadsby', 'Penal_Secondary_School', 'form3', 2, 'Josh May', 5, 'A (Excellent)', 'Great essay'),
('Nyan14', 'NyanG', 'Cleanliness', 'There is truth in the common saying: “Cleanliness is next to godliness.” Cleanliness is a great virtue. It makes a man healthy and happy. The healthy habit of cleanliness should be formed from childhood in our everyday routine. A clean environment keeps us free from pollution. Cleanliness comes out of a taste for decency.\r\n\r\nCleanliness is of two types—cleanliness of body and cleanliness of mind. Cleanliness of the body makes for physical health. Health is an impossibility without bodily cleanliness. The disease is the handmaid of dirt. The germs of disease breed and multiply in the dirt. Epidemic diseases like cholera and typhoid which often sweep over villages and towns and take a heavy toll on life are the result of dirty habits and the surroundings of the people.\r\n\r\nCleanliness of the mind is as necessary as that of the body for self-respect. No one loves and respects a man if he is not clean in mind-free from impure desires, and evil thoughts. Mental cleanliness makes for one’s success in any sphere of life. The effects of cleanliness are great. It contributes to the character of a noble personality not only with clean clothes but also with clean ideas, clean thoughts, and clean ways of life. In every walk of life, it is necessary to maintain cleanliness in body and mind as well as indoors and outdoors. Cleanliness is truly next to godliness. All should cultivate it.', '2000-02-22', 'Nyan Gadsby', 'Penal_Secondary_School', 'form3', 2, 'Josh May', 1, 'F (Fail)', 'Bad essay');

-- --------------------------------------------------------

--
-- Table structure for table `essaylist`
--

DROP TABLE IF EXISTS `essaylist`;
CREATE TABLE IF NOT EXISTS `essaylist` (
  `isPublic` tinyint(1) NOT NULL,
  `essayID` varchar(20) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `studentName` text NOT NULL,
  `essayTitle` varchar(255) NOT NULL,
  `essayFirstParagraph` varchar(255) NOT NULL,
  `essayRating` int DEFAULT NULL,
  `grade` enum('UNGRADED','A (Excellent)','B (Good)','C (Satisfactory)','D (Needs Improvement)','F (Fail)') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'UNGRADED',
  UNIQUE KEY `essayTitle_2` (`essayTitle`),
  UNIQUE KEY `essayID` (`essayID`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `essaylist`
--

INSERT INTO `essaylist` (`isPublic`, `essayID`, `username`, `studentName`, `essayTitle`, `essayFirstParagraph`, `essayRating`, `grade`) VALUES
(1, 'BruceCharles1', 'BruceCharles', 'Bruce Charles', 'Balanced Diet', 'A diet that contains all kinds of necessary ingredients in almost the required quantity is called the “Balanced Diet”. A Balanced diet is one that helps to maintain or improve overall health. We should consume a balanced diet consisting of essential nutri', NULL, 'UNGRADED'),
(0, 'JennyAlly1', 'JennyAlly', 'Jenny Ally', 'Christmas', 'Christmas is one of the most famous and light-hearted festivals which is celebrated across the world by billions of people. People of the Christian religion celebrate Christmas to remember the great works of Jesus Christ. 25th December is celebrated as Ch', NULL, 'UNGRADED'),
(1, 'Nyan14', 'NyanG', 'Nyan Gadsby', 'Cleanliness', 'There is truth in the common saying: “Cleanliness is next to godliness.” Cleanliness is a great virtue. It makes a man healthy and happy. The healthy habit of cleanliness should be formed from childhood in our everyday routine. A clean environment keeps u', 1, 'F (Fail)'),
(0, 'ChristianTeal1', 'ChristianTeal', 'Christian Teal', 'Co-Education', 'Co-education is a system of education in which boys and girls study together in a common school or college. Co-education was not prevalent in ancient times. It is a groundbreaking thought. Co-education is exceptionally practical. The number of schools req', NULL, 'UNGRADED'),
(0, 'baron1', 'BaronJoice', 'Baron Joice', 'Health is Wealth', 'The greatest wealth is our own health. A healthy body can earn great wealth but, a wealthy person cannot earn great health. We live in a fast-moving world where individuals have no time for themselves. Most part of their life withers away in search of mat', NULL, 'UNGRADED'),
(1, 'Dylan2', 'DylanG', 'Dylan Gopaul', 'My Family', 'Family is the place where you learn your first lesson in life. Your family members are the only assets that will remain with you forever. Whatever the circumstances, family members are always there for each other to support us. Good values and good morals', 5, 'A (Excellent)'),
(0, 'DavonKey1', 'DavonKey', 'Davon Key', 'Noise Pollution', 'Any unwanted loud sound which causes stress and irritation can be termed noise pollution. Of late, sound or noise pollution has adversely affected our normal life in a major way. It is chasing us at almost every step. In schools, colleges, offices, and ev', NULL, 'UNGRADED'),
(1, 'Nyan134', 'NyanG', 'Nyan Gadsby', 'Save Environment', 'Environment means a healthy natural balance in the air, water, animals, plants, and other natural resources. The environment influences the existence and development of an organism. Pollution is the process of creating the environment dirty by adding harm', 5, 'A (Excellent)'),
(1, 'andre4', 'andreragbir', 'Andre Ragbir', 'Science', 'Science is a great boon to human civilization. All signs of Progress in civilization have been made possible by science. Science has made our life easy and comfortable. It has given us electric fans, and lights. fans cool us, lights remove darkness. Lift,', 2, 'F (Fail)'),
(1, 'Andre2', 'andreragbir', 'Andre Ragbir', 'Television', 'Television is one of the many wonders of modern science and technology. It was invented in England by the Scottish scientist J.N. Baird in 1928 and the British Broadcasting Corporation was the first to broadcast television images in 1929. Previously the r', 4, 'B (Good)');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `essayID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `instructorID` int NOT NULL,
  `fullName` text NOT NULL,
  `schoolName` enum('Penal_Secondary_School''','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') NOT NULL,
  `Grade` enum('A (Excellent)','B (Good)','C (Satisfactory)','D (Needs Improvement)','F (Fail)') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

DROP TABLE IF EXISTS `instructor`;
CREATE TABLE IF NOT EXISTS `instructor` (
  `pfp` blob NOT NULL,
  `instructorID` int NOT NULL AUTO_INCREMENT,
  `fullName` text NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `schoolName` enum('Penal_Secondary_School','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`instructorID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`pfp`, `instructorID`, `fullName`, `username`, `email`, `schoolName`, `password`) VALUES
(0x31, 2, 'Josh May', 'JoshMay', 'Josh@gmail.com', 'Penal_Secondary_School', '$2y$10$HVXUTTm/87Ifer2XxRmQBOxYkxIg5hlkjQZ2ugpn8fbyLQR6EG..W'),
(0x31, 4, 'Lori Nel', 'LoriNel', 'lori@gmail.com', 'Shiva_Boys_Hindu_College', '$2y$10$nPgP.CBeMxaoU/C1glYCRu4BTMOj3tlXvwc2W5hm//wT3c08wTjW6'),
(0x31, 5, 'Fred Jones', 'FredJones', 'fred@gmail.com', 'Iere_High_School', '$2y$10$ubvVNrHpaDV3.FU0VlCbKu6gIoMresPMOOh3dCSf4iDMIbtKNOtzu'),
(0x31, 6, 'Troy Combs', 'TroyCombs', 'troy@gmail.com', 'Debe_High_School', '$2y$10$DClJVIu86NhxHL3oYbP17OKnwza0RMRSSgbkteSRh5gdFc2i1TR9W');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
CREATE TABLE IF NOT EXISTS `school` (
  `schoolCode` varchar(20) NOT NULL,
  `schoolName` enum('Penal_Secondary_School','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactNum` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`schoolCode`),
  UNIQUE KEY `contactNum` (`contactNum`),
  UNIQUE KEY `address` (`address`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `schoolName` (`schoolName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`schoolCode`, `schoolName`, `address`, `contactNum`, `Email`) VALUES
('DHS', 'Debe_High_School', 'M2 Ring Road Debe', '8682515812', 'debehighschool@gmail.com'),
('IHS', 'Iere_High_School', 'De Gannes Village Siparia ', '8682475512', 'ierehighschool@gmail.com'),
('PSS', 'Penal_Secondary_School', 'Oliverie Drive Penal', '8682949285', 'penalsecondaryschool@gmail.com'),
('SBHC', 'Shiva_Boys_Hindu_College', 'Clarke Road Penal', '8682548412', 'shivaboyshinducollege@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `pfp` blob,
  `fullName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `parentName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `parentEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `schoolName` enum('Penal_Secondary_School','Shiva_Boys_Hindu_College','Iere_High_School','Debe_High_School') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `classLevel` enum('form1','form2','form3','form4','form5') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  UNIQUE KEY `parentEmail` (`parentEmail`),
  UNIQUE KEY `username` (`username`),
  KEY `schoolName` (`schoolName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='only instructors are allowed an instructor id';

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`pfp`, `fullName`, `username`, `birthDate`, `parentName`, `parentEmail`, `password`, `schoolName`, `classLevel`) VALUES
(0x31, 'Andre Ragbir', 'andreragbir7', '2005-01-20', '1234', '123@2.co', '$2y$10$K.6cFb3XQsnRZ.LOzgjNDecaULj.goR0bdhg.fueuoE8ri0SzVqyO', 'Penal_Secondary_School', 'form4'),
(0x31, 'Jenny Ally', 'JennyAlly', '2008-04-05', 'Aria Ally', 'Aria@gmail.com', 'password', 'Iere_High_School', 'form3'),
(0x31, 'Bruce charles', 'BruceCharles', '2007-02-01', 'Dally Charles', 'dally@gmail.com', 'password', 'Penal_Secondary_School', 'form5'),
(0x31, 'Ada Lovelace', 'ada', '2000-03-29', 'dana lovelace', 'dana@gmail.com', 'gfgdgfd', 'Shiva_Boys_Hindu_College', 'form3'),
(0x31, 'Brian James', 'BrianJames', '2007-07-19', 'Dhariah James', 'Dharia@gmail.com', '$2y$10$cypxG8ln43Fm.j.CCA4v7unqQDZqDzqbXDHgDe5NcDl.sJQqkx.h.', 'Shiva_Boys_Hindu_College', 'form4'),
(0x31, 'Christian Teal', 'ChristianTeal', '2010-04-05', 'Donna Teal', 'donna@gmail.com', 'password', 'Penal_Secondary_School', 'form3'),
(0x31, 'Kevin Hart', 'KevinHart', '2007-07-05', 'Gina Hart', 'gina@gmail.com', '$2y$10$N7JHfJsYjiNYqIfkNcNIXeyXYAJIs0.Igiyo2SNLGrX8YXTt.5lHy', 'Debe_High_School', 'form5'),
(0x31, 'Baron Joice', 'BaronJoice', '0207-05-20', 'Ingrid Joice', 'ingrid@gmail.com', 'password', 'Debe_High_School', 'form4'),
(0x31, 'Davon Key', 'DavonKey', '2008-12-04', 'Ladia Key', 'ladia@gmail.com', 'password', 'Shiva_Boys_Hindu_College', 'form3'),
(0x31, 'Joseph John', 'JosephJ', '2008-08-20', 'Mariah John', 'mariah@gmail.com', '$2y$10$c5ePX38i/k.Tr1TgorA9q.TXog.y/TKFfyAI.3rU4GxzjC54C/yMS', 'Penal_Secondary_School', 'form4'),
(0x31, 'Nyan Gadsby', 'NyanG', '2006-01-20', 'Nadi Gadsby', 'nadi@gmail.com', '$2y$10$CpwtSacJa8m3pXNgEJ9UYOI9kEEIeRMOt4IH1N4oQcTfaX/yGyySm', 'Penal_Secondary_School', 'form3'),
(0x31, 'Dylan Gopaul', 'DylanG', '2007-07-29', 'Nadia Gopaul', 'nadia@gmail.com', '$2y$10$JCZrv2uEBS5SA/O1rr2o9eEPZhHzlJLgwaDyVkUwM1K/8o3HrCQd6', 'Iere_High_School', 'form4'),
(0x31, 'Andre Ragbir', 'andreragbir5', '2005-10-20', '123', 'user@gmail.com', '$2y$10$RukVgyFi5dmSFwETy50fQ.jPaXPgEGBg.rUjjlxsjOvSnqlpRff..', 'Shiva_Boys_Hindu_College', 'form3'),
(0x31, 'Andre Ragbir', 'andreragbir55', '2005-10-20', '123', 'user123@gmail.com', '$2y$10$xHjNmWxszhAqJcxEs/FIPOusCaEPa4012g4M6t1Rdclvd9SMY2f1W', 'Shiva_Boys_Hindu_College', 'form1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `essaydetails`
--
ALTER TABLE `essaydetails`
  ADD CONSTRAINT `essaydetails_ibfk_2` FOREIGN KEY (`schoolName`) REFERENCES `school` (`schoolName`),
  ADD CONSTRAINT `essaydetails_ibfk_3` FOREIGN KEY (`instructorID`) REFERENCES `instructor` (`instructorID`),
  ADD CONSTRAINT `essaydetails_ibfk_4` FOREIGN KEY (`essayID`) REFERENCES `essaylist` (`essayID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`schoolName`) REFERENCES `school` (`schoolName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
