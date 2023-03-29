<!-- Database Connection  -->
<?php include('AdminDashboard/Includes/db.php'); ?>
<?php include('AdminDashboard/Includes/validation.php'); ?>

<!-- HTML  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="AdminDashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="AdminDashboard/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border" style="width: 3rem; height: 3rem; color: #9c4b00" role="status">
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Start PHP  -->

        <?php

        $Check_Successfuly = 0; 
        $Check_UnSuccessfuly = 0; 

        if(isset($_POST['submit'])){ 
            $name =     santString($_POST['name']) ; 
            $email =    santEmail($_POST['email']) ;
            $password = santString($_POST['password']) ;

            // Start 1st condition
            if(requiredInput($name) && requiredInput($email) && requiredInput($password)) {

                // Start 2nd condition
                if(minInput($name,3) && maxInput($password,20)) {
                    // Start 3rd condition
                    if(validEmail($email)) {
                        // $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
                        

                        // Read From DataBase
                        $sql = "SELECT * FROM `users`";
                        $result = mysqli_query($conn,$sql); 

                        // Start many conditions to prevent repeat email in database
                        if(mysqli_num_rows($result) > 0){
                            
                            while($row = mysqli_fetch_assoc($result)){
                                if($row["Email"] !== $email) {

                                    $Check_Successfuly += 1;
                                    
                                } else {
                                    $Check_UnSuccessfuly += 1;
                                }
                            }
                            if($Check_UnSuccessfuly != 1){
                                // Start Create In DataBase
                                $sql = "INSERT INTO `users` (`Full_Name`, `Email`, `Password`) VALUES('$name' , '$email', '$password' ) ";   
                                $result = mysqli_query($conn, $sql);
                                // End Create In DataBase

                                if ( $result ) {
                                    header("Location: signin.php");
                                }
                            } else {
                                $error = "Please Enter available Email";
                            }
                        } else {

                            // Start Create In DataBase
                            $sql = "INSERT INTO `users` (`Full_Name`, `Email`, `Password`) VALUES('$name' , '$email', '$password' ) ";   
                            $result = mysqli_query($conn, $sql);
                            // End Create In DataBase

                            if ( $result ) {
                                header("Location: signin.php");
                            }

                        }
                         // End many conditions to prevent repeat email in database


                    }
                    else {
                        $error = "Please Type Valid Email";
                    }
                    // End 3rd condition
                }
                else {
                    $error = "Name Must Be Greate Than 3 Characters & Password Must Be Less Than 20 Characters";
                }
                // End 2nd condition
                
            }
            else {
                $error = "Please Fill All Fields"; 
            }
            // End 1st condition
        }

        ?>

        <!-- End PHP  -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
 
                    <!-- Start For Error  -->
                    <?php if($error) : ?>
                        <h5 class="alert alert-danger text-center" style="color: #9c4b00"><?php echo $error; ?></h5>
                    <?php endif; ?>
                    <!-- End For Error  -->


                    <form class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="PublicDashboard/index.php" class="">
                                <h3 style="font-size:x-large; color: #9C4B00"><i class="fa fa-user-edit me-2"></i>F.Academy</h3>
                            </a>
                            <h4>Sign Up</h4>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingText" placeholder="Username">
                            <label for="floatingText">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="email" class="form-control" id="floatingInput" placeholder="Email address">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button id="btn" type="submit" name="submit" class="btn py-3 w-100 mb-4" style="background-color: #9C4B00; color: #fff; font-size: 1.3em;" onmouseover="motivation()" onmouseout="motivation2()">Sign Up</button>
                        <p class="text-center mb-0" >Already have an Account? <a href="signin.php" >Sign In</a></p>
                    </form>

                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Template Javascript -->
    <script src="AdminDashboard/js/main.js"></script>
    <script src="JS/index.js"></script>

</body>

</html>