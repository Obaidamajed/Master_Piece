<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){
        $fName =     santString($_POST['fName']) ; 
        $email =    santEmail($_POST['email']) ;
        $phone =    santString($_POST['phone']) ;
          $Day = $_POST['Day'];
          $Month = $_POST['Month'] ;
          $Year = $_POST['Year'] ;
          $Size = $_POST['Size'] ;
          $message = santString($_POST['Message']) ;

        if(requiredInput($fName) && requiredInput($phone) && requiredInput($Day) && requiredInput($Month) && requiredInput($Year)) {
             // Start 2nd condition
             if(minInput($fName,3) && maxInput($phone,10) && maxInput($message,250)) {
                // Start 3rd condition 
                if(Day($Day) && Month($Month) && Year($Year)){
                    // Start 4th condition 
                    if(Size($Size)) {

                $id = $_POST['id'];

                $sql = "UPDATE `subscribe` SET `Full_Name`='$fName',
                 `Email`='$email', `Day`='$Day', `Month`='$Month',
                  `Year`='$Year', `Size`='$Size', `Message`='$message'
                  WHERE `Id`='$id' ";
                $result = mysqli_query($conn, $sql); 
              

                if ( $result ) {
                    $success = "Updated Successfully";
                    header("refresh:3;url=Subscribe.php"); 
                }
                
            }  else {
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
                $error = "Name Must Be Greate Than 3 Characters, Phone Must Be Less Than 11 Characters & Message Must Be Less Than 251 Characters";
            }
            // End 2nd condition
        }
        else {
            $error = "Please Fill All Fields";
        }
    }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About Players</h1>

    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back > > </a> 
    <?php endif; ?>

    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>

<?php  include('../Includes/footer.php'); ?>

