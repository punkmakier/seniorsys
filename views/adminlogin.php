<?php



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeniorSys</title>
    <?php include('../inc/designs2.php');?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;400&family=Noto+Serif:ital,wght@1,700&family=Patua+One&family=Volkhov:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom_style.css?v=2"/>

    <style>
        label{
            font-size: 0.9rem;
        }
    </style>

</head>
  <body>

    <div id="login">
        <a href="../index.php" style="position: absolute; top: 3%; left: 3%; ">Back to Homepage</a>
            <div class="inner-login" style="height: 90%;">
                <div class="login-panel" id="loginPanel">
                    <div class="sidepanel">
                            <img src="../assets/img/login.png" alt="">
                            <h5 class="text-center mt-5">Lorem Impsum</h5>
                    </div>
                    <div class="form-panel-login ">
                        <div style="width: 100%; position: relative; top: 15%; " class="d-flex justify-content-center">
                        <form action="" class="text-center" style="width: 70%;" id="adminLoginForm">
                            <h4 class="mb-5 text-center">Admin Login</h4>
                            <input type="text" name="username" placeholder="Username" class="input-fields-custom ">
                            <input type="password" name="password" placeholder="Password" class="input-fields-custom" style=" margin-top: 20px;"><br>
                            <a href="" class="forgotPass text-start">Forgot Password</a>
                            <input id="submitAdminLogin" class="contact-submit mt-5" value="Login">

                            <p class="mt-5">Don't have an account yet? <a style="color: #1c3456; cursor: pointer; text-decoration: underline;" id="registerBTN">Register</a></p>
                        </form>
                        </div>

                    </div>

            </div>

                </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#submitAdminLogin").on('click', function(){
                var formData = $("#adminLoginForm").serialize()+"&adminLoginAccount=adminLoginAccount";
                $.ajax({
                    type: "POST",
                    url: "../Controller/AdminFunction.php",
                    data: formData,
                    success: function(data){
                        if(data == "Failed"){
                            Swal.fire(
                            'No Found!',
                            'Invalid username or password',
                            'error'
                            )
                        }
                        else{
                            window.location.href="admindashboard.php";
                        }
                    },

                })
            })


        })
    </script>


  </body>
</html>