<?php  include('../Includes/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../index.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="Contact_Us.php">Contact_Us</a>
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
    $sql = "SELECT * FROM `contact_us` ";
    $result = mysqli_query($conn,$sql); // بقلو جملة الكويري طبقها على الداتا بايس المتصل فيها 
    // $conn موجود في ملف ال db.php 


?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">All Contacts</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id </th>
                        <th scope="col">Full_Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Message</th>
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
                        <td style="max-width:300px;"><?php echo $row['Message']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>


                    
                
                </tbody>
            </table>
        </div>
    </div>

<?php  include('../Includes/footer.php'); ?>

