<!-- Database Connection  -->
<?php include('AdminDashboard/Includes/db.php'); ?>
<?php include('AdminDashboard/Includes/validation.php'); ?>

<!-- HTML  -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sign In</title>
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


        <!-- PHP Start  -->
    <?php

    if(isset($_POST['submit'])){ 
        $email =    santEmail($_POST['email']) ;
        $password = santString($_POST['password']) ;

        

        // Start 1st condition
        if(requiredInput($email) && requiredInput($password)) {

            // Start 2nd condition
            if(maxInput($password,20)) {
                // Start 3rd condition
                if(validEmail($email)) {
                    
                    
                        // Read From DataBase
                    $sql = "SELECT * FROM `users` ";
                    $result = mysqli_query($conn,$sql);


                    if(mysqli_num_rows($result) > 0):
                        while($row = mysqli_fetch_assoc($result)):
                        
                            if($email == $row['Email'] && $password == $row['Password'] && $row['Is_Admin']){
                                $id=$row['Id'];
                                header("Location: AdminDashboard/index.php?id=$id");
                                // ** ?id=$id This action To prevent users entering into AdminDashboard 
                            }
                        else if($email == $row['Email'] && $password == $row['Password']){
                            header("Location: PublicDashboard/index.php");
                        }
                        else {
                            $error = "Please Type Valid Email & Password"; // this action gives error if email & password are not exist in database
                        }
                        endwhile;
                    endif;

                }
                else {
                    $error = "Please Type Valid Email"; // this action gives error if i entered correct password ( between 1 and 20 charachters ) but un-correct email
                }
                // End 3rd condition
            }
            else {
                $error = "Password Must Be Less Than 20 Characters"; // // this action gives error if i entered email that wrote correctly but un-correct password ( more than 20 Characters )
            }
            // End 2nd condition
            
        }
        else {
            $error = "Please Fill All Fields"; // this action gives error if i do not entered anything
            // $error: This variable is exist in validation.php
            
        }
        // End 1st condition
    }

                    
    ?>

        <!-- PHP End  -->


        

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                        <!-- Start For Error  -->
                        <?php if($error) : ?>
                            <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
                        <?php endif; ?>
                        <!-- End For Error  -->
                    <form method="POST" class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="PublicDashboard/index.php" class="">
                                <h3 style="font-size:x-large; color: #9C4B00"><i class="fa fa-user-edit me-2"></i>F.Academy</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button id="btn" type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4" style="background-color: #9C4B00; color: #fff; font-size: 1.3em;" onmouseover="motivation()" onmouseout="motivation2()">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="./signup.php">Sign Up</a></p>
                    </form>

                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="AdminDashboard/js/main.js"></script>
    <script src="JS/index.js"></script>

</body>

</html>