<?php  include('../Includes/header.php'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #010124;">
        <a class="navbar-brand" href="News.php">News</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="AddNews.php" id="Add" onmouseover="AddOver()" onmouseout="AddOut()">Add News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Coaches/Coaches.php">Coaches</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Subscribe/Subscribe.php">Subscribe</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Contact_Us/Contact_Us.php">Contact_Us</a>
                </li>
                <li class="nav-item">
                    <a style="color: #9C4B00" class="nav-link" href="../../PublicDashboard/index.php">Public_Dashboard</a>
                </li>
            
            </ul>
        </div>
    </nav>

<div class="container-fluid">
    <?php  
        // Read From DataBase
        $sql = "SELECT * FROM `news` ";
        $result = mysqli_query($conn,$sql); 
    ?>

    <h1 class="text-center col-12 py-3 text-white my-2"style="background-color: #010124;">All News</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id </th>
                    <th scope="col">Photo</th>
                    <th scope="col">Main_title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(mysqli_num_rows($result) > 0): ?> 
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $row['Id']; ?></td>
                            <td><?php echo $row['Photo']; ?></td>
                            <td style="max-width:400px;" ><?php echo $row['Main_title']; ?></td>
                            <td style="max-width:400px;" ><?php echo $row['Description']; ?></td>
                            <td>
                                <a class="btn btn-info" href="editNews.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a>
                                <!-- ?id=<?php echo $row['Id']; ?> بهاي الطريقة ببعث الآي دي لخاص بالعنصر اللي ضغطت عليه على صفحة الإيديت -->
                            </td>
                            <td>
                                <a class="btn btn-danger" href="deleteNews.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  include('../Includes/footer.php'); ?>

