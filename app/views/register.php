<!DOCTYPE html>
<html lang="zxx">
<?php require("inc/head.php") ?>



<body>
    <?php require("inc/header.php") ?>
    <?php require("inc/nav.php") ?>



    <div class="container-login">
        <div class="wrapper-login">
            <h2>Register</h2>

            <form id="register-form" method="POST" action="<?php echo URLROOT; ?>/users/register">
                <input type="text" placeholder="Username *" name="username">
                <span class="invalidFeedback">
                    <?php echo $data['usernameError']; ?>
                </span>

                <input type="email" placeholder="Email *" name="email">
                <span class="invalidFeedback">
                    <?php echo $data['emailError']; ?>
                </span>

                <input type="password" placeholder="Password *" name="password">
                <span class="invalidFeedback">
                    <?php echo $data['passwordError']; ?>
                </span>

                <input type="password" placeholder="Confirm Password *" name="confirmPassword">
                <span class="invalidFeedback">
                    <?php echo $data['confirmPasswordError']; ?>
                </span>

                <button id="submit" type="submit" value="submit">Submit</button>

                <p class="options">Not registered yet? <a href="<?php echo URLROOT; ?>/users/register">Create an account!</a></p>
            </form>
        </div>
    </div>
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
            padding: 0;
            margin: 0;
            top: 0;
            bottom: 0;
            font-family: 'Lato', sans-serif;
        }

        .top-nav {
            display: block;
        }

        .top-nav ul {
            margin: 0;
            padding: 0;
            position: absolute;
            right: 6%;
            top: 2%;
        }

        .top-nav ul li {
            display: inline-block;
            margin-left: 28px;
        }

        .top-nav ul li a {
            color: #ffffff;
            text-decoration: none;
            font-size: 18px;
        }

        .top-nav ul li a:hover {
            color: #afafaf;
            transition: 0.15s ease-in;
        }

        #section-landing {
            background: url('../img/banner.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%;
        }

        .wrapper-landing {
            position: relative;
            text-align: center;
            margin: 0 auto;
            width: 100%;
            top: 40%;
        }

        .wrapper-landing h1 {
            font-size: 48px;
            color: #ffffff;
            margin: 0;
            font-weight: 100;
        }

        .wrapper-landing h2 {
            font-size: 42px;
            color: #f2f2f2;
            opacity: 0.6;
            margin: 0;
            font-weight: 100;
        }

        .btn-login {
            border: 1px solid #ffffff;
            padding: 6px 24px;
        }

        .navbar {
            width: 100%;
            height: 70px;
            background-color: #1a1a1a;
            box-shadow: 0px 0px 10px #1a1a1a;
        }

        .container-login {
            width: 100%;
            margin: 0 auto;
            position: relative;
            top: 20%;
        }

        .wrapper-login {
            width: 80%;
            margin: 0 auto;
            text-align: center;
        }

        .wrapper-login input {
            width: 200px;
            height: 26px;
            border: 1px solid #cccccc;
            background-color: #f5f5f5;
            font-size: 18px;
            display: block;
            position: relative;
            margin: 20px auto;
        }

        input::placeholder {
            color: #a1a1a1;
            font-size: 14px;
        }

        .wrapper-login h2 {
            font-size: 40px;
            text-transform: uppercase;
        }

        #submit {
            width: 200px;
            height: 42px;
            border: 1px solid #000000;
            background-color: #000000;
            color: #ffffff;
            font-size: 20px;
            margin: 20px 0px 0px 0px;
        }

        #submit:hover {
            border: 1px solid #a1a1a1;
            background-color: #a1a1a1;
            transition: 0.15s ease-in;
        }

        .options a {
            color: #006400;
        }

        .options a:hover {
            color: #000000;
            transition: 0.20s ease-in;
            text-decoration: none;
        }

        .invalidFeedback {
            color: #ff0000;
            display: block;
        }
    </style>
    <script src="<?php echo URLROOT ?>/public/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/bootstrap.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/jquery.nicescroll.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/jquery.countdown.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/jquery.slicknav.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/mixitup.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/owl.carousel.min.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/main.js"></script>
</body>

</html>