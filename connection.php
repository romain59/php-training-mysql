<?php
/**
 * Created by PhpStorm.
 * User: romainbon
 * Date: 2019-01-16
 * Time: 11:10
 */

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "reunion_island";
$conn = new mysqli($servername, $username, $password);
if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else {
    $conn->select_db($dbname);
}