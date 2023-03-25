<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="Subscribe.php">Subsribers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AddSubscriber.php">Add Subsriber</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container-fluid">

    <?php

    if(isset($_POST['submit'])){ 
        $name =     santString($_POST['fName']) ; 
        $email =    santEmail($_POST['email']) ;
        $number = santString($_POST['phone']) ;
        $Day = $_POST['Day'];
        $Month = $_POST['Month'] ;
        $Year = $_POST['Year'] ;
        $Size = $_POST['Size'] ;
        $message = santString($_POST['Message']) ;

        // Start 1st condition for submit fill required fields
        if(requiredInput($name) && requiredInput($number) && requiredInput($Day) && requiredInput($Month) && requiredInput($Year)) {
        // Start 2nd condition
        if(minInput($name,3) && maxInput($number,10) && maxInput($message,250)) {
            // Start 3rd condition 
            if(Day($Day) && Month($Month) && Year($Year)){
                // Start 4th condition 
                if(Size($Size)) {

                    // Start Create In DataBase
                    $sql = "INSERT INTO `subscribe` (`Full_Name`, `Email`, `Phone`, `Day`, `Month`, `Year`, `Size`, `Message`) VALUES('$name' , '$email', '$number', '$Day', '$Month', '$Year', '$Size', '$message' ) "; // جملة الكويري 
                    $result = mysqli_query($conn, $sql); 
                    // End Create In DataBase

                    // Start Note Added Successfully
                    if ( $result ) {
                        $success = "You are submited successfully" ;
                    }
                    // End Note Added Successfully

                }
                else {
                $error = "Please Enter Correct Size";
                }
                // End 4th condition 
            }
            else {
                $error = "Please Enter Correct Date";
            }
            // End 3rd condition 
        }
        else {
            $error = "Name Must Be Greate Than 3 Characters & Password Must Be Less Than 11 Characters & Message Must Be Less Than 251 Characters";
        }
        // End 2nd condition
        }
        else {
            $error = "Please Fill All Fields required";
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
        <h5 class="alert alert-success text-center">  <?php echo $success ;?> <strong>Please wait for the confirmation message that will be sent to your phone</strong>  </h5>
    <?php endif; ?>
    <!-- End For Correct Insert in DataBase  -->

    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="form-group">
                <label for="exampleInputName1">Full_Name</label>
                <input type="text" name="fName"  class="form-control" id="exampleInputName1" placeholder="Required *"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Email</label>
                <input type="text" name="email"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Phone</label>
                <input type="text" name="phone"  class="form-control" id="exampleInputName1" placeholder="Required *"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Day</label>
                <input type="number" name="Day"  class="form-control" id="exampleInputName1" placeholder="Required *"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Month</label>
                <input type="number" name="Month"  class="form-control" id="exampleInputName1" placeholder="Required *"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Year</label>
                <input type="number" name="Year"  class="form-control" id="exampleInputName1" placeholder="Required *"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Size</label>
                <input type="text" name="Size"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Message</label>
                <input type="text" name="Message" class="form-control" id="exampleInputName1" ></input>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>

