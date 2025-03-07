<?php
require_once("./database/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <script src="./static/js/app.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
<div class="login-card">
        <h1 class="header">Create Account</h1>
        <p class="sub-header">Please enter your details</p>
        <div class="form-group">
            <label for="name" class="label">Your name</label>
            <input type="text" name="name" id="name" class="input">
            <span class="validate"></span>
        </div>
        <div class="form-group">
            <label for="email" class="label">Your email</label>
            <input type="text" name="email" id="email" class="input">
            <span class="validate"></span>
        </div>
        <div class="form-group">
            <label for="password" class="label">Password</label>
            <div class="input-password">
                <input type="password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate"></span>
        </div>
        <div class="form-group">
            <label for="repeat-password" class="label">Repeat password</label>
            <div class="input-password">
                <input type="password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate"></span>
        </div>
        <button class="register-btn">Register</button>
        <p  class="account-login">Already have an account?<a href="#">Login here!</a></p>
    </div>
        
</body>

</html>