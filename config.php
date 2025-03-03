<?php
$host="localhost";
$user="root";
$pass="";
$dbname="event_booking";

$conn=new mysqli($host,$user,$pass,$dbname);

if ($conn->connect_error){
    echo "Error in config.php";
    die("Connection failed! ->".$conn->connect_error);
}
// echo "Connected";
?>