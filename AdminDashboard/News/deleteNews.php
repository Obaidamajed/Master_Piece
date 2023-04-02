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
        $sql2 = "DELETE FROM `news` WHERE `Id` = '$id' ";
        mysqli_query($conn, $sql2);

    ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">The New Has Been Deleted</h1>

    <?php header("refresh:3;url=News.php"); ?>

<?php  include('../Includes/footer.php'); ?>

