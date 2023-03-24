<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<?php

    if(isset($_POST['submit'])){
        $title =     santString($_POST['title']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
        $description =    santString($_POST['description']) ;
            $main_pic= $_FILES['pic'];
            $filename = $_FILES["pic"]["name"];
            $filename=trim($filename);
            $tempname = $_FILES["pic"]["tmp_name"];
            $folder = "./News's_Image/" . $filename;
            move_uploaded_file($tempname, $folder);
        if(requiredInput($title) && requiredInput($description)) {

              $id = $_POST['id'];

                $sql = "UPDATE `news` SET `Photo`='$filename', `Main_title`='$title', `Description`='$description' WHERE `Id`='$id' ";
                $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
              

                if ( $result ) {
                    $success = "Updated Successfully";
                    header("refresh:1;url=News.php"); // هيك بنقلني على صفحة الإندكس بعد 3 ثواني
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

