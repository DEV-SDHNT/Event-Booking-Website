<?php
include "config.php";

if (isset($_GET["token"])){
    $token=$_GET["token"];
    $user=$conn->query("SELECT * FROM users WHERE reset_token='$token'")->fetch_assoc();

    if(!$user){
        // echo "User not found";
        die("Invalid or expired token.");
    }
}
else{
    // echo "No token";
    die("No token provided");
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $newPassword=password_hash($_POST["password"],PASSWORD_BCRYPT);
    $conn->query("UPDATE users SET password='$newPassword' ,reset_token=NULL WHERE reset_token='$token'");
    echo "<script>alert('Password Reset Successful');</script>";
    header("Location:login.php");
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    body{height:100vh;display:flex;align-items:center;justify-content:center;}
</style>
<div class="p-4 border w-50 row card shadow-lg" style="left:50%;position:absolute;top:50%;translate:-50% -50%;">
<h2>Reset Password</h2>
<form action="" method="post">
    <label for="new-password" class="form-label"></label>New Password: 
    <input type="password" name="password" class="form-control " id="password" required>
    <button type="submit" class="btn btn-primary">Reset Password</button>
</form>
</div>