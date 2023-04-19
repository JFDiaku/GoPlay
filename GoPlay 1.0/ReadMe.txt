1. Download and install  XAMMP
https://www.apachefriends.org/download.html


2. Copy the GoPlay folder to  C:\xampp\htdocs


3. Open http://localhost/phpmyadmin/ 
4. Create a new database called “goplaydb”
5. Click the SQL tab and Create users table:


CREATE TABLE `users` (
  `id` int(11) NOT NULL  AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `image` varchar(255) NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


Create Messages table:


CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL  AUTO_INCREMENT,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);


6. Open http://localhost/goPlay/homepage.php to access the homepage