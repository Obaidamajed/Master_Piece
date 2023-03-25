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


        <!-- PHP Start  -->
    <?php

    if(isset($_POST['submit'])){ // كأني بقلو اذا ضغطت على كبسة السبمت, بمثابة الأون كليك بالجافا سكريبت
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
                            $error = "Please Type Valid Email & Password"; // بعطي إيرور في حال دخلت ايميل وباسوورد غير موجودين بالداتا بايس
                        }
                        endwhile;
                    endif;


                    // foreach($row as $item) {
                    //     echo "<pre>";
                    //     print_r($row);
                    //     echo "</pre>";
                    //     // if($email === $item['Email'] && $password === $item['Password'] && $item['Is_Admin']):
                    //     //     header("Location: index.php");
                    //     // endif;
                    //     // if($email === $item['Email'] && $password === $item['Password']){
                    //     //     header("Location: ../PublicDashboard/Home.php");
                    //     // }
                    //     // else {
                    //     //     $error = "Please Type Valid Email & Password"; // بعطي إيرور في حال دخلت ايميل وباسوورد غير موجودين بالداتا بايس
                    //     // }
                    // }



                    
                }
                else {
                    $error = "Please Type Valid Email"; // بعطي إيرور في حال دحلت باسوورد مناسب وايميل غير مناسب
                }
                // End 3rd condition
            }
            else {
                $error = "Password Must Be Less Than 20 Characters"; // بعطي أيرور في حال دخلت ايميل مناسب وباسوورد غير مناسب
            }
            // End 2nd condition
            
        }
        else {
            $error = "Please Fill All Fields"; // هذا الفاريابل موجود بصفحة الفاليديشن
            // بعطي إيرور في حال ما دخلت أي إشي
        }
        // End 1st condition
    }

                    
    ?>

        
            
        

        <!-- PHP End  -->


        

        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <form method="POST" class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.html" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>F.ACADEMY</h3>
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
                        <button type="submit" name="submit" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <p class="text-center mb-0">Don't have an Account? <a href="./signup.php">Sign Up</a></p>
                    </form>
                    <!-- Start For Error  -->
                    <?php if($error) : ?>
                        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
                    <?php endif; ?>
                    <!-- End For Error  -->

                    <!-- Start For Correct Insert in DataBase  -->
                    <?php if($success) : ?>
                        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
                    <?php endif; ?>
                    <!-- End For Correct Insert in DataBase  -->
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    
    <!-- Template Javascript -->
    <script src="AdminDashboard/js/main.js"></script>
</body>

</html>