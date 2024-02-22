


<!-- Register.php^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ -->

<?php
include 'session-file.php';

include 'handlers/register_handler.php';
include 'handlers/login_handler.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellcome to UIU update</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        .alert{
            color: red;
            margin: auto;
        }
        .pswd_icon_bg{
            background: white;
            height: 32px;
            width: 30px;
            position: absolute;
            display: flex;
            align-content: center;
            overflow: hidden;
            margin: 0 0 0 525px;
        }
    </style>


    <!-- favigon -->
    <!-- <link rel="shortcut icon" href="images/favigon.jpg" type="image/x-icon"> -->
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css">

</head>

<body>
   
    <div class="top-content">
        <h1 style="font-size:35px;">Wellcome to UIU updates, share your moments with friends!</h1>
        <p>Sign up and start sharing your photos and updates with your friends.
        </p>
        <hr style="width: 50%; color: white; margin-bottom:25px; margin-top:25px;">
    </div>

    <div class="wreper">
        <div class="signin-form">
            <div class="form-top-left">
                <h3 style="padding-top:10px;">Login to our site</h3>
                <p style="margin-top:-20px; padding-bottom:10px;">Enter Email and password to log on:</p>
            </div>
            <div class="form-bottom">
                <form action="register.php" method="POST" class="login-form">
                    <!-- Email Addresss -->
                        <label for="form-email">Email Address</label>
                        <input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($SESSION['log_email'])) {
                            echo $_SESSION['log_email'];
                        } ?>" required> <br>
                                            
                    <!-- Password -->
                        <label for="form-password">Password</label>
                        <span class="pswd_icon_bg"  onclick="log_pswd_toggale()"><i class="fa-regular fa-eye" id="pswd_show" style="margin: auto;"></i></span>
                        <input type="password" id="login_pswd" name="log_password" placeholder="Password" required> <Br>
                        
                    <!-- remember me -->
                    

                    <?php if(in_array("Email or Password was incorrect", $error_array_login)) echo "<p class='alert'>Email or Password was incorrect</p>"; ?>
                    <button type="submit" style="margin-bottom:20px" name="login_button">Sign in!</button>
                    <p>Do you not have an account? <a href="signup.php"><strong> sign up </strong></a></p>
                </form>     
            </div>
        </div>

        <!-- <hr style="height:300px; color:white; margin-top:110px;"> -->

        

    <!-- <hr style="color:white; margin-top:265px; width:40%;"> -->

    <!-- Footer -->
    			
    	<div class="footer"> 
            <a style="text-decoration-line: none; color: #977AFF;" href="admin.php"><i class="fas fa-user-shield"></i> Admin? click here <i class="fas fa-arrow-right"></i></a>
    		<p> ©2020 All Rights Reserved <BR> Website designed and developed by <strong><U>UIU updates team</u></strong></p>
    	</div>
    

    <script>
        function log_pswd_toggale() {
            var x = document.getElementById("login_pswd");
            var img = document.getElementById("pswd_show");
            if (x.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                x.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                x.type = "password";
            }
        }
        function reg_pswd_toggale() {
            var y = document.getElementById("register_pswd");
            var img = document.getElementById("reg_pswd_show");
            if (y.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                y.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                y.type = "password";
            }
        }
        function reg_conf_pswd_toggale() {
            var z = document.getElementById("register_conferm_pswd");
            var img = document.getElementById("reg_conf_pswd_show");
            if (z.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                z.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                z.type = "password";
            }
        }
    </script>

</body>

</html>