<?php
if (isset($_COOKIE["user"])) {
    header("location:home.php");
}

require_once ("./layout/header.php") ?>

<body>
    <div class="login-card">
        <h1 class="header">Create Account</h1>
        <p class="sub-header">Please enter your details</p>
        <div class="form-group">
            <label for="name" class="label">Your name</label>
            <input type="text" name="name" id="name" class="input" validate="blank|min:3">
            <span class="validate" id="nameErr"></span>
        </div>
        <div class="form-group">
            <label for="email" class="label">Your email</label>
            <input type="text" name="email" id="email" class="input" validate="blank|email">
            <span class="validate" id="emailErr"></span>
        </div>
        <div class="form-group">
            <label for="password" class="label">Password</label>
            <div class="input-password">
                <input type="password" name="password" id="password" validate="blank|password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate" id="passwordErr"></span>
        </div>
        <div class="form-group">
            <label for="confirmPassword" class="label">Confirm password</label>
            <div class="input-password">
                <input type="confirmPassword" name="confirmPassword" id="confirmPassword" validate="blank|password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate" id="confirmPasswordErr"></span>
        </div>
        <button id="register" class="login-btn">Register</button>
        <p class="account-login">Already have an account?<a href="#">Login here!</a></p>
    </div>

    <?php require_once ("./layout/footer.php") ?>
    <script src="./static/js/reauestAPI/register.js"></script>