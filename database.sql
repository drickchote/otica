CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `client_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `clients` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(100),
  `fone` varchar(20),
  `fone2` varchar(20),
  `email` varchar(50),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `order_item` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `observations` varchar(200),
  `quantity` int not null,
  `type` varchar(20),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `frames` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `code` int,
  `brand` varchar(255),
  `type` varchar(30),
  `color` varchar(30),
  `price` float,
  `cost` float,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `sunglasses` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `code` int,
  `brand` varchar(255),
  `type` varchar(30),
  `color` varchar(30),
  `lens_color` varchar(30),
  `price` float,
  `cost` float,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `lens` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `brand` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `lab_len` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `len_id` int,
  `lab_id` int,
  `price` float,
  `cost` float,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `labs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `code` varchar(20),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `treatments` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` varchar(255),
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `len_treatment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `len_id` int,
  `treatment_id` int,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `lab_treatment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `lab_id` int,
  `treatment_id` int,
  `price` double,
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `orders` ADD FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`);

ALTER TABLE `lab_len` ADD FOREIGN KEY (`len_id`) REFERENCES `lens` (`id`);

ALTER TABLE `lab_len` ADD FOREIGN KEY (`lab_id`) REFERENCES `labs` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`item_id`) REFERENCES `frames` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`item_id`) REFERENCES `lab_len` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`item_id`) REFERENCES `lab_treatment` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`item_id`) REFERENCES `sunglasses` (`id`);

ALTER TABLE `lab_treatment` ADD FOREIGN KEY (`lab_id`) REFERENCES `labs` (`id`);

ALTER TABLE `lab_treatment` ADD FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`);

ALTER TABLE `len_treatment` ADD FOREIGN KEY (`len_id`) REFERENCES `lens` (`id`);

ALTER TABLE `len_treatment` ADD FOREIGN KEY (`treatment_id`) REFERENCES `treatments` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `order_item` ADD FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
