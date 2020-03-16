<?php
$userid= $_POST['userid'];
$servername = "localhost";
$username = "root";
$password = "S2nZ@fyR7#";
$dbname = "avocado";
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select commision_rate_c from users_cstm where id_c='$userid'";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
$commissionrate = $row['commision_rate_c'];
echo "$commissionrate"; 
?>