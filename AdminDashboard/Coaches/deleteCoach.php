<?php  include('../Includes/header.php'); ?>

    <?php 

        if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header("Location: Coaches.php"); // If "id" is not exists or not numeric, it will send me to Coaches.php page
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM `coaches` WHERE `Id`='$id' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if ( !$check ) { // If "id" is not exists in database, it will send me to Coaches.php page
            header("Location: Coaches.php");
        }
        $sql2 = "DELETE FROM `coaches` WHERE `Id` = '$id' ";
        mysqli_query($conn, $sql2);

    ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">The Coach Has Been Deleted</h1>

    <?php header("refresh:3;url=Coaches.php"); ?>

<?php  include('../Includes/footer.php'); ?>

