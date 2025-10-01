-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 05:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asgn3_library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL COMMENT 'ID',
  `isbn` varchar(13) NOT NULL COMMENT 'ISBN',
  `title` varchar(255) NOT NULL COMMENT 'Title',
  `author` varchar(255) NOT NULL COMMENT 'Author',
  `summary` text NOT NULL COMMENT 'Summary',
  `genre` varchar(255) NOT NULL COMMENT 'Genre',
  `publication_year` int(11) NOT NULL COMMENT 'Year',
  `is_available` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `isbn`, `title`, `author`, `summary`, `genre`, `publication_year`, `is_available`) VALUES
(1, '9780743247221', 'Fahrenheit 451', 'Ray Bradbury', 'Guy Montag is a fireman. His job is to destroy the most illegal of commodities, the printed book, along with the houses in which they are hidden. Montag never questions the destruction and ruin his actions produce, returning each day to his bland life and wife, Mildred, who spends all day with her television “family.” But when he meets an eccentric young neighbor, Clarisse, who introduces him to a past where people didn’t live in fear and to a present where one sees the world through the ideas in books instead of the mindless chatter of television, Montag begins to question everything he has ever known.', 'Dystopian, Fiction, Classics', 1953, 1),
(2, '9781492652397', 'Now a Major Motion Picture', 'Cory McCarthy', 'Unlike the rest of the world, Iris doesn\'t care about the famous high-fantasy Elementia books written by M. E. Thorne. So it\'s just a little annoying that M. E. Thorne is her grandmother—and that Iris has to deal with the trilogy\'s crazy fans.\n\nWhen Iris gets dropped in Ireland for the movie adaptation, she sees her opportunity: if she can shut down production, the Elementia craze won\'t grow any bigger, and she can finally have a normal life. Not even the rascally-cute actor Eamon O\'Brien can get in her way.\n\nBut the crew\'s passion is contagious, and as Iris begins to find herself in the very world she has avoided her whole life, she realizes that this movie might just be amazing…', 'Contemporary, Fiction, Young Adult, Romance, LGBT', 2018, 0),
(3, '9780525478812', 'The Fault in Our Stars', 'John Green', 'Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel\'s story is about to be completely rewritten.\r\n\r\nInsightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Green\'s most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love.', 'Fiction, Young Adult, Romance, Contemporary', 2012, 1),
(4, '9781594633669', 'The Girl on the Train', 'Paula Hawkins', 'Rachel catches the same commuter train every morning. She knows it will wait at the same signal each time, overlooking a row of back gardens. She’s even started to feel like she knows the people who live in one of the houses. “Jess and Jason,” she calls them. Their life—as she sees it—is perfect. If only Rachel could be that happy. And then she sees something shocking. It’s only a minute until the train moves on, but it’s enough. Now everything’s changed. Now Rachel has a chance to become a part of the lives she’s only watched from afar. Now they’ll see; she’s much more than just the girl on the train...', 'Thriller, Fiction, Mystery, Crime', 2015, 0),
(5, '9780593336670', 'City Under One Roof', 'Iris Yamashita', 'When a local teenager discovers a severed hand and foot washed up on the shore of the small town of Point Mettier, Alaska, Cara Kennedy is on the case. A detective from Anchorage, she has her own motives for investigating the possible murder in this isolated place, which can be accessed only by a tunnel.\n\nAfter a blizzard causes the tunnel to close indefinitely, Cara is stuck among the odd and suspicious residents of the town—all 205 of whom live in the same high-rise building and are as icy as the weather. Cara teams up with Point Mettier police officer Joe Barkowski, but before long the investigation is upended by fearsome gang members from a nearby native village.\n\nHaunted by her past, Cara soon discovers that everyone in this town has something to hide. Will she be able to unravel their secrets before she unravels?\"', 'Mystery, Thriller, Fiction, Crime', 2023, 0),
(6, '9780008532772', 'Yellowface', 'R. F. Kuang', 'Authors June Hayward and Athena Liu were supposed to be twin rising stars: same year at Yale, same debut year in publishing. But Athena\'s a cross-genre literary darling, and June didn\'t even get a paperback release. Nobody wants stories about basic white girls, June thinks.\r\n\r\nSo when June witnesses Athena\'s death in a freak accident, she acts on impulse: she steals Athena\'s just-finished masterpiece, an experimental novel about the unsung contributions of Chinese laborers to the British and French war efforts during World War I.\r\n\r\nSo what if June edits Athena\'s novel and sends it to her agent as her own work? So what if she lets her new publisher rebrand her as Juniper Song--complete with an ambiguously ethnic author photo? Doesn\'t this piece of history deserve to be told, whoever the teller? That\'s what June claims, and the New York Times bestseller list seems to agree.\r\n\r\nBut June can\'t get away from Athena\'s shadow, and emerging evidence threatens to bring June\'s (stolen) success down around her. As June races to protect her secret, she discovers exactly how far she will go to keep what she thinks she deserves.\r\n\r\nWith its totally immersive first-person voice, Yellowface takes on questions of diversity, racism, and cultural appropriation not only in the publishing industry but the persistent erasure of Asian-American voices and history by Western white society. R. F. Kuang\'s novel is timely, razor-sharp, and eminently readable.', 'Fiction, Contemporary, Adult, Thriller, Mystery', 2023, 1),
(7, '9780446310789', 'To Kill a Mockingbird', 'Harper Lee', 'The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it. \"To Kill A Mockingbird\" became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.\r\n\r\nCompassionate, dramatic, and deeply moving, \"To Kill A Mockingbird\" takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature.', 'Classics, Fiction, Literature, School', 1960, 1),
(8, '9781408855652', 'Harry Potter and the Philosopher’s Stone', 'J.K. Rowling', 'Harry Potter thinks he is an ordinary boy - until he is rescued by an owl, taken to Hogwarts School of Witchcraft and Wizardry, learns to play Quidditch and does battle in a deadly duel. The reason... HARRY POTTER IS A WIZARD!', 'Fantasy, Fiction, Young Adult, Magic, Childrens', 1997, 1),
(9, '9780439023481', 'The Hunger Games', 'Suzanne Collins', 'In the ruins of a place once known as North America lies the nation of Panem, a shining Capitol surrounded by twelve outlying districts. The Capitol is harsh and cruel and keeps the districts in line by forcing them all to send one boy and one girl between the ages of twelve and eighteen to participate in the annual Hunger Games, a fight to the death on live TV.\r\n\r\nSixteen-year-old Katniss Everdeen, who lives alone with her mother and younger sister, regards it as a death sentence when she steps forward to take her sister\'s place in the Games. But Katniss has been close to dead before—and survival, for her, is second nature. Without really meaning to, she becomes a contender. But if she is to win, she will have to start making choices that weight survival against humanity and life against love.', 'Young Adult, Fiction, Dystopia, Fantasy, Adventure\r\n', 2008, 1),
(10, '9781599869773', 'The Art of War', 'Sun Tzu, Thomas Cleary (Translator)', 'Twenty-five hundred years ago, Sun Tzu wrote this classic book of military strategy based on Chinese warfare and military thought. Since that time, all levels of military have used the teaching on Sun Tzu to warfare and civilization have adapted these teachings for use in politics, business and everyday life. The Art of War is a book which should be used to gain advantage of opponents in the boardroom and battlefield alike.', 'Classics, Nonfiction, Philosophy, History, War', 401, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_id` int(11) NOT NULL COMMENT 'ID',
  `book_id` int(11) NOT NULL COMMENT 'Book ID',
  `user_id` int(11) NOT NULL COMMENT 'User ID',
  `borrow_date` date NOT NULL COMMENT 'Borrow Date',
  `return_date` date DEFAULT NULL COMMENT 'Return Date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transaction_id`, `book_id`, `user_id`, `borrow_date`, `return_date`) VALUES
(1, 3, 2, '2023-05-12', '2023-05-28'),
(2, 5, 3, '2023-05-21', '2023-05-22'),
(3, 2, 5, '2023-06-06', '2023-06-19'),
(4, 1, 1, '2023-06-20', '2023-07-11'),
(5, 2, 2, '2023-07-01', NULL),
(6, 4, 4, '2023-07-12', NULL),
(7, 5, 5, '2023-07-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'ID',
  `username` varchar(255) NOT NULL COMMENT 'Username',
  `password` varchar(255) NOT NULL COMMENT 'Password',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Admin',
  `is_disabled` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `is_admin`, `is_disabled`) VALUES
(1, 'admin', 'admin', 1, 0),
(2, 'John', '123', 0, 0),
(3, 'Doe', '456', 0, 0),
(4, 'user1', 'pw1', 0, 0),
(5, 'user2', 'pw2', 0, 0),
(6, 'user3', 'yeehaw', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `books_fk_user_id` (`user_id`),
  ADD KEY `books_fk_book_id` (`book_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `books_fk_book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `books_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
