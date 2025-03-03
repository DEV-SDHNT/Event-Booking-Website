<?php
include "../config.php";
session_start();

$isAdmin=true;
if(!$isAdmin){
    header("Location:../index.php");
    exit();
}
if(isset($_GET['delete_id'])){
    $delete_id=$_GET['delete_id'];
    echo "$delete_id";
    $conn->query("DELETE FROM bookings WHERE event_id=$delete_id");
    $conn->query("DELETE FROM events WHERE id=$delete_id");
    header('Location:manage_events.php');
}
$result=$conn->query("SELECT * FROM events ORDER BY date ASC");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Manage Events</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container md-4">
            <h1>Manage Events</h1>
            <p><a href="admin_dashboard.php">Back to Dashboard</a></p>
            <h2>Events List</h2>
            <table class="table">
                <thead>    
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Venue</th>
                        <th>Seats</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['date'] ?></td>
                        <td><?= $row['time'] ?></td>
                        <td><?= $row['venue'] ?></td>
                        <td><?= $row['available_seat'] ?></td>
                        <td>
                            <a href="manage_events.php?delete_id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this event?');">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
              </tbody>
            </table>
        </div>
    </body>
</html>