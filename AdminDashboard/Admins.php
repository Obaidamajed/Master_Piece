<?php  include('Includes/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="landingPage.php">Home</a>
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
                    <a class="nav-link" href="add.php">Subscribe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add.php">Contact_Us</a>
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
    $sql = "SELECT * FROM `users` ";
    $result = mysqli_query($conn,$sql); // بقلو جملة الكويري طبقها على الداتا بايس المتصل فيها 
    // $conn موجود في ملف ال db.php 


?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">All Admins</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id </th>
                    <th scope="col">Full_Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                <!-- mysqli_num_rows($result) هاي بتعمل تشييك اذا الريزولت راجع ببيانات او لا -->
                <?php while($row = mysqli_fetch_assoc($result)): ?>
                <!-- mysqli_fetch_assoc هذا الفنكشن من خلالو بستقبل البيانات ك أرراي -->
                <!-- while بعمل لوب على كل الأرراي اللي بداخل التابل  -->
                <?php
                // echo "<pre>";
                // print_r($row);
                // echo "</pre>";
                // // $row عبارة عن أرراي بحتوي بداخل عدة أررايز بحيث كل أرراي بداخلو بمثل رو واحد من التابل كامل
                // echo "<pre>";
                // print_r($row['user_id']);
                // echo "</pre>";
                ?>
                    <tr>
                        <th><?php echo $row['Id']; ?></th>
                        <td><?php echo $row['Full_Name']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td>
                            <a class="btn btn-info" href="edit.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a>
                            <!-- ?id=<?php echo $row['user_id']; ?> بهاي الطريقة ببعث الآي دي لخاص بالعنصر اللي ضغطت عليه على صفحة الإيديت -->
                        </td>
                        <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php endif; ?>


                    
                
                </tbody>
            </table>
        </div>
    </div>

<?php  include('Includes/footer.php'); ?>

