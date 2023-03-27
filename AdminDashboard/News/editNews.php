<?php  include('../Includes/header.php'); ?>
<?php 

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header("Location: News.php"); 
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `news` WHERE `Id`='$id' LIMIT 1"; 
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ( !$check ) {
        header("Location: News.php");
    }
    $row = mysqli_fetch_assoc($result);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About News</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="updateNews.php" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="exampleInputPhoto1">Photo</label>
                <input required type="file" name="pic" value="<?php echo $row['Photo'] ?>" class="form-control" id="exampleInputphoto1">
            </div>

            <div class="form-group">
                <label for="exampleInputName1">Main_title</label>
                <textarea  rows="10" cols="50" type="text" name="title" value="<?php echo $row['Main_title'] ?>"  class="form-control" id="exampleInputName1" ></textarea>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
            </div>

            <div class="form-group">
                <label for="exampleInputcategory1">Description</label>
                <textarea  rows="10" cols="50" type="text" name="description" value="<?php echo $row['Description'] ?>"  class="form-control" id="exampleInputName1" ></textarea>
            </div>
        
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>


