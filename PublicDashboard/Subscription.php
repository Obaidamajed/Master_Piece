<?php  include('../AdminDashboard/Includes/db.php'); ?>
<?php  include('../AdminDashboard/Includes/validation.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Subscrption</title>
    <!-- Css file for home page -->
    <link rel="stylesheet" href="Subscription.css">
    <style>
    <?php
    $css = file_get_contents('Subscription.css');
    echo $css;
    ?>
  </style>
    <!-- Bootstrap files -->
    <link href="../CSS/bootstrap.css" rel="stylesheet">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome link  -->
    <script src="https://kit.fontawesome.com/18b0a154a3.js" crossorigin="anonymous"></script>
 
</head>
<body>

    <!-- Header  -->
    <div id="header">
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent" aria-label="Ninth navbar example">
        <div class="container-xl">
          <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="" width="120px" height="120px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample07XL">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php" style="font-size: 23px;"><b>Our Academy</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Coaches.php" style="font-size: 23px;"><b>Coaches</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Subscription.php" style="font-size: 23px;"><b>Subscription</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="News.php" style="font-size: 23px;"><b>FA News</b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Contact_Us.php" style="font-size: 23px;"><b>Contact Us</b></a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
    
      <h1 id="header-paragraph">SUBSCRIBE</h1>
      
    </div>

    <div id="container">
      <br>

      <?php

      if(isset($_POST['submit'])){ 
          $name =     santString($_POST['fName']) ; 
          $email =    santEmail($_POST['Email']) ;
          $number = santString($_POST['pNumber']) ;
          $Day = $_POST['Day'];
          $Month = $_POST['Month'] ;
          $Year = $_POST['Year'] ;
          $Size = $_POST['Size'] ;
          // $message = santString($_POST['message']) ;

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
                $error = "Name Must Be Greate Than 3 Characters & Phone number Must Be Less Than 11 Characters";
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

      <div id="subscribe">

        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

          <input class="inputs" type="text" name="fName" placeholder="Full Name *"><br><br>
          <input class="inputs" type="email" name="Email" placeholder="Email"><br><br>
          <input class="inputs" type="text" name="pNumber" placeholder="Phone Number *"><br><br>

          <p>Date Of Birth <spans style="color: red;">*</span></p>
          <input type="number" name="Day" placeholder="Day" style="width: 25%;">
          /
          <input type="number" name="Month" placeholder="Month" style="width: 25%;">
          /
          <input type="number" name="Year" placeholder="Year" style="width: 25%;">
          <br><br>

          <input type="text" name="Size" style="width: 80%; margin: 0 auto;" placeholder="Size">
          <br><br>
          <p style=" width: 90%; margin: 0 auto"><span style="color:red">Note ** </span><span style="color:#9c4b00"><b>Size Options</b></span>: XS (6-8 year), S(8-10year), M(10-12year), L(12-14), XL(14-16year).</p>
          <br>

          <p>Make sure you have the following: <span style="color: red;">*</span></p>
          <p class="Make_Sure"> <input required type="checkbox">&nbsp; A valid residence visa in the State of Jordan </p>
          <p class="Make_Sure"> <input required type="checkbox">&nbsp; A valid Jordanian health insurance </p>
          <p class="Make_Sure"> <input required type="checkbox">&nbsp; You does not suffer from any health problems </p>

          <!-- <textarea rows="5" cols="50" style="width: 80%; margin: 0 auto" class="form-control" type="text" name="message" placeholder="Message"></textarea><br><br> -->

          <input type="submit" value="Submit" name="submit" placeholder="Submit"><br><br>
          
          <p> * Registration means that you allow us
            to take photos for marketing purposes.</p>

        </form>

      </div>
      <br>
    </div>

    <!-- Footer  -->
  <div id="footer">
    <br>
    <!-- FA & JFA Logos  -->
    <div id="logo-up">
      <a href="index.php"><img style="width:85px;height:85px;" src="images/logo.png" alt="FUTURE ACADEMY"></a> 
      <a href="https://www.jfa.jo/" target="_blank"><img style="width:70px;height:75px; padding-top: 5px" src="images/Jordan_FA.png" alt="JFA"></a>
    </div>
    <!-- Social Media Logos -->
    <div id="logo-down">
      <a id="insta" href="https://www.instagram.com/alfaisalyscjo/" target="_blank" style="color: black;"><i class="fa-brands fa-instagram fa-2x"></i></a> 
      <a id="face" href="https://ar-ar.facebook.com/ALFAISALYSCJO/" target="_blank" style="color: black;"><i class="fa-brands fa-square-facebook fa-2x"></i></a> 
    </div>
    <br>
    <p>© 2023 Future Academy. all rights are save.</p>
  </div>


  <script src="../JS/bootstrap.bundle.min.js"></script>
  
</body>
</html>