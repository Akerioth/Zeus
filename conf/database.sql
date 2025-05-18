CREATE DATABASE auth_system;
USE auth_system;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('member', 'administrator', 'moderator') DEFAULT 'member',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);