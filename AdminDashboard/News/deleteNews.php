<?php  include('../Includes/db.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Fontawesome  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

        <title>Dashboard FA.</title>
    </head>
    <body>
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

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">News Have Been Deleted</h1>

    <?php header("refresh:3;url=News.php"); ?>

<?php  include('../Includes/footer.php'); ?>

