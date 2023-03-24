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
        $sql2 = "DELETE FROM `coaches` WHERE `Id` = '$id' ";
        mysqli_query($conn, $sql2);

    ?>

    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">Coach Have Been Deleted</h1>

    <?php header("refresh:3;url=Coaches.php"); ?>

<?php  include('../Includes/footer.php'); ?>

