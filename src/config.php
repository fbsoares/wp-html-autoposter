<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__."/../");
$dotenv->load();

return [
    'wordpressUrl' =>  $_ENV['WORDPRESS_URL'], //'https://example.com',
    'username' => $_ENV['WORDPRESS_USERNAME'], //'your_username',
    'password' => $_ENV['WORDPRESS_PASSWORD'], //'your_password',
    'folder' => $_ENV['HTML_FILES_PATH'], // '/path/to/html/files'
];