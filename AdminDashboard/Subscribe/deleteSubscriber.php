<?php  include('../Includes/header.php'); ?>

    <?php 

        if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header("Location: Subscribe.php");
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM `subscribe` WHERE `Id`='$id' LIMIT 1"; 
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if ( !$check ) {
            header("Location: Subscribe.php");
        }
        $sql2 = "DELETE FROM `subscribe` WHERE `Id` = '$id' ";
        mysqli_query($conn, $sql2);

    ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">The Player Has Been Deleted</h1>

    <?php header("refresh:3;url=Subscribe.php"); ?>

<?php  include('../Includes/footer.php'); ?>

