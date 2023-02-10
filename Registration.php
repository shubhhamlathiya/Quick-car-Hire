<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <!--Bootsrap 4 CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!--Fontawesome CDN-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                                <input type="text" class="form-control" name="Emailid" placeholder="Enter your Email id" title="Email should be valid email address." pattern="[A-Za-z0-9._%+-]+@gmail\.com$" required>
                                <span id="Email"></span>
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                                <span id="pass"></span>
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="retypepassword" name="retypepassword" placeholder="Confirm Password" required><br/>
                                <span id="Rpass"></span>
                            </div>
                            <div class="form-group" align="center">
                                <input type="submit" value="Registration " name="Registration" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <script>
                        function Email() {
                            $("#Email").append("Plase enter any valid email address.");
                            $("#Email").css("color", "red");
                        }
                        function alreadyexistEmail() {
                            $("#Email").append("This Admin Email Id is already exist!");
                            $("#Email").css("color", "red");
                        }
                        function pass() {
                            $(document).ready(function () {
                                $("#pass").append("Password must be at least 8 characters and contain at least one number and one special symbol.");
                                $("#pass").css("color", "red");
                            });
                        }
                        function Rpass() {
                            $(document).ready(function () {
                                $("#Rpass").append("Passwords do not match.");
                                $("#Rpass").css("color", "red");
                            });
                        }
                    </script>
                    <?php
                    if (isset($_POST['Registration'])) {
                        $Emailid = $_POST['Emailid'];
                        $password = $_POST['password'];
                        $retypepassword = $_POST['retypepassword'];

                        $uppercase = preg_match('@[A-Z]@', $password);
                        $lowercase = preg_match('@[a-z]@', $password);
                        $number = preg_match('@[0-9]@', $password);
                        $specialChars = preg_match('@[^\w]@', $password);

                        $CheckP = $conn->prepare("SELECT * FROM customer WHERE Email = ?");
                        $CheckP->bind_param("s", $Emailid);
                        $result = $CheckP->execute();
                        $result = $CheckP->get_result()->fetch_all(MYSQLI_ASSOC);

                        if (!count($result) > 0) {

                            if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
                                echo "<script>pass();</script>";
                            } else {
                                if ($password != $retypepassword) {
                                    echo "<script>Rpass();</script>";
                                }else{
                                    $_SESSION['Emailid'] = $Emailid;
                                    $_SESSION['password'] = $password;
                                    echo "<script>window.location.href='profile.php'</script>";
                                }
                            }
                        } else {
                            echo "<script>alreadyexistEmail();</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>