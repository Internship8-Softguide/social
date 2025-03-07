<?php require_once ("./layout/header.php")?>
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
            <label for="confirm-password" class="label">Confirm password</label>
            <div class="input-password">
                <input type="password">
                <span><i class="fa-solid fa-eye-slash"></i></span>
            </div>
            <span class="validate"></span>
        </div>
        <button class="login-btn">Register</button>
        <p  class="account-login">Already have an account?<a href="#">Login here!</a></p>
    </div>
        
<?php require_once ("./layout/footer.php")?>
<script src="./static/js/reauestAPI/register.js"></script>