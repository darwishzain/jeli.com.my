<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'developer-jeli.com.my';

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
if(!$conn)
{
    echo("<script>console.log('Connection Failed');</script>");
    die("Connection Failed:".mysqli_connect_error());
}
?>
