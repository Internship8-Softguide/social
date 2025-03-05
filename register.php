<?php
require_once("./database/index.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- <link rel="stylesheet" href="./static/css/style.css">
    <script src="./static/js/app.js"></script> -->
    <style>
        .register-card {
            padding:
                20px;
            width:
                500px;
            margin:
                40px auto;

            background-color: rgb(212, 192, 244);

        }

        .form-group {
            margin-bottom:
                30px;
        }

        input,
        label,
        h1,
        .direct-text,
        .register-btn,
        .direct-to-login,
        .login-btn {
            display:
                block;
            width:
                400px;
            margin-left:
                auto;
            margin-right:
                auto;
        }

        .direct-text {
            font-size:
                20px;
            font-weight:
                bolder;
            margin-bottom:
                40px;
            margin-top:
                10px;
            color:
                rgb(93,
                    93,
                    90);
        }

        .direct-to-login {
            text-align:
                center;
            font-size:
                20px;
            font-weight:
                bolder;
            margin-top:
                50px;
        }

        .register-btn {
            background-color:
                #8a57e9;
            color:
                white;
            border:
                none;
            padding:
                18px 0px;
            margin-top:
                50px;
            cursor:
                pointer;
            border-radius:
                5px;
            font-size:
                18px;
            font-weight:
                bold;
        }

        h1 {
            margin-bottom:
                0px !important;
            color:
                rgb(29,
                    30,
                    28);
        }

        .login-btn {
            text-align:
                center;
            background-color:
                rgb(219,
                    249,
                    252);
            padding:
                18px 0px;
            text-decoration:
                none;
            margin-top:
                30px;
            font-size:
                20px;
            border-radius:
                5px;
            font-weight:
                bold;
            color:
                rgb(36,
                    83,
                    100);
        }

        input {
            border:
                none;
            padding:
                18px 0px;
            background-color:
                whitesmoke;
            border-radius:
                5px;
            position:
                relative;
        }

        .password-eye {
            position:
                absolute;
            top:
                47%;
            right:
                770px;
            transform:
                translateY(10%);
            width:
                30px;
            height:
                30px;
            /*
        background-image:
        url('./static/image/eye.png');
        */
            background-size:
                contain;
            background-repeat:
                no-repeat;
        }

        .repeat-password-eye {
            position:
                absolute;
            top:
                59%;
            right:
                770px;
            transform:
                translateY(-5%);
            width:
                30px;
            height:
                30px;
            /*
        background-image:
        url('./static/image/eye.png');
        */
            background-size:
                contain;
            background-repeat:
                no-repeat;
        }

        label {
            margin-bottom:
                8px;
            font-size:
                18px;
            font-weight:
                bolder;
        }
    </style>
</head>

<body>
    <div class="register-card">
        <h1 class="header">Create Account</h1>
        <p class="direct-text">Please enter your details</p>
        <div class="form-group">
            <label class="email-label">Your name</label>
            <input type="text" class="email-input">
        </div>
        <div class="form-group">
            <label class="name-label">Your email</label>
            <input type="text" class="name-input">
        </div>
        <div class="form-group">
            <label class="password-label">Password</label>
            <input type="password" class="password-input">
            <img class="password-eye" src="./static/image/eye.png" />
        </div>
        <div class="form-group">
            <label class="repeat-password-label">Repeat password</label>
            <input type="password" class="repeat-password-input">
            <img class="repeat-password-eye" src="./static/image/eye.png" />
        </div>
        <button class="register-btn">Register</button>
        <p class="direct-to-login">Already have an account</p>
        <a href="#" class="login-btn">Login</a>
    </div>
</body>

</html>