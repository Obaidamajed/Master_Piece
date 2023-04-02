<?php  include('../Includes/header.php'); ?>
<?php 

    if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
        header("Location: Schedule.php"); 
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM `schedule` WHERE `Id`='$id' LIMIT 1"; 
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);
    if ( !$check ) {
        header("Location: Schedule.php");
    }
    $row = mysqli_fetch_assoc($result);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Time of Exercise Days</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" method="POST" action="updatSchedule.php">

            <div class="form-group">
                <label for="exampleInputName1" style="color: #010124"><b>First_Day</b></label>
                <input type="text" name="1st_Day" value="<?php echo $row['1st_Day'] ?>"  class="form-control" id="exampleInputName1" ></input>
                <input type="text" name="1st_Time" value="<?php echo $row['1st_Time'] ?>"  class="form-control" id="exampleInputName1" ></input>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
            </div>

            <div class="form-group">
                <label for="exampleInputcategory1" style="color: #010124"><b>Second_Day</b></label>
                <input type="text" name="2nd_Day" value="<?php echo $row['2nd_Day'] ?>"  class="form-control" id="exampleInputName1" ></input>
                <input type="text" name="2nd_Time" value="<?php echo $row['2nd_Time'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>

            <div class="form-group">
                <label for="exampleInputcategory1" style="color: #010124"><b>Third_Day</b></label>
                <input type="text" name="3rd_Day" value="<?php echo $row['3rd_Day'] ?>"  class="form-control" id="exampleInputName1" ></input>
                <input type="text" name="3rd_Time" value="<?php echo $row['3rd_Time'] ?>"  class="form-control" id="exampleInputName1" ></input>
            </div>
        
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

<?php  include('../Includes/footer.php'); ?>


