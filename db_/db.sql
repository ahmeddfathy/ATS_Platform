CREATE DATABASE appliedtech;
use appliedtech; 

CREATE TABLE `users` (
    id int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    username varchar(50) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255) NOT NULL,
    role varchar(255) NOT NULL,
    created_at timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `posts` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50),
    description VARCHAR(255) NOT NULL
);

CREATE TABLE `subscribers`(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL
);

CREATE TABLE `schools`(
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_data LONGBLOB,
    image_type VARCHAR(255) NOT NULL,
    school_name VARCHAR(255) NOT NULL,
    years INT NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone INT NOT NULL,
    branches VARCHAR(255) NOT NULL,
    fields VARCHAR(255) NOT NULL,
    description VARCHAR(500),
    facebook_link VARCHAR(255),
    instagram_link VARCHAR(255),
    twitter_link VARCHAR(255),
    whatsapp_group_link VARCHAR(255)
);