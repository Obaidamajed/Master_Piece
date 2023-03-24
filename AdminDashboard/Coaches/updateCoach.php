<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){
        $name =     santString($_POST['name']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
        $category =    santString($_POST['category']) ;
            $main_pic= $_FILES['pic'];
            $filename = $_FILES["pic"]["name"];
            $filename=trim($filename);
            $tempname = $_FILES["pic"]["tmp_name"];
            $folder = "./Coache's_Image/" . $filename;
            move_uploaded_file($tempname, $folder);
        if(requiredInput($name) && requiredInput($category)) {

              $id = $_POST['id'];

                $sql = "UPDATE `coaches` SET `Name`='$name', `Category`='$category', `Photo`='$filename' WHERE `Id`='$id' ";
                $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
              

                if ( $result ) {
                    $success = "Updated Successfully";
                    header("refresh:1;url=Coaches.php"); // هيك بنقلني على صفحة الإندكس بعد 3 ثواني
                }
            }
            
        else {
            $error = "Please Fill All Fields"; // هذا الفاريابل موجود بصفحة الفاليديشن
        }
    }

?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Update Info About Coach</h1>

    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back > > </a> 
        <!-- javascript:history.go(-1)" برجعني على الصفحة اللي كنت فيها  -->
    <?php endif; ?>

    <?php if($success) : ?>
        <h5 class="alert alert-success text-center"><?php echo $success; ?></h5>
    <?php endif; ?>

<?php  include('../Includes/footer.php'); ?>

