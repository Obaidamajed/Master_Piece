<?php  include('../Includes/header.php'); ?>
<?php 

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header("Location: Coaches.php"); // اذا الآي دي مو موجود واذا الآي دي مو نيوميريك ابعتو على صفحة الإنديكس
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `coaches` WHERE `Id`='$id' LIMIT 1"; // LIMIT 1 هيك بنتأكد إنو حيرجع بعنصر واحد فقط
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ( !$check ) {
        header("Location: Coaches.php");
    }
    $row = mysqli_fetch_assoc($result);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About Coach</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="updateCoach.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName1">Name</label>
                <input type="text" name="name" value="<?php echo $row['Name'] ?>" class="form-control" id="exampleInputName1" >
                <input type="hidden" value="<?php echo $id; ?>" name="id">
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Category</label>
                <input type="text" name="category" value="<?php echo $row['Category'] ?>" class="form-control" id="exampleInputcategory1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPhoto1">Photo</label>
                <input required type="file" name="pic" value="<?php echo $row['Photo'] ?>" class="form-control" id="exampleInputphoto1">
            </div>
        
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>


