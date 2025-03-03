<?php
include "config.php";

$result=$conn->query("SELECT * FROM events;");

while ($row = $result->fetch_assoc()){
    echo "<h2>{$row['title']}</h2>";
    echo "<p>{$row['description']}</p>";
    echo "<p>Date: {$row['date']} | Time: {$row['time']}</p>";
    echo "<p>Venue: {$row['venue']}</p>";
    echo "<p>Seats Available: {$row['available_seat']}</p>";
    echo "<a href='book_event.php?event_id={$row['id']}'>Book Now</a>";
}