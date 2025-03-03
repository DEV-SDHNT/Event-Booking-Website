<?php
include "config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4 ">
        <h1 class="text-center">Welcome to Event Booking</h1>
        <?php if(isset($_SESSION['user_id']) and $_SESSION['role']==0):?>
            <p class="text-center ">Hello,
                <a href="dashboard.php">Go to the Dashboard</a>|
                <a href="logout.php">Logout</a>
            </p>
        <?php elseif(isset($_SESSION['user_id']) and $_SESSION['role']==1):?>
            <p class="text-center ">Hello,
                <a href="./admin/admin_dashboard.php">Go to the Dashboard</a>|
                <a href="logout.php">Logout</a>
            </p>
        <?php else:?>
            <p class="text-center fs-6 border  ">
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </p>
        <?php endif; ?>

        <h2>Upcoming Events</h2>
        <?php $result=$conn->query("SELECT * from events ORDER BY date ASC");
        while ($row = $result->fetch_assoc()):
        ?>
        <div class="card my-3 shadow " style="display:flex;">
            <div class="card-body">
                <h3 class="card-title"><?= $row['title'] ?></h3>
                <p class="card-text"><?= $row['description'] ?></p>
                <p><strong>Date:</strong><?= $row['date'] ?> | <strong>Time:</strong><?= $row['time']?></p>
                <p><strong>Venue:</strong><?= $row['venue'] ?></p>
                <p><strong>Seats Available:</strong><?= $row['available_seat']?></p> 
                <?php if(isset($_SESSION['user_id'])):?>
                    <a href="book_event.php?event_id=<?= $row['id']?>" class="btn btn-primary">Book Now</a>
                <?php else:?>
                    <a href="login.php" class='btn btn-secondary'>Login to book</a>
                <?php endif;?>        
            </div>
        </div>
        <?php endwhile;?>
    </div>
</body>
</html>