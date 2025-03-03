<?php
include "config.php";
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location:login.php");
    exit();
}
$user_id=$_SESSION['user_id'];
$result=$conn->query("SELECT events.title,events.date,events.time,events.venue FROM bookings JOIN events ON bookings.event_id=events.id WHERE bookings.user_id=$user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dahboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h1>User Dashboard</h1>
        <p><a href="index.php">Home</a>| <a href="logout.php">Logout</a></p>
        <h2>Your Booked Events</h2>
        <?php while($row=$result->fetch_assoc()): ?>
            <div class="card my-3">
                <div class="card-body">
                    <h3 class="card-title"><?= $row['title'] ?></h3>
                    <p><strong>Date:</strong><?= $row['date'] ?> | <strong>Time:</strong><?= $row['time']?></p>
                    <p><strong>Venue:</strong> <?= $row['venue'] ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>