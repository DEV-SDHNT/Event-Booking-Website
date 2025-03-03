<?php 
include "../config.php";
session_start();

$isAdmin=TRUE;
if(!isset($_SESSION['user_id']) or $_SESSION['role']!=1){
    header("Location: ../index.php");
    exit();
}
else{
$result=$conn->query("SELECT COUNT(*) AS total_events FROM events;");
$total_events=$result->fetch_assoc()["total_events"];
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<body>
    <div class="container mt-4">
        <h1>Admin Dashboard</h1>
        <p><a href="../index.php">Home</a>|<a href="manage_events.php">Manage Events</a></p>
        <h2>Statistics</h2>
        <p>Total Events: <?=$total_events?></p>
        <a href="add_event.php" class="btn btn-success">Add Events</a>
    </div>
</body>