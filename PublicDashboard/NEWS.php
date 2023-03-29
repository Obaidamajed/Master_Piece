<?php include('../AdminDashboard/Includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FA News</title>
    <!-- Css file for home page -->
    <link rel="stylesheet" href="News.css">
    <style>
    <?php
    $css = file_get_contents('News.css');
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
    
      <h1 id="header-paragraph">NEWS</h1>
      
    </div>
    <!-- Container  -->
  <div id="container">

      <?php  
        // Read From DataBase
        $sql = "SELECT * FROM `news` ";
        $result = mysqli_query($conn,$sql); 
      ?>

      <div id="News-Core">
        <br>
        <?php if(mysqli_num_rows($result) > 0): ?> 
          <?php while($row = mysqli_fetch_assoc($result)): ?>
              <br>
              <div id="box">
                <?php if($row['Photo']) { ?>
                <div id="box-img">
                  <img src="../AdminDashboard/News/News's_Image/<?php echo $row['Photo']; ?>" alt="<?php echo $row['Photo']; ?>">
                </div>
                <?php } ?>
                <div id="box-paragraph">
                  <p>
                    <h4><b><?php echo $row['Main_title']; ?></b>
                    </h4>
                    <?php echo $row['Description']; ?>
                  </p>
                </div>
              </div>
              <br>
          <?php endwhile; ?>
        <?php endif; ?>
        <br>
      </div>

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


