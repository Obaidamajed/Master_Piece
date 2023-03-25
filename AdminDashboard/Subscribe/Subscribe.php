<?php  include('../Includes/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../Admins.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="Subscribe.php">Subscribers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AddSubscriber.php">Add Subscriber</a>
                </li>
                <li class="nav-item">
                    <a style="color: #9C4B00" class="nav-link" href="../PublicDashboard/Home.php">Public_Dashboard</a>
                </li>
            
            </ul>
        </div>

    </nav>
    <div class="container-fluid">
<?php  
    // Read From DataBase
    $sql = "SELECT * FROM `subscribe` ";
    $result = mysqli_query($conn,$sql); // بقلو جملة الكويري طبقها على الداتا بايس المتصل فيها 
    // $conn موجود في ملف ال db.php 


?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">All Subscribers</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id </th>
                        <th scope="col">Full_Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Day</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">Size</th>
                        <th scope="col">Message</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <th><?php echo $row['Id']; ?></th>
                        <td><?php echo $row['Full_Name']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
                        <td><?php echo $row['Day']; ?></td>
                        <td><?php echo $row['Month']; ?></td>
                        <td><?php echo $row['Year']; ?></td>
                        <td><?php echo $row['Size']; ?></td>
                        <td style="max-width:300px;"><?php echo $row['Message']; ?></td>
                        <td>
                            <a class="btn btn-info" href="editSubscriber.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="deleteSubscriber.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>


                    
                
                </tbody>
            </table>
        </div>
    </div>

<?php  include('../Includes/footer.php'); ?>

