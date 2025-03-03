<?php
include "config.php";
session_start();

if(!isset($_SESSION['user_id'])){
    die("You must be logged in to book events.");
}
$event_id=$_GET["event_id"];
$user_id=$_SESSION['user_id'];

$event=$conn->query("SELECT available_seat FROM events WHERE id=$event_id;")->fetch_assoc();
if($event["available_seat"]>0){
    $conn->query("UPDATE events SET available_seat=available_seat-1 WHERE id=$event_id;");
    
    $sql="INSERT INTO bookings(user_id,event_id) VALUES('$user_id','$event_id');";
    if($conn->query($sql)===TRUE){
        echo "Event booked!";
        header("Location:index.php");
    }
    else{
        echo "Error".$conn->error;
    }
}
?>