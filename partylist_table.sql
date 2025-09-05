CREATE TABLE `partylist` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `description` varchar(50) NOT NULL,
  `max_vote` int(11) NOT NULL,
  `priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
