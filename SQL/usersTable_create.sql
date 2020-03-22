CREATE TABLE users (
     user_id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
     firstname VARCHAR(50),
     lastname VARCHAR(50),
     email VARCHAR(50) NOT NULL,
     birthday DATE,
     username VARCHAR(50) NOT NULL,
     password LONGTEXT NOT NULL
);