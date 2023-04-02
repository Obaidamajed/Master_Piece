<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){
        $First_Day =     santString($_POST['1st_Day']) ; 
        $First_Time =     santString($_POST['1st_Time']) ; 
        $Second_Day =    santString($_POST['2nd_Day']) ;
        $Second_Time =    santString($_POST['2nd_Time']) ;
        $Third_Day =    santString($_POST['3rd_Day']) ;
        $Third_Time =    santString($_POST['3rd_Time']) ;

        if(requiredInput($First_Day) && requiredInput($First_Time) && requiredInput($Second_Day) &&
        requiredInput($Second_Time) && requiredInput($Third_Day) && requiredInput($Third_Time)) {
                    $id = $_POST['id'];

                    $sql = "UPDATE `schedule` SET `1st_Day`='$First_Day',`1st_Time`='$First_Time',`2nd_Day`='$Second_Day',`2nd_Time`='$Second_Time', `3rd_Day`='$Third_Day', `3rd_Time`='$Third_Time' WHERE `Id`='$id' ";
                    $result = mysqli_query($conn, $sql); 
                
                    if ( $result ) {
                        $success = "Updated Successfully";
                        header("refresh:3;url=Schedule.php"); 
                    }
        }
        else {
            $error = "Please Fill All Fields"; 
        }
    }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Time of Exercise Days</h1>

    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back > > </a> 
    <?php endif; ?>

    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>

<?php  include('../Includes/footer.php'); ?>

