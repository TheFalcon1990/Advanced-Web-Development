--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` smallint(6) NOT NULL,
  `duration` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `title`, `year`, `duration`) VALUES
(1, 'Jaws', 1975, 124),
(2, 'Winter\'s Bone', 2010, 100),
(3, 'Do The Right Thing', 1989, 120),
(4, 'The Incredibles', 2004, 115),
(5, 'The Godfather', 1972, 177),
(6, 'Dangerous Minds', 1995, 99),
(7, 'Spirited Away', 2001, 124),
(8, 'Moonlight', 2016, 111),
(9, 'Life of PI', 2012, 127),
(10, 'Gravity', 2013, 91),
(11, 'Arrival', 2016, 116),
(12, 'Wonder Woman', 2017, 141),
(13, 'Mean Girls', 2004, 97),
(14, 'Inception', 2010, 108),
(15, 'Donnie Darko', 2001, 113),
(16, 'Get Out', 2017, 117);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
