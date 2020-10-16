<?php 
session_start();
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'blogs_site';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
echo "Error " . mysqli_connect_error();
} 