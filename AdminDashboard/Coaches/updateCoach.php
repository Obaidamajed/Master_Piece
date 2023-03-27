<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){

        $name =     santString($_POST['name']) ; 
        $category =    santString($_POST['category']) ;
        // Start For Photo
        $main_pic= $_FILES['pic'];
        $filename = $_FILES["pic"]["name"];
        $filename=trim($filename);
        $tempname = $_FILES["pic"]["tmp_name"];
        $folder = "./Coache's_Image/" . $filename;
        move_uploaded_file($tempname, $folder);
        // End For Photo

        if(requiredInput($name) && requiredInput($category)) {

              $id = $_POST['id'];

                $sql = "UPDATE `coaches` SET `Name`='$name', `Category`='$category', `Photo`='$filename' WHERE `Id`='$id' ";
                $result = mysqli_query($conn, $sql); 
              

                if ( $result ) {
                    $success = "Updated Successfully";
                    header("refresh:3;url=Coaches.php"); 
                }
            }
            
        else {
            $error = "Please Fill All Fields"; 
        }
    }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About Coach</h1>

    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back > > </a> 
        <!-- javascript:history.go(-1): Return me on last page i was -->
    <?php endif; ?>

    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>

<?php  include('../Includes/footer.php'); ?>

