<?php

if($_SERVER['SERVER_NAME'] == 'localhost') {
    define ("DBNAME", "blog_cms_db");
    define ("DBHOST", "localhost");
    define ("DBUSER", "root");
    define ("DBPASS", "");
    define ("DBDRIVER", "");
    define("ROOT", "http://localhost/blog-cms/public");
} else {
    define ("DBNAME", "blog_cms_db");
    define ("DBHOST", "localhost");
    define ("DBUSER", "root");
    define ("DBPASS", "");
    define ("DBDRIVER", "");
    define("ROOT", "http://www.yourwebsite.com");
}
define ("APP_NAME", "BLOG CMS");
define ("DEBUG", true);




