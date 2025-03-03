<?php
include "config.php";
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST["email"];
    $password=$_POST["password"];
    $sql="Select * from users where email='$email'";
    $result=$conn->query($sql);

    if($result->num_rows>0){
        $user=$result->fetch_assoc();
        // echo $user['isAdmin'];
        if(password_verify($password,$user["password"]) and $user['isAdmin']==1){
            $_SESSION["user_id"]=$user['id'];
            $_SESSION['role']=$user['isAdmin'];
            header("Location: ./admin/admin_dashboard.php");
        }
        elseif(password_verify($password,$user["password"]) and $user['isAdmin']==0){
            $_SESSION["user_id"]=$user['id'];
            header("Location: dashboard.php");
        }
        else{
            echo "<script>alert('Incorrect Password');</script>";
        }
    }
    else{
        echo "User not found.";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    body{height:100vh;display:flex;align-items:center;justify-content:center;}
</style>
<div class="p-4 border w-50 row justify-content-center card shadow" id="register">
    <h3 class="text-center ">Login</h3>
    <form action="" method="post">
        <label for="email" class="form-label">Email:</label><input type="email" name="email" class="form-control" required><br>
        <label for="" class="form-label">Password:</label><input type="password" name="password" class="form-control" required><br>
        <a href="forgot_password.php">Forgot Password</a>
        <input type="submit" value="Login" class="btn btn-success shadow w-100 rounded-pill mb-3">
        <input type="reset" value="Reset" class="btn btn-danger w-100 rounded-pill">
    </form>
</div>