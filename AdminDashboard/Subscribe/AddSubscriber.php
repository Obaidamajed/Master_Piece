<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #010124;">
        <a class="navbar-brand" href="AddSubscriber.php">Add Subscriber</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="Subscribe.php">Subscribers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Coaches/Coaches.php">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../News/News.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Contact_Us/Contact_Us.php">Contact_Us</a>
                </li>
                <li class="nav-item">
                    <a style="color: #9C4B00" class="nav-link" href="../../PublicDashboard/index.php">Public_Dashboard</a>
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

        // Start 1st condition for submit fill required fields
        if(requiredInput($name) && requiredInput($number) && requiredInput($Day) && requiredInput($Month) && requiredInput($Year)) {
        // Start 2nd condition
        if(minInput($name,3) && maxInput($number,10)) {
            // Start 3rd condition 
            if(Day($Day) && Month($Month) && Year($Year)){
                // Start 4th condition 
                if(Size($Size)) {

                    // Start Create In DataBase
                    $sql = "INSERT INTO `subscribe` (`Full_Name`, `Email`, `Phone`, `Day`, `Month`, `Year`, `Size`) VALUES('$name' , '$email', '$number', '$Day', '$Month', '$Year', '$Size' ) "; 
                    $result = mysqli_query($conn, $sql); 
                    // End Create In DataBase

                    // Start Note Added Successfully
                    if ( $result ) {
                        $success = "You are Added successfully" ;
                    }
                    // End Note Added Successfully

                }
                else {
                $error = "Please Enter Correct Size";
                }
                // End 4th condition 
            }
            else {
                $error = "Please Enter Correct Birth";

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
        <h5 class="alert alert-success text-center">  <?php echo $success ;?> </h5>
    <?php endif; ?>
    <!-- End For Correct Insert in DataBase  -->

    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <div class="form-group">
                <label for="exampleInputName1" style="color:red">Required *</label>
                <input type="text" name="fName"  class="form-control" id="exampleInputName1" placeholder="Full_Name"></input>
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="email"  class="form-control" id="exampleInputName1" placeholder="Email"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1" style="color:red">Required *</label>
                <input type="text" name="phone"  class="form-control" id="exampleInputName1" placeholder="Phone"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1"style="color:red">Required *</label>
                <input type="number" name="Day"  class="form-control" id="exampleInputName1" placeholder="Day"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1"style="color:red">Required *</label>
                <input type="number" name="Month"  class="form-control" id="exampleInputName1" placeholder="Month"></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1"style="color:red">Required *</label>
                <input type="number" name="Year"  class="form-control" id="exampleInputName1" placeholder="Year"></input>
            </div>
            <br>
            <div class="form-group">
                <input type="text" name="Size"  class="form-control" id="exampleInputName1" placeholder="Size: XS, S, M, L, XL" ></input>
            </div>
            <br>

            <button type="submit" class="btn" name="submit" style="background-color: #9c4b00; color:#010124">Submit</button>
        </form>
    </div>
    
</div>

<?php  include('../Includes/footer.php'); ?>

