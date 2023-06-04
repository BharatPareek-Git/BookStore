-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 07:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'Bharat Pareek', 'bharat.pareek', 'bharat.pareek', 'bharatpareek444@gmail.com'),
(2, 'Bharat Parik', 'bharat', 'bharat', 'bharatparik@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `auth_id` int(11) NOT NULL,
  `auth_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_authors`
--

INSERT INTO `tbl_authors` (`auth_id`, `auth_name`) VALUES
(1, 'Yashwant Kanetkar'),
(2, 'Munshi Premchand '),
(3, 'Chetan Bhagat'),
(4, 'Rabindranath Tagore'),
(5, 'R.K Narayan'),
(6, 'Khushwant Singh'),
(7, 'C. V. Raman'),
(8, 'Srinivasa Ramanujan'),
(9, 'Harivansh Rai Bachchan'),
(11, 'Robert Cecil Martin'),
(12, 'Durjoy Datta');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cat_id`, `cat_title`) VALUES
(20, 'Programming'),
(21, 'Mathematics'),
(22, 'Physics'),
(23, 'Horror Novel'),
(24, 'Hindi Story'),
(25, 'Politics'),
(26, 'Sports'),
(27, 'Hindi Poem'),
(28, 'English Story'),
(29, 'History');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_amount` double NOT NULL,
  `payment_status` varchar(1) NOT NULL DEFAULT 'N',
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `delivery_status` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `user_id`, `order_amount`, `payment_status`, `product_id`, `product_quantity`, `delivery_status`) VALUES
(1, 1, 299, 'N', 38, 1, 'N'),
(2, 1, 499, 'N', 42, 1, 'N'),
(3, 1, 599, 'Y', 39, 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(150) NOT NULL,
  `product_cat_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int(15) NOT NULL,
  `product_short_description` varchar(255) NOT NULL,
  `product_description` varchar(400) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `auth_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_title`, `product_cat_id`, `product_price`, `product_quantity`, `product_short_description`, `product_description`, `product_image`, `auth_id`) VALUES
(38, 'Let Us C', 20, 299, 128, 'Over 3 Million Copies Sold.Reading books is a kind of enjoyment. Reading books is a good habit. We bring you a different kinds of books. You can carry this book where ever you want. ', ' “Simplicity”- that has been the hallmark of this book in not only its previous eighteen English editions, but also in the Hindi, Gujrati, Japanese, Korean, Chinese and US editions. This book doesn’t assume any programming background. It begins with the basics and steadily builds the pace so that the reader finds it easy to handle advanced topics towards the end of the book.', 'let-us-c-18-edition.jpg', 1),
(39, 'Godan', 24, 599, 25, 'Godaan was made into a Hindi film in 1963, starring Raaj Kumar, Kamini Kaushal, Mehmood and Shashikala.In 2004, Godaan was part of the 27-episode TV series, Tehreer.... Munshi Premchand Ki,The Writings of Munshi Premchand] based on the writing of Premchan', 'Godaan is a famous Hindi novel by Munshi Premchand. It was first published in 1936 and is considered one of the greatest Hindi novels of modern Indian literature. Themed around the socio-economic deprivation as well as the exploitation of the village poor, the novel was the last complete novel of Premchand. It has been translated into English in 1957 by Jai Ratan and Purushottama Lal as The Gift o', 'premchand-godan.jpg', 2),
(40, 'Clean Code', 20, 999, 182, 'This is one of the best classic books for beginners and will teach you all tricks and patterns of writing good and clean code. Every code which runs is not a clean code.', 'Code is clean if it can be understood easily – by everyone on the team. Clean code can be read and enhanced by a developer other than its original author. With understandability comes readability, changeability, extensibility and maintainability.', 'clean-code.jpg', 11),
(41, 'Let Us Java', 20, 299, 209, 'Java language is very popularly used for creating applications for PC, laptop, Tablet, web and mobile world learning a language that can work on so many different platforms can be a challenge.', 'Java Language is very popularly used for creating applications for PC, Laptop, Tablet, Web and Mobile world Learning a language that can work on so many different platforms can be a challenge. This is where you would find this book immediately useful.', 'let_us_java.jpg', 1),
(42, 'Let Us C++', 20, 499, 187, ' Yashavant Kanetkar is an Indian computer science author, known for his books on programming languages. He has authored several books on C, C++, VC++, C#, .NET, DirectX and COM programming.  ', 'Best way to learn any programming language is to create good programs in it. C is not exception to this rule. Once you decide to write any program you would find that there are always at least two ways to write it. So you need to find out whether you have chosen the best way to implement your program.', 'let_us_c++.jpg', 1),
(43, 'Wish I Could Tell You', 28, 879, 23, 'This story begins with the protagonist- Anant khatri’s POV who works for Wedonate which raises funds for the poor sufferers', 'Wish I could tell you can be considered a romantic story except the fact that is neither conventional nor cliché kind of love story. This book has lot more to offer. How can you fall in love with someone when you have never talked to them', 'wish_i_could_tell_you.jpg', 12);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile_number` bigint(12) NOT NULL,
  `profile_picture` varchar(150) NOT NULL,
  `user_info` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `first_name`, `last_name`, `address`, `mobile_number`, `profile_picture`, `user_info`) VALUES
(1, 'bharatpareek', '12345', 'bharat@gmail.com', 'Bharat', 'Pareek', 'Pareek Hostel Bikaner', 8976543234, 'mine.jpg', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`auth_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat_id` (`product_cat_id`),
  ADD KEY `auth_id` (`auth_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `auth_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `tbl_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`product_id`);

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`product_cat_id`) REFERENCES `tbl_categories` (`cat_id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`auth_id`) REFERENCES `tbl_authors` (`auth_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
