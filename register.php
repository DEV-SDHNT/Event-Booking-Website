<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"],PASSWORD_BCRYPT);
    $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password');";

    if($conn->query($sql)===TRUE){
        echo "Your are Registered !";
        header("Location:login.php");
    }
    else{
        echo "Error:".$conn->error;
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
    body{height:100vh;display:flex;align-items:center;justify-content:center;}
</style>
<div class="p-4 border w-50 row justify-content-center card shadow" id="register">
    <h3 class="text-center">Register</h3>
    <form action="" method="post">
        <div class="mb-3">
            <label for="" class="form-label">Name:</label>
            <input type="text" name="name" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email:</label>
            <input type="email" name="email" class="form-control" required><br>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password:</label>
            <input type="password" name="password" class="form-control" required><br>
        </div>
        <input type="submit" value="Register" class="btn  btn-success w-100 rounded-pill mb-4">
        <input type="reset" value="Reset" class="btn btn-danger w-100 rounded-pill">
    </form>
</div>