<?php  include('../AdminDashboard/Includes/db.php'); ?>
<?php  include('../AdminDashboard/Includes/validation.php'); ?>
  
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT US</title>
      <!-- Css file for home page -->
  <link rel="stylesheet" href="Contact_Us.css">
  <style>
    <?php
    $css = file_get_contents('Contact_Us.css');
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
      
        <h1 id="header-paragraph">CONTACT_US</h1>
        
      </div>

  <div id="container">
    
  <?php

if(isset($_POST['submit'])){ 
    $name =     santString($_POST['fName']) ; 
    $email =    santEmail($_POST['email']) ;
    $number = santString($_POST['pNumber']) ;
    $message = santString($_POST['Message']) ;

    // Start 1st condition for submit fill required fields
    if(requiredInput($name) && requiredInput($number) && requiredInput($message)) {
      // Start 2nd condition
      if(minInput($name,3) && maxInput($number,10) && maxInput($message,250)) {

                // Start Create In DataBase
                $sql = "INSERT INTO `contact_us` (`Full_Name`, `Email`, `Phone`, `Message`) VALUES('$name' , '$email', '$number','$message')"; 
                $result = mysqli_query($conn, $sql); 
                // End Create In DataBase

                // Start Note Added Successfully
                if ( $result ) {
                    $success = "You are send successfully" ;
                }
                // End Note Added Successfully
      }
      else {
          $error = "Name Must Be Greate Than 3 Characters, Phone Must Be Less Than 11 Characters & Message Must Be Less Than 251 Characters";
      }
      // End 2nd condition
    }
    else {
        $error = "Please Fill All Fields Required";
    }
    // End 1st condition
}

?>


    <br><br>
    <div id="contact_us-core">


      <div id="left">
        <p id="connect_with_us"><b>Connect with us</b></p>
        <p class="Connect-left"><img width="30px"height="30px" src="images/Contact-Us/house-icon.png" alt="Our-city">&nbsp; Aqaba</p>
        <p class="Connect-left"><img width="38px"height="38px" src="images/Contact-Us/location icon.png" alt="Our-location"> Future Academy in Aqaba</p>
        <p class="Connect-left"><img width="30px"height="30px" src="images/Contact-Us/message-icon.png" alt="Our-email"> FutureAcademy@gmail.com</p>
      </div>

      <div id="right">
        <form method="POST" id="subscriber-form" action="#subscriber-form">

          <input type="text" name="fName" placeholder="Full name" id="firstName"><br>
          <input type="email" name="email" placeholder="Email" id="email"><br>
          <input type="text" name="pNumber" placeholder="Phone Number" id="phoneNumber"><br>
          <input type="text" name="Message" placeholder="Message" id="message"><br>

          <input type="submit" name="submit" value="Submit"  id="submit" >

          <!-- Start For Error  -->
            <?php if($error) : ?>
              <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
            <?php endif; ?>
            <!-- End For Error  -->
            
            <!-- Start For Correct Insert in DataBase  -->
            <?php if($success) : ?>
              <h5 class="alert alert-success text-center"> <?php echo $success ;?></h5>
            <?php endif; ?>
          <!-- End For Correct Insert in DataBase  -->
        </form>
      </div>


    </div>
    <br><br>
    
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
  