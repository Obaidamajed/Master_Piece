<?php  include('../Includes/header.php'); ?>
<?php 

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header("Location: Subscribe.php"); // اذا الآي دي مو موجود واذا الآي دي مو نيوميريك ابعتو على صفحة الإنديكس
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `subscribe` WHERE `Id`='$id' LIMIT 1"; // LIMIT 1 هيك بنتأكد إنو حيرجع بعنصر واحد فقط
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ( !$check ) {
        header("Location: Subscribe.php");
    }
    $row = mysqli_fetch_assoc($result);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About News</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="updateSubscriber.php">

            <div class="form-group">
                <label for="exampleInputName1">Full_Name</label>
                <input type="text" name="fName" value="<?php echo $row['Full_Name'] ?>"  class="form-control" id="exampleInputName1" ></input>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
            </div>

            <div class="form-group">
                <label for="exampleInputcategory1">Email</label>
                <input type="text" name="email" value="<?php echo $row['Email'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Phone</label>
                <input type="text" name="phone" value="<?php echo $row['Phone'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Day</label>
                <input type="number" name="Day" value="<?php echo $row['Day'];?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Month</label>
                <input type="number" name="Month" value="<?php echo $row['Month'];?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Year</label>
                <input type="number" name="Year" value="<?php echo $row['Year'];?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Size</label>
                <input type="text" name="Size" value="<?php echo $row['Size'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
            <div class="form-group">
                <label for="exampleInputcategory1">Message</label>
                <input type="text" name="Message" value="<?php echo $row['Message'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
        
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>


