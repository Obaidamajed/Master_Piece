<?php  include('../Includes/header.php'); ?>
<?php  include('../Includes/validation.php'); ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../Admins.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="News.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AddNews.php">Add News</a>
                </li>
            </ul>
        </div>

    </nav>
    <div class="container-fluid">
<?php

    if(isset($_POST['submit'])){ // كأني بقلو اذا ضغطت على كبسة السبمت, بمثابة الأون كليك بالجافا سكريبت
        $title =     santString($_POST['title']) ; // قيمة الإنبوت اللي إلو نايم اسمو نايم بطبق عليه الفنكشن اللي اسمو سانتسترنق من صفحة الفاليدايشن
        $description =    santString($_POST['description']) ;
        

        if(requiredInput($title) && requiredInput($description)) {
            
                    // save photo in products folder
                        $main_pic= $_FILES['pic'];
                        $filename = $_FILES["pic"]["name"];
                        $filename=trim($filename);
                        $tempname = $_FILES["pic"]["tmp_name"];
                        $folder = "./News's_Image/" . $filename;
                        move_uploaded_file($tempname, $folder);

                    // Start Create Coach In DataBase
                    $sql = "INSERT INTO `news` (`Photo`, `Main_title`, `Description`) VALUES('$filename' , '$title', '$description' ) "; // جملة الكويري 
                    $result = mysqli_query($conn, $sql); // حددت جملة الكويري على أي داتا بايس بدي أطبقها 
                    // End Create Coach In DataBase

                    // Start Note Added Successfully
                    if ( $result ) {
                        $success = "Added Successfully";
                        header("refresh:3;url=News.php");
                    }
                    // End Note Added Successfully

        }
        else {
            $error = "Please Fill All Fields"; // هذا الفاريابل موجود بصفحة الفاليديشن
        }
    }

?>

    <!-- Start For Error  -->
    <?php if($error) : ?>
        <h5 class="alert alert-danger text-center"><?php echo $error; ?></h5>
    <?php endif; ?>
    <!-- End For Error  -->
        
    <!-- Start For Correct Insert in DataBase  -->
    <?php if($success) : ?>
        <h5 class="alert alert-success text-center "><?php echo $success; ?></h5>
    <?php endif; ?>
    <!-- End For Correct Insert in DataBase  -->

    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border bg-light" method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <!-- $_SERVER['PHP_SELF'] بتوديني على نفس الصفحة اللي انا فيها  -->
            <div class="form-group">
                <label for="exampleInputImage1">Image</label>
                <input type="file" name="pic" class="form-control" id="exampleInputImage1">
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Main_title</label>
                <textarea rows="10" cols="50" type="text" name="title" class="form-control" id="exampleInputName1" ></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Description</label>
                <textarea rows="10" cols="50" type="text" name="description" class="form-control" id="exampleInputName1" ></textarea>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>

