CREATE DATABASE mini_test;

USE mini_test;

CREATE TABLE boards(
	id INT PRIMARY KEY AUTO_INCREMENT 
	,title VARCHAR(100) NOT NULL 
	,content VARCHAR(1000) NOT null
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP 
	,delete_flg CHAR(1) NOT NULL DEFAULT '0'
	,delete_at DATETIME DEFAULT NULL 
);