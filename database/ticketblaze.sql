-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 02:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketblaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `content`, `active`) VALUES
(1, 'What internal tools are available for employees???', 'We provide several internal tools to streamline workflows and improve productivity. These tools include project management software, communication platforms, document collaboration tools, and more. Employees can access these tools through our intranet or designated portals.', 1),
(2, 'How do I access internal tools remotely?', 'To access internal tools remotely, employees can use VPN (Virtual Private Network) connections or remote desktop services provided by the company. Make sure to follow the company\'s security guidelines and use authorized access methods.', 1),
(3, 'Can I request access to specific internal tools?', 'Yes, employees can request access to specific internal tools by contacting the IT department or submitting a request through the designated access request system. Requests are reviewed and approved based on job roles and responsibilities.', 1),
(4, 'Where can I find user guides or tutorials for internal tools?', 'User guides, tutorials, and training resources for internal tools are available on our intranet or through the IT department. Employees can also attend training sessions or webinars to learn more about using internal tools effectively.', 1),
(5, 'Old Faq', 'This faq should not be displayed!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `sent_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `ticket_id`, `message`, `sent_at`, `sent_by`) VALUES
(1, 5, 'I am unable to login to the website. Can you please help me resolve this issue?', '2024-04-20 20:40:19', 5),
(2, 6, 'I am not receiving emails in my inbox. Can you please check if there is an issue with the email delivery?', '2024-04-20 20:45:49', 5),
(3, 6, 'We have identified the issue with the email delivery and are working on resolving it. We will update you once the problem is fixed.', '2024-04-20 20:47:49', 3),
(4, 6, 'Thank you for the update.', '2024-04-20 20:48:49', 5),
(5, 7, 'We are experiencing network connectivity issues in our office. Can you please investigate and resolve the problem?', '2024-04-20 20:41:10', 5),
(6, 7, 'We are aware of the issue and are working on resolving it. We will keep you updated on the progress.', '2024-04-20 20:48:10', 2),
(7, 8, 'Can we get the latest software update installed on our systems?', '2024-04-20 20:41:32', 5),
(8, 8, 'The latest software update has been installed successfully. Please let us know if you encounter any issues.', '2024-04-20 20:48:32', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `content` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `subtitle`, `title`, `date`, `content`, `active`) VALUES
(1, 'Local infrastructure interruption', 'London Office to lose internet on Nov 5th!', '2024-02-01', 'There is a planned internet service interruption slated for Nov 5th. Only the London Office will be affected. For more info contact the relevant department.', 1),
(2, 'Global service interruption', 'New Support site upgrade', '2024-03-12', 'During the week we will be upgrading the support site. Site availability may me limited. We ask you for patience. For more info contact the relevant department.', 1),
(3, 'Network maintenance!!', 'Scheduled maintenance for Paris Office', '2024-03-27', 'Please be informed that there will be scheduled network maintenance for the Paris Office on Nov 8th. This may result in temporary disruptions. For more details, reach out to the IT department.', 1),
(4, 'Software update', 'CRM system update on Nov 10th', '2024-04-16', 'Our Customer Relationship Management (CRM) system will undergo a scheduled update on Nov 10th. During this time, access to certain features may be restricted. For further information, contact the support team.', 1),
(5, 'Old News', 'old news', '2017-04-12', 'old news', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_status`
--

CREATE TABLE `service_status` (
  `id` int(11) NOT NULL,
  `web_servers` enum('active','busy','inactive') DEFAULT NULL,
  `mail_servers` enum('active','busy','inactive') DEFAULT NULL,
  `ftp_servers` enum('active','busy','inactive') DEFAULT NULL,
  `client_servers` enum('active','busy','inactive') DEFAULT NULL,
  `timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_status`
--

INSERT INTO `service_status` (`id`, `web_servers`, `mail_servers`, `ftp_servers`, `client_servers`, `timestamp`) VALUES
(1, 'busy', 'active', 'inactive', 'busy', '2024-04-20 20:50:52'),
(2, 'busy', 'busy', 'busy', 'busy', '2024-04-21 21:16:00'),
(4, 'active', 'inactive', 'busy', 'busy', '2024-04-22 21:16:16');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` enum('Open','Closed','Awaiting Response','Responded') DEFAULT 'Open',
  `last_change` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `department` enum('HR','Hardware Support','Software Support','Accounting') DEFAULT NULL,
  `importance` enum('Low','Medium','High') DEFAULT NULL,
  `solved` tinyint(1) DEFAULT 0,
  `sender_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `subject`, `status`, `last_change`, `department`, `importance`, `solved`, `sender_id`, `dept_id`) VALUES
(5, 'Website login issue', 'Open', '2024-04-23 02:21:55', 'Software Support', 'High', 0, 5, 3),
(6, 'Email delivery problem', 'Responded', '2024-04-23 02:21:55', 'Software Support', 'Medium', 0, 5, 3),
(7, 'Network connectivity issue', 'Awaiting Response', '2024-04-23 02:21:55', 'Hardware Support', 'High', 0, 5, 2),
(8, 'Software update request', 'Closed', '2024-04-23 02:21:55', 'Software Support', 'Low', 1, 5, 3);

--
-- Triggers `tickets`
--
DELIMITER $$
CREATE TRIGGER `Before_Insert_Tickets` BEFORE INSERT ON `tickets` FOR EACH ROW BEGIN
    DECLARE dept_name VARCHAR(50);
    DECLARE dept_id INT;

    -- Get the department name for the new ticket
    SET dept_name = NEW.department;

    -- Get the corresponding department ID from the Departments table
    IF dept_name = 'HR' THEN
        SET dept_id = 1;
    ELSEIF dept_name = 'Hardware Support' THEN
        SET dept_id = 2;
    ELSEIF dept_name = 'Software Support' THEN
        SET dept_id = 3;
    ELSEIF dept_name = 'Accounting' THEN
        SET dept_id = 4;
    END IF;

    -- Set the dept_id for the new ticket
    SET NEW.dept_id = dept_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'hr@example.com', 'hr', 'HR', 'Department', '2024-04-20 20:09:16', '2024-04-20 20:09:16'),
(2, 'hwsupport@example.com', 'hwsupport', 'Hardware', 'Support', '2024-04-20 20:09:16', '2024-04-20 20:09:16'),
(3, 'swsupport@example.com', 'swsupport', 'Software', 'Support', '2024-04-20 20:09:16', '2024-04-20 20:09:16'),
(4, 'accounting@example.com', 'accounting', 'Accounting', 'Department', '2024-04-20 20:09:16', '2024-04-20 20:09:16'),
(5, 'faris.selimovich@gmail.com', 'faris.selimovich', 'Faris', 'Selimovic', '2024-04-20 20:09:16', '2024-04-20 20:09:16'),
(11, 'email@email.com', '$2y$10$Lx19iefcZi.IMl53AZgLh.fyfYT9DSGHBaxP5tHLwFdU1Htkwl9be', 'John', 'Doe', '2024-05-13 22:02:18', '2024-05-13 22:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_id` (`ticket_id`),
  ADD KEY `fk_sent_by` (`sent_by`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_status`
--
ALTER TABLE `service_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `service_status`
--
ALTER TABLE `service_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_sent_by` FOREIGN KEY (`sent_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`dept_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
