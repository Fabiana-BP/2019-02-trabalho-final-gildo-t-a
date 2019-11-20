SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "-04:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE categories (
  cat_id int(3) NOT NULL,
  cat_title varchar(255) NOT NULL
);


INSERT INTO categories (cat_id, cat_title) VALUES
(1, 'Onibus'),
(2, 'Vans');

CREATE TABLE cost (
  `start` varchar(255) NOT NULL,
  stopage varchar(255) NOT NULL,
  category int(3) NOT NULL,
  cost int(3) NOT NULL
);

INSERT INTO cost (start, stopage, category, cost) VALUES
('João Monlevade', 'Itabira', 2, 20),
('João Monlevade', 'Belo Horizonte', 1, 55);

CREATE TABLE orders (
  order_id int(3) NOT NULL,
  bus_id int(3) NOT NULL,
  user_id int(3) NOT NULL,
  user_name varchar(255) NOT NULL,
  user_age int(3) NOT NULL,
  `source` varchar(255) NOT NULL,
  destination varchar(255) NOT NULL,
  `date` date NOT NULL,
  cost int(3) NOT NULL
);

CREATE TABLE posts (
  post_id int(3) NOT NULL,
  post_category_id int(3) NOT NULL,
  post_title varchar(255) NOT NULL,
  post_author varchar(255) NOT NULL,
  post_date date NOT NULL,
  post_image text NOT NULL,
  post_content text NOT NULL,
  post_source varchar(255) NOT NULL,
  post_destination varchar(255) NOT NULL,
  post_via varchar(255) NOT NULL,
  post_via_time varchar(255) NOT NULL,
  post_query_count int(3) NOT NULL,
  max_seats int(3) NOT NULL,
  available_seats int(3) NOT NULL
);

CREATE TABLE query (
  query_id int(3) NOT NULL,
  query_bus_id int(3) NOT NULL,
  query_user varchar(255) NOT NULL,
  query_email varchar(255) NOT NULL,
  query_date date NOT NULL,
  query_content text NOT NULL,
  query_replied varchar(255) NOT NULL
);

CREATE TABLE seats (
  bus_id int(3) NOT NULL,
  max_seats int(3) NOT NULL,
  available_seats int(3) NOT NULL
);

CREATE TABLE users (
  user_id int(3) NOT NULL,
  username varchar(255) NOT NULL,
  user_password varchar(255) NOT NULL,
  user_firstname varchar(255) NOT NULL,
  user_lastname varchar(255) NOT NULL,
  user_email varchar(255) NOT NULL,
  user_phoneno varchar(255) NOT NULL,
  user_image text NOT NULL,
  user_role varchar(255) NOT NULL
);

INSERT INTO users(user_id, username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_image, user_role) VALUES
(1, 'tiago', '202cb962ac59075b964b07152d234b70', 'Gildo', 'Azevedo', 'gta_jm@hotmail.com', '3187654321', 'images/20190615_023842.jpg', 'admin'),
(2, 'fbarreto', '202cb962ac59075b964b07152d234b70', 'Fabiana', 'Barreto', 'fbarreto@teste.com', '3199999999', 'images/img_profile_null.png', 'admin');

ALTER TABLE categories
  ADD PRIMARY KEY (cat_id);

ALTER TABLE orders
  ADD PRIMARY KEY (order_id);

ALTER TABLE posts
  ADD PRIMARY KEY (post_id);

ALTER TABLE `query`
  ADD PRIMARY KEY (query_id);

ALTER TABLE seats
  ADD PRIMARY KEY (bus_id);

ALTER TABLE users
  ADD PRIMARY KEY (user_id);

ALTER TABLE categories
  MODIFY cat_id int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE orders
  MODIFY order_id int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE posts
  MODIFY post_id int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `query`
  MODIFY query_id int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE users
  MODIFY user_id int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
