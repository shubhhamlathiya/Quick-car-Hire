<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
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
                        <h2 align="center">Login</h2>
                        <div class="d-flex justify-content-center links">
                            Don't have an account?<a href="Registration.php"><b>Registration</b></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="email" id="CustomerEmail" name="CustomerEmail" class="form-control" placeholder="Email id" required>
                            </div>
                            <span id="email1"></span>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" id="Customerpassword" name="Customerpassword"  class="form-control" placeholder="Password" required>

                            </div>
                            <span id="pass"></span>
                            <div class="form-group" align="center">
                                <input type="submit" name="Customersubmit" id="Customersubmit" value="Login" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center links">
                            <a href="password.php">Forgot your password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function pass() {
                $("#pass").append("please enter valid Password!");
                $("#pass").css("color", "red");
            }
            function email() {
                $("#email1").append("please enter valid Email Id!");
                $("#email1").css("color", "red");
            }
        </script>
        <?php
        if (isset($_POST['Customersubmit'])) {
            $CustomerEmail = $_POST['CustomerEmail'];
            $Customerpassword = $_POST['Customerpassword'];

            $sql = $conn->prepare("SELECT * FROM customer WHERE Email = ? ");
            $sql->bind_param("s", $CustomerEmail);
            $sql->execute();
            $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

            if (count($result) > 0) {
                $sql = $conn->prepare("SELECT * FROM customer WHERE Email = ? && Password = ? ");
                $sql->bind_param("ss", $CustomerEmail,$Customerpassword);
                $sql->execute();
                $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

                if (count($result) > 0) {
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo '<script>pass();</script>';
                }
            } else {
                echo '<script>email();</script>';
            }
        }
        ?>
    </body>
</html>