<?php include('Includes/db.php'); ?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style>
            <?php
            $css = file_get_contents('../css/style.css');
            echo $css;
            ?>
        </style>
        <!-- Fontawesome  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >

        <title>Dashboard FA.</title>
    </head>
    <body>

<!--Start ** This Code to prevent users entering into AdminDashboard -->
    <?php if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
            header("Location: ../PublicDashboard/index.php"); 
        }
        $id = $_GET['id'];
        $sql = "SELECT * FROM `users` WHERE `Id`='$id' LIMIT 1"; 
        $result = mysqli_query($conn, $sql);
        $check = mysqli_num_rows($result);
        if ( !$check ) {
            header("Location: ../PublicDashboard/index.php");
        }
    ?>
<!--End ** This Code to prevent users entering into AdminDashboard -->

    <nav id="nav-Home" class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="index.php?id=<?php echo $_GET['id'] ?>">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="Coaches/Coaches.php">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="News/News.php">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Subscribe/Subscribe.php">Subscribe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Contact_Us/Contact_Us.php">Contact_Us</a>
                </li>
                <li class="nav-item">
                    <a style="color: #9C4B00" class="nav-link" href="../PublicDashboard/index.php">Public_Dashboard</a>
                </li>
            
            </ul>
        </div>

    </nav>
<div class="container-fluid">

    <?php  
        // Read From DataBase
        $sql = "SELECT * FROM `users` ";
        $result = mysqli_query($conn,$sql); 
        // $conn exist in db.php 
    ?>

    <h1 class="text-center col-12 py-3 text-white my-2"> All users <b>( Admins ) </b> </h1>
    <div class="row">
        <div class="col-sm-12">
            <table id="table-home" class="table">
                <thead>
                    <tr>
                    <th style="width:35%" scope="col">#</th>
                    <th style="width:35%" scope="col">Full_Name</th>
                    <th style="width:30%" scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php $num = 1; ?>
                    <!-- mysqli_num_rows($result), to check if database has data or not-->
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <!-- mysqli_fetch_assoc, this function receive data as an array-->
                    <!-- while, it do loop for all rows in database -->
                        <tr> <?php if($row["Is_Admin"] == 1) { ?>
                                <td style="color: #9c4b00"> <b><?php echo $num; ?></b> </td>
                                <td style="color: #9c4b00"> <b><?php echo $row['Full_Name']; ?></b> </td>
                                <td style="color: #9c4b00"> <b><?php echo $row['Email']; ?></b></td>
                            <?php } else { ?>
                                    <td><?php echo $num; ?></td>
                                    <td><?php echo $row['Full_Name']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                            <?php } ?>
                        </tr>
                        <?php ++$num; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                
                </tbody>
            </table>
        </div>
    </div>

<!-- Footer part  -->
</div>
        <!-- For Dropdown navbar  -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

