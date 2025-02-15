<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo("<script>console.log('Running');</script>");
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'default-jeli.com.my';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    echo("<script>console.log('Connection Failed');</script>");
    die("Connection Failed:".mysqli_connect_error());
}

echo("<script>console.log('Connected');</script>");
?>
