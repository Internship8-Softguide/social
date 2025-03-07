<?php
require_once("./database/index.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./static/css/style.css">
    <script src="./static/js/app.js"></script>
    <script src="./static/js/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-card">
        <h1 class="header">Welcome Back</h1>
        <p class="sub-header">Please enter your detail</p>
        <div class="form-group">
            <label for="email" class="label">Email address</label>
            <input type="text" name="email" id="email" class="input">
            <span class="validate"></span>
        </div>
        <div class="form-group">
            <label for="email" class="label">Email address</label>
            <div class="input-password">
                <input type="password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate"></span>
        </div>
        
        <div class="form-group">
            <input type="checkbox" name="rememberMe" id="rememberMe">
            <label for="rememberMe" class="rememberMe">Remember Me for 30 days</label>
            <a class="forget_pwd" href="#">Forget Password?</a>
        </div>
        <button class="login-btn">Sign in</button>
    </div>
</body>
</html>