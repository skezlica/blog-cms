# blog-cms

# PHP version: 8.2.12

1) You need to configure your database:

--------------------------------------------------
1. Creating a database "bloog_cms_db"

CREATE DATABASE IF NOT EXISTS calculator;
--------------------------------------------------
2. Using a database "bloog_cms_db"

USE bloog_cms_db;
--------------------------------------------------
3. Creating table "users"

CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255),
    password VARCHAR(255)
);
--------------------------------------------------

2) In following path you need to create a file "config.php" with following code:

--------------------------------------------------
<?php

if($_SERVER['SERVER_NAME'] == 'localhost') {
    define ("DBNAME", "blog_cms_db");
    define ("DBHOST", "your db host name"); 
    define ("DBUSER", "your db username");
    define ("DBPASS", "your db password");
    define ("DBDRIVER", "");
    define("ROOT", "http://localhost/blog-cms/public");
} else {
    define ("DBNAME", "blog_cms_db");
    define ("DBHOST", "your db host name"); 
    define ("DBUSER", "your db username");
    define ("DBPASS", "your db password");
    define ("DBDRIVER", "");
    define("ROOT", "http://www.yourwebsite.com");
}
define ("APP_NAME", "BLOG CMS");
define ("DEBUG", true);
--------------------------------------------------

