<?php  include('Includes/header.php'); ?>

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

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #010124;">
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

    <h1 class="text-center col-12 py-3 text-white my-2" style="background-color: #010124;">All users <b style="color: #9c4b00;">( Admins )</b></h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th style="width:35%" scope="col">Id </th>
                    <th style="width:35%" scope="col">Full_Name</th>
                    <th style="width:30%" scope="col">Email</th>
                    <!-- <th scope="col">Edit</th>
                    <th scope="col">Delete</th> -->
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <!-- mysqli_num_rows($result), to check if database has data or not-->
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <!-- mysqli_fetch_assoc, this function receive data as an array-->
                    <!-- while, it do loop for all rows in database -->
                        <tr> <?php if($row["Is_Admin"] == 1) { ?>
                                <td style="color: #9c4b00"> <b><?php echo $row['Id']; ?></b> </td>
                                <td style="color: #9c4b00"> <b><?php echo $row['Full_Name']; ?></b> </td>
                                <td style="color: #9c4b00"> <b><?php echo $row['Email']; ?></b></td>
                            <?php } else { ?>
                                    <td><?php echo $row['Id']; ?></td>
                                    <td><?php echo $row['Full_Name']; ?></td>
                                    <td><?php echo $row['Email']; ?></td>
                            <?php } ?>
                            <!-- <td>
                                <a class="btn btn-info" href="edit.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a>
                            </td>
                            <td>
                                <a class="btn btn-danger" href="delete.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                            </td> -->
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  include('Includes/footer.php'); ?>

