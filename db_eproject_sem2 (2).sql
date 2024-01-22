-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 06:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eproject_sem2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`, `image`) VALUES
(1, 'Tayab', 'tayab@gmail.com', '1234', 'male_dummy.png'),
(3, 'maira tariq', 'maira123@gmail.com', '1234', 'female_dummy.png');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `lawyers_id` int(11) DEFAULT NULL,
  `appDateTime` datetime DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `customers_id`, `lawyers_id`, `appDateTime`, `status`) VALUES
(1, 3, 5, '2024-01-12 17:02:00', 'pending'),
(2, 3, 7, '2024-01-27 03:47:00', 'pending'),
(3, 3, 1, '2024-01-20 02:51:00', 'pending'),
(4, 14, 8, '2024-01-16 17:30:00', 'pending'),
(5, 2, 5, '2024-01-25 17:01:00', 'approved'),
(6, 9, 5, '2024-01-20 16:54:00', 'pending'),
(7, 14, 11, '2024-01-20 22:23:00', 'pending'),
(8, 13, 1, '2024-01-27 15:45:00', 'rejected'),
(9, 2, 1, '2024-01-27 15:46:00', 'approved'),
(10, 2, 11, '2024-02-03 15:56:00', 'pending'),
(11, 2, 5, '2024-01-27 15:56:00', 'rejected'),
(12, 2, 5, '2024-02-03 15:57:00', 'pending'),
(42, 11, 10, '2024-01-24 02:02:00', 'pending'),
(43, 11, 10, '2024-01-23 02:18:00', 'pending'),
(44, 11, 6, '2024-01-21 03:43:00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `phone`, `message`, `datetime`) VALUES
(1, 'fatimaghouri', 'maira123@gmail.com', '983934', 'rite U', '2024-01-21 23:03:41'),
(2, 'fatimaghouri', 'maira123@gmail.com', '983934', 'rite U', '2024-01-21 23:03:43'),
(7, 'fatimaghouri', 'maira123@gmail.com', '983934', 'te Us So', '2024-01-21 23:25:00'),
(8, 'fatimaghouri', 'admin@gmal.com', '935475728', 'jhyh', '2024-01-22 04:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `custName` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `custName`, `email`, `password`, `contact`, `location`) VALUES
(1, 'sara mohib', 'sara@mail.com', '123', 21344434, 'Malir'),
(2, 'zainab saeed', 'zainab@gmail', '777', 121324, 'Khyber Pakhtunkhwa'),
(3, 'alina zaib', 'alina@gmail.com', '789', 1234244, 'shamsi'),
(8, 'javeria asif', 'javeria@gmail.com', '123', 932093, 'Faisalabad'),
(9, 'Saima Imran', 'saima@gmail.com', '5678', 932093, 'Peshawar'),
(10, 'tayyab saeed', 'tayyaba@gmail.com', '1234', 872486324, 'Karachi'),
(11, 'fatima', 'fatima@gmail.com', '1234', 9209473241, 'Lahore'),
(12, 'manahil', 'manahil@gmail.com', '980', 9209473241, 'Lahore'),
(13, 'sameera', 'sameera@gmail.com', '878', 9209473241, 'Balochistan'),
(14, 'Daniyal Ghani', 'Daniyalghani@gmail.com', 'daniyal123', 9802119, 'Sindh');

-- --------------------------------------------------------

--
-- Table structure for table `lawyers`
--

CREATE TABLE `lawyers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `services` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyers`
--

INSERT INTO `lawyers` (`id`, `fullname`, `email`, `password`, `contact`, `services`, `location`, `image`, `description`) VALUES
(1, 'huda tariq', 'huda@gmail.com', '123', 9320939090, 'Real Estate', 'Karachi', 'lawyer-img-new.jpg', 'A real estate lawyer with over a decade of experience, I\'ve honed my expertise in navigating the intricate terrain of property law. Over the years, I\'ve diligently facilitated numerous high-stakes transactions, ensuring seamless property transfers, drafting meticulous contracts, and conducting exhaustive due diligence to safeguard my clients\' interests. My proficiency extends beyond transactional work—I\'ve adeptly handled complex disputes, resolving issues ranging from boundary disputes to intricate zoning regulations. Specializing in commercial and residential real estate, I bring a comprehensive understanding of regulatory compliance, deftly navigating through legal intricacies while ensuring my clients\' ventures comply with all relevant laws and regulations.'),
(3, 'Habiba Saeed', 'habiba@gmail.com', '123', 932093, 'Intellectual Property (IP)', 'Islamabad', 'lawyer-image-8F.jpg', 'As an accomplished Intellectual Property Lawyer with over a decade of experience, I have consistently demonstrated a deep understanding of patent, trademark, and copyright law. With a proven track record in protecting and enforcing intellectual property rights, I have successfully managed high-stakes litigation, negotiated complex licensing agreements, and provided strategic counsel to diverse clientele, ranging from startups to multinational corporations. My expertise lies in navigating intricate legal landscapes to safeguard innovation, fostering client-centric solutions, and ensuring robust protection of valuable intellectual assets.'),
(5, 'Maira Tariq', 'Maira@gmail.com', '1234', 932093, 'Family Matters', 'Gilgit-Baltistan', 'lawyer-image-2F.jpg', 'With A Rich Background In Family Law Spanning More Than 15 Years, I Am A Seasoned Family Matters Lawyer Dedicated To Guiding Individuals Through Sensitive Legal Issues With Empathy And Expertise. My Practice Encompasses Divorce Proceedings, Child Custody Disputes, Spousal Support Negotiations, And Adoption Matters. Leveraging A Compassionate Approach, I\'ve Adeptly Mediated Complex Family Conflicts And Provided Sound Legal Counsel To Clients, Prioritizing Their Well-being And Ensuring Fair And Amicable Resolutions. My Commitment To Upholding The Rights Of Families And Children, Combined With A Nuanced Understanding Of The Legal Intricacies In This Field, Defines My Approach To Delivering Comprehensive And Tailored Legal Solutions.'),
(6, 'zainab saeed', 'zainab@gmail.com', '123', 932093, 'Legal Consultation and Advice', 'Lahore', 'lawyer-image-1F.jpg', 'With an extensive background as a Legal Consultation and Advice Lawyer, I bring over 12 years of experience providing strategic counsel and guidance across diverse legal domains. My expertise lies in offering comprehensive legal advice to clients, ranging from individuals to businesses, navigating them through complex regulatory frameworks, contractual matters, and compliance issues. I excel in distilling intricate legal concepts into understandable terms, empowering clients to make informed decisions. Through meticulous analysis and a client-focused approach, I have successfully guided numerous entities in risk mitigation, dispute resolution, and strategic planning, cementing a reputation for delivering reliable, practical, and tailored legal solutions.'),
(7, 'samia modan', 'samia@gmail.com', '1234', 972123, 'Litigation and Dispute Resolution', 'Peshawar', 'lawyer-image-7F.jpg', 'With over a decade as a Litigation and Dispute Resolution Lawyer, I possess a robust foundation in handling diverse legal disputes across multiple sectors. My expertise encompasses civil litigation, commercial disputes, and alternative dispute resolution methods, including arbitration and mediation. I have consistently demonstrated a tenacious approach to representing clients\' interests in courtrooms while also fostering out-of-court settlements, emphasizing a pragmatic and strategic resolution of conflicts. Leveraging sharp analytical skills and a deep understanding of legal precedents, I\'ve effectively navigated complex cases, securing favorable outcomes for clients. My dedication to delivering comprehensive, client-centered advocacy, coupled with a keen focus on swift and equitable dispute resolution, underscores my commitment to achieving tangible results in the realm of litigation.'),
(8, 'ata tariq', 'ata@gmail.com', '456', 872486324, 'Estate Planning ', 'Islamabad', 'lawyer-image-6M.jpg', 'Boasting a decade-long tenure as an Estate Planning Lawyer, I specialize in crafting comprehensive strategies to safeguard assets and ensure the smooth transition of wealth across generations. My expertise spans will drafting, trust establishment, probate administration, and wealth preservation techniques. I have adeptly guided individuals and families through intricate estate planning processes, tailoring solutions to align with their unique circumstances and goals. My proactive approach prioritizes minimizing tax liabilities and addressing potential conflicts, while also emphasizing the human aspect of estate planning, ensuring clients\' wishes are clearly articulated and legally protected. My track record reflects a commitment to delivering meticulous, personalized counsel that secures the long-term legacy and financial security of my clients.'),
(9, 'ebad tariq', 'ebad@gmail.com', '897', 56657576, 'Immigration Assistance ', 'Quetta', 'lawyer-image-5M.jpg', 'With over a decade dedicated to Immigration Assistance Law, I\'ve navigated the complexities of immigration systems to facilitate seamless transitions for individuals and families worldwide. My expertise spans a wide spectrum, including visa applications, residency permits, asylum cases, and citizenship matters. I\'ve adeptly represented clients in administrative proceedings and immigration courts, advocating for their rights with compassion and precision. My proactive approach involves staying abreast of evolving immigration policies, ensuring clients receive up-to-date, strategic guidance. Whether assisting refugees seeking asylum or corporations navigating employment-based immigration, my commitment lies in providing ethical, empathetic, and effective legal support to achieve favorable immigration outcomes for my clients.'),
(10, 'zia tariq', 'zia@gmail.com', '6789', 9209473241, 'Contracts and Agreements ', 'Rawalpindi', 'lawyer-image-4M.jpg', 'lknojo'),
(11, 'umar nadeem', 'umar@gmail.com', '7656', 9209473241, 'Real Estate ', 'Faisalabad', 'lawyer-image-10M.jpg', 'trtewr'),
(12, 'sumaira ali', 'sumaira@gmail.com', '089797', 872486324, 'Estate Planning', 'Rawalpindi', 'lawyer-img-new.jpg', 'As an estate planning lawyer, I specialize in assisting individuals and families with the strategic organization and distribution of their assets. With a focus on wills, trusts, and other legal instruments, I work to ensure that my clients\' wishes are clearly documented and legally sound. My expertise extends to navigating complex tax implications and collaborating with financial professionals to create comprehensive plans. I am committed to providing personalized, client-focused service, guiding my clients through the intricacies of estate laws and helping them make informed decisions to safeguard their legacies.'),
(13, 'ata tariq', 'ata@gmail.com', '123', 9209473241, 'Litigation and Dispute Resolution', 'Karachi', 'male_dummy.png', 'abcdef');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id` (`customers_id`),
  ADD KEY `lawyers_id` (`lawyers_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyers`
--
ALTER TABLE `lawyers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lawyers`
--
ALTER TABLE `lawyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`lawyers_id`) REFERENCES `lawyers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
