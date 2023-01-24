<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <style>
            html,body{
                background-image: url('assets/images/Login.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                height: 100%;
                font-family: 'Numans', sans-serif;
            }

            .container{
                height: 100%;
                align-content: center;
            }

            .card{
                height: auto;
                margin-top: auto;
                margin-bottom: auto;
                width: 400px;
                background-color: rgba(0,0,0,0.5) !important;
            }


            .card-header h2{
                color: #FFC312;
            }

            .input-group-prepend span{
                width: 40px;
                background-color: #FFC312;
                color: black;
                border:0 !important;
            }

            input:focus{
                outline: 0 0 0 0  !important;
                box-shadow: 0 0 0 0 !important;

            }

            .remember{
                color: white;
            }

            .remember input
            {
                width: 20px;
                height: 20px;
                margin-left: 15px;
                margin-right: 5px;
            }

            .login_btn{
                color: black;
                background-color: #FFC312;
                width: 130px;
            }

            .login_btn:hover{
                color: black;
                background-color: red;
            }

            .links{
                color: white;
            }

            .links a{
                margin-left: 4px;
                color: #FFC312;
            }

            .links a:hover{
                margin-left: 4px;
                color: red;
            }
        </style>
    </head>
    <body>
        <?php 
        include './DatabaseConnection.php';
        ?>
        <div class="container">
            <div class="d-flex justify-content-center h-100">
                <div class="card">
                    <div class="card-header">
                        <h2 align="center">Registration</h2>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center links">
                                Already have an account?<a href="login.php"><b>Login</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" name="Emailid" placeholder="Email id">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="ConfirmPassword" placeholder="Confirm Password">
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" value="Registration " name="Registration" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <?php 
                    if(isset($_POST['Registration'])){
                          $Emailid = $_POST['Emailid'];
                        $password = $_POST['password'];
                        $_SESSION['Emailid']=$Emailid;
                          $customer = "INSERT INTO customer VALUES ('', '$Emailid', '$password', '', '', '')";
                        if ($conn->query($customer) === TRUE) {
//                            echo 'true';
                            echo "<script>window.location.href='profile.php'</script>";
                        } else {
                            echo "Error: " . $customer . "<br>" . $conn->error;
                        }
                    }
                    
                    
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>