<?php

include "config.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email=$_POST['email'];
    $user=$conn->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();

    if($user){
        $token=bin2hex(random_bytes(50));
        $conn->query("UPDATE users SET reset_token='$token' WHERE email='$email'");

        $reset_link="reset_password.php?token=$token";
    }
    else{
        echo "No user with this Email.";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<div class="p-4 border w-50 row card shadow-lg" style="left:50%;position:absolute;top:50%;translate:-50% -50%;">
<h2>Forgot Password</h2>
<form action="" method="post">
    Enter your email: <input type="email" name="email" required>
    <button type="submit" class="btn btn-primary">Submit</button>
    <br>
    <?php echo "Password reset link : <a href='$reset_link'>$reset_link</a>"; ?>
</form>
</div>