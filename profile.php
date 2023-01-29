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
                width: 500px;
                background-color: rgba(0,0,0,0.5) !important;
            }


            .card-header h2{
                color: #FFC312;
            }

            .input-group-prepend span{
                width: 130px;
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
                        <h2 align="center">User Details</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Name</span>
                                </div>
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Date of Birth</span>
                                </div>
                                <input type="date" name="DOB" class="form-control">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Driving Licence</span>
                                </div>
                                <input type="text" name="licence_number" class="form-control" placeholder="GJ00 00000000000">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Aadhar No</span>
                                </div>
                                <input type="text" name="Aadharcard" class="form-control" placeholder="000000000000">
                            </div>

                            <div class="form-group" align="center">
                                <input type="submit" name="AddCustomer" value="Save" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <?php
                    if (isset($_POST['AddCustomer'])) {
                        $Emailid = $_SESSION['Emailid'];
                        $fullname = $_POST['fullname'];
                        $DOB = $_POST['DOB'];
                        $licence_number = $_POST['licence_number'];
                        $Aadharcard = $_POST['Aadharcard'];

                        if (preg_match("/^(([A-Z]{2}[0-9]{2})( )|([A-Z]{2}-[0-9]{2}))((19|20)[0-9][0-9])[0-9]{7}$/", $licence_number)) {
                            if (preg_match("/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/", $Aadharcard)) {
                                $customer = "UPDATE customer SET Name='$fullname',DOB='$DOB',DL='$DL',AN='$Aadharcard' WHERE Email ='$Emailid'";
                                if ($conn->query($customer) === TRUE) {
                                    echo "<script>window.location.href='login_1.php'</script>";
                                } else {
                                    echo "Error: " . $customer . "<br>" . $conn->error;
                                }
                            } else {
                                echo "<script> alert('plases check Aadhar card Number!');</script>";
                            }
                        } else {
//                            echo "Invalid license number";
                            echo "<script> alert('plases check license number!');</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>