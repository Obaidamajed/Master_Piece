<?php  include('../Includes/header.php'); ?>

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #010124;">
        <a class="navbar-brand" href="Coaches.php">Coaches</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
                <li class="nav-item">
                    <a class="nav-link" href="AddCoach.php" id="Add" onmouseover="AddOver()" onmouseout="AddOut()">Add Coach</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../News/News.php">News</a>
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
        $sql = "SELECT * FROM `coaches` ";
        $result = mysqli_query($conn,$sql); 
    ?>


    <h1 class="text-center col-12 py-3 text-white my-2" style="background-color: #010124;">All Coaches</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th style="width: 10%" scope="col">Id </th>
                    <th style="width: 20%" scope="col">Name</th>
                    <th style="width: 20%" scope="col">Category</th>
                    <th style="width: 20%" scope="col">Photo</th>
                    <th style="width: 10%" scope="col">Edit</th>
                    <th style="width: 10%" scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if(mysqli_num_rows($result) > 0): ?> 
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <th><?php echo $row['Id']; ?></th>
                                <td><?php echo $row['Name']; ?></td>
                                <td><?php echo $row['Category']; ?></td>
                                <td><?php echo $row['Photo']; ?></td>
                                <td>
                                    <a class="btn btn-info" href="editCoach.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="deleteCoach.php?id=<?php echo $row['Id']; ?>"> <i class="fa fa-close"></i> </a>
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

