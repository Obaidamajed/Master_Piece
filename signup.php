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

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Customized Bootstrap Stylesheet -->
    <link href="AdminDashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="AdminDashboard/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Start PHP  -->
            
        <?php

        if(isset($_POST['submit'])){ // كأني بقلو اذا ضغطت على كبسة السبمت, بمثابة الأون كليك بالجافا سكريبت
            $name =     santString($_POST['name']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
            $email =    santEmail($_POST['email']) ;
            $password = santString($_POST['password']) ;

            

            // Start 1st condition
            if(requiredInput($name) && requiredInput($email) && requiredInput($password)) {

                // Start 2nd condition
                if(minInput($name,3) && maxInput($password,20)) {
                    // Start 3rd condition
                    if(validEmail($email)) {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT); // بتعمل على تشفير الباسوورد في الداتا بايس 
                        
                        // save photo in products folder
                            $main_pic= $_FILES['pic'];
                            // echo "<pre>";
                            // print_r($main_pic);
                            // echo "</pre>";
                            $filename = $_FILES["pic"]["name"];
                            $filename=trim($filename);
                            // echo "<pre>";
                            // print_r($filename);
                            // echo "</pre>";
                            $tempname = $_FILES["pic"]["tmp_name"];
                            // echo "<pre>";
                            // print_r($tempname);
                            // echo "</pre>";
                            $folder = "./img/" . $filename;
                            if (move_uploaded_file($tempname, $folder)) {
                                echo "<h3>  Image uploaded successfully!</h3>";
                            } else {
                                echo "<h3>  Failed to upload image!</h3>";
                            }
                        
                        // Start Create In DataBase
                        $sql = "INSERT INTO `users` (`Full_Name`, `Email`, `Password`, `Photo`) VALUES('$name' , '$email', '$hashed_password', '$filename' ) "; // جملة الكويري 
                        $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
                        // End Create In DataBase

                        // Start Note Added Successfully
                        if ( $result ) {
                            header("Location: AdminDashboard/signin.php");
                        }
                        // End Note Added Successfully
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
                $error = "Please Fill All Fields"; // هذا الفاريابل موجود بصفحة الفاليديشن
            }
            // End 1st condition
        }

        ?>

        
        <!-- Start For Error  -->
        <?php if($error) : ?>
            <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <?php endif; ?>
        <!-- End For Error  -->
            
        <!-- Start For Correct Insert in DataBase  -->
        <?php if($success) : ?>
            <h5 class="text-center"><?php echo $success; ?></h5>
        <?php endif; ?>
        <!-- End For Correct Insert in DataBase  -->

        <!-- End PHP  -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">

                    <form class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary" style="font-size:x-large;"><i class="fa fa-user-edit me-2"></i>F.Academy</h3>
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
                        <div class="form-floating mb-3">
                            <input type="file" name="pic" class="form-control" id="floatingText" placeholder="Your Photo">
                            <label for="floatingText">Your Photo</label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="signin.php">Sign In</a></p>
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
</body>

</html>