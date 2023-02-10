<!DOCTYPE html>
<html>
    <head>
        <title>Registration Page</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
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
                                <input type="text" name="fullname" class="form-control" placeholder="Full Name" onkeypress="return (event.charCode > 64 &&
                                                event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)" >
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Mobile Number</span>
                                </div>
                                <input type="text" name="MobileNo" class="form-control MobileNo" placeholder="Mobile Number">
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Date of Birth</span>
                                </div>
                                <input type="date" name="DOB" id="DOB" class="form-control">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Driving Licence</span>
                                </div>
                                <input type="text" name="licence_number" id="licence_number" class="form-control licence_number" placeholder="GJ0000000000000" maxlength="15">
                            </div>
                            <span id="ErrorR_no" style="color: #f50404;"></span>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Aadhar No</span>
                                </div>
                                <input type="text" name="Aadharcard" class="form-control Aadharcard" placeholder="000000000000">
                            </div>

                            <div class="form-group" align="center">
                                <input type="submit" name="AddCustomer" value="Save" class="btn login_btn">
                            </div>
                        </form>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $('.MobileNo').on('keypress', function (e) {
                                var $this = $(this);
                                var regex = new RegExp("^[0-9\b]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                // for 10 digit number only
                                if ($this.val().length > 9) {
                                    e.preventDefault();
                                    return false;
                                }
                                if (e.charCode < 54 && e.charCode > 47) {
                                    if ($this.val().length == 0) {
                                        e.preventDefault();
                                        return false;
                                    } else {
                                        return true;
                                    }
                                }
                                if (regex.test(str)) {
                                    return true;
                                }
                                e.preventDefault();
                                return false;
                            });
                        });

                        $(document).ready(function () {
                            $('.Aadharcard').on('keypress', function (e) {
                                var $this = $(this);
                                var regex = new RegExp("^[0-9\b]+$");
                                var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                                // for 10 digit number only
                                if ($this.val().length > 11) {
                                    e.preventDefault();
                                    return false;
                                }
                                if (e.charCode < 50 && e.charCode > 47) {
                                    if ($this.val().length == 0) {
                                        e.preventDefault();
                                        return false;
                                    } else {
                                        return true;
                                    }
                                }
                                if (regex.test(str)) {
                                    return true;
                                }
                                e.preventDefault();
                                return false;
                            });
                        });
                        // $(document).ready(function () {
                        //     $('.licence_number').on('keypress', function (e) {
                        //         var $this = $(this);
                        //         var regex = new RegExp("^[A-Z]+[0-9\b]+$");
                        //         var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
                        //         // for 10 digit number only
                        //         if ($this.val().length > 15) {
                        //             e.preventDefault();
                        //             return false;
                        //         }
                        //         if (e.charCode < 72 && e.charCode > 70) {
                        //             if ($this.val().length == 1) {
                        //                 e.preventDefault();
                        //                 return false;
                        //             } else {
                        //                 return true;
                        //             }
                        //         }
                        //         if (e.charCode < 75 && e.charCode > 73) {
                        //             if ($this.val().length == 0) {
                        //                 e.preventDefault();
                        //                 return false;
                        //             } else {
                        //                 return true;
                        //             }
                        //         }
                        //         if (regex.test(str)) {
                        //             return true;
                        //         }
                        //         e.preventDefault();
                        //         return false;
                        //     });
                        // });
                        $(document).ready(function () {
                        $("#licence_number").keyup(function (e) {
                            $("#ErrorR_no").html('');

                            var validstr = '';
                            var dInput = $(this).val();
                            var numpattern = /^\d+$/;
                            var alphapattern = /^[A-Z]+$/;

                            for (var i = 0; i < dInput.length; i++) {

                                if ((i == 2 || i == 3 || i == 4 || i == 5 || i == 6 || i == 7 || i == 8 || i == 9 || i == 10 || i == 11 || i == 12 || i == 13 || i == 14 || i == 15)) {
                                    if (numpattern.test(dInput[i])) {
                                        // console.log('validnum' + dInput[i]);
                                        validstr += dInput[i];
                                    } else {
                                        $("#ErrorR_no").html("Only Digits").show();

                                    }
                                }

                                if ((i == 0 || i == 1 )) {
                                    if (alphapattern.test(dInput[i])) {
                                        // console.log('validword' + dInput[i]);
                                        validstr += dInput  [i];
                                    } else {
                                        $("#ErrorR_no").html("Only Capital Alpahbets").show();

                                    }
                                }

                            }

                            $(this).val(validstr);
                            return false;
                        });
                        });

                    </script>
                    <?php
                    if (isset($_POST['AddCustomer'])) {
                        $Emailid = $_SESSION['Emailid'];
                        $password = $_SESSION['password'];
                        $fullname = $_POST['fullname'];
                        $mobile = $_POST['MobileNo'];
                        $DOB = $_POST['DOB'];
                        $licence_number = $_POST['licence_number'];
                        $Aadharcard = $_POST['Aadharcard'];

                        $customer = $conn->prepare("INSERT INTO customer VALUES (?,?,?,?,?,?,?)");
//                        $customer = $conn->prepare("UPDATE customer SET Name=?,MobileNo=?,Date_of_birth=?,Driving_licence=?,AadharCard_no=? WHERE Email =?");
                        $customer->bind_param("sssssss", $fullname, $Emailid, $password, $mobile, $DOB, $licence_number, $Aadharcard);
//                        $customer->bind_param("ssssss", $fullname, $mobile, $DOB, $licence_number, $Aadharcard, $Emailid);
                        $Addcustomer = $customer->execute();
                        if ($Addcustomer > 0) {
                            echo "<script>window.location.href='index.php'</script>";
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