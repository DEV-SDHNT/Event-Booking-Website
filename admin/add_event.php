<?php
include "../config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST["title"];
    $description=$_POST["description"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $venue=$_POST["venue"];
    $seats=$_POST["seats"];
    
    $sql="INSERT INTO events (title,description,date,time,venue,available_seat) VALUES('$title','$description','$date','$time','$venue','$seats');";
    if($conn->query($sql)===TRUE){
        echo "<script>alert('Event Added');</script>";
        // echo "Event added!";
    }
    else{
        echo "Error".$conn->error;
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    body{display:flex;align-self:center;justify-content:center;}
    div{width: 60%;}
    input{margin-bottom:-10px;}
</style>
<div class="p-4 border card shadow-lg" id="register">
<h3 class="text-center fs-4">Add Event</h3>
<form action="" method="post">
    <label for="" class="form-label">Title: </label>
    <input class="form-control" type="text" name="title" id=""><br>
    <label for="" class="form-label">Description:</label>
    <input type="text" name="description" class="form-control" id=""></textarea><br>
    <label for="" class="form-label">Date: </label>
    <input class="form-control" type="date" name="date" id=""><br>
    <label for="" class="form-label">Time: </label>
    <input class="form-control" type="time" name="time" id=""><br>
    <label for="" class="form-label">Venue: </label>
    <input class="form-control" type="text" name="venue"><br>
    <label for="" class="form-label">Available Seats: </label>
    <input class="form-control" type="number" name="seats" id=""><br>
    <input type="submit" value="Add Event" class="btn btn-primary">
</form>